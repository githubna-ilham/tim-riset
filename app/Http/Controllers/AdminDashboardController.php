<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Kendaraan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function KontrolPengguna()
    {
        // Mengambil data customer
        $customer = Customer::all();
        return view('admin.kontrol-pengguna', compact('customer'));
    }

    public function HapusAkun($customer_id)
    {
        $customer = Customer::find($customer_id);
        $customer->Kendaraan()->delete();
        $customer->delete();
        return redirect()->route('admin.kontrol-pengguna');
    }

    public function BuatAkun()
    {
        return view('admin.buat-akun-pengguna');
    }

    public function ProsesBuatAkun(Request $request)
    {
        $ValidasiData = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'username' => 'required|unique:customers|regex:/^[a-zA-Z0-9_]+$/',
            'email' => 'required|email:dns',
            'phone' => 'required|numeric',
            'password' => 'required|min:8|confirmed'
        ], [
            'username.regex' => 'Special Character hanya bisa "_"'
        ]);

        if ($ValidasiData->fails()) {
            return redirect()->back()->withInput()->withErrors($ValidasiData);
        }

        $data['nama_customer'] = $request->nama_lengkap;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['no_telp'] = $request->phone;
        $data['password'] = Hash::make($request->password);

        Customer::create($data);

        return redirect()->route('admin.kontrol-pengguna')->with('success', 'Akun berhasil ditambahkan');
    }

    public function EditAkun($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('admin.edit-akun-pengguna', compact('customer'));
    }

    public function GantiPassword(Request $request, $customer_id)
    {
        $ValidasiData = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed'
        ]);

        if ($ValidasiData->fails()) {
            return redirect()->back()->withInput()->withErrors($ValidasiData);
        }

        $customer = Customer::findOrFail($customer_id);
        $customer->password = Hash::make($request->password);
        $customer->save();

        return redirect()->route('admin.kontrol-pengguna')->with('success', 'Password berhasil diubah');
    }
}
