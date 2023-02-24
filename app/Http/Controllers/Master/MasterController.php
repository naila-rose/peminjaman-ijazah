<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class MasterController extends Controller
{
    public function index()
    {
        $studentData = '';
        return view('user.master', compact('studentData'));
    }

    public function checkNim(Request $request)
    {
        $studentData = Student::where('nim', $request->nim)->first();
        return view('user.master', compact('studentData'));
    }

    public function afterCheckNIM(Request $request)
    {
        return view('user.second');
    }

    public function dataPeminjam(Request $request)
    {
        session()->put('peminjam', $request->except('_token'));
        return view('user.tri');
    }

    public function save(Request $request)
    {
        
    }
}

