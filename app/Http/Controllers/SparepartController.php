<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Models\KategoriSparepart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexSparepart()
    {
        return view('admin.sparepart.index', [
            'sparepart' => Sparepart::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createSparepart()
    {
        return view('admin.sparepart.create', [
            'categories' => KategoriSparepart::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSparepart(Request $request)
    {
        try {

            $ValidateData = Validator::make($request->all(), [
                'nama_sparepart' => 'required|unique:sparepart|max:255',
                'harga' => 'required',
                'merk' => 'required|max:20',
                'stok' => 'required|numeric',
                'kategori_id' => 'required'
            ]);
    
            if ($ValidateData->fails()) {
                return redirect()->back()->withInput()->withErrors($ValidateData);
            }
    
            $sparepart['nama_sparepart'] = $request->nama_sparepart;
            $sparepart['harga'] = $request->harga;
            $sparepart['merk'] = $request->merk;
            $sparepart['stok'] = $request->stok;
            $sparepart['kategori_id'] = $request->kategori_id;
    
            Sparepart::create($sparepart);
    
            notify()->success('Berhasil menambahkan sparepart');
            return redirect()->route('admin.sparepart.index');
            
        } catch (\Exception $e) {
            notify()->success('Gagal menambahkan sparepart' . $e->getMessage());
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Sparepart $sparepart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editSparepart($sparepart_id)
    {
        return view('admin.sparepart.edit', [
            'sparepart' => Sparepart::findOrFail($sparepart_id),
            'categories' => KategoriSparepart::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSparepart(Request $request, $sparepart_id)
    {
        try {
            $ValidateData = Validator::make($request->all(), [
                'nama_sparepart' => 'required|max:255',
                'harga' => 'required',
                'merk' => 'required|max:20',
                'stok' => 'required|numeric',
                'kategori_id' => 'required'
            ]);
    
            if ($ValidateData->fails()) {
                return redirect()->back()->withInput()->withErrors($ValidateData);
            }
    
            $sparepart = Sparepart::findOrFail($sparepart_id);
            $sparepart->nama_sparepart = $request->input('nama_sparepart');
            $sparepart->harga = $request->input('harga');
            $sparepart->merk = $request->input('merk');
            $sparepart->stok = $request->input('stok');
            $sparepart->kategori_id = $request->input('kategori_id');
            $sparepart->save();
    
            notify()->success('Berhasil memperbarui data sparepart');
            return redirect()->route('admin.sparepart.index');

        } catch (\Exception $e) {
            notify()->error('Gagal memperbarui data sparepart: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function deleteSparepart($sparepart_id)
    {
        $sparepart = Sparepart::find($sparepart_id);
        $sparepart->delete();

        notify()->success('Berhasil menghapus data sparepart');
        return redirect()->route('admin.sparepart.index');
    }
}
