<?php

namespace App\Http\Controllers;

use Alert;
use Exception;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all()->where('id', '!=', auth()->user()->id);
        return view('superadmin.index', compact('employees'));
    }

    public function create()
    {
        return view('superadmin.add');
    }

    public function store(EmployeeRequest $request)
    {

        $rules = [
                'password' => 'required|max:8',
            ];

        Validator::make($request->all(), $rules, $messages = 
            [
                'password.required' => 'password harus diisi',
                'password.max'      => 'maximal password adalah 8 karakter',
            ])->validate();

        try {

            Employee::create([
                'nama_pegawai' => $request->nama_pegawai,
                'password'     => bcrypt($request->password),
                'role'         => 'admin',
            ]);
            
            Session::flash('status', 'success');
            Session::flash('message', 'Data Berhasil Disimpan');
            return redirect('/admin');
        }catch(Exception $e){
            Alert::error('Maaf', 'Terjadi Kesalahan');
            return redirect()->back();
        }
    }
    
    public function edit($id)
    {
        $employee = Employee::where('id', $id)->first();
        if(!$employee){
            Alert::error('Maaf', 'Terjadi Kesalahan');
            return redirect()->back();
        }
        
        return view('superadmin.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        if($request->password){
            $rules = [
                'password'     => 'max:8',
            ];

            Validator::make($request->all(), $rules, $messages = 
                [
                    'password.max' => 'maximal password adalah 8 karakter',
                ])->validate();
        }
        
        try {

            $employee = Employee::where('id', $id)->first();
            if(!$employee){
                Alert::error('Maaf', 'Terjadi Kesalahan');
                return redirect()->back();
            }

            $updateData = ['nama_pegawai' => $request->nama_pegawai];
            if($request->password) $updateData['password'] = bcrypt($request->password);

            $employee->update($updateData);
            
            Session::flash('status', 'success');
            Session::flash('message', 'Data Berhasil Diupdate');
            return redirect('/admin');
        }catch(Exception $e){
            Alert::error('Maaf', 'Terjadi Kesalahan');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {

            $employee = Employee::where('id', $id)->first();
            if(!$employee){
                Alert::error('Maaf', 'Terjadi Kesalahan');
                return redirect()->back();
            }

            $employee->delete();
            
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil');
            return redirect('/admin');
        }catch(Exception $e){
            Alert::error('Maaf', 'Terjadi Kesalahan');
            return redirect()->back();
        }
    }
}