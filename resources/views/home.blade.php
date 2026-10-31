@extends('layouts.app')

@section('title', 'Beranda - Era Jaya Toko Bangunan')

@section('content')
    <section class="hero" style="--hero-image: url('{{ asset('images/Luar.jpeg') }}');">
        <div class="container hero__content">
            <p class="eyebrow eyebrow--yellow">Mitra Bangun Andalan Anda</p>

            <h1 class="hero__title">
                Bahan Bangunan Lengkap,<br>
                <span class="text-yellow">Harga Bersaing</span>
            </h1>

            <p class="hero__text">
                Dari pondasi hingga sentuhan akhir, kami menyediakan material pilihan
                untuk setiap kebutuhan pembangunan Anda.
            </p>

            <div class="hero__actions">
                <a href="https://wa.me/6285105065050" class="btn btn--outline" target="_blank" rel="noopener">
                    Hubungi via WhatsApp
                </a>
            </div>

            <p class="hero__note">Untuk pemesanan, silakan hubungi kami melalui WhatsApp.</p>
        </div>

        <a href="#tentang" class="hero__scroll" aria-label="Gulir ke bawah">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
        </a>

        <div class="hazard" aria-hidden="true"></div>
    </section>

    {{-- SEJARAH --}}
    <section class="section section--cream" id="tentang">
        <div class="container about">
            <div class="about__media" data-animate="fade-right">
                <div class="about__frame">
                    <img src="{{ asset('images/Tampakdepan.jpeg') }}" alt="Tampak depan toko Era Jaya">
                    <span class="about__badge">Sejak 2012</span>
                </div>
            </div>

            <div class="about__body">
                <p class="eyebrow">Tentang Kami</p>
                <h2 class="section-title">Sejarah Toko</h2>

                <p class="about__lead" data-animate="fade-up" data-delay="150">
                    Berawal dari toko kecil pada tahun 2012, Era Jaya hadir untuk membantu
                    masyarakat mendapatkan bahan bangunan berkualitas dengan harga yang jujur.
                </p>
                <p class="about__text" data-animate="fade-up" data-delay="250">
                    Tb. Era Jaya didirikan oleh Alm. Fina Styawati, yang memiliki passion besar dalam dunia jual beli sejak membantu usaha orang tuanya, Safari Fashion, setelah lulus SMA. Berbekal pengalaman, tabungan pribadi, serta dukungan keluarga, Alm. Fina memulai usahanya pada tahun 2012 dengan memanfaatkan sebagian tempat di sebelah toko Safari Fashion.
                    Dengan semangat dan kegigihan, Alm. Fina membangun Tb. Era Jaya dari usaha kecil hingga terus berkembang. Pada tahun 2013, Alm. Fina menikah dengan Edy Setiawan, yang kemudian turut mengembangkan usaha tersebut. Dari awalnya hanya menjual beberapa jenis barang, kini Tb. Era Jaya telah memiliki lebih dari 3.000 item produk.
                    Meski Alm. Fina berpulang pada tahun 2020, semangat dan nilai-nilai yang beliau tanamkan tetap hidup hingga kini. Tb. Era Jaya terus berkomitmen memberikan pelayanan terbaik dengan kejujuran, ketulusan, dan sepenuh hati, meneruskan harapan sang pendiri.
                </p>

                <ul class="timeline" data-animate="trigger">
                    <li data-animate="fade-left" data-delay="300"><strong>2012</strong><span>Toko pertama dibuka</span></li>
                    <li data-animate="fade-left" data-delay="450"><strong>2013</strong><span>Perluasan gudang dan layanan</span></li>
                    <li data-animate="fade-left" data-delay="600"><strong>Kini</strong><span>Melayani kebutuhan proyek Anda</span></li>
                </ul>
            </div>
        </div>
    </section>

    {{-- VISI & MISI --}}
    <section class="section section--dark" id="visi-misi">
        <div class="container">
            <p class="eyebrow eyebrow--yellow">Arah &amp; Komitmen</p>
            <h2 class="section-title section-title--light">Visi &amp; Misi</h2>

            <div class="vm-grid">
                <article class="vm-card" data-animate="fade-up">
                    <div class="vm-card__icon">
                        <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="3.5"/></svg>
                    </div>
                    <h3>Visi</h3>
                    <p>Menjadi tempat usaha yang selalu diingat oleh customer ketika mereka membutuhkan sesuatu</p>
                </article>

                <article class="vm-card" data-animate="fade-up" data-delay="180">
                    <div class="vm-card__icon">
                        <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 6 1.5 1.5L7 5"/><path d="m3 12 1.5 1.5L7 11"/><path d="m3 18 1.5 1.5L7 17"/><path d="M11 6h10M11 12h10M11 18h10"/></svg>
                    </div>
                    <h3>Misi</h3>
                    <ul class="vm-card__list">
                        <li>Memberi pelayanan yang ramah, baik, tulus dan jujur.</li>
                        <li>Melengkapi produk yang dijual supaya bisa menjadi one stop solution</li>
                        <li>Memberikan informasi yang jujur dan tepat kepada pembeli</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    {{-- LOKASI & JAM BUKA --}}
    <section class="section section--sand" id="lokasi">
        <div class="container">
            <p class="eyebrow">Kunjungi Kami</p>
            <h2 class="section-title">Lokasi &amp; Jam Buka</h2>

            <div class="location">
                <div class="location__map" data-animate="fade-right">
                    <div class="map-frame">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7921.97643371301!2d112.04198844416277!3d-6.892012122428273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77bd52e177f59d%3A0x773323ab518d5c46!2sTB.%20Era%20Jaya!5e0!3m2!1sen!2sid!4v1793116530339!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" title="Peta lokasi toko Era Jaya"></iframe>
                    </div>
                    <a href="https://www.google.com/maps/search/?api=1&query=TB.+Era+Jaya+Tuban" class="btn btn--red btn--sm" target="_blank" rel="noopener">
                    </a>
                </div>

                <aside class="info-panel" data-animate="fade-left">
                    <div class="info-item">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.5"/></svg>
                        <div>
                            <h4>Alamat Toko</h4>
                            <p>Jl. Diponegoro No.52, Latsari, Kec. Tuban, Kabupaten Tuban, Jawa Timur 62314</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                        <div>
                            <h4>Jam Operasional</h4>
                            <p>Senin–Sabtu: 07.00–16.00</p>
                            <p>Minggu: 07.00–15.00</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
                        <div>
                            <h4>Telepon / WhatsApp</h4>
                            <p>0851-0506-5050</p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- TESTIMONI --}}
    @include('testimonials', ['testimonials' => $testimonials ?? collect()])

    {{-- FAQ --}}
    @include('faq', ['faqs' => $faqs ?? collect()])

@endsection