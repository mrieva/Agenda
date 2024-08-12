<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Guru;
use App\Models\Sekretaris;
use App\Models\KepalaSekolah;

class AuthController extends Controller
{

    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'nisn' => 'required',
        'password' => 'required',
    ]);

    // Mencoba login dari tabel Siswa
    $user = User::where('nisn', $request->nisn)->first();
        // Mencoba login dari tabel Guru
        // ?? Guru::where('nipd', $request->nisn)->first()
        // Mencoba login dari tabel Sekretaris
        // ?? Sekretaris::where('nipd', $request->nisn)->first()
        // Mencoba login dari tabel KepalaSekolah
        // ?? KepalaSekolah::where('nipd', $request->nisn)->first();

    // Debugging jika diperlukan
    // dd($user);

    if ($user && Hash::check($request->password, $user->password)) {
        if ($user->role == 'siswa') {
            Auth::login($user);
            return redirect('/index-siswa');
        }
        if ($user->role == 'guru') {
            Auth::login($user);
            return redirect('/index-guru');
        }
        if ($user->role == 'sekretaris') {
            Auth::login($user);
            return redirect('/index-sekretaris');
        }
        if ($user->role == 'kepala_sekolah') {
            Auth::login($user);
            return redirect('/index-kepala-sekolah');
        }
    }

    // Jika tidak ada pengguna yang ditemukan atau password tidak cocok
    return back()->withErrors([
        'nisn' => 'Login failed. Please check your NISN/NIPD and password.',
    ]);
}

    //  public function login(Request $request)
    // {
    //     $credentials = $request->only('nisn', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/');
    //     }

    //     return back()->withErrors([
    //         'nisn' => 'The provided credentials do not match our records.',
    //     ]);
    // }
}
