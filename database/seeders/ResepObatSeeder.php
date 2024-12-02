<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\ResepObat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ResepObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan dokter, pasien, dan obat sudah ada di database
        $this->call(DokterSeeder::class);
        $this->call(PasienSeeder::class);
        $this->call(ObatSeeder::class);

        // Ambil DokterID dari dokter yang ada secara acak
        $dokter = Dokter::inRandomOrder()->first();

        // Ambil PasienID dari pasien yang pertama kali dibuat
        $pasien = Pasien::first();

        // Buat resep obat
        $resepObat = ResepObat::create([
            'Tanggal' => Carbon::now(),
            'DokterID' => $dokter->DokterID,
            'PasienID' => $pasien->PasienID,
            'InstruksiPenggunaanObat' => 'Paracetamol: 3 kali sehari setelah makan, Amoxicillin: 2 kali sehari sebelum makan',
        ]);

        // Ambil daftar obat dari tabel obat
        $obatList = Obat::all();

        // Tambahkan obat ke resep obat
        foreach ($obatList as $obat) {
            $resepObat->obat()->attach($obat->ObatID, [
                'DosisObat' => $obat->Dosis,
            ]);
        }
    }
}
