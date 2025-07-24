<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class KehadiranController extends Controller
{
    public function store(Request $request)
    {
        // Cek role user
        if ($request->role === 'siswa' || $request->role === 'sekretaris') {
            // Jika siswa atau sekretaris, input kehadiran buat diri sendiri
            Kehadiran::create([
                'user_id' => $request->user_id, // Ambil dari inputan
                'name' => $request->name, // Ambil dari inputan
                'role' => $request->role, // Ambil dari inputan
                'kehadiran' => $request->kehadiran, // Ganti dengan 'kehadiran'
                'deskripsi' => $request->deskripsi, // Mengisi deskripsi jika ada
            ]);
        } else if ($request->role === 'guru') {
            // Guru bisa input kehadiran untuk siswa lain
            $siswa = User::find($request->user_id); // Mengambil data siswa dari dropdown
            if ($siswa) {
                Kehadiran::create([
                    'user_id' => $siswa->id, // ID siswa yang dipilih dari dropdown
                    'name' => $siswa->name, // Mengisi nama siswa yang dipilih
                    'role' => $siswa->role, // Mengisi role siswa
                    'kehadiran' => $request->kehadiran, // Mengambil status dari dropdown
                    'deskripsi' => $request->deskripsi, // Mengisi deskripsi jika ada
                ]);
            }
        }

        return redirect()->back()->with('success', 'Kehadiran berhasil ditambahkan!');
    }



    public function chart(Request $request)
    {
        $timeFilter = $request->query('time_filter', 'today'); // Default to 'today' if not provided

        // Define start and end dates based on the time filter
        switch ($timeFilter) {
            case '7days':
                $startDate = now()->subDays(7)->startOfDay();
                $endDate = now()->endOfDay();
                break;
            case 'month':
                $startDate = now()->startOfMonth();
                $endDate = now()->endOfDay();
                break;
            case 'year':
                $startDate = now()->startOfYear();
                $endDate = now()->endOfDay();
                break;
            case 'all':
                $startDate = now()->subYears(100)->startOfDay(); // Use a very old date for "all time"
                $endDate = now()->endOfDay();
                break;
            case 'today':
            default:
                $startDate = now()->startOfDay();
                $endDate = now()->endOfDay();
                break;
        }

        // Query untuk filter berdasarkan rentang waktu
        $kehadiranGuru = DB::table('kehadirans')
            ->where('role', 'guru')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('kehadiran, COUNT(*) as jumlah'))
            ->groupBy('kehadiran')
            ->get();

        $kehadiranSiswa = DB::table('kehadirans')
            ->where('role', 'siswa')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('kehadiran, COUNT(*) as jumlah'))
            ->groupBy('kehadiran')
            ->get();

        return response()->json([
            'guru' => $kehadiranGuru,
            'siswa' => $kehadiranSiswa
        ]);
    }

    public function indexx()
    {
        // Mengambil data kehadiran dari database
        $kehadiran = Kehadiran::all();

        // Mengembalikan view dengan data kehadiran
        return view('guru.indexguru', compact('kehadiran'));
    }
}
