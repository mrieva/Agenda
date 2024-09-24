<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('nisn')->unique();
            $table->string('password');
            $table->enum('role', ['siswa', 'sekretaris', 'guru', 'kepala_sekolah']); // Enum role
            $table->enum('kelas', ['X', 'XI', 'XII'])->nullable(); // Optional for siswa/sekretaris
            $table->enum('jurusan', ['RPL', 'MM', 'DKV', 'OTKP', 'PM'])->nullable(); // Optional for siswa/sekretaris
            $table->string('mapel')->nullable(); // Optional for guru
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
        Schema::dropIfExists('users');
    }
}
