-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 06:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steel_connect_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `select_opt` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`id`, `name`, `email`, `message`, `phone`, `select_opt`, `created_at`) VALUES
(1, 'rohan', 'rohan@gmail.com', 'hello', '1234567890', 'DELEGATE', '2023-08-14 06:02:07'),
(3, 'ashu', 'ashu@gmail.com', 'hello', '9876543211', 'Other', '2023-08-14 06:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `img_tbl`
--

CREATE TABLE `img_tbl` (
  `id` int(11) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img_tbl`
--

INSERT INTO `img_tbl` (`id`, `img_name`, `status`, `created_at`) VALUES
(1, 'gallery_1.png', 1, '2023-08-14 06:13:01'),
(2, 'gallery_2.png', 1, '2023-08-14 06:18:41'),
(3, 'gallery_3.png', 1, '2023-08-14 06:18:47'),
(4, 'gallery_4.png', 1, '2023-08-14 06:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `speakers_tbl`
--

CREATE TABLE `speakers_tbl` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `s_img` varchar(40) NOT NULL,
  `s_position` varchar(20) NOT NULL,
  `s_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speakers_tbl`
--

INSERT INTO `speakers_tbl` (`s_id`, `s_name`, `s_img`, `s_position`, `s_status`, `created_at`) VALUES
(1, 'ABC Kumar', 'profile_1.png', 'ceo', 1, '2023-08-14 07:27:58'),
(2, 'ABC Kumar', 'profile_2.png', 'Founder', 1, '2023-08-14 07:30:07'),
(4, 'ABC Kumar', 'profile_3.png', 'Manager', 1, '2023-08-14 09:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors_tbl`
--

CREATE TABLE `sponsors_tbl` (
  `spo_id` int(11) NOT NULL,
  `spo_cat_id` int(10) NOT NULL,
  `spo_img` varchar(50) NOT NULL,
  `spo_status` tinyint(4) NOT NULL,
  `spo_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsors_tbl`
--

INSERT INTO `sponsors_tbl` (`spo_id`, `spo_cat_id`, `spo_img`, `spo_status`, `spo_created_at`) VALUES
(2, 2, 'sponsor_2.svg', 1, '2023-08-14 11:12:15'),
(3, 3, 'sponsor_3.svg', 1, '2023-08-14 11:17:09'),
(4, 4, 'sponsor_4.svg', 1, '2023-08-14 11:43:39'),
(5, 1, 'sponsor_1.svg', 1, '2023-08-14 12:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_category`
--

CREATE TABLE `sponsor_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cat_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsor_category`
--

INSERT INTO `sponsor_category` (`cat_id`, `cat_name`, `cat_status`, `created_at`) VALUES
(1, 'Platinum', 1, '2023-08-14 10:08:04'),
(2, 'Silver', 1, '2023-08-14 10:22:19'),
(3, 'Associate', 1, '2023-08-14 10:22:31'),
(4, 'Digital Partners', 1, '2023-08-14 10:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345', 1, '2023-08-14 05:29:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_tbl`
--
ALTER TABLE `img_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers_tbl`
--
ALTER TABLE `speakers_tbl`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sponsors_tbl`
--
ALTER TABLE `sponsors_tbl`
  ADD PRIMARY KEY (`spo_id`);

--
-- Indexes for table `sponsor_category`
--
ALTER TABLE `sponsor_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `img_tbl`
--
ALTER TABLE `img_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `speakers_tbl`
--
ALTER TABLE `speakers_tbl`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponsors_tbl`
--
ALTER TABLE `sponsors_tbl`
  MODIFY `spo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sponsor_category`
--
ALTER TABLE `sponsor_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;