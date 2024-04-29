<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Kendaraan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
