<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\CreateUserRequest;
use App\Http\Requests\Admin\Admin\EditUserRequest;
use App\Repositories\Admin\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    private $repository;
    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.admin.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'email', 'password');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Add user success !!!');
    }

    public function edit($id) {
        $user = $this->repository->edit($id);
        return view('admin.pages.admin.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('name', 'email');
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Edit user success !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Delete success !!!');
    }

    public function editPassword() {
        return $this->repository->editPassword();
    }

    public function updatePassword(Request $request) {
        //Validate form
        $validator = \Validator::make($request->all(),[
            'password'=>[
                'required', function($attribute, $value, $fail){
                    if( !\Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'max:30'
            ],
            'newPassword'=>'required|max:30',
            'confirmNewPassword'=>'required|same:newPassword'
        ]);

        if( !$validator->passes() ){
            return response()->json(['error'=>$validator->errors()->toArray()], 422);
        }else{
            return $this->repository->updatePassword($request->all());
        }
    }
}
