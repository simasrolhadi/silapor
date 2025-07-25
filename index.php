<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fakultas Sains dan Teknologi - UIN Ar-Raniry</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <img src="assets/image/borrowly_logo.png" alt="Logo FST">
                <span>FST UIN Ar-Raniry</span>
            </div>
            <ul class="nav-menu" id="nav-menu">
                <li class="nav-item">
                    <a href="#home" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="views\auth\login.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="views\auth\register.php" class="nav-link btn-register">Register</a>
                </li>
            </ul>
            <div class="hamburger" id="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Selamat Datang di Fakultas Sains dan Teknologi</h1>
            <p class="hero-subtitle">Membangun Generasi Unggul dalam Bidang Sains dan Teknologi dengan Landasan Nilai-nilai Islami</p>
            <div class="hero-buttons">
                <a href="#about" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                <a href="#" class="btn btn-secondary">Daftar Sekarang</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="assets/image/saintek.webp" alt="Gedung FST">
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="section-header">
                <h2>Tentang Kami</h2>
                <p>Mengenal lebih dekat Fakultas Sains dan Teknologi UIN Ar-Raniry</p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <h3>Visi</h3>
                    <p>Menjadi fakultas unggul dalam pengembangan sains dan teknologi yang berlandaskan nilai-nilai Islam pada tahun 2030.</p>
                    
                    <h3>Misi</h3>
                    <ul>
                        <li>Menyelenggarakan pendidikan tinggi yang berkualitas dalam bidang sains dan teknologi</li>
                        <li>Mengembangkan penelitian yang inovatif dan bermanfaat bagi masyarakat</li>
                        <li>Melaksanakan pengabdian kepada masyarakat berbasis sains dan teknologi</li>
                        <li>Membangun kerjasama dengan berbagai institusi dalam dan luar negeri</li>
                    </ul>
                </div>
                <div class="about-image">
                    <img src="/placeholder.svg?height=400&width=500" alt="Tentang FST">
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news">
        <div class="container">
            <div class="section-header">
                <h2>Berita Terbaru</h2>
                <p>Informasi terkini seputar kegiatan dan pencapaian FST UIN Ar-Raniry</p>
            </div>
            <div class="news-grid">
                <article class="news-card">
                    <div class="news-image">
                        <img src="/placeholder.svg?height=200&width=350" alt="Berita 1">
                    </div>
                    <div class="news-content">
                        <div class="news-date">15 Desember 2024</div>
                        <h3>Mahasiswa FST Raih Juara 1 Kompetisi Robotika Nasional</h3>
                        <p>Tim robotika FST berhasil meraih prestasi gemilang dalam kompetisi robotika tingkat nasional yang diselenggarakan di Jakarta.</p>
                        <a href="#" class="read-more">Baca Selengkapnya</a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image">
                        <img src="/placeholder.svg?height=200&width=350" alt="Berita 2">
                    </div>
                    <div class="news-content">
                        <div class="news-date">12 Desember 2024</div>
                        <h3>Seminar Internasional AI dan Machine Learning</h3>
                        <p>FST mengadakan seminar internasional tentang perkembangan terbaru dalam bidang kecerdasan buatan dan pembelajaran mesin.</p>
                        <a href="#" class="read-more">Baca Selengkapnya</a>
                    </div>
                </article>

                <article class="news-card">
                    <div class="news-image">
                        <img src="/placeholder.svg?height=200&width=350" alt="Berita 3">
                    </div>
                    <div class="news-content">
                        <div class="news-date">10 Desember 2024</div>
                        <h3>Kerjasama Penelitian dengan Universitas Malaysia</h3>
                        <p>FST menandatangani MoU kerjasama penelitian dengan Universiti Teknologi Malaysia dalam bidang teknologi hijau.</p>
                        <a href="#" class="read-more">Baca Selengkapnya</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <img src="assets/image/logo_uin.webp" alt="Logo FST">
                        <h3>FST UIN Ar-Raniry</h3>
                    </div>
                    <p>Fakultas Sains dan Teknologi UIN Ar-Raniry Banda Aceh, membangun generasi unggul dalam bidang sains dan teknologi.</p>
                </div>

                <div class="footer-section">
                    <h4>Kontak</h4>
                    <div class="contact-info">
                        <p><strong>Alamat:</strong> Jl. Syeikh Abdur Rauf Kopelma Darussalam, Banda Aceh 23111</p>
                        <p><strong>Telepon:</strong> (0651) 7552921</p>
                        <p><strong>Email:</strong> fst@ar-raniry.ac.id</p>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>Ikuti Kami</h4>
                    <div class="social-links">
                        <a href="https://wa.me/qr/EG623NOOTEASA1" class="social-link">WhatsApp</a>
                        <a href="https://www.instagram.com/__masrulhadi?igsh=MWRrcWY3cDY1YWU5Ng==" class="social-link">Instagram</a>
                        <a href="https://github.com/simasrolhadi" class="social-link">Github</a>
                        <a href="http://www.youtube.com/@ANITAMAXWIN-t8o" class="social-link">YouTube</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Fakultas Sains dan Teknologi UIN Ar-Raniry. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>