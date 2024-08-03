-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 02:30 PM
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
-- Database: `mystoreb4`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands_tb`
--

CREATE TABLE `brands_tb` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands_tb`
--

INSERT INTO `brands_tb` (`brand_id`, `brand_name`) VALUES
(1, 'Samsung'),
(2, 'apple'),
(3, 'google pixel');

-- --------------------------------------------------------

--
-- Table structure for table `categories_tb`
--

CREATE TABLE `categories_tb` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories_tb`
--

INSERT INTO `categories_tb` (`category_id`, `category_name`) VALUES
(1, 'Smart Phones'),
(2, 'Smart Watches'),
(3, 'Laptops'),
(4, 'Tablets');

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_detail` varchar(250) NOT NULL,
  `product_keyword` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(250) NOT NULL,
  `product_image2` varchar(250) NOT NULL,
  `product_image3` varchar(250) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `satatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`product_id`, `product_title`, `product_detail`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `satatus`) VALUES
(1, 'Iphone 13', 'Iphone13 pro', 'ipone13 ifone ipohne aplle smart phone', 1, 2, '10057216_8d6ad931_iPhone13.png', '6999d09d_0a785af5_iPhone_13_Green_PDP_Position-4_Design__SEA.jpg', '00dbf0b9_560e99a6_iPhone_13_Green_PDP_Position-3_Camera__SEA.jpg', '189900', '2024-07-27 16:43:27', 'true'),
(2, 'Google pixel 6 ', 'Google pixel 6 8Gb 256Gb ', 'google pixel smart budjet', 1, 3, 'px1.jpeg', 'px2.jpeg', 'px3.jpeg', '159900', '2024-07-27 16:43:57', 'true'),
(3, 'samsung galaxy watch 2', 'samsung smart watch for men and wome', 'smart watches  smart wootch', 2, 1, 'sm1.jpeg', 'sm2.jpeg', 'sm3.jpeg', '17999', '2024-07-25 13:59:14', 'true'),
(4, 'Apple Ipad Pro 11-inch Wi-fi (2022, 4th Generation', 'Apple Ipad Pro 11-inch Wi-fi (2022, 4th Generation). Brand new  Full set  with m2 bionic chipset', 'ipone ifone ipohne smart phone ipad ipod ipd ipade ', 4, 2, 'ipad2.jpg', 'ipad3.jpg', 'ipad1.jpg', '275999', '2024-07-26 08:54:39', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands_tb`
--
ALTER TABLE `brands_tb`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories_tb`
--
ALTER TABLE `categories_tb`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands_tb`
--
ALTER TABLE `brands_tb`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories_tb`
--
ALTER TABLE `categories_tb`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
