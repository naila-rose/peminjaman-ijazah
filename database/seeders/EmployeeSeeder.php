<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Employee::factory(5)->create();

        \App\Models\Employee::create([
            'nama_pegawai'  => 'superadmin',
            'password'      => bcrypt('rahasiasuper'),
            'role'          => 'superadmin',
        ]);
    }
}