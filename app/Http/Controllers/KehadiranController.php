<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;

class KehadiranController extends Controller
{
    public function store(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'kehadiran' => 'required',
        'deskripsi' => 'nullable|string',
        'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'role' => 'required|string'
    ]);

    // Handle file upload
    if ($request->hasFile('lampiran')) {
        $filePath = $request->file('lampiran')->store('lampiran', 'public');
        $validatedData['lampiran'] = $filePath;
    }

    // Simpan ke database
    Kehadiran::create($validatedData);

    // Redirect atau kirim response sukses
    return back()->with('success', 'Data kehadiran berhasil disimpan!');
}

}
