@props(['profile'])
<!-- Main Navbar -->
<nav class="bg-blue-950 shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="bg-blue-500 text-white p-2 rounded-lg">
                    <i class="fas fa-school text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-white">{{ $profile->nama_bkk }}</h1>
                    <p class="text-xs text-blue-200">{{ $profile->nama_sekolah }}</p>
                </div>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden lg:flex items-center space-x-8 mr-8">
                <!-- Beranda -->
                <a href="{{ route('home') }}"
                    class="nav-link px-4 py-2 font-medium text-base 
                   {{ request()->routeIs('home')
                       ? 'text-blue-300 border-b-2 border-blue-400 cursor-default'
                       : 'text-white hover:text-blue-200' }}">
                    <i class="fas fa-home mr-2"></i>Beranda
                </a>

                <!-- Profil Dropdown -->
                <div class="dropdown relative group">
                    <a href="#"
                        class="nav-link px-4 py-2 font-medium text-base flex items-center
                       {{ request()->is('profil/*')
                           ? 'text-blue-300 border-b-2 border-blue-400 cursor-default'
                           : 'text-white hover:text-blue-200' }}">
                        <i class="fas fa-user-circle mr-2"></i>Profil
                        <i class="fas fa-chevron-down ml-1 text-xs mt-1"></i>
                    </a>

                    <!-- Dropdown Items -->
                    <div
                        class="dropdown-menu absolute hidden group-hover:block bg-white shadow-xl rounded-md mt-2 py-2 w-48 z-50 border border-blue-100 right-0 transition duration-300">
                        <a href="#"
                            class="block px-4 py-2 text-sm 
                           {{ request()->is('profil/sejarah')
                               ? 'bg-blue-50 text-blue-700 font-semibold cursor-default'
                               : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i class="fas fa-history mr-2 text-blue-500 text-xs"></i>Sejarah Sekolah
                        </a>
                        <a href="#"
                            class="block px-4 py-2 text-sm 
                           {{ request()->is('profil/visi-misi')
                               ? 'bg-blue-50 text-blue-700 font-semibold cursor-default'
                               : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i class="fas fa-bullseye mr-2 text-blue-500 text-xs"></i>Visi & Misi
                        </a>
                        <a href="#"
                            class="block px-4 py-2 text-sm 
                           {{ request()->is('profil/struktur')
                               ? 'bg-blue-50 text-blue-700 font-semibold cursor-default'
                               : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i class="fas fa-sitemap mr-2 text-blue-500 text-xs"></i>Struktur Organisasi
                        </a>
                        <a href="#"
                            class="block px-4 py-2 text-sm 
                           {{ request()->is('profil/sarana')
                               ? 'bg-blue-50 text-blue-700 font-semibold cursor-default'
                               : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i class="fas fa-building mr-2 text-blue-500 text-xs"></i>Sarana & Prasarana
                        </a>
                    </div>
                </div>

                <!-- Info Dropdown -->
                <div class="dropdown relative group">
                    <a href="#"
                        class="nav-link px-4 py-2 font-medium text-base flex items-center
                       {{ request()->is('info/*')
                           ? 'text-blue-300 border-b-2 border-blue-400 cursor-default'
                           : 'text-white hover:text-blue-200' }}">
                        <i class="fas fa-info-circle mr-2"></i>Info
                        <i class="fas fa-chevron-down ml-1 text-xs mt-1"></i>
                    </a>

                    <!-- Dropdown Items -->
                    <div
                        class="dropdown-menu absolute hidden group-hover:block bg-white shadow-xl rounded-md mt-2 py-2 w-48 z-50 border border-blue-100 right-0 transition duration-300">
                        <a href="{{ route('info.category', ['category' => 'berita']) }}"
                            class="block px-4 py-2 text-sm 
                           {{ request()->is('info/berita')
                               ? 'bg-blue-50 text-blue-700 font-semibold cursor-default'
                               : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i class="fas fa-newspaper mr-2 text-blue-500 text-xs"></i>Berita & Kegiatan
                        </a>
                        <a href="{{ route('info.category', ['category' => 'pengumuman']) }}"
                            class="block px-4 py-2 text-sm 
                           {{ request()->is('info/pengumuman')
                               ? 'bg-blue-50 text-blue-700 font-semibold cursor-default'
                               : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i class="fas fa-bullhorn mr-2 text-blue-500 text-xs"></i>Pengumuman
                        </a>
                        <a href="{{ route('info.category', ['category' => 'lowongan-kerja']) }}"
                            class="block px-4 py-2 text-sm 
                           {{ request()->is('info/lowongan-kerja')
                               ? 'bg-blue-50 text-blue-700 font-semibold cursor-default'
                               : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                            <i class="fas fa-calendar-day mr-2 text-blue-500 text-xs"></i>Lowongan Kerja
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center lg:hidden">
                <button class="text-blue-200 text-lg p-2 rounded-full hover:bg-blue-800 transition duration-300"
                    id="mobile-menu-button">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="lg:hidden bg-blue-900 border-t border-blue-700 py-3 hidden" id="mobile-menu">
        <div class="container mx-auto px-4 space-y-1">
            <!-- Beranda -->
            <a href="{{ route('home') }}"
                class="flex items-center py-3 px-4 font-medium text-sm rounded-lg 
               {{ request()->routeIs('home') ? 'bg-blue-800 text-white cursor-default' : 'text-white hover:bg-blue-800' }}">
                <i class="fas fa-home mr-3 text-blue-300"></i>Beranda
            </a>

            <!-- Profil Mobile Dropdown -->
            <div class="border-b border-blue-700">
                <button
                    class="flex justify-between items-center w-full py-3 px-4 font-medium text-sm text-white mobile-dropdown-toggle">
                    <div class="flex items-center">
                        <i class="fas fa-user-circle mr-3 text-blue-300"></i>Profil
                    </div>
                    <i class="fas fa-chevron-down text-blue-300 text-xs"></i>
                </button>
                <div class="pl-10 mt-1 hidden mobile-dropdown-content space-y-2 pb-2">
                    <a href="#"
                        class="block py-2 text-xs 
                       {{ request()->is('profil/sejarah') ? 'text-white font-semibold cursor-default' : 'text-blue-200 hover:text-white' }}">
                        <i class="fas fa-history mr-2"></i>Sejarah Sekolah
                    </a>
                    <a href="#"
                        class="block py-2 text-xs 
                       {{ request()->is('profil/visi-misi') ? 'text-white font-semibold cursor-default' : 'text-blue-200 hover:text-white' }}">
                        <i class="fas fa-bullseye mr-2"></i>Visi & Misi
                    </a>
                    <a href="#"
                        class="block py-2 text-xs 
                       {{ request()->is('profil/struktur') ? 'text-white font-semibold cursor-default' : 'text-blue-200 hover:text-white' }}">
                        <i class="fas fa-sitemap mr-2"></i>Struktur Organisasi
                    </a>
                    <a href="#"
                        class="block py-2 text-xs 
                       {{ request()->is('profil/sarana') ? 'text-white font-semibold cursor-default' : 'text-blue-200 hover:text-white' }}">
                        <i class="fas fa-building mr-2"></i>Sarana & Prasarana
                    </a>
                </div>
            </div>

            <!-- Info Mobile Dropdown -->
            <div class="border-b border-blue-700">
                <button
                    class="flex justify-between items-center w-full py-3 px-4 font-medium text-sm text-white mobile-dropdown-toggle">
                    <div class="flex items-center">
                        <i class="fas fa-info-circle mr-3 text-blue-300"></i>Info
                    </div>
                    <i class="fas fa-chevron-down text-blue-300 text-xs"></i>
                </button>
                <div class="pl-10 mt-1 hidden mobile-dropdown-content space-y-2 pb-2">
                    <a href="{{ route('info.category', ['category' => 'berita']) }}"
                        class="block py-2 text-xs 
                       {{ request()->is('info/berita') ? 'text-white font-semibold cursor-default' : 'text-blue-200 hover:text-white' }}">
                        <i class="fas fa-newspaper mr-2"></i>Berita & Artikel
                    </a>
                    <a href="{{ route('info.category', ['category' => 'pengumuman']) }}"
                        class="block py-2 text-xs 
                       {{ request()->is('info/pengumuman') ? 'text-white font-semibold cursor-default' : 'text-blue-200 hover:text-white' }}">
                        <i class="fas fa-bullhorn mr-2"></i>Pengumuman
                    </a>
                    <a href="{{ route('info.category', ['category' => 'lowongan-kerja']) }}"
                        class="block py-2 text-xs 
                       {{ request()->is('info/lowongan-kerja') ? 'text-white font-semibold cursor-default' : 'text-blue-200 hover:text-white' }}">
                        <i class="fas fa-calendar-day mr-2"></i>Lowongan Kerja
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
