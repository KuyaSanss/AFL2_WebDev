<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Sequence;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::factory()
            ->count(20)
            ->state(new Sequence(fn(Sequence $sequence) => ['number' => $sequence->index + 1]))
            ->create();
    }
}
