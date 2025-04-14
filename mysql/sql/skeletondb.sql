-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 09:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30
create DATABASE IF NOT EXISTS skeletondb ;
USE skeletondb;

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skeletondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes`
(
  `NoteID` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`NoteID`,`Title`, `Username`, `location`, `date`) VALUES
(1, 'demo', 'bawbawbaw', 'notes/demo.txt', '2025-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
  `Username` varchar
(30) NOT NULL,
  `Password` varchar
(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`,`Password`) VALUES
('bawbawbaw', 'passWord123&'),
('sundowner', 'Testword656#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
ADD PRIMARY KEY
(`NoteID`),
ADD KEY `Username`
(`Username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY
(`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `NoteID` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY
(`Username`) REFERENCES `users`
(`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
