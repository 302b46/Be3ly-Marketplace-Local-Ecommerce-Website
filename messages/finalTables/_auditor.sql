-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 11:13 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `_auditor`
--

CREATE TABLE `_auditor` (
  `adminID` int(11) NOT NULL,
  `commentID` int(11) NOT NULL,
  `auditorComment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_auditor`
--

INSERT INTO `_auditor` (`adminID`, `commentID`, `auditorComment`) VALUES
(1, 1, 'seen approved'),
(3, 2, 'not responding'),
(1, 3, 'very good'),
(1, 5, 'approved'),
(1, 6, 'late response');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_auditor`
--
ALTER TABLE `_auditor`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `adminID` (`adminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_auditor`
--
ALTER TABLE `_auditor`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `_auditor`
--
ALTER TABLE `_auditor`
  ADD CONSTRAINT `_auditor_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
