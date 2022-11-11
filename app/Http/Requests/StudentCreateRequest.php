<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nim' => 'required|unique:students|max:15',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fakultas' => 'required',
            'prodi' => 'required',
            'gender' => 'required',
            'hubungan' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required'
        ];
    }

    public function attributes()
    {
        return[
            'prodi' => 'program studi'
        ];
    }

    public function messages()
    {
        return[
            'nim.required' => 'NIM wajib diisi',
            'nim.max' => 'NIM maksimal :max karakter',
            'image.required' => 'Tidak dapat memuat file',
            'image.max' => 'Upload gambar maksimal 2MB'
        ];
    }
}
