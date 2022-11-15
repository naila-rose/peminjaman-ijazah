<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StudentCreateRequest;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::orderBy('id', 'asc')->with('person','fakultas','prodi')->get();
        return view('admin.student', compact('student'));
    }
    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        return view('admin.edit', compact('student'));
    }
    public function create(Request $request)
    {
        $item = Student::with('person','fakultas','prodi')->get();
        return view('admin.add', compact('item'));

    }
    public function store(Request $request)
    {
        $person = Person::create([
            'nama_peminjam' => $request->nama_peminjam,
            'no_telp'       => $request->no_telp,
            'status'        => $request->status,
            'hubungan'      => $request->hubungan,
            'tgl_pinjam'    => $request->tgl_pinjam,
            'tgl_kembali'   => $request->tgl_kembali,
            'ket'           => $request->ket,
        ]);

        Student::create([
            'nim'           => $request->nim,
            'nama'          => $request->nama,
            'id_fakultas'   => $request->id_fakultas,
            'id_prodi'      => $request->id_prodi,
            'id_person'     => $person->id,
            'gender'        => $request->gender,
            'alamat'        => $request->alamat,
        ]);

        if($person){
            Session::flash('status', 'success');
            Session::flash('message', 'Data Berhasil Disimpan');
        }

        return redirect('/student');
    }

    public function update(Request $request, Student $student)
    {
        $rules = [
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_fakultas' => 'required',
            'id_prodi' => 'required',
            'gender' => 'required',
            'hubungan' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required'
        ];

        if($request->nim != $student->nim){
            $rules['nim'] = 'required|unique:students|max:15';
        }

        $validatedData = $request->validate($rules);

        $validatedData['id'] = auth()->user()->id;

        Student::where('id', $student->id)
               ->update($validatedData);

        if($student){
            Session::flash('status', 'success');
            Session::flash('message', 'Data Berhasil Diupdate');
        }

        return redirect('/student');
    }

    public function destroy($id)
    {
        $deleteStudent = Student::findOrFail($id);
        $idPerson      = $deleteStudent->id_person;
        $deleteStudent->delete();
        $deletePerson  = Person::destroy($idPerson);

        if($deletePerson){
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil');
        }
        return redirect('/student');
    }
}

// update -> belum bisa
