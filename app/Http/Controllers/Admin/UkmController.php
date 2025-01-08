<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\User;

class UkmController extends Controller
{
    public function __construct()
    {
        // Middleware memastikan user harus login dan memiliki role admin
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar UKM.
     */
    public function index()
    {
        $ukms = Ukm::with('managers')->get();
        $ukms = Ukm::all();  // Ambil semua UKM dari database
        return view('admin.ukms.index', compact('ukms'));  // Kirim data UKM ke view
    }

    /**
     * Form untuk membuat UKM baru.
     */
    public function create()
    {
        $users = User::all();  // Ambil semua pengguna (misalnya untuk dipilih sebagai pengurus UKM)
        return view('admin.ukms.create', compact('users'));  // Tampilkan form untuk membuat UKM baru
    }

    /**
     * Simpan UKM baru ke database.
     */
    public function store(Request $request)
{
    // Validasi input dari form
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi logo
        'managed_users' => 'nullable|array',
        'managed_users.*' => 'exists:users,id',
    ]);

    // Default data untuk UKM
    $data = [
        'name' => $request->name,
        'description' => $request->description,
    ];

    // Jika ada file logo yang diupload
    if ($request->hasFile('logo')) {
        // Simpan file logo ke folder 'public/logos'
        $path = $request->file('logo')->store('logos', 'public');
        // Tambahkan path logo ke data yang akan disimpan
        $data['logo_url'] = $path;
    }

    // Membuat UKM baru di database
    $ukm = Ukm::create($data);

    // Menyimpan relasi pengguna (pengurus) ke UKM
    if ($request->has('managed_users')) {
        $ukm->managedUsers()->sync($request->managed_users);
    }

    // Redirect ke daftar UKM dengan pesan sukses
    return redirect()->route('admin.ukms.index')->with('success', 'UKM created successfully.');
}

    /**
     * Edit informasi UKM.
     */
    public function edit(Ukm $ukm)
    {
        $users = User::all();  // Ambil semua pengguna untuk dipilih sebagai pengurus
        return view('admin.ukms.edit', compact('ukm', 'users'));  // Kirim data UKM ke form edit
    }

    /**
     * Update informasi UKM.
     */
    public function update(Request $request, $id)
{
    // Validasi data yang dikirimkan
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'mission' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'managed_users' => 'nullable|array',
        'managed_users.*' => 'exists:users,id', // Pastikan hanya user yang valid yang bisa dipilih
    ]);

    // Temukan UKM yang akan diupdate
    $ukm = Ukm::findOrFail($id);

    // Update data UKM
    $ukm->update([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'mission' => $validatedData['mission'],
    ]);

    // Jika ada file logo yang diupload
    if ($request->hasFile('logo')) {
        // Simpan file logo di folder 'public/logos' dan dapat diakses via storage
        $path = $request->file('logo')->store('logos', 'public');
        // Update path logo di database
        $ukm->update(['logo_url' => $path]);
    }

    // Sync users yang akan mengelola UKM, menyinkronkan data di tabel pivot
    if ($request->has('managed_users')) {
        $ukm->managers()->sync($validatedData['managed_users']);
    }

    // Redirect ke halaman yang sesuai dengan pesan sukses
    return redirect()->route('admin.ukms.index')->with('success', __('UKM updated successfully.'));
}


    /**
     * Menampilkan detail UKM.
     */
    public function show(Ukm $ukm)
    {
        $ukm->load('managers');
        return view('admin.ukms.show', compact('ukm'));  // Kirim data UKM ke view
    }

    /**
     * Hapus UKM.
     */
    public function destroy(Ukm $ukm)
    {
        $ukm->delete();  // Hapus data UKM

        return redirect()->route('admin.ukms.index')->with('success', 'UKM deleted successfully');
    }
}
