<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: tumbuhan.php");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$query = mysqli_query($koneksi, "SELECT * FROM tumbuhan WHERE id_tumbuhan='$id'");

if (mysqli_num_rows($query) == 0) {
    echo "Data tumbuhan tidak ditemukan.";
    exit;
}

$tumbuhan = mysqli_fetch_assoc($query);

$gambar = !empty($tumbuhan['gambar']) ? "img/" . $tumbuhan['gambar'] : "";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($tumbuhan['nama_tumbuhan']); ?> - FloraScan</title>

    <link rel="stylesheet" href="css/style.css?v=47">
</head>

<body>

<nav class="navbar">

    <div class="logo-wrap">
        <img src="img/logo-florascan.png" alt="FloraScan" class="logo-img">
    </div>

    <ul>
        <li><a href="index.php">Beranda</a></li>
        <li><a href="tumbuhan.php" class="active">Tumbuhan</a></li>
        <li><a href="scan.php">Scan QR</a></li>
        <li><a href="tentang.php">Tentang Kami</a></li>
    </ul>

    <?php if (isset($_SESSION['admin'])) { ?>
        <a href="admin/dashboard.php" class="nav-btn">Halaman Admin</a>
    <?php } else { ?>
        <a href="admin/login.php" class="nav-btn">Login Admin</a>
    <?php } ?>

</nav>

<main class="detail-page">

    <a href="tumbuhan.php" class="detail-back">←</a>

    <section class="detail-banner" style="background-image:linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('<?= htmlspecialchars($gambar); ?>');">

        <div class="detail-banner-content">

            <h1><?= htmlspecialchars($tumbuhan['nama_tumbuhan']); ?></h1>

            <h3>
                (<?= htmlspecialchars($tumbuhan['nama_latin']); ?>)
            </h3>

            <div class="detail-meta">

                <div>
                    <span>🌿</span>
                    <p>Kategori<br><b><?= htmlspecialchars($tumbuhan['kategori']); ?></b></p>
                </div>

                <div>
                    <span>🏞️</span>
                    <p>Habitat<br><b><?= htmlspecialchars($tumbuhan['habitat']); ?></b></p>
                </div>

                <div>
                    <span>🌏</span>
                    <p>Asal<br><b><?= htmlspecialchars($tumbuhan['asal']); ?></b></p>
                </div>

            </div>

        </div>

    </section>

    <section class="detail-description">

        <div class="desc-icon">🌿</div>

        <p>
            <?= nl2br(htmlspecialchars($tumbuhan['deskripsi'])); ?>
        </p>

    </section>

    <section class="detail-card-grid">

        <div class="detail-small-card">

            <h3>Kategori Tumbuhan</h3>

            <div class="detail-card-content">
                <div class="card-icon">🌳</div>

                <div>
                    <h4><?= htmlspecialchars($tumbuhan['kategori']); ?></h4>
                    <p>
                        Jenis atau kelompok tumbuhan berdasarkan karakteristiknya.
                    </p>
                </div>
            </div>

        </div>

        <div class="detail-small-card">

            <h3>Habitat</h3>

            <div class="detail-card-content">
                <div class="card-icon">🏠</div>

                <div>
                    <p>
                        <?= nl2br(htmlspecialchars($tumbuhan['habitat'])); ?>
                    </p>
                </div>
            </div>

        </div>

        <div class="detail-small-card">

            <h3>Manfaat</h3>

            <div class="detail-card-content">
                <div class="card-icon">💚</div>

                <div>
                    <p>
                        <?= nl2br(htmlspecialchars($tumbuhan['manfaat'])); ?>
                    </p>
                </div>
            </div>

        </div>

        <div class="detail-small-card">

            <h3>Perawatan</h3>

            <div class="detail-card-content">
                <div class="card-icon">🪴</div>

                <div>
                    <p>
                        <?= nl2br(htmlspecialchars($tumbuhan['perawatan'])); ?>
                    </p>
                </div>
            </div>

        </div>

    </section>

</main>

</body>

</html>