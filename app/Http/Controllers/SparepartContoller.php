<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Kendaraan;
use App\Models\Sparepart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SparepartContoller extends Controller
{
    public function KontrolSparepart()
    {
        // Mengambil data Sparepart
        $sparepart = Sparepart::all();
        return view('admin.sparepart.kontrol-sparepart', compact('sparepart'));
    }

    // Hapus Sparepart
    public function HapusSparepart($sparepart_id)
    {
        $sparepart = Sparepart::find($sparepart_id);

        // $admin->Kendaraan()->delete();
        $sparepart->delete();
        return redirect()->route('admin.kontrol-sparepart');
    }

    // Edit Akun Admin
    public function EditSparepart($sparepart_id)
    {
        $sparepart = Sparepart::findOrFail($sparepart_id);
        return view('admin.sparepart.edit-sparepart', compact('sparepart'));

        // return view('admin.sparepart.edit-sparepart', [
        //     'sparepart' => $sparepart,
        //     'categorie' => Catrgory::all()
        // ]);
    }

    // Ganti Password Admin
    public function EditInfoSparepart(Request $request, $sparepart_id)
    {
        // $ValidasiData = Validator::make($request->all(), [
        //     'nama_sparepart' => 'required'
        // ]);

        // if ($ValidasiData->fails()) {
        //     return redirect()->back()->withInput()->withErrors($ValidasiData);
        // }

        // $sparepart = Sparepart::findOrFail($sparepart_id);
        // $sparepart->nama_sparepart = $request->nama_sparepart;
        // // $sparepart->password = Hash::make($request->password);
        // $sparepart->save();

        // return redirect()->route('admin.kontrol-sparepart')->with('success', 'Password berhasil diubah');


        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'nama_sparepart' => 'required|max:255',
            'harga' => 'required|max:255',
            'merk' => 'required|max:255',
            'stok' => 'required|max:255'
        ]);

        // Cari sparepart berdasarkan $sparepart_id
        $sparepart = Sparepart::find($sparepart_id);

        // Periksa apakah sparepart ditemukan
        if (!$sparepart) {
            return redirect()->route('admin.kontrol-sparepart')->with('error', 'Sparepart tidak ditemukan');
        }

        // Update nama_sparepart dengan nilai dari request
        $sparepart->nama_sparepart = $validatedData['nama_sparepart'];
        $sparepart->harga = $validatedData['harga'];
        $sparepart->merk = $validatedData['merk'];
        $sparepart->stok = $validatedData['stok'];

        // Simpan perubahan ke dalam database
        $sparepart->save();


        //notify di simpan di sini
        // Redirect kembali ke halaman kontrol sparepart dengan pesan sukses
        return redirect()->route('admin.kontrol-sparepart')->with('success', 'Informasi sparepart berhasil diperbarui');
    }
}