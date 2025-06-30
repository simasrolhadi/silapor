<?php
// Include komponen
require_once 'glassmorphism_component.php';

// Konfigurasi halaman
$page_title = "Borrowly - Platform Peminjaman Digital";
$company_name = "Borrowly";
$current_year = date('Y');

// Data navigasi
$nav_items = [
    ['name' => 'Beranda', 'href' => '#home', 'active' => true],
    ['name' => 'Layanan', 'href' => '#services', 'active' => false],
    ['name' => 'Tentang', 'href' => '#about', 'active' => false],
    ['name' => 'Kontak', 'href' => '#contact', 'active' => false]
];

// Data fitur/layanan
$services = [
    [
        'icon' => 'book-open',
        'title' => 'Peminjaman Buku',
        'description' => 'Akses ribuan buku digital dengan mudah dan cepat'
    ],
    [
        'icon' => 'smartphone',
        'title' => 'Aplikasi Mobile',
        'description' => 'Nikmati pengalaman membaca di mana saja dan kapan saja'
    ],
    [
        'icon' => 'users',
        'title' => 'Komunitas',
        'description' => 'Bergabung dengan komunitas pembaca dari seluruh Indonesia'
    ],
    [
        'icon' => 'star',
        'title' => 'Rating & Review',
        'description' => 'Berikan dan baca ulasan dari pembaca lainnya'
    ]
];

// Statistik
$stats = [
    ['number' => '10K+', 'label' => 'Pengguna Aktif'],
    ['number' => '50K+', 'label' => 'Buku Tersedia'],
    ['number' => '98%', 'label' => 'Kepuasan User'],
    ['number' => '24/7', 'label' => 'Support']
];

// Ambil data user (dari session, database, dll)
session_start();
$user_name = $_SESSION['username'] ?? 'Guest';
$user_progress = 85; // Dari database atau kalkulasi

