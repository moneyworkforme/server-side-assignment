-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 06:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `customer_name`, `email`, `password`, `phone_number`, `address`, `reg_date`) VALUES
(1, 'lee', 'leeteckjunn@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '2024-03-16 08:31:41'),
(2, 'jia', 'jiasyuen1426@1utar.my', '202cb962ac59075b964b07152d234b70', '', '', '2024-03-22 09:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_ID`, `user_ID`, `status`, `total_price`, `created_at`) VALUES
(9, 0, 'Pending', 0.00, '2024-03-16 13:49:13'),
(13, 1, 'Pending', 7.40, '2024-03-16 13:50:54'),
(14, 1, 'Pending', 57.50, '2024-03-16 13:50:54'),
(23, 2, 'Pending', 0.00, '2024-03-22 09:49:02'),
(24, 2, 'Pending', 0.00, '2024-03-22 09:49:36'),
(25, 2, 'Pending', 0.00, '2024-03-23 10:27:19'),
(26, 2, 'Pending', 0.00, '2024-03-23 10:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_ID`, `order_ID`, `product_ID`, `quantity`, `unit_price`) VALUES
(1, 14, 123, 3, 3.00),
(6, 14, 69, 1, 7.50),
(8, 14, 41, 2, 2.50),
(9, 13, 1, 1, 7.40),
(12, 14, 12, 12, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_cat` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_reg_date` datetime NOT NULL,
  `submittedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_desc`, `product_price`, `product_cat`, `product_quantity`, `product_image`, `product_reg_date`, `submittedby`) VALUES
(15, 'Headset', 'Wearable audio devices', 30.00, 'Charging Accessories', 30, 'Screenshot 3.png', '2024-03-24 16:52:30', '2'),
(16, 'Phone casing', 'Protect mobile phone from any physical damage', 10.00, 'Protection and Cases', 10, '33095-1-phone-case-transparent.png', '2024-03-24 17:30:02', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
