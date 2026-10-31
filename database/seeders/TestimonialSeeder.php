<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['name' => 'Budi Santoso', 'role' => 'Kontraktor', 'rating' => 5,
             'content' => 'Material lengkap dan harganya jujur. Pesanan proyek selalu datang tepat waktu.'],
            ['name' => 'Siti Rahmawati', 'role' => 'Pemilik Rumah', 'rating' => 5,
             'content' => 'Pelayanannya ramah, dibantu hitung kebutuhan semen dan keramik sampai pas.'],
            ['name' => 'Agus Wijaya', 'role' => 'Tukang Bangunan', 'rating' => 4,
             'content' => 'Langganan dari lama. Barang selalu ready dan kualitasnya bisa diandalkan.'],
            ['name' => 'Dewi Lestari', 'role' => 'Pemilik Kos', 'rating' => 5,
             'content' => 'Harga bersaing dan bisa diantar ke lokasi. Sangat membantu renovasi kos saya.'],
        ];

        foreach ($data as $i => $row) {
            Testimonial::create($row + ['sort_order' => $i]);
        }
    }
}