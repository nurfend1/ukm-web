<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ukm;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Middleware untuk memastikan pengguna sudah login dan memiliki akses admin
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan halaman dashboard admin.
     */
    public function dashboard()
{
    $this->authorizeAdmin(); // Memastikan user adalah admin

    // Ambil data jumlah pengguna, UKM, dan kegiatan
    $totalUsers = User::count();
    $totalUkms = Ukm::count();
    $totalKegiatan = Kegiatan::count();

    // Kirim data ke view
    return view('admin.dashboard', compact('totalUsers', 'totalUkms', 'totalKegiatan'));
}


    /**
     * Tampilkan daftar pengguna.
     */
    public function showUsers()
    {
        $this->authorizeAdmin();
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Form untuk membuat pengguna baru.
     */
    public function createUser()
    {
        $this->authorizeAdmin();
        return view('admin.users.create');
    }

    /**
     * Simpan pengguna baru ke database.
     */
    public function storeUser(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Edit informasi pengguna.
     */
    public function editUser(User $user)
    {
        $this->authorizeAdmin();
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update informasi pengguna.
     */
    public function updateUser(Request $request, User $user)
    {
        $this->authorizeAdmin();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin',
        ]);

        $user->update($request->only(['name', 'email', 'role']));

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Hapus pengguna.
     */
    public function deleteUser(User $user)
    {
        $this->authorizeAdmin();
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }


    /**
     * Periksa apakah pengguna memiliki peran admin.
     */
    private function authorizeAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
    }
}
