<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KehadiranController extends Controller
{
    public function chart()
    {
        $kehadiranGuru = DB::table('kehadirans')
            ->where('role', 'guru')
            ->select(DB::raw('keterangan, COUNT(*) as jumlah'))
            ->groupBy('keterangan')
            ->get();

        $kehadiranSiswa = DB::table('kehadirans')
            ->where('role', 'siswa')
            ->select(DB::raw('keterangan, COUNT(*) as jumlah'))
            ->groupBy('keterangan')
            ->get();

        return response()->json([
            'guru' => $kehadiranGuru,
            'siswa' => $kehadiranSiswa
        ]);
    }
}
