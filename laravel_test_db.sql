-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 09:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test_db`
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_02_114532_create_zone_tbls_table', 2),
(6, '2021_10_02_114547_create_region_tbls_table', 2),
(7, '2021_10_02_114606_create_territory_tbls_table', 2),
(9, '2021_10_02_115756_create_product_tbls_table', 3),
(10, '2021_10_03_152301_create_po_tbls_table', 4),
(11, '2021_10_03_152313_create_po_item_tbls_table', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po_item_tbls`
--

CREATE TABLE `po_item_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quntity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remove_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `po_item_tbls`
--

INSERT INTO `po_item_tbls` (`id`, `po_num`, `sku_code`, `sku_name`, `quntity`, `unit_price`, `unit_total_price`, `remove_status`, `created_at`, `updated_at`) VALUES
(1, 'po2', 'AAA 001', 'EFG 200ML', '3', '100.00', '300', '0', NULL, NULL),
(2, 'po3', 'FWC001', 'ABC 100ML', '20', '150.00', '3000', '0', NULL, NULL),
(3, 'po3', 'CBC 001', 'CDE 100ML', '0', '230.00', '0', '0', NULL, NULL),
(4, 'po3', 'AAA 001', 'EFG 200ML', '2', '100.00', '200', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `po_tbls`
--

CREATE TABLE `po_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distributor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `datetime` datetime NOT NULL,
  `created_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remove_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `po_tbls`
--

INSERT INTO `po_tbls` (`id`, `po_num`, `zone`, `region`, `territory`, `distributor`, `remark`, `total_amount`, `datetime`, `created_user_id`, `remove_status`, `created_at`, `updated_at`) VALUES
(1, 'po1', 'Z1', 'R1', 'T1', 'Distributor 5', '', '6300.00', '2021-10-03 16:01:37', '1', '0', NULL, NULL),
(2, 'po2', 'Z1', 'R1', 'T1', 'Distributor 5', '', '6300.00', '2021-10-03 16:02:05', '1', '1', NULL, NULL),
(3, 'po3', 'Z1', 'R1', 'T1', 'Distributor 2', 'test', '3200.00', '2021-10-03 16:03:06', '1', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbls`
--

CREATE TABLE `product_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MRP` decimal(8,2) NOT NULL,
  `distribution_price` decimal(8,2) NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remove_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tbls`
--

INSERT INTO `product_tbls` (`id`, `sku_id`, `sku_code`, `sku_name`, `MRP`, `distribution_price`, `weight`, `volume`, `remove_status`, `created_at`, `updated_at`) VALUES
(1, 'Product1', 'FWC001', 'ABC 100ML', '100.00', '150.00', '50', 'Kg', 0, NULL, NULL),
(2, 'Product2', 'CBC 001', 'CDE 100ML', '200.00', '230.00', '0', 'Kg', 0, NULL, NULL),
(3, 'Product3', 'AAA 001', 'EFG 200ML', '90.00', '100.00', '8', 'Kg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region_tbls`
--

CREATE TABLE `region_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remove_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region_tbls`
--

INSERT INTO `region_tbls` (`id`, `region_code`, `zone`, `region_name`, `remove_status`, `created_at`, `updated_at`) VALUES
(1, 'R1', 'Z1', 'Region 01', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `territory_tbls`
--

CREATE TABLE `territory_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `territory_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remove_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `territory_tbls`
--

INSERT INTO `territory_tbls` (`id`, `territory_code`, `zone`, `region`, `territory_name`, `remove_status`, `created_at`, `updated_at`) VALUES
(1, 'T1', 'Z1', 'R1', 'Territory 01', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Territory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `remove_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `NIC`, `Address`, `Mobile`, `email`, `email_verified_at`, `Gender`, `Territory`, `username`, `password`, `permission`, `remove_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nuwan Athukorala', '961581877V', 'Kelaniya', '0773256692', 'nuwanthikshana@gmail.com', NULL, 'M', 'Territory 1', 'nuwanthikshana@gmail.com', '$2y$10$82.ocAzBcVDW5MD/se0NIuwF5/QI/4kHp0N/O3DzMBtbxjw/DPC1q', 'Admin', '0', NULL, '2021-10-02 02:28:17', '2021-10-02 02:28:17'),
(2, 'test', '961581877X', 'test address', '0112547634', 'test@gmail.com', NULL, 'M', 'Territory 1', 'testuser', '$2y$10$aHJ53S4ogVdxfBVZjAY.MuNivtxR2gLFmfefN4S6n24h4bCwFaO9K', 'default', '0', NULL, '2021-10-03 13:37:39', '2021-10-03 13:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `zone_tbls`
--

CREATE TABLE `zone_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_long_disc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_disc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remove_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zone_tbls`
--

INSERT INTO `zone_tbls` (`id`, `zone_code`, `zone_long_disc`, `short_disc`, `remove_status`, `created_at`, `updated_at`) VALUES
(3, 'Z1', 'Zone 1', 'Z01', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `po_item_tbls`
--
ALTER TABLE `po_item_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_tbls`
--
ALTER TABLE `po_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tbls`
--
ALTER TABLE `product_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region_tbls`
--
ALTER TABLE `region_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `territory_tbls`
--
ALTER TABLE `territory_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nic_unique` (`NIC`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `zone_tbls`
--
ALTER TABLE `zone_tbls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_item_tbls`
--
ALTER TABLE `po_item_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `po_tbls`
--
ALTER TABLE `po_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_tbls`
--
ALTER TABLE `product_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `region_tbls`
--
ALTER TABLE `region_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `territory_tbls`
--
ALTER TABLE `territory_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zone_tbls`
--
ALTER TABLE `zone_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
