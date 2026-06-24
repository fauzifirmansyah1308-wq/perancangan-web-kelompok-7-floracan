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
    <title>Tentang Kami - FloraScan</title>

    <link rel="stylesheet" href="css/style.css?v=47">
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
            <li><a href="tentang.php" class="active">Tentang Kami</a></li>
        </ul>

        <?php if (isset($_SESSION['admin'])) { ?>
            <a href="admin/dashboard.php" class="nav-btn">Halaman Admin</a>
        <?php } else { ?>
            <a href="admin/login.php" class="nav-btn">Login Admin</a>
        <?php } ?>

    </nav>

    <section class="about-page">

        <div class="about-banner">

            <span>🌿 About FloraScan</span>

            <h1>Menghubungkan Wisatawan dengan Alam</h1>

            <p>
                FloraScan adalah sistem informasi tumbuhan berbasis QR Code
                yang dirancang untuk mendukung wisata edukasi dan sustainable tourism.
                Melalui FloraScan, wisatawan dapat mengenal tumbuhan dengan cara yang
                lebih mudah, cepat, dan interaktif.
            </p>

        </div>

        <div class="about-grid">

            <div class="about-card">
                <h3>🌱 Misi Kami</h3>

                <p>
                    Membantu wisatawan memahami manfaat, habitat, dan karakteristik
                    tumbuhan secara praktis melalui teknologi digital berbasis QR Code.
                </p>
            </div>

            <div class="about-card">
                <h3>📱 Manfaat</h3>

                <p>
                    FloraScan membantu pengelola wisata menyediakan informasi tanaman
                    secara rapi, mudah diakses, dan ramah lingkungan tanpa harus
                    menggunakan banyak papan informasi fisik.
                </p>
            </div>

            <div class="about-card">
                <h3>🌳 Konservasi</h3>

                <p>
                    Sistem ini mendukung edukasi konservasi tumbuhan dan lingkungan
                    kepada pengunjung kawasan wisata agar lebih peduli terhadap alam.
                </p>
            </div>

        </div>

    </section>

</body>

</html>