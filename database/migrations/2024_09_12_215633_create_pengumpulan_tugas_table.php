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
    Schema::create('pengumpulan_tugas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('guru_tugas_id')->constrained('guru_tugas')->onDelete('cascade'); // relasi ke tugas
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // relasi ke user/siswa yang submit
        $table->string('media_type'); // 'file' atau 'url'
        $table->string('judul'); // judul tugas
        $table->string('siswa_file')->nullable(); // path file kalau ada
        $table->string('siswa_url')->nullable(); // link kalau ada
        $table->string('status_siswa')->default('belum diserahkan'); // default: belum diserahkan
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulan_tugas');
    }
};
