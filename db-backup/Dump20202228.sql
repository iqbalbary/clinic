-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 07:25 AM
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

--
-- Dumping data for table `deposite`
--

INSERT INTO `deposite` (`Deposite_ID`, `Profile_ID`, `Deposite_Slip`, `Amount`, `late_fine`, `Date`, `Month`, `Short_Description`, `Verification`, `Verification_ID`, `submission_id`, `Verification_date`) VALUES
(1, '1,3,2', '158017458481396839_824143501343851_4387819725820788736_n.jpg', 5000, 50, 1580174584, '4,6', 'd kdf bkjbfk jsd', 1, 1, 1, 1580310189),
(2, '1,3,2', '158022545582174094_2554595381336254_7730137767757217792_n.jpg', 5001, 501, 1582870310, '2,3,5', 'BBBB', 0, 1, 1, 1580310189),
(3, '2,1,3', '158031016682362775_2486374481621192_7405029054350360576_n.jpg', 5000, 5, 1580310166, '2,4', NULL, 1, 1, 3, 1580310189),
(4, '2', '158031018982362775_2486374481621192_7405029054350360576_n.jpg', 45435, 343, 1580310189, '1', NULL, 0, 1, 4, 1580310189),
(5, '2,1,3,6', '158032437282174094_2554595381336254_7730137767757217792_n.jpg', 50000, 343, 1580324372, '2,4', NULL, 0, 1, 0, 1580310189),
(6, '1,3', '158032440482877392_609970369577319_964180532583727104_n.jpg', 769, -98, 1580324404, '2,4', NULL, 0, 1, 1, 1580310189),
(7, '2,4', '1582860625ball_line_black.png', 5000, 200, 1582860625, '3,4', NULL, 0, NULL, 1, 1580310189);

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
(10, 'Octbpr', '2020'),
(11, 'November', '2020'),
(12, 'December', '2020');

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
(1, '8cb2237d0679ca88db6464eac60da96345513964', 2, 1, 1, 'wwww', 'ww', 'ww', '1578406826aaa.png', 'www', '1578406826bbbb.png', '                                                                                        wewe                                                                                                   ', 'www', 'www', 'www', 'www@sd.sdfds', '                                                                                     wewewe                                                                                                   ', 'www', 'ww', 'ww', 1, NULL, 1582866229),
(2, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1, NULL, 'onik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '999978', NULL, 'nawaz1244@boo2.nl', NULL, NULL, NULL, NULL, 0, NULL, 1582866603),
(3, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1, NULL, 'sujan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '999978', NULL, 'boo2.nawaz@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, 1582866557),
(4, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1, NULL, 'anamul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '999978', NULL, 'boo2.nawaz@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, 1582866533),
(5, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1, NULL, 'kxc kx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '999978', NULL, 'boo2.nawaz@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, 1582866566),
(6, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1, NULL, 'kxc kx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '999978', NULL, 'boo2.nawaz@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, 1582866619);

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
-- Dumping data for table `user_deposite`
--

INSERT INTO `user_deposite` (`id`, `user_id`, `month`, `deposit_id`, `amount`, `late_fine`) VALUES
(1, 1, 4, 1, 5000, 0),
(2, 1, 6, 1, 5000, 0),
(3, 3, 4, 1, 5000, 0),
(4, 3, 6, 1, 5000, 0),
(5, 2, 4, 1, 5000, 0),
(6, 2, 6, 1, 5000, 0),
(7, 1, 4, 1, 5000, 0),
(8, 1, 6, 1, 5000, 0),
(9, 3, 4, 1, 5000, 0),
(10, 3, 6, 1, 5000, 0),
(11, 2, 4, 1, 5000, 0),
(12, 2, 6, 1, 5000, 0),
(13, 2, 1, 4, 5000, 0),
(14, 2, 2, 3, 5000, 0),
(15, 2, 4, 3, 5000, 0),
(16, 1, 2, 3, 5000, 0),
(17, 1, 4, 3, 5000, 0),
(18, 3, 2, 3, 5000, 0),
(19, 3, 4, 3, 5000, 0);

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
  MODIFY `Deposite_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_deposite`
--
ALTER TABLE `user_deposite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
