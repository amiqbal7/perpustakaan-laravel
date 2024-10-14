<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLoanClientController;
use App\Http\Controllers\BookLoanController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogLoanController;
use App\Http\Controllers\LogPeminjamanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReturnBookController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyUser;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/welcome', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/add/book/search', [BookController::class, 'search'])->name('admin.books.search');
});

Route::middleware(['auth', OnlyUser::class])->group(function () {
    Route::get('/BukuDipinjam', [BookLoanClientController::class, 'index'])->name('bookLoanClient.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', OnlyAdmin::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
    Route::get('/users/{user}/detail', [UserController::class, 'show'])->name('detail');


    // Route untuk Book
    Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
    // Route::put('books/{id}', [BookController::class, 'update'])->name('admin.books.update');

    Route::get('/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/add/book/store', [BookController::class, 'store'])->name('admin.books.store');

    Route::get('/kategori/create', [CategoryController::class, 'create'])->name('frontend.category.create');
    Route::get('/kategori', [CategoryController::class, 'index'])->name('frontend.category.index');
    Route::post('/add/kategori/store', [CategoryController::class, 'store'])->name('category.store');


    Route::get('/logPeminjaman', [LogLoanController::class, 'index'])->name('admin.log_loan.index');

    Route::put('/loan_logs/{id}', [ReturnBookController::class, 'update'])->name('loan_logs.update');



    //Book Loan
    Route::get('/book-loan', [BookLoanController::class, 'index'])->name('admin.bookLoan.index');
    Route::post('/book-loan', [BookLoanController::class, 'create'])->name('admin.bookLoan.create');
    Route::post('/book-loan-store', [BookLoanController::class, 'store'])->name('admin.bookLoan.store');
});







require __DIR__ . '/auth.php';
