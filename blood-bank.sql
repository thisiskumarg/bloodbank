-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 01:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood-bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood-details`
--

CREATE TABLE `blood-details` (
  `bid` int(11) NOT NULL,
  `bupload-date` timestamp NOT NULL DEFAULT current_timestamp(),
  `btype` varchar(200) NOT NULL,
  `bquantity` varchar(200) NOT NULL,
  `blocation` varchar(200) NOT NULL,
  `blood_del` int(11) NOT NULL DEFAULT 0,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood-details`
--

INSERT INTO `blood-details` (`bid`, `bupload-date`, `btype`, `bquantity`, `blocation`, `blood_del`, `uid`) VALUES
(1, '2021-07-21 14:33:39', 'A+', '50', 'Bhopal', 0, 1),
(2, '2021-07-22 15:15:40', 'A-', '70', 'Jhansi', 0, 1),
(3, '2021-07-22 15:22:22', 'B+', '80', 'Lucknow', 0, 1),
(4, '2021-07-23 15:38:06', 'O+', '50', 'Indore', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `rid` int(11) NOT NULL,
  `rdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `blood_quantity` varchar(200) NOT NULL,
  `rec_del` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `bid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`rid`, `rdate`, `blood_quantity`, `rec_del`, `status`, `bid`, `userid`) VALUES
(1, '2021-07-22 20:41:24', '10', 0, 1, 1, 2),
(2, '2021-07-22 20:41:46', '5', 0, 2, 1, 2),
(3, '2021-07-23 15:05:40', '20', 0, 0, 3, 2),
(4, '2021-07-23 15:39:20', '5', 0, 0, 4, 2),
(5, '2021-07-23 16:15:53', '10', 0, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`) VALUES
(1, 'Hospital'),
(2, 'Receiver');

-- --------------------------------------------------------

--
-- Table structure for table `user-details`
--

CREATE TABLE `user-details` (
  `uid` int(11) NOT NULL,
  `ureg-date` timestamp NOT NULL DEFAULT current_timestamp(),
  `uname` varchar(200) NOT NULL,
  `umobile` varchar(200) NOT NULL,
  `uemail` varchar(200) NOT NULL,
  `upassword` varchar(200) NOT NULL,
  `uage` int(11) NOT NULL,
  `ublood-type` varchar(200) NOT NULL,
  `roleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user-details`
--

INSERT INTO `user-details` (`uid`, `ureg-date`, `uname`, `umobile`, `uemail`, `upassword`, `uage`, `ublood-type`, `roleid`) VALUES
(1, '2021-07-20 15:30:03', 'ARJ Hospital', '011 7825756', 'h1@h.com', 'h', 0, '', 1),
(2, '2021-07-20 15:31:29', 'Aakash', '8545659575', 'r1@r.com', 'r', 45, 'A+', 2),
(3, '2021-07-23 15:14:40', 'PR Hospital', '015 85456525', 'h2@h.com', 'h', 0, '', 1),
(4, '2021-07-23 15:21:39', 'Prakash', '8565452575', 'r2@r.com', 'r', 25, 'B+', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood-details`
--
ALTER TABLE `blood-details`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `user-details`
--
ALTER TABLE `user-details`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood-details`
--
ALTER TABLE `blood-details`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user-details`
--
ALTER TABLE `user-details`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
