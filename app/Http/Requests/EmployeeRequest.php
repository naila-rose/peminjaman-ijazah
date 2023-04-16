<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pegawai' => 'required|max:150',
        ];
    }

    public function messages()
    {
        return [
            'nama_pegawai.required' => 'nama pegawai harus diisi',
            'nama_pegawai.max'      => 'maximal nama pegawai adalah 150 karakter',
        ];
    }
}