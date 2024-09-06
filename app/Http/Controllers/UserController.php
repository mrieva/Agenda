<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
            'profile_picture'   => 'required|image|mimes:jpeg,jpg,png|max:10048',
            'name'              => 'required|min:3|max:255',
            'nisn'              => 'required|digits:6|unique:users',
            'password'          => 'required|min:8|max:255',
            'email'             => 'required|email:dns|unique:users',
            'role'              => 'required|in:siswa,guru,sekretaris,kepala_sekolah',
            'kelas'             => 'nullable|sometimes|required_if:role,siswa|string',
            'jurusan'           => 'nullable|sometimes|required_if:role,siswa|string',
            'mapel'             => 'nullable|sometimes|required_if:role,guru|string',
        ]);

        //upload image
        $image = $request->file('profile_picture');
        $path = $image->store('images', 'public'); // Save to public storage

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
        return redirect()->route('indexadm');
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
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,jpg,png|max:10048',
            'nisn' => 'required|string|max:255',
            'mapel' => 'nullable|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'kelas' => 'nullable|string|max:255',
        ]);

        // Update gambar jika ada
        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Upload gambar baru
            $image = $request->file('profile_picture');
            $path = $image->store('images', 'public');
            $validatedData['profile_picture'] = $path;
        }

        // Update data user
        $user->update($validatedData);

        return redirect()->route('indexadm')->with('success', 'User updated successfully');
    }
}
