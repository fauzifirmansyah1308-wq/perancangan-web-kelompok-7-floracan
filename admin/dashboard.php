<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../koneksi.php';

$totalTumbuhan = 0;
$totalKategori = 0;

$qTumbuhan = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tumbuhan");
if ($qTumbuhan) {
    $row = mysqli_fetch_assoc($qTumbuhan);
    $totalTumbuhan = $row['total'];
}

$qKategori = mysqli_query($koneksi, "SELECT COUNT(DISTINCT kategori) AS total FROM tumbuhan");
if ($qKategori) {
    $row = mysqli_fetch_assoc($qKategori);
    $totalKategori = $row['total'];
}

$namaAdmin = isset($_SESSION['nama_admin']) ? $_SESSION['nama_admin'] : "Admin FloraScan";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin FloraScan</title>

    <link rel="stylesheet" href="/florascan/css/admin.css?v=1150">
</head>

<body>

<div class="admin-layout">

    <?php include __DIR__ . '/sidebar.php'; ?>

    <main class="admin-content">

        <div class="dashboard-header">

            <div>
                <h1>Dashboard Petugas</h1>
                <p>Selamat datang, <?= $namaAdmin; ?></p>
            </div>

        </div>

        <div class="stat-grid">

            <div class="stat-card">
                <div class="stat-icon">🌿</div>
                <h3><?= $totalTumbuhan; ?></h3>
                <p>Total Tumbuhan</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🏷️</div>
                <h3><?= $totalKategori; ?></h3>
                <p>Total Kategori</p>
            </div>

        </div>

        <div class="dashboard-card">

            <h2>Kelola Data Tumbuhan</h2>

            <p>
                Petugas dapat menambahkan, mengubah, menghapus data tumbuhan,
                serta membuat QR Code pada setiap data tanaman melalui halaman Data Tumbuhan.
            </p>

            <div class="dashboard-actions">

                <a href="data-tumbuhan.php" class="btn-admin">
                    Lihat Data
                </a>

                <a href="tambah-tumbuhan.php" class="btn-secondary-admin">
                    Tambah Data
                </a>

            </div>

        </div>

    </main>

</div>

</body>
</html>