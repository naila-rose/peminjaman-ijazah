<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('no_ijazah', 15)->after('nama');
        });
    }

    public function down()
    {
        Schema::table('student', function (Blueprint $table) {
            $table->dropColumn('no_ijazah');
            
        });
    }
};