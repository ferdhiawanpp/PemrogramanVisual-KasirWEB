-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 03:36 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemvis`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `harga_makan` int(5) NOT NULL,
  `harga_minum` int(5) NOT NULL,
  `total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `id_produk`, `harga_makan`, `harga_minum`, `total`) VALUES
(2, 0, 12000, 4000, 16000),
(3, 0, 12000, 4000, 16000),
(4, 0, 12000, 4000, 16000),
(5, 0, 12000, 4000, 16000),
(6, 0, 12000, 4000, 16000),
(7, 0, 12000, 4000, 16000),
(8, 0, 12000, 4000, 16000),
(9, 0, 12000, 4000, 16000),
(10, 0, 12000, 4000, 16000),
(11, 0, 12000, 4000, 16000),
(12, 0, 12000, 4000, 16000),
(13, 0, 12000, 4000, 16000),
(14, 0, 12000, 4000, 16000),
(15, 0, 12000, 4000, 16000),
(16, 0, 12000, 4000, 16000),
(17, 0, 12000, 4000, 16000),
(18, 0, 12000, 4000, 16000),
(19, 0, 12000, 4000, 16000),
(20, 0, 12000, 4000, 16000),
(21, 0, 12000, 4000, 16000),
(22, 0, 12000, 4000, 16000),
(23, 0, 12000, 4000, 16000),
(24, 0, 12000, 4000, 16000),
(25, 0, 12000, 4000, 16000),
(26, 0, 12000, 4000, 16000),
(27, 0, 12000, 4000, 16000),
(28, 0, 12000, 4000, 16000),
(29, 0, 12000, 4000, 16000),
(30, 0, 12000, 4000, 16000),
(31, 0, 12000, 4000, 16000),
(32, 0, 12000, 4000, 16000),
(33, 0, 12000, 4000, 16000),
(34, 0, 12000, 4000, 16000),
(35, 0, 12000, 4000, 16000),
(36, 0, 12000, 4000, 16000),
(37, 0, 12000, 4000, 16000),
(38, 0, 12000, 4000, 16000),
(39, 0, 12000, 4000, 16000),
(40, 0, 12000, 4000, 16000),
(41, 0, 12000, 4000, 16000),
(42, 0, 12000, 4000, 16000),
(43, 0, 12000, 4000, 16000),
(44, 0, 12000, 4000, 16000),
(45, 0, 12000, 4000, 16000),
(46, 0, 12000, 4000, 16000),
(47, 0, 12000, 4000, 16000),
(48, 0, 12000, 4000, 16000),
(49, 0, 12000, 4000, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `makan`
--

CREATE TABLE `makan` (
  `id_produk` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(6) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makan`
--

INSERT INTO `makan` (`id_produk`, `nama`, `harga`, `jumlah`) VALUES
(1, 'Rawon', 12000, 104),
(2, 'Soto', 12000, 9),
(3, 'Kare', 6000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `minum`
--

CREATE TABLE `minum` (
  `id_produk` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(6) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minum`
--

INSERT INTO `minum` (`id_produk`, `nama`, `harga`, `jumlah`) VALUES
(4, 'Teh', 3000, 10),
(5, 'Jeruk', 4000, 10),
(6, 'Marimas', 4000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_detail` int(5) DEFAULT NULL,
  `Nama_kasir` varchar(50) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `waktu_transaksi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `makan`
--
ALTER TABLE `makan`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `minum`
--
ALTER TABLE `minum`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_detail` (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `makan`
--
ALTER TABLE `makan`
  ADD CONSTRAINT `makan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `minum`
--
ALTER TABLE `minum`
  ADD CONSTRAINT `minum_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `detail` (`id_detail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
