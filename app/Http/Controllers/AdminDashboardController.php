<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Sparepart;
use Illuminate\Http\Request;


class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}