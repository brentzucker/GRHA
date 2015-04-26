-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2015 at 07:58 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `internet_prog`
--

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE IF NOT EXISTS `conferences` (
`conferenceID` int(10) unsigned NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`conferenceID`, `name`, `date`, `location`, `price`) VALUES
(1, 'Conference 1', '2015-04-30 00:00:00', 'Milledgeville', '100'),
(2, 'Conference 2', '2015-04-26 00:00:00', 'Atlanta', '200'),
(3, 'Conference 3', '2015-05-20 00:00:00', 'Conyers', '400'),
(4, 'Conference 4', '2015-05-28 00:00:00', 'Atlanta', '75'),
(5, 'Conference 5', '2015-04-20 00:00:00', 'Milledegeville', '50');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customerID` int(10) unsigned NOT NULL,
  `firstName` varchar(56) DEFAULT NULL,
  `lastName` varchar(56) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `userName` varchar(56) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastName`, `address`, `userName`, `password`) VALUES
(1, 'Max', 'Graessle', '3644 Stonehenge Way', 'max', 'max');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `conferenceID` smallint(5) DEFAULT NULL,
  `customerID` smallint(5) DEFAULT NULL,
  `quantity` smallint(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `orderID` smallint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
 ADD PRIMARY KEY (`conferenceID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
MODIFY `conferenceID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `customerID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
