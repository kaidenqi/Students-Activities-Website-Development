-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2020 at 09:01 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Student_Activity_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrationform`
--

CREATE TABLE `registrationform` (
  `id` int(100) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Zipcode` int(10) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Phonenumber` int(15) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `confirm_Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrationform`
--

INSERT INTO `registrationform` (`id`, `Firstname`, `Lastname`, `Address`, `City`, `State`, `Zipcode`, `EmailID`, `Department`, `Phonenumber`, `Username`, `Password`, `confirm_Password`) VALUES
(1, 'Satish', 'Padaganur', '12370 Alameda Trace Circle', 'Austin', 'Texas', 78727, 'satish.pdonur@gmail.com', 'Computer Science', 1234567890, 'satish_p', 'aOQ6qAXG', 'Password1'),
(2, 'Mark', 'Zuk', '123 Facebook Road', 'SFO', 'California', 12345, 'john@xyz.com', 'Computer Science', 1212121212, 'john_z', 'Pass1234', 'Pass1234'),
(3, 'Bill', 'Gates', '12345 MS road', 'Seattle', 'Washington', 12312, 'bill@xyz.com', 'Computer Science', 1231231234, 'bill_g', 'Pass1234', 'Pass1234'),
(4, 'Barak', 'Obama', '11111 Whitehouse Road', 'WashingtonDC', 'WashingtonDC', 11111, 'barak_obama@xyz.com', 'Computer Science', 1111111111, 'barak_o', 'Barak123', 'Barak123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrationform`
--
ALTER TABLE `registrationform`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EmailAddress` (`EmailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrationform`
--
ALTER TABLE `registrationform`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
