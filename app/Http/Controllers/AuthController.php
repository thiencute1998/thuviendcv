<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function index() {
        if(Auth::guard('admin')->check()){
            return redirect('admin');
        }
        return view('admin.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin')
                ->withSuccess('Signed in');
        }

        return redirect()->route('login-index')->with('login-fail', 'Wrong email or password');
    }

    public function logout() {
        Auth::guard('admin')->logout();

        return redirect()->route('login-index');
    }
}
