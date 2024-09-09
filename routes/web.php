<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;



Route::post('/upload-banner', [BannerController::class, 'uploadBanner']);



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
})->name('index-siswa');

Route::get('tugas-siswa', function () {
    return view('siswa.siswatugas');
})->name('tugas-siswa');

Route::get('siswa-tugas', function () {
    return view('siswa.tugassiswa');
})->name('siswa-tugas');

Route::get('settings-siswa', function () {
    return view('siswa.settingsiswa');
})->name('settings-siswa');

Route::get('notif-siswa', function () {
    return view('siswa.notifsiswa');
})->name('notif-siswa');

Route::get('pengumuman-siswa', function () {
    return view('siswa.pengumumansiswa');
})->name('pengumuman-siswa');

Route::post('/upload-banner', [BannerController::class, 'uploadBanner'])->name('upload-banner');

// Route untuk menampilkan halaman siswa dan mengambil data banner
Route::get('index-siswa', [BannerController::class, 'showSiswaPage'])->name('index-siswa');



// Rute untuk upload file
Route::post('/upload-file', [BannerController::class, 'uploadFile'])->name('upload-file');

// Rute untuk upload link
Route::post('/upload-link', [BannerController::class, 'uploadLink'])->name('upload-link');


// Guru section
Route::get('index-guru', function () {
    return view('guru.indexguru');
})->name('index-guru');;

route::get("tugas-guru", function(){
    return view('guru.tugasguru');
});

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
Route::get('kelas-dipilih', function () {
    return view('guru.kelasdipilih');
})->name('kelasdipilih');


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
    return view('admin.indexadm');
})->name('indexadm');

Route::get('tambah-user', function () {
    return view('admin.tambahdatauser');
})->name('tambahuser');

// Sekretaris section
Route::get('index-sekretaris', function () {
    return view('sekretaris.indexsekretaris');
})->name('index-sekretaris');

Route::get('tugas-sekretaris', function () {
    return view('sekretaris.tugassekretaris');
})->name('tugas-sekretaris');

Route::get('settings-sekretaris', function () {
    return view('sekretaris.setiing');
})->name('setsekret');

Route::get('notif-sekretaris', function () {
    return view('sekretaris.notifsekret');
})->name('notif-sekret');

Route::get('announce-sekretaris', function () {
    return view('sekretaris.announcesekret');
})->name('annnsekret');


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

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
