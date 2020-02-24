-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 05:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knitfit-prod`
--

-- --------------------------------------------------------

--
-- Table structure for table `gauge_conversion`
--

DROP TABLE IF EXISTS `gauge_conversion`;
CREATE TABLE IF NOT EXISTS `gauge_conversion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `stitch_gauge_inch` float DEFAULT NULL,
  `stitches_10_cm` float DEFAULT NULL,
  `row_gauge_inch` float DEFAULT NULL,
  `rows_10_cm` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `gauge_conversion`
--

TRUNCATE TABLE `gauge_conversion`;
--
-- Dumping data for table `gauge_conversion`
--

INSERT INTO `gauge_conversion` (`id`, `user_id`, `stitch_gauge_inch`, `stitches_10_cm`, `row_gauge_inch`, `rows_10_cm`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 8, 3, 12, NULL, NULL),
(2, NULL, 2.5, 10, 3, 12, NULL, NULL),
(3, NULL, 3, 12, 5, 20, NULL, NULL),
(4, NULL, 3.5, 14, 5, 20, NULL, NULL),
(5, NULL, 4, 16, 6.5, 26, NULL, NULL),
(6, NULL, 4.5, 18, 7, 28, NULL, NULL),
(7, NULL, 5, 20, 7.5, 30, NULL, NULL),
(8, NULL, 5.5, 22, 7.5, 30, NULL, NULL),
(9, NULL, 6, 24, 8, 32, NULL, NULL),
(10, NULL, 6.5, 26, 8, 32, NULL, NULL),
(11, NULL, 7, 28, 8.5, 34, NULL, NULL),
(12, NULL, 7.5, 30, 9, 36, NULL, NULL),
(13, NULL, 8, 32, 9, 36, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `needle_sizes`
--

DROP TABLE IF EXISTS `needle_sizes`;
CREATE TABLE IF NOT EXISTS `needle_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `us_size` float DEFAULT NULL,
  `mm_size` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `needle_sizes`
--

TRUNCATE TABLE `needle_sizes`;
--
-- Dumping data for table `needle_sizes`
--

INSERT INTO `needle_sizes` (`id`, `user_id`, `us_size`, `mm_size`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1.75, NULL, NULL),
(2, 1, 0, 2, NULL, NULL),
(3, 1, 1, 2.25, NULL, NULL),
(4, 1, 1.5, 2.5, NULL, NULL),
(5, 1, 2, 2.75, NULL, NULL),
(6, 1, 3, 3.25, NULL, NULL),
(7, 1, 4, 3.5, NULL, NULL),
(8, 1, 5, 3.75, NULL, NULL),
(9, 1, 6, 4, NULL, NULL),
(10, 1, 7, 4.5, NULL, NULL),
(11, 1, 8, 5, NULL, NULL),
(12, 1, 9, 5.5, NULL, NULL),
(13, 1, 10, 6, NULL, NULL),
(14, 1, 10.5, 6.5, NULL, NULL),
(15, 1, 11, 8, NULL, NULL),
(16, 1, 13, 9, NULL, NULL),
(17, 1, 15, 10, NULL, NULL),
(18, 1, 16, 0, NULL, NULL),
(19, 1, 17, 0, NULL, NULL),
(20, 1, 19, 0, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
