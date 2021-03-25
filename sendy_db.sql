-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 07:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sendy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

CREATE TABLE `order_data` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_contact` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `driver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_data`
--

INSERT INTO `order_data` (`order_id`, `user_id`, `origin`, `destination`, `distance`, `price`, `recipient_name`, `recipient_contact`, `status`, `driver_id`) VALUES
(1, 13, 'Nakuru', 'Garissa', '398', '7977', 'Triad', '0799243956', 'PENDING', NULL),
(2, 13, 'Tana River', 'Kilifi', '228', '4576', 'Richard', '0715415632', 'PENDING', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL COMMENT 'unique',
  `hashed_password` varchar(300) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `image` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `email`, `phone`, `hashed_password`, `first_name`, `last_name`, `role`, `image`) VALUES
(15, 'test@test', '98477887', '$2y$10$3TDuSeNBXPc0ao0AqcvBeuhZRTa7HRWmlg4sv8ZhmkGYqQs6Cyt7u', 'test', 'test', 'DRIVER', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_data`
--
ALTER TABLE `order_data`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
