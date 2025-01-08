<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan semua kegiatan sesuai dengan peran user
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $kegiatans = Kegiatan::with('ukm')->get();
        } else {
            $kegiatans = Kegiatan::with('ukm')
                ->whereHas('ukm', function ($query) use ($user) {
                    $query->whereHas('users', function ($subQuery) use ($user) {
                        $subQuery->where('user_id', $user->id);
                    });
                })->get();
        }

        return view('kegiatan.index', compact('kegiatans'));
    }

    // Menampilkan form untuk menambah kegiatan baru
    public function create()
    {
        $user = Auth::user();

        // Admin bisa memilih semua UKM, user hanya UKM mereka sendiri
        $ukms = $user->role === 'admin' 
            ? Ukm::all() 
            : $user->ukms; // Asumsikan user memiliki relasi 'ukms'

        return view('kegiatan.create', compact('ukms'));
    }

    // Menyimpan kegiatan baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ukm_id' => 'required|exists:ukm,id',
        ]);

        $user = Auth::user();
        $ukm = Ukm::findOrFail($request->ukm_id);

        // Periksa otorisasi untuk user non-admin
        if ($user->role !== 'admin' && !$ukm->users->contains($user->id)) {
            return back()->withErrors(['ukm_id' => 'You are not authorized to create an activity for this UKM.']);
        }

        // Upload gambar jika ada
        $imagePath = $request->hasFile('image') 
            ? $request->file('image')->store('images/activities', 'public') 
            : null;

        // Simpan data kegiatan
        Kegiatan::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'image' => $imagePath,
            'ukm_id' => $ukm->id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Activity created successfully.');
    }

    // Menampilkan form untuk mengedit kegiatan
// Controller Method (Edit)
public function edit(Kegiatan $kegiatan)
{
    $user = Auth::user();

    // Hanya admin atau user yang memiliki UKM terkait yang boleh mengedit
    if ($user->role !== 'admin' && !$kegiatan->ukm->users->contains($user->id)) {
        abort(403, 'Unauthorized access');
    }

    // Ambil UKM yang dapat diakses oleh pengguna
    $ukms = $user->role === 'admin' 
        ? Ukm::all()  // Admin dapat mengakses semua UKM
        : $user->ukms;  // Pengguna biasa hanya dapat mengakses UKM yang mereka miliki

    // Pastikan $ukms tidak null sebelum memanggil isEmpty()
    if (is_null($ukms) || $ukms->isEmpty()) {
        abort(404, 'No UKMs found for this user.');
    }

    return view('kegiatan.edit', compact('kegiatan', 'ukms'));
}



    // Memperbarui kegiatan yang sudah ada
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ukm_id' => 'required|exists:ukm,id',
        ]);

        $user = Auth::user();

        // Hanya admin atau user yang memiliki UKM terkait yang boleh mengupdate
        if ($user->role !== 'admin' && !$kegiatan->ukm->users->contains($user->id)) {
            abort(403, 'Unauthorized access');
        }

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/activities', 'public');
            $kegiatan->image = $imagePath;
        }

        $kegiatan->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'ukm_id' => $request->ukm_id,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Activity updated successfully.');
    }

    // Menghapus kegiatan
    public function destroy(Kegiatan $kegiatan)
    {
        $user = Auth::user();

        // Hanya admin atau user yang memiliki UKM terkait yang boleh menghapus
        if ($user->role !== 'admin' && !$kegiatan->ukm->users->contains($user->id)) {
            abort(403, 'Unauthorized access');
        }

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Activity deleted successfully.');
    }
}
