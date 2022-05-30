-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 05:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.1.32

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
  `name` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `userName`, `password`, `email`, `contact`, `pic`, `status`) VALUES
(3, 'George Williams', 'george999', 'george999', 'george@gmail.com', '8938473625', 'BeautyPlus_20211012153910144_save.jpg', 'Yes'),
(16, 'adminhehe', 'admin123', 'admin999', 'admin@gmail.com', '9827384738', 'p.jpg', 'Yes'),
(17, 'newAdmin 2', 'newadmin123', 'new999', 'n@gmail.com', '9837462736', 'p.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `name`, `authors`, `edition`, `status`, `quantity`, `dept`) VALUES
(32, 'easgv', 'rh', 'er', 'esg', 4, 'rheh');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(50) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userName`, `comment`) VALUES
(1, 'admin123', 'etg'),
(2, 'admin123', ''),
(3, 'admin123', ''),
(4, 'admin123', ''),
(5, 'admin123', ''),
(6, 'admin123', ''),
(7, 'admin123', ''),
(8, 'admin123', ''),
(9, 'admin123', ''),
(10, 'admin123', '');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `userName` varchar(100) NOT NULL,
  `b_id` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `returnDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_name` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pic_student` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_name`, `userName`, `class`, `year`, `roll`, `email`, `phone`, `password`, `pic_student`) VALUES
('Rahul Sharma', 'rahul123', 'BBA', 'Second', 45, 'rahul@gmail.com', '9837462736', 'rahoooool99', 'p.jpg'),
('rrr new', 'rrr123', 'BBA', 'Third', 44, 'rrr@gmail.com', '9837487362', 'rrr999', 'p.jpg'),
('newStudent', 'newStudent123', 'Ecom', 'First', 93, 'new@gmail.com', '039283289', 'newStudent999', 'p.jpg'),
('geww', 'gwrgw', 'eg', 'eggwe', 32, 'www@gmail.com', '32235', 'ewgwrg', 'p.jpg'),
('grge', 'rhehe', 'heh', 'erheh', 32, 'ergeer@gmail.com', '234235235234', 'erer', 'p.jpg'),
('qw', 'afa', 'afaf', 'af', 2, 'afa@gmail.com', '214132', 'eafhe', 'p.jpg'),
('ef', 'egegeewe', 'ege', 'ewgw', 4, 'efoi@gmail.com', 'wegweg', 'wegweg', 'p.jpg'),
('uu', 'yt', 'ey', 'ey', 45, 'aks@gmail.com', '21', '124314', 'p.jpg'),
('ewweg', 'ewg', 'wegweg', 'wegwg', 34, 'ewf@gmail.com', '342', 'weweg', 'p.jpg'),
('wefw', 'wefwe', 'wewef', '2qa', 2, 'w@gmail.com', '3241', 'efe', 'p.jpg'),
('ed', 'ed', 'de', 'de', 2, 'de@wd', 'ef', 'ef', 'p.jpg'),
('efwe', 'few', 'wef', 'efw', 2, 'ef@w', 'qwe', 'qwe', 'p.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
