-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 12:54 PM
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
(26, 'Polo', '2004-01-01', 5, 'ръчна', 54, 100000, '', '2018-10-26'),
(27, 'Renault', '1937-01-01', 5, 'автоматична', 150, 0, 'ново', '2018-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `ID` int(11) NOT NULL,
  `CAR_ID` int(11) DEFAULT NULL,
  `RENT_PERIOD_START` date NOT NULL,
  `RENT_PERIOD_END` date NOT NULL,
  `BUSINESS_DAYS` int(11) NOT NULL,
  `TOTAL_RENT` decimal(9,2) NOT NULL,
  `CURRENCY` varchar(10) DEFAULT 'EURO',
  `DATE_ADDED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`ID`, `CAR_ID`, `RENT_PERIOD_START`, `RENT_PERIOD_END`, `BUSINESS_DAYS`, `TOTAL_RENT`, `CURRENCY`, `DATE_ADDED`) VALUES
(6, 26, '2018-10-27', '2018-11-01', 4, '72.00', 'EURO', '2018-10-26'),
(7, 26, '2018-11-03', '2018-11-10', 5, '90.00', 'EURO', '2018-10-26'),
(8, 27, '2018-10-26', '2018-10-28', 1, '20.00', 'EURO', '2018-10-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CAR_ID` (`CAR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`CAR_ID`) REFERENCES `car` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
