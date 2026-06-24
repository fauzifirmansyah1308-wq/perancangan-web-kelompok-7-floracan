<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FloraScan</title>

    <link rel="stylesheet" href="css/style.css?v=47">
</head>

<body>

    <nav class="navbar">

        <div class="logo-wrap">
            <img src="img/logo-florascan.png" alt="FloraScan" class="logo-img">
        </div>

        <ul>
            <li><a href="index.php" class="active">Beranda</a></li>
            <li><a href="tumbuhan.php">Tumbuhan</a></li>
            <li><a href="scan.php">Scan QR</a></li>
            <li><a href="tentang.php">Tentang Kami</a></li>
        </ul>

        <?php if (isset($_SESSION['admin'])) { ?>
            <a href="admin/dashboard.php" class="nav-btn">Halaman Admin</a>
        <?php } else { ?>
            <a href="admin/login.php" class="nav-btn">Login Admin</a>
        <?php } ?>

    </nav>

    <section class="hero">

        <div class="hero-text">

            <h1>
                Temukan Informasi<br>
                Tumbuhan dengan<br>
                Mudah Lewat<br>
                QR Code
            </h1>

            <p>
                Scan QR pada tumbuhan untuk mengetahui informasi lengkapnya
                secara cepat, praktis, dan edukatif.
            </p>

            <div class="hero-buttons">
                <a href="scan.php" class="btn-primary">▣ Scan Tanaman</a>
                <a href="tumbuhan.php" class="btn-secondary">🔍 Jelajahi Tanaman</a>
            </div>

        </div>

        <div class="hero-image">
            <img src="img/hero-florascan.png" alt="Scan QR FloraScan">
        </div>

    </section>

    <section class="fitur-section">

        <div class="section-title">
            <h2>Mengapa Memilih FloraScan?</h2>

            <div class="title-line">
                <span></span>
                <b>🌿</b>
                <span></span>
            </div>
        </div>

        <div class="fitur-grid">

            <div class="fitur-card">
                <img src="img/mudah-digunakan.png" alt="Mudah Digunakan">
                <h3>Mudah Digunakan</h3>
                <p>Cukup scan QR dan dapatkan informasi tumbuhan secara instan.</p>
            </div>

            <div class="fitur-card">
                <img src="img/informasi-lengkap.png" alt="Informasi Lengkap">
                <h3>Informasi Lengkap</h3>
                <p>Detail tumbuhan, manfaat, habitat, dan perawatan tersedia dalam satu halaman.</p>
            </div>

            <div class="fitur-card">
                <img src="img/cocok-semua.png" alt="Cocok untuk Semua">
                <h3>Cocok untuk Semua</h3>
                <p>Untuk wisatawan, pelajar, petugas, dan pecinta tanaman.</p>
            </div>

        </div>

    </section>

    <section class="cta-section">
        <h2>Jelajahi Dunia Tumbuhan dengan FloraScan.</h2>
    </section>

    <footer class="footer">

        <div class="footer-col">
            <h3>Navigasi</h3>
            <a href="index.php">Beranda</a>
            <a href="tumbuhan.php">Tumbuhan</a>
            <a href="scan.php">Scan QR</a>
            <a href="tentang.php">Tentang Kami</a>
        </div>

        <div class="footer-col">
            <h3>Dukungan & Layanan</h3>

            <a href="bantuan.php">
                Pusat Bantuan
            </a>

            <a href="https://wa.me/6281265806216?text=Halo%20admin%20FloraScan,%20saya%20ingin%20bertanya%20tentang%20FloraScan." target="_blank" rel="noopener noreferrer">
                Kontak Kami
            </a>

            <a href="https://wa.me/6281265806216?text=Halo%20admin%20FloraScan,%20saya%20ingin%20memberikan%20saran%20untuk%20website%20FloraScan." target="_blank" rel="noopener noreferrer">
                Beri Masukan
            </a>
        </div>

        <div class="footer-col">
            <h3>Ikuti Kami</h3>

            <a href="https://www.instagram.com/orangutanhaven/" target="_blank" rel="noopener noreferrer">
                📷 @orangutanhaven
            </a>

            <a href="https://orangutanhaven.com/" target="_blank" rel="noopener noreferrer">
                🌐 Orangutan Haven
            </a>
        </div>

    </footer>

</body>

</html>