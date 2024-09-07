<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KehadiranSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kehadirans')->insert([
            ['role' => 'guru', 'keterangan' => 'hadir', 'deskripsi' => 'Hadir pada tanggal 1', 'file' => 'file1.pdf'],
            ['role' => 'guru', 'keterangan' => 'izin', 'deskripsi' => 'Izin pada tanggal 2', 'file' => 'file2.pdf'],
            ['role' => 'guru', 'keterangan' => 'sakit', 'deskripsi' => 'Sakit pada tanggal 3', 'file' => 'file3.pdf'],
            ['role' => 'siswa', 'keterangan' => 'hadir', 'deskripsi' => 'Hadir pada tanggal 1', 'file' => 'file4.pdf'],
            ['role' => 'siswa', 'keterangan' => 'izin', 'deskripsi' => 'Izin pada tanggal 2', 'file' => 'file5.pdf'],
            ['role' => 'siswa', 'keterangan' => 'sakit', 'deskripsi' => 'Sakit pada tanggal 3', 'file' => 'file6.pdf'],
        ]);
    }
}
