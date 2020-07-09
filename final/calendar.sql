-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 04:22 PM
-- Server version: 8.0.19
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `userid` int NOT NULL,
  `resources` longblob,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `userid`, `resources`, `path`) VALUES
(8, 'Dinner', '#0071c5', '2016-01-12 20:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(9, 'Birthday Party', '#FFD700', '2016-01-14 07:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(10, 'Double click to change', '#008000', '2016-01-28 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(15, 'Complete-Calendar-Code', '#FF0000', '2020-06-07 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(16, 'Leetcode weekly challenge', '#008000', '2020-06-07 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(17, 'Checking the project', '#0071c5', '2020-06-10 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(18, '', '', '2020-06-11 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(19, 'CADLAB submission', '#008000', '2020-06-10 00:00:00', '0000-00-00 00:00:00', 6, NULL, NULL),
(21, 'Designing of invited projects complete', '#008000', '2020-06-08 00:00:00', '0000-00-00 00:00:00', 9, NULL, NULL),
(22, 'EED submitted', '', '2020-06-14 00:00:00', '2020-06-15 00:00:00', 6, NULL, NULL),
(25, 'meeting with Prateek', '#40E0D0', '2020-06-24 08:45:00', '2020-06-25 09:00:00', 6, NULL, NULL),
(26, 'Meeting with sir', '#FFD700', '2020-06-25 03:00:00', '2020-06-26 04:00:00', 6, NULL, NULL),
(28, 'check123', '#0071c5', '2020-06-16 00:00:00', '2020-06-17 00:00:00', 6, NULL, NULL),
(29, 'check 234', '#40E0D0', '2020-06-16 00:00:00', '2020-06-17 00:00:00', 6, NULL, NULL),
(30, 'check image', '#0071c5', '2020-06-17 00:00:00', '2020-06-18 00:00:00', 6, '', './uploads/'),
(31, 'check including image', '#FF0000', '2020-06-17 00:00:00', '2020-06-18 00:00:00', 6, '', './uploads/'),
(32, 'hu', '#008000', '2020-06-22 00:00:00', '2020-06-23 00:00:00', 6, '', './uploads/'),
(33, 'insert image', '#40E0D0', '2020-06-19 01:00:00', '2020-06-20 02:00:00', 6, '', './uploads/'),
(34, 'chak', '#0071c5', '2020-06-19 00:00:00', '2020-06-20 00:00:00', 6, '', './uploads/'),
(35, 'Results day', '#0071c5', '2020-06-11 00:00:00', '2020-06-12 00:00:00', 6, '', './uploads/'),
(38, 'working', '#FFD700', '2020-06-27 00:00:00', '2020-06-28 00:00:00', 6, 0x494d472d32303139303730332d5741303031362e6a7067, './uploads/IMG-20190703-WA0016.jpg'),
(39, 'working-2', '#FF8C00', '2020-06-09 00:00:00', '2020-06-10 00:00:00', 6, 0x494d472d32303139303933302d5741303032312e6a7067, './uploads/IMG-20190930-WA0021.jpg'),
(40, 'hey', '', '2020-06-13 00:00:00', '2020-06-14 00:00:00', 6, '', './uploads/'),
(42, '', '', '2020-06-15 05:00:00', '2020-06-16 00:00:00', 6, '', './uploads/'),
(43, 'wefgwg', '#008000', '2020-06-08 17:00:00', '2020-06-09 00:00:00', 6, '', './uploads/'),
(44, 'wefefeqfqefgq', '', '2020-06-01 00:00:00', '2020-06-02 00:00:00', 6, '', './uploads/'),
(45, 'Connecting links', NULL, '2020-06-28 20:00:00', '2020-06-02 00:00:00', 6, NULL, NULL),
(46, 'upcoming meeting', '#0071c5', '2020-06-30 00:00:00', '2020-07-01 00:00:00', 6, '', './uploads/'),
(47, 'Meeting with sir', '#008000', '2020-07-07 00:00:00', '2020-07-08 00:00:00', 6, '', './uploads/'),
(48, 'Meeting', '#008000', '2020-07-07 00:00:00', '2020-07-08 00:00:00', 22, '', './uploads/'),
(49, 'Workshop', '', '2020-07-17 00:00:00', '2020-07-18 00:00:00', 22, '', './uploads/'),
(50, 'project submission', '#FF8C00', '2020-07-21 00:00:00', '2020-07-22 00:00:00', 22, '', './uploads/'),
(51, 'assignment submission', '', '2020-07-21 00:00:00', '2020-07-22 00:00:00', 22, '', './uploads/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
