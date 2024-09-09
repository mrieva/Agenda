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

        $user = Auth::user(); // Ambil data kepala sekolah yang login
        return view('kepsek.settings', compact('user'));
    }


    public function showSettings()
    {
        // Cek jika user belum login atau bukan kepala sekolah
        if (Auth::guest() || Auth::user()->role !== 'kepala_sekolah') {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }

        $user = Auth::user(); // Ambil data kepala sekolah yang login
        return view('kepsek.settings', compact('user'));
    }


    public function editProfile()
    {

        if (Auth::guest()) {
            return redirect()->route('login');
        }

        // Ambil data user yang sedang login
        $user = Auth::user();

        return view('kepsek.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }

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
