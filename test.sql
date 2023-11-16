-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 04:31 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL,
  `studentName` varchar(20) NOT NULL,
  `courseName` varchar(20) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `courseDuration` int(11) NOT NULL COMMENT 'in months',
  `teacherName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `studentName`, `courseName`, `grade`, `courseDuration`, `teacherName`) VALUES
(1, 'akshit', 'Course 6', 'A1', 3, 'kshtiz');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(11) NOT NULL,
  `courseName` varchar(100) DEFAULT NULL,
  `courseDuration` int(11) NOT NULL DEFAULT '1' COMMENT 'in months',
  `coursePrice` int(11) DEFAULT NULL,
  `courseStartDate` date DEFAULT NULL,
  `courseEndDate` date DEFAULT NULL,
  `teacher_id` int(5) DEFAULT NULL COMMENT 'teacher_id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseName`, `courseDuration`, `coursePrice`, `courseStartDate`, `courseEndDate`, `teacher_id`) VALUES
(8, 'Course 6', 3, 150, '2023-10-05', '2024-01-05', 1),
(17, 'Course 2', 4, 250, '2023-09-15', '2023-12-15', 1),
(18, 'Course 3', 6, 300, '2023-09-20', '2024-03-20', NULL),
(20, 'Course 5', 7, 330, '2023-09-30', '2024-04-30', 2),
(21, 'Course 6', 3, 150, '2023-10-05', '2024-01-05', 2),
(22, 'Course 7', 6, 280, '2023-10-10', '2024-04-10', 2),
(23, 'Course 8', 9, 400, '2023-10-15', '2024-07-15', 1),
(24, 'Course 9', 4, 130, '2023-10-20', '2024-02-20', 0),
(25, 'Course 10', 10, 450, '2023-10-25', '2024-08-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` int(10) DEFAULT NULL,
  `class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `password`, `email`, `mobile`, `class`) VALUES
(1, 'saksham', 'sak@example', 'sak@example.com', NULL, 'value'),
(2, 'akshit', 'akshit', 'akshit@example.com', 2147483647, '12'),
(3, 'fdfdd', 'dggdrtrtgrg', 'nis@gmail.com', 2147483647, 'ggrg'),
(5, 'ycyuyhb', '', 'aman@gmail.com', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `studentcoursemapping`
--

CREATE TABLE `studentcoursemapping` (
  `MappingId` int(11) NOT NULL,
  `CourseId` int(11) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `CreatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentcoursemapping`
--

INSERT INTO `studentcoursemapping` (`MappingId`, `CourseId`, `StudentId`, `CreatedOn`) VALUES
(1, 8, 1, '2023-09-04 23:48:37'),
(3, 24, 2, '2023-09-04 23:49:36'),
(5, 25, 2, '2023-09-05 00:01:15'),
(6, 21, 2, '2023-09-06 15:11:32'),
(7, 22, 1, '2023-09-08 18:53:33'),
(8, 20, 1, '2023-09-08 18:55:49'),
(9, 23, 1, '2023-09-08 18:56:40'),
(10, 22, 2, '2023-09-08 19:14:38'),
(11, 18, 2, '2023-09-08 20:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `password`, `email`, `mobile`) VALUES
(1, 'Michael Johnson', 'HGGGWTGW', 'goyalsajal73@gmail.c', 2147483647),
(2, 'kshtiz', '12345', 'kshtiz@teacher.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `mobile`) VALUES
(2, 'Sajal', 'sajal123', 'sajalgoyal25@yopmail.com', '8077140282'),
(9, 'Michael Johnson', 'mikepass', 'michael.johnson@example.com', '3456789014'),
(11, 'William Brown', 'brownpass', 'william.brown@example.com', '5678901234'),
(12, 'Olivia Martinez', 'olivia456', 'olivia.martinez@example.com', '6789012345'),
(13, 'James Anderson', 'jamespass', 'james.anderson@example.com', '7890123456'),
(14, 'Sophia Wilson', 'sophia789', 'sophia.wilson@example.com', '8901234567'),
(16, 'Ava Thomas', 'avapass', 'ava.thomas@example.com', '1234567890'),
(17, 'Ethan Hall', 'ethan567', 'ethan.hall@example.com', '2345678901'),
(19, 'Liam Turner', 'liam789', 'liam.turner@example.com', '4567890123'),
(20, 'Oliver White', 'oliverpass', 'oliver.white@example.com', '5678901234'),
(21, 'Mia Lewis', 'miapass', 'mia.lewis@example.com', '6789012345'),
(22, 'Noah Walker', 'noah123', 'noah.walker@example.com', '7890123456'),
(23, 'Isabella Green', 'isabellapass', 'isabella.green@example.com', '8901234567'),
(24, 'Sophia Hill', 'sophia567', 'sophia.hill@example.com', '9012345678'),
(25, 'Jacob Mitchell', 'jacobpass', 'jacob.mitchell@example.com', '1234567890'),
(26, 'Liam Turner', 'liampass', 'liam.turner@example.com', '2345678901'),
(27, 'John Doe', 'password123', 'john.doe@example.com', '1234567890'),
(28, 'Jane Smith', 'securepass', 'jane.smith@example.com', '2345678901'),
(29, 'Michael Johnson', 'mikepass', 'michael.johnson@example.com', '3456789012'),
(30, 'Emily Williams', 'emily123', 'emily.williams@example.com', '4567890123'),
(31, 'William Brown', 'brownpass', 'william.brown@example.com', '5678901234'),
(32, 'Olivia Martinez', 'olivia456', 'olivia.martinez@example.com', '6789012345'),
(33, 'James Anderson', 'jamespass', 'james.anderson@example.com', '7890123456'),
(34, 'Sophia Wilson', 'sophia789', 'sophia.wilson@example.com', '8901234567'),
(35, 'Benjamin Taylor', 'benjaminpass', 'benjamin.taylor@example.com', '9012345678'),
(36, 'Ava Thomas', 'avapass', 'ava.thomas@example.com', '1234567890'),
(37, 'Ethan Hall', 'ethan567', 'ethan.hall@example.com', '2345678901'),
(38, 'Emma Clark', 'emma456', 'emma.clark@example.com', '3456789012'),
(39, 'Liam Turner', 'liam789', 'liam.turner@example.com', '4567890123'),
(40, 'Oliver White', 'oliverpass', 'oliver.white@example.com', '5678901234'),
(41, 'Mia Lewis', 'miapass', 'mia.lewis@example.com', '6789012345'),
(42, 'Noah Walker', 'noah123', 'noah.walker@example.com', '7890123456'),
(43, 'Isabella Green', 'isabellapass', 'isabella.green@example.com', '8901234567'),
(44, 'Sophia Hill', 'sophia567', 'sophia.hill@example.com', '9012345678'),
(45, 'Jacob Mitchell', 'jacobpass', 'jacob.mitchell@example.com', '1234567890'),
(46, 'Liam Turner', 'liampass', 'liam.turner@example.com', '2345678901'),
(47, 'saksham', '', 'sakshamgoyal@gmail.com', '3456789014'),
(48, 'saksham123', '', 'sakshamgoyal@gmail.com', '3456789014'),
(49, 'saksham', '', 'sakshamgoyal@gmail.com', '9058378584'),
(50, 'saksham', '', 'sakshamgoyal@gmail.com', '3456789013'),
(56, 'saksham123', '', 'sakshamgoyal@gmail.com', '9058378584'),
(57, 'aman', '', 'aman@gmail.com', '3456789013'),
(60, 'nishant lamiyan', '', 'nis@gmail.com', '3456789013');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentcoursemapping`
--
ALTER TABLE `studentcoursemapping`
  ADD PRIMARY KEY (`MappingId`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentcoursemapping`
--
ALTER TABLE `studentcoursemapping`
  MODIFY `MappingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
