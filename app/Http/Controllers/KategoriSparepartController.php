<?php

namespace App\Http\Controllers;

use App\Models\KategoriSparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = KategoriSparepart::all();
        return view('admin.kategorisparepart.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategorisparepart.tambah-kategori');
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
        return redirect()->route('admin.kategorisparepart.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriSparepart $kategoriSparepart)
    {
        return view('admin.kategorisparepart.show', compact('kategoriSparepart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kategori_id)
    {
        $kategori = KategoriSparepart::find($kategori_id);
        
        return view('admin.kategorisparepart.edit', compact('kategori')); //compact harus sama dengan variable kategori
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kategori_id)
    {
        $validateData = Validator::make( $request->all(), [
            'nama_kategori' => 'required|string|max:255',
        ]);

        if ($validateData->fails()) {
            return redirect()->back()->withInput()->withErrors($validateData);
        }

        $kategori = KategoriSparepart::find($kategori_id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route('admin.kategorisparepart.index')->with('diubah', 'Kategori berhasil diubah');

        // $kategori->update($validateData);
        // update nama kategori
        // $kategori->nama_kategori = $request->nama_kategori;
        // $kategori->save();
        // return redirect()->route('admin.kategorisparepart.index')->with('diubah', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kategori_id)
{
    $kategori = KategoriSparepart::find($kategori_id);

    $kategori->sparepart()->delete();
    $kategori->delete();
    return redirect()->route('admin.kategorisparepart.index')->with('berhasil', 'Kategori berhasil dihapus');
}
}
