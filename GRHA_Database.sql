-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 03, 2015 at 11:30 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `GRHA`
--

-- --------------------------------------------------------

--
-- Table structure for table `Conferences`
--

CREATE TABLE `Conferences` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `Type` varchar(20) NOT NULL DEFAULT '',
  `Price` int(11) NOT NULL,
  `Category` varchar(25) NOT NULL,
  PRIMARY KEY (`Type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `email` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `OrganizationName` varchar(30) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`OrganizationName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `datePurchased` datetime DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usercontact`
--

CREATE TABLE `usercontact` (
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
  `Fax` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usercredentials`
--

CREATE TABLE `usercredentials` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `Organization` varchar(30) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Membership` varchar(20) DEFAULT NULL,
  `MemberSince` date DEFAULT NULL,
  PRIMARY KEY (`Username`),
  KEY `Organization` (`Organization`),
  KEY `Membership` (`Membership`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
