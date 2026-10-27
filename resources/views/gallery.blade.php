{{-- @extends('layouts.app')
@section('title', 'Galeri | Era Jaya')
@section('content')
<main class="halaman">
    <section class="page-head"><div class="wadah"><span>GALERI TOKO</span><h1>Kenali Lebih Dekat<br><em>Toko Era Jaya</em></h1><p>Suasana dan fasilitas Toko Bangunan Era Jaya.</p></div></section>
    <div class="hazard"></div>
    <section class="bagian"><div class="wadah galeri-grid">
        @foreach ($galeri as $i => $g)
        <button type="button" class="item-galeri" data-src="{{ $g['url'] }}" data-caption="{{ $g['caption'] }}">
            <img src="{{ $g['url'] }}" alt="{{ $g['caption'] }}" loading="lazy">
            <span><small>GALERI {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</small>{{ $g['caption'] }}</span>
        </button>
        @endforeach
    </div></section>
    <div class="lightbox" id="lightbox" hidden role="dialog" aria-modal="true" aria-label="Tampilan foto">
        <button class="lb-tutup" id="tutupLightbox" aria-label="Tutup foto">×</button>
        <button class="lb-kiri" id="fotoSebelumnya" aria-label="Foto sebelumnya">‹</button>
        <figure><img id="fotoBesar" src="" alt=""><figcaption id="captionBesar"></figcaption></figure>
        <button class="lb-kanan" id="fotoBerikutnya" aria-label="Foto berikutnya">›</button>
    </div>
</main>
@endsection --}}

@extends('mainlayout')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('mydesign/style.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>GALLERY</h1>
        <p>Ini adalah halaman galeri foto.</p>
    </div>
@endsection