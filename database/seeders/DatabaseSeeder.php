<?php

namespace Database\Seeders;

use App\Models\Obat;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pembelian;
use App\Models\Resepobat;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LayananSeeder::class,
            AccountSeeder::class,
            DokterSeeder::class,
            PasienSeeder::class,
            SupplierSeeder::class,
            ObatSeeder::class,
            AppointmentSeeder::class,
            RekamMedisSeeder::class,
            KasirSeeder::class,
            KaryawanSeeder::class,
            PembayaranSeeder::class,
            PembelianSeeder::class,
            // ResepObatSeeder::class,
        ]);

        $dokter = Dokter::first();
        $pasien = Pasien::first();
        
        // Seeder setelah membuat ResepObat dan Obat
        $resep = Resepobat::create([
            'Tanggal' => now(),
            'DokterID' => $dokter->DokterID,
            'PasienID' => $pasien->PasienID,
            'ListObat' => 'paracetamol, amoxicilin',
            'InstruksiPenggunaanObat' => 'Gunakan sehari dua kali',
        ]);

        $obat = Obat::create([
            'NamaObat' => 'Paracetamol',
            'TipeObat' => 'Tablet',
            'TanggalKadaluarsa' => '2025-12-31',
            'JumlahObat' => 100,
            'HargaObat' => 5000,
        ]);

    }
}
