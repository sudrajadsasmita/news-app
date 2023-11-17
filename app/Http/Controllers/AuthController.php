<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('pages.auth.login');
    }

    public function actionLogin(LoginRequest $request)
    {
        $validData = $request->validated();

        $data = [
            'email' => $validData["login-email"],
            'password' => $validData["login-password"]
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            Session::flash('error', 'Terjadi kesalahan: Login atau authentikasi gagal');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('pages.auth.register');
    }
}
