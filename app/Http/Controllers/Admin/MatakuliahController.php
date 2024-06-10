<?php

namespace App\Http\Controllers\Admin;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliah = Matakuliah::orderBy('semester', 'asc')->paginate(5);
        return view('admin.matakuliah.index', ['matakuliahs' => $matakuliah]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => ['required', 'string', 'max:255', 'unique:'.Matakuliah::class],
            'nama_mk' => ['required', 'string', 'max:255'],
            'semester' => ['required', 'integer'],
            'sks' => ['required', 'integer'],
        ]);

        Matakuliah::create($request->all());

        return redirect(route('admin.matakuliah.index', absolute: false))->with('success', 'Matakuliah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matakuliah $matakuliah)
    {
        return view('admin.matakuliah.edit', ['mk' => $matakuliah]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $matakuliah->fill($request->validate([
            'kode_mk' => ['required', 'string', 'max:6', Rule::unique(Matakuliah::class)->ignore(str_pad($matakuliah->kode_mk, 6, '0', STR_PAD_LEFT), 'kode_mk')],
            'nama_mk' => ['required', 'string', 'max:255'],
            'semester' => ['required', 'integer'],
            'sks' => ['required', 'integer'],
        ]));

        $matakuliah->save();

        return redirect(route('admin.matakuliah.index', absolute: false))->with('success', 'Matakuliah berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect(route('admin.matakuliah.index', absolute: false))->with('success', 'Matakuliah berhasil dihapus');
    }
}
