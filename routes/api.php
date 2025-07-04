<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\SiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rute publik untuk login dan register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rute yang dilindungi (butuh login/token untuk mengakses)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Rute untuk CRUD Kelas, Guru, dan Siswa
    Route::apiResource('kelas', KelasController::class);
    Route::apiresource('guru', GuruController::class);
    Route::apiResource('siswa', SiswaController::class); // <-- TAMBAHKAN INI
});
