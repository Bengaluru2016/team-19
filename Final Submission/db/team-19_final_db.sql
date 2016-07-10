-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2016 at 01:19 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `team-19`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) NOT NULL DEFAULT '0',
  `category_name` varchar(50) DEFAULT NULL,
  `category_description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Agriculture', 'to promote agriculture in rural areas'),
(2, 'Health care', 'to promote health care '),
(3, 'Education', 'to provide education to the needed'),
(4, 'Energy', 'to utilize energy in a better way');

-- --------------------------------------------------------

--
-- Table structure for table `category_to_type`
--

CREATE TABLE IF NOT EXISTS `category_to_type` (
  `type_id` int(10) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `catogory_description` varchar(100) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_to_type`
--

INSERT INTO `category_to_type` (`type_id`, `category`, `catogory_description`) VALUES
(0, 'admin', 'identification of  the administrator'),
(1, 'staff', 'staff who are working in villgro'),
(2, 'mentor', 'mentors who have volunteer for a particular module');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `content_id` int(5) NOT NULL,
  `content_name` varchar(100) NOT NULL,
  `content_details` varchar(300) NOT NULL,
  `content_type` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `points` int(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  `uploaded_on` date NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE IF NOT EXISTS `course_table` (
  `course_id` int(10) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `points_table`
--

CREATE TABLE IF NOT EXISTS `points_table` (
  `user_id` int(10) NOT NULL DEFAULT '0',
  `course_id` int(10) NOT NULL DEFAULT '0',
  `status` int(1) DEFAULT NULL,
  `score` int(3) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_content`
--

CREATE TABLE IF NOT EXISTS `quiz_content` (
  `question_id` int(10) NOT NULL DEFAULT '0',
  `question_name` varchar(100) DEFAULT NULL,
  `answer1` varchar(100) DEFAULT NULL,
  `answer2` varchar(100) DEFAULT NULL,
  `answer3` varchar(100) DEFAULT NULL,
  `answer4` varchar(100) DEFAULT NULL,
  `correct_answer` int(10) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `user_mob` varchar(12) DEFAULT NULL,
  `user_date_of_birth` date DEFAULT NULL,
  `user_gender` varchar(10) DEFAULT NULL,
  `user_password` varchar(30) DEFAULT NULL,
  `user_type` int(10) DEFAULT NULL,
  `user_details` varchar(500) DEFAULT NULL,
  `user_joined_on` date DEFAULT NULL,
  `user_city` varchar(50) NOT NULL,
  `loggedin` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
