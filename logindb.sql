-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 02:12 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobId` int(100) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `usersId` int(10) NOT NULL,
  `cityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `jobTitle`, `category`, `description`, `usersId`, `cityName`) VALUES
(1, 'Salesman', 'Real Estate', 'Manage sales, marketing, transactions and public relations.', 1, 'Tirana'),
(2, 'Manager at MCDonald\'s', 'Management', 'Manager of all MCDonald\'s points around Houston, Texas.', 2, 'Houston'),
(3, 'Senior Programmer', 'Programming', 'Senior Programmer at Valve.', 3, 'Atlanta');

-- --------------------------------------------------------

--
-- Table structure for table `pfp`
--

CREATE TABLE `pfp` (
  `id` int(10) NOT NULL,
  `usersId` int(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pfp`
--

INSERT INTO `pfp` (`id`, `usersId`, `status`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(0, 8, 0),
(0, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(10) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `cityName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `upassword` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `companyName`, `cityName`, `username`, `upassword`, `phoneNumber`) VALUES
(1, 'Vero Home Real Estate', 'Tirana', 'Eduart', 'ndoci', '0693758364'),
(2, 'MCDonalds', 'Houston', 'mcdonalds', '123', '2815096995'),
(3, 'Valve', 'Atlanta', 'Gabe', 'newell', '4045096995');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
