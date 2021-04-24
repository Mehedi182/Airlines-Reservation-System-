-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 12:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airlines`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'mehedi', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booked_flights`
--

CREATE TABLE `booked_flights` (
  `sl` int(11) NOT NULL,
  `flightID` varchar(50) NOT NULL,
  `seats` int(11) NOT NULL,
  `return_status` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `booking time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_flights`
--

INSERT INTO `booked_flights` (`sl`, `flightID`, `seats`, `return_status`, `contact`, `email`, `booking time`) VALUES
(78, '112', 12, 'No', 1213456, 'mehedihasan152201@gmail.com', '2020-09-26 10:27:05'),
(79, '112', 1, 'Yes', 1, 'mehedihasan152201@gmail.com', '2020-09-26 12:20:32'),
(80, '112', 1, 'Yes', 1859420846, 'mehedihasan152201@gmail.com', '2020-09-27 11:37:58'),
(81, '112', 1, 'No', 2, 'mehedihasan152201@gmail.com', '2020-09-27 13:50:21'),
(82, '145', 1, 'No', 1, 'mehedihasan152201@gmail.com', '2020-09-28 06:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flightID` int(11) NOT NULL,
  `depart_place` varchar(50) NOT NULL,
  `arival_place` varchar(50) NOT NULL,
  `fdate` date NOT NULL,
  `f_time` time NOT NULL,
  `arival_time` time NOT NULL,
  `rf_date` date NOT NULL,
  `rf_time` time NOT NULL,
  `rf-arival` time NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flightID`, `depart_place`, `arival_place`, `fdate`, `f_time`, `arival_time`, `rf_date`, `rf_time`, `rf-arival`, `amount`) VALUES
(145, 'Dhaka', 'Chittagong', '2020-09-29', '09:00:00', '10:00:00', '2020-09-29', '11:00:00', '13:00:00', 3000),
(146, 'Dhaka', 'Chittagong', '2020-09-29', '15:00:00', '16:00:00', '2020-09-29', '18:00:00', '19:15:00', 3000),
(148, 'Chittagong', 'Dhaka', '2020-09-29', '11:01:00', '12:02:00', '2020-09-29', '15:00:00', '16:00:00', 3000),
(150, 'Chittagong', 'Dhaka', '2020-09-29', '18:00:00', '19:00:00', '2020-09-29', '22:00:00', '23:00:00', 3000),
(151, 'Dhaka', 'Dellhi', '2020-09-29', '22:00:00', '12:00:00', '2020-09-30', '03:00:00', '05:00:00', 10000),
(152, 'Dhaka', 'New york', '2020-09-30', '22:00:00', '20:00:00', '2020-10-01', '04:00:00', '14:00:00', 60000),
(153, 'New york', 'Dhaka', '2020-10-01', '04:00:00', '14:00:00', '2020-10-01', '22:00:00', '20:01:00', 60000),
(154, 'Dellhi', 'Dhaka', '2020-09-30', '03:00:00', '05:01:00', '2020-09-30', '08:01:00', '10:02:00', 10000),
(155, 'Dhaka', 'Toronto', '2020-09-30', '09:00:00', '19:00:00', '2020-10-01', '16:00:00', '02:00:00', 50000),
(156, 'Toronto', 'Dhaka', '2020-10-01', '16:00:00', '14:05:00', '2020-10-02', '10:00:00', '20:00:00', 50000),
(157, 'Chittagong', 'Dellhi', '2020-09-29', '22:00:00', '12:00:00', '2020-09-30', '03:00:00', '05:00:00', 10000),
(158, 'Chittagong', 'New york', '2020-09-30', '22:00:00', '20:00:00', '2020-10-01', '04:00:00', '14:00:00', 60000),
(159, 'New york', 'Chittagong', '2020-10-01', '04:00:00', '14:00:00', '2020-10-01', '22:00:00', '20:01:00', 60000),
(160, 'Dellhi', 'Chittagong', '2020-09-30', '03:00:00', '05:01:00', '2020-09-30', '08:01:00', '10:02:00', 10000),
(161, 'Chittagong', 'Toronto', '2020-09-30', '09:00:00', '19:00:00', '2020-10-01', '16:00:00', '02:00:00', 50000),
(162, 'Toronto', 'Chittagong', '2020-10-01', '16:00:00', '14:05:00', '2020-10-02', '10:00:00', '20:00:00', 50000),
(163, 'Dellhi', 'New york', '2020-09-30', '22:00:00', '20:00:00', '2020-10-01', '04:00:00', '14:00:00', 60000),
(164, 'New york', 'Dellhi', '2020-10-01', '04:00:00', '14:00:00', '2020-10-01', '22:00:00', '20:01:00', 60000),
(165, 'New york', 'Toronto', '2020-10-01', '04:00:00', '14:00:00', '2020-10-01', '22:00:00', '20:01:00', 60000),
(166, 'Dellhi', 'Toronto', '2020-09-30', '09:00:00', '19:00:00', '2020-10-01', '16:00:00', '02:00:00', 50000),
(167, 'Toronto', 'Dellhi', '2020-10-01', '16:00:00', '14:05:00', '2020-10-02', '10:00:00', '20:00:00', 50000),
(168, 'Toronto', 'New york', '2020-10-01', '16:00:00', '14:05:00', '2020-10-02', '10:00:00', '20:00:00', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `ac_name` varchar(50) DEFAULT NULL,
  `ac_no` int(11) DEFAULT NULL,
  `vcc` int(11) DEFAULT NULL,
  `validity` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `ticket_no` int(11) DEFAULT NULL,
  `payment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `ac_name`, `ac_no`, `vcc`, `validity`, `amount`, `ticket_no`, `payment_time`) VALUES
(29, 'Paypal', 2, 12, '2020-09-11', 36000, 78, '2020-09-26 10:27:05'),
(30, 'Paypal', 1, 1, '2020-09-10', 6000, 79, '2020-09-26 12:20:32'),
(31, 'Visacard', 12345689, 222, '2020-09-09', 6000, 80, '2020-09-27 11:37:57'),
(32, 'Paypal', 21, 21, '2020-10-09', 3000, 81, '2020-09-27 13:50:21'),
(33, 'Visacard', 2, 231, '2020-10-06', 3000, 82, '2020-09-28 06:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `p_number` int(20) NOT NULL,
  `Reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `fname`, `lname`, `email`, `password`, `gender`, `p_number`, `Reg_date`) VALUES
(56, 'Mehedi ', 'Hasan', 'mehedihasan152201@gmail.com', 'mehedi305', 'male', 1846417288, '2020-09-19 06:09:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `booked_flights`
--
ALTER TABLE `booked_flights`
  ADD PRIMARY KEY (`sl`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flightID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked_flights`
--
ALTER TABLE `booked_flights`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flightID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_flights`
--
ALTER TABLE `booked_flights`
  ADD CONSTRAINT `booked_flights_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
