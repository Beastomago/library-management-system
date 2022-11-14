-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 11:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `contact`, `pic`, `status`) VALUES
(1, 'Mr.', 'Abdul', 'Hamid', '123456', 'mr.hamid@gmail.com', '12345678', 'p.jpg', 'yes'),
(2, 'Nobonita', 'Das', 'Nobonita', '111111', 'nobonita@gmail.com', '012345678', '4881.jpg', 'yes'),
(3, 'Mr.', 'X', 'X', '222222', 'samiarahman@gmail.com', '133446557', '5.png', 'yes'),
(4, 'try', 'try', 'try1', 'try', 'try@gmail.com', '1234567899', 'p.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `bcount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`, `bcount`) VALUES
(10, 'nepali', 'ram', '4th', 'Available', 11, 'ecc', 0),
(11, 'OUTSIDE the WIRE', 'THEGREAT', '1st', 'Available', 5, 'Action', 1),
(12, 'noob', 'notme', '3th', 'Available', 5, 'bca', 2),
(13, 'remove-me', 'notme', '1st', 'Available', 4, 'bca', 1),
(14, 'remove-me', 'notme', '2nd', 'Available', 5, 'bca', 0),
(15, 'remove-me', 'notme', '3rd', 'Available', 1, 'bca', 4),
(19, 'hh', 'heyyy', '4', 'Available', 10, 'bca', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`) VALUES
(5, 'Promi', 'hello!'),
(16, 'Afifa', 'There is no books of ETE department.When will it be available?'),
(17, 'Admin', 'Hi! which book do you need Afifa. Please let us know.'),
(18, '', 'hello! '),
(19, 'Promi', 'Hi! which book do you need Afifa. Please let us know.'),
(20, 'Admin', 'heyyy');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `returned` varchar(100) NOT NULL,
  `day` int(50) NOT NULL,
  `fine` double NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`username`, `bid`, `returned`, `day`, `fine`, `status`) VALUES
('Promi', 1, '2019-05-21', 31, 3.1, 'not paid'),
('Afifa', 1, '2019-05-21', 1, 0.1, 'not paid'),
('b', 12, '2022-11-06', 0, 0, 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `username`, `bid`, `approve`, `issue`, `return`) VALUES
(1, 'Promi', 3, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2019-04-22', '2019-05-16'),
(2, 'Promi', 1, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2019-03-20', '2019-04-20'),
(3, 'Promi', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2019-01-30', '2019-02-28'),
(4, 'Afifa', 1, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2019-04-20', '2019-05-20'),
(5, 'Afifa', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2019-02-20', '2019-02-10'),
(6, 'Afifa', 1, '', '', ''),
(24, 'b', 10, 'Done', '05-11-2022', '05-05-2023'),
(28, 'a', 11, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '05-11-2022', '05-01-2024'),
(36, 'a', 10, 'Done', '06-11-2022', '06-05-2023'),
(40, 'a', 14, 'Done', '08-11-2022', '08-05-2023'),
(47, 'a', 13, 'Done', '09-11-2022', '12-11-2022'),
(49, 'a', 19, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_data`
--

CREATE TABLE `pdf_data` (
  `id` int(50) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `authors` varchar(50) CHARACTER SET latin1 NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pdf_file` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf_data`
--

INSERT INTO `pdf_data` (`id`, `name`, `authors`, `image`, `pdf_file`) VALUES
(1, 'check 1', 'checkkkk', '9.png', 'AdvanceJava.pdf'),
(2, 'check2', 'notme', 'download.png', 'AdvanceJava.pdf'),
(3, 'check2', 'notme', 'download.png', 'AdvanceJava.pdf'),
(4, 'fake', 'notme', '9.png', 'Triloon.pdf'),
(5, 'fake', 'notme', 'TeamLogo2.png', 'Triloon.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first`, `last`, `username`, `password`, `roll`, `email`, `contact`, `pic`) VALUES
('a', 'a', 'a', 'a', 11, 'a@gmail.com', '1234567899', 'p.jpg'),
('Afifa ', 'Ashraf', 'Afifa', '121212', 1510047, 'afifa@gmail.com', '1739000001', 'p.jpg'),
('b', 'b', 'b', 'b', 12, 'bbb@gmail.com', '123456789', 'p.jpg'),
('c', 'c', 'c', 'c', 112, 'c@gmail.com', '12345678', 'p.jpg'),
('check', 'k', 'check', '1', 1111, 'ab@gmail.com', '12345', 'p.jpg'),
('sanzida', 'mou', 'Mim', '555555', 324, 'mim@gmail.com', '53454', 'p.jpg'),
('Afia', 'Abida', 'Promi', '111111', 1, 'afia1@gmail.com', '000000000', '7996_3d_modeling_5.jpg'),
('Mr.', 'Rahman', 'Rahman', '212324', 1510016, 'samiarahman@gmail.com', '123456', 'p.jpg'),
('Sumaiya', 'Shimu', 'Shimu1', '987654', 1510052, 'shimu1@gmail.com', '1739000000', 'p.jpg'),
('Suchana', 'Pramanik', 'Suchana', '121212', 1510047, 'suchana@gmail.com', '1739000000', 'p.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf_data`
--
ALTER TABLE `pdf_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pdf_data`
--
ALTER TABLE `pdf_data`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
