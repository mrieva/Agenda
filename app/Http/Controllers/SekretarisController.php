<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruTugas; // Pastikan model GuruTugas sudah ada

class SekretarisController extends Controller
{
    public function index()
{
    // Ambil semua tugas dari database
    $tugas = GuruTugas::all();

    // Kirim data ke view
    return view('tugassekretaris', compact('tugas'));
}

}
