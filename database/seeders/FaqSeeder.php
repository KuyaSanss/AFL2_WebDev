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
             'answer'   => 'Pesanan dilayani lewat WhatsApp. Kirim daftar barang dan jumlahnya, lalu tim kami akan membalas dengan ketersediaan sekaligus total harganya.'],
            ['question' => 'Apakah toko melayani pengantaran?',
             'answer'   => 'Untuk saat ini kami belum melayani pengantaran, pesanan bisa diambil langsung di toko.'],
            ['question' => 'Metode pembayaran apa saja yang tersedia?',
             'answer'   => 'Pembayaran bisa dilakukan menggunakan cash, transfer antar bank, atau QRIS.'],
            ['question' => 'Apakah harga bisa nego untuk pembelian dalam jumlah besar?',
             'answer'   => 'Bisa, terdapat harga untuk reseller juga, silakan hubungi kami untuk informasi lebih lanjut.'],
            ['question' => 'Jam berapa toko buka?',
             'answer'   => "Senin-Sabtu pukul 07.00-16.00 dan Minggu pukul 07.00-15.00."],
        ];

        foreach ($data as $i => $row) {
            Faq::create($row + ['sort_order' => $i]);
        }
    }
}