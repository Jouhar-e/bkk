<x-app :profile="$profile">

    {{-- slider gambar --}}
    <x-slider :articles="$articles"></x-slider>

    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Berita Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <!-- Header Section -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Berita Seputar BKK</h2>
                            <div class="w-16 h-1 bg-blue-600 rounded-full"></div>
                        </div>
                    </div>

                    <!-- News List -->
                    <div class="space-y-6">
                        <!-- News Item -->
                        @foreach ($articles as $article)
                            <div
                                class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all duration-300 hover:border-blue-200">
                                <!-- Category Badge -->
                                <div class="flex justify-between items-start mb-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                        @if ($article->category == 'berita') bg-blue-100 text-blue-800
                                        @elseif($article->category == 'lowongan-kerja')
                                            bg-green-100 text-green-800
                                        @elseif($article->category == 'pengumuman')
                                            bg-yellow-100 text-yellow-800
                                        @elseif($article->category == 'kegiatan')
                                            bg-red-100 text-red-800 @endif">
                                        @if ($article->category == 'berita')
                                            <i class="fas fa-newspaper mr-1 text-xs"></i>
                                        @elseif($article->category == 'lowongan-kerja')
                                            <i class="fas fa-briefcase mr-1 text-xs"></i>
                                        @elseif($article->category == 'pengumuman')
                                            <i class="fas fa-bullhorn mr-1 text-xs"></i>
                                        @elseif($article->category == 'kegiatan')
                                            <i class="fas fa-calendar-alt mr-1 text-xs"></i>
                                        @endif
                                        {{ $article->category }}
                                    </span>
                                    <span
                                        class="text-xs text-gray-500">{{ $article->updated_at->diffForHumans() }}</span>
                                </div>

                                <!-- Content -->
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-700 transition-colors duration-200">
                                    {{ $article->title }}
                                </h3>

                                <div class="flex items-center text-sm text-gray-600 mb-4">
                                    <span class="flex items-center mr-4">
                                        <i class="fas fa-user mr-2 text-blue-600"></i>
                                        {{ $article->user->name }}
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fas fa-clock mr-2 text-blue-600"></i>
                                        {{ $article->updated_at->format('d M Y') }}
                                    </span>
                                </div>

                                <p class="text-gray-700 mb-4 leading-relaxed line-clamp-3">
                                    {!! Str::limit($article->content, 170) !!}
                                </p>

                                <a href="{{ route('article.show', $article->slug) }}"
                                    class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold text-sm transition-colors duration-200 group">
                                    Baca Selengkapnya
                                    <i
                                        class="fas fa-arrow-right ml-2 text-xs transform group-hover:translate-x-1 transition-transform duration-200"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- Load More Button -->
                    <div class="text-center mt-8">
                        <a href="#"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                            Lihat Semua Berita
                            <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Info Cepat Section -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 pb-2 border-b-2 border-blue-600">
                        Info Cepat
                    </h3>

                    <div class="space-y-4">
                        <!-- Pelamar Terdaftar -->
                        <div
                            class="bg-blue-50 rounded-lg p-4 text-center hover:shadow-md transition-all duration-300 border border-blue-100">
                            <div class="text-3xl font-bold text-blue-600 mb-2">156</div>
                            <div class="text-gray-700 font-semibold">Pelamar Terdaftar</div>
                        </div>

                        <!-- Perusahaan Mitra -->
                        <div
                            class="bg-green-50 rounded-lg p-4 text-center hover:shadow-md transition-all duration-300 border border-green-100">
                            <div class="text-3xl font-bold text-green-600 mb-2">24</div>
                            <div class="text-gray-700 font-semibold">Perusahaan Mitra</div>
                        </div>

                        <!-- Lowongan Aktif -->
                        <div
                            class="bg-yellow-50 rounded-lg p-4 text-center hover:shadow-md transition-all duration-300 border border-yellow-100">
                            <div class="text-3xl font-bold text-yellow-600 mb-2">18</div>
                            <div class="text-gray-700 font-semibold">Lowongan Aktif</div>
                        </div>
                    </div>
                </div>

                <!-- Pelatihan Info -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-xl font-bold mb-3">Pelatihan & Pengembangan</h3>
                    <p class="text-blue-100 text-sm leading-relaxed mb-4">
                        Tingkatkan kompetensi untuk bersaing di dunia kerja melalui program pelatihan dan pengembangan
                        yang berkelanjutan.
                    </p>
                    <a href="#"
                        class="inline-flex items-center text-white font-semibold text-sm hover:text-blue-200 transition-colors duration-200">
                        Lihat Program
                        <i class="fas fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>

                <!-- Quick Links -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 pb-2 border-b-2 border-blue-600">
                        Akses Cepat
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('info.category', ['category' => 'lowongan-kerja']) }}"
                            class="flex items-center text-gray-700 hover:text-blue-600 transition-colors duration-200 group">
                            <i class="fas fa-briefcase mr-3 text-blue-600 group-hover:text-blue-700"></i>
                            <span>Lowongan Kerja</span>
                        </a>
                        <a href="#"
                            class="flex items-center text-gray-700 hover:text-blue-600 transition-colors duration-200 group">
                            <i class="fas fa-building mr-3 text-blue-600 group-hover:text-blue-700"></i>
                            <span> Perusahaan Mitra</span>
                        </a>
                        <a href="#"
                            class="flex items-center text-gray-700 hover:text-blue-600 transition-colors duration-200 group">
                            <i class="fas fa-calendar-check mr-3 text-blue-600 group-hover:text-blue-700"></i>
                            <span>Jadwal Tes</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>
