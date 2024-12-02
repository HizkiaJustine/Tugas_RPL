<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembayaran::create([
            'TanggalPembayaran' => now(),
            'JumlahPembayaran' => 50000.00,
            'MetodePembayaran' => 'Cash',
            'PasienID' => 'P1', // Ensure PasienID exists
            'LayananID' => 'L1', // Ensure LayananID exists
        ]);

        Pembayaran::create([
            'TanggalPembayaran' => now(),
            'JumlahPembayaran' => 75000.00,
            'MetodePembayaran' => 'Debit Card',
            'PasienID' => 'P2',
            'LayananID' => 'L2',
        ]);

        Pembayaran::create([
            'TanggalPembayaran' => now(),
            'JumlahPembayaran' => 150000.00,
            'MetodePembayaran' => 'Online',
            'PasienID' => 'P3',
            'LayananID' => 'L3',
        ]);
    }
}
