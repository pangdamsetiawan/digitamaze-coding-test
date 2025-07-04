<?php

use Illuminate\Support\Facades\Route;

Route::view('/', '/login');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// TAMBAHKAN ROUTE UNTUK KELAS DI SINI
Route::view('kelas', 'kelas')
    ->middleware(['auth', 'verified'])
    ->name('kelas');

Route::view('guru', 'guru')
    ->middleware(['auth', 'verified'])
    ->name('guru');

Route::view('siswa', 'siswa')
    ->middleware(['auth', 'verified'])
    ->name('siswa');

Route::view('summary', 'summary')
    ->middleware(['auth', 'verified'])
    ->name('summary');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
