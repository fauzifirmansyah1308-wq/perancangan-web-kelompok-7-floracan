<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "florascan"
);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>