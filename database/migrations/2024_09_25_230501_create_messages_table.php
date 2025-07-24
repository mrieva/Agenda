<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tugas_id')->unsigned();
            $table->bigInteger('guru_id')->unsigned();
            $table->bigInteger('siswa_id')->unsigned();
            $table->text('message_content');
            $table->timestamps();
            $table->enum('kelas', ['X', 'XI', 'XII'])->nullable();
            $table->enum('jurusan', ['RPL 1', 'RPL 2', 'DKV 1', 'DKV 2', 'MM', 'AKL 1', 'AKL 2', 'TBS 1', 'TBS 2', 'OTKP 1', 'OTKP 2', 'OTKP 3', 'PM 1', 'PM 2', 'PM 3'])->nullable();

            // Tambahkan foreign key untuk relasi ke tabel guru_tugas
            $table->foreign('tugas_id')->references('id')->on('guru_tugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

