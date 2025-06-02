-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 03:53 PM
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
-- Database: `loopin`
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
  `slug` varchar(255) NOT NULL,
  `icon_filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon_filename`, `created_at`, `updated_at`) VALUES
(1, 'Atasan', 'atasan', 'atasanc.svg', '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(2, 'Bawahan', 'bawahan', 'bawahanc.svg', '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(3, 'Dress', 'dress', 'dressc.svg', '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(4, 'Sepatu', 'sepatu', 'sepatuc.svg', '2025-06-02 01:47:05', '2025-06-02 01:47:05');

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
(4, '2025_06_01_171610_create_categories_table', 1),
(5, '2025_06_01_171724_create_products_table', 1),
(6, '2025_06_01_171818_create_product_images_table', 1),
(7, '2025_06_01_182436_create_orders_table', 1),
(8, '2025_06_01_182443_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) NOT NULL DEFAULT 'Pesanan Diterima',
  `payment_method` varchar(255) NOT NULL DEFAULT 'Cash on Delivery',
  `payment_status` varchar(255) NOT NULL DEFAULT 'Belum Dibayar (COD)',
  `recipient_name` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `shipping_address_detail` varchar(255) DEFAULT NULL,
  `recipient_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_number`, `total_amount`, `shipping_cost`, `status`, `payment_method`, `payment_status`, `recipient_name`, `shipping_address`, `shipping_address_detail`, `recipient_phone`, `created_at`, `updated_at`) VALUES
(1, 2, 'LOOPIN-RIRRYJ91748854086', 45000.00, 15000.00, 'Pesanan Diterima', 'Cash on Delivery', 'Berhasil (COD)', 'Kalisa Adzra', 'DARUSSALAM', 'pinggir jalan', '081167082891', '2025-06-02 01:48:06', '2025-06-02 01:48:06'),
(2, 2, 'LOOPIN-FLHTDUP1748854189', 178000.00, 15000.00, 'Pesanan Diterima', 'Cash on Delivery', 'Berhasil (COD)', 'Kalisa Adzra', 'DARUSSALAM', 'rumah pink', '081167082891', '2025-06-02 01:49:49', '2025-06-02 01:49:49'),
(3, 3, 'LOOPIN-S2NCT7J1748856706', 85000.00, 15000.00, 'Pesanan Diterima', 'Cash on Delivery', 'Berhasil (COD)', 'Zalvia Inasya', 'Darussalam', 'Atap rumah hijau', '082341682305', '2025-06-02 02:31:46', '2025-06-02 02:31:46'),
(4, 3, 'LOOPIN-BUNODHL1748856825', 83000.00, 15000.00, 'Pesanan Diterima', 'Cash on Delivery', 'Berhasil (COD)', 'Zalvia Inasya', 'Darussalam', 'Atap rumah hijau', '082341682305', '2025-06-02 02:33:45', '2025-06-02 02:33:45'),
(5, 4, 'LOOPIN-LY8SB1E1748858397', 83000.00, 15000.00, 'Pesanan Diterima', 'Cash on Delivery', 'Berhasil (COD)', 'Zalvia Inasya', 'Lamgugob, Rumah No 4', 'Pagar Hijau', '082341682305', '2025-06-02 02:59:57', '2025-06-02 02:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 'Rok Mini Abu-Abu', 1, 30000.00, '2025-06-02 01:48:06', '2025-06-02 01:48:06'),
(2, 2, 25, 'Sepatu Hitam Putih', 1, 68000.00, '2025-06-02 01:49:49', '2025-06-02 01:49:49'),
(3, 2, 22, 'Slim Dress', 1, 95000.00, '2025-06-02 01:49:49', '2025-06-02 01:49:49'),
(4, 3, 19, 'Gamis Wanita', 1, 70000.00, '2025-06-02 02:31:46', '2025-06-02 02:31:46'),
(5, 4, 25, 'Sepatu Hitam Putih', 1, 68000.00, '2025-06-02 02:33:45', '2025-06-02 02:33:45'),
(6, 5, 25, 'Sepatu Hitam Putih', 1, 68000.00, '2025-06-02 02:59:57', '2025-06-02 02:59:57');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `original_price` decimal(12,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `main_image_filename` varchar(255) DEFAULT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attributes`)),
  `is_new_product` tinyint(1) NOT NULL DEFAULT 0,
  `is_big_deal` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `price`, `original_price`, `stock`, `main_image_filename`, `attributes`, `is_new_product`, `is_big_deal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Baju Training Sport', 'baju-training-sport', 'Baju training sport yang nyaman untuk aktivitas olahraga Anda.', 76000.00, NULL, 50, 'Baju Training Sport.jpg', '{\"size\":\"XL\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(2, 1, 'Jaket Hoodie Pria', 'jaket-hoodie-pria', 'Jaket hoodie pria stylish dan hangat.', 85000.00, NULL, 50, 'Jaket Hoodie.jpg', '{\"size\":\"L\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(3, 1, 'Kaos Pria', 'kaos-pria-row-3', 'Kaos pria bahan berkualitas ukuran XL.', 50000.00, NULL, 50, 'kaospria.png', '{\"size\":\"XL\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(4, 1, 'Kemeja Wanita', 'kemeja-wanita', 'Kemeja wanita formal dan kasual.', 75000.00, NULL, 50, 'kemejawanita.png', '{\"size\":\"M\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(5, 1, 'Kemeja Lengan Panjaang Pria', 'kemeja-lengan-panjang-pria', 'Kemeja lengan panjang pria untuk tampilan rapi.', 55000.00, NULL, 50, 'kemeja.png', '{\"size\":\"XL\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(6, 1, 'Kaos Pria', 'kaos-pria-row-6', 'Kaos pria nyaman ukuran L.', 65000.00, NULL, 50, 'kaos.png', '{\"size\":\"L\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(7, 1, 'Blazer Formal Wanita', 'blazer-formal-wanita', 'Blazer formal wanita untuk acara resmi.', 75000.00, NULL, 50, 'Blazer Formal Wanita.jpg', '{\"size\":\"M\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(8, 1, 'Blouse Putih Strip', 'blouse-putih-strip', 'Blouse putih dengan motif strip yang menawan.', 50000.00, NULL, 50, 'Blouse Putih.png', '{\"size\":\"S\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(9, 1, 'Cardigan Rajut', 'cardigan-rajut', 'Cardigan rajut hangat dan modis.', 75000.00, NULL, 50, 'Cardigan Rajut.jpg', '{\"size\":\"M\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(10, 1, 'Sweater Polos Unisex', 'sweater-polos-unisex', 'Sweater polos unisex, cocok untuk pria dan wanita.', 60000.00, NULL, 50, 'Sweater.jpg', '{\"size\":\"L\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(11, 1, 'Kaos Polos Loopin', 'kaos-polos-loopin', 'Kaos polos nyaman dari Loopin.', 85000.00, NULL, 50, 'kaospria.png', '{\"size\":\"L\",\"color\":\"Hitam\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(12, 2, 'Celana Jogger', 'celana-jogger', 'Celana jogger kasual dan nyaman.', 33000.00, NULL, 50, 'jogger.png', '{\"size\":\"M\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(13, 2, 'Rok Mini Abu-Abu', 'rok-mini-abu-abu', 'Rok mini trendy warna abu-abu untuk gaya kasual.', 30000.00, NULL, 24, 'rokmini.png', '{\"size\":\"S\"}', 1, 0, '2025-06-02 01:47:05', '2025-06-02 01:48:06'),
(14, 2, 'Rok Mini Coklat', 'rok-mini-coklat', 'Rok panjang coklat elegan.', 50000.00, 135000.00, 10, 'rokcoklat.png', '{\"size\":\"S\"}', 1, 1, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(15, 2, 'Celana Jeans Slim Fit', 'celana-jeans-slim-fit', 'Celana jeans model slim fit modern.', 67000.00, NULL, 50, 'Celana Jeans.jpg', '{\"size\":\"XL\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(16, 2, 'Celana Wanita Cream', 'celana-wanita-cream', 'Celana wanita warna cream serbaguna.', 80000.00, NULL, 50, 'celanacream.png', '{\"size\":\"M\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(17, 2, 'Rok Plisket', 'rok-plisket', 'Rok plisket anggun dan flowy.', 35000.00, NULL, 50, 'Rok Plisket.jpg', '{\"size\":\"M\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(18, 2, 'Celana Cutbray', 'celana-cutbray', 'Celana cutbray gaya retro.', 39000.00, NULL, 50, 'cutbray.png', '{\"size\":\"S\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(19, 3, 'Gamis Wanita', 'gamis-wanita', 'Gamis wanita muslimah modern.', 70000.00, NULL, 49, 'gamis.png', '{\"size\":\"XL\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 02:31:46'),
(20, 3, 'One Set Kemeja & Rok Mini', 'one-set-kemeja-rok-mini', 'Setelan kemeja dan rok mini yang chic.', 79000.00, NULL, 50, 'oneset.png', '{\"size\":\"S\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(21, 3, 'Elegant Dress', 'elegant-dress', 'Dress elegan untuk acara spesial.', 99000.00, NULL, 50, 'elegantdress.png', '{\"size\":\"M\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(22, 3, 'Slim Dress', 'slim-dress', 'Dress model slim yang menonjolkan siluet.', 95000.00, NULL, 49, 'slimdress.png', '{\"size\":\"L\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:49:49'),
(23, 3, 'Mini Dress', 'mini-dress', 'Mini dress untuk tampilan yang playful.', 88000.00, NULL, 50, 'Dress Mini.jpg', '{\"size\":\"S\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(24, 3, 'Dress Bunga Musim Panas', 'dress-bunga-musim-panas', 'Dress cantik dengan motif bunga untuk musim panas.', 250000.00, NULL, 15, 'Dress Bunga Musim Panas.jpg', '{\"size\":\"M\",\"color\":\"Kuning Motif\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(25, 4, 'Sepatu Hitam Putih', 'sepatu-hitam-putih', 'Sepatu kasual unisex dengan desain simpel dan klasik, cocok untuk segala gaya. Terbuat dari bahan kanvas berkualitas dan sol karet yang empuk, nyaman dipakai untuk aktivitas harian.', 68000.00, NULL, 17, 'Sepatu Hitam Putih.jpeg', '{\"size\":\"42\",\"color\":\"Hitam Putih\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 02:59:57'),
(26, 4, 'Sneakers', 'sneakers', 'Sneakers trendi untuk gaya sehari-hari.', 85000.00, NULL, 50, 'sneakers.jpg', '{\"size\":\"41\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(27, 4, 'Heels Pantofel', 'heels-pantofel', 'Heels pantofel elegan untuk acara formal.', 95000.00, NULL, 50, 'pantofel.png', '{\"size\":\"38\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(28, 4, 'Sepatu Sekolah', 'sepatu-sekolah', 'Sepatu sekolah nyaman dan tahan lama.', 76000.00, 110000.00, 15, 'Sepatu Sekolah.png', '{\"size\":\"40\"}', 1, 1, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(29, 4, 'Sepatu PDH', 'sepatu-pdh', 'Sepatu PDH berkualitas untuk dinas.', 82000.00, NULL, 50, 'sepatupdh.jpg', '{\"size\":\"44\"}', 1, 0, '2025-06-02 01:47:06', '2025-06-02 01:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_filename`, `order`, `created_at`, `updated_at`) VALUES
(1, 25, 'Belakang.jpeg', 1, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(2, 25, 'Atas.jpeg', 2, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(3, 25, 'Samping.jpeg', 3, '2025-06-02 01:47:06', '2025-06-02 01:47:06'),
(4, 25, 'Bawah.jpeg', 4, '2025-06-02 01:47:06', '2025-06-02 01:47:06');

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
('AAypfoLbFSgX2dl00KtGPb5e8fU28WOWCE6bJtwB', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaklMVmRBakUyekJKVjYxd2lmMVBEa1k5eE1EMndjcGJjRUJPRUcxbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teXByb2ZpbGUvb3JkZXJzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1748871799),
('ff0A8vH8ml3WJunHkCLtgohX46h5wpU1ckoPh4K7', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSlNhUTNVOERqTFZnbDhuMUF3ODA5dlhCdE4ybEhQVmNmNGRoSDVVRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teXByb2ZpbGUvb3JkZXJzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1748857007),
('hrZYxihfnzRcdiEcLCqJuWTdQn6u2Ri5r7kQ8uag', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN2J6RGNTcEc2bVc4bGk1WW04dHdYWHFaMlIxTXZnR3I4ZHNxUzMwTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teXByb2ZpbGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1748858675);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khalisha', 'Adzraini', 'test@example.com', 'Alamat contoh', '2025-06-02 01:47:05', '$2y$12$.CT24gBjIzWfahpfTGy23uD86d7a.qjuf8YY8mN76fJWzYHdcSg6O', 'rrCZmO3RA0', '2025-06-02 01:47:05', '2025-06-02 01:47:05'),
(2, 'Kalisa', 'Adzra', 'kal@gmail.com', 'DARUSSALAM', NULL, '$2y$12$hG6dJG8NI0L.gJuHIzPWKeH/q.9FbHbms2Iyi.rYJwgl.K6rl4z1a', NULL, '2025-06-02 01:47:26', '2025-06-02 01:47:26'),
(3, 'Kalisa', 'Inasya', 'Zalviainasyazulna@gmail.com', 'Darussalam', NULL, '$2y$12$tWgH.kcL14xFXkllp3IqsOXJqrfMgi/m2M4wEpNPzirvX7szukSw2', NULL, '2025-06-02 02:28:37', '2025-06-02 02:34:42'),
(4, 'Khalisha', 'Inasya', 'Zalviakalisa@gmail.com', 'Lamgugob', NULL, '$2y$12$z7r.oO92culY4mBIxI8vc.ybIaWQLDtLvdCd7reDN5ZtXpyYm1O6W', NULL, '2025-06-02 02:56:37', '2025-06-02 03:00:33');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
