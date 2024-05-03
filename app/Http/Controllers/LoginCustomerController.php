<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCustomerController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login-customer');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            notify()->success('Berhasil login customer');
            // Jika berhasil login, redirect ke dashboard customer
            return redirect()->intended('/customer/dashboard');
        }

        // Jika login gagal, redirect kembali dengan pesan error
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    // logout
    public function logout(Request $request)
    {
        Auth::guard()->logout();
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        notify()->success('Berhasil logout');
        return redirect('/login');
    }
}