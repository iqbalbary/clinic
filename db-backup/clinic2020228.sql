-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 11:01 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `deposite`
--

CREATE TABLE `deposite` (
  `Deposite_ID` int(11) NOT NULL,
  `Profile_ID` varchar(255) DEFAULT NULL,
  `Deposite_Slip` varchar(255) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `late_fine` int(11) DEFAULT NULL,
  `Date` int(11) DEFAULT NULL,
  `Month` varchar(255) DEFAULT NULL,
  `Short_Description` mediumtext DEFAULT NULL,
  `Verification` tinyint(1) DEFAULT 0,
  `Verification_ID` int(11) DEFAULT NULL,
  `submission_id` int(11) DEFAULT NULL,
  `Verification_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `recrord id` int(11) DEFAULT NULL,
  `change_details` longtext DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `month_year`
--

CREATE TABLE `month_year` (
  `id` int(11) NOT NULL,
  `month_name` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month_year`
--

INSERT INTO `month_year` (`id`, `month_name`, `year`) VALUES
(1, 'January', '2020'),
(2, 'February', '2020'),
(3, 'March', '2020'),
(4, 'April', '2020'),
(5, 'May', '2020'),
(6, 'June', '2020'),
(7, 'July', '2020'),
(8, 'Augest', '2020'),
(9, 'September', '2020'),
(10, 'Octbpr', '2019'),
(11, 'November', '2019'),
(12, 'December', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `User_Role` tinyint(2) DEFAULT 1,
  `Verified` int(2) DEFAULT 0,
  `Verification_ID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Father_Name` varchar(255) DEFAULT NULL,
  `Mother_Name` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `NID` varchar(255) DEFAULT NULL,
  `NID_Screenshot` varchar(255) DEFAULT NULL,
  `Short_Description` text DEFAULT NULL,
  `Profession` varchar(150) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Secondary_Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `FB_Link` varchar(400) DEFAULT NULL,
  `Nominee_Name` varchar(255) DEFAULT NULL,
  `Nominee_Relation` varchar(50) DEFAULT NULL,
  `Status` tinyint(2) DEFAULT 0,
  `Edit_History` int(11) DEFAULT NULL,
  `Verification_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `Password`, `User_Role`, `Verified`, `Verification_ID`, `Name`, `Father_Name`, `Mother_Name`, `Image`, `NID`, `NID_Screenshot`, `Short_Description`, `Profession`, `Phone`, `Secondary_Phone`, `Email`, `Address`, `FB_Link`, `Nominee_Name`, `Nominee_Relation`, `Status`, `Edit_History`, `Verification_date`) VALUES
(1, '8cb2237d0679ca88db6464eac60da96345513964', 2, 1, 1, 'wwww', 'ww', 'ww', '1578406826aaa.png', 'www', '1578406826bbbb.png', '                                                                                        wewe                                                                                                   ', 'www', 'www', 'www', 'www@sd.sdfds', '                                                                                     wewewe                                                                                                   ', 'www', 'ww', 'ww', 1, NULL, 1582866229);

-- --------------------------------------------------------

--
-- Table structure for table `user_deposite`
--

CREATE TABLE `user_deposite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `deposit_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `late_fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposite`
--
ALTER TABLE `deposite`
  ADD PRIMARY KEY (`Deposite_ID`),
  ADD UNIQUE KEY `Deposite_ID_UNIQUE` (`Deposite_ID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `month_year`
--
ALTER TABLE `month_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `user_deposite`
--
ALTER TABLE `user_deposite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deposite`
--
ALTER TABLE `deposite`
  MODIFY `Deposite_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `month_year`
--
ALTER TABLE `month_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_deposite`
--
ALTER TABLE `user_deposite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
