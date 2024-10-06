<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanLogRequest;
use App\Models\Book;
use App\Models\LoanLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loan_logs = LoanLog::with('users', 'books')
            ->orderByRaw('actual_return_date IS NULL DESC') // Urutkan yang actual_return_date-nya null terlebih dahulu
            ->paginate(5);


        // Hitung denda untuk setiap log
        foreach ($loan_logs as $log) {
            $today = Carbon::now(); // Tanggal hari ini
            $return_date = Carbon::parse($log->return_date); // Tanggal harus kembali

            // Jika buku belum dikembalikan dan tanggal pengembalian sudah lewat
            if (is_null($log->actual_return_date) && $today->greaterThan($return_date)) {
                $late_days = $today->diffInDays($return_date); // Hitung selisih hari
                $log->fine = $late_days * 2000; // Denda 2000 per hari keterlambatan
            } else {
                $log->fine = 0; // Tidak ada denda
            }
        }

        return view('frontend.loanLog.index', compact('loan_logs'));
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
