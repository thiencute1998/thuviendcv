<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Viewer\UserLoginRequest;
use App\Http\Requests\Viewer\UserRegistierRequest;
use App\Repositories\Viewer\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getRegister() {
        return view('viewer.pages.register');
    }

    public function register(UserRegistierRequest $request) {
        $this->repository->register($request->only('name', 'surname', 'email', 'password', 'code', 'phone'));
        return redirect("login")->with('user-wait-active', '1');
    }

    public function getLogin() {
        if (Auth::check()) {
            return redirect()->route('index');
        }
        return view('viewer.pages.login');
    }

    public function login(UserLoginRequest $request) {
        return $this->repository->login($request);
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('get-login-user');
    }

    public function editPassword() {
        return $this->repository->editPassword();
    }

    public function updatePassword(Request $request) {
        //Validate form
        $validator = \Validator::make($request->all(),[
            'password'=>[
                'required', function($attribute, $value, $fail){
                    if( !\Hash::check($value, auth()->user()->password) ){
                        return $fail(__('Mật khẩu hiện tại không đúng!!!'));
                    }
                },
                'max:30'
            ],
            'new_password'=>'required|max:30',
            'password_confirm'=>'required|same:new_password'
        ],[
            'password_confirm.same' => 'Xác nhận mật khẩu không khớp!!!'
        ]);

        if( !$validator->passes() ){
            return response()->json(['error'=>$validator->errors()->toArray()], 422);
        }else{
            return $this->repository->updatePassword($request->all());
        }
    }
}
