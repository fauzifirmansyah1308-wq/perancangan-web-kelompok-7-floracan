-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2026 pada 13.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `florascan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin FloraScan', 'admin', 'admin123'),
(2, 'Pak Yosua', 'yosua', 'yosua123'),
(3, 'Bu Siska', 'siska', 'siska123'),
(4, 'Pak Ikhwan', 'ikhwan', 'ikhwan123'),
(5, 'Kak Riska', 'riska', 'riska123'),
(6, 'Kak Jove', 'jove', 'jove123'),
(7, 'Pak Azril', 'azril', 'azril123'),
(8, 'Bang Satria', 'satria', 'satria123'),
(9, 'Pak Damson', 'damson', 'damson123'),
(10, 'Bang Roma', 'roma', 'roma123'),
(11, 'Bang Dio', 'dio', 'dio123'),
(12, 'Bang Bayu', 'bayu', 'bayu123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tumbuhan`
--

CREATE TABLE `tumbuhan` (
  `id_tumbuhan` int(11) NOT NULL,
  `nama_tumbuhan` varchar(100) NOT NULL,
  `nama_latin` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `habitat` varchar(150) NOT NULL,
  `asal` varchar(150) NOT NULL,
  `manfaat` text NOT NULL,
  `perawatan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tumbuhan`
--

INSERT INTO `tumbuhan` (`id_tumbuhan`, `nama_tumbuhan`, `nama_latin`, `kategori`, `habitat`, `asal`, `manfaat`, `perawatan`, `deskripsi`, `gambar`, `qr_code`, `tanggal_input`) VALUES
(1, 'Eceng gondok', 'Eichhornia crassipes', 'Herba', 'Perairan tawar seperti danau, kolam, rawa, waduk, dan sungai.', 'Lembah Sungai Amazon di Amerika Selatan', 'Eceng gondok adalah tumbuhan air yang sering dianggap gulma, tetapi memiliki banyak manfaat jika dikelola dengan baik. Tumbuhan ini dapat membantu menyerap zat pencemar di air, sehingga berguna untuk menjaga kualitas lingkungan perairan.\r\n\r\nSelain itu, eceng gondok dapat dimanfaatkan sebagai bahan kerajinan seperti tas, tikar, keranjang, dan hiasan. Tumbuhan ini juga bisa diolah menjadi pupuk kompos, pakan ternak setelah difermentasi, serta bahan biogas sebagai energi alternatif.\r\n\r\nDengan pengolahan yang tepat, eceng gondok tidak hanya membantu mengurangi limbah perairan, tetapi juga memiliki nilai ekonomi bagi masyarakat.', 'Eceng gondok membutuhkan perairan tawar yang cukup terkena sinar matahari. Tanaman ini perlu dikontrol secara rutin karena pertumbuhannya sangat cepat. Penjarangan perlu dilakukan agar tidak menutupi seluruh permukaan air. Daun atau bagian tanaman yang layu sebaiknya dibuang agar tanaman tetap sehat dan tidak mencemari air.', 'Eceng gondok (Eichhornia crassipes) adalah tumbuhan air mengapung yang banyak ditemukan di danau, rawa, kolam, sungai, dan saluran irigasi. Tanaman ini memiliki daun hijau mengilap berbentuk bulat hingga oval, tangkai daun menggembung berisi udara, serta akar serabut yang menggantung di dalam air. Bunganya berwarna ungu muda hingga kebiruan. Eceng gondok dikenal tumbuh sangat cepat dan mampu beradaptasi di berbagai perairan tawar.', '1780731524_eceng gondok.jpg', 'https://api.qrserver.com/v1/create-qr-code/?size=350x350&data=http%3A%2F%2Flocalhost%2Fflorascan%2Fdetail.php%3Fid%3D1', '2026-06-06 07:38:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tumbuhan`
--
ALTER TABLE `tumbuhan`
  ADD PRIMARY KEY (`id_tumbuhan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tumbuhan`
--
ALTER TABLE `tumbuhan`
  MODIFY `id_tumbuhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
