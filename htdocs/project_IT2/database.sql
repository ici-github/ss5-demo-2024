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

INSERT INTO `courses` (`course_code`, `description`) VALUES
('BA',	'Bachelor of Arts'),
('BEED',	'Bachelor of Elementary Education'),
('BS',	'Bachelor of Science'),
('BSBA',	'Bachelor of Science in Business Administration'),
('BSChE',	'Bachelor of Science in Chemical Engineering'),
('BSCpE',	'Bachelor of Science in Civil Engineering'),
('BSED',	'Bachelor of Secondary Education'),
('BSN',	'Bachelor of Science in Nursing'),
('CA',	'Culinary Arts'),
('IT',	'Information Technology');

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

INSERT INTO `students` (`lrn`, `lastname`, `firstname`, `middlename`, `extension_name`, `birthdate`) VALUES
(789324892,	'Velasques',	'Kyle',	'Malone',	NULL,	'2001-12-10'),
(1234599999,	'Jones',	'Olivia',	'Marie',	NULL,	'2005-06-06'),
(9812739817,	'Almeda',	'Jerick Carlo',	'secret',	NULL,	'2024-10-23'),
(12345696969,	'Jumalon',	'Jeff',	NULL,	NULL,	'2024-10-02'),
(1234567890125,	'Johnson',	'Michael',	'David',	'',	'2002-03-03'),
(1234567890126,	'Williams',	'Emily',	'Anne',	'',	'2003-04-04'),
(1234567890128,	'Jones',	'Olivia',	'Marie',	'',	'2005-06-06'),
(1234567890129,	'Garcia',	'Noah',	'Elijah',	'',	'2006-07-07'),
(1234567890130,	'Miller',	'Emma',	'Sophia',	'',	'2007-08-08'),
(1234567890131,	'Davis',	'Ava',	'Isabella',	'',	'2008-09-09'),
(1234567890132,	'Rodriguez',	'Oliver',	'Jack',	'',	'2009-10-10'),
(1234567890134,	'Hernandez',	'Ethan',	'Mason',	'',	'2011-12-12'),
(1234567890135,	'Lopez',	'Amelia',	'Olivia',	'',	'2012-01-01'),
(1234567890136,	'Gonzalez',	'Jacob',	'Jack',	'',	'2013-02-02'),
(1234567890137,	'Wilson',	'Evelyn',	'Mia',	'',	'2014-03-03'),
(1234567890138,	'Lee',	'Lucas',	'Noah',	'',	'2015-04-04'),
(1234567890140,	'Thomas',	'Liam',	'Oliver',	'',	'2017-06-06'),
(1234567890141,	'Taylor',	'Avery',	'Ava',	'',	'2018-07-07'),
(1234567890142,	'Moore',	'Benjamin',	'Ethan',	'',	'2019-08-08'),
(94509273940578,	'Cuanan',	'Princess',	'Cabalidas',	NULL,	'2000-09-09'),
(980234759082734,	'Sanchez',	'Carlo',	NULL,	NULL,	'1969-06-09');

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
  CONSTRAINT `students_courses_ibfk_4` FOREIGN KEY (`lrn`) REFERENCES `students` (`lrn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `students_courses` (`students_courses_id`, `lrn`, `course_code`, `date_enrolled`) VALUES
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
(20,	1234567890142,	'BSCpE',	'2024-08-08 22:00:00'),
(21,	12345696969,	'IT',	'2024-10-09 14:09:06'),
(22,	1234567890131,	'BSED',	'2024-10-23 09:40:43'),
(23,	9812739817,	'IT',	'2024-10-23 09:43:21'),
(24,	980234759082734,	'BSChE',	'2024-10-23 13:46:26');

-- 2024-10-23 05:59:54