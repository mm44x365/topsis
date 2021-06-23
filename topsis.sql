-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 08:51 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_alternatif`
--

CREATE TABLE `tab_alternatif` (
  `id` int(10) NOT NULL,
  `alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_alternatif`
--

INSERT INTO `tab_alternatif` (`id`, `alternatif`) VALUES
(1, 'LDF 5'),
(6, 'LHG 5'),
(7, 'LHG 5 XL'),
(8, 'LHG 5 AC XL');

-- --------------------------------------------------------

--
-- Table structure for table `tab_kriteria`
--

CREATE TABLE `tab_kriteria` (
  `id` int(10) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_kriteria`
--

INSERT INTO `tab_kriteria` (`id`, `kriteria`, `bobot`) VALUES
(2, 'Jarak', 5),
(3, 'Tipe Koneksi', 2),
(4, 'Lokasi', 2),
(7, 'Bandwith', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tab_matrik`
--

CREATE TABLE `tab_matrik` (
  `id` int(11) NOT NULL,
  `id_alternatif` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `nilai` float NOT NULL,
  `dummy` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_matrik`
--

INSERT INTO `tab_matrik` (`id`, `id_alternatif`, `id_kriteria`, `nilai`, `dummy`) VALUES
(1, '1', '2', 1, 1),
(2, '1', '3', 1, 1),
(3, '1', '4', 2, 1),
(4, '1', '7', 2, 1),
(5, '6', '2', 2, 1),
(6, '6', '3', 1, 1),
(7, '6', '4', 3, 1),
(8, '6', '7', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tab_poin`
--

CREATE TABLE `tab_poin` (
  `id` int(10) NOT NULL,
  `poin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_poin`
--

INSERT INTO `tab_poin` (`id`, `poin`) VALUES
(11, '1'),
(12, '2'),
(13, '3'),
(14, '4'),
(15, '5');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_matrik`
-- (See below for the actual view)
--
CREATE TABLE `view_matrik` (
`id` int(11)
,`id_alternatif` int(10)
,`nama_alternatif` varchar(50)
,`id_kriteria` int(10)
,`nama_kriteria` varchar(50)
,`bobot_kriteria` float
,`nilai` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_matrik2`
-- (See below for the actual view)
--
CREATE TABLE `view_matrik2` (
`nama_alternatif` varchar(50)
,`nama_kriteria` varchar(50)
,`nilai` float
,`bobot` float
);

-- --------------------------------------------------------

--
-- Structure for view `view_matrik`
--
DROP TABLE IF EXISTS `view_matrik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_matrik`  AS SELECT `tab_matrik`.`id` AS `id`, `tab_alternatif`.`id` AS `id_alternatif`, `tab_alternatif`.`alternatif` AS `nama_alternatif`, `tab_kriteria`.`id` AS `id_kriteria`, `tab_kriteria`.`kriteria` AS `nama_kriteria`, `tab_kriteria`.`bobot` AS `bobot_kriteria`, `tab_matrik`.`nilai` AS `nilai` FROM ((`tab_matrik` join `tab_alternatif` on(`tab_matrik`.`id_alternatif` = `tab_alternatif`.`id`)) join `tab_kriteria` on(`tab_matrik`.`id_kriteria` = `tab_kriteria`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_matrik2`
--
DROP TABLE IF EXISTS `view_matrik2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_matrik2`  AS SELECT `tab_alternatif`.`alternatif` AS `nama_alternatif`, `tab_kriteria`.`kriteria` AS `nama_kriteria`, `tab_matrik`.`nilai` AS `nilai`, `tab_kriteria`.`bobot` AS `bobot` FROM ((`tab_matrik` join `tab_alternatif` on(`tab_matrik`.`id_alternatif` = `tab_alternatif`.`id`)) join `tab_kriteria` on(`tab_matrik`.`id_kriteria` = `tab_kriteria`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_kriteria`
--
ALTER TABLE `tab_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_matrik`
--
ALTER TABLE `tab_matrik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_poin`
--
ALTER TABLE `tab_poin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tab_kriteria`
--
ALTER TABLE `tab_kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tab_matrik`
--
ALTER TABLE `tab_matrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tab_poin`
--
ALTER TABLE `tab_poin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
