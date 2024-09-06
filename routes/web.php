<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LogPeminjamanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyUser;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth', OnlyUser::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', OnlyAdmin::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/logPeminjaman', [LogPeminjamanController::class, 'index'])->name('logPeminjaman');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku');
    Route::get('/books/create', [BukuController::class, 'create'])->name('admin.books.create'); // Display form
    Route::post('/book', [BukuController::class, 'store'])->name('admin.books.store'); // Handle form submission
});







require __DIR__ . '/auth.php';
