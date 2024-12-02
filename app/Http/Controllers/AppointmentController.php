<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Layanan;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'NamaPasien' => 'required|string',
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

    /**
     * Display the specified resource.
     */
    public function show(appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(appointment $appointment)
    {
        //
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