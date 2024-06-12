<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function mahasiswa()
    {
        $user = Auth::User();
        return view('users.dashboard', compact('user'));
    }
}
