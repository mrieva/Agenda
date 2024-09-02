<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            User::create([
                'name' => $faker->name,
                'profile_picture' => $faker->imageUrl(200, 200, 'people', true, 'Faker'), // URL gambar profil acak
                'nisn' => $faker->unique()->randomNumber(6),
                'role' => $faker->randomElement(['admin', 'siswa', 'guru', 'sekretaris', 'kepala_sekolah']),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Password default
            ]);
        }
    }
}
