<?php

namespace App\Http\Controllers;

use App\Models\KategoriSparepart;
use Illuminate\Http\Request;

class KategoriSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = KategoriSparepart::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriSparepart::create($validateData);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriSparepart $kategoriSparepart)
    {
        return view('categories.show', compact('kategoriSparepart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriSparepart $kategoriSparepart)
    {
        return view('categories.edit', compact('kategoriSparepart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriSparepart $kategoriSparepart)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategoriSparepart->update($validateData);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriSparepart $kategoriSparepart)
    {
        $kategoriSparepart->delete();
        return redirect()->route('categories.index');
    }
}
