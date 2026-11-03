<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Rev Violin', 'role' => 'Local Guide', 'rating' => 5,
             'content' => 'Mantab belanja disini...lengkap jualannya mulai dari peralatan rumah tangga samai SKOTLET stiker juga lengkap
                            jebakan tikus juga ada
                            kursi bakso juga ada
                            mantab... selalu jaya pokoknya...'],
            ['name' => 'Julian El Sanjaya', 'role' => 'Local Guide', 'rating' => 5,
             'content' => 'Toko yang bagus dan lengkap'],
            ['name' => 'Zhong Harianto', 'role' => 'Local Guide', 'rating' => 5,
             'content' => 'Cocok pastinya'],
            ['name' => 'Raymond Intiwirawan', 'role' => 'Local Guide', 'rating' => 5,
             'content' => 'Baik'],
             ['name' => 'Adwanto adwanto', 'role' => 'Local Guide', 'rating' => 5,
             'content' => ''],
             ['name' => 'risky fee', 'role' => 'Local Guide', 'rating' => 5,
             'content' => ''],
             ['name' => 'Tary Poetry', 'role' => 'Local Guide', 'rating' => 5,
             'content' => ''],
             ['name' => 'wahyu purwantoro', 'role' => 'Local Guide', 'rating' => 4,
             'content' => ''],
             ['name' => 'Tari Putri', 'role' => 'Local Guide', 'rating' => 5,
             'content' => ''],
             ['name' => 'raissa putra', 'role' => 'Local Guide', 'rating' => 5,
             'content' => ''],
             ['name' => 'Julius Tri Hardjanto', 'role' => 'Local Guide', 'rating' => 5,
             'content' => ''],
             ['name' => 'Lucci accil', 'role' => 'Local Guide', 'rating' => 5,
             'content' => ''],
             ['name' => 'Eko Kurniawan Asmanugraha', 'role' => 'Local Guide', 'rating' => 5,
             'content' => ''],
             ['name' => 'Rumah saya', 'role' => 'Local Guide', 'rating' => 5,
             'content' => ''],
        ];

        foreach ($data as $i => $row) {
            Testimonial::create($row + ['sort_order' => $i]);
        }
    }
}