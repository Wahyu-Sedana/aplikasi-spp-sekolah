-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2022 at 01:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE PROCEDURE `data_siswa` ()   BEGIN
SELECT * FROM tb_siswa INNER JOIN tb_kelas ON tb_siswa.id_kelas=tb_kelas.id_kelas INNER JOIN tb_spp ON tb_siswa.id_spp=tb_spp.id_spp;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `generate_laporan` 
-- (See below for the actual view)
--
CREATE TABLE `generate_laporan` (
`nis` char(8)
,`nama` varchar(35)
,`bulan_dibayar` varchar(8)
,`tahun_dibayar` varchar(4)
,`nama_kelas` varchar(10)
,`nama_petugass` varchar(35)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'RPL', 'Rekayasa Perangkat Lunak'),
(2, 'AP', 'Akomodasi Perhotelan'),
(4, 'MM', 'Multi Media'),
(6, 'TBSM', 'Teknik Bisnis Sepeda Motor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(8) NOT NULL,
  `tahun_dibayar` varchar(4) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`) VALUES
(64, 2, '0087788', '2022-04-10', '1', '2022', 1, 100000),
(65, 1, '00345543', '2022-04-10', '1', '2022', 1, 1000000),
(66, 1, '00345543', '2022-04-10', '2', '2022', 1, 1000000),
(67, 1, '00345543', '2022-04-10', '3', '2022', 1, 1000000),
(68, 1, '00644332', '2022-04-11', '1', '2022', 1, 1000000),
(69, 1, '00644332', '2022-04-11', '2', '2022', 1, 1000000),
(70, 1, '00644332', '2022-04-11', '3', '2022', 1, 1000000),
(71, 1, '00644332', '2022-04-11', '4', '2022', 1, 1000000),
(72, 1, '00644332', '2022-04-11', '5', '2022', 1, 1000000),
(73, 1, '00644332', '2022-04-11', '6', '2022', 1, 1000000),
(74, 1, '00644332', '2022-04-11', '7', '2022', 1, 1000000),
(75, 1, '00644332', '2022-04-11', '8', '2022', 1, 1000000),
(76, 1, '00644332', '2022-04-11', '9', '2022', 1, 1000000),
(77, 1, '00644332', '2022-04-11', '10', '2022', 1, 1000000),
(78, 1, '00644332', '2022-04-11', '11', '2022', 1, 1000000),
(79, 1, '00644332', '2022-04-11', '12', '2022', 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugass` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama_petugass`, `level`) VALUES
(1, 'admin', 'admin123', 'admin', 'admin'),
(2, 'petugas', 'petugas123', 'petugas', 'petugas'),
(8, 'petugas', 'petugas1234', 'lolo', 'admin'),
(10, 'aguscuk', 'aguscuk123', 'qqq', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` varchar(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('00345543', '28051', 'wahyueka', 4, 'Jln Gunung Mas Gang Merapi 4', '087766556777', 1),
('00644331', '28044', 'krisna', 2, 'Jln Abian Semal', '081222333444', 1),
('00644332', '28044', 'rama123', 1, 'Jln Muding Kaja', '08123443223', 1),
('00877766', '22', 'sss', 6, 'ads', '087766556777', 1),
('0087788', '28046', 'janda', 2, 'jln gunung mas gang merapi no 4 padang sambian kelod', '081337559190', 1),
('00987789', '28099', 'wintara', 1, 'Jln Abian Semal', '087678876123', 1),
('0098899', '27955', 'sri wijayanti', 2, 'jln handayani no 89', '089977654455', 1),
('2', '2', 'rama', 4, 'jln gunung bhuana agung', '087766556777', 1),
('222', '222', 'ggg', 6, 'afddd', '081337559190', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, 2022, 1000000);

-- --------------------------------------------------------

--
-- Structure for view `generate_laporan`
--
DROP TABLE IF EXISTS `generate_laporan`;

CREATE VIEW `generate_laporan`  AS SELECT `tb_siswa`.`nis` AS `nis`, `tb_siswa`.`nama` AS `nama`, `tb_pembayaran`.`bulan_dibayar` AS `bulan_dibayar`, `tb_pembayaran`.`tahun_dibayar` AS `tahun_dibayar`, `tb_kelas`.`nama_kelas` AS `nama_kelas`, `tb_petugas`.`nama_petugass` AS `nama_petugass` FROM (((`tb_siswa` join `tb_pembayaran` on(`tb_siswa`.`nisn` = `tb_pembayaran`.`nisn`)) join `tb_kelas` on(`tb_siswa`.`id_kelas` = `tb_kelas`.`id_kelas`)) join `tb_petugas` on(`tb_pembayaran`.`id_petugas` = `tb_petugas`.`id_petugas`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `tb_siswa` (`id_spp`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_4` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`);

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_siswa_ibfk_3` FOREIGN KEY (`id_spp`) REFERENCES `tb_spp` (`id_spp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
