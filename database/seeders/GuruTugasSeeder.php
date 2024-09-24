<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\GuruTugas;
use Faker\Factory as Faker;
use Carbon\Carbon;

class GuruTugasSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $namaGuruList = [
            'Budi Santoso', 'Siti Aminah', 'Andi Wijaya', 'Nurul Hidayah', 'Rudi Hartono'
        ];

        $kelas = ['XII'];
        $jurusan = ['RPL 1'];
        $status = ['belum diserahkan', 'diserahkan'];
        $files = [
            'materi_pemrograman.pdf',
            'tugas_desain_grafis.docx',
            'modul_multimedia.pptx'
        ];
        $urls = [
            'https://drive.google.com/file/d/123456789/view',
            'https://example.com/assignment/98765',
            'https://docs.google.com/document/d/abcxyz'
        ];

        // Generate 10 dummy tasks
        $topics = [
            'Membuat program sederhana dengan Python',
            'Membuat desain grafis dengan Adobe Photoshop',
            'Membuat modul multimedia dengan Adobe Premiere',
            'Membuat program login dengan PHP dan MySQL',
            'Membuat program CRUD dengan Laravel',
            'Membuat program machine learning dengan TensorFlow',
            'Membuat program Internet of Things (IoT) dengan ESP32',
            'Membuat program keamanan jaringan dengan Python',
            'Membuat program analisis data dengan Python dan Pandas',
            'Membuat program game dengan Unity'
        ];

        for ($i = 0; $i < 10; $i++) {
            DB::table('guru_tugas')->insert([
                'kelas' => $kelas[array_rand($kelas)],
                'jurusan' => $jurusan[array_rand($jurusan)],
                'topik' => $topics[$i],
                'deskripsi' => 'Berikut adalah deskripsi tugas ke-' . $i . ': "Pembuatan program sederhana dengan Python" adalah tugas yang diberikan kepada siswa untuk menguji kemampuan siswa dalam menggunakan bahasa pemrograman Python untuk membuat program yang sesuai dengan kebutuhan. Dalam tugas ini, siswa diharapkan untuk membuat program yang dapat melakukan operasi dasar seperti input, proses, dan output. Program tersebut harus dapat dijalankan dengan menggunakan Python versi lebih dari 3.x. ',
                'file' => rand(0, 1) ? $files[array_rand($files)] : null,
                'url' => rand(0, 1) ? $urls[array_rand($urls)] : null,
                'tengat' => Carbon::now()->addDays(rand(1, 14)), // Tenggat waktu antara 1 hingga 14 hari ke depan
                'status' => $status[0], // Default 'belum diserahkan'
                'ketentuan' => 'Tugas ini wajib diserahkan sebelum tenggat waktu yang ditentukan. File yang diunggah harus berformat PDF atau DOCX. Jika tugas ini tidak diserahkan sebelum tenggat waktu, maka akan dianggap gagal. Oleh karena itu, pastikan Anda untuk menyerahkan tugas ini sebelum tenggat waktu yang ditentukan. Pastikan Anda juga untuk menyerahkan tugas ini dengan format yang sesuai dan jangan lupa untuk memperbarui status tugas menjadi "sudah diserahkan" setelah Anda menyerahkan tugas ini.',
                'created_at' => now(),
                'updated_at' => now(),
                'nama_guru' => $faker->randomElement($namaGuruList),
            ]);
        }
    }
}
