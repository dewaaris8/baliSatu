-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 10:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balisatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:6:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:17:\"manage categories\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:15:\"manage packages\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:20:\"manage package banks\";s:1:\"c\";s:3:\"web\";}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:16:\"checkout package\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:19:\"manage transactions\";s:1:\"c\";s:3:\"web\";}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"view orders\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:8:\"customer\";s:1:\"c\";s:3:\"web\";}}}', 1732265962);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Beach', 'icons/7nH4K0L008J409tOw4aEZpAMUHPKjnbq9EM9N1DC.png', 'beach', NULL, '2024-10-23 01:43:03', '2024-10-23 01:43:03'),
(2, 'Mountains', 'icons/Z1aQ7E9znSQR5iTxmzWTSk3GQjanvIKQrKurnkzy.png', 'mountains', NULL, '2024-10-23 01:43:16', '2024-10-23 02:00:06'),
(3, 'Historical', 'icons/W7qrXbhgI8SdjkCxhXu8IrWnEE00eW9CKUIbDOan.png', 'historical', '2024-10-23 01:53:41', '2024-10-23 01:43:36', '2024-10-23 01:53:41'),
(4, 'Camps', 'icons/Qn4H10u74TH7Wx4e5UoGg5TwaRIMkpTx2bzQRtVw.png', 'camps', NULL, '2024-10-23 02:00:29', '2024-10-23 02:00:29');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_22_060354_create_permission_tables', 1),
(5, '2024_10_22_061140_create_categories_table', 1),
(6, '2024_10_22_061400_create_package_banks_table', 1),
(7, '2024_10_22_061414_create_package_tours_table', 1),
(8, '2024_10_22_061432_create_package_photos_table', 1),
(9, '2024_10_22_061450_create_package_bookings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_banks`
--

CREATE TABLE `package_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_account_name` varchar(255) NOT NULL,
  `bank_account_number` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_banks`
--

INSERT INTO `package_banks` (`id`, `bank_name`, `bank_account_name`, `bank_account_number`, `logo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Bank Bca', 'Arista Widana Putra', '08123123724', 'logos/UGiMajcqmyn3Hl71CQha40NzVa0y3qp0sRXNddLp.png', NULL, '2024-10-23 19:59:12', '2024-10-23 19:59:22'),
(3, 'Mandiri', 'Arista Putra', '0813372123', 'logos/JQrpqFLMmociuAz22W3kHrmpihyBa4jzD0KUhrQ7.png', NULL, '2024-10-28 19:54:57', '2024-10-28 19:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `package_bookings`
--

CREATE TABLE `package_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proof` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_tour_id` bigint(20) UNSIGNED NOT NULL,
  `package_bank_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `total_amount` bigint(20) UNSIGNED NOT NULL,
  `insurance` bigint(20) UNSIGNED NOT NULL,
  `tax` bigint(20) UNSIGNED NOT NULL,
  `sub_total` bigint(20) UNSIGNED NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_bookings`
--

INSERT INTO `package_bookings` (`id`, `proof`, `user_id`, `package_tour_id`, `package_bank_id`, `quantity`, `total_amount`, `insurance`, `tax`, `sub_total`, `is_paid`, `start_date`, `end_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'coba.png', 3, 3, 2, 1, 2500000, 300000, 200000, 2000000, 0, '2024-10-29', '2024-11-09', NULL, '2024-10-28 02:41:07', '2024-10-28 02:41:07'),
(2, 'coba.png', 3, 3, 2, 1, 2500000, 300000, 200000, 2000000, 0, '2024-10-30', '2024-11-10', NULL, '2024-10-28 18:37:55', '2024-10-28 18:37:55'),
(3, 'coba.png', 3, 3, 2, 2, 5000000, 600000, 400000, 4000000, 0, '2024-11-09', '2024-11-20', NULL, '2024-10-28 18:40:18', '2024-10-28 18:40:18'),
(4, 'coba.png', 3, 3, 2, 2, 5000000, 600000, 400000, 4000000, 0, '2024-11-08', '2024-11-19', NULL, '2024-10-28 19:53:31', '2024-10-28 19:53:31'),
(5, 'coba.png', 3, 3, 3, 2, 5000000, 600000, 400000, 4000000, 0, '2024-11-01', '2024-11-12', NULL, '2024-10-28 19:55:22', '2024-10-28 19:55:22'),
(6, 'coba.png', 3, 3, 3, 2, 5000000, 600000, 400000, 4000000, 0, '2024-11-08', '2024-11-19', NULL, '2024-10-28 20:05:46', '2024-10-28 20:05:46'),
(7, 'proofs/NRpzYWeb2ygM6GjG7qXVCGtSamjvJBF6D0bYmTeV.png', 3, 3, 2, 1, 2500000, 300000, 200000, 2000000, 1, '2024-10-31', '2024-11-11', NULL, '2024-10-28 20:11:26', '2024-11-06 23:12:56'),
(8, 'proofs/J7cljZdU8NsfJ44NTQOWf2y5nOnC6kSI8XThui6J.png', 3, 3, 3, 2, 5000000, 600000, 400000, 4000000, 1, '2024-11-09', '2024-11-20', NULL, '2024-10-30 19:10:51', '2024-11-06 23:09:35'),
(9, 'coba2.png', 3, 3, 3, 2, 5000000, 600000, 400000, 4000000, 0, '2024-11-23', '2024-12-04', NULL, '2024-11-21 00:59:36', '2024-11-21 00:59:36'),
(10, 'proofs/U5ZCetM4kW7JQFOgcvJT0l5T61ivMNSkK3xjJecE.jpg', 3, 3, 3, 1, 2500000, 300000, 200000, 2000000, 0, '2024-11-23', '2024-12-04', NULL, '2024-11-21 01:05:12', '2024-11-21 01:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `package_photos`
--

CREATE TABLE `package_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `package_tour_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_photos`
--

INSERT INTO `package_photos` (`id`, `photo`, `package_tour_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'package_photos/2024-10-24/CSo2Sspjbs9rgDTlx7XwJ7e2kZOXSQiVzKVYaCzr.jpg', 1, NULL, '2024-10-23 23:29:01', '2024-10-23 23:29:01'),
(2, 'package_photos/2024-10-24/Y4GYiVecGZdVHolbxPCv0HCK0RW0q3ri2SAqLQbk.jpg', 1, NULL, '2024-10-23 23:29:01', '2024-10-23 23:29:01'),
(3, 'package_photos/2024-10-24/oWq3xnjy1k8RNt5FcQsYhQnik3QAwkrLCyxFRHBm.jpg', 1, NULL, '2024-10-23 23:29:01', '2024-10-23 23:29:01'),
(4, 'package_photos/2024-10-24/116ZdpQ0TsF6aPgSiVVuq6YGl5dhIY2SRJeKqlVQ.jpg', 2, NULL, '2024-10-23 23:33:13', '2024-10-23 23:33:13'),
(5, 'package_photos/2024-10-24/mr1jNkCMuwCfAN5pkiDjNxgCClUNWG4LkDvM2i6d.jpg', 2, NULL, '2024-10-23 23:33:13', '2024-10-23 23:33:13'),
(6, 'package_photos/2024-10-24/lQchxDOojSKNMlAbdoeUj37FLB9IieZOVdGUOb4I.jpg', 2, NULL, '2024-10-23 23:33:13', '2024-10-23 23:33:13'),
(7, 'package_photos/2024-10-25/CEI0isC6mZVmPZ0Ie4t7QQLMPNw4HITYRefcw8uS.jpg', 3, NULL, '2024-10-24 18:25:16', '2024-10-24 18:25:16'),
(8, 'package_photos/2024-10-25/v0wOnxnEuAbxKFxu1aF9TwSPlvA85uEKohkJXp7L.jpg', 3, NULL, '2024-10-24 18:25:16', '2024-10-24 18:25:16'),
(9, 'package_photos/2024-10-25/Eh82jtRj0E9ixK9Enir4y3CXafMLfp3nKfRmk7Zs.jpg', 3, NULL, '2024-10-24 18:25:16', '2024-10-24 18:25:16'),
(10, 'package_photos/2024-10-25/fd9epoS2zYGBQQLQsFhXZQqwjwblJilq3P6PYQY7.jpg', 4, NULL, '2024-10-24 18:26:42', '2024-10-24 18:26:42'),
(11, 'package_photos/2024-10-25/DDuBu5QDnqCVhW5HxrBI8frHckrH7hOmy4iWuxx9.jpg', 4, NULL, '2024-10-24 18:26:42', '2024-10-24 18:26:42'),
(12, 'package_photos/2024-10-25/mpK2MHaQLRREA7rmUzQjN0f0yuD9SO2Ua4hdkCrx.jpg', 4, NULL, '2024-10-24 18:26:42', '2024-10-24 18:26:42'),
(13, 'package_photos/2024-10-25/VtTthdQw3A4cEJq3xMNundmCEtaecZaa7QXwqFOm.jpg', 3, NULL, '2024-10-24 19:10:04', '2024-10-24 19:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `package_tours`
--

CREATE TABLE `package_tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `days` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_tours`
--

INSERT INTO `package_tours` (`id`, `name`, `slug`, `thumbnail`, `location`, `about`, `price`, `days`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'coba', 'coba', 'thumbnails/2024-10-24/sliUrJPp0FRBOtRMg482jw8A8FW4Zt7GbUsgiCxF.jpg', 'asndskad', 'asdsadasd', 121, 12, 2, '2024-10-24 18:25:50', '2024-10-23 23:29:01', '2024-10-24 18:25:50'),
(2, 'coba2', 'coba2', 'thumbnails/2024-10-24/DsuUxnEGGdTeqy4hlYSCUPOUFUR7Pa2izS6NdEDE.jpg', 'asdasd', 'sasdsadsdsad', 12, 30, 2, '2024-10-24 18:25:21', '2024-10-23 23:33:13', '2024-10-24 18:25:21'),
(3, 'asal', 'asal', 'thumbnails/2024-10-25/3eFZPJEkYIyzG2ioWAsb6NO5NR56Rg9HDfLg3Jex.jpg', 'indonesia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2000000, 12, 2, NULL, '2024-10-24 18:25:16', '2024-10-24 19:10:04'),
(4, 'coba', 'coba', 'thumbnails/2024-10-25/jBKLd2wRt8PamBTHxwLAcXrt99fpnniga1SVx7Zf.jpg', 'indoneisia', 'coba lagi', 30000000, 10, 1, '2024-10-24 18:26:47', '2024-10-24 18:26:42', '2024-10-24 18:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage categories', 'web', '2024-10-21 22:26:23', '2024-10-21 22:26:23'),
(2, 'manage packages', 'web', '2024-10-21 22:26:23', '2024-10-21 22:26:23'),
(3, 'manage package banks', 'web', '2024-10-21 22:26:23', '2024-10-21 22:26:23'),
(4, 'checkout package', 'web', '2024-10-21 22:26:23', '2024-10-21 22:26:23'),
(5, 'manage transactions', 'web', '2024-10-21 22:26:23', '2024-10-21 22:26:23'),
(6, 'view orders', 'web', '2024-10-21 22:26:23', '2024-10-21 22:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'customer', 'web', '2024-10-21 22:26:23', '2024-10-21 22:26:23'),
(2, 'super_admin', 'web', '2024-10-21 22:26:24', '2024-10-21 22:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dTLapm12YbesskYF5Ktu39M1iQe8tb6peZVMYeNN', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiU2JkMTl6ZERoVVB0bklyaEFTajlkMVdIb2o1MHdIVzEzVjM5dFZqZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29rLWZpbmlzaCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1732179931);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `phone_number`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'images/default-avatar.png', '6281337241677', 'super@admin.com', NULL, '$2y$12$0DCwnxgpIJ3C4WpHvylwpeIDM82Ch6Kn8LysFgfE/qygLllbW8PY6', NULL, '2024-10-21 22:26:24', '2024-10-21 22:26:24'),
(2, 'aris', 'avatars/9qoOZciD2zzyoXOUYCv2NewS4fPiHq3HCpr60zbf.png', '081337241677', 'aris@gmail.com', NULL, '$2y$12$y.Yx6uaMYBH94gOwO0uN1eG87Sn3nnNAtwfvtsW0/wuj/RBk3JGHe', NULL, '2024-10-21 22:34:01', '2024-10-21 22:34:01'),
(3, 'dewaaris', 'avatars/mpbUTw7CRLYeEhyEspIXj9oeTLLUASfw86tVTtTv.jpg', '081337241677', 'dewaaris@gmail.com', NULL, '$2y$12$XZpCjBF/5Yr8pYvxIGNxNuRupZUHDYLhhOkEE/I2dpRj1zjkMI/72', NULL, '2024-10-24 22:25:38', '2024-10-24 22:25:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `package_banks`
--
ALTER TABLE `package_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_bookings`
--
ALTER TABLE `package_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_bookings_user_id_foreign` (`user_id`),
  ADD KEY `package_bookings_package_tour_id_foreign` (`package_tour_id`),
  ADD KEY `package_bookings_package_bank_id_foreign` (`package_bank_id`);

--
-- Indexes for table `package_photos`
--
ALTER TABLE `package_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_photos_package_tour_id_foreign` (`package_tour_id`);

--
-- Indexes for table `package_tours`
--
ALTER TABLE `package_tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_tours_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_banks`
--
ALTER TABLE `package_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_bookings`
--
ALTER TABLE `package_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package_photos`
--
ALTER TABLE `package_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `package_tours`
--
ALTER TABLE `package_tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_bookings`
--
ALTER TABLE `package_bookings`
  ADD CONSTRAINT `package_bookings_package_bank_id_foreign` FOREIGN KEY (`package_bank_id`) REFERENCES `package_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_bookings_package_tour_id_foreign` FOREIGN KEY (`package_tour_id`) REFERENCES `package_tours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_photos`
--
ALTER TABLE `package_photos`
  ADD CONSTRAINT `package_photos_package_tour_id_foreign` FOREIGN KEY (`package_tour_id`) REFERENCES `package_tours` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_tours`
--
ALTER TABLE `package_tours`
  ADD CONSTRAINT `package_tours_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
