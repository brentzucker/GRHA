-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 01, 2015 at 10:47 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `GRHA`
--

-- --------------------------------------------------------

--
-- Table structure for table `Membership`
--

CREATE TABLE `Membership` (
  `Membership` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`Membership`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Membership`
--

INSERT INTO `Membership` (`Membership`) VALUES
('Company'),
('Member'),
('None'),
('Organization');

-- --------------------------------------------------------

--
-- Table structure for table `Organizations`
--

CREATE TABLE `Organizations` (
  `OrganizationName` varchar(30) NOT NULL DEFAULT '',
  `DESCRIPTION` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`OrganizationName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserContact`
--

CREATE TABLE `UserContact` (
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
-- Table structure for table `UserCredentials`
--

CREATE TABLE `UserCredentials` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserData`
--

CREATE TABLE `UserData` (
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
-- Constraints for table `UserContact`
--
ALTER TABLE `UserContact`
  ADD CONSTRAINT `usercontact_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `UserCredentials` (`Username`);

--
-- Constraints for table `UserData`
--
ALTER TABLE `UserData`
  ADD CONSTRAINT `userdata_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `UserCredentials` (`Username`),
  ADD CONSTRAINT `userdata_ibfk_2` FOREIGN KEY (`Organization`) REFERENCES `Organizations` (`OrganizationName`),
  ADD CONSTRAINT `userdata_ibfk_3` FOREIGN KEY (`Membership`) REFERENCES `Membership` (`Membership`);