<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        Barang::truncate();

        $hargaJual = [];

        $isi = file_get_contents(database_path('data/HargaJual.csv'));
        $isi = str_replace("\r\n", "\n", $isi);
        $isi = str_replace("\r", "\n", $isi);

        foreach (explode("\n", $isi) as $teks) {
            $baris = explode(';', $teks);

            if (!isset($baris[1]) || !is_numeric($baris[1])) {
                continue;
            }

            $nama = trim($baris[3]);
            $hargaJual[$nama] = $baris[9];
        }

        $isi = file_get_contents(database_path('data/Barang.csv'));
        $isi = str_replace("\r\n", "\n", $isi);
        $isi = str_replace("\r", "\n", $isi);

        foreach (explode("\n", $isi) as $teks) {
            $baris = explode(';', $teks);

            if (!isset($baris[1]) || !is_numeric($baris[1])) {
                continue;
            }

            $nama = trim($baris[4]);

            $stok = (float) $baris[10];
            if ($stok < 0) {
                $stok = 0;
            }

            $harga = null;
            if (isset($hargaJual[$nama]) && is_numeric($hargaJual[$nama])) {
                $harga = $hargaJual[$nama];
            }

            Barang::create([
                'number'    => $baris[1],
                'code'      => trim($baris[2]),
                'name'      => $nama,
                'satuan'    => trim($baris[9]),
                'stok'      => $stok,
                'hargaJual' => $harga,
            ]);
        }
    }
}