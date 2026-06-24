<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "florascann"
);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>