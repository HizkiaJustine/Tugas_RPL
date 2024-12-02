<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        $title = "Data Layanan";
        $name = "Informasi Layanan";
        return view('info_layanan', compact('layanan', 'title', 'name'));
    }

    public function create()
    {
        $title = "Tambah Layanan";
        $name = "Tambah Informasi Layanan";
        return view('add_layanan', compact('title', 'name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaLayanan' => 'required|string|max:100',
            'HargaLayanan' => 'required|numeric|between:0,999999.99',
        ]);

        Layanan::create($request->all());

        return redirect()->route('info_layanan')->with('success', 'Data layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        $title = "Edit Layanan";
        $name = "Edit Informasi Layanan";
        return view('edit_layanan', compact('layanan', 'title', 'name'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaLayanan' => 'required|string|max:100',
            'HargaLayanan' => 'required|numeric|between:0,999999.99',
        ]);

        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());

        return redirect()->route('info_layanan')->with('success', 'Data layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return redirect()->route('info_layanan')->with('success', 'Layanan berhasil dihapus');
    }
}
