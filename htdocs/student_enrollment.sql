-- Adminer 4.8.1 MySQL 10.4.34-MariaDB-1:10.4.34+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `course_code` varchar(40) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `lrn` bigint(20) NOT NULL,
  `lastname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`lrn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `students_courses`;
CREATE TABLE `students_courses` (
  `students_courses_id` int(11) NOT NULL AUTO_INCREMENT,
  `lrn` bigint(20) NOT NULL,
  `course_code` varchar(40) NOT NULL,
  `date_enrolled` datetime DEFAULT NULL,
  PRIMARY KEY (`students_courses_id`),
  KEY `students_students_courses` (`lrn`),
  KEY `courses_students_courses` (`course_code`),
  CONSTRAINT `courses_students_courses` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`),
  CONSTRAINT `students_courses_ibfk_2` FOREIGN KEY (`lrn`) REFERENCES `students` (`lrn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `students_courses` (`students_courses_id`, `lrn`, `course_code`, `date_enrolled`) VALUES
(2,	1234567890124,	'CA',	'2023-02-02 10:00:00'),
(3,	1234567890125,	'BS',	'2023-03-03 12:00:00'),
(4,	1234567890126,	'BA',	'2023-04-04 14:00:00'),
(6,	1234567890128,	'BSED',	'2023-06-06 18:00:00'),
(7,	1234567890129,	'BEED',	'2023-07-07 20:00:00'),
(8,	1234567890130,	'BSN',	'2023-08-08 22:00:00'),
(9,	1234567890131,	'BSChE',	'2023-09-09 00:00:00'),
(10,	1234567890132,	'BSCpE',	'2023-10-10 02:00:00'),
(12,	1234567890134,	'CA',	'2023-12-12 06:00:00'),
(13,	1234567890135,	'BS',	'2024-01-01 08:00:00'),
(14,	1234567890136,	'BA',	'2024-02-02 10:00:00'),
(15,	1234567890137,	'BSBA',	'2024-03-03 12:00:00'),
(16,	1234567890138,	'BSED',	'2024-04-04 14:00:00'),
(18,	1234567890140,	'BSN',	'2024-06-06 18:00:00'),
(19,	1234567890141,	'BSChE',	'2024-07-07 20:00:00'),
(20,	1234567890142,	'BSCpE',	'2024-08-08 22:00:00');

-- 2024-10-02 02:33:22
