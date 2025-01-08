<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the redirection based on user role after login.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Jika pengguna belum login, alihkan ke halaman welcome
        if (!Auth::check()) {
            return view('public.index');
        }

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Cek peran pengguna dan alihkan ke dashboard yang sesuai
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.admin-dashboard');
            case 'user':
                return redirect()->route('user.dashboard');
            default:
                // Jika role tidak dikenali, alihkan ke halaman error
                return abort(403, 'Unauthorized action.');
        }
    }
}
