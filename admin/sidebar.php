<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="admin-mobile-topbar">
    <img src="../img/logotransparan.png" alt="FloraScan" class="admin-mobile-logo">

    <button type="button" class="mobile-menu-btn" onclick="openSidebar()">
        ☰
    </button>
</div>

<div class="admin-overlay" onclick="closeSidebar()"></div>

<aside class="admin-sidebar" id="adminSidebar">

    <button type="button" class="close-sidebar" onclick="closeSidebar()">
        ×
    </button>

    <div class="admin-logo">
        <img 
            src="../img/logotransparan.png" 
            alt="FloraScan" 
            class="admin-logo-img"
        >

        <p>Admin Panel</p>
    </div>

    <a href="dashboard.php" class="<?= $currentPage == 'dashboard.php' ? 'active-admin' : ''; ?>">
        Dashboard
    </a>

    <a href="data-tumbuhan.php" class="<?= $currentPage == 'data-tumbuhan.php' ? 'active-admin' : ''; ?>">
        Data Tumbuhan
    </a>

    <a href="tambah-tumbuhan.php" class="<?= $currentPage == 'tambah-tumbuhan.php' ? 'active-admin' : ''; ?>">
        Tambah Tumbuhan
    </a>

    <a href="../index.php">
        Lihat Website
    </a>

    <a href="profile.php" class="<?= $currentPage == 'profile.php' ? 'profile-menu active-admin' : 'profile-menu'; ?>">
        Profil Akun
    </a>

</aside>

<script>
    function openSidebar() {
        document.getElementById("adminSidebar").classList.add("show-sidebar");
        document.querySelector(".admin-overlay").classList.add("show-overlay");
    }

    function closeSidebar() {
        document.getElementById("adminSidebar").classList.remove("show-sidebar");
        document.querySelector(".admin-overlay").classList.remove("show-overlay");
    }
</script>