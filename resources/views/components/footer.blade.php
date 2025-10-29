@props(['profile'])
<!-- Footer -->
<footer class="bg-blue-950 text-white mt-auto">
    <!-- Main Footer -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo dan Deskripsi -->
            <div class="md:col-span-2">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="bg-blue-500 text-white p-2 rounded-lg">
                        <i class="fas fa-school text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">{{ $profile->nama_bkk }}</h3>
                        <p class="text-blue-200 text-sm">{{ $profile->nama_sekolah }}</p>
                    </div>
                </div>
                <p class="text-blue-100 text-sm mb-4 max-w-2xl">
                    {!! $profile->tentang !!}
                </p>
                <br>
                <div class="flex space-x-3">
                    <a href="#"
                        class="bg-blue-800 hover:bg-blue-700 p-3 rounded transition duration-300 transform hover:scale-110 w-10 h-10 flex items-center justify-center">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#"
                        class="bg-blue-800 hover:bg-blue-700 p-3 rounded transition duration-300 transform hover:scale-110 w-10 h-10 flex items-center justify-center">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="#"
                        class="bg-blue-800 hover:bg-blue-700 p-3 rounded transition duration-300 transform hover:scale-110 w-10 h-10 flex items-center justify-center">
                        <i class="fab fa-twitter text-sm"></i>
                    </a>
                    <a href="#"
                        class="bg-blue-800 hover:bg-blue-700 p-3 rounded transition duration-300 transform hover:scale-110 w-10 h-10 flex items-center justify-center">
                        <i class="fab fa-youtube text-sm"></i>
                    </a>
                    <a href="#"
                        class="bg-blue-800 hover:bg-blue-700 p-3 rounded transition duration-300 transform hover:scale-110 w-10 h-10 flex items-center justify-center">
                        <i class="fab fa-tiktok text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Kontak -->
            <div>
                <h4 class="text-lg font-bold mb-4 text-blue-300">Kontak Kami</h4>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mr-3 mt-1 text-blue-400"></i>
                        <span class="text-blue-100 text-sm">
                            {{ $profile->alamat }}
                        </span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-3 text-blue-400"></i>
                        <span class="text-blue-100 text-sm">{{ $profile->telepon }}</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3 text-blue-400"></i>
                        <span class="text-blue-100 text-sm">{{ $profile->email }}</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-clock mr-3 text-blue-400"></i>
                        <span class="text-blue-100 text-sm">{{ $profile->hari_operasional }}
                            {{ $profile->jam_operasional }}</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-globe mr-3 text-blue-400"></i>
                        <span class="text-blue-100 text-sm">{{ $profile->website }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-blue-800">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-blue-200 text-sm mb-2 md:mb-0 text-center md:text-left">
                    &copy; 2024 SMK Negeri 1 Contoh. Semua hak dilindungi undang-undang.
                </div>
                <div class="flex space-x-4 text-blue-200 text-sm">
                    <a href="#" class="hover:text-white transition duration-300">Kebijakan Privasi</a>
                    <span>•</span>
                    <a href="#" class="hover:text-white transition duration-300">Syarat & Ketentuan</a>
                    <span>•</span>
                    <a href="#" class="hover:text-white transition duration-300">Peta Situs</a>
                </div>
            </div>
        </div>
    </div>
</footer>
