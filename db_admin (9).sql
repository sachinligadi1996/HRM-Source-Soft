-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 11:10 AM
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
-- Database: `db_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assign_task`
--

CREATE TABLE `assign_task` (
  `id` int(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `emp_project` varchar(255) NOT NULL,
  `emp_team` varchar(255) NOT NULL,
  `taskmodule` varchar(255) NOT NULL,
  `task` varchar(1500) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `upload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_task`
--

INSERT INTO `assign_task` (`id`, `emp_id`, `fname`, `emp_project`, `emp_team`, `taskmodule`, `task`, `start_date`, `due_date`, `status`, `priority`, `upload`) VALUES
(105, 'ETIS127', 'pallavi', 'WATER BOARD', 'TEAM Gangeya', 'jhgfd', 'lkjhg', '2023-11-13', '2023-11-28', 'Viewed', 'Low', '../files&img/messages-1.jpg'),
(106, 'ETIS300', 'abc', 'WATER BOARD', 'TEAM Gangeya', 'fghkjl', 'desrti', '2023-11-20', '2023-11-22', 'To-Do', 'Low', 'file/sakshi_S.pdf'),
(107, 'ETIS500', 'XYZ', 'PROJECT-Gangeya', 'TEAM Gangeya', 'uyituredfgyuiop', 'dertyuiop', '2023-11-20', '2023-11-22', 'To-Do', 'Low', 'file/19Adhar1699526364.pdf'),
(109, 'ETIS126', 'Rutuja Bokare', 'WATER BOARD', 'TEAM Gangeya', 'gggg', 'kyaji', '2023-11-24', '2023-11-25', 'To-Do', 'Low', 'file/sakshi_S.pdf'),
(113, 'ETIS124', 'Jyoti', 'WATER BOARD', 'TEAM Gangeya', 'j,vjjh', 'kkkk', '2023-11-28', '2023-12-05', 'In Progress', 'Medium', '../files&img/mechsword logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `checkin` varchar(250) DEFAULT NULL,
  `checkout` varchar(250) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp_id`, `emp_name`, `date`, `checkin`, `checkout`, `total`, `status`) VALUES
(108, 'ETIS130', 'Prashant Chavan', '2023-10-07', NULL, NULL, NULL, 1),
(109, 'ETIS129', 'Vishal Barage', '2023-10-07', NULL, NULL, NULL, 2),
(110, 'ETIS128', 'Aakash Dhobale', '2023-10-07', NULL, NULL, NULL, 1),
(111, 'ETIS127', 'Pallavi Shinde', '2023-10-07', NULL, NULL, NULL, 1),
(112, 'ETIS126', 'Rutuja Bokare', '2023-10-07', NULL, NULL, NULL, 1),
(113, 'ETIS125', 'Sakshi Sanap', '2023-10-07', NULL, NULL, NULL, 2),
(114, 'ETIS124', 'Jyoti', '2023-10-07', NULL, NULL, NULL, 1),
(115, 'ETIS123', 'Sachin', '2023-10-07', NULL, NULL, NULL, 1),
(116, 'ETIS128', 'Aakash Dhobale', '2023-10-08', NULL, NULL, NULL, 2),
(117, 'ETIS129', 'Vishal Barage', '2023-10-08', NULL, NULL, NULL, 2),
(118, 'ETIS130', 'Prashant Chavan', '2023-10-08', NULL, NULL, NULL, 1),
(119, 'ETIS127', 'Pallavi Shinde', '2023-10-08', NULL, NULL, NULL, 2),
(120, 'ETIS126', 'Rutuja Bokare', '2023-10-08', NULL, NULL, NULL, 1),
(121, 'ETIS125', 'Sakshi Sanap', '2023-10-08', NULL, NULL, NULL, 2),
(124, 'ETIS130', 'Prashant Chavan', '2023-10-10', '18:07', '06:06', NULL, 0),
(125, 'ETIS130', 'Prashant Chavan', '2023-10-11', NULL, NULL, NULL, 1),
(126, 'ETIS124', 'Jyoti', '2023-10-11', NULL, NULL, NULL, 1),
(127, 'ETIS124', 'Jyoti', '2023-10-12', NULL, NULL, NULL, 1),
(128, 'ETIS123', 'Sachin', '2023-10-12', '18:54', '20:54', NULL, 0),
(129, 'ETIS123', 'Sachin', '2023-10-15', '06:53', '07:54', NULL, 0),
(130, 'ETIS124', 'Jyoti', '2023-10-15', NULL, NULL, NULL, 1),
(131, 'ETIS001', 'SAGAR', '2023-10-25', NULL, NULL, NULL, 1),
(132, 'ETIS127', 'pallavi', '2023-10-25', NULL, NULL, NULL, 1),
(133, 'ETIS128', 'akash', '2023-10-25', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(20) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `employeeName` varchar(30) NOT NULL,
  `accountNumber` varchar(40) NOT NULL,
  `bankName` varchar(50) NOT NULL,
  `branchName` varchar(100) NOT NULL,
  `ifscCode` varchar(50) NOT NULL,
  `bankpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `empid`, `employeeName`, `accountNumber`, `bankName`, `branchName`, `ifscCode`, `bankpass`) VALUES
(17, 'ETIS125', 'Sakshi', '12344321', 'Sakshi Bank', 'nasik', 'skb124', 'file/ss ew resume-1 (3) (1).pdf'),
(19, 'ETIS123', 'sachin', '98765432', 'SBI', 'Davangere', 'SBIN00234', 'file/19Adhar1699526364.pdf'),
(24, 'ETIS124', 'jyoti', '32145566', 'SBI', 'JALANAGR', 'SBIN003', 'file/db_admin.sql'),
(25, 'ETIS126', 'RUTUJA', '876543211', 'SBI', 'HHHH', 'SBIN009', 'file/db_admin(2).sql'),
(26, 'ETIS127', 'pallavi', '987655', 'SBI', 'BIJAPUR', 'SBIN008', 'file/18'),
(27, 'ETIS128', 'akash', '8888888888', 'sbi', 'pune', 'SBIN008', 'file/24'),
(29, 'ETIS126', 'Rutuja Bokare', '1234', 'abv', 'fghjk', 'sghj', 'file/Jyothi_SQL-2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(24) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `timestamp` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `receiver`, `message`, `timestamp`) VALUES
(185, 'jyoti', 'ETIS123', 'hello', '01-11-2023 15:55'),
(186, 'jyoti', 'ETIS123', 'good', '01-11-2023 15:56'),
(187, 'jyoti', 'ETIS123', 'good', '01-11-2023 15:56'),
(188, 'jyoti', 'ETIS123', 'good', '01-11-2023 15:58'),
(189, 'jyoti', 'ETIS123', 'good', '01-11-2023 16:03'),
(192, 'ajay', 'ETIS124', 'dont knw', '01-11-2023 16:05'),
(193, 'ajay', 'ETIS124', 'dont knw', '01-11-2023 16:10'),
(194, 'jyoti', 'ETIS908', 'heyy', '01-11-2023 16:14'),
(195, 'ajay', 'ETIS124', 'its going good', '01-11-2023 16:17'),
(196, 'jyoti', 'ETIS908', 'ok', '01-11-2023 16:18'),
(197, 'jyoti', 'ETIS908', 'ok', '01-11-2023 16:25'),
(198, 'jyoti', 'ETIS123', 'yes tell me', '01-11-2023 16:26'),
(199, 'jyoti', 'ETIS123', 'yes tell me', '01-11-2023 16:28'),
(200, 'jyoti', 'ETIS127', 'helo', '01-11-2023 16:29'),
(234, 'jyoti', 'ETIS124', 'yes', '2023-11-02 10:55:14'),
(238, 'ajay', 'ETIS124', 'hello', '2023-11-02 08:18:28'),
(272, 'ajay', 'ETIS124', 'how are you?', '2023-11-02 15:47:13'),
(273, 'ajay', 'ETIS124', 'how are you?', '2023-11-02 16:59:54'),
(274, 'ajay', 'ETIS124', 'how are you?', '2023-11-02 17:02:58'),
(275, 'ajay', 'ETIS124', 'how are you?', '2023-11-02 17:06:23'),
(276, 'ajay', 'ETIS124', 'how are you?', '2023-11-02 17:19:41'),
(277, 'ajay', 'ETIS124', 'how are you?', '2023-11-02 18:36:27'),
(278, 'ajay', 'ETIS124', 'how are you?', '2023-11-02 21:12:25'),
(279, 'jyoti', 'ETIS125', 'hello', '2023-11-02 21:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(250) DEFAULT NULL,
  `receiver_id` varchar(250) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`) VALUES
(1, 'ETIS124', 'ETIS126', 'hii', '2023-11-22 19:58:50'),
(2, 'ETIS124', 'ETIS126', 'hlo', '2023-11-22 20:00:00'),
(3, 'ETIS124', 'ETIS126', 'hiiii', '2023-11-22 20:02:34'),
(4, 'ETIS124', 'ETIS126', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiii', '2023-11-22 20:07:01'),
(5, 'ETIS125', 'ETIS124', 'hey', '2023-11-22 20:12:47'),
(6, 'ETIS124', 'ETIS125', 'byyy', '2023-11-22 20:13:35'),
(7, 'ETIS125', 'ETIS124', 'hloooo', '2023-11-23 05:07:47'),
(8, 'ETIS124', 'ETIS125', 'how r u', '2023-11-23 05:08:34'),
(9, 'ETIS124', 'ETIS125', 'how r u', '2023-11-23 05:08:34'),
(10, 'ETIS128', 'ETIS123', 'hiiiii', '2023-11-23 06:53:45'),
(11, 'ETIS123', 'ETIS128', 'hlooooo', '2023-11-23 06:54:28'),
(12, 'ETIS123', 'ETIS126', 'hello', '2023-11-23 08:00:57'),
(13, 'ETIS126', 'ETIS123', 'hi', '2023-11-23 08:01:53'),
(14, 'ETIS124', 'ETIS000005', 'hello', '2023-11-27 05:16:57'),
(15, 'ETIS124', 'ETIS125', 'hey', '2023-11-27 05:17:21'),
(16, 'ETIS123', 'ETIS125', 'hello good morning', '2023-11-29 05:20:44'),
(17, 'ETIS125', 'ETIS123', 'gm', '2023-11-29 05:21:48'),
(18, 'ETIS125', 'ETIS127', 'yes', '2023-11-29 05:23:10'),
(19, 'ETIS127', 'ETIS125', 'hey', '2023-11-29 05:23:49'),
(20, 'ETIS123', 'ETIS000005', 'hi', '2023-12-13 09:53:12'),
(21, 'ETIS123', 'ETIS000005', 'hi', '2023-12-13 09:55:11'),
(22, 'ETIS124', 'ETIS125', 'hellooo', '2023-12-13 09:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `dpr`
--

CREATE TABLE `dpr` (
  `id` int(11) NOT NULL,
  `empid` varchar(100) NOT NULL,
  `workmode` varchar(100) NOT NULL,
  `pname` varchar(300) NOT NULL,
  `wout` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dpr`
--

INSERT INTO `dpr` (`id`, `empid`, `workmode`, `pname`, `wout`, `date`, `status`) VALUES
(24, 'ETIS126', 'work from home', 'testing', 'create form', '12-10-2023', 'Complete'),
(25, 'ETIS124', 'work from home', 'hrm software', 'create admin panel', '13-10-2023', 'Complete'),
(27, 'ETIS126', 'work from home', 'hrm', 'dashboard create', '14-10-2023', 'Complete'),
(28, 'ETIS127', 'work from home', 'pppp', 'jjjjj', '14-10-2023', 'Complete'),
(29, 'ETIS125', 'work from home', 'hrm', 'homepage', '17-10-2023', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `id` int(90) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` varchar(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `proname` varchar(200) NOT NULL,
  `sdate` varchar(40) NOT NULL,
  `edate` varchar(40) NOT NULL,
  `man` varchar(50) NOT NULL,
  `jdate` varchar(10) NOT NULL,
  `bdate` varchar(10) NOT NULL,
  `add` varchar(200) NOT NULL,
  `edu` varchar(40) NOT NULL,
  `about` text NOT NULL,
  `skills` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `last_act` datetime NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `adhar_card` varchar(300) NOT NULL,
  `pan_card` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `fname`, `empid`, `email`, `phno`, `username`, `pass`, `department`, `position`, `proname`, `sdate`, `edate`, `man`, `jdate`, `bdate`, `add`, `edu`, `about`, `skills`, `status`, `last_act`, `twitter`, `facebook`, `instagram`, `linkedin`, `profile_pic`, `adhar_card`, `pan_card`) VALUES
(17, 'Sachin', 'ETIS123', 'sachinkb308@gmail.com', '+9876543210', 'ETIS123', '%@252382$#', 'IT', 'SDE', '', '', '', '', '2023-11-09', '2023-11-16', 'PUNE', 'BE', 'A recent computer science graduate with two years of internship experience at well-known IT firms, focused on systems administration and technical support. Adept at working within cross-functional teams on technical projects.', 'HTML,CSS,JAVA', 'Offline', '2023-12-05 11:14:07', 'www.twitter.com', 'www.facebook.com', 'www.instagram.com', 'www.linkedin.com', '17', '', ''),
(18, 'Jyoti', 'ETIS124', 'Jyoti449h@gmail.com', '+9632587410', 'ETIS124', 'jyoti', 'ITi', 'SDE', '', '', '', '', '2023-10-01', '2023-10-01', 'PUNE', 'BE', 'A recent computer science graduate with two years of internship experience at well-known IT firms, focused on systems administration and technical support. Adept at working within cross-functional teams on technical projects.', 'HTML,CSS,JAVA', 'Online', '2023-12-13 15:38:45', 'www.twitter.com', 'www.facebook.com', 'www.instagram.com', 'www.linkedin.com', '18', '18Adhar1699176720.', '18PAN1699176720.'),
(19, 'Sakshi Sanap', 'ETIS125', 'sakshisanap631@gmail.com', '+9258741360', 'ETIS125', '%@600369$#', 'CS', 'SDE', '', '', '', '', '2023-10-01', '2023-10-01', 'PUNE', 'BE', 'A recent computer science graduate with two years of internship experience at well-known IT firms, focused on systems administration and technical support. Adept at working within cross-functional teams on technical projects.', 'HTML,CSS,JAVA', 'Offline', '2023-12-05 11:28:59', 'www.twitter.com', 'www.facebook.com', 'www.instagram.com', 'www.linkedin.com', '19', '', '19PAN1699526364.jpg'),
(20, 'Rutuja Bokare', 'ETIS126', 'rutuja@gmail.com', '+9632154870', 'ETIS126', 'rutuja', 'IT', 'SDE', '', '', '', '', '2023-10-01', '2023-10-01', 'PUNE', 'BE', 'A recent computer science graduate with two years of internship experience at well-known IT firms, focused on systems administration and technical support. Adept at working within cross-functional teams on technical projects.', 'HTML,CSS,JAVA', 'Offline', '2023-10-15 11:49:46', 'www.twitter.com', 'www.facebook.com', 'www.instagram.com', 'www.linkedin.com', '20', '', ''),
(22, 'akash', 'ETIS128', 'akashdhobale937@gmail.com', '+74867467696', 'ETIS128', '%@451095$#', 'IT', 'senior', '', '', '', '', '2023-10-01', '2023-10-01', 'pune', 'BE', 'ddddddddddd', 'HTML,CSS,JAVA', 'Offline', '2023-12-05 10:57:45', 'ttttttttt', 'fffffffffff', 'iiiiiiiii', 'llll', '22', '22', '22'),
(24, 'pallavi', 'ETIS127', 'pallavi@gmail.com', '+76878567566', 'ETIS127', 'pallavi', 'testing', 'junior', '', '', '', '', '2023-10-01', '2023-10-11', 'moshi', 'BE', 'abouyt', 'HTML,CSS,JAVA', 'Offline', '2023-11-16 20:14:44', 't', 'f', 'i', 'l', '', '24', '24'),
(27, 'AJAY', 'ETIS908', 'ajay@gmail.com', '9876554321', 'ETIS908', '12345', 'ddddddd', 'ppppp', '', '', '', '', '2023-10-13', '2023-10-12', 'banglore', 'be', 'aaaaaaaaa', 'java', 'Offline', '2023-11-02 11:36:21', 'twitter', 'facebook', 'insta', 'link', '27', '27', '27'),
(28, 'SANTHU', 'ETIS1000', 'santhu@gmail.com', '8911111112', 'ETIS1000', 'santhu', 'ddddddddd', 'p', '', '', '', '', '2023-10-25', '2023-05-13', 'aaaaaaa', 'fffffffff', 'aaaaa', 'sssss', 'Offline', '0000-00-00 00:00:00', 'twitter', 'dfff', 'iii', 'llllll', '28', '', '28PAN1699522817.jpg'),
(29, 'abcdefff', 'ETIS131', 'email@gmail.com', '1234567890', 'ETIS131', 'ishika', 'dep', 'jon', '', '', '', '', '2023-11-01', '2023-11-10', 'pune', 'BE', 'sss', 'java sql', 'Offline', '2023-11-09 16:07:45', 'ttyu', 'ggggfghgffgf', 'fghh', 'kiihh', '29Profile1699531414.jpg', '', ''),
(36, 'hhhhh jjjjj', 'etuuu1111', 'a@gmail.com', '8776655577', 'etuuu1111', '123iyt', 'it111', 'developer', '', '', '', '', '2023-12-12', '2023-11-29', 'pune', 'be', '', 'java', '', '0000-00-00 00:00:00', '', '', '', '', '', '', ''),
(37, 'jyoti hipparagi', '45566', 'jyoti@gmail.com', '9876543210', '45566', '12345', 'it', 'devop', '', '', '', '', '2023-12-12', '2023-12-20', 'pune', 'be', '', 'java', '', '0000-00-00 00:00:00', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `hdname` varchar(50) NOT NULL,
  `fromDate` varchar(20) NOT NULL,
  `toDate` varchar(20) NOT NULL,
  `numberOfDays` int(11) NOT NULL,
  `descr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `hdname`, `fromDate`, `toDate`, `numberOfDays`, `descr`) VALUES
(13, 'diwali', '2023-10-10', '2023-10-18', 8, 'diwali '),
(14, 'navratri', '2023-10-18', '2023-10-23', 5, 'navratri');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `team` varchar(255) NOT NULL,
  `emp` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `link` varchar(255) NOT NULL,
  `message` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `fname`, `team`, `emp`, `date`, `time`, `link`, `message`) VALUES
(8, 'Prashant Chavan', 'TEAM-Nyaasah', '', '2023-10-14', '09:04:00', 'http://www.google.com', 'Join on time'),
(9, 'Prashant Chavan', 'TEAM-HRM', '', '2023-10-08', '09:20:00', 'https://meet.google.com/nyg-aqgv-zfn', 'Join on time'),
(10, 'Jyoti', '', 'Sachin', '2023-10-08', '10:00:00', 'https://meet.google.com/nyg-aqgv-zfn', 'Join ASAP'),
(11, '', '', 'Rutuja Bokare', '2023-10-09', '17:49:00', 'ncnbvbnbn', 'Join asap'),
(12, 'ETIS123', '', '', '0000-00-00', '00:00:00', '', ''),
(13, 'ETIS123', '', '', '0000-00-00', '00:00:00', '', ''),
(14, 'Jyoti', 'TEAM-HRM', 'Sakshi Sanap', '2023-10-17', '06:33:00', '...', ''),
(15, 'ETIS124', 'TEAM', 'Jyoti', '2023-10-11', '06:34:00', 'kkk', 'nn'),
(16, 'ETIS125', 'TEAM-Gangeya', 'Sakshi Sanap', '2023-10-10', '17:22:00', 'https://meet.google.com/err-vdsw-gpy', 'ajhcajhsc'),
(17, 'ETIS125', '', '', '2023-10-11', '18:24:00', 'https://meet.google.com/err-vdsw-gpy', 'hhjhejjh'),
(18, 'ETIS125', '', '', '2023-10-11', '18:35:00', 'https://meet.google.com/err-vdsw-gpy', 'kssdjksd'),
(19, 'Sakshi Sanap', 'TEAM-HRM', 'Sachin', '2023-10-11', '17:36:00', 'https://meet.google.com/err-vdsw-gpy', 'jjhsdhjhsdhsd'),
(20, 'ETIS123', 'TEAM-Gangeya', 'Vishal Barage', '2023-10-13', '12:08:00', 'https://', 'jdhjwd'),
(21, 'Sachin', 'TEAM-Gangeya', 'Jyoti', '2023-10-12', '12:03:00', 'www.http', 'sfe'),
(22, 'Sachin', 'TEAM-HRM', 'Jyoti', '2023-10-13', '11:22:00', 'hsjhsdjh', 'wswjdhn'),
(23, 'Jyoti', 'TEAM-HRM', 'Pallavi Shinde', '2023-10-13', '23:22:00', 'hjhh', 'ndjsdjfhf'),
(24, '', 'TEAM-HRM', 'Jyoti', '2023-10-15', '03:03:00', 'gggsd', 'sq'),
(25, 'Jyoti', 'TEAM-HRM', 'Sakshi Sanap', '2023-10-13', '22:34:00', 'ererr', 'jyoti organised'),
(26, '', 'TEAM-HRM', 'Sachin', '2023-10-21', '06:06:00', 'ert', 'jjjmmm'),
(27, 'Jyoti', 'TEAM-Gangeya', 'Sachin', '2023-10-13', '05:05:00', 'njhhvg', 'ghghghgh'),
(28, 'Sakshi Sanap', 'TEAM-Gangeya', 'pallavi', '2023-10-20', '20:30:00', 'n', 'hu'),
(30, '', 'TEAM-Gangeya', 'Rutuja Bokare', '0000-00-00', '16:30:00', 'lll', 'mg'),
(31, 'Jyoti', 'TEAM-Gangeya', 'SANTHU', '2023-10-27', '18:31:00', 'link', 'jjjjjjjjjjjjj'),
(32, 'pooja', 'TEAM-A', '', '2023-11-10', '19:47:00', 'htttps://google meet', 'join'),
(33, 'Rutuja Bokare', '', 'Jyoti', '2023-11-10', '18:48:00', '	https://meet.google.com/err-vdsw-gpy', 'joined'),
(34, 'Sakshi Sanap', 'TEAM Gangeya', '', '2023-11-09', '09:09:00', '	https://meet.google.com/err-vdsw-gpy', 'join'),
(35, 'Sakshi Sanap', '', 'Sachin', '2023-11-11', '18:09:00', '	https://meet.google.com/err-vdsw-gpy', 'joinnnnnnn');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`) VALUES
(10, 'HAPPY DEEPAVALI');

-- --------------------------------------------------------

--
-- Table structure for table `noticedpr`
--

CREATE TABLE `noticedpr` (
  `id` int(11) NOT NULL,
  `imonth` varchar(40) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noticedpr`
--

INSERT INTO `noticedpr` (`id`, `imonth`, `link`) VALUES
(20, '2023-11', 'https://forms.gle/usB6W5CGm9w7Smds6');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `imonth` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `emp_id`, `ename`, `imonth`, `rating`) VALUES
(8, 'ETIS126', 'rutuja bokare', '2023-06', 7),
(12, 'ETIS124', 'Jyoti', '2023-07', 4);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(20) NOT NULL,
  `project` varchar(30) NOT NULL,
  `TeamMember` varchar(250) NOT NULL,
  `requirement` varchar(50) NOT NULL,
  `date` varchar(30) NOT NULL,
  `duedate` varchar(30) NOT NULL,
  `Teamsize` varchar(20) NOT NULL,
  `projectclient` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `app_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project`, `TeamMember`, `requirement`, `date`, `duedate`, `Teamsize`, `projectclient`, `status`, `app_type`) VALUES
(33, 'PROJECT-Gangeya', 'ETIS125,ETIS126,ETIS128,ETIS127', '19Adhar1699526364.pdf', '2023-10-01', '2023-10-15', '4', 'Product App', 'started', 'Hybrid'),
(51, 'ELECTRICAL DESIGN', 'ETIS123,ETIS124,ETIS125,ETIS126', 'ss ew resume-1 (3) (1).pdf', '2023-10-11', '2023-10-19', '4', 'AJAY', 'Started', 'Web App'),
(63, 'WATER BOARD', 'ETIS123,ETIS124,ETIS125', 'Seleiumonlinequestion.pdf', '2023-11-09', '2023-11-15', '3', 'hhkgxddyiul', 'Viewed', 'Web App'),
(89, 'abccddddd', 'ETIS123', 'Seleiumonlinequestion.pdf', '2023-11-17', '2023-11-23', '1', 'product', 'started', 'Web App'),
(90, 'kjhgfdsfghjuikl', 'ETIS123,ETIS124,ETIS126', 'Bus_Ticket_TSAU22393506.pdf', '2023-12-12', '2023-12-19', '3', 'ljrtyu', 'Viewed', 'Web App');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `id` int(11) NOT NULL,
  `team_name` varchar(30) NOT NULL,
  `team_lead` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  `team_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`id`, `team_name`, `team_lead`, `members`, `team_size`) VALUES
(50, 'TEAM Gangeya', 'Jyoti', 'akash, ishika, Jyoti, pallavi, pooja, Rutuja Bokare, Sachin', 0),
(59, 'Team abc', 'ishika', 'AJAY, akash, ishika, Jyoti', 0),
(60, 'abcd', 'Rutuja Bokare', 'ishika, pallavi, Sachin', 0),
(61, 'eeee', 'akash', 'AJAY, akash, ishika', 0),
(62, 'ttt', 'akash', 'akash, ishika, Jyoti, pallavi', 3),
(63, 'rrrr', 'ishika', 'AJAY, akash, ishika, Jyoti', 3),
(64, 'jjjj', 'SANTHU', 'abcdefff', 1),
(65, 'jyotiiii', 'Sakshi Sanap', 'Sachin, Sakshi Sanap, SANTHU', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_leave`
--

CREATE TABLE `user_leave` (
  `id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `leavet` varchar(50) NOT NULL,
  `sdate` varchar(250) NOT NULL,
  `edate` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_leave`
--

INSERT INTO `user_leave` (`id`, `fname`, `empid`, `leavet`, `sdate`, `edate`, `reason`, `status`) VALUES
(16, 'Akash Dhobale', 'ETIS128', 'Medical Leave', '', '', 'Helth Issue', 1),
(17, 'Akash Dhobale', 'ETIS128', 'Casual Leave', '', '', 'huwcbqwbc w', 1),
(18, 'Sachin', 'ETIS123', 'Casual Leave', '', '', 'Akash Marriege\r\n', 1),
(19, 'Sakshi Sanap', 'ETIS125', 'Privileged Leave', '', '', 'hey', 1),
(20, 'Sakshi Sanap', 'ETIS125', 'Medical Leave', '2023-10-12', '2023-10-21', 'leave', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(5) NOT NULL,
  `session_id` int(255) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `in_timestamp` time NOT NULL,
  `out_timestamp` time NOT NULL,
  `sessTime` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `session_id`, `emp_id`, `emp_name`, `date`, `in_timestamp`, `out_timestamp`, `sessTime`, `status`) VALUES
(109, 7689413, 'ETIS987', 'Aditya Patil', '2023-10-03', '13:26:10', '13:28:20', '00:02:10', 'Offline'),
(110, 1179429, 'ETS13', 'sakshi sanap', '2023-10-03', '13:35:17', '13:36:41', '00:01:24', 'Offline'),
(111, 615837, 'ETIS987', 'Aditya Patil', '2023-10-03', '14:00:38', '14:02:34', '00:01:56', 'Offline'),
(112, 8187832, 'ETIS987', 'Aditya Patil', '2023-10-03', '16:01:33', '17:56:19', '01:54:46', 'Offline'),
(113, 9530941, 'ETIS987', 'Aditya Patil', '2023-10-03', '17:56:44', '18:04:08', '00:07:24', 'Offline'),
(114, 5919207, 'ETIS987', 'Aditya Patil', '2023-10-03', '18:07:43', '18:17:11', '00:09:28', 'Offline'),
(115, 5496727, 'ETS13', 'sakshi sanap', '2023-10-03', '18:17:21', '18:27:37', '00:10:16', 'Offline'),
(116, 2399597, 'ETS13', 'sakshi sanap', '2023-10-03', '18:27:53', '18:30:29', '00:02:36', 'Offline'),
(117, 4293633, 'ETIS987', 'Aditya Patil', '2023-10-03', '18:37:31', '18:42:50', '00:05:19', 'Offline'),
(118, 5158737, 'ETIS987', 'Aditya Patil', '2023-10-03', '19:16:42', '19:19:33', '00:02:51', 'Offline'),
(119, 9621300, 'ETIS987', 'Aditya Patil', '2023-10-04', '07:59:54', '08:01:18', '00:01:24', 'Offline'),
(120, 445231, 'ETIS987', 'Aditya Patil', '2023-10-04', '08:04:36', '08:09:08', '00:04:32', 'Offline'),
(121, 9547674, 'ETIS987', 'Aditya Patil', '2023-10-04', '08:10:52', '08:14:43', '00:03:51', 'Offline'),
(122, 3026478, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:03:14', '10:06:16', '00:03:02', 'Offline'),
(123, 8124472, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:10:00', '10:11:20', '00:01:20', 'Offline'),
(124, 7021783, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:14:05', '10:21:36', '00:07:31', 'Offline'),
(125, 4527865, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:21:44', '10:23:07', '00:01:23', 'Offline'),
(126, 1736817, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:23:20', '10:24:46', '00:01:26', 'Offline'),
(127, 9281287, 'ETS13', 'sakshi sanap', '2023-10-04', '10:25:20', '10:27:05', '00:01:45', 'Offline'),
(128, 2559516, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:27:22', '10:29:25', '00:02:03', 'Offline'),
(129, 6808864, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:34:02', '10:34:47', '00:00:45', 'Offline'),
(130, 7500326, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:35:33', '10:36:57', '00:01:24', 'Offline'),
(131, 9372228, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:45:38', '10:54:06', '00:08:28', 'Offline'),
(132, 7328409, 'ETIS987', 'Aditya Patil', '2023-10-04', '10:54:19', '11:06:41', '00:12:22', 'Offline'),
(133, 959153, 'ETIS987', 'Aditya Patil', '2023-10-04', '11:06:47', '11:08:11', '00:01:24', 'Offline'),
(134, 9044622, 'ETIS987', 'Aditya Patil', '2023-10-04', '11:09:02', '11:10:25', '00:01:23', 'Offline'),
(135, 6140386, 'ETIS987', 'Aditya Patil', '2023-10-04', '11:10:57', '11:13:22', '00:02:25', 'Offline'),
(136, 6636977, 'ETIS987', 'Aditya Patil', '2023-10-04', '11:14:29', '11:15:54', '00:01:25', 'Offline'),
(137, 83700, 'ETS13', 'sakshi sanap', '2023-10-04', '11:20:08', '11:21:32', '00:01:24', 'Offline'),
(138, 8419486, 'ETIS987', 'Aditya Patil', '2023-10-04', '11:29:04', '11:30:29', '00:01:25', 'Offline'),
(139, 4402104, 'ETIS987', 'Aditya Patil', '2023-10-04', '11:34:23', '11:37:51', '00:03:28', 'Offline'),
(140, 1546790, 'ETIS987', 'Aditya Patil', '2023-10-04', '11:46:20', '11:47:45', '00:01:25', 'Offline'),
(141, 844406, 'ETIS987', 'Aditya Patil', '2023-10-04', '12:40:56', '12:42:34', '00:01:38', 'Offline'),
(142, 6922482, 'ETIS987', 'Aditya Patil', '2023-10-04', '13:10:49', '13:15:18', '00:04:29', 'Offline'),
(143, 5821110, 'ETIS987', 'Aditya Patil', '2023-10-04', '13:18:42', '13:20:06', '00:01:24', 'Offline'),
(144, 8285592, 'ETIS987', 'Aditya Patil', '2023-10-04', '14:38:58', '14:40:23', '00:01:25', 'Offline'),
(145, 6277599, 'ETIS987', 'Aditya Patil', '2023-10-04', '14:40:33', '14:41:58', '00:01:25', 'Offline'),
(146, 7909482, 'ETIS987', 'Aditya Patil', '2023-10-04', '14:59:01', '15:01:01', '00:02:00', 'Offline'),
(147, 1369509, 'ETIS987', 'Aditya Patil', '2023-10-04', '15:03:52', '16:22:29', '01:18:37', 'Offline'),
(148, 5645388, 'ETS13', 'sakshi sanap', '2023-10-04', '15:22:20', '15:23:49', '00:01:29', 'Offline'),
(149, 6310359, 'ETIS987', 'Aditya Patil', '2023-10-04', '16:20:53', '16:22:47', '00:01:54', 'Offline'),
(150, 6080858, 'ETIS987', 'Aditya Patil', '2023-10-04', '18:02:25', '00:00:00', '00:00:00', 'Online'),
(151, 6408548, 'ETIS987', 'Aditya Patil', '2023-10-04', '21:02:02', '21:03:15', '00:01:13', 'Offline'),
(152, 6712259, 'ETIS987', 'Aditya Patil', '2023-10-04', '21:29:38', '00:00:00', '00:00:00', 'Online'),
(153, 8997137, 'ETIS987', 'Aditya Patil', '2023-10-04', '22:31:47', '22:32:24', '00:00:37', 'Offline'),
(154, 4205750, 'ETIS987', 'Aditya Patil', '2023-10-04', '22:33:28', '23:29:37', '00:56:09', 'Offline'),
(155, 8159764, 'ETIS987', 'Aditya Patil', '2023-10-04', '22:45:31', '00:00:00', '00:00:00', 'Online'),
(156, 5492876, 'ETIS987', 'Aditya Patil', '2023-10-05', '07:40:50', '08:25:26', '00:44:36', 'Offline'),
(157, 9848335, 'ETIS987', 'Aditya Patil', '2023-10-05', '07:42:39', '08:25:07', '00:42:28', 'Offline'),
(158, 6216101, 'ETIS987', 'Aditya Patil', '2023-10-05', '09:46:43', '14:26:26', '04:39:43', 'Offline'),
(159, 247625, 'ETIS987', 'Aditya Patil', '2023-10-05', '14:55:42', '15:19:33', '00:23:51', 'Offline'),
(160, 837533, 'ETS13', 'sakshi sanap', '2023-10-05', '15:19:42', '15:24:20', '00:04:38', 'Offline'),
(161, 8803750, 'ETIS789', 'Vishal Barage', '2023-10-05', '15:24:35', '18:45:16', '03:20:41', 'Offline'),
(162, 8683924, 'ETS13', 'sakshi sanap', '2023-10-05', '15:51:15', '16:31:32', '00:40:17', 'Offline'),
(163, 7178620, 'ETIS987', 'Aditya Patil', '2023-10-05', '18:55:40', '19:57:59', '01:02:19', 'Offline'),
(164, 2611824, 'ETIS987', 'Aditya Patil', '2023-10-05', '19:58:29', '00:00:00', '00:00:00', 'Online'),
(165, 9624250, 'ETS13', 'sakshi sanap', '2023-10-06', '15:47:11', '02:51:24', '11:04:13', 'Offline'),
(166, 758145, 'ETS13', 'sakshi sanap', '2023-10-07', '04:28:40', '06:06:30', '01:37:50', 'Offline'),
(167, 2203003, 'ETIS123', 'Sachin', '2023-10-07', '10:22:20', '13:24:05', '03:01:45', 'Offline'),
(168, 421937, 'ETIS125', 'Sakshi Sanap', '2023-10-07', '13:24:30', '18:12:32', '04:48:02', 'Offline'),
(169, 5490208, 'ETIS123', 'Sachin', '2023-10-07', '18:13:01', '18:38:14', '00:25:13', 'Offline'),
(170, 9640696, 'ETIS123', 'Sachin', '2023-10-07', '18:38:32', '18:50:55', '00:12:23', 'Offline'),
(171, 9044308, 'ETIS123', 'Sachin', '2023-10-07', '18:51:12', '20:41:56', '01:50:44', 'Offline'),
(172, 454281, 'ETIS123', 'Sachin', '2023-10-08', '08:22:14', '09:35:56', '01:13:42', 'Offline'),
(173, 1845869, 'ETIS123', 'Sachin', '2023-10-08', '09:36:09', '10:26:17', '00:50:08', 'Offline'),
(174, 3102864, 'ETIS123', 'Sachin', '2023-10-08', '10:30:04', '10:33:00', '00:02:56', 'Offline'),
(175, 6502486, 'ETIS124', 'Jyoti', '2023-10-08', '10:33:15', '10:37:58', '00:04:43', 'Offline'),
(176, 8572984, 'ETIS123', 'Sachin', '2023-10-08', '10:38:09', '11:15:43', '00:37:34', 'Offline'),
(177, 9795238, 'ETIS123', 'Sachin', '2023-10-08', '11:15:51', '11:50:58', '00:35:07', 'Offline'),
(178, 8870670, 'ETIS123', 'Sachin', '2023-10-08', '11:52:54', '13:36:09', '01:43:15', 'Offline'),
(179, 8402761, 'ETIS123', 'Sachin', '2023-10-08', '13:36:30', '14:05:08', '00:28:38', 'Offline'),
(180, 7336404, 'ETIS123', 'Sachin', '2023-10-08', '14:06:01', '14:07:53', '00:01:52', 'Offline'),
(181, 4017550, 'ETIS123', 'Sachin', '2023-10-08', '14:08:04', '14:09:25', '00:01:21', 'Offline'),
(182, 528572, 'ETIS123', 'Sachin', '2023-10-08', '14:10:50', '14:12:10', '00:01:20', 'Offline'),
(183, 5597726, 'ETIS123', 'Sachin', '2023-10-08', '14:24:17', '14:26:40', '00:02:23', 'Offline'),
(184, 5386495, 'ETIS123', 'Sachin', '2023-10-08', '14:28:28', '14:31:24', '00:02:56', 'Offline'),
(185, 3286041, 'ETIS123', 'Sachin', '2023-10-08', '14:32:26', '14:38:38', '00:06:12', 'Offline'),
(186, 9477654, 'ETIS123', 'Sachin', '2023-10-08', '15:01:29', '15:02:56', '00:01:27', 'Offline'),
(187, 4849288, 'ETIS123', 'Sachin', '2023-10-08', '15:18:29', '15:21:36', '00:03:07', 'Offline'),
(188, 3174702, 'ETIS123', 'Sachin', '2023-10-08', '15:22:01', '15:23:26', '00:01:25', 'Offline'),
(189, 4062803, 'ETIS127', 'Pallavi Shinde', '2023-10-08', '15:42:28', '15:45:28', '00:03:00', 'Offline'),
(190, 5061805, 'ETIS126', 'Rutuja Bokare', '2023-10-08', '15:45:57', '15:48:03', '00:02:06', 'Offline'),
(191, 1396032, 'ETIS123', 'Sachin', '2023-10-09', '09:59:03', '10:00:27', '00:01:24', 'Offline'),
(192, 5966374, 'ETIS123', 'Sachin', '2023-10-09', '10:09:07', '10:10:32', '00:01:25', 'Offline'),
(193, 2452138, 'ETIS123', 'Sachin', '2023-10-09', '10:11:43', '10:13:47', '00:02:04', 'Offline'),
(194, 2258429, 'ETIS124', 'Jyoti', '2023-10-09', '13:32:42', '13:32:45', '00:00:03', 'Offline'),
(195, 1308271, 'ETIS123', 'Sachin', '2023-10-09', '13:33:08', '00:00:00', '00:00:00', 'Online'),
(196, 2222580, 'ETIS123', 'Sachin', '2023-10-09', '13:34:43', '14:15:00', '00:40:17', 'Offline'),
(197, 9570162, 'ETIS123', 'Sachin', '2023-10-09', '14:16:35', '00:00:00', '00:00:00', 'Online'),
(198, 9569467, 'ETIS124', 'Jyoti', '2023-10-09', '17:00:54', '17:00:56', '00:00:02', 'Offline'),
(199, 6003948, 'ETIS124', 'Jyoti', '2023-10-09', '17:01:15', '17:01:40', '00:00:25', 'Offline'),
(200, 6143755, 'ETIS124', 'Jyoti', '2023-10-09', '23:01:28', '23:03:29', '00:02:01', 'Offline'),
(201, 5562710, 'ETIS123', 'Sachin', '2023-10-09', '23:03:41', '00:00:00', '00:00:00', 'Online'),
(202, 4508808, 'ETIS124', 'Jyoti', '2023-10-10', '13:03:02', '13:03:43', '00:00:41', 'Offline'),
(203, 8718132, 'ETIS124', 'Jyoti', '2023-10-10', '13:04:58', '13:22:28', '00:17:30', 'Offline'),
(204, 3809812, 'ETIS123', 'Sachin', '2023-10-10', '13:22:38', '13:23:31', '00:00:53', 'Offline'),
(205, 2057515, 'ETIS124', 'Jyoti', '2023-10-10', '13:23:41', '14:16:10', '00:52:29', 'Offline'),
(206, 9126240, 'ETIS124', 'Jyoti', '2023-10-10', '14:21:53', '14:43:28', '00:21:35', 'Offline'),
(207, 9788386, 'ETIS124', 'Jyoti', '2023-10-10', '15:06:06', '15:27:26', '00:21:20', 'Offline'),
(208, 1958640, 'ETIS124', 'Jyoti', '2023-10-10', '15:30:17', '15:58:11', '00:27:54', 'Offline'),
(209, 2208049, 'ETIS124', 'Jyoti', '2023-10-10', '16:42:51', '17:07:39', '00:24:48', 'Offline'),
(210, 5340715, 'ETIS124', 'Jyoti', '2023-10-10', '17:16:53', '00:00:00', '00:00:00', 'Online'),
(211, 3600541, 'ETIS124', 'Jyoti', '2023-10-10', '17:27:00', '17:34:23', '00:07:23', 'Offline'),
(212, 5429989, 'ETIS124', 'Jyoti', '2023-10-10', '17:34:52', '17:37:37', '00:02:45', 'Offline'),
(213, 4955853, 'ETIS123', 'Sachin', '2023-10-10', '17:37:47', '00:00:00', '00:00:00', 'Online'),
(214, 1297832, 'ETIS124', 'Jyoti', '2023-10-10', '17:43:11', '17:43:34', '00:00:23', 'Offline'),
(215, 2090020, 'ETIS124', 'Jyoti', '2023-10-10', '17:45:30', '17:45:43', '00:00:13', 'Offline'),
(216, 133721, 'ETIS124', 'Jyoti', '2023-10-10', '17:52:22', '18:30:25', '00:38:03', 'Offline'),
(217, 6299656, 'ETIS124', 'Jyoti', '2023-10-10', '18:30:43', '18:37:10', '00:06:27', 'Offline'),
(218, 2022623, 'ETIS124', 'Jyoti', '2023-10-10', '18:37:43', '19:07:45', '00:30:02', 'Offline'),
(219, 6832484, 'ETIS124', 'Jyoti', '2023-10-10', '19:58:00', '19:58:13', '00:00:13', 'Offline'),
(220, 4463948, 'ETIS124', 'Jyoti', '2023-10-10', '20:15:03', '00:00:00', '00:00:00', 'Online'),
(221, 921289, 'ETIS124', 'Jyoti', '2023-10-10', '22:08:25', '00:00:00', '00:00:00', 'Online'),
(222, 4611899, 'ETIS124', 'Jyoti', '2023-10-10', '22:08:38', '00:00:00', '00:00:00', 'Online'),
(223, 1521677, 'ETIS124', 'Jyoti', '2023-10-10', '22:08:47', '00:00:00', '00:00:00', 'Online'),
(224, 9179333, 'ETIS123', 'Sachin', '2023-10-10', '22:09:16', '00:00:00', '00:00:00', 'Online'),
(225, 3999678, 'ETIS123', 'Sachin', '2023-10-10', '22:10:49', '00:00:00', '00:00:00', 'Online'),
(226, 157446, 'ETIS124', 'Jyoti', '2023-10-10', '22:11:02', '00:00:00', '00:00:00', 'Online'),
(227, 1898381, 'ETIS124', 'Jyoti', '2023-10-10', '22:12:17', '00:00:00', '00:00:00', 'Online'),
(228, 9838037, 'ETIS124', 'Jyoti', '2023-10-10', '22:14:36', '00:00:00', '00:00:00', 'Online'),
(229, 2343563, 'ETIS124', 'Jyoti', '2023-10-10', '22:14:48', '00:00:00', '00:00:00', 'Online'),
(230, 6782256, 'ETIS124', 'Jyoti', '2023-10-10', '22:16:58', '00:00:00', '00:00:00', 'Online'),
(231, 8244039, 'ETIS124', 'Jyoti', '2023-10-10', '22:17:23', '00:00:00', '00:00:00', 'Online'),
(232, 9978054, 'ETIS124', 'Jyoti', '2023-10-10', '22:18:05', '00:00:00', '00:00:00', 'Online'),
(233, 7196530, 'ETIS124', 'Jyoti', '2023-10-10', '22:18:11', '00:00:00', '00:00:00', 'Online'),
(234, 5572404, 'ETIS124', 'Jyoti', '2023-10-10', '22:18:24', '00:00:00', '00:00:00', 'Online'),
(235, 4806057, 'ETIS124', 'Jyoti', '2023-10-10', '22:18:49', '22:18:55', '00:00:06', 'Offline'),
(236, 9921827, 'ETIS124', 'Jyoti', '2023-10-10', '22:19:28', '22:19:33', '00:00:05', 'Offline'),
(237, 585583, 'ETIS124', 'Jyoti', '2023-10-10', '22:23:06', '00:00:00', '00:00:00', 'Online'),
(238, 5475137, 'ETIS123', 'Sachin', '2023-10-10', '22:23:45', '22:45:51', '00:22:06', 'Offline'),
(239, 6577321, 'ETIS124', 'Jyoti', '2023-10-10', '22:48:57', '23:11:01', '00:22:04', 'Offline'),
(240, 1995, 'ETIS124', 'Jyoti', '2023-10-10', '23:34:53', '23:37:47', '00:02:54', 'Offline'),
(241, 4640293, 'ETIS123', 'Sachin', '2023-10-10', '23:37:58', '23:38:19', '00:00:21', 'Offline'),
(242, 232407, 'ETIS125', 'Sakshi Sanap', '2023-10-10', '23:38:32', '23:59:38', '00:21:06', 'Offline'),
(243, 1240819, 'ETIS124', 'Jyoti', '2023-10-11', '00:28:34', '00:29:12', '00:00:38', 'Offline'),
(244, 6090555, 'ETIS125', 'Sakshi Sanap', '2023-10-11', '00:29:24', '00:00:00', '00:00:00', 'Online'),
(245, 3978799, 'ETIS124', 'Jyoti', '2023-10-11', '09:46:36', '10:16:42', '00:30:06', 'Offline'),
(246, 7817455, 'ETIS126', 'Rutuja Bokare', '2023-10-11', '10:16:53', '10:23:35', '00:06:42', 'Offline'),
(247, 5582043, 'ETIS124', 'Jyoti', '2023-10-11', '10:26:09', '00:00:00', '00:00:00', 'Online'),
(248, 1076161, 'ETIS124', 'Jyoti', '2023-10-11', '10:39:23', '00:00:00', '00:00:00', 'Online'),
(249, 3165840, 'ETIS123', 'Sachin', '2023-10-11', '16:15:26', '00:00:00', '00:00:00', 'Online'),
(250, 79243, 'ETIS123', 'Sachin', '2023-10-11', '16:28:07', '16:28:15', '00:00:08', 'Offline'),
(251, 4081386, 'ETIS124', 'Jyoti', '2023-10-11', '16:28:26', '16:37:08', '00:08:42', 'Offline'),
(252, 9260881, 'ETIS123', 'Sachin', '2023-10-11', '16:37:21', '16:37:30', '00:00:09', 'Offline'),
(253, 4693906, 'ETIS123', 'Sachin', '2023-10-11', '16:44:46', '17:01:37', '00:16:51', 'Offline'),
(254, 2844299, 'ETIS123', 'Sachin', '2023-10-11', '17:02:19', '17:06:54', '00:04:35', 'Offline'),
(255, 8122983, 'ETIS125', 'Sakshi Sanap', '2023-10-11', '17:07:08', '10:38:17', '17:31:09', 'Offline'),
(256, 500227, 'ETIS123', 'Sachin', '2023-10-12', '10:45:59', '10:49:06', '00:03:07', 'Offline'),
(257, 6308596, 'ETIS123', 'Sachin', '2023-10-12', '10:53:39', '11:14:42', '00:21:03', 'Offline'),
(258, 5431534, 'ETIS123', 'Sachin', '2023-10-12', '12:04:11', '12:08:58', '00:04:47', 'Offline'),
(259, 2024613, 'ETIS124', 'Jyoti', '2023-10-12', '12:09:14', '12:10:01', '00:00:47', 'Offline'),
(260, 8824945, 'ETIS123', 'Sachin', '2023-10-12', '12:10:11', '12:51:17', '00:41:06', 'Offline'),
(261, 424973, 'ETIS123', 'Sachin', '2023-10-12', '13:26:52', '13:47:55', '00:21:03', 'Offline'),
(262, 1974945, 'ETIS123', 'Sachin', '2023-10-12', '14:12:46', '00:00:00', '00:00:00', 'Online'),
(263, 8230051, 'ETIS123', 'Sachin', '2023-10-12', '14:17:56', '00:00:00', '00:00:00', 'Online'),
(264, 4722153, 'ETIS123', 'Sachin', '2023-10-12', '14:18:56', '00:00:00', '00:00:00', 'Online'),
(265, 370539, 'ETIS123', 'Sachin', '2023-10-12', '14:19:06', '00:00:00', '00:00:00', 'Online'),
(266, 6343284, 'ETIS123', 'Sachin', '2023-10-12', '14:22:20', '00:00:00', '00:00:00', 'Online'),
(267, 3437053, 'ETIS123', 'Sachin', '2023-10-12', '14:22:32', '00:00:00', '00:00:00', 'Online'),
(268, 7778447, 'ETIS123', 'Sachin', '2023-10-12', '14:23:23', '00:00:00', '00:00:00', 'Online'),
(269, 6630374, 'ETIS123', 'Sachin', '2023-10-12', '14:26:56', '00:00:00', '00:00:00', 'Online'),
(270, 7121315, 'ETIS123', 'Sachin', '2023-10-12', '14:37:23', '00:00:00', '00:00:00', 'Online'),
(271, 7488032, 'ETIS123', 'Sachin', '2023-10-12', '14:37:34', '00:00:00', '00:00:00', 'Online'),
(272, 9972182, 'ETIS123', 'Sachin', '2023-10-12', '14:38:44', '00:00:00', '00:00:00', 'Online'),
(273, 8454288, 'ETIS123', 'Sachin', '2023-10-12', '14:38:57', '00:00:00', '00:00:00', 'Online'),
(274, 6398953, 'ETIS123', 'Sachin', '2023-10-12', '14:50:00', '00:00:00', '00:00:00', 'Online'),
(275, 7856184, 'ETIS123', 'Sachin', '2023-10-12', '14:50:33', '00:00:00', '00:00:00', 'Online'),
(276, 8620120, 'ETIS123', 'Sachin', '2023-10-12', '14:53:27', '00:00:00', '00:00:00', 'Online'),
(277, 1151097, 'ETIS123', 'Sachin', '2023-10-12', '14:53:55', '00:00:00', '00:00:00', 'Online'),
(278, 6902667, 'ETIS123', 'Sachin', '2023-10-12', '14:55:02', '00:00:00', '00:00:00', 'Online'),
(279, 540777, 'ETIS123', 'Sachin', '2023-10-12', '14:55:45', '00:00:00', '00:00:00', 'Online'),
(280, 3879359, 'ETIS123', 'Sachin', '2023-10-12', '14:55:55', '00:00:00', '00:00:00', 'Online'),
(281, 5041570, 'ETIS123', 'Sachin', '2023-10-12', '14:56:13', '15:05:52', '00:09:39', 'Offline'),
(282, 9465564, 'ETIS123', 'Sachin', '2023-10-12', '15:07:33', '15:07:41', '00:00:08', 'Offline'),
(283, 6123258, 'ETIS123', 'Sachin', '2023-10-12', '15:10:05', '00:00:00', '00:00:00', 'Online'),
(284, 4180265, 'ETIS123', 'Sachin', '2023-10-12', '15:11:01', '00:00:00', '00:00:00', 'Online'),
(285, 1978039, 'ETIS123', 'Sachin', '2023-10-12', '15:11:12', '00:00:00', '00:00:00', 'Online'),
(286, 1512035, 'ETIS123', 'Sachin', '2023-10-12', '15:11:52', '15:12:03', '00:00:11', 'Offline'),
(287, 6204039, 'ETIS123', 'Sachin', '2023-10-12', '15:12:27', '15:13:18', '00:00:51', 'Offline'),
(288, 1783192, 'ETIS123', 'Sachin', '2023-10-12', '15:13:29', '00:00:00', '00:00:00', 'Online'),
(289, 9261443, 'ETIS123', 'Sachin', '2023-10-12', '15:14:04', '15:14:10', '00:00:06', 'Offline'),
(290, 1602370, 'ETIS123', 'Sachin', '2023-10-12', '15:14:20', '15:14:26', '00:00:06', 'Offline'),
(291, 7186649, 'ETIS123', 'Sachin', '2023-10-12', '15:22:30', '00:00:00', '00:00:00', 'Online'),
(292, 5100954, 'ETIS123', 'Sachin', '2023-10-12', '15:27:38', '00:00:00', '00:00:00', 'Online'),
(293, 205056, 'ETIS123', 'Sachin', '2023-10-12', '15:32:15', '15:32:26', '00:00:11', 'Offline'),
(294, 9638873, 'ETIS123', 'Sachin', '2023-10-12', '15:33:42', '15:33:49', '00:00:07', 'Offline'),
(295, 517105, 'ETIS123', 'Sachin', '2023-10-12', '15:34:37', '15:55:58', '00:21:21', 'Offline'),
(296, 105274, 'ETIS123', 'Sachin', '2023-10-12', '16:07:03', '00:00:00', '00:00:00', 'Online'),
(297, 9897019, 'ETIS123', 'Sachin', '2023-10-12', '16:07:35', '16:46:35', '00:39:00', 'Offline'),
(298, 1511312, 'ETIS123', 'Sachin', '2023-10-12', '16:49:19', '00:00:00', '00:00:00', 'Online'),
(299, 2211956, 'ETIS123', 'Sachin', '2023-10-12', '17:05:10', '17:05:24', '00:00:14', 'Offline'),
(300, 2887536, 'ETIS123', 'Sachin', '2023-10-12', '17:08:57', '17:09:09', '00:00:12', 'Offline'),
(301, 865069, 'ETIS123', 'Sachin', '2023-10-12', '17:13:41', '17:14:57', '00:01:16', 'Offline'),
(302, 4645597, 'ETIS123', 'Sachin', '2023-10-12', '17:15:18', '00:00:00', '00:00:00', 'Online'),
(303, 1776890, 'ETIS123', 'Sachin', '2023-10-12', '17:20:59', '00:00:00', '00:00:00', 'Online'),
(304, 1570160, 'ETIS123', 'Sachin', '2023-10-12', '17:21:41', '00:00:00', '00:00:00', 'Online'),
(305, 8914262, 'ETIS123', 'Sachin', '2023-10-12', '17:21:52', '00:00:00', '00:00:00', 'Online'),
(306, 4142995, 'ETIS123', 'Sachin', '2023-10-12', '17:23:14', '00:00:00', '00:00:00', 'Online'),
(307, 3359047, 'ETIS123', 'Sachin', '2023-10-12', '17:23:25', '00:00:00', '00:00:00', 'Online'),
(308, 4404804, 'ETIS123', 'Sachin', '2023-10-12', '17:23:55', '17:24:06', '00:00:11', 'Offline'),
(309, 7119787, 'ETIS123', 'Sachin', '2023-10-12', '17:25:18', '00:00:00', '00:00:00', 'Online'),
(310, 6080512, 'ETIS123', 'Sachin', '2023-10-12', '17:27:49', '17:27:55', '00:00:06', 'Offline'),
(311, 5815786, 'ETIS123', 'Sachin', '2023-10-12', '17:30:38', '00:00:00', '00:00:00', 'Online'),
(312, 3111305, 'ETIS123', 'Sachin', '2023-10-12', '17:33:02', '00:00:00', '00:00:00', 'Online'),
(313, 4984603, 'ETIS123', 'Sachin', '2023-10-12', '17:36:44', '00:00:00', '00:00:00', 'Online'),
(314, 4905621, 'ETIS123', 'Sachin', '2023-10-13', '10:37:48', '00:00:00', '00:00:00', 'Online'),
(315, 9452099, 'ETIS123', 'Sachin', '2023-10-13', '10:38:20', '10:59:23', '00:21:03', 'Offline'),
(316, 916043, 'ETIS123', 'Sachin', '2023-10-13', '11:06:15', '00:00:00', '00:00:00', 'Online'),
(317, 9623125, 'ETIS123', 'Sachin', '2023-10-13', '11:06:32', '11:54:23', '00:47:51', 'Offline'),
(318, 1643912, 'ETIS123', 'Sachin', '2023-10-13', '12:16:13', '12:29:07', '00:12:54', 'Offline'),
(319, 1494159, 'ETIS124', 'Jyoti', '2023-10-13', '12:29:24', '12:36:13', '00:06:49', 'Offline'),
(320, 5815116, 'ETIS123', 'Sachin', '2023-10-13', '12:36:24', '12:38:00', '00:01:36', 'Offline'),
(321, 6110477, 'ETIS124', 'Jyoti', '2023-10-13', '12:38:10', '12:39:43', '00:01:33', 'Offline'),
(322, 5787420, 'ETIS125', 'Sakshi Sanap', '2023-10-13', '12:39:54', '16:20:51', '03:40:57', 'Offline'),
(323, 4618671, 'ETIS123', 'Sachin', '2023-10-13', '16:36:33', '16:57:48', '00:21:15', 'Offline'),
(324, 3214041, 'ETIS123', 'Sachin', '2023-10-13', '17:01:51', '20:30:08', '03:28:17', 'Offline'),
(325, 327996, 'ETIS123', 'Sachin', '2023-10-13', '20:43:54', '21:26:52', '00:42:58', 'Offline'),
(326, 3203908, 'ETIS123', 'Sachin', '2023-10-13', '21:28:25', '22:01:14', '00:32:49', 'Offline'),
(327, 9325340, 'ETIS123', 'Sachin', '2023-10-14', '00:22:13', '00:43:32', '00:21:19', 'Offline'),
(328, 3755867, 'ETIS123', 'Sachin', '2023-10-14', '01:09:03', '19:14:36', '18:05:33', 'Offline'),
(329, 5035574, 'ETIS123', 'Sachin', '2023-10-14', '19:50:04', '19:50:34', '00:00:30', 'Offline'),
(330, 2976714, 'ETIS124', 'Jyoti', '2023-10-14', '19:50:47', '19:52:43', '00:01:56', 'Offline'),
(331, 9138139, 'ETIS127', 'Pallavi Shinde', '2023-10-15', '10:48:40', '11:02:03', '00:13:23', 'Offline'),
(332, 5115116, 'ETIS126', 'Rutuja Bokare', '2023-10-15', '11:02:17', '11:04:31', '00:02:14', 'Offline'),
(333, 9352047, 'ETIS127', 'Pallavi Shinde', '2023-10-15', '11:04:42', '11:05:38', '00:00:56', 'Offline'),
(334, 9655068, 'ETIS126', 'Rutuja Bokare', '2023-10-15', '11:05:47', '11:49:46', '00:43:59', 'Offline'),
(335, 1296545, 'ETIS123', 'Sachin', '2023-10-15', '13:03:42', '00:00:00', '00:00:00', 'Online'),
(336, 8537570, 'ETIS123', 'Sachin', '2023-10-15', '13:16:34', '13:16:44', '00:00:10', 'Offline'),
(337, 8100247, 'ETIS123', 'Sachin', '2023-10-15', '13:17:28', '13:17:35', '00:00:07', 'Offline'),
(338, 5596236, 'ETIS123', 'Sachin', '2023-10-15', '13:17:55', '13:18:45', '00:00:50', 'Offline'),
(339, 8587961, 'ETIS123', 'Sachin', '2023-10-15', '13:18:58', '13:19:05', '00:00:07', 'Offline'),
(340, 7705451, 'ETIS123', 'Sachin', '2023-10-15', '13:46:17', '00:00:00', '00:00:00', 'Online'),
(341, 1162344, 'ETIS123', 'Sachin', '2023-10-15', '14:23:20', '14:24:13', '00:00:53', 'Offline'),
(342, 928296, 'ETIS123', 'Sachin', '2023-10-15', '14:47:48', '00:00:00', '00:00:00', 'Online'),
(343, 662861, 'ETIS123', 'Sachin', '2023-10-15', '15:59:10', '16:10:30', '00:11:20', 'Offline'),
(344, 4339188, 'ETIS128', 'Akash Dhobale', '2023-10-15', '16:10:45', '16:12:43', '00:01:58', 'Offline'),
(345, 7445106, 'ETIS125', 'Sakshi Sanap', '2023-10-16', '14:37:08', '15:11:04', '00:33:56', 'Offline'),
(346, 4742510, 'ETIS125', 'Sakshi Sanap', '2023-10-16', '16:07:49', '16:28:52', '00:21:03', 'Offline'),
(347, 7484400, 'ETIS125', 'Sakshi Sanap', '2023-10-16', '16:44:59', '17:23:03', '00:38:04', 'Offline'),
(348, 2076535, 'ETIS125', 'Sakshi Sanap', '2023-10-16', '17:45:00', '18:20:52', '00:35:52', 'Offline'),
(349, 6259460, 'ETIS125', 'Sakshi Sanap', '2023-10-16', '18:43:00', '00:00:00', '00:00:00', 'Online'),
(350, 9766939, 'ETIS131', 'Ishika', '2023-10-16', '18:49:05', '18:49:22', '00:00:17', 'Offline'),
(351, 6830865, 'ETIS125', 'Sakshi Sanap', '2023-10-20', '12:42:37', '15:19:09', '02:36:32', 'Offline'),
(352, 5453005, 'ETIS125', 'Sakshi Sanap', '2023-10-20', '15:19:17', '00:00:00', '00:00:00', 'Online'),
(353, 9835225, 'ETIS125', 'Sakshi Sanap', '2023-10-20', '18:12:58', '00:00:00', '00:00:00', 'Online'),
(354, 7842292, 'ETIS125', 'Sakshi Sanap', '2023-10-23', '14:18:05', '14:39:48', '00:21:43', 'Offline'),
(355, 9376383, 'ETIS125', 'Sakshi Sanap', '2023-10-23', '16:28:40', '17:06:59', '00:38:19', 'Offline'),
(356, 9629902, 'ETIS124', 'Jyoti', '2023-10-25', '10:52:05', '11:13:08', '00:21:03', 'Offline'),
(357, 5323084, 'ETIS124', 'Jyoti', '2023-10-25', '11:54:55', '12:42:41', '00:47:46', 'Offline'),
(358, 5190522, 'ETIS124', 'Jyoti', '2023-10-25', '15:22:59', '16:25:02', '01:02:03', 'Offline'),
(359, 2899351, 'ETIS124', 'Jyoti', '2023-10-25', '16:30:33', '17:12:37', '00:42:04', 'Offline'),
(360, 2817666, 'ETIS124', 'Jyoti', '2023-10-25', '18:13:38', '20:45:40', '02:32:02', 'Offline'),
(361, 5184203, 'ETIS124', 'Jyoti', '2023-10-25', '21:02:41', '21:43:13', '00:40:32', 'Offline'),
(362, 8359057, 'ETIS124', 'Jyoti', '2023-10-25', '22:03:15', '00:00:00', '00:00:00', 'Online'),
(363, 1868821, 'ETIS124', 'Jyoti', '2023-10-25', '22:40:10', '22:44:53', '00:04:43', 'Offline'),
(364, 4987642, 'ETIS124', 'Jyoti', '2023-10-25', '22:45:11', '00:00:00', '00:00:00', 'Online'),
(365, 6551384, 'ETIS124', 'Jyoti', '2023-10-27', '11:03:01', '11:24:03', '00:21:02', 'Offline'),
(366, 3248107, 'ETIS124', 'Jyoti', '2023-10-27', '14:00:11', '14:05:36', '00:05:25', 'Offline'),
(367, 9461835, 'ETIS124', 'Jyoti', '2023-10-27', '14:06:24', '14:07:03', '00:00:39', 'Offline'),
(368, 1625769, 'ETIS124', 'Jyoti', '2023-10-27', '14:07:14', '00:00:00', '00:00:00', 'Online'),
(369, 354182, 'ETIS124', 'Jyoti', '2023-10-27', '14:23:25', '00:00:00', '00:00:00', 'Online'),
(370, 4931151, 'ETIS124', 'Jyoti', '2023-10-27', '14:27:21', '14:27:53', '00:00:32', 'Offline'),
(371, 9612592, 'ETIS124', 'Jyoti', '2023-10-27', '15:31:51', '00:00:00', '00:00:00', 'Online'),
(372, 7120649, 'ETIS124', 'Jyoti', '2023-10-27', '15:41:59', '00:00:00', '00:00:00', 'Online'),
(373, 2186412, 'ETIS124', 'Jyoti', '2023-10-27', '16:24:53', '17:13:26', '00:48:33', 'Offline'),
(374, 1477750, 'ETIS124', 'Jyoti', '2023-10-28', '23:36:18', '23:57:20', '00:21:02', 'Offline'),
(375, 7331933, 'ETIS124', 'Jyoti', '2023-10-30', '11:07:59', '00:00:00', '00:00:00', 'Online'),
(376, 6839973, 'ETIS124', 'Jyoti', '2023-10-30', '14:46:42', '15:25:45', '00:39:03', 'Offline'),
(377, 1843647, 'ETIS124', 'Jyoti', '2023-10-30', '15:38:49', '15:59:52', '00:21:03', 'Offline'),
(378, 565259, 'ETIS124', 'Jyoti', '2023-10-30', '16:07:16', '16:28:19', '00:21:03', 'Offline'),
(379, 1931719, 'ETIS124', 'Jyoti', '2023-10-30', '17:22:31', '17:43:34', '00:21:03', 'Offline'),
(380, 4570791, 'ETIS124', 'Jyoti', '2023-10-30', '17:44:05', '18:06:58', '00:22:53', 'Offline'),
(381, 4587272, 'ETIS124', 'Jyoti', '2023-10-30', '18:07:35', '18:42:58', '00:35:23', 'Offline'),
(382, 2449465, 'ETIS124', 'Jyoti', '2023-10-30', '20:34:51', '22:04:25', '01:29:34', 'Offline'),
(383, 5105936, 'ETIS124', 'Jyoti', '2023-10-30', '22:49:22', '22:53:35', '00:04:13', 'Offline'),
(384, 9482375, 'ETIS908', 'AJAY', '2023-10-30', '22:54:26', '22:55:21', '00:00:55', 'Offline'),
(385, 232237, 'ETIS124', 'Jyoti', '2023-10-30', '22:58:17', '23:19:19', '00:21:02', 'Offline'),
(386, 1230526, 'ETIS124', 'Jyoti', '2023-10-30', '23:21:14', '23:42:16', '00:21:02', 'Offline'),
(387, 9565991, 'ETIS124', 'Jyoti', '2023-10-30', '23:43:26', '00:00:00', '00:00:00', 'Online'),
(388, 8454543, 'ETIS124', 'Jyoti', '2023-10-31', '10:50:23', '10:50:58', '00:00:35', 'Offline'),
(389, 8290455, 'ETIS123', 'Sachin', '2023-10-31', '10:51:10', '11:12:13', '00:21:03', 'Offline'),
(390, 9141193, 'ETIS123', 'Sachin', '2023-10-31', '11:15:20', '00:00:00', '00:00:00', 'Online'),
(391, 428813, 'ETIS124', 'Jyoti', '2023-10-31', '11:24:11', '00:00:00', '00:00:00', 'Online'),
(392, 3547167, 'ETIS124', 'Jyoti', '2023-10-31', '11:25:02', '13:05:34', '01:40:32', 'Offline'),
(393, 6365857, 'ETIS123', 'Sachin', '2023-10-31', '13:05:44', '15:50:14', '02:44:30', 'Offline'),
(394, 3351566, 'ETIS124', 'Jyoti', '2023-10-31', '16:29:28', '16:29:30', '00:00:02', 'Offline'),
(395, 7289870, 'ETIS124', 'Jyoti', '2023-10-31', '16:30:00', '17:30:05', '01:00:05', 'Offline'),
(396, 8224529, 'ETIS124', 'Jyoti', '2023-10-31', '17:30:14', '00:00:00', '00:00:00', 'Online'),
(397, 6863330, 'ETIS124', 'Jyoti', '2023-10-31', '18:50:23', '18:50:26', '00:00:03', 'Offline'),
(398, 7479462, 'ETIS124', 'Jyoti', '2023-10-31', '18:50:34', '00:00:00', '00:00:00', 'Online'),
(399, 767466, 'ETIS124', 'Jyoti', '2023-10-31', '20:16:56', '20:16:58', '00:00:02', 'Offline'),
(400, 645130, 'ETIS124', 'Jyoti', '2023-10-31', '20:17:07', '00:00:00', '00:00:00', 'Online'),
(401, 3135934, 'ETIS124', 'Jyoti', '2023-10-31', '20:59:49', '22:10:26', '01:10:37', 'Offline'),
(402, 9047883, 'ETIS124', 'Jyoti', '2023-10-31', '22:12:37', '22:41:49', '00:29:12', 'Offline'),
(403, 2525940, 'ETIS124', 'Jyoti', '2023-10-31', '22:41:58', '00:00:00', '00:00:00', 'Online'),
(404, 5565986, 'ETIS124', 'Jyoti', '2023-11-01', '10:44:01', '11:05:03', '00:21:02', 'Offline'),
(405, 4465935, 'ETIS124', 'Jyoti', '2023-11-01', '11:07:47', '00:00:00', '00:00:00', 'Online'),
(406, 2713469, 'ETIS124', 'Jyoti', '2023-11-01', '12:26:00', '12:26:02', '00:00:02', 'Offline'),
(407, 9982374, 'ETIS124', 'Jyoti', '2023-11-01', '12:26:10', '12:53:09', '00:26:59', 'Offline'),
(408, 5525495, 'ETIS124', 'Jyoti', '2023-11-01', '12:53:16', '00:00:00', '00:00:00', 'Online'),
(409, 9421221, 'ETIS123', 'Sachin', '2023-11-01', '13:10:39', '13:10:54', '00:00:15', 'Offline'),
(410, 8967513, 'ETIS124', 'Jyoti', '2023-11-01', '13:11:03', '15:23:43', '02:12:40', 'Offline'),
(411, 372306, 'ETIS124', 'Jyoti', '2023-11-01', '15:23:51', '15:29:03', '00:05:12', 'Offline'),
(412, 9393199, 'ETIS908', 'AJAY', '2023-11-01', '15:29:23', '15:48:16', '00:18:53', 'Offline'),
(413, 2594903, 'ETIS124', 'Jyoti', '2023-11-01', '15:48:25', '00:00:00', '00:00:00', 'Online'),
(414, 4220219, 'ETIS124', 'Jyoti', '2023-11-01', '16:03:42', '16:04:31', '00:00:49', 'Offline'),
(415, 906871, 'ETIS908', 'AJAY', '2023-11-01', '16:04:40', '16:11:05', '00:06:25', 'Offline'),
(416, 750721, 'ETIS124', 'Jyoti', '2023-11-01', '16:11:23', '16:14:50', '00:03:27', 'Offline'),
(417, 7781230, 'ETIS124', 'Jyoti', '2023-11-01', '16:15:00', '16:15:28', '00:00:28', 'Offline'),
(418, 9295329, 'ETIS908', 'AJAY', '2023-11-01', '16:15:38', '16:18:06', '00:02:28', 'Offline'),
(419, 3159506, 'ETIS124', 'Jyoti', '2023-11-01', '16:18:16', '16:29:51', '00:11:35', 'Offline'),
(420, 3628497, 'ETIS127', 'pallavi', '2023-11-01', '16:30:33', '16:45:08', '00:14:35', 'Offline'),
(421, 9050882, 'ETIS124', 'Jyoti', '2023-11-01', '16:45:17', '16:53:36', '00:08:19', 'Offline'),
(422, 2983989, 'ETIS123', 'Sachin', '2023-11-01', '16:53:47', '00:00:00', '00:00:00', 'Online'),
(423, 2458117, 'ETIS124', 'Jyoti', '2023-11-01', '16:55:23', '00:00:00', '00:00:00', 'Online'),
(424, 6755478, 'ETIS124', 'Jyoti', '2023-11-02', '10:53:17', '11:36:06', '00:42:49', 'Offline'),
(425, 2119309, 'ETIS908', 'AJAY', '2023-11-02', '11:36:16', '00:00:00', '00:00:00', 'Online'),
(426, 385544, 'ETIS124', 'Jyoti', '2023-11-02', '21:17:07', '21:17:10', '00:00:03', 'Offline'),
(427, 1374177, 'ETIS124', 'Jyoti', '2023-11-02', '21:17:18', '00:00:00', '00:00:00', 'Online'),
(428, 231934, 'ETIS124', 'Jyoti', '2023-11-04', '20:45:53', '00:00:00', '00:00:00', 'Online'),
(429, 2374937, 'ETIS124', 'Jyoti', '2023-11-05', '14:54:42', '00:00:00', '00:00:00', 'Online'),
(430, 6089289, 'ETIS124', 'Jyoti', '2023-11-05', '15:05:41', '15:06:08', '00:00:27', 'Offline'),
(431, 486068, 'ETIS123', 'Sachin', '2023-11-05', '15:09:49', '00:00:00', '00:00:00', 'Online'),
(432, 6213961, 'ETIS124', 'Jyoti', '2023-11-08', '00:39:00', '00:39:05', '00:00:05', 'Offline'),
(433, 1230338, 'ETIS123', 'Sachin', '2023-11-08', '00:39:19', '00:00:00', '00:00:00', 'Online'),
(434, 7581734, 'ETIS131', 'ishika', '2023-11-08', '00:45:18', '00:45:24', '00:00:06', 'Offline'),
(435, 9704792, 'ETIS131', 'ishika', '2023-11-08', '00:46:25', '00:00:00', '00:00:00', 'Online'),
(436, 2392067, 'ETIS125', 'Sakshi Sanap', '2023-11-08', '13:28:17', '14:01:43', '00:33:26', 'Offline'),
(437, 265957, 'ETIS123', 'Sachin', '2023-11-08', '15:11:17', '15:20:10', '00:08:53', 'Offline'),
(438, 1137722, 'ETIS125', 'Sakshi Sanap', '2023-11-08', '15:20:27', '00:00:00', '00:00:00', 'Online'),
(439, 1211060, 'ETIs33', 'vhv', '2023-11-09', '13:15:38', '13:23:46', '00:08:08', 'Offline'),
(440, 1611569, 'ETIs33', 'vhv', '2023-11-09', '13:25:07', '13:25:24', '00:00:17', 'Offline'),
(441, 3340880, 'ETIs33', 'vhv', '2023-11-09', '13:25:37', '13:51:23', '00:25:46', 'Offline'),
(442, 3410959, 'ETIS45', 'pooja', '2023-11-09', '14:40:34', '15:01:43', '00:21:09', 'Offline'),
(443, 9059357, 'ETIS45', 'pooja', '2023-11-09', '15:04:30', '00:00:00', '00:00:00', 'Online'),
(444, 8510088, 'ETIS125', 'Sakshi Sanap', '2023-11-09', '15:13:30', '15:34:49', '00:21:19', 'Offline'),
(445, 9595525, 'ETIS123', 'Sachin', '2023-11-09', '15:35:41', '16:05:56', '00:30:15', 'Offline'),
(446, 4017049, 'ETIS131', 'ishika', '2023-11-09', '16:07:27', '16:16:54', '00:09:27', 'Offline'),
(447, 3598386, 'ETIS125', 'Sakshi Sanap', '2023-11-09', '16:17:12', '16:44:35', '00:27:23', 'Offline'),
(448, 4819770, 'ETIS127', 'pallavi', '2023-11-09', '16:44:54', '16:49:07', '00:04:13', 'Offline'),
(449, 8889621, 'ETIS125', 'Sakshi Sanap', '2023-11-09', '16:49:30', '16:52:26', '00:02:56', 'Offline'),
(450, 2615648, 'ETIS123', 'Sachin', '2023-11-09', '16:52:37', '00:00:00', '00:00:00', 'Online'),
(451, 2487883, 'ETIS125', 'Sakshi Sanap', '2023-11-09', '17:08:04', '17:10:15', '00:02:11', 'Offline'),
(452, 2203787, 'ETIS123', 'Sachin', '2023-11-09', '17:10:28', '17:15:06', '00:04:38', 'Offline'),
(453, 8087560, 'ETIS125', 'Sakshi Sanap', '2023-11-09', '17:29:59', '00:00:00', '00:00:00', 'Online'),
(454, 5178125, 'ETIS123', 'Sachin', '2023-11-14', '15:32:34', '00:00:00', '00:00:00', 'Online'),
(455, 716688, 'ETIS123', 'Sachin', '2023-11-14', '15:42:51', '15:51:08', '00:08:17', 'Offline'),
(456, 5007634, 'ETIS124', 'Jyoti', '2023-11-14', '15:51:27', '16:41:40', '00:50:13', 'Offline'),
(457, 9822719, 'ETIS123', 'Sachin', '2023-11-15', '20:14:12', '20:48:31', '00:34:19', 'Offline'),
(458, 6400964, 'ETIS123', 'Sachin', '2023-11-15', '20:51:14', '00:00:00', '00:00:00', 'Online'),
(459, 3971731, 'ETIS123', 'Sachin', '2023-11-15', '21:44:38', '00:00:00', '00:00:00', 'Online'),
(460, 504323, 'ETIS124', 'Jyoti', '2023-11-15', '21:47:16', '00:00:00', '00:00:00', 'Online'),
(461, 9647476, 'ETIS123', 'Sachin', '2023-11-15', '22:03:35', '00:00:00', '00:00:00', 'Online'),
(462, 9405737, 'ETIS123', 'Sachin', '2023-11-16', '11:05:06', '11:10:07', '00:05:01', 'Offline'),
(463, 232516, 'ETIS127', 'pallavi', '2023-11-16', '11:10:24', '12:57:39', '01:47:15', 'Offline'),
(464, 7082110, 'ETIS123', 'Sachin', '2023-11-16', '13:00:16', '13:00:51', '00:00:35', 'Offline'),
(465, 8885696, 'ETIS127', 'pallavi', '2023-11-16', '13:01:05', '13:40:20', '00:39:15', 'Offline'),
(466, 3193065, 'ETIS127', 'pallavi', '2023-11-16', '13:47:41', '15:01:41', '01:14:00', 'Offline'),
(467, 6561286, 'ETIS123', 'Sachin', '2023-11-16', '15:12:42', '15:12:51', '00:00:09', 'Offline'),
(468, 5356119, 'ETIS127', 'pallavi', '2023-11-16', '15:13:12', '15:30:06', '00:16:54', 'Offline'),
(469, 5473624, 'ETIS123', 'Sachin', '2023-11-16', '15:30:18', '15:37:00', '00:06:42', 'Offline'),
(470, 544970, 'ETIS124', 'Jyoti', '2023-11-16', '15:37:13', '15:55:30', '00:18:17', 'Offline'),
(471, 5684493, 'ETIS125', 'Sakshi Sanap', '2023-11-16', '15:55:58', '16:01:22', '00:05:24', 'Offline'),
(472, 6552170, 'ETIS124', 'Jyoti', '2023-11-16', '16:01:40', '16:09:00', '00:07:20', 'Offline'),
(473, 5078441, 'ETIS124', 'Jyoti', '2023-11-16', '16:09:13', '16:13:23', '00:04:10', 'Offline'),
(474, 3366655, 'ETIS123', 'Sachin', '2023-11-16', '16:14:13', '00:00:00', '00:00:00', 'Online'),
(475, 857743, 'ETIS124', 'Jyoti', '2023-11-16', '16:17:20', '16:28:27', '00:11:07', 'Offline'),
(476, 6852021, 'ETIS125', 'Sakshi Sanap', '2023-11-16', '16:28:48', '16:34:14', '00:05:26', 'Offline'),
(477, 1771449, 'ETIS124', 'Jyoti', '2023-11-16', '16:34:32', '17:14:51', '00:40:19', 'Offline'),
(478, 9688344, 'ETIS123', 'Sachin', '2023-11-16', '19:50:14', '00:00:00', '00:00:00', 'Online'),
(479, 2154408, 'ETIS127', 'pallavi', '2023-11-16', '19:51:29', '00:00:00', '00:00:00', 'Online'),
(480, 1881201, 'ETIS123', 'Sachin', '2023-11-17', '10:08:03', '00:00:00', '00:00:00', 'Online'),
(481, 9902296, 'ETIS128', 'akash', '2023-12-04', '12:54:43', '13:15:47', '00:21:04', 'Offline'),
(482, 3372044, 'ETIS128', 'akash', '2023-12-04', '15:40:53', '15:41:28', '00:00:35', 'Offline'),
(483, 48282, 'ETIS128', 'akash', '2023-12-04', '23:02:33', '23:05:48', '00:03:15', 'Offline'),
(484, 1768054, 'ETIS128', 'akash', '2023-12-04', '23:16:47', '23:18:00', '00:01:13', 'Offline'),
(485, 5215535, 'ETIS128', 'akash', '2023-12-04', '23:23:20', '00:00:00', '00:00:00', 'Online'),
(486, 711856, 'ETIS125', 'Sakshi Sanap', '2023-12-05', '10:12:02', '10:15:54', '00:03:52', 'Offline'),
(487, 7332061, 'ETIS125', 'Sakshi Sanap', '2023-12-05', '10:26:59', '10:27:10', '00:00:11', 'Offline'),
(488, 1901690, 'ETIS125', 'Sakshi Sanap', '2023-12-05', '10:28:19', '10:29:26', '00:01:07', 'Offline'),
(489, 9234129, 'ETIS128', 'akash', '2023-12-05', '10:57:43', '11:00:57', '00:03:14', 'Offline'),
(490, 1860676, 'ETIS124', 'Jyoti', '2023-12-05', '11:02:06', '11:07:09', '00:05:03', 'Offline'),
(491, 342920, 'ETIS124', 'Jyoti', '2023-12-05', '11:09:17', '11:11:08', '00:01:51', 'Offline'),
(492, 3843982, 'ETIS123', 'Sachin', '2023-12-05', '11:14:05', '11:14:15', '00:00:10', 'Offline'),
(493, 2749330, 'ETIS125', 'Sakshi Sanap', '2023-12-05', '11:15:39', '00:00:00', '00:00:00', 'Online'),
(494, 8400193, 'ETIS124', 'Jyoti', '2023-12-08', '15:20:48', '00:00:00', '00:00:00', 'Online'),
(495, 5206562, 'ETIS124', 'Jyoti', '2023-12-08', '16:45:01', '00:00:00', '00:00:00', 'Online'),
(496, 2748674, 'ETIS124', 'Jyoti', '2023-12-08', '17:12:19', '00:00:00', '00:00:00', 'Online'),
(497, 754453, 'ETIS124', 'Jyoti', '2023-12-08', '17:33:31', '00:00:00', '00:00:00', 'Online'),
(498, 312875, 'ETIS124', 'Jyoti', '2023-12-11', '10:19:35', '10:41:11', '00:21:36', 'Offline'),
(499, 7910332, 'ETIS124', 'Jyoti', '2023-12-12', '12:37:46', '13:02:05', '00:24:19', 'Offline'),
(500, 3376628, 'ETIS124', 'Jyoti', '2023-12-13', '15:28:00', '00:00:00', '00:00:00', 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_task`
--
ALTER TABLE `assign_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empid` (`empid`,`accountNumber`,`bankName`,`branchName`,`ifscCode`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpr`
--
ALTER TABLE `dpr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticedpr`
--
ALTER TABLE `noticedpr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project` (`project`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_leave`
--
ALTER TABLE `user_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign_task`
--
ALTER TABLE `assign_task`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dpr`
--
ALTER TABLE `dpr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `noticedpr`
--
ALTER TABLE `noticedpr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user_leave`
--
ALTER TABLE `user_leave`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
