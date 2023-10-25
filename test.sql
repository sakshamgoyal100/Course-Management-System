-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 04:52 PM
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
  `courseId` int(5) NOT NULL,
  `studentId` int(11) NOT NULL,
  `studentName` varchar(20) NOT NULL,
  `studentEmail` varchar(50) NOT NULL,
  `courseName` varchar(20) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `courseDuration` int(11) NOT NULL COMMENT 'in months',
  `teacherName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `courseId`, `studentId`, `studentName`, `studentEmail`, `courseName`, `grade`, `courseDuration`, `teacherName`) VALUES
(2, 20, 1, 'saksham', 'sak@example.com', 'Course 5', 'A1', 7, 'kshtiz'),
(4, 20, 3, 'fdfdd', 'nis@gmail.com', 'Course 5', 'B1', 7, 'kshtiz'),
(5, 20, 2, 'akshit', 'akshit@example.com', 'Course 5', 'A1', 7, 'kshtiz'),
(6, 21, 2, 'akshit', 'akshit@example.com', 'Course 6', 'A2', 3, 'kshtiz');

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
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL,
  `expirationTime` datetime DEFAULT NULL,
  `createdOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`id`, `email`, `otp`, `expirationTime`, `createdOn`) VALUES
(1, 'sakshamgoyal100@gmail.com', 8005, '2023-09-13 19:55:55', '2023-09-13 19:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(10) DEFAULT NULL,
  `class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `password`, `email`, `mobile`, `class`) VALUES
(1, 'saksham', 'sak@example', 'sakshamgoyal100@gmai', NULL, 'value'),
(2, 'akshit', 'akshit', 'akshit@example.com', 2147483647, '12'),
(3, 'fdfdd', 'dggdrtrtgrg', 'nis@gmail.com', 2147483647, 'ggrg'),
(5, 'ycyuyhb', '', 'aman@gmail.com', 0, ''),
(6, 'ggfg', 'ydtyy', 'sak@gaim.vom', 34566777, 'hgcghhg');

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
(11, 18, 2, '2023-09-08 20:00:34'),
(12, 20, 2, '2023-09-11 14:48:42'),
(13, 20, 3, '2023-09-11 15:42:16'),
(14, 20, 5, '2023-09-13 20:26:28');

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
-- Table structure for table `test_api`
--

CREATE TABLE `test_api` (
  `id` int(10) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `function` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_api`
--

INSERT INTO `test_api` (`id`, `request_type`, `url`, `function`) VALUES
(1, 'Post', 'localhost/api.php', '{\"method\":\"getstudent\"}'),
(2, 'Post', 'localhost/api.php', '{\"id\":\"2\"}'),
(3, 'Post', 'localhost/api.php', '[]'),
(4, 'Post', 'localhost/api.php', '{\"id\":\"2\"}'),
(5, 'Post', 'localhost/api.php', '{\"method\":\"2\"}'),
(6, 'Post', 'localhost/api.php', '{\"method\":\"2\"}'),
(7, 'Post', 'localhost/api.php', '{\"method\":\"getstudent\",\"studentid\":\"2\"}'),
(8, 'Get', 'http://localhost/test/common/api.php', '{\"method\":\"getReport\",\"course_id\":\"20\"}'),
(9, 'Post', 'localhost/api.php', '{\"method\":\"getstu\",\"studentid\":\"2\"}'),
(10, 'Post', 'localhost/api.php', '{\"method\":\"getstu\",\"studentid\":\"3\"}'),
(11, 'Post', 'localhost/api.php', '{\"method\":\"getstu\"}'),
(12, 'Post', 'localhost/api.php', '{\"method\":\"getstu\",\"studentid\":\"2\"}'),
(13, 'Post', 'http://localhost/test/common/api.php', '{\"method\":\"getstudent\",\"student_id\":\"2\"}'),
(14, 'Post', 'http://localhost/test/common/api.php', '{\"method\":\"getstudent\",\"student_id\":\"2\"}'),
(15, 'Post', 'http://localhost/test/common/api.php', '{\"method\":\"getstudent\",\"student_id\":\"2\"}'),
(16, 'Post', 'http://localhost/test/common/api.php', '{\"method\":\"getStudents\",\"course_id\":\"1\"}'),
(17, 'Post', 'http://localhost/test/common/api.php', '{\"method\":\"getStudents\",\"course_id\":\"8\"}');

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
(47, 'saksham', '', 'sakshamgoyal@gmail.com', '3456789014'),
(48, 'saksham123', '', 'sakshamgoyal@gmail.com', '3456789014'),
(49, 'saksham', '', 'sakshamgoyal@gmail.com', '9058378584'),
(50, 'saksham', '', 'sakshamgoyal@gmail.com', '3456789013'),
(56, 'saksham123', '', 'sakshamgoyal@gmail.com', '9058378584'),
(57, 'aman', '', 'aman@gmail.com', '3456789013'),
(60, 'nishant lamiyan', '', 'nis@gmail.com', '3456789013'),
(61, 'saksham', 'sak12345', 'sakshamgoyal100@gmail.com', '');

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
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `test_api`
--
ALTER TABLE `test_api`
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
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studentcoursemapping`
--
ALTER TABLE `studentcoursemapping`
  MODIFY `MappingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_api`
--
ALTER TABLE `test_api`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
