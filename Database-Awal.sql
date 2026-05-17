-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2026 at 06:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apin`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `tahun_lulus` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id`, `name`, `id_kelompok`, `tahun_lulus`) VALUES
(21, '2024', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counter_transaksi`
--

CREATE TABLE `counter_transaksi` (
  `id` int(11) NOT NULL,
  `last_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counter_transaksi`
--

INSERT INTO `counter_transaksi` (`id`, `last_number`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `name`, `username`, `password`, `role`) VALUES
(10, 'Arvin Noer Hakim', 'hakimarvinnoer', 'eyJpdiI6Im82YXhFN1ZCV2pKYVhnVGMwZ1ZJV2c9PSIsInZhbHVlIjoiNWRDL2toUHdMWHNJaGEzTDg5N3hkUT09IiwibWFjIjoiMTkwMzJmZWY4MDQ3NjU0MGE2Mzg4YThmNjg4MWFhZGQ3ZDFjMWY4MGQ4YTMxZmQ1OTNiZGY4MTYwOWU5ZDZmYSIsInRhZyI6IiJ9', 'bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `infaq`
--

CREATE TABLE `infaq` (
  `id` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `id_tahunajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infaq`
--

INSERT INTO `infaq` (`id`, `id_kelompok`, `name`, `harga`, `id_angkatan`, `id_tahunajaran`) VALUES
(63, 2, '01 Infaq Juli', 50000, 21, 8),
(64, 2, '02 Infaq Agustus', 50000, 21, 8),
(65, 2, '03 Infaq September', 50000, 21, 8),
(66, 2, '04 Infaq Oktober', 50000, 21, 8),
(67, 2, '05 Infaq November', 50000, 21, 8),
(68, 2, '06 Infaq Desember', 50000, 21, 8),
(69, 2, '07 Infaq Januari', 50000, 21, 8),
(70, 2, '08 Infaq Februari', 50000, 21, 8),
(71, 2, '09 Infaq Maret', 50000, 21, 8),
(72, 2, '10 Infaq April', 50000, 21, 8),
(73, 2, '11 Infaq Mei', 50000, 21, 8),
(74, 2, '12 Infaq Juni', 50000, 21, 8),
(75, 2, 'Pemeliharaan Sarpras', 250000, 21, 8),
(76, 2, 'Ekstrakurikuler', 150000, 21, 8),
(77, 2, 'ASTS 1', 50000, 21, 8),
(78, 2, 'ASAS 1', 50000, 21, 8),
(79, 2, 'ASAT', 50000, 21, 8),
(80, 2, 'ASTS 2', 50000, 21, 8),
(81, 2, 'Atribut', 80000, 21, 8),
(82, 2, 'Sampul Raport', 50000, 21, 8),
(83, 2, 'Kaos Olahraga', 40000, 21, 8);

-- --------------------------------------------------------

--
-- Table structure for table `jenisbayar`
--

CREATE TABLE `jenisbayar` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenisbayar`
--

INSERT INTO `jenisbayar` (`id`, `name`) VALUES
(1, 'Tunai / Cash'),
(2, 'Transfer Bank / E-wallet'),
(3, 'Beasiswa PIP'),
(4, 'Beasiswa LAZISNU'),
(5, 'Beasiswa Prestasi'),
(6, 'Beasiswa Saudara Kandung'),
(7, 'Beasiswa Santunan'),
(8, 'Beasiswa Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id`, `name`) VALUES
(1, 'Belum Memiliki Kelas'),
(2, 'Kelas 7'),
(3, 'Kelas 8'),
(4, 'Kelas 9'),
(5, 'Alumni');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_transaksi` text NOT NULL,
  `tanggal_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_angkatan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `infaq_id` int(11) NOT NULL,
  `infaq_name` varchar(40) NOT NULL,
  `infaq_harga` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_jenisbayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `name`, `value`) VALUES
(1, 'banner_image', '1778569344.png'),
(2, 'app_name', 'SMP Maarif NU 01 Wanareja');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `no_whatsapp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `id_angkatan`, `name`, `no_whatsapp`) VALUES
(49, 21, 'ARINA FEBRIANA SULASTRI', '08123456789'),
(50, 21, 'AHMAD FAISOL', '08123456789'),
(51, 21, 'AZKIA NURUL HUSNA', '08123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `tahunajaran_id` int(11) NOT NULL,
  `infaq_id` int(11) NOT NULL,
  `tahunajaran_name` varchar(40) NOT NULL,
  `infaq_name` varchar(40) NOT NULL,
  `infaq_harga` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`id`, `name`, `created_at`) VALUES
(8, '2024/2025', '2026-05-14 04:42:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indexes for table `counter_transaksi`
--
ALTER TABLE `counter_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infaq`
--
ALTER TABLE `infaq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelompok` (`id_kelompok`),
  ADD KEY `id_angkatan` (`id_angkatan`),
  ADD KEY `id_tahunajaran` (`id_tahunajaran`);

--
-- Indexes for table `jenisbayar`
--
ALTER TABLE `jenisbayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_angkatan` (`id_angkatan`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_angkatan` (`id_angkatan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acara` (`id_acara`),
  ADD KEY `id_kelompok` (`id_kelompok`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `counter_transaksi`
--
ALTER TABLE `counter_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `infaq`
--
ALTER TABLE `infaq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `jenisbayar`
--
ALTER TABLE `jenisbayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1067;

--
-- AUTO_INCREMENT for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acara`
--
ALTER TABLE `acara`
  ADD CONSTRAINT `acara_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD CONSTRAINT `angkatan_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `infaq`
--
ALTER TABLE `infaq`
  ADD CONSTRAINT `infaq_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `infaq_ibfk_2` FOREIGN KEY (`id_angkatan`) REFERENCES `angkatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `infaq_ibfk_3` FOREIGN KEY (`id_tahunajaran`) REFERENCES `tahunajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_angkatan`) REFERENCES `angkatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_acara`) REFERENCES `acara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagihan_ibfk_2` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagihan_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
