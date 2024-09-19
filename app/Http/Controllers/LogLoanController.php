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
        // Fetch loan logs with relationships
        $loan_logs = LoanLog::with(['users', 'books'])->orderByDesc('id')->paginate(5);

        // Return view with loan logs data
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
