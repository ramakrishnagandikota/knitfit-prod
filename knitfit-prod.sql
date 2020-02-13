-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 08:28 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.17

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
-- Table structure for table `admin_settings`
--

DROP TABLE IF EXISTS `admin_settings`;
CREATE TABLE IF NOT EXISTS `admin_settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `setting_type` text COLLATE utf8mb4_unicode_ci,
  `setting_data` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `admin_settings`
--

TRUNCATE TABLE `admin_settings`;
-- --------------------------------------------------------

--
-- Table structure for table `measurement_variables`
--

DROP TABLE IF EXISTS `measurement_variables`;
CREATE TABLE IF NOT EXISTS `measurement_variables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variable_type` varchar(100) DEFAULT NULL,
  `variable_name` text,
  `variable_image` text,
  `variable_description` text,
  `v_inch_min` int(11) DEFAULT NULL,
  `v_inch_max` int(11) DEFAULT NULL,
  `v_cm_min` int(11) DEFAULT NULL,
  `v_cm_max` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `measurement_variables`
--

TRUNCATE TABLE `measurement_variables`;
--
-- Dumping data for table `measurement_variables`
--

INSERT INTO `measurement_variables` (`id`, `variable_type`, `variable_name`, `variable_image`, `variable_description`, `v_inch_min`, `v_inch_max`, `v_cm_min`, `v_cm_max`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'body_size', 'hips', NULL, NULL, 0, 100, 0, 250, 1, '2020-01-06 00:00:00', NULL),
(2, 'body_size', 'waist', NULL, NULL, 0, 100, 0, 250, 1, '2020-01-06 00:00:00', NULL),
(3, 'body_size', 'waist front', NULL, NULL, 0, 100, 0, 250, 1, '2020-01-06 00:00:00', NULL),
(4, 'body_size', 'bust', NULL, NULL, 0, 100, 0, 250, 1, '2020-01-06 00:00:00', NULL),
(5, 'body_size', 'bust front', NULL, NULL, 0, 100, 0, 250, 1, '2020-01-06 00:00:00', NULL),
(6, 'body_size', 'bust back', NULL, NULL, 0, 100, 0, 250, 1, '2020-01-06 00:00:00', NULL),
(7, 'body_length', 'Waist to Underarm', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(8, 'body_length', 'Armhole Depth', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(9, 'arm_size', 'Wrist Circumference', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(10, 'arm_size', 'Upperarm Circumference', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(11, 'arm_size', 'Shoulder Circumference', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(12, 'arm_length', 'Wrist to Underarm', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(13, 'arm_length', 'Wrist to Elbow', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(14, 'arm_length', 'Elbow to Underarm', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(15, 'arm_length', 'Wrist to Top of Shoulder', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(16, 'neck_and_shoulders', 'Depth of Neck', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(17, 'neck_and_shoulders', 'Neck Circumference', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(18, 'neck_and_shoulders', 'Neck Width', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(19, 'neck_and_shoulders', 'Neck to Shoulder', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(20, 'neck_and_shoulders', 'Shoulder to Shoulder', NULL, NULL, 0, 50, 0, 125, 1, '2020-01-06 00:00:00', NULL),
(21, 'arm_size', 'Forearm circumference', NULL, NULL, 0, 50, 0, 125, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_11_29_064049_create_admin_settings_table', 1),
(9, '2019_12_02_120228_create_roles_table', 1),
(10, '2019_12_02_121408_create_subscription_table', 1),
(11, '2019_12_02_131153_create_user_measurements_table', 1),
(12, '2019_12_03_061614_create_user_profile_table', 1),
(13, '2019_12_03_061911_create_user_role_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_access_tokens`
--

TRUNCATE TABLE `oauth_access_tokens`;
-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_auth_codes`
--

TRUNCATE TABLE `oauth_auth_codes`;
-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_clients`
--

TRUNCATE TABLE `oauth_clients`;
-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_personal_access_clients`
--

TRUNCATE TABLE `oauth_personal_access_clients`;
-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `oauth_refresh_tokens`
--

TRUNCATE TABLE `oauth_refresh_tokens`;
-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_clicked` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `password_resets`
--

