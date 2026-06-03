-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2026 at 03:56 AM
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
-- Database: `os_spmb`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas_siswa`
--

CREATE TABLE `identitas_siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `asal_sekolah` varchar(40) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `tempat_lahir` varchar(40) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_reg_akta` varchar(40) DEFAULT NULL,
  `agama` varchar(40) DEFAULT NULL,
  `warganegara` varchar(40) DEFAULT NULL,
  `kebutuhan_khusus` varchar(40) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `dusun` varchar(40) DEFAULT NULL,
  `desa` varchar(40) DEFAULT NULL,
  `kecamatan` varchar(40) DEFAULT NULL,
  `kodepos` varchar(5) DEFAULT NULL,
  `tempat_tinggal` varchar(40) DEFAULT NULL,
  `moda_transportasi` varchar(40) DEFAULT NULL,
  `anak_ke` varchar(2) DEFAULT NULL,
  `punya_kip` varchar(10) DEFAULT NULL,
  `nama_ayah` varchar(40) DEFAULT NULL,
  `nik_ayah` varchar(40) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(10) DEFAULT NULL,
  `pekerjaan_ayah` varchar(40) DEFAULT NULL,
  `penghasilan_ayah` int(11) DEFAULT NULL,
  `nama_ibu` varchar(40) DEFAULT NULL,
  `nik_ibu` varchar(40) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ibu` varchar(10) DEFAULT NULL,
  `pekerjaan_ibu` varchar(40) DEFAULT NULL,
  `penghasilan_ibu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identitas_siswa`
--
ALTER TABLE `identitas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn` (`nisn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `identitas_siswa`
--
ALTER TABLE `identitas_siswa`
  ADD CONSTRAINT `identitas_siswa_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
