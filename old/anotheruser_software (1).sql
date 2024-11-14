-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2024 at 09:28 AM
-- Server version: 10.6.19-MariaDB-log
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anotheruser_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'zahid.hasan6@gmail.com', '$2y$10$wiCd0WcDg3SlXEdSXPo7i.joTaCtQoIbkGC/NRJnZmR96rK7vhw8m', 'JLYEs1h27zdPjZ3JNe8YhfG7B59jsDtT4cqfPpnXAFlDslm2pmYaoAAb003r', '2020-12-27 01:58:44', '2020-12-27 02:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Rice', '2024-10-06 03:19:38', '2024-10-06 03:19:38'),
(2, 'Mastered Oil', '2024-10-06 03:19:45', '2024-10-06 03:20:21'),
(5, 'Dal', '2024-10-06 03:52:55', '2024-10-25 02:56:41'),
(8, 'Oil', '2024-10-07 00:46:50', '2024-10-07 00:46:50'),
(9, 'Suger', '2024-10-23 21:44:37', '2024-10-23 21:44:37'),
(12, 'Atta', '2024-10-24 08:24:47', '2024-10-24 08:24:47'),
(13, 'Salt', '2024-10-24 08:30:34', '2024-10-24 08:30:34'),
(14, 'water', '2024-10-24 08:42:20', '2024-10-24 08:42:20'),
(15, 'Detergent', '2024-10-24 21:24:35', '2024-10-24 21:24:35'),
(16, 'Mouth wash', '2024-10-24 21:26:10', '2024-10-24 21:26:10'),
(17, 'Paper nakin', '2024-10-24 21:26:33', '2024-10-24 21:26:33'),
(18, 'Suji', '2024-10-24 22:43:01', '2024-10-24 22:43:01'),
(19, 'Tea', '2024-10-25 02:01:33', '2024-10-25 02:01:33'),
(20, 'Onion', '2024-10-25 08:35:18', '2024-10-25 08:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `companystocks`
--

CREATE TABLE `companystocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouseId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companystocks`
--

INSERT INTO `companystocks` (`id`, `warehouseId`, `productId`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 15, '2024-10-08 03:56:00', '2024-10-09 00:23:12'),
(2, 3, 1, 5, '2024-10-08 03:56:00', '2024-10-08 22:17:33'),
(3, 4, 1, 0, '2024-10-08 03:56:00', '2024-10-08 03:56:00'),
(4, 5, 1, 0, '2024-10-08 03:56:00', '2024-10-08 03:56:00'),
(5, 6, 1, 0, '2024-10-08 03:56:00', '2024-10-08 03:56:00'),
(11, 1, 3, 10, '2024-10-08 04:35:46', '2024-10-08 21:23:34'),
(12, 3, 3, 0, '2024-10-08 04:35:46', '2024-10-08 04:35:46'),
(13, 4, 3, 0, '2024-10-08 04:35:46', '2024-10-08 04:35:46'),
(14, 5, 3, 0, '2024-10-08 04:35:46', '2024-10-08 04:35:46'),
(15, 6, 3, 0, '2024-10-08 04:35:46', '2024-10-08 04:35:46'),
(21, 1, 5, 0, '2024-10-22 21:34:53', '2024-10-22 21:34:53'),
(22, 3, 5, 0, '2024-10-22 21:34:53', '2024-10-22 21:34:53'),
(23, 4, 5, 0, '2024-10-22 21:34:53', '2024-10-22 21:34:53'),
(24, 5, 5, 0, '2024-10-22 21:34:53', '2024-10-22 21:34:53'),
(25, 6, 5, 0, '2024-10-22 21:34:53', '2024-10-22 21:34:53'),
(26, 7, 5, 45, '2024-10-22 21:34:53', '2024-10-22 21:35:59'),
(27, 1, 6, 0, '2024-10-22 23:49:32', '2024-10-22 23:49:32'),
(28, 3, 6, 0, '2024-10-22 23:49:32', '2024-10-22 23:49:32'),
(29, 4, 6, 0, '2024-10-22 23:49:32', '2024-10-22 23:49:32'),
(30, 5, 6, 20, '2024-10-22 23:49:32', '2024-10-23 21:45:20'),
(31, 6, 6, 0, '2024-10-22 23:49:32', '2024-10-22 23:49:32'),
(32, 7, 6, 80, '2024-10-22 23:49:32', '2024-10-22 23:50:03'),
(33, 1, 7, 0, '2024-10-24 02:39:59', '2024-10-24 02:39:59'),
(34, 3, 7, 20, '2024-10-24 02:40:00', '2024-10-24 02:41:24'),
(35, 4, 7, 0, '2024-10-24 02:40:00', '2024-10-24 02:40:00'),
(36, 5, 7, 10, '2024-10-24 02:40:00', '2024-10-24 02:40:00'),
(37, 7, 7, 0, '2024-10-24 02:40:00', '2024-10-24 02:40:00'),
(38, 8, 7, 40, '2024-10-24 02:40:00', '2024-10-24 02:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `company_products`
--

CREATE TABLE `company_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `categoryId` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `photo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_products`
--

INSERT INTO `company_products` (`id`, `name`, `categoryId`, `price`, `unit`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Rice', 1, 12, 'KG', '1728384577.png', '2024-10-08 03:56:00', '2024-10-08 04:49:37'),
(3, '123213', 1, 123, 'Piece', '1728384588.png', '2024-10-08 04:35:46', '2024-10-08 04:49:48'),
(5, 'gazi tier', 1, 123, 'Piece', '1729654493.png', '2024-10-22 21:34:53', '2024-10-22 21:34:53'),
(6, 'Balv', 1, 1200, 'Litter', '1729662572.jpg', '2024-10-22 23:49:32', '2024-10-22 23:49:32'),
(7, 'Minicate Rice', 1, 1950, 'Bag', '1729759199.jpg', '2024-10-24 02:39:59', '2024-10-24 02:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_28_093441_create_registrations_table', 2),
(5, '2020_12_28_093442_create_registrations_table', 3),
(6, '2021_01_02_081237_create_admins_table', 4),
(7, '2021_01_06_054941_create_notices_table', 5),
(8, '2021_01_20_105736_create_subscriptions_table', 6),
(9, '2021_01_21_074617_create_subscription_feesses_table', 7),
(10, '2021_02_08_062724_create_seminars_table', 8),
(11, '2021_02_16_081256_create_seminar_fees_table', 9),
(12, '2024_10_06_035918_create_warehouses_table', 10),
(13, '2024_10_06_072318_add_soft_deletes_to_warehouses_table', 11),
(14, '2024_10_06_074629_create_units_table', 12),
(15, '2024_10_06_081841_create_purchasecompanies_table', 13),
(16, '2024_10_06_091014_create_categories_table', 14),
(17, '2024_10_07_065412_create_stock_ins_table', 15),
(18, '2024_10_07_071311_create_products_table', 16),
(19, '2024_10_08_092019_create_companystocks_table', 17),
(20, '2024_10_08_093443_create_company_products_table', 18),
(21, '2024_10_14_032925_create_s_r_s_table', 19),
(22, '2024_10_14_065308_create_sr_shops_table', 19),
(23, '2024_10_16_052152_create_orders_table', 20),
(24, '2024_10_16_061409_create_orders_table', 21),
(25, '2024_10_20_051951_create_payments_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `final_total` decimal(8,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shop_id`, `total_amount`, `discount`, `final_total`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 7, 201040.00, 0.00, 201040.00, 'pending', '2024-10-26 00:34:26', '2024-10-26 00:34:26'),
(2, 5, 7, 7307.00, 0.00, 7307.00, 'pending', '2024-10-26 01:27:20', '2024-10-26 01:27:20'),
(3, 5, 7, 34320.00, 20.00, 34300.00, 'pending', '2024-10-26 06:18:29', '2024-10-26 06:18:29'),
(4, 5, 8, 41195.00, 95.00, 41100.00, 'pending', '2024-10-26 06:28:09', '2024-10-26 06:28:09'),
(5, 5, 7, 19264.00, 0.00, 19264.00, 'pending', '2024-10-26 21:09:48', '2024-10-26 21:09:48'),
(6, 5, 7, 630.00, 0.00, 630.00, 'pending', '2024-10-26 21:11:43', '2024-10-26 21:11:43'),
(7, 10, 5, 50.00, 0.00, 50.00, 'pending', '2024-10-26 21:25:36', '2024-10-26 21:25:36'),
(8, 10, 5, 122.00, 0.00, 122.00, 'pending', '2024-10-26 21:26:23', '2024-10-26 21:26:23'),
(9, 10, 5, 50.00, 0.00, 50.00, 'pending', '2024-10-26 21:27:58', '2024-10-26 21:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 120.00, 14, 1680.00, '2024-10-16 22:04:55', '2024-10-16 22:04:55'),
(2, 2, 7, 120.00, 1, 120.00, '2024-10-16 22:05:49', '2024-10-16 22:05:49'),
(3, 2, 3, 123.00, 19, 2337.00, '2024-10-16 22:05:49', '2024-10-16 22:05:49'),
(4, 3, 3, 123.00, 1, 123.00, '2024-10-19 21:12:32', '2024-10-19 21:12:32'),
(5, 3, 8, 12.00, 2, 24.00, '2024-10-19 21:12:32', '2024-10-19 21:12:32'),
(6, 3, 9, 12.00, 3, 36.00, '2024-10-19 21:12:32', '2024-10-19 21:12:32'),
(7, 4, 8, 12.00, 3, 36.00, '2024-10-22 05:01:57', '2024-10-22 05:01:57'),
(8, 5, 9, 12.00, 4, 48.00, '2024-10-23 21:54:49', '2024-10-23 21:54:49'),
(9, 5, 2, 123.00, 5, 615.00, '2024-10-23 21:54:49', '2024-10-23 21:54:49'),
(10, 6, 10, 300.00, 10, 3000.00, '2024-10-24 02:51:01', '2024-10-24 02:51:01'),
(11, 6, 2, 123.00, 5, 615.00, '2024-10-24 02:51:01', '2024-10-24 02:51:01'),
(12, 7, 11, 1570.00, 25, 39250.00, '2024-10-24 07:58:39', '2024-10-24 07:58:39'),
(13, 8, 22, 174.00, 185, 32190.00, '2024-10-24 22:57:25', '2024-10-24 22:57:25'),
(14, 8, 26, 1800.00, 10, 18000.00, '2024-10-24 22:57:25', '2024-10-24 22:57:25'),
(15, 8, 16, 2550.00, 10, 25500.00, '2024-10-24 22:57:25', '2024-10-24 22:57:25'),
(16, 9, 22, 174.00, 185, 32190.00, '2024-10-24 22:57:58', '2024-10-24 22:57:58'),
(17, 9, 26, 1800.00, 10, 18000.00, '2024-10-24 22:57:58', '2024-10-24 22:57:58'),
(18, 10, 58, 125.00, 123, 15375.00, '2024-10-25 08:51:24', '2024-10-25 08:51:24'),
(19, 1, 18, 6250.00, 32, 200000.00, '2024-10-26 00:34:26', '2024-10-26 00:34:26'),
(20, 1, 53, 520.00, 2, 1040.00, '2024-10-26 00:34:26', '2024-10-26 00:34:26'),
(21, 2, 16, 2550.00, 2, 5100.00, '2024-10-26 01:27:20', '2024-10-26 01:27:20'),
(22, 2, 17, 9.00, 3, 27.00, '2024-10-26 01:27:20', '2024-10-26 01:27:20'),
(23, 2, 15, 520.00, 2, 1040.00, '2024-10-26 01:27:20', '2024-10-26 01:27:20'),
(24, 3, 25, 72.00, 5, 360.00, '2024-10-26 06:18:29', '2024-10-26 06:18:29'),
(25, 3, 51, 342.00, 5, 1710.00, '2024-10-26 06:18:29', '2024-10-26 06:18:29'),
(26, 3, 18, 6250.00, 5, 31250.00, '2024-10-26 06:18:29', '2024-10-26 06:18:29'),
(27, 3, 48, 100.00, 10, 1000.00, '2024-10-26 06:18:29', '2024-10-26 06:18:29'),
(28, 4, 19, 6250.00, 5, 31250.00, '2024-10-26 06:28:09', '2024-10-26 06:28:09'),
(29, 4, 13, 1980.00, 5, 9900.00, '2024-10-26 06:28:09', '2024-10-26 06:28:09'),
(30, 4, 46, 9.00, 5, 45.00, '2024-10-26 06:28:09', '2024-10-26 06:28:09'),
(31, 5, 29, 153.00, 2, 306.00, '2024-10-26 21:09:48', '2024-10-26 21:09:48'),
(32, 5, 26, 1800.00, 3, 5400.00, '2024-10-26 21:09:48', '2024-10-26 21:09:48'),
(33, 5, 19, 6250.00, 2, 12500.00, '2024-10-26 21:09:48', '2024-10-26 21:09:48'),
(34, 5, 53, 520.00, 2, 1040.00, '2024-10-26 21:09:48', '2024-10-26 21:09:48'),
(35, 5, 17, 9.00, 2, 18.00, '2024-10-26 21:09:48', '2024-10-26 21:09:48'),
(36, 6, 54, 190.00, 2, 380.00, '2024-10-26 21:11:43', '2024-10-26 21:11:43'),
(37, 6, 58, 125.00, 2, 250.00, '2024-10-26 21:11:43', '2024-10-26 21:11:43'),
(38, 7, 47, 50.00, 1, 50.00, '2024-10-26 21:25:36', '2024-10-26 21:25:36'),
(39, 8, 25, 72.00, 1, 72.00, '2024-10-26 21:26:23', '2024-10-26 21:26:23'),
(40, 8, 47, 50.00, 1, 50.00, '2024-10-26 21:26:23', '2024-10-26 21:26:23'),
(41, 9, 47, 50.00, 1, 50.00, '2024-10-26 21:27:58', '2024-10-26 21:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `otpresets`
--

CREATE TABLE `otpresets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_date` text NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `unit` text NOT NULL,
  `photo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryId`, `name`, `price`, `unit`, `photo`, `created_at`, `updated_at`) VALUES
(11, 1, 'কাঁঠাল মার্কা হাস্কি চাল ২৫ কেজি', 1570, 'Bag', '1729947915.png', '2024-10-24 07:36:25', '2024-10-26 07:05:15'),
(12, 1, 'হেলথ কেয়ার ফুল সিদ্ধ ২৮  চাল', 1520, 'Bag', '1729947927.png', '2024-10-24 08:21:36', '2024-10-26 07:05:27'),
(13, 12, 'হেলথ কেয়ার আটা ৫০ কজি', 1980, 'Bag', '1729947980.png', '2024-10-24 08:27:53', '2024-10-26 07:06:20'),
(14, 13, 'যমুনা মোটা লবণ ২৫ কজি', 520, 'Bag', '1729947994.png', '2024-10-24 08:36:58', '2024-10-26 07:06:34'),
(15, 13, 'মোটা লবণ ৫০ কেজি', 520, 'Bag', '1729948010.png', '2024-10-24 08:38:43', '2024-10-26 07:06:50'),
(16, 5, 'হেলথ কেয়ার মুসুরি ডাল ২৫ কেজি', 2550, 'Bag', '1729948240.jpg', '2024-10-24 08:40:45', '2024-10-26 07:10:40'),
(17, 14, 'হেলথ কেয়ার পানি ৫০০ মিলিঃ', 9, 'Piece', '1729948225.jpg', '2024-10-24 08:44:19', '2024-10-26 07:10:25'),
(18, 9, 'তীর চিনি ৫০ কেজি', 6250, 'Bag', '1729948077.png', '2024-10-24 08:48:13', '2024-10-26 07:07:57'),
(19, 9, 'ফ্রেশ চিনি ৫০ কেজি', 6250, 'Bag', '1729948089.png', '2024-10-24 08:50:39', '2024-10-26 07:08:09'),
(20, 1, 'এরফান চিনিগুড়া চাল ২৫ কেজি', 3120, 'Bag', '1729948109.png', '2024-10-24 08:54:42', '2024-10-26 07:08:29'),
(21, 1, 'এরফান চিনিগুড়া চাল ১ কেজি', 145, 'Piece', '1729948285.png', '2024-10-24 08:55:54', '2024-10-26 07:11:25'),
(22, 8, 'সিটি সইয়াবিন লুজ প্রতি কেজি', 174, 'KG', '1729948300.png', '2024-10-24 20:57:53', '2024-10-26 07:11:40'),
(23, 8, 'সিটি সুপার লুজ প্রতি কেজি', 167, 'KG', '1729948314.png', '2024-10-24 21:00:05', '2024-10-26 07:11:54'),
(24, 8, 'সিটি পাম লুজ প্রতি কেজি', 165, 'KG', '1729948326.png', '2024-10-24 21:03:37', '2024-10-26 07:12:06'),
(25, 5, 'ডাবরি ডাল প্রতি কেজি', 72, 'KG', '1729948481.jpg', '2024-10-24 21:07:42', '2024-10-26 07:14:41'),
(26, 1, 'এরফান মিনিকেট চাল ২৫ কেজি', 1800, 'Bag', '1729948354.png', '2024-10-24 21:14:51', '2024-10-26 07:12:34'),
(27, 1, 'ফ্রেশ কাটারি নাজির ২৫ কেজি', 2100, 'Bag', '1729948379.png', '2024-10-24 21:16:23', '2024-10-26 07:12:59'),
(28, 13, 'মুস্কান চিকন লবণ', 880, 'Bag', '1729948416.png', '2024-10-24 21:20:10', '2024-10-26 07:13:36'),
(29, 15, 'রিন ডিটারজেন্ট ১০০০ গ্রাম', 153, 'Piece', '1729948530.jpg', '2024-10-24 21:23:32', '2024-10-26 07:15:30'),
(30, 15, 'রিন ডিটারজেন্ট ৫০০ গ্রাম', 77, 'Piece', '1729948550.jpg', '2024-10-24 21:28:31', '2024-10-26 07:15:50'),
(31, 15, 'হুইল ডিটারজেন্ট ১০০০ গ্রাম', 120, 'Piece', '1729948599.jpg', '2024-10-24 21:31:25', '2024-10-26 07:16:39'),
(32, 15, 'হুইল ডিটারজেন্ট ৫০০ গ্রাম', 64, 'Piece', '1729948633.jpg', '2024-10-24 21:32:51', '2024-10-26 07:17:13'),
(33, 15, 'সার্ফ এক্সেল ৫০০ গ্রাম', 108, 'Piece', '1729948647.jpg', '2024-10-24 21:49:48', '2024-10-26 07:17:27'),
(34, 15, 'ফাস্ট ওয়াস ডিটারজেন্ট ১০০০ গ্রাম', 150, 'Piece', '1729828530.png', '2024-10-24 21:55:30', '2024-10-24 21:55:30'),
(35, 15, 'ফাস্ট ওয়াস ডিটারজেন্ট ৫০০ গ্রাম', 70, 'Piece', '1729828626.png', '2024-10-24 21:57:06', '2024-10-24 21:57:06'),
(36, 16, 'মেডিপ্লাস ডিএস ১৫০ গ্রাম', 120, 'Piece', '1729828804.png', '2024-10-24 22:00:04', '2024-10-24 22:00:04'),
(37, 16, 'মেডিপ্লাস ডিএস ৯০ গ্রাম', 90, 'Piece', '1729828916.png', '2024-10-24 22:01:56', '2024-10-24 22:01:56'),
(38, 16, 'ক্লোজ আপ ১৫০ গ্রাম', 130, 'Piece', '1729829197.png', '2024-10-24 22:06:37', '2024-10-24 22:06:37'),
(39, 16, 'ক্লোজ আপ ১০০ গ্রাম', 90, 'Piece', '1729829309.png', '2024-10-24 22:08:29', '2024-10-24 22:08:29'),
(40, 16, 'ক্লোজ আপ ৫০ গ্রাম', 45, 'Piece', '1729829571.png', '2024-10-24 22:12:51', '2024-10-24 22:12:51'),
(41, 16, 'পেপসোডেন্ট ১৫০ গ্রাম', 130, 'Piece', '1729829702.png', '2024-10-24 22:15:02', '2024-10-24 22:15:02'),
(42, 16, 'পেপসোডেন্ট ১০০ গ্রাম', 90, 'Piece', '1729829757.png', '2024-10-24 22:15:57', '2024-10-24 22:15:57'),
(43, 16, 'পেপসোডেন্ট ৫০ গ্রাম', 45, 'Piece', '1729829817.png', '2024-10-24 22:16:57', '2024-10-24 22:16:57'),
(44, 17, 'বসুন্ধরা সেলুন টিস্যু', 50, 'Piece', '1729830013.png', '2024-10-24 22:20:13', '2024-10-24 22:20:13'),
(45, 17, 'বসুন্ধরা বক্স টিস্যু', 57, 'Piece', '1729830092.png', '2024-10-24 22:21:32', '2024-10-24 22:21:32'),
(46, 17, 'বসুন্ধরা পকেট টিস্যু', 9, 'Piece', '1729830175.png', '2024-10-24 22:22:55', '2024-10-24 22:22:55'),
(47, 12, 'তীর আটা ১ কেজি', 50, 'Piece', '1729948795.png', '2024-10-24 22:27:29', '2024-10-26 07:19:55'),
(48, 12, 'তীর আটা ২ কেজি', 100, 'Piece', '1729948808.png', '2024-10-24 22:28:20', '2024-10-26 07:20:08'),
(49, 12, 'তীর আটা ৫ কেজি', 245, 'Piece', '1729948819.png', '2024-10-24 22:30:39', '2024-10-26 07:20:19'),
(50, 8, 'তীর সয়াবিন ১ লিটার', 172, 'Piece', '1729948842.png', '2024-10-24 22:35:09', '2024-10-26 07:20:42'),
(51, 8, 'তীর সয়াবিন ২ লিটার', 342, 'Piece', '1729948966.png', '2024-10-24 22:36:20', '2024-10-26 07:22:46'),
(52, 8, 'তীর সয়াবিন ৫ লিটার', 838, 'Piece', '1729948979.png', '2024-10-24 22:38:05', '2024-10-26 07:22:59'),
(53, 18, 'তীর সুজি প্রতি ডজন', 520, 'Bag', '1729831348.png', '2024-10-24 22:42:28', '2024-10-24 22:43:44'),
(54, 19, 'ফ্রেশ চা পাতা ৫০০ গ্রাম', 190, 'Piece', '1729843389.png', '2024-10-25 02:03:09', '2024-10-25 02:03:09'),
(55, 8, 'রূপচাঁদা সয়াবিন ১ লিটার', 172, 'Piece', '1729948943.png', '2024-10-25 02:05:16', '2024-10-26 07:22:23'),
(56, 8, 'রূপচাঁদা সয়াবিন ২ লিটার', 342, 'Piece', '1729948930.png', '2024-10-25 02:06:26', '2024-10-26 07:22:10'),
(57, 8, 'রূপচাঁদা সয়াবিন ৫ লিটার', 818, 'Piece', '1729948919.png', '2024-10-25 02:07:31', '2024-10-26 07:21:59'),
(58, 20, 'দেশীয় পিয়াজ মানিকগঞ্জ', 125, 'KG', '1729866853.png', '2024-10-25 08:34:13', '2024-10-25 08:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `purchasecompanies`
--

CREATE TABLE `purchasecompanies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasecompanies`
--

INSERT INTO `purchasecompanies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Basundhara', '2024-10-06 02:33:02', '2024-10-06 02:33:02'),
(3, 'Pran Group', '2024-10-06 02:33:51', '2024-10-06 02:33:51'),
(4, 'Akiz', '2024-10-06 02:35:12', '2024-10-06 02:35:12'),
(5, 'Meghna', '2024-10-06 02:35:19', '2024-10-06 02:35:19'),
(7, 'GAZI', '2024-10-22 21:33:27', '2024-10-22 21:33:27'),
(8, 'BLOG POST TITLE2', '2024-10-24 02:32:45', '2024-10-24 02:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `sr_shops`
--

CREATE TABLE `sr_shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shopName` varchar(255) NOT NULL,
  `ownerName` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Adress` varchar(255) NOT NULL,
  `srId` int(11) NOT NULL,
  `warehouseId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sr_shops`
--

INSERT INTO `sr_shops` (`id`, `shopName`, `ownerName`, `Mobile`, `Adress`, `srId`, `warehouseId`, `created_at`, `updated_at`) VALUES
(5, 'Bola Store', 'Bolanath', '01298745874', 'Mohammad pur ,Babor road 13c/3c', 10, 3, '2024-10-23 21:54:20', '2024-10-23 21:54:20'),
(7, 'আসরাফুল রিপন ষ্টোর', 'মোঃ সবেদ হোসেন', '01840048662', 'দক্ষিণ জামসা বাজার', 5, 3, '2024-10-25 02:40:52', '2024-10-25 02:40:52'),
(8, 'ওহাব এন্টারপ্রাইজ', 'আব্দুল ওহাব', '018 1919 5516', 'বাংলা বাজার,নবাবগজ্ঞ,', 5, 3, '2024-10-25 02:46:25', '2024-10-25 02:46:25'),
(9, 'জসিম স্টোর', 'মোঃ জসিম', '01725501757', 'আদাবর ঢাকা', 5, 3, '2024-10-25 08:41:46', '2024-10-25 08:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `stock_ins`
--

CREATE TABLE `stock_ins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouseId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_ins`
--

INSERT INTO `stock_ins` (`id`, `warehouseId`, `productId`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 10, 5, 12, '2024-10-07 22:11:50', '2024-10-07 22:11:50'),
(21, 3, 11, 400, '2024-10-24 07:36:25', '2024-10-24 08:58:33'),
(22, 10, 11, 400, '2024-10-24 07:36:25', '2024-10-24 07:36:25'),
(23, 3, 12, 400, '2024-10-24 08:21:36', '2024-10-24 08:21:36'),
(24, 10, 12, 400, '2024-10-24 08:21:36', '2024-10-24 08:21:36'),
(25, 3, 13, 395, '2024-10-24 08:27:53', '2024-10-26 06:28:09'),
(26, 10, 13, 400, '2024-10-24 08:27:53', '2024-10-24 08:27:53'),
(27, 3, 14, 400, '2024-10-24 08:36:58', '2024-10-24 08:36:58'),
(28, 10, 14, 400, '2024-10-24 08:36:58', '2024-10-24 08:36:58'),
(29, 3, 15, 400, '2024-10-24 08:38:43', '2024-10-24 08:38:43'),
(30, 10, 15, 400, '2024-10-24 08:38:43', '2024-10-24 08:38:43'),
(31, 3, 16, 400, '2024-10-24 08:40:45', '2024-10-24 08:40:45'),
(32, 10, 16, 400, '2024-10-24 08:40:45', '2024-10-24 08:40:45'),
(33, 3, 17, 398, '2024-10-24 08:44:19', '2024-10-26 21:09:48'),
(34, 10, 17, 400, '2024-10-24 08:44:19', '2024-10-24 08:44:19'),
(35, 3, 18, 363, '2024-10-24 08:48:13', '2024-10-26 06:18:29'),
(36, 10, 18, 400, '2024-10-24 08:48:13', '2024-10-24 08:48:13'),
(37, 3, 19, 393, '2024-10-24 08:50:39', '2024-10-26 21:09:48'),
(38, 10, 19, 400, '2024-10-24 08:50:39', '2024-10-24 08:50:39'),
(39, 3, 20, 400, '2024-10-24 08:54:42', '2024-10-24 08:54:42'),
(40, 10, 20, 400, '2024-10-24 08:54:42', '2024-10-24 08:54:42'),
(41, 3, 21, 400, '2024-10-24 08:55:54', '2024-10-24 08:55:54'),
(42, 10, 21, 400, '2024-10-24 08:55:54', '2024-10-24 08:55:54'),
(43, 3, 22, 5180, '2024-10-24 20:57:53', '2024-10-24 22:57:58'),
(44, 10, 22, 5550, '2024-10-24 20:57:53', '2024-10-24 20:57:53'),
(45, 3, 23, 5550, '2024-10-24 21:00:05', '2024-10-24 21:00:05'),
(46, 10, 23, 5550, '2024-10-24 21:00:05', '2024-10-24 21:00:05'),
(47, 3, 24, 5550, '2024-10-24 21:03:37', '2024-10-24 21:03:37'),
(48, 10, 24, 5550, '2024-10-24 21:03:37', '2024-10-24 21:03:37'),
(49, 3, 25, 394, '2024-10-24 21:07:42', '2024-10-26 21:26:23'),
(50, 10, 25, 400, '2024-10-24 21:07:42', '2024-10-24 21:07:42'),
(51, 3, 26, 377, '2024-10-24 21:14:51', '2024-10-26 21:09:48'),
(52, 10, 26, 400, '2024-10-24 21:14:51', '2024-10-24 21:14:51'),
(53, 3, 27, 400, '2024-10-24 21:16:23', '2024-10-24 21:16:23'),
(54, 10, 27, 400, '2024-10-24 21:16:23', '2024-10-24 21:16:23'),
(55, 3, 28, 400, '2024-10-24 21:20:10', '2024-10-24 21:20:10'),
(56, 10, 28, 400, '2024-10-24 21:20:10', '2024-10-24 21:20:10'),
(57, 3, 29, 398, '2024-10-24 21:23:32', '2024-10-26 21:09:48'),
(58, 10, 29, 400, '2024-10-24 21:23:32', '2024-10-24 21:23:32'),
(59, 3, 30, 400, '2024-10-24 21:28:31', '2024-10-24 21:28:31'),
(60, 10, 30, 400, '2024-10-24 21:28:31', '2024-10-24 21:28:31'),
(61, 3, 31, 400, '2024-10-24 21:31:25', '2024-10-24 21:31:25'),
(62, 10, 31, 400, '2024-10-24 21:31:25', '2024-10-24 21:31:25'),
(63, 3, 32, 400, '2024-10-24 21:32:51', '2024-10-24 21:32:51'),
(64, 10, 32, 400, '2024-10-24 21:32:51', '2024-10-24 21:32:51'),
(65, 3, 33, 400, '2024-10-24 21:49:48', '2024-10-24 21:49:48'),
(66, 10, 33, 400, '2024-10-24 21:49:48', '2024-10-24 21:49:48'),
(67, 3, 34, 400, '2024-10-24 21:55:30', '2024-10-24 21:55:30'),
(68, 10, 34, 400, '2024-10-24 21:55:30', '2024-10-24 21:55:30'),
(69, 3, 35, 400, '2024-10-24 21:57:06', '2024-10-24 21:57:06'),
(70, 10, 35, 400, '2024-10-24 21:57:06', '2024-10-24 21:57:06'),
(71, 3, 36, 400, '2024-10-24 22:00:04', '2024-10-24 22:00:04'),
(72, 10, 36, 400, '2024-10-24 22:00:04', '2024-10-24 22:00:04'),
(73, 3, 37, 400, '2024-10-24 22:01:56', '2024-10-24 22:01:56'),
(74, 10, 37, 400, '2024-10-24 22:01:56', '2024-10-24 22:01:56'),
(75, 3, 38, 400, '2024-10-24 22:06:37', '2024-10-24 22:06:37'),
(76, 10, 38, 400, '2024-10-24 22:06:37', '2024-10-24 22:06:37'),
(77, 3, 39, 400, '2024-10-24 22:08:29', '2024-10-24 22:08:29'),
(78, 10, 39, 400, '2024-10-24 22:08:29', '2024-10-24 22:08:29'),
(79, 3, 40, 400, '2024-10-24 22:12:51', '2024-10-24 22:12:51'),
(80, 10, 40, 400, '2024-10-24 22:12:51', '2024-10-24 22:12:51'),
(81, 3, 41, 400, '2024-10-24 22:15:02', '2024-10-24 22:15:02'),
(82, 10, 41, 400, '2024-10-24 22:15:02', '2024-10-24 22:15:02'),
(83, 3, 42, 400, '2024-10-24 22:15:57', '2024-10-24 22:15:57'),
(84, 10, 42, 400, '2024-10-24 22:15:57', '2024-10-24 22:15:57'),
(85, 3, 43, 400, '2024-10-24 22:16:57', '2024-10-24 22:16:57'),
(86, 10, 43, 400, '2024-10-24 22:16:57', '2024-10-24 22:16:57'),
(87, 3, 44, 400, '2024-10-24 22:20:13', '2024-10-24 22:20:13'),
(88, 10, 44, 400, '2024-10-24 22:20:13', '2024-10-24 22:20:13'),
(89, 3, 45, 400, '2024-10-24 22:21:32', '2024-10-24 22:21:32'),
(90, 10, 45, 400, '2024-10-24 22:21:32', '2024-10-24 22:21:32'),
(91, 3, 46, 3995, '2024-10-24 22:22:55', '2024-10-26 06:28:09'),
(92, 10, 46, 4000, '2024-10-24 22:22:55', '2024-10-24 22:22:55'),
(93, 3, 47, 397, '2024-10-24 22:27:29', '2024-10-26 21:27:58'),
(94, 10, 47, 400, '2024-10-24 22:27:29', '2024-10-24 22:27:29'),
(95, 3, 48, 390, '2024-10-24 22:28:20', '2024-10-26 06:18:29'),
(96, 10, 48, 400, '2024-10-24 22:28:20', '2024-10-24 22:28:20'),
(97, 3, 49, 400, '2024-10-24 22:30:39', '2024-10-24 22:30:39'),
(98, 10, 49, 400, '2024-10-24 22:30:39', '2024-10-24 22:30:39'),
(99, 3, 50, 400, '2024-10-24 22:35:09', '2024-10-24 22:35:09'),
(100, 10, 50, 400, '2024-10-24 22:35:09', '2024-10-24 22:35:09'),
(101, 3, 51, 395, '2024-10-24 22:36:20', '2024-10-26 06:18:29'),
(102, 10, 51, 400, '2024-10-24 22:36:20', '2024-10-24 22:36:20'),
(103, 3, 52, 400, '2024-10-24 22:38:05', '2024-10-24 22:38:05'),
(104, 10, 52, 400, '2024-10-24 22:38:05', '2024-10-24 22:38:05'),
(105, 3, 53, 396, '2024-10-24 22:42:28', '2024-10-26 21:09:48'),
(106, 10, 53, 400, '2024-10-24 22:42:28', '2024-10-24 22:42:28'),
(107, 3, 54, 398, '2024-10-25 02:03:09', '2024-10-26 21:11:43'),
(108, 10, 54, 400, '2024-10-25 02:03:09', '2024-10-25 02:03:09'),
(109, 3, 55, 400, '2024-10-25 02:05:16', '2024-10-25 02:05:16'),
(110, 10, 55, 400, '2024-10-25 02:05:16', '2024-10-25 02:05:16'),
(111, 3, 56, 400, '2024-10-25 02:06:26', '2024-10-25 02:06:26'),
(112, 10, 56, 400, '2024-10-25 02:06:26', '2024-10-25 02:06:26'),
(113, 3, 57, 400, '2024-10-25 02:07:31', '2024-10-25 02:07:31'),
(114, 10, 57, 400, '2024-10-25 02:07:31', '2024-10-25 02:07:31'),
(115, 3, 58, 275, '2024-10-25 08:34:13', '2024-10-26 21:11:43'),
(116, 10, 58, 400, '2024-10-25 08:34:13', '2024-10-25 08:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `s_r_s`
--

CREATE TABLE `s_r_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Gram', '2024-10-06 02:34:44', '2024-10-06 02:34:44'),
(4, 'Piece', '2024-10-06 02:34:50', '2024-10-06 02:34:50'),
(5, 'Litter', '2024-10-06 02:34:55', '2024-10-06 02:34:55'),
(6, 'Bag', '2024-10-06 02:35:01', '2024-10-06 02:35:01'),
(7, 'KG', '2024-10-06 04:12:27', '2024-10-06 04:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `warehouse` int(11) DEFAULT NULL,
  `srAddress` text DEFAULT NULL,
  `srNid` text DEFAULT NULL,
  `srEducation` text DEFAULT NULL,
  `certificate` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `otp` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `warehouse`, `srAddress`, `srNid`, `srEducation`, `certificate`, `image`, `mobile`, `otp`, `email_verified_at`, `password`, `verification_code`, `is_verified`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nurjahan', 'nurjahan@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '01779666611', NULL, '2024-09-28 04:37:35', '$2y$10$6ScTHOG2ow3lQXv9pF1mwuch2F1/5rCmmlIlS3Q/n5JGsZb5rYKzm', '862041fc4aa0558bd105b637b8521885dddd630d', 1, 1, 'qsK0emUBw6Cxw5xHJ7VOoKiin5EI4TW4AOjmibWAI1IkJxrg9f1Bw9318n8Z', '2024-09-28 04:37:35', '2024-09-28 04:37:35'),
(5, 'manik', 'manik@gmail.com', 3, 'address', '456', 'SSC', 'uploads/certificates/1728879436_certificate.jpg', 'uploads/sr_photos/1728879436_photo.png', '123', NULL, NULL, '$2y$10$0//viyT0iqoI.44JeJcIkemfQ4Vzzl9ZlsogT1ZFzIn46X6rjtAbm', NULL, 1, 2, NULL, '2024-10-13 22:17:16', '2024-10-13 22:17:16'),
(9, 'SIR', 'sr@sr.com', 3, 'adress', 'lkjlk', 'SSC', 'uploads/certificates/1728880799_certificate.jpg', 'uploads/sr_photos/1728880799_photo.jpg', '12312', NULL, NULL, '$2y$10$XLimq9hKBHiAjNXRHdSj.OTzFCwz03DTKrv86wFYXGpl8t1NkDLn.', NULL, 1, 2, NULL, '2024-10-13 22:39:59', '2024-10-13 23:15:21'),
(10, 'Utpal Nondi', 'mavrick.utpal@gmail.com', 3, '46, Kawran Bazar, Dhaka', '02154898547', 'Masters', 'uploads/certificates/1729653604_certificate.png', 'uploads/sr_photos/1729653604_photo.jpg', '01779666633', NULL, NULL, '$2y$10$G5WmLGsM9GSEzkHV3xYShuBvyvEtX2USKTEZnAjXoefrCQ5J3XMaq', NULL, 1, 2, NULL, '2024-10-22 21:20:04', '2024-10-22 21:20:04'),
(14, 'Aminur', 'aminur@nurjahan.com.bd', 3, 'Bonkhuri Bazar, Manikganj Sadar', '6899423815', 'HSC', 'uploads/certificates/1729931000_certificate.jpeg', 'uploads/sr_photos/1729931000_photo.jpeg', '01836597830', NULL, NULL, '$2y$10$txZJKTqylxTBhP32WSS3CuUnosXnONB.9kjgzWFe0sR5p2FjgTpRu', NULL, 1, 2, NULL, '2024-10-26 02:23:20', '2024-10-26 02:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Manikgonj', '2024-10-06 00:54:40', '2024-10-06 01:25:17', NULL),
(10, 'Dhaka', '2024-10-06 01:14:27', '2024-10-06 01:25:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companystocks`
--
ALTER TABLE `companystocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_products`
--
ALTER TABLE `company_products`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otpresets`
--
ALTER TABLE `otpresets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasecompanies`
--
ALTER TABLE `purchasecompanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sr_shops`
--
ALTER TABLE `sr_shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_ins`
--
ALTER TABLE `stock_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_r_s`
--
ALTER TABLE `s_r_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `companystocks`
--
ALTER TABLE `companystocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `company_products`
--
ALTER TABLE `company_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `otpresets`
--
ALTER TABLE `otpresets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `purchasecompanies`
--
ALTER TABLE `purchasecompanies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sr_shops`
--
ALTER TABLE `sr_shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock_ins`
--
ALTER TABLE `stock_ins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `s_r_s`
--
ALTER TABLE `s_r_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
