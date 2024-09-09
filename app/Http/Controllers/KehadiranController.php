<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KehadiranController extends Controller
{
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
            ->select(DB::raw('keterangan, COUNT(*) as jumlah'))
            ->groupBy('keterangan')
            ->get();

        $kehadiranSiswa = DB::table('kehadirans')
            ->where('role', 'siswa')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('keterangan, COUNT(*) as jumlah'))
            ->groupBy('keterangan')
            ->get();

        return response()->json([
            'guru' => $kehadiranGuru,
            'siswa' => $kehadiranSiswa
        ]);
    }
}
