<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UkmController extends Controller
{
    public function __construct()
    {
        // Middleware memastikan user harus login
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar UKM yang dikelola oleh pengguna.
     */
    public function index()
    {
        $userId = Auth::id();

        $ukms = Ukm::whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return view('user.ukms.index', compact('ukms'));
    }

    /**
     * Form untuk mengedit UKM.
     */
    public function edit(Ukm $ukm)
    {
        $userId = Auth::id();
        $isManager = $ukm->users()->where('user_id', $userId)->exists();

        if (!$isManager) {
            return redirect()->route('user.dashboard')->with('error', 'You are not authorized to edit this UKM.');
        }

        $users = User::all();
        return view('user.ukms.edit', compact('ukm', 'users'));
    }

    /**
     * Update informasi UKM.
     */
    public function update(Request $request, $id)
    {
        $ukm = Ukm::findOrFail($id);

        $userId = Auth::id();
        $isManager = $ukm->users()->where('user_id', $userId)->exists();

        if (!$isManager) {
            return redirect()->route('user.dashboard')->with('error', 'You are not authorized to update this UKM.');
        }

        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission' => 'nullable|string',  // Pastikan 'mission' sudah divalidasi
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'managed_users' => 'nullable|array',
            'managed_users.*' => 'exists:users,id',
        ]);

        // Update data UKM
        $ukm->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'mission' => $validatedData['mission'], // Menyimpan perubahan 'mission'
        ]);

        // Jika ada file logo yang diupload
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $ukm->update(['logo_url' => $path]);
        }

        // Sinkronkan pengguna yang mengelola UKM
        if ($request->has('managed_users')) {
            $ukm->users()->sync($validatedData['managed_users']);
        }

        return redirect()->route('user.ukms.index')->with('success', __('UKM updated successfully.'));
    }

    /**
     * Menampilkan detail UKM.
     */
    public function show(Ukm $ukm)
    {
        $ukm->load('users');
        return view('user.ukms.show', compact('ukm'));
    }

    /**
     * Hapus UKM.
     */
    public function destroy(Ukm $ukm)
    {
        $userId = Auth::id();
        $isManager = $ukm->users()->where('user_id', $userId)->exists();

        if (!$isManager) {
            return redirect()->route('user.dashboard')->with('error', 'You are not authorized to delete this UKM.');
        }

        $ukm->delete();

        return redirect()->route('user.ukms.index')->with('success', 'UKM deleted successfully');
    }
}
