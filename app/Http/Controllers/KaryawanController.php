<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        $title = "Data";
        $name = "Informasi Karyawan";
        return view('info_karyawan', compact('karyawan', 'title', 'name'));
    }

    public function create()
    {
        $title = "Data";
        $name = "Informasi Karyawan";
        return view('add_karyawan', compact('title', 'name'));
    }

    public function store(Request $request) { $request->validate([ 'KaryawanID' => 'required|string|max:255', 'NamaKaryawan' => 'required|string|max:100', 'Jabatan' => 'required|string|max:100', 'NomorHP' => 'required|string|max:15', 'AlamatKaryawan' => 'required|string', 'JenisKelamin' => 'required|in:L,P', 'AccountID' => 'nullable|string|exists:account,AccountID', ]); Karyawan::create($request->all()); return redirect('/')->with('success', 'Data karyawan berhasil ditambahkan'); }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $title = "Data";
        $name = "Informasi Karyawan";
        return view('edit_karyawan', compact('karyawan', 'title', 'name'));
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('info_karyawan')->with('success', 'Karyawan berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'KaryawanID' => 'required|string|max:255',
            'NamaKaryawan' => 'required|string|max:100',
            'Jabatan' => 'required|string|max:100',
            'NomorHP' => 'required|string|max:15',
            'AlamatKaryawan' => 'required|string',
            'JenisKelamin' => 'required|in:L,P',
            'AccountID' => 'nullable|string|exists:account,AccountID',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('info_karyawan')->with('success', 'Data karyawan berhasil diperbarui');
    }
}
