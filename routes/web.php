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
use App\Http\Controllers\CommentController;



Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'destroy'])->name('logout');





Route::get('/', function () {
    return view('home');
});

Route::post('send.email', [ContactController::class, 'sendEmail'])->name('send.email');





// siswa section

// Cek role dengan middleware, jika role bukan siswa maka redirect ke halaman awal
Route::get('index-siswa', [GuruTugasController::class, 'indexSiswa'])->name('index-siswa');

Route::get('pengumuman-siswa/{id}', [GuruTugasController::class, 'detailTugas'])->name('annnsiswa');

Route::get('/tugas/diserahkan/{id}', [PengumpulanTugasController::class, 'showDiserahkan'])->name('deskdiserahkan');

Route::get('/tugas-siswa', [GuruTugasController::class, 'tugasSiswa'])->name('tugassiswa');

Route::post('/tugas/{id}/cancel-submission', [PengumpulanTugasController::class, 'cancelSubmission'])->name('cancelSub');

Route::post('submit-tugas', [PengumpulanTugasController::class, 'store'])->name('submit.tugas');










// guru section
Route::get('index-guru', [GuruTugasController::class, 'indexGuru'])->name('index-guru');

Route::post('/guru/tugas', [GuruTugasController::class, 'store'])->name('gurutugas.store');

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

Route::get('periksa-tugas/{id}', [GuruTugasController::class, 'periksa'])->name('periksa');

Route::post('periksa-tugas/{id}/komentar', [GuruTugasController::class, 'storeKomentar'])->name('komentar.store');

Route::post('/preview-tugas/{id}/update', [GuruTugasController::class, 'updateNilai'])->name('previewTugas.update'); // Untuk update nilai

Route::post('/batal-periksa/{id}', [GuruTugasController::class, 'batalPeriksa'])->name('periksa.batal');

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
Route::get('index-sekretaris', [GuruTugasController::class, 'indexSekret'])->name('index-sekretaris');

Route::get('tugassekretaris', [GuruTugasController::class, 'tugasSekret'])->name('tugassekret');

Route::get('komunikasi-sekretaris', function () {
    return view('sekretaris.komunikasisekretaris');
})->name('komunsekret');

Route::post('/kehadiran/store', [KehadiranController::class, 'store'])->name('kehadiran.store');

Route::get('pengumuman-sekret/{id}', [GuruTugasController::class, 'detailSekret'])->name('annnsekret');

Route::get('/tugas/diserahkan-sekret/{id}', [PengumpulanTugasController::class, 'showDiserahkanSekret'])->name('deskdiserahkansekret');

Route::post('/tugas/{id}/cancel-submission-sekret', [PengumpulanTugasController::class, 'cancelSubmissionSekret'])->name('cancelSubSekret');

Route::get('settings-sekret', function () {
    return view('sekretaris.setiing');
})->name('setsekret');

Route::get('notif-sekret', function () {
    return view('sekretaris.notifsekret');
})->name('notif-sekret');
