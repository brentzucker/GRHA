-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 04:20 AM
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
  `price` varchar(20) DEFAULT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`conferenceID`, `name`, `date`, `location`, `price`, `image`) VALUES
(1, 'Conference 1', '2015-04-30 00:00:00', 'Atlanta', '100', 'atlanta.jpg'),
(2, 'Conference 2', '2015-04-26 00:00:00', 'Milledgeville', '200', 'milly.jpg'),
(3, 'Conference 3', '2015-05-20 00:00:00', 'Conyers', '400', 'conyers.jpg'),
(4, 'Conference 4', '2015-05-28 00:00:00', 'Tifton', '75', 'tifton.jpg'),
(5, 'Conference 5', '2015-04-20 00:00:00', 'Cordele', '50', 'cordele.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastName`, `address`, `userName`, `password`) VALUES
(1, 'Max', 'Graessle', '3644 Stonehenge Way', 'max', 'max'),
(8, 'Ryan', 'Graessle', '3644 Stonehenge Way', 'max.graessle@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `date` date DEFAULT NULL,
  `firstName` varchar(56) NOT NULL,
  `lastName` varchar(56) NOT NULL,
  `price` int(50) NOT NULL,
`orderID` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`date`, `firstName`, `lastName`, `price`, `orderID`) VALUES
('2015-04-28', 'one', 'one', 75, 1),
('2015-04-22', 'o', 'o', 90, 2),
('2015-04-28', 'max', 'max', 400, 3),
('2015-04-28', 'q', 'q', 400, 5),
('2015-04-28', 'q', 'q', 400, 6);

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
MODIFY `customerID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `orderID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
