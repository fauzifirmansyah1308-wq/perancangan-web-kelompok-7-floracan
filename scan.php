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
    <title>Scan QR - FloraScan</title>

    <link rel="stylesheet" href="css/style.css?v=47">

    <script src="https://unpkg.com/html5-qrcode"></script>
</head>

<body>

    <nav class="navbar">

        <div class="logo-wrap">
            <img src="img/logo-florascan.png" alt="FloraScan" class="logo-img">
        </div>

        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tumbuhan.php">Tumbuhan</a></li>
            <li><a href="scan.php" class="active">Scan QR</a></li>
            <li><a href="tentang.php">Tentang Kami</a></li>
        </ul>

        <?php if (isset($_SESSION['admin'])) { ?>
            <a href="admin/dashboard.php" class="nav-btn">Halaman Admin</a>
        <?php } else { ?>
            <a href="admin/login.php" class="nav-btn">Login Admin</a>
        <?php } ?>

    </nav>

    <main class="scan-page">

        <section class="scan-header">

            <h1>Scan QR Tumbuhan</h1>

            <p>
                Arahkan kamera ke QR Code pada papan tanaman untuk melihat informasi detail tumbuhan.
            </p>

        </section>

        <section class="scan-box">

            <div class="scan-card">

                <div class="scan-icon">📷</div>

                <h2>Kamera Scanner</h2>

                <p>
                    Izinkan akses kamera saat browser meminta permission.
                </p>

                <div id="reader"></div>

                <div id="scan-result">
                    Menunggu hasil scan...
                </div>

            </div>

        </section>

    </main>

    <script>
        function onScanSuccess(decodedText, decodedResult) {

            document.getElementById("scan-result").innerHTML =
                "QR berhasil discan. Mengalihkan halaman...";

            if (decodedText.startsWith("http://") || decodedText.startsWith("https://")) {
                window.location.href = decodedText;
            } else {
                alert("Isi QR: " + decodedText);
            }
        }

        function onScanFailure(error) {
            // Error scan tidak ditampilkan supaya tidak spam
        }

        let scanner = new Html5QrcodeScanner(
            "reader",
            {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            false
        );

        scanner.render(onScanSuccess, onScanFailure);
    </script>

</body>

</html>