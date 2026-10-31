@extends('layouts.app')

@section('title', 'Galeri - Era Jaya Toko Bangunan')
@section('description', 'Galeri foto suasana dan fasilitas Toko Bangunan Era Jaya.')

@php
    $photos = array_map(fn ($n) => "galeri-{$n}.jpeg", range(1, 12));
@endphp

@section('content')

    {{-- HEADER --}}
    <section class="page-hero">
        <div class="container page-hero__content">
            <p class="eyebrow eyebrow--yellow">Galeri Toko</p>

            <h1 class="page-hero__title">
                Kenali Lebih Dekat<br>
                <span class="text-yellow">Toko Era Jaya</span>
            </h1>

            <p class="page-hero__text">Suasana dan fasilitas Toko Bangunan Era Jaya.</p>
        </div>

        <div class="hazard" aria-hidden="true"></div>
    </section>

    {{-- PHOTO GRID --}}
    <section class="section section--cream gallery-section">
        <div class="container">
            <div class="gallery">
                @foreach ($photos as $i => $file)
                    @php
                        $path   = "images/galeri/{$file}";
                        $exists = file_exists(public_path($path));
                        $delay  = ($i % 4) * 110;   
                    @endphp

                    @if ($exists)
                        <a href="{{ asset($path) }}" class="gallery__item"
                           data-gallery-item data-animate="zoom-in" data-delay="{{ $delay }}"
                           aria-label="Perbesar foto {{ $i + 1 }}">
                            <img src="{{ asset($path) }}" alt="Foto galeri Era Jaya {{ $i + 1 }}" loading="lazy">
                            <span class="gallery__zoom" aria-hidden="true">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5M11 8v6M8 11h6"/></svg>
                            </span>
                        </a>
                    @else
                        {{-- Muncul kalau file fotonya belum ada --}}
                        <div class="gallery__item gallery__item--empty" data-animate="zoom-in" data-delay="{{ $delay }}" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="1"/><circle cx="9" cy="9" r="1.8"/><path d="m21 15-5-5L5 21"/></svg>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- LIGHTBOX --}}
    <div class="lightbox" data-lightbox hidden role="dialog" aria-modal="true" aria-label="Pratinjau foto">
        <button type="button" class="lightbox__btn lightbox__close" data-lb-close aria-label="Tutup">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M6 6l12 12M18 6 6 18"/></svg>
        </button>

        <button type="button" class="lightbox__btn lightbox__nav lightbox__nav--prev" data-lb-prev aria-label="Foto sebelumnya">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 6-6 6 6 6"/></svg>
        </button>

        <figure class="lightbox__stage">
            <img src="" alt="" class="lightbox__img" data-lb-img>
        </figure>

        <button type="button" class="lightbox__btn lightbox__nav lightbox__nav--next" data-lb-next aria-label="Foto berikutnya">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 6 6 6-6 6"/></svg>
        </button>

        <span class="lightbox__count" data-lb-count aria-live="polite"></span>
    </div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var items = Array.prototype.slice.call(document.querySelectorAll('[data-gallery-item]'));
    var box   = document.querySelector('[data-lightbox]');
    if (!items.length || !box) return;

    var img   = box.querySelector('[data-lb-img]');
    var count = box.querySelector('[data-lb-count]');
    var index = 0, lastFocus = null, closeT = null;

    function show(i) {
        index = (i + items.length) % items.length;
        img.classList.remove('is-in');
        img.src = items[index].getAttribute('href');
        img.alt = items[index].querySelector('img').alt;
        count.textContent = (index + 1) + ' / ' + items.length;


        [index + 1, index - 1].forEach(function (n) {
            var p = new Image();
            p.src = items[(n + items.length) % items.length].getAttribute('href');
        });
    }
    img.addEventListener('load', function () { img.classList.add('is-in'); });

    function open(i) {
        clearTimeout(closeT);
        lastFocus = document.activeElement;
        show(i);
        box.hidden = false;
        document.documentElement.classList.add('lb-open');
        requestAnimationFrame(function () { box.classList.add('is-open'); });
        box.querySelector('[data-lb-close]').focus();
    }
    function close() {
        box.classList.remove('is-open');
        document.documentElement.classList.remove('lb-open');
        closeT = setTimeout(function () { box.hidden = true; img.src = ''; }, 300);
        if (lastFocus) lastFocus.focus();
    }

    items.forEach(function (a, i) {
        a.addEventListener('click', function (e) { e.preventDefault(); open(i); });
    });

    box.querySelector('[data-lb-close]').addEventListener('click', close);
    box.querySelector('[data-lb-prev]').addEventListener('click', function () { show(index - 1); });
    box.querySelector('[data-lb-next]').addEventListener('click', function () { show(index + 1); });

    // klik area gelap di luar foto = tutup
    box.addEventListener('click', function (e) {
        if (e.target === box || e.target.classList.contains('lightbox__stage')) close();
    });

    document.addEventListener('keydown', function (e) {
        if (box.hidden) return;
        if (e.key === 'Escape')     close();
        if (e.key === 'ArrowLeft')  show(index - 1);
        if (e.key === 'ArrowRight') show(index + 1);
    });

    // geser di layar 
    var sx = null;
    box.addEventListener('touchstart', function (e) { sx = e.touches[0].clientX; }, { passive: true });
    box.addEventListener('touchend', function (e) {
        if (sx === null) return;
        var dx = e.changedTouches[0].clientX - sx;
        if (Math.abs(dx) > 50) show(index + (dx < 0 ? 1 : -1));
        sx = null;
    });
});
</script>
@endpush