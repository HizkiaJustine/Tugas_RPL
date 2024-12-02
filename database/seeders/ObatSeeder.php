<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Obat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obat::create([
            'NamaObat' => 'Paracetamol',
            'TipeObat' => 'Tablet',
            'TanggalKadaluarsa' => Carbon::now()->addYear(),
            'JumlahObat' => 100,
            'HargaObat' => 5000.00,
        ]);

        Obat::create([
            'NamaObat' => 'Amoxicillin',
            'TipeObat' => 'Kapsul',
            'TanggalKadaluarsa' => Carbon::now()->addYear(),
            'JumlahObat' => 200,
            'HargaObat' => 10000.00,
        ]);
    }
}
