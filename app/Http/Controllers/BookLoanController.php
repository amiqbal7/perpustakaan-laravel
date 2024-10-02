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
        $users = User::where('role_id', 2)->orderByDesc('id')->get(); // Ambil semua data pengguna
        $books = Book::orderByDesc('id')->get(); // Ambil semua data buku
        return view('frontend.bookLoan.index', compact('users', 'books'));
    }

    public function store(StoreLoanLogRequest $request)
    {
        // Data validasi sudah ditangani oleh StoreLoanLogRequest

        // Ambil buku yang akan dipinjam
        $book = Book::find($request->book_id);

        // Cek apakah buku masih tersedia (quantity > 0)
        if ($book->quantity > 0) {
            // Buat entri baru di loan_logs
            LoanLog::create([
                'user_id' => $request->user_id,
                'book_id' => $request->book_id,
                'loan_date' => $request->loan_date ?? Carbon::now(), // gunakan tanggal peminjaman atau sekarang
                'return_date' => $request->return_date ?? Carbon::now()->addDays(7), // default waktu pengembalian 2 minggu
                'actual_return_date' => $request->actual_return_date, // bisa null
            ]);

            // Kurangi jumlah buku sebanyak 1
            $book->decrement('quantity');

            // Redirect ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Peminjaman buku telah berhasil dicatat.');
        } else {
            // Jika buku tidak tersedia
            return redirect()->back()->with('error', 'Maaf, buku ini sedang tidak tersedia.');
        }
    }
}
