<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Ukm; // Import the Ukm model
use Illuminate\Http\Request;

class InfoKegiatanController extends Controller
{
    public function index()
    {
        // Ambil semua UKM beserta kegiatan terbaru mereka
        $ukms = Ukm::with('latestActivity')->get(); // Using 'latestActivity'

        // Kirim data ke view 'infokegiatan.index'
        return view('infokegiatan.index', compact('ukms'));
    }

    public function show($id)
    {
        // Ambil data kegiatan berdasarkan id
        $kegiatan = Kegiatan::findOrFail($id);
        
        // Kirim data ke view 'infokegiatan.show'
        return view('infokegiatan.show', compact('kegiatan'));
    }
}
