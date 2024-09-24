<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('kelas'); // Nama kelas
            $table->integer('point')->nullable(); // Point, bisa null
            $table->string('topik'); // Topik tugas
            $table->text('deskripsi'); // Deskripsi tugas
            $table->string('file')->nullable(); // File yang di-upload, nullable
            $table->date('tengat'); // Tenggat waktu tugas
            $table->timestamps(); // Timestamps (created_at & updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru_tugas');
    }
}
