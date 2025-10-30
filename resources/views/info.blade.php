<x-app :profile="$profile">
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-newspaper text-blue-600 text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Info BKK</h1>
                            <p class="text-gray-600">Informasi kegiatan, pengumuman, dan lowongan terbaru dari BKK</p>
                        </div>
                    </div>

                    <!-- Filter -->
                    {{-- <div class="flex flex-wrap gap-2">
                        <a href="{{ route('info.show') }}"
                            class="{{ request()->routeIs('info.show') ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} px-3 py-1 rounded-lg text-sm font-medium">Semua</a>

                        <a href="{{ route('info.category', ['category' => 'berita']) }}"
                            class="{{ request()->routeIs('info.category') && request()->route('category') == 'berita' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} px-3 py-1 rounded-lg text-sm font-medium">Berita</a>

                        <a href="{{ route('info.category', ['category' => 'pengumuman']) }}"
                            class="{{ request()->routeIs('info.category') && request()->route('category') == 'pengumuman' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} px-3 py-1 rounded-lg text-sm font-medium">Pengumuman</a>

                        <a href="{{ route('info.category', ['category' => 'kegiatan']) }}"
                            class="{{ request()->routeIs('info.category') && request()->route('category') == 'kegiatan' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} px-3 py-1 rounded-lg text-sm font-medium">Kegiatan</a>

                        <a href="{{ route('info.category', ['category' => 'lowongan-kerja']) }}"
                            class="{{ request()->routeIs('info.category') && request()->route('category') == 'lowongan-kerja' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} px-3 py-1 rounded-lg text-sm font-medium">Lowongan
                            Kerja</a>
                    </div> --}}
                </div>
            </div>

            <!-- Grid Info 3x2 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($articles as $article)
                    <div
                        class="bg-white border rounded-xl shadow-sm hover:shadow-md transition overflow-hidden flex flex-col h-full">
                        <div class="aspect-[16/9] overflow-hidden">
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="Gambar Info"
                                class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        </div>

                        <div class="p-5 flex flex-col flex-1">
                            <h2 class="font-semibold text-lg text-gray-800 mb-2 line-clamp-2">{{ $article->title }}
                            </h2>
                            <p class="text-sm text-gray-600 mb-4 flex-1">
                                {!! Str::limit(strip_tags($article->content), 130, '...') !!}
                            </p>
                            <div class="flex justify-between items-center text-sm text-gray-500 mt-auto">
                                <span><i
                                        class="fas fa-calendar mr-1 text-blue-500"></i>{{ $article->created_at->diffForHumans() }}</span>
                                <a href="{{ route('article.show', $article->slug) }}"
                                    class="text-blue-600 hover:underline font-medium">Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if ($articles->hasPages())
                <div class="mt-10 flex justify-center">
                    <nav role="navigation" aria-label="Pagination Navigation"
                        class="flex items-center justify-between space-x-2">
                        {{-- Tombol Previous --}}
                        @if ($articles->onFirstPage())
                            <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">←
                                Sebelumnya</span>
                        @else
                            <a href="{{ $articles->previousPageUrl() }}"
                                class="px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">←
                                Sebelumnya</a>
                        @endif

                        {{-- Nomor Halaman --}}
                        @foreach ($articles->links()->elements[0] ?? [] as $page => $url)
                            @if ($page == $articles->currentPage())
                                <span
                                    class="px-3 py-2 bg-blue-600 text-white rounded-lg font-semibold">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Tombol Next --}}
                        @if ($articles->hasMorePages())
                            <a href="{{ $articles->nextPageUrl() }}"
                                class="px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Berikutnya
                                →</a>
                        @else
                            <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">Berikutnya
                                →</span>
                        @endif
                    </nav>
                </div>
            @endif

        </div>
    </div>
</x-app>
