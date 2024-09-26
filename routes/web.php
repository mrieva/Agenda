<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\KehadiranController;


Route::get('/', function(){
    return view('home');
});

// Kepala sekolah section
Route::get('index-kepala-sekolah', [KepsekController::class, 'index'])->name('index-kepala-sekolah');

Route::get('settings-kepsek', [KepsekController::class, 'settings'])->name('settings-kepsek');

Route::get('edit-profile', [KepsekController::class, 'editProfile'])->name('edit-profile');

Route::put('update-profile', [KepsekController::class, 'updateProfile'])->name('update-profile');

Route::get('/kehadiran-chart', [KehadiranController::class, 'chart'])->name('kehadiran.chart');



// Admin section
Route::post('tambah-user', [UserController::class, 'store'])->name('admin.store');

Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/admin/indexadm', [UserController::class, 'index'])->name('indexadm');

Route::get('/admin/search', [UserController::class, 'search'])->name('search');

// Route untuk menghapus data user
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

route::get('tambah-user', function () {
    return view('admin.tambahdatauser');
})->name('tambahuser');


// Route untuk mengirim email
Route::post('/kirim-email', [ContactController::class, 'sendEmail'])->name('send.email');

// Route untuk login dan logout
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

