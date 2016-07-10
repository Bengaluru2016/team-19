-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2016 at 05:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_name` text NOT NULL,
  `answer1` varchar(50) NOT NULL,
  `answer2` varchar(50) NOT NULL,
  `answer3` varchar(50) NOT NULL,
  `answer4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `courseid` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_name`, `answer1`, `answer2`, `answer3`, `answer4`, `answer`, `courseid`) VALUES
(1, 'What does PHP stand for?', 'Personal Home Page', 'Personal Hypertext Processor', 'Private Home Page', 'PHP: Hypertext Preprocessor', '4', 1),
(2, 'How do you write "Hello World" in PHP', 'Document.Write("Hello World");', 'echo "Hello World";', '"Hello World";', '"Hello World";', '2', 1),
(3, 'The PHP syntax is most similar to:', 'VBScript', 'JavaScript', 'Perl and C', 'Perl and C', '3', 2),
(4, 'How do you get information from a form that is submitted using the "get" method?', 'Request.Form;', '$_GET[];', 'Request.QueryString;', 'Request.QueryString;', '2', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
