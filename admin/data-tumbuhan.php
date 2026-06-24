<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM tumbuhan ORDER BY id_tumbuhan DESC");

$totalData = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tumbuhan - FloraScan</title>

    <link rel="stylesheet" href="/florascan/css/admin.css?v=1150">
</head>

<body>

<div class="admin-layout">

    <?php include __DIR__ . '/sidebar.php'; ?>

    <main class="admin-content">

        <div class="dashboard-header">

            <div>
                <h1>Data Tumbuhan</h1>
                <p>Kelola data tanaman yang akan ditampilkan kepada wisatawan.</p>
            </div>

            <a href="tambah-tumbuhan.php" class="btn-admin">
                + Tambah Data
            </a>

        </div>

        <div class="data-summary-card">
            <h2><?= $totalData; ?></h2>
            <p>Total data tumbuhan tersimpan</p>
        </div>

        <div class="admin-table-card">

            <div class="table-title">
                <h2>Daftar Tumbuhan</h2>
                <p>Data tumbuhan yang sudah dimasukkan oleh petugas.</p>
            </div>

            <table class="admin-table">

                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Nama Latin</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php if ($totalData > 0) { ?>

                    <?php while ($t = mysqli_fetch_assoc($data)) { ?>

                    <tr>

                        <td>
                            <?php if (!empty($t['gambar'])) { ?>
                                <img src="../img/<?= $t['gambar']; ?>" class="table-img">
                            <?php } else { ?>
                                <div class="no-img">Tidak ada foto</div>
                            <?php } ?>
                        </td>

                        <td>
                            <strong><?= $t['nama_tumbuhan']; ?></strong>
                        </td>

                        <td>
                            <i><?= $t['nama_latin']; ?></i>
                        </td>

                        <td>
                            <span class="kategori-badge">
                                <?= $t['kategori']; ?>
                            </span>
                        </td>

                        <td class="table-action">

                            <a href="../detail.php?id=<?= $t['id_tumbuhan']; ?>" class="action-btn view">
                                Detail
                            </a>

                            <a href="generate-qr.php?id=<?= $t['id_tumbuhan']; ?>" class="action-btn qr">
                                QR
                            </a>

                            <a href="edit-tumbuhan.php?id=<?= $t['id_tumbuhan']; ?>" class="action-btn edit">
                                Edit
                            </a>

                            <a href="hapus-tumbuhan.php?id=<?= $t['id_tumbuhan']; ?>" class="action-btn delete" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </a>

                        </td>

                    </tr>

                    <?php } ?>

                <?php } else { ?>

                    <tr>
                        <td colspan="5" style="text-align:center !important; padding:75px 20px !important;">

                            <div style="
                                width:100%;
                                display:flex;
                                flex-direction:column;
                                align-items:center;
                                justify-content:center;
                                text-align:center;
                            ">

                                <h3 style="
                                    margin:0 0 12px 0;
                                    color:#123522;
                                    font-size:24px;
                                    text-align:center;
                                ">
                                    Belum ada data tumbuhan
                                </h3>

                                <p style="
                                    margin:0;
                                    color:#5f6f65;
                                    font-size:16px;
                                    text-align:center;
                                ">
                                    Silakan tambahkan data tumbuhan terlebih dahulu.
                                </p>

                            </div>

                        </td>
                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </main>

</div>

</body>
</html>