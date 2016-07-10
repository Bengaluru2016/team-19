-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2016 at 05:20 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vill`
--

-- --------------------------------------------------------

--
-- Table structure for table `questionstable`
--

CREATE TABLE `questionstable` (
  `question_id` int(11) NOT NULL,
  `question_text` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asked_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionstable`
--

INSERT INTO `questionstable` (`question_id`, `question_text`, `user_id`, `asked_on`) VALUES
(1, 'what is Artificial Intelligence', 1, '2016-07-09'),
(2, 'What is Drip irrigation', 1, '2016-07-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questionstable`
--
ALTER TABLE `questionstable`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questionstable`
--
ALTER TABLE `questionstable`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
