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

class CustomerController extends Controller
{
    // Profile Customer
    public function profileCustomer()
    {
        $user = Auth::user();
        return view('customer.profile-customer', [
            'user' => $user
        ]);
    }

    // Update password customer
    public function updateCustomer(Request $request)
    {
        $ValidasiData = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed'
        ]);

        if ($ValidasiData->fails()) {
            return redirect()->back()->withInput()->withErrors($ValidasiData);
        }

        $user = Customer::find(Auth::user()->customer_id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('customer.profile-customer')->with('success', 'Password berhasil diubah');
    }
}
