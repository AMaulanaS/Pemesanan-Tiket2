-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 10:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ujisertifikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
`id_film` int(11) NOT NULL,
  `judul_film` varchar(50) NOT NULL,
  `durasi` int(11) NOT NULL,
  `kategori_film` enum('2D','3D') DEFAULT '2D'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul_film`, `durasi`, `kategori_film`) VALUES
(1, 'Bumblebee', 113, '3D'),
(2, 'Aquaman', 143, '2D'),
(3, 'SPIDER-MAN : INTO THE SPIDER-VERSE', 116, '2D'),
(4, 'MILLY & MAMET', 101, '2D'),
(5, 'ASAL KAU BAHAGIA', 88, '2D');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id_jadwal` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_studio` enum('1','2','3','4','5') NOT NULL,
  `id_jam_tayang` int(11) NOT NULL,
  `tiket_tersedia` int(5) NOT NULL DEFAULT '50'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_film`, `id_studio`, `id_jam_tayang`, `tiket_tersedia`) VALUES
(1, 1, '1', 1, 29),
(2, 1, '1', 4, 30),
(3, 1, '1', 8, 49),
(4, 1, '1', 12, 50),
(5, 3, '2', 1, 48),
(6, 3, '2', 4, 50),
(7, 5, '3', 3, 19),
(8, 5, '3', 5, 40),
(9, 2, '4', 2, 50),
(10, 2, '4', 7, 47);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
`id_tiket` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jml_kursi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_jadwal`, `tanggal`, `jml_kursi`) VALUES
(1, 2, '2019-01-05', 5),
(2, 2, '2019-01-05', 3),
(3, 8, '2019-01-05', 10),
(4, 5, '2019-01-05', 2),
(5, 0, '2019-01-05', 0),
(6, 2, '2019-01-05', 11),
(7, 7, '2019-01-05', 10),
(8, 1, '2019-01-05', 14),
(9, 1, '2019-01-05', 1),
(10, 2, '2019-01-05', 1),
(11, 7, '2019-01-05', 1),
(12, 1, '2019-01-05', 1),
(13, 1, '2019-01-05', 1),
(14, 1, '2019-01-05', 1),
(15, 3, '2019-01-05', 1),
(16, 1, '2019-01-05', 1),
(17, 10, '2019-01-05', 3),
(18, 1, '2019-01-05', 1),
(19, 1, '2019-01-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Rifki Tridi Hananto', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
 ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
 ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
