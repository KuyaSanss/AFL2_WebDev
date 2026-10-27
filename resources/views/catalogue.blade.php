{{-- @extends('layouts.app')
@section('title', 'Katalog | Era Jaya')
@section('content')
<main class="halaman">
    <section class="page-head"><div class="wadah"><span>KATALOG PRODUK</span><h1>Temukan Material<br><em>Yang Anda Butuhkan</em></h1><p>Cari bahan bangunan pilihan. Harga dapat berubah—hubungi kami untuk konfirmasi stok.</p></div></section>
    <div class="hazard"></div>
    <section class="kontrol"><div class="wadah kontrol-grid">
        <label class="pencarian"><span>⌕</span><input id="cariProduk" type="search" placeholder="Cari nama barang..."></label>
        <label><span>Jenis Barang</span><select id="filterJenis"><option value="Semua">Semua</option>@foreach (collect($produk)->pluck('jenis')->unique() as $jenis)<option value="{{ $jenis }}">{{ $jenis }}</option>@endforeach</select></label>
        <label><span>Merk</span><select id="filterMerk"><option value="Semua">Semua</option>@foreach (collect($produk)->pluck('merk')->unique() as $merk)<option value="{{ $merk }}">{{ $merk }}</option>@endforeach</select></label>
        <label><span>Urutkan</span><select id="urutProduk"><option value="nama">Nama A-Z</option><option value="murah">Harga Terendah</option><option value="mahal">Harga Tertinggi</option></select></label>
        <button class="reset" id="resetFilter" type="button">Reset Filter</button>
        <p>Menampilkan <b id="jumlahProduk">{{ count($produk) }}</b> produk</p>
    </div></section>
    <section class="bagian katalog"><div class="wadah">
        <div class="pesan-wa">Untuk pemesanan, silakan hubungi kami melalui WhatsApp.</div>
        <div class="tabel" id="daftarProduk">
            <div class="tr kepala"><span>Nama Barang</span><span>Merk</span><span>Jenis</span><span>Satuan</span><span>Harga</span><span></span></div>
            @foreach ($produk as $p)
            <div class="tr baris-produk" data-nama="{{ strtolower($p['nama']) }}" data-merk="{{ $p['merk'] }}" data-jenis="{{ $p['jenis'] }}" data-harga="{{ $p['harga'] }}">
                <strong>{{ $p['nama'] }}</strong><span>{{ $p['merk'] }}</span><span><i>{{ $p['jenis'] }}</i></span><span>/{{ $p['satuan'] }}</span><b>Rp {{ number_format($p['harga'], 0, ',', '.') }}</b>
                <a class="tombol kecil" target="_blank" rel="noreferrer" href="https://wa.me/6281234567890?text={{ urlencode('Halo Era Jaya, saya ingin bertanya tentang produk '.$p['nama'].'.') }}">Tanya via WhatsApp</a>
            </div>
            @endforeach
            <div class="kosong" id="produkKosong" hidden><h2>Produk tidak ditemukan.</h2><p>Coba kata kunci atau filter lain.</p></div>
        </div>
    </div></section>
</main>
@endsection --}}

@extends('mainlayout')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('mydesign/style.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>Catalogue</h1>
        <p>Ini adalah halaman katalog produk.</p>
    </div>
@endsection