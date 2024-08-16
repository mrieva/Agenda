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
    return view('pages.indexsiswa');
});
Route::get('index-guru', function () {
    return view('indexguru');
});
Route::get('kelas-guru', function () {
    return view('kelasguru');
});
Route::get('tugas-guru', function () {
    return view('tugasguru');
});
Route::get('tambah-tugas-guru', function () {
    return view('tambahtugasguru');
});
Route::get('tabel-tugas-guru', function () {
    return view('tabeltugasguru');
});
Route::get('index-kepala_sekolah', function () {
    return view('pages.indexkepalasekolah');
});
Route::get('index-sekretaris', function () {
    return view('pages.indexsekretaris');
});
Route::get('tugas-siswa', function () {
    return view('pages.tugassiswa');
});
Route::get('siswa-tugas', function () {
    return view('siswatugas');
});
Route::get('dashboard', function () {
    return view('dashboardGuru');
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


