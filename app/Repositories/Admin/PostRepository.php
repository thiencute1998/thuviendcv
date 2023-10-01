<?php

namespace App\Repositories\Admin;

use App\Models\BookVersion;
use App\Models\Post;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostRepository extends BaseRepository {

    private $pathCkeditor = "upload/admin/post/ckeditor";
    private $pathImage = "upload/admin/post/image";
    public function model()
    {
        return Post::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['search'])) {
            $name = $searchParams['search'];
            $query->where('name', 'like', "$name%");
        }
        if (isset($searchParams['category_id'])) {
            $id = $searchParams['category_id'];
            $query->where('category_id', '=', "$id");
        }
        if (isset($searchParams['status'])) {
            $status = $searchParams['status'];
            $query->where('status', '=', "$status");
        }
        $query->with('category');
        $query->orderBy('updated_at', 'desc');
        $posts = $query->paginate(10);
        return view('admin.pages.post.index', compact('posts'));
    }

    /**
     * @throws \Exception
     */
    public function store($params, $request) {
        DB::beginTransaction();
        try {
            $post = new $this->model;
            $params['slug'] = Str::slug($params['name'], '-');
            $slugs = $this->model->where('slug', ''.$params['slug'].'')->first();
            if($slugs){
                $params['slug'] = $params['slug'].'-1';
            }
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $post->fill($params);
            $post->save();

            //Hiện trạng các bản sách
            $total = $request['book_code'];
            $arrInsert = [];
            for($i = 0; $i < count($total); $i++){
                if(isset($request->book_code[$i])) {
                    $arrInsert = new BookVersion([
                        'posts_id' => $post->id,
                        'book_code' => $request->book_code[$i],
                        'book_publisher' => $request->book_publisher[$i],
                        'book_yearpublication' => $request->book_yearpublication[$i],
                        'book_size' => $request->book_size[$i],
                        'book_numberpages' => $request->book_numberpages[$i],
                        'book_warehouse' => $request->book_warehouse[$i],
                        'book_status' => $request->book_status[$i],
                        'created_at' => time(),
                    ]);
                }
                if($arrInsert){
                    $arrInsert->save();
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit($id) {
        $query = $this->model->where('id', $id)
            ->with('category')
            ->with('bookVersion');
        return $query->firstOrFail();
    }

    public function update($params, $request, $id) {
        $post = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            $params['slug'] = Str::slug($params['name'], '-');
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $post->fill($params);
            $post->save();

            //Hiện trạng các bản sách
            BookVersion::where('posts_id', $id)->delete();
            $total = $request['book_code'];
            $arrInsert = [];
            for($i = 0; $i < count($total); $i++){
                if(isset($request->book_code[$i])){
                    $arrInsert = new BookVersion([
                        'posts_id'=> $post->id,
                        'book_code'=> $request->book_code[$i],
                        'book_publisher'=> $request->book_publisher[$i],
                        'book_yearpublication'=> $request->book_yearpublication[$i],
                        'book_size'=> $request->book_size[$i],
                        'book_numberpages'=> $request->book_numberpages[$i],
                        'book_warehouse'=> $request->book_warehouse[$i],
                        'book_status'=> $request->book_status[$i],
                        'updated_at'=> time(),
                    ]);
                }
                if($arrInsert){
                    $arrInsert->save();
                }
            }

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

    public function getParent($params) {
        $query = $this->model->where('status', 1);
        if (isset($params['name'])) {
            $name = $params['name'];
            $query->where('name', 'like', "%$name%");
        }
        if (isset($params['self_id'])) {
            $query->where('id', '!=', $params['self_id']);
        }
        return $query->get();
    }

    public function getAllExceptSelf($id) {
        return $this->model->where('id', '!=', $id)->where('status', 1)->get();
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

    public function getTag() {
        return Tag::where('status', 1)->get();
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
