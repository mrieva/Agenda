<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nisn', // Tambahkan ini
        'role', // Tambahkan ini
        'email',
        'password',
        'profile_picture',
        'kelas',
        'jurusan',
        'mapel',
    ];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFirstNameAttribute()
    {
        $names = explode(' ', $this->name, 2);
        return $names[0];
    }

    // Akses nama belakang
    public function getLastNameAttribute()
    {
        $names = explode(' ', $this->name, 2);
        return $names[1] ?? '';
    }
}
