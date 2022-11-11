<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::with('person','fakultas','prodi')->get();
        return view('validasi.student', compact('student'));
    }
    public function edit($id)
    {
        $student = Student::where('id_peminjam', $id)->first();
        return view('validasi.edit', compact('student'));
    }
    public function create()
    {
        $item = Student::with('person','fakultas','prodi')->get();
        return view('validasi.add', compact('item'));
    }
    public function store(StudentCreateRequest $request)
    {
        // $newname - '';

        // if($request->file('image')){
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
        //     return $request->file('image')->storeAs('image', $newName);
        // };

        // $request['image'] = $newName;
        $student = Student::create($request->all());

        $image = $request->file('image');
        $image->storeAs('public/image', $image->hashName());

        return redirect('/student')->with(['success' => 'Data Berhasil Disimpan']);

    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrfail($id);
        $student->update($request->all());
        return redirect('/student');
    }
    public function delete($id)
    {
        $student = Student::findOrfail($id);
        return view('validasi.delete', ['student' => $student]);
    }
    public function destroy($id)
    {
        $deleteStudent = Student::findOrfail($id);
        $deleteStudent->delete(); 
        // return redirect('/student')->with(['success' => 'Hapus Data Berhasil']);
    }
}
