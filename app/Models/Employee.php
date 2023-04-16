<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = false;
    protected $primarykey = 'id';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama_pegawai',
        'password',
        'role',
    ];
}