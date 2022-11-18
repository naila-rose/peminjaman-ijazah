<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('admin.register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'nip'           => 'required|max 20',
            'nama_pegawai'  => 'required|max 100',
            'email'         => 'required|email|unique:register',
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
            Session::flash('message', 'Registration berhasil. Silahkan login!');
        }

        return redirect()->route('login');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('admin.login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'nip'       => 'required',
            'password'  => 'required',
        ]);
        if (Auth::attempt(['nip' => $request->nip, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
