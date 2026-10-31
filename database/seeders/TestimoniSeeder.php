<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Eloquent\Factories\Sequence;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimoni::factory()
            ->count(20)
            ->state(new Sequence(fn(Sequence $sequence) => ['number' => $sequence->index + 1]))
            ->create();
    }
}
