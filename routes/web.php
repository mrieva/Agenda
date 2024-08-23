<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/conn', function () {
    return User::get();
});

Route::get('/', function () {
    return view('home');
});

Route::get('test', function () {
    return view('test');
});

Route::get('index-siswa', function () {
    return view('siswa.indexsiswa');
});
Route::get('index-guru', function () {
    return view('guru.indexguru');
});
Route::get('kelas-guru', function () {
    return view('guru.kelasguru');
});
Route::get('tugas-guru', function () {
    return view('guru.tugasguru');
});
Route::get('tambah-tugas-guru', function () {
    return view('guru.tambahtugasguru');
});
Route::get('tabel-tugas-guru', function () {
    return view('guru.tabeltugasguru');
});
Route::get('index-kepala-sekolah', function () {
    return view('kepsek.indexkepalasekolah');
});
Route::get('index-sekretaris', function () {
    return view('sekretaris.indexsekretaris');
});

Route::get('siswa-tugas', function () {
    return view('siswa.siswatugas');
});

Route::get('tugas-sekretaris', function () {
    return view('sekretaris.tugassekretaris');
});

Route::get('komunikasi-sekretaris', function () {
    return view('sekretaris.komunikasisekretaris');
});

use App\Http\Controllers\ContactController;

Route::post('/kirim-email', [ContactController::class, 'sendEmail'])->name('send.email');

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/index', function () {
        return view('indexsiswa');
    });
});


