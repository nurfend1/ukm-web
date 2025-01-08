<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // Menambahkan penggunaan DB facade
use App\Models\User;
use App\Models\Ukm;

class UserController extends Controller
{
    // Menampilkan dashboard berdasarkan peran pengguna
    public function dashboard()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login
        
        // Jika pengguna adalah admin
        if ($user->role === 'admin') {
            // Ambil semua pengguna beserta UKM yang mereka kelola
            $users = User::with('managedUkms')->get();
            return view('admin.dashboard', compact('users')); // Pastikan admin-dashboard ada
        }

        // Jika pengguna adalah user biasa
        elseif ($user->role === 'user') {
            // Ambil UKM yang dikelola oleh pengguna yang sedang login
            $ukms = $user->managedUkms; // Mengambil relasi 'managedUkms'
            
            // Pastikan untuk mengirimkan koleksi kosong jika tidak ada UKM yang dikelola
            return view('user.dashboard', compact('ukms')); // Pastikan user-dashboard ada
        }

        // Jika bukan admin atau user biasa, larang akses
        abort(403, 'Unauthorized action.');
    }

    // Menampilkan profil pengguna
    public function profile()
    {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Unauthorized action.');
        }

        return view('user.profile'); // Pastikan user.profile ada
    }

    // Menampilkan pengaturan akun pengguna
    public function settings()
    {
        if (Auth::user()->role !== 'user') {
            abort(403, 'Unauthorized action.');
        }

        return view('user.settings'); // Pastikan user.settings ada
    }
    public function create()
    {
        return view('admin.users.create'); // Pastikan path dan nama view sesuai
    }
    // Update profil pengguna
    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Update data pengguna menggunakan query builder
        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }

    // Update password pengguna
    public function updatePassword(Request $request)
    {
        // Validasi input password
        $request->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed|different:current_password',
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();
        
        // Memeriksa apakah password lama cocok
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Jika password valid, lakukan pembaruan password
        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'password' => Hash::make($request->input('password')),
            ]);

        return redirect()->route('user.settings')->with('success', 'Password updated successfully.');
    }

    // Menampilkan riwayat aktivitas pengguna
    public function activity()
    {
        $user = Auth::user(); // Ambil pengguna yang sedang login

        // Mengambil semua kegiatan yang dimiliki oleh pengguna
        $kegiatan = $user->kegiatan; // Mengambil relasi 'kegiatan' yang sudah didefinisikan di model User

        return view('user.activity', compact('kegiatan')); // Pastikan user.activity ada
    }
    public function edit($id)
{
    
    // Temukan pengguna berdasarkan ID
    $user = User::findOrFail($id);

    // Kirimkan data pengguna ke view untuk diedit
    return view('user.edit', compact('user'));
}


    // Update UKM
    public function update(Request $request, $id)
    {
        $ukm = Ukm::findOrFail($id); // Temukan UKM berdasarkan ID

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update data UKM
        $ukm->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('user.ukms.index')->with('success', 'UKM updated successfully.');
    }
}
