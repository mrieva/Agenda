<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Sekretaris;
use App\Models\KepalaSekolah;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'password' => 'required',
        ]);

        // Coba login dari masing-masing tabel
        $user = Siswa::where('nisn', $request->nisn)->first()
            ?? Guru::where('nipd', $request->nisn)->first()
            ?? Sekretaris::where('nipd', $request->nisn)->first()
            ?? KepalaSekolah::where('nipd', $request->nisn)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            return redirect()->intended('/index');

        }


        return back()->withErrors([ 
            'nisn' => 'Login failed. Please check your NISN/NIPD and password.',
        ]);
    }
}
