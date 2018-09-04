-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 11:33 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hazel`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(10) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` char(5) NOT NULL,
  `Name_admin` varchar(25) NOT NULL,
  `email_admin` varchar(40) NOT NULL,
  `foto` text,
  `password` varchar(25) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `alamat` text,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `Name_admin`, `email_admin`, `foto`, `password`, `username`, `alamat`, `level`) VALUES
('A001', 'Sugih Purnama', '', NULL, 'sugihpurnama', 'sugihpurnama', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id_client` varchar(4) NOT NULL,
  `name_client` varchar(40) NOT NULL,
  `name_perusahaan` varchar(40) DEFAULT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `instagram` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_extras`
--

CREATE TABLE `tbl_extras` (
  `id_extras` int(4) NOT NULL,
  `name_extras` varchar(20) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `id_paket` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_extras`
--

INSERT INTO `tbl_extras` (`id_extras`, `name_extras`, `price`, `id_paket`) VALUES
(1, 'a', '40000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fotografer`
--

CREATE TABLE `tbl_fotografer` (
  `id_fotografer` int(4) NOT NULL,
  `name_fotografer` varchar(40) NOT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fotografer`
--

INSERT INTO `tbl_fotografer` (`id_fotografer`, `name_fotografer`, `no_telp`, `email`) VALUES
(4, 'Darwin', '0', 'darwin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(4) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `tgl_pemotretan` date DEFAULT NULL,
  `tmpt_pemotretan` date DEFAULT NULL,
  `alamat_onthespot` text,
  `moods` varchar(30) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `property` varchar(40) DEFAULT NULL,
  `id_paket` int(4) DEFAULT NULL,
  `id_extras` int(4) DEFAULT NULL,
  `id_admin` char(5) DEFAULT NULL,
  `id_fotografer` int(4) DEFAULT NULL,
  `id_package` int(4) DEFAULT NULL,
  `id_payment` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_client` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `id_package` int(4) NOT NULL,
  `name_package` varchar(20) DEFAULT NULL,
  `range_package` varchar(10) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `id_paket` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`id_package`, `name_package`, `range_package`, `price`, `id_paket`) VALUES
(1, 'Pot', '5-22', '30000', 1),
(3, 'kembang', '3', '4000', 1),
(4, 'qw', '5-29', '4000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(4) NOT NULL,
  `name_paket` varchar(20) DEFAULT 'NULL',
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `name_paket`, `price`) VALUES
(1, 'Food', '400000'),
(2, 'Family', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id_payment` int(4) UNSIGNED ZEROFILL NOT NULL,
  `jenis_payment` varchar(15) DEFAULT NULL,
  `tgl_payment` date DEFAULT NULL,
  `total_biaya` decimal(10,2) DEFAULT NULL,
  `bayar` decimal(10,2) DEFAULT NULL,
  `rincian` text,
  `dp` decimal(10,2) DEFAULT NULL,
  `sisa_pelunasan` decimal(10,2) DEFAULT NULL,
  `status` varchar(8) DEFAULT NULL,
  `id_admin` char(5) DEFAULT NULL,
  `id_order` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembali` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_nota`, `jenis`, `nama`, `bayar`, `kembali`, `total`, `tanggal`, `id_user`) VALUES
(56, 'C019', 'Sepeda Motor', 'hfghfhg', 56465456, 0, 0, '2018-08-28', 16),
(58, 'C021', 'Sepeda Motor', 'ghjgj', 0, 0, 0, '2016-08-09', 1),
(59, 'C022', 'Sepeda', 'saya', 50000, 25000, 25000, '2016-08-09', 1),
(61, 'C024', 'Mobil', '56465', 656456, 456, 4564, '2016-08-09', 1),
(62, 'C025', 'Mobil', '43', 5, 5, 5, '2016-08-09', 1),
(63, 'C026', 'Sepeda Motor', 'sugih purnama', 7676767, 767676, 767676, '2018-08-27', 1),
(64, 'C027', 'Sepeda Motor', 'sugih purnama', 10, 5, 5, '2018-08-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'M. Rudianto', 'Ds. Bareng, Kec. Sawahan Kab. Nganjuk - Jawa Timur', '085735501035', 1),
(16, 'Ridwan', 'd584c96e6c1ba3ca448426f66e552e8e', 'Ridwan', 'hjhjhhdsds', '09090909', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tbl_extras`
--
ALTER TABLE `tbl_extras`
  ADD PRIMARY KEY (`id_extras`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `tbl_fotografer`
--
ALTER TABLE `tbl_fotografer`
  ADD PRIMARY KEY (`id_fotografer`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_extras` (`id_extras`),
  ADD KEY `id_package` (`id_package`),
  ADD KEY `id_fotografer` (`id_fotografer`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`id_package`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_extras`
--
ALTER TABLE `tbl_extras`
  MODIFY `id_extras` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fotografer`
--
ALTER TABLE `tbl_fotografer`
  MODIFY `id_fotografer` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id_package` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id_payment` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_extras`
--
ALTER TABLE `tbl_extras`
  ADD CONSTRAINT `tbl_extras_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tbl_paket` (`id_paket`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_10` FOREIGN KEY (`id_fotografer`) REFERENCES `tbl_fotografer` (`id_fotografer`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`),
  ADD CONSTRAINT `tbl_order_ibfk_5` FOREIGN KEY (`id_client`) REFERENCES `tbl_client` (`id_client`),
  ADD CONSTRAINT `tbl_order_ibfk_7` FOREIGN KEY (`id_paket`) REFERENCES `tbl_paket` (`id_paket`),
  ADD CONSTRAINT `tbl_order_ibfk_8` FOREIGN KEY (`id_extras`) REFERENCES `tbl_extras` (`id_extras`),
  ADD CONSTRAINT `tbl_order_ibfk_9` FOREIGN KEY (`id_package`) REFERENCES `tbl_package` (`id_package`);

--
-- Constraints for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD CONSTRAINT `tbl_package_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tbl_paket` (`id_paket`);

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `tbl_payment_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`),
  ADD CONSTRAINT `tbl_payment_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
