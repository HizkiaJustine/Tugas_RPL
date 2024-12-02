<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Resepobat;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    public function index()
    {
        $resepObat = ResepObat::all();
        $title = "Data Resep Obat";
        $name = "Informasi Resep Obat";
        return view('info_resepobat', compact('resepObat', 'title', 'name'));
    }

    public function create()
    {
        $title = "Tambah Resep Obat";
        $name = "Tambah Informasi Resep Obat";
        return view('add_resepobat', compact('title', 'name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tanggal' => 'required|date_format:Y-m-d',
            'DokterID' => 'required|string|exists:dokter,DokterID',
            'PasienID' => 'required|string|exists:pasien,PasienID',
            'ListObat' => 'required|string',
            'InstruksiPenggunaanObat' => 'required|string',
        ]);

        ResepObat::create($request->all());

        return redirect()->route('info_resepobat')->with('success', 'Data resep obat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $resepObat = ResepObat::findOrFail($id);
        $title = "Edit Resep Obat";
        $name = "Edit Informasi Resep Obat";
        return view('edit_resepobat', compact('resepObat', 'title', 'name'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Tanggal' => 'required|date_format:Y-m-d',
            'DokterID' => 'required|string|exists:dokter,DokterID',
            'PasienID' => 'required|string|exists:pasien,PasienID',
            'ListObat' => 'required|string',
            'InstruksiPenggunaanObat' => 'required|string',
        ]);

        $resepObat = ResepObat::findOrFail($id);
        $resepObat->update($request->all());

        return redirect()->route('info_resepobat')->with('success', 'Data resep obat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $resepObat = ResepObat::findOrFail($id);
        $resepObat->delete();
        return redirect()->route('info_resepobat')->with('success', 'Resep obat berhasil dihapus');
    }
}
