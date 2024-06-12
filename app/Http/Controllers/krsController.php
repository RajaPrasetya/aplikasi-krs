<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class krsController extends Controller
{
    public function index()
    {
        return view('users.krs.index');
    }
    public function create()
    {
        $matakuliah = Matakuliah::orderBy('semester', 'asc')->paginate(5);
        return view('users.krs.create', ['matakuliahs' => $matakuliah]);
    }
}
