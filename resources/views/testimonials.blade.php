@if ($testimonials->isNotEmpty())
<section class="section section--cream" id="testimoni">
    <div class="container">
        <p class="eyebrow">Kata Pelanggan</p>
        <h2 class="section-title">Testimoni</h2>

        <div class="carousel" data-carousel aria-roledescription="carousel" aria-label="Testimoni pelanggan">
            <div class="carousel__track" data-carousel-track tabindex="0">
                @foreach ($testimonials as $t)
                    <div class="carousel__slide" role="group" aria-roledescription="slide"
                         aria-label="{{ $loop->iteration }} dari {{ $loop->count }}">
                        <figure class="t-card">
                            <div class="t-card__stars" role="img" aria-label="Rating {{ $t->rating }} dari 5">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg viewBox="0 0 24 24" width="20" height="20" class="{{ $i <= $t->rating ? 'is-on' : '' }}" aria-hidden="true">
                                        <path d="m12 2.5 2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9L12 2.5Z"/>
                                    </svg>
                                @endfor
                            </div>

                            <blockquote class="t-card__text">{{ $t->content }}</blockquote>

                            <figcaption class="t-card__author">
                                <span class="t-card__avatar" aria-hidden="true">{{ $t->initials }}</span>
                                <span>
                                    <strong>{{ $t->name }}</strong>
                                    @if ($t->role)
                                        <small>{{ $t->role }}</small>
                                    @endif
                                </span>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var track = document.querySelector('[data-carousel-track]');
    if (!track) return;

    var SPEED  = 45;     
    var RESUME = 1000;  

    var reduce    = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var originals = Array.prototype.slice.call(track.children);
    var N = originals.length;

    var setW = 0;          
    var pos = 0;           
    var expected = 0;     
    var paused = false, resumeT = null, last = null, raf = null;

    function clone(el) {
        var c = el.cloneNode(true);
        c.setAttribute('data-clone', '');
        c.setAttribute('aria-hidden', 'true');
        return c;
    }

    function write(v) {
        pos = v;
        track.scrollLeft = v;
        expected = track.scrollLeft;
    }

    function build() {
        Array.prototype.forEach.call(track.querySelectorAll('[data-clone]'), function (c) { c.remove(); });

        var r0 = originals[0].getBoundingClientRect();
        var one = N > 1
            ? originals[1].getBoundingClientRect().left - r0.left
            : r0.width + (parseFloat(getComputedStyle(track).columnGap) || 0);
        var reps = Math.max(1, Math.ceil((track.clientWidth + one) / (one * N)));

        var i, r, before = document.createDocumentFragment(), after = document.createDocumentFragment(), mid = document.createDocumentFragment();

        for (r = 0; r < reps; r++) originals.forEach(function (o) { before.appendChild(clone(o)); });
        for (r = 1; r < reps; r++) originals.forEach(function (o) { mid.appendChild(clone(o)); });
        for (r = 0; r < reps; r++) originals.forEach(function (o) { after.appendChild(clone(o)); });

        track.insertBefore(before, originals[0]);
        originals[N - 1].after(mid);
        track.appendChild(after);

        setW = one * N * reps;
        write(setW);
    }

    function wrap() {
        if (pos >= 2 * setW)      write(pos - setW);
        else if (pos < setW)      write(pos + setW);
    }

    track.addEventListener('scroll', function () {
        if (track.scrollLeft === expected) return;   
        pos = track.scrollLeft;
        expected = pos;
        wrap();
    }, { passive: true });

    function frame(t) {
        if (last !== null && !paused) {
            pos += SPEED * (t - last) / 1000;
            write(pos);
            wrap();
        }
        last = t;
        raf = requestAnimationFrame(frame);
    }
    function hold() {
        paused = true;
        clearTimeout(resumeT);
    }
    function release(delay) {
        clearTimeout(resumeT);
        resumeT = setTimeout(function () { paused = false; }, delay);
    }

    track.addEventListener('mouseenter', hold);
    track.addEventListener('mouseleave', function () { release(300); });
    track.addEventListener('focusin',    hold);
    track.addEventListener('focusout',   function () { release(300); });
    track.addEventListener('touchstart', hold, { passive: true });
    track.addEventListener('touchend',   function () { release(RESUME); }, { passive: true });
    track.addEventListener('wheel',      function () { hold(); release(RESUME); }, { passive: true });

    var down = false, moved = false, startX = 0, startLeft = 0;
    track.addEventListener('mousedown', function (e) {
        if (e.button !== 0) return;
        down = true; moved = false;
        startX = e.pageX; startLeft = track.scrollLeft;
        track.classList.add('is-dragging');
    });
    window.addEventListener('mousemove', function (e) {
        if (!down) return;
        var dx = e.pageX - startX;
        if (Math.abs(dx) > 3) moved = true;
        track.scrollLeft = startLeft - dx;
    });
    window.addEventListener('mouseup', function () {
        if (!down) return;
        down = false;
        track.classList.remove('is-dragging');
    });
    track.addEventListener('click', function (e) { if (moved) { e.preventDefault(); moved = false; } }, true);
    track.addEventListener('dragstart', function (e) { e.preventDefault(); });

    var rT;
    window.addEventListener('resize', function () {
        clearTimeout(rT);
        rT = setTimeout(build, 200);
    });

    build();
    if (!reduce) raf = requestAnimationFrame(frame);
});
</script>
@endpush
@endif