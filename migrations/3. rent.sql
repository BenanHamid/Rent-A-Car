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
(1, 23, '2018-10-26', '2018-10-26', 1, '20.00', 'EURO', '2018-10-26'),
(2, 25, '2018-10-26', '2018-10-26', 1, '20.00', 'EURO', '2018-10-26'),
(3, 24, '2018-10-26', '2018-10-26', 1, '20.00', 'EURO', '2018-10-26'),
(4, 25, '2018-10-27', '2018-10-29', 1, '20.00', 'EURO', '2018-10-26'),
(5, 24, '2018-10-28', '2018-10-31', 3, '60.00', 'EURO', '2018-10-26');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
