<?php

namespace Database\Factories;

use App\Models\Testimoni;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimoni>
 */
class TestimoniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('id_ID')->name(),
            'rating' => fake()->numberBetween(3, 5),
            'review' => fake()->randomElement([
                'Pelayanan cepat dan ramah, barang langsung diantar ke lokasi proyek.',
                'Harga bersaing dibanding toko lain, stok juga selalu lengkap.',
                'Langganan sejak lama untuk kebutuhan proyek, tidak pernah mengecewakan.',
                'Karyawannya paham produk, saya dibantu memilih cat yang cocok.',
                'Pengiriman tepat waktu walaupun pesanan dalam jumlah besar.',
                'Barang berkualitas dan sesuai pesanan. Recommended!',
                'Tokonya rapi, mudah mencari barang yang dibutuhkan.',
                'Bisa pesan lewat WhatsApp, sangat memudahkan kontraktor seperti saya.',
                'Harga grosir untuk partai besar sangat membantu proyek perumahan kami.',
                'Pelayanan oke, hanya saja parkiran agak sempit saat ramai.',
            ]),
        ];
    }
}
