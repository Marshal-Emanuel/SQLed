-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306  
-- Generation Time: Nov 14, 2023 at 07:48 PM
-- Server version: 8.0.35-0ubuntu0.23.10.1
-- PHP Version: 8.2.10-2ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Fruits'),
(2, 'Vegetables'),
(3, 'Dairy'),
(4, 'Meat'),
(5, 'Bakery');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_id` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity_in_stock` int DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  `expiration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `price`, `quantity_in_stock`, `supplier_id`, `expiration_date`) VALUES
(1, 'Apple', 1, 1.25, 100, 1, '2023-12-31'),
(2, 'Carrot', 2, 0.75, 150, 2, '2023-12-31'),
(3, 'Milk', 3, 2.50, 50, 3, '2023-12-31'),
(4, 'Chicken', 4, 5.00, 20, 4, '2023-12-31'),
(5, 'Bread', 5, 1.50, 75, 5, '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `number` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`number`, `name`) VALUES
(1, 'elect');

-- --------------------------------------------------------

--
-- Table structure for table `supermarket_items`
--

CREATE TABLE `supermarket_items` (
  `item_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supermarket_items`
--

INSERT INTO `supermarket_items` (`item_id`, `product_name`, `department`, `unit_price`, `stock_quantity`) VALUES
(1, 'Apples', 'Produce', 1.99, 10),
(2, 'Oranges', 'Produce', 2.49, 5),
(3, 'Bananas', 'Produce', 1.49, 12),
(4, 'Milk', 'Dairy', 2.99, 8),
(5, 'Eggs', 'Dairy', 1.98, 15),
(6, 'Bread', 'Bakery', 1.49, 20),
(7, 'Cereal', 'Breakfast', 2.99, 12),
(8, 'Coffee', 'Beverages', 4.99, 6),
(9, 'Soda', 'Beverages', 1.79, 18),
(10, 'Chicken', 'Meat', 3.99, 10),
(11, 'Beef', 'Meat', 4.99, 8),
(12, 'Salmon', 'Seafood', 9.99, 5);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_contact`) VALUES
(1, 'Supplier A', '123-456-7890'),
(2, 'Supplier B', '987-654-3210'),
(3, 'Supplier C', '555-555-5555'),
(4, 'Supplier D', '111-222-3333'),
(5, 'Supplier E', '999-888-7777');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `item_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int NOT NULL DEFAULT '30',
  `price` decimal(10,2) NOT NULL DEFAULT '300.00',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`item_id`, `product_name`, `quantity`, `price`, `date`) VALUES
(1, 'apples', 10, 1.99, NULL),
(2, 'oranges', 5, 2.49, NULL),
(3, 'bananas', 12, 1.49, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test2`
--

CREATE TABLE `test2` (
  `item_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `stock_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test2`
--

INSERT INTO `test2` (`item_id`, `product_name`, `department`, `unit_price`, `stock_quantity`) VALUES
(1, 'Apples', 'Produce', 1.99, 10),
(2, 'Oranges', 'Produce', 2.49, 5),
(3, 'Bananas', 'Produce', 1.49, 12),
(4, 'Milk', 'Dairy', 2.99, 8),
(5, 'Eggs', 'Dairy', 1.98, 15),
(6, 'Bread', 'Bakery', 1.49, 20),
(7, 'Cereal', 'Breakfast', 2.99, 12),
(8, 'Coffee', 'Beverages', 4.99, 6),
(9, 'Soda', 'Beverages', 1.79, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `supermarket_items`
--
ALTER TABLE `supermarket_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `unique_test_price` (`price`);

--
-- Indexes for table `test2`
--
ALTER TABLE `test2`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supermarket_items`
--
ALTER TABLE `supermarket_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test2`
--
ALTER TABLE `test2`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
