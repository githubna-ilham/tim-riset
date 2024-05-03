<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Kendaraan;
use App\Models\Sparepart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Profile Customer
    public function profileAdmin()
    {
        $admin = Auth::user();
        return view('admin.profile-admin', [
            'admin' => $admin
        ]);
    }

    // index and data admin
    public function indexAdmin()
    {
        // index and data admin
        $admin = Admin::all();
        return view('admin.control-admin.index', [
            'admin' => $admin
        ]);
    }


    // Hapus Akun Admin
    public function deleteAdmin($admin_id)
    {
        $admin = Admin::find($admin_id);


        $admin->delete();
        notify()->success('Berhasil menghapus akun');
        return redirect()->route('admin.control-admin.index');
    }

    // Buat Akun Admin
    public function createAdmin()
    {
        return view('admin.control-admin.create');
    }

    // Proses Buat Akun Admin
    public function storeAdmin(Request $request)
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

        notify()->success('Berhasil membuat akun');
        return redirect()->route('admin.control-admin.index');
    }

    // Edit Akun Admin
    public function editAdmin($admin_id)
    {
        $admin = Admin::findOrFail($admin_id);
        // notify()->success('Berhasil mengupdate akun');
        return view('admin.control-admin.edit', [
            'admin' => $admin
        ]);
    }

    // Ganti Password Admin
    public function resetAdmin(Request $request, $admin_id)
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

        notify()->success('Berhasil mengganti password');
        return redirect()->route('admin.control-admin.index');
    }

    // --------------------------------------------------------------------------------------------------------------------------------

    // index and data customer
    public function indexCustomer()
    {
        // Mengambil data customer
        $customer = Customer::all();
        return view('admin.control-customer.index', [
            'customers' => $customer
        ]);
    }

    // Hapus akun customer
    public function deleteCustomer($customer_id)
    {
        $customer = Customer::find($customer_id);
        $customer->delete();

        notify()->success('Berhasil menghapus akun custom');
        return redirect()->route('admin.control-customer.index');
    }

    // Buat akun customer
    public function createCustomer()
    {
        return view('admin.control-customer.create');
    }

    // Proses buat akun customer
    public function storeCustomer(Request $request)
    {
        $ValidasiData = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'username' => 'required|unique:customers|regex:/^[a-zA-Z0-9_]+$/',
            'email' => 'required|email:dns|unique:customers',
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

        notify()->success('Berhasil membuat akun');
        return redirect()->route('admin.control-customer.index');
    }

    // Edit Akun customer
    public function editCustomer($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('admin.control-customer.edit', [
            'customer' => $customer
        ]);
    }

    // Reset password customer
    public function resetCustomer(Request $request, $customer_id)
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

        notify()->success('Berhasil mengganti password');
        return redirect()->route('admin.control-customer.index');
    }
}
