<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['question' => 'Bagaimana cara memesan barang?',
             'answer'   => 'Pesanan dilayani lewat WhatsApp. Kirim daftar barang dan jumlahnya, lalu tim kami akan membalas dengan ketersediaan dan total harga.'],
            ['question' => 'Apakah toko melayani pengantaran?',
             'answer'   => 'Ya, kami melayani pengantaran ke area sekitar toko. Hubungi kami lewat WhatsApp untuk menanyakan jadwal dan biaya antar.'],
            ['question' => 'Metode pembayaran apa saja yang tersedia?',
             'answer'   => 'Pembayaran bisa dilakukan tunai di toko atau transfer bank. Rincian rekening akan kami kirim saat pesanan dikonfirmasi.'],
            ['question' => 'Apakah harga bisa nego untuk pembelian dalam jumlah besar?',
             'answer'   => 'Untuk proyek atau pembelian dalam jumlah besar, silakan hubungi kami agar bisa dibuatkan penawaran harga.'],
            ['question' => 'Jam berapa toko buka?',
             'answer'   => "Senin-Sabtu pukul 07.00-16.00 dan Minggu pukul 07.00-15.00."],
        ];

        foreach ($data as $i => $row) {
            Faq::create($row + ['sort_order' => $i]);
        }
    }
}