<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id_peminjam',
        'nim',
        'nama',
        'fakultas',
        'prodi',
        'gender',
        'alamat',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_peminjam', 'id');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas', 'id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id');
    }
}

