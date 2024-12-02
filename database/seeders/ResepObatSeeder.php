<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Resepobat;

class ResepObatSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil DokterID dan PasienID yang ada di database
        $dokter = Dokter::first();
        $pasien = Pasien::first();

        if (!$dokter || !$pasien) {
            echo "Dokter atau Pasien tidak ditemukan. Seeder dihentikan.";
            return;
        }

        // Buat resep obat
        $resepObat = Resepobat::create([
            'Tanggal' => Carbon::now(),
            'DokterID' => $dokter->DokterID,
            'PasienID' => $pasien->PasienID,
            'InstruksiPenggunaanObat' => 'Paracetamol: 3 kali sehari setelah makan, Amoxicillin: 2 kali sehari sebelum makan',
        ]);

        if (!$resepObat) {
            echo "Gagal menyimpan ResepObat.";
            return;
        }

        // Ambil daftar obat dari tabel obat
        $obatList = Obat::all();

        if ($obatList->isEmpty()) {
            echo "Tidak ada obat yang tersedia.";
            return;
        }

        // Tambahkan obat ke resep obat dengan dosis
        foreach ($obatList as $obat) {
            DB::table('obat_resep')->insert([
                'ObatID' => $obat->ObatID,
                'ResepObatID' => $resepObat->ResepObatID,
                'DosisObat' => '2 tablet per hari', // Dosis default
            ]);
        }

        echo "Seeder ResepObat berhasil dijalankan.";
    }
}
