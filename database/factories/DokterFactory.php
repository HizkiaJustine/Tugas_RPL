<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Layanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $layanan = Layanan::inRandomOrder()->first();
        return [
            'NamaDokter' => $this->faker->name,
            'Departemen' => $this->faker->word,
            'AlamatDokter' => $this->faker->address,
            'NomorHP' => $this->faker->phoneNumber,
            'FotoDokter' => $this->faker->imageUrl,
            'LayananID' => $layanan->LayananID,
            'AccountID' => Account::factory()->create(['Role' => 'Dokter'])->AccountID,
        ];
    }
}
