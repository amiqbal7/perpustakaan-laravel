<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('id')->paginate(5);

        return view('frontend.kategori', compact('categories'));
    }
}
