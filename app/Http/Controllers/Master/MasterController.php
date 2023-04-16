<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function index()
    {
        $studentData = '';
        $status      = [];
        return view('user.master', compact('studentData', 'status'));
    }

    public function secondPage(Request $request)
    {
        $request->session()->put('nim', $request['nim']);
        
        return view('user.second');
    }

    public function checkNim(Request $request)
    {

        $status = [];
        
        $studentData = Student::where('nim', $request->nim)->first();
        
        if(!$request->nim) :
            
            $status['info'] = 'Maaf, masukkan NIM terlebih dahulu';
            return view('user.master', compact('studentData', 'status'));
        endif;
        
        if (!$studentData) $status['info'] = 'Maaf, NIM tidak ditemukan';
        elseif (!$studentData->no_ijazah) $status['no_ijazah'] = 'Ijazah masih dalam proses';

        return view('user.master', compact('studentData', 'status'));
    }

    public function afterCheckNIM(Request $request)
    {
        return view('user.second');
    }
    
    public function dataPeminjam(Request $request)
    {
        $rules = [
                'nama_peminjam' => 'required',
                'no_telp'       => 'required|numeric',
                'hubungan'      => 'required',
                'type'          => 'required',
            ];

        Validator::make($request->all(), $rules, $messages = 
            [
                'nama_peminjam.required' => 'nama peminjam harus diisi',
                'no_telp.required'       => 'nomor telepon peminjam harus diisi',
                'no_telp.numeric'        => 'nomor telepon peminjam harus berupa angka',
                'hubungan.required'      => 'hubungan peminjam harus dipilih',
                'type.required'          => 'tipe peminjam harus dipilih',
            ])->validate();

        $request->session()->put('nama_peminjam', $request['nama_peminjam']);
        $request->session()->put('no_telp', $request['no_telp']);
        $request->session()->put('hubungan', $request['hubungan']);
        $request->session()->put('type', $request['type']);
        $request->session()->put('surat_kuasa', $request['surat_kuasa']);
        
        return view('user.tri');
    }

    public function afterInputData(Request $request)
    {
        return view('user.tri');
    }

    public function store(Request $request)
    {
        $rules = [
                'image' => 'required',
            ];

        Validator::make($request->all(), $rules, $messages = 
            [
                'image.required' => 'Silahkan foto terlebih dahulu',
            ])->validate();

        $img            = $request->image;
        $folderPath     = "public/uploads/images/";

        $image_parts    = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type     = $image_type_aux[1];

        $image_base64   = base64_decode($image_parts[1]);
        $fileName       = time() . '.jpg';

        $file           = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        
        // untuk lihat gambar, cek peminjaman-ijazah-main/storage/app/uploads
        $person = Person::create([
            'nama_peminjam' => request()->session()->get('nama_peminjam'),
            'no_telp'       => request()->session()->get('no_telp'),
            'hubungan'      => request()->session()->get('hubungan'),
            'type'          => request()->session()->get('type'),
            'surat_kuasa'   => request()->session()->get('surat_kuasa'),
            'tgl_pinjam'    => Carbon::now()->format('Y-m-d'),
            'tgl_kembali'   => NULL,
            'ket'           => '',
            'image'         => $fileName,
            'status'        => 'Pending',
        ]);

        Student::where('nim', request()->session()->get('nim'))->update(['id_person' => $person->id]);

        $request->session()->flush();

        return view('user.submit');
    }
}