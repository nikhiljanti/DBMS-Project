-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 03:38 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `usn` varchar(10) NOT NULL,
  `subc` varchar(10) NOT NULL,
  `tc` int(2) NOT NULL,
  `ca` int(2) NOT NULL,
  `ta` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`usn`, `subc`, `tc`, `ca`, `ta`) VALUES
('2hn17cs010', '17cs53', 100, 80, 80);

-- --------------------------------------------------------

--
-- Table structure for table `ia`
--

CREATE TABLE `ia` (
  `usn` varchar(10) NOT NULL,
  `subc` varchar(7) NOT NULL,
  `ia1` int(2) DEFAULT NULL,
  `ia2` int(2) DEFAULT NULL,
  `ia3` int(2) DEFAULT NULL,
  `ia` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ia`
--

INSERT INTO `ia` (`usn`, `subc`, `ia1`, `ia2`, `ia3`, `ia`) VALUES
('2hn17cs010', '17cs53', 20, 8, 11, 13);

-- --------------------------------------------------------

--
-- Table structure for table `nonteaching`
--

CREATE TABLE `nonteaching` (
  `name` varchar(200) NOT NULL,
  `wa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(100) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `rollno` int(2) NOT NULL,
  `sem` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `usn`, `rollno`, `sem`) VALUES
('chandrashekhar', '2hn17cs010', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `teaching`
--

CREATE TABLE `teaching` (
  `name` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `quali` varchar(20) NOT NULL,
  `desig` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(20) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `rollno` int(100) NOT NULL,
  `total_fees` int(255) NOT NULL,
  `fees_paid` int(255) NOT NULL,
  `pending_fees` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `usn`, `rollno`, `total_fees`, `fees_paid`, `pending_fees`) VALUES
('chandrashekhar', '2hn17cs010', 10, 105000, 75000, 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD KEY `usn` (`usn`);

--
-- Indexes for table `ia`
--
ALTER TABLE `ia`
  ADD KEY `usn` (`usn`);

--
-- Indexes for table `nonteaching`
--
ALTER TABLE `nonteaching`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD KEY `usn` (`usn`);

--
-- Indexes for table `teaching`
--
ALTER TABLE `teaching`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic`
--
ALTER TABLE `academic`
  ADD CONSTRAINT `academic_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `users` (`usn`) ON DELETE CASCADE;

--
-- Constraints for table `ia`
--
ALTER TABLE `ia`
  ADD CONSTRAINT `ia_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `users` (`usn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
