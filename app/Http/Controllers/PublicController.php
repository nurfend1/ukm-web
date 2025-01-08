<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        // Ambil data UKM dan Kegiatan untuk ditampilkan di halaman
        $ukms = Ukm::all(); // Ambil semua UKM
        $kegiatans = Kegiatan::latest()->get(); // Ambil kegiatan terbaru

        // Kembalikan view dengan data yang diperlukan
        return view('public.index', compact('ukms', 'kegiatans'));
    }
}
