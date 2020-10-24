-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 23, 2020 at 07:00 AM
-- Server version: 8.0.18
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456'),
(2, 'admin1234', '$2y$10$H8075h7ol8WPVeax2J4Lv.S2a/3eELTrH.RQHUGqFmHv8ZB.U/u4y'),
(3, 'josherias', '$2y$10$C8oMA85kEjEyYv/hK4M4Mefr0/pN7WPbaGZ14tSdl0m5Ziatk6Xq6'),
(4, 'josherias', '$2y$10$P3XFLEASMjA5FQ5syjG5seN8tQ/es7Va6aNhyGQEw6i6.6KHiJ7VC');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`) VALUES
(33, 60, 7),
(35, 44, 7),
(37, 52, 8),
(39, 49, 8),
(51, 62, 8),
(53, 66, 8),
(57, 55, 8),
(58, 65, 8),
(82, 54, 29),
(83, 67, 8),
(84, 67, 29),
(85, 57, 29),
(86, 57, 29),
(92, 44, 0),
(93, 62, 33),
(94, 65, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `category_image` varchar(50) NOT NULL,
  `category_info` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `category_image`, `category_info`) VALUES
(1, 'Phones', '1.png', 'Over 200 phones new'),
(2, 'Shoes', 'air-zoom-pegasus-37-running-shoe-qVSCSr (2).jpg', '100 shoe brands plus'),
(3, 'Clothes', 'sportswear-tech-fleece-hoodie-fB0NZ8.jpg', '500 plus brands');

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

DROP TABLE IF EXISTS `login_tokens`;
CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` char(64) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`) VALUES
(75, 'e6328a5c0ea9343df3cffaebf89ea71407e70651', 33),
(76, '076adae9b47b3c9cff99a156d2491a2dfb168990', 33),
(77, '9719529e205295a22300637b44910ed9c11cf60a', 33),
(78, '1c2276f76c3c4f59e9f9f986fd2c51d5d8bcab3e', 33);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `brand` varchar(50) NOT NULL,
  `in_stock` int(100) NOT NULL,
  `unit_price` int(100) NOT NULL,
  `product_image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `seller` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `seller_contact` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_details` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_specification` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `category` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `brand`, `in_stock`, `unit_price`, `product_image`, `seller`, `seller_contact`, `product_details`, `product_specification`, `created_at`, `category`) VALUES
