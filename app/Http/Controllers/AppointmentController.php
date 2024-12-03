<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Account;
use App\Models\Layanan;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        $title = "Data";
        $name = "Informasi Janji Temu";
        return view('info_appointment', compact('appointments', 'title', 'name'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Dokter::all();
        $patients = Pasien::all();
        $title = "Data";
        $name = "Edit Janji Temu";
        
        return view('edit_appointment', compact('appointment', 'doctors', 'patients', 'title', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Home Page / Reservasi';
        $name = 'Reservasi Janji Temu';

        return view('appointment', compact('title', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TanggalJanjiTemu' => 'required|date_format:Y-m-d',
            'JamJanjiTemu' => 'required|date_format:H:i',
            'NamaLayanan' => 'required|string',
            'CatatanTambahan' => 'nullable|string',
        ]);

        $user = Auth::user();
        $account = Account::where('email', $user->email)->first();
        $patient = Pasien::where('AccountID', $account->AccountID)->first();
        $patientId = $patient->PasienID;

        $service = Layanan::where('NamaLayanan', $request->NamaLayanan)->first();
        $serviceId = $service->LayananID;

        $doctor = Dokter::where('LayananID', $serviceId)->first();
        $doctorId = $doctor->DokterID;
        $department = $doctor->Departemen;

        $isBooked = Appointment::where('DokterID', $doctorId)
            ->where('TanggalJanjiTemu', $request->TanggalJanjiTemu)
            ->where('JamJanjiTemu', $request->JamJanjiTemu)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'The selected service is already booked at the chosen date and time.');
        }

        Appointment::create([
            'TanggalJanjiTemu' => $request->TanggalJanjiTemu,
            'JamJanjiTemu' => $request->JamJanjiTemu,
            'DokterID' => $doctorId,
            'PasienID' => $patientId,
            'Tujuan' => 'Konsultasi ' . $department,
            'Status' => 'Ongoing',
        ]);

        return redirect()->back()->with('success', 'Appointment created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TanggalJanjiTemu' => 'required|date',
            'JamJanjiTemu' => 'required|date_format:H:i',
            'DokterID' => 'required|exists:dokter,DokterID',
            'PasienID' => 'required|exists:pasien,PasienID',
            'Tujuan' => 'required|string',
            'Status' => 'required|in:Selesai,Batal,Ongoing',
        ]);

        $appointment = Appointment::findOrFail($id);
        
        // Format the time to ensure it's stored correctly
        $data = $request->all();
        $data['JamJanjiTemu'] = $request->JamJanjiTemu . ':00';

        // Check if the selected time slot is available
        $isBooked = Appointment::where('DokterID', $request->DokterID)
            ->where('TanggalJanjiTemu', $request->TanggalJanjiTemu)
            ->where('JamJanjiTemu', $data['JamJanjiTemu'])
            ->where('AppointmentID', '!=', $id)
            ->exists();

        if ($isBooked) {
            return back()->withErrors(['message' => 'The selected time slot is already booked.']);
        }

        $appointment->update($data);
        
        return redirect()->route('info_appointment')
            ->with('success', 'Janji temu berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('info_appointment')->with('success', 'Janji temu berhasil dihapus');
    }

    public function showAppointments()
    {
        $user = Auth::user();
        $appointments = [];
    
        if ($user->Role == 'pasien') {
            $patient = Pasien::where('AccountID', $user->AccountID)->first();
            if ($patient) {
                $appointments = Appointment::where('PasienID', $patient->PasienID)
                    ->with('dokter') // Eager load the doctor relationship
                    ->get();
            }
        } elseif ($user->Role == 'dokter') {
            $doctor = Dokter::where('AccountID', $user->AccountID)->first();
            if ($doctor) {
                $appointments = Appointment::where('DokterID', $doctor->DokterID)
                    ->with('pasien') // Eager load the patient relationship
                    ->get();
            }
        }
    
        return view('my_appointment', compact('appointments'));
    }
}