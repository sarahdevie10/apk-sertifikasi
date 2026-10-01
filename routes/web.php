<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;
use App\Models\Peserta;
use App\Models\Skema;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', function () {
    $jumlahPeserta = Peserta::count();
    $jumlahSkema = Skema::count();

    return view('dashboard', compact(
        'jumlahPeserta',
        'jumlahSkema'
    ));
})->middleware('auth')->name('dashboard');

Route::resource('skema', SkemaController::class)
    ->middleware('auth');

Route::resource('peserta', PesertaController::class)
    ->parameters(['peserta' => 'peserta'])
    ->middleware('auth');