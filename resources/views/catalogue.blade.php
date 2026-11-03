@extends('layouts.app')

@section('title', 'Katalog - Era Jaya Toko Bangunan')

@section('content')

    <section class="page-hero">
        <div class="container page-hero__content">
            <p class="eyebrow eyebrow--yellow">Katalog Produk</p>

            <h1 class="page-hero__title">
                Temukan Material<br>
                <span class="text-yellow">Yang Anda Butuhkan</span>
            </h1>

            <p class="page-hero__text">Cari dari ribuan bahan bangunan pilihan. Harga dapat berubah, hubungi kami untuk
                konfirmasi stok.</p>
        </div>

        <div class="hazard"></div>
    </section>

    <section class="catalog-filter">
        <div class="container">
            <form action="{{ route('catalogue') }}" method="GET" class="catalog-filter__form">
                <div class="catalog-search">
                    <span>🔍</span>
                    <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari nama barang...">
                </div>

                <div class="catalog-sort">
                    <label>Urutkan</label>
                    <select name="urutan" onchange="this.form.submit()">
                        <option value="">Tanpa Urutan</option>
                        <option value="termurah" {{ $urutan == 'termurah' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="termahal" {{ $urutan == 'termahal' ? 'selected' : '' }}>Harga Tertinggi</option>
                    </select>
                </div>
            </form>

            <p class="catalog-filter__count">
                Menampilkan <strong>{{ $barangs->count() }}</strong> dari <strong>{{ $barangs->total() }}</strong> produk
            </p>
        </div>
    </section>

    <section class="section section--cream catalog-section">
        <div class="container">
            <p class="catalog-note">Untuk pemesanan, silakan hubungi kami melalui WhatsApp.</p>

            @if ($barangs->count() == 0)
                <div class="catalog-empty">
                    <h2>Produk tidak ditemukan.</h2>
                    <p>Coba kata kunci lain.</p>
                </div>
            @else
                <div class="catalog-table-wrap">
                    <table class="catalog-table">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                                <tr>
                                    <td class="catalog-table__name">{{ $barang->name }}</td>
                                    <td>
                                        @if ($barang->stok > 0)
                                            <span class="catalog-badge">{{ $barang->stok + 0}}</span>
                                        @else
                                            <span class="catalog-badge catalog-badge--empty">Habis</span>
                                        @endif
                                    </td>
                                    <td>{{ strtolower($barang->satuan) }}</td>
                                    <td class="catalog-table__price">
                                        @if ($barang->hargaJual)
                                            Rp {{ number_format($barang->hargaJual, 0, ',', '.') }}
                                        @else
                                            Hubungi kami
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="catalog-pagination">
                    @if ($barangs->currentPage() > 1)
                        <a href="{{ $barangs->previousPageUrl() }}" class="catalog-pagination__btn">‹ Sebelumnya</a>
                    @endif

                    @for ($i = max(1, $barangs->currentPage() - 2); $i <= min($barangs->lastPage(), $barangs->currentPage() + 2); $i++)
                        <a href="{{ $barangs->url($i) }}"
                            class="catalog-pagination__btn catalog-pagination__num {{ $i == $barangs->currentPage() ? 'is-active' : '' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($barangs->currentPage() < $barangs->lastPage())
                        <a href="{{ $barangs->nextPageUrl() }}" class="catalog-pagination__btn">Berikutnya ›</a>
                    @endif
                </div>
            @endif
        </div>
    </section>

@endsection