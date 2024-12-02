<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::create(['NamaLayanan' => 'Layanan Jantung', 'HargaLayanan' => 1000000.00]);
        Layanan::create(['NamaLayanan' => 'Layanan Obgyn', 'HargaLayanan' => 300000.00]);
        Layanan::create(['NamaLayanan' => 'Layanan THT', 'HargaLayanan' => 200000.00]);
        Layanan::create(['NamaLayanan' => 'Layanan Radiologi', 'HargaLayanan' => 300000.00]);
        Layanan::create(['NamaLayanan' => 'Layanan Paru-paru', 'HargaLayanan' => 500000.00]);
    }
}
