<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Prodi;
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

        return redirect('/student');
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
        return view('admin.delete', ['student' => $student]);
    }
    public function destroy($id)
    {
        $deleteStudent = Student::findOrfail($id);
        $deleteStudent->delete();
        return redirect('/student')->with(['success' => 'Hapus Data Berhasil']);
    }
}
