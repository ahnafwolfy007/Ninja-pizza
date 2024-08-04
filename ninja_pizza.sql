-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2024 at 12:29 PM
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
-- Database: `ninja_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `ninjas`
--

CREATE TABLE `ninjas` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `Phone` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `joining date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ninjas`
--

INSERT INTO `ninjas` (`id`, `name`, `Phone`, `email`, `joining date`) VALUES
(1, 'Ser Jaime', '01983144814', 'wolfionnov07@gmail.com', '2024-08-03'),
(3, 'Jon Snow', '01234567899', 'ddwolfer3@gmail.com', '2024-08-03'),
(5, 'Eddard Stark', '01992844753', 'ddwolfer3@gmail.com', '2024-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `status` enum('placed','served','canceled') NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pizza_id`, `customer_phone`, `status`, `order_date`) VALUES
(12, 1, '01978213836', 'served', '2024-08-02 21:52:51'),
(13, 1, '01983144814', 'served', '2024-08-02 21:56:11'),
(15, 1, '01234567899', 'served', '2024-08-02 21:58:38'),
(16, 1, '01983144814', 'canceled', '2024-08-02 21:58:53'),
(17, 2, '01983144814', 'served', '2024-08-02 21:59:03'),
(18, 44, '01766699999', 'canceled', '2024-08-02 21:59:12'),
(19, 45, '01978213836', 'placed', '2024-08-02 22:03:31'),
(20, 46, '01766699999', 'placed', '2024-08-02 22:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`id`, `title`, `ingredients`, `email`, `created_at`) VALUES
(1, 'Ninja Supreme', 'Tomato,Cheese,Chicken', 'nnja.code@uk.com', '2024-07-05 14:05:37'),
(2, 'Iron Wheel', 'Tuna, Cheese, Sauce', 'greyjoy.baelon@iron.com', '2024-08-01 16:18:34'),
(3, 'Winter Rock', 'Beef Sizzled, BBQ ketchup, Cheese, Onion', 'robb@stark.lord', '2024-08-01 18:20:03'),
(44, 'Dragon Breath', 'Hot sauce, Cheese, Beef, Chicken', 'targ@val.co', '2024-08-02 18:29:33'),
(45, 'BBQ Meat Machine', 'BBQ sauce, Beef, Chicken, Hot Dog', 'wolfionnov07@gmail.com', '2024-08-02 19:42:28'),
(46, 'Tyrion Special', 'Beef Sausage, Pork, Ketchup, Onion', 'Lannster@casrterly.rock', '2024-08-02 22:36:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ninjas`
--
ALTER TABLE `ninjas`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordered_pz` (`pizza_id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ninjas`
--
ALTER TABLE `ninjas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ordered_pz` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
