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
        Layanan::create(['NamaLayanan' => 'Jantung', 'HargaLayanan' => 1000000.00]);
        Layanan::create(['NamaLayanan' => 'Obgyn', 'HargaLayanan' => 300000.00]);
        Layanan::create(['NamaLayanan' => 'THT', 'HargaLayanan' => 200000.00]);
        Layanan::create(['NamaLayanan' => 'Radiologi', 'HargaLayanan' => 300000.00]);
        Layanan::create(['NamaLayanan' => 'Paru-paru', 'HargaLayanan' => 500000.00]);
    }
}
