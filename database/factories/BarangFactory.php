<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper(fake()->unique()->bothify('???###')),
            'name' => strtoupper(fake()->words(3, true)),
            'satuan' => strtoupper(fake()->lexify('???')),
            'stok' => fake()->numberBetween(0, 200),
            'hargaJual' => fake()->numberBetween(1000, 500000),
        ];
    }
}
