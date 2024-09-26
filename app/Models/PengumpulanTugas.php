<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumpulanTugas extends Model
{
    use HasFactory;

    protected $table = 'pengumpulan_tugas'; // Pastikan tabelnya benar

    protected $fillable = [
        'guru_tugas_id',
        'user_id',
        'status_siswa',
        'siswa_url',
        'judul',
        'siswa_file',
        'nama_siswa',    // Field untuk nama siswa
        'kelas_siswa',   // Field untuk kelas siswa
        'jurusan_siswa', // Field untuk jurusan siswa
        'media_type',    // Pastikan media_type bisa menyimpan 'file' atau 'url'
        'status',
        'nilai',
    ];

    public function guruTugas()
    {
        return $this->belongsTo(GuruTugas::class, 'guru_tugas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Pastikan 'user_id' adalah foreign key yang benar
    }

    public function komentar()
    {
        return $this->hasMany(Comment::class, 'guru_tugas_id');
    }

}
