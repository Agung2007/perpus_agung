-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2025 at 10:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus01`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int NOT NULL,
  `id_kategori` int NOT NULL,
  `id_rak` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` int NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `id_kategori`, `id_rak`, `judul`, `penulis`, `penerbit`, `tahun`, `gambar`) VALUES
(15, 9, 9, 'Bahasa Inggris', 'Isah', 'Abdul', 2022, '564248538_929708102_48513079_9bc32ceb-5002-427d-9f66-81244b666881.jpg'),
(16, 10, 10, 'Found', 'Tere Liye', 'Pt Sidu', 2019, '305271923_WhatsApp Image 2024-10-12 at 07.19.31_0952fdbb.jpg'),
(17, 12, 11, 'Sejarah Yang Disembunyikan', 'Jagung', 'Pt Night', 2019, '1742431833_WhatsApp Image 2024-10-12 at 07.19.31_87f9afec.jpg'),
(18, 13, 12, 'Pemrograman Web', 'Aisyah', 'Firyal', 2019, '444641395_544578365_761502b0cd4e84d2a219e72c52f4b4e2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(9, 'Pelajaran'),
(10, 'Fiksi'),
(11, 'Non Fiksi'),
(12, 'Edukasi'),
(13, 'Panduan');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi_pribadi`
--

CREATE TABLE `koleksi_pribadi` (
  `id` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `id_buku` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `koleksi_pribadi`
--

INSERT INTO `koleksi_pribadi` (`id`, `id_pengguna`, `id_buku`) VALUES
(8, 3, 8),
(9, 1, 8),
(10, 1, 4),
(11, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `id_petugas` int DEFAULT NULL,
  `id_buku` int NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `status` enum('pinjam','kembali','hilang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_pengguna`, `id_petugas`, `id_buku`, `tgl_pinjam`, `status`) VALUES
