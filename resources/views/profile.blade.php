<x-app :profile="$profile">
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        @if ($profile->logo)
                            <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo BKK"
                                class="w-20 h-20 rounded-full object-cover border">
                        @else
                            <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center">
                                <span class="text-white text-2xl font-bold">BKK</span>
                            </div>
                        @endif
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ $profile->nama_bkk }}</h1>
                            <p class="text-gray-600 mt-1">{{ $profile->nama_sekolah }}</p>
                            <p class="text-sm text-gray-500 mt-1">Berdiri sejak {{ $profile->tahun_berdiri }}</p>
                        </div>
                    </div>
                    
                    <!-- Jam Operasional -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-center">
                        <h3 class="font-semibold text-blue-900 mb-1">Jam Operasional</h3>
                        <p class="text-sm text-blue-700">{{ $profile->hari_operasional }}</p>
                        <p class="text-sm text-blue-700">{{ $profile->jam_operasional }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Tentang Kami Section -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-3"></i>
                            Tentang Kami
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            <p class="mb-4">
                                {!! $profile->tentang !!}
                            </p>
                        </div>
                    </div>

                    <!-- Sejarah Section -->
                    @if($profile->sejarah)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-history text-blue-600 mr-3"></i>
                            Sejarah
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            <p class="mb-4">
                                {!! $profile->sejarah !!}
                            </p>
                        </div>
                    </div>
                    @endif

                    <!-- Visi & Misi Section -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-bullseye text-blue-600 mr-3"></i>
                            Visi & Misi
                        </h2>
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Visi</h3>
                                <p class="text-gray-700 bg-blue-50 p-4 rounded-lg">
                                    "{{ $profile->visi }}"
                                </p>
                            </div>

                            @php
                                $misiList = is_array($profile->misi)
                                    ? $profile->misi
                                    : json_decode($profile->misi, true);
                            @endphp
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Misi</h3>
                                <ul class="space-y-3 text-gray-700">
                                    @foreach ($misiList as $misi)
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                            <span>{{ is_array($misi) ? $misi['misi'] ?? '' : $misi }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Struktur Organisasi Section -->
                    @if($profile->foto_struktur_organisasi)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-sitemap text-blue-600 mr-3"></i>
                            Struktur Organisasi
                        </h2>
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/' . $profile->foto_struktur_organisasi) }}" 
                                 alt="Struktur Organisasi BKK"
                                 class="max-w-full h-auto rounded-lg shadow-md">
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Kontak Section -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6">
                        <h2 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <i class="fas fa-address-book text-blue-600 mr-3"></i>
                            Kontak Kami
                        </h2>
                        <div class="space-y-4 md:space-y-4">
                            <!-- Alamat -->
                            <div class="flex flex-col sm:flex-row sm:items-start gap-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600">Alamat</p>
                                    <p class="font-medium text-gray-900 leading-relaxed">
                                        {{ $profile->alamat }}
                                    </p>
                                </div>
                            </div>

                            <!-- Telepon -->
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-green-600"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600">Telepon</p>
                                    <p class="font-medium text-gray-900">
                                        {{ $profile->telepon }}
                                    </p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-purple-600"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600">Email</p>
                                    <p class="font-medium text-gray-900 break-words">
                                        {{ $profile->email }}
                                    </p>
                                </div>
                            </div>

                            <!-- Website -->
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-globe text-orange-600"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-600">Website</p>
                                    <a href="{{ $profile->website }}"
                                        class="font-medium text-blue-600 hover:underline break-words" target="_blank">
                                        {{ $profile->website }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Media Sosial Section -->
                    @if($profile->instagram || $profile->facebook || $profile->twitter || $profile->tiktok)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6">
                        <h2 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <i class="fas fa-share-alt text-blue-600 mr-3"></i>
                            Media Sosial
                        </h2>
                        <div class="space-y-3">
                            @if($profile->instagram)
                            <a href="{{ $profile->instagram }}" target="_blank" 
                               class="flex items-center p-3 rounded-lg bg-pink-50 hover:bg-pink-100 transition-colors">
                                <i class="fab fa-instagram text-pink-600 text-xl w-8"></i>
                                <span class="text-gray-700 ml-3">Instagram</span>
                            </a>
                            @endif

                            @if($profile->facebook)
                            <a href="{{ $profile->facebook }}" target="_blank"
                               class="flex items-center p-3 rounded-lg bg-blue-50 hover:bg-blue-100 transition-colors">
                                <i class="fab fa-facebook text-blue-600 text-xl w-8"></i>
                                <span class="text-gray-700 ml-3">Facebook</span>
                            </a>
                            @endif

                            @if($profile->twitter)
                            <a href="{{ $profile->twitter }}" target="_blank"
                               class="flex items-center p-3 rounded-lg bg-sky-50 hover:bg-sky-100 transition-colors">
                                <i class="fab fa-twitter text-sky-500 text-xl w-8"></i>
                                <span class="text-gray-700 ml-3">Twitter</span>
                            </a>
                            @endif

                            @if($profile->tiktok)
                            <a href="{{ $profile->tiktok }}" target="_blank"
                               class="flex items-center p-3 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
                                <i class="fab fa-tiktok text-gray-900 text-xl w-8"></i>
                                <span class="text-gray-700 ml-3">TikTok</span>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Informasi Tambahan -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 md:p-6">
                        <h2 class="text-lg md:text-xl font-bold text-gray-900 mb-4 md:mb-6 flex items-center">
                            <i class="fas fa-chart-line text-blue-600 mr-3"></i>
                            Informasi
                        </h2>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="text-gray-600">Tahun Berdiri</span>
                                <span class="font-bold text-blue-600">{{ $profile->tahun_berdiri }}</span>
                            </div>
                            <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                                <span class="text-gray-600">Nama Sekolah</span>
                                <span class="font-bold text-green-600 text-right">{{ $profile->nama_sekolah }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Status</span>
                                <span class="font-bold text-green-600">Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>