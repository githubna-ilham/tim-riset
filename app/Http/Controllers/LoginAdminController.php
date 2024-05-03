<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login-admin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            notify()->success('Berhasil login admin');
            // Jika berhasil login, redirect ke dashboard admin
            return redirect()->intended('/admin/dashboard');
        }

        // Jika login gagal, redirect kembali dengan pesan error
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    // logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        notify()->success('Berhasil logout');
        return redirect('/login-admin');
    }
}