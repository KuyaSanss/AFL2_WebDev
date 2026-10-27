{{-- @extends('layouts.app')
@section('title', 'Beranda | Era Jaya')
@section('content')
<main>
    <section class="hero">
        <div class="hero-dalam wadah">
            <span class="eyebrow">MITRA BANGUN ANDALAN ANDA</span>
            <h1>Bahan Bangunan Lengkap,<br><em>Harga Bersaing</em></h1>
            <p>Dari pondasi hingga sentuhan akhir, kami menyediakan material pilihan untuk setiap kebutuhan pembangunan
                Anda.</p>
            <div class="aksi">
                <a href="{{ url('/katalog') }}" class="tombol utama">Lihat Katalog →</a>
                <a href="https://wa.me/{{ $kontak['whatsapp'] }}?text={{ urlencode('Halo Era Jaya, saya ingin bertanya tentang produk.') }}"
                    class="tombol garis" target="_blank" rel="noreferrer">Hubungi via WhatsApp</a>
            </div>
            <div class="catatan">Untuk pemesanan, silakan hubungi kami melalui WhatsApp.</div>
        </div>
    </section>
    <div class="hazard"></div>

    <section class="bagian sejarah">
        <div class="wadah dua-kolom">
            <div class="foto-sejarah"><img src="{{ $fotoSejarah }}" alt="Bangunan proyek pelanggan Era Jaya"><span>SEJAK
                    20XX</span></div>
            <div>
                <div class="judul-bagian"><span>TENTANG KAMI</span>
                    <h2>Sejarah Toko</h2><i></i>
                </div>
                <p class="lead">Berawal dari toko kecil pada tahun 20XX, Era Jaya hadir untuk membantu masyarakat
                    mendapatkan bahan bangunan berkualitas dengan harga yang jujur.</p>
                <p>Bagian ini adalah teks sementara yang dapat Anda ganti dengan kisah perjalanan toko, nilai keluarga,
                    serta komitmen pelayanan Era Jaya.</p>
                <div class="linimasa">
                    <div><b>20XX</b><span>Toko pertama dibuka</span></div>
                    <div><b>20XX</b><span>Perluasan gudang dan layanan</span></div>
                    <div><b>Kini</b><span>Melayani kebutuhan proyek Anda</span></div>
                </div>
            </div>
        </div>
    </section>

    <section class="bagian metal">
        <div class="wadah">
            <div class="judul-bagian gelap"><span>ARAH & KOMITMEN</span>
                <h2>Visi & Misi</h2><i></i>
            </div>
            <div class="kartu-dua">
                <article class="kartu-nilai">
                    <div class="ikon-kotak">◎</div>
                    <h3>Visi</h3>
                    <p>Menjadi toko bahan bangunan terpercaya dan terlengkap yang tumbuh bersama pelanggan.</p>
                </article>
                <article class="kartu-nilai">
                    <div class="ikon-kotak">☷</div>
                    <h3>Misi</h3>
                    <ul>
                        <li>Menyediakan produk berkualitas</li>
                        <li>Memberikan harga yang bersaing</li>
                        <li>Melayani dengan cepat dan ramah</li>
                        <li>Menjadi mitra tepercaya setiap proyek</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section class="bagian">
        <div class="wadah">
            <div class="judul-bagian"><span>KATA MEREKA</span>
                <h2>Kepercayaan Pelanggan</h2><i></i>
            </div>
            <div class="testimoni">
                @foreach ($testimoni as $t)
                <article>
                    <div class="bintang">★★★★★</div>
                    <blockquote>“{{ $t['kutipan'] }}”</blockquote><b>{{ $t['nama'] }}</b><span>{{ $t['peran'] }}</span>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bagian lokasi">
        <div class="wadah">
            <div class="judul-bagian"><span>KUNJUNGI KAMI</span>
                <h2>Lokasi & Jam Buka</h2><i></i>
            </div>
            <div class="lokasi-grid">
                <div class="map"><iframe src="{{ $kontak['mapEmbed'] }}" title="Peta lokasi Era Jaya"
                        loading="lazy"></iframe><a href="{{ $kontak['mapLink'] }}" class="tombol utama" target="_blank"
                        rel="noreferrer">Buka di Google Maps</a></div>
                <div class="kontak-box">
                    <div><span class="ikon">⌖</span><span><b>Alamat Toko</b>{{ $kontak['alamat'] }}</span></div>
                    <div><span class="ikon">◷</span><span><b>Jam Operasional</b>@foreach ($kontak['jam'] as
                            $jam)<span>{{ $jam }}</span>@endforeach</span></div>
                    <div><span class="ikon">☎</span><span><b>Telepon / WhatsApp</b>{{ $kontak['telepon'] }}</span></div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection --}}

@extends('mainlayout')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('mydesign/style.css') }}">
@endsection

@section('content')
    <div class="container">
        <h1>WELCOME HOME</h1>
        <p>Welcome to my pages !</p>
    </div>

    <h2>Testimoni</h2>

    @foreach ($testimonis as $testimoni)
        <p>
            name: {{ $testimoni->name }} <br>
            rating: {{ $testimoni->rating }} <br>
            review: {{ $testimoni->review }}
        </p>
    @endforeach
@endsection