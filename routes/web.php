<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

// Halaman Pembuka
Route::view('/', 'landing')->name('home');

// Autentikasi (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| ROUTE KHUSUS ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [SkemaController::class, 'dashboardAdmin'])->name('dashboard');

    Route::resource('skema', SkemaController::class);
    Route::resource('peserta', PesertaController::class)->parameters(['peserta' => 'peserta']);
});

/*
|--------------------------------------------------------------------------
| ROUTE KHUSUS PESERTA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:peserta'])->group(function () {
    Route::get('/user/dashboard', [PesertaController::class, 'dashboardPeserta'])->name('peserta.dashboard');
    Route::post('/peserta/store', [PesertaController::class, 'storeSelf'])->name('peserta.self.store');
    Route::put('/peserta/{peserta}/update', [PesertaController::class, 'updateSelf'])->name('peserta.self.update');
});