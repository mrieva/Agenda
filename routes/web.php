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

// siswa section
Route::get('index-siswa', function () {
    return view('siswa.indexsiswa');
});

// guru section
Route::get('index-guru', function () {
    return view('guru.indexguru');
})->name('index-guru');

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

// kepsek section
Route::get('index-kepala-sekolah', function () {
    return view('kepsek.indexkepalasekolah');
})->name('index-kepala-sekolah');

Route::get('settings-kepsek', function () {
    return view('kepsek.settings');
})->name('settings-kepsek');


// sekretaris section
Route::get('index-sekretaris', function () {
    return view('sekretaris.indexsekretaris');
});

Route::get('tugas-sekretaris', function () {
    return view('sekretaris.tugassekretaris');
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
