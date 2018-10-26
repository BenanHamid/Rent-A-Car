-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 12:07 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_a_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `ID` int(11) NOT NULL,
  `MODEL` varchar(50) NOT NULL,
  `YEAR_OF_PRODUCTION` date DEFAULT NULL,
  `NUMBER_OF_DOORS` smallint(6) DEFAULT NULL,
  `GEARBOX` varchar(50) DEFAULT NULL,
  `HORSE_POWER` int(11) DEFAULT NULL,
  `MILLAGE` int(11) DEFAULT NULL,
  `DETAILS` text,
  `DATE_ADDED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`ID`, `MODEL`, `YEAR_OF_PRODUCTION`, `NUMBER_OF_DOORS`, `GEARBOX`, `HORSE_POWER`, `MILLAGE`, `DETAILS`, `DATE_ADDED`) VALUES
(23, 'Renault', '1946-01-01', 5, 'автоматична', 255, 0, '', '2018-10-25'),
(24, 'Opel Astra', '2015-01-01', 5, 'автоматична', 233, 0, 'ново', '2018-10-25'),
(25, 'Honda Civic', '1920-01-01', 5, 'полу-автоматична', 55, 0, '', '2018-10-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
