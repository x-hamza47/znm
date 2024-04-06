-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 04:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `znm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'hamza', '$2y$10$6Ymr9ewYlBuoM3sIlCnXBOozbVfUWurPWdFd9oWseu1/ypaylv.A.');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cid` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cid`, `name`, `status`) VALUES
(90, 'cid-519803', 'Event Management', 1),
(91, 'cid-062152', 'Graphic Designing', 1),
(92, 'cid-390588', 'Construction', 1),
(93, 'cid-548299', 'Web Development', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `sender_phone` varchar(25) DEFAULT '------',
  `sender_email` varchar(100) NOT NULL,
  `sender_message` text NOT NULL,
  `status` enum('unread','seen') NOT NULL DEFAULT 'unread',
  `receive_date` date DEFAULT NULL,
  `receive_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_desc` text DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `sub_category` int(10) UNSIGNED DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_id`, `project_name`, `project_desc`, `category`, `sub_category`, `location`, `status`) VALUES
(1, 'pro_id-142416', 'Testing 1', '<p>Testing 1&nbsp;</p><p>Hello there&nbsp;</p>', 'cid-548299', 5, 'karachi,Pakistan', '1'),
(2, 'pro_id-227989', 'Hamza', '<p>testing 2</p>', 'cid-519803', 1, 'ibex,karachi', '1'),
(3, 'pro_id-263886', 'noti check', '<p>notificaion checking</p>', 'cid-062152', 3, 'chekcing', '1'),
(4, 'pro_id-720433', 'dfdsf', '<p>dsfsdfsdf</p>', 'cid-062152', 3, 'dfsfdsf', '1'),
(5, 'pro_id-712702', 'fgfdg', '<p>dfgfdgdfg</p>', 'cid-519803', 2, 'fgdfgfdg', '0'),
(6, 'pro_id-243351', 'fgdfg', '<p>fgdfgdfg</p>', 'cid-519803', 2, 'dfsdf', '1'),
(7, 'pro_id-268285', 'dfgdfgfdg', 'fgdfg', 'cid-519803', 2, 'fgdfg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` varchar(100) DEFAULT NULL,
  `project_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `pid`, `project_image`) VALUES
(1, 'pro_id-142416', 'Project-766962922.jpg'),
(2, 'pro_id-142416', 'Project-2048334768.jpg'),
(3, 'pro_id-142416', 'Project-1491680052.jpg'),
(4, 'pro_id-142416', 'Project-1984714692.jpg'),
(5, 'pro_id-227989', 'Project-606303163.jpg'),
(6, 'pro_id-227989', 'Project-318705842.jpg'),
(7, 'pro_id-263886', 'Project-921517329.jpg'),
(8, 'pro_id-263886', 'Project-1875922983.jpg'),
(9, 'pro_id-263886', 'Project-2080085183.jpg'),
(10, 'pro_id-263886', 'Project-1175125392.png'),
(11, 'pro_id-720433', 'Project-2047311611.jpg'),
(12, 'pro_id-720433', 'Project-1523263869.jpg'),
(13, 'pro_id-712702', 'Project-1146617363.jpeg'),
(14, 'pro_id-712702', 'Project-1106877431.jpg'),
(15, 'pro_id-243351', 'Project-868076175.jpg'),
(16, 'pro_id-243351', 'Project-1617466069.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `status`) VALUES
(1, 'cid-519803', 'Party', 1),
(2, 'cid-519803', 'Ibex', 1),
(3, 'cid-062152', 'Logo', 1),
(4, 'cid-062152', 'Design', 1),
(5, 'cid-548299', 'Front End', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cid` (`cid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_id` (`project_id`),
  ADD KEY `category` (`category`),
  ADD KEY `sub_category` (`sub_category`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`sub_category`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
