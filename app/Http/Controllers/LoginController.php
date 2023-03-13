<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loginProses(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'Input Username!',
            'password.required' => 'Input Password!',
        ]);

        $infologin = [ 
            'username' => $request->username,
            'password' => $request->password,
        ];

        // dd($infologin);

        if(Auth::attempt($infologin)){
            return redirect('/dashboard');
        }else{
            return redirect('/')->withErrors('Username atau Password Salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
