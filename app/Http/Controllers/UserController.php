<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LoanLog;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(10);

        return view('frontend.Users.index', compact('users'));
    }

    public function show($id)
    {
        // Cari user berdasarkan ID yang diberikan
        $user = User::findOrFail($id);

        // Ambil log peminjaman berdasarkan user_id
        $loan_logs = LoanLog::with('books')
            ->where('user_id', $user->id) // Filter log berdasarkan user_id
            ->orderByDesc('id')
            ->paginate(5);

        // Return view dengan data user dan loan logs
        return view('frontend.Users.detail', compact('loan_logs', 'user'));
    }
}
