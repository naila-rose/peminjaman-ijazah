<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        Employee::create([
            'nip'            => $request->nip,
            'nama_pegawai'   => $request->nama_pegawai,
            'email'          => $request->email,
            'password'       => $request->password,
        ]);

        return view('admin.login');
    }
}
