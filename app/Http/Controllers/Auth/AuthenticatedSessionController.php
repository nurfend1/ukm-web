<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input login
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Coba autentikasi pengguna
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Regenerasi sesi untuk keamanan
            $request->session()->regenerate();

            // Redirect pengguna berdasarkan role
            return $this->redirectUserBasedOnRole(Auth::user());
        }

        // Jika autentikasi gagal, kembalikan dengan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Redirect user based on their role.
     */
    private function redirectUserBasedOnRole($user): RedirectResponse
    {
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard'); // Admin dashboard route
            case 'user':
                return redirect()->route('user.dashboard'); // User dashboard route
            default:
                return redirect()->route('public.index'); // Redirect jika role tidak dikenali
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout pengguna
        Auth::guard('web')->logout();

        // Invalidate sesi
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
