<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class SiswaController extends Controller
{
    public function index($user){

        $user = auth()->user();

        return view('siswa.indexsiswa', compact('user'));

    }
}
