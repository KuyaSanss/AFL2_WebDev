<footer class="footer">
    <div class="container footer__grid">
        <div class="footer__col">
            <a href="{{ route('home') }}" class="brand" aria-label="Era Jaya Toko Bangunan - Beranda">
                <img src="{{ asset('images/Logo.png') }}" alt="" class="brand__logo" onerror="this.remove()">
            </a>
            <p class="footer__about">
                Mitra tepercaya untuk kebutuhan material bangunan Anda, dari pondasi hingga penyelesaian.
            </p>
        </div>

        <div class="footer__col">
            <h4>Hubungi Kami</h4>
            <p>Jl. Diponegoro No.52, Latsari, Kec. Tuban, Kabupaten Tuban, Jawa Timur 62314</p>
            <p>0851-0506-5050</p>
        </div>

        <div class="footer__col">
            <h4>Jam Buka</h4>
            <p>Senin–Sabtu: 07.00 – 16.00</p>
            <p>Minggu: 07.00 – 15.00</p>
        </div>

    <div class="footer__bottom">
        <div class="container">
            &copy; {{ date('Y') }} Era Jaya. Seluruh hak dilindungi.
        </div>
    </div>
</footer>