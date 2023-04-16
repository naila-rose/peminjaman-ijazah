<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->text('file')->after('image');
            $table->enum('type', ['ambil', 'pinjam'])->after('status');
        });
    }

    public function down()
    {
        Schema::table('persons', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('file');
        });
    }
};