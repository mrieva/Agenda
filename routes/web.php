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


// siswa section
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



// guru section
Route::get('index-guru', function () {
    return view('guru.indexguru');
})->name('index-guru');;

route::get("tugas-guru", function(){
    return view('guru.tugasguru');
});

Route::get("notif-guru", function () {
    return view("guru.settings-notif");
})->name('notif-guru');

Route::get("tugas-guru", function () {
    return view("guru.tugasguru");
})->name('tugas-guru');

Route::get("settings-guru", function () {
    return view("guru.setting");
})->name('settings-guru');

Route::get('tambahtugas', function () {
    return view("guru.tambahtugasguru");
})->name('tambahtugas');

Route::get('kelas-guru', function() {
    return view('guru.kelasguru');
})->name('kelasguru');

Route::get('tabel-guru', function() {
    return view('guru.tabeltugasguru');
})->name('tabelguru');

Route::get('kelas-dipilih', function () {
    return view('guru.kelasdipilih');
})->name('kelasdipilih');


// kepsek section
Route::get('index-kepala-sekolah', function () {
    return view('kepsek.indexkepalasekolah');
})->name('index-kepala-sekolah');

Route::get('settings-kepsek', function () {
    return view('kepsek.settings');
})->name('settings-kepsek');

Route::get("notif-kepsek", function () {
    return view("kepsek.notif-kepsek");
})->name('notifkepsek');



// sekretaris section
Route::get('index-sekretaris', function () {
    return view('sekretaris.indexsekretaris');
})->name('index-sekretaris');

Route::get('tugas-sekretaris', function () {
    return view('sekretaris.tugassekretaris');
})->name('tugas-sekretaris');

Route::get('pengumuman-sekret', function () {
    return view('sekretaris.announcesekret');
})->name('annnsekret');

Route::get('settings-sekret', function () {
    return view('sekretaris.setiing');
})->name('setsekret');

Route::get('notif-sekret', function () {
    return view('sekretaris.notifsekret');
})->name('notif-sekret');



use App\Http\Controllers\ContactController;

Route::post('/kirim-email', [ContactController::class, 'sendEmail'])->name('send.email');

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/index', function () {
        return view('indexsiswa');
    });
});

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
