<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // Employee::create([
        //     'nip'            => $request->nip,
        //     'nama_pegawai'   => $request->nama_pegawai,
        //     'email'          => $request->email,
        //     'password'       => $request->password,
        // ]);

        return view('admin.login');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'nip'       => ['required'],
            'password'  => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin.index');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function __invoke(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
