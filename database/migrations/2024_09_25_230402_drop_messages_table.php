<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('messages');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tugas_id')->unsigned();
            $table->bigInteger('guru_id')->unsigned();
            $table->bigInteger('siswa_id')->unsigned();
            $table->text('message_content');
            $table->timestamps();
            $table->enum('kelas', ['X', 'XI', 'XII'])->nullable();
            $table->enum('jurusan', ['RPL1', 'RPL2', 'DKV1', 'DKV2', 'MM', 'AKL1', 'AKL2', 'TBS1', 'TBS2', 'OTKP1', 'OTKP2', 'OTKP3', 'PM1', 'PM2', 'PM3'])->nullable();
        });
    }
}

