-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2026 at 04:18 AM
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
(12, '2023', 5, '2026-05-05 14:04:26'),
(13, '2024', 4, NULL),
(14, '2025', 3, NULL),
(20, '2026', 2, NULL);

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
(1, 11);

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
(5, 'Yayan Noviyanti, S.Pd.', 'yayannoviyanti', 'eyJpdiI6IlRPQTlHR0REVXBwS2lzZzIxbWNCMFE9PSIsInZhbHVlIjoiSXArNGZ1WXJmWkp2OVpiZ09nWCszY2ZKa3Y2T01jcFp4WVpLUm0rZHNaND0iLCJtYWMiOiJjYTk0MTg5MmFhMDhkZGQ1NDRhYmUwODM2N2U1NzZmNzg0ODFjZjlkY2QyMzZjNjE1ZTdhMmExYzc4MTlkZGYzIiwidGFnIjoiIn0=', 'wali'),
(6, 'Erika Aura Sucia', 'erikaaura', 'eyJpdiI6IjJMSmNUWkZBSUEzakF2Qy9GVVBvWkE9PSIsInZhbHVlIjoiK3JlUEV0Z2hUYU1udlNack5FRHpjZUcvVVFiTVZKMFF4RjkvSW1JR0oyST0iLCJtYWMiOiJmZTIzMWY2MTAxNmUzMjYzMmFhM2JiY2Q5NTY4YzNkYzIwYmRjZGVlNzZjNjI1YTYwYjMwYTExNWFmNzViOTYwIiwidGFnIjoiIn0=', 'bendahara'),
(7, 'Ining Suryani, S.Ag.', 'iningsuryani', 'eyJpdiI6IlMveTJOZGVabDNhSUh3ODRTTWdhMHc9PSIsInZhbHVlIjoiRkF6TUptcGNHbFd0N1RFZFZ4a1dacFRhK1VobGhnSDlKV2IwRTZaR3lBZz0iLCJtYWMiOiJjZjJkNzNhNGI3ZTViY2RlZTUzYTU2NmNlOGYxM2ZiYmQ0YWY3ZTAyYjBiODc2MTE3MmQxZDNkMGEzMWM5NWM0IiwidGFnIjoiIn0=', 'bendahara'),
(8, 'Fitriya, S.Pd.', 'fitriya', 'eyJpdiI6Ijl6WllPY2Nibk9VQ0pkL0dyNmFTQkE9PSIsInZhbHVlIjoiN3g2ZUxsYS9FTEowck53MGF2K2txdk9ZRHdPNENtSzZVZnZHR09neno1QT0iLCJtYWMiOiI1YTliMTNiMjlkMzIzMjcyZTM4YzRmYTk1OGUyN2ZhZDdlMDRmNzBlNjI0NTE0MjRjZWJhZjJjYTdkZmU3OWMwIiwidGFnIjoiIn0=', 'bendahara'),
(9, 'Muftihatun Nikmah, S.Pd.', 'muftihatun', 'eyJpdiI6IjJ4SzcwTmlSWE80NXFReVJ6QXBmU3c9PSIsInZhbHVlIjoiUmlkQ1FPbDlsZGhDUVJxZ1dVK2lTTnNoYnYvNktnREdaZjBkYlA2SkdYVT0iLCJtYWMiOiIwYWNiMzI2NjEwYTA1NTA2MTZkMjUwNWFjOThlNjQ3YWRkNGEzODAzMTM5MzUxZGJjNjlkMDVlZDY1ZjQzMjQxIiwidGFnIjoiIn0=', 'walikelas'),
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
(5, 2, '01 Infaq Juli', 50000, 20, 7),
(6, 2, '02 Infaq Agustus', 50000, 20, 7),
(7, 2, '03 Infaq September', 50000, 20, 7),
(8, 2, '04 Infaq Oktober', 50000, 20, 7),
(9, 2, '05 Infaq November', 50000, 20, 7),
(10, 2, '06 Infaq Desember', 50000, 20, 7),
(11, 2, '07 Infaq Januari', 50000, 20, 7),
(12, 2, '08 Infaq Februari', 50000, 20, 7),
(13, 2, '09 Infaq Maret', 50000, 20, 7),
(14, 2, '10 Infaq April', 50000, 20, 7),
(15, 2, '11 Infaq Mei', 50000, 20, 7),
(16, 2, '12 Infaq Juni', 50000, 20, 7),
(17, 2, 'Pemeliharaan Sarpras', 250000, 20, 7),
(18, 2, 'Ekstrakurikuler', 150000, 20, 7),
(19, 2, 'ASTS 1', 50000, 20, 7),
(20, 2, 'ASAS 1', 50000, 20, 7),
(21, 2, 'ASAT', 50000, 20, 7),
(22, 2, 'ASTS 2', 50000, 20, 7),
(23, 2, 'Atribut', 80000, 20, 7),
(24, 2, 'Sampul Raport', 50000, 20, 7),
(25, 2, 'Kaos Olahraga', 40000, 20, 7),
(26, 3, '01 Infaq Juli', 50000, 14, 7),
(27, 3, '02 Infaq Agustus', 50000, 14, 7),
(28, 3, '03 Infaq September', 50000, 14, 7),
(29, 3, '04 Infaq Oktober', 50000, 14, 7),
(30, 3, '05 Infaq November', 50000, 14, 7),
(31, 3, '06 Infaq Desember', 50000, 14, 7),
(32, 3, '07 Infaq Januari', 50000, 14, 7),
(33, 3, '08 Infaq Februari', 50000, 14, 7),
(34, 3, '09 Infaq Maret', 50000, 14, 7),
(35, 3, '10 Infaq April', 50000, 14, 7),
(36, 3, '11 Infaq Mei', 50000, 14, 7),
(37, 3, '12 Infaq Juni', 50000, 14, 7),
(38, 3, 'Pemeliharaan Sarpras', 250000, 14, 7),
(39, 3, 'Ekstrakurikuler', 150000, 14, 7),
(40, 3, 'ASTS 1', 50000, 14, 7),
(41, 3, 'ASAS 1', 50000, 14, 7),
(42, 3, 'ASAT', 50000, 14, 7),
(43, 3, 'ASTS 2', 50000, 14, 7),
(44, 3, 'Asesmen Nasional', 200000, 14, 7),
(45, 4, '01 Infaq Juli', 50000, 13, 7),
(46, 4, '02 Infaq Agustus', 50000, 13, 7),
(47, 4, '03 Infaq September', 50000, 13, 7),
(48, 4, '04 Infaq Oktober', 50000, 13, 7),
(49, 4, '05 Infaq November', 50000, 13, 7),
(50, 4, '06 Infaq Desember', 50000, 13, 7),
(51, 4, '07 Infaq Januari', 50000, 13, 7),
(52, 4, '08 Infaq Februari', 50000, 13, 7),
(53, 4, '09 Infaq Maret', 50000, 13, 7),
(54, 4, '10 Infaq April', 50000, 13, 7),
(55, 4, '11 Infaq Mei', 50000, 13, 7),
(56, 4, '12 Infaq Juni', 50000, 13, 7),
(57, 4, 'Pemeliharaan Sarpras', 250000, 13, 7),
(58, 4, 'Ekstrakurikuler', 150000, 13, 7),
(59, 4, 'ASTS 1', 50000, 13, 7),
(60, 4, 'ASAS 1', 50000, 13, 7),
(61, 4, 'ASAT', 50000, 13, 7),
(62, 4, 'ASAJ', 600000, 13, 7);

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

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_transaksi`, `tanggal_pembayaran`, `id_angkatan`, `id_siswa`, `infaq_id`, `infaq_name`, `infaq_harga`, `id_guru`, `id_jenisbayar`) VALUES
(19, '1406007', '2026-05-11 11:15:42', 14, 6, 26, '01 Infaq Juli', 10000, 10, 1),
(20, '1406008', '2026-05-11 11:16:04', 14, 6, 26, '01 Infaq Juli', 4000, 10, 1),
(21, '1406009', '2026-05-11 11:29:39', 14, 6, 26, '01 Infaq Juli', 15000, 10, 7),
(22, '1407011', '2026-05-11 12:45:52', 14, 7, 26, '01 Infaq Juli', 10000, 10, 1),
(23, '1407011', '2026-05-11 12:45:52', 14, 7, 27, '02 Infaq Agustus', 20000, 10, 1),
(24, '1407011', '2026-05-11 12:45:52', 14, 7, 28, '03 Infaq September', 15000, 10, 1),
(25, '1407011', '2026-05-11 12:45:52', 14, 7, 29, '04 Infaq Oktober', 23000, 10, 1),
(26, '1407011', '2026-05-11 12:45:52', 14, 7, 30, '05 Infaq November', 8000, 10, 1),
(27, '1407011', '2026-05-11 12:45:52', 14, 7, 31, '06 Infaq Desember', 5000, 10, 1),
(28, '1407011', '2026-05-11 12:45:52', 14, 7, 32, '07 Infaq Januari', 10000, 10, 1),
(29, '1407011', '2026-05-11 12:45:52', 14, 7, 33, '08 Infaq Februari', 20000, 10, 1),
(30, '1407011', '2026-05-11 12:45:52', 14, 7, 34, '09 Infaq Maret', 30000, 10, 1),
(31, '1407011', '2026-05-11 12:45:52', 14, 7, 35, '10 Infaq April', 15000, 10, 1),
(32, '1407011', '2026-05-11 12:45:52', 14, 7, 36, '11 Infaq Mei', 5000, 10, 1),
(33, '1407011', '2026-05-11 12:45:52', 14, 7, 37, '12 Infaq Juni', 6000, 10, 1),
(34, '1407011', '2026-05-11 12:45:52', 14, 7, 38, 'Pemeliharaan Sarpras', 7000, 10, 1),
(35, '1407011', '2026-05-11 12:45:52', 14, 7, 39, 'Ekstrakurikuler', 1000, 10, 1),
(36, '1407011', '2026-05-11 12:45:52', 14, 7, 40, 'ASTS 1', 50000, 10, 1),
(37, '1407011', '2026-05-11 12:45:52', 14, 7, 41, 'ASAS 1', 50000, 10, 1),
(38, '1407011', '2026-05-11 12:45:52', 14, 7, 42, 'ASAT', 5000, 10, 1),
(39, '1407011', '2026-05-11 12:45:52', 14, 7, 43, 'ASTS 2', 50000, 10, 1),
(40, '1407011', '2026-05-11 12:45:52', 14, 7, 44, 'Asesmen Nasional', 199999, 10, 1);

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
(1, 'banner_image', '1777784905.png'),
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
(6, 14, 'AHMAD FAISOL', '08123456789'),
(7, 14, 'ANNISA JUNI AL BUKHORI', '08123456789'),
(8, 14, 'ARYA PERMANA PUTRA', '08123456789'),
(9, 13, 'ALIYA QURROTUNNADA', '08123456789'),
(10, 13, 'ARSHILLA NATASYA RIFKY', '08123456789'),
(11, 13, 'BEKTI FIRMAN HAKIM', '08123456789'),
(12, 12, 'ARINA FEBRIANA SULASTRI', '08123456789'),
(13, 12, 'ARYA FENDI ANDIKA', '08123456789'),
(14, 12, 'AZKA ZAENU RIFKI', '08123456789'),
(15, 14, 'AZKIA NURUL HUSNA', '08123456789'),
(16, 14, 'BUDI SUWARSO', '08123456789'),
(17, 14, 'DENIS DWI ANUGRAH', '08123456789'),
(18, 14, 'ELFRIS RICHARDO', '08123456789'),
(19, 14, 'FAISAL HIDAYAT', '08123456789'),
(20, 14, 'HAFIZ ABDILLAH', '08123456789'),
(21, 14, 'LUVITA DEWI KOMALLA', '08123456789'),
(22, 14, 'OKI GIMNASTIAR', '08123456789'),
(23, 14, 'REVAN NOVARIO', '08123456789'),
(24, 14, 'RIDHO ARDIANSYAH', '08123456789'),
(25, 14, 'RIZAL MASDI', '08123456789'),
(26, 14, 'ROFIQ AQIL MULTAZAM', '08123456789'),
(27, 14, 'SATRIA ISMAIL MAULANA', '08123456789'),
(28, 14, 'SIGIT PURNOMO', '08123456789'),
(29, 13, 'DEA EINJELLIA', '08123456789'),
(30, 13, 'ESA GALIH SATRIADI', '08123456789'),
(31, 13, 'KEYZHA FITRI MAHARRANI', '08123456789'),
(32, 13, 'KHOLIYAH NUR AISYAH', '08123456789'),
(33, 13, 'LINDA WIDYANA ARUM', '08123456789'),
(34, 13, 'LUKMAN HERYANA', '08123456789'),
(35, 13, 'MULYANA', '08123456789'),
(36, 13, 'MUTIARA NUR AZIZAH', '08123456789'),
(37, 13, 'NUR AZIZAH', '08123456789'),
(38, 13, 'NURUL AZIZAH PRIHATIN', '08123456789'),
(39, 13, 'RAISA DEA ANGGRAENI', '08123456789'),
(40, 13, 'RIFQI SIDIK MAULANA', '08123456789'),
(41, 13, 'RIVDA MUKARROMAH', '08123456789'),
(42, 13, 'RIZKI', '08123456789'),
(43, 13, 'SAFIRA LAILATUL JANNAH', '08123456789'),
(44, 13, 'SITI MAYSAROH', '08123456789'),
(45, 13, 'SYARIF HIDAYAT', '08123456789'),
(46, 13, 'WYLDAN ARIF PRAMONO', '08123456789'),
(47, 13, 'RAFFI AHMAD FIRMANSYAH', '08123456789');

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
(7, '2026/2027', '2026-05-10 02:09:59');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
