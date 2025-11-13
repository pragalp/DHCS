-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 05:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damsmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AppointmentNumber` int(10) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Doctor` int(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AppointmentNumber`, `Name`, `MobileNumber`, `Email`, `AppointmentDate`, `AppointmentTime`, `Specialization`, `Doctor`, `Message`, `ApplyDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(9, 757127237, 'jeeva', 5447563567, 'majeed1@gmail.com', '2025-02-27', '11:00:00', '6', 5, ',jhgfcfvghjkl', '2025-02-26 06:59:26', 'sorry', 'Cancelled', '2025-02-26 07:01:15'),
(10, 722057040, 'THOLS', 1188847894, 'THOLS@GMAIL.COM', '2025-02-27', '11:00:00', '13', 7, 'GEYYUE', '2025-02-26 09:27:56', NULL, NULL, NULL),
(11, 620010116, 'thols', 4814818181, 'thols@gmail.com', '2025-03-05', '16:30:00', '13', 6, 'vtvtvyg', '2025-03-03 08:58:30', 'gsg', 'Cancelled', '2025-03-06 07:55:00'),
(12, 368507246, 'vk', 7845218547, 'vk@gmail.com', '2025-03-18', '15:30:00', '13', 6, 'gwgweg', '2025-03-03 08:59:20', 'uhiu', 'Cancelled', '2025-03-06 09:28:11'),
(13, 890219250, 'jeeva', 1541818718, 'jeeva@gmail.com', '2025-03-07', '18:30:00', '13', 6, 'wdwdwd', '2025-03-03 09:00:14', 'sorry', 'Cancelled', '2025-03-06 09:26:05'),
(14, 140868007, 'manoj', 7845129635, 'manoj@gmail.com', '2025-03-26', '14:30:00', '13', 6, 'fgyvyw', '2025-03-03 09:01:02', NULL, NULL, NULL),
(15, 402300444, 'rao', 9696858578, 'hari2020@gmail.com', '2025-03-19', '14:00:00', '7', 9, 'my leg bone was cracked so you want surgery for that', '2025-03-06 07:51:03', 'yeah sure', 'Approved', '2025-03-06 07:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctor`
--

CREATE TABLE `tbldoctor` (
  `ID` int(5) NOT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Password` varchar(259) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldoctor`
--

INSERT INTO `tbldoctor` (`ID`, `FullName`, `MobileNumber`, `Email`, `Specialization`, `Password`, `CreationDate`) VALUES
(5, 'Dr.karuna', 4485456321, 'vk1@gmail.com', '6', 'b8b4b727d6f5d1b61fff7be687f7970f', '2025-02-26 06:52:44'),
(6, 'Dr.pragal', 7861648912, 'pra@gmail.com', '13', 'c20ad4d76fe97759aa27a0c99bff6710', '2025-02-26 07:02:35'),
(7, 'MONISH', 5544454894, 'monish@gmail.com', '13', '6f4922f45568161a8cdf4ad2299f6d23', '2025-02-26 09:00:14'),
(8, 'akash', 9876543210, 'ak@gmail.com', '6', '202cb962ac59075b964b07152d234b70', '2025-02-27 08:12:29'),
(9, 'hari', 9988774455, 'hariappu2111@gmail.com', '7', 'a01610228fe998f515a72dd730294d87', '2025-03-06 07:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '<div><font color=\"#202124\" face=\"arial, sans-serif\"><b>Our mission defines our purpose and objectives as a company.\r\n</b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b><br></b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b>We strive to exceed customer expectations by delivering superior quality, diverse selections, great value, and exceptional service. By understanding local preferences and continuously innovating, we aim to provide an unparalleled experience in the Digital Healthcare Booking System.</b></font></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'NewTown, Vaniyambadi, Tirupathur District- 635751', 'dhcs@gmail.com', 7896541239, NULL, '09:00 am to 7:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblspecialization`
--

CREATE TABLE `tblspecialization` (
  `ID` int(5) NOT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblspecialization`
--

INSERT INTO `tblspecialization` (`ID`, `Specialization`, `CreationDate`) VALUES
(1, 'Orthopedics', '2022-11-09 14:22:33'),
(2, 'Internal Medicine', '2022-11-09 14:23:42'),
(3, 'Obstetrics and Gynecology', '2022-11-09 14:24:14'),
(4, 'Dermatology', '2022-11-09 14:24:42'),
(5, 'Pediatrics', '2022-11-09 14:25:06'),
(6, 'Radiology', '2022-11-09 14:25:31'),
(7, 'General Surgery', '2022-11-09 14:25:52'),
(8, 'Ophthalmology', '2022-11-09 14:27:18'),
(9, 'Family Medicine', '2022-11-09 14:27:52'),
(10, 'Chest Medicine', '2022-11-09 14:28:32'),
(11, 'Anesthesia', '2022-11-09 14:29:12'),
(12, 'Pathology', '2022-11-09 14:29:51'),
(13, 'ENT', '2022-11-09 14:30:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
