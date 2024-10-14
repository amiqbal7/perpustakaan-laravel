<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->get(); // Ambil semua data pengguna
        $totalUser = $users->count(); // Hitung jumlah total pengguna
        $categories = Category::orderByDesc('id')->get(); // Ambil semua data pengguna
        $totalCategory = $categories->count(); // Hitung jumlah total pengguna
        $books = Book::orderByDesc('id')->get(); // Ambil semua data buku
        $totalBook = $books->count(); // Hitung jumlah

        return view('frontend.dashboard.index', compact('users', 'totalBook', 'totalUser', 'totalCategory'));
    }
}
