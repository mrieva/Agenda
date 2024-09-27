<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class KepsekController extends Controller
{
    public function index()
    {
        // Cek jika user belum login atau bukan kepala sekolah
        if (Auth::guest() || Auth::user()->role !== 'kepala_sekolah') {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }

        $user = Auth::user(); // Ambil data kepala sekolah yang login
        return view('kepsek.indexkepalasekolah', compact('user'));
    }


    public function settings()
    {
        // Cek jika user belum login atau bukan kepala sekolah
        if (Auth::guest() || Auth::user()->role !== 'kepala_sekolah') {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }

        $user = Auth::user();

        // Pisahkan nama berdasarkan spasi
        $nameParts = explode(' ', $user->name, 2); // pecah name jadi 2 bagian
        $first_name = $nameParts[0];
        $last_name = isset($nameParts[1]) ? $nameParts[1] : ''; // jika tidak ada last_name

        return view('kepsek.settings', compact('user', 'first_name', 'last_name'));
    }

    public function editProfile()
    {

        if (Auth::guest()) {
            return redirect()->route('login');
        }

        // Ambil data user yang sedang login
        $user = Auth::user();
        $nameParts = explode(' ', $user->name, 2); // pecah name jadi 2 bagian
        $first_name = $nameParts[0];
        $last_name = isset($nameParts[1]) ? $nameParts[1] : ''; // jika tidak ada last_name

        return view('kepsek.edit-profile', compact('user', 'first_name', 'last_name'));
    }

    public function updateProfile(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }

        // Validasi input
        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'nisn' => 'nullable|digits:6',
            'role' => 'nullable|in:siswa,guru,sekretaris,kepala_sekolah',
            'email' => 'nullable|email|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Gabungkan first_name dan last_name, cek jika last_name kosong
        if ($request->input('last_name')) {
            $user->name = $request->input('first_name') . ' ' . $request->input('last_name');
        } else {
            $user->name = $request->input('first_name');
        }

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
