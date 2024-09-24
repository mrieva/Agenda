<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\GuruTugasController;
use App\Http\Controllers\SekretarisController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PengumpulanTugasController;
use App\Models\PengumpulanTugas;

Route::post('/guru/tugas', [GuruTugasController::class, 'store'])->name('gurutugas.store');

Route::get('/tugassekretaris', [SekretarisController::class, 'index'])->name('tugassekretaris');

Route::post('/kehadiran/store', [KehadiranController::class, 'store'])->name('kehadiran.store');

Route::post('submit-tugas', [PengumpulanTugasController::class, 'store'])->name('submit.tugas');


Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('send.email', [ContactController::class, 'sendEmail'])->name('send.email');

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
Route::get('index-siswa', [GuruTugasController::class, 'indexSiswa'])->name('index-siswa');

Route::get('pengumuman-siswa/{id}', [GuruTugasController::class, 'detailTugas'])->name('annnsiswa');

Route::get('/tugas-siswa', [GuruTugasController::class, 'tugasSiswa'])->name('tugassiswa');

Route::get('/tugas/diserahkan/{id}', [PengumpulanTugasController::class, 'showDiserahkan'])->name('deskdiserahkan');

Route::post('/tugas/{id}/cancel-submission', [PengumpulanTugasController::class, 'cancelSubmission'])->name('cancelSub');

// guru section
Route::get('index-guru', [GuruTugasController::class, 'indexGuru'])->name('index-guru');

route::get("tugas-guru", function () {
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

Route::get('/preview-tugas/{id}', [GuruTugasController::class, 'showPreview'])->name('previewTugas.show');

Route::post('/preview-tugas/{id}/update', [GuruTugasController::class, 'updateNilai'])->name('previewTugas.update'); // Untuk update nilai

Route::post('/batal-periksa/{id}', [GuruTugasController::class, 'batalPeriksa'])->name('periksa.batal');

Route::get('periksa-tugas/{id}', [GuruTugasController::class, 'periksa'])->name('periksa');

Route::put('/periksa/{id}', [GuruTugasController::class, 'periksaTugas'])->name('periksa.update');

Route::get('tabel-guru', [GuruTugasController::class, 'showTable'])->name('tabelguru');

Route::post('/update-nilai-status', [PengumpulanTugasController::class, 'updateNilaiStatus'])->name('updateNilai');

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

Route::get('komunikasi-sekretaris', function () {
    return view('sekretaris.komunikasisekretaris');
})->name('komunsekret');

Route::get('pengumuman-sekret', function () {
    return view('sekretaris.announcesekret');
})->name('annnsekret');

Route::get('settings-sekret', function () {
    return view('sekretaris.setiing');
})->name('setsekret');

Route::get('notif-sekret', function () {
    return view('sekretaris.notifsekret');
})->name('notif-sekret');
