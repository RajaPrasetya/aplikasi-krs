<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;


class krsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findOrFail(Auth::User()->NIM);
        $matakuliahs = $user->matakuliahs;
        return view('users.krs.index', ['user' => $user, 'matakuliahs' => $matakuliahs]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::User()->NIM;
        $user = User::findOrFail($user);
        $selectmatakuliahs = $user->matakuliahs()->pluck('matakuliahs.kode_mk')->toArray();
        $matakuliah = Matakuliah::orderBy('semester', 'asc')->paginate(5);
        return view('users.krs.create', ['matakuliahs' => $matakuliah, 'selectmatakuliahs' => $selectmatakuliahs]);
    }

    public function store(Request $request)
    {
        $krs = Auth::user()->NIM;
        $krs = User::findOrFail($krs);
        foreach ($request->kode_mk as $kodeMK) {
            if (!$krs->matakuliahs()->where('matakuliahs.kode_mk')->exists())
                $krs->matakuliahs()->attach($kodeMK, ['nilai' => 0]);
        }
        return redirect(route('users.krs.index', absolute: false))->with('success', 'KRS berhasil ditambahkan');
    }

    public function show()
    {
        $khs = Auth::user()->NIM;
        $khs = User::findOrFail($khs);
        $khs = $khs->matakuliahs()->get();
        return view('users.khs.index', ['khs' => $khs]);
    }
}
