<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Beranda;
use App\Livewire\User;
use App\Livewire\Laporan;
use App\Livewire\Produk;
use App\Livewire\Transaksi;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// sebelum mengakses 5 url ini perlu login pake middleware

// Versi rumit
// Route::get('home', Beranda::class)->middleware(['auth'])->name('home');
// Route::get('user', User::class)->middleware(['auth'])->name('user');
// Route::get('laporan', Laporan::class)->middleware(['auth'])->name('laporan');
// Route::get('produk', Produk::class)->middleware(['auth'])->name('produk');
// Route::get('transaksi', Transaksi::class)->middleware(['auth'])->name('transaksi');

// versi simpel
Route::middleware(['auth'])->group(function () {
    Route::get('home', Beranda::class)->name('home');
    Route::get('user', User::class)->name('user');
    Route::get('laporan', Laporan::class)->name('laporan');
    Route::get('produk', Produk::class)->name('produk');
    Route::get('transaksi', Transaksi::class)->name('transaksi');
});
