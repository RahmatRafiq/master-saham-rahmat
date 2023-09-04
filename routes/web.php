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

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('Dashboard');
    Route::get('/daftar-komoditas', [App\Http\Controllers\DaftarKomoditasKontroller::class, 'index'])->name('Daftar Komoditas');
    Route::get('/detail-saham', [App\Http\Controllers\DetailSahamController::class, 'index'])->name('Detail Saham');

    Route::get('/cari-saham', [App\Http\Controllers\CariSahamController::class, 'index'])->name('Cari Saham');
    Route::post('/cari-saham', [App\Http\Controllers\CariSahamController::class, 'CariSaham'])->name('cari-saham');

    Route::get('/sortir-saham', [App\Http\Controllers\SortirController::class, 'index'])->name('Sortir-Saham');
    Route::get('/sortir-saham/{ticker}', [App\Http\Controllers\SortirController::class, 'sortirSaham'])->name('Sortir Saham');
    Route::get('/sortir-saham/{id}/Hapus-Sortir', [App\Http\Controllers\SortirController::class, 'destroySortirSaham'])->name('sortir-saham.destroy');
    Route::get('/sortir-saham/{id}/Hapus-Hasil', [App\Http\Controllers\SortirController::class, 'destroyHasilSortir'])->name('hasil-sortir.destroy');
    Route::get('/process-and-sort-stocks-daily', [App\Http\Controllers\SortirController::class, 'processAndSortStocksDaily'])->name('Process and Sort Stocks Daily');

});
