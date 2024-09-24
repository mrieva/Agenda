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
    Schema::table('pengumpulan_tugas', function (Blueprint $table) {
        $table->enum('status', ['diperiksa', 'belum diperiksa'])->default('belum diperiksa');
        $table->integer('nilai')->nullable();
    });
}

public function down()
{
    Schema::table('pengumpulan_tugas', function (Blueprint $table) {
        $table->dropColumn(['status', 'nilai']);
    });
}

};