(3, 1, 1, 1, '2024-09-12', 'kembali'),
(4, 1, 1, 1, '2024-09-13', 'hilang'),
(5, 1, 1, 1, '2024-09-13', 'kembali'),
(6, 1, 1, 3, '2024-09-13', 'hilang'),
(7, 1, 1, 3, '2024-09-28', 'pinjam'),
(8, 1, 1, 4, '2024-09-28', 'hilang'),
(9, 1, 1, 5, '2024-09-28', 'kembali'),
(11, 1, 3, 7, '2024-09-28', 'kembali'),
(13, 1, 1, 4, '2024-10-01', 'kembali'),
(14, 1, 1, 4, '2024-10-03', 'kembali'),
(15, 1, 3, 4, '2024-10-03', 'kembali'),
(16, 1, 3, 7, '2024-10-03', 'kembali'),
(21, 1, 1, 8, '2024-10-10', 'kembali'),
(23, 1, 3, 4, '2024-10-11', 'hilang'),
(30, 1, 1, 12, '2024-10-12', 'pinjam'),
(31, 2, 1, 4, '2024-10-16', 'hilang'),
(32, 6, 3, 13, '2024-10-17', 'kembali'),
(33, 7, 3, 14, '2024-10-17', 'kembali'),
(34, 6, 3, 14, '2024-10-17', 'hilang'),
(38, 1, 1, 16, '2024-10-17', 'kembali'),
(40, 2, 1, 19, '2024-10-17', 'kembali'),
(41, 2, 1, 16, '2024-10-17', 'kembali'),
(42, 2, 1, 16, '2024-10-17', 'hilang'),
(48, 1, 1, 16, '2024-10-24', 'kembali'),
(49, 1, 1, 16, '2024-10-24', 'kembali'),
(50, 1, 1, 16, '2024-10-24', 'hilang'),
(51, 1, 1, 17, '2024-10-24', 'hilang'),
(52, 1, NULL, 19, NULL, 'pinjam'),
(53, 9, 1, 15, '2024-10-24', 'kembali'),
(54, 10, 3, 16, '2024-10-24', 'hilang'),
(55, 1, 1, 18, '2024-10-24', 'kembali'),
(58, 6, 1, 17, '2024-10-24', 'kembali'),
(59, 6, 1, 15, '2024-10-24', 'kembali'),
(60, 1, NULL, 16, NULL, 'pinjam'),
(61, 1, NULL, 18, NULL, 'pinjam'),
(62, 11, 3, 15, '2024-10-24', 'kembali'),
(63, 6, 3, 15, '2024-12-12', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int NOT NULL,
  `id_peminjaman` int NOT NULL,
  `id_petugas` int NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_peminjaman`, `id_petugas`, `tgl_kembali`) VALUES
(1, 1, 1234, '2024-09-10'),
(2, 3, 1, '2024-09-12'),
(3, 3, 1, '2024-09-12'),
(4, 3, 1, '2024-09-12'),
(5, 4, 1, '2024-09-13'),
(6, 5, 1, '2024-09-13'),
(7, 6, 1, '2024-09-13'),
(8, 9, 1, '2024-09-28'),
(9, 8, 1, '2024-09-28'),
(10, 13, 1, '2024-10-01'),
(11, 11, 1, '2024-10-01'),
(12, 14, 1, '2024-10-03'),
(13, 15, 3, '2024-10-03'),
(14, 16, 3, '2024-10-03'),
(15, 21, 1, '2024-10-10'),
(16, 23, 3, '2024-10-11'),
(17, 31, 1, '2024-10-16'),
(18, 32, 3, '2024-10-17'),
(19, 32, 3, '2024-10-17'),
(20, 33, 3, '2024-10-17'),
(21, 34, 3, '2024-10-17'),
(22, 38, 1, '2024-10-17'),
(23, 40, 1, '2024-10-17'),
(24, 41, 1, '2024-10-17'),
(25, 42, 1, '2024-10-17'),
(26, 48, 1, '2024-10-24'),
(27, 49, 1, '2024-10-24'),
(28, 50, 1, '2024-10-24'),
(29, 51, 1, '2024-10-24'),
(30, 53, 1, '2024-10-24'),
(31, 54, 3, '2024-10-24'),
(32, 55, 1, '2024-10-24'),
(33, 58, 1, '2024-10-24'),
(34, 59, 1, '2024-10-24'),
(35, 62, 3, '2024-10-24'),
(36, 63, 3, '2024-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `alamat`, `email`, `username`, `password`) VALUES
(1, 'agung', 'ciduging', 'agungpesn@gmail.com', 'agung123', '1234'),
(2, 'syifa', 'Rancakalong', 'syifa@gmail.com', 'syifa123', '1234'),
(6, 'aisyah', 'Rancakalong', 'aisyah@gmail.com', 'aisyah19', '1234'),
(7, 'firyal', 'paseh', 'firyal@gmail.com', 'firyal12', '1234'),
(8, 'Agung Setiawan uhuyyyy', 'nnnnnn', 'nnnndddd@gmai.com', 'huhuy', '8888'),
(9, 'gilang', 'Darmarajaa', 'gilang@gmail.com', 'arjun', '1234'),
(10, 'agung ', 'Darmarajaa', 'agungpesnn@gmail.com', 'agung1234', '1234'),
(11, 'mirul', 'sunang', 'mirrr@gmail.com', 'mirul', '111');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `alamat`, `username`, `password`, `level`) VALUES
(1, 'bianca', 'panyingkiran', 'bianca123', '1234', 'admin'),
(3, 'agung', 'Darmaraja', 'agung123', '1234', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id` int NOT NULL,
  `nama_rak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id`, `nama_rak`) VALUES
(9, 'A-1'),
(10, 'A-2'),
(11, 'A-3'),
(12, 'A-4'),
(13, 'A-5');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan_buku`
--

CREATE TABLE `ulasan_buku` (
  `id` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `id_buku` int NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan_buku`
--

INSERT INTO `ulasan_buku` (`id`, `id_pengguna`, `id_buku`, `ulasan`, `rating`, `waktu`) VALUES
(7, 6, 13, 'bagus', 4, '2024-10-17 01:59:53'),
(10, 1, 15, 'bagus', 5, '2024-10-24 01:39:34'),
(11, 3, 16, 'agunggggg', 4, '2024-10-24 01:45:45'),
(12, 9, 15, 'bagus', 5, '2024-10-24 06:27:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `koleksi_pribadi`
--
ALTER TABLE `koleksi_pribadi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ulasan_buku`
--
ALTER TABLE `ulasan_buku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
