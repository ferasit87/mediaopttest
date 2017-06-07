-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2016 at 04:07 AM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Mediaopt`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_employee`
--

CREATE TABLE `m_employee` (
  `ID` int(6) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lName` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_employee`
--

INSERT INTO `m_employee` (`ID`, `name`, `lName`, `email`) VALUES
(2, 'Feras', 'Daeef', 'test@test.com'),
(8, 'akad', 'test', 'daf@one-touch.ru'),
(9, 'test2', 'test2', 'test2@test.com'),
(10, 'test3', 'test3', 'test3@test.com'),
(11, 'test4', 'test4', 'test4@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `m_logs`
--

CREATE TABLE `m_logs` (
  `ID` int(6) NOT NULL,
  `id_employee` int(6) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_logs`
--

INSERT INTO `m_logs` (`ID`, `id_employee`, `date`, `start_time`, `end_time`) VALUES
(2, 8, '2016-12-16', '10:15:00', '01:15:00'),
(4, 9, '2016-12-14', '10:15:00', '10:15:00'),
(5, 2, '2016-12-06', '10:30:00', '10:30:00'),
(6, 9, '2016-12-14', '10:30:00', '10:30:00'),
(7, 9, '2016-12-17', '22:45:00', '22:45:00'),
(24, 8, '2016-11-16', '10:15:00', '01:15:00'),
(25, 9, '2016-11-14', '10:15:00', '10:15:00'),
(26, 2, '2016-11-06', '10:30:00', '10:30:00'),
(27, 9, '2016-11-14', '10:30:00', '10:30:00'),
(28, 9, '2016-11-17', '22:45:00', '22:45:00'),
(29, 8, '2016-11-16', '10:15:00', '01:15:00'),
(30, 9, '2016-11-14', '10:15:00', '10:15:00'),
(31, 2, '2016-11-06', '10:30:00', '10:30:00'),
(32, 9, '2016-11-14', '10:30:00', '10:30:00'),
(33, 9, '2016-11-17', '22:45:00', '22:45:00'),
(34, 8, '2016-11-16', '10:15:00', '01:15:00'),
(35, 9, '2016-11-14', '10:15:00', '10:15:00'),
(36, 2, '2016-11-06', '10:30:00', '10:30:00'),
(37, 9, '2016-11-14', '10:30:00', '10:30:00'),
(38, 9, '2016-11-17', '22:45:00', '22:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_project`
--

CREATE TABLE `m_project` (
  `ID` int(6) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_project`
--

INSERT INTO `m_project` (`ID`, `name`) VALUES
(1, 'Project0'),
(2, 'Project1'),
(3, 'Project2'),
(4, 'Project3'),
(5, 'Project4');

-- --------------------------------------------------------

--
-- Table structure for table `m_task`
--

CREATE TABLE `m_task` (
  `ID` int(6) NOT NULL,
  `id_employee` int(6) NOT NULL,
  `id_project` int(6) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_task`
--

INSERT INTO `m_task` (`ID`, `id_employee`, `id_project`, `date`, `start_time`, `end_time`) VALUES
(6, 9, 2, '2016-12-06', '00:15:00', '12:15:00'),
(8, 2, 2, '2016-12-06', '13:00:00', '14:00:00'),
(9, 2, 2, '2016-12-06', '15:20:00', '16:00:00'),
(10, 10, 2, '2016-12-06', '11:00:00', '23:22:00'),
(12, 11, 2, '2016-12-06', '13:00:00', '14:00:00'),
(14, 10, 2, '2016-12-06', '13:00:00', '14:00:00'),
(15, 9, 2, '2016-12-06', '13:15:00', '14:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_employee`
--
ALTER TABLE `m_employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `m_logs`
--
ALTER TABLE `m_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `m_project`
--
ALTER TABLE `m_project`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `m_task`
--
ALTER TABLE `m_task`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_employee`
--
ALTER TABLE `m_employee`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `m_logs`
--
ALTER TABLE `m_logs`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `m_project`
--
ALTER TABLE `m_project`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_task`
--
ALTER TABLE `m_task`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
