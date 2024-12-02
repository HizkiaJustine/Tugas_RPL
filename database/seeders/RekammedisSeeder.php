<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Rekammedis;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RekammedisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan dokter dan pasien sudah ada di database
        $this->call(DokterSeeder::class);
        $this->call(PasienSeeder::class);

        $dokter = Dokter::first();
        $pasien = Pasien::first();

        // Buat rekam medis
        Rekammedis::create([
            'Tanggal' => Carbon::now()->subDays(10), // Tanggal 10 hari yang lalu
            'PasienID' => $pasien->PasienID,
            'DokterID' => $dokter->DokterID,
            'HasilDiagnosa' => 'Diagnosa contoh',
            'Perawatan' => 'Perawatan contoh',
            'ResepObat' => 'Resep obat contoh',
            'HasilLab' => 'Hasil lab contoh',
        ]);
    }
}
