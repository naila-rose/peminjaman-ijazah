<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam', 150);
            $table->string('no_telp', 50);
            $table->string('hubungan', 50);
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->string('image', 255)->nullable();
            $table->string('status', 50);
            $table->string('ket', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
};
