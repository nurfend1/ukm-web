<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        // Middleware memastikan user harus login dan memiliki role admin
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar pengguna.
     */
    public function index()
    {
        $users = User::all();  // Ambil semua pengguna dari database
        return view('admin.users.index', compact('users'));  // Kirim data pengguna ke view
    }

    /**
     * Form untuk membuat pengguna baru.
     */
    public function create()
    {
        return view('admin.users.create');  // Tampilkan form untuk membuat pengguna baru
    }

    /**
     * Simpan pengguna baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Membuat pengguna baru di database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',  // Atur peran default sebagai 'user'
        ]);

        // Redirect ke daftar pengguna dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Edit informasi pengguna.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));  // Kirim data pengguna ke form edit
    }

    /**
     * Update informasi pengguna.
     */
    public function update(Request $request, User $user)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin',
        ]);

        // Update data pengguna
        $user->update($request->only(['name', 'email', 'role']));

        // Redirect kembali ke daftar pengguna dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Menampilkan detail pengguna.
     */
    public function show($id)
    {
        $user = User::findOrFail($id); // Temukan pengguna berdasarkan ID
        return view('admin.users.show', compact('user')); // Kirim data pengguna ke view
    }

    /**
     * Hapus pengguna.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
