-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2022 at 12:08 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `featureName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `featureName`, `created_at`, `updated_at`) VALUES
(1, 'fet1\r\n', NULL, NULL),
(2, 'fet2\r\n', NULL, NULL);

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
(4, '2022_11_18_135627_create_assets_table', 1),
(5, '2022_11_18_142027_create_data_table', 1),
(6, '2022_11_18_142709_create_types_table', 1),
(7, '2022_11_26_071807_create_vendors_table', 1),
(8, '2022_11_26_072031_create_categories_table', 1),
(9, '2022_11_26_072128_create_products_table', 1),
(10, '2022_11_26_114859_create_features_table', 1),
(11, '2022_12_12_055934_create_user_roles_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `userRole` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  `registrationCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `userRole`, `status`, `url`, `code`, `point`, `registrationCode`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'new', 'new@gmail.com', NULL, NULL, 'Active', '', '1', 0, '', '$2y$10$epvycFsM/T9ye3MjZZ55reIIhDDgknKi4DA2QdbWagXWoikuXAdgi', NULL, NULL, NULL),
(3, 'nipa', 'nipa@gmail.com', NULL, '1', 'Active', '', '2', 0, '', '$2y$10$nx60e25XC2lOp1gSXEZQtuiHEpcbPeCeRUuyvFOPO.P17jaVmRuW2', NULL, '2022-12-12 01:50:21', '2022-12-12 01:50:21'),
(29, 'admin', 'admin@admin.com', NULL, '1', 'Active', '/register?ref=IQQ8107', 'IQQ8107', 5, '0', '$2y$10$fj2P1pgyDEsA3JVX2.Sihe1SRuDs44aGtq4KGZ4iJePG7lD6kbgUi', NULL, '2022-12-13 04:02:34', '2022-12-13 04:15:17'),
(30, 'admin', 'admin1@admin.com', NULL, '3', 'Active', '/register?ref=ZSD3201', 'ZSD3201', 0, '0', '$2y$10$uWycGOSxEl.ocCkza1X3nu66IYmVaLH9TRdB8LTIG.yM5iDEoCVg.', NULL, '2022-12-13 04:07:55', '2022-12-13 04:07:55'),
(31, 'admin', 'admin2@admin.com', NULL, '2', 'Active', '/register?ref=OQG1191', 'OQG1191', 0, '0', '$2y$10$pjmyj6RAJblxAcyVD/I.iOCxsli1WzHtG5d/9NWxkG2YSK8hKmbCK', NULL, '2022-12-13 04:08:52', '2022-12-13 04:08:52'),
(32, 'admin', 'admin3@gmail.com', NULL, '1', 'Active', '/register?ref=8MN3170', '8MN3170', 0, '0', '$2y$10$P7/CTXGt7gPcYozJ0e2XpevpbPS0iTp14gNL1K7i/h3jGYBSiVOmS', NULL, '2022-12-13 04:11:40', '2022-12-13 04:11:40'),
(33, 'admin', 'admin4@admin.com', NULL, '2', 'Active', '/register?ref=IMW3038', 'IMW3038', 0, '0', '$2y$10$l9oAWuxJOtH.43WMQ4jzKOoKtPAZDVQr1doNm64kgxCwT.MxjaKoa', NULL, '2022-12-13 04:13:26', '2022-12-13 04:13:26'),
(34, 'admin', 'admin5@admin.com', NULL, '1', 'Active', '/register?ref=WT36736', 'WT36736', 0, 'IQQ8107', '$2y$10$Alujq2vQeGixgya7yqw2lumBmuvSgRkr7eL1h4WWEfSymSNgdGUTS', NULL, '2022-12-13 04:15:18', '2022-12-13 04:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userFeature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `roleName`, `userFeature`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2,1', '2022-12-12 01:02:38', '2022-12-13 05:52:05'),
(2, 'Affiliations', NULL, '2022-12-12 01:02:50', '2022-12-12 01:03:01'),
(3, 'General User', NULL, '2022-12-12 01:03:24', '2022-12-13 05:51:57');

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
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users` (`code`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
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
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
