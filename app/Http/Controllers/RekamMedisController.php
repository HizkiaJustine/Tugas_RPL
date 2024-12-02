<?php

namespace App\Http\Controllers;

use App\Models\Rekammedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = Rekammedis::all();
        return view('rekammedis.index', compact('rekamMedis'));
    }

    public function create()
    {
        return view('rekammedis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Tanggal' => 'required|date',
            'PasienID' => 'required|string',
            'DokterID' => 'required|string',
            'HasilDiagnosa' => 'required|string',
            'Perawatan' => 'required|string',
            'ResepObat' => 'required|string',
            'HasilLab' => 'nullable|string',
        ]);

        Rekammedis::create($request->all());

        return redirect()->route('rekammedis.index');
    }

    public function show($id)
    {
        $rekamMedis = Rekammedis::findOrFail($id);
        return view('rekammedis.show', compact('rekamMedis'));
    }

    public function edit($id)
    {
        $rekamMedis = Rekammedis::findOrFail($id);
        return view('rekammedis.edit', compact('rekamMedis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Tanggal' => 'required|date',
            'PasienID' => 'required|string',
            'DokterID' => 'required|string',
            'HasilDiagnosa' => 'required|string',
            'Perawatan' => 'required|string',
            'ResepObat' => 'required|string',
            'HasilLab' => 'nullable|string',
        ]);

        $rekamMedis = Rekammedis::findOrFail($id);
        $rekamMedis->update($request->all());

        return redirect()->route('rekammedis.index');
    }

    public function destroy($id)
    {
        $rekamMedis = Rekammedis::findOrFail($id);
        $rekamMedis->delete();

        return redirect()->route('rekammedis.index');
    }
}
