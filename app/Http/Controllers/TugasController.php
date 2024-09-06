<?php
namespace App\Http\Controllers;

// TugasController.php
use Illuminate\Http\Request;
use App\Models\Tugas;

class TugasController extends Controller
{
    public function storeLink(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        Tugas::create([
            'judul' => $request->input('judul'),
            'link' => $request->input('link'),
            'file' => null, // karena ini adalah link, file tidak digunakan
        ]);

        return redirect()->back()->with('success', 'Link tugas berhasil ditambahkan!');
    }

    public function storeFile(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,docx,doc,jpeg,jpg,png|max:2048', // menyesuaikan jenis file yang diizinkan
        ]);

        $filePath = $request->file('file')->store('tugas', 'public');

        Tugas::create([
            'judul' => $request->input('judul'),
            'link' => null, // karena ini adalah file, link tidak digunakan
            'file' => $filePath,
        ]);

        return redirect()->back()->with('success', 'File tugas berhasil ditambahkan!');
    }
}