(44, 'Samsung Galax', 'Samsung', 5, 200, '11.png', 'Samsung', '0753473842', 'Its AV input and output function for easy viewing. Suitable for your family, for sending gift. You can enjoy all your favourite films and content with this DVD Player. Powerfully versatile, the player supports not only multi region DVDs, but also CDs, and music, picture and video from USB. Also includes Multi-angle viewing and zoom, with full function remote.', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'July-03-2020 13:24:12', 'Phones'),
(45, 'Samsung Galaxy S10', 'Samsung', 2, 500, '3.png', 'Samsung', '0753473842', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 18:25:08', 'Phones'),
(46, 'Infinix Hot 6', 'Infinix', 4, 300, '6.png', 'Infinix', '0753473842', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'July-03-2020 13:24:40', 'Phones'),
(47, 'Infinix Hot 3', 'Infinix', 9, 300, '13.png', 'Infinix', '0753473842', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 18:26:46', 'Phones'),
(48, 'Infinix Hot 5', 'Infinix', 9, 300, '8.png', 'Infinix', '0753473842', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 18:27:17', 'Phones'),
(49, 'Redmi', 'Redmi', 16, 286, '4.png', 'Redmi', '0753473842', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:13:15', 'Phones'),
(50, 'Redmi Note 5', 'Redmi', 8, 600, '11.png', 'Redmi', '0753473842', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:13:42', 'Phones'),
(51, 'Iphone 6', 'Apple', 4, 1000, '15.png', 'Apple', '0753473842', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:14:41', 'Phones'),
(52, 'Iphone Plus', 'Apple', 11, 1044, '14.png', 'Apple', '0753473842', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:15:25', 'Phones'),
(53, 'Nike Zoom', 'Nike', 100, 1200, 'air-max-270-shoe-nnTrqDGR.jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:17:57', 'Shoes'),
(54, 'Air Max', 'Nike', 116, 1220, 'react-miler-running-shoe-Rl20rZ.jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:18:55', 'Shoes'),
(55, 'Kyrie 5', 'Nike', 116, 7000, 'custom-kyrie-6-by-you.jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:19:55', 'Shoes'),
(56, 'KD', 'Nike', 116, 7000, 'custom-kyrie-6-by-you (1).jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:20:43', 'Shoes'),
(57, 'Mens 2 Pack', 'Addidas', 145, 3000, 'dri-fit-victory-golf-polo-StkXZ0 (1).jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:22:17', 'Clothes'),
(58, 'Ladies Gym Wear', 'Addidas', 145, 2977, 'fe-nom-flyknit-high-support-sports-bra-3mG1OD (2).jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:22:58', 'Clothes'),
(59, 'Ladies Gym Wear 2', 'Nike', 45, 189, 'swoosh-support-1-piece-pad-sports-bra-mx9N8j.jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:23:33', 'Clothes'),
(60, 'Mens Polo', 'Polo', 56, 90, 'dri-fit-academy-football-pants-M0G9Jp.jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:24:19', 'Clothes'),
(61, 'Mens Shorts', 'Addidas', 50, 600, '600x600.jpeg', 'Addidas', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:25:11', 'Clothes'),
(62, 'Korean Jersy', 'Addidas', 50, 600, 'korea-2020-stadium-away-football-shirt-tP2N8n.jpg', 'Addidas', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:25:41', 'Clothes'),
(63, 'Ladies Bra', 'Nike', 70, 600, 'fe-nom-flyknit-high-support-sports-bra-3mG1OD (1).jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:26:42', 'Clothes'),
(64, 'Army Trousers', 'Nike', 70, 600, 'sb-flex-ftm-camo-skate-cargo-trousers-6PFK98.jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:27:15', 'Clothes'),
(65, 'Jordan Flight', 'Nike', 50, 600, 'jordan-flight-legend-shoe-JkTGBwdG.jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:29:24', 'Shoes'),
(66, 'Pair Sneaker Carpets', 'Nike', 50, 30, 'air-zoom-pegasus-37-running-shoe-qVSCSr (4).jpg', 'Nike', '0789456734', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'Response frequency:40Hz-22Khz SNR:＞90dB Power supply:AC 110V-240V 50/60Hz Power:15W Operating temperature:5℃ to 30℃ Measurement:320*200*38mm Player screen size:1 inch Input:AV, USB3.0, USB2.0, MMC/SD/MS 3 in 1 card reader Breakpoint memory:support A-B cycle:suppport Multiple playback:DVD video/ DVD+RW/-RW/+R/-R CD Audio/CD-R/-RW/VCD/SVCD JEPG/MP3/WMA/Dual Disc JPEG Viewer/Picture Zoom', 'June-17-2020 19:30:07', 'Shoes'),
(67, 'Ladies Footwear', 'Nike', 5, 500, 'air-zoom-pegasus-37-running-shoe-qVSCSr (2).jpg', 'Nike', '0789456734', 'This is brand New from the ladies collection', 'This is brand New from the ladies collection', 'June-18-2020 09:10:21', 'Food'),
(68, 'Shoe Nike', 'Nike', 5, 5, 'air-zoom-pegasus-37-running-shoe-qVSCSr (1).jpg', 'Nike', '0753473842', 'New shoes', 'New shoes', 'June-18-2020 09:51:20', ''),
(69, 'newproduct', 'Apple', 5, 17, 'fe-nom-flyknit-high-support-sports-bra-3mG1OD.jpg', 'Josh', '0753473842', 'This is a new product', 'of course its new', 'July-01-2020 14:37:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `created_at`) VALUES
(8, 'foreign', 'josh', 'josherias', '$2y$10$lpEw8ASnGJ24pjPwqPInXO0Rdaw.Bz5ZNwQNz0UXkFUeEU8TRUyjq', 'test@gmail.com', 'June-26-2020 15:07:30'),
(29, 'Lubuulwa', 'Elias', 'admin', '$2y$10$J8AmFEQLmrtNJBx7ctD95Og723YzR5jGIWvZcJKHyoURsKOMDd8Bu', 'admin@skyler.com', 'July-03-2020 15:22:32'),
(32, 'Lubuulwa', 'admin', 'adminjeko', '$2y$10$zvvfXptUL59ubwk1pHvdWenN4wfkBgJ.cJJfvbIIonDty3VKiz/Dy', 'jehojosh@gmail.com', 'July-08-2020 12:49:39'),
(33, 'Josh', 'Erias', 'josh2000', '$2y$10$uz9Dq/cw0Ukzv7NhEk5Axe27PRDZrkCoFp/v9NeX6L3.63pgXNvXu', 'joshepi@yahoo.com', 'July-08-2020 12:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`cart_id`, `product_id`, `user_id`) VALUES
(28, 53, 7),
(29, 66, 7),
(30, 61, 7),
(24, 65, 8),
(26, 68, 8),
(27, 51, 8),
(69, 51, 29),
(70, 51, 29),
(72, 51, 29),
(73, 51, 29),
(74, 51, 29),
(75, 51, 29),
(71, 69, 29),
(56, 61, 8),
(77, 61, 29),
(78, 61, 29),
(38, 50, 8),
(79, 50, 29),
(90, 46, 0),
(91, 50, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
