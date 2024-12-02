<?php

namespace Database\Seeders;

use App\Models\Pembelian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembelian::create([
            'TanggalPembelian' => now(),
            'SupplierID' => 'S001', // Ensure this SupplierID exists in the `supplier` table
            'ObatID' => 'O001', // Ensure this ObatID exists in the `obat` table
            'Kuantitas' => 100,
            'Harga' => 5000.00,
        ]);

        Pembelian::create([
            'TanggalPembelian' => now(),
            'SupplierID' => 'S002',
            'ObatID' => 'O002',
            'Kuantitas' => 50,
            'Harga' => 12000.00,
        ]);

        Pembelian::create([
            'TanggalPembelian' => now(),
            'SupplierID' => 'S003',
            'ObatID' => 'O003',
            'Kuantitas' => 200,
            'Harga' => 3000.00,
        ]);
    }
}
