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

    public function register(Request $request)
    {
        $request->validate([
            'nip'           => 'required|max 20',
            'nama_pegawai'  => 'required|max 100',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:5|max:255'
        ]);

        $employee = new Employee([
            'nip'           => $request->nip,
            'nama_pegawai'  => $request->nama_pegawai,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);
        $employee->save();

        if ($employee) {
            Session::flash('status', 'success');
            Session::flash('message', 'Registrasi berhasil. Silahkan login!');
        }

        return redirect()->route('login');
    }
    // public function index()
    // {
    //     return view('admin.register');
    // }
    
    // public function register(Request $request)
    // {
    //     $pegawai = Employee::create([
    //         'nip'           => $request->nip,
    //         'nama_pegawai'  => $request->nama_pegawai,
    //         'email'         => $request->email,
    //         'password'      => $request->password_hash
    //     ]);

    //     $validatedData = $request->validate([
    //         'nip'           => 'required|max 20',
    //         'nama_pegawai'  => 'required|max 100',
    //         'email'         => 'required|email|unique:register',
    //         'password'      => 'required|min:5|max:255'
    //     ]);

    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     Employee::create($validatedData);
    //     if($pegawai){
    //         Session::flash('status', 'success');
    //         Session::flash('message', 'Registrasi anda telah berhasil. Silahkan login!!');
    //     }
    //     return redirect('login');
    // }
}
