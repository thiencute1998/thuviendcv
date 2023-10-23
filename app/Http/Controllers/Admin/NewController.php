<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\NewRepository;
use Illuminate\Http\Request;

class NewController extends Controller
{
    //
    private $repository;
    public function __construct(NewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        //$searchParams = $request->only('search');
        $searchParams = $request->all();
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.new.create');
    }

    public function store(Request $request) {
        $params = $request->only('slug','name', 'image', 'new_type', 'content', 'status', 'title', 'keywords', 'description', 'order');
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Thêm tin thành công !!!');
    }

    public function edit($id) {
        $new = $this->repository->edit($id);
        return view('admin.pages.new.edit', compact('new'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('slug','name', 'image', 'new_type', 'content', 'status', 'title', 'keywords', 'description', 'order');
        $this->repository->update($params, $request, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật tin thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa tin thành công !!!');
    }
    public function ckeditorUpload(Request $request) {
        return $this->repository->ckeditorUpload($request);
    }
}
