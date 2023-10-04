<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Viewer\UserLoginRequest;
use App\Http\Requests\Viewer\UserRegistierRequest;
use App\Repositories\Viewer\UserRepository;
use Illuminate\Http\Request;

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
        return view('viewer.pages.login');
    }

    public function login(UserLoginRequest $request) {
        return $this->repository->login($request);
    }
}
