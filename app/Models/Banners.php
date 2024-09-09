<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;

    protected $table = 'banners'; // Pastikan nama tabel sesuai
    protected $fillable = ['title', 'deadline']; // Sesuaikan dengan kolom yang ada di tabel
}

