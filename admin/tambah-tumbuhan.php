<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../koneksi.php';

if (isset($_POST['simpan'])) {

    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_tumbuhan']);
    $latin = mysqli_real_escape_string($koneksi, $_POST['nama_latin']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $habitat = mysqli_real_escape_string($koneksi, $_POST['habitat']);
    $asal = mysqli_real_escape_string($koneksi, $_POST['asal']);
    $manfaat = mysqli_real_escape_string($koneksi, $_POST['manfaat']);
    $perawatan = mysqli_real_escape_string($koneksi, $_POST['perawatan']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

    $gambar = "";

    if (!is_dir("../img")) {
        mkdir("../img", 0777, true);
    }

    if (!empty($_FILES['gambar']['name'])) {
        $namaFile = $_FILES['gambar']['name'];
        $tmpFile = $_FILES['gambar']['tmp_name'];

        $gambar = time() . "_" . $namaFile;

        move_uploaded_file($tmpFile, "../img/" . $gambar);
    }

    mysqli_query($koneksi, "INSERT INTO tumbuhan 
    (
        nama_tumbuhan,
        nama_latin,
        kategori,
        habitat,
        asal,
        manfaat,
        perawatan,
        deskripsi,
        gambar
    )
    VALUES
    (
        '$nama',
        '$latin',
        '$kategori',
        '$habitat',
        '$asal',
        '$manfaat',
        '$perawatan',
        '$deskripsi',
        '$gambar'
    )");

    header("Location: data-tumbuhan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tumbuhan - FloraScan</title>

    <link rel="stylesheet" href="/florascan/css/admin.css?v=1150">
</head>

<body>

<div class="admin-layout">

    <?php include __DIR__ . '/sidebar.php'; ?>

    <main class="admin-content">

        <div class="admin-page-header">

            <div>
                <h1>Tambah Data Tumbuhan</h1>
                <p>Masukkan informasi tumbuhan yang akan ditampilkan kepada wisatawan.</p>
            </div>

        </div>

        <div class="admin-form-card">

            <form method="POST" enctype="multipart/form-data">

                <div class="form-grid">

                    <div class="form-group">
                        <label>Nama Tumbuhan</label>
                        <input type="text" name="nama_tumbuhan" placeholder="Contoh: Jati" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Latin</label>
                        <input type="text" name="nama_latin" placeholder="Contoh: Tectona grandis" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" name="kategori" placeholder="Contoh: Pohon, Bunga, Herbal" required>
                    </div>

                    <div class="form-group">
                        <label>Habitat</label>
                        <input type="text" name="habitat" placeholder="Contoh: Hutan Tropis" required>
                    </div>

                    <div class="form-group">
                        <label>Asal</label>
                        <input type="text" name="asal" placeholder="Contoh: Asia Tenggara" required>
                    </div>

                    <div class="form-group">
                        <label>Upload Gambar</label>
                        <input type="file" name="gambar" accept="image/*">
                    </div>

                    <div class="form-group full">
                        <label>Manfaat</label>
                        <textarea name="manfaat" placeholder="Masukkan manfaat tumbuhan" required></textarea>
                    </div>

                    <div class="form-group full">
                        <label>Perawatan</label>
                        <textarea name="perawatan" placeholder="Masukkan cara perawatan tumbuhan" required></textarea>
                    </div>

                    <div class="form-group full">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" placeholder="Masukkan deskripsi tumbuhan" required></textarea>
                    </div>

                </div>

                <div class="form-actions">

                    <a href="data-tumbuhan.php" class="btn-secondary-admin">
                        Batal
                    </a>

                    <button type="submit" name="simpan" class="btn-admin">
                        Simpan Data
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>