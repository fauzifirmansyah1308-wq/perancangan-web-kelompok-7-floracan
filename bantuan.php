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
    <title>Pusat Bantuan - FloraScan</title>

    <link rel="stylesheet" href="css/style.css?v=49">
</head>

<body>

    <nav class="navbar">

        <div class="logo-wrap">
            <img src="img/logo-florascan.png" alt="FloraScan" class="logo-img">
        </div>

        <ul>
            <li><a href="index.php">Beranda</a></li>
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

    <main class="help-page">

        <section class="help-header">
            <span>🌿 Pusat Bantuan</span>

            <h1>Bagaimana Cara Menggunakan FloraScan?</h1>

            <p>
                Halaman ini berisi panduan singkat untuk membantu pengguna
                dalam menggunakan fitur FloraScan.
            </p>
        </section>

        <section class="help-grid">

            <div class="help-card">
                <div class="help-icon">📷</div>
                <h3>Cara Scan QR</h3>
                <p>
                    Buka halaman Scan QR, izinkan akses kamera, lalu arahkan kamera
                    ke QR Code yang tersedia pada papan tumbuhan.
                </p>
                <a href="scan.php">Buka Scan QR</a>
            </div>

            <div class="help-card">
                <div class="help-icon">🌱</div>
                <h3>Melihat Data Tumbuhan</h3>
                <p>
                    Buka halaman Tumbuhan untuk melihat daftar tanaman, nama latin,
                    kategori, dan detail informasi tumbuhan.
                </p>
                <a href="tumbuhan.php">Lihat Tumbuhan</a>
            </div>

            <div class="help-card">
                <div class="help-icon">🔍</div>
                <h3>Mencari Tumbuhan</h3>
                <p>
                    Gunakan kolom pencarian pada halaman Tumbuhan untuk mencari
                    nama tanaman, nama latin, atau kategori tumbuhan.
                </p>
                <a href="tumbuhan.php">Cari Tumbuhan</a>
            </div>

            <div class="help-card">
                <div class="help-icon">📄</div>
                <h3>Informasi Detail</h3>
                <p>
                    Klik tombol Lihat Detail pada salah satu tumbuhan untuk membaca
                    habitat, manfaat, perawatan, dan deskripsi.
                </p>
                <a href="tumbuhan.php">Buka Detail</a>
            </div>

        </section>

        <section class="help-contact">

            <h2>Masih Butuh Bantuan?</h2>

            <p>
                Hubungi admin FloraScan melalui WhatsApp jika mengalami kendala
                atau ingin memberikan masukan.
            </p>

            <div class="help-buttons">

                <a href="https://wa.me/6281265806216?text=Halo%20admin%20FloraScan,%20saya%20ingin%20bertanya%20tentang%20FloraScan." target="_blank" rel="noopener noreferrer">
                    Hubungi Admin
                </a>

                <a href="https://wa.me/6281265806216?text=Halo%20admin%20FloraScan,%20saya%20ingin%20memberikan%20saran%20untuk%20website%20FloraScan." target="_blank" rel="noopener noreferrer">
                    Beri Masukan
                </a>

            </div>

        </section>

    </main>

</body>

</html>
