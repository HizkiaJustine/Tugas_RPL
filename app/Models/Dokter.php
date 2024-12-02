<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all();
        $title = "Data Dokter";
        $name = "Informasi Dokter";
        return view('info_dokter', compact('dokter', 'title', 'name'));
    }

    public function create()
    {
        $title = "Data Dokter";
        $name = "Informasi Dokter";
        return view('add_dokter', compact('title', 'name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaDokter' => 'required|string|max:100',
            'Departemen' => 'required|string|max:100',
            'AlamatDokter' => 'required|string|max:255',
            'NomorHP' => 'required|string|max:15',
            'FotoDokter' => 'nullable|image|max:2048', // File foto harus berupa gambar dengan ukuran maksimal 2 MB
            'LayananID' => 'nullable|string|exists:layanan,LayananID',
            'AccountID' => 'nullable|string|exists:account,AccountID',
        ]);

        if ($request->hasFile('FotoDokter')) {
            $path = $request->file('FotoDokter')->store('public/foto_dokter');
            $request->merge(['FotoDokter' => $path]);
        }

        Dokter::create($request->all());

        return redirect()->route('info_dokter')->with('success', 'Data dokter berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $title = "Edit Dokter";
        $name = "Informasi Dokter";
        return view('edit_dokter', compact('dokter', 'title', 'name'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaDokter' => 'required|string|max:100',
            'Departemen' => 'required|string|max:100',
            'AlamatDokter' => 'required|string|max:255',
            'NomorHP' => 'required|string|max:15',
            'FotoDokter' => 'nullable|image|max:2048',
            'LayananID' => 'nullable|string|exists:layanan,LayananID',
            'AccountID' => 'nullable|string|exists:account,AccountID',
        ]);

        $dokter = Dokter::findOrFail($id);

        if ($request->hasFile('FotoDokter')) {
            $path = $request->file('FotoDokter')->store('public/foto_dokter');
            $request->merge(['FotoDokter' => $path]);
        }

        $dokter->update($request->all());

        return redirect()->route('info_dokter')->with('success', 'Data dokter berhasil diperbarui');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('info_dokter')->with('success', 'Dokter berhasil dihapus');
    }
}
