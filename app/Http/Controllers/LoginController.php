<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
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

        if(Auth::attempt($infologin)){
            return redirect('/dashboard');
        }else{
            return redirect('/')->withErrors('Username atau Password Salah!');
        }
    }

    public function reg()
    {
        return view('regis');
    }

    public function regisProses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'pw' => 'required|min:8|max:10',
            'confirm' => 'required|min:8|max:10',
        ],[
            'username.required' => 'Input Username!',
            'nama.required' => 'Input Nama!',
            'pw.required' => 'Input Password!',
            'confirm.required' => 'Input Password Sekali Lagi!',
        ]);

        $admin = new Petugas();
        $user = new User();

        if ($request->pw === $request->confirm) {
            $admin->username = $request->username;
            $admin->nama_petugas = $request->nama;
            $admin->password = bcrypt($request->pw);
            $admin->level = "Admin";
            $admin->save();

            $user->username = $request->username;
            $user->name = $request->nama;
            $user->password = bcrypt($request->pw);
            $user->level = "Admin";
            $user->save();

            return redirect('/');
            // dd($user);
        }else{
            return back()->with('error', 'Password Tidak Sama!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
