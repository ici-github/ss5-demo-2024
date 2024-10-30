-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 02:42 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mariadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(40) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `description`) VALUES
('BA', 'Bachelor of Arts'),
('BEED', 'Bachelor of Elementary Education'),
('BS', 'Bachelor of Science'),
('BSBA', 'Bachelor of Science in Business Administration'),
('BSChE', 'Bachelor of Science in Chemical Engineering'),
('BSCpE', 'Bachelor of Science in Civil Engineering'),
('BSED', 'Bachelor of Secondary Education'),
('BSN', 'Bachelor of Science in Nursing'),
('CA', 'Culinary Arts'),
('IT', 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `lrn` bigint(20) NOT NULL,
  `lastname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`lrn`, `lastname`, `firstname`, `middlename`, `extension_name`, `birthdate`, `filepath`, `uploaded_on`) VALUES
(789324892, 'Velasques', 'Kyle', 'Malone', NULL, '2001-12-10', NULL, '2024-10-30 01:06:52'),
(1234599999, 'Jones', 'Olivia', 'Marie', NULL, '2005-06-06', NULL, '2024-10-30 01:06:52'),
(98743918273, 'Almeda', 'Jerick Carlo', 'Secret', NULL, '2024-10-30', 'uploads/sample_photo.jpg', '2024-10-30 01:15:17'),
(1234567890124, 'Smith', 'Jane', 'Doe', 'III', '2001-02-02', NULL, '2024-10-30 01:06:52'),
(1234567890125, 'Johnson', 'Michael', 'David', '', '2002-03-03', NULL, '2024-10-30 01:06:52'),
(1234567890126, 'Williams', 'Emily', 'Anne', '', '2003-04-04', NULL, '2024-10-30 01:06:52'),
(1234567890128, 'Jones', 'Olivia', 'Marie', '', '2005-06-06', NULL, '2024-10-30 01:06:52'),
(1234567890129, 'Garcia', 'Noah', 'Elijah', '', '2006-07-07', NULL, '2024-10-30 01:06:52'),
(1234567890130, 'Miller', 'Emma', 'Sophia', '', '2007-08-08', NULL, '2024-10-30 01:06:52'),
(1234567890131, 'Davis', 'Ava', 'Isabella', '', '2008-09-09', NULL, '2024-10-30 01:06:52'),
(1234567890132, 'Rodriguez', 'Oliver', 'Jack', '', '2009-10-10', NULL, '2024-10-30 01:06:52'),
(1234567890134, 'Hernandez', 'Ethan', 'Mason', '', '2011-12-12', NULL, '2024-10-30 01:06:52'),
(1234567890135, 'Lopez', 'Amelia', 'Olivia', '', '2012-01-01', NULL, '2024-10-30 01:06:52'),
(1234567890136, 'Gonzalez', 'Jacob', 'Jack', '', '2013-02-02', NULL, '2024-10-30 01:06:52'),
(1234567890137, 'Wilson', 'Evelyn', 'Mia', '', '2014-03-03', NULL, '2024-10-30 01:06:52'),
(1234567890138, 'Lee', 'Lucas', 'Noah', '', '2015-04-04', NULL, '2024-10-30 01:06:52'),
(1234567890140, 'Thomas', 'Liam', 'Oliver', '', '2017-06-06', NULL, '2024-10-30 01:06:52'),
(1234567890141, 'Taylor', 'Avery', 'Ava', '', '2018-07-07', NULL, '2024-10-30 01:06:52'),
(1234567890142, 'Moore', 'Benjamin', 'Ethan', '', '2019-08-08', NULL, '2024-10-30 01:06:52'),
(94509273940578, 'Cuanan', 'Princess', 'Cabalidas', NULL, '2000-09-09', NULL, '2024-10-30 01:06:52'),
(1234567890000000, 'Bacarro', 'Kyle', 'Palangan', NULL, '2024-10-02', NULL, '2024-10-30 01:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `students_courses`
--

CREATE TABLE `students_courses` (
  `students_courses_id` int(11) NOT NULL,
  `lrn` bigint(20) NOT NULL,
  `course_code` varchar(40) NOT NULL,
  `date_enrolled` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_courses`
--

INSERT INTO `students_courses` (`students_courses_id`, `lrn`, `course_code`, `date_enrolled`) VALUES
(2, 1234567890124, 'CA', '2023-02-02 10:00:00'),
(3, 1234567890125, 'BS', '2023-03-03 12:00:00'),
(4, 1234567890126, 'BA', '2023-04-04 14:00:00'),
(6, 1234567890128, 'BSED', '2023-06-06 18:00:00'),
(7, 1234567890129, 'BEED', '2023-07-07 20:00:00'),
(8, 1234567890130, 'BSN', '2023-08-08 22:00:00'),
(9, 1234567890131, 'BSChE', '2023-09-09 00:00:00'),
(10, 1234567890132, 'BSCpE', '2023-10-10 02:00:00'),
(12, 1234567890134, 'CA', '2023-12-12 06:00:00'),
(13, 1234567890135, 'BS', '2024-01-01 08:00:00'),
(14, 1234567890136, 'BA', '2024-02-02 10:00:00'),
(15, 1234567890137, 'BSBA', '2024-03-03 12:00:00'),
(16, 1234567890138, 'BSED', '2024-04-04 14:00:00'),
(18, 1234567890140, 'BSN', '2024-06-06 18:00:00'),
(19, 1234567890141, 'BSChE', '2024-07-07 20:00:00'),
(20, 1234567890142, 'BSCpE', '2024-08-08 22:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`lrn`);

--
-- Indexes for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD PRIMARY KEY (`students_courses_id`),
  ADD KEY `students_students_courses` (`lrn`),
  ADD KEY `courses_students_courses` (`course_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_courses`
--
ALTER TABLE `students_courses`
  MODIFY `students_courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD CONSTRAINT `courses_students_courses` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`),
  ADD CONSTRAINT `students_courses_ibfk_2` FOREIGN KEY (`lrn`) REFERENCES `students` (`lrn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
