<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //
    private $repository;
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        //$searchParams = $request->only('search');
        $searchParams = $request->all();
        return $this->repository->index($searchParams);
    }

    public function create() {
        $dfpost =['content'=>'
            <table class="gt-content">
                <tr>
                    <td class="reg-content">Tác giả: </td>
                    <td></td>
                </tr>
                 <tr>
                    <td class="reg-content">Ký hiệu tác giả: </td>
                    <td> </td>
                </tr>
                <tr>
                    <td class="reg-content">Dịch giả: </td>
                    <td></td>
                </tr>
                <tr>
                   <td class="reg-content">DDC: </td>
                   <td></td>
                </tr>
                <tr>
                    <td class="reg-content">Ngôn ngữ: </td>
                    <td>Việt</td>
                </tr>
                <tr>
                    <td class="reg-content">Số cuốn: </td>
                    <td></td>
                </tr>
           </table>
        ', 'book_number' => '1'];
        return view('admin.pages.post.create', compact('dfpost'));
    }

    public function store(Request $request) {
        $params = $request->only('name', 'image', 'category', 'content', 'status', 'category_id', 'title', 'keywords', 'description', 'bookcontents', 'book_subtitle', 'book_author', 'book_authorsymbol', 'category_name', 'book_language', 'book_number', 'book_episode');
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Thêm bài viết thành công !!!');
    }

    public function edit($id) {
        $post = $this->repository->edit($id);
        return view('admin.pages.post.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('name', 'image', 'category', 'content', 'status', 'category_id', 'title', 'keywords', 'description', 'bookcontents', 'book_subtitle', 'book_author', 'book_authorsymbol', 'category_name', 'book_language', 'book_number', 'book_episode');
        $this->repository->update($params, $request, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật bài viết thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa bài viết thành công !!!');
    }

    public function getParent(Request $request) {
        $params = $request->only('name', 'self_id');
        $data = $this->repository->getParent($params);
        return response()->json($data);
    }

    public function ckeditorUpload(Request $request) {
        return $this->repository->ckeditorUpload($request);
    }
}
