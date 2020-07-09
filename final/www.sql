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
-- Database: `www`
--

-- --------------------------------------------------------

--
-- Table structure for table `addinventory`
--

CREATE TABLE `addinventory` (
  `id` int NOT NULL,
  `projectid` int DEFAULT NULL,
  `inventorytype` varchar(255) NOT NULL,
  `inventoryname` varchar(255) NOT NULL,
  `inventorydesc` text NOT NULL,
  `inventoryid` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addinventory`
--

INSERT INTO `addinventory` (`id`, `projectid`, `inventorytype`, `inventoryname`, `inventorydesc`, `inventoryid`, `manufacturer`, `userid`) VALUES
(1, 22, 'Equipment', 'Theodelite', 'Surveying Lab Equipment', '0', '', 0),
(3, 23, 'Consumables', 'Theodelite', 'asd', '0', '', 0),
(4, 22, 'Equipment', 'Compass', 'For surveying', '0', '', 0),
(5, 20, 'Consumables', 'DC Motor', 'For Autonomous vehicle manufacturing.', '18ar10037', 'Agrawal Motors', 0),
(8, NULL, 'Equipment', 'check', 'check', 'check', 'check', 6),
(9, 24, 'Consumables', 'something', '..', 'some', 'thing', 6);

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int NOT NULL,
  `projectid` int NOT NULL,
  `post` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `projectid`, `post`, `username`, `userid`) VALUES
(4, 19, 'lab', 'abe', 0),
(5, 19, 'mentor', 'prateek', 0),
(6, 19, 'mentor', 'anushka', 0),
(12, 20, 'lab', 'prateek', 0),
(13, 20, 'lab', 'abe', 0),
(14, 20, 'mentor', 'abe', 0),
(16, 20, 'mentor', 'prateek', 0),
(24, 23, 'Lab-Incharge', 'abe', 0),
(25, 23, 'Mentor', 'abe', 0),
(26, 23, 'Collaborator', 'prateek', 0),
(28, 23, 'Mentor', 'anushka', 0),
(29, 23, 'lab incharge', 'prateek', 0),
(30, 13, 'Collaborator', 'vaibhav', 0),
(31, 22, 'Team-Member', 'anushka', 0),
(37, 24, 'Team-Member', 'new', 0),
(38, 24, 'Mentor', 'prateek', 6),
(39, 14, 'Collaborator', 'abe', 9),
(40, 14, 'Mentor', 'vaibhav', 9),
(41, 22, 'Team-Member', 'prateek', 6),
(42, 26, 'Team-Member', 'prateek', 6),
(43, 26, 'No Post Assigned', 'new', 6),
(44, 26, 'Mentor', 'anushka', 6);

-- --------------------------------------------------------

--
-- Table structure for table `assigninventory`
--

CREATE TABLE `assigninventory` (
  `id` int NOT NULL,
  `projectid` int NOT NULL,
  `inventoryname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assigninventory`
--

INSERT INTO `assigninventory` (`id`, `projectid`, `inventoryname`, `username`) VALUES
(4, 22, 'Theodelite', 'prateek'),
(5, 22, 'Theodelite', 'anushka');

-- --------------------------------------------------------

--
-- Table structure for table `assigntask`
--

CREATE TABLE `assigntask` (
  `id` int NOT NULL,
  `projectid` int NOT NULL,
  `assigntaskname` varchar(255) NOT NULL,
  `assigntasktype` varchar(255) NOT NULL,
  `assigntasklastdate` date NOT NULL,
  `assigntaskdesc` text NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assigntask`
--

INSERT INTO `assigntask` (`id`, `projectid`, `assigntaskname`, `assigntasktype`, `assigntasklastdate`, `assigntaskdesc`, `username`) VALUES
(7, 23, 'Assigned_task_table', 'projectrelatedtask', '0000-00-00', 'Now the assigned task table has been updated', 'prateek'),
(8, 22, 'inventories', 'projectrelatedtask', '0000-00-00', 'improve inventories', 'prateek'),
(9, 22, 'Complete', 'projectrelatedtask', '0000-00-00', 'checking to display assigned task', 'prateek'),
(12, 22, 'timepass', 'projectrelatedtask', '2020-05-21', 'dff', 'anushka');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int NOT NULL,
  `to_user_id` int DEFAULT NULL,
  `from_user_id` int NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `status`) VALUES
