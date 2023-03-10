-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 11:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asrama_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `id_angkatan` int(11) NOT NULL,
  `angkatan` varchar(255) NOT NULL,
  `kelas` int(10) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id_angkatan`, `angkatan`, `kelas`, `status`) VALUES
(1, '10', 12, 'tidak aktif'),
(2, '11', 10, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` mediumtext DEFAULT NULL,
  `id_pengguna` varchar(255) NOT NULL,
  `id_siswas` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `judul`, `isi`, `id_pengguna`, `id_siswas`, `tanggal`) VALUES
(1, 'Aturan', 'Hal Tersebut asadsfsdf', '7', 1, '2023-03-01'),
(2, 'hello', 'Orang Baik', '7', 1, '2023-03-01'),
(3, 'pelanggaran merokok', NULL, '7', 1, '2023-03-01'),
(4, 'Potensi Dia', NULL, '7', 1, '2023-03-01'),
(5, 'Potensi Dia', NULL, '7', 4, '2023-03-01'),
(6, 'Mencari Jati Diri', NULL, '7', 2, '2023-03-01'),
(7, 'Ngerokok', 'asddsdsad', '10', 2, '2023-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `id_angkatans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`, `id_angkatans`) VALUES
(1, 'MM', '1'),
(2, 'RPL', '1'),
(3, 'TKRO', '1'),
(4, 'RPL', '2');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `id_catatans` int(11) NOT NULL,
  `komentar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama_user`, `id_catatans`, `komentar`) VALUES
(7, '7', 7, 'oo');

-- --------------------------------------------------------

--
-- Table structure for table `nama_siswa`
--

CREATE TABLE `nama_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_jurusans` int(11) NOT NULL,
  `id_angkatanxx` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nama_siswa`
--

INSERT INTO `nama_siswa` (`id_siswa`, `nama_siswa`, `status`, `id_jurusans`, `id_angkatanxx`) VALUES
(1, 'Dion', 'tidak aktif', 1, 1),
(2, 'Damas', 'aktif', 4, 2),
(3, 'Rafael', 'aktif', 1, 1),
(4, 'Himarisanto', 'aktif', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`, `level`) VALUES
(5, 'Yoshua Tri Cahyo', '$2y$10$7GAWGpbGV5divQ1hQZry5O.ouZxAZLLYemhCwOn6MgtBNVl7KXUxC', '2023-02-12 03:11:23', '2023-02-12 03:11:23', 'pamong'),
(7, 'Evy', '$2y$10$8Ivy/NKD9ZnncJFeWOKnZeD0GY1VfJWIrgFGAi1KVZypmmidh7oa.', '2023-02-16 08:56:23', '2023-02-25 05:09:33', 'pamong'),
(9, 'arnold', '$2y$10$IaF/7eScgtqI5N6Wg.B1/OeiZ8Zf0jfluuFmV4xwJvp3lp19sTzTS', '2023-02-18 06:47:02', '2023-02-18 06:47:02', 'yayasan'),
(10, 'michael_patrick', '$2y$10$IaF/7eScgtqI5N6Wg.B1/OeiZ8Zf0jfluuFmV4xwJvp3lp19sTzTS', '2023-03-01 08:17:53', '2023-03-01 08:17:53', 'superadmin'),
(12, 'nalsal', '$2y$10$s6h3p3ONOXrvYob.a65VSuM5Uxd9Jp5ptOrLL10ixpJEnC1B3aAEW', '2023-03-08 22:03:43', '2023-03-08 22:03:43', 'guru'),
(13, 'bun', '$2y$10$ddckfbzcMLTQD9phfz6iVu/pD9NVjoKRYTJjpzVHQDdpR1fyWI4cG', '2023-03-08 22:05:12', '2023-03-08 22:05:12', 'yayasan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `nama_siswa`
--
ALTER TABLE `nama_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nama_siswa`
--
ALTER TABLE `nama_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
