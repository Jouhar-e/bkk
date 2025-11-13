@props(['profile'])

<nav class="bg-blue-950 shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 text-white p-2 rounded-md">
                    <i class="fas fa-school"></i>
                </div>
                <div>
                    <h1 class="text-white font-semibold text-lg">{{ $profile->nama_bkk }}</h1>
                    <p class="text-xs text-blue-300">{{ $profile->nama_sekolah }}</p>
                </div>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden lg:flex items-center space-x-6 mr-6">
                <!-- Beranda -->
                <a href="{{ route('home') }}"
                    class="px-3 py-2 text-sm font-medium rounded-md transition
                    {{ request()->routeIs('home')
                        ? 'bg-blue-800 text-white cursor-default'
                        : 'text-blue-200 hover:text-white hover:bg-blue-800' }}">
                    <i class="fas fa-home mr-1"></i>Beranda
                </a>

                <!-- Profil -->
                <a href="{{ route('profil') }}"
                    class="px-3 py-2 text-sm font-medium flex items-center rounded-md transition
                        {{ request()->is('profil')
                            ? 'bg-blue-800 text-white cursor-default'
                            : 'text-blue-200 hover:text-white hover:bg-blue-800' }}">
                    <i class="fas fa-user-circle mr-1"></i>Profil
                </a>

                <!-- Info Dropdown -->
                <div class="relative group">
                    <a href="#"
                        class="px-3 py-2 text-sm font-medium flex items-center rounded-md transition
                        {{ request()->is('info/*')
                            ? 'bg-blue-800 text-white cursor-default'
                            : 'text-blue-200 hover:text-white hover:bg-blue-800' }}">
                        <i class="fas fa-info-circle mr-1"></i>Info
                        <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>

                    <div
                        class="dropdown-menu absolute opacity-0 invisible group-hover:visible group-hover:opacity-100
                               bg-white shadow-lg rounded-md mt-3 py-2 w-48 right-0 border border-blue-100 z-50
                               transition-all duration-200 ease-out translate-y-2 group-hover:translate-y-0">
                        <a href="{{ route('info.category', ['category' => 'berita']) }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                            Berita & Kegiatan
                        </a>
                        <a href="{{ route('info.category', ['category' => 'pengumuman']) }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                            Pengumuman
                        </a>
                        <a href="{{ route('info.category', ['category' => 'lowongan-kerja']) }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700">
                            Lowongan Kerja
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button"
                class="lg:hidden text-blue-200 text-lg p-2 rounded-md hover:bg-blue-800 transition">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden bg-blue-900 border-t border-blue-800 py-2 hidden">
        <div class="container mx-auto px-4 space-y-1">
            <!-- Beranda -->
            <a href="{{ route('home') }}"
                class="flex items-center py-2 px-3 text-sm rounded-md font-medium
                {{ request()->routeIs('home') ? 'bg-blue-800 text-white' : 'text-blue-200 hover:bg-blue-800 hover:text-white' }}">
                <i class="fas fa-home mr-2 text-blue-300"></i>Beranda
            </a>

            {{-- Profile --}}
            <a href="{{ route('profil') }}"
                class="flex items-center py-2 px-3 text-sm rounded-md font-medium
                {{ request()->routeIs('profil') ? 'bg-blue-800 text-white' : 'text-blue-200 hover:bg-blue-800 hover:text-white' }}">
                <i class="fas fa-user-circle mr-2 text-blue-300"></i>Profil
            </a>

            <!-- Info Dropdown Mobile -->
            <div class="border-b border-blue-800">
                <button
                    class="flex justify-between items-center w-full py-2 px-3 text-sm font-medium text-blue-200 mobile-dropdown-toggle">
                    <div class="flex items-center">
                        <i class="fas fa-info-circle mr-2 text-blue-300"></i>Info
                    </div>
                    <i class="fas fa-chevron-down text-blue-300 text-xs"></i>
                </button>
                <div class="pl-6 mt-1 hidden mobile-dropdown-content space-y-1 pb-2">
                    <a href="{{ route('info.category', ['category' => 'berita']) }}"
                        class="block py-1 text-xs text-blue-300 hover:text-white">Berita & Kegiatan</a>
                    <a href="{{ route('info.category', ['category' => 'pengumuman']) }}"
                        class="block py-1 text-xs text-blue-300 hover:text-white">Pengumuman</a>
                    <a href="{{ route('info.category', ['category' => 'lowongan-kerja']) }}"
                        class="block py-1 text-xs text-blue-300 hover:text-white">Lowongan Kerja</a>
                </div>
            </div>
        </div>
    </div>
</nav>
