<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip'           => 'required|max 20',
            'nama_pegawai'  => 'required|max 100',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:5|max:255'
        ]);

        dd('Registrasi Berhasil');
    }
}
