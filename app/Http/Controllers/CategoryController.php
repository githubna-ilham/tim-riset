<?php

namespace App\Http\Controllers;

use App\Models\KategoriSparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * tampil index category.
     */
    public function indexCategory()
    {
        $category = KategoriSparepart::all();

        return view('admin.category.index', ['categories' => $category]);
    }

    /**
     * tampil file create.
     */
    public function createCategory()
    {
        return view('admin.category.create');
    }

    /**
     * proses create.
     */
    public function storeCategory(Request $request)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriSparepart::create($validateData);
        notify()->success('Kategori berhasil ditambahkan');
        return redirect()->route('admin.category.index');
    }

    /**
     * tampil detail.
     */
    // public function show(KategoriSparepart $kategoriSparepart)
    // {
    //     return view('admin.category.show', compact('kategoriSparepart'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function editCategory($kategori_id)
    {
        $category = KategoriSparepart::find($kategori_id);
        return view('admin.category.edit', ['categories' => $category]);
    }

    /**
     * proses edit.
     */
    public function updateCategory(Request $request, $kategori_id)
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
        notify()->success('Kategori berhasil diubah');
        return redirect()->route('admin.category.index');

        // $kategori->update($validateData);
        // update nama kategori
        // $kategori->nama_kategori = $request->nama_kategori;
        // $kategori->save();
        // return redirect()->route('admin.kategorisparepart.index')->with('diubah', 'Kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCategory($kategori_id)
{
    $kategori = KategoriSparepart::find($kategori_id);

    // $kategori->sparepart()->delete();
    // $kategori->sparepart()->detach(); detach() untuk menghapus relasi many to many
    $kategori->sparepart()->update(['kategori_id' => null]); // update() untuk menghapus relasi one to many
    $kategori->delete();
    notify()->success('Category berhasil dihapus');
    return redirect()->route('admin.category.index');
}
}
