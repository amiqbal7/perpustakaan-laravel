<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\LoanLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReturnBookController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     // Ambil semua user
    //     $users = User::orderByDesc('id')->get();

    //     // Default, ambil semua buku
    //     $books = collect();

    //     // Jika ada user yang dipilih, ambil buku yang dipinjam oleh user tersebut
    //     if ($request->has('user_id')) {
    //         $books = LoanLog::where('user_id', $request->user_id)
    //                     ->with('books') // Relasi dengan model Book
    //                     ->get()
    //                     ->pluck('books'); // Ambil hanya data buku
    //     }

    //     return view('frontend.bookLoan.index', compact('users', 'books'));
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Temukan data peminjaman buku berdasarkan ID
    $loan_log = LoanLog::findOrFail($id);

    // Perbarui tanggal pengembalian aktual dengan timestamp saat ini
    $loan_log->actual_return_date = Carbon::now();

    // Ambil data buku terkait
    $book = Book::findOrFail($loan_log->book_id);

    // Tambah jumlah buku sebanyak 1 karena buku sudah dikembalikan
    $book->increment('quantity');

    // Simpan pembaruan data peminjaman
    $loan_log->save();

    // Arahkan kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Buku berhasil dikembalikan dan stok diperbarui.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
