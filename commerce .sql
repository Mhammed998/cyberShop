-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2020 at 08:55 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `cate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('completed','not-completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not-completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_cate_name_unique` (`cate_name`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `cate_name`, `cate_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Electronics', 'Electronics Section', 'not-completed', '2020-04-05 12:21:42', '2020-04-05 12:21:42'),
(2, 1, 'Mobiles', 'Mobiles Section', 'not-completed', '2020-04-05 17:54:27', '2020-04-05 17:54:27'),
(3, 0, 'Handmade', 'Handmade Section', 'not-completed', '2020-04-05 17:56:02', '2020-04-05 17:56:02'),
(4, 3, 'Clothes', 'Clothes Section', 'not-completed', '2020-04-05 17:56:30', '2020-04-05 17:56:30'),
(5, 3, 'Toys', 'Toys Section', 'not-completed', '2020-04-05 17:57:41', '2020-04-05 17:57:41'),
(6, 1, 'Televisions', 'Televisions Section', 'not-completed', '2020-04-05 17:58:18', '2020-04-05 17:58:18'),
(7, 1, 'Laptops', 'Laptops Section', 'not-completed', '2020-04-07 00:21:04', '2020-04-07 00:21:04'),
(9, 1, 'Accessories', 'Accessories', 'not-completed', '2020-04-24 10:09:32', '2020-04-24 10:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_16_154211_create_categories_table', 1),
(5, '2020_03_16_164050_create_products_table', 1),
(6, '2020_03_16_164151_create_tags_table', 1),
(7, '2020_03_22_232133_create_product_imgs_table', 1),
(8, '2020_04_14_194634_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Waiting','Recived') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Payment_Status` enum('completed','not-completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `username`, `address`, `status`, `Payment_Status`, `phone`, `product`, `amount`, `cost`, `created_at`, `updated_at`) VALUES
(2, 1, 'Muhamed Hashim', 'hhugiugygyugygyugygyugyg', 'Waiting', 'completed', '01115435882', 'LG Smart Tv', 1, 2500, '2020-04-18 10:40:20', '2020-04-18 10:40:20'),
(4, 1, 'محمد هاشم محمد بهجت', 'jvifjviodjvijdo,dfjsijvisjvidfji,jkojvijdfj', 'Waiting', 'completed', '01226211957', 'Man Suit', 1, 1520, '2020-04-29 22:44:30', '2020-04-29 22:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` enum('new','used') COLLATE utf8mb4_unicode_ci NOT NULL,
  `allow` enum('no','yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_desc`, `product_price`, `product_status`, `allow`, `quantity`, `tags`, `created_at`, `updated_at`) VALUES
(4, 6, 'LG Smart Tv', 'LG smart TV 4k', '2500', 'new', 'yes', '4300', 'lg,tv,smart', '2020-04-05 22:33:05', '2020-04-07 15:44:40'),
(3, 2, 'Realme 6pro', '<div>processor: Snapdragon 730&nbsp;<br>Rear Camera: 64mp 16mp 8mp 2mp&nbsp;</div>', '1750', 'new', 'yes', '12', 'smartphone,realme', '2020-04-05 18:49:30', '2020-04-07 15:48:24'),
(5, 7, 'laptop Dell insprion', '<div>laptop Dell insprion description</div>', '6500', 'new', 'yes', '22', 'laptops,dell,pc', '2020-04-07 00:21:54', '2020-04-07 15:48:30'),
(6, 4, 'Man Suit', '<div><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy</div>', '1520', 'new', 'yes', '2', 'man,suits,fashion', '2020-04-07 00:26:34', '2020-04-08 18:12:49'),
(11, 4, 'Adidas T-shirt', '<div>most popular T-shirts from Adidas brand</div>', '169', 'new', 'yes', '30', 'Adidas,shirt,sport', '2020-04-24 10:48:57', '2020-04-24 10:49:11'),
(8, 2, 'Iphone 11 pro', '<div>The new <strong>iphone</strong> 11 pro, New brand from apple<br>-ram 4gb<br>-processor A13+&nbsp;</div>', '28999', 'new', 'yes', '20', 'smartphone,apple,iphone', '2020-04-24 10:00:32', '2020-04-24 10:00:42'),
(9, 9, 'apple smartwatch 4', '<div>New apple brand of smartwatches have been published now in all markets.<br>-water resistance yes<br>-screen size 2.5inch</div>', '4699', 'new', 'yes', '16', 'smartwatch,apple,watch', '2020-04-24 10:24:10', '2020-05-01 12:27:19'),
(10, 7, 'Macbook Pro 2020', '<div>our new macbook pro 2020 15-16 inch.<br>-screen size 15-16inch<br>-screen resolution 2.5k<br>-ram 16gb</div>', '34999', 'new', 'yes', '5', 'laptop,apple', '2020-04-24 10:36:11', '2020-05-01 12:50:46'),
(12, 5, 'Wooden Game', '<div>Wooden Game For Children</div>', '200', 'new', 'yes', '23', 'wooden,toy', '2020-04-30 14:21:21', '2020-04-30 14:22:40'),
(13, 1, 'Nikon camera e366', '<div>Nikon camera e366 with all it\'s parts</div>', '5000', 'new', 'yes', '23', 'Nikon,camera', '2020-05-01 22:47:46', '2020-05-01 22:52:17'),
(14, 1, 'Air Conditioner', '<div>Air Conditioner description</div>', '2000', 'new', 'yes', '20', 'cold', '2020-05-01 22:56:01', '2020-05-02 21:00:56'),
(15, 5, 'Bmx bicycle', '<div>Bmx bicycle</div>', '1500', 'new', 'yes', '26', 'bmx,bicycle', '2020-05-02 21:04:31', '2020-05-02 21:06:38'),
(16, 4, 'Bumb Jacket', '<div>Bumb Jacket</div>', '850', 'new', 'yes', '33', 'jacket', '2020-05-02 21:26:44', '2020-05-02 21:33:13'),
(17, 4, 'Air Max  shoes', '<div>Air Max&nbsp; shoes</div>', '250', 'new', 'yes', '5', 'shoes,sport', '2020-05-06 01:43:02', '2020-05-06 01:46:56'),
(18, 5, 'Plasitc Car', '<div>Plasitc Car</div>', '300', 'new', 'yes', '15', 'plastic,toy', '2020-05-06 01:53:19', '2020-05-06 01:53:36'),
(19, 9, 'Hand tools', '<div>Hand tools</div>', '120', 'new', 'yes', '17', 'tools', '2020-05-06 01:59:03', '2020-05-06 01:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_imgs`
--

DROP TABLE IF EXISTS `product_imgs`;
CREATE TABLE IF NOT EXISTS `product_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_imgs`
--

INSERT INTO `product_imgs` (`id`, `images`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '1586133684lg.jpg', 4, '2020-04-05 22:41:25', '2020-04-05 22:41:25'),
(2, '1586133765realme6pro.jpg', 3, '2020-04-05 22:42:45', '2020-04-05 22:42:45'),
(3, '1586226217dell.jpg', 5, '2020-04-07 00:23:37', '2020-04-07 00:23:37'),
(4, '1586226410black-and-white-dot-tie-superb-male-black-suit-style-design-ideas.jpg', 6, '2020-04-07 00:26:50', '2020-04-07 00:26:50'),
(5, '1586477376904_egypt.jpg', 7, '2020-04-09 22:09:36', '2020-04-09 22:09:36'),
(6, '15864773761138_sharm.jpg', 7, '2020-04-09 22:09:36', '2020-04-09 22:09:36'),
(7, '15864773763403_aswan.jpg', 7, '2020-04-09 22:09:36', '2020-04-09 22:09:36'),
(8, '1586477376moscow.jpg', 7, '2020-04-09 22:09:36', '2020-04-09 22:09:36'),
(9, '1587729841201909100612541254.jpg', 8, '2020-04-24 10:04:01', '2020-04-24 10:04:01'),
(10, '1587729841Apple-iPhone-11-Pro-Max.jpg', 8, '2020-04-24 10:04:01', '2020-04-24 10:04:01'),
(11, '1587729841Apple-iPhone-11-Pro-Midnight-Green-frontimage.jpg', 8, '2020-04-24 10:04:02', '2020-04-24 10:04:02'),
(12, '1587731368images (1).jpeg', 9, '2020-04-24 10:29:28', '2020-04-24 10:29:28'),
(13, '1587731368images (2).jpeg', 9, '2020-04-24 10:29:28', '2020-04-24 10:29:28'),
(14, '1587731368images (3).jpeg', 9, '2020-04-24 10:29:28', '2020-04-24 10:29:28'),
(15, '1587731368images.jpeg', 9, '2020-04-24 10:29:28', '2020-04-24 10:29:28'),
(16, '1587731848images (4).jpeg', 10, '2020-04-24 10:37:28', '2020-04-24 10:37:28'),
(17, '1587731848images (5).jpeg', 10, '2020-04-24 10:37:28', '2020-04-24 10:37:28'),
(18, '1587731848images (6).jpeg', 10, '2020-04-24 10:37:28', '2020-04-24 10:37:28'),
(19, '1587731848og__csakh451i0eq_large.png', 10, '2020-04-24 10:37:28', '2020-04-24 10:37:28'),
(20, '15877326217646428_1200_A.jpg', 11, '2020-04-24 10:50:21', '2020-04-24 10:50:21'),
(21, '1587732621images (7).jpeg', 11, '2020-04-24 10:50:21', '2020-04-24 10:50:21'),
(22, '1587732621images (8).jpeg', 11, '2020-04-24 10:50:21', '2020-04-24 10:50:21'),
(23, '1587732621images (9).jpeg', 11, '2020-04-24 10:50:21', '2020-04-24 10:50:21'),
(24, '1588263750slide1.jpg', 12, '2020-04-30 14:22:30', '2020-04-30 14:22:30'),
(25, '1588380707cam1.jpg', 13, '2020-05-01 22:51:47', '2020-05-01 22:51:47'),
(26, '1588380707cam2.jpg', 13, '2020-05-01 22:51:47', '2020-05-01 22:51:47'),
(27, '1588380707cam3.jpg', 13, '2020-05-01 22:51:47', '2020-05-01 22:51:47'),
(28, '1588380707cam4.jpg', 13, '2020-05-01 22:51:47', '2020-05-01 22:51:47'),
(29, '1588460442sharp-air-conditioner-225hp-cool-split-with-inverter-technology-plasmacluster-ah-xp18the.jpg', 14, '2020-05-02 21:00:42', '2020-05-02 21:00:42'),
(30, '1588460442Toyotomi-Hiro-HTN-HTG-709R32-300x300.jpg', 14, '2020-05-02 21:00:42', '2020-05-02 21:00:42'),
(31, '1588460710download (1).jpg', 15, '2020-05-02 21:05:10', '2020-05-02 21:05:10'),
(32, '1588460710download.jpg', 15, '2020-05-02 21:05:10', '2020-05-02 21:05:10'),
(33, '1588462378download (2).jpg', 16, '2020-05-02 21:32:58', '2020-05-02 21:32:58'),
(34, '1588736749download (3).jpg', 17, '2020-05-06 01:45:49', '2020-05-06 01:45:49'),
(35, '1588736749download (4).jpg', 17, '2020-05-06 01:45:49', '2020-05-06 01:45:49'),
(36, '1588736749download (5).jpg', 17, '2020-05-06 01:45:49', '2020-05-06 01:45:49'),
(37, '1588737270-.jpg', 18, '2020-05-06 01:54:30', '2020-05-06 01:54:30'),
(38, '1588737607stanley-home-tool-kits-94-248w33706m-64_1000.jpg', 19, '2020-05-06 02:00:07', '2020-05-06 02:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `role`, `phone`, `about`, `facebook`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'admin@gmail.com', 'approved', 'super_admin', '02336655998', 'I am a full stack developer', 'https://www.youtube.com/watch?v=uoDXqFKQ63Q', NULL, '$2y$10$cdddU/YegU/KM1uZ9lTmjOzrJB5qidwxPCYMWj2L0XXHwSW4HZRGq', 'evJgy6qlgW3QcCft2KrjhxlYjc5VMWY94M9LvsQxVXdAtMeHewqMyyjwVsun', '2020-04-05 12:11:59', '2020-05-06 01:11:18'),
(2, 'user', 'user@gmail.com', 'approved', 'user', NULL, NULL, NULL, NULL, '$2y$10$IWGEANEOGhSV7lhBj/nfi.boB6baPgnsuo59rTAblKYzGe1ljCvSa', NULL, '2020-04-08 22:48:29', '2020-04-09 02:09:23'),
(3, 'user1', 'user1@gmail.com', 'approved', 'user', NULL, NULL, NULL, NULL, '$2y$10$ZvvUUkmueuFYvDAnhbZAGOJUWYzURYTklzjnaNEBFg9LGzL9hOBAG', NULL, '2020-04-18 14:49:30', '2020-04-18 14:57:23'),
(4, 'user2', 'user2@gmail.com', 'approved', 'user', NULL, NULL, NULL, NULL, '$2y$10$BVxSteUs6jC7EZrEVX4/p.h43HXohpWYazg3uc3h5tjEJQjKmCUT6', NULL, '2020-04-18 14:50:07', '2020-04-21 11:45:55'),
(5, 'user3', 'user3@gmail.com', 'not-approved', 'user', NULL, NULL, NULL, NULL, '$2y$10$1bWw6nvogysDj3QtD9LDh.M7hvt34Uo5MeuUFFIRw7hIQssdqrZYe', NULL, '2020-04-18 14:50:44', '2020-04-18 14:50:44'),
(6, 'user4', 'user4@gmail.com', 'not-approved', 'user', NULL, NULL, NULL, NULL, '$2y$10$p74RIlpr2iIniuIDSy/WtOQx2qPZlTazeoJ8C2g5TS0.NrCQzZAuG', NULL, '2020-04-18 14:51:14', '2020-04-18 14:51:14'),
(7, 'user5', 'user5@gmail.com', 'not-approved', 'user', NULL, NULL, NULL, NULL, '$2y$10$qaknuHJvA1uYqV01BACsD.9iir.zxXTBOasiI9D24K73FL1j2xS82', NULL, '2020-04-18 14:56:30', '2020-04-18 14:56:30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
