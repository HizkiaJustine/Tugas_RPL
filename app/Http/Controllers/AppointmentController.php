<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Dokter;
use App\Models\Layanan;
use App\Models\Pasien;
use Illuminate\Http\Request;

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
        // dd($request->all());
        $request->validate([
            'NamaPasien' => 'required|string',
            'TanggalJanjiTemu' => 'required|date_format:Y-m-d',
            'JamJanjiTemu' => 'required|date_format:H:i',
            'NamaLayanan' => 'required|string',
            'CatatanTambahan' => 'nullable|string',
        ]);
        

        $service = Layanan::where('NamaLayanan', $request->NamaLayanan)->first();
        $serviceId = $service->LayananID;


        // Find the patient by name
        $patient = Pasien::where('NamaPasien', $request->NamaPasien)->first();
        $patientId = $patient->PasienID;

        // Find the docter by layananID
        $doctor = Dokter::where('LayananID', $serviceId)->first();
        $doctorId = $doctor->DokterID;
        $department = $doctor->Departemen;

        // Check if the service is already booked at the same date and time
        $isBooked = appointment::where('DokterID', $doctorId)
            ->where('TanggalJanjiTemu', $request->TanggalJanjiTemu)
            ->where('JamJanjiTemu', $request->JamJanjiTemu)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'The selected service is already booked at the chosen date and time.');        
        }

        // Create a new reservation
        appointment::create([
            'TanggalJanjiTemu' => $request->TanggalJanjiTemu,
            'JamJanjiTemu' => $request->JamJanjiTemu,
            'DokterID' => $doctorId,
            'PasienID' => $patientId,
            'Tujuan' => 'Konsultasi' . $department,
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
}
