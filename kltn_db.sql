-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 07:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kltn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `id_payment` int(10) UNSIGNED NOT NULL,
  `total` int(11) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `status` int(10) NOT NULL,
  `note` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `id_payment`, `total`, `quantity`, `order_date`, `status`, `note`, `created_at`, `updated_at`) VALUES
(27, 30, 1, 200000, 2, '2020-09-13 16:01:33', 1, NULL, '2020-09-13 09:01:33', '2020-10-19 16:16:59'),
(28, 31, 1, 200000, 100, '2020-09-13 16:01:52', 1, NULL, '2020-09-13 09:01:52', '2020-09-13 09:01:52'),
(29, 32, 1, 320000, 1, '2020-09-13 16:07:33', 1, NULL, '2020-09-13 09:07:33', '2020-09-13 09:07:33'),
(30, 33, 1, 120000, 2, '2020-09-13 16:10:01', 1, NULL, '2020-09-13 09:10:01', '2020-09-13 09:10:01'),
(31, 34, 1, 200000, 3, '2020-09-13 16:11:03', 1, NULL, '2020-09-13 09:11:03', '2020-09-13 09:11:03'),
(32, 35, 1, 200000, 10, '2020-09-13 16:12:24', 1, NULL, '2020-09-13 09:12:24', '2020-09-13 09:12:24'),
(33, 36, 1, 2720000, 14, '2020-10-17 14:36:12', 1, NULL, '2020-10-17 07:36:12', '2020-10-17 07:36:12'),
(39, 44, 1, 200000, 1, '2020-10-18 15:20:08', 1, NULL, '2020-10-18 08:20:08', '2020-10-18 08:20:08'),
(40, 45, 1, 200000, 1, '2020-10-19 09:17:25', 1, NULL, '2020-10-19 02:17:25', '2020-10-19 02:17:25'),
(41, 46, 1, 200000, 1, '2020-10-19 09:19:31', 1, NULL, '2020-10-19 02:19:31', '2020-10-19 02:19:31'),
(42, 47, 1, 35000, 1, '2020-10-19 15:33:24', 1, NULL, '2020-10-19 08:33:24', '2020-10-19 08:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(17, 27, 31, 200000, 1, '2020-09-13 09:01:33', '2020-09-13 09:01:33'),
(18, 28, 31, 200000, 1, '2020-09-13 09:01:52', '2020-09-13 09:01:52'),
(19, 29, 31, 200000, 1, '2020-09-13 09:07:33', '2020-09-13 09:07:33'),
(20, 29, 30, 120000, 1, '2020-09-13 09:07:33', '2020-09-13 09:07:33'),
(21, 30, 30, 120000, 1, '2020-09-13 09:10:01', '2020-09-13 09:10:01'),
(22, 31, 31, 200000, 1, '2020-09-13 09:11:03', '2020-09-13 09:11:03'),
(23, 32, 31, 200000, 1, '2020-09-13 09:12:24', '2020-09-13 09:12:24'),
(24, 33, 31, 2600000, 13, '2020-10-17 07:36:12', '2020-10-17 07:36:12'),
(25, 33, 30, 120000, 1, '2020-10-17 07:36:12', '2020-10-17 07:36:12'),
(31, 39, 31, 200000, 1, '2020-10-18 08:20:08', '2020-10-18 08:20:08'),
(32, 40, 31, 200000, 1, '2020-10-19 02:17:25', '2020-10-19 02:17:25'),
(33, 41, 31, 200000, 1, '2020-10-19 02:19:31', '2020-10-19 02:19:31'),
(34, 42, 1, 35000, 1, '2020-10-19 08:33:24', '2020-10-19 08:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `Content` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `parent_id` int(10) NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `gender`, `address`, `phone_number`, `id_user`, `created_at`, `updated_at`) VALUES
(30, 'nguyentudangkhoa', NULL, NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', NULL, '2020-09-13 09:01:32', '2020-09-13 09:01:32'),
(31, 'nguyentudangkhoa', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', NULL, '2020-09-13 09:01:52', '2020-09-13 09:01:52'),
(32, 'nguyentudangkhoa', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', NULL, '2020-09-13 09:07:33', '2020-09-13 09:07:33'),
(33, 'nguyentudangkhoa', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', NULL, '2020-09-13 09:10:01', '2020-09-13 09:10:01'),
(34, 'nguyentudangkhoa', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', NULL, '2020-09-13 09:11:03', '2020-09-13 09:11:03'),
(35, 'nguyentudangkhoa', 'khoakute1997@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', NULL, '2020-09-13 09:12:24', '2020-09-13 09:12:24'),
(36, 'nguyentudangkhoa', 'khoakute1997@gmail.com', NULL, 'asdasdasd', '0389643555', 9, '2020-10-17 07:36:12', '2020-10-17 07:36:12'),
(37, 'nguyentudangkhoa', 'khoakute1997@gmail.com', NULL, 'adasda', '0389643555', 9, '2020-10-17 07:36:38', '2020-10-17 07:36:38'),
(38, 'nguyentudangkhoa', 'khoakute1997@gmail.com', NULL, 'adasda', '0389643555', 9, '2020-10-17 07:36:41', '2020-10-17 07:36:41'),
(39, 'admin', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', 4, '2020-10-17 17:09:16', '2020-10-17 17:09:16'),
(40, 'admin', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', 4, '2020-10-17 17:12:20', '2020-10-17 17:12:20'),
(41, 'admin', 'khoakute1997@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', 4, '2020-10-17 17:15:54', '2020-10-17 17:15:54'),
(42, 'admin', 'admin@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', 4, '2020-10-17 17:16:44', '2020-10-17 17:16:44'),
(43, 'admin', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', 4, '2020-10-17 17:17:14', '2020-10-17 17:17:14'),
(44, 'Thay Đăng', 'pvdang@ntt.edu.vn', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0903648212', NULL, '2020-10-18 08:20:08', '2020-10-18 08:20:08'),
(45, 'admin', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', 4, '2020-10-19 02:17:25', '2020-10-19 02:17:25'),
(46, 'admin', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', 4, '2020-10-19 02:19:31', '2020-10-19 02:19:31'),
(47, 'admin', 'nguyentudangkhoa@gmail.com', NULL, '75 Võ Hữu, Phan Thiết, Bình Thuận', '0389643555', 4, '2020-10-19 08:33:24', '2020-10-19 08:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `description_images`
--

CREATE TABLE `description_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `images` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `description_images`
--

INSERT INTO `description_images` (`id`, `images`, `id_product`, `created_at`, `updated_at`) VALUES
(1, 's5.jpg', 39, '2020-07-28 06:38:58', '2020-07-28 06:38:58'),
(2, 's5.jpg', 39, '2020-07-28 06:39:01', '2020-07-28 06:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `discount_info`
--

CREATE TABLE `discount_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `promotion_price` int(11) NOT NULL,
  `begin_at` date NOT NULL,
  `end_at` date NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `discount_info`
--

INSERT INTO `discount_info` (`id`, `promotion_price`, `begin_at`, `end_at`, `id_product`, `status`, `created_at`, `updated_at`) VALUES
(1, 10000, '2020-07-26', '2020-08-12', 39, 1, '2020-07-26 07:16:09', '2020-07-26 07:16:09'),
(2, 35000, '2020-07-26', '2020-08-07', 23, 1, '2020-07-26 07:17:01', '2020-07-26 07:17:01'),
(3, 10000, '2020-07-26', '2020-08-09', 24, 1, '2020-07-26 07:17:48', '2020-07-26 07:17:48'),
(4, 15000, '2020-07-26', '2020-08-14', 45, 1, '2020-07-26 07:18:23', '2020-07-26 15:51:56'),
(5, 20000, '2020-07-26', '2020-08-11', 10, 1, '2020-07-26 07:18:54', '2020-07-26 07:18:54'),
(6, 40000, '2020-07-26', '2020-08-14', 25, 1, '2020-07-26 07:19:50', '2020-07-26 07:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `group_type`
--

CREATE TABLE `group_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `group_type`
--

INSERT INTO `group_type` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Thực phẩm', 1, '2020-07-25 05:16:57', '2020-10-17 14:42:45'),
(2, 'Vật dụng gia đình', 1, '2020-07-25 05:17:16', '2020-07-25 05:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'COD', 1, '2020-09-13 06:49:32', '2020-09-13 06:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `images` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `description` varchar(1000) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `id_unit` int(10) UNSIGNED DEFAULT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `images`, `quantity`, `status`, `description`, `id_unit`, `id_type`, `created_at`, `updated_at`) VALUES
(1, 'Nước rửa chén Vim', 35000, 'a1.jpg', 99, 1, NULL, 6, 16, '2020-07-25 06:05:01', '2020-10-19 08:33:24'),
(2, 'Nước tẩy rửa bồn cầu Harpic', 40000, 'a2.jpg', 10, 1, NULL, 6, 17, '2020-07-25 06:05:52', '2020-10-17 07:12:49'),
(3, 'Nước xả vải Comfort', 70000, 'a3.jpg', 100, 1, NULL, 6, 23, '2020-07-25 06:06:40', '2020-07-25 06:06:40'),
(4, 'Sáp thơm Odonil', 49000, 'a4.jpg', 100, 1, NULL, 1, 19, '2020-07-25 06:07:30', '2020-07-25 06:07:30'),
(5, 'Bột giặt Suft exel matic', 60000, 'a5.jpg', 100, 1, NULL, 1, 23, '2020-07-25 06:12:16', '2020-07-25 06:12:16'),
(6, 'Dầu gội Sunsilk', 120000, 'a6.jpg', 100, 1, NULL, 6, 25, '2020-07-25 06:16:58', '2020-07-25 06:16:58'),
(7, 'Bộ lau sàn nhà', 200000, 'a7.jpg', 100, 1, NULL, 4, 17, '2020-07-25 06:19:01', '2020-07-25 06:19:01'),
(8, 'Dụng cụ đẩy nước', 120000, 'a8.jpg', 100, 1, NULL, 7, 17, '2020-07-25 06:21:34', '2020-07-25 06:21:34'),
(9, 'Chổi quét bụi', 12000, 'a9.jpg', 100, 1, NULL, 7, 17, '2020-07-25 06:24:39', '2020-07-25 06:24:39'),
(10, 'Dung dịch diệt muỗi All Out', 30000, 'a10.jpg', 100, 1, NULL, 1, 26, '2020-07-25 06:28:26', '2020-07-25 06:28:26'),
(11, 'Dream Catcher', 30000, 'a11.jpg', 100, 1, NULL, 8, 27, '2020-07-25 06:30:36', '2020-07-25 06:30:36'),
(12, 'Nước vệ sinh kính', 45000, 'a12.jpg', 100, 1, NULL, 6, 16, '2020-07-25 06:33:31', '2020-07-25 06:33:31'),
(13, 'Bánh Lays', 5000, 'd2.jpg', 200, 1, NULL, 5, 12, '2020-07-25 06:35:20', '2020-07-25 06:35:20'),
(14, 'Dairy Milk', 30000, 'd3.jpg', 100, 1, NULL, 5, 12, '2020-07-25 06:36:51', '2020-07-25 06:36:51'),
(15, 'Gạo Trắng', 15000, 'k1.jpg', 100, 1, NULL, 2, 10, '2020-07-25 07:37:58', '2020-07-25 07:37:58'),
(18, 'Bột bánh Maiyas Gulab Jamun', 120000, 'k2.jpg', 100, 1, NULL, 3, 2, '2020-07-25 07:43:23', '2020-07-25 07:43:23'),
(19, 'Bột ớt Organicana', 50000, 'k4.jpg', 100, 1, NULL, 5, 6, '2020-07-25 07:43:23', '2020-07-25 07:43:23'),
(20, 'Trà xanh Lipton', 70000, 'k3.jpg', 30000, 1, NULL, 1, 3, '2020-07-25 07:45:00', '2020-07-25 07:45:00'),
(21, 'Bột tiêu đen', 35000, 'k5.jpg', 100, 1, NULL, 5, 6, '2020-07-25 07:50:59', '2020-07-25 07:50:59'),
(22, 'Hạt Chataka', 25000, 'k6.jpg', 100, 1, NULL, 5, 6, '2020-07-25 07:53:23', '2020-07-25 07:53:23'),
(23, 'Bánh Diet Rusk', 55000, 'k7.jpg', 200, 1, NULL, 5, 1, '2020-07-25 07:54:31', '2020-07-25 07:54:31'),
(24, 'Bánh Socola Fills', 15000, 'k8.jpg', 200, 1, NULL, 5, 5, '2020-07-25 07:56:44', '2020-07-25 07:56:44'),
(25, 'Bánh Amul\'s India', 50000, 'k9.jpg', 100, 1, NULL, 1, 1, '2020-07-25 07:58:20', '2020-07-25 07:58:20'),
(26, 'Kẹo so cô la Snickers ', 17000, 'k10.jpg', 200, 1, NULL, 5, 5, '2020-07-25 07:59:13', '2020-07-25 07:59:13'),
(27, 'Mứt trái cây kissan', 55000, 'k11.jpg', 100, 1, NULL, 9, 7, '2020-07-25 08:01:28', '2020-07-25 08:01:28'),
(28, 'Mứt rau củ', 60000, 'k12.jpg', 100, 1, NULL, 9, 7, '2020-07-25 08:02:16', '2020-07-25 08:02:16'),
(29, 'Hạt hạnh nhân', 250000, 'm1.jpg', 100, 1, NULL, 2, 28, '2020-07-25 08:04:53', '2020-07-25 08:04:53'),
(30, 'Hạt điều', 120000, 'm2.jpg', 100, 1, NULL, 2, 28, '2020-07-25 08:06:12', '2020-07-25 08:06:12'),
(31, 'Hạt dẽ', 200000, 'm3.jpg', 100, 1, NULL, 2, 28, '2020-07-25 08:07:20', '2020-07-25 08:07:20'),
(32, 'Dầu thực vật Fortune', 45000, 'mk6.jpg', 100, 1, NULL, 6, 13, '2020-07-25 08:08:23', '2020-07-25 08:08:23'),
(33, 'Mì YiPPee', 30000, 'mk7.jpg', 100, 1, NULL, 5, 4, '2020-07-25 08:09:26', '2020-07-25 08:09:26'),
(34, 'Nui', 45000, 'mk8.jpg', 100, 1, NULL, 5, 4, '2020-07-25 08:12:37', '2020-07-25 08:12:37'),
(35, 'Bột Aashirvaad', 60000, 's1.jpg', 100, 1, NULL, 3, 10, '2020-07-25 08:18:32', '2020-07-25 08:18:32'),
(36, 'Đường Madhur', 45000, 's2.jpg', 100, 1, NULL, 5, 6, '2020-07-25 08:19:47', '2020-07-25 08:19:47'),
(37, 'Nước giặt Suft', 45000, 's3.jpg', 100, 1, NULL, 6, 16, '2020-07-25 08:21:02', '2020-07-25 08:21:02'),
(38, 'Tương cà', 20000, 's4.jpg', 100, 1, NULL, 5, 11, '2020-07-25 08:21:44', '2020-07-25 08:21:44'),
(39, 'Nước ngọt Sprite', 15000, 's5.jpg', 100, 1, NULL, 6, 3, '2020-07-25 08:23:01', '2020-07-25 08:23:01'),
(40, 'Sửa tắm Fair & Lovely', 120000, 's6.jpg', 100, 1, NULL, 6, 25, '2020-07-25 08:24:18', '2020-07-25 08:24:18'),
(41, 'sửa tắm gohnson', 25000, 's7.jpg', 100, 1, NULL, 6, 25, '2020-07-25 08:25:39', '2020-07-25 08:25:39'),
(42, 'Bánh Sô cô la', 20000, 's8.jpg', 100, 1, NULL, 5, 5, '2020-07-25 08:27:17', '2020-07-25 08:27:17'),
(43, 'Mascara Eyeconic ', 270000, 's9.jpg', 90, 1, NULL, 7, 25, '2020-07-25 08:28:34', '2020-07-25 08:28:34'),
(44, 'Xịt khử mùi phòng amipur', 100000, 'se1.jpg', 200, 1, NULL, 6, 19, '2020-07-25 08:30:23', '2020-07-25 08:30:23'),
(45, 'Dầu ăn Freedom', 20000, 'mk4.jpg', 100, 1, NULL, 5, 13, '2020-07-25 09:14:15', '2020-07-25 09:14:15'),
(46, 'Dầu ăn Saffoia', 120000, 'mk5.jpg', 100, 1, NULL, 5, 13, '2020-07-25 09:15:12', '2020-07-25 09:15:12'),
(47, 'Mì knorr', 120000, 'mk9.jpg', 100, 1, NULL, 5, 4, '2020-07-25 10:10:05', '2020-07-25 10:10:05'),
(48, 'Dove', 320000, 'download.jpg', 100, 1, NULL, 6, 25, '2020-10-03 16:28:10', '2020-10-03 16:28:10'),
(49, 'Tresemme', 320000, 'download (1).jpg', 100, 1, NULL, 6, 25, '2020-10-03 17:02:24', '2020-10-03 17:02:24'),
(50, 'Gel rửa tay Gross', 160000, 'download (2).jpg', 100, 1, NULL, 6, 25, '2020-10-03 17:37:50', '2020-10-03 17:37:50'),
(51, 'Gel rửa tay lifeboy', 320000, 'download (3).jpg', 100, 1, NULL, 6, 25, '2020-10-03 17:40:51', '2020-10-03 17:40:51'),
(52, 'Bộ giặt omo', 180000, 'download (4).jpg', 100, 1, NULL, 5, 23, '2020-10-04 06:50:03', '2020-10-04 06:50:03'),
(53, 'Bột giặt Surf', 160000, 'download (5).jpg', 12, 1, NULL, 5, 23, '2020-10-04 06:53:35', '2020-10-04 06:53:35'),
(54, 'Cafe G7', 160000, 'cafe.jpg', 100, 1, NULL, 1, 3, '2020-10-10 14:33:22', '2020-10-10 14:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_group_type` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `id_group_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bánh', 1, 1, '2020-07-25 05:25:57', '2020-10-18 15:28:03'),
(2, 'Nguyên liệu làm bánh', 1, 1, '2020-07-25 05:27:18', '2020-10-18 15:28:34'),
(3, 'Cà phê, trà và thức uống khác', 1, 1, '2020-07-25 05:27:56', '2020-07-25 05:27:56'),
(4, 'Mì, Pasta', 1, 1, '2020-07-25 05:28:37', '2020-07-25 05:28:37'),
(5, 'Đồ ngọt, socola', 1, 1, '2020-07-25 05:29:33', '2020-07-25 05:29:33'),
(6, 'Gia vị', 1, 1, '2020-07-25 05:30:26', '2020-07-25 05:30:26'),
(7, 'Mứt, mật ong', 1, 1, '2020-07-25 05:31:47', '2020-07-25 05:31:47'),
(8, 'Các loại dưa', 1, 1, '2020-07-25 05:32:05', '2020-07-25 05:32:05'),
(9, 'Thực phẩm khô', 1, 1, '2020-07-25 05:32:37', '2020-07-25 05:32:37'),
(10, 'Gạo, bột, các loại đậu', 1, 1, '2020-07-25 05:33:55', '2020-07-25 05:33:55'),
(11, 'Nước chấm', 1, 1, '2020-07-25 05:35:46', '2020-07-25 05:35:46'),
(12, 'Thức ăn nhẹ', 1, 1, '2020-07-25 05:36:30', '2020-07-25 05:36:30'),
(13, 'Dầu ăn, giấm', 1, 1, '2020-07-25 05:37:26', '2020-07-25 05:37:26'),
(14, 'Các loại thịt và hải sản', 1, 1, '2020-07-25 05:38:54', '2020-07-25 05:38:54'),
(15, 'Vật dụng nhà bếp', 2, 1, '2020-07-25 05:40:56', '2020-07-25 05:40:56'),
(16, 'Chất tẩy rửa', 2, 1, '2020-07-25 05:41:31', '2020-07-25 05:41:31'),
(17, 'Dụng cụ vệ sinh', 2, 1, '2020-07-25 05:42:16', '2020-07-25 05:42:16'),
(18, 'Túi dựng rác', 2, 1, '2020-07-25 05:43:22', '2020-07-25 05:43:22'),
(19, 'Vật dụng khử mùi', 2, 1, '2020-07-25 05:45:19', '2020-07-25 05:45:19'),
(20, 'Phụ kiện vệ sinh', 2, 1, '2020-07-25 05:46:14', '2020-07-25 05:46:14'),
(21, 'Đồ nhựa', 2, 1, '2020-07-25 05:48:22', '2020-07-25 05:48:22'),
(23, 'Nước giặt, xả quần áo', 2, 1, '2020-07-25 06:09:33', '2020-07-25 06:09:33'),
(25, 'Dầu gội, sữa tắm và vật dụng cá nhân khác', 2, 1, '2020-07-25 06:13:57', '2020-07-25 06:13:57'),
(26, 'Diệt côn trùng', 2, 1, '2020-07-25 06:26:05', '2020-07-25 06:26:05'),
(27, 'Vật dụng khác...', 2, 1, '2020-07-25 06:29:22', '2020-07-25 06:29:22'),
(28, 'Các loại hạt', 1, 1, '2020-07-25 06:29:34', '2020-07-25 06:29:34'),
(29, 'Thực phẩm khác...', 1, 1, '2020-07-25 08:10:38', '2020-07-25 08:10:38'),
(32, 'Hạt', 1, 1, '2020-10-18 02:19:14', '2020-10-18 02:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `star_point` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Khách hàng', 1, '2020-08-02 03:49:35', '2020-08-02 03:49:35'),
(2, 'Nhân viên', 1, '2020-08-02 03:49:52', '2020-08-02 03:49:52'),
(3, 'Admin', 1, '2020-08-02 03:50:09', '2020-08-02 03:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hộp', 1, '2020-07-25 05:55:47', '2020-07-25 05:55:47'),
(2, 'G', 1, '2020-07-25 05:57:09', '2020-07-25 05:57:09'),
(3, 'Bao', 1, '2020-07-25 05:57:28', '2020-07-25 05:57:28'),
(4, 'Bộ', 1, '2020-07-25 05:57:55', '2020-07-25 05:57:55'),
(5, 'Gói', 1, '2020-07-25 05:58:59', '2020-07-25 05:58:59'),
(6, 'Chai', 1, '2020-07-25 06:01:46', '2020-07-25 06:01:46'),
(7, 'Cây', 1, '2020-07-25 06:20:46', '2020-07-25 06:20:46'),
(8, 'Cái', 1, '2020-07-25 06:30:58', '2020-07-25 06:30:58'),
(9, 'Lọ', 1, '2020-07-25 08:00:41', '2020-07-25 08:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `id_role` int(10) UNSIGNED DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `gender` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `total_buy` int(10) NOT NULL DEFAULT 0,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `id_role`, `status`, `gender`, `phone`, `total_buy`, `login_time`, `logout_time`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Nguyễn Từ Đăng Khoa', 'nguyentudangkhoa@gmail.com', '$2y$10$ETT7p6CsL8xVm6rX7jdXj.aoXGx6HZO7UMfIWjn5TmNrd.tBg9co2', 'avatar.png', 1, 1, 'nam', '0389643555', 0, '2020-10-19 09:33:06', '2020-10-19 09:42:14', 'WxTjjG6G1cHKR6PFsAqMktnqyFN4Mksyj1U9ek8Eslw8lI5P5FjfMNS3uRWu', '2020-08-03 03:32:02', '2020-10-19 02:42:14'),
(4, 'admin', 'admin@gmail.com', '$2y$10$ixKszR6DnemkVDNFOQPJ0uk7LLL45TPMgCzmXkfsFgAlK3ZSCz6YC', NULL, 3, 1, 'nam', NULL, 8, '2020-10-19 15:25:52', '2020-10-19 09:27:35', 'Fv5Hlhoq2pZrUGvLsNPtYab7jNcVSs23Ldx1gcNrG1iNj5y8i80tKeaxDEyT', '2020-08-03 13:33:46', '2020-10-19 08:33:24'),
(5, 'nguyentudangkhoa', 'nguyentudangkhoa1997@gmail.com', '$2y$10$KkWkcwvc.EvKTMxK0VIPGen9J0mPzyiS/zeKT0ObJHMmvMCxRDtm.', NULL, 1, 1, 'nam', '0389643555', 0, '2020-09-12 12:30:19', NULL, NULL, '2020-08-03 15:38:45', '2020-09-12 05:30:19'),
(9, 'nguyentudangkhoa', 'khoakute1997@gmail.com', '$2y$10$KYUy4uCO79QN7MatZHe6G.jTTLiRVJF/UGraLKdlUAvKbt8fBshTq', NULL, 1, 1, 'nam', '0389643555', 3, '2020-10-17 14:37:53', '2020-10-17 14:39:33', 'ePNEPyXKhw7Qz63fUSqMN6goPmX4LzUzbg3oONz9mdkk4DHoAD05K4jhivBP', '2020-08-19 06:19:05', '2020-10-17 07:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `address`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '75 Võ Hữu, Phan Thiết, Bình Thuận', 2, '2020-09-08 07:27:36', '2020-09-08 07:27:36'),
(2, '164/10/24 Thanh Loc 09, Ho Chi Minh', 2, '2020-09-22 15:17:01', '2020-09-22 15:17:01'),
(3, 'Phan thiết, Bình thuận', 2, '2020-10-10 10:34:13', '2020-10-10 10:34:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Bill_payment` (`id_payment`),
  ADD KEY `FK_Bill_Customer` (`id_customer`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Bill_detail_Bills` (`id_bill`),
  ADD KEY `FK_Bill_details_Product` (`id_product`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Comment_Product` (`id_product`),
  ADD KEY `FK_Comment_User` (`id_user`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Customer_User` (`id_user`);

--
-- Indexes for table `description_images`
--
ALTER TABLE `description_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Description_images_product` (`id_product`);

--
-- Indexes for table `discount_info`
--
ALTER TABLE `discount_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Discount_info_Product` (`id_product`);

--
-- Indexes for table `group_type`
--
ALTER TABLE `group_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Product_Product_Type` (`id_type`),
  ADD KEY `FK_Product_Unit` (`id_unit`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Product_Type_Goup_Type` (`id_group_type`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Rating_Users` (`id_user`),
  ADD KEY `FK_Rating_Product` (`id_product`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Users_Roles` (`id_role`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_User_address_User` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `description_images`
--
ALTER TABLE `description_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discount_info`
--
ALTER TABLE `discount_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `group_type`
--
ALTER TABLE `group_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `FK_Bill_Customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `FK_Bill_payment` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `FK_Bill_Billdetails` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `FK_Bill_details_Product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_Comment_Product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_Comment_User` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_Customer_User` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `description_images`
--
ALTER TABLE `description_images`
  ADD CONSTRAINT `FK_Description_images_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `discount_info`
--
ALTER TABLE `discount_info`
  ADD CONSTRAINT `FK_Discount_info_Product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_Product_Type` FOREIGN KEY (`id_type`) REFERENCES `product_type` (`id`),
  ADD CONSTRAINT `FK_Product_Unit` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id`);

--
-- Constraints for table `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `FK_Product_Type_Goup_Type` FOREIGN KEY (`id_group_type`) REFERENCES `group_type` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_Rating_Product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_Rating_Users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Fk_Users_Roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `FK_User_address_User` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
