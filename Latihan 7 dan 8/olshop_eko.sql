-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2022 at 04:03 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olshop_eko`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `detail_id` int(11) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `item` int(11) NOT NULL,
  `harga_total_per_produk` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`detail_id`, `kode_transaksi`, `sku`, `item`, `harga_total_per_produk`) VALUES
(1, 'TRS001', 'PRD023', 5, '5000.00'),
(2, 'TRS001', 'PRD024', 2, '6000.00'),
(3, 'TRS001', 'PRD025', 3, '33000.00'),
(4, 'TRS001', 'PRD026', 1, '45000.00'),
(5, 'TRS002', 'PRD023', 5, '5000.00'),
(6, 'TRS002', 'PRD024', 5, '15000.00'),
(7, 'TRS003', 'PRD025', 2, '22000.00'),
(8, 'TRS004', 'PRD026', 2, '90000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kodepos` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `nama`, `email`, `password`, `tanggal_lahir`, `alamat`, `kodepos`) VALUES
(1, 'Andi', 'andi@email.com', 'andi', '1971-02-19', 'Bandung', '1919'),
(2, 'Asih', 'asih@email.com', 'asih', '1973-05-02', 'Padang', '1111'),
(3, 'Budi', 'budi@email.com', 'budi', '1975-06-29', 'Padang', '1111'),
(4, 'Ari', 'ari@email.com', 'ari', '1977-10-04', 'Pekanbaru', '1432'),
(6, 'Hesdey', 'hesdey@email.com', 'hesdey', '1988-12-16', 'Depok', '1567');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_satuan` decimal(7,0) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `nama`, `sku`, `stok`, `harga_satuan`, `img_url`) VALUES
(1, 'Produk Satu', 'PRD023', 10, '1000', '../assets/image/product/prd023'),
(2, 'Produk Dua', 'PRD024', 15, '3000', '../assets/image/product/prd024'),
(3, 'Produk Tiga', 'PRD025', 100, '11000', '../assets/image/product/prd025'),
(4, 'Produk Empat', 'PRD026', 5, '45000', '../assets/image/product/prd026'),
(5, 'Produk Lima', 'PRD027', 50, '7000', '../assets/image/product/prd027');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `kode_transaksi`, `tanggal_transaksi`, `email_pelanggan`, `status_pembayaran`) VALUES
(1, 'TRS001', '2021-02-19', 'andi@email.com', 'Lunas'),
(2, 'TRS002', '2021-05-02', 'asih@email.com', 'Belum Lunas'),
(3, 'TRS003', '2021-06-29', 'budi@email.com', 'Lunas'),
(4, 'TRS004', '2021-10-04', 'ari@email.com', 'Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
