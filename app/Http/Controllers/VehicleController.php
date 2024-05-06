<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class VehicleController extends Controller
{
    public function indexVehicle()
    {
        $customer_id = Auth::guard('customer')->user()->customer_id;
        $vehicle = Kendaraan::where('customer_id', $customer_id)->get();
        return view('customer.vehicle.index', [
            'vehicles' => $vehicle
        ]);
    }

    public function detailVehicle()
    {
        $customer_id = Auth::guard('customer')->user()->customer_id;
        $vehicles = Kendaraan::where('customer_id', $customer_id)->first();

        return view('customer.vehicle.detail',[
            'vehicle' => $vehicles
        ]);
    }

    public function createVehicle()
    {
        return view('customer.vehicle.create');
    }
}
