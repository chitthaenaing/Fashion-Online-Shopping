-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2018 at 10:18 AM
-- Server version: 5.6.41
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_no` int(11) NOT NULL,
  `balance` decimal(11,0) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `acc_name`, `acc_no`, `balance`, `customer_id`) VALUES
(9, 'KBZ bank', 2147483647, '9782', 10),
(10, 'KBZ bank', 22433423, '9880', 9),
(11, 'KBZ Bank', 2147483647, '891', 11);

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
('CTN-23233', '20 % Discount', 20, '0000-00-00'),
('CTN-2343243', 'Discount', 30, '0000-00-00'),
('CTN-CC-2423', '20 discount', 20, '0000-00-00'),
('CTN-CN-2342343', '20 discount', 20, '0000-00-00'),
('HQ12CTN', 'Cost Over $200', 20, '2017-10-21'),
('HQ13CTN', 'Cost Over 300', 30, '0000-00-00'),
('HQ14CTN', 'Cost Over 500', 80, '0000-00-00'),
('HQ15CTN', 'Cost Over 600', 100, '0000-00-00'),
('nm877', 'nn', 800, '0000-00-00');

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
  `phone_no` int(11) NOT NULL,
  `customer_acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstName`, `lastName`, `email`, `postal_code`, `address`, `phone_no`, `customer_acc_id`) VALUES
(56, 'Chit Thae', 'Naing', 'test@gmail.com', 0, '', 0, 10),
(57, 'Test', 'User', 'customerone@gmail.com', 2122, 'North dagon', 2147483647, 11);

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
(9, 'Chit Thae ', 'Naing', 'chitthaenaing@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'Male', '2018-09-12'),
(10, 'Chit Thae', 'Naing', 'test@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'Male', '2018-09-12'),
(11, 'Test', 'User', 'customerone@gmail.com', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'Male', '2018-09-12');

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
  `customer_acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `status`, `order_date`, `delivered_date`, `qty`, `total_price`, `customer_acc_id`) VALUES
(45, '1', '2018-09-12', '2018-09-12', 1, 110, 11);

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
(103, 23, 45);

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
(1, 'Men Slim White Shirt', 'P_001', 100, 'manshirt.jpg', 8, 10, 'Men', 'Shirts'),
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
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customer_acc_id` (`customer_acc_id`);

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
  ADD KEY `customer_acc_id` (`customer_acc_id`);

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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  MODIFY `customer_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_accounts` (`customer_acc_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`customer_acc_id`) REFERENCES `customer_accounts` (`customer_acc_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_acc_id`) REFERENCES `customer_accounts` (`customer_acc_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
