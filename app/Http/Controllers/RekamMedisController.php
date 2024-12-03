<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Rekammedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::all();
        $title = "Data";
        $name = "Informasi Rekam Medis";
        return view('info_rekammedis', compact('rekamMedis', 'title', 'name'));
    }

    public function create()
    {
        $title = "Data";
        $name = "Tambah Rekam Medis";
        return view('add_rekammedis', compact('title', 'name'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Tanggal' => 'required|date_format:Y-m-d',
            'NamaPasien' => 'required|string|max:100',
            'NamaDokter' => 'required|string|max:100',
            'HasilDiagnosa' => 'required|string',
            'Perawatan' => 'required|string',
            'ResepObat' => 'required|string',
            'HasilLab' => 'required|string',
            'HasilKonsultasi' => 'required|in:Rawat Inap,Selesai,Rujukan',
            'RumahSakitRujukan' => 'required_if:HasilKonsultasi,Rujukan|in:Rumah Sakit Hermina,Rumah Sakit Mitra Keluarga,Rumah Sakit Cipto Mangunkusumo,Rumah Sakit Siloam,Rumah Sakit Harapan Kita',
        ]);
    
        $pasien = Pasien::where('NamaPasien', $request->NamaPasien)->first();
        $dokter = Dokter::where('NamaDokter', $request->NamaDokter)->first();
    
        if (!$pasien || !$dokter) {
            return redirect()->back()->withErrors(['error' => 'Pasien atau Dokter tidak ditemukan']);
        }
    
        RekamMedis::create([
            'Tanggal' => $validatedData['Tanggal'],
            'PasienID' => $pasien->PasienID,
            'DokterID' => $dokter->DokterID,
            'HasilDiagnosa' => $validatedData['HasilDiagnosa'],
            'Perawatan' => $validatedData['Perawatan'],
            'ResepObat' => $validatedData['ResepObat'],
            'HasilLab' => $validatedData['HasilLab'],
            'HasilKonsultasi' => $validatedData['HasilKonsultasi'],
            'RumahSakitRujukan' => $validatedData['HasilKonsultasi'] === 'Rujukan' ? $validatedData['RumahSakitRujukan'] : null,
        ]);
    
        return redirect()->route('info_rekammedis')->with('success', 'Data rekam medis berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $title = "Data";
        $name = "Edit Rekam Medis";
        return view('edit_rekammedis', compact('rekamMedis', 'title', 'name'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Tanggal' => 'required|date_format:Y-m-d',
            'PasienID' => 'required|string|max:100',
            'DokterID' => 'required|string|max:100',
            'HasilDiagnosa' => 'required|string',
            'Perawatan' => 'required|string',
            'ResepObat' => 'required|string',
            'HasilLab' => 'required|string',
            'HasilKonsultasi' => 'required|in:Rawat Inap,Selesai,Rujukan',
            'RumahSakitRujukan' => 'required_if:HasilKonsultasi,Rujukan|in:Rumah Sakit Hermina,Rumah Sakit Mitra Keluarga,Rumah Sakit Cipto Mangunkusumo,Rumah Sakit Siloam,Rumah Sakit Harapan Kita',
        ]);
    
        $rekamMedis = RekamMedis::findOrFail($id);
    
        $rekamMedis->update([
            'Tanggal' => $validatedData['Tanggal'],
            'PasienID' => $validatedData['PasienID'],
            'DokterID' => $validatedData['DokterID'],
            'HasilDiagnosa' => $validatedData['HasilDiagnosa'],
            'Perawatan' => $validatedData['Perawatan'],
            'ResepObat' => $validatedData['ResepObat'],
            'HasilLab' => $validatedData['HasilLab'],
            'HasilKonsultasi' => $validatedData['HasilKonsultasi'],
            'RumahSakitRujukan' => $validatedData['HasilKonsultasi'] === 'Rujukan' ? $validatedData['RumahSakitRujukan'] : null,
        ]);
    
        return redirect()->route('info_rekammedis')->with('success', 'Data rekam medis berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->delete();
        return redirect()->route('info_rekammedis')->with('success', 'Rekam medis berhasil dihapus');
    }

    public function showPatientRecords()
    {
        $user = Auth::user();
        $records = [];
    
        if ($user->Role == 'pasien') {
            $patient = Pasien::where('AccountID', $user->AccountID)->first();
            if ($patient) {
                $records = RekamMedis::where('PasienID', $patient->PasienID)
                    ->with('dokter')
                    ->get();
            }
        }
    
        return view('my_rekammedis', compact('records'));
    }    
}
