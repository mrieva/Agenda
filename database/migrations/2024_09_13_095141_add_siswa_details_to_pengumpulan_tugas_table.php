<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSiswaDetailsToPengumpulanTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengumpulan_tugas', function (Blueprint $table) {
            $table->string('nama_siswa')->after('user_id'); // Kolom nama siswa
            $table->string('kelas_siswa')->after('nama_siswa'); // Kolom kelas siswa
            $table->string('jurusan_siswa')->after('kelas_siswa'); // Kolom jurusan siswa
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengumpulan_tugas', function (Blueprint $table) {
            $table->dropColumn('nama_siswa');
            $table->dropColumn('kelas_siswa');
            $table->dropColumn('jurusan_siswa');
        });
    }
}
