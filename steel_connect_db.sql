-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 01:21 PM
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
-- Database: `steel_connect_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brochure_tbl`
--

CREATE TABLE `brochure_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brochure_tbl`
--

INSERT INTO `brochure_tbl` (`id`, `name`, `status`, `created_at`) VALUES
(4, 'Advanced CSS.pdf', 1, '2023-08-28 10:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_ticket_tbl`
--

CREATE TABLE `confirm_ticket_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tic_name` varchar(20) NOT NULL,
  `tic_price` int(12) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `tic_number` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirm_ticket_tbl`
--

INSERT INTO `confirm_ticket_tbl` (`id`, `name`, `mobile`, `email`, `tic_name`, `tic_price`, `payment_status`, `payment_id`, `tic_number`, `created_at`) VALUES
(1, 'ABC Kumar', '1234567890', 'tejpratap.digitalshakha@gmail.com', '', 7079, 'complete', 'pay_MYjlIvD4eKuPT7', 3813, '2023-09-05 17:30:06'),
(2, 'ashutosh', '1234567890', 'guptaashutosh957@gmail.com', '', 58999, 'complete', 'pay_MYvyMxrm7eME14', 2346, '2023-09-06 05:26:58'),
(3, 'ashutosh', '8765432123', 'guptaashutosh957@gmail.com', '', 58999, 'complete', 'pay_MYw1grgkQX2wBV', 2346, '2023-09-06 05:30:03'),
(4, 'ashutosh Gupta', '1234567890', 'guptaaashutosh957@gmail.com', '', 58999, 'complete', 'pay_MYw3h8E6BjD8W7', 2346, '2023-09-06 05:32:00'),
(5, 'EARLY DELEGATE', '1234567890', 'tpsahu0711@gmail.com', '', 58999, 'complete', 'pay_MYw6E739vY4KL1', 2346, '2023-09-06 05:34:22'),
(6, 'ABC Kumar', '1234567890', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MYwBEnA4Q9vcw6', 3290, '2023-09-06 05:39:05'),
(7, 'ashutosh', '1234567890', 'guptaaashutosh957@gmail.com', '', 58999, 'complete', 'pay_MYwCTklzcffHNb', 1476, '2023-09-06 05:40:18'),
(8, 'ABC Kumar', '8765432123', 'aashutosh.digitalshakha@gmail.com', '', 58999, 'complete', 'pay_MYwG2gxdbkC7Cn', 2017, '2023-09-06 05:43:41'),
(9, 'test id', '1234567890', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MYwRIa1PTf81Oo', 4117, '2023-09-06 05:53:51'),
(10, 'aashutosh test id', '9644477950', 'aashutosh.digitalshakha@gmail.com', '', 58999, 'complete', 'pay_MYwVj92eO6LzxZ', 3654, '2023-09-06 05:58:27'),
(11, 'Saurabh Test Id', '9691699563', 'saurabhdeshmukh.pro@gmail.com', '', 58999, 'complete', 'pay_MYzCKdqdP1Iz8h', 3216, '2023-09-06 08:35:17'),
(12, 'ABC Kumar', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZ04GURcDvGZJL', 2853, '2023-09-06 09:27:17'),
(13, 'EARLY DELEGATE', '1234567890', 'abc@gmail.com', '', 7079, 'complete', 'pay_MZ0DYqVIjxWECc', 1000, '2023-09-06 09:35:56'),
(14, 'ABC Kumar', '8765432123', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ0K3mj4IsZlGP', 1000, '2023-09-06 09:42:11'),
(15, 'EARLY DELEGATE', '1234567890', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ0Mk7TmhHlEVm', 1000, '2023-09-06 09:44:45'),
(16, 'ABC Kumar', '1234567890', 'tejpratapsahu00@gmail.com', '', 7079, 'complete', 'pay_MZ0OhL7sDFEqT9', 1000, '2023-09-06 09:46:34'),
(17, 'ABC Kumar', '1234567890', 'abc@gmail.com', '', 7079, 'complete', 'pay_MZ0TLA7TjicqcZ', 1000, '2023-09-06 09:51:01'),
(18, 'rohan', '8765432123', 'admin@gmail.com', '', 7079, 'complete', 'pay_MZ0W5XET92Cp31', 1000, '2023-09-06 09:53:32'),
(19, 'EARLY DELEGATE', '8765432123', 'abc@gmail.com', '', 7079, 'complete', 'pay_MZ0Z48uu8ZFCFU', 1000, '2023-09-06 09:56:26'),
(20, 'EARLY DELEGATE', '1234567890', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ0bTfyn33bLXn', 1000, '2023-09-06 09:58:43'),
(21, 'ABC Kumar', '1234567890', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ0cWXk1pHzt2W', 1000, '2023-09-06 09:59:39'),
(22, 'EARLY DELEGATE', '8765432123', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ0igxA7YVVvKf', 1000, '2023-09-06 10:05:34'),
(23, 'ABC Kumar', '8765432123', 'rohan@gmail.com', '', 7079, 'complete', 'pay_MZ16mZEFvYthKb', 1000, '2023-09-06 10:28:20'),
(24, 'ABC Kumar', '8765432123', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ1vhLhh3WTvas', 1000, '2023-09-06 11:16:35'),
(25, 'rohan', '8765432123', 'abc@gmail.com', '', 7079, 'complete', 'pay_MZ1yeWrbxMPImK', 1000, '2023-09-06 11:19:22'),
(26, 'ABC Kumar', '8765432123', 'tejpratapsahu00@gmail.com', '', 7079, 'complete', 'pay_MZ21O4r6qF0nEp', 1000, '2023-09-06 11:21:55'),
(27, 'EARLY DELEGATE', '8765432123', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ28AZOT8Jxpv7', 1000, '2023-09-06 11:28:22'),
(28, 'ABC Kumar', '8765432123', 'new@gmail.com', '', 7079, 'complete', 'pay_MZ2Yqv02wIr1q2', 1000, '2023-09-06 11:53:37'),
(29, 'ABC Kumar', '1234567890', 'abc@gmail.com', '', 7079, 'complete', 'pay_MZ2ZqLc3qAdvvY', 1000, '2023-09-06 11:54:34'),
(30, 'ABC ', '8765432123', 'abc@gmail.com', '', 7079, 'complete', 'pay_MZ2dyOj7yaVRFs', 1000, '2023-09-06 11:58:29'),
(31, 'EARLY DELEGATE', '8765432123', 'abc@gmail.com', '', 7079, 'complete', 'pay_MZ2fFzfZlq64ex', 1000, '2023-09-06 11:59:39'),
(32, 'ABC Kumar', '1234567890', 'new@gmail.com', '', 7079, 'complete', 'pay_MZ2jbssTeTI9Ii', 1000, '2023-09-06 12:03:50'),
(33, 'ABC Kumar', '8765432123', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ2l0AlWNV04q9', 1000, '2023-09-06 12:05:09'),
(34, 'EARLY DELEGATE', '8765432123', 'admin@gmail.com', '', 7079, 'complete', 'pay_MZ2m9Ua2s7LJHr', 1000, '2023-09-06 12:06:14'),
(35, 'ABC Kumar', '8765432123', 'new@gmail.com', '', 7079, 'complete', 'pay_MZ2nIKyzfdyUre', 1000, '2023-09-06 12:07:05'),
(36, 'ABC Kumar', '8765432123', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ2qyyxFUIuag6', 1000, '2023-09-06 12:10:49'),
(37, 'EARLY DELEGATE', '8765432123', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ2uDSXGmAOlvQ', 1000, '2023-09-06 12:13:50'),
(38, 'rohan', '8765432123', 'ashu@gmail.com', '', 7079, 'complete', 'pay_MZ2xD3g4xi5s8E', 1000, '2023-09-06 12:16:42'),
(39, 'ABC ', '1234567890', 'abc@gmail.com', '', 7079, 'complete', 'pay_MZ37LMWwLbf2Fv', 1000, '2023-09-06 12:26:14'),
(40, 'tejpratap test id', '6260131302', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZk99D5wZWCKWE', 7462, '2023-09-08 06:31:35'),
(41, 'ABC ', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZkRJ03phQkbFy', 7462, '2023-09-08 06:48:46'),
(42, 'ABC Kumar', '8765432123', 'rohan@gmail.com', '', 58999, 'Pending', '', 2252, '2023-09-08 06:52:05'),
(43, 'ABC ', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZkUmppdTAtw6a', 2252, '2023-09-08 06:52:16'),
(44, 'ABC Kumar', '8765432123', 'tejpratapsahu00@gmail.com', '', 8259, 'complete', 'pay_MZm9EF6arSEoAK', 4162, '2023-09-08 08:29:18'),
(45, 'rohan', '6260131302', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZmD2dgzn9t7Qh', 8672, '2023-09-08 08:32:49'),
(46, 'Ashu ', '8976543567', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZmGA4zIdeTEZf', 8672, '2023-09-08 08:35:49'),
(47, 'rohan', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZmJDG9me1Hv01', 8672, '2023-09-08 08:38:42'),
(48, 'EARLY DELEGATE', '1234567890', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZmXY8xoqej8u0', 8672, '2023-09-08 08:52:20'),
(49, 'rohan', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZmb89mm1ItXvF', 8672, '2023-09-08 08:55:41'),
(50, 'rohan', '1234567890', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZnJuz6VTopMyS', 8672, '2023-09-08 09:38:08'),
(51, 'EARLY DELEGATE', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZnNefyUXvxgUM', 8672, '2023-09-08 09:41:42'),
(52, 'rohan', '6260131302', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZnWxaqWTkQvfr', 8672, '2023-09-08 09:50:28'),
(53, 'ABC Kumar', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZnccQmVFXdkxf', 8672, '2023-09-08 09:55:49'),
(54, 'rohan', '1234567890', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZne4AHCok9U82', 8672, '2023-09-08 09:57:07'),
(55, 'ABC Kumar', '1234567890', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZoGcHKI1BPa22', 8672, '2023-09-08 10:33:38'),
(56, 'rohan', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZoMyXPTxipkeY', 8672, '2023-09-08 10:39:41'),
(57, 'new', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZoQQxjw9DvFXS', 8672, '2023-09-08 10:42:49'),
(58, 'rohan', '8765432123', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZoS4MumB3AeKH', 8672, '2023-09-08 10:44:32'),
(59, 'rohan', '1234567890', 'tejpratapsahu00@gmail.com', '', 58999, 'complete', 'pay_MZoTZquiWOtdQM', 8672, '2023-09-08 10:45:54'),
(60, 'Bhoj Kumar Test ID', '1234567890', 'bhojkumar.digitalshakha@gmail.com', '', 58999, 'complete', 'pay_MZoXSjL8jXrioG', 6056, '2023-09-08 10:49:11'),
(61, 'rohan test id', '8765432123', 'tejpratapsahu00@gmail.com', 'EXHIBITION', 58999, 'complete', 'pay_MZp0YPsjNF2feA', 4414, '2023-09-08 11:17:00');

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
  `address` varchar(100) NOT NULL,
  `select_opt` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`id`, `name`, `email`, `message`, `phone`, `address`, `select_opt`, `created_at`) VALUES
(1, 'rohan', 'rohan@gmail.com', 'hello', '1234567890', '', 'DELEGATE', '2023-08-14 06:02:07'),
(3, 'ashu', 'ashu@gmail.com', 'hello', '9876543211', '', 'Other', '2023-08-14 06:05:38'),
(5, 'ABC Kumar', 'abc@gmail.com', 'hello', '1234567890', '', 'EXHIBITION', '2023-08-18 04:33:49'),
(6, 'ABC ', 'ashu@gmail.com', 'hello', '1234567890', '', 'EXHIBITION', '2023-08-18 13:26:25'),
(7, 'navinn', 'rohan@gmail.com', 'cscss', '1234567890', 'bhillai ,25 ,street 5 x', 'DELEGATE', '2023-08-19 08:50:38'),
(8, 'ABC Kumar', 'abc@gmail.com', 'ghcgthbbh jnhjgfghtgh', '9876543211', 'bhillai ,25 ,streeytdfzsdxgchvh buygv8765456tfyv ', 'DELEGATE', '2023-08-19 08:54:43'),
(9, 'home contact', 'home@gmail.com', 'new contact add  at hi=ome page', '0987890987', 'bhillai ,25 ,sdksdmlkmd kdnsjkdnl.dmsskdm,,imdksmdlkmdkldkdm', 'EXHIBITION', '2023-08-29 05:30:55'),
(10, 'contact page', 'new@gmail.com', 'dsdsdssssxdsd', '0987654323', 'bhillai ,25 ,street 5 x', 'Other', '2023-08-29 05:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `delegate_tbl`
--

CREATE TABLE `delegate_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delegate_tbl`
--

INSERT INTO `delegate_tbl` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'Advanced CSS.pdf', 1, '2023-08-28 10:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `img_tbl`
--

CREATE TABLE `img_tbl` (
  `id` int(11) NOT NULL,
  `exhibitor_name` varchar(30) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img_tbl`
--

INSERT INTO `img_tbl` (`id`, `exhibitor_name`, `img_name`, `status`, `created_at`) VALUES
(6, 'ABC ', 'gallery_img_1.jpg', 1, '2023-08-17 13:07:59'),
(7, 'ABC ', 'gallery_img_2.jpg', 1, '2023-08-17 13:08:11'),
(8, 'ABC ', 'gallery_img_3.jpg', 1, '2023-08-17 13:08:19'),
(9, 'ABC ', 'gallery_img_4.jpg', 1, '2023-08-17 13:08:31'),
(10, 'ABC ', 'gallery_img_5.jpg', 1, '2023-08-17 13:08:40'),
(11, 'ABC ', 'gallery_img_6.jpg', 1, '2023-08-17 13:08:48');

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
(1, '', 'profile-2.png', '', 1, '2023-08-14 07:27:58'),
(2, '', 'profile-2.png', '', 1, '2023-08-14 07:30:07'),
(4, '', 'profile-2.png', '', 1, '2023-08-14 09:18:59');

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
(2, 2, 'sponsor_2.svg', 0, '2023-08-14 11:12:15'),
(3, 3, 'sponsor_3.svg', 0, '2023-08-14 11:17:09'),
(4, 4, 'sponsor_4.svg', 0, '2023-08-14 11:43:39'),
(5, 1, 'sponsor_1.svg', 0, '2023-08-14 12:03:42');

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
-- Table structure for table `ticket_tbl`
--

CREATE TABLE `ticket_tbl` (
  `tic_id` int(11) NOT NULL,
  `tic_name` varchar(50) NOT NULL,
  `tic_price` int(40) NOT NULL,
  `tic_gst` int(20) NOT NULL,
  `tic_status` tinyint(4) NOT NULL,
  `tic_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `tic_color` varchar(20) NOT NULL,
  `tic_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_tbl`
--

INSERT INTO `ticket_tbl` (`tic_id`, `tic_name`, `tic_price`, `tic_gst`, `tic_status`, `tic_created_at`, `tic_color`, `tic_text`) VALUES
(2, 'EXHIBITION', 49999, 18, 1, '2023-08-18 14:11:29', '#893D00', 'For <span>exhibitors:</span> Choose the Per Exhibition package for dedicated space, branding, and event <br> access'),
(3, 'DELEGATE', 6999, 18, 1, '2023-08-18 14:11:47', '#555555', '<span>Attendees:</span> Secure your spot with the Per Delegate package for access to sessions, networking, and more\r\n\r\n'),
(4, 'EARLY DELEGATE', 5999, 18, 1, '2023-08-19 05:29:44', '#005595', '<span> Limited offer:</span>Exclusive Early Arrival Delegate package for the first 50 attendees at a discounted rate, with all event benefits');

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
-- Indexes for table `brochure_tbl`
--
ALTER TABLE `brochure_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_ticket_tbl`
--
ALTER TABLE `confirm_ticket_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delegate_tbl`
--
ALTER TABLE `delegate_tbl`
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
-- Indexes for table `ticket_tbl`
--
ALTER TABLE `ticket_tbl`
  ADD PRIMARY KEY (`tic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brochure_tbl`
--
ALTER TABLE `brochure_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `confirm_ticket_tbl`
--
ALTER TABLE `confirm_ticket_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `delegate_tbl`
--
ALTER TABLE `delegate_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `img_tbl`
--
ALTER TABLE `img_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `ticket_tbl`
--
ALTER TABLE `ticket_tbl`
  MODIFY `tic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
