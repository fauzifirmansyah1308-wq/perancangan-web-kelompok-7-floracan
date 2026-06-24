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

if (isset($_POST['update'])) {

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_tumbuhan']);
    $latin = mysqli_real_escape_string($koneksi, $_POST['nama_latin']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $habitat = mysqli_real_escape_string($koneksi, $_POST['habitat']);
    $asal = mysqli_real_escape_string($koneksi, $_POST['asal']);
    $manfaat = mysqli_real_escape_string($koneksi, $_POST['manfaat']);
    $perawatan = mysqli_real_escape_string($koneksi, $_POST['perawatan']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    $gambar = $tumbuhan['gambar'];

    if (!is_dir("../img")) {
        mkdir("../img", 0777, true);
    }

    if (!empty($_FILES['gambar']['name'])) {

        $namaFile = $_FILES['gambar']['name'];
        $tmpFile = $_FILES['gambar']['tmp_name'];

        $gambarBaru = time() . "_" . $namaFile;

        move_uploaded_file($tmpFile, "../img/" . $gambarBaru);

        if (!empty($tumbuhan['gambar']) && file_exists("../img/" . $tumbuhan['gambar'])) {
            unlink("../img/" . $tumbuhan['gambar']);
        }

        $gambar = $gambarBaru;
    }

    mysqli_query($koneksi, "UPDATE tumbuhan SET
        nama_tumbuhan = '$nama',
        nama_latin = '$latin',
        kategori = '$kategori',
        habitat = '$habitat',
        asal = '$asal',
        manfaat = '$manfaat',
        perawatan = '$perawatan',
        deskripsi = '$deskripsi',
        gambar = '$gambar'
        WHERE id_tumbuhan = '$id'
    ");

    header("Location: data-tumbuhan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Tumbuhan - FloraScan</title>

    <link rel="stylesheet" href="/florascan/css/admin.css?v=1150">
</head>

<body>

<div class="admin-layout">

    <?php include __DIR__ . '/sidebar.php'; ?>

    <main class="admin-content">

        <div class="admin-page-header">

            <div>
                <h1>Edit Data Tumbuhan</h1>
                <p>Ubah informasi tumbuhan yang akan ditampilkan kepada wisatawan.</p>
            </div>

        </div>

        <div class="admin-form-card">

            <form method="POST" enctype="multipart/form-data">

                <div class="form-grid">

                    <div class="form-group">
                        <label>Nama Tumbuhan</label>
                        <input 
                            type="text" 
                            name="nama_tumbuhan" 
                            value="<?= htmlspecialchars($tumbuhan['nama_tumbuhan']); ?>" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label>Nama Latin</label>
                        <input 
                            type="text" 
                            name="nama_latin" 
                            value="<?= htmlspecialchars($tumbuhan['nama_latin']); ?>" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input 
                            type="text" 
                            name="kategori" 
                            value="<?= htmlspecialchars($tumbuhan['kategori']); ?>" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label>Habitat</label>
                        <input 
                            type="text" 
                            name="habitat" 
                            value="<?= htmlspecialchars($tumbuhan['habitat']); ?>" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label>Asal</label>
                        <input 
                            type="text" 
                            name="asal" 
                            value="<?= htmlspecialchars($tumbuhan['asal']); ?>" 
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label>Upload Gambar Baru</label>
                        <input type="file" name="gambar" accept="image/*">
                    </div>

                    <?php if (!empty($tumbuhan['gambar'])) { ?>

                        <div class="form-group full">
                            <label>Gambar Lama</label>

                            <img 
                                src="../img/<?= htmlspecialchars($tumbuhan['gambar']); ?>" 
                                alt="<?= htmlspecialchars($tumbuhan['nama_tumbuhan']); ?>"
                                style="
                                    width:220px;
                                    height:150px;
                                    object-fit:cover;
                                    border-radius:18px;
                                    box-shadow:0 8px 24px rgba(0,0,0,0.12);
                                "
                            >
                        </div>

                    <?php } ?>

                    <div class="form-group full">
                        <label>Manfaat</label>
                        <textarea name="manfaat" required><?= htmlspecialchars($tumbuhan['manfaat']); ?></textarea>
                    </div>

                    <div class="form-group full">
                        <label>Perawatan</label>
                        <textarea name="perawatan" required><?= htmlspecialchars($tumbuhan['perawatan']); ?></textarea>
                    </div>

                    <div class="form-group full">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" required><?= htmlspecialchars($tumbuhan['deskripsi']); ?></textarea>
                    </div>

                </div>

                <div class="form-actions">

                    <a href="data-tumbuhan.php" class="btn-secondary-admin">
                        Batal
                    </a>

                    <button type="submit" name="update" class="btn-admin">
                        Update Data
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>