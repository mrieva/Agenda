<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('guru_tugas', function (Blueprint $table) {
            $table->unsignedBigInteger('guru_id')->after('nama_guru')->nullable(); // Menggunakan nullable jika ada tugas tanpa guru
        });
    }

    public function down()
    {
        Schema::table('guru_tugas', function (Blueprint $table) {
            $table->dropColumn('guru_id');
        });
    }

};
