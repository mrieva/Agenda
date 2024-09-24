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
        $table->enum('jurusan', ['RPL 1', 'RPL 2', 'MM', 'DKV 1', 'DKV 2', 'OTKP 1', 'OTKP 2', 'OTKP 3', 'PM 1', 'PM 2', 'PM 3', 'AKL 1', 'AKL 2', 'TBS 1', 'TBS 2'])->nullable()->after('kelas');
    });
}

public function down()
{
    Schema::table('guru_tugas', function (Blueprint $table) {
        $table->dropColumn('jurusan');
    });
}

};
