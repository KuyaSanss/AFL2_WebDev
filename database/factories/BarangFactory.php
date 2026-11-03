<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
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
