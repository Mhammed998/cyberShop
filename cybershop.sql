-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 25, 2020 at 02:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('completed','not-completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not-completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `cate_name`, `cate_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, '0', 'Electronics', 'Electronics Section', 'not-completed', '2020-12-24 13:21:49', '2020-12-24 13:21:49'),
(2, '0', 'Appliances', 'Appliances Section', 'not-completed', '2020-12-25 09:45:39', '2020-12-25 09:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_16_154211_create_categories_table', 1),
(5, '2020_03_16_164050_create_products_table', 1),
(6, '2020_03_22_232133_create_product_imgs_table', 1),
(7, '2020_04_14_194634_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Waiting','Recived') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Payment_Status` enum('completed','not-completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `username`, `status`, `Payment_Status`, `phone`, `product`, `amount`, `cost`, `created_at`, `updated_at`) VALUES
(1, 1, 'jisjfvioejofjeriojfoierjfoiej', 'admin', 'Waiting', 'completed', '0123456789', 'Dell latitude e6520', 1, 3500, '2020-12-24 13:30:44', '2020-12-24 13:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` enum('new','used') COLLATE utf8mb4_unicode_ci NOT NULL,
  `allow` enum('no','yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_desc`, `product_price`, `product_status`, `allow`, `quantity`, `tags`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dell latitude e6520', '<div>Dell latitude e6520&nbsp;<br>processor: core i7 8gen</div>', '3500', 'new', 'yes', '55', 'dell,laptop', '2020-12-24 13:23:42', '2020-12-24 13:26:47'),
(2, 1, 'Dell insperion', '<div>Sint odit officia mo.</div>', '195', 'new', 'yes', '433', 'dell,laptop', '2020-12-24 13:52:22', '2020-12-25 09:51:14'),
(3, 1, 'Nicon Camera', '<div>Earum odio amet, nem.</div>', '2000', 'new', 'yes', '131', 'Nicon,camerea', '2020-12-25 09:42:06', '2020-12-25 09:51:46'),
(4, 2, 'Lg smart Tv 55 inches', '<div>Quo aut qui similiqu.</div>', '2600', 'new', 'yes', '404', 'Lg,Tvs', '2020-12-25 09:46:30', '2020-12-25 09:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_imgs`
--

CREATE TABLE `product_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_imgs`
--

INSERT INTO `product_imgs` (`id`, `images`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '1608823585dell1.jpg', 1, '2020-12-24 13:26:25', '2020-12-24 13:26:25'),
(2, '1608823585dell2.jpg', 1, '2020-12-24 13:26:25', '2020-12-24 13:26:25'),
(3, '1608823585dell3.jpg', 1, '2020-12-24 13:26:25', '2020-12-24 13:26:25'),
(4, '1608823585dell4.jpg', 1, '2020-12-24 13:26:25', '2020-12-24 13:26:25'),
(5, '1608825159dell2.jpg', 2, '2020-12-24 13:52:39', '2020-12-24 13:52:39'),
(6, '160889655381MpnlthkKL._AC_SL1500_.jpg', 3, '2020-12-25 09:42:33', '2020-12-25 09:42:33'),
(7, '1608896553D5300.jpg', 3, '2020-12-25 09:42:33', '2020-12-25 09:42:33'),
(8, '1608896553download.jpeg', 3, '2020-12-25 09:42:33', '2020-12-25 09:42:33'),
(9, '1608896553nikon-d5300-18-55-vr-afp-70-300-456-3g-ed-vr.jpg', 3, '2020-12-25 09:42:33', '2020-12-25 09:42:33'),
(10, '16088969435792910_rd.jpg', 4, '2020-12-25 09:49:03', '2020-12-25 09:49:03'),
(11, '1608896943item_L_54940484_8b9258e2b0f66.jpg', 4, '2020-12-25 09:49:03', '2020-12-25 09:49:03'),
(12, '1608896943lg-55-inch-4k-cinema-hdr-smart-tv-with-dolby-atmos-55sk8500pva-fe3.jpg', 4, '2020-12-25 09:49:03', '2020-12-25 09:49:03'),
(13, '1608896943medium03.jpg', 4, '2020-12-25 09:49:03', '2020-12-25 09:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('not-approved','approved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('super_admin','admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `role`, `phone`, `about`, `facebook`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'approved', 'super_admin', NULL, NULL, NULL, NULL, '$2y$10$pedvHWH/OaVOlmTrby4UDeHUK/Wpr5S8qWGd7xE.CskwGe2hMphWS', 'TUIUDjgghWPlBNaHCsqk5O70abYESsANIBdXAHsRFYSbi9LUwdn8ig2l9KFX', '2020-12-24 13:19:28', '2020-12-24 13:19:28'),
(2, 'user', 'user@gmail.com', 'approved', 'user', NULL, NULL, NULL, NULL, '$2y$10$8sfaB7wu611ZxzJZul11MOCtViuVk6Ew5x5iTZ7Z/3Pokvb.Rc7s2', NULL, '2020-12-24 13:27:56', '2020-12-25 09:44:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_cate_name_unique` (`cate_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_imgs`
--
ALTER TABLE `product_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
