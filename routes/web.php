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
Route::get('/dashboard/cari-saham', [App\Http\Controllers\CariSahamController::class, 'index'])->name('Cari Saham');
Route::post('/dashboard/cari-saham', [App\Http\Controllers\CariSahamController::class, 'CariSaham'])->name('cari-saham');
Route::get('/dashboard/sortir-saham/{ticker}', [App\Http\Controllers\SortirController::class, 'sortirSaham'])->name('Sortir Saham');
Route::get('/dashboard/process-and-sort-stocks-daily', [App\Http\Controllers\SortirController::class, 'processAndSortStocksDaily'])->name('Process and Sort Stocks Daily');
