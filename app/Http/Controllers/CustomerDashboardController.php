<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');

    }

    public function Profile()
    {
        $user = Auth::user();
        return view('customer.profile-pengguna', compact('user'));
    }

    public function GantiPassword(Request $request)
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

        return redirect()->route('customer.profile')->with('success', 'Password berhasil diubah');
    }

}
