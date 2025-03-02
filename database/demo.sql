-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 11:24 AM
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
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` text NOT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL,
  `latlon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `name`, `email`, `password`, `location`, `address`, `latlon`) VALUES
(3, 'ahamed@gmail.com', 'ahamed@gmail.com', '$2y$10$JdDLNdZugKWLRAVvBYOY6.qMWV6Hw/nvuiCRJGOlaHxqOb9Se3szi', 'chennai', '4a/7a, kannan street', NULL),
(4, 'mariyam', 'mariyam@gmail.com', '$2y$10$v7lnUvisg9hSsQ.5E.lXve07YNxx.MAVb0IZoxZZUSwMPYG3IBgIm', 'chennai', '7, vivekanandha street, velipatinam, ramanathapuram', NULL),
(5, 'abdur', 'abdur@gmail.com', '$2y$10$c090lLlemA2938OwBf4Io.hfwNctNwl1HBEPztCEGbwvFNE/EhM1m', 'madurai', '6, down street, chennai', '12.9086514,80.085608');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_persons`
--

CREATE TABLE `delivery_persons` (
  `Did` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_persons`
--

INSERT INTO `delivery_persons` (`Did`, `name`, `email`, `password`, `city`) VALUES
(5, 'ahamed@gmail.com', 'ahamed@gmail.com', '$2y$10$TrbnzXfwxxsiTYD5OVROj.vbFapXj5cuWyCwFJWQxGlY54m0zu2SK', 'chennai'),
(6, 'abdur', 'abdur@gmail.com', '$2y$10$b78lUratRqVQpZDohLcACO/zrMwSVZ6Qcterc5MB37qM0xKev/Vry', 'madurai');

-- --------------------------------------------------------

--
-- Table structure for table `food_donations`
--

CREATE TABLE `food_donations` (
  `Fid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `food` varchar(50) NOT NULL,
  `type` text NOT NULL,
  `category` text NOT NULL,
  `quantity` text NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `phoneno` varchar(25) NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `delivery_by` int(11) DEFAULT NULL,
  `latlon` varchar(255) DEFAULT NULL,
  `delivery_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_donations`
--

INSERT INTO `food_donations` (`Fid`, `name`, `email`, `food`, `type`, `category`, `quantity`, `date`, `address`, `location`, `phoneno`, `assigned_to`, `delivery_by`, `latlon`, `delivery_status`) VALUES
(26, 'ahamed@gmail.com', 'ahamed@gmail.com', 'Hakka noodles', 'Non-veg', 'cooked-food', '1', '2025-03-01 23:21:02', '19,postman street', 'chennai', '9003900685', 3, 5, '12.9086514,80.085608', 1),
(27, 'ahamed@gmail.com', 'ahamed@gmail.com', 'Hakka noodles', 'Non-veg', 'cooked-food', '1', '2025-03-01 23:29:36', '19,postman street', 'chennai', '9003900685', 3, 5, '12.9086514,80.085608', 1),
(28, 'ahamed@gmail.com', 'ahamed@gmail.com', 'rice', 'veg', 'cooked-food', '10 person', '2025-03-01 23:33:26', '19,postman street', 'chennai', '9003900685', 3, 5, '12.9086514,80.085608', 1),
(29, 'ahamed@gmail.com', 'ahamed@gmail.com', 'biriyani', 'Non-veg', 'cooked-food', '100 person', '2025-03-02 14:36:50', '5, postman street, chennai', 'chennai', '9003900685', NULL, NULL, '12.9086514,80.085608', NULL),
(30, 'abdur', 'abdur@gmail.com', 'chicken', 'Non-veg', 'raw-food', '5 kg', '2025-03-02 14:48:46', '9, down street, madurai', 'madurai', '9003900685', 5, 6, '12.9086514,80.085608', 1),
(31, 'sulaiha', 'sulaiha@gmail.com', 'idli', 'veg', 'cooked-food', '100 person', '2025-03-02 15:22:41', '4, down street, chennai', 'madurai', '9003900685', NULL, NULL, '12.9086514,80.085608', NULL),
(32, 'ahamed@gmail.com', 'ahamed@gmail.com', 'dosa', 'veg', 'cooked-food', '100', '2025-03-02 15:39:29', '5, down street, chennai', 'chennai', '9003900685', 3, 5, '12.9086514,80.085608', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `latlon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `gender`, `latlon`) VALUES
(18, 'abdur', 'abdur@gmail.com', '$2y$10$vI5Eyf.bbE4S7Lt00VPzOuMaKSmbf9DHN4j8.Qx4GEhi4P1xLlDnK', 'male', NULL),
(17, 'ahamed@gmail.com', 'ahamed@gmail.com', '$2y$10$qhfXQlG7KK6FNO.vw6WAPuWzUpVs8ZIVgWyG74HR.nblARpeietvW', 'male', NULL),
(19, 'sulaiha', 'sulaiha@gmail.com', '$2y$10$pKFvJNsHmKrzoD2qjpOzteZgnDNKeshmUneb2U5af4seCtG1aG35S', 'female', '12.9086514,80.085608');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`feedback_id`, `name`, `email`, `message`) VALUES
(1, 'John Smith', 'john@example.com', 'I really enjoyed using your product!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `delivery_persons`
--
ALTER TABLE `delivery_persons`
  ADD PRIMARY KEY (`Did`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `food_donations`
--
ALTER TABLE `food_donations`
  ADD PRIMARY KEY (`Fid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_persons`
--
ALTER TABLE `delivery_persons`
  MODIFY `Did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food_donations`
--
ALTER TABLE `food_donations`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
