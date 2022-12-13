-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 10:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `role` char(11) DEFAULT NULL,
  `First_Name` char(255) DEFAULT NULL,
  `Surname` char(255) DEFAULT NULL,
  `email_or_mobile` char(200) NOT NULL,
  `password` char(255) NOT NULL,
  `Birth_day` int(40) DEFAULT NULL,
  `Birth_month` char(100) DEFAULT NULL,
  `Birth_year` int(50) DEFAULT NULL,
  `gender` char(100) NOT NULL DEFAULT 'Male',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all users`
--

INSERT INTO `all users` (`ID`, `img`, `role`, `First_Name`, `Surname`, `email_or_mobile`, `password`, `Birth_day`, `Birth_month`, `Birth_year`, `gender`, `created_at`) VALUES
(77, './Images/All_Users/77/6392f4989778f375958RP8Vw7dy094012092022am56fFriday.jpg', '0', 'Jannatul', 'Ferdaouse', 'jannatul.ferdaouse@gmail.com', 'd423c71a245263429f632fc4d16cd287', 13, 'March', 2014, 'Female', '2022-11-21 10:20:46'),
(78, './Images/All_Users/78/6392f4d72081c948804WKZ3M0J6094112092022am59fFriday.jpeg', '0', 'Ashraf', 'Uzzaman', 'ashraf.uzzaman@gmail.com', 'd5ca69a859c445ad53328a214f283ee9', 4, 'Auguest', 2004, 'Male', '2022-11-22 16:25:10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
