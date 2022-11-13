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
        $student = Student::with('person','fakultas','prodi')->get();
        return view('admin.student', compact('student'));
    }
    public function edit($id)
    {
        $student = Student::where('id_peminjam', $id)->first();
        return view('admin.edit', compact('student'));
    }
    public function create(Request $request)
    {
        $item = Student::with('person','fakultas','prodi')->get();
        return view('admin.add', compact('item'));

    }
    public function store(Request $request)
    {
        // $newname - '';

        // if($request->file('image')){
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
        //     return $request->file('image')->storeAs('image', $newName);
        // };

        // $request['image'] = $newName;
        // $student = Student::create($request->all());
        // $person = Person::create($request->all());
        // $item = new Student;
        // $item->nim = $request->nim;
        // $item->nama = $request->nama;
        // $item->id_fakultas = $request->id_fakultas;
        // $item->id_prodi = $request->id_prodi;
        // $item2 =new Person;
        // $item2->nama_peminjam = $request->nama_peminjam;
        // $item2->no_telp = $request->no_telp;
        // $item2->status = $request->status;
        // $item2->hubungan = $request->hubungan;
        // $item2->tgl_pinjam = $request->tgl_pinjam;
        // $item2->tgl_kembali = $request->tgl_kembali;
        // $item->save();
        // $item2->save();
        Student::updateOrCreate(['id_peminjam' => $this->id], [
            'nim' => $this->nim,
            'nama' => $this->nama,
            'id_fakultas' => $this->id_fakultas,
            'id_prodi' => $this->id_prodi,
        ]);
        Person::updateOrCreate(['id' => $this->id], [
            'id_peminjam' => $this->id,
            'nama_peminjam' => $this->nama_peminjam,
            'no_telp' => $this->no_telp,
            'status' => $this->status,
            'hubungan' => $this->hubungan,
            'tgl_pinjam' => $this->tgl_pinjam,
            'tgl_kembali' => $this->tgl_kembali,
        ]);



        // $image = $request->file('image');
        // $image->storeAs('public/image', $image->hashName());

        // return redirect('/student')->with(['success' => 'Data Berhasil Disimpan']);

        dd($request->all());
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
        // return redirect('/student')->with(['success' => 'Hapus Data Berhasil']);
    }
}
