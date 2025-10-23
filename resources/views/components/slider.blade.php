<div class="slider-container relative w-full h-screen overflow-hidden">
    <div class="slider flex transition-transform duration-500 ease-in-out h-full">
        <!-- Slide 1 -->
        <div class="slide min-w-full h-full relative">
            <div class="absolute inset-0 bg-cover bg-center"
                 style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');">
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="slide-content absolute inset-0 flex items-center justify-center text-center text-white px-4">
                <div class="max-w-4xl">
                    <h2 class="text-4xl md:text-6xl font-bold mb-6">Selamat Datang di BKK SMK Negeri 3 Tuban</h2>
                    <p class="text-xl md:text-2xl mb-8">Membantu siswa dalam mencari pekerjaan dan mengembangkan karir</p>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold text-lg transition duration-300">
                        Jelajahi Sekarang
                    </button>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="slide min-w-full h-full relative">
            <div class="absolute inset-0 bg-cover bg-center"
                 style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');">
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="slide-content absolute inset-0 flex items-center justify-center text-center text-white px-4">
                <div class="max-w-4xl">
                    <h2 class="text-4xl md:text-6xl font-bold mb-6">Lowongan Kerja Terbaru</h2>
                    <p class="text-xl md:text-2xl mb-8">Temukan berbagai peluang karir dari perusahaan ternama</p>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold text-lg transition duration-300">
                        Lihat Lowongan
                    </button>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="slide min-w-full h-full relative">
            <div class="absolute inset-0 bg-cover bg-center"
                 style="background-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');">
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="slide-content absolute inset-0 flex items-center justify-center text-center text-white px-4">
                <div class="max-w-4xl">
                    <h2 class="text-4xl md:text-6xl font-bold mb-6">Pelatihan dan Pengembangan</h2>
                    <p class="text-xl md:text-2xl mb-8">Tingkatkan kompetensi untuk bersaing di dunia kerja</p>
                    <button class="bg-yellow-600 hover:bg-yellow-700 text-white px-8 py-3 rounded-lg font-semibold text-lg transition duration-300">
                        Ikut Pelatihan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider Navigation -->
    <button class="slider-btn prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 w-12 h-12 rounded-full flex items-center justify-center transition duration-300 shadow-lg">
        <i class="fas fa-chevron-left text-gray-800 text-xl"></i>
    </button>
    <button class="slider-btn next absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 w-12 h-12 rounded-full flex items-center justify-center transition duration-300 shadow-lg">
        <i class="fas fa-chevron-right text-gray-800 text-xl"></i>
    </button>

    <!-- Slider Dots -->
    <div class="slider-dots absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3">
        <div class="dot active w-4 h-4 bg-white rounded-full cursor-pointer transition duration-300 opacity-100" data-slide="0"></div>
        <div class="dot w-4 h-4 bg-white rounded-full cursor-pointer transition duration-300 opacity-50" data-slide="1"></div>
        <div class="dot w-4 h-4 bg-white rounded-full cursor-pointer transition duration-300 opacity-50" data-slide="2"></div>
    </div>
</div>

<script>
    class Slider {
        constructor() {
            this.slider = document.querySelector('.slider');
            this.slides = document.querySelectorAll('.slide');
            this.dots = document.querySelectorAll('.dot');
            this.prevBtn = document.querySelector('.slider-btn.prev');
            this.nextBtn = document.querySelector('.slider-btn.next');
            this.currentSlide = 0;
            this.slideCount = this.slides.length;
            
            this.init();
        }
        
        init() {
            this.prevBtn.addEventListener('click', () => this.prevSlide());
            this.nextBtn.addEventListener('click', () => this.nextSlide());
            
            this.dots.forEach(dot => {
                dot.addEventListener('click', (e) => {
                    const slideIndex = parseInt(e.target.getAttribute('data-slide'));
                    this.goToSlide(slideIndex);
                });
            });
            
            // Auto slide
            this.startAutoSlide();
        }
        
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.slideCount;
            this.updateSlider();
        }
        
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.slideCount) % this.slideCount;
            this.updateSlider();
        }
        
        goToSlide(index) {
            this.currentSlide = index;
            this.updateSlider();
        }
        
        updateSlider() {
            this.slider.style.transform = `translateX(-${this.currentSlide * 100}%)`;
            
            // Update dots
            this.dots.forEach((dot, index) => {
                if (index === this.currentSlide) {
                    dot.classList.add('active', 'opacity-100');
                    dot.classList.remove('opacity-50');
                } else {
                    dot.classList.remove('active', 'opacity-100');
                    dot.classList.add('opacity-50');
                }
            });
        }
        
        startAutoSlide() {
            setInterval(() => {
                this.nextSlide();
            }, 5000); // Change slide every 5 seconds
        }
    }
    
    // Initialize slider when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        new Slider();
    });
</script>

<style>
    .slider-container {
        height: 100vh;
    }
    
    .slider {
        transition: transform 0.5s ease-in-out;
    }
    
    .slide {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    
    .slider-btn:hover {
        transform: translateY(-50%) scale(1.1);
    }
    
    .dot:hover {
        transform: scale(1.2);
    }
    
    .dot.active {
        transform: scale(1.2);
    }
</style>