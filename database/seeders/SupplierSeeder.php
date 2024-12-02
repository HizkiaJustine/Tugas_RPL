<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'NamaSupplier' => 'HealthCo',
            'NomorHP' => '+6281234567890',
        ]);

        Supplier::create([
            'NamaSupplier' => 'HealtCare', 
            'NomorHP' => '+6282345678901'
        ]);
        Supplier::create([
            'NamaSupplier' => 'LabMed', 
            'NomorHP' => '+6283456789012'
        ]);
    }
}
