-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 08:52 PM
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
(14, 'ffffff', 'wwwww', 'Extracurricular', '0000-00-00', '00:00:09', '00:00:23', 222, 'LB 212', 'Siomai Master'),
(20, 'Suntukan sa LB', 'Makikipag suntukan dito', 'Curricular', '2023-08-30', '15:20:00', '18:20:00', 500, 'LB 214', 'Alvindale'),
(22, 'AddEvent', '345', 'Curricular', '2032-02-02', '04:27:00', '13:27:00', 3453, 'LB 211', 'Alvindale');

-- --------------------------------------------------------

--
-- Table structure for table `add_student`
--

CREATE TABLE `add_student` (
  `id` int(11) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `email` varchar(50) NOT NULL,
  `studNumber` text NOT NULL,
  `program` text NOT NULL,
  `currentYear` varchar(10) NOT NULL,
  `studAge` int(2) NOT NULL,
  `contactNumber` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `add_student`
--

INSERT INTO `add_student` (`id`, `lastName`, `firstName`, `middleName`, `gender`, `email`, `studNumber`, `program`, `currentYear`, `studAge`, `contactNumber`) VALUES
(1, 'Abelardo', 'Joaquin Kester', 'Lim', 'm', 'abelardo_joaquinkester@ue.edu.ph', '2147483647', 'Cpe', '3', 0, 2147483647),
(2, 'Soliven', 'Alvin Dale', 'Leonardo', 'm', 'soliven.alvindale@ue.edu.ph', '2147483647', 'Cpe', '3', 0, 69696969),
(3, 'Perez', 'Neil', 'Dikoalam', 'o', 'perez.neil@ue.edu.ph', '9999999', 'Cpe', '6', 0, 69696969),
(17, 'Soliven', 'Alvin ', '', 'm', 'soliven.alvindale@ue.edu.ph', '5785', 'Cpe', '2', 20, 5655);

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` int(11) NOT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `studNumber` text DEFAULT NULL,
  `timeIn` time DEFAULT NULL,
  `chooseEvent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`id`, `lastName`, `firstName`, `middleName`, `studNumber`, `timeIn`, `chooseEvent`) VALUES
(53, 'Abelardo', 'Joaquin Kester', 'Lim', '2147483647', '20:50:56', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_event`
--
ALTER TABLE `add_event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `add_student`
--
ALTER TABLE `add_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_event`
--
ALTER TABLE `add_event`
  MODIFY `eventId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `add_student`
--
ALTER TABLE `add_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
