-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 09:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('aditya', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `industryrequirement` varchar(255) NOT NULL,
  `connectprofessional` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `buyername` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `title`, `requirement`, `industryrequirement`, `connectprofessional`, `location`, `date`, `buyername`, `status`) VALUES
(1, 'oracle developer', 'if u knows about sql , mysql then welcome.', 'web development', 'knows mysql , sql ', 'pune', '16-01-2022', 'shriram', 1),
(2, 'node js developer', 'interested in node js .', 'web development', 'knows node js', 'banglore', '16-01-2022', 'shriram', 1),
(3, 'android developer', 'interested in android then join with us.', 'android developer', 'knows about android studio , kotlin , java', 'pune', '17-01-2022', 'aditya', 1),
(4, 'PHP developer.', 'welcome to our industry in this we hire student for php developer internship in that we provide paid internship .', 'web development(backend development)', 'students knows about php , html , css', 'pune', '17-01-2022', 'anand', 1),
(5, 'backend developer inphp', 'we are introducing our internship program for php developer if you arre interested then join us.', 'web development', 'if you knows about php , html , css , javascript then you can  join with us.', 'pune', '17-01-2022', 'organizein', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `phoneno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `cpassword`, `phoneno`) VALUES
(1, 'gdsc', 'gdsc@gmail.com', '$2y$10$fSm5Eq3w9x8ATlFiJkwksOacyYslsxB0tpf8PcRIax2uomkSfF0t2', 'a', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `studentsignup`
--

CREATE TABLE `studentsignup` (
  `id` int(10) NOT NULL,
  `username` varchar(22) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentsignup`
--

INSERT INTO `studentsignup` (`id`, `username`, `password`, `cpassword`) VALUES
(1, 'gdsc', '$2y$10$NoDqj2FJzscIjAgS0.uaYu.s/9iQDK5bTxQemeWf4l0yjpV9Ctl/2', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentsignup`
--
ALTER TABLE `studentsignup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentsignup`
--
ALTER TABLE `studentsignup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
