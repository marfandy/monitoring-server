-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 12:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4app`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id_address` int(11) UNSIGNED NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `categori` varchar(255) NOT NULL,
  `img_kat` varchar(255) NOT NULL,
  `http` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id_address`, `device_name`, `address`, `slug`, `location`, `categori`, `img_kat`, `http`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Main server', '192.168.1.1', '66efff4c945d3c3b87fc271b47d456db', 'Control room', 'Personal Computer', 'personal-computer.jpg', 'Disconnect', 'Connect', '2020-10-12 22:05:19', '2020-10-12 22:05:19'),
(2, 'PC 1', '192.168.1.2', '8a120ff3e2c86713f4d346d20f763ee7', 'Office room', 'Personal Computer', 'personal-computer.jpg', 'Disconnect', 'Connect', '2020-10-12 22:05:19', '2020-10-12 22:05:19'),
(3, 'PC 2', '36.92.162.55', 'cc9d4028d80b7d9c2242cf5fc8cb25f2', 'Office room', 'Personal Computer', 'personal-computer.jpg', 'Disconnect', 'Connect', '2020-10-12 22:05:19', '2020-10-12 22:05:19'),
(4, 'PC 3', '172.19.6.100', 'da07c7660bbda839a12c23a45e267f5f', 'Office room', 'Personal Computer', 'personal-computer.jpg', 'Disconnect', 'Disconnect', '2020-10-12 22:05:19', '2020-10-12 22:05:19'),
(5, 'PC 4', '36.92.162.56', '2e9e9f7c017ee2a1645a236d182fb28c', 'Office room', 'Personal Computer', 'personal-computer.jpg', 'Disconnect', 'Connect', '2020-10-12 22:05:19', '2020-10-12 22:05:19'),
(6, 'Switch hub', '192.168.1.254', 'f2766cc5195bb0742450a56ccb5eccbe', 'Control room', 'Switch', 'switch.jpg', 'Disconnect', 'Disconnect', '2020-10-12 22:05:19', '2020-10-12 22:05:19'),
(9, 'AIS', 'ais.angkasapura1.co.id', '150532bec2d65b2c9b1fca2a0403edd8', 'SHIAM', 'Website', 'website.jpg', 'Disconnect', 'Connect', '2020-10-12 22:12:01', '2020-10-12 22:12:01'),
(10, 'GTM', 'gtm.angkasapura1.co.id', 'e0968ecc939fc01eae342fb32a22fd4b', 'SHIAM', 'Website', 'website.jpg', 'Disconnect', 'Connect', '2020-10-12 22:12:36', '2020-10-12 22:12:36'),
(11, 'Pc1', '172.19.6.55', '1f676aaf1c404a0e114e41d7a4ca490e', 'Teknik', 'Personal Computer', 'personal-computer.jpg', 'Disconnect', 'Disconnect', '2020-10-21 09:59:06', '2020-10-21 09:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `name`, `img`, `created_at`) VALUES
(1, 'Personal Computer', 'personal-computer.jpg', '2020-10-12 22:03:14'),
(2, 'Switch', 'switch.jpg', '2020-10-12 22:03:14'),
(3, 'Access Point', 'access-point.png', '2020-10-12 22:03:14'),
(4, 'IP Camera', 'ip-camera.jpg', '2020-10-12 22:03:14'),
(5, 'Website', 'website.jpg', '2020-10-12 22:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `log_http`
--

CREATE TABLE `log_http` (
  `id_http` int(11) UNSIGNED NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_http`
--

