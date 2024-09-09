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
        'file' => null,
        'status' => 'sudah', // Set tugas sebagai 'sudah diserahkan'
    ]);

    return redirect()->back()->with('success', 'Tugas telah diserahkan!');
}

public function storeFile(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'file' => 'required|file|max:2048',
    ]);

    $filePath = $request->file('file')->store('tugas-files');

    Tugas::create([
        'judul' => $request->input('judul'),
        'link' => null,
        'file' => $filePath,
        'status' => 'sudah', // Set tugas sebagai 'sudah diserahkan'
    ]);

    return redirect()->back()->with('success', 'Tugas telah diserahkan!');
}

}
