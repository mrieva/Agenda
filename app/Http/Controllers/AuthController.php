<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan ini sesuai dengan model User Anda

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Mengarahkan ke view login modal
    }

    public function login(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'password' => 'required',
        ]);

        // Memeriksa kredensial
        $user = User::where('nisn', $request->nisn)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/dashboard'); // Ganti dengan route yang sesuai setelah login
        }

        return back()->withErrors(['nisn' => 'Invalid NISN or password.']);
    }
}
