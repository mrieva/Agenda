<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehadiransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id(); // Auto-increment id
            $table->enum('role', ['siswa', 'guru']); // Enum for role
            $table->enum('keterangan', ['hadir', 'izin', 'sakit']); // Enum for keterangan
            $table->text('deskripsi')->nullable(); // Deskripsi
            $table->string('file')->nullable(); // File
            $table->timestamps(); // Created at and Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kehadirans');
    }
}
