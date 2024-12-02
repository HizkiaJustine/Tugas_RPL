<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all();
        $title = "Data";
        $name = "Informasi Dokter";
        return view('info_dokter', compact('dokter', 'title', 'name'));
    }

    public function create()
    {
        $title = "Data";
        $name = "Informasi Dokter";
        return view('add_dokter', compact('title', 'name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'DokterID' => 'required|string|max:255',
            'NamaDokter' => 'required|string|max:100',
            'Departemen' => 'required|string|max:100',
            'AlamatDokter' => 'required|string',
            'NomorHP' => 'required|string|max:15',
            'FotoDokter' => 'required|string',
            'LayananID' => 'required|string|exists:layanan,LayananID',
            'AccountID' => 'nullable|string|exists:account,AccountID',
        ]);

        Dokter::create($request->all());

        return redirect('/')->with('success', 'Data dokter berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $title = "Data";
        $name = "Informasi Dokter";
        return view('edit_dokter', compact('dokter', 'title', 'name'));
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();
        return redirect()->route('info_dokter')->with('success', 'Dokter berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'DokterID' => 'required|string|max:255',
            'NamaDokter' => 'required|string|max:100',
            'Departemen' => 'required|string|max:100',
            'AlamatDokter' => 'required|string',
            'NomorHP' => 'required|string|max:15',
            'FotoDokter' => 'required|string',
            'LayananID' => 'required|string|exists:layanan,LayananID',
            'AccountID' => 'nullable|string|exists:account,AccountID',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());

        return redirect()->route('info_dokter')->with('success', 'Data dokter berhasil diperbarui');
    }
}
