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
            'name' => fake()->unique()->randomElement([
                'SEMEN TIGA RODA 50KG',
                'SEMEN GRESIK 40KG',
                'CAT TEMBOK DULUX 5KG',
                'CAT AVIAN KAYU BESI 1KG',
                'PIPA PVC RUCIKA 3/4',
                'PIPA PVC WAVIN 1/2',
                'BESI BETON 10MM SNI',
                'BESI BETON 8MM SNI',
                'PAKU KAYU 5CM',
                'PAKU BETON 7CM',
                'KERAMIK ROMAN 40X40',
                'KERAMIK PLATINUM 30X30',
                'GENTENG METAL PASIR',
                'TRIPLEK 9MM',
                'BATA RINGAN CITICON',
                'KUAS CAT ETERNA 3 INCH',
                '3M SOLASI LISTRIK',
                'KABEL EKSTRANA 2X1.5',
                'LAMPU LED PHILIPS 13W',
                'KRAN AIR ONDA 1/2',
                'LEM PIPA ISARPLAS',
                'GERGAJI KAYU TEKIRO',
            ]),
            'satuan' => fake()->randomElement(['BH', 'SAK', 'KG', 'ROL', 'BTG', 'DUS', 'LBR']),
            'stok' => fake()->numberBetween(0, 200),
            'hargaJual' => fake()->numberBetween(5, 500) * 1000, // kelipatan 1.000
        ];
    }
}
