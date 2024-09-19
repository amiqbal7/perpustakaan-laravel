<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LoanLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookLoanClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mengambil data buku yang dipinjam oleh user yang sedang login
        $borrowedBooks = LoanLog::with('books')
            ->where('user_id', $user->id)
            ->get();

        // Mengembalikan data dalam bentuk JSON atau ke view
        return view('frontend.bookLoanClient.index', compact('borrowedBooks'));
    }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
