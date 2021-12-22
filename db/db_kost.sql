-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 05:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kost`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '12345', 1, 0, 0, '1', 1),
(2, 2, '678910', 1, 0, 0, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'api-key:678910', 2, 1640188737, '678910');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kost`
--

CREATE TABLE `tb_kost` (
  `id_kost` int(11) NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `harga_bulan` int(100) NOT NULL,
  `alamat_kost` text NOT NULL,
  `gambar_kost` varchar(255) NOT NULL,
  `deskripsi_kost` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kost`
--

INSERT INTO `tb_kost` (`id_kost`, `nama_kost`, `harga_bulan`, `alamat_kost`, `gambar_kost`, `deskripsi_kost`) VALUES
(1, 'Kost Apik Cempaka Putri', 500000, 'Jl. Lowokwaru No. 34 Malang', 'gambar1.jpg', 'AC, WiFi, Listrik'),
(2, 'Kost Khusus Putra Karangploso', 450000, 'Jl. Raya Tasikmadu 20 KM. 14 Karangploso, Malang', 'gambar2.jpg', 'Listrik, WiFi, kasur, murah meriah'),
(3, 'Kost Ibu Tutik Singosari', 375000, 'Jl. Raya Singosari No. 165 Kabupaten Singosari, Malang', 'gambar3.jpg', 'Listrik, kasur, kamar mandi luar'),
(4, 'Kost Pak Iwan', 425000, 'Jl. Panjaitan No. 45 RT. 03 RW. 04 Lowokwaru, Malang', 'gambar4.jpg', 'Listrik, Wifi, Kasur'),
(5, 'Kost Yellow Boarding', 515000, 'Jl. Raya Veteran No. 87 Kecamatan Lowokwaru, Malang', 'gambar5.jpg', 'Wifi, Kloset Duduk, Listrik, Kasur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penghuni`
--

CREATE TABLE `tb_penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `kost_id` int(11) NOT NULL,
  `nama_penghuni` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penghuni`
--

INSERT INTO `tb_penghuni` (`id_penghuni`, `kost_id`, `nama_penghuni`, `jenis_kelamin`, `email`, `password`, `no_telp`, `status`) VALUES
(1, 1, 'Ahmadnuddin', 'Laki-Laki', 'nurdila123@gmail.com', '123', '09784615231', 'Aktif'),
(2, 1, 'Siti Nur Hasana', 'Perempuan', 'nurhasana12@gmail.com', '123', '0154532154', 'Aktif'),
(3, 2, 'Rafiu Ali Mashudi', 'Laki-Laki', 'rafiali123@gmail.com', '123', '03165123154', 'Aktif'),
(4, 2, 'Gilang Akbar', 'Laki-Laki', 'gilangakbar45@gmail.com', '123', '02168798561', 'Aktif'),
(5, 5, 'Vania Nur', 'Perempuan', 'vanianur67@gmail.com', '123', '089413516233', 'Aktif'),
(6, 4, 'Talita Amalina', 'Perempuan', 'talitaamalina123@gmail.com', '123', '089781165432', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kost`
--
ALTER TABLE `tb_kost`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indexes for table `tb_penghuni`
--
ALTER TABLE `tb_penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `kost_id` (`kost_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kost`
--
ALTER TABLE `tb_kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_penghuni`
--
ALTER TABLE `tb_penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
