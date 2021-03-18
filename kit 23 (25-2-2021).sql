-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 10:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kit`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapelamar`
--

CREATE TABLE `datapelamar` (
  `id` int(11) NOT NULL,
  `kode_pelamar` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kode_lowongan` varchar(6) NOT NULL,
  `tanggal_lamaran` date NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datapelamar`
--

INSERT INTO `datapelamar` (`id`, `kode_pelamar`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telpon`, `email`, `kode_lowongan`, `tanggal_lamaran`, `link`) VALUES
(67, 'DP-001', 'Oki', '1998-10-05', 'Laki-laki', 'Pelita', '+6281990882544', 'oki.triandytan@gmail.com', 'LK-001', '2021-02-25', 'https://i.pinimg.com/736x/30/6d/07/306d0787840e5f67269e95f2d940f08b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` int(11) NOT NULL,
  `kode_interview` varchar(6) NOT NULL,
  `kode_pelamar` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `nama_lowongan` varchar(100) NOT NULL,
  `tanggal_interview` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id`, `kode_interview`, `kode_pelamar`, `nama`, `email`, `no_telpon`, `nama_lowongan`, `tanggal_interview`, `status`) VALUES
(26, 'IN-001', 'DP-001', 'Oki', 'oki.triandytan@gmail.com', '+6281990882544', 'Lowongan Kerja Staff IT', '2021-02-24', 'Lamaran Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `kode_jawaban` varchar(6) NOT NULL,
  `kode_pelamar` varchar(6) NOT NULL,
  `kode_lowongan` varchar(6) NOT NULL,
  `kode_kriteria` varchar(6) NOT NULL,
  `kode_sub_kriteria` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `kode_jawaban`, `kode_pelamar`, `kode_lowongan`, `kode_kriteria`, `kode_sub_kriteria`) VALUES
(187, 'JA-001', 'DP-001', 'LK-001', 'K-001', 'SK-003'),
(188, 'JA-001', 'DP-001', 'LK-001', 'K-002', 'SK-005'),
(189, 'JA-001', 'DP-001', 'LK-001', 'K-003', 'SK-008');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode_kriteria` varchar(6) NOT NULL,
  `kode_lowongan` varchar(6) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode_kriteria`, `kode_lowongan`, `nama_kriteria`, `bobot`) VALUES
(19, 'K-001', 'LK-001', 'Pendidikan', 8),
(20, 'K-002', 'LK-001', 'Usia', 6),
(21, 'K-003', 'LK-001', 'Pengalaman dalam bidang IT', 7),
(22, 'K-004', 'LK-002', 'Pendidikan', 9),
(23, 'K-005', 'LK-002', 'Usia', 7),
(24, 'K-006', 'LK-002', 'Pengalaman Customer Service', 8);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `kode_laporan` varchar(6) NOT NULL,
  `kode_interview` varchar(6) NOT NULL,
  `kode_pelamar` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `nama_lowongan` varchar(100) NOT NULL,
  `hasil` decimal(20,0) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `kode_laporan`, `kode_interview`, `kode_pelamar`, `nama`, `email`, `no_telpon`, `nama_lowongan`, `hasil`, `status`) VALUES
(18, 'LP-001', 'IN-001', 'DP-001', 'Oki', 'oki.triandytan@gmail.com', '+6281990882544', 'Lowongan Kerja Staff IT', '7119785', 'Lamaran Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `lowongankerja`
--

CREATE TABLE `lowongankerja` (
  `id` int(11) NOT NULL,
  `kode_lowongan` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `persyaratan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongankerja`
--

INSERT INTO `lowongankerja` (`id`, `kode_lowongan`, `nama`, `deskripsi`, `persyaratan`) VALUES
(4, 'LK-001', 'Lowongan Kerja Staff IT', '-	Mengatasi Trouble Shooting PC & Laptop (Komputer), Network LAN, Hardware, Printer dll	<br>\r\n-	Maintenance Server Komputer, Installasi danJaringan Komputer	<br>\r\n-	Recovery dan Proteksi Data (Komputer dan Server)	<br>\r\n-	Melakukan pengembangan Aplikasi berbasis Web	<br>\r\n-	Memaintenance Aplikasi dan Sistem yang digunakan Perusahaan	<br>\r\n-	Membantu dalam bidang Marketing Website	<br>\r\n-	Merencanakan dan Melakukan Promosi dan Periklanan	<br>\r\n-	Memahami Aplikasi Accurate menjadi Nilai Tambah	<br>', '-	Umur Max 35 tahun	<br>\r\n-	Pendidikan minimal S1 Teknik Informatika / Sistem Informasi / Manajemen Informatika	<br>\r\n-	Minimum GPA 3.2	<br>\r\n-	Pengalaman di bidang IT / Website minimal 2 th	<br>\r\n-	Memiliki SKCK dari Kepolisian	<br>\r\n-	Menguasai Bahasa Inggris aktif dan pasif	<br>\r\n-	Dapat bekerjasama dalam tim	<br>\r\n-	Dapat mengoperasionalkan komputer	<br>\r\n-	Dapat bekerja keras, jujur, dan bertanggung jawab	<br>\r\n-	Dapat bekerja sesuai target yang sudah ditentukan	<br>\r\n-	Memastikan keamanan dan kerahasian data perusahaan	<br>'),
(6, 'LK-002', 'Lowongan Kerja Customer Service', '- Menerima order dari pelanggan via email dan telepon.	<br>\r\n- Menyusun Jadwal kapal dan meneruskannya kepada pelanggan.	<br>\r\n- Menyiapkan pelaksanaan order, meliputi booking slot di kapal, menentukan jadwal muat, dan berkoordinasi dengan bagian operasional.	<br>\r\n- Berkoordinasi dengan pelanggan dalam pelaksanaan order.	<br>\r\n- Menjelaskan persayaratan dan ketentuan untuk pengiriman kepada pelanggan.	<br>\r\n- Menerima keluhan dan masukan pelanggan.	<br>', '- Wanita.	<br>\r\n- Usia maksimal 30 tahun.	<br>\r\n- Minimal D3 semua jurusan, lebih diutamakan bidang logistik atau eksakta.	<br>\r\n-IPK minimal 2,75 skala 4.0	<br>\r\n- Berpengalaman di bidang logistik, transportasi atau pelayaran lebih diutamakan.	<br>\r\n- Menguasai bahasa Inggris / Mandarin diutamakan.	<br>\r\n- Jujur.	<br>\r\n- Bertanggungjawab atas pekerjaan.	<br>\r\n- Mau belajar dan meningkatkan kemampuan diri.	<br>');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama_pengguna`, `email`) VALUES
(1, 'Admin', '123', 'Admin', 'adminkit@gmail.com'),
(2, 'user', '123', 'User', 'userkit@gmail.com'),
(6, 'Admin1', '123', 'oki triandy', '1');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `kode_penilaian` varchar(6) NOT NULL,
  `kode_pelamar` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lamaran` date NOT NULL,
  `kode_lowongan` varchar(6) NOT NULL,
  `hasil` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `kode_penilaian`, `kode_pelamar`, `nama`, `tanggal_lamaran`, `kode_lowongan`, `hasil`) VALUES
(33, 'PE-001', 'DP-001', 'Oki', '2021-02-24', 'LK-001', '7119785');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` int(11) NOT NULL,
  `kode_sub_kriteria` varchar(6) NOT NULL,
  `kode_kriteria` varchar(6) NOT NULL,
  `kode_lowongan` varchar(6) NOT NULL,
  `nama_sub_kriteria` varchar(100) NOT NULL,
  `nilai_altenatif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `kode_sub_kriteria`, `kode_kriteria`, `kode_lowongan`, `nama_sub_kriteria`, `nilai_altenatif`) VALUES
(40, 'SK-001', 'K-001', 'LK-001', 'SD', 4),
(41, 'SK-002', 'K-001', 'LK-001', 'SMP', 6),
(42, 'SK-003', 'K-001', 'LK-001', 'SMA / SMK', 7),
(43, 'SK-004', 'K-001', 'LK-001', 'S1', 8),
(44, 'SK-005', 'K-002', 'LK-001', '18-24 Tahun', 9),
(45, 'SK-006', 'K-002', 'LK-001', '24-30 Tahun', 7),
(46, 'SK-007', 'K-002', 'LK-001', '>30 Tahun', 4),
(47, 'SK-008', 'K-003', 'LK-001', 'ADA PENGALAMAN', 7),
(48, 'SK-009', 'K-003', 'LK-001', 'TIDAK ADA PENGALAMAN', 5),
(49, 'SK-010', 'K-004', 'LK-002', 'SD', 4),
(50, 'SK-011', 'K-004', 'LK-002', 'SMP', 6),
(51, 'SK-012', 'K-004', 'LK-002', 'SMK', 7),
(52, 'SK-013', 'K-004', 'LK-002', 'S1 / SARJANA', 8),
(53, 'SK-014', 'K-005', 'LK-002', '18 - 24 Tahun', 8),
(54, 'SK-015', 'K-005', 'LK-002', '24-30 tahun', 7),
(55, 'SK-016', 'K-005', 'LK-002', '>30 Tahun', 5),
(56, 'SK-017', 'K-006', 'LK-002', 'Ada Pengalaman', 7),
(57, 'SK-018', 'K-006', 'LK-001', 'Tidak Ada Pengalaman', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapelamar`
--
ALTER TABLE `datapelamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowongankerja`
--
ALTER TABLE `lowongankerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapelamar`
--
ALTER TABLE `datapelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lowongankerja`
--
ALTER TABLE `lowongankerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
