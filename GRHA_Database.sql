-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2015 at 11:04 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grha`
--

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `Type` varchar(20) NOT NULL DEFAULT '',
  `Price` int(11) NOT NULL,
  `Category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`Type`, `Price`, `Category`) VALUES
('Corporate Platinum', 150, 'Corporate'),
('None', 0, 'None'),
('Organization', 100, 'Organization'),
('Student', 50, 'Individual');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `OrganizationName` varchar(30) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usercontact`
--

CREATE TABLE IF NOT EXISTS `usercontact` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Firstname` varchar(20) DEFAULT NULL,
  `Lastname` varchar(20) DEFAULT NULL,
  `Email` varchar(60) DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Zip` char(5) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `State` char(2) DEFAULT NULL,
  `Employer` varchar(20) DEFAULT NULL,
  `Position` varchar(20) DEFAULT NULL,
  `Fax` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usercredentials`
--

CREATE TABLE IF NOT EXISTS `usercredentials` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `Organization` varchar(30) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Membership` varchar(20) DEFAULT NULL,
  `MemberSince` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
 ADD PRIMARY KEY (`Type`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
 ADD PRIMARY KEY (`OrganizationName`);

--
-- Indexes for table `usercontact`
--
ALTER TABLE `usercontact`
 ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `usercredentials`
--
ALTER TABLE `usercredentials`
 ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
 ADD PRIMARY KEY (`Username`), ADD KEY `Organization` (`Organization`), ADD KEY `Membership` (`Membership`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usercontact`
--
ALTER TABLE `usercontact`
ADD CONSTRAINT `usercontact_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `usercredentials` (`Username`);

--
-- Constraints for table `userdata`
--
ALTER TABLE `userdata`
ADD CONSTRAINT `userdata_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `usercredentials` (`Username`),
ADD CONSTRAINT `userdata_ibfk_2` FOREIGN KEY (`Organization`) REFERENCES `organizations` (`OrganizationName`),
ADD CONSTRAINT `userdata_ibfk_3` FOREIGN KEY (`Membership`) REFERENCES `membership` (`Type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
