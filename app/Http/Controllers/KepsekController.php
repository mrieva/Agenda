<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class KepsekController extends Controller
{
    public function settings()
    {
        // Ambil data user yang sesuai dengan pengguna yang sedang login
        $user = Auth::user();

        // Kirim data ke view
        return view('kepsek.settings', compact('user'));
    }

    public function showSettings()
    {
        $user = User::find(auth()->id()); // Ambil data user berdasarkan ID yang sedang login

        return view('settings', [
            'user' => $user
        ]);
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('kepsek.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'nisn' => 'required|digits:6',
            'role' => 'required|in:siswa,guru,sekretaris,kepala_sekolah',
            'email' => 'required|email|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Gabungkan first_name dan last_name ke dalam satu kolom name
        $user->name = $request->input('first_name') . ' ' . $request->input('last_name');

        // Update data lainnya
        $user->nisn = $request->input('nisn');
        $user->role = $request->input('role');
        $user->email = $request->input('email');

        // Cek dan update profile_picture jika ada file yang diupload
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('storage'), $imageName);
            $user->profile_picture = $imageName;
        }

        // Simpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('settings-kepsek')->with('success', 'Profile updated successfully.');
    }
}
