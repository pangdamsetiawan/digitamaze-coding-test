<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kelas; // ✅ Tambahkan ini

// Saya perbaiki sedikit dari Route::view menjadi Route::redirect
Route::redirect('/', '/login');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('kelas', 'kelas')
    ->middleware(['auth', 'verified'])
    ->name('kelas');

// Menambahkan route baru untuk menampilkan detail kelas (Poin 5 & 6)
Route::get('/kelas/{kelas}', function (Kelas $kelas) {
    return view('kelas-show', ['kelas' => $kelas]);
})->middleware(['auth', 'verified'])->name('kelas.show');

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

Route::view('laporan-guru', 'laporan.guru-page')
    ->middleware(['auth', 'verified'])
    ->name('laporan.guru');

Route::view('laporan-siswa', 'laporan.siswa-page')
    ->middleware(['auth', 'verified'])
    ->name('laporan.siswa');


require __DIR__.'/auth.php';