INSERT INTO `log_http` (`id_http`, `device_name`, `address`, `location`, `status`, `created_at`) VALUES
(1, 'Main server', '192.168.1.1', 'Control room', 'Connect', '2020-10-23 23:13:06'),
(2, 'PC 1', '192.168.1.2', 'Office room', 'Connect', '2020-10-23 23:13:06'),
(3, 'PC 2', '36.92.162.55', 'Office room', 'Connect', '2020-10-23 23:13:06'),
(4, 'PC 3', '172.19.6.100', 'Office room', 'Disconnect', '2020-10-23 23:13:06'),
(5, 'PC 4', '36.92.162.56', 'Office room', 'Connect', '2020-10-23 23:13:06'),
(6, 'Switch hub', '192.168.1.254', 'Control room', 'Connect', '2020-10-23 23:13:06'),
(7, 'AIS', 'ais.angkasapura1.co.id', 'SHIAM', 'Connect', '2020-10-23 23:13:06'),
(8, 'GTM', 'gtm.angkasapura1.co.id', 'SHIAM', 'Connect', '2020-10-23 23:13:06'),
(9, 'Pc1', '172.19.6.55', 'Teknik', 'Disconnect', '2020-10-23 23:13:06'),
(10, 'Pc2', '172.19.6.56', 'Teknik', 'Disconnect', '2020-10-23 23:13:06'),
(11, 'PC 1', '192.168.1.2', 'Office room', 'Disconnect', '2020-10-23 23:14:01'),
(12, 'Switch hub', '192.168.1.254', 'Control room', 'Disconnect', '2020-10-23 23:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `log_status`
--

CREATE TABLE `log_status` (
  `id_status` int(11) UNSIGNED NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_status`
--

INSERT INTO `log_status` (`id_status`, `device_name`, `address`, `location`, `status`, `created_at`) VALUES
(1, 'Main server', '192.168.1.1', 'Control room', 'Disconnect', '2020-10-17 04:44:11'),
(2, 'PC 1', '192.168.1.2', 'Office room', 'Disconnect', '2020-10-17 04:44:11'),
(3, 'PC 2', '36.92.162.55', 'Office room', 'Disconnect', '2020-10-17 04:44:11'),
(4, 'PC 3', '172.19.6.100', 'Office room', 'Disconnect', '2020-10-17 04:44:11'),
(5, 'PC 4', '36.92.162.56', 'Office room', 'Disconnect', '2020-10-17 04:44:11'),
(6, 'Switch hub', '192.168.1.254', 'Control room', 'Disconnect', '2020-10-17 04:44:11'),
(7, 'AIS', 'ais.angkasapura1.co.id', 'SHIAM', 'Disconnect', '2020-10-17 04:44:11'),
(8, 'GTM', 'gtm.angkasapura1.co.id', 'SHIAM', 'Disconnect', '2020-10-17 04:44:11'),
(9, 'Main server', '192.168.1.1', 'Control room', 'Connect', '2020-10-17 04:44:49'),
(10, 'PC 1', '192.168.1.2', 'Office room', 'Connect', '2020-10-17 04:44:49'),
(11, 'PC 2', '36.92.162.55', 'Office room', 'Connect', '2020-10-17 04:44:49'),
(12, 'PC 4', '36.92.162.56', 'Office room', 'Connect', '2020-10-17 04:44:49'),
(13, 'Switch hub', '192.168.1.254', 'Control room', 'Connect', '2020-10-17 04:44:49'),
(14, 'AIS', 'ais.angkasapura1.co.id', 'SHIAM', 'Connect', '2020-10-17 04:44:49'),
(15, 'GTM', 'gtm.angkasapura1.co.id', 'SHIAM', 'Connect', '2020-10-17 04:44:49'),
(16, 'Pc1', '172.19.6.55', 'Teknik', 'Disconnect', '2020-10-23 22:55:53'),
(17, 'Pc2', '172.19.6.56', 'Teknik', 'Disconnect', '2020-10-23 22:55:53'),
(18, 'PC 1', '192.168.1.2', 'Office room', 'Disconnect', '2021-01-27 00:03:07'),
(19, 'PC 1', '192.168.1.2', 'Office room', 'Connect', '2021-03-13 13:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `id_logUser` int(11) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`id_logUser`, `user`, `action`, `activity`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Create host', 'create host Ais - ais.angkasapura1.co.id', '2020-10-12 22:08:58', '2020-10-12 22:08:58'),
(2, 'Super Admin', 'Create host', 'create host GTM - gtm.angkasapura1.co.id', '2020-10-12 22:09:21', '2020-10-12 22:09:21'),
(3, 'Super Admin', 'Delete user', 'delete host Ais - ais.angkasapura1.co.id', '2020-10-12 22:11:23', '2020-10-12 22:11:23'),
(4, 'Super Admin', 'Delete user', 'delete host GTM - gtm.angkasapura1.co.id', '2020-10-12 22:11:28', '2020-10-12 22:11:28'),
(5, 'Super Admin', 'Create host', 'create host AIS - ais.angkasapura1.co.id', '2020-10-12 22:12:01', '2020-10-12 22:12:01'),
(6, 'Super Admin', 'Create host', 'create host GTM - gtm.angkasapura1.co.id', '2020-10-12 22:12:36', '2020-10-12 22:12:36'),
(7, 'Super Admin', 'Create host', 'create host Pc1 - 172.19.6.55', '2020-10-21 09:59:06', '2020-10-21 09:59:06'),
(8, 'Super Admin', 'Create host', 'create host Pc2 - 172.19.6.56', '2020-10-21 09:59:51', '2020-10-21 09:59:51'),
(9, 'Super Admin', 'Delete user', 'delete host Pc2 - 172.19.6.56', '2020-10-24 04:09:48', '2020-10-24 04:09:48'),
(10, 'Fandi ', 'Update user', 'update username root', '2021-03-24 14:45:00', '2021-03-24 14:45:00'),
(11, 'Fandi ', 'Update user', 'update username root', '2021-03-24 14:45:31', '2021-03-24 14:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-09-07-164651', 'App\\Database\\Migrations\\Address', 'default', 'App', 1602511366, 1),
(2, '2020-09-27-204548', 'App\\Database\\Migrations\\Log_user', 'default', 'App', 1602511366, 1),
(3, '2020-09-27-205055', 'App\\Database\\Migrations\\Log_status', 'default', 'App', 1602511366, 1),
(4, '2020-09-27-205850', 'App\\Database\\Migrations\\User', 'default', 'App', 1602511366, 1),
(5, '2020-09-30-214838', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1602511366, 1),
(6, '2020-10-23-150929', 'App\\Database\\Migrations\\Log_http', 'default', 'App', 1603465858, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `last_online` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `username`, `passwd`, `level`, `last_online`, `created_at`, `updated_at`) VALUES
(1, 'Dimas', 'Novergus', 'dimas', '$2y$10$8pvdHiRNjq102qksiSM4y.TUF7u1wIMoetoIKzmyW4p2ZudvMmXme', 'Admin', '2021-02-10 15:22:28', '2020-10-12 22:03:19', '2021-03-24 14:24:50'),
(3, 'User', 'Name', 'user', '$2y$10$3xcjg/.xLUHgro3F2G9MruicFyEtFJki8rfYaLkyAm3b/O.RZx2Hq', 'User', NULL, '2020-10-12 22:03:19', '2021-03-24 14:38:10'),
(4, 'Super', 'Admin', 'root', '$2y$10$9Sw0rkkchFGh3AN9ncE1K.hNSvrvQnesN6/tLZbeQ7DJg0EfpevwS', 'Admin', '2021-06-15 05:30:54', '2021-03-24 14:33:39', '2021-06-15 05:30:54'),
(5, 'Fandi', '', 'fandi', '$2y$10$5.GUt0oleI7OmCjOBIYqsepZskasEUtLULoJaYXqECWbKgT8CHXJO', 'Admin', '2021-03-24 14:44:30', '2021-03-24 14:42:44', '2021-03-24 14:44:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_address`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log_http`
--
ALTER TABLE `log_http`
  ADD PRIMARY KEY (`id_http`);

--
-- Indexes for table `log_status`
--
ALTER TABLE `log_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id_logUser`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id_address` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_http`
--
ALTER TABLE `log_http`
  MODIFY `id_http` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log_status`
--
ALTER TABLE `log_status`
  MODIFY `id_status` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id_logUser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
