<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'kehadiran', 'deskripsi', 'role'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