(1, 9, 6, 'hey', 0),
(2, 19, 6, 'How You Doin\'', 1),
(3, 6, 9, 'Nice to meet you', 0),
(4, 9, 6, 'yo', 0),
(5, 6, 9, '😁', 0),
(6, 9, 6, 'yo', 0),
(8, NULL, 6, 'hey', 1),
(9, NULL, 6, 'hye', 1),
(10, NULL, 6, 'hey', 1),
(11, 0, 6, 'hey', 1),
(12, NULL, 6, 'how you doin\'', 1),
(13, NULL, 9, 'Nothing, just macha raha', 1),
(14, NULL, 9, '<p><img width=\"200\" height=\"160\" class=\"img-thumbnail\" src=\"upload/IMG_20190814_001050.jpg\"></p><br>', 1),
(15, NULL, 6, 'once again hello<div><br></div>', 1),
(16, 38, 6, 'hey', 1),
(17, 38, 6, 'yaar there is a problem', 1),
(18, 30, 6, 'hey', 1),
(19, 9, 6, 'heelo how are you', 0),
(20, NULL, 6, 'hey how you doing\'', 1),
(21, 6, 9, 'hey', 0),
(22, 9, 6, 'nice fellas', 0),
(23, 9, 6, 'cool', 0),
(24, NULL, 6, 'yo guys tempo se<div><br></div>', 1),
(25, NULL, 6, 'available????', 1),
(26, 34, 6, 'heyyy', 1),
(27, 6, 9, 'kya user basis pe chat kaam kar rha?', 0),
(28, 31, 6, 'jojo', 1),
(29, 4, 6, 'hey', 1),
(30, 9, 6, 'hello', 1),
(31, 9, 6, 'hope it works better', 2),
(32, 9, 6, 'how you doin\'', 1),
(33, NULL, 6, 'tempo se junta<div><br></div>', 1),
(34, NULL, 6, 'group-thread_chat', 1),
(35, NULL, 6, 'tjh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `createcalendarentries`
--

CREATE TABLE `createcalendarentries` (
  `id` int NOT NULL,
  `calendarentryname` varchar(255) NOT NULL,
  `calendarentrytype` varchar(255) NOT NULL,
  `calendarentrylastdate` date NOT NULL,
  `calendarentrydesc` text NOT NULL,
  `calendarentrydate` date NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `createcalendarentries`
--

INSERT INTO `createcalendarentries` (`id`, `calendarentryname`, `calendarentrytype`, `calendarentrylastdate`, `calendarentrydesc`, `calendarentrydate`, `userid`) VALUES
(1, 'new-entry', 'reminders', '2020-04-30', 'last day for invite system', '2020-04-30', 6),
(2, 'entry for assign submit btn', 'deadlines', '2020-05-09', 'Debug the submit btn error', '2020-05-09', 6),
(3, 'Shows red when date passes', 'deadlines', '2020-05-30', 'To check if it shows red color on time elapse', '2020-05-29', 6);

-- --------------------------------------------------------

--
-- Table structure for table `createtasks`
--

CREATE TABLE `createtasks` (
  `id` int NOT NULL,
  `taskname` varchar(255) NOT NULL,
  `tasktype` varchar(255) NOT NULL,
  `tasklastdate` date NOT NULL,
  `taskdesc` text NOT NULL,
  `taskdate` date NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `createtasks`
--

INSERT INTO `createtasks` (`id`, `taskname`, `tasktype`, `tasklastdate`, `taskdesc`, `taskdate`, `userid`) VALUES
(2, 'finish invite integration', 'projectrelatedtask', '2020-05-01', 'User would be able to send invite requests for a particular project', '2020-04-30', 6);

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int NOT NULL,
  `threadname` varchar(255) NOT NULL,
  `threaddesc` text NOT NULL,
  `from_user_id` int NOT NULL,
  `chat_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `timestamp` timestamp NOT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `threadname`, `threaddesc`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 'hey', 'is it working?', 6, NULL, '2020-07-04 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fixmeeting`
--

CREATE TABLE `fixmeeting` (
  `id` int NOT NULL,
  `projectid` int NOT NULL,
  `meetingtitle` varchar(255) NOT NULL,
  `meetingdatetime` datetime NOT NULL,
  `meetingdesc` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `setter` varchar(255) NOT NULL,
  `mom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fixmeeting`
--

INSERT INTO `fixmeeting` (`id`, `projectid`, `meetingtitle`, `meetingdatetime`, `meetingdesc`, `username`, `setter`, `mom`) VALUES
(4, 19, 'Adding new features to meeting', '2020-06-27 17:15:00', 'We will see whether fixing meeting from my side fixes it on your side also or not..', 'prateek', '', NULL),
(5, 19, 'Checking settername status', '2020-06-27 20:23:00', 'Check if the settername works.', 'anushka', 'prateek', NULL),
(6, 22, 'Connectink links', '2020-06-28 17:00:00', 'Checking if I fix a meeting here, then will it automatically be set to calendar or not?', 'prateek', 'vaibhav', NULL),
(8, 26, 'Connecting links', '2020-06-28 18:05:00', 'check if it works', 'prateek', 'vaibhav', NULL),
(9, 26, 'Connecting links', '2020-06-28 20:00:00', 'Check if this is linked with the calendar.', 'anushka', 'vaibhav', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `sender_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `project_id`, `sender_id`) VALUES
(1, 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `inviterequest`
--

CREATE TABLE `inviterequest` (
  `id` int NOT NULL,
  `projectid` int NOT NULL,
  `receivername` varchar(255) NOT NULL,
  `curstatus` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inviterequest`
--

INSERT INTO `inviterequest` (`id`, `projectid`, `receivername`, `curstatus`, `userid`) VALUES
(6, 19, 'prateek', 1, 6),
(7, 14, 'vaibhav', 1, 9),
(8, 22, 'prateek', 1, 6),
(9, 19, 'anushka', 1, 6),
(10, 22, 'anushka', 1, 6),
(11, 20, 'prateek', 1, 6),
(12, 24, 'new', 1, 6),
(13, 24, 'prateek', 1, 6),
(14, 14, 'abe', 1, 9),
(15, 26, 'prateek', 1, 6),
(16, 26, 'new', 1, 6),
(17, 26, 'anushka', 1, 6),
(18, 19, 'User', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int NOT NULL,
  `id` int NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projectexpenses`
--

CREATE TABLE `projectexpenses` (
  `id` int NOT NULL,
  `projectid` int NOT NULL,
  `expensetype` varchar(255) NOT NULL,
  `purchasedate` date NOT NULL,
  `billamount` int NOT NULL,
  `resources` longblob NOT NULL,
  `path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projectexpenses`
--

INSERT INTO `projectexpenses` (`id`, `projectid`, `expensetype`, `purchasedate`, `billamount`, `resources`, `path`) VALUES
(2, 22, 'Software Purchase', '2020-05-16', 500, 0x323031392d30332d31352d32332d34302d35342d3632322e6a7067, ''),
(3, 22, 'Inventory Purchase', '2020-05-08', 2, '', './uploads/'),
(4, 22, 'Inventory Purchase', '2020-05-08', 2, '', './uploads/'),
(5, 22, 'Inventory Purchase', '2020-05-15', 5, '', './uploads/'),
(6, 22, 'Inventory Purchase', '2020-05-15', 5, '', './uploads/'),
(7, 22, 'Inventory Purchase', '2020-05-02', 200, '', './uploads/'),
(8, 22, 'Others', '2020-05-02', 20000, '', './uploads/'),
(9, 22, 'Travel Expenses', '2020-05-15', 1500, '', './uploads/'),
(10, 22, 'Inventory Purchase', '2020-05-23', 32, '', './img/'),
(11, 22, 'Inventory Purchase', '2020-05-09', 213, 0x494d472d32303139303731392d5741303030342e6a7067, './img/IMG-20190719-WA0004.jpg'),
(12, 22, 'Software Purchase', '2020-05-15', 150000, 0x494d472d32303139303632352d5741303033342e6a7067, './uploads/IMG-20190625-WA0034.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `projectname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `projecttype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `projectdesc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `projectdate` date DEFAULT NULL,
  `userid` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectname`, `projecttype`, `projectdesc`, `projectdate`, `userid`) VALUES
(13, 'spark project', 'internship', 'to build a dbms', '2020-04-26', 9),
(14, 'SIH', 'misc', 'detect deep fake', '2020-04-26', 9),
(19, 'Research Project', 'internship', 'Made project details form', '2020-05-05', 6),
(20, 'Intern Project', 'internship', 'Working on share', '2020-05-06', 6),
(22, 'dbms', 'sponsored', 'DBMS Research Project', '2020-05-08', 6),
(26, 'Practice', 'btp', 'checking every functionality', '2020-05-21', 6),
(27, 'Project Management System', 'internship', 'This project sets up a Project management system using technologies like PHP and MySQL', '2020-07-07', 22);

-- --------------------------------------------------------

--
-- Table structure for table `recyclebin`
--

CREATE TABLE `recyclebin` (
  `id` int NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `projecttype` varchar(255) NOT NULL,
  `projectdesc` text NOT NULL,
  `projectdate` date NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `resources` longblob NOT NULL,
  `resourcedesc` text,
  `path` varchar(500) NOT NULL,
  `projectid` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `projectname`, `resources`, `resourcedesc`, `path`, `projectid`, `userid`) VALUES
(35, 'Intern Project', 0x46425f494d475f313534393231323438343932342e6a7067, 'image1', './uploads/FB_IMG_1549212484924.jpg', 19, 0),
(36, 'Research Project', 0x61626d6320706f7374206d6964732e706466, 'pdf1', './uploads/abmc post mids.pdf', 6, 0),
(37, 'Intern Project', 0x6c6f772d636f73742d6275696c64696e672d322e706466, 'BC shhet', './uploads/low-cost-building-2.pdf', 6, 0),
(38, 'Research Project', 0x5459504553204f462053434146464f4c44494e472e706466, 'BC sheet new', './uploads/TYPES OF SCAFFOLDING.pdf', 6, 0),
(39, 'Intern Project', 0x32302d4d6f64656c2e706466, 'pdf', './uploads/20-Model.pdf', 6, 0),
(40, 'Intern Project', 0x5459504553204f462053484f52494e472e706466, 'types of shoring', './uploads/TYPES OF SHORING.pdf', 6, 0),
(41, 'dbms', 0x46425f494d475f313534393231323531313137352e6a7067, 'yo', './uploads/FB_IMG_1549212511175.jpg', 22, 0),
(42, 'Intern Project', 0x46425f494d475f313537353433393734393533382e6a7067, 'check', './uploads/FB_IMG_1575439749538.jpg', 20, 0),
(43, 'Intern Project', 0x5459504553204f462053434146464f4c44494e472e706466, 'checking', './uploads/TYPES OF SCAFFOLDING.pdf', 20, 0),
(44, 'hello', 0x46425f494d475f313537353434303033323131392e6a7067, 'Fight corona in field trip', './uploads/FB_IMG_1575440032119.jpg', 23, 0),
(45, 'dbms', 0x46425f494d475f313537353433393837333730312e6a7067, 'field trip ka dance', './uploads/FB_IMG_1575439873701.jpg', 22, 0),
(47, 'dbms', 0x494d472d32303139303632372d5741303030332e6a7067, 'dbms k liye', './uploads/IMG-20190627-WA0003.jpg', 22, 0),
(48, 'Research Project', 0x494d472d32303139313032372d5741303031322e6a7067, 'checking userid', './uploads/IMG-20191027-WA0012.jpg', 19, 6),
(49, 'Intern Project', 0x494d472d32303139303632352d5741303032372e6a7067, '', './uploads/IMG-20190625-WA0027.jpg', 20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `confirm` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirm`) VALUES
(6, 'vaibhav', 'abc@gmail.com', '$2y$10$oVBLdUH0FHlWgJcFKgRoIeub/vlrW.IJ5j.q9Bj4GPZKIrFzAT3Ua', '$2y$10$vIFqV4dfuzrVOz25OUPmJ.jzCkt2YEDq22LU0psBwDV7jgkvRFXQO'),
(9, 'prateek', 'prateek@gmail.com', '$2y$10$Dz9YYo7AufOJnJRgy/Xft.ChkDAnhLEmI7sU0oBWzed3ZouJQ9R9S', '$2y$10$txoMRYRAS0itK1.r7/Bdm.f2NUPPN.11E0y2tFDgf0U5krUkqkk5m'),
(10, 'abe', 'abe@gmail.com', '$2y$10$qI2eBoTGPUQ.jEtX5jedsupDw6WD.KwlnXUNLk94Yh1CsJh0EIaEK', '$2y$10$qGEamovPM4VQJkLC2ogwyORTTbARWUAsBmhwMgVySYvJx4BSEXhLy'),
(19, 'anushka', 'vaibhavkumarsingh139@gmail.com', '$2y$10$tLtufxmESF1CvG/DlCD9Med78ml2fdolJbPxXoAHAK27I8iNjmzmi', '$2y$10$TJtqC952BvlELD3CKx5b5OaCuEpOsBypmNjZbXh/So677yznPnW5e'),
(20, 'new', 'new@gmail.com', '$2y$10$Nz9U8MZ4wIhssW5vhtNuzeK5HSdkgzKVDUSvTGBZLEjZOXOnpNb5i', '$2y$10$9G/K08hFGbQj88qUvwpOV.avzxPvUt1poiW3JUBVReQaf3Z2iW3cG'),
(21, 'vks', 'vks@gmail.com', '$2y$10$Jfz9hNs9vUERisER.zokEOtFfeaFe79C1IRi1q2Gbbo3Y6q1lZBMK', '$2y$10$Fklf8ySqHU5gZJ8.VTINWO6LHBIzaaNOnIbCpFrrQb3PyFbwQq7e.'),
(22, 'User', 'user@gmail.com', '$2y$10$XdD.alrn/M1lT3SgYgLVFuCT/t5Kx0mxdCgnCAtFCcP.hE1AK8gu6', '$2y$10$QDFFpupKWjMA7Lckdj9/KOvRc0ij.0vRrpTMAc5Q2f.0/xa6Mbn56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addinventory`
--
ALTER TABLE `addinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigninventory`
--
ALTER TABLE `assigninventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigntask`
--
ALTER TABLE `assigntask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `createcalendarentries`
--
ALTER TABLE `createcalendarentries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `createtasks`
--
ALTER TABLE `createtasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixmeeting`
--
ALTER TABLE `fixmeeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_one` (`project_id`,`sender_id`);

--
-- Indexes for table `inviterequest`
--
ALTER TABLE `inviterequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `projectexpenses`
--
ALTER TABLE `projectexpenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `projectname` (`projectname`);

--
-- Indexes for table `recyclebin`
--
ALTER TABLE `recyclebin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addinventory`
--
ALTER TABLE `addinventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `assigninventory`
--
ALTER TABLE `assigninventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assigntask`
--
ALTER TABLE `assigntask`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `createcalendarentries`
--
ALTER TABLE `createcalendarentries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `createtasks`
--
ALTER TABLE `createtasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fixmeeting`
--
ALTER TABLE `fixmeeting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inviterequest`
--
ALTER TABLE `inviterequest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectexpenses`
--
ALTER TABLE `projectexpenses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `recyclebin`
--
ALTER TABLE `recyclebin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
