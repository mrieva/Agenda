<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\KehadiranController;

Route::get('/kehadiran-chart', [KehadiranController::class, 'chart'])->name('kehadiran.chart');

// Route untuk menampilkan semua data user (tes koneksi)
Route::get('/conn', function () {
    return User::get();
});

// Route ke halaman home
Route::get('/', function () {
    return view('home');
})->name('home');

// Route untuk halaman test
Route::get('test', function () {
    return view('test');
});

// Siswa section
Route::get('index-siswa', function () {
    return view('siswa.indexsiswa');
});

// Guru section
Route::get('index-guru', function () {
    return view('guru.indexguru');
})->name('index-guru');

Route::get('tugas-guru', function () {
    return view('guru.tugasguru');
})->name('tugas-guru');

Route::get('notif-guru', function () {
    return view('guru.settings-notif');
})->name('notif-guru');

Route::get('settings-guru', function () {
    return view('guru.setting');
})->name('settings-guru');

Route::get('tambahtugas', function () {
    return view('guru.tambahtugasguru');
})->name('tambahtugas');

Route::get('kelas-guru', function () {
    return view('guru.kelasguru');
})->name('kelasguru');

Route::get('tabel-guru', function () {
    return view('guru.tabeltugasguru');
})->name('tabelguru');

// Kepala sekolah section
Route::get('index-kepala-sekolah', [KepsekController::class, 'index'])->name('index-kepala-sekolah');

Route::get('settings-kepsek', [KepsekController::class, 'settings'])->name('settings-kepsek');

Route::get('edit-profile', [KepsekController::class, 'editProfile'])->name('edit-profile');

Route::put('update-profile', [KepsekController::class, 'updateProfile'])->name('update-profile');


// Admin section
Route::get('index-admin', [UserController::class, 'index'])->name('indexadm');

Route::post('tambah-user', [UserController::class, 'store'])->name('admin.store');

Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

route::get('tambah-user', function () {
    return view('admin.tambahdatauser');
})->name('tambahuser');

// Sekretaris section
Route::get('index-sekretaris', function () {
    return view('sekretaris.indexsekretaris');
});

Route::get('tugas-sekretaris', function () {
    return view('sekretaris.tugassekretaris');
});

// Route untuk mengirim email
Route::post('/kirim-email', [ContactController::class, 'sendEmail'])->name('send.email');

// Route untuk login dan logout
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/admin/indexadm', [UserController::class, 'index'])->name('indexadm');
Route::get('/admin/search', [UserController::class, 'search'])->name('search');

// Route untuk menghapus data user
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// Route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/index', function () {
        return view('indexsiswa');
    });
});
