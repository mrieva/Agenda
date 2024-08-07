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

Route::get('index', function () {
    return view('indexsiswa');
});

use App\Http\Controllers\ContactController;

Route::post('/kirim-email', [ContactController::class, 'sendEmail'])->name('send.email');
