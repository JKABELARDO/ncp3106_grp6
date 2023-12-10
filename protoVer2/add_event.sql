-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 07:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `add_event`
--

CREATE TABLE `add_event` (
  `eventId` int(15) NOT NULL,
  `eventName` varchar(30) NOT NULL,
  `eventDescription` text NOT NULL,
  `eventType` text NOT NULL,
  `eventDate` date NOT NULL,
  `eventStart` time NOT NULL,
  `eventEnd` time NOT NULL,
  `registrationFee` int(10) NOT NULL,
  `venue` text NOT NULL,
  `officerIncharge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `add_event`
--

INSERT INTO `add_event` (`eventId`, `eventName`, `eventDescription`, `eventType`, `eventDate`, `eventStart`, `eventEnd`, `registrationFee`, `venue`, `officerIncharge`) VALUES
(6, 'hatdog', 'learn hatdog', 'Outreach', '0000-00-00', '00:00:08', '00:00:22', 42, 'LB 214', 'Siomai Master'),
(7, 'suntukan', 'makipag suntukan', 'Seminar', '0000-00-00', '00:00:09', '00:00:23', 500, 'LB 212', 'Kuya Rolly'),
(14, 'ffffff', 'wwwww', 'Extracurricular', '0000-00-00', '00:00:09', '00:00:23', 222, 'LB 212', 'Siomai Master');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_event`
--
ALTER TABLE `add_event`
  ADD PRIMARY KEY (`eventId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_event`
--
ALTER TABLE `add_event`
  MODIFY `eventId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
