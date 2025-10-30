<x-app :profile="$profile">
    <div class="max-w-5xl mx-auto px-4 py-8">
        <!-- Main Content -->
        <div class="lg:col-span-3">
            <article class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <!-- Article Header -->
                <div class="p-8 border-b border-gray-200">
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
                        <span class="text-xs text-gray-500">{{ $article->updated_at->diffForHumans() }}</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                        {{ $article->title }}
                    </h1>

                    <!-- Author & Date -->
                    <div class="flex flex-wrap items-center text-sm text-gray-600 gap-4 mb-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $article->user->name }}</p>
                                <p class="text-gray-500">Penulis</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-2 text-blue-600"></i>
                            <span>Dipublikasikan {{ $article->updated_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Article Image -->
                <div class="w-full h-80 lg:h-96 bg-gray-200 overflow-hidden">
                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}"
                         class="w-full h-full object-cover">
                </div>

                <!-- Article Content - FIXED SPACING -->
                <div class="p-8">
                    <div class="text-gray-700 leading-relaxed text-lg">
                        <!-- Container dengan spacing yang konsisten -->
                        <div class="flex flex-col gap-6 [&_p]:mb-0 [&_p]:mt-0">
                            {!! $article->content !!}
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-gray-900">Bagikan artikel:</span>
                            <div class="flex space-x-3">
                                <a href="#"
                                   class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <i class="fab fa-facebook-f text-sm"></i>
                                </a>
                                <a href="#"
                                   class="w-10 h-10 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                                    <i class="fab fa-twitter text-sm"></i>
                                </a>
                                <a href="#"
                                   class="w-10 h-10 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition-colors">
                                    <i class="fab fa-whatsapp text-sm"></i>
                                </a>
                                <a href="#"
                                   class="w-10 h-10 bg-gray-800 text-white rounded-full flex items-center justify-center hover:bg-gray-900 transition-colors">
                                    <i class="fas fa-link text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Related Articles -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Artikel Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Related Article 1 -->
                    <div
                        class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all duration-300 group">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 mb-3">
                            <i class="fas fa-briefcase mr-1 text-xs"></i>
                            Lowongan Kerja
                        </span>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors">
                            <a href="#" class="hover:underline">
                                Lowongan Kerja di PT. Elektro Maju Jaya untuk Lulusan Teknik
                            </a>
                        </h3>
                        <p class="text-sm text-gray-600 mb-3">12 Mar 2024</p>
                        <a href="#"
                           class="text-blue-600 hover:text-blue-800 text-sm font-semibold inline-flex items-center transition-colors">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right ml-1 text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <!-- Related Article 2 -->
                    <div
                        class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all duration-300 group">
                        <span
                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mb-3">
                            <i class="fas fa-bullhorn mr-1 text-xs"></i>
                            Pengumuman
                        </span>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors">
                            <a href="#" class="hover:underline">
                                Jadwal Tes Seleksi Perusahaan Mitra Bulan April 2024
                            </a>
                        </h3>
                        <p class="text-sm text-gray-600 mb-3">10 Mar 2024</p>
                        <a href="#"
                           class="text-blue-600 hover:text-blue-800 text-sm font-semibold inline-flex items-center transition-colors">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right ml-1 text-xs group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>