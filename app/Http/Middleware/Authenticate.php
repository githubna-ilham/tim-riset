<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null :  route('login-admin');
        if (!$request->expectsJson()) {
            // Periksa apakah pengguna sudah login sebagai admin
            if ($request->is('admin/*') && !$request->user('admin')) {
                return route('login-admin'); // Ganti 'login-admin' dengan nama route untuk login admin
            }

            if ($request->is('customer/*') && !$request->user('customer')) {
                return route('login-customer'); // Ganti 'login-customer' dengan nama route untuk login customer
            }
        }
    }
}
