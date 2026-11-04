@if ($faqs->isNotEmpty())
<section class="section sectionSand" id="faq">
    <div class="container faq">
        <div class="faqIntro" data-animate="fade-right">
            <p class="eyebrow">Tanya Jawab</p>
            <h2 class="sectionTitle">Pertanyaan Umum</h2>
            <p>
                Belum menemukan jawaban yang Anda cari? Tanyakan langsung kepada kami,
                tim Era Jaya siap membantu.
            </p>
        </div>

        <div class="faqList" data-faq>
            @foreach ($faqs as $faq)
                <div class="faqItem {{ $loop->first ? 'isOpen' : '' }}">
                    <h3 class="faqQ">
                        <button type="button"
                                id="faq-q-{{ $faq->id }}"
                                aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                aria-controls="faq-a-{{ $faq->id }}">
                            <span>{{ $faq->question }}</span>
                            <span class="faqIcon" aria-hidden="true"></span>
                        </button>
                    </h3>
                    <div class="faqA" id="faq-a-{{ $faq->id }}" role="region" aria-labelledby="faq-q-{{ $faq->id }}">
                        <div class="faqAInner">
                            <p>{!! nl2br(e($faq->answer)) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif