@props(['articles'])

@php
    use Illuminate\Support\Str;
    $placeholder = asset('images/placeholder-news.jpg');
@endphp

@if ($articles->isNotEmpty())
    <div class="relative w-full" aria-roledescription="carousel">
        {{-- Slider utama --}}
        <div class="relative overflow-hidden rounded-lg shadow h-96" role="group" aria-label="Berita unggulan">
            <div id="blade-slider-track" class="flex h-full transition-transform duration-500 ease-in-out">
                @foreach ($articles as $i => $article)
                    @php
                        $bg = $article->featured_image ? asset('storage/' . $article->featured_image) : $placeholder;
                        $category = ucfirst(str_replace('-', ' ', $article->category));
                    @endphp

                    <article class="min-w-full h-full relative flex-shrink-0" role="group" aria-roledescription="slide"
                        aria-label="Slide {{ $i + 1 }} dari {{ $articles->count() }}">
                        <div class="absolute inset-0 bg-cover bg-center"
                            style="background-image: url('{{ $bg }}'); filter: brightness(.55);"
                            aria-hidden="true"></div>

                        <div class="absolute inset-0 flex items-center justify-center text-center px-6">
                            <div class="max-w-3xl text-white">
                                <div class="text-sm text-gray-200 mb-2">
                                    {{ $article->created_at->format('d M Y') }} • {{ $category }}
                                </div>

                                <h2 class="text-2xl md:text-4xl font-bold mb-3 leading-tight">
                                    {{ $article->title }}
                                </h2>

                                <p class="hidden md:block text-sm md:text-base mb-4">
                                    {{ Str::limit(strip_tags($article->content), 140) }}
                                </p>

                                <a href="{{ route('article.show', $article->slug) }}"
                                    class="inline-block bg-white bg-opacity-90 text-gray-900 px-5 py-2 rounded-lg font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                                    Baca selengkapnya
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            {{-- Controls --}}
            <button id="blade-slider-prev"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-90 w-10 h-10 rounded-full flex items-center justify-center shadow focus:outline-none focus:ring-2"
                aria-label="Sebelumnya">
                ‹
            </button>

            <button id="blade-slider-next"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-90 w-10 h-10 rounded-full flex items-center justify-center shadow focus:outline-none focus:ring-2"
                aria-label="Berikutnya">
                ›
            </button>

            {{-- Dots --}}
            <div id="blade-slider-dots" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2"
                role="tablist" aria-label="Navigasi slide">
                @foreach ($articles as $i => $a)
                    <button data-slide="{{ $i }}"
                        class="w-3 h-3 rounded-full bg-white @if ($i !== 0) opacity-50 @endif"
                        role="tab" aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                        aria-label="Lompat ke slide {{ $i + 1 }}">
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- JS: slider otomatis dan interaktif --}}
    @once
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const root = document.querySelector('[aria-roledescription="carousel"]');
                    if (!root) return;
                    const track = root.querySelector('#blade-slider-track');
                    const slides = Array.from(track.children);
                    const prev = root.querySelector('#blade-slider-prev');
                    const next = root.querySelector('#blade-slider-next');
                    const dots = Array.from(root.querySelectorAll('#blade-slider-dots button'));
                    let idx = 0,
                        count = slides.length;
                    if (count === 0) return;

                    function go(i) {
                        idx = (i + count) % count;
                        track.style.transform = `translateX(-${idx * 100}%)`;
                        dots.forEach((d, j) => {
                            d.classList.toggle('opacity-50', j !== idx);
                            d.setAttribute('aria-selected', j === idx ? 'true' : 'false');
                        });
                    }

                    prev?.addEventListener('click', () => {
                        go(idx - 1);
                        resetAuto();
                    });
                    next?.addEventListener('click', () => {
                        go(idx + 1);
                        resetAuto();
                    });
                    dots.forEach((d, i) => d.addEventListener('click', () => {
                        go(i);
                        resetAuto();
                    }));

                    let timer = setInterval(() => go(idx + 1), 6000);

                    function resetAuto() {
                        clearInterval(timer);
                        timer = setInterval(() => go(idx + 1), 6000);
                    }

                    [track, prev, next, ...dots].forEach(el => {
                        if (!el) return;
                        el.addEventListener('mouseenter', () => clearInterval(timer));
                        el.addEventListener('mouseleave', () => resetAuto());
                    });

                    root.addEventListener('keydown', e => {
                        if (e.key === 'ArrowLeft') go(idx - 1);
                        if (e.key === 'ArrowRight') go(idx + 1);
                    });

                    window.addEventListener('resize', () => go(idx));
                    go(0);
                });
            </script>
        @endpush
    @endonce
@else
    <div class="text-gray-500 text-sm">Belum ada artikel untuk ditampilkan.</div>
@endif