TRUNCATE TABLE `password_resets`;
--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `is_clicked`, `created_at`) VALUES
('nikithabandari79@gmail.com', '46f0fe0883d4e77e8a001259ee3a439d', 0, '2020-01-16 11:21:15'),
('nikithabandari79@gmail.com', '5ac1aaf695215e160043a758587864f0', 0, '2020-01-16 11:22:20'),
('nikithabandari79@gmail.com', '7f696e470e05e0a82882f0a306f2b078', 1, '2020-01-27 07:33:58'),
('nikithabandari79@gmail.com', 'b7f15f6c7e8354b3098e49b6cc5f6263', 1, '2020-01-27 07:37:03'),
('nickersonjane@gmail.com', '395a3da1186fa79f47992c9836108ce8', 1, '2020-01-27 15:44:12'),
('nikithabandari79@gmail.com', '0a554141ce67aa137e09e865fe009e94', 0, '2020-02-10 13:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `roles`
--

TRUNCATE TABLE `roles`;
--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-01-02 00:33:05', '2020-01-02 00:33:05'),
(2, 'Knitter', '2020-01-02 00:33:05', '2020-01-02 00:33:05'),
(3, 'Wholesaler', '2020-01-02 00:33:05', '2020-01-02 00:33:05'),
(4, 'Designer', '2020-01-02 00:33:05', '2020-01-02 00:33:05'),
(5, 'Advertaiser', '2020-01-02 00:33:06', '2020-01-02 00:33:06'),
(6, 'Retailer', '2020-01-02 00:33:06', '2020-01-02 00:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subscription_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emails` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `subscription`
--

TRUNCATE TABLE `subscription`;
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `role` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `type` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enc_email` text COLLATE utf8mb4_unicode_ci,
  `mobile` bigint(20) DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `landmark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_provider` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_uid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `picture_orginal` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `security_question` text COLLATE utf8mb4_unicode_ci,
  `security_answer` text COLLATE utf8mb4_unicode_ci,
  `normal_sa` text COLLATE utf8mb4_unicode_ci,
  `login_attempts` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sub_exp` date DEFAULT NULL,
  `Inactiveusers_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `banner_orginal` text COLLATE utf8mb4_unicode_ci,
  `banner` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `location`, `role`, `type`, `email`, `password`, `enc_email`, `mobile`, `gender`, `dob`, `address`, `landmark`, `country`, `state`, `postcode`, `oauth_provider`, `oauth_uid`, `oauth_picture`, `locale`, `picture`, `picture_orginal`, `link`, `status`, `security_question`, `security_answer`, `normal_sa`, `login_attempts`, `sub_exp`, `Inactiveusers_count`, `banner_orginal`, `banner`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Rama', 'krishna', NULL, NULL, 2, 1, 'rkrishna021@gmail.com', '$2y$10$Jhae/dfB/8iPVCehtE9D/OFMfMg120oJQMIqOMmbWiLs2QHFxRlSW', '5ab1945e86c20a49eb54996df4ec59a0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '40f682', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, '2002-01-02', 0, NULL, NULL, NULL, '2020-01-02 00:33:46', '2020-01-02 00:33:46'),
(2, NULL, 'srinik', 'rao', NULL, NULL, 2, 1, 'nikithabandari79@gmail.com', '$2y$10$qeqZWr7J2pm9y6luWwyEmOcur/3SuEWaXKy56EJQne2UgJVGw8CRi', '5fa3d12e2b60bdf2597afe2ca2b92f1c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b17f0e', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, '2016-01-16', 0, NULL, NULL, NULL, '2020-01-16 09:55:52', '2020-01-27 07:38:16'),
(3, NULL, 'G Sekhar', NULL, NULL, NULL, 2, 1, 'csk.gogineni@gmail.com', NULL, 'ddfe6890cd91dd72233c38495d74c094', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '115887792567693996150', NULL, NULL, 'https://lh3.googleusercontent.com/a-/AAuE7mBT6KAvl4aV_vfmJjinFVwsel64RcvOhJqVZcQZ-g', NULL, NULL, 1, NULL, NULL, NULL, 0, '2027-01-27', 0, NULL, NULL, 'WhhSA32WUjNjCgb2NtIW4gh4defWa3uV1ccAuLkbiNffEQ6bSn4h5sP69yE7', '2020-01-27 10:23:02', '2020-01-27 10:23:02'),
(4, NULL, 'chandu g', NULL, NULL, NULL, 2, 1, 'chandu.spany5@gmail.com', NULL, 'daa64ecf233df73fa3b81cdc9ff6cc19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '104439905999927332517', NULL, NULL, 'https://lh6.googleusercontent.com/-nceZ30EUO7k/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rd49fxVLwg4aw4e9-SyCPB6nWLiTQ/photo.jpg', NULL, NULL, 1, NULL, NULL, NULL, 0, '2027-01-27', 0, NULL, NULL, 'nIzgJ8v5g2U0TqKiQP24mtxbpreAsWwxlURkM87vJxxiqGzArj7Lv3eQCg1L', '2020-01-27 10:25:24', '2020-01-27 10:25:24'),
(5, NULL, 'Barbara Alddhijdgabff Okelolastein', NULL, NULL, NULL, 2, 1, 'ytpdydfdyj_1576229588@tfbnw.net', NULL, '0a6378af8c0d9247c2cd7ac632940eba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', '100445608128455', NULL, NULL, 'https://graph.facebook.com/v3.3/100445608128455/picture?type=normal', NULL, NULL, 1, NULL, NULL, NULL, 0, '2027-01-27', 0, NULL, NULL, 'zVyP5UcregRzfaCuAlmb4sI7FktEhSzO3UP2CZw2sZyKOq0zs3L6UqJNY32J', '2020-01-27 10:26:26', '2020-01-27 10:26:26'),
(6, NULL, 'Jane', 'Nickerson', NULL, NULL, 2, 1, 'nickersonjane@gmail.com', '$2y$10$5luHbejlz.4s3rhYAmC65u9J4n6l5nOvW2jfKIywg9eMSkKkLNW7G', '86f2a44a2f6190f3bf4139f681255679', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '76e2f0', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, '2027-01-27', 0, NULL, NULL, NULL, '2020-01-27 13:21:05', '2020-01-27 15:45:30'),
(7, NULL, 'Jane Nickerson', NULL, NULL, NULL, 2, 1, 'jane.nickerson@knitfitco.com', NULL, '637244228ab08b92f2be42f3063c3172', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '115791040820212385390', NULL, NULL, 'https://lh6.googleusercontent.com/-Jd3GlD8_Kf8/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rfn-iP0-Onrnqq4R9Lkwa06RvMPUg/photo.jpg', NULL, NULL, 1, NULL, NULL, NULL, 0, '2027-01-27', 0, NULL, NULL, '5Cvh0QNk0R6DWNwjuhW0zBh7hHSNqEgqC2ntzmHjNicapWb0hXLyCNX2ZDwq', '2020-01-27 15:42:21', '2020-01-27 15:42:21'),
(8, NULL, 'Caitlyn', 'Robbins', NULL, NULL, 2, 1, 'caitlyn.t.robbins@gmail.com', '$2y$10$lcikSSkEjs7rtDPjvM5Oo.UMCNhd6b2ak6bjEmPumSG504cf/3foy', 'd63a5a1b9d7a31c3af6681b133304da4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85171d', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, '2027-01-27', 0, NULL, NULL, NULL, '2020-01-27 20:07:05', '2020-01-27 20:07:05'),
(9, 'arinik', 'srinik', 'rao', 'arinik', NULL, 2, 1, 'srinik@gmail.com', '$2y$10$43q/h6J8UgnT2OXKKEGnveaX4gg5FNfq.p40dHbbbe/cawv415zd6', '2a36876edceaf5c161919aa83b667d59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4c3339', NULL, 'resources/assets/user.png', NULL, NULL, 0, NULL, NULL, NULL, 0, '2010-02-10', 0, NULL, NULL, NULL, '2020-02-10 12:52:04', '2020-02-10 12:52:04'),
(10, 'srinik', 'srinik', 'rao', 'srinik123', NULL, 2, 1, 'bandari@plurachnology.com', '$2y$10$0mK4w3b/rjlLuVxkeHEXo.sgIhD2cj1gXl.Vua4kLgs4vlP7U0Ps6', 'a7d5fa37e54ad7dc28c7a99e55d134bd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e03cd8', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, '2010-02-10', 0, NULL, NULL, NULL, '2020-02-10 13:05:18', '2020-02-10 13:05:18'),
(11, 'ramagkrishna91', 'rama', 'krishna', 'ramagkrishna91', NULL, 2, 1, 'ramagkrishna91@gmail.com', '$2y$10$SXobjtF5TsCRYLbDWZtWZO0iEQve1Sr1Oo/FUXd0LNji3yHSoRpX6', 'cd752cb2865a4adab426ccbe0e60a714', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f127e5', NULL, 'resources/assets/user.png', NULL, NULL, 0, NULL, NULL, NULL, 0, '2010-02-10', 0, NULL, NULL, NULL, '2020-02-10 13:18:38', '2020-02-10 13:18:38'),
(12, 'bandari', 'nikitha', 'bandari', 'bandari1234', NULL, 2, 1, 'aaluri@gmail.com', '$2y$10$8KIYVzpEQTvYxMRP6esyJ.PiZkU1Hn1l5wMBDpEtO8rN.HbgTqeyu', '7719c768641380dad837876edddcc1f6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2c002a', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, '2011-02-11', 0, NULL, NULL, NULL, '2020-02-11 07:36:39', '2020-02-11 07:36:39'),
(13, 'Usha', 'Usha', 'Kadali', 'Usha', NULL, 2, 1, 'ushadevikadali@gmail.com', '$2y$10$4XgXygDDSUK/yJ67rw7r6u1W/CfSn4CHci3d9VQ.klQh401o2wTcG', '0902c4e54e03e7e0840049928f3e4309', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f676bd', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, '2011-02-11', 0, NULL, NULL, NULL, '2020-02-11 12:33:49', '2020-02-11 12:33:49'),
(14, NULL, 'Usha Devi', NULL, NULL, NULL, 2, 1, 'may19usha@gmail.com', NULL, '897e1e462cd9e43c8409cef95b660f7f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '111980958635086864941', NULL, NULL, 'https://lh3.googleusercontent.com/a-/AAuE7mDJQXVy8a7JmoJi-1qap0nFiA97qkUsTVrKpaigtQ', NULL, NULL, 1, NULL, NULL, NULL, 0, '2011-02-11', 0, NULL, NULL, 'Gt1ZLDo2QgGvphb40UG9y3VjjMAS8EHrjvqZjCooSURjBr4ySKq046NoaE3D', '2020-02-11 12:37:31', '2020-02-11 12:37:31'),
(15, 'srinikrao', 'srinik', 'rao', 'srinikrao', NULL, 2, 1, 'nikitha.bandari@pluraltechnology.com', '$2y$10$HT5lfEaGvoWHBauYqL/muOk/8zjVp5JGgbk9SXrhhMSVNR3Fo7vJG', 'a7d5fa37e54ad7dc28c7a99e55d134bd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9cd5e3', NULL, 'resources/assets/user.png', NULL, NULL, 0, NULL, NULL, NULL, 0, '2012-02-12', 0, NULL, NULL, NULL, '2020-02-12 05:47:49', '2020-02-12 05:47:49'),
(16, 'ramakrishna', 'Rama', 'Krishna', 'ramakrishna', NULL, 2, 1, 'ramakrishna.gandikota@pluraltechnology.com', '$2y$10$7xZFe7FPKBvIbTyXQ7G6fupnDTjDjewi7NT5ZeFWgh1id4iy3rTlm', '97faa6e7fb1427a9cb7588d0aee2d63c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '856c8a', NULL, 'resources/assets/user.png', NULL, NULL, 0, NULL, NULL, NULL, 0, '2012-02-12', 0, NULL, NULL, NULL, '2020-02-12 05:53:37', '2020-02-12 05:53:37'),
(17, 'khushboo', 'khushboo', 'vijayvargiya', 'khushboo', NULL, 2, 1, 'khushboovjvrg018@gmail.com', '$2y$10$cAoeg5YxHrksj8AszDeYMeP8zW8Ng7fYZURvCztiopMN4oQxgWhb.', '16005859c3b2bb252e86cc078e1af6c8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6d84d0', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, '2012-02-12', 0, NULL, NULL, NULL, '2020-02-12 06:12:41', '2020-02-12 06:12:41'),
(18, 'srinikaa', 'srinik', 'rao', 'srinikaa', NULL, 2, 1, 'sripathirao.aaluri@gmail.com', '$2y$10$xITVI8RTa9z.GvmfdlBXcu6svhCQCh8tS6v3sJN5THvGRyC./fsZa', '7719c768641380dad837876edddcc1f6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4f6434', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, '2012-02-12', 0, NULL, NULL, NULL, '2020-02-12 06:12:44', '2020-02-12 06:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_measurements`
--

DROP TABLE IF EXISTS `user_measurements`;
CREATE TABLE IF NOT EXISTS `user_measurements` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `m_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_date` date DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measurement_preference` text COLLATE utf8mb4_unicode_ci,
  `user_meas_image` text COLLATE utf8mb4_unicode_ci,
  `hips` float DEFAULT NULL,
  `waist` float DEFAULT NULL,
  `waist_front` float DEFAULT NULL,
  `bust` float DEFAULT NULL,
  `bust_front` float DEFAULT NULL,
  `bust_back` float DEFAULT NULL,
  `waist_to_underarm` float DEFAULT NULL,
  `armhole_depth` float DEFAULT NULL,
  `wrist_circumference` float DEFAULT NULL,
  `forearm_circumference` float DEFAULT NULL,
  `upperarm_circumference` float DEFAULT NULL,
  `shoulder_circumference` float DEFAULT NULL,
  `wrist_to_underarm` float DEFAULT NULL,
  `wrist_to_elbow` float DEFAULT NULL,
  `elbow_to_underarm` float DEFAULT NULL,
  `wrist_to_top_of_shoulder` float DEFAULT NULL,
  `depth_of_neck` float DEFAULT NULL,
  `neck_width` float DEFAULT NULL,
  `neck_circumference` float DEFAULT NULL,
  `neck_to_shoulder` float DEFAULT NULL,
  `shoulder_to_shoulder` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `user_measurements`
--

TRUNCATE TABLE `user_measurements`;
--
-- Dumping data for table `user_measurements`
--

INSERT INTO `user_measurements` (`id`, `user_id`, `m_title`, `m_description`, `m_date`, `first_name`, `last_name`, `email_address`, `measurement_preference`, `user_meas_image`, `hips`, `waist`, `waist_front`, `bust`, `bust_front`, `bust_back`, `waist_to_underarm`, `armhole_depth`, `wrist_circumference`, `forearm_circumference`, `upperarm_circumference`, `shoulder_circumference`, `wrist_to_underarm`, `wrist_to_elbow`, `elbow_to_underarm`, `wrist_to_top_of_shoulder`, `depth_of_neck`, `neck_width`, `neck_circumference`, `neck_to_shoulder`, `shoulder_to_shoulder`, `created_at`, `updated_at`) VALUES
(19, 8, 'Caitlyn', NULL, '2012-01-01', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1580161469Coven Mitt Knitting Pattern 2.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(20, 8, 'Caitlyn', NULL, '2012-01-01', NULL, NULL, NULL, 'centimeters', 'https://via.placeholder.com/200X250', 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2020-01-31 21:06:21'),
(28, 13, 'Usha Sister', NULL, '2020-02-11', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581429459garter_stitch_square.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(29, 14, 'Sample', NULL, '2020-02-11', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581433450heart photo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 17, 'first measurement', NULL, '2020-02-12', NULL, NULL, NULL, 'inches', 'https://via.placeholder.com/150X200', 1, 1.25, 0, 0, 0, 0, 0, 0, 1, 0, 0.75, 1.75, 0.25, 0.75, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(33, 2, 'measurement1', NULL, '2020-02-12', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581492102holi.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `aboutme` longtext COLLATE utf8mb4_unicode_ci,
  `professional_skills` text COLLATE utf8mb4_unicode_ci,
  `relationship` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `privacy` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `As_a_knitter_i_am` text COLLATE utf8mb4_unicode_ci,
  `i_knit_for` text COLLATE utf8mb4_unicode_ci,
  `rate_yourself` text COLLATE utf8mb4_unicode_ci,
  `i_am_here_for` text COLLATE utf8mb4_unicode_ci,
  `ipaddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `user_profile`
--

TRUNCATE TABLE `user_profile`;
--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `aboutme`, `professional_skills`, `relationship`, `address`, `status`, `privacy`, `As_a_knitter_i_am`, `i_knit_for`, `rate_yourself`, `i_am_here_for`, `ipaddress`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 10, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 11, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 12, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 13, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 14, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 15, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 16, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 17, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 18, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `user_role`
--

TRUNCATE TABLE `user_role`;
--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2020-01-02 00:33:46', NULL),
(2, 2, 2, '2020-01-16 09:55:52', NULL),
(3, 3, 2, '2020-01-27 10:23:02', NULL),
(4, 4, 2, '2020-01-27 10:25:24', NULL),
(5, 5, 2, '2020-01-27 10:26:26', NULL),
(6, 6, 2, '2020-01-27 13:21:05', NULL),
(7, 7, 2, '2020-01-27 15:42:21', NULL),
(8, 8, 2, '2020-01-27 20:07:05', NULL),
(9, 9, 2, '2020-02-10 12:52:04', NULL),
(10, 10, 2, '2020-02-10 13:05:18', NULL),
(11, 11, 2, '2020-02-10 13:18:38', NULL),
(12, 12, 2, '2020-02-11 07:36:39', NULL),
(13, 13, 2, '2020-02-11 12:33:49', NULL),
(14, 14, 2, '2020-02-11 12:37:31', NULL),
(15, 15, 2, '2020-02-12 05:47:49', NULL),
(16, 16, 2, '2020-02-12 05:53:37', NULL),
(17, 17, 2, '2020-02-12 06:12:41', NULL),
(18, 18, 2, '2020-02-12 06:12:44', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
