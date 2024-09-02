<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

// Route untuk menambahkan user
Route::post('/add-user', [UserController::class, 'store'])->name('add-user.store');

// Route untuk menampilkan semua data user (tes koneksi)
Route::get('/conn', function () {
    return User::get();
});

// Route ke halaman home
Route::get('/', function () {
    return view('home');
});

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
Route::get('index-kepala-sekolah', function () {
    return view('kepsek.indexkepalasekolah');
})->name('index-kepala-sekolah');

Route::get('settings-kepsek', function () {
    return view('kepsek.settings');
})->name('settings-kepsek');

Route::get('notif-kepsek', function () {
    return view('kepsek.notif-kepsek');
})->name('notifkepsek');

// Admin section
Route::get('index-admin', function () {
    return view('admin.indexadmin');
})->name('indexadm');

Route::get('tambah-user', function () {
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

// Route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/index', function () {
        return view('indexsiswa');
    });
});
