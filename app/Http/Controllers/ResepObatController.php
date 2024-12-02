<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Resepobat;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    public function create()
    {
        $dokters = Dokter::all();
        $pasiens = Pasien::all();
        $obats = Obat::all();
        
        return view('add_resepobat', compact('dokters', 'pasiens', 'obats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'DokterID' => 'required',
            'PasienID' => 'required',
            'InstruksiPenggunaanObat' => 'required',
            'ObatID' => 'required|array',
            'DosisObat' => 'required|array',
        ]);

        // Insert data resep obat
        $resep = Resepobat::create([
            'DokterID' => $request->DokterID,
            'PasienID' => $request->PasienID,
            'InstruksiPenggunaanObat' => $request->InstruksiPenggunaanObat,
            'Tanggal' => now(),  // Assuming today's date as the prescription date
        ]);

        // Insert data obat ke tabel pivot
        foreach ($request->ObatID as $key => $obatID) {
            $resep->obat()->attach($obatID, ['DosisObat' => $request->DosisObat[$key]]);
        }

        return redirect()->route('info_resepobat')->with('success', 'Resep Obat berhasil ditambahkan!');
    }
}
