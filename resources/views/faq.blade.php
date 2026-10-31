@if ($faqs->isNotEmpty())
<section class="section section--sand" id="faq">
    <div class="container faq">
        <div class="faq__intro" data-animate="fade-right">
            <p class="eyebrow">Tanya Jawab</p>
            <h2 class="section-title">Pertanyaan Umum</h2>
            <p>
                Belum menemukan jawaban yang Anda cari? Tanyakan langsung kepada kami,
                tim Era Jaya siap membantu.
            </p>
        </div>

        <div class="faq__list" data-faq>
            @foreach ($faqs as $faq)
                <div class="faq__item {{ $loop->first ? 'is-open' : '' }}">
                    <h3 class="faq__q">
                        <button type="button"
                                id="faq-q-{{ $faq->id }}"
                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="faq-a-{{ $faq->id }}">
                            <span>{{ $faq->question }}</span>
                            <span class="faq__icon" aria-hidden="true"></span>
                        </button>
                    </h3>
                    <div class="faq__a" id="faq-a-{{ $faq->id }}" role="region" aria-labelledby="faq-q-{{ $faq->id }}">
                        <div class="faq__a-inner">
                            <p>{!! nl2br(e($faq->answer)) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif