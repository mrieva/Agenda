<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|integer|unique:users,nisn',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|in:admin,siswa,guru,sekretaris,kepala_sekolah',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nisn = $request->nisn;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'User added successfully');
    }

    public function index() :View
    {
        $users = User::all(); // Mengambil semua data user dari database
        return view('admin.indexadm', compact('users'));
    }
}
