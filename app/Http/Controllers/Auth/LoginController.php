<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menentukan redirect URL setelah login berdasarkan role user
     *
     * @return string
     */
    protected function redirectTo()
    {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return '/admin/dashboard'; // Redirect ke halaman admin dashboard
        } elseif ($role === 'user') {
            return '/user/dashboard'; // Redirect ke halaman user dashboard
        }

        return '/dashboard'; // Redirect default jika role tidak cocok
    }
}
