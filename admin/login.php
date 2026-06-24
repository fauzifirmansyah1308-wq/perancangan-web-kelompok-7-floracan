<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit;
}

include '../koneksi.php';

$error = "";

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");

    if (mysqli_num_rows($query) > 0) {

        $admin = mysqli_fetch_assoc($query);

        if ($password == $admin['password']) {

            $_SESSION['admin'] = $admin['id_admin'];
            $_SESSION['nama_admin'] = $admin['nama'];
            $_SESSION['username_admin'] = $admin['username'];

            header("Location: dashboard.php");
            exit;

        } else {
            $error = "Password salah!";
        }

    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin FloraScan</title>

    <link rel="stylesheet" href="../css/style.css?v=48">
</head>

<body class="login-body">

    <div class="login-card">

        <div class="login-logo-img">
            <img src="../img/logo-florascan.png" alt="FloraScan">
        </div>

        <h2>Login Admin</h2>

        <p>
            Silakan login sebagai petugas untuk mengelola data tumbuhan.
        </p>

        <?php if ($error != "") { ?>
            <div class="alert">
                <?= $error; ?>
            </div>
        <?php } ?>

        <form method="POST">

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <button type="submit" name="login">
                Login
            </button>

        </form>

        <a href="../index.php" class="back-home">
            ← Kembali ke Beranda
        </a>

    </div>

</body>

</html>