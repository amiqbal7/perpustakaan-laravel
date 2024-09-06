<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(10);

        return view('frontend.pengguna', compact('users'));
    }
}
