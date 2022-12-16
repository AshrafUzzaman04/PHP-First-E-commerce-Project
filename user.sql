-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 08:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `all users`
--

CREATE TABLE `all users` (
  `ID` int(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `role` char(11) NOT NULL DEFAULT 'user',
  `First_Name` char(255) DEFAULT NULL,
  `Surname` char(255) DEFAULT NULL,
  `email_or_mobile` char(200) NOT NULL,
  `password` char(255) NOT NULL,
  `Birth_day` int(40) DEFAULT NULL,
  `Birth_month` char(100) DEFAULT NULL,
  `Birth_year` int(50) DEFAULT NULL,
  `gender` char(100) NOT NULL DEFAULT 'Male',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all users`
--

INSERT INTO `all users` (`ID`, `img`, `role`, `First_Name`, `Surname`, `email_or_mobile`, `password`, `Birth_day`, `Birth_month`, `Birth_year`, `gender`, `created_at`) VALUES
(86, './Images/All_Users/86/639a11bc53bcd423870sAihLaod071112142022pm08fWednesday.jpg', 'user', 'Jannatul', 'Ferdaouse', 'jannatul.ferdaouse@gmail.com', 'd423c71a245263429f632fc4d16cd287', 13, 'March', 2013, 'Female', '2022-12-14 09:33:14'),
(87, './Images/All_Users/87/639ad4c4775697668811LYRfcbW090312152022am16fThursday.jpeg', 'admin', 'Ashraf', 'Uzzaman', 'ashraf.uzzaman@gmail.com', 'd5ca69a859c445ad53328a214f283ee9', 4, 'Auguest', 2004, 'Male', '2022-12-14 09:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` char(100) NOT NULL,
  `prize` int(100) NOT NULL,
  `discount_prize` int(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `prize`, `discount_prize`, `description`, `img`, `created_at`) VALUES
(53, 'Ashraf Uzzaman', 1000000000, 999999999, 'I am a good boy.', './Images/products/e4rOR1TK639b23e55f7919005141253pmDecDecember15202222Thursday.jpeg', '2022-12-15 13:40:53'),
(54, 'Name dia kam ki', 999, 500, 'hellow', './Images/products/FzvM9V3r639b296de21886017151229pmDecDecember15202222Thursday.png', '2022-12-15 14:04:29'),
(57, 'Ashraf Uzzaman', 1000000000, 999999999, 'I am a good boy.', './Images/products/e4rOR1TK639b23e55f7919005141253pmDecDecember15202222Thursday.jpeg', '2022-12-15 13:40:53'),
(58, 'Name dia kam ki', 999, 500, 'hellow', './Images/products/FzvM9V3r639b296de21886017151229pmDecDecember15202222Thursday.png', '2022-12-15 14:04:29'),
(60, 'Hacker', 1000, 100, 'He is a white hat hacker', './Images/products/vWEnuX9r639b2d78cc2764500151244pmDecDecember15202222Thursday.jpeg', '2022-12-15 14:21:44'),
(62, 'Name dia kam ki', 999, 500, 'hellow', './Images/products/FzvM9V3r639b296de21886017151229pmDecDecember15202222Thursday.png', '2022-12-15 14:04:29'),
(65, 'Name dia kam ki', 999, 500, 'Nam to bolbo na.', './Images/products/FzvM9V3r639b296de21886017151229pmDecDecember15202222Thursday.png', '2022-12-15 14:04:29'),
(66, 'Hacker', 1000, 100, 'He is a white hat hacker', './Images/products/vWEnuX9r639b2d78cc2764500151244pmDecDecember15202222Thursday.jpeg', '2022-12-15 14:21:44'),
(67, 'Ashraf Uzzaman', 1000000000, 999999999, 'I am a good boy.', './Images/products/e4rOR1TK639b23e55f7919005141253pmDecDecember15202222Thursday.jpeg', '2022-12-15 13:40:53'),
(68, 'Name dia kam ki', 999, 500, 'Hi! how are you?', './Images/products/FzvM9V3r639b296de21886017151229pmDecDecember15202222Thursday.png', '2022-12-15 14:04:29'),
(70, 'Ashraf Uzzaman', 1000000000, 999999999, 'I am a bad boy.', './Images/products/e4rOR1TK639b23e55f7919005141253pmDecDecember15202222Thursday.jpeg', '2022-12-15 13:40:53'),
(72, 'Hacker', 1000, 100, 'He is a white hat hacker', './Images/products/vWEnuX9r639b2d78cc2764500151244pmDecDecember15202222Thursday.jpeg', '2022-12-15 14:21:44'),
(73, 'Ashraf Uzzaman', 10000, 645454, 'I am a good boy.', './Images/products/e4rOR1TK639b23e55f7919005141253pmDecDecember15202222Thursday.jpeg', '2022-12-15 13:40:53'),
(74, 'Name dia kam ki', 999, 500, 'hellow', './Images/products/FzvM9V3r639b296de21886017151229pmDecDecember15202222Thursday.png', '2022-12-15 14:04:29'),
(76, 'Ashraf Uzzaman', 1000000000, 999999999, 'I am very good boy.', './Images/products/e4rOR1TK639b23e55f7919005141253pmDecDecember15202222Thursday.jpeg', '2022-12-15 13:40:53'),
(77, 'Name dia kam ki', 999, 500, 'hellow', './Images/products/FzvM9V3r639b296de21886017151229pmDecDecember15202222Thursday.png', '2022-12-15 14:04:29'),
(78, 'Hacker', 1000, 100, 'He is a white hat hacker', './Images/products/vWEnuX9r639b2d78cc2764500151244pmDecDecember15202222Thursday.jpeg', '2022-12-15 14:21:44'),
(79, 'Hacker', 1000, 100, 'He is a white hat hacker', './Images/products/vWEnuX9r639b2d78cc2764500151244pmDecDecember15202222Thursday.jpeg', '2022-12-15 14:21:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all users`
--
ALTER TABLE `all users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all users`
--
ALTER TABLE `all users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
