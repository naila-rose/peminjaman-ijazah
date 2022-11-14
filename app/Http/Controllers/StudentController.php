<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
    public function store(StudentCreateRequest $request)
    {
        // $validatedData = $request->validate([
        //     'nim' => 'required|unique:students|max:15',
        //     // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'id_fakultas' => 'required',
        //     'id_prodi' => 'required',
        //     'gender' => 'required',
        //     'hubungan' => 'required',
        //     'tgl_pinjam' => 'required',
        //     'tgl_kembali' => 'required',
        //     'status' => 'required'
        // ]);

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

        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $imageName = time().'.'.$request->image->extension();

        // $request->image->move(public_path('images'), $imageName);

        // /*
        //     Write Code Here for
        //     Store $imageName name in DATABASE from HERE
        // */

        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('image',$imageName);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/image', $image->hashName());

        if($person){
            Session::flash('status', 'success');
            Session::flash('message', 'Data Berhasil Disimpan');
        }

        // return redirect('/student')->with('success', 'Data Berhasil Disimpan');
        return redirect('/student');
    }

    public function update(Request $request, Student $student)
    {
        $rules = [
            // 'nim' => 'required|unique:students|max:15',
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

        Student::where('id', $student->id)
               ->update($validatedData);
        // $student = Student::findOrfail($id);
        // $student->update($request->all());
        if($student){
            Session::flash('status', 'success');
            Session::flash('message', 'Data Berhasil Diupdate');
        }

        //check if image is uploaded
        // if ($request->hasFile('image')) {

            //upload new image
            // $image = $request->file('image');
            // $image->storeAs('public/image', $image->hashName());

            //delete old image
            // Storage::delete('public/image/'.$request->image);

            //update post with new image
            // $request->update([
            //     'image'     => $image->hashName(),
            //     'title'     => $request->title,
            //     'content'   => $request->content
            // ]);

        // } else {

            //update post without image
            // $request->update([
            //     'title'     => $request->title,
            //     'content'   => $request->content
            // ]);
        // }

        return redirect('/student');
    }

    public function destroy($id)
    {
        $deleteStudent = Student::destroy(($id));
        if($deleteStudent){
            Session::flash('status', 'success');
            Session::flash('message', 'Hapus Data Berhasil');
        }
        return redirect('/student');
    }
}
