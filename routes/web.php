<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StrukController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/asd', function () {
    return view('layouts.coba', ["title" => "Dashboard"]);
});

Route::middleware('auth')->group(function () {
    Route::get('/', [ProdukController::class, 'main'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/produk-tambah', [ProdukController::class, 'create']);
    Route::post('/produk-tambah', [ProdukController::class, 'store']);
    Route::get('/produk-hapus/{produk_id}', [ProdukController::class, 'destroy']);
    Route::get('/produk-edit/{produk_id}', [ProdukController::class, 'edit']);
    Route::post('/produk-edit/{produk_id}', [ProdukController::class, 'update']);

    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/pelanggan-detail/{pelanggan_id}', [PelangganController::class, 'show']);
    Route::get('/delete-pelangan/{pelanggan_id}', [PelangganController::class, 'destroy']);
    Route::get('/edit-pelanggan/{pelanggan_id}', [PelangganController::class, 'edit']);
    Route::post('/edit-pelanggan/{pelanggan_id}', [PelangganController::class, 'update']);
    Route::post('/pembayaran/{pelanggan_id}', [PelangganController::class, 'pembayaran']);


    Route::get('/pembelian', [PembelianController::class, 'index']);
    Route::get('/pembelian-lanjutan', [PembelianController::class, 'create']);
    Route::post('/proses', [PembelianController::class, 'store']);

    Route::get('/detail', [DetailController::class, 'index']);
    Route::get('/detail-pembelian/{produk_id}', [DetailController::class, 'show']);

    Route::get('/struk', [StrukController::class, 'index']);
    Route::get('/struk-detail/{penjualan_id}', [StrukController::class, 'show']);

    Route::get('/user-kelola', [UserController::class, 'index']);
    Route::get('/user-delete/{id}', [UserController::class, 'destroy']);
    Route::get('/user-edit/{id}', [UserController::class, 'edit']);
    Route::post('/user-edit/{id}', [UserController::class, 'update']);

    Route::get('/logs', [LogController::class, 'index']);

});

require __DIR__ . '/auth.php';