// Inisialisasi komponen
$glassmorphism = new GlassmorphismComponent();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    
    <!-- Custom CSS untuk Glassmorphism -->
    <style>
        /* Glassmorphism Base Styles */
        .glass {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glass-strong {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .glass-light {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        
        /* Button Glassmorphism */
        .btn-glass {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .btn-glass:active {
            transform: translateY(0);
            transition: transform 0.1s ease;
        }
        
        /* Ripple Effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            pointer-events: none;
            animation: ripple-animation 0.6s ease-out;
        }
        
        @keyframes ripple-animation {
            0% {
                transform: scale(0);
                opacity: 0.8;
            }
            100% {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        /* Smooth Animations */
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        
        .slide-up {
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        /* Background Gradient Animation */
        .gradient-bg {
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Logo Animation */
        .logo-hover {
            transition: all 0.3s ease;
        }
        
        .logo-hover:hover {
            transform: scale(1.05);
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.2));
        }
        
        /* Card Hover Effects */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        /* Navbar Scroll Effect */
        .navbar-scrolled {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>

<body class="gradient-bg min-h-screen">
    <!-- Background Decorative Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <!-- Floating Blur Circles -->
        <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-blue-300/20 rounded-full blur-2xl animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 right-1/3 w-48 h-48 bg-purple-300/15 rounded-full blur-xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-1/3 left-1/3 w-56 h-56 bg-pink-300/10 rounded-full blur-2xl animate-pulse" style="animation-delay: 3s;"></div>
    </div>

    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass-strong shadow-lg transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <img src="../image/borrowly.png" alt="<?= $company_name ?> Logo" class="h-8 w-auto logo-hover">
                    <!-- <span class="text-white font-bold text-xl"><?= $company_name ?></span> -->
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="flex items-center space-x-1">
                        <?php foreach($nav_items as $item): ?>
                        <a href="<?= $item['href'] ?>" 
                           class="btn-glass px-4 py-2 rounded-lg text-white font-medium relative overflow-hidden <?= $item['active'] ? 'bg-white/20' : '' ?>"
                           onclick="createRipple(event, this)">
                            <?= htmlspecialchars($item['name']) ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="hidden md:flex items-center space-x-3">
                    <button class="btn-glass px-4 py-2 rounded-lg text-white font-medium relative overflow-hidden"
                            onclick="createRipple(event, this)">
                        Masuk
                    </button>
                    <button class="glass-strong px-6 py-2 rounded-lg text-white font-semibold hover:bg-white/25 transition-all duration-300 relative overflow-hidden"
                            onclick="createRipple(event, this)">
                        Daftar Gratis
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button class="btn-glass p-2 rounded-lg text-white" onclick="toggleMobileMenu()">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden glass-strong border-t border-white/20 hidden" id="mobileMenu">
            <div class="px-4 py-3 space-y-2">
                <?php foreach($nav_items as $item): ?>
                <a href="<?= $item['href'] ?>" 
                   class="block px-4 py-2 text-white rounded-lg hover:bg-white/10 transition-colors">
                    <?= htmlspecialchars($item['name']) ?>
                </a>
                <?php endforeach; ?>
                <div class="pt-3 border-t border-white/20 space-y-2">
                    <button class="w-full btn-glass px-4 py-2 rounded-lg text-white font-medium">
                        Masuk
                    </button>
                    <button class="w-full btn-glass px-4 py-2 rounded-lg text-white font-medium">
                        Daftar Gratis
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 px-4 sm:px-6 lg:px-8" id="home">
        <div class="max-w-7xl mx-auto">
            <div class="text-center fade-in">
                <!-- Main Heading -->
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    Baca Tanpa Batas dengan
                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                        <?= $company_name ?>
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-white/80 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Platform peminjaman buku digital terdepan di Indonesia. 
                    Akses ribuan buku, kapan saja, di mana saja.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                    <button class="glass-strong px-8 py-4 rounded-2xl text-white font-semibold text-lg hover:bg-white/25 transition-all duration-300 transform hover:scale-105 relative overflow-hidden min-w-[200px]"
                            onclick="createRipple(event, this)">
                        <i data-lucide="play-circle" class="w-5 h-5 inline mr-2"></i>
                        Mulai Sekarang
                    </button>
                    <button class="btn-glass px-8 py-4 rounded-2xl text-white font-semibold text-lg relative overflow-hidden min-w-[200px]"
                            onclick="createRipple(event, this)">
                        <i data-lucide="book-open" class="w-5 h-5 inline mr-2"></i>
                        Jelajahi Buku
                    </button>
                </div>

                <!-- Statistics -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto slide-up">
                    <?php foreach($stats as $stat): ?>
                    <div class="glass text-center p-6 rounded-2xl card-hover">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-2">
                            <?= htmlspecialchars($stat['number']) ?>
                        </div>
                        <div class="text-white/70 font-medium">
                            <?= htmlspecialchars($stat['label']) ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8" id="services">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">
                    Layanan Unggulan Kami
                </h2>
                <p class="text-xl text-white/70 max-w-2xl mx-auto">
                    Nikmati berbagai fitur canggih yang dirancang khusus untuk pengalaman membaca terbaik
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach($services as $index => $service): ?>
                <div class="glass p-8 rounded-3xl card-hover slide-up" style="animation-delay: <?= $index * 0.1 ?>s;">
                    <!-- Icon -->
                    <div class="glass-light w-16 h-16 rounded-2xl flex items-center justify-center mb-6 mx-auto">
                        <i data-lucide="<?= $service['icon'] ?>" class="w-8 h-8 text-white"></i>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-xl font-bold text-white mb-4 text-center">
                        <?= htmlspecialchars($service['title']) ?>
                    </h3>
                    <p class="text-white/70 text-center leading-relaxed">
                        <?= htmlspecialchars($service['description']) ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <div class="glass-strong p-12 rounded-3xl fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Siap Memulai Petualangan Membaca?
                </h2>
                <p class="text-xl text-white/80 mb-8">
                    Bergabunglah dengan ribuan pembaca lainnya dan nikmati akses unlimited ke koleksi buku terbaik
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="glass-strong px-8 py-4 rounded-2xl text-white font-semibold text-lg hover:bg-white/25 transition-all duration-300 transform hover:scale-105 relative overflow-hidden"
                            onclick="createRipple(event, this)">
                        <i data-lucide="download" class="w-5 h-5 inline mr-2"></i>
                        Download App
                    </button>
                    <button class="btn-glass px-8 py-4 rounded-2xl text-white font-semibold text-lg relative overflow-hidden"
                            onclick="createRipple(event, this)">
                        <i data-lucide="phone" class="w-5 h-5 inline mr-2"></i>
                        Hubungi Kami
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="glass-strong border-t border-white/20 py-8 px-4 sm:px-6 lg:px-8 mt-16">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Logo & Copyright -->
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <img src="../image/borrowly.png" alt="<?= $company_name ?> Logo" class="h-6 w-auto">
                    <span class="text-white/70">
                        © <?= $current_year ?> <?= $company_name ?>. All rights reserved.
                    </span>
                </div>

                <!-- Social Links -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="btn-glass p-3 rounded-lg text-white hover:bg-white/20 transition-colors">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="btn-glass p-3 rounded-lg text-white hover:bg-white/20 transition-colors">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="btn-glass p-3 rounded-lg text-white hover:bg-white/20 transition-colors">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="btn-glass p-3 rounded-lg text-white hover:bg-white/20 transition-colors">
                        <i data-lucide="linkedin" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Initialize Lucide Icons
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });

        // Ripple Effect Function
        function createRipple(event, element) {
            const rect = element.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            const ripple = document.createElement('div');
            ripple.className = 'ripple';
            ripple.style.left = (x - 25) + 'px';
            ripple.style.top = (y - 25) + 'px';
            ripple.style.width = '50px';
            ripple.style.height = '50px';

            element.appendChild(ripple);

            // Remove ripple after animation
            setTimeout(() => {
                ripple.remove();
            }, 600);
        }

        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Smooth Scrolling for Navigation Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.slide-up, .fade-in').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.8s ease-out';
            observer.observe(el);
        });
    </script>
</body>
</html>
