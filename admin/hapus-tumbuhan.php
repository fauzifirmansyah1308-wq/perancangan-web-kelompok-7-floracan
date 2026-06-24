<?php
include '../koneksi.php';
include 'auth.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM tumbuhan WHERE id_tumbuhan='$id'");
$t = mysqli_fetch_assoc($data);

if ($t['gambar'] != "" && file_exists("../img/" . $t['gambar'])) {
    unlink("../img/" . $t['gambar']);
}

mysqli_query($koneksi, "DELETE FROM tumbuhan WHERE id_tumbuhan='$id'");

header("Location: data-tumbuhan.php");
exit;
?>