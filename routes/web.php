<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('Dashboard');
Route::get('/dashboard/daftar-komoditas', [App\Http\Controllers\DaftarKomoditasKontroller::class, 'index'])->name('Daftar Komoditas');
Route::get('/dashboard/detail-saham', [App\Http\Controllers\DetailSahamController::class, 'index'])->name('Detail Saham');
