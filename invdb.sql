-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2022 at 11:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street1` text NOT NULL,
  `street2` text DEFAULT NULL,
  `city` text NOT NULL,
  `state` text DEFAULT NULL,
  `zipCode` int(5) NOT NULL,
  `country` text NOT NULL,
  `phone` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `street1`, `street2`, `city`, `state`, `zipCode`, `country`, `phone`) VALUES
(1, 1, '5845 192nd St.', 'Building #2', 'Chippewa Falls', 'WI', 54729, 'US', '7159334496');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'An ID for the category',
  `name` text NOT NULL COMMENT 'A name or title for the category',
  `isDefault` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tells you if the category is a default category'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `isDefault`) VALUES
(1, 'Shirts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL COMMENT 'An item''s ID',
  `title` text NOT NULL COMMENT 'The title or name of an item',
  `description` longtext DEFAULT NULL COMMENT 'The markup description for an item',
  `retail_price` float NOT NULL DEFAULT 0 COMMENT 'The price a customer buys an item for',
  `wholesale_price` float NOT NULL DEFAULT 0 COMMENT 'The price a store buys an item for',
  `quantity` int(11) NOT NULL COMMENT 'The total quantity of all store items.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `title`, `description`, `retail_price`, `wholesale_price`, `quantity`) VALUES
(1, 'T-shirt', '<h1> This is a t-shirt </h1>', 12.55, 8.3, 36);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `item_id` int(11) NOT NULL COMMENT 'ID for an item that is associated with the category',
  `category_id` int(11) NOT NULL COMMENT 'ID for a category that is associated with an item'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`item_id`, `category_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_image`
--

CREATE TABLE `item_image` (
  `id` int(11) NOT NULL COMMENT 'The ID of the image',
  `item_id` int(11) NOT NULL COMMENT 'The ID of the item that the image belongs to the item',
  `path` text NOT NULL COMMENT 'The File''s name',
  `meta` text NOT NULL COMMENT 'The Metadata description of the image',
  `isPrimary` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'A boolean that is true if it is the main image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_image`
--

INSERT INTO `item_image` (`id`, `item_id`, `path`, `meta`, `isPrimary`) VALUES
(1, 1, '1.jpeg', 'A Black T-shirt', 1),
(2, 1, '1(1).jpeg', 'A White T-shirt', 0),
(3, 1, '1(2).jpg', 'A White T-shirt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `purchase_order_id` int(11) NOT NULL COMMENT 'ID from the purchase order associated with the item',
  `item_id` int(11) NOT NULL COMMENT 'ID from the order associated with the item'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL COMMENT 'ID for the payment method',
  `user_id` int(11) NOT NULL COMMENT 'ID of the user the card belongs to',
  `billing_address_id` int(11) NOT NULL COMMENT ' ID for the address relating to the payment method ',
  `pan` text NOT NULL COMMENT 'Primary Account Number (Credit Card Number)',
  `code` text NOT NULL COMMENT 'Credit Card Verification Code',
  `name` text NOT NULL COMMENT 'Name on the card'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `billing_address_id`, `pan`, `code`, `name`) VALUES
(1, 1, 1, '1111222233334444', '123', 'Mitchell J Haley');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL COMMENT 'A purchase order id',
  `user_id` int(11) NOT NULL COMMENT 'ID of the user who made the order',
  `shipping_address_id` int(11) NOT NULL COMMENT 'ID of the address to ship the order to',
  `transaction_id` int(11) NOT NULL COMMENT 'ID of the transaction for the order',
  `placed_date` date DEFAULT NULL COMMENT 'Date the order was Placed',
  `state` enum('cart','placed','shippped','delivered') NOT NULL DEFAULT 'cart' COMMENT 'The current state of the order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL COMMENT 'A store''s ID',
  `user_id` int(11) NOT NULL COMMENT 'Stores are also users',
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `user_id`, `name`) VALUES
(1, 2, 'Store 1'),
(2, 3, 'Store 2');

-- --------------------------------------------------------

--
-- Table structure for table `store_item`
--

CREATE TABLE `store_item` (
  `id` int(11) NOT NULL COMMENT 'The ID of the store item',
  `item_id` int(11) NOT NULL COMMENT 'ID from item',
  `store_id` int(11) NOT NULL COMMENT 'ID from store',
  `quantity` int(11) NOT NULL COMMENT 'Quantity of item at particular store'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_item`
--

INSERT INTO `store_item` (`id`, `item_id`, `store_id`, `quantity`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL COMMENT 'Transaction ID',
  `payment_id` int(11) NOT NULL COMMENT 'The transaction''s payment method',
  `is_completed` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'true if the transaction succeeded. false otherwise'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'The user'' ID',
  `first_name` text DEFAULT NULL COMMENT 'The name of the user. EX: "Jane Doe"',
  `last_name` int(11) DEFAULT NULL,
  `type` enum('user','admin') NOT NULL COMMENT 'The type of user',
  `email` text NOT NULL COMMENT 'The user''s email address',
  `password` longtext NOT NULL COMMENT 'The user''s hashed password. Hashed using bcrypt',
  `pfp_file` text NOT NULL DEFAULT 'default.webp' COMMENT 'The file name for the user''s profile picture'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `type`, `email`, `password`, `pfp_file`) VALUES
(1, NULL, NULL, 'admin', '1234@gmail.com', '$2y$10$cColu.a9gGxmVmQzStaaAO6NADN6.77Pb5IglEqTE4NtY7Q7R31z2', 'default.webp'),
(2, NULL, NULL, 'admin', 'store1@inv.com', '$2y$10$2JvVk3tvF9udkxPPKc2f1OztDI1Rl8M6uLeFmec5GJBvu9RFAtCJ2', 'default.webp'),
(3, NULL, NULL, 'admin', 'store2@inv.com', '$2y$10$NYWLSuFswlH8tt2m8DIwUewO8gZYVZvSED//RptXAWBzFnZRH7vB.', 'default.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `itemID` (`itemID`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD KEY `item_id` (`item_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `item_image`
--
ALTER TABLE `item_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `purchase_order_id` (`purchase_order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `billing_address_id` (`billing_address_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `shipping_address_id` (`shipping_address_id`),
  ADD KEY `id` (`id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `store_item`
--
ALTER TABLE `store_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`,`store_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'An ID for the category', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'An item''s ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_image`
--
ALTER TABLE `item_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The ID of the image', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID for the payment method', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'A purchase order id';

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'A store''s ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_item`
--
ALTER TABLE `store_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The ID of the store item', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Transaction ID';

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The user'' ID', AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_category`
--
ALTER TABLE `item_category`
  ADD CONSTRAINT `item_category_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_image`
--
ALTER TABLE `item_image`
  ADD CONSTRAINT `item_image_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`itemID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`billing_address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`shipping_address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_order_ibfk_4` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store_item`
--
ALTER TABLE `store_item`
  ADD CONSTRAINT `store_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_item_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
