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
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nisn' => 'required',
            'password' => 'required',
        ]);


        $user = User::where('nisn', $request->nisn)->first();


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
            if ($user->role == 'admin') {
                Auth::login($user);
                return redirect('/admin/indexadm');
            }
        } else {
            return back()->with('error', 'NISN/NIPD atau password salah');
        }
    }

}

