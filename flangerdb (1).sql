-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 07:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flangerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_No` int(11) NOT NULL,
  `tittle` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `artist_id` varchar(50) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  `content_type` varchar(50) NOT NULL,
  `content` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_No`, `tittle`, `price`, `artist_id`, `thumbnail`, `description`, `content_type`, `content`) VALUES
(33, 'new song', 350, 'danujawijerathne@gmail.com', '1190260-large-green-leaf-wallpaper-hd-1920x1080-ios.jpg', 'l', 'song', 'wp4599794.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `creator_user`
--

CREATE TABLE `creator_user` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pack_no` int(11) NOT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creator_user`
--

INSERT INTO `creator_user` (`fname`, `lname`, `email`, `password`, `pack_no`, `is_deleted`) VALUES
('danuja', 'wijerathne', 'danujawijerathne@gmail.com', 'ef0faee3bd9c367da7b2fab69ff85639', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fan_user`
--

CREATE TABLE `fan_user` (
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `is_deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fan_user`
--

INSERT INTO `fan_user` (`fname`, `lname`, `email`, `password`, `is_deleted`) VALUES
('danuja', 'wijerathne', 'danujawijerathne@gmail.com', 'ef0faee3bd9c367da7b2fab69ff85639', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pack_no` int(11) NOT NULL,
  `pack_name` varchar(50) NOT NULL,
  `pack_price` float NOT NULL,
  `duration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `email` varchar(100) NOT NULL,
  `invoice_No` int(11) NOT NULL,
  `Purchase_date` date NOT NULL,
  `card_Holder` varchar(50) NOT NULL,
  `card_number` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`email`, `invoice_No`, `Purchase_date`, `card_Holder`, `card_number`) VALUES
('danujawijerathne@gmail.com', 2, '0000-00-00', 'danuja', 2147483647),
('danujawijerathne@gmail.com', 3, '0000-00-00', 'danuja', 2147483647),
('ambuja@gmail.com', 4, '0000-00-00', 'danuja', 2147483647),
('kavi@gmail.com', 5, '0000-00-00', 'danuja', 2147483647),
('987@gmail.com', 6, '0000-00-00', 'danuja', 141),
('danujawijerathne@gmail.com', 7, '0000-00-00', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_No`),
  ADD KEY `FK1` (`artist_id`);

--
-- Indexes for table `creator_user`
--
ALTER TABLE `creator_user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `fan_user`
--
ALTER TABLE `fan_user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pack_no`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`invoice_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `invoice_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`artist_id`) REFERENCES `creator_user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
