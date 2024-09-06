<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Storage;
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
            // Simulasi nama file gambar lokal
            $imageName = $faker->image('storage/app/public/images', 200, 200, 'people', false, true); // Simpan di storage/app/public/images
            User::create([
                'name' => $faker->name,
                'profile_picture' => 'images/' . $imageName, // Nama file gambar lokal
                'nisn' => $faker->unique()->randomNumber(6),
                'role' => $faker->randomElement(['siswa', 'guru', 'sekretaris', 'kepala_sekolah']),
                'email' => $faker->unique()->safeEmail,
                'password' => 'password', // Password default
            ]);
        }
    }

}
