-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2018 at 07:15 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--
CREATE DATABASE IF NOT EXISTS `transport` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `transport`;

-- --------------------------------------------------------

--
-- Table structure for table `CAMERA_TABLE`
--

CREATE TABLE `CAMERA_TABLE` (
  `camera_No` int(50) DEFAULT NULL,
  `camera_Model` varchar(50) DEFAULT NULL,
  `camera_Serial_No` varchar(50) DEFAULT NULL,
  `camera_IP` varchar(50) DEFAULT NULL,
  `camera_Location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CAMERA_TABLE`
--

INSERT INTO `CAMERA_TABLE` (`camera_No`, `camera_Model`, `camera_Serial_No`, `camera_IP`, `camera_Location`) VALUES
(6576, 'HP', '0', '10.8.9.4.11', 'Nairobi West');

-- --------------------------------------------------------

--
-- Table structure for table `DRIVER_PROFILE_TABLE`
--

CREATE TABLE `DRIVER_PROFILE_TABLE` (
  `Driver_Id` int(50) DEFAULT NULL,
  `Driver_First_Name` varchar(50) DEFAULT NULL,
  `Driver_Last_Name` varchar(50) DEFAULT NULL,
  `Driver_Phone_No` int(50) DEFAULT NULL,
  `Driver_Payroll_No` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DRIVER_PROFILE_TABLE`
--

INSERT INTO `DRIVER_PROFILE_TABLE` (`Driver_Id`, `Driver_First_Name`, `Driver_Last_Name`, `Driver_Phone_No`, `Driver_Payroll_No`) VALUES
(0, '', '', 0, ''),
(5436546, 'erterter', 'erterter', 34534534, '45345345'),
(456456, 'tertert', 'ertert', 456456456, '456456r');

-- --------------------------------------------------------

--
-- Table structure for table `DRIVER_VEHICLE_TABLE`
--

CREATE TABLE `DRIVER_VEHICLE_TABLE` (
  `Driver_Vehicle_ID` int(50) DEFAULT NULL,
  `Driver_Vehicle_Driver_ID` int(50) DEFAULT NULL,
  `Driver_Vehicle_Vehicle_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Login_Table`
--

CREATE TABLE `Login_Table` (
  `Login_Id` int(20) NOT NULL,
  `Login_Username` varchar(20) DEFAULT NULL,
  `Login_Password` varchar(100) DEFAULT NULL,
  `Login_Rank` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PASSAGER_DETAIL_TABLE`
--

CREATE TABLE `PASSAGER_DETAIL_TABLE` (
  `Passenger_ID` int(50) DEFAULT NULL,
  `passenger_FirstName` varchar(50) DEFAULT NULL,
  `passenger_LastName` varchar(50) DEFAULT NULL,
  `passenger_phone_No` varchar(50) DEFAULT NULL,
  `passenger_adress` varchar(50) DEFAULT NULL,
  `passenger_seat_No` int(50) DEFAULT NULL,
  `Passenger_Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PASSAGER_DETAIL_TABLE`
--

INSERT INTO `PASSAGER_DETAIL_TABLE` (`Passenger_ID`, `passenger_FirstName`, `passenger_LastName`, `passenger_phone_No`, `passenger_adress`, `passenger_seat_No`, `Passenger_Status`) VALUES
(534534, 'erewr', 'werwer', '4532423', '34532 gfgf', 4, 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE_PASSENGER_TABLE`
--

CREATE TABLE `VEHICLE_PASSENGER_TABLE` (
  `Vehicle_Passenger_ID` int(50) DEFAULT NULL,
  `Vehicle_Passenger_Vehicle_ID` int(50) DEFAULT NULL,
  `Vehicle_Passenger_Passenger_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE_REG_CAMERA_TABLE`
--

CREATE TABLE `VEHICLE_REG_CAMERA_TABLE` (
  `vehicle_Reg_Camera_ID` int(50) DEFAULT NULL,
  `Vehicle_Reg_Cam_Vehicle_ID` int(50) DEFAULT NULL,
  `Vehicle_Reg_Camera_Cam_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE_REG_TABLE`
--

CREATE TABLE `VEHICLE_REG_TABLE` (
  `Vehicle_Id` int(50) DEFAULT NULL,
  `Vehicle_Name` varchar(50) DEFAULT NULL,
  `Vehicle_Type` varchar(50) DEFAULT NULL,
  `Vehicle_Details` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `VEHICLE_REG_TABLE`
--

INSERT INTO `VEHICLE_REG_TABLE` (`Vehicle_Id`, `Vehicle_Name`, `Vehicle_Type`, `Vehicle_Details`) VALUES
(456456, 'rtreter', 'eterterte', '<p><strong><s>ertertertertertert</s></strong></p>\r'),
(0, '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
