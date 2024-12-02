<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        $title = "Data Obat";
        $name = "Informasi Obat";
        return view('info_obat', compact('obat', 'title', 'name'));
    }

    public function create()
    {
        $title = "Tambah Obat";
        $name = "Tambah Informasi Obat";
        return view('add_obat', compact('title', 'name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaObat' => 'required|string|max:100',
            'TipeObat' => 'required|string|max:50',
            'TanggalKadaluarsa' => 'required|date_format:Y-m-d',
            'JumlahObat' => 'required|integer',
            'HargaObat' => 'required|numeric|between:0,999999.99',
        ]);

        Obat::create($request->all());

        return redirect()->route('info_obat')->with('success', 'Data obat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        $title = "Edit Obat";
        $name = "Edit Informasi Obat";
        return view('edit_obat', compact('obat', 'title', 'name'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaObat' => 'required|string|max:100',
            'TipeObat' => 'required|string|max:50',
            'TanggalKadaluarsa' => 'required|date',
            'JumlahObat' => 'required|integer',
            'HargaObat' => 'required|numeric|between:0,999999.99',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());

        return redirect()->route('info_obat')->with('success', 'Data obat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('info_obat')->with('success', 'Obat berhasil dihapus');
    }
}
