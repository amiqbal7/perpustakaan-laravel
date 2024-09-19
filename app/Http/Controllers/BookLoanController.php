<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanLogRequest;
use App\Models\Book;
use App\Models\LoanLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->get(); // Ambil semua data pengguna
        $books = Book::orderByDesc('id')->get(); // Ambil semua data pengguna
        return view('frontend.bookLoan.index', compact('users', 'books'));
    }

    public function store(StoreLoanLogRequest $request)
    {
        // Data validasi sudah ditangani oleh StoreLoanLogRequest

        // Buat entri baru di loan_logs
        LoanLog::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => $request->loan_date ?? Carbon::now(), // gunakan tanggal peminjaman atau sekarang
            'return_date' => $request->return_date ?? Carbon::now()->addDays(7), // default waktu pengembalian 2 minggu
            'actual_return_date' => $request->actual_return_date, // bisa null
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Peminjaman buku telah berhasil dicatat.');
    }
}
