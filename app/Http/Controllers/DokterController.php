<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'NamaDokter' => 'required|string|max:100',
            'Departemen' => 'required|string|max:100',
            'AlamatDokter' => 'required|string|max:255',
            'NomorHP' => 'required|string|max:15',
            'LayananID' => 'nullable|integer',
            'AccountID' => 'nullable|integer',
            'FotoDokter' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('FotoDokter')) {
            $data['FotoDokter'] = $request->file('FotoDokter')->store('foto_dokter', 'public');
        }

        Dokter::create($data);

        return redirect()->route('info_dokter')->with('success', 'Data dokter berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $title = "Data";
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
            'LayananID' => 'nullable|integer',
            'AccountID' => 'nullable|integer',
            'FotoDokter' => 'nullable|image|max:2048',
        ]);

        $dokter = Dokter::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('FotoDokter')) {
            $data['FotoDokter'] = $request->file('FotoDokter')->store('foto_dokter', 'public');
        }

        $dokter->update($data);

        return redirect()->route('info_dokter')->with('success', 'Data dokter berhasil diperbarui');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        if ($dokter->FotoDokter) {
            Storage::delete('public/' . $dokter->FotoDokter);
        }
        $dokter->delete();
        return redirect()->route('info_dokter')->with('success', 'Dokter berhasil dihapus');
    }
}
