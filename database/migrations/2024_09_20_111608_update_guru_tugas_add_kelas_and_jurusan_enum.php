<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGuruTugasAddKelasAndJurusanEnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guru_tugas', function (Blueprint $table) {
            
            // Menambahkan kolom kelas dengan enum baru
            $table->enum('kelas', ['X', 'XI', 'XII'])->after('id')->nullable(false);
            
            // Menambahkan kolom jurusan dengan enum
            $table->enum('jurusan', ['RPL', 'MM', 'DKV', 'OTKP', 'PM', 'AKL', 'TBS'])->after('kelas')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guru_tugas', function (Blueprint $table) {
            // Kembalikan perubahan dengan menghapus kolom yang baru ditambahkan
            
            // Kembalikan kolom kelas yang lama (sesuai dengan tipe sebelumnya)
            $table->string('kelas')->nullable(false);
        });
    }
}
