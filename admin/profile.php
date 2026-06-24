<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../koneksi.php';

$idAdmin = $_SESSION['admin'];

$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$idAdmin'");
$admin = mysqli_fetch_assoc($query);

$namaAdmin = $admin['nama'];
$usernameAdmin = $admin['username'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun - FloraScan</title>

    <link rel="stylesheet" href="/florascan/css/admin.css?v=1150">
</head>

<body>

<div class="admin-layout">

    <?php include __DIR__ . '/sidebar.php'; ?>

    <main class="admin-content">

        <div class="dashboard-header">

            <div>
                <h1>Profil Akun</h1>
                <p>Informasi akun petugas yang sedang login.</p>
            </div>

        </div>

        <div class="admin-profile-card" style="max-width:700px;">

            <div class="profile-avatar">
                <?= strtoupper(substr($namaAdmin, 0, 1)); ?>
            </div>

            <div class="profile-info">
                <h3><?= htmlspecialchars($namaAdmin); ?></h3>
                <p>@<?= htmlspecialchars($usernameAdmin); ?></p>
            </div>

            <div class="profile-status">
                <span></span>
                Online
            </div>

        </div>

        <div class="dashboard-card" style="max-width:700px;">

            <h2>Detail Akun</h2>

            <p>
                Halaman ini menampilkan informasi akun petugas yang sedang login
                ke sistem FloraScan.
            </p>

            <table class="admin-table">

                <tr>
                    <th>Informasi</th>
                    <th>Data</th>
                </tr>

                <tr>
                    <td>Nama Petugas</td>
                    <td><strong><?= htmlspecialchars($namaAdmin); ?></strong></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>@<?= htmlspecialchars($usernameAdmin); ?></td>
                </tr>

                <tr>
                    <td>Role</td>
                    <td>
                        <span class="kategori-badge">
                            Admin / Petugas
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <span class="kategori-badge">
                            Online
                        </span>
                    </td>
                </tr>

            </table>

            <div class="dashboard-actions" style="margin-top:28px;">

                <a href="dashboard.php" class="btn-secondary-admin">
                    Kembali ke Dashboard
                </a>

                <button type="button" class="btn-logout-page" onclick="openLogoutPopup()">
                    Logout
                </button>

            </div>

        </div>

    </main>

</div>

<div class="logout-popup-overlay" id="logoutPopup">

    <div class="logout-popup-box">

        <div class="logout-popup-icon">
            ⚠️
        </div>

        <h2>Konfirmasi Logout</h2>

        <p>
            Apakah Anda yakin ingin keluar dari halaman admin FloraScan?
        </p>

        <div class="logout-popup-actions">

            <button type="button" class="btn-cancel-logout" onclick="closeLogoutPopup()">
                Batal
            </button>

            <a href="logout.php" class="btn-confirm-logout">
                Ya, Logout
            </a>

        </div>

    </div>

</div>

<script>
    function openLogoutPopup() {
        document.getElementById("logoutPopup").classList.add("show-logout-popup");
    }

    function closeLogoutPopup() {
        document.getElementById("logoutPopup").classList.remove("show-logout-popup");
    }
</script>

</body>
</html>