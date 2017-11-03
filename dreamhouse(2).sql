-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 06:48 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `coupon_amount` int(11) NOT NULL,
  `coupon_expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_code`, `description`, `coupon_amount`, `coupon_expire_date`) VALUES
('HQ12CTN', 'Cost Over $200', 20, '2017-10-21'),
('HQ13CTN', 'Cost Over 300', 30, '0000-00-00'),
('HQ14CTN', 'Cost Over 500', 80, '0000-00-00'),
('HQ15CTN', 'Cost Over 600', 100, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstName`, `lastName`, `email`, `postal_code`, `address`, `phone_no`) VALUES
(11, 'Chit Thae', 'Naing', '', 92343, 'No 32, North Dagon', 2147483647),
(12, 'Kyaw', 'Zint', '', 92343, 'No 31, Saine Lae Thar Yar street', 293423333),
(13, 'Nyan Htun', 'Linn', '', 9233, 'No 76, North Okkalapa', 924234331),
(14, 'Soe', 'Myint', '', 9333, 'No 32, South Dagon', 923322333),
(15, 'Htet', 'Htet', '', 9324, 'No 88, Shwe Pyi Thar', 2147483647),
(16, 'Thar', 'Chit', '', 9333, 'No 33, Hledan', 2147483647),
(17, 'Chit Thae', 'Naing', '', 92334, 'chitthaenaing@gmail.com', 92323433),
(18, 'Chit Thae', 'Naing', '', 23834, 'chitthaenaing@gmail.com', 2147483647),
(19, 'Chit Thae', 'Naing', '', 93323, 'No 32, North Dagon', 932424233),
(20, '', '', '', 0, '', 0),
(21, '', '', '', 0, '', 0),
(22, '', '', '', 0, '', 0),
(23, '', '', '', 0, '', 0),
(24, '', '', '', 0, '', 0),
(25, '', '', '', 0, '', 0),
(26, '', '', '', 0, '', 0),
(27, '', '', '', 0, '', 0),
(28, 'Wai', 'Phyo', '', 2323, 'No 33, Hledan', 923434),
(29, 'Chit ', 'Thae', '', 29343, 'No 32, South Dagon', 923423423);

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE `customer_accounts` (
  `customer_acc_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registered_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_accounts`
--

INSERT INTO `customer_accounts` (`customer_acc_id`, `first_name`, `last_name`, `email`, `password`, `gender`, `registered_date`) VALUES
(3, 'Chit Thae', 'Naing', 'chitthaenaing@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'Male', '2017-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `delivered_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `status`, `order_date`, `delivered_date`, `qty`, `total_price`, `customer_id`) VALUES
(10, '1', '2017-10-30', '2017-10-30', 0, 0, 11),
(11, '1', '2017-10-30', '2017-10-30', 0, 0, 12),
(12, '1', '2017-10-30', '2017-10-30', 0, 0, 13),
(13, '1', '2017-10-30', '2017-10-30', 0, 0, 14),
(14, '0', '2017-10-30', '0000-00-00', 2, 0, 15),
(15, '1', '2017-10-30', '2017-10-30', 2, 0, 16),
(16, '0', '2017-10-31', '0000-00-00', 4, 236, 18),
(17, '0', '2017-11-01', '0000-00-00', 2, 803, 29);

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `order_item_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`order_item_id`, `item_id`, `order_id`) VALUES
(18, 4, 10),
(19, 25, 10),
(20, 24, 11),
(21, 1, 11),
(22, 15, 12),
(23, 16, 12),
(24, 12, 12),
(25, 3, 13),
(26, 23, 13),
(27, 3, 14),
(28, 1, 14),
(29, 3, 15),
(30, 1, 15),
(34, 3, 16),
(35, 25, 16),
(36, 23, 16),
(41, 4, 17),
(42, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` int(11) NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_name`, `account_number`, `account_name`, `customer_id`) VALUES
(4, 'credit', 2147483647, 'Chit Thae Naing', 11),
(5, 'paypal', 0, '', 12),
(6, 'credit', 2147483647, 'Nyan Htun Linn', 13),
(7, 'paypal', 0, '', 14),
(8, 'paypal', 0, '', 15),
(9, 'credit', 2147483647, 'Thar Chit', 16),
(10, 'paypal', 0, '', 17),
(11, 'paypal', 0, '', 18),
(12, 'paypal', 0, '', 19),
(13, 'paypal', 0, '', 28),
(14, 'paypal', 0, '', 29);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `item_image` text COLLATE utf8_unicode_ci NOT NULL,
  `discount_price` int(11) NOT NULL,
  `instock` int(11) NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `item_name`, `item_code`, `price`, `item_image`, `discount_price`, `instock`, `categories`, `type`) VALUES
(1, 'Men Slim White Shirt', 'P_001', 100, 'manshirt.jpg', 0, 10, 'Men', 'Shirts'),
(2, ' Plaid Cutout Pocket Long Sleeve Shirt', 'P_002', 80, 'menshirts8.jpg', 0, 5, 'Men', 'Shirts'),
(3, 'casual shirts', 'P_003', 70, 'menshirt2.jpg', 0, 20, 'Men', 'Shirts'),
(4, 'Long Sleeve Shirts', 'P_004', 90, 'menshirt4.jpg', 0, 20, 'Men', 'Shirts'),
(6, 'Doublju Mens Dress Shirt with Slim Fit', 'P_005', 120, 'menshirts9.jpg', 100, 5, 'Men', 'Shirts'),
(7, 'Double color stitching Design Shirt', 'P_006', 150, 'menshirts10.jpg', 0, 20, 'Men', 'Shirts'),
(8, 'Men Black Pants', 'P_007', 120, 'menpants.jpg', 0, 20, 'Men', 'Pants'),
(9, 'Cool Men Pants', 'P_008', 100, 'menpants2.jpg', 0, 10, 'Men', 'Pants'),
(10, 'Modern Men Pants', 'P_008', 110, 'menpants3.jpg', 0, 40, 'Men', 'Pants'),
(11, 'Gentleman Pants', 'P_009', 130, 'menpants4.jpg', 0, 20, 'Men', 'Pants'),
(12, ' Gear Dot Printing Shirt', 'P_010', 14, 'womenshirt.jpg', 0, 10, 'Women', 'Shirts'),
(13, 'Cotton T Shirt', 'P_011', 15, 'womenshirt2.jpg', 0, 10, 'Women', 'Shirts'),
(14, 'casual Summer Blous', 'P_012', 20, 'menshirt3.jpg', 0, 5, 'Men', 'Shirts'),
(15, 'plaid shirts', 'P_013', 80, 'womenshirt4.jpg', 0, 10, 'Women', 'Shirts'),
(16, 'Shirt blouses', 'P_014', 100, 'womenshirt5.jpg', 0, 10, 'Women', 'Shirts'),
(17, 'Black Harem Pants', 'P_015', 110, 'womenpants.jpg', 0, 10, 'Women', 'Pants'),
(18, 'New Big Flower Fashion Pant', 'P_016', 100, 'womenpants2.jpg', 0, 10, 'Women', 'Pants'),
(19, 'Jean Style', 'P_017', 100, 'womenpants3.jpg', 0, 4, 'Women', 'Pants'),
(20, 'T Shirt', 'P_018', 50, 'kidshirt.jpg', 20, 3, 'Kids', 'Shirts'),
(21, 'Long Sleeve Shirt', 'P_019', 80, 'kidshirt2.jpg', 0, 2, 'Kids', 'Shirts'),
(22, 'Mickey Mouse Long Sleeve Shirt', 'P_020', 70, 'kidshirt3.jpg', 50, 2, 'Kids', 'Shirts'),
(23, 'Fashion Shirt', 'P_021', 110, 'kidshirt4.jpg', 90, 4, 'Kids', 'Shirts'),
(24, 'Men Jeans', 'P_022', 120, 'menspants5.jpg', 100, 5, 'Men', 'Pants'),
(25, 'Women Pants', 'P_023', 80, 'womenPants4.jpeg', 50, 3, 'Women', 'Pants'),
(26, 'kids Pant', 'P_024', 90, 'kidsPants.jpg', 0, 5, 'Kids', 'Pants');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `shipment_id` int(11) NOT NULL,
  `shipment_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carrier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipment_date` date NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD PRIMARY KEY (`customer_acc_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`shipment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  MODIFY `customer_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `products` (`item_id`),
  ADD CONSTRAINT `orders_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
