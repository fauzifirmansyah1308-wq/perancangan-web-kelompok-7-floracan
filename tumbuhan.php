<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'koneksi.php';

$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($koneksi, $_GET['keyword']) : "";
$kategoriFilter = isset($_GET['kategori']) ? mysqli_real_escape_string($koneksi, $_GET['kategori']) : "";

$queryKategori = mysqli_query($koneksi, "SELECT DISTINCT kategori FROM tumbuhan WHERE kategori != '' ORDER BY kategori ASC");

$sql = "SELECT * FROM tumbuhan WHERE 1=1";

if ($keyword != "") {
    $sql .= " AND (
        nama_tumbuhan LIKE '%$keyword%' 
        OR nama_latin LIKE '%$keyword%' 
        OR kategori LIKE '%$keyword%'
    )";
}

if ($kategoriFilter != "") {
    $sql .= " AND kategori = '$kategoriFilter'";
}

$sql .= " ORDER BY id_tumbuhan DESC";

$dataTumbuhan = mysqli_query($koneksi, $sql);
$totalTumbuhan = mysqli_num_rows($dataTumbuhan);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Tumbuhan - FloraScan</title>

    <link rel="stylesheet" href="css/style.css?v=50">
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

    <main class="plant-page">

        <section class="plant-header">

            <h1>Jelajahi Tumbuhan</h1>

            <p>
                Temukan berbagai jenis tumbuhan yang ada di Orangutan Haven dengan mudah.
            </p>

            <form method="GET" class="plant-filter" id="plantSearchForm">

                <div class="search-box">
                    <span>🔍</span>

                    <input 
                        type="text" 
                        name="keyword" 
                        id="keywordInput"
                        placeholder="Jelajahi Tumbuhan"
                        value="<?= htmlspecialchars($keyword); ?>"
                        autocomplete="off"
                    >
                </div>

                <select name="kategori" onchange="this.form.submit()">

                    <option value="">Semua Kategori</option>

                    <?php while ($kat = mysqli_fetch_assoc($queryKategori)) { ?>

                        <option 
                            value="<?= htmlspecialchars($kat['kategori']); ?>" 
                            <?= $kategoriFilter == $kat['kategori'] ? 'selected' : ''; ?>
                        >
                            <?= htmlspecialchars($kat['kategori']); ?>
                        </option>

                    <?php } ?>

                </select>

                <button type="submit" class="filter-btn">
                    Cari
                </button>

            </form>

        </section>

        <section class="plant-grid-section">

            <?php if ($totalTumbuhan > 0) { ?>

                <div class="plant-grid">

                    <?php while ($t = mysqli_fetch_assoc($dataTumbuhan)) { ?>

                        <div class="plant-card">

                            <div class="plant-img-wrap">

                                <?php if (!empty($t['gambar'])) { ?>

                                    <img 
                                        src="img/<?= htmlspecialchars($t['gambar']); ?>" 
                                        alt="<?= htmlspecialchars($t['nama_tumbuhan']); ?>"
                                    >

                                <?php } else { ?>

                                    <div class="plant-no-img">
                                        🌿
                                    </div>

                                <?php } ?>

                            </div>

                            <div class="plant-card-body">

                                <h3><?= htmlspecialchars($t['nama_tumbuhan']); ?></h3>

                                <p>
                                    <i><?= htmlspecialchars($t['nama_latin']); ?></i>
                                </p>

                                <a href="detail.php?id=<?= $t['id_tumbuhan']; ?>">
                                    Lihat Detail <span>→</span>
                                </a>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            <?php } else { ?>

                <div class="empty-plant">

                    <h2>Data tumbuhan tidak ditemukan</h2>

                    <p>
                        Coba gunakan kata kunci lain atau pilih kategori yang berbeda.
                    </p>

                    <a href="tumbuhan.php">
                        Tampilkan Semua Tumbuhan
                    </a>

                </div>

            <?php } ?>

        </section>

    </main>

    <script>
        let searchTimer;
        const keywordInput = document.getElementById("keywordInput");

        if (keywordInput) {
            keywordInput.addEventListener("input", function () {
                clearTimeout(searchTimer);

                searchTimer = setTimeout(function () {
                    keywordInput.form.submit();
                }, 700);
            });
        }
    </script>

</body>

</html>