<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.register');
    }
    public function create(Request $request)
    {
        $data = Employee::select('id','nama_pegawai')->get();
        return view('admin.register', compact('data'));
    }
    public function store(Request $request)
    {
        $pegawai = Employee::create([
            'nip'           => $request->nip,
            'nama_pegawai'  => $request->nama_pegawai,
            'email'         => $request->email,
            'password'      => $request->password_hash
        ]);

        $validatedData = $request->validate([
            'nip'           => 'required|max 20',
            'nama_pegawai'  => 'required|max 100',
            'email'         => 'required|email|unique:users',
            'password'      => ['required', 'min:5', 'max:255']
        ]);

    $validatedData['password'] = Hash::make($validatedData['password']);

        Employee::create($validatedData);
        if($pegawai){
            Session::flash('status', 'success');
            Session::flash('message', 'Registrasi anda telah berhasil. Silahkan login!!');
        }
        return redirect('login');
    }
}
