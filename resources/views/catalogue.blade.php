@extends('layouts.app')

@section('title', 'Katalog - Era Jaya Toko Bangunan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('mydesign/catalogue.css') }}?v={{ filemtime(public_path('mydesign/catalogue.css')) }}">@endpush

@section('content')

    <section class="pageHero">
        <div class="container pageHeroContent">
            <p class="eyebrow eyebrowYellow">Katalog Produk</p>

            <h1 class="pageHeroTitle">
                Temukan Material<br>
                <span class="textYellow">Yang Anda Butuhkan</span>
            </h1>

            <p class="pageHeroText">Cari dari ribuan bahan bangunan pilihan. Harga dapat berubah, hubungi kami untuk
                konfirmasi stok.</p>
        </div>

        <div class="hazard"></div>
    </section>

    <section class="catalogFilter">
        <div class="container">
            <form action="{{ route('catalogue') }}" method="GET" class="catalogFilterForm">
                <div class="catalogSearch">
                    <span>🔍</span>
                    <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari nama barang...">
                </div>

                <div class="catalogSort">
                    <label>Urutkan</label>
                    <select name="urutan" onchange="this.form.submit()">
                        <option value="">Tanpa Urutan</option>
                        <option value="termurah" {{ $urutan == 'termurah' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="termahal" {{ $urutan == 'termahal' ? 'selected' : '' }}>Harga Tertinggi</option>
                    </select>
                </div>
            </form>

            <p class="catalogFilterCount">
                Menampilkan <b>{{ $barangs->count() }}</b> dari <b>{{ $barangs->total() }}</b> produk
            </p>
        </div>
    </section>

    <section class="section sectionCream catalogSection">
        <div class="container">
            <p class="catalogNote">Untuk pemesanan, silakan hubungi kami melalui WhatsApp.</p>

            @if ($barangs->count() == 0)
                <div class="catalogEmpty">
                    <h2>Produk tidak ditemukan.</h2>
                    <p>Coba kata kunci lain.</p>
                </div>
            @else
                <div class="catalogTableWrap">
                    <table class="catalogTable">
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
                                    <td class="catalogTableName">{{ $barang->name }}</td>
                                    <td>
                                        @if ($barang->stok > 0)
                                            <span class="catalogBadge">{{ $barang->stok + 0}}</span>
                                        @else
                                            <span class="catalogBadge catalogBadgeEmpty">Habis</span>
                                        @endif
                                    </td>
                                    <td>{{ strtolower($barang->satuan) }}</td>
                                    <td class="catalogTablePrice">
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

                <div class="catalogPagination">
                    @if ($barangs->currentPage() > 1)
                        <a href="{{ $barangs->previousPageUrl() }}" class="catalogPaginationBtn">‹ Sebelumnya</a>
                    @endif

                    @for (
                        $i = max(1, $barangs->currentPage() - 2); 
                        $i <= min($barangs->lastPage(), $barangs->currentPage() + 2);
                        $i++)
                        <a href="{{ $barangs->url($i) }}"
                            class="catalogPaginationBtn catalogPaginationNum {{ $i == $barangs->currentPage() ? 'isActive' : '' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($barangs->currentPage() < $barangs->lastPage())
                        <a href="{{ $barangs->nextPageUrl() }}" class="catalogPaginationBtn">Berikutnya ›</a>
                    @endif
                </div>
            @endif
        </div>
    </section>

@endsection