-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2018 at 07:01 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Const`
--
CREATE DATABASE IF NOT EXISTS `Const` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Const`;

-- --------------------------------------------------------

--
-- Table structure for table `Construction`
--

DROP TABLE IF EXISTS `Construction`;
CREATE TABLE `Construction` (
  `Id` int(11) NOT NULL,
  `Construction_Id` varchar(20) DEFAULT NULL,
  `Construction_Name` varchar(50) DEFAULT NULL,
  `Construction_Site` varchar(50) DEFAULT NULL,
  `Construction_Owner` varchar(50) DEFAULT NULL,
  `Construction_Engineer` varchar(50) DEFAULT NULL,
  `Construction_Desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Customer_Table`
--

DROP TABLE IF EXISTS `Customer_Table`;
CREATE TABLE `Customer_Table` (
  `Customer_Id` int(11) NOT NULL,
  `Customer_Name` varchar(10) DEFAULT NULL,
  `Customer_Email` varchar(10) DEFAULT NULL,
  `Customer_Number` int(11) DEFAULT NULL,
  `Customer_Address` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Job_Application`
--

DROP TABLE IF EXISTS `Job_Application`;
CREATE TABLE `Job_Application` (
  `Id` int(11) NOT NULL,
  `Application_Id` varchar(20) NOT NULL DEFAULT '0',
  `Application_Cons_Id` varchar(20) DEFAULT NULL,
  `Application_User_Name` varchar(50) DEFAULT NULL,
  `Application_User_Email` varchar(50) DEFAULT NULL,
  `Application_Date` varchar(50) DEFAULT NULL,
  `Applicatin_Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Job_Application`
--

INSERT INTO `Job_Application` (`Id`, `Application_Id`, `Application_Cons_Id`, `Application_User_Name`, `Application_User_Email`, `Application_Date`, `Applicatin_Status`) VALUES
(6, 'C981-7209-6184', 'b378-6818-3C88', 'JAMES MAIN', 'gfjksd@fdb', '2018-03-17 17:03:23', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `Login_Table`
--

DROP TABLE IF EXISTS `Login_Table`;
CREATE TABLE `Login_Table` (
  `Login_Id` int(20) NOT NULL DEFAULT '0',
  `Login_Username` varchar(100) DEFAULT NULL,
  `Login_Password` varchar(50) DEFAULT NULL,
  `Login_Rank` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Login_Table`
--

INSERT INTO `Login_Table` (`Login_Id`, `Login_Username`, `Login_Password`, `Login_Rank`) VALUES
(0, 'dfdf', 'b52c96bea30646abf8170f333bbd42b9', '2'),
(123, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Resources`
--

DROP TABLE IF EXISTS `Resources`;
CREATE TABLE `Resources` (
  `Id` int(11) NOT NULL,
  `Resource_Id` varchar(20) NOT NULL DEFAULT '0',
  `Resource_Type` varchar(50) DEFAULT NULL,
  `Resource_Name` varchar(50) DEFAULT NULL,
  `Resource_Cost` varchar(50) DEFAULT NULL,
  `Resource_Desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Construction`
--
ALTER TABLE `Construction`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Customer_Table`
--
ALTER TABLE `Customer_Table`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- Indexes for table `Job_Application`
--
ALTER TABLE `Job_Application`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Login_Table`
--
ALTER TABLE `Login_Table`
  ADD PRIMARY KEY (`Login_Id`);

--
-- Indexes for table `Resources`
--
ALTER TABLE `Resources`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Construction`
--
ALTER TABLE `Construction`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Job_Application`
--
ALTER TABLE `Job_Application`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Resources`
--
ALTER TABLE `Resources`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
