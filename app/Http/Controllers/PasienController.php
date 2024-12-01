<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::all();
        $title = "Data";
        $name = "Informasi Pasien";
        return view('info_pasien', compact('pasien', 'title', 'name'));
    }

    public function create()
    {
        $title = "Data";
        $name = "Informasi Pasien";
        return view('add_pasien', compact('title', 'name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaPasien' => 'required|string|max:100',
            'UmurPasien' => 'required|integer',
            'AlamatPasien' => 'required|string|max:255',
            'BeratBadanPasien' => 'required|numeric|between:0,999.99',
            'TinggiBadanPasien' => 'required|numeric|between:0,999.99',
            'TanggalLahirPasien' => 'required|date_format:Y-m-d',
            'JenisKelamin' => 'required|in:L,P',
            'NomorHP' => 'required|string|max:15',
            'AccountID' => 'nullable|string|exists:account,AccountID',
        ]);

        Pasien::create($request->all());

        return redirect()->route('info_pasien')->with('success', 'Data pasien berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        $title = "Data";
        $name = "Informasi Pasien";
        return view('edit_pasien', compact('pasien', 'title', 'name'));
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->route('info_pasien')->with('success', 'Pasien berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaPasien' => 'required|string|max:100',
            'UmurPasien' => 'required|integer',
            'AlamatPasien' => 'required|string|max:255',
            'BeratBadanPasien' => 'required|numeric|between:0,999.99',
            'TinggiBadanPasien' => 'required|numeric|between:0,999.99',
            'TanggalLahirPasien' => 'required|date',
            'JenisKelamin' => 'required|in:L,P',
            'NomorHP' => 'required|string|max:15',
            'AccountID' => 'nullable|string|exists:account,AccountID',
        ]);
    
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());
    
        return redirect()->route('info_pasien')->with('success', 'Data pasien berhasil diperbarui');
    }
}