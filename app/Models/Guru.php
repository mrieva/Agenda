<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama_siswa', 'kelas', 'judul_tugas', 'link_tugas', 'file_tugas'
    ];
}


