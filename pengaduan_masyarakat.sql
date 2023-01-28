-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 06:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('111', 'arif erer', 'arid', 'arif', '879897'),
('1230987', 'Renata Moeloek', 'renata', 'renata', '0987655'),
('212122', 'agus rrrer', 'agus', 'agus', '0812345'),
('212123', 'agus', 'agus', 'agus', '0812345'),
('212124', 'agus', 'agus', 'agus', '0812345'),
('2122', 'budi', 'budi', 'budi', '46546'),
('222', 'asas', 'asa', 'ad', '5656'),
('2222', 'aghf', 'sss', 'sss', 'dffghf'),
('323232', 'trtrt', 'eee', 'eee', '456456'),
('999999', 'arif oooooo', 'arif', 'arif', '0888888');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2022-12-07', '1230987', 'terjadi kekerasan, lokasi kandang ayam Sidokriyo, banyak ayam mati karena disembelih, di sinyalir untuk persiapan malam tahun baruan', '', 'proses'),
(2, '2020-02-07', '1230987', 'dfdfd', '81G888piCCRm.jpg-1.jpg!bw700.jpg', 'proses'),
(3, '2020-02-13', '212122', 'ada lubang di jalan', 'jogja.jpg', 'selesai'),
(4, '2023-01-13', '999999', 'terjadi banjir bandang di waduk gajah mungkur, ikanya banyak banget, ada yang digoreng ada yang dibakar', 'Danau-Jenewa.jpg', 'selesai'),
(5, '2023-01-24', '2222', 'ini aduan saya, ada ninja masuk desa, disinyalir kepengin selfie di depan balai desa', '76b6e3f30ef86f3d32a0e455ca9a29e8-5e807c73d541df3f4a442e36.jpg', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'admin utama 1', 'admin', 'admin', '011111111', 'admin'),
(2, 'lukman a', 'lukman', 'lukman', '987987', 'petugas'),
(4, 'Bahar Ipomiarto', 'bahar', 'bahar', '087654987', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 0, '2020-02-13', '', 1),
(2, 0, '2020-02-13', 'adsad', 1),
(6, 3, '2020-02-13', 'oke', 1),
(7, 3, '2020-02-13', 'dfdf', 1),
(8, 4, '2020-02-13', 'oke akan ada bantuan', 1),
(9, 5, '2023-01-24', 'ini tanggapan pertama', 1),
(10, 5, '2023-01-24', 'tanggapan kedua', 1),
(11, 5, '2023-01-24', 'sudah selesai', 1),
(13, 1, '2023-01-25', 'dasdsadghfgh fgdfgdf', 1),
(14, 1, '2023-01-25', 'sdas sdasd asdas', 1),
(15, 1, '2023-01-25', 'sdas sdasd asdas', 1),
(18, 2, '2023-01-25', 'a', 1),
(20, 2, '2023-01-25', 'c', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
