<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruTugas extends Model
{
    use HasFactory;

    protected $table = 'guru_tugas'; // Nama tabel yang sesuai dengan migration

    protected $fillable = ['kelas', 'jurusan', 'topik', 'deskripsi', 'file', 'tengat', 'status', 'url', 'ketentuan', 'nama_guru', 'id_guru'];

    public function pengumpulanTugas()
    {
        return $this->hasMany(PengumpulanTugas::class, 'guru_tugas_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id'); // Ganti 'user_id' sesuai dengan nama kolom yang digunakan untuk relasi
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'guru_tugas_id');
    }
}
