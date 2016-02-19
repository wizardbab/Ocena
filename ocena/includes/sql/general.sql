-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2016 at 05:59 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocena`
--
CREATE DATABASE IF NOT EXISTS `ocena` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ocena`;

-- --------------------------------------------------------

--
-- Table structure for table `CLASS`
--

CREATE TABLE IF NOT EXISTS `CLASS` (
  `class_id` int(11) NOT NULL,
  `class_teacher_id` int(11) NOT NULL,
  `class_course_id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `COURSE`
--

CREATE TABLE IF NOT EXISTS `COURSE` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `COURSE_RATING`
--

CREATE TABLE IF NOT EXISTS `COURSE_RATING` (
  `rating_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `course_question_one` int(11) DEFAULT NULL,
  `course_question_two` int(11) DEFAULT NULL,
  `course_question_three` int(11) DEFAULT NULL,
  `course_question_four` int(11) DEFAULT NULL,
  `course_question_five` int(11) DEFAULT NULL,
  `comment` varchar(2000) DEFAULT '',
  `course_teacher_id` int(11) DEFAULT NULL,
  `course_rating_active` int(11) DEFAULT '1',
  `rating_date` datetime DEFAULT NULL,
  `vote_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ENROLL`
--

CREATE TABLE IF NOT EXISTS `ENROLL` (
  `enroll_id` int(11) NOT NULL,
  `enroll_student_id` int(11) NOT NULL,
  `enroll_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `STUDENT`
--

CREATE TABLE IF NOT EXISTS `STUDENT` (
  `student_id` int(11) NOT NULL,
  `student_lname` varchar(255) DEFAULT NULL,
  `student_fname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TEACHER`
--

CREATE TABLE IF NOT EXISTS `TEACHER` (
  `teacher_id` int(11) NOT NULL,
  `teacher_lname` varchar(255) DEFAULT NULL,
  `teacher_fname` varchar(255) DEFAULT NULL,
  `teacher_office` varchar(255) DEFAULT NULL,
  `teacher_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TEACHER_RATING`
--

CREATE TABLE IF NOT EXISTS `TEACHER_RATING` (
  `rating_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `teacher_question_one` int(11) DEFAULT NULL,
  `teacher_question_two` int(11) DEFAULT NULL,
  `teacher_question_three` int(11) DEFAULT NULL,
  `teacher_question_four` int(11) DEFAULT NULL,
  `teacher_question_five` int(11) DEFAULT NULL,
  `comment` varchar(2000) DEFAULT '',
  `teacher_course_id` int(11) DEFAULT NULL,
  `teacher_rating_active` int(11) DEFAULT '1',
  `rating_date` datetime DEFAULT NULL,
  `vote_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `VOTES`
--

CREATE TABLE IF NOT EXISTS `VOTES` (
  `id` int(11) unsigned NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `t_or_c` char(1) DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `vote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CLASS`
--
ALTER TABLE `CLASS`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `COURSE`
--
ALTER TABLE `COURSE`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `COURSE_RATING`
--
ALTER TABLE `COURSE_RATING`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `ENROLL`
--
ALTER TABLE `ENROLL`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `TEACHER`
--
ALTER TABLE `TEACHER`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `TEACHER_RATING`
--
ALTER TABLE `TEACHER_RATING`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `VOTES`
--
ALTER TABLE `VOTES`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COURSE_RATING`
--
ALTER TABLE `COURSE_RATING`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ENROLL`
--
ALTER TABLE `ENROLL`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TEACHER_RATING`
--
ALTER TABLE `TEACHER_RATING`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `VOTES`
--
ALTER TABLE `VOTES`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `teacher` (`teacher_id`, `teacher_lname`, `teacher_fname`, `teacher_office`, `teacher_email`) VALUES
(1, 'Geary', 'Michael', 'AC 2XX', 'mgeary@faculty.pcci.edu'),
(2, 'Howell', 'Robert', 'AC 2XX', 'rhowell@faculty.pcci.edu'),
(3, 'Smith', 'Lonnie', 'AC 4XX', 'lsmith@faculty.pcci.edu');

INSERT INTO `course` (`course_id`, `course_name`, `course_label`) VALUES
(1, 'Topics in Computation', 'CS 431'),
(2, 'Business Communications', 'BA 403'),
(3, 'Software Engineering Project 1', 'CS 451');

INSERT INTO `class` (`class_id`, `class_teacher_id`, `class_course_id`, `class_name`) VALUES
(1, 2, 1, 'Topics in Computation'),
(2, 1, 3, 'Software Engineering Project 1'),
(3, 3, 2, 'Business Communications');