-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2021 at 06:58 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kesebelasan`
--
CREATE DATABASE IF NOT EXISTS `kesebelasan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kesebelasan`;

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

DROP TABLE IF EXISTS `bobot`;
CREATE TABLE IF NOT EXISTS `bobot` (
  `bobot_id` int(11) NOT NULL AUTO_INCREMENT,
  `bobot_speed` int(2) NOT NULL,
  `bobot_heading` int(2) NOT NULL,
  `bobot_control` int(2) NOT NULL,
  `bobot_passing` int(2) NOT NULL,
  PRIMARY KEY (`bobot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`bobot_id`, `bobot_speed`, `bobot_heading`, `bobot_control`, `bobot_passing`) VALUES
(7, 4, 4, 5, 5),
(8, 5, 3, 4, 3),
(11, 5, 4, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `formasi`
--

DROP TABLE IF EXISTS `formasi`;
CREATE TABLE IF NOT EXISTS `formasi` (
  `formasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `formasi_belakang` int(1) NOT NULL,
  `formasi_tengah` int(1) NOT NULL,
  `formasi_depan` int(1) NOT NULL,
  `formasi_value` varchar(5) NOT NULL,
  PRIMARY KEY (`formasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formasi`
--

INSERT INTO `formasi` (`formasi_id`, `formasi_belakang`, `formasi_tengah`, `formasi_depan`, `formasi_value`) VALUES
(1, 4, 4, 2, '4-4-2'),
(2, 4, 3, 3, '4-3-3'),
(3, 5, 3, 2, '5-3-2'),
(4, 3, 4, 3, '3-4-3');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

DROP TABLE IF EXISTS `kandidat`;
CREATE TABLE IF NOT EXISTS `kandidat` (
  `kandidat_id` int(11) NOT NULL AUTO_INCREMENT,
  `kandidat_nama` char(30) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `kesebelasan_id` int(11) NOT NULL,
  `kandidat_speed` int(1) NOT NULL,
  `kandidat_heading` int(1) NOT NULL,
  `kandidat_control` int(1) NOT NULL,
  `kandidat_passing` int(1) NOT NULL,
  PRIMARY KEY (`kandidat_id`),
  KEY `posisi_id` (`posisi_id`),
  KEY `kesebelasan_id` (`kesebelasan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`kandidat_id`, `kandidat_nama`, `posisi_id`, `kesebelasan_id`, `kandidat_speed`, `kandidat_heading`, `kandidat_control`, `kandidat_passing`) VALUES
(23, 'SCHNELLER', 1, 19, 57, 66, 53, 55),
(24, 'HOFFMANN', 1, 19, 56, 70, 50, 54),
(25, 'NUBEL', 1, 19, 64, 70, 54, 61),
(26, 'NEUER', 1, 19, 60, 70, 66, 66),
(27, 'ALABA', 2, 19, 87, 77, 85, 88),
(28, 'SULE', 2, 19, 76, 92, 71, 76),
(29, 'PAVARD', 2, 19, 83, 82, 77, 79),
(30, 'HERNANDEZ', 2, 19, 83, 82, 78, 77),
(31, 'BOATENG', 2, 19, 74, 89, 72, 77),
(32, 'RICHARDS', 2, 19, 76, 78, 65, 64),
(33, 'SARR', 2, 19, 85, 64, 70, 75),
(34, 'KOUASSI', 2, 19, 73, 80, 72, 71),
(35, 'ARREY-MBI', 2, 19, 68, 71, 57, 61),
(36, 'VITA', 2, 19, 78, 62, 65, 63),
(37, 'LUNGWITZ', 2, 19, 72, 68, 66, 61),
(38, 'KIMMICH', 3, 19, 80, 71, 85, 86),
(39, 'GORETZKA', 3, 19, 83, 86, 84, 86),
(40, 'COMAN', 3, 19, 92, 61, 84, 75),
(41, 'DAVIES', 3, 19, 96, 63, 76, 65),
(42, 'JAVI MARTINEZ', 3, 19, 63, 90, 85, 87),
(43, 'TOLISSO', 3, 19, 78, 81, 81, 82),
(44, 'MUSIALA', 3, 19, 75, 61, 75, 73),
(45, 'DOUGLAS COSTA', 3, 19, 87, 60, 86, 79),
(46, 'MARC ROCA', 3, 19, 69, 67, 76, 86),
(47, 'ONTUZANS', 3, 19, 70, 60, 73, 70),
(48, 'SANE', 4, 19, 96, 70, 77, 84),
(49, 'GNARBY', 4, 19, 87, 67, 87, 82),
(50, 'ZIRKZEE', 4, 19, 77, 72, 74, 65),
(51, 'DAJAKU', 4, 19, 81, 63, 66, 67),
(52, 'ARP', 4, 19, 74, 71, 73, 67),
(53, 'TILLMAN', 4, 19, 73, 69, 68, 67),
(54, 'CHOUPO-MOTING', 4, 19, 81, 77, 74, 71),
(55, 'SIEB', 4, 19, 76, 63, 72, 67),
(56, 'ARGAWINATA', 1, 20, 68, 60, 53, 55),
(57, 'A. ARDHIYASA', 1, 20, 61, 59, 63, 59),
(58, 'R. MOKODOMPIT', 1, 20, 58, 63, 62, 63),
(59, 'F. ARYANTO', 2, 20, 68, 71, 69, 64),
(60, 'A. SETYO', 2, 20, 66, 72, 66, 65),
(61, 'ASNAWI BAHAR', 2, 20, 73, 61, 67, 64),
(62, 'A. BERLIAN', 2, 20, 71, 62, 61, 63),
(63, 'ZULFIANDI', 2, 20, 74, 72, 67, 71),
(64, 'SATRIYA', 2, 20, 69, 58, 70, 75),
(65, 'BAGAS ADI', 2, 20, 70, 59, 67, 65),
(66, 'KOKO ARI', 2, 20, 70, 53, 67, 62),
(67, 'H. SISWANTO', 2, 20, 71, 67, 74, 71),
(68, 'E. DIMAS', 2, 20, 70, 69, 69, 69),
(69, 'KADEK AGUNG', 2, 20, 72, 66, 72, 67),
(70, 'J. ALFARIZI', 3, 20, 77, 54, 71, 66),
(71, 'F. HARYADI', 3, 20, 73, 69, 69, 66),
(72, 'ADAM ALIS', 3, 20, 78, 68, 76, 66),
(73, 'MAULANA VIKRI', 3, 20, 74, 64, 67, 65),
(74, 'K. YUDO', 4, 20, 76, 66, 71, 66),
(75, 'I. SPASOJEVIC', 4, 20, 76, 68, 78, 72),
(76, 'I. BACHDIM', 4, 20, 75, 68, 70, 69),
(77, 'SULISTYAWAN', 4, 20, 66, 54, 74, 70),
(103, 'H. LLORIS', 1, 23, 63, 60, 61, 62),
(104, 'MANDADA', 1, 23, 65, 67, 55, 62),
(105, 'AREOLA', 1, 23, 63, 70, 55, 60),
(106, 'B. PAVARD', 2, 23, 83, 82, 77, 79),
(107, 'LENGLET', 2, 23, 77, 86, 74, 81),
(108, 'S. UMTITI', 2, 23, 79, 82, 76, 78),
(109, 'L. HERNANDEZ', 2, 23, 83, 82, 78, 77),
(110, 'B. MATUIDI', 2, 23, 81, 71, 77, 83),
(111, 'KIMPEMBE', 2, 23, 81, 81, 73, 79),
(112, 'DUBOIS', 3, 23, 81, 65, 75, 78),
(113, 'C. TOLLISO', 3, 23, 78, 81, 81, 82),
(114, 'LEMAR', 3, 23, 81, 64, 84, 80),
(115, 'FEKIR', 3, 23, 77, 60, 88, 80),
(116, 'K. COMAN', 3, 23, 92, 61, 84, 76),
(117, 'K. MBAPPE', 4, 23, 96, 77, 89, 78),
(118, 'A. GRIEZMANN', 4, 23, 80, 83, 91, 85),
(119, 'O. GIROUD', 4, 23, 64, 92, 82, 78);

-- --------------------------------------------------------

--
-- Table structure for table `kesebelasan`
--

DROP TABLE IF EXISTS `kesebelasan`;
CREATE TABLE IF NOT EXISTS `kesebelasan` (
  `kesebelasan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kesebelasan_nama` char(30) NOT NULL,
  `formasi_id` int(11) NOT NULL,
  `bobot_id` int(11) NOT NULL,
  PRIMARY KEY (`kesebelasan_id`),
  KEY `formasi_id` (`formasi_id`),
  KEY `bobot_id` (`bobot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kesebelasan`
--

INSERT INTO `kesebelasan` (`kesebelasan_id`, `kesebelasan_nama`, `formasi_id`, `bobot_id`) VALUES
(19, 'Munchen', 1, 7),
(20, 'Indonesia', 2, 8),
(23, 'Prancis', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

DROP TABLE IF EXISTS `posisi`;
CREATE TABLE IF NOT EXISTS `posisi` (
  `posisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `posisi_nama` varchar(10) NOT NULL,
  PRIMARY KEY (`posisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`posisi_id`, `posisi_nama`) VALUES
(1, 'kiper'),
(2, 'belakang'),
(3, 'tengah'),
(4, 'depan');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD CONSTRAINT `kandidat_ibfk_1` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`posisi_id`),
  ADD CONSTRAINT `kandidat_ibfk_2` FOREIGN KEY (`kesebelasan_id`) REFERENCES `kesebelasan` (`kesebelasan_id`);

--
-- Constraints for table `kesebelasan`
--
ALTER TABLE `kesebelasan`
  ADD CONSTRAINT `kesebelasan_ibfk_1` FOREIGN KEY (`formasi_id`) REFERENCES `formasi` (`formasi_id`),
  ADD CONSTRAINT `kesebelasan_ibfk_2` FOREIGN KEY (`bobot_id`) REFERENCES `bobot` (`bobot_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
