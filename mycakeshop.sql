-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 09:13 AM
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
-- Database: `mycakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_area`
--

CREATE TABLE `admin_area` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_area`
--

INSERT INTO `admin_area` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'cjsad@gmail.com', '12252023');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Cakes', '200731042405.jpg'),
(2, 'Pastries', '200731042031.jpeg'),
(3, 'Cookies', '200731042306.jpg'),
(4, 'Cupcakes', '200731042457.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `total_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `delivery_date`, `payment_method`, `total_amount`) VALUES
(1, 1, '2023-12-30', 'Cash', '525'),
(2, 1, '2023-12-30', 'Cash', '1600'),
(3, 2, '2023-01-25', 'Cash', '575'),
(4, 5, '2023-12-30', 'Card', '3900'),
(5, 6, '2024-01-25', 'Cash', '13725'),
(6, 7, '2023-12-30', 'Card', '2400');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_name`, `quantity`) VALUES
(1, 1, 'Black choco', 1),
(2, 1, 'Vanilla', 1),
(3, 2, 'Oreo', 1),
(4, 2, 'Black choco', 1),
(5, 2, 'Black Choco', 1),
(6, 2, 'Black forest', 1),
(7, 3, 'Black choco', 1),
(8, 3, 'Choco chips', 1),
(9, 3, 'Chocolate', 1),
(10, 4, 'Red velvet', 6),
(11, 4, 'Butterscotch', 9),
(12, 5, 'Oreo', 9),
(13, 5, 'Chocolate', 9),
(14, 5, 'Red velvet', 9),
(15, 5, 'Black choco', 9),
(16, 6, 'Black Choco', 3),
(17, 6, 'Black forest', 2),
(18, 6, 'Choco chips', 2),
(19, 6, 'Oreo', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_price`, `product_description`, `product_image`) VALUES
(2, 'Red velvet', 1, '500', 'This cake is inspired by red velvet.', '2007310439020.jpg, 2007310439021.jpg, 2007310439022.jpg'),
(3, 'Black forest', 1, '500', 'It is a simple black forest cake.', '2007310440210.jpg, 2007310440211.jpg, 2007310440212.jpg'),
(4, 'Oreo', 1, '500', 'Made out of oreo.', '2007310441020.jpg, 2007310441021.jpg, 2007310441022.jpg'),
(5, 'Black Choco', 2, '100', 'This is a black chocolate.', '2007310442250.jpg'),
(6, 'Strawberry', 2, '100', 'This is a strawberry.', '2007310443190.jpg'),
(7, 'Butterscotch', 2, '100', 'This is a butterscotch.', '2007310444030.jpg'),
(8, 'Choco chips', 4, '050', 'This a chocolate chip cookie.', '2007310445280.jpg'),
(9, 'Chocolate', 3, '025', 'Chocolate flavoured dessert.', '2007310446340.jpg'),
(10, 'Black Choco', 1, '025', 'Vanilla flavoured dessert.', '2007310448270.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_mobile` varchar(50) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_email`, `user_password`, `user_mobile`, `user_address`) VALUES
(1, 'yoyo', 'yoyo@gmail.com', '246810', '09263275432', 'San Jose'),
(2, 'lolo', 'lolo@gmail.com', 'lolomo', '12345678910', 'lolomo,albay'),
(3, 'strawhat', 'luffy@gmail.com', '101025', '09785643223', 'Wano'),
(4, 'marimo', 'zoro@gmail.com', '12345678', '09785679078', 'Romance Dawn'),
(5, 'cute', 'che@gmail.com', '1234', '09129287924', 'south'),
(6, 'lolomo', 'lolomo01@gmail.com', '1234', '09345212321', 'San Pedro'),
(7, 'rey', 'rey@gmail.com', '36910', '09785644567', 'BUPC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_area`
--
ALTER TABLE `admin_area`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_area`
--
ALTER TABLE `admin_area`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
