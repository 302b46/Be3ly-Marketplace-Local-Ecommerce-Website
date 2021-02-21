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
-- Table structure for table `_messages`
--

CREATE TABLE `_messages` (
  `messageID` int(11) NOT NULL,
  `sentBy` int(11) DEFAULT NULL,
  `receivedBy` int(11) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_messages`
--

INSERT INTO `_messages` (`messageID`, `sentBy`, `receivedBy`, `message`, `image`) VALUES
(4, 3, 4, 'hi ahmed', ''),
(5, 4, 3, 'hi salah', ''),
(6, 4, 1, 'hi', ''),
(7, 4, 3, 'how are you', ''),
(8, 4, 5, 'i need a laptop please, how much is it?', ''),
(10, 5, 4, '9000 EGP', ''),
(11, 5, 6, 'welcome to our market place, let me know if you need any help', ''),
(12, 6, 5, 'thanks', ''),
(15, 8, 3, 'this is your first warning', ''),
(16, 3, 8, 'sorry', ''),
(17, 3, 7, 'hi i need help', ''),
(20, 6, 1, 'hi this is a trial for image upload', NULL),
(21, 6, 1, NULL, 'IMG_20190328_180905.jpg'),
(24, 6, 1, NULL, 'IMG_20190328_180626.jpg'),
(25, 6, 1, 'i want those products please', NULL),
(26, 1, 6, 'we will try offering them very soon', NULL),
(27, 1, 6, 'stay tuned', NULL),
(28, 1, 4, 'hello how can i help you', NULL),
(30, 4, 5, 'i want the following product please', NULL),
(32, 5, 4, 'we will try offering them very soon', NULL),
(33, 4, 3, NULL, 'Screenshot_2019-04-22-21-20-06-21.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_messages`
--
ALTER TABLE `_messages`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `sentBy` (`sentBy`),
  ADD KEY `receivedBy` (`receivedBy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_messages`
--
ALTER TABLE `_messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `_messages`
--
ALTER TABLE `_messages`
  ADD CONSTRAINT `_messages_ibfk_1` FOREIGN KEY (`sentBy`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `_messages_ibfk_2` FOREIGN KEY (`receivedBy`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
