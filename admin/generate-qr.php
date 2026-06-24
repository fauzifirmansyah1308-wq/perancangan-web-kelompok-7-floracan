<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: data-tumbuhan.php");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$query = mysqli_query($koneksi, "SELECT * FROM tumbuhan WHERE id_tumbuhan='$id'");

if (mysqli_num_rows($query) == 0) {
    echo "Data tumbuhan tidak ditemukan.";
    exit;
}

$tumbuhan = mysqli_fetch_assoc($query);

/*
    Karena website kamu di hosting ada di:
    htdocs/florascan/

    Maka link online-nya:
    https://florascan.gt.tc/florascan
*/

$baseUrl = "https://florascan.gt.tc/florascan";

$linkDetail = $baseUrl . "/detail.php?id=" . $id;

$qrCode = "https://api.qrserver.com/v1/create-qr-code/?size=350x350&data=" . urlencode($linkDetail);

$qrCodeSave = mysqli_real_escape_string($koneksi, $qrCode);

mysqli_query($koneksi, "UPDATE tumbuhan SET qr_code='$qrCodeSave' WHERE id_tumbuhan='$id'");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QR - FloraScan</title>

    <link rel="stylesheet" href="/florascan/css/admin.css?v=1160">

    <style>
        .qr-page-card{
            background:white;
            padding:34px;
            border-radius:26px;
            box-shadow:0 12px 35px rgba(0,0,0,0.08);
            max-width:850px;
        }

        .qr-content{
            display:grid;
            grid-template-columns:360px 1fr;
            gap:35px;
            align-items:center;
        }

        .qr-box{
            background:#f7fbf8;
            border:2px solid #e0eee4;
            border-radius:24px;
            padding:24px;
            text-align:center;
        }

        .qr-box img{
            width:100%;
            max-width:320px;
            border-radius:14px;
            background:white;
            padding:12px;
        }

        .qr-box p{
            margin-top:16px;
            color:#5f6f65;
            font-weight:bold;
        }

        .qr-info h2{
            color:#123522;
            font-size:32px;
            margin-bottom:8px;
        }

        .qr-info i{
            display:block;
            color:#5f6f65;
            font-size:18px;
            margin-bottom:18px;
        }

        .qr-info p{
            color:#405147;
            line-height:1.7;
        }

        .qr-link-box{
            background:#f4f8f4;
            padding:16px;
            border-radius:16px;
            color:#17492d;
            word-break:break-all;
            margin:20px 0;
            font-weight:bold;
            line-height:1.6;
        }

        .qr-actions{
            display:flex;
            gap:15px;
            flex-wrap:wrap;
            margin-top:25px;
        }

        .btn-print{
            display:inline-block;
            background:#8e44ad;
            color:white;
            padding:14px 24px;
            border-radius:14px;
            text-decoration:none;
            font-weight:bold;
            border:none;
            cursor:pointer;
        }

        .btn-print:hover{
            background:#703688;
        }

        @media(max-width:900px){
            .qr-content{
                grid-template-columns:1fr;
            }

            .qr-page-card{
                padding:26px;
            }

            .qr-info h2{
                font-size:28px;
            }

            .qr-actions{
                flex-direction:column;
            }

            .qr-actions a,
            .qr-actions button{
                width:100%;
                text-align:center;
            }
        }

        @media print{
            .admin-sidebar,
            .admin-mobile-topbar,
            .admin-overlay,
            .close-sidebar,
            .mobile-menu-btn,
            .dashboard-header,
            .qr-actions{
                display:none !important;
            }

            .admin-layout{
                display:block !important;
            }

            .admin-content{
                padding:0 !important;
            }

            .qr-page-card{
                box-shadow:none;
                max-width:100%;
            }

            .qr-content{
                grid-template-columns:1fr;
                text-align:center;
            }
        }
    </style>
</head>

<body>

<div class="admin-layout">

    <?php include __DIR__ . '/sidebar.php'; ?>

    <main class="admin-content">

        <div class="dashboard-header">

            <div>
                <h1>QR Code Tumbuhan</h1>
                <p>QR Code untuk mengakses detail tumbuhan secara langsung.</p>
            </div>

        </div>

        <div class="qr-page-card">

            <div class="qr-content">

                <div class="qr-box">

                    <img 
                        src="<?= htmlspecialchars($qrCode); ?>" 
                        alt="QR Code <?= htmlspecialchars($tumbuhan['nama_tumbuhan']); ?>"
                    >

                    <p>
                        Scan untuk melihat detail tumbuhan
                    </p>

                </div>

                <div class="qr-info">

                    <h2><?= htmlspecialchars($tumbuhan['nama_tumbuhan']); ?></h2>

                    <i><?= htmlspecialchars($tumbuhan['nama_latin']); ?></i>

                    <p>
                        QR Code ini berisi link menuju halaman detail tumbuhan.
                        Saat wisatawan melakukan scan, halaman detail akan terbuka
                        dan data tumbuhan ditampilkan dari database.
                    </p>

                    <div class="qr-link-box">
                        <?= htmlspecialchars($linkDetail); ?>
                    </div>

                    <div class="qr-actions">

                        <a href="<?= htmlspecialchars($linkDetail); ?>" target="_blank" class="btn-admin">
                            Lihat Detail
                        </a>

                        <button onclick="window.print()" class="btn-print">
                            Cetak QR
                        </button>

                        <a href="data-tumbuhan.php" class="btn-secondary-admin">
                            Kembali ke Data
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>