 <!-- Top Bar -->
 <div class="bg-blue-900 text-blue-100 py-2 text-xs">
     <div class="container mx-auto px-4 flex justify-between items-center">
         <div class="flex space-x-4">
             <span class="flex items-center"><i class="fas fa-phone mr-2 text-blue-300"></i> (021) 1234-5678</span>
             <span class="flex items-center"><i class="fas fa-envelope mr-2 text-blue-300"></i>
                 info@sekolah.sch.id</span>
         </div>
         <div class="flex space-x-3">
             <a href="#" class="hover:text-white transition duration-300">
                 <i class="fab fa-facebook-f text-sm"></i>
             </a>
             <a href="#" class="hover:text-white transition duration-300">
                 <i class="fab fa-instagram text-sm"></i>
             </a>
             <a href="#" class="hover:text-white transition duration-300">
                 <i class="fab fa-twitter text-sm"></i>
             </a>
             <a href="#" class="hover:text-white transition duration-300">
                 <i class="fab fa-youtube text-sm"></i>
             </a>
         </div>
     </div>
 </div>

 <!-- Main Navbar -->
 <nav class="bg-blue-950 shadow-lg sticky top-0 z-50">
     <div class="container mx-auto px-4">
         <div class="flex justify-between items-center py-3">
             <!-- Logo di Kiri -->
             <div class="flex items-center space-x-3">
                 <div class="bg-blue-500 text-white p-2 rounded-lg">
                     <i class="fas fa-school text-xl"></i>
                 </div>
                 <div>
                     <h1 class="text-lg font-bold text-white">SMK NEGERI 1 CONTOH</h1>
                     <p class="text-xs text-blue-200">Sekolah Unggulan Berbasis Teknologi</p>
                 </div>
             </div>

             <!-- Semua Menu di Kanan - Diposisikan lebih ke kanan -->
             <div class="hidden lg:flex items-center space-x-8 mr-8">
                 <!-- Beranda -->
                 <a href="#"
                     class="nav-link px-4 py-2 text-white font-medium hover:text-blue-200 text-base active">
                     <i class="fas fa-home mr-2"></i>Beranda
                 </a>

                 <!-- Profil Dropdown -->
                 <div class="dropdown relative">
                     <a href="#"
                         class="nav-link px-4 py-2 text-white font-medium hover:text-blue-200 text-base flex items-center">
                         <i class="fas fa-user-circle mr-2"></i>Profil
                         <i class="fas fa-chevron-down ml-1 text-xs mt-1"></i>
                     </a>
                     <div
                         class="dropdown-menu absolute hidden bg-white shadow-xl rounded-md mt-2 py-2 w-48 z-50 border border-blue-100 right-0">
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                             <i class="fas fa-history mr-2 text-blue-500 text-xs"></i>Sejarah Sekolah
                         </a>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                             <i class="fas fa-bullseye mr-2 text-blue-500 text-xs"></i>Visi & Misi
                         </a>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                             <i class="fas fa-sitemap mr-2 text-blue-500 text-xs"></i>Struktur Organisasi
                         </a>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                             <i class="fas fa-building mr-2 text-blue-500 text-xs"></i>Sarana & Prasarana
                         </a>
                     </div>
                 </div>

                 <!-- Info Dropdown -->
                 <div class="dropdown relative">
                     <a href="#"
                         class="nav-link px-4 py-2 text-white font-medium hover:text-blue-200 text-base flex items-center">
                         <i class="fas fa-info-circle mr-2"></i>Info
                         <i class="fas fa-chevron-down ml-1 text-xs mt-1"></i>
                     </a>
                     <div
                         class="dropdown-menu absolute hidden bg-white shadow-xl rounded-md mt-2 py-2 w-48 z-50 border border-blue-100 right-0">
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                             <i class="fas fa-newspaper mr-2 text-blue-500 text-xs"></i>Berita & Artikel
                         </a>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                             <i class="fas fa-bullhorn mr-2 text-blue-500 text-xs"></i>Pengumuman
                         </a>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                             <i class="fas fa-calendar-day mr-2 text-blue-500 text-xs"></i>Agenda Sekolah
                         </a>
                         <a href="#"
                             class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition duration-300">
                             <i class="fas fa-images mr-2 text-blue-500 text-xs"></i>Galeri Foto
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

     <!-- Mobile Menu (hidden by default) -->
     <div class="lg:hidden bg-blue-900 border-t border-blue-700 py-3 hidden" id="mobile-menu">
         <div class="container mx-auto px-4 space-y-1">
             <!-- Beranda -->
             <a href="#"
                 class="flex items-center py-3 px-4 text-white font-medium text-sm bg-blue-800 rounded-lg">
                 <i class="fas fa-home mr-3 text-blue-300"></i>Beranda
             </a>

             <!-- Profil Dropdown Mobile -->
             <div class="border-b border-blue-700">
                 <button
                     class="flex justify-between items-center w-full py-3 px-4 text-white font-medium text-sm mobile-dropdown-toggle">
                     <div class="flex items-center">
                         <i class="fas fa-user-circle mr-3 text-blue-300"></i>Profil
                     </div>
                     <i class="fas fa-chevron-down text-blue-300 text-xs"></i>
                 </button>
                 <div class="pl-10 mt-1 hidden mobile-dropdown-content space-y-2 pb-2">
                     <a href="#"
                         class="block py-2 text-blue-200 hover:text-white transition duration-300 text-xs">
                         <i class="fas fa-history mr-2"></i>Sejarah Sekolah
                     </a>
                     <a href="#"
                         class="block py-2 text-blue-200 hover:text-white transition duration-300 text-xs">
                         <i class="fas fa-bullseye mr-2"></i>Visi & Misi
                     </a>
                     <a href="#"
                         class="block py-2 text-blue-200 hover:text-white transition duration-300 text-xs">
                         <i class="fas fa-sitemap mr-2"></i>Struktur Organisasi
                     </a>
                     <a href="#"
                         class="block py-2 text-blue-200 hover:text-white transition duration-300 text-xs">
                         <i class="fas fa-building mr-2"></i>Sarana & Prasarana
                     </a>
                 </div>
             </div>

             <!-- Info Dropdown Mobile -->
             <div class="border-b border-blue-700">
                 <button
                     class="flex justify-between items-center w-full py-3 px-4 text-white font-medium text-sm mobile-dropdown-toggle">
                     <div class="flex items-center">
                         <i class="fas fa-info-circle mr-3 text-blue-300"></i>Info
                     </div>
                     <i class="fas fa-chevron-down text-blue-300 text-xs"></i>
                 </button>
                 <div class="pl-10 mt-1 hidden mobile-dropdown-content space-y-2 pb-2">
                     <a href="#"
                         class="block py-2 text-blue-200 hover:text-white transition duration-300 text-xs">
                         <i class="fas fa-newspaper mr-2"></i>Berita & Artikel
                     </a>
                     <a href="#"
                         class="block py-2 text-blue-200 hover:text-white transition duration-300 text-xs">
                         <i class="fas fa-bullhorn mr-2"></i>Pengumuman
                     </a>
                     <a href="#"
                         class="block py-2 text-blue-200 hover:text-white transition duration-300 text-xs">
                         <i class="fas fa-calendar-day mr-2"></i>Agenda Sekolah
                     </a>
                     <a href="#"
                         class="block py-2 text-blue-200 hover:text-white transition duration-300 text-xs">
                         <i class="fas fa-images mr-2"></i>Galeri Foto
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </nav>

