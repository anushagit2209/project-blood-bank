-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 08:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `geoloc`
--

CREATE TABLE `geoloc` (
  `srno` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `geoloc`
--

INSERT INTO `geoloc` (`srno`, `name`, `location`, `lat`, `lon`) VALUES
(4, 'Goa Medical College', 'Bambolim', 15.463891, 73.858108),
(5, 'Apollo Victor Hospital', 'Margao', 15.268937, 73.9656231),
(7, 'Manipal Hospital', 'Panaji', 15.4600262, 73.9656231),
(8, 'District Hospital ', 'Mapusa', 15.5975929, 73.8202366),
(9, 'Apollo Victor Hospital', 'Margao', 15.268937, 73.965231);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `geoloc`
--
ALTER TABLE `geoloc`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `geoloc`
--
ALTER TABLE `geoloc`
  MODIFY `srno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
