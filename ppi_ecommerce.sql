-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2019 at 06:19 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppi_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(196) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `active`) VALUES
(1, 'Laptop', 'laptop', 1),
(2, 'Mobile', 'mobile', 1),
(3, 'Desktop Computer', 'desktop-computer', 1),
(4, 'Bag', 'bag', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_mobile_number` varchar(32) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `discount_price` decimal(11,2) NOT NULL,
  `paid_amount` decimal(11,2) NOT NULL,
  `payment_status` varchar(32) NOT NULL DEFAULT 'pending',
  `payment_details` text,
  `order_status` varchar(32) NOT NULL DEFAULT 'pending',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `sales_price` decimal(11,2) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `price`, `sales_price`, `photo`, `quantity`, `active`) VALUES
(1, 1, 'Lenovo', 'lenovo', 'This is a awesome Laptop', '1000.00', '1000.00', 'https://dummyimage.com/348x225/#7bcfd6/aaa', 0, 1),
(2, 2, 'Iphone7', 'iphone7', 'This is a awesome phone', '2000.00', '2000.00', 'https://dummyimage.com/348x225/#7bcfd6/aaa', 0, 1),
(3, 2, 'Lg G4', 'lg-g4', 'This is a awesome phone', '1000.00', '1000.00', 'https://dummyimage.com/348x225/#7bcfd6/aaa', 0, 1),
(4, 3, 'Dell', 'dell', 'This is a awesome desktop', '5000.00', '5000.00', 'https://dummyimage.com/348x225/#7bcfd6/aaa', 0, 1),
(5, 3, 'Hp', 'hp', 'This is a awesome desktop', '50000.00', '50000.00', 'https://dummyimage.com/348x225/#7bcfd6/aaa', 0, 1),
(6, 4, 'T-shirt', 't-shirt', 'This is a nice T-shirt', '500.00', '500.00', 'https://dummyimage.com/348x225/#7bcfd6/aaa', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(96) NOT NULL,
  `address` text,
  `files` varchar(128) NOT NULL,
  `mobile_number` varchar(32) DEFAULT NULL,
  `email_varification_token` varchar(128) DEFAULT NULL,
  `email_varify_at` datetime DEFAULT NULL,
  `reset_token` varchar(128) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `address`, `files`, `mobile_number`, `email_varification_token`, `email_varify_at`, `reset_token`, `active`) VALUES
(1, 'rafiqulislam', 'suvo@suvo.com', '$2y$10$4cCsTKvXpT8Cb9eJOlrZke0jc/dgQ/ykn/c/Uel14FhO0RbHXET6m', 'dhaka', 'PPI_5cc8879a109919.489359991556645786.png', '01792166627', NULL, '2019-04-30 17:36:58', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
