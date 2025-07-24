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
            $table->string('nama_guru')->after('id'); // letakkan setelah kolom 'id'
        });
    }

    public function down()
    {
        Schema::table('guru_tugas', function (Blueprint $table) {
            $table->dropColumn('nama_guru');
        });
    }
};
