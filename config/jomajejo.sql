-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 06:38 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jomajejo`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qnid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qnid`, `ansid`) VALUES
('657033efd2581', '657033efd380a'),
('657033efd6b58', '657033efd7373'),
('657033efda81d', '657033efdadff'),
('65703710bbb14', '65703710bc069'),
('657037a568d8d', '657037a56a1fd');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `username` varchar(50) NOT NULL,
  `q_id` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`username`, `q_id`, `score`, `level`, `correct`, `wrong`, `date`) VALUES
('lance1234', '6570370330997', 1, 1, 1, 0, '2023-12-06 14:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qnid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qnid`, `option`, `optionid`) VALUES
('657033efd2581', 'blue', '657033efd3804'),
('657033efd2581', 'red', '657033efd3808'),
('657033efd2581', 'black', '657033efd3809'),
('657033efd2581', 'white', '657033efd380a'),
('657033efd6b58', 'blue', '657033efd7373'),
('657033efd6b58', 'red', '657033efd7377'),
('657033efd6b58', 'orange', '657033efd7378'),
('657033efd6b58', 'yellow', '657033efd7379'),
('657033efda81d', 'red', '657033efdadfd'),
('657033efda81d', 'yellow', '657033efdadff'),
('657033efda81d', 'pink', '657033efdae00'),
('657033efda81d', 'black', '657033efdae01'),
('65703710bbb14', 'Yes', '65703710bc069'),
('65703710bbb14', 'no', '65703710bc06e'),
('65703710bbb14', 'maybe', '65703710bc06f'),
('65703710bbb14', 'nope', '65703710bc070'),
('657037a568d8d', '2', '657037a56a1fd'),
('657037a568d8d', '3', '657037a56a200'),
('657037a568d8d', '4', '657037a56a201'),
('657037a568d8d', '0', '657037a56a202');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` text NOT NULL,
  `qnid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `qnid`, `qns`, `choice`, `sn`) VALUES
('657033a80df1c', '657033efd2581', 'What is the color of clouds?', 4, 1),
('657033a80df1c', '657033efd6b58', 'what is the color of the sea?', 4, 2),
('657033a80df1c', '657033efda81d', 'what is the color of banana?', 4, 3),
('6570370330997', '65703710bbb14', 'Is php language?', 4, 1),
('65703798a4d26', '657037a568d8d', '1+1?', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `q_id` text NOT NULL,
  `title` varchar(225) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `tag` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`q_id`, `title`, `correct`, `wrong`, `total`, `time`, `tag`) VALUES
('657033a80df1c', 'Guess the Color!', 2, 1, 3, 5, 'color'),
('6570370330997', 'php', 1, 1, 1, 5, 'php'),
('65703798a4d26', 'Math', 100, 100, 1, 1, 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `username` varchar(225) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`username`, `score`, `time`) VALUES
('lance1234', 1, '2023-12-06 14:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` varchar(5) NOT NULL,
  `username` varchar(225) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contactnum` bigint(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address` varchar(70) NOT NULL,
  `birthdate` date NOT NULL,
  `course` varchar(10) NOT NULL,
  `yr_lvl` int(1) NOT NULL,
  `section` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `firstname`, `middlename`, `lastname`, `email`, `contactnum`, `gender`, `address`, `birthdate`, `course`, `yr_lvl`, `section`, `password`) VALUES
(1, 'admin', 'admin', '', '0', '', '', 0, '-', '0', '0000-00-00', '', 0, '', '21232f297a57a5a743894a0e4a801fc3'),
(15, 'user', 'lance1234', 'lance', 'h', 'carrido', 'lance@gmail.com', 9295929275, 'M', 'Manila', '2023-12-23', 'BSIT', 1, '303i', '2e99bf4e42962410038bc6fa4ce40d97'),
(16, 'user', 'bert', 'bert', '', 'carrids', 'bert@gmail.com', 9295929275, 'm', 'manila', '2023-12-07', 'BSIT', 3, '303i', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`,`contactnum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
