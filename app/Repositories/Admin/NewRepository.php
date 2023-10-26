<?php

namespace App\Repositories\Admin;

use App\Models\NewEvent;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewRepository extends BaseRepository {

    private $pathCkeditor = "upload/admin/New/ckeditor";
    private $pathImage = "upload/admin/New/image";
    public function model()
    {
        return NewEvent::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['name'])) {
            $name = $searchParams['name'];
            $query->where('name', 'like', "$name%");
        }
        if (isset($searchParams['status'])) {
            $status = $searchParams['status'];
            $query->where('status', '=', "$status");
        }
        if (isset($searchParams['created_at'])) {
            $created_at = date("Y-m-d", strtotime($searchParams['created_at']));
            $query->WhereRaw('str_to_date(created_at,"%Y-%m-%d") = "'.$created_at.'"');
        }
        $query->orderBy('updated_at', 'desc');
        $news = $query->paginate(10);
        return view('admin.pages.new.index', compact('news'));
    }

    /**
     * @throws \Exception
     */
    public function store($params, $request) {
        DB::beginTransaction();
        try {
            $new = new $this->model;
            $params['slug'] = Str::slug($params['name'], '-');
            $slugs = $this->model->where('slug', ''.$params['slug'].'')->first();
            if($slugs){
                $params['slug'] = $params['slug'].'-1';
            }
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $new->fill($params);
            $new->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit($id) {
        $query = $this->model->where('id', $id);
        return $query->firstOrFail();
    }

    public function update($params, $request, $id) {
        $new = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            $params['slug'] = Str::slug($params['name'], '-');
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $new->fill($params);
            $new->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            $this->model->where('id', $id)->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
    public function saveFile($file, $path) {
        //get filename with extension
        $filenamewithextension = $file->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $file->getClientOriginalExtension();

        //filename to store
        $fileNameStore = $filename.'_'.time().'.'.$extension;
        //Upload File
        $file->move(public_path($path), $fileNameStore);
        return $fileNameStore;
    }

    public function ckeditorUpload($request) {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $fileNameStore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move(public_path($this->pathCkeditor), $fileNameStore);
            $url = asset($this->pathCkeditor . '/' . $fileNameStore);
            return response()->json([
                'fileName'=> $fileNameStore, 'uploaded'=> 1, 'url'=> $url
            ]);
        }
    }
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
