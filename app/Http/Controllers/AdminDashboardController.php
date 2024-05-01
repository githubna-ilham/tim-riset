<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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

    // Kontrol Akun Pengguna
    public function KontrolAkunPengguna()
    {
        // Mengambil data customer
        $customer = Customer::all();
        return view('admin.kontrol-akun-pengguna', compact('customer'));
    }

    // Hapus Akun Pengguna
    public function HapusAkunPengguna($customer_id)
    {
        $customer = Customer::find($customer_id);
        $customer->Kendaraan()->delete();
        $customer->delete();
        return redirect()->route('admin.kontrol-akun-pengguna');
    }

    // Buat Akun Pengguna
    public function BuatAkunPengguna()
    {
        return view('admin.buat-akun-pengguna');
    }

    // Proses Buat Akun Pengguna
    public function ProsesBuatAkunPengguna(Request $request)
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

    // Edit Akun Pengguna
    public function EditAkunPengguna($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('admin.edit-akun-pengguna', compact('customer'));
    }

    // Ganti Password Pengguna
    public function GantiPasswordPengguna(Request $request, $customer_id)
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

        return redirect()->route('admin.kontrol-akun-pengguna')->with('success', 'Password berhasil diubah');
    }

// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // Kontrol Akun Admin
    public function KontrolAkunAdmin()
    {
        // Mengambil data customer
        $admin = Admin::all();
        return view('admin.kontrol-akun-admin', compact('admin'));
    }


    // Hapus Akun Admin
    public function HapusAkunAdmin($admin_id)
    {
        $admin = Admin::find($admin_id);

        // $admin->Kendaraan()->delete();
        $admin->delete();
        return redirect()->route('admin.kontrol-akun-admin');
    }

    // Buat Akun Admin
    public function BuatAkunAdmin()
    {
        return view('admin.buat-akun-admin');
    }

    // Proses Buat Akun Admin
    public function ProsesBuatAkunAdmin(Request $request)
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

        $data['nama_admin'] = $request->nama_lengkap;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['no_telp'] = $request->phone;
        $data['password'] = Hash::make($request->password);

        Admin::create($data);

        return redirect()->route('admin.kontrol-akun-admin')->with('success', 'Akun berhasil ditambahkan');
    }

    // Edit Akun Admin
    public function EditAkunAdmin($admin_id)
    {
        $admin = Admin::findOrFail($admin_id);
        return view('admin.edit-akun-admin', compact('admin'));
    }

    // Ganti Password Admin
    public function GantiPasswordAdmin(Request $request, $admin_id)
    {
        $ValidasiData = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed'
        ]);

        if ($ValidasiData->fails()) {
            return redirect()->back()->withInput()->withErrors($ValidasiData);
        }

        $admin = Admin::findOrFail($admin_id);
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('admin.kontrol-akun-admin')->with('success', 'Password berhasil diubah');
    }
}
