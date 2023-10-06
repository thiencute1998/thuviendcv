<?php

namespace App\Repositories\Viewer;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserRepository extends BaseRepository {
    public function model()
    {
        return User::class;
    }

    public function register($params) {
        $user = $this->model;
        $params['active'] = 0;
        $params['role'] = 2;
        $params['password'] = Hash::make($params['password']);
        $user->fill($params);
        $user->save();
    }

    public function login($request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (\auth()->user()->active == 1) {
                return redirect("/")->with('user-is-active', '1');
            }  else {
                Auth::logout();
                return redirect("login")->with('user-not-active', '1');
            }
        }

        return redirect("login")->with('user-login-fail', 'Wrong email or password');
    }
}
