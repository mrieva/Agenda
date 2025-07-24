<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToMediaTypeInPengumpulanTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengumpulan_tugas', function (Blueprint $table) {
            // Mengubah kolom 'media_type' untuk memberikan default value
            $table->string('media_type')->default('file')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengumpulan_tugas', function (Blueprint $table) {
            // Mengembalikan perubahan jika diperlukan
            $table->string('media_type')->nullable()->change();
        });
    }
}
