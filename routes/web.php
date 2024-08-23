<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website;

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

Route::get('index-kepala-sekolah', [Website::class, 'indexkepalasekolah']);

Route::get('index-sekretaris', function () {
    return view('sekretaris.indexsekretaris');
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
