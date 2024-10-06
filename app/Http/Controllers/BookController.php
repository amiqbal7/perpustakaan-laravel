<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderByDesc('id')->paginate(5);

        if (Auth::user() && Auth::user()->role_id == 1) {
            return view('frontend.book.index', compact('books'));
        } else {
            return view('frontend.book.indexUser', compact('books'));
        }
    }


    public function create()
    {
        $categories = Category::orderByDesc('id')->get();
        return view('frontend.book.create', compact('categories')); // Assuming your form view is located at resources/views/admin/books/create.blade.php
    }

    public function search(Request $request)
    {
        // Ambil query pencarian dari input form
        $searchQuery = $request->input('search');

        // Cari buku berdasarkan title atau author yang mengandung query pencarian
        $books = Book::where('title', 'LIKE', "%{$searchQuery}%")
            ->orWhere('author', 'LIKE', "%{$searchQuery}%")
            ->orderByDesc('id')
            ->paginate(5);

         // Cek apakah role_id adalah 1
        if (Auth::user() && Auth::user()->role_id == 1) {
            return view('frontend.book.index', compact('books', 'searchQuery'));
        } else {
            return view('frontend.book.indexUser', compact('books', 'searchQuery'));
        }
    }


    public function edit($id)
    {
        $books = Book::findOrFail($id);
        $categories = Category::orderByDesc('id')->get();

        return view('frontend.book.edit', compact('books', 'categories'));
    }
    public function store(StoreBookRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // Handle the cover image if present
            if ($request->hasFile('cover_image')) {
                $coverImagePath = $request->file('cover_image')->store('cover_images/' . date('Y/m/d'), 'public');
                $validated['cover_image'] = $coverImagePath;
            }

            // Generate a slug from the title
            $validated['slug'] = Str::slug($validated['title']);

            // Create the book entry in the database
            $book = Book::create($validated);
        });

        return redirect()->route('dashboard')->with('success', 'Book added successfully.');
    }
}
