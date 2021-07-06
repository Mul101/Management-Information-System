-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 12:47 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkc`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `hrg_tot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `tgl_beli`, `nama_bahan`, `jml_beli`, `hrg_tot`) VALUES
(2, '2021-06-01', 'Coklat Bubuk', 3, 300000),
(3, '2021-06-01', 'Susu Full Cream', 1, 125000),
(4, '2021-01-01', 'Coklat Bubuk', 2, 200000),
(5, '2021-01-01', 'Susu Full Cream', 3, 375000),
(6, '2021-01-01', 'Red Velvet Bubuk', 1, 60000),
(7, '2021-01-01', 'Kopi Arabika', 3, 600000),
(11, '2021-01-01', 'Matcha Bubuk', 2, 65000),
(12, '2021-01-01', 'Oreo', 1, 150000),
(13, '2021-02-01', 'Coklat Bubuk', 1, 100000),
(14, '2021-02-01', 'Susu Full Cream', 1, 125000),
(15, '2021-03-01', 'Red Velvet Bubuk', 1, 60000),
(16, '2021-03-01', 'Matcha Bubuk', 1, 65000),
(17, '2021-03-01', 'Kopi Arabika', 4, 800000),
(18, '2021-03-01', 'Susu Full Cream', 4, 500000),
(19, '2021-04-01', 'Oreo', 3, 450000),
(20, '2021-04-01', 'Kopi Arabika', 1, 200000),
(21, '2021-04-01', 'Coklat Bubuk', 1, 100000),
(22, '2021-05-01', 'Kopi Arabika', 2, 400000),
(23, '2021-05-01', 'Susu Full Cream', 2, 250000),
(24, '2021-05-01', 'Red Velvet Bubuk', 1, 60000),
(25, '2021-06-01', 'Matcha Bubuk', 1, 65000),
(26, '2021-06-01', 'Coklat Bubuk', 1, 100000),
(27, '2021-06-01', 'Kopi Arabika', 3, 600000),
(28, '2021-06-01', 'Susu Full Cream', 1, 125000),
(29, '2021-02-01', 'Oreo', 1, 150000),
(30, '2021-02-01', 'Oreo', 1, 150000),
(31, '2021-06-08', 'Susu Bubuk', 1, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tgl_jual` date NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `jml_penjualan` int(11) NOT NULL,
  `hrg_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tgl_jual`, `nama_jenis`, `jml_penjualan`, `hrg_jual`) VALUES
(1, '2021-03-16', 'Matcha Latte', 3, 27000),
(2, '2021-01-07', 'Oreo Latte', 3, 27000),
(3, '2021-01-08', 'Americano', 6, 22000),
(4, '2021-01-09', 'Espresso', 1, 18000),
(5, '2021-01-10', 'Matcha Latte', 2, 27000),
(6, '2021-01-12', 'Matcha Latte', 1, 27000),
(7, '2021-01-12', 'Espresso', 3, 18000),
(8, '2021-01-15', 'Vanilla Latte', 4, 25000),
(9, '2021-01-15', 'Vanilla Latte', 4, 25000),
(10, '2021-01-18', 'Espresso', 3, 18000),
(11, '2021-02-19', 'Americano', 6, 22000),
(12, '2021-02-21', 'Americano', 6, 22000),
(13, '2021-02-02', 'Red Velvet', 1, 23000),
(14, '2021-02-03', 'Americano', 3, 22000),
(15, '2021-02-04', 'Americano', 1, 22000),
(16, '2021-02-05', 'Matcha Latte', 2, 27000),
(17, '2021-02-06', 'Matcha Latte', 2, 27000),
(18, '2021-01-06', 'Matcha Latte', 3, 27000),
(19, '2021-01-07', 'Americano', 2, 22000),
(20, '2021-02-12', 'Americano', 2, 22000),
(21, '2021-02-02', 'Americano', 2, 22000),
(22, '2021-02-15', 'Oreo Latte', 2, 24000),
(23, '2021-03-02', 'Matcha Latte', 5, 27000),
(24, '2021-03-04', 'Matcha Latte', 5, 27000),
(25, '2021-03-05', 'Matcha Latte', 2, 27000),
(26, '2021-03-03', 'Americano', 1, 22000),
(27, '2021-03-06', 'Americano', 1, 22000),
(28, '2021-03-10', 'Americano', 1, 22000),
(29, '2021-03-11', 'Americano', 3, 22000),
(30, '2021-03-10', 'Oreo Latte', 4, 24000),
(31, '2021-03-15', 'Oreo Latte', 4, 24000),
(32, '2021-03-16', 'Oreo Latte', 4, 24000),
(33, '2021-03-17', 'Oreo Latte', 5, 24000),
(34, '2021-03-18', 'Oreo Latte', 2, 24000),
(35, '2021-03-19', 'Oreo Latte', 2, 24000),
(36, '2021-03-17', 'Vanilla Latte', 3, 25000),
(37, '2021-03-21', 'Vanilla Latte', 3, 25000),
(38, '2021-03-22', 'Vanilla Latte', 3, 25000),
(39, '2021-03-23', 'Vanilla Latte', 4, 25000),
(40, '2021-03-25', 'Vanilla Latte', 1, 25000),
(41, '2021-03-10', 'Oreo Latte', 3, 24000),
(42, '2021-03-10', 'Oreo Latte', 6, 24000),
(43, '2021-04-01', 'Vanilla Latte', 20, 25000),
(44, '2021-04-01', 'Red Velvet', 6, 23000),
(45, '2021-04-01', 'Americano', 15, 22000),
(46, '2021-04-01', 'Espresso', 7, 18000),
(47, '2021-04-02', 'Americano', 10, 22000),
(48, '2021-04-02', 'Oreo Latte', 16, 24000),
(49, '2021-04-02', 'Espresso', 9, 18000),
(50, '2021-04-03', 'Red Velvet', 5, 23000),
(51, '2021-05-03', 'Vanilla Latte', 20, 25000),
(52, '2021-05-03', 'Espresso', 30, 18000),
(53, '2021-05-03', 'Oreo Latte', 8, 27000),
(54, '2021-05-14', 'Espresso', 20, 18000),
(55, '2021-05-14', 'Americano', 11, 22000),
(56, '2021-05-14', 'Red Velvet', 6, 23000),
(57, '2021-05-22', 'Espresso', 18, 18000),
(58, '2021-05-22', 'Americano', 22, 22000),
(59, '2021-05-22', 'Vanilla Latte', 15, 25000),
(60, '2021-05-22', 'Matcha Latte', 3, 27000),
(61, '2021-06-06', 'Espresso', 50, 18000),
(62, '2021-06-06', 'Oreo Latte', 4, 27000),
(63, '2021-06-06', 'Red Velvet', 16, 23000),
(64, '2021-06-06', 'Vanilla Latte', 6, 25000),
(65, '2021-06-18', 'Espresso', 10, 18000),
(66, '2021-06-18', 'Americano', 30, 22000),
(67, '2021-07-18', 'Matcha Latte', 4, 27000),
(68, '2021-06-18', 'Oreo Latte', 3, 27000),
(69, '2021-06-23', 'Americano', 5, 22000),
(70, '2021-06-23', 'Vanilla Latte', 10, 27000),
(71, '2021-02-09', 'Matcha Latte', 5, 27000),
(72, '2021-02-17', 'Oreo Latte', 7, 24000),
(73, '2021-03-08', 'Matcha Latte', 3, 27000),
(74, '2021-02-02', 'Matcha Latte', 2, 27000),
(75, '2021-02-13', 'Oreo Latte', 2, 24000),
(76, '2021-02-06', 'Oreo Latte', 3, 24000),
(77, '2021-07-05', 'Matcha Latte', 3, 27000),
(78, '2021-07-05', 'Oreo Latte', 3, 24000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'budisetia@gmail.com', 'budi123', NULL, '$2y$10$pO4GvCyjo8t0ocI6sksskeUc2sUcW8oYKuYHs8uFSDT6cUISdYJq6', NULL, '2021-06-29 04:17:15', '2021-06-29 04:17:15'),
(2, 'mulia_dea@gmail.com', 'mulia123', NULL, '$2y$10$TSd/euYDtJJLP2D.3v1bme57j72WqNhPDhb/BapMz7RNG4vb0Xz2O', NULL, '2021-06-29 04:18:40', '2021-06-29 04:18:40'),
(3, 'fita_maulani@gmail.com', 'fita123', NULL, '$2y$10$Qr8r3OzX3GFqkIxE2dnh7eL5eRbe5YUNxx16vIWOdgCIbetrl03vG', NULL, '2021-06-29 04:20:00', '2021-06-29 04:20:00'),
(4, 'ratu_fairuz@gmail.com', 'ratu123', NULL, '$2y$10$2WEa73bYiwekLscHPkar7OZPr5t.xL1dytlC6.gDoPMV12qG1HVFO', NULL, '2021-06-29 04:20:34', '2021-06-29 04:20:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
