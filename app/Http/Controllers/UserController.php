<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Alert;




class UserController extends Controller
{

    public function create(): View
    {
        return view('admin.tambahdatauser');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'profile_picture'   => 'nullable|image|mimes:jpeg,jpg,png,gif,svg,webp|max:10048',
            'name'              => 'required|max:255',
            'nisn'              => 'required|digits:6|unique:users',
            'password'          => 'required|min:8|max:255',
            'email'             => 'required|email:dns|unique:users',
            'role'              => 'required|in:siswa,guru,sekretaris,kepala_sekolah,admin',
            'kelas'             => 'nullable|sometimes|required_if:role,siswa|string',
            'jurusan'           => 'nullable|sometimes|required_if:role,siswa|string',
            'mapel'             => 'nullable|sometimes|required_if:role,guru|string',
        ]);

        //upload image
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('storage'), $imageName);
            $path = $imageName;
        }

        //create user
        User::create([
            'profile_picture'   => $path, // Save the storage path
            'name'              => $request->name,
            'nisn'              => $request->nisn,
            'password'          => Hash::make($request->password),
            'email'             => $request->email,
            'role'              => $request->role,
            'kelas'             => $request->role == 'siswa' || $request->role == 'sekretaris' ? $request->kelas : null,
            'jurusan'           => $request->role == 'siswa' || $request->role == 'sekretaris' ? $request->jurusan : null,
            'mapel'             => $request->role == 'guru' ? $request->mapel : null,
            'created_at'        => now(),
            'updated_at'        => now(),
            'deleted_at'        => null
        ]);

        //redirect to index
        return redirect()->route('indexadm')->with('success', 'Data user berhasil ditambahkan');
    }


    public function index(Request $request): View
    {
        $query = $request->input('query');
        $role = $request->input('role');
        $sortDirection = $request->input('sortDirection', 'desc'); // Default sort by 'desc' (terbaru)

        $users = User::when($query, function ($queryBuilder, $query) {
            return $queryBuilder->where('name', 'like', "%{$query}%")
                ->orWhere('nisn', 'like', "%{$query}%");
        })
            ->when($role, function ($queryBuilder, $role) {
                return $queryBuilder->where('role', $role);
            })
            ->orderBy('created_at', $sortDirection) // Sorting by 'created_at' with direction (asc/desc)
            ->paginate(10); // 10 users per page

        return view('admin.indexadm', compact('users'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', "%{$query}%")
            ->orWhere('nisn', 'like', "%{$query}%")
            ->orWhere('role', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->orWhere('mapel', 'like', "%{$query}%")
            ->orWhere('jurusan', 'like', "%{$query}%")
            ->orWhere('kelas', 'like', "%{$query}%")

            ->paginate(10); // Menambahkan pagination di sini jika diperlukan

        return view('admin.indexadm', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('indexadm')->with('success', 'User berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi data
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:10048',
            'nisn' => 'nullable|string|max:255',
            'mapel' => 'nullable|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'kelas' => 'nullable|string|max:255',
        ]);

        // Update gambar jika ada
        if ($request->hasFile('profile_picture')) {

            // Upload gambar baru
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('storage'), $imageName);
            $validatedData['profile_picture'] = "{$imageName}";
        }

        // Update data user
        $user->update($validatedData);

        return redirect()->route('indexadm')->with('success', 'Data user berhasil diperbarui');
    }


    public function settingsSekret()
    {

        $user = Auth::user();

        // Pisahkan nama berdasarkan spasi
        $nameParts = explode(' ', $user->name, 2); // pecah name jadi 2 bagian
        $first_name = $nameParts[0];
        $last_name = isset($nameParts[1]) ? $nameParts[1] : ''; // jika tidak ada last_name

        return view('sekretaris.setiing', compact('user', 'first_name', 'last_name'));
    }

    public function editProfileSekret()
    {

        if (Auth::guest()) {
            return redirect()->route('login');
        }

        // Ambil data user yang sedang login
        $user = Auth::user();
        $nameParts = explode(' ', $user->name, 2); // pecah name jadi 2 bagian
        $first_name = $nameParts[0];
        $last_name = isset($nameParts[1]) ? $nameParts[1] : ''; // jika tidak ada last_name

        return view('sekretaris.edit-profile', compact('user', 'first_name', 'last_name'));
    }

    public function updateProfileSekret(Request $request)
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
        return redirect()->route('setsekret')->with('success', 'Profile updated successfully.');
    }
}
