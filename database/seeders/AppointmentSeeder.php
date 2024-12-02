<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Ambil DokterID dan PasienID dari dokter dan pasien yang sudah ada
        $dokter = Dokter::first();
        $pasien = Pasien::first();

        // Buat appointment
        Appointment::create([
            'TanggalJanjiTemu' => Carbon::now()->addDays(7)->toDateString(), // Waktu mendatang, misalnya 7 hari dari sekarang
            'JamJanjiTemu' => Carbon::now()->format('H:i'), // Make sure the format is correct for a time field
            'DokterID' => $dokter->DokterID,
            'PasienID' => $pasien->PasienID,
            'Tujuan' => 'Konsultasi ' . $dokter->Departemen,
            'Status' => 'Ongoing',
        ]);
    }
}
