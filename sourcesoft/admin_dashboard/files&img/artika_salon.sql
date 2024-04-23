-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 09:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artika_salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_username`, `admin_password`) VALUES
('Artika_salon', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appoint_table`
--

CREATE TABLE `appoint_table` (
  `id` int(20) NOT NULL,
  `Name1` varchar(30) NOT NULL,
  `Email1` varchar(30) NOT NULL,
  `Phone1` varchar(30) NOT NULL,
  `Category1` varchar(30) NOT NULL,
  `Date1` date NOT NULL,
  `Message1` varchar(150) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoint_table`
--

INSERT INTO `appoint_table` (`id`, `Name1`, `Email1`, `Phone1`, `Category1`, `Date1`, `Message1`, `status`) VALUES
(1, 'n', 'n@gmail.com', '23423', 'dbhfchjsd', '2023-12-12', 'askdfjcsb ahjsdf', 1),
(2, 'n', 'n@gmail.com', '23423', 'dbhfchjsd', '2023-12-12', 'askdfjcsb ahjsdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `id` int(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Message` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`id`, `Name`, `Email`, `Phone`, `Message`) VALUES
(1, 'nit', 'n@gmail.com', '234324', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `course` varchar(150) NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `course`, `image`, `price`) VALUES
(1, 'nit', 'dsvds', 'a2.jpeg', 0),
(3, 'na', 'sdf sdf sdfv', 'a4.jpeg', 234);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(20) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(2, 'a2.jpeg'),
(3, 'a4.jpeg'),
(4, 'a4.jpeg'),
(11, 'a3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `livechat_table`
--

CREATE TABLE `livechat_table` (
  `id` int(20) NOT NULL,
  `Message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livechat_table`
--

INSERT INTO `livechat_table` (`id`, `Message`) VALUES
(1, 'dogs df'),
(2, 'dogs df');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `descript` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `descript`, `image`, `price`) VALUES
(1, 'Hair cut', 'hair cut1', 'image/5.jpg', 199),
(2, 'hair cut', 'hair cut2', 'image/1.jpg', 299);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
