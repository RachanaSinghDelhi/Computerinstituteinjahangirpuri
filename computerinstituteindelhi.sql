-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2025 at 08:44 PM
-- Server version: 10.11.11-MariaDB
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nicewebt_computerinstitute`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deadline` date NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `batch` varchar(255) NOT NULL,
  `status` enum('Present','Absent','Late') NOT NULL DEFAULT 'Absent',
  `attendance_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `user_id`, `batch`, `status`, `attendance_date`, `created_at`, `updated_at`) VALUES
(9, 1027, 65, '08:00 AM', 'Absent', '2025-03-12', '2025-03-12 00:51:15', '2025-03-12 00:51:15'),
(10, 1153, 65, '08:00 AM', 'Absent', '2025-03-12', '2025-03-12 00:59:57', '2025-03-12 00:59:57'),
(11, 928, 65, '08:00 AM', 'Absent', '2025-03-12', '2025-03-12 01:00:08', '2025-03-12 01:00:08'),
(12, 1130, 65, '09:00 AM', 'Absent', '2025-03-12', '2025-03-12 01:01:34', '2025-03-12 01:01:34'),
(13, 1170, 65, '09:00 AM', 'Present', '2025-03-12', '2025-03-12 01:01:46', '2025-03-12 01:01:46'),
(14, 914, 65, '09:00 AM', 'Present', '2025-03-12', '2025-03-12 01:02:15', '2025-03-12 01:02:15'),
(15, 1171, 65, '10:00 AM', 'Present', '2025-03-12', '2025-03-12 01:02:49', '2025-03-12 01:02:49'),
(16, 1154, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:03:19', '2025-03-12 01:03:19'),
(17, 1040, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:04:53', '2025-03-12 01:04:53'),
(18, 1075, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:05:05', '2025-03-12 01:05:05'),
(19, 1079, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:05:24', '2025-03-12 01:05:24'),
(20, 1088, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:06:20', '2025-03-12 01:06:20'),
(21, 1091, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:06:27', '2025-03-12 01:06:27'),
(22, 1180, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:06:36', '2025-03-12 01:06:36'),
(23, 1181, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:06:46', '2025-03-12 01:06:46'),
(24, 1185, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:06:59', '2025-03-12 01:06:59'),
(25, 1195, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:07:40', '2025-03-12 01:07:40'),
(26, 1193, 65, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 01:09:54', '2025-03-12 01:09:54'),
(27, 1102, 65, '08:00 AM', 'Present', '2025-03-12', '2025-03-12 01:54:57', '2025-03-12 01:54:57'),
(28, 1126, 65, '08:00 AM', 'Present', '2025-03-12', '2025-03-12 01:55:40', '2025-03-12 01:55:40'),
(29, 1141, 65, '08:00 AM', 'Present', '2025-03-12', '2025-03-12 01:55:49', '2025-03-12 01:55:49'),
(30, 1178, 65, '08:00 AM', 'Present', '2025-03-12', '2025-03-12 01:55:56', '2025-03-12 01:55:56'),
(31, 1189, 65, '08:00 AM', 'Absent', '2025-03-12', '2025-03-12 01:56:16', '2025-03-12 01:56:16'),
(32, 1194, 65, '08:00 AM', 'Present', '2025-03-12', '2025-03-12 01:56:28', '2025-03-12 01:56:28'),
(33, 1187, 65, '09:00 AM', 'Present', '2025-03-12', '2025-03-12 01:58:42', '2025-03-12 01:58:42'),
(34, 1191, 65, '09:00 AM', 'Present', '2025-03-12', '2025-03-12 01:58:54', '2025-03-12 01:58:54'),
(35, 1164, 65, '09:00 AM', 'Present', '2025-03-12', '2025-03-12 01:59:09', '2025-03-12 01:59:09'),
(36, 1127, 65, '10:00 AM', 'Present', '2025-03-12', '2025-03-12 01:59:50', '2025-03-12 01:59:50'),
(37, 1150, 65, '10:00 AM', 'Present', '2025-03-12', '2025-03-12 02:06:38', '2025-03-12 02:06:38'),
(38, 1188, 64, '12:00 PM', 'Present', '2025-03-12', '2025-03-12 03:01:30', '2025-03-12 03:01:30'),
(39, 1065, 66, '4:00 PM', 'Present', '2025-03-12', '2025-03-12 05:15:56', '2025-03-12 05:15:56'),
(40, 1073, 66, '4:00 PM', 'Present', '2025-03-12', '2025-03-12 05:16:22', '2025-03-12 05:16:22'),
(41, 1192, 64, '10:00 AM', 'Present', '2025-03-12', '2025-03-12 05:58:49', '2025-03-12 05:58:49'),
(42, 1196, 64, '10:00 AM', 'Present', '2025-03-12', '2025-03-12 05:59:22', '2025-03-12 05:59:22'),
(43, 1142, 64, '12:00 PM', 'Present', '2025-03-12', '2025-03-12 05:59:51', '2025-03-12 05:59:51'),
(44, 1174, 64, '2:00 PM', 'Present', '2025-03-12', '2025-03-12 06:00:32', '2025-03-12 06:00:32'),
(45, 1173, 64, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 06:04:39', '2025-03-12 06:04:39'),
(46, 1184, 64, '2:00 PM', 'Present', '2025-03-12', '2025-03-12 06:06:00', '2025-03-12 06:06:00'),
(47, 1190, 64, '2:00 PM', 'Absent', '2025-03-12', '2025-03-12 06:06:49', '2025-03-12 06:06:49'),
(48, 1119, 64, '04:00 PM', 'Present', '2025-03-12', '2025-03-12 06:07:06', '2025-03-12 06:07:06'),
(49, 1118, 64, '04:00 PM', 'Present', '2025-03-12', '2025-03-12 06:07:30', '2025-03-12 06:07:30'),
(50, 1200, 64, '04:00 PM', 'Present', '2025-03-12', '2025-03-12 06:07:51', '2025-03-12 06:07:51'),
(51, 1176, 64, '05:00 PM', 'Absent', '2025-03-12', '2025-03-12 06:10:20', '2025-03-12 06:10:20'),
(52, 944, 64, '05:00 PM', 'Present', '2025-03-12', '2025-03-12 06:10:36', '2025-03-12 06:10:36'),
(53, 1182, 64, '03:00 PM', 'Absent', '2025-03-12', '2025-03-12 06:11:27', '2025-03-12 06:11:27'),
(54, 1155, 64, '06:00 PM', 'Absent', '2025-03-12', '2025-03-12 06:39:10', '2025-03-12 06:39:10'),
(55, 1077, 64, '06:00 PM', 'Absent', '2025-03-12', '2025-03-12 06:39:26', '2025-03-12 06:39:26'),
(56, 1096, 66, '05:00 PM', 'Absent', '2025-03-12', '2025-03-12 07:00:55', '2025-03-12 07:00:55'),
(57, 1199, 64, '11 AM', 'Present', '2025-03-12', '2025-03-12 07:22:51', '2025-03-12 07:22:51'),
(58, 1197, 64, '06 PM', 'Present', '2025-03-12', '2025-03-12 07:23:48', '2025-03-12 07:23:48'),
(59, 1085, 66, '06:00 PM', 'Present', '2025-03-12', '2025-03-12 07:44:48', '2025-03-12 07:44:48'),
(60, 1023, 64, '04:00 PM', 'Present', '2025-03-12', '2025-03-12 08:11:44', '2025-03-12 08:11:44'),
(61, 929, 64, '04:00 PM', 'Present', '2025-03-12', '2025-03-12 08:11:56', '2025-03-12 08:11:56'),
(62, 1008, 64, '01:00 PM', 'Absent', '2025-03-12', '2025-03-12 08:12:07', '2025-03-12 08:12:07'),
(63, 1156, 64, '12:00 PM', 'Present', '2025-03-12', '2025-03-12 08:12:27', '2025-03-12 08:12:27'),
(64, 1186, 66, '06:00 PM', 'Present', '2025-03-12', '2025-03-12 08:14:14', '2025-03-12 08:14:14'),
(65, 1158, 64, '11:00 AM', 'Present', '2025-03-12', '2025-03-12 08:14:21', '2025-03-12 08:14:21'),
(66, 1089, 66, '07:00 PM', 'Absent', '2025-03-12', '2025-03-12 08:14:34', '2025-03-12 08:14:34'),
(67, 1160, 64, '06:00 PM', 'Absent', '2025-03-12', '2025-03-12 08:38:31', '2025-03-12 08:38:31'),
(68, 1067, 64, '06:00 PM', 'Present', '2025-03-12', '2025-03-12 08:39:28', '2025-03-12 08:39:28'),
(69, 1068, 64, '06:00 PM', 'Present', '2025-03-12', '2025-03-12 08:40:12', '2025-03-12 08:40:12'),
(70, 1003, 64, '06:00 PM', 'Present', '2025-03-12', '2025-03-12 08:40:22', '2025-03-12 08:40:22'),
(71, 1147, 64, '07:00 PM', 'Present', '2025-03-12', '2025-03-12 08:41:05', '2025-03-12 08:41:05'),
(72, 1149, 64, '07:00 PM', 'Absent', '2025-03-12', '2025-03-12 08:41:26', '2025-03-12 08:41:26'),
(73, 1019, 64, '07:00 PM', 'Present', '2025-03-12', '2025-03-12 08:41:41', '2025-03-12 08:41:41'),
(74, 1162, 64, '07:00 PM', 'Absent', '2025-03-12', '2025-03-12 08:41:54', '2025-03-12 08:41:54'),
(75, 1163, 64, '07:00 PM', 'Present', '2025-03-12', '2025-03-12 08:46:36', '2025-03-12 08:46:36'),
(76, 1141, 64, '08:00 AM', 'Present', '2025-03-13', '2025-03-12 22:35:21', '2025-03-12 22:35:21'),
(77, 1178, 64, '08:00 AM', 'Present', '2025-03-13', '2025-03-12 22:35:30', '2025-03-12 22:35:30'),
(78, 1102, 64, '08:00 AM', 'Absent', '2025-03-13', '2025-03-12 22:35:50', '2025-03-12 22:35:50'),
(79, 1126, 64, '08:00 AM', 'Absent', '2025-03-13', '2025-03-12 22:35:58', '2025-03-12 22:35:58'),
(80, 1164, 64, '09:00 AM', 'Present', '2025-03-13', '2025-03-12 22:36:18', '2025-03-12 22:36:18'),
(81, 1155, 64, '09:00 AM', 'Present', '2025-03-13', '2025-03-12 22:37:44', '2025-03-12 22:37:44'),
(82, 1027, 65, '08:00 AM', 'Present', '2025-03-13', '2025-03-12 22:58:32', '2025-03-12 22:58:32'),
(83, 1040, 65, '08:00 AM', 'Present', '2025-03-13', '2025-03-12 22:59:00', '2025-03-12 22:59:00'),
(84, 928, 65, '08:00 AM', 'Absent', '2025-03-13', '2025-03-12 22:59:26', '2025-03-12 22:59:26'),
(85, 1193, 65, '08:00 AM', 'Present', '2025-03-13', '2025-03-12 22:59:37', '2025-03-12 22:59:37'),
(86, 1088, 65, '09:00 AM', 'Present', '2025-03-13', '2025-03-12 23:00:27', '2025-03-12 23:00:27'),
(87, 1091, 65, '09:00 AM', 'Present', '2025-03-13', '2025-03-12 23:00:34', '2025-03-12 23:00:34'),
(88, 1079, 65, '09:00 AM', 'Present', '2025-03-13', '2025-03-12 23:01:26', '2025-03-12 23:01:26'),
(89, 1130, 65, '09:00 AM', 'Absent', '2025-03-13', '2025-03-12 23:02:19', '2025-03-12 23:02:19'),
(90, 914, 65, '09:00 AM', 'Absent', '2025-03-13', '2025-03-12 23:02:32', '2025-03-12 23:02:32'),
(91, 1171, 65, '10:00 AM', 'Present', '2025-03-13', '2025-03-12 23:02:43', '2025-03-12 23:02:43'),
(92, 1170, 65, '09:00 AM', 'Present', '2025-03-13', '2025-03-12 23:03:34', '2025-03-12 23:03:34'),
(93, 1187, 64, '09:00 AM', 'Present', '2025-03-13', '2025-03-12 23:05:46', '2025-03-12 23:05:46'),
(94, 1127, 64, '10:00 AM', 'Present', '2025-03-13', '2025-03-12 23:06:01', '2025-03-12 23:06:01'),
(95, 1196, 64, '10:00 AM', 'Present', '2025-03-13', '2025-03-12 23:06:16', '2025-03-12 23:06:16'),
(96, 1191, 64, '09:00 AM', 'Absent', '2025-03-13', '2025-03-12 23:44:53', '2025-03-12 23:44:53'),
(97, 1194, 64, '08:00 AM', 'Absent', '2025-03-13', '2025-03-12 23:45:07', '2025-03-12 23:45:07'),
(98, 1192, 64, '10:00 AM', 'Absent', '2025-03-13', '2025-03-12 23:45:26', '2025-03-12 23:45:26'),
(99, 1153, 65, '08:00 AM', 'Absent', '2025-03-13', '2025-03-13 00:10:48', '2025-03-13 00:10:48'),
(100, 1180, 65, '11:00 AM', 'Present', '2025-03-13', '2025-03-13 00:11:15', '2025-03-13 00:11:15'),
(101, 1181, 65, '11:00 AM', 'Present', '2025-03-13', '2025-03-13 00:13:12', '2025-03-13 00:13:12'),
(102, 1185, 65, '11:00 AM', 'Present', '2025-03-13', '2025-03-13 00:13:20', '2025-03-13 00:13:20'),
(103, 1085, 65, '06:00 PM', 'Present', '2025-03-13', '2025-03-13 00:15:27', '2025-03-13 00:15:27'),
(104, 1158, 64, '11:00 AM', 'Present', '2025-03-13', '2025-03-13 00:39:21', '2025-03-13 00:39:21'),
(105, 1173, 64, '11:00 AM', 'Present', '2025-03-13', '2025-03-13 00:39:38', '2025-03-13 00:39:38'),
(106, 1075, 64, '11:00 AM', 'Present', '2025-03-13', '2025-03-13 00:40:00', '2025-03-13 00:40:00'),
(107, 1199, 64, '11:00 AM', 'Absent', '2025-03-13', '2025-03-13 00:40:17', '2025-03-13 00:40:17'),
(108, 1195, 64, '11:00 AM', 'Absent', '2025-03-13', '2025-03-13 00:40:30', '2025-03-13 00:40:30'),
(109, 1189, 64, '08:00 AM', 'Absent', '2025-03-13', '2025-03-13 00:40:48', '2025-03-13 00:40:48'),
(110, 1184, 64, '2:00 PM', 'Present', '2025-03-13', '2025-03-13 00:41:19', '2025-03-13 00:41:19'),
(111, 1150, 64, '11:00 AM', 'Absent', '2025-03-13', '2025-03-13 00:53:32', '2025-03-13 00:53:32'),
(112, 1154, 65, '11:00 AM', 'Present', '2025-03-13', '2025-03-13 00:54:03', '2025-03-13 00:54:03'),
(113, 1142, 64, '12:00 PM', 'Present', '2025-03-13', '2025-03-13 01:05:13', '2025-03-13 01:05:13'),
(114, 1176, 64, '05:00 PM', 'Present', '2025-03-13', '2025-03-13 01:28:37', '2025-03-13 01:28:37'),
(115, 1200, 64, '04:00 PM', 'Present', '2025-03-13', '2025-03-13 01:28:51', '2025-03-13 01:28:51'),
(116, 1156, 64, '12:00 PM', 'Present', '2025-03-13', '2025-03-13 01:41:44', '2025-03-13 01:41:44'),
(117, 1188, 65, '12:00 PM', 'Present', '2025-03-13', '2025-03-13 01:54:57', '2025-03-13 01:54:57'),
(118, 1174, 64, '2:00 PM', 'Present', '2025-03-13', '2025-03-13 02:04:06', '2025-03-13 02:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father` varchar(255) DEFAULT NULL,
  `dt` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `certificate_type` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `grade` varchar(3) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `student_id`, `name`, `father`, `dt`, `date`, `course`, `photo`, `certificate_type`, `duration`, `description`, `grade`, `code`, `created_at`, `updated_at`) VALUES
(576, 545, 'Sumit Kumar', 'Parmod Kumar', '1970-01-01', '1970-04-01', 'ADV.EXCL', '=CONCATENATE(A10,\".jpg\")', 'Certificate in Advance Excel', 3, 'MS-Excel, MIS & Visual Basic for Application', 'A+', 'NWT00545/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(577, 805, 'Noor Aaliya', 'Qamar ali', '2024-10-21', '2026-02-21', 'HDCS(WEB+DGT)', '805.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT00805/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(578, 816, 'Shobhna Das', 'Subhash Das', '2023-05-15', '2024-09-15', 'HDCS(WEB+DGT)', '0', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT00816/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(579, 817, 'Santosh  Kumar Sahu', 'Ramprasad Sahu', '2023-05-16', '2024-01-16', 'MARG + ENG', '817.jpg', 'English Language & Certificate in Financial Accountancy', 8, 'MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT00817/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(580, 819, 'Akash Singh', 'Parmal Singh', '2023-05-16', '2023-08-16', 'TALLY(PRIME)', '819.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00819/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(581, 820, 'Bhanu', 'Om Prakash', '2023-05-15', '2023-09-15', 'BASIC', '820.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00820/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(582, 821, 'Jatin', 'Roshan Lal', '2023-05-17', '2023-09-17', 'BASIC', '821.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00821/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(583, 822, 'Rimjhim', 'Ranglal', '2023-05-23', '2023-09-23', 'BASIC', '822.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00822/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(584, 823, 'Mrs.Pooja Chauhan', 'w/o Lakhan Chauhan', '2023-05-25', '2024-09-25', 'HDCS(WEB+DGT)', '823.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT00823/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(585, 825, 'Kapil', 'Yogiender Kumar', '2023-05-31', '2024-09-30', 'HDCS(WEB+DGT)', '825.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT00825/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(586, 826, 'Anchal', 'Dilwar Singh Rawat', '2023-06-01', '2023-10-01', 'BASIC', '826.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00826/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(587, 827, 'Shivakant Gautam', 'Mr.Chhatthu Gautam', '2023-06-02', '2023-10-02', 'BASIC', '827.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00827/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(588, 828, 'Mamta Singh', 'Narayan Singh', '2023-06-03', '2023-10-03', 'BASIC', '828.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00828/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(589, 829, 'Shrishti Verma', 'Shivji Verma', '2023-06-06', '2023-10-06', 'BASIC', '829.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00829/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(590, 830, 'Lucky Solanki', 'Kali Chran', '2023-06-08', '2023-10-08', 'Best English Language Course in Jahangirpuri | Spoken English & Grammar Classes', '830.jpg', 'Certificate in English Language', 4, 'English Language and english Grammer', 'A', 'NWT00830/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(591, 831, 'Bharti', 'Anup Kumar', '2023-06-09', '2024-06-09', 'HDCA', '831.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT00831/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(592, 832, 'Vishal Kumar', 'Naresh  Kumar', '2023-06-13', '2024-02-13', 'DCA(PRIME)', '832.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A', 'NWT00832/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(593, 833, 'Himanshu', 'Om Prakash Verma', '2023-06-13', '2024-06-13', 'HDCS(ACC)', '833.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT00833/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(594, 834, 'Yuvraj Gaur', 'Amit Gaur', '2023-06-13', '2023-10-13', 'BASIC', '834.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00834/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(595, 835, 'Arti', 'Ram Baran', '2023-06-13', '2024-02-13', 'DCA(PRIME)', '835.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT00835/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(596, 836, 'Sandeep Pardhan', 'Kamlesh Pradhan', '2023-06-13', '2023-10-13', 'MARG', '836.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00836/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(597, 837, 'Pooja', 'Kamlesh Pradhan', '2023-06-13', '2023-12-13', 'CCA', '837.jpg', 'Certificate In Computer Application', 6, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00837/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(598, 838, 'Varun ', 'Ajay Singh', '2023-06-14', '2024-06-14', 'HDCS(ACC)', '838.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT00838/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(599, 839, 'Ashish Kumar Prajapati', 'Rakesh Kumar Prajapati', '2023-06-14', '2023-09-14', 'Video Editing', '839.jpg', 'Certificate in Video Editing', 3, 'Certificate in Vedio Editing (Illustrator,After effects,Premire Pro )', 'A+', 'NWT00839/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(600, 841, 'Zeenat Parveen', 'MD. Niyazuddin', '2023-06-15', '2023-10-15', 'BASIC', '841.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00841/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(601, 844, 'Virender', 'Badlu', '2023-06-16', '2024-10-16', 'HDCS(WEB+DGT)', '844.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT00844/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(602, 845, 'Md.sharik', 'Md.Momin', '2023-06-19', '2023-10-19', 'BASIC', '845.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00845/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(603, 846, 'Bhumika Sharma', 'Lalit kumar', '2023-06-15', '2023-10-15', 'BASIC', '846.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00846/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(604, 847, 'Sachin', 'Deshraj', '2023-06-26', '2023-10-26', 'BASIC', '847.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00847/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(605, 848, 'Tanisha', 'Mr.Suresh sonkar', '2023-06-26', '2023-10-26', 'BASIC', '848.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00848/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(606, 849, 'Sonu', 'Mr.Jural prasad', '2023-06-27', '2023-10-27', 'BASIC', '849.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00849/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(607, 850, 'Aakash', 'Surender Mishra', '2023-06-27', '2023-10-27', 'BASIC', '850.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00850/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(608, 851, 'Aman Mishra', 'Surender Mishra', '2023-06-27', '2023-10-27', 'BASIC', '851.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00851/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(609, 852, 'Rakshit Garg', 'Mr.Mukesh Garg', '2023-07-01', '2023-11-01', 'C Language', '852.jpg', 'Certificate in Programming Language', 4, 'C Language, C++ Language, Data Structure and algorithm, html and Javascript.', 'A', 'NWT00852/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(610, 855, 'Sonia', 'Mangal Singh', '2023-07-01', '2023-11-01', 'BASIC', '855.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00855/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(611, 856, 'Raghav kumar Chaudhary', 'Ramnath Choudhary', '2023-06-28', '2023-10-28', 'MARG', '856.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00856/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(612, 857, 'Krishna', 'Ajeet Vaid', '2023-06-17', '2023-10-17', 'BASIC', '857.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00857/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(613, 858, 'Babli', 'Pawan Kumar', '2023-06-30', '2024-06-30', 'HDCA', '858.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A+', 'NWT00858/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(614, 859, 'Ruby Rathore', 'Chob Singh Rathore', '2023-07-03', '2023-11-03', 'BASIC', '859.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00859/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(615, 860, 'Renu Rathore', 'Chob Singh Rathore', '2023-07-03', '2023-11-03', 'BASIC', '860.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00860/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(616, 861, 'Aman Kumar', 'Munish Kumar', '2023-07-03', '2024-03-03', 'DCA(PRIME)', '861.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT00861/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(617, 862, 'Himanshu', 'Pati Ram', '2023-07-04', '2023-11-04', 'BASIC', '862.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00862/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(618, 863, 'Vikram Kumar', 'Vinod Singh', '2023-07-04', '2024-03-04', 'DCA(PRIME)', '863.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT00863/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(619, 864, 'Abhneet', 'Shri Niwas singh', '2023-07-04', '2023-11-04', 'EXCEL+PRIME', '864.jpg', 'Certificate in Excel and Financial Accountancy', 4, 'Excel MIS & Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00864/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(620, 865, 'Bharat Kumar Sapra', 'Rajender Sapra', '2023-07-04', '2023-11-04', 'EXCEL+PRIME', '865.jpg', 'Certificate in Excel and Financial Accountancy', 4, 'Excel MIS & Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT00865/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(621, 866, 'Gourav Jha', 'Mohan Jha', '2023-07-04', '2024-03-04', 'DCA(PRIME)', '866.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT00866/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(622, 886, 'Love Singh', 'Rajpal Singh', '2024-10-08', '2025-01-08', 'TALLY(PRIME)', '886.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00886/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(623, 910, 'Chandan Prajapati', 'Mr. Rajesh Prajapati', '1970-01-01', '1971-01-01', 'HDCA', '=CONCATENATE(A2,\".jpg\")', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A+', 'NWT00910/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(624, 911, 'Anshu', 'Chanderpal Singh', '1970-01-01', '1970-09-01', 'DCA(PRIME)', '911.jpg\r\n', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT00911/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(625, 912, 'Khushi', 'Ramnaresh Giri', '1970-01-01', '1971-01-01', 'HDCS(ACC)', '=CONCATENATE(A4,\".jpg\")', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT00912/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(626, 913, 'Shourya Chauhan', 'Pankaj Kumar', '1970-01-01', '1971-01-01', 'HDCS(ACC)', '=CONCATENATE(A5,\".jpg\")', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT00913/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(627, 914, 'Karan', 'Prabhu Dayal', '1970-01-01', '1971-01-01', 'HDCS(ACC)', '=CONCATENATE(A6,\".jpg\")', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT00914/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(628, 915, 'Kritika', 'W/O Shubham jain', '1970-01-01', '1970-03-01', 'DTP', '915.jpg', 'Certificate in Graphic Designing', 2, 'Graphics in Corel Draw, Photoshop.', 'A+', 'NWT00915/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(629, 916, 'Niranjan Yadav', 'Ranjit Yadav', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A8,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00916/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(630, 917, 'Neha', 'Munna Thakur', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A9,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00917/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(631, 918, 'Bhawna', 'Netrapal Singh', '1970-01-01', '1971-01-01', 'HDCS(ACC)', '=CONCATENATE(A11,\".jpg\")', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT00918/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(632, 919, 'Bhawna', 'Rajvir Singh', '1970-01-01', '1971-01-01', 'HDCS(ACC)', '=CONCATENATE(A12,\".jpg\")', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT00919/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(633, 920, 'Neha', 'Sanjya Kumar', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A13,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00920/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(634, 921, 'Banty', 'Dhara Singh', '1970-01-01', '1970-04-01', 'ADV.EXCL', '=CONCATENATE(A14,\".jpg\")', 'Certificate in Advance Excel', 3, 'MS-Excel, MIS & Visual Basic for Application', 'A', 'NWT00921/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(635, 922, 'Bhumika', 'Harvinder', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A15,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00922/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(636, 923, 'Shivam', 'Amar Nath Dubey', '1970-01-01', '1970-04-01', 'TALLY(PRIME)', '=CONCATENATE(A16,\".jpg\")', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00923/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(637, 924, 'Mohd Salman', 'Md Sakil', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A17,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00924/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(638, 925, 'Sachin Saroj', 'Mr. Amar Dev Saroj', '1970-01-01', '1971-01-01', 'HDCS(WEB)', '=CONCATENATE(A18,\".jpg\")', 'Unknown', 12, NULL, 'A', 'NWT00925/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(639, 926, 'Sneha', 'Sanjay Kumar', '1970-01-01', '1971-01-01', 'HDCS(WEB)', '=CONCATENATE(A19,\".jpg\")', 'Unknown', 12, NULL, 'A+', 'NWT00926/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(640, 927, 'Khushi', 'Ratnesh Kumar Singh', '1970-01-01', '1971-01-01', 'HDCA', '=CONCATENATE(A20,\".jpg\")', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT00927/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(641, 928, 'Saurabh', 'Pradeep', '1970-01-01', '1971-01-01', 'HDCS(WEB)', '=CONCATENATE(A21,\".jpg\")', 'Unknown', 12, NULL, 'A', 'NWT00928/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(642, 929, 'Priya singh', 'Devendra Pal Singh', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A22,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00929/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(643, 930, 'Akram', 'Shaukat Ali', '1970-01-01', '1971-01-01', 'HDCS(WEB)', '=CONCATENATE(A23,\".jpg\")', 'Unknown', 12, NULL, 'A', 'NWT00930/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(644, 931, 'Yash Kumar', 'Sushil Kumar ', '1970-01-01', '1970-04-01', 'ADV.EXCL', '=CONCATENATE(A24,\".jpg\")', 'Certificate in Advance Excel', 3, 'MS-Excel, MIS & Visual Basic for Application', 'A+', 'NWT00931/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(645, 932, 'Kanak', 'Arvind Kumar', '1970-01-01', '1973-01-01', 'BCA', '=CONCATENATE(A25,\".jpg\")', 'Unknown', 72, NULL, 'A+', 'NWT00932/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(646, 933, 'Aarfin', 'Aslam Khan', '1970-01-01', '1970-09-01', 'DCA(PRIME)', '933.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A', 'NWT00933/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(647, 934, 'Kajal', 'W/O Kamaldeep', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A27,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00934/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(648, 935, 'Tanishka', 'Snajay Sharma', '1970-01-01', '1971-01-01', 'HDCA', '=CONCATENATE(A28,\".jpg\")', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT00935/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(649, 936, 'Vishal Sharma', 'Saty Nrayan Sharma', '1970-01-01', '1971-05-01', 'HDCS(WEB+DGT)', '=CONCATENATE(A29,\".jpg\")', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT00936/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(650, 937, 'Aryan', 'Ratnesh', '1970-01-01', '1971-01-01', 'HDCA', '=CONCATENATE(A30,\".jpg\")', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT00937/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(651, 938, 'Riya', 'Jitender Kumar', '1970-01-01', '1971-05-01', 'HDCS(WEB+DGT)', '=CONCATENATE(A31,\".jpg\")', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT00938/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(652, 939, 'Suraj Pandey', 'Srinath Pandey', '1970-01-01', '1971-05-01', 'HDCS(WEB+DGT)', '=CONCATENATE(A32,\".jpg\")', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT00939/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(653, 940, 'Sanjeet', 'Mr. Mangal Parsad', '1970-01-01', '1970-07-01', 'ADV.EXCL+TALLY(PRIME)', '=CONCATENATE(A33,\".jpg\")', 'Diploma in Computer Appliation', 6, 'Advance Excel and Tally Prime', 'A+', 'NWT00940/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(654, 941, 'Rohit', 'Mr. Ganpat', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A34,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00941/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(655, 942, 'Sanjana', 'Sanjay', '1970-01-01', '1970-09-01', 'DCA(PRIME)', '942.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A', 'NWT00942/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(656, 944, 'Sanjana', 'Prabhu Das', '2024-09-25', '2025-09-25', 'HDCS(WEB)', '=CONCATENATE(A37,\".jpg\")', 'Unknown', 12, NULL, 'A+', 'NWT00944/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(657, 945, 'Mohsin Siddiqui', 'Mhd.Tahsim Siddiqui', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A38,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00945/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(658, 946, 'Rishu Chaudhary', 'Jai Prakash', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A39,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00946/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(659, 948, 'Nikhil', 'Harshan Pal', '1970-01-01', '1971-05-01', 'HDCS(WEB+DGT)', '=CONCATENATE(A41,\".jpg\")', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT00948/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(660, 949, 'Reshma', 'Ashu', '1970-01-01', '1970-09-01', 'DCA(PRIME)', '949.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A', 'NWT00949/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(661, 950, 'Shahnawaz', 'Noor Mohd.', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A43,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00950/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(662, 951, 'Shahzad', 'Noor Mohd.', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A44,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00951/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(663, 952, 'Shoaib Akhtar', 'Mohd.Alam', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A45,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00952/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(664, 953, 'Poonam', 'D/O Om Prakash', '1970-01-01', '1970-04-01', 'TALLY(PRIME)', '=CONCATENATE(A46,\".jpg\")', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT00953/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(665, 954, 'Kajal', 'Sonu', '1970-01-01', '1970-09-01', 'DCA(PRIME)', '954.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A', 'NWT00954/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(666, 955, 'Hritik', 'Ram Sagar', '1970-01-01', '1970-04-01', 'TALLY(PRIME)', '=CONCATENATE(A48,\".jpg\")', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00955/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(667, 956, 'Om Kumar', 'Bablu Singh', '1970-01-01', '1970-05-01', 'MARG', '=CONCATENATE(A49,\".jpg\")', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT00956/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(668, 958, 'Ronit Gupta', 'Mr. Rajender Gupta', '1970-01-01', '1971-05-01', 'HDCS(WEB+DGT)', '=CONCATENATE(A51,\".jpg\")', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT00958/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(669, 959, 'Neha Kumari', 'Jung  Bahadur', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A52,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00959/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(670, 960, 'Yogesh', 'Mr. Rakesh', '1970-01-01', '1971-05-01', 'HDCS(WEB+DGT)', '=CONCATENATE(A53,\".jpg\")', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT00960/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(671, 961, 'Mohit', 'Mr. Brij Mohan', '1970-01-01', '1970-05-01', 'MARG', '=CONCATENATE(A54,\".jpg\")', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00961/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(672, 962, 'Deepak Chaudhry', 'Hari Ram', '1970-01-01', '1971-05-01', 'HDCS(WEB+DGT)', '=CONCATENATE(A55,\".jpg\")', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT00962/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(673, 963, 'Vikram Kumar', 'Mr. Ram Jatan', '1970-01-01', '1970-05-01', 'BASIC', '=CONCATENATE(A56,\".jpg\")', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00963/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(674, 964, 'Jai', 'Mr. Vijay', '2023-10-20', '2024-02-20', 'BASIC', '964.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00964/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(675, 965, 'Bhawna Verma', 'Mr.Vinod Kumar', '2023-10-23', '2024-10-23', 'HDCA', '965.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT00965/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(676, 967, 'Kavita Yadav', 'Shravan Yadav', '2023-10-28', '2024-02-28', 'BASIC', '967.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00967/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(677, 968, 'Shivam singh', 'Mr. Shamsher Singh', '2023-10-30', '2024-10-30', 'HDCA', '968.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A+', 'NWT00968/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(678, 969, 'Labib Chaudhary', 'Mr. Faigan Ali', '2023-10-31', '2024-10-31', 'HDCA', '969.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT00969/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(679, 970, 'Anil Kumar', 'Mr. Kishori Lal', '2023-11-01', '2024-02-01', 'ADV.EXCL', '970.jpg', 'Certificate in Advance Excel', 3, 'MS-Excel, MIS & Visual Basic for Application', 'A+', 'NWT00970/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(680, 971, 'Harsh Sarwan', 'Mr. Sohan Lal', '2023-11-01', '2024-11-01', 'HDCS(ACC)', '971.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT00971/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(681, 972, 'Ajeet Chauhan', 'Virendra Chauhan', '2023-11-02', '2024-03-02', 'MARG', '972.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT00972/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(682, 974, 'Mahesh', 'Mr. Prahlad', '2023-11-03', '2024-11-03', 'HDCS(ACC)', '974.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT00974/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(683, 976, 'Ram Datal Sahni', 'Mr. Ramprit Sahni', '2023-11-06', '2024-03-06', 'MARG', '976.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00976/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(684, 977, 'Aman singh', 'Mr. Surender Singh', '2023-11-06', '2024-02-06', 'ADV.EXCL', '977.jpg', 'Certificate in Advance Excel', 3, 'MS-Excel, MIS & Visual Basic for Application', 'A', 'NWT00977/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(685, 981, 'Vikas', 'Mr. Indel Yadav', '2023-11-28', '2024-03-28', 'BASIC', '981.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00981/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(686, 983, 'Satyam Kumar', 'Shri Pankaj Kr, Poddar', '2023-12-07', '2024-04-07', 'BASIC', '983.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00983/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(687, 984, 'suraj', 'Dhuram ', '2023-12-04', '2024-04-04', 'MARG', '984.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00984/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(688, 985, 'Yogesh', 'Bhagwan Dass', '2023-08-12', '2024-08-12', 'HDCA', '985.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A+', 'NWT00985/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(689, 986, 'Muskan', 'Balbir Singh', '2023-11-28', '2024-03-28', 'BASIC', '986.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00986/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(690, 987, 'Azmeera Khatoon', 'Abbas Beg', '2023-11-28', '2026-11-28', 'BCA', '987.jpg', 'Unknown', 72, NULL, 'A+', 'NWT00987/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(691, 988, 'Nivesh', 'Sunil', '2023-12-12', '2024-04-12', 'BASIC', '988.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT00988/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(692, 990, 'Khushant', 'Deepak', '2023-12-20', '2024-12-20', 'HDCA', '990.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A+', 'NWT00990/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(693, 991, 'Viren Yadav', 'Mr. Chand Pal Singh Yadav', '2023-12-27', '2024-04-27', 'MARG', '991.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT00991/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(694, 993, 'Kulvinder Singh', 'Mr. Gurbachan singh', '2024-01-06', '2024-05-06', 'MARG', '993.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00993/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(695, 995, 'Priyanka Kri. Singh', 'Mr. Chitaranjan Kumar', '2023-01-13', '2023-04-13', 'TALLY(PRIME)', '995.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00995/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(696, 996, 'Prince Kumar Singh', 'Mr. Chitaranjan Kumar', '2024-01-13', '2024-04-13', 'TALLY(PRIME)', '996.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT00996/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(697, 997, 'Pari Patel', 'Mr. Diwakar Patel', '2024-01-15', '2024-05-15', 'BASIC', '997.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00997/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(698, 998, 'Vaishnavi Patel', 'Mr. Diwakar Patel', '2024-01-15', '2024-05-15', 'BASIC', '998.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00998/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(699, 999, 'Priyanshu Tripathi', 'Mr. Bhola nath', '2024-01-16', '2024-05-16', 'BASIC', '999.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT00999/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(700, 1000, 'Divyanshu ', 'Mr.  Surender kumar', '2024-01-17', '2024-04-17', 'TALLY(PRIME)', '1000.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01000/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(701, 1002, 'Dheeraj kumar', 'Mr. Saroj', '2024-01-23', '2025-01-23', 'HDCS(WEB)', '1002.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01002/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(702, 1003, 'Sifa', 'Md.  Ishak', '2024-01-20', '2025-01-20', 'HDCS(ACC)', '1003.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT01003/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(703, 1007, 'Rahul Singh', 'Rakesh Kumar', '2024-02-08', '2024-05-08', 'TALLY(PRIME)', '1007.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT01007/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(704, 1008, 'Akshita', 'Mahipal Singh', '2024-02-09', '2025-02-09', 'HDCS(ACC)', '1008.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT01008/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(705, 1011, 'Sumit Singh Ydv.', 'Shri Krishan Ydv.', '2024-02-09', '2024-06-09', 'BASIC', '1011.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01011/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(706, 1012, 'Sonu Kumar', 'Dinesh ', '2024-02-09', '2024-06-09', 'BASIC', '1012.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01012/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(707, 1013, 'Ashish Kumar Singh', 'Mr. Virender Singh', '2024-02-09', '2024-05-09', 'TALLY(PRIME)', '1013.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT01013/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(708, 1014, 'Devendra Singh', 'Mr. Kheem Singh', '2024-02-18', '2024-06-18', 'BASIC', '1014.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01014/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(709, 1015, 'Kush', 'Mr. Hari Sahnkar', '2024-02-16', '2025-02-16', 'HDCA', '1015.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A+', 'NWT01015/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(710, 1016, 'Pravin Kumar Singh', 'Mr. Satya Narayan Mukhiya', '2024-02-19', '2024-06-19', 'MARG', '1016.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT01016/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(711, 1017, 'Varun Kumar', 'Mr. Devender Kumar', '2024-02-20', '2024-06-20', 'BASIC', '1017.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01017/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(712, 1019, 'Rinkal Singh', 'Peshkar Singh', '2024-02-21', '2025-02-21', 'HDCS(ACC)', '1019.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT01019/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(713, 1022, 'Vaishnavi', 'Shravan Lal', '2024-03-05', '2024-11-05', 'DCA(PRIME)', '1022.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT01022/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(714, 1023, 'Meena', 'Dharamvir', '2024-03-07', '2025-03-07', 'HDCS(ACC)', '1023.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT01023/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(715, 1024, 'Ram Pravesh Mishra', 'Lt. Jagdish Mishra', '2024-03-09', '2024-07-09', 'BASIC', '1024.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01024/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(716, 1026, 'Shivani Saxena', 'Ram Pal', '2024-03-14', '2024-07-14', 'BASIC', '1026.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01026/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(717, 1027, 'Dilip Bhaskar', 'Harish Kr. Bhaskar', '2024-03-15', '2025-03-15', 'HDCS(WEB)', '1027.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01027/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(718, 1028, 'Anuj Bhaskar', 'Harish Kr. Bhaskar', '2024-03-15', '2025-03-15', 'HDCS(WEB)', '1028.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01028/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(719, 1029, 'Naveen', 'Mr. Sudama Kumar', '2024-03-20', '2024-07-20', 'MARG', '1029.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01029/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(720, 1030, 'Yash', 'Dalchand', '2024-03-18', '2024-07-18', 'BASIC', '1030.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01030/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(721, 1031, 'Mamta', 'Mr. Niranjan Singh', '2024-03-20', '2024-07-20', 'BASIC', '1031.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01031/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(722, 1032, 'Aanchal', 'Mr. Dinesh Kumar', '2024-03-20', '2024-07-20', 'BASIC', '1032.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01032/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(723, 1035, 'Nandani', 'Mr.Prakash', '2024-03-26', '2024-07-26', 'BASIC', '1035.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01035/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(724, 1038, 'Rachita', 'Mr. Ajay kumar', '2024-04-01', '2025-04-01', 'HDCS(WEB)', '1038.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01038/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(725, 1039, 'Akshit', 'Mr. Ajay kumar', '2024-04-01', '2024-08-01', 'BASIC', '1039.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01039/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(726, 1040, 'Nitin Chaudhary', 'Mr. Kailash Chaudhary', '2024-04-01', '2025-04-01', 'HDCS(WEB)', '1040.jpg', 'Unknown', 12, NULL, 'A', 'NWT01040/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(727, 1041, 'Tousin', 'Deen Mohammed', '2024-04-01', '2024-08-01', 'BASIC', '1041.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01041/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(728, 1042, 'Deepanshu', 'Mr. Shiv Charan', '2024-04-02', '2024-08-02', 'BASIC', '1042.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01042/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(729, 1044, 'Dev Kumar', 'Indal Prasad', '2024-04-03', '2024-08-03', 'BASIC', '1044.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01044/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(730, 1046, 'Chanchal', 'Suresh Kumar', '2024-04-03', '2024-08-03', 'BASIC', '1046.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01046/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(731, 1048, 'Nakul', 'Mr. Mukesh Kumar', '2024-04-03', '2024-08-03', 'BASIC', '1048.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01048/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(732, 1049, 'Ishant', 'Mr. Sunil Kumar', '2024-04-04', '2024-08-04', 'BASIC', '1049.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01049/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(733, 1050, 'Kasish', 'Mr. Gopal Sharma', '2024-04-04', '2024-08-04', 'BASIC', '1050.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01050/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(734, 1051, 'Vrinda Koli', 'Virender Kumar', '2024-04-06', '2024-07-06', 'PYTHON', '1051.jpg', 'Unknown', 3, NULL, 'A+', 'NWT01051/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(735, 1052, 'Chirag Koli', 'Virender Kumar', '2024-04-06', '2024-08-06', 'C Language', '1052.jpg', 'Certificate in Programming Language', 4, 'C Language, C++ Language, Data Structure and algorithm, html and Javascript.', 'A', 'NWT01052/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(736, 1054, 'Mohit', 'Mr. Vijay', '2024-04-08', '2024-08-08', 'BASIC', '1054.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01054/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(737, 1055, 'Pooja Kumari', 'Mrs. Usha Devi', '2024-04-08', '2024-12-08', 'DCA(PRIME)', '1055.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT01055/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(738, 1056, 'James', 'Mr. Rajan', '2024-04-09', '2025-04-09', 'HDCS(ACC)', '1056.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT01056/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(739, 1058, 'Saba Khan', ' Mustafa Khan', '2024-04-12', '2025-04-12', 'HDCA', '1058.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A+', 'NWT01058/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(740, 1059, 'Vishal', 'Mr. Binod Ram', '2024-04-12', '2024-08-12', 'BASIC', '1059.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01059/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(741, 1060, 'Pari', 'Mr. Shyam Sunder', '2024-04-12', '2024-08-12', 'BASIC', '1060.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01060/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(742, 1061, 'Ruchi Rani', 'Mr.Rakesh Singh', '2024-04-13', '2024-10-13', 'BASIC+TYPING', '1061.jpg', 'Diploma in Computer Appliation', 6, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet) & Typing with speed of 40 Words Per Minutes.', 'A+', 'NWT01061/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(743, 1062, 'Lalit Oria', 'Rajesh Kumar', '2024-04-10', '2024-12-10', 'DCA(PRIME)', '1062.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT01062/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(744, 1063, 'Chahat', 'Mr. Deepak Kumar', '2024-04-15', '2024-08-15', 'BASIC', '1063.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01063/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(745, 1064, 'Kanika', 'Mr. Sanjay', '2024-04-15', '2024-08-15', 'BASIC', '1064.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01064/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(746, 1065, 'Pooja Sharma', 'Mr.Raju Sharma', '2024-04-16', '2025-08-16', 'HDCS(WEB+DGT)', '1065.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT01065/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(747, 1067, 'Ankush Kumar', 'Mr. Mahesh Sah', '2024-04-22', '2025-04-22', 'HDCS(ACC)', '1067.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT01067/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(748, 1068, 'Jabir', 'Md. Zakir', '2024-04-22', '2025-04-22', 'HDCS(ACC)', '1068.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT01068/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(749, 1071, 'Madhu', 'Mr.Ram Saran', '2024-04-24', '2025-04-24', 'HDCA', '1071.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT01071/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(750, 1075, 'Simran Gupta', 'Mr. Arjun Gupta', '2024-05-02', '2025-05-02', 'HDCA', '1075.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT01075/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36');
INSERT INTO `certificates` (`id`, `student_id`, `name`, `father`, `dt`, `date`, `course`, `photo`, `certificate_type`, `duration`, `description`, `grade`, `code`, `created_at`, `updated_at`) VALUES
(751, 1076, 'Padam', 'Mr.Balram', '2024-05-02', '2024-09-02', 'BASIC', '1076.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01076/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(752, 1077, 'Lekhika Saini', 'Lt. Jograj Saini', '2024-05-02', '2025-01-02', 'BASIC+ADV. EXCL+TALLY', '1077.jpg', 'Diploma in Computer Application', 8, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Adv. Excel.', 'A', 'NWT01077/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(753, 1079, 'Akash', 'Mr. Rajesh', '2024-05-03', '2025-09-03', 'HDCS(WEB+DGT)', '1079.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT01079/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(754, 1080, 'Abdul Mobin', 'Md. Israfil', '2024-05-03', '2024-09-03', 'MARG', '1080.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT01080/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(755, 1081, 'Vaasu', 'Mr. Sanjeev Kumar', '2024-05-04', '2024-09-04', 'BASIC', '1081.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01081/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(756, 1082, 'Swati', 'Late Bala', '2024-05-07', '2024-09-07', 'BASIC', '1082.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01082/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(757, 1083, 'Sohail Khan ', 'Md. Firoz Khan', '2024-05-09', '2025-05-09', 'HDCS(WEB)', '1083.jpg', 'Unknown', 12, NULL, 'A', 'NWT01083/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(758, 1084, 'Durgesh Kumar', 'Mr. Suraj Bhan', '2024-05-09', '2024-11-09', 'ADV.EXCL+TALLY(PRIME)', '1084.jpg', 'Diploma in Computer Appliation', 6, 'Advance Excel and Tally Prime', 'A', 'NWT01084/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(759, 1085, 'Prince dutta', 'S/o Prem Dutta ', '2024-05-13', '2025-05-13', 'HDCA', '1085.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT01085/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(760, 1086, 'Puspinder ', 'S/o Sovinder Singh', '2024-05-16', '2024-09-16', 'BASIC', '1086.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01086/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(761, 1087, 'Suraj', 'S/o Sh. Parshuram Yadav', '2024-05-17', '2024-08-17', 'TALLY(PRIME)', '1087.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT01087/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(762, 1088, 'Purnima', 'Bablu', '2024-05-21', '2025-05-21', 'HDCA', '1088.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT01088/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(763, 1089, 'Mayank Dewett', 'S/o Kamaljeet  Dewett', '2024-05-22', '2025-09-22', 'HDCS(WEB+DGT)', '1089.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT01089/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(764, 1091, 'Khushi', 'Raman Jha', '2024-05-22', '2025-05-22', 'HDCA', '1091.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT01091/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(765, 1092, 'Neha', 'D/o Kusum Pal', '2024-05-24', '2024-09-24', 'BASIC', '1092.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01092/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(766, 1093, 'Gayatri', 'D/o Kusum Pal', '2024-05-24', '2024-09-24', 'BASIC', '1093.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01093/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(767, 1095, 'Manish kumar', 's/o Rajender pal', '2024-06-04', '2024-10-04', 'MARG', '1095.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01095/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(768, 1096, 'Cheshta bansal', 'D/o Mr.Naresh Kumar', '2024-06-05', '2025-10-05', 'HDCS(WEB+DGT)', '1096.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT01096/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(769, 1097, 'Arun Kumar', 's/o Shri Ram kumar', '2024-06-11', '2025-10-11', 'HDCS(WEB+DGT)', '1097.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT01097/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(770, 1099, 'Rahul', 'Lal Chand', '2024-06-12', '2025-02-12', 'DCA(PRIME)', '1099.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A', 'NWT01099/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(771, 1100, 'Sushmita ', ' Sukhpal Singh', '2024-06-12', '2025-06-12', 'HDCS(WEB)', '1100.jpg', 'Unknown', 12, NULL, 'A', 'NWT01100/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(772, 1101, 'Tannu Mittal', 'd/o Satish Kumar', '2024-06-13', '2024-10-13', 'BASIC', '1101.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01101/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(773, 1102, 'Aman', 'Dinesh', '2024-06-19', '2025-02-19', 'DCA(PRIME)', '1102.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT01102/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(774, 1103, 'Rimi Biswas', 'D/o Subhash Biswas', '2024-06-27', '2024-09-27', 'TALLY(PRIME)', '1103.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01103/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(775, 1104, 'Abhishek Kumar', 'Mr. Ram nath Sharma', '2024-06-27', '2024-10-27', 'BASIC', '1104.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01104/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(776, 1105, 'Lovenish Gupta', 'Lt. s/o Satish Gupta', '2024-06-29', '2024-10-29', 'BASIC', '1105.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01105/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(777, 1106, 'Himanshu ', 's/o  Anil Kumar', '2024-07-04', '2024-10-04', 'TALLY(PRIME)', '1106.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01106/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(778, 1107, 'Muskan', 'D/o Mr. Sunil Dutt', '2024-07-04', '2024-11-04', 'BASIC', '1107.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01107/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(779, 1110, 'Neha Kashyap', 'w/o Rohit Kashyap', '2024-07-10', '2024-11-10', 'BASIC', '1110.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01110/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(780, 1111, 'Deepanshu Gola', 's/o Hariom Gola ', '2024-07-13', '2024-11-13', 'BASIC', '1111.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01111/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(781, 1112, 'Sandeep Kumar', 's/o Mahender Kumar', '2024-07-15', '2024-10-15', 'Share Trading', '1112.jpg', 'Certificate in Share Trading and Investment', 3, 'Chart Analysis,Technical Analylsis & Fundamental Analysis', 'A', 'NWT01112/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(782, 1113, 'Nishant Nimesh', 's/o Govind singh', '2024-07-16', '2024-11-16', 'BASIC', '1113.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01113/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(783, 1114, 'Sneha  ', 'd/o Mr. Gopal Sah', '2024-07-18', '2024-10-18', 'ADV.EXCL', '1114.jpg', 'Certificate in Advance Excel', 3, 'MS-Excel, MIS & Visual Basic for Application', 'A+', 'NWT01114/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(784, 1115, 'Md. Arsh', 'Gufran Ahmad ', '2024-07-22', '2025-07-22', 'HDCS(WEB)', '1115.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01115/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(785, 1117, 'Varun', 'Deepak ', '2024-07-25', '2025-07-25', 'HDCS(WEB)', '1117.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01117/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(786, 1118, 'Altmas', 'Guddu', '2024-08-01', '2025-04-01', 'DCA(PRIME)', '1118.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT01118/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(787, 1119, 'Sujad', 'Mr. Guddu', '2024-08-01', '2025-08-01', 'HDCS(ACC)', '1119.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT01119/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(788, 1120, 'Parul Singh', 'Mr. Pardeep', '2024-08-02', '2024-12-02', 'BASIC', '1120.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01120/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(789, 1121, 'Anvi', 'Mr. Gyan Chand ', '2024-08-03', '2025-08-03', 'HDCS(WEB)', '1121.jpg', 'Unknown', 12, NULL, 'A', 'NWT01121/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(790, 1122, 'Dhananjay', 'Mr. Satish Kumar', '2024-08-05', '2024-12-05', 'BASIC', '1122.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01122/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(791, 1124, 'Adarsh Kumar', 's/o Omkar Nath Singh', '2024-08-13', '2024-11-13', 'ADV.EXCL', '1124.jpg', 'Certificate in Advance Excel', 3, 'MS-Excel, MIS & Visual Basic for Application', 'A', 'NWT01124/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(792, 1125, 'Abhishek  ', 's/o Mr. Dilip', '2024-08-13', '2025-08-13', 'HDCS(WEB)', '1125.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01125/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(793, 1126, 'Himanshu', 'Mr. Sanjay Yadav', '2024-08-20', '2025-04-20', 'DCA(PRIME)', '1126.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT01126/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(794, 1127, 'Sangam Bharti', 'Jai Prakash', '2024-08-21', '2025-08-21', 'HDCS(ACC)', '1127.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT01127/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(795, 1128, 'Prem', 'Sri Niwas ', '2024-08-22', '2025-08-22', 'HDCS(WEB)', '1128.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01128/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(796, 1129, 'Gulkesh Kamar', 'Md. Amin Uddin', '2024-08-31', '2025-08-31', 'HDCA', '1129.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT01129/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(797, 1130, 'Aarti ', 'Mr. Mukesh Kumar', '2024-09-09', '2026-01-09', 'HDCS(WEB+DGT)', '1130.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT01130/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(798, 1131, 'Manish Dang', 'Devender Kumar', '2024-09-03', '2024-12-03', 'ADV.EXCL', '1131.jpg', 'Certificate in Advance Excel', 3, 'MS-Excel, MIS & Visual Basic for Application', 'A+', 'NWT01131/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(799, 1133, 'Inderjeet Kaur', 'Jagmohan Singh', '2024-09-09', '2025-01-09', 'BASIC', '1133.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01133/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(800, 1134, 'Balbir Singh', 'Jagmohan Singh', '2024-09-09', '2025-01-09', 'BASIC', '1134.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01134/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(801, 1135, 'Ruchita Mehta', ' Mr. Jagat Singh', '2024-09-20', '2025-01-20', 'BASIC', '1135.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01135/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(802, 1136, 'Kashish Rajput', ' Mr. Vipin', '2024-09-20', '2025-01-20', 'BASIC', '1136.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01136/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(803, 1137, 'Vijay', 'Mr. Ranvir Singh', '2024-09-20', '2026-01-20', 'HDCS(WEB+DGT)', '1137.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A', 'NWT01137/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(804, 1138, 'Mohd Sami ', 'Mohd. Tahir', '2024-09-16', '2025-01-16', 'BASIC', '1138.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01138/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(805, 1141, 'Kavita Mehta', 'Devendra Singh', '2024-09-25', '2025-05-25', 'DCA(PRIME)', '1141.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT01141/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(806, 1142, 'Zhilik Mandal', 'Mr. Sukhen Mandal', '2024-09-24', '2025-09-24', 'HDCS(ACC)', '1142.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT01142/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(807, 1143, 'Mayank Gehlot', 'Ravinder Kumar', '2024-09-26', '2025-01-26', 'BASIC', '1143.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01143/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(808, 1144, 'Geeta', 'Raj Kumar Thakur', '2024-09-26', '2025-01-26', 'BASIC', '1144.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01144/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(809, 1145, 'Siddharth', 'Phool Kishore ', '2024-09-26', '2025-01-26', 'BASIC', '1145.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01145/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(810, 1146, 'Gulshan Kumar', 'Mr. Inder Bhan', '2024-09-11', '2025-01-11', 'BUSY', '1146.jpg', 'Certificate in Financial Accountancy with Busy Software', 4, 'Busy Software (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01146/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(811, 1147, 'Abhilash', 'Mr. Hemraj', '2024-09-26', '2025-09-26', 'HDCA', '1147.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT01147/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(812, 1148, 'Raja Kumar', 'Mr. Mahender', '2024-09-27', '2026-01-27', 'HDCS(WEB+DGT)', '1148.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT01148/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(813, 1149, 'Roshan Kumar', 'Mr. Pramod Kumar', '2024-09-27', '2025-09-27', 'HDCA', '1149.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT01149/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(814, 1150, 'shivani', 'noname', '2024-12-04', '2025-08-04', 'DCA(PRIME)', '1150.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A', 'NWT01150/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(815, 1151, 'Piyush', 'Sahdev', '2024-10-03', '2025-02-03', 'BASIC', '1151.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01151/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(816, 1152, 'Sumit singh', 'Balbir Singh', '2024-10-05', '2025-02-05', 'BASIC', '1152.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01152/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(817, 1153, 'Reema Sonkar', 'Deenanath Sonkar', '2024-10-08', '2025-02-08', 'BASIC', '1153.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01153/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(818, 1154, 'Rohit Kumar', 'Kishan Kumar', '2024-10-17', '2026-02-17', 'HDCS(WEB+DGT)', '1154.jpg', 'Hons. Diploma in Computer Application', 16, 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 'A+', 'NWT01154/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(819, 1155, 'Pooja', 'Ghanshyam', '2024-10-23', '2025-10-23', 'HDCS(ACC)', '1155.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT01155/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(820, 1156, 'Vijay Kumar', 'Ravinder prasad', '2024-11-06', '2025-03-06', 'EXCEL+PRIME', '1156.jpg', 'Certificate in Excel and Financial Accountancy', 4, 'Excel MIS & Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01156/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(821, 1157, 'Vaibhav Suri ', 'Kamal Suri', '2024-11-06', '2025-02-06', 'PYTHON', '1157.jpg', 'Unknown', 3, NULL, 'A+', 'NWT01157/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(822, 1158, 'Rihan Siddiqui', 'Hashim Siddiqui', '2024-11-07', '2025-03-07', 'BASIC', '1158.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01158/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(823, 1159, 'Hemant Gandhi', 'Nil', '2024-11-04', '2025-02-04', 'Share Trading', '1159.jpg', 'Certificate in Share Trading and Investment', 3, 'Chart Analysis,Technical Analylsis & Fundamental Analysis', 'A', 'NWT01159/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(824, 1160, 'Kartik ', 'Sita Ram', '2024-11-18', '2025-03-18', 'BASIC', '1160.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01160/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(825, 1161, 'Radha Kishan', 'Munna Lal', '2024-12-04', '2025-04-04', 'MARG', '1161.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT01161/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(826, 1162, 'Gunjan Kumar', 's/o Ramesh Kumar', '2024-11-26', '2025-02-26', 'TALLY(PRIME)', '1162.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01162/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(827, 1163, 'Dinesh Kumar', 'Rakesh Kumar', '2024-12-06', '2025-04-06', 'BASIC', '1163.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01163/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(828, 1164, 'Nishant Kumar', 'not forwarded', '2025-01-28', '2026-01-28', 'HDCA', '1164.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A+', 'NWT01164/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(829, 1165, 'Umashankar', 'Mr. Mahendra Kumar', '2024-11-29', '2025-05-29', 'ADV.EXCL+TALLY(PRIME)', 'IMG-20241130-WA0001.jpg', 'Diploma in Computer Appliation', 6, 'Advance Excel and Tally Prime', 'A+', 'NWT01165/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(830, 1166, 'Naresh sahu', 'Raj Bahadur ', '2024-11-30', '2025-02-28', 'TALLY(PRIME)', '1166.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01166/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(831, 1168, 'Hema  Gurnani', 'Nil', '2024-12-09', '2025-03-09', 'Share Trading', '1168.jpg', 'Certificate in Share Trading and Investment', 3, 'Chart Analysis,Technical Analylsis & Fundamental Analysis', 'A+', 'NWT01168/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(832, 1169, 'Abhishek Chaudhary', 'Basuki Nath Chaudhary', '2024-11-26', '2025-11-26', 'HDCS(ACC)', '1169.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT01169/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(833, 1170, 'Shantanu Sharma', 'Rajesh Sharma', '2024-12-11', '2025-04-11', 'BASIC', '1170.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01170/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(834, 1172, 'Pawan Kumar Gupta', 'Nanhe Lal Gupta', '2024-12-12', '2025-04-12', 'BASIC', '1172.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01172/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(835, 1173, 'Aakash Kumar', 'Dinesh Kumar ', '2024-12-16', '2025-12-16', 'HDCS(ACC)', '1173.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT01173/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(836, 1174, 'Sameer Ranjan', 'Unknown', '2024-12-16', '2025-03-16', 'TYPING', '1174.jpg', 'Unknown', 3, NULL, 'A', 'NWT01174/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(837, 1176, 'Vaishali sahu', 'Rajesh kumar', '2025-02-10', '2025-05-10', 'ADV.EXCL', '1176.jpg', 'Certificate in Advance Excel', 3, 'MS-Excel, MIS & Visual Basic for Application', 'A', 'NWT01176/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(838, 1177, 'Deepak Kumar', 'Mukesh Giri', '2025-02-13', '2025-05-13', 'TYPING', '1031.jpg', 'Unknown', 3, NULL, 'A', 'NWT01177/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(839, 1178, 'Pinki', 'not forwarded', '2025-01-15', '2025-04-15', 'TALLY(PRIME)', '1031.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A+', 'NWT01178/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(840, 1180, 'Dharmesh', 'not forwarded', '2025-01-20', '2026-01-20', 'HDCA', '1180.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A+', 'NWT01180/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(841, 1181, 'Jeet singh', 'Tejveer Singh', '2025-01-21', '2026-01-21', 'HDCA', '1181.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 'A', 'NWT01181/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(842, 1184, 'Nusrat Parveen', 'Md Gani', '2025-01-25', '2025-04-25', 'TALLY(PRIME)', '1184.jpg', 'Certificate in Financial Accountancy', 3, 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT01184/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(843, 1187, 'Madhavi Sharma', 'Raghav Sharma', '2025-01-30', '2025-09-30', 'DCA(PRIME)', '1187.jpg', 'Diploma in Computer Science', 8, 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 'A+', 'NWT01187/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(844, 1188, 'Umang Grover', 'Mr. Ramesh Kumar', '2025-02-01', '2025-05-01', 'PHP', '1188.jpg', 'Certificate in Programming Language(PHP)', 3, 'Programming Language with PHP and MYSQLI', 'A', 'NWT01188/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(845, 1189, 'Kishan Kumar', 'Jitender Kumar', '2025-02-02', '2025-06-02', 'BASIC', '1189.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A+', 'NWT01189/25', '2025-03-07 00:15:05', '2025-03-07 00:15:05'),
(846, 1190, 'Hardeep Kaur', 'Mr. Gurbachan Singh', '2025-02-07', '2026-02-07', 'HDCS(ACC)', '1190.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A', 'NWT01190/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(847, 1191, 'Mohammad Raza Zaidi', 'Taukir Hassan Zaidi', '2025-02-10', '2026-02-10', 'HDCS(ACC)', '1191.jpg', 'Hons. Diploma in Computer Application', 12, 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 'A+', 'NWT01191/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(848, 1192, 'Anuj', 'Balak Ram', '2025-02-11', '2025-06-11', 'BASIC', '1192.jpg', 'Certificate in Basic Computing', 4, 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 'A', 'NWT01192/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(849, 1193, 'VANSH DUA', 'MR. VIKASH DUA', '2006-02-19', '2007-02-19', 'HDCS(WEB)', '1193.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01193/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(850, 1194, 'Anjali', 'Ravinder', '2025-02-20', '2025-06-20', 'MARG', '1194.jpg', 'Certificate in Financial Accountancy', 4, 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 'A', 'NWT01194/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36'),
(851, 1195, 'SHIVANI', 'RAJU', '2024-02-20', '2025-02-20', 'HDCS(WEB)', '1195.jpg', 'Unknown', 12, NULL, 'A+', 'NWT01195/25', '2025-03-01 23:58:36', '2025-03-01 23:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_types`
--

CREATE TABLE `certificate_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certificate_types`
--

INSERT INTO `certificate_types` (`id`, `course_id`, `certificate_type`, `description`, `duration`, `created_at`, `updated_at`) VALUES
(628, 400, 'Certificate in Basic Computing', 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 4, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(629, 401, 'Certificate in Graphic Designing', 'Graphics in Corel Draw, Photoshop,Illustrator & Indesign.', 4, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(630, 402, 'Diploma in Computer Appliation', 'MS-Office(Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet) & Graphic in Corel Draw, Photoshop,Illustrator & Indesign', 8, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(631, 403, 'Hons. Diploma in Computer Application iwith digital Marketing', 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,HMTL.', 12, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(632, 404, 'Dipl. In Applied Web Development', 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Azax, PHP, MySqli.', 12, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(633, 405, 'Certificate in Financial Accountancy', 'Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(634, 430, 'Certificate in English Typing', 'Computerized English Typing with speed 35 words per minute.', 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(635, 454, 'Diploma in Computer Science', 'MS-Office, Tally Prime (Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll).', 8, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(636, 445, 'Hons. Diploma in Computer Application', 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 12, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(637, 409, 'Certificate in Programming Language', 'C Language, C++ Language, Data Structure and algorithm, html and Javascript.', 4, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(638, 407, 'Hons. Diploma in Computer Application', 'MS-Office,Graphics in Corel Draw, Photoshop,Illustrator & Indesign, HTML, CSS, Bootstrap, Javascript, Jquery, Ajax, PHP, MySqli,Digital Mkt.', 16, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(639, 411, 'Certificate in Programming Language(Python)', 'Python Language with MySql', 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(640, 412, 'Certificate in Financial Accountancy with Busy Software', 'Busy Software (Accounts, Invetory, Taxation with GST and Payroll).', 4, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(641, 413, 'Hons. Diploma in Computer Application', 'MS-Office, Tally Prime, Busy & Marg (Accounts, Inventory, Taxation with GST, TDS, TCS and Payroll.', 12, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(642, 414, 'Certificate in Programming Language(PHP)', 'Programming Language with PHP and MYSQLI', 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(643, 415, 'Unknown', NULL, 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(644, 404, 'Unknown', NULL, 12, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(645, 417, 'Certificate in Advance Excel', 'MS-Excel, MIS & Visual Basic for Application', 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(646, 406, 'Certificate in Financial Accountancy', 'English Language & MARG (Accounts, Invetory, Taxation with GST and Payroll).', 4, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(647, 419, 'Certificate in Share Trading and Investment', 'Chart Analysis,Technical Analylsis & Fundamental Analysis', 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(648, 420, 'Unknown', NULL, 72, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(649, 421, 'Certificate in English Language', 'English Language and english Grammer', 4, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(650, 422, 'Unknown', NULL, 4, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(651, 423, 'Unknown', NULL, 8, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(652, 424, 'Diploma in Computer Appliation', 'Advance Excel and Tally Prime', 6, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(653, 425, 'Unknown', NULL, 5, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(654, 402, 'Unknown', NULL, 8, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(655, 427, 'Unknown', NULL, 6, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(656, 428, 'Certificate in Excel and Financial Accountancy', 'Excel MIS & Tally Prime (Accounts, Invetory, Taxation with GST and Payroll).', 4, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(657, 429, 'Unknown', NULL, 5, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(658, 430, 'Unknown', NULL, 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(659, 431, 'Unknown', NULL, 6, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(660, 411, 'Unknown', NULL, 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(661, 433, 'Diploma in Computer Appliation', 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet) & Typing with speed of 40 Words Per Minutes.', 6, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(662, 440, 'Unknown', NULL, 4, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(663, 441, 'Unknown', NULL, 9, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(664, 442, 'Unknown', NULL, 8, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(665, 443, 'Certificate In Computer Application', NULL, 6, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(666, 444, 'Unknown', NULL, 8, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(667, 445, 'Hons. Diploma in Computer Application', 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Graphics in Corel Draw, Photoshop,Adv. Excel', 12, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(668, 446, 'English Language & Certificate in Financial Accountancy', 'MARG (Accounts, Invetory, Taxation with GST and Payroll).', 8, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(669, 447, 'Certificate in Video Editing', 'Certificate in Vedio Editing (Illustrator,After effects,Premire Pro )', 3, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(670, 448, 'Certificate in Graphic Designing', 'Graphics in Corel Draw, Photoshop.', 2, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(671, 449, 'Certificate In Computer Application', 'MS-Windows,MS-Office (Wordpad ,Ms-Word, Ms-Excel, Powerpoint ,Internet).', 6, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(672, 451, ' Diploma in Financial Accountancy', 'MARG (Accounts, Invetory, Taxation with GST and Payroll) & Busy Software (Accounts, Invetory, Taxation with GST and Payroll).', 6, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(673, 452, 'Diploma in Computer Application', 'MS-Office &  Python Language with MySql.', 6, '2024-12-24 05:49:42', '2024-12-24 05:49:42'),
(674, 453, 'Diploma in Computer Application', 'MS-Office,Tally Prime(Accounts, Inventory, Taxation with GST, TDS, TCS & Payroll),Adv. Excel.', 8, '2024-12-24 05:49:42', '2024-12-24 05:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_image` varchar(255) DEFAULT 'default_image.jpg',
  `course_title` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL DEFAULT 'General English',
  `course_desc` text DEFAULT NULL,
  `course_content` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL COMMENT 'Duration in months',
  `total_fees` decimal(10,2) DEFAULT NULL,
  `installments` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_url` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_image`, `course_title`, `course_name`, `course_desc`, `course_content`, `duration`, `total_fees`, `installments`, `created_at`, `updated_at`, `course_url`) VALUES
(400, 'wNUZg1Yru9qRYP6ahzVL8asYlM5ayLNm11TAsMgo.jpg', 'BASIC', 'BASIC', 'The Basic Computer Course is designed for individuals who are new to computers or want to improve their foundational skills. It provides a comprehensive understanding of essential computer operations, commonly used software, and the internet. Upon completing this course, students will have the confidence to use computers effectively for personal, academic, or professional purposes._x000D_\r\n_x000D_\r\nDuration: 4 months_x000D_\r\nMode: Classroom/Online_x000D_\r\nCertification: Yes', '<h2>basic computer course in Jahangirpuri</h2><p><a href=\"https://nicecomputerinstitute.nicewebtech.com/https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Nice Computer Institute</a>&nbsp;Provides with the best job oriented basic computer course in Jahangirpuri. This course comprises of :</p><h2><strong style=\"color: rgb(153, 51, 0);\">Course Outlines</strong></h2><p><span style=\"color: rgb(153, 51, 0);\">Introduction to Computer Systemï¿½</span></p><p><span style=\"color: rgb(153, 51, 0);\">Basic Computer Concept</span></p><p><span style=\"color: rgb(153, 51, 0);\">Computer Organisation</span></p><p><span style=\"color: rgb(153, 51, 0);\">Windows OS</span></p><p><span style=\"color: rgb(153, 51, 0);\">Microsoft Office</span></p><p><span style=\"color: rgb(153, 51, 0);\">MS Word</span></p><p><span style=\"color: rgb(153, 51, 0);\">MS Excel</span></p><p><span style=\"color: rgb(153, 51, 0);\">MS PowerPoint</span></p><p><span style=\"color: rgb(153, 51, 0);\">Internet &amp; its usageï¿½</span></p><h1>Empowering Futures:</h1><h2>Your Gateway to Basic Computer Education at Nice Computer Institute, Jahangirpuri</h2><p><a href=\"https://nicewebtechnologies.com/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Nice Web Technoloiges</a></p><p><strong>Why Choose Nice Computer Institute?</strong></p><p>At Nice Computer Institute, we understand the importance of a strong foundation in computer education. Whether youâ€™re a beginner taking your first steps into the digital realm or someone looking to enhance their existing skills, our institute caters to all levels of learners.</p><p><strong>Comprehensive Courses for All Skill Levels</strong></p><p>Our carefully crafted curriculum covers a spectrum of basic computer courses, ensuring that each student finds a path that aligns with their goals. From computer fundamentals and essential software applications to basic programming and web development, our courses are designed to equip you with the skills demanded by todayâ€™s competitive job market.</p><p><strong>Experienced and Supportive Faculty</strong></p><p>Our team of experienced instructors is passionate about teaching and dedicated to your success. They bring real-world industry insights into the classroom, ensuring that you not only grasp the theoretical concepts but also gain practical, hands-on experience. Our faculty understands that every learner is unique, and they are committed to providing personalized attention to foster an environment of growth and understanding.</p><p><strong>State-of-the-Art Infrastructure</strong></p><p>Nice Computer Institute boasts state-of-the-art facilities, providing a conducive environment for effective learning. Our well-equipped computer labs are outfitted with the latest technology, giving students the opportunity to apply their knowledge in a hands-on setting. We believe in learning by doing, and our infrastructure reflects this commitment.</p><p><strong>Career Guidance and Placement Support</strong></p><p>Your success is our priority, and that doesnâ€™t end with the completion of your course. Nice Computer Institute provides career guidance and placement support to help you transition seamlessly into the workforce. Our industry connections and partnerships open doors to exciting opportunities, ensuring that you step confidently into the professional world.</p><p><strong>Community Engagement and Networking</strong></p><p>Being part of Nice Computer Institute means joining a community that values collaboration and networking. We organize workshops, seminars, and events to facilitate interactions with industry professionals, creating a platform for you to expand your network and stay updated on the latest trends in the tech industry.</p><p><strong>Enroll Today, Transform Tomorrow</strong></p><p>Embark on your journey into the world of computers with Nice Computer Institute. Whether youâ€™re a student, professional, or someone seeking a career change, our institute welcomes you to explore the endless possibilities that basic computer education can offer.</p><p>Visit us in Jahangirpuri, and let Nice Computer Institute be your partner in realizing your potential in the digital era. Enroll today, and together, letâ€™s shape a future where your skills are the keys to success!</p>', 4, 4100.00, 4, '2024-12-13 08:17:18', '2025-03-02 00:20:10', 'basic'),
(402, 'NioWDt2RVxqrhTZMsEKLRbfou4Jb9PrstkgQ2wFW.jpg', 'DCA(DTP)', 'DCA(DTP)', '<h1>DCA (DTP) Course at Computer Institute in Jahangirpuri, Delhi</h1> <p>Master essential computer and desktop publishing skills at Nice Web Technologies, the top-rated Computer Institute in Jahangirpuri, Delhi. Our comprehensive DCA (DTP) course includes MS Office (Word, Excel, PowerPoint, Paint), Internet usage, and professional graphic designing tools like CorelDRAW, Photoshop, and Illustrator.</p>', '<h2>Course Content</h2><ul><li><strong>MS Paint</strong>: Learn the basics of digital drawing and editing.</li><li><strong>MS Word</strong>: Create, format, and manage professional documents.</li><li><strong>MS PowerPoint</strong>: Design impactful presentations with animations and multimedia.</li><li><strong>MS Excel</strong>: Master spreadsheets, formulas, and data management tools.</li><li><strong>Internet Usage</strong>: Explore email, online research, and web navigation for daily tasks.</li><li><strong>CorelDRAW</strong>: Develop vector graphic design skills for logos, brochures, and posters.</li><li><strong>Adobe Photoshop</strong>: Edit photos and create stunning graphics with advanced tools.</li><li><strong>Adobe Illustrator</strong>: Create illustrations, logos, and high-quality vector designs.</li></ul><p>form <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\">Nice Computer institute in Jahangirpuri</a></p>', 8, 18100.00, 8, '2024-12-13 08:17:18', '2024-12-28 22:27:37', 'dca-dtp'),
(403, 'rc4SkuPykqRhkEitbFExLjHpbMXcgWeKIeTmUynN.jpg', 'HDCA(WEB)', 'HDCA(WEB)', 'All-in-One Professional Computer Course: The HDCA (Hardware and Digital Computer Applications) course at Nice Web Technologies in Jahangirpuri, Delhi, is a 12-month comprehensive program that equips you with essential computer skills for career advancement.', '<p>Designed for Local Aspirants: This course includes foundational to advanced knowledge in Excel, Tally Prime, and Graphic Design, making it perfect for students and job seekers in Jahangirpuri and nearby areas.</p><ul><li><strong>Basic &amp; Advanced Excel (MIS)</strong>: Master formulas, pivot tables, data analysis, and reporting.</li><li><strong>Tally Prime</strong>: Learn financial accounting, GST, payroll management, and inventory control.</li><li><strong>Graphic Design</strong>: Gain expertise in CorelDRAW, Adobe Photoshop.</li><li>HTML</li><li><strong>Duration</strong>: 12 months of practical, career-oriented training.</li></ul><p>Join the <strong>best computer institute in Jahangirpuri, Delhi</strong>, and boost your professional skills with the HDCA course. For more details, visit <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\">computerinstituteindelhijahangirpuri.com</a>.</p>', 12, 18350.00, 12, '2024-12-13 08:17:18', '2024-12-28 08:01:20', 'hdca-web'),
(404, 'BJnp5IwbzTYSrVgMdrMTIYqkXpaPcBjNCm6UthVe.jpg', 'HDCS(WEB)', 'HDCS(WEB)', 'Nice Web Technologies offers professional training in web designing course. Learn from the experts and get ahead in your career.', '<p><strong>Web Designing course</strong>&nbsp;with Nice Web Technologies</p><p><a href=\"https://nicewebtechnologies.com/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Nice Web Technologies</a>&nbsp;offers professional training in&nbsp;<strong>web designing course</strong>. Learn from the experts and get ahead in your career.</p><p>The course includes all the latest tools and technologies that every web designer needs to know. The training is conducted by Professional&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/graphic-design\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">graphic design</a>&nbsp;&amp; Web Design instructor from&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Nice Computer Institute</a>, who has more than 15 years of experience in designing websites.</p><p>If youâ€™re a student who wants to learn more about&nbsp;<strong>web design course</strong>, youâ€™ve come to the right place. This will help you build your skills and create beautiful websites packed with information and resources . Whether youâ€™re a beginner or a pro, youâ€™ll find something here to help you take your web design skills to the next</p><p>Your transition into&nbsp;<strong>web design course</strong>&nbsp;from Nice Web Technologies when learned is not just about learning the basics skill but also There are so many things that you need to know and learn in order to create an amazing website, such as HTML, CSS, JavaScript, AJAX, MySQL, PHP and Node.js. Find out if you have what it takes to be a web designer by enrolling in the course today!</p><p><strong>Learn Web Design Course</strong>&nbsp;from Nice Computer Institute the Course Includes HTML,CSS,JAVASCRIPT,AZAX,JQUERY,MYSQL,PHP,NODE.JS and many more.</p><p>This course is for students who want to learn about web design and development. The course includes topics like HTML, CSS, JavaScript, AJAX, jQuery, MySQL, PHP, Node.js, and many more. This course is perfect for students who want to learn how to create websites from scratch or improve their existing skills.</p><h2>Introduction to Web Development</h2><p>in this section, we will be discussing the basics of&nbsp;<strong>a web designing course</strong>&nbsp;and some of the essential skills. We will also be providing some tips on how to choose the right web development course for you.</p><p>Web design is the process of creating and maintaining websites. It involves a lot of different aspects, such as website design, web content development, server-side scripting, client-side scripting, and database management.</p><p>As a web designer, you need to have a good understanding of all these different aspects in order to be able to create a successful website.</p><p>The first step in becoming a web developer is to choose the right web development course. There are many different courses available, so it is important to find one that suits your needs and interests.</p><p>If you are interested in learning about all aspects of web development, then you should enroll in a comprehensive course that covers everything from website design to server-side scripting. However, if you only want to focus on one specific aspect of web development, such as<strong>&nbsp;website design course</strong>, then you can enroll in a course that only covers that topic.</p><p>Once you have chosen the right course, it is time to start learning!</p><p>What are some of the top courses provided by computer training institutes in Delhi?</p><p><br></p><p>1.&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/digital-marketing\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Digital Marketing</a></p><p>2.<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/autocad\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">AutoCAD (Computer Aided Design)</a></p><p>3.<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/marg\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Marg accountancy course (ERP-9)</a></p><p>4.<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/tally\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Tally accountancy course (ERP-9)</a></p><p>5.<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/busy\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Busy accountancy course</a></p><p>6.<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/advance-excel\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Advance Excel Course</a></p><p>7.<a href=\"https://nicecomputerinstitute.nicewebtech.com/best-graphic-designing-and-multimedia-institute-nice-computer-institute/?customize_changeset_uuid=2b0f001c-8c0b-4cec-a78c-3fb0939bcb06&amp;customize_messenger_channel=preview-1\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Graphic Designing Course</a></p><p>8.<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/web-design\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Web Designing Course</a></p><p>9.<a href=\"https://nicecomputerinstitute.nicewebtech.com/courses/python-institute-jahangirpuri/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Python Programming Language</a></p><p>10<a href=\"https://nicecomputerinstitute.nicewebtech.com/courses/programming-languages/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">.C++ Programming Language</a></p>', 12, 30350.00, 12, '2024-12-13 08:17:18', '2025-02-01 19:11:10', 'web-designing'),
(405, 'FgEeHnpgOQAWv6LxQS97HpWs0b7yD8bPob2lJkcl.png', 'TALLY(PRIME)', 'TALLY(PRIME)', 'This Tally Prime course is designed for students and professionals who want to manage accounts, inventory, payroll, GST, TDS, and taxation efficiently. The program will provide you with practical skills in using Tally Prime software, the latest version of Tally, a widely used accounting and business management software in India._x000D_\r\n_x000D_\r\nWho Should Enroll:_x000D_\r\nBusiness Owners_x000D_\r\nAccounting Students_x000D_\r\nProfessionals in Finance and Accounting_x000D_\r\nEntrepreneurs_x000D_\r\nAnyone looking to learn Tally for career advancement', '<p>Welcome to Nice Computer Institute, your premier destination for Tally Prime training in Jahangirpuri.</p><p><strong>About the Tally Prime Course:</strong></p><p>Discover a comprehensive Tally Prime course designed to equip you with essential&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/busy\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">skills</a>&nbsp;in Tally Prime, a widely-used accounting software. Our program covers key aspects such as Tally Prime features, GST implementation, and practical accounting applications.</p><p><strong>Key Features of Our Tally Prime Course:</strong></p><ul><li><strong>Hands-on Training:</strong>&nbsp;Learn through practical experience with the Tally Prime software.</li><li><strong>Expert Guidance:</strong>&nbsp;Benefit from the expertise of experienced instructors.</li><li><strong>GST Implementation:</strong>&nbsp;Gain in-depth knowledge and skills in implementing GST.</li><li><strong>Real-world Projects:</strong>&nbsp;Apply your learning to real-world accounting scenarios and projects.</li><li><strong>Interactive Learning:</strong>&nbsp;Engage in an interactive and supportive learning environment.</li><li><strong>Placement Assistance:</strong>&nbsp;Access placement assistance for successful course completion.</li></ul><p><strong>Course Curriculum:</strong></p><p>Our Tally Prime course covers a range of topics, including:</p><ul><li>Introduction to Tally Prime</li><li>Basic and Advanced Accounting in Tally</li><li>GST Setup and Implementation</li><li>Tally Prime Features and Functions</li><li>Practical Applications and Case Studies</li></ul><p><strong>Enrollment Information:</strong></p><p>Ready to enhance your accounting skills with Tally Prime? Enroll in our course today. For details on course fees, schedules, and enrollment, please contact us:</p><ul><li>Email: nicewebtechnologies@gmail.com</li><li>Phone: 9312945741</li></ul><p>Tally Institute in Jahangirpuri course at&nbsp;<a href=\"https://www.nicewebtechnologies.com/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Nice Web Technologie</a>s module contain:</p><ol><li><strong>Accountancy Management</strong>â€“ At&nbsp;<a href=\"https://computerinstituteindelhijhangirpuri.com/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Nice Computer Institute</a>&nbsp;you get to study Basics of Accountancy, Balancing Methods, Foreign Currency, Interest calculation, Cost Categories &amp; Cost Centers. Budgets, Bank Reconciliation, Cheque management, Reversing Journal &amp; Memorandum vouchers &amp; MIS Reporting</li><li><strong>Inventory Management</strong>â€“<a href=\"https://nicecomputerinstitute.nicewebtech.com/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Nice Computer Institute</a>&nbsp;Item Creation, Multi Unit, Go-down, Batch-wise entries, Quotation, Order, Challan, Delivery, Expired Item Details, Transfer of material, Stock Categories, Bill of material, Price -list, Tracking, Rejection inward -outward &amp; MIS Reporting</li><li><strong>Taxation</strong>â€“ Also you learn complete tally with GST (Intra-State &amp; Inter-State), Multi GST Billing, TDS, TCS, Service Tax, Excise &amp; MIS Reporting.</li><li><strong>Payroll</strong>â€“ Employee creation, Group, Attendance, Leave, Salary- Slip Creation, MIS-Reporting.</li></ol><p>Tally, recognized as one of the most primitive software solutions, has endured the test of time, dedicating over 20+ years to refining technology for the benefit of small and medium businesses. Through daring pursuits of unconventional ideas, addressing unthinkable scenarios, and resolving everyday business challenges, Tally consistently provides solutions that not only simplify life but also foster business growth.</p><p>Simultaneously, Nice Computer Institute seamlessly integrates Tally into its curriculum, ensuring students not only acquire proficiency in the software but also grasp the intricacies of accountancy associated with it. Additionally, transcending traditional education, the institute actively facilitates the initial steps of studentsâ€™ professional journeys by offering first job placement opportunities.</p><p>By creating a comprehensive learning environment, Nice Computer Institute empowers students with both the technical prowess of Tally and the practical insights necessary for a successful career placement. Essentially, the institute acts as a bridge, connecting theoretical knowledge with real-world applications and opening doors to promising career paths for its students.</p>', 3, 7850.00, 3, '2024-12-13 08:17:18', '2025-02-06 00:15:58', 'tally-prime'),
(406, 'Cjr2kvObbl3YqIbA4C3wqMct0Xkrt9vcNpcJ42aT.png', 'MARG', 'MARG', 'Welcome to Nice Computer Institute in Jahangirpuri, where we bring you comprehensive training in MARG ERP Course at Nice Computer Institute, a leading accounting and inventory management software. Our MARG ERP course is designed to equip students with the skills and knowledge needed to effectively use this powerful business management tool.', '<h2>Course Overview</h2><p><strong>Course Title:</strong>&nbsp;MARG ERP Training</p><p><strong>Duration:</strong>&nbsp;18 Weeks</p><p><strong>Mode:</strong>&nbsp;Onsite</p><p><strong>Course Code:</strong>&nbsp;MARG101</p><h2>What You Will Learn</h2><ul><li><strong>Introduction to MARG ERP:</strong>&nbsp;Understand the fundamentals and features of MARG ERP software.</li><li><strong>Accounting with MARG:</strong>&nbsp;Learn how to manage and maintain accurate financial records using MARG ERP.</li><li><strong>Inventory Management:</strong>&nbsp;Gain proficiency in handling inventory, tracking stock levels, and managing supply chains.</li><li><strong>GST Compliance:</strong>&nbsp;Explore the GST module within MARG ERP, ensuring compliance with tax regulations.</li><li><strong>Practical Application:</strong>&nbsp;Get hands-on experience through practical exercises and real-world scenarios.</li></ul><h2>Why Choose MARG ERP at&nbsp;<a href=\"http://nicewebtechnologies.com/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Nice Computer Institute</a>?</h2><ul><li><strong>Experienced Instructors:</strong>&nbsp;Learn from industry professionals with extensive experience in MARG ERP and accounting practices.</li><li><strong>Practical Training:</strong>&nbsp;Our curriculum emphasizes practical skills, ensuring you can apply what you learn in a real business setting.</li><li><strong>Placement Assistance:</strong>&nbsp;Benefit from our dedicated placement cell that actively connects students with job opportunities in the field.</li></ul><h2>Course Schedule (Spring 2024)</h2><ul><li><strong>Start Date:</strong>Feb 1, 2024</li><li><strong>End Date:</strong>&nbsp;March 15, 2024</li><li><strong>Location:</strong>&nbsp;Nice Computer Institute, A1-9/10, A Block Rd, Bhalswa Jahangirpuri, Delhi, 110033, India</li></ul><h2>Enroll Now!</h2><p>Donâ€™t miss the opportunity to enhance your skills and open doors to new career possibilities. Enroll in our MARG ERP course at Nice Computer Institute today!</p><p>For more information and enrollment details,&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/courses\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">visit our course page</a>.</p><p>Contact at : 9312945741</p>', 4, 10600.00, 4, '2024-12-13 08:17:18', '2024-12-27 02:26:10', 'marg'),
(407, 'ii3HZIk0yichADOGygjNWIhGLlevyXse2O3IQc2H.png', 'HDCS(WEB+DGT)', 'HDCS(WEB+DGT)', 'Dive into the world of Digital Marketing with our comprehensive course. Learn SEO, social media marketing, PPC, content marketing, email marketing, and analytics from industry experts. Gain hands-on experience and certification to kickstart or level up your career. Enroll now and become a digital marketing pro!', '<h4><strong>Welcome to the Ultimate Digital Marketing Course</strong></h4><p>Are you ready to unlock the power of digital marketing and create campaigns that convert? At <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\"><strong>Nice Computer Institute</strong></a><strong> in Jhangirpuri</strong>, we offer an all-in-one Digital Marketing course designed for beginners and professionals alike.</p><p><br></p><h3><strong>Why Choose Our </strong><a href=\"https://www.nicewebtechnologies.com\" target=\"_blank\"><strong>Digital Marketing</strong></a><strong> Course?</strong></h3><ul><li><strong>Expert Trainers:</strong> Learn from experienced professionals who bring years of expertise to the table.</li><li><strong>Practical Learning:</strong> Work on live projects to build real-world skills.</li><li><strong>Flexible Schedules:</strong> Choose from weekday, weekend, or online classes to suit your lifestyle.</li><li><strong>Certification:</strong> Receive industry-recognized certification upon course completion.</li></ul><h3><strong>What You ll Learn:</strong></h3><h4><strong>Module 1: Introduction to Digital Marketing</strong></h4><ul><li>Understanding the basics of digital marketing</li><li>Difference between traditional and digital marketing</li><li>Digital marketing career opportunities</li></ul><h4><strong>Module 2: Search Engine Optimization (SEO)</strong></h4><ul><li>Keyword research and on-page SEO techniques</li><li>Off-page SEO strategies: Backlink building and outreach</li><li>Technical SEO essentials for better rankings</li></ul><h4><strong>Module 3: Social Media Marketing (SMM)</strong></h4><ul><li>Creating powerful campaigns on Facebook, Instagram, LinkedIn, and more</li><li>Growing your audience with organic and paid strategies</li><li>Measuring ROI from social media efforts</li></ul><h4><strong>Module 4: Pay-Per-Click Advertising (PPC)</strong></h4><ul><li>Introduction to Google Ads and Bing Ads</li><li>Setting up effective ad campaigns for maximum ROI</li><li>Remarketing strategies to re-engage potential customers</li></ul><h4><strong>Module 5: Content Marketing</strong></h4><ul><li>Crafting compelling content strategies</li><li>Blogging, video creation, and infographics</li><li>Understanding the buyerâ€™s journey and content mapping</li></ul><h4><strong>Module 6: Email Marketing</strong></h4><ul><li>Building a subscriber list that converts</li><li>Writing impactful email campaigns</li><li>Tools and platforms for email automation</li></ul><h4><strong>Module 7: Analytics and Reporting</strong></h4><ul><li>Using Google Analytics and other tools to measure performance</li><li>Generating reports and insights for data-driven decisions</li><li>Continuous optimization of marketing strategies</li></ul><h3><strong>Course Highlights:</strong></h3><ul><li>60+ hours of instructor-led training</li><li>Access to premium tools like SEMrush, Ahrefs, and Mailchimp</li><li>Free eBooks and templates for marketing campaigns</li><li>Post-course placement assistance</li></ul><h3><strong>Who Should Join?</strong></h3><ul><li>Students seeking a career in digital marketing</li><li>Entrepreneurs aiming to grow their business online</li><li>Working professionals looking to upgrade their skills</li><li>Freelancers and consultants</li></ul><h3><strong>Enroll Today!</strong></h3><p>Have questions or need more information? Fill out our contact form, and weâ€™ll get back to you soon. Visit: <a href=\"https://www.computerinstituteindelhijahangirpuri.com/contact\" target=\"_blank\">Contact Us</a>.</p>', 16, 40350.00, 16, '2024-12-13 08:17:18', '2025-02-01 19:14:55', 'digital-marketing'),
(408, 'oYkuLedH9eYl86jqz8BT2enren7vmpPtl4KAOFf7.jpg', 'HDCA(EXCL)', 'HDCA(EXCL)', 'All-in-One Professional Computer Course: HDCA\r\nBoost Your Career with the Best Computer Training in Jahangirpuri, Delhi\r\n\r\nAt Nice Computer Institute in Jahangirpuri, a trusted name in computer education, the HDCA (Hardware and Digital Computer Applications) course offers an all-inclusive 12-month program. It is designed to develop versatile computer skills, making you job-ready in today’s competitive market.', '<h4><strong>Course Highlights:</strong></h4><ul><li><strong>Duration:</strong> 12 Months</li><li><strong>Key Skills Covered:</strong></li><li class=\"ql-indent-1\"><strong>Advanced Excel</strong>: Data analysis, pivot tables, formulas, macros, and business reporting.</li><li class=\"ql-indent-1\"><strong>Tally Prime</strong>: GST filing, accounting, and financial management.</li><li class=\"ql-indent-1\"><strong>Graphic Design</strong>: Expertise in CorelDRAW, Photoshop, Illustrator, and InDesign for creative professionals.</li><li class=\"ql-indent-1\"><strong>Computer Hardware Basics</strong>: Troubleshooting, assembling, and maintaining hardware systems.</li><li class=\"ql-indent-1\"><strong>Digital Applications</strong>: Mastery of essential tools for office productivity and digital workflows.</li></ul><h4><strong>Why Choose HDCA at Nice Computer Institute in Jahangirpuri?</strong></h4><ul><li><strong>Local Expertise:</strong> Tailored for students and job seekers in <strong>Jahangirpuri</strong> and nearby areas.</li><li><strong>Hands-On Training:</strong> Real-world projects and case studies to enhance practical knowledge.</li><li><strong>Experienced Faculty:</strong> Learn from certified instructors with years of industry experience.</li><li><strong>Affordable Fees with Discounts:</strong> Special offers for early enrollments!</li></ul><h4><strong>Who Should Enroll?</strong></h4><ul><li><strong>Students:</strong> Build a strong foundation in computer applications for higher studies and internships.</li><li><strong>Job Seekers:</strong> Gain industry-relevant skills to kick-start a career in IT, accounts, or design.</li><li><strong>Entrepreneurs:</strong> Master tools to manage and grow your business efficiently.</li></ul><h4><strong>Location:</strong></h4><p>Visit us at <strong>Nice Computer Institute in Jahangirpuri</strong>, near Da Pizza Palace, A1-9/10, A Block Road.</p><h4><strong>Enroll Today!</strong></h4><p>Don’t miss the chance to advance your skills with Jahangirpuri’s No.<strong>1 Computer Institute</strong>! Call us at <strong>9312945741</strong> or email <strong>admin@computerinstituteindelhijahangirpuri.com</strong>.</p>', 12, 18350.00, 12, '2024-12-13 08:17:18', '2024-12-28 08:32:55', 'hdca-excel'),
(409, 'PLZboZGVTFoxNDyG3NAWiWIuUVdb6nUKvMMR26BK.png', 'C Language', 'C Language', 'C Language Course in Jahangirpuri | Nice Computer Institute\r\nLearn C Programming at Jahangirpuri\'s Best Computer Institute\r\nWelcome to Nice Computer Institute, the most trusted computer training center in Jahangirpuri, Delhi. Our C Language Course is designed for beginners, students, and professionals who want to build a strong foundation in programming.\r\n\r\nWhether you’re preparing for college, job interviews, or want to start your coding journey, our structured course ensures you master C Programming with confidence.', '<h3><strong>Why Choose Nice Computer Institute for C Programming?</strong></h3><ul><li><strong>25+ Years of Experience</strong> in computer education.</li><li><strong>Qualified Instructors</strong> with real-world programming expertise.</li><li><strong>Practical Classes</strong> with hands-on coding sessions.</li><li><strong>Flexible Timings</strong> for students and working professionals.</li><li><strong>Affordable Fees</strong> with 20% special discount.</li><li><strong>Focus on Local Students</strong> from Jahangirpuri and nearby areas.</li></ul><h3><strong>Course Highlights: What You Will Learn</strong></h3><p>Our C Language syllabus is tailored to ensure step-by-step learning with real-life examples and practical exercises:</p><ol><li><strong>Introduction to C Programming</strong></li></ol><ul><li class=\"ql-indent-1\">What is C Language?</li><li class=\"ql-indent-1\">History, Features, and Importance of C</li><li class=\"ql-indent-1\">Setting Up Development Tools</li></ul><ol><li><strong>Data Types and Variables</strong></li></ol><ul><li class=\"ql-indent-1\">Variables, Constants, and Keywords</li><li class=\"ql-indent-1\">Data Types: int, float, char, and more</li><li class=\"ql-indent-1\">Operators: Arithmetic, Logical, and Bitwise</li></ul><ol><li><strong>Control Flow in C</strong></li></ol><ul><li class=\"ql-indent-1\">Conditional Statements: If, Else, Switch</li><li class=\"ql-indent-1\">Loops: For, While, and Do-While</li><li class=\"ql-indent-1\">Break, Continue, and Goto</li></ul><ol><li><strong>Functions in C</strong></li></ol><ul><li class=\"ql-indent-1\">Function Declaration, Definition, and Call</li><li class=\"ql-indent-1\">Recursive Functions</li><li class=\"ql-indent-1\">Passing Arguments and Return Values</li></ul><ol><li><strong>Arrays and Strings</strong></li></ol><ul><li class=\"ql-indent-1\">Single and Multi-dimensional Arrays</li><li class=\"ql-indent-1\">String Manipulation Functions</li><li class=\"ql-indent-1\">Pointer Basics</li></ul><ol><li><strong>Pointers and Memory Management</strong></li></ol><ul><li class=\"ql-indent-1\">Introduction to Pointers</li><li class=\"ql-indent-1\">Dynamic Memory Allocation: Malloc, Calloc, Free</li></ul><ol><li><strong>Structures and Unions</strong></li></ol><ul><li class=\"ql-indent-1\">Defining and Using Structures</li><li class=\"ql-indent-1\">Unions and Their Applications</li></ul><ol><li><strong>File Handling</strong></li></ol><ul><li class=\"ql-indent-1\">Reading and Writing Files</li><li class=\"ql-indent-1\">Working with Binary and Text Files</li></ul><ol><li><strong>Practical Projects</strong></li></ol><ul><li class=\"ql-indent-1\">Building Small Applications</li><li class=\"ql-indent-1\">Debugging and Error Solving</li></ul><h3><strong>Who Should Join This Course?</strong></h3><ul><li>Students pursuing <strong>BCA, MCA, or Engineering</strong>.</li><li>Beginners with no programming experience.</li><li>Professionals who want to strengthen their coding skills.</li><li>Anyone preparing for <strong>job interviews</strong> or college exams.</li></ul><h3><strong>Course Duration and Fees</strong></h3><ul><li><strong>Duration</strong>: 12 Weeks (Flexible Morning and Evening Batches)</li><li><strong>Course Fees</strong>: ₹8000 <strong>(Limited Period Discount: 20% Off)</strong></li></ul><blockquote><strong>Offer Alert</strong>: Enroll before <strong>3rd November 2024</strong> to celebrate our <strong>25 Years of Excellence</strong> and avail this special discount.</blockquote><h3><strong>Why Learn C Programming?</strong></h3><ul><li><strong>C is the foundation</strong> of all modern programming languages like C++, Java, and Python.</li><li>Widely used in <strong>system programming, embedded systems, and application development</strong>.</li><li>Helps to strengthen your understanding of <strong>data structures and algorithms</strong>.</li></ul><h3><strong>Enroll Now at Nice Computer Institute</strong></h3><p>Take the first step towards a successful programming career by joining <strong>Nice Computer Institute</strong>, the most reliable <strong>computer training center in Jahangirpuri</strong>.</p><p>📍 <strong>Address</strong>: A1-9/10, A Block Rd, Near Da Pizza Palace, Bhalswa Jahangirpuri, Delhi, 110033.</p><p>📞 <strong>Call Us</strong>: +91 9312945741</p><p>🌐 <strong>Website</strong>: <a href=\"#\" target=\"_blank\">computerinstituteindelhijahangirpuri.com</a></p><h3><strong>Frequently Asked Questions (FAQs)</strong></h3><p><strong>1. Who can join this course?</strong></p><p>Anyone with basic computer knowledge can join. No prior programming experience is needed.</p><p><strong>2. Do you provide a certificate?</strong></p><p>Yes, a course completion certificate is provided after successful training.</p><p><strong>3. Are weekend batches available?</strong></p><p>Yes, we offer <strong>weekend and flexible batches</strong> to suit your schedule.</p><p><strong>4. How do I enroll?</strong></p><p>Contact us at +91 9312945741 or visit our institute directly.</p>', 4, 9100.00, 4, '2024-12-13 08:17:18', '2024-12-28 08:01:44', 'c-language'),
(410, 'ryVKR3ZmawkVmiWyPDEWYNRO4CzhqLOP6ZoM0OS9.jpg', 'HDCS(WEB+DGT)', 'HDCS(WEB+DGT)', 'Master Web Development and Digital Marketing: Our HDCS (Web + Digital) course in Jahangirpuri, Delhi, is a comprehensive program that combines web development with cutting-edge digital marketing strategies, empowering you with job-ready skills to excel in the digital era._x000D_\r\n_x000D_\r\nTailored for Local Aspirants: Designed for students and professionals in Jahangirpuri and surrounding areas, this course covers everything from HTML, CSS, and JavaScript to SEO, social media marketing, and paid advertising.', '<ul><li><strong>Web Development</strong>: HTML5, CSS3, JavaScript, Bootstrap, PHP, and MySQL.</li><li><strong>Digital Marketing</strong>: Search Engine Optimization (SEO), Social Media Marketing (SMM), Pay-Per-Click (PPC), Email Marketing, and Analytics.</li><li><strong>Design Tools</strong>: Adobe Photoshop, Canva, and Illustrator for branding and UI/UX.</li><li><strong>Real-World Projects</strong>: Live projects and internships for hands-on experience.</li></ul><p>Enroll in the best computer institute in Jahangirpuri, Delhi, and elevate your career with HDCS (Web + Digital). Visit our site <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\">computerinstituteindelhijahangirpuri.com</a> for more details!</p><h3><br></h3>', 16, 40350.00, 16, '2024-12-13 08:17:18', '2024-12-28 08:03:31', 'web-design+digital-marketing'),
(411, 'c4iaypLyiI4XRdJBdVHTYskSotWgxVWCM041YaX9.png', 'PYTHON', 'PYTHON', 'Learn Python Programming from Scratch: The Python course at Nice Web Technologies, Jahangirpuri, Delhi, is a comprehensive program designed for beginners and professionals looking to master Python for web development, data analysis, automation, and more.\r\n_x000D_\r\nTailored for Local Aspirants: Perfect for students, developers, and tech enthusiasts in Jahangirpuri and nearby areas, this course combines foundational programming concepts with practical projects to build real-world skills.', '<ul><li><strong>Introduction to Python</strong>: Variables, data types, loops, and conditionals.</li><li><strong>Advanced Python</strong>: Functions, OOP concepts, file handling, and error handling.</li><li><strong>Data Structures</strong>: Lists, tuples, dictionaries, and sets.</li><li><strong>Libraries and Frameworks</strong>: NumPy, Pandas, Matplotlib, Flask, and Django basics.</li><li><strong>Applications</strong>: Web development, data analysis, scripting, and automation.</li><li><strong>Project Work</strong>: Hands-on projects for real-world experience.</li><li><strong>Duration</strong>: Flexible schedule with career-focused training.</li></ul><p>Enroll in the <strong>best computer institute in Jahangirpuri, Delhi</strong>, and take the first step toward a rewarding career in Python programming. Visit <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\">computerinstituteindelhijahangirpuri.com</a> for more details and enrollment.</p>', 3, 10950.00, 3, '2024-12-13 08:17:18', '2024-12-29 22:17:22', 'python'),
(412, 'GKvoQR66IUSLaaNHlQWIlUXtbeo7esOIIjqqLoDc.png', 'BUSY', 'BUSY', 'Welcome to the BUSY Accounting Software Course_x000D_\r\nTake your accounting and financial management skills to the next level with our professional BUSY software training. At Nice Web Technologies, we offer a structured and practical course designed to help you efficiently handle business accounting, GST compliance, and financial reporting with ease.', '<h3><strong>Why Choose Our BUSY Course Nice Computer Institute in Jahangirpuri?</strong></h3><ul><li><strong>Expert Trainers:</strong> Learn from <a href=\"https://www.computerinstituteindelhijahangirpuri.com/course/tally-prime\" target=\"_blank\">certified accountants</a> with real-world experience.</li><li><strong>Comprehensive Curriculum:</strong> Covers basic to advanced features of BUSY software.</li><li><strong>Practical Learning:</strong> Hands-on training with live projects.</li><li><strong>Industry Certification:</strong> Boost your career prospects with our certification.</li></ul><h3><strong>What Will You Learn?</strong></h3><h4><strong>Module 1: Introduction to </strong><a href=\"https://nicewebtechnologies.com\" target=\"_blank\"><strong>BUSY Accounting Software</strong></a></h4><ul><li>Overview of BUSY software and its applications</li><li>Installation and setup for businesses</li><li>Understanding the user interface</li></ul><h4><strong>Module 2: Basic Accounting Operations</strong></h4><ul><li>Creating masters for accounts, items, and ledgers</li><li>Recording day-to-day transactions</li><li>Managing cash and bank accounts</li></ul><h4><strong>Module 3: GST Billing and Compliance</strong></h4><ul><li>Configuring GST settings in BUSY</li><li>Generating GST invoices and e-way bills</li><li>Filing GST returns using BUSY</li></ul><h4><strong>Module 4: Inventory Management</strong></h4><ul><li>Maintaining stock levels and managing orders</li><li>Creating sales and purchase orders</li><li>Generating stock valuation reports</li></ul><h4><strong>Module 5: Payroll Management</strong></h4><ul><li>Setting up employee payroll and salary structures</li><li>Processing monthly payroll and generating reports</li><li>Managing PF, ESI, and TDS compliance</li></ul><h4><strong>Module 6: Financial Reporting and Analysis</strong></h4><ul><li>Generating balance sheets, profit &amp; loss statements, and trial balances</li><li>Analyzing financial reports for decision-making</li><li>Exporting reports to Excel and other formats</li></ul><h3><strong>Who Should Enroll?</strong></h3><ul><li><strong>Business Owners:</strong> Streamline accounting and financial management.</li><li><strong>Students:</strong> Build career-ready accounting skills.</li><li><strong>Professionals:</strong> Upgrade knowledge for better job opportunities.</li></ul><h3><strong>Course Highlights:</strong></h3><ul><li>40+ hours of instructor-led training</li><li>Access to BUSY software for practice</li><li>Real-life case studies for better understanding</li><li>Free eBooks and GST compliance guides</li></ul><h3><strong>Enroll Today!</strong></h3><p>Take the first step toward mastering BUSY Accounting Software. Simplify your financial management and become a certified expert.</p><p><strong>Contact Us:</strong></p><p>For more details, call us at <strong>9312945741</strong> or visit our <a href=\"https://www.computerinstituteindelhijahangirpuri.com/contact\" target=\"_blank\"><strong>Contact Page</strong></a> to register.</p>', 4, 6350.00, 4, '2024-12-13 08:17:18', '2024-12-27 02:30:49', 'busy'),
(413, 've4FWPwWiAUPMpFjKOdsBTyNiIjJvglJ1sqgh5lA.jpg', 'HDCS(ACC)', 'HDCS(ACC)', 'Master Accounting Skills with Comprehensive Training: The HDCS (Accounts) course at Nice Web Technologies in Jahangirpuri, Delhi, is a 12-month professional program combining essential accounting software and tools with practical training to prepare you for a successful career in finance and accounting._x000D_\r\n_x000D_\r\nPerfect for Local Aspirants: This program is tailored for students and job seekers in Jahangirpuri and surrounding areas, offering in-depth training in Tally Prime, Busy, Marg, Excel (MIS), and basic computer skills.', '<h3>HDCS (Account)</h3><ul><li><strong>Basic Computer Applications</strong>: Foundational knowledge of MS Office, Windows, and file management.</li><li><strong>Tally Prime</strong>: Accounting, GST compliance, payroll, and inventory management.</li><li><strong>Busy Software</strong>: Advanced financial accounting and GST tools for business management.</li><li><strong>Marg ERP</strong>: Billing, inventory, and enterprise management tools for SMEs.</li><li><strong>Excel (MIS)</strong>: Data analysis, advanced formulas, pivot tables, and dashboards.</li><li><strong>Practical Training</strong>: Real-world accounting projects for hands-on learning.</li><li><strong>Duration</strong>: 12 months of intensive training for accounting and finance careers.</li></ul><p>Join the <strong>best computer institute in Jahangirpuri, Delhi</strong>, and gain expertise in accounting software with HDCS (Accounts). For more details, visit <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\">computerinstituteindelhijahangirpuri.com</a> or contact us today!</p>', 12, 24350.00, 12, '2024-12-13 08:17:18', '2024-12-28 08:05:57', 'accounts'),
(414, 'KjCUoFn7lo98FkqICO69qtA5MZHkLjr7kdRwXyhI.jpg', 'PHP', 'PHP', 'Comprehensive Accounting Skills Training: The DCA (Diploma in Computer Applications) Tally course at Nice Web Technologies, Jahangirpuri, Delhi, is an 8-month specialized program designed to build a strong foundation in accounting and financial management._x000D_\r\n_x000D_\r\nIdeal for Aspiring Accountants: Covering both Basic Computer Applications and Tally Prime, this course is tailored for students and professionals in Jahangirpuri and nearby areas looking to advance their careers in the accounting field.', '<ul><li><strong>Basic Computer Applications</strong>: Introduction to MS Office, Windows, and essential tools for everyday tasks.</li><li><strong>Tally Prime Essentials</strong>: Accounting basics, GST, inventory management, and financial reporting.</li><li><strong>Practical Projects</strong>: Real-world scenarios for hands-on experience in accounting and financial software.</li><li><strong>Duration</strong>: 8 months of interactive, career-focused training.</li></ul><p>Enroll in the <strong>best computer institute in Jahangirpuri, Delhi</strong>, and start your journey toward becoming a skilled accountant. Visit <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\">computerinstituteindelhijahangirpuri.com</a> for details and enrollment.</p>', 3, 6100.00, 3, '2024-12-13 08:17:18', '2024-12-27 02:31:49', 'php');
INSERT INTO `courses` (`id`, `course_image`, `course_title`, `course_name`, `course_desc`, `course_content`, `duration`, `total_fees`, `installments`, `created_at`, `updated_at`, `course_url`) VALUES
(417, 'uUiLuxijnF0Az5Mr0HoPgR2PLVF8ZyzQ5XJktkfn.png', 'ADV.EXCL', 'ADV.EXCL', 'Advanced Excel Course\r\nThe Advanced Excel Course is crafted for individuals who already have a basic understanding of Excel and wish to elevate their skills to an advanced level. This comprehensive course covers advanced functions, data analysis, and automation techniques including Macros and VBA. Students will gain the expertise to manage complex data, automate repetitive tasks, and create sophisticated reports.', '<h1>ADV.EXCL<strong> Course at </strong><a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\"><strong>Nice Computer Institute in Jahangirpuri</strong></a><strong>, Delhi</strong></h1><h2><strong>Introduction:</strong></h2><p>Welcome to Nice Computer Institute in Jahangirpuri, Delhi, your premier destination for advancing your Excel skills. Our Advance Excel course is meticulously crafted to empower individuals with comprehensive knowledge and practical skills necessary for excelling in data analysis, reporting, and decision-making.</p><h2><strong>Why Choose Our Advance Excel Course?</strong></h2><ol><li><strong>Expert Instructors:</strong>&nbsp;Learn from seasoned professionals with extensive experience in Excel and data analytics.</li><li><strong>Hands-on Training:</strong>&nbsp;Furthermore, our curriculum emphasizes practical exercises and real-world scenarios, ensuring effective learning.</li><li><strong>Customized Learning:</strong>&nbsp;Tailored to suit your pace and proficiency level, our course guarantees maximum comprehension and skill development.</li><li><strong>Job-Relevant Skills:</strong>&nbsp;Acquire highly sought-after skills, thereby enhancing your career prospects across industries.</li><li><strong>Small Class Sizes:</strong>&nbsp;Moreover, benefit from personalized attention and guidance in our intimate class settings.</li><li><strong>Flexible Schedule:</strong>&nbsp;Additionally, choose from flexible class timings to accommodate your busy schedule.</li></ol><h2><strong>Course Curriculum:</strong></h2><p>Our Advance Excel course covers a comprehensive range of topics, including but not limited to:</p><ul><li><strong>Advanced functions and formulas</strong></li><li><strong>Data visualization techniques</strong></li><li><strong>PivotTables and PivotCharts</strong></li><li><strong>Macros and VBA programming</strong></li><li><strong>Data analysis and modeling</strong></li><li><strong>Financial modeling and forecasting</strong></li><li><strong>Power Query and Power Pivot</strong></li><li><strong>Advanced charting techniques</strong></li></ul><h2><strong>Who Should Attend:</strong></h2><ul><li>Working professionals looking to enhance their Excel skills for improved job performance.</li><li>Students seeking to augment their resumes with valuable skills for better career opportunities.</li><li>Entrepreneurs and business owners aiming to streamline their data analysis processes for informed decision-making.</li></ul><h2><strong>Why Excel Matters:</strong></h2><p>Excel transcends its role as a spreadsheet program; it becomes a powerful tool for data analysis, reporting, and decision-making across various industries. Proficiency in Excel is a valuable asset in todayâ€™s competitive job market, opening doors to lucrative career opportunities and enabling professionals to make data-driven decisions confidently.</p><h2><strong>Enroll Today:</strong></h2><p>Donâ€™t miss out on the opportunity to advance your Excel skills and elevate your career. Contact us today to enroll in our Advance Excel course at Nice Computer Institute in Jahangirpuri, Delhi. Let us empower you with the knowledge and skills you need to succeed in the digital age.</p><h2><strong>Contact Information:</strong></h2><p>For inquiries and enrollment, please contact us at:</p><p>Phone: +91 9312945741</p><p>Email: nicewebtechnologies@gmail.com</p><p>Visit our website for more information:</p><p><a href=\"http://computerinsituteindelhijahangirpuri.com/\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">computerinsituteindelhijahangirpuri.com</a></p><p>Follow us on social media for updates and insights:</p><ul><li><a href=\"https://www.facebook.com/nicewebtechnologies\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Facebook</a></li><li><a href=\"https://www.twitter.com/nicewebtechno\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Twitter</a></li><li><a href=\"https://www.youtube.com/nicewebtechnologies\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">YouTube</a></li><li><a href=\"https://www.instagrm.com/nicewebtechnologies\" target=\"_blank\" style=\"background-color: rgba(255, 255, 255, 0); color: rgb(0, 33, 71);\">Instagram</a></li></ul><p><br></p>', 3, 7850.00, 3, '2024-12-13 08:17:18', '2024-12-28 08:32:01', 'advance-excel'),
(419, 'PXoxjRayUXDIoefVCMdil5Amfs4rQHnrzStiexWB.png', 'Share Trading', 'Share Trading', 'Professional Share Trading Course\r\nMaster the Art of Trading with Jahangirpuri’s Trusted Computer Institute\r\n\r\nAt Nice Computer Institute in Jahangirpuri, Delhi, the Share Trading Course is designed for beginners and aspiring traders who wish to understand stock market fundamentals, technical analysis, and advanced trading strategies.', '<h4><strong>Course Highlights:</strong></h4><ul><li><strong>Comprehensive Stock Market Training:</strong> Learn the basics of stock trading, market trends, and financial instruments.</li><li><strong>Technical Analysis:</strong> Master the art of reading charts, identifying patterns, and making data-driven decisions.</li><li><strong>Advanced Trading Strategies:</strong> Gain expertise in day trading, swing trading, and long-term investment planning.</li><li><strong>Real-World Practice:</strong> Hands-on training using live trading simulations and tools.</li></ul><h4><strong>Why Choose Nice Computer Institute in Jahangirpuri?</strong></h4><ul><li><strong>Local Expertise:</strong> Tailored for students, job seekers, and entrepreneurs in <strong>Jahangirpuri</strong> and nearby areas.</li><li><strong>Personalized Training:</strong> Small batches for individual attention and interactive learning.</li><li><strong>Industry-Experienced Trainers:</strong> Learn from professionals with years of trading experience.</li><li><strong>Affordable Fees:</strong> High-quality training at a price that fits your budget.</li></ul><h4><strong>Who Should Enroll?</strong></h4><ul><li><strong>Beginners:</strong> Learn how to get started in the stock market with confidence.</li><li><strong>Aspiring Traders:</strong> Master trading techniques to maximize your returns.</li><li><strong>Entrepreneurs &amp; Professionals:</strong> Understand market behavior to grow your wealth.</li></ul><h4><strong>Location:</strong></h4><p>Find us at <strong>Nice Computer Institute in Jahangirpuri</strong>, near Da Pizza Palace, A1-9/10, A Block Road.</p><h4><strong>Enroll Today!</strong></h4><p>Unlock your potential to trade confidently and profitably. Call us at <strong>9312945741</strong> or email <strong>admin@computerinstituteindelhijahangirpuri.com</strong> to secure your spot today!</p>', 3, 15000.00, 3, '2024-12-13 08:17:18', '2024-12-28 08:29:20', 'share-trading'),
(420, '3q6GXexk9f9PpH6slnArxglH79Z0i62l5z9FE5pq.png', 'BCA', 'BCA', 'The Bachelor of Computer Applications (BCA) is a 3-year undergraduate program designed for students aspiring to build a career in the IT industry. This course provides a strong foundation in computer science, programming, and application development, making students industry-ready.', '<p>Course Content</p><p><br></p><p>1. Core Programming Languages</p><p><br></p><p>C Programming: Fundamentals of programming, data structures, and algorithms.</p><p><br></p><p>C++: Object-oriented programming concepts.</p><p><br></p><p>Java: Application development and core Java principles.</p><p><br></p><p>Python: Advanced programming for machine learning and data analytics.</p><p><br></p><p><br></p><p>2. Web Development</p><p><br></p><p>HTML &amp; CSS: Basic structure and styling of web pages.</p><p><br></p><p>JavaScript: Dynamic and interactive web applications.</p><p><br></p><p>PHP: Server-side scripting.</p><p><br></p><p>React/Angular: Advanced frameworks for modern web development.</p><p><br></p><p><br></p><p>3. Database Management Systems</p><p><br></p><p>MySQL: Database creation and management.</p><p><br></p><p>MongoDB: NoSQL database for modern applications.</p><p><br></p><p>SQL queries and database security principles.</p><p><br></p><p><br></p><p>4. Networking and Cybersecurity</p><p><br></p><p>Fundamentals of networking.</p><p><br></p><p>Cybersecurity basics, including ethical hacking.</p><p><br></p><p>Protocols, firewalls, and data protection techniques.</p><p><br></p><p><br></p><p>5. Software Engineering</p><p><br></p><p>Software development life cycle (SDLC).</p><p><br></p><p>Agile and Scrum methodologies.</p><p><br></p><p>Project planning and management.</p><p><br></p><p><br></p><p>6. Digital Marketing Basics</p><p><br></p><p>SEO, SEM, and social media strategies.</p><p><br></p><p>Tools like Google Analytics and Google Ads.</p><p><br></p><p>Content creation and marketing.</p><p><br></p><p><br></p><p>7. Advanced Topics</p><p><br></p><p>Data science and analytics.</p><p><br></p><p>Artificial intelligence and machine learning basics.</p><p><br></p><p>Mobile app development with Android Studio.</p><p><br></p><p><br></p><p>8. Practical Projects</p><p><br></p><p>Live web application development.</p><p><br></p><p>E-commerce website creation.</p><p><br></p><p>Real-world software development projects.</p><p><br></p><p><br></p><p><br></p><p>---</p><p><br></p><p>Who Should Enroll?</p><p><br></p><p>Students who have completed 10+2 in any stream.</p><p><br></p><p>Aspiring IT professionals looking for a strong foundation in computer science.</p><p><br></p><p>Individuals aiming for careers in software development, web development, or IT management.</p><p><br></p><p><br></p><p><br></p><p>---</p><p><br></p><p>Transform your career with the BCA course and become an IT professional ready for tomorrow’s challenges!</p>', 36, 72100.00, 36, '2024-12-13 08:17:18', '2025-01-13 13:31:34', 'bca'),
(421, '7o6E0o6TWROBNCuAT6ehSc3z6N3zOdUP4WC8XruL.jpg', 'Best English Language Course in Jahangirpuri | Spoken English &amp; Grammar Classes', 'English', 'Meta Title: Best English Language Course in Jahangirpuri | Spoken English & Grammar Classes\r\nMeta Description: Join the top English Language Course in Jahangirpuri! Learn spoken English, grammar, and communication skills with certified trainers. Boost your career prospects today!\r\n\r\nURL: https://www.computerinstituteindelhijahangirpuri.com/post/english-language-course-jahangirpuri', '<h3><strong>English Language Course in Jahangirpuri</strong></h3><p><strong>Master English for Career Growth &amp; Daily Communication</strong></p><p>Are you searching for the&nbsp;<strong>best English Speaking Classes in Jahangirpuri</strong>? Our&nbsp;<strong>English Language Course</strong>&nbsp;is designed to help students, professionals, and job seekers achieve fluency in spoken and written English. Located in the heart of Jahangirpuri, our computer institute combines modern teaching methods with practical training to ensure you gain confidence in real-world communication.</p><h3><strong>Key Features of Our English Language Course</strong></h3><p>✅&nbsp;<strong>Certified Trainers</strong>: Learn from experienced instructors specializing in English grammar, vocabulary, and pronunciation.</p><p>✅&nbsp;Grammatical Skills<strong> Focus</strong>: Tailored for residents of Jahangirpuri, Delhi, with flexible timings for working professionals.</p><p>✅&nbsp;<strong>Practical Training</strong>: Interactive sessions, group discussions, and role-plays to improve speaking skills.</p><p>✅&nbsp;<strong>Affordable Fees</strong>: High-quality education at competitive prices.</p><p>✅&nbsp;<strong>Certification</strong>: Receive a recognized certificate upon course completion.</p><p><a href=\"https://www.computerinstituteindelhijahangirpuri.com/contact\" target=\"_blank\"><strong>Enroll Now</strong></a>&nbsp;to join the&nbsp;<strong>top Spoken English Institute in Jahangirpuri</strong>!</p><h3><strong>Course Content: English Language Training</strong></h3><p>Our curriculum covers all aspects of English language mastery:</p><ol><li><strong>Grammar Fundamentals</strong></li></ol><ul><li class=\"ql-indent-1\">Tenses, prepositions, articles, and sentence structure.</li><li class=\"ql-indent-1\">Common errors and corrections.</li></ul><ol><li><strong>Spoken English &amp; Pronunciation</strong></li></ol><ul><li class=\"ql-indent-1\">Daily conversation practice.</li><li class=\"ql-indent-1\">Accent neutralization and fluency drills.</li></ul><ol><li><strong>Business Communication</strong></li></ol><ul><li class=\"ql-indent-1\">Email writing, presentations, and formal dialogues.</li><li class=\"ql-indent-1\">Vocabulary for interviews and workplace interactions.</li></ul><ol><li><strong>Writing Skills</strong></li></ol><ul><li class=\"ql-indent-1\">Essays, reports, and creative writing.</li><li class=\"ql-indent-1\">Editing and proofreading techniques.</li></ul><ol><li><strong>Listening &amp; Comprehension</strong></li></ol><ul><li class=\"ql-indent-1\">Audio-visual exercises for improved understanding.</li></ul><p><a href=\"https://www.computerinstituteindelhijahangirpuri.com/course_list\" target=\"_blank\"><strong>Explore Other Courses</strong></a>&nbsp;like Basic Computer Training and Advanced Excel at our Jahangirpuri institute.</p><h3><strong>Why Choose Us?</strong></h3><ul><li><strong>Local SEO Advantage</strong>: As a leading&nbsp;<strong>computer institute in Jahangirpuri</strong>, we prioritize community-focused learning.</li><li><strong>Job-Oriented Training</strong>: Enhance your resume with English proficiency for roles in IT, BPO, and customer service.</li></ul><p><strong>Small Batches</strong>: Personalized attention for faster progres</p><h3><strong>SEO-Optimized Keywords Included</strong></h3><ul><li>English Language Course in Jahangirpuri</li><li>Spoken English Classes near me</li><li>Best English Speaking Institute in Delhi</li><li>English Grammar Training Jahangirpuri</li><li>Certified English Course</li><li>Affordable English Classes</li><li>English Fluency for Jobs</li><li>Communication Skills Development</li></ul><h3><strong>External &amp; Internal Links</strong></h3><p><strong>Internal Links</strong>:</p><ul><li><a href=\"https://www.computerinstituteindelhijahangirpuri.com/courses_list\" target=\"_blank\">Computer Courses in Jahangirpuri</a></li><li><a href=\"https://www.computerinstituteindelhijahangirpuri.com/contact\" target=\"_blank\">Contact Us</a></li><li><a href=\"https://www.computerinstituteindelhijahangirpuri.com/placement\" target=\"_blank\">Placement Support</a></li></ul><p><strong>External Links</strong>:</p><ul><li><a href=\"https://www.cambridgeenglish.org/\" target=\"_blank\">Cambridge English Resources</a>&nbsp;(for grammar guidelines)</li><li><a href=\"https://learnenglish.britishcouncil.org/\" target=\"_blank\">British Council Learning Tips</a></li></ul><h3><strong>Enroll Today!</strong></h3><p>Boost your confidence and career with our&nbsp;<strong>English Language Course in Jahangirpuri</strong>. Limited seats available!</p><p>📞&nbsp;<strong>Call Now</strong>: [Insert Phone Number]</p><p>📍&nbsp;<strong>Visit Us</strong>: [Insert Address], Jahangirpuri, Delhi</p><p><strong>Alt Text for Images</strong>:</p><ul><li>\"English Language Class in Jahangirpuri\"</li><li>\"Spoken English Training at Computer Institute Jahangirpuri\"</li></ul><p><strong>Schema Markup</strong>: Add course duration, fees, and ratings for enhanced local SEO visibility.</p><p><strong>Optimized for Local SEO</strong>: Mentions of \"Jahangirpuri,\" \"Delhi,\" and neighborhood-specific keywords ensure higher Google rankings. Internal linking drives traffic to other pages, while external links to authoritative sites boost credibility.</p><p><a href=\"https://chat.deepseek.com/a/chat/s/c927939a-73d8-46ef-9536-0729a9a445b1#home\" target=\"_blank\"><strong>Back to Homepage</strong></a>&nbsp;|&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/course_list\" target=\"_blank\"><strong>View All Courses</strong></a></p><p><br></p><p><br></p>', 4, 12350.00, 4, '2024-12-13 08:17:18', '2025-03-02 00:14:47', 'english'),
(422, 'V1nx4i3Cs4Bt6TqZZr9NNvyPOuaLqnNtzR8IRWkf.jpg', 'IELTS', 'IELTS', 'IELTS 4-Months Course \r\nAchieve Your Desired IELTS Band Score: The IELTS course at Nice Web Technologies, Jahangirpuri, Delhi, is a focused 4-months program designed to prepare students for the IELTS Academic and General Training exams. Whether you aim to study abroad or migrate, this course equips you with the skills and strategies to excel in all four sections of the test.\r\n\r\nPerfect for Local Aspirants: Tailored for learners in Jahangirpuri and nearby areas, our IELTS course combines expert guidance, practice tests, and personalized feedback to ensure success.', '<p><br></p><h3>IELTS 4-Months Course</h3><p><strong>Achieve Your Desired IELTS Band Score</strong>: The IELTS course at Nice Web Technologies, Jahangirpuri, Delhi, is a focused 4-months program designed to prepare students for the IELTS Academic and General Training exams. Whether you aim to study abroad or migrate, this course equips you with the skills and strategies to excel in all four sections of the test.</p><p><strong>Perfect for Local Aspirants</strong>: Tailored for learners in Jahangirpuri and nearby areas, our IELTS course combines expert guidance, practice tests, and personalized feedback to ensure success.</p><p><br></p><h3>IELTS Course </h3><ul><li><strong>Listening Module</strong>:</li><li class=\"ql-indent-1\">Understanding accents and practicing with real-life scenarios.</li><li class=\"ql-indent-1\">Strategies for note-taking and improving comprehension.</li><li><strong>Reading Module</strong>:</li><li class=\"ql-indent-1\">Skimming, scanning, and detailed reading techniques.</li><li class=\"ql-indent-1\">Managing time effectively across different types of passages.</li><li><strong>Writing Module</strong>:</li><li class=\"ql-indent-1\">Task 1: Report writing for Academic and letter writing for General.</li><li class=\"ql-indent-1\">Task 2: Essay writing with a focus on structure, coherence, and grammar.</li><li><strong>Speaking Module</strong>:</li><li class=\"ql-indent-1\">Improving fluency, pronunciation, and confidence.</li><li class=\"ql-indent-1\">Mock speaking tests with constructive feedback.</li><li><strong>Mock Tests and Assessments</strong>:</li><li class=\"ql-indent-1\">Regular practice tests to track progress and identify areas for improvement.</li><li><strong>Duration</strong>: 3 months of intensive training with flexible timings.</li></ul><p>Join the <strong>best IELTS training institute in Jahangirpuri, Delhi</strong>, and take the first step toward achieving your international dreams. Visit <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\">computerinstituteindelhijahangirpuri.com</a> to learn more and register today!</p>', 4, 14350.00, 4, '2024-12-13 08:17:18', '2024-12-28 08:09:16', 'ielts'),
(423, 'lBz6Dc2ZvBfRdEKvV9k8PHGWuPL7KdPcRZlgEJpA.png', 'MARG+TALLY', 'MARG+TALLY', 'MARG + TALLY Course at Nice Computer Institute, Jahangirpuri\r\n\r\nLooking to master accounting and inventory software? Enroll in our MARG + TALLY Course at Nice Computer Institute in Jahangirpuri, Delhi. This comprehensive program is designed to equip you with practical skills in Tally Prime and MARG ERP, the most widely used tools for managing accounting, GST compliance, and inventory.', '<p>Key Features of the Course:</p><p><br></p><p>Hands-on training in Tally Prime and MARG ERP.</p><p><br></p><p>Learn GST calculations, billing, and inventory management.</p><p><br></p><p>Industry-relevant curriculum tailored for job readiness.</p><p><br></p><p>Expert trainers with real-world experience.</p><p><br></p><p><br></p><p>Why Choose Us?</p><p><br></p><p>At Nice Computer Institute, we focus on delivering job-oriented training with practical exposure. Our courses are perfect for beginners and professionals looking to upskill.</p><p><br></p><p>For more information on related courses like Advanced Excel and Busy Accounting, explore our website or visit us at:</p><p>A1-9/10, A Block Rd, near Da Pizza Palace, Bhalswa Jahangirpuri, Jahangirpuri, Delhi, 110033</p><p><br></p><p>Contact Us:</p><p><br></p><p>📞 9312945741</p><p>📧 nicewebtechnologies@gmail.com</p><p><br></p><p>Transform your career prospects by learning the skills employers demand. <a href=\"tel:9312945741\" target=\"_blank\">Enroll Now</a></p>', 8, 3100.00, 8, '2024-12-13 08:17:18', '2025-01-13 13:37:11', 'marg+tally'),
(424, 'iRtdZkYru7.jpeg', 'ADV.EXCL+TALLY(PRIME)', 'ADV.EXCL+TALLY(PRIME)', NULL, NULL, 6, 21350.00, 6, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'adv.excl+tally(prime)'),
(425, 'iRtdZkYru7.jpeg', 'TYPING+(DCA)PRIME', 'TYPING+(DCA)PRIME', NULL, NULL, 5, 6350.00, 5, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'typing+(dca)prime'),
(427, 'iRtdZkYru7.jpeg', 'TALLY+EXCL', 'TALLY+EXCL', NULL, NULL, 6, 12350.00, 6, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'tally+excl'),
(428, 'iRtdZkYru7.jpeg', 'EXCEL+PRIME', 'EXCEL+PRIME', NULL, NULL, 4, 24850.00, 4, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'excel+prime'),
(429, 'iRtdZkYru7.jpeg', 'BASIC+EXCL(MIS)', 'BASIC+EXCL(MIS)', NULL, NULL, 5, 30350.00, 5, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'basic+excl(mis)'),
(430, 'iRtdZkYru7.jpeg', 'TYPING', 'TYPING', NULL, NULL, 3, 2250.00, 3, '2024-12-13 08:17:18', '2024-12-17 08:51:54', 'typing'),
(431, 'iRtdZkYru7.jpeg', 'ADV. Exl + DCA(Prime)', 'ADV. Exl + DCA(Prime)', 'Accelerate Your Accounting Skills: The Tally Prime + Advanced Excel course at Nice Web Technologies in Jahangirpuri, Delhi, is a specialized program designed for students and professionals seeking expertise in financial accounting and data analysis._x000D_\n_x000D_\nPerfect for Local Aspirants: Tailored for learners in Jahangirpuri and nearby areas, this course equips you with practical knowledge of Tally Prime and advanced Excel tools, crucial for a career in accounting or MIS reporting.', NULL, 6, 8350.00, 6, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'adv. exl + dca(prime)'),
(432, 'iRtdZkYru7.jpeg', 'PYTHON', 'PYTHON', NULL, NULL, 3, 9950.00, 3, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'python'),
(433, 'iRtdZkYru7.jpeg', 'BASIC+TYPING', 'BASIC+TYPING', NULL, NULL, 6, 5350.00, 6, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'basic+typing'),
(440, 'iRtdZkYru7.jpeg', 'Graphic + MultiMedia', 'Graphic + MultiMedia', NULL, NULL, 4, 18350.00, 4, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'graphic + multimedia'),
(441, 'iRtdZkYru7.jpeg', 'BASIC+EXCL+TALLY(PRIME)', 'BASIC+EXCL+TALLY(PRIME)', NULL, NULL, 9, 6500.00, 9, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'basic+excl+tally(prime)'),
(442, 'iRtdZkYru7.jpeg', 'BASIC+MARG', 'BASIC+MARG', NULL, NULL, 8, 15600.00, 8, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'basic+marg'),
(443, 'iRtdZkYru7.jpeg', 'BASIC+ADV. EXL', 'BASIC+ADV. EXL', NULL, NULL, 6, 7850.00, 6, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'basic+adv. exl'),
(444, 'iRtdZkYru7.jpeg', 'Adv.Excel+Marg', 'Adv.Excel+Marg', NULL, NULL, 8, 15500.00, 8, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'adv.excel+marg'),
(445, 'iRtdZkYru7.jpeg', 'HDCA', 'HDCA', 'All-in-One Professional Computer Course: The HDCA (Hardware and Digital Computer Applications) course at Nice Web Technologies in Jahangirpuri, Delhi, is a 12-month comprehensive program that equips you with essential computer skills for career advancement._x000D_\r\n_x000D_\r\nDesigned for Local Aspirants: This course includes foundational to advanced knowledge in Excel, Tally Prime, and Graphic Design, making it perfect for students and job seekers in Jahangirpuri and nearby areas.', 'All-in-One Professional Computer Course: The HDCA (Hardware and Digital Computer Applications) course at Nice Web Technologies in Jahangirpuri, Delhi, is a 12-month comprehensive program that equips you with essential computer skills for career advancement._x000D_\r\n_x000D_\r\nDesigned for Local Aspirants: This course includes foundational to advanced knowledge in Excel, Tally Prime, and Graphic Design, making it perfect for students and job seekers in Jahangirpuri and nearby areas.', 12, 18350.00, 12, '2024-12-13 08:17:18', '2024-12-31 12:01:57', 'hdca'),
(446, 'iRtdZkYru7.jpeg', 'MARG + ENG', 'MARG + ENG', NULL, NULL, 8, 7850.00, 8, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'marg + eng'),
(447, 'iRtdZkYru7.jpeg', 'Video Editing', 'Video Editing', NULL, NULL, 3, 15100.00, 3, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'video editing'),
(448, 'iRtdZkYru7.jpeg', 'DTP', 'DTP', NULL, NULL, 2, 5350.00, 2, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'dtp'),
(449, 'iRtdZkYru7.jpeg', 'CCA', 'CCA', NULL, NULL, 6, 10350.00, 6, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'cca'),
(450, 'iRtdZkYru7.jpeg', 'WEB+PYTHON', 'WEB+PYTHON', NULL, NULL, 16, 40350.00, 16, '2024-12-13 08:17:18', '2024-12-17 08:53:39', 'web + python'),
(451, 'iRtdZkYru7.jpeg', 'TALLY+BUSY', 'TALLY+BUSY', NULL, NULL, 6, 9800.00, 6, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'tally+busy'),
(452, 'iRtdZkYru7.jpeg', 'BASIC+PYTHON', 'BASIC+PYTHON', NULL, NULL, 6, 18100.00, 6, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'basic+python'),
(453, 'iRtdZkYru7.jpeg', 'BASIC+ADV. EXCL+TALLY', 'BASIC+ADV. EXCL+TALLY', NULL, NULL, 8, 13600.00, 8, '2024-12-13 08:17:18', '2024-12-13 08:17:18', 'basic+adv. excl+tally'),
(454, '66kAg21KBBAk7fJ90Xfd7S4xkf380pdpDBV5evLJ.jpg', 'DCA(PRIME)', 'DCA(PRIME)', 'DCA (Prime) Course Description \r\nComprehensive Diploma in Computer Applications (DCA): The DCA (Prime) course at Nice Web Technologies in Jahangirpuri, Delhi, is an 8-month program designed to build a strong foundation in computer applications and accounting with Tally Prime.\r\n\r\nTailored for Local Learners: Ideal for students and professionals in Jahangirpuri and surrounding areas, this course provides practical training in basic computer skills and advanced accounting to enhance your career prospects.', '<ul><li>DCA (Prime) Course Content </li><li><strong>First 4 Months – Basic Computer Applications</strong>:</li><li class=\"ql-indent-1\">MS Office (Word, Excel, PowerPoint).</li><li class=\"ql-indent-1\">Internet and email basics.</li><li class=\"ql-indent-1\">File management and Windows OS.</li><li><strong>Next 4 Months – Tally Prime</strong>:</li><li class=\"ql-indent-1\">Accounting fundamentals and GST compliance.</li><li class=\"ql-indent-1\">Payroll, inventory management, and financial reporting.</li><li class=\"ql-indent-1\">Real-world projects for hands-on experience.</li><li><strong>Duration</strong>: 8 months of career-oriented training with practical applications.</li></ul><p>Join the <strong>best computer institute in Jahangirpuri, Delhi</strong>, to master the essentials of computer applications and Tally Prime. Visit <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\">computerinstituteindelhijahangirpuri.com</a> to learn more and register today!</p>', 8, 18350.00, 8, '2024-12-23 08:12:16', '2024-12-27 02:35:04', 'dca-tally'),
(455, 'tM0pwWUbErZzZUvdcIa67wXWfAvXlJIScHpzbGVN.png', 'AI Course', 'AI Course', 'Artificial Intelligence (AI) Course \r\nStep into the Future with AI: The Artificial Intelligence (AI) course at Nice Web Technologies, Jahangirpuri, Delhi, is designed to provide in-depth knowledge of AI concepts, tools, and practical applications. This course is ideal for beginners and professionals looking to explore or advance in AI-driven careers.\r\n\r\nDesigned for Local Learners: Catered to students in Jahangirpuri and nearby areas, this program offers hands-on training and real-world projects to develop AI systems, ensuring job-ready skills in a booming industry.', '<h3>AI Course Content </h3><ul><li><strong>Introduction to AI</strong>:</li><li class=\"ql-indent-1\">Understanding AI, machine learning, and deep learning.</li><li class=\"ql-indent-1\">Applications of AI in various industries.</li><li><strong>Programming Basics</strong>:</li><li class=\"ql-indent-1\">Python for AI: libraries like NumPy, Pandas, and Matplotlib.</li><li class=\"ql-indent-1\">Introduction to data structures and algorithms.</li><li><strong>Machine Learning</strong>:</li><li class=\"ql-indent-1\">Supervised, unsupervised, and reinforcement learning techniques.</li><li class=\"ql-indent-1\">Building predictive models and evaluating performance.</li><li><strong>Deep Learning</strong>:</li><li class=\"ql-indent-1\">Neural networks, convolutional networks, and recurrent networks.</li><li class=\"ql-indent-1\">Tools like TensorFlow and PyTorch.</li><li><strong>Natural Language Processing (NLP)</strong>:</li><li class=\"ql-indent-1\">Text processing and sentiment analysis.</li><li class=\"ql-indent-1\">Chatbot development and AI-driven language models.</li><li><strong>AI in Practice</strong>:</li><li class=\"ql-indent-1\">Hands-on projects: Image recognition, recommendation systems, and more.</li><li class=\"ql-indent-1\">Deployment of AI models in real-world applications.</li><li><strong>Duration</strong>: Flexible course timeline tailored to individual learning speeds.</li></ul><p>Enroll in the <strong>best AI training institute in Jahangirpuri, Delhi</strong>, and unlock the power of Artificial Intelligence. Visit <a href=\"https://www.computerinstituteindelhijahangirpuri.com/\">computerinstituteindelhijahangirpuri.com</a> or contact us today to start your AI journey!</p>', 6, 30000.00, 3, '2024-12-23 08:38:17', '2025-01-05 04:40:08', 'ai-course'),
(456, 'XnTFotwgXo.png', 'Graphic Design', 'Graphic Design', 'Unlock your potential with our graphic designing course at Nice Computer Institute in jahangirpuri', '<p>Unlock Your Creative Potential with Our Graphic Design Program</p><p>Best Graphic Design Institute in Jahangirpuri</p><p><br></p><p>Are you passionate about visual storytelling, creativity, and digital communication? Join our Graphic Design course at Nice Computer Institute and embark on a journey to become a skilled and versatile graphic designer.</p><p><br></p><p>About the Course</p><p><br></p><p>Our Graphic Design course is carefully crafted to provide a comprehensive understanding of design principles, industry-standard software, and hands-on experience. Whether you are a beginner or seeking to enhance your existing skills, our program caters to all levels of expertise.</p><p><br></p><p>Program Highlights:</p><p><br></p><p>Hands-On Projects: Engage in real-world design projects to apply your skills and build a compelling portfolio.</p><p><br></p><p>Expert Faculty: Learn from experienced and industry-relevant instructors passionate about nurturing creative talent.</p><p><br></p><p>State-of-the-Art Facilities: Immerse yourself in a dynamic learning environment equipped with cutting-edge design labs and software.</p><p><br></p><p>Internship Opportunities: Gain practical experience through internship placements, connecting classroom learning to the professional world.</p><p><br></p><p><br></p><p>Curriculum Overview</p><p><br></p><p>Our curriculum covers a wide range of topics, including:</p><p><br></p><p>Fundamentals of Design: Core principles of graphic design, including layout, typography, and color theory.</p><p><br></p><p>Digital Imaging: Master image manipulation and enhancement using industry-standard software.</p><p><br></p><p>Web Design: Essentials of designing engaging and user-friendly websites.</p><p><br></p><p>Print Design: Create visually striking print materials such as brochures and posters.</p><p><br></p><p>Branding and Identity: Build cohesive brand identities for businesses and organizations.</p><p><br></p><p><br></p><p>Admission Requirements</p><p><br></p><p>To enroll in our Graphic Design course, applicants should:</p><p><br></p><p>Have a passion for design and creativity.</p><p><br></p><p>Possess basic computer literacy.</p><p><br></p><p>No prior design experience is required.</p><p><br></p><p><br></p><p><a href=\"tel:9312945741\" target=\"_blank\">Apply Now</a></p><p><br></p><p>Ready to turn your passion for design into a fulfilling career? Apply now to join the Best Graphic Design Institute in Jahangirpuri. Contact our admissions team for more information or schedule a visit to our campus.</p>', 4, 10350.00, 4, '2025-01-05 04:31:56', '2025-01-13 13:27:14', 'graphic-design'),
(459, 'JRpRCQBtX7.jpg', 'JAVA', 'JAVA', 'Master Java Programming: From Basics to Advanced Concepts\r\n\r\nIntroduction: Java remains one of the most popular programming languages due to its versatility and widespread use in web development, mobile apps, and enterprise environments. Whether you\'re a beginner or looking to deepen your knowledge, our Java course at Nice Web Technologies is tailored just for you.', '<p><strong>What You\'ll Learn:</strong></p><ul><li><strong>Fundamentals of Java:</strong> Understand syntax, data types, and control structures.</li><li><strong>Object-Oriented Programming:</strong> Master classes, objects, inheritance, and polymorphism.</li><li><strong>Advanced Java Concepts:</strong> Dive into multithreading, collections, and exception handling.</li><li><strong>Java for Web Development:</strong> Learn about Servlets, JSP, and frameworks like Spring.</li></ul><p><strong>Why Choose Our Course:</strong></p><ul><li><strong>Expert Instructors:</strong> Learn from industry professionals with years of experience.</li><li><strong>Hands-On Projects:</strong> Gain practical experience with real-world projects.</li><li><strong>Flexible Learning:</strong> Access course materials anytime, anywhere.</li></ul><p><br></p>', 5, 15000.00, 5, '2025-01-20 03:00:43', '2025-01-20 03:00:43', 'java'),
(460, '3MlOrUMcpu.jpeg', 'Professional Graphic Designing Course', 'Coreldraw', 'Unlock your creativity with our CorelDRAW Mastery Course at Nice Web Technologies! Learn how to design professional logos, business cards, brochures, banners, social media posts, and more using CorelDRAW. This course is perfect for beginners and aspiring graphic designers who want to build a strong foundation in vector graphics, typography, and layout design.\r\n\r\n📌 Key Highlights:\r\n✔️ Learn CorelDRAW from scratch – No prior experience needed\r\n✔️ Hands-on projects for real-world design skills\r\n✔️ Expert guidance from industry professionals\r\n✔️ Certification upon completion\r\n\r\n📅 Course Duration: 1.5 – 2 Months\r\n🖥️ Mode: Classroom & Online', '<h4><strong>Module 1: Introduction to CorelDRAW</strong></h4><ul><li>Understanding Vector vs. Raster Graphics</li><li>CorelDRAW Interface &amp; Workspace Customization</li><li>Basic Tools &amp; Navigation</li></ul><h4><strong>Module 2: Shapes &amp; Object Handling</strong></h4><ul><li>Drawing &amp; Modifying Shapes</li><li>Working with Lines, Curves, and Outlines</li><li>Transformations (Scaling, Rotating, Mirroring)</li></ul><h4><strong>Module 3: Colors, Fills &amp; Gradients</strong></h4><ul><li>Color Theory Basics</li><li>Applying Fills, Gradients &amp; Patterns</li><li>Using the Eyedropper &amp; Color Palette</li></ul><h4><strong>Module 4: Text &amp; Typography Design</strong></h4><ul><li>Adding &amp; Formatting Text</li><li>Working with Artistic &amp; Paragraph Text</li><li>Text Effects (Warping, Shadow, Contouring)</li></ul><h4><strong>Module 5: Layers, Effects &amp; Special Features</strong></h4><ul><li>Managing Layers for Organized Design</li><li>Using Transparency, Blending Modes &amp; Shadows</li><li>Creating 3D Effects &amp; Distortion</li></ul><h4><strong>Module 6: Logo &amp; Branding Design</strong></h4><ul><li>Logo Design Principles</li><li>Creating Business Cards &amp; Letterheads</li><li>Brand Identity Design</li></ul><h4><strong>Module 7: Designing for Print &amp; Digital Media</strong></h4><ul><li>Designing Brochures, Flyers &amp; Posters</li><li>Social Media Graphics &amp; Web Banners</li><li>Print Setup &amp; Exporting Files</li></ul><h4><strong>Module 8: Advanced Techniques &amp; Live Projects</strong></h4><ul><li>PowerClip &amp; Masking Techniques</li><li>Custom Brushes &amp; Patterns</li><li>Final Project – Designing a Portfolio Piece</li></ul><p>🎓 <strong>Who Should Enroll?</strong></p><p>✅ Students &amp; Beginners Interested in Graphic Designing</p><p>✅ Freelancers &amp; Entrepreneurs</p><p>✅ Marketing &amp; Business Professionals</p><p>💡 <strong>Career Opportunities After Course Completion:</strong></p><p>✔️ Graphic Designer</p><p>✔️ Logo &amp; Branding Specialist</p><p>✔️ Social Media Designer</p><p>✔️ Print &amp; Digital Media Designer</p><p>👉 <strong>Enroll Today &amp; Start Your Journey in Professional Graphic Designing!</strong></p>', 2, 3000.00, 1, '2025-02-05 23:33:59', '2025-02-05 23:33:59', 'professional-graphic-designing-course');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `exp_name` varchar(255) NOT NULL,
  `expense_type` enum('Salary','Wages','Electricity','ID Cards','Office Rent','Loans','Other') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `expense_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `amount_paid` bigint(20) NOT NULL,
  `balances` bigint(20) DEFAULT 0,
  `receipt_number` int(10) UNSIGNED DEFAULT NULL,
  `receipt_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Paid','Unpaid') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Paid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `installment_no` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_id`, `course_id`, `payment_date`, `due_date`, `amount_paid`, `balances`, `receipt_number`, `receipt_image`, `status`, `created_at`, `updated_at`, `installment_no`) VALUES
(1, 1075, 445, '2025-01-03', '2025-02-03', 1500, NULL, 7098, '7098.jpg', 'Paid', '2025-01-20 11:10:02', '2025-03-12 08:43:53', 8),
(2, 1119, 405, '2024-12-03', '2025-01-03', 1600, 0, 7099, '7099.jpg', 'Paid', '2025-01-20 11:11:12', '2025-01-20 11:11:12', 1),
(3, 1149, 445, '2024-12-03', '2025-01-03', 1250, NULL, 7100, '7100.jpg', 'Paid', '2025-01-20 11:12:38', '2025-03-05 08:13:45', 3),
(4, 1161, 406, '2024-12-04', '2025-01-04', 3100, 0, 7101, '7101.jpg', 'Paid', '2025-01-20 11:15:33', '2025-01-20 11:15:33', 1),
(5, 1150, 454, '2024-12-04', '2025-01-04', 1400, 0, 7102, '7102.jpg', 'Paid', '2025-01-20 11:22:53', '2025-02-09 09:07:30', 4),
(6, 1118, 454, '2024-12-04', '2025-01-04', 7600, NULL, 7103, '7103.jpg', 'Paid', '2025-01-20 11:23:40', '2025-03-12 08:28:10', 1),
(7, 928, 404, '2024-12-05', '2025-01-05', 2500, 0, 7104, '7104.jpg', 'Paid', '2025-01-20 11:24:29', '2025-01-20 11:24:29', 1),
(8, 805, 407, '2024-12-04', '2025-01-04', 2500, 0, 7105, '7105.jpg', 'Paid', '2025-01-20 11:25:06', '2025-01-20 11:25:06', 1),
(9, 1079, 407, '2024-12-06', '2025-01-06', 2500, 0, 7106, '7106.jpg', 'Paid', '2025-01-20 11:26:28', '2025-02-09 08:58:24', 8),
(10, 1163, 400, '2024-12-06', '2025-01-06', 1100, 0, 7107, '7107.jpg', 'Paid', '2025-01-20 11:27:10', '2025-01-20 11:27:10', 1),
(11, 1077, 453, '2024-12-07', '2025-01-07', 1700, NULL, 7108, '7108.jpg', 'Paid', '2025-01-20 11:28:08', '2025-03-12 08:32:08', 8),
(12, 1003, 400, '2024-12-07', '2025-01-07', 2000, NULL, 7109, '7109.jpg', 'Paid', '2025-01-20 11:28:38', '2025-03-12 08:37:20', 4),
(13, 1040, 404, '2024-12-10', '2025-01-10', 2500, 0, 7110, '7110.jpg', 'Paid', '2025-01-20 11:37:52', '2025-01-20 11:37:52', 1),
(14, 1168, 419, '2024-12-09', '2025-01-09', 4000, 0, 7111, '7111.jpg', 'Paid', '2025-01-20 11:38:28', '2025-01-20 11:38:28', 1),
(15, 1158, 400, '2024-12-10', '2025-01-10', 900, 0, 7113, '7113.jpg', 'Paid', '2025-01-20 11:43:10', '2025-02-13 07:44:03', 2),
(17, 1156, 428, '2024-12-10', '2025-01-10', 4500, 0, 7114, '7114.jpg', 'Paid', '2025-01-20 11:46:21', '2025-01-20 11:46:21', 1),
(18, 1147, 445, '2024-12-10', '2025-01-10', 1250, 0, 7115, '7115.jpg', 'Paid', '2025-01-20 11:47:47', '2025-02-11 23:15:00', 3),
(19, 1170, 400, '2024-12-11', '2025-01-11', 1100, 0, 7116, '7116.jpg', 'Paid', '2025-01-20 11:55:49', '2025-01-20 11:55:49', 1),
(20, 1133, 400, '2024-12-11', '2025-01-11', 1000, 0, 7117, '7117.jpg', 'Paid', '2025-01-20 12:00:08', '2025-01-20 12:00:08', 1),
(21, 1134, 400, '2024-12-11', '2025-01-11', 1000, 0, 7118, '7118.jpg', 'Paid', '2025-01-20 12:00:38', '2025-01-20 12:00:38', 1),
(22, 1171, 459, '2024-12-11', '2025-01-11', 3000, 0, 7119, '7119.jpg', 'Paid', '2025-01-20 12:05:33', '2025-01-20 12:05:33', 1),
(23, 1153, 400, '2024-12-12', '2025-01-12', 900, 0, 7121, '7121.jpg', 'Paid', '2025-01-20 12:06:51', '2025-01-20 12:06:51', 1),
(25, 1099, 454, '2024-12-12', '2025-01-12', 1400, 0, 7122, '7122.jpg', 'Paid', '2025-01-20 12:20:32', '2025-02-17 07:51:39', 7),
(26, 1014, 400, '2024-12-13', '2025-01-13', 2500, 0, 7124, '7124.jpg', 'Paid', '2025-01-20 12:22:12', '2025-01-20 12:22:12', 1),
(27, 1130, 407, '2024-12-13', '2025-01-13', 5000, 0, 7125, '7125.jpg', 'Paid', '2025-01-20 12:23:09', '2025-02-11 23:17:30', 4),
(28, 914, 413, '2024-12-16', '2025-01-16', 2000, 0, 7127, '7127.jpg', 'Paid', '2025-01-20 12:24:07', '2025-01-20 12:24:07', 1),
(29, 1127, 413, '2024-12-16', '2025-01-16', 2500, 0, 7128, '7128.jpg', 'Paid', '2025-01-20 12:24:43', '2025-01-20 12:24:43', 1),
(30, 1173, 405, '2024-12-16', '2025-01-16', 2600, 0, 7129, '7129.jpg', 'Paid', '2025-01-20 12:25:46', '2025-01-20 12:25:46', 1),
(31, 1174, 430, '2024-12-16', '2025-01-16', 850, 0, 7130, '7130.jpg', 'Paid', '2025-01-20 12:27:32', '2025-01-20 12:27:32', 1),
(32, 1157, 411, '2024-12-16', '2025-01-16', 2000, 0, 7131, '7131.jpg', 'Paid', '2025-01-20 12:28:37', '2025-01-20 12:28:37', 1),
(33, 1065, 407, '2024-12-17', '2025-01-17', 2500, 0, 7132, '7132.jpg', 'Paid', '2025-01-20 12:29:46', '2025-02-17 08:07:12', 9),
(34, 938, 407, '2024-12-17', '2025-01-17', 2500, 0, 7133, '7133.jpg', 'Paid', '2025-01-20 12:30:27', '2025-01-20 12:30:27', 1),
(35, 1102, 405, '2024-12-20', '2025-01-20', 11100, 0, 7135, '7135.jpg', 'Paid', '2025-01-20 12:32:36', '2025-02-12 22:33:55', 1),
(36, 1154, 407, '2024-12-20', '2025-01-20', 2500, 0, 7136, '7136.jpg', 'Paid', '2025-01-20 12:33:21', '2025-02-08 02:26:21', 3),
(37, 1126, 454, '2024-12-21', '2025-01-21', 1500, 0, 7137, '7137.jpg', 'Paid', '2025-01-20 12:34:03', '2025-02-20 06:26:05', 5),
(38, 1089, 407, '2024-12-21', '2025-01-21', 2500, 0, 7138, '7138.jpg', 'Paid', '2025-01-20 12:35:03', '2025-01-20 12:35:03', 1),
(39, 1088, 445, '2024-12-25', '2025-01-25', 1500, 0, 7139, '7139.jpg', 'Paid', '2025-01-20 12:36:09', '2025-01-20 12:36:09', 1),
(40, 1068, 413, '2024-12-23', '2025-01-23', 2000, 0, 7140, '7140.jpg', 'Paid', '2025-01-20 12:37:02', '2025-01-20 12:37:02', 1),
(41, 1019, 413, '2024-12-24', '2025-01-24', 2000, 0, 7141, '7141.jpg', 'Paid', '2025-01-20 12:38:35', '2025-02-21 10:22:07', 11),
(42, 1136, 400, '2024-12-24', '2025-01-24', 900, 0, 7142, '7142.jpg', 'Paid', '2025-01-20 12:39:34', '2025-01-20 12:39:34', 1),
(43, 1008, 400, '2024-12-24', '2025-01-24', 2400, 0, 7143, '7143.jpg', 'Paid', '2025-01-20 12:41:05', '2025-01-20 12:41:05', 1),
(44, 1091, 445, '2024-12-26', '2025-01-26', 1500, NULL, 7144, '7144.jpg', 'Paid', '2025-01-20 12:41:38', '2025-03-05 08:15:00', 8),
(45, 1067, 413, '2024-12-28', '2025-01-28', 2000, 0, 7145, '7145.jpg', 'Paid', '2025-01-20 12:42:09', '2025-01-20 12:42:09', 1),
(46, 1142, 413, '2024-12-28', '2025-01-28', 2250, NULL, 7146, '7146.jpg', 'Paid', '2025-01-20 12:42:51', '2025-03-05 07:59:33', 4),
(47, 1155, 413, '2024-12-30', '2025-01-30', 1900, 0, 7147, '7147.jpg', 'Paid', '2025-01-20 12:43:38', '2025-01-20 12:43:38', 1),
(48, 944, 445, '2024-12-30', '2025-01-30', 2500, 0, 7148, '7148.jpg', 'Paid', '2025-01-20 12:44:09', '2025-01-20 12:44:09', 1),
(52, 1164, 445, '2024-11-28', '2024-12-28', 1600, 0, 7092, '7092.jpg', 'Paid', '2025-02-05 19:34:01', '2025-02-05 19:34:01', 1),
(53, 1164, 445, '2025-01-02', '2025-02-02', 1500, NULL, 7152, '7152.jpg', 'Paid', '2025-02-05 19:34:53', '2025-03-05 08:21:52', 2),
(54, 1169, 413, '2025-01-31', '2025-03-03', 2500, 0, 7150, '7150.jpg', 'Paid', '2025-02-05 19:35:56', '2025-02-05 19:35:56', 1),
(55, 1169, 413, '2024-11-26', '2024-12-26', 2600, 0, 7088, '7088.jpg', 'Paid', '2025-02-05 19:41:18', '2025-02-05 19:41:18', 1),
(56, 1141, 454, '2025-01-02', '2025-02-02', 1250, 0, 7151, '7151.jpg', 'Paid', '2025-02-05 19:51:47', '2025-02-05 19:51:47', 1),
(57, 1141, 454, '2024-09-25', '2024-10-25', 1350, 0, 6940, '6940.jpg', 'Paid', '2025-02-05 19:52:44', '2025-02-05 19:52:44', 1),
(58, 1141, 454, '2024-10-25', '2024-11-25', 1250, 0, 7019, '7019.jpg', 'Paid', '2025-02-05 19:53:33', '2025-02-05 19:53:33', 1),
(59, 1141, 454, '2024-11-25', '2024-12-25', 1250, 0, 7080, '7080.jpg', 'Paid', '2025-02-05 19:54:42', '2025-02-05 19:54:42', 1),
(60, 1141, 454, '2025-01-24', '2025-02-24', 1250, 0, 7195, '7195.jpg', 'Paid', '2025-02-05 19:56:28', '2025-02-05 19:56:28', 1),
(61, 1149, 445, '2025-01-02', '2025-02-02', 1250, NULL, 7155, '7155.jpg', 'Paid', '2025-02-05 19:58:19', '2025-03-05 08:13:33', 4),
(62, 1118, 454, '2025-01-04', '2025-02-04', 1500, 0, 7156, '7156.jpg', 'Paid', '2025-02-05 19:58:55', '2025-02-05 19:58:55', 1),
(64, 1156, 428, '2024-11-06', '2024-12-06', 4600, 0, 7157, '7157.jpg', 'Paid', '2025-02-05 22:57:30', '2025-02-05 22:57:30', 1),
(65, 1156, 428, '2025-01-06', '2025-02-06', 4750, 0, 7157, '7157.jpg', 'Paid', '2025-02-05 22:59:30', '2025-02-05 22:59:30', 1),
(66, 1175, 456, '2025-01-07', '2025-02-07', 3000, 0, 7158, '7158.jpg', 'Paid', '2025-02-05 23:39:21', '2025-02-05 23:39:21', 1),
(67, 1119, 405, '2025-01-07', '2025-02-07', 1600, NULL, 7159, '7159.jpg', 'Paid', '2025-02-05 23:40:04', '2025-03-12 08:30:31', 2),
(68, 1079, 407, '2025-01-08', '2025-02-08', 2500, 0, 7160, '7160.jpg', 'Paid', '2025-02-05 23:40:43', '2025-02-09 08:58:13', 9),
(69, 1150, 454, '2025-01-08', '2025-02-08', 1400, 0, 7161, '7161.jpg', 'Paid', '2025-02-05 23:50:38', '2025-02-05 23:50:38', 1),
(70, 1075, 445, '2025-01-08', '2025-02-08', 1500, NULL, 7162, '7162.jpg', 'Paid', '2025-02-05 23:51:28', '2025-03-12 08:43:43', 9),
(71, 1158, 400, '2025-01-09', '2025-02-09', 900, 0, 7163, '7163.jpg', 'Paid', '2025-02-05 23:52:02', '2025-02-13 07:38:36', 3),
(72, 1077, 453, '2025-01-09', '2025-02-09', 1700, NULL, 7165, '7165.jpg', 'Paid', '2025-02-05 23:52:54', '2025-03-12 08:31:58', 9),
(73, 1147, 445, '2025-01-09', '2025-02-09', 1250, 0, 7166, '7166.jpg', 'Paid', '2025-02-05 23:53:32', '2025-02-11 23:14:30', 4),
(74, 1040, 404, '2025-01-10', '2025-02-10', 2500, 0, 7167, '7167.jpg', 'Paid', '2025-02-05 23:54:01', '2025-02-09 08:23:13', 10),
(75, 1176, 417, '2025-01-10', '2025-02-10', 2600, 0, 7169, '7169.jpg', 'Paid', '2025-02-05 23:57:59', '2025-02-05 23:57:59', 1),
(76, 1003, 413, '2025-01-10', '2025-02-10', 2000, 0, 7169, '7169.jpg', 'Paid', '2025-02-05 23:58:24', '2025-02-05 23:58:24', 1),
(77, 1163, 400, '2025-01-10', '2025-02-10', 1000, 0, 7170, '7170.jpg', 'Paid', '2025-02-05 23:58:48', '2025-02-11 23:08:58', 2),
(79, 1177, 430, '2025-01-13', NULL, 850, 0, 7173, '7173.jpg', 'Paid', '2025-02-06 00:03:55', '2025-02-06 00:03:55', 1),
(80, 1014, 405, '2025-01-13', '2025-02-13', 2750, 0, 7174, '7174.jpg', 'Paid', '2025-02-06 00:06:01', '2025-02-06 00:06:01', 1),
(81, 1099, 454, '2025-01-13', '2025-02-13', 1650, 0, 7175, '7175.jpg', 'Paid', '2025-02-06 00:07:27', '2025-02-17 07:51:26', 8),
(82, 1127, 413, '2025-01-14', '2025-02-14', 2500, 0, 7176, '7176.jpg', 'Paid', '2025-02-06 00:08:07', '2025-02-06 00:08:07', 1),
(84, 1170, 400, '2025-01-14', '2025-02-14', 1000, NULL, 7177, '7177.jpg', 'Paid', '2025-02-06 00:09:21', '2025-03-12 08:48:05', 2),
(85, 914, 413, '2025-01-15', '2025-02-15', 2000, 0, 7178, '7178.jpg', 'Paid', '2025-02-06 00:09:50', '2025-02-06 00:09:50', 1),
(86, 1178, 405, '2025-01-15', '2025-02-15', 2600, 0, 7179, '7179.jpg', 'Paid', '2025-02-06 00:17:03', '2025-02-06 00:17:03', 1),
(87, 1171, 459, '2025-01-15', '2025-02-15', 3000, 0, 7171, '7171.jpg', 'Paid', '2025-02-06 00:18:03', '2025-02-06 00:18:03', 1),
(88, 1096, 407, '2025-01-15', '2025-02-15', 2500, 0, 7186, '7186.jpg', 'Paid', '2025-02-06 00:23:03', '2025-02-06 00:23:03', 1),
(89, 1173, 405, '2025-01-16', '2025-02-16', 2500, 0, 7182, '7182.jpg', 'Paid', '2025-02-06 00:23:55', '2025-02-18 07:14:18', 2),
(90, 1085, 445, '2025-01-18', '2025-02-18', 1250, 0, 7183, '7183.jpg', 'Paid', '2025-02-06 00:39:49', '2025-02-20 06:06:54', 3),
(91, 1179, 410, '2025-01-18', '2025-02-18', 2600, 0, 7184, '7184.jpg', 'Paid', '2025-02-06 00:43:49', '2025-02-06 00:43:49', 1),
(92, 1102, 454, '2025-01-20', '2025-02-20', 1250, 0, 7185, '7185.jpg', 'Paid', '2025-02-06 00:50:07', '2025-02-06 00:50:07', 1),
(93, 1180, 445, '2025-01-20', '2025-02-20', 1600, 0, 7186, '7186.jpg', 'Paid', '2025-02-06 00:53:50', '2025-02-06 00:53:50', 1),
(94, 1174, 430, '2025-01-20', '2025-02-20', 750, 0, 7188, '7188.jpg', 'Paid', '2025-02-06 00:55:34', '2025-02-17 09:54:31', 2),
(95, 1065, 407, '2025-01-20', '2025-02-20', 2500, 0, 7189, '7189.jpg', 'Paid', '2025-02-06 00:56:52', '2025-02-17 08:07:02', 10),
(96, 1149, 445, '2025-01-20', '2025-02-20', 1500, NULL, 7190, '7190.jpg', 'Paid', '2025-02-06 00:57:22', '2025-03-05 08:13:19', 5),
(97, 1126, 454, '2025-01-21', '2025-02-21', 1500, 0, 7191, '7191.jpg', 'Paid', '2025-02-06 00:58:07', '2025-02-20 06:26:28', 6),
(98, 1181, 445, '2025-01-21', '2025-02-21', 1600, 0, 7192, '7192.jpg', 'Paid', '2025-02-06 01:03:08', '2025-02-06 01:03:08', 1),
(99, 1142, 413, '2025-01-22', '2025-02-22', 2250, NULL, 7193, '7193.jpg', 'Paid', '2025-02-08 00:51:37', '2025-03-05 07:59:22', 5),
(100, 1019, 413, '2025-01-23', '2025-02-23', 2000, 0, 7194, '7194.jpg', 'Paid', '2025-02-08 00:57:16', '2025-02-21 10:21:52', 12),
(101, 1141, 454, '2025-01-25', '2025-02-25', 1250, 0, 7196, '7196.jpg', 'Paid', '2025-02-08 02:15:27', '2025-02-08 02:15:27', 2),
(102, 1155, 413, '2025-01-24', '2025-02-24', 1900, 0, 7196, '7196.jpg', 'Paid', '2025-02-08 02:22:09', '2025-02-08 02:22:09', 2),
(103, 1154, 407, '2025-01-24', '2025-02-24', 2500, 0, 7197, '7197.jpg', 'Paid', '2025-02-08 02:25:34', '2025-02-08 02:26:34', 4),
(104, 1182, 410, '2025-01-24', '2025-02-24', 20000, 0, 7198, '7198.jpg', 'Paid', '2025-02-08 02:28:48', '2025-02-08 02:28:48', 1),
(105, 1068, 413, '2025-01-24', '2025-02-24', 2000, NULL, 7199, '7199.jpg', 'Paid', '2025-02-08 02:29:25', '2025-03-05 07:52:15', 10),
(106, 1088, 445, '2025-01-25', '2025-02-25', 1500, 0, 7200, '7200.jpg', 'Paid', '2025-02-08 02:30:52', '2025-02-08 02:30:52', 2),
(107, 1091, 445, '2025-01-25', '2025-02-25', 1500, NULL, 7201, '7201.jpg', 'Paid', '2025-02-08 02:31:48', '2025-03-05 08:14:49', 9),
(108, 1183, 410, '2025-01-25', '2025-02-25', 2600, 0, 7202, '7202.jpg', 'Paid', '2025-02-08 02:32:55', '2025-02-08 02:32:55', 1),
(109, 1184, 405, '2025-01-25', '2025-02-25', 2600, 0, 7203, '7203.jpg', 'Paid', '2025-02-08 02:34:06', '2025-02-08 02:34:06', 1),
(110, 1067, 413, '2025-01-25', '2025-02-25', 2000, 0, 7204, '7204.jpg', 'Paid', '2025-02-08 02:34:38', '2025-02-08 02:34:38', 2),
(111, 1185, 410, '2025-01-27', '2025-02-27', 2600, 0, 7206, '7206.jpg', 'Paid', '2025-02-08 02:36:50', '2025-02-08 02:36:50', 1),
(112, 1073, 410, '2025-01-28', '2025-02-28', 4000, 0, 7207, '7207.jpg', 'Paid', '2025-02-08 02:43:55', '2025-02-13 07:46:02', 7),
(113, 944, 404, '2025-01-28', '2025-02-28', 2500, 0, 7208, '7208.jpg', 'Paid', '2025-02-08 02:48:17', '2025-02-08 02:48:17', 1),
(114, 1186, 456, '2025-01-29', '2025-03-01', 2600, 0, 7209, '7209.jpg', 'Paid', '2025-02-08 02:59:54', '2025-02-08 02:59:54', 1),
(115, 1187, 454, '2025-01-30', '2025-03-02', 1600, 0, 7210, '7210.jpg', 'Paid', '2025-02-08 03:01:43', '2025-02-08 03:01:43', 1),
(116, 1188, 414, '2025-02-01', '2025-03-01', 2600, 0, 7211, '7211.jpg', 'Paid', '2025-02-08 03:02:46', '2025-02-08 03:02:46', 1),
(117, 1189, 400, '2025-02-02', '2025-03-02', 4100, 0, 7212, '7212.jpg', 'Paid', '2025-02-08 03:03:22', '2025-02-08 03:03:22', 1),
(118, 1164, 445, '2025-02-03', '2025-03-03', 1500, NULL, 7213, '7213.jpg', 'Paid', '2025-02-08 03:04:42', '2025-03-05 08:21:37', 3),
(119, 1089, 407, '2025-02-04', '2025-03-04', 2500, NULL, 7214, '7214.jpg', 'Paid', '2025-02-08 03:05:14', '2025-03-05 07:54:46', 9),
(120, 1075, 445, '2025-02-07', '2025-03-07', 1500, NULL, 7215, '7215.jpg', 'Paid', '2025-02-08 03:06:15', '2025-03-12 08:43:31', 10),
(121, 1118, 454, '2025-02-07', '2025-03-07', 1500, 0, 7216, '7216.jpg', 'Paid', '2025-02-08 03:06:57', '2025-02-08 03:06:57', 2),
(122, 1119, 413, '2025-02-07', '2025-03-07', 1600, NULL, 7217, '7217.jpg', 'Paid', '2025-02-08 03:08:37', '2025-03-12 08:30:18', 3),
(123, 1170, 400, '2025-02-07', '2025-03-07', 1000, NULL, 7218, '7218.jpg', 'Paid', '2025-02-08 03:10:09', '2025-03-12 08:47:56', 3),
(124, 1190, 404, '2025-02-07', '2025-03-07', 1000, 0, 7219, '7219.jpg', 'Paid', '2025-02-08 03:12:59', '2025-02-08 03:12:59', 1),
(126, 1008, 413, '2025-02-07', '2025-03-07', 2000, 0, 7220, '7220.jpg', 'Paid', '2025-02-08 03:18:35', '2025-02-08 03:23:06', 4),
(127, 1077, 453, '2025-02-07', '2025-03-07', 1700, NULL, 7221, '7221.jpg', 'Paid', '2025-02-08 03:24:56', '2025-03-12 08:31:46', 10),
(128, 1182, 410, '2025-02-07', '2025-03-07', 12600, 0, 7222, '7222.jpg', 'Paid', '2025-02-08 03:26:25', '2025-02-08 03:26:25', 2),
(129, 1003, 413, '2025-02-07', '2025-03-07', 2000, NULL, 7223, '7223.jpg', 'Paid', '2025-02-08 03:27:25', '2025-03-12 08:36:20', 6),
(130, 1040, 404, '2025-02-04', '2025-03-04', 2600, 0, 6367, '6367.jpg', 'Paid', '2025-02-09 07:47:55', '2025-02-09 07:53:56', 1),
(131, 1040, 404, '2024-05-04', '2024-06-04', 2500, 0, 6496, '6496.jpg', 'Paid', '2025-02-09 07:52:52', '2025-02-09 07:54:08', 2),
(132, 1040, 404, '2024-06-08', '2024-07-08', 2500, 0, 6709, '6709.jpg', 'Paid', '2025-02-09 07:55:02', '2025-02-09 07:59:44', 3),
(133, 1040, 404, '2024-06-10', '2024-07-10', 2500, 0, 6624, '6624.jpg', 'Paid', '2025-02-09 08:00:30', '2025-02-09 08:07:11', 4),
(134, 1040, 404, '2024-08-12', '2024-09-12', 2500, 0, 6817, '6817.jpg', 'Paid', '2025-02-09 08:08:04', '2025-02-09 08:08:04', 5),
(135, 1040, 404, '2024-10-10', '2024-11-10', 2500, 0, 6894, '6894.jpg', 'Paid', '2025-02-09 08:20:03', '2025-02-09 08:20:03', 6),
(136, 1040, 404, '2024-10-12', '2024-11-12', 2500, 0, 6990, '6990.jpg', 'Paid', '2025-02-09 08:20:36', '2025-02-09 08:20:36', 7),
(137, 1040, 404, '2024-11-11', '2024-12-11', 2500, 0, 7051, '7051.jpg', 'Paid', '2025-02-09 08:21:22', '2025-02-09 08:21:22', 8),
(138, 1040, 404, '2024-12-09', '2025-01-09', 2500, 0, 7110, '7110.jpg', 'Paid', '2025-02-09 08:22:01', '2025-02-09 08:22:01', 9),
(139, 1079, 407, '2025-02-08', '2025-03-08', 2500, 0, 7224, '7224.jpg', 'Paid', '2025-02-09 08:57:51', '2025-02-09 08:57:51', 10),
(140, 1150, 454, '2025-02-08', '2025-03-08', 1400, 0, 7225, '7225.jpg', 'Paid', '2025-02-09 09:07:10', '2025-02-09 09:07:10', 5),
(141, 1191, 413, '2025-02-11', '2025-03-11', 6150, 0, 7226, '7226.jpg', 'Paid', '2025-02-11 22:39:55', '2025-02-17 07:42:53', 1),
(144, 1192, 400, '2025-02-11', '2025-03-11', 1000, 0, 7227, '7227.jpg', 'Paid', '2025-02-11 23:06:09', '2025-02-11 23:06:09', 1),
(145, 1176, 417, '2025-02-11', '2025-03-11', 2500, 0, 7228, '7228.jpg', 'Paid', '2025-02-11 23:07:15', '2025-02-11 23:07:15', 2),
(146, 1163, 400, '2025-02-11', '2025-03-11', 1000, 0, 7229, '7229.jpg', 'Paid', '2025-02-11 23:08:36', '2025-02-11 23:09:20', 3),
(147, 1147, 445, '2025-02-11', '2025-03-11', 1250, 0, 7230, '7230.jpg', 'Paid', '2025-02-11 23:13:26', '2025-02-11 23:14:49', 5),
(148, 1130, 407, '2024-09-09', '2024-10-09', 5000, 0, 6889, '6889.jpg', 'Paid', '2025-02-11 23:20:03', '2025-02-11 23:20:21', 1),
(149, 1130, 407, '2025-01-10', '2025-02-10', 5000, 0, 7171, '7171.jpg', 'Paid', '2025-02-11 23:22:44', '2025-02-11 23:22:44', 5),
(150, 1130, 407, '2024-10-07', '2024-11-07', 5000, 0, 6969, '6969.jpg', 'Paid', '2025-02-11 23:24:56', '2025-02-11 23:25:10', 2),
(151, 1130, 407, '2024-11-12', '2024-12-12', 5000, 0, 7055, '7055.jpg', 'Paid', '2025-02-11 23:27:31', '2025-02-11 23:27:45', 3),
(152, 1133, 400, '2024-09-09', '2024-10-09', 3100, 0, 6891, '6891.jpg', 'Paid', '2025-02-12 02:00:58', '2025-02-12 02:01:10', 2),
(153, 1134, 400, '2024-09-09', '2024-10-09', 3100, 0, 6890, '6890.jpg', 'Paid', '2025-02-12 02:02:01', '2025-02-12 02:02:01', 2),
(154, 1136, 400, '2024-11-29', '2024-12-29', 2800, 0, 7093, '7093.jpg', 'Paid', '2025-02-12 22:16:12', '2025-02-12 22:16:12', 2),
(155, 1158, 400, '2025-02-12', '2025-03-12', 1150, 0, 7231, '7231.jpg', 'Paid', '2025-02-13 07:40:10', '2025-02-13 07:40:10', 4),
(156, 1158, 400, '2024-11-07', '2024-12-07', 1000, 0, 7038, '7038.jpg', 'Paid', '2025-02-13 07:41:28', '2025-02-13 07:44:12', 1),
(157, 1073, 410, '2025-02-12', '2025-03-12', 4000, 0, 7232, '7232.jpg', 'Paid', '2025-02-13 07:45:31', '2025-02-13 07:45:47', 8),
(158, 1040, 404, '2025-02-14', '2025-03-14', 2500, 0, 7233, '7233.jpg', 'Paid', '2025-02-14 11:17:12', '2025-02-14 11:17:12', 11),
(159, 1153, 400, '2025-02-14', '2025-03-14', 2800, 0, 7234, '7234.jpg', 'Paid', '2025-02-14 11:19:11', '2025-02-14 11:21:47', 2),
(160, 1178, 405, '2025-02-17', '2025-03-17', 2500, 0, 7238, '7235.jpg', 'Paid', '2025-02-17 07:47:01', '2025-02-17 09:51:46', 2),
(161, 1174, 430, '2025-02-17', '2025-03-17', 750, 0, 7239, '7236.jpg', 'Paid', '2025-02-17 07:47:59', '2025-02-17 09:53:56', 3),
(162, 1085, 445, '2025-02-17', '2025-03-17', 1250, 0, 7240, '7240.jpg', 'Paid', '2025-02-17 08:10:02', '2025-02-20 06:06:43', 4),
(163, 914, 413, '2025-02-17', '2025-03-17', 2000, 0, 7236, '7236.jpg', 'Paid', '2025-02-17 09:49:11', '2025-02-17 09:49:11', 2),
(164, 1130, 407, '2025-02-17', '2025-03-17', 5000, 0, 7237, '7237.jpg', 'Paid', '2025-02-17 09:50:54', '2025-02-17 09:50:54', 6),
(165, 1173, 413, '2025-02-16', '2025-03-15', 2500, 0, 7241, '7241.jpg', 'Paid', '2025-02-20 06:07:38', '2025-02-20 06:07:38', 3),
(166, 1193, 404, '2025-02-19', '2025-03-06', 4100, 0, 7242, '7242.jpg', 'Paid', '2025-02-20 06:08:24', '2025-02-20 06:08:24', 1),
(167, 1065, 407, '2025-02-19', '2025-03-15', 2500, 0, 7243, '7243.jpg', 'Paid', '2025-02-20 06:17:01', '2025-02-20 06:17:01', 11),
(168, 1126, 454, '2025-02-20', '2025-03-19', 1500, 0, 7244, '7244.jpg', 'Paid', '2025-02-20 06:25:29', '2025-02-20 06:25:29', 7),
(169, 1194, 406, '2025-02-20', '2025-03-19', 9540, 0, 7245, '7245.jpg', 'Paid', '2025-02-20 06:35:02', '2025-02-20 06:35:02', 1),
(172, 1019, 413, '2025-02-20', '2025-03-20', 2000, 0, 7246, '7248.jpg', 'Paid', '2025-02-21 22:40:25', '2025-02-21 22:45:25', 13),
(173, 1181, 445, '2025-02-20', '2025-03-20', 1500, 0, 7248, '7248.jpg', 'Paid', '2025-02-21 22:44:33', '2025-02-21 22:44:33', 2),
(174, 1180, 445, '2025-02-20', '2025-03-19', 1500, 0, 7247, '7247.jpg', 'Paid', '2025-02-21 22:46:16', '2025-02-21 22:46:16', 2),
(175, 1096, 407, '2025-02-22', '2025-03-04', 2500, 0, 7249, '7249.jpg', 'Paid', '2025-02-24 08:55:51', '2025-02-24 08:55:51', 4),
(176, 1171, 459, '2025-02-24', '2025-03-10', 3000, 0, 7250, '7250.jpg', 'Paid', '2025-02-24 08:56:46', '2025-02-24 08:57:01', 3),
(177, 1154, 407, '2025-02-24', '2025-03-16', 2500, 0, 7251, '7251.jpg', 'Paid', '2025-02-24 08:58:46', '2025-02-24 08:58:46', 5),
(178, 1068, 413, '2025-02-24', '2025-02-28', 2000, NULL, 7253, '7253.jpg', 'Paid', '2025-03-05 07:51:47', '2025-03-05 07:51:47', 11),
(179, 1089, 407, '2025-02-21', '2025-02-28', 2500, NULL, 7254, '7254.jpg', 'Paid', '2025-03-05 07:54:27', '2025-03-05 07:54:27', 10),
(180, 1141, 454, '2025-02-25', '2025-03-25', 1250, NULL, 7255, '7255.jpg', 'Paid', '2025-03-05 07:56:22', '2025-03-05 07:56:22', 6),
(181, 1155, 413, '2025-02-25', '2025-02-28', 1900, NULL, 7257, '7256.jpg', 'Paid', '2025-03-05 07:57:46', '2025-03-05 08:06:10', 5),
(182, 1142, 413, '2025-02-25', '2025-02-28', 2250, NULL, 7258, '7257.jpg', 'Paid', '2025-03-05 07:59:07', '2025-03-05 08:05:36', 6),
(183, 1127, 413, '2025-02-27', '2025-02-28', 2500, NULL, 7259, '7259.jpg', 'Paid', '2025-03-05 08:04:55', '2025-03-05 08:04:55', 7),
(184, 1184, 405, '2025-01-25', '2025-02-25', 2500, NULL, 7256, '7256.jpg', 'Paid', '2025-03-05 08:07:00', '2025-03-05 08:07:00', 2),
(185, 1088, 445, '2025-02-27', '2025-02-28', 1500, NULL, 7260, '7260.jpg', 'Paid', '2025-03-05 08:07:41', '2025-03-05 08:07:41', 10),
(186, 1195, 404, '2025-02-27', '2025-02-28', 4000, NULL, 7261, '7261.jpg', 'Paid', '2025-03-05 08:11:00', '2025-03-05 08:11:00', 1),
(187, 1067, 413, '2025-02-27', '2025-02-28', 2000, NULL, 7262, '7262.jpg', 'Paid', '2025-03-05 08:12:23', '2025-03-05 08:12:23', 11),
(188, 1149, 445, '2025-03-27', '2025-04-27', 1250, NULL, 7263, '7263.jpg', 'Paid', '2025-03-05 08:13:00', '2025-03-05 08:13:00', 6),
(189, 1091, 445, '2025-03-27', '2025-03-31', 1500, NULL, 7264, '7264.jpg', 'Paid', '2025-03-05 08:14:24', '2025-03-05 08:14:39', 10),
(190, 1185, 410, '2025-02-28', '2025-02-28', 2500, NULL, 7265, '7265.jpg', 'Paid', '2025-03-05 08:16:37', '2025-03-05 08:16:37', 2),
(191, 1187, 454, '2025-02-01', '2025-02-28', 1500, NULL, 7266, '7266.jpg', 'Paid', '2025-03-05 08:17:39', '2025-03-05 08:17:39', 2),
(192, 1186, 456, '2025-03-01', '2025-03-31', 2500, NULL, 7267, '7267.jpg', 'Paid', '2025-03-05 08:19:36', '2025-03-05 08:19:36', 2),
(193, 944, 404, '2025-03-02', '2025-03-31', 2500, NULL, 7268, '7268.jpg', 'Paid', '2025-03-05 08:20:11', '2025-03-05 08:20:11', 2),
(194, 1164, 445, '2025-03-04', '2025-03-31', 1500, NULL, 7269, '7269.jpg', 'Paid', '2025-03-05 08:21:21', '2025-03-05 08:21:21', 4),
(195, 1027, 404, '2025-03-04', '2025-03-31', 2750, 250, 7270, '7270.jpg', 'Paid', '2025-03-05 08:25:14', '2025-03-05 08:25:14', 12),
(196, 1150, 454, '2025-03-05', '2025-03-31', 1400, NULL, 7271, '7271.jpg', 'Paid', '2025-03-12 08:20:38', '2025-03-12 08:20:38', 6),
(197, 1188, 414, '2025-03-04', '2025-03-31', 2500, NULL, 7272, '7272.jpg', 'Paid', '2025-03-12 08:21:46', '2025-03-12 08:21:46', 2),
(198, 1196, 427, '2025-03-06', '2025-04-06', 2100, NULL, 7273, '7273.jpg', 'Paid', '2025-03-12 08:22:43', '2025-03-12 08:22:43', 1),
(199, 1190, 413, '2025-03-06', '2025-03-31', 2500, NULL, 7274, '7274.jpg', 'Paid', '2025-03-12 08:23:32', '2025-03-12 08:23:32', 2),
(200, 1118, 454, '2025-03-06', '2025-03-31', 1750, NULL, 7275, '7275.jpg', 'Paid', '2025-03-12 08:24:13', '2025-03-12 08:25:50', 8),
(201, 1119, 413, '2025-03-06', '2025-03-31', 1600, NULL, 7276, '7276.jpg', 'Paid', '2025-03-12 08:28:59', '2025-03-12 08:29:58', 4),
(202, 1077, 453, '2025-03-06', '2025-03-31', 1700, NULL, 7277, '7277.jpg', 'Paid', '2025-03-12 08:31:19', '2025-03-12 08:31:19', 11),
(203, 1073, 410, '2025-03-06', '2025-03-31', 4250, NULL, 7278, '7278.jpg', 'Paid', '2025-03-12 08:33:00', '2025-03-12 08:33:00', 9),
(204, 1197, 417, '2025-03-06', '2025-04-06', 7100, 250, 7279, '7279.jpg', 'Paid', '2025-03-12 08:34:04', '2025-03-12 08:34:35', 1),
(205, 1003, 413, '2025-03-06', '2025-03-31', 2000, NULL, 7280, '7280.jpg', 'Paid', '2025-03-12 08:36:07', '2025-03-12 08:36:07', 7),
(206, 1079, 407, '2025-03-07', '2025-03-31', 2500, NULL, 7281, '7281.jpg', 'Paid', '2025-03-12 08:38:22', '2025-03-12 08:38:22', 11),
(207, 1075, 445, '2025-03-08', '2025-03-31', 1500, NULL, 7283, '7283.jpg', 'Paid', '2025-03-12 08:43:10', '2025-03-12 08:43:10', 11),
(208, 1163, 400, '2025-03-08', '2025-03-31', 1000, NULL, 7284, '7284.jpg', 'Paid', '2025-03-12 08:44:21', '2025-03-12 08:44:21', 4),
(209, 1176, 417, '2025-03-10', '2025-04-10', 2750, NULL, 7286, '7286.jpg', 'Paid', '2025-03-12 08:45:11', '2025-03-12 08:45:11', 3),
(210, 1192, 400, '2025-03-10', '2025-03-31', 900, NULL, 7287, '7287.jpg', 'Paid', '2025-03-12 08:47:02', '2025-03-12 08:47:02', 2),
(211, 1170, 400, '2025-03-10', '2025-03-31', 1000, NULL, 7288, '7288.jpg', 'Paid', '2025-03-12 08:48:21', '2025-03-12 08:48:21', 4),
(212, 1158, 454, '2025-03-11', '2025-03-31', 2500, NULL, 7289, '7289.jpg', 'Paid', '2025-03-12 08:54:28', '2025-03-12 08:54:28', 1),
(213, 1200, 427, '2025-03-11', '2025-04-11', 2100, NULL, 7290, '7290.jpg', 'Paid', '2025-03-12 08:54:56', '2025-03-12 08:54:56', 1),
(214, 1147, 445, '2025-03-11', '2025-03-31', 1500, NULL, 7291, '7291.jpg', 'Paid', '2025-03-12 08:55:35', '2025-03-12 08:55:35', 6),
(215, 1199, 400, '2025-03-12', '2025-04-12', 1100, NULL, 7292, '7292.jpg', 'Paid', '2025-03-12 08:56:34', '2025-03-12 08:56:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fee_versions`
--

CREATE TABLE `fee_versions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `amount_paid` bigint(20) NOT NULL,
  `balances` bigint(20) DEFAULT 0,
  `receipt_number` int(10) UNSIGNED DEFAULT NULL,
  `receipt_image` varchar(255) NOT NULL,
  `status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Paid',
  `installment_no` int(11) DEFAULT 1,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_24_161407_create_courses_table', 2),
(6, '2024_04_24_162313_create_about_table', 3),
(8, '2024_09_08_054920_update_courses_table', 4),
(9, '2024_11_03_052811_create_news_table', 5),
(10, '2024_11_20_014537_add_tags_and_url_to_posts_table', 6),
(11, '2025_03_02_131633_add_added_by_to_students_table', 7),
(12, '2025_03_02_140216_add_edit_count_to_students', 8),
(13, '2025_03_03_041613_add_is_active_to_students_table', 9),
(14, '2025_03_03_050012_add_status_to_student_versions_table', 10),
(15, '2025_03_06_130117_add_course_status_to_students_table', 11),
(16, '2025_03_09_105703_create_assignments_table', 12),
(17, '2025_03_09_132541_add_student_id_to_users_table', 12),
(18, '2025_03_10_015301_add_username_to_users_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `image`, `created_at`, `updated_at`, `tags`, `url`) VALUES
(2, 1, 'Digital Marketing in Jahangirpuri', '<p><strong>Master Digital Marketing at Jahangirpuri with Nice Web Technologies!</strong></p><p>🚀 <strong>Kickstart Your Digital Career Today!</strong> 🚀</p><p>At <strong>Nice Web Technologies</strong>, located in the heart of <strong>Jahangirpuri</strong>, we offer a <strong>comprehensive Digital Marketing course</strong> that covers everything you need to become a digital marketing expert.</p><h3><strong>Why Choose Us?</strong></h3><ul><li><strong>Expert Trainers:</strong> Learn from seasoned professionals with industry experience.</li><li><strong>Hands-on Experience:</strong> Gain practical knowledge through real-world projects.</li><li><strong>Flexible Timings:</strong> Choose from weekend or weekday classes to fit your schedule.</li><li><strong>Affordable Fees:</strong> Learn Digital Marketing without breaking the bank!</li></ul><h3><strong>Course Modules Include:</strong></h3><ul><li>Search Engine Optimization (SEO)</li><li>Google Ads &amp; Facebook Ads</li><li>Social Media Marketing (SMM)</li><li>Content Marketing &amp; Blogging</li><li>Email Marketing &amp; Analytics</li></ul><h3><strong>Course Duration:</strong> Flexible options (Weekend/Weekdays classes available)</h3><h3><strong>Special Offer!</strong></h3><ul><li>Get <strong>20% OFF</strong> on course fees as part of our <strong>25th Anniversary Celebration!</strong></li></ul><p>📍 <strong>Location:</strong> A1-9/10, A Block Rd, Near Da Pizza Palace, Bhalswa, Jahangirpuri, Delhi-110033</p><p>📞 <strong>Contact Us:</strong></p><p>Phone: <strong>9312945741</strong></p><p>Email: <strong>nicewebtechnologies@gmail.com</strong></p><p>Take your first step toward a successful career in <strong>Digital Marketing</strong>. Enroll today at <strong>Nice Web Technologies</strong>!</p><p>#DigitalMarketing #Jahangirpuri #LearnDigitalMarketing #SEO #SocialMediaMarketing #NiceWebTechnologies #VocationalTraining #DigitalMarketingCourse #CareerGrowth</p>', 'posts/sEkQKsRuYH5Y0NVNEQbVDGQWnpwjezBmLhleGPQs.png', '2024-11-06 02:08:45', '2024-11-09 21:31:28', NULL, 'digital-marketing-in-jahangirpuri'),
(3, 1, 'Basic Computer Institute In Jahangirpuri', '<h2>Best Basic Computer Institute In Jahangirpuri</h2><p><a href=\"http://www.computerinstiuteindelhijahangirpuri.com/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Nice Computer Institute</a>&nbsp;is Best Basic Computer Institute In Jahangirpuri This Course course Comprises of Basic Word, Excel, Powerpoint, Internet and Web.</p><p>Basic Computer batches begin from 1st November 2020.</p><p>Join Now : For the admission of both online offline classes&nbsp;</p><p><a href=\"tel:9312945741\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Call</a>&nbsp;or&nbsp;<a href=\"https://wa.me/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Whatsapp</a>&nbsp;at-9312945741</p><p>&nbsp;</p>', 'posts/2dsTncaK3ZBEG6myBF2QckE8kqjN7t99Lbbnktco.jpg', '2024-11-06 02:10:07', '2024-11-09 21:29:20', NULL, 'basic-computer-institute-in-jahangirpuri'),
(4, 1, 'Computer courses In Jahangirpuri', '<p><a href=\"https://www.computerinstituteindelhijahangirpuri.com/courses/best-career-counselling/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\"><strong>Computer courses</strong></a><strong>&nbsp;In&nbsp;</strong><a href=\"https://www.computerinstituteindelhijahangirpuri.com/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\"><strong>Jahangirpuri</strong></a><strong>&nbsp;since 2001 is the best &amp;</strong>courses offered are graphic design, Marg,<a href=\"https://www.computerinstituteindelhijahangirpuri.com/tally-institute-in-jahangirpuri/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Tally</a>,<a href=\"https://www.computerinstituteindelhijahangirpuri.com/courses/advance_excel_nice_computer_institute/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Adv.Exl</a>,Web Design &amp; development,Basic,busy&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/courses/autocad/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">AutoCAD</a>&nbsp;and many more.​&nbsp;<a href=\"https://nicewebtechnologies.com/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\"><strong>Nice Web Technologies</strong></a>&nbsp;is an independent education institute established in 2001.</p><p>Not only this computer&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/nice-computer-institute-2/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">institute</a>&nbsp;provides variety of computer computer courses in Jahangirpuri Nice Computer Institute focuses on creating a friendly environment and providing quality teaching and learning but also with 100% practical, the Institute provides most with its theory classes as well .</p><h3>Computer Courses In Jahangirpuri Welcomes You..</h3><p><strong>Nice Computer Institute is ​​</strong>&nbsp;a computer institute in jahangirpuri welcomes you to explore the unlimited boundaries of I.T. education.Moreover, Welcoming you at Nice Computer Institute we always call our students&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/autocad-training-at-nice-computer-institute-in-jahangirpuri/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">dreamers</a>&nbsp;who aspire to dream and achieve big.​​​​​​​​</p><h2>Computer courses In Jahangirpuri (Nice Computer) Aims To Provide The Best</h2><p>Although there are several organizations who teach computer or who deal in computer education but what makes us different in the folk is the technique, technology and methodology which we adopt at our computer institute.</p><h3>Adapts The Best Teaching Methodologies</h3><p>We bring you the best in I.T. training methodology. Besides this, The faculties always train themselves so that you can get the latest information and knowledge in the field.</p><h3>Authorized Training Partners</h3><p>Computer courses in Jahangirpuri offered by Nice Computer is authorized as well as the largest partner of MARG ERP System, BUSY and Accountancy and we can bring to you the Latest Software Updates and providing you with the latest technical details and functions in the field of computer education.</p><p>First of all, at Nice, we not only provide you Offline Lab and Theoretical classes but also we have the facility of providing online classes at your convenient places. These facilities make us the leading institute for Working Class, Housewives and especially able&nbsp;persons.</p><h3>Placed more than 1000 students</h3><p>With the help of our HR-Managers and our In-House Placement services, we not only help you in searching for jobs but also provide training for Interviews and Group Discussions after the computer courses in Jahangirpuri completion from Nice Computer.</p><h3>Also Update you Regularly</h3><p>We provide you with regular updates and notifications on your exclusive social media platform so that you are always aware of New Development in I.T. Field and our services to you.</p><p>Thanks once again for selecting us to serve you and I, on behalf of Nice Web Technologies assure you for the best teaching practices and services to all our entrants.</p>', 'posts/cSu3weRLXdK4SzIS9P1qjMM9gkWNjpv0jwxlyr36.jpg', '2024-11-07 01:05:59', '2024-11-09 21:28:47', NULL, 'computer-courses-in-jahangirpuri'),
(5, 1, 'Elevate Your Accounting Skills with Busy Software Training!', '<p>🚀&nbsp;<strong>Elevate Your Accounting Skills with Busy Software Training!</strong></p><p>Are you ready to take your accounting proficiency to new heights? Join us at&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/contact/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Nice Computer Institute</a>&nbsp;in Jahangirpuri for an immersive and comprehensive Busy Software Training program. 📊💼</p><p>At Nice Computer Institute, we recognize the pivotal role that efficient accounting plays in the business world. Whether you’re a student gearing up for a career in finance or a professional looking to enhance your skills, our Busy Software Training is tailored to meet your needs.</p><p>🔍&nbsp;<strong>What Sets Our Training Apart?</strong></p><p>✅&nbsp;<strong>Expert Instructors:</strong>&nbsp;Learn from industry experts who bring real-world experience and insights into the classroom.</p><p>✅&nbsp;<strong>Hands-On Learning:</strong>&nbsp;Immerse yourself in practical, hands-on exercises to apply theoretical knowledge in a real-world context.</p><p>✅&nbsp;<strong>Cutting-Edge Infrastructure:</strong>&nbsp;Train in a state-of-the-art facility equipped with the latest technology, providing an optimal learning environment.</p><p>✅&nbsp;<strong>Flexible Learning Schedule:</strong>&nbsp;We understand the importance of flexibility. Our training programs offer schedules that suit both students and working professionals.</p><p>📈&nbsp;<strong>Course Highlights:</strong></p><p>🔹&nbsp;<strong>Introduction to Busy Software:</strong>&nbsp;Understand the fundamentals and features of Busy Accounting Software.</p><p>🔹&nbsp;<strong>Navigating the Interface:</strong>&nbsp;Learn how to efficiently navigate the Busy Software interface for seamless use.</p><p>🔹&nbsp;<strong>Data Entry and Management:</strong>&nbsp;Master the art of data entry, ensuring accuracy and efficiency in your accounting processes.</p><p>🔹&nbsp;<strong>Reports Generation:</strong>&nbsp;Unlock the power of Busy Software to generate insightful reports for informed decision-making.</p><p>🔹&nbsp;<strong>Troubleshooting and Tips:</strong>&nbsp;Acquire troubleshooting skills and explore tips for optimizing your use of Busy Software.</p><p>📆&nbsp;<strong>Enroll Now!</strong></p><p>Ready to boost your accounting prowess with Busy Software Training? Enroll now at&nbsp;<a href=\"https://nicewebtechnologies.com/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Nice Computer Institute in Jahangirpuri</a>and embark on a journey to excel in the world of accounting.</p><p>📞&nbsp;<strong>Contact us at 9312945741 to secure your spot or to learn more about our Busy Software Training program. Don’t miss this opportunity to advance your career and enhance your accounting skills! 🚀🔢</strong></p>', 'posts/0LU5mK2CcFal9QrRMnlFt7R3kPh7wes0O3dCcdXu.png', '2024-11-07 01:07:00', '2024-11-09 21:24:47', NULL, 'elevate-your-accounting-skills-with-busy-software-training!'),
(7, 1, 'MARG ERP Course at Nice Computer Institute', '<p>Welcome to&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/best-marg-academy-nice-computer-institute/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Nice Computer Institute</a>&nbsp;in Jahangirpuri, where we bring you comprehensive training in MARG ERP Course at Nice Computer Institute, a leading accounting and inventory management software. Our MARG ERP course is designed to equip students with the skills and knowledge needed to effectively use this powerful business management tool.</p><h2>Course Overview</h2><p><strong>Course Title:</strong>&nbsp;MARG ERP Training</p><p><strong>Duration:</strong>&nbsp;18 Weeks</p><p><strong>Mode:</strong>&nbsp;Onsite</p><p><strong>Course Code:</strong>&nbsp;MARG101</p><h2>What You Will Learn</h2><ul><li><strong>Introduction to MARG ERP:</strong>&nbsp;Understand the fundamentals and features of MARG ERP software.</li><li><strong>Accounting with MARG:</strong>&nbsp;Learn how to manage and maintain accurate financial records using MARG ERP.</li><li><strong>Inventory Management:</strong>&nbsp;Gain proficiency in handling inventory, tracking stock levels, and managing supply chains.</li><li><strong>GST Compliance:</strong>&nbsp;Explore the GST module within MARG ERP, ensuring compliance with tax regulations.</li><li><strong>Practical Application:</strong>&nbsp;Get hands-on experience through practical exercises and real-world scenarios.</li></ul><h2>Why Choose MARG ERP at&nbsp;<a href=\"http://nicewebtechnologies.com/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Nice Computer Institute</a>?</h2><ul><li><strong>Experienced Instructors:</strong>&nbsp;Learn from industry professionals with extensive experience in MARG ERP and accounting practices.</li><li><strong>Practical Training:</strong>&nbsp;Our curriculum emphasizes practical skills, ensuring you can apply what you learn in a real business setting.</li><li><strong>Placement Assistance:</strong>&nbsp;Benefit from our dedicated placement cell that actively connects students with job opportunities in the field.</li></ul><h2>Course Schedule (Spring 2024)</h2><ul><li><strong>Start Date:</strong>Feb 1, 2024</li><li><strong>End Date:</strong>&nbsp;March 15, 2024</li><li><strong>Location:</strong>&nbsp;Nice Computer Institute, A1-9/10, A Block Rd, Bhalswa Jahangirpuri, Delhi, 110033, India</li></ul><h2>Enroll Now!</h2><p>Don’t miss the opportunity to enhance your skills and open doors to new career possibilities. Enroll in our MARG ERP course at Nice Computer Institute today!</p><p>For more information and enrollment details,&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/courses/top-5-trending-computer-courses-nice-computer-institute/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">visit our course page</a>.</p><p>Contact at : 9312945741</p>', 'posts/TBDURhIQvxmS7mL8E3TIJlbKCD3LLZGzKq1uCh4z.png', '2024-11-09 19:39:55', '2024-11-09 21:27:48', NULL, 'marg-erp-course-at-nice-computer-institute'),
(8, 1, 'Web Design in Jahangirpuri with Nice Computer Institute', '<p>🌟 Dive into the World of Web Design in Jahangirpuri with Nice Computer Institute🌟</p><p><img src=\"https://www.computerinstituteindelhijahangirpuri.com/wp-content/uploads/2024/04/4-1024x1024.jpg\" alt=\"Web Design in Jahangirpuri\" height=\"1080\" width=\"1080\"></p><p>Are you eager to unleash your creativity and build&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/jahangirpuri-computer-center/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">stunning websites</a>&nbsp;that leave a lasting impression? Look no further!&nbsp;<a href=\"http://nicewebtech.com/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Web Design</a>&nbsp;in Jahangirpuri is thrilled to announce our comprehensive&nbsp;<a href=\"https://www.computerinstituteindelhijahangirpuri.com/courses/web-designing-course/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Web Designing</a>&nbsp;Course, crafted to equip you with the skills and knowledge needed to thrive in the digital realm.</p><h1>🌟 Embark on the World of Web Design with Nice Web Technologies! 🌟</h1><p>Are you eager to unleash your creativity and build stunning websites? Look no further! Nice Web Technologies offers a comprehensive Web Designing Course to equip you with the skills needed to thrive in the digital realm.</p><p><img src=\"https://www.computerinstituteindelhijahangirpuri.com/wp-content/uploads/2024/04/webdesign_in_Jahangirpuri-2-1024x1024.jpg\" alt=\"Web Design in Jahangirpuri\" height=\"1024\" width=\"1024\"></p><p>🎨&nbsp;<strong>Unlock Your Creativity</strong>: Explore design theory fundamentals, and turn your ideas into visually captivating web pages.</p><p>💻&nbsp;<strong>Master the Tools</strong>: From HTML to CSS, JavaScript, and responsive design techniques, our expert instructors will guide you through modern web development.</p><p>🚀&nbsp;<strong>Launch Your Career</strong>: Whether you’re a beginner or aiming to level up, our hands-on approach ensures you’re ready for real-world projects and impressing potential employers.</p><p>📅&nbsp;<strong>Flexible Learning</strong>: Choose from in-person or online sessions, designed to fit your schedule seamlessly.</p><p>Embark on an exciting journey into web design with Nice Web Technologies. Enroll now and take the first step towards a fulfilling career!</p><p>For more information and to register, visit&nbsp;<span style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Nice Web Technologies</span>&nbsp;today!</p><p>#WebDesign, #WebDevelopment, #CreativeSkills, #NiceWebTechnologies</p>', 'posts/bbJsOmlqhPjaaFw9h3pH9FAqY4P7zTg3VXkOxgjH.jpg', '2024-11-09 20:28:09', '2024-11-10 23:26:35', NULL, 'web-design-in-jahangirpuri-with-nice-computer-institute'),
(9, 1, 'Web Deisgn', '<p><strong>Web Designing course</strong>&nbsp;with Nice Web Technologies</p><p><a href=\"https://nicewebtechnologies.com/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Nice Web Technologies</a>&nbsp;offers professional training in&nbsp;<strong>web designing course</strong>. Learn from the experts and get ahead in your career.</p><p>The course includes all the latest tools and technologies that every web designer needs to know. The training is conducted by Professional&nbsp;<a href=\"https://nicecomputerinstitute.nicewebtech.com/best-graphic-design-institute-nice-computer-institute/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">graphic design</a>&nbsp;&amp; Web Design instructor from&nbsp;<a href=\"https://nicecomputerinstitute.nicewebtech.com/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Nice Computer Institute</a>, who has more than 15 years of experience in designing websites.</p><p>If you’re a student who wants to learn more about&nbsp;<strong>web design course</strong>, you’ve come to the right place. This will help you build your skills and create beautiful websites packed with information and resources . Whether you’re a beginner or a pro, you’ll find something here to help you take your web design skills to the next</p><p>Your transition into&nbsp;<strong>web design course</strong>&nbsp;from Nice Web Technologies when learned is not just about learning the basics skill but also There are so many things that you need to know and learn in order to create an amazing website, such as HTML, CSS, JavaScript, AJAX, MySQL, PHP and Node.js. Find out if you have what it takes to be a web designer by enrolling in the course today!</p><p><strong>Learn Web Design Course</strong>&nbsp;from Nice Computer Institute the Course Includes HTML,CSS,JAVASCRIPT,AZAX,JQUERY,MYSQL,PHP,NODE.JS and many more.</p><p>This course is for students who want to learn about web design and development. The course includes topics like HTML, CSS, JavaScript, AJAX, jQuery, MySQL, PHP, Node.js, and many more. This course is perfect for students who want to learn how to create websites from scratch or improve their existing skills.</p><h2>Introduction to Web Development</h2><p>in this section, we will be discussing the basics of&nbsp;<strong>a web designing course</strong>&nbsp;and some of the essential skills. We will also be providing some tips on how to choose the right web development course for you.</p><p>Web design is the process of creating and maintaining websites. It involves a lot of different aspects, such as website design, web content development, server-side scripting, client-side scripting, and database management.</p><p>As a web designer, you need to have a good understanding of all these different aspects in order to be able to create a successful website.</p><p>The first step in becoming a web developer is to choose the right web development course. There are many different courses available, so it is important to find one that suits your needs and interests.</p><p>If you are interested in learning about all aspects of web development, then you should enroll in a comprehensive course that covers everything from website design to server-side scripting. However, if you only want to focus on one specific aspect of web development, such as<strong>&nbsp;website design course</strong>, then you can enroll in a course that only covers that topic.</p><p>Once you have chosen the right course, it is time to start learning!</p><p>What are some of the top courses provided by computer training institutes in Delhi?</p><p><br></p><p>1.&nbsp;<a href=\"https://nicecomputerinstitute.nicewebtech.com/digital-marketing-expert/?customize_changeset_uuid=2b0f001c-8c0b-4cec-a78c-3fb0939bcb06&amp;customize_messenger_channel=preview-1\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Digital Marketing</a></p><p>2.<a href=\"https://nicecomputerinstitute.nicewebtech.com/autocad-training-at-nice-computer-institute-in-jahangirpuri/?customize_changeset_uuid=2b0f001c-8c0b-4cec-a78c-3fb0939bcb06&amp;customize_messenger_channel=preview-1\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">AutoCAD (Computer Aided Design)</a></p><p>3.<a href=\"https://nicecomputerinstitute.nicewebtech.com/best-marg-academy-nice-computer-institute/?customize_changeset_uuid=2b0f001c-8c0b-4cec-a78c-3fb0939bcb06&amp;customize_messenger_channel=preview-1\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Marg accountancy course (ERP-9)</a></p><p>4.<a href=\"https://nicecomputerinstitute.nicewebtech.com/best-tally-institute-nice-computer-institute/?customize_changeset_uuid=2b0f001c-8c0b-4cec-a78c-3fb0939bcb06&amp;customize_messenger_channel=preview-1\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Tally accountancy course (ERP-9)</a></p><p>5.<a href=\"https://nicecomputerinstitute.nicewebtech.com/busy-training-institute-business-accounting-software-nice-computer-institute/?customize_changeset_uuid=2b0f001c-8c0b-4cec-a78c-3fb0939bcb06&amp;customize_messenger_channel=preview-1\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Busy accountancy course</a></p><p>6.<a href=\"https://nicecomputerinstitute.nicewebtech.com/advance-excel-institute-nice-computer-institute/?customize_changeset_uuid=2b0f001c-8c0b-4cec-a78c-3fb0939bcb06&amp;customize_messenger_channel=preview-1\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Advance Excel Course</a></p><p>7.<a href=\"https://nicecomputerinstitute.nicewebtech.com/best-graphic-designing-and-multimedia-institute-nice-computer-institute/?customize_changeset_uuid=2b0f001c-8c0b-4cec-a78c-3fb0939bcb06&amp;customize_messenger_channel=preview-1\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Graphic Designing Course</a></p><p>8.<a href=\"https://nicecomputerinstitute.nicewebtech.com/courses/web-designing-course/?customize_changeset_uuid=2b0f001c-8c0b-4cec-a78c-3fb0939bcb06&amp;customize_messenger_channel=preview-1\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Web Designing Course</a></p><p>9.<a href=\"https://nicecomputerinstitute.nicewebtech.com/courses/python-institute-jahangirpuri/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">Python Programming Language</a></p><p>10<a href=\"https://nicecomputerinstitute.nicewebtech.com/courses/programming-languages/\" target=\"_blank\" style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\">.C++ Programming Language</a></p>', 'post_images/X1KhFKCaff9r9NckrSJJjqWG9RQLAYNMObHGqLpH.jpg', '2024-11-11 03:38:36', '2024-11-11 03:38:36', NULL, 'web-deisgn'),
(10, 1, 'Web Designing in Jahangirpuri', '<p><strong>Web Designing course</strong>&nbsp;with Nice Web Technologies</p><p><a style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\" href=\"https://nicewebtechnologies.com/\">Nice Web Technologies</a>&nbsp;offers professional training in&nbsp;<strong>web designing course</strong>. Learn from the experts and get ahead in your career.</p><p>The course includes all the latest tools and technologies that every web designer needs to know. The training is conducted by Professional&nbsp;<a style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\" href=\"https://www.computerinstituteindelhijahangirpuri.com/graphic-design\">graphic design</a>&nbsp;&amp; Web Design instructor from&nbsp;<a style=\"color: rgb(0, 33, 71); background-color: rgba(255, 255, 255, 0);\" href=\"https://www.computerinstituteindelhijahangirpuri.com/\">Nice Computer Institute</a>, who has more than 15 years of experience in designing websites.</p><p>If you’re a student who wants to learn more about&nbsp;<strong>web design course</strong>, you’ve come to the right place. This will help you build your skills and create beautiful websites packed with information and resources . Whether you’re a beginner or a pro, you’ll find something here to help you take your web design skills to the next</p><p>Your transition into&nbsp;<strong>web design course</strong>&nbsp;from Nice Web Technologies when learned is not just about learning the basics skill but also There are so many things that you need to know and learn in order to create an amazing website, such as HTML, CSS, JavaScript, AJAX, MySQL, PHP and Node.js. Find out if you have what it takes to be a web designer by enrolling in the course today!</p><p><strong>Learn Web Design Course</strong>&nbsp;from Nice Computer Institute the Course Includes HTML,CSS,JAVASCRIPT,AZAX,JQUERY,MYSQL,PHP,NODE.JS and many more.</p><p>This course is for students who want to learn about web design and development. The course includes topics like HTML, CSS, JavaScript, AJAX, jQuery, MySQL, PHP, Node.js, and many more. This course is perfect for students who want to learn how to create websites from scratch or improve their existing skills.</p><h2>Introduction to Web Development</h2><p>in this section, we will be discussing the basics of&nbsp;<strong>a web designing course</strong>&nbsp;and some of the essential skills. We will also be providing some tips on how to choose the right web development course for you.</p><p>Web design is the process of creating and maintaining websites. It involves a lot of different aspects, such as website design, web content development, server-side scripting, client-side scripting, and database management.</p><p>As a web designer, you need to have a good understanding of all these different aspects in order to be able to create a successful website.</p><p>The first step in becoming a web developer is to choose the right web development course. There are many different courses available, so it is important to find one that suits your needs and interests.</p><p>If you are interested in learning about all aspects of web development, then you should enroll in a comprehensive course that covers everything from website design to server-side scripting. However, if you only want to focus on one specific aspect of web development, such as<strong>&nbsp;website design course</strong>, then you can enroll in a course that only covers that topic.</p><p>Once you have chosen the right course, it is time to start learning!</p><p><br></p><p><br></p><p><br></p>', 'post_images/xXxAdL4iHbaN56Q2vfMuSFsWjy4Cw58ViSNlTRYl.jpg', '2024-11-18 03:30:04', '2024-11-18 03:31:11', NULL, 'web-designing-in-jahangirpuri');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `file_name`, `file_path`, `uploaded_at`) VALUES
(1, '7098.jpg', 'receipts/7098.jpg', '2025-01-22 16:18:49'),
(2, '7099.jpg', 'receipts/7099.jpg', '2025-01-22 16:18:49'),
(3, '7100.jpg', 'receipts/7100.jpg', '2025-01-22 16:18:49'),
(4, '7101.jpg', 'receipts/7101.jpg', '2025-01-22 16:18:49'),
(5, '7102.jpg', 'receipts/7102.jpg', '2025-01-22 16:18:49'),
(6, '7103.jpg', 'receipts/7103.jpg', '2025-01-22 16:18:49'),
(7, '7104.jpg', 'receipts/7104.jpg', '2025-01-22 16:18:49'),
(8, '7105.jpg', 'receipts/7105.jpg', '2025-01-22 16:18:49'),
(9, '7106.jpg', 'receipts/7106.jpg', '2025-01-22 16:18:49'),
(10, '7107.jpg', 'receipts/7107.jpg', '2025-01-22 16:18:49'),
(11, '7108.jpg', 'receipts/7108.jpg', '2025-01-22 16:18:49'),
(12, '7109.jpg', 'receipts/7109.jpg', '2025-01-22 16:18:49'),
(13, '7110.jpg', 'receipts/7110.jpg', '2025-01-22 16:18:49'),
(14, '7111.jpg', 'receipts/7111.jpg', '2025-01-22 16:18:49'),
(15, '7112.jpg', 'receipts/7112.jpg', '2025-01-22 16:18:49'),
(16, '7113.jpg', 'receipts/7113.jpg', '2025-01-22 16:18:49'),
(17, '7114.jpg', 'receipts/7114.jpg', '2025-01-22 16:18:49'),
(18, '7115.jpg', 'receipts/7115.jpg', '2025-01-22 16:18:49'),
(19, '7116.jpg', 'receipts/7116.jpg', '2025-01-22 16:18:49'),
(20, '7117.jpg', 'receipts/7117.jpg', '2025-01-22 16:18:49'),
(21, '7118.jpg', 'receipts/7118.jpg', '2025-01-22 16:22:09'),
(22, '7119.jpg', 'receipts/7119.jpg', '2025-01-22 16:22:09'),
(23, '7120.jpg', 'receipts/7120.jpg', '2025-01-22 16:22:09'),
(24, '7121.jpg', 'receipts/7121.jpg', '2025-01-22 16:22:09'),
(25, '7122.jpg', 'receipts/7122.jpg', '2025-01-22 16:22:09'),
(26, '7123.jpg', 'receipts/7123.jpg', '2025-01-22 16:22:09'),
(27, '7124.jpg', 'receipts/7124.jpg', '2025-01-22 16:22:09'),
(28, '7125.jpg', 'receipts/7125.jpg', '2025-01-22 16:22:09'),
(29, '7126.jpg', 'receipts/7126.jpg', '2025-01-22 16:22:09'),
(30, '7127.jpg', 'receipts/7127.jpg', '2025-01-22 16:22:09'),
(31, '7128.jpg', 'receipts/7128.jpg', '2025-01-22 16:22:09'),
(32, '7129.jpg', 'receipts/7129.jpg', '2025-01-22 16:22:09'),
(33, '7130.jpg', 'receipts/7130.jpg', '2025-01-22 16:22:09'),
(34, '7131.jpg', 'receipts/7131.jpg', '2025-01-22 16:22:09'),
(35, '7132.jpg', 'receipts/7132.jpg', '2025-01-22 16:22:09'),
(36, '7133.jpg', 'receipts/7133.jpg', '2025-01-22 16:22:09'),
(37, '7134.jpg', 'receipts/7134.jpg', '2025-01-22 16:22:09'),
(38, '7135.jpg', 'receipts/7135.jpg', '2025-01-22 16:22:09'),
(39, '7136.jpg', 'receipts/7136.jpg', '2025-01-22 16:22:09'),
(40, '7137.jpg', 'receipts/7137.jpg', '2025-01-22 16:22:09'),
(41, '7138.jpg', 'receipts/7138.jpg', '2025-01-22 16:24:38'),
(42, '7139.jpg', 'receipts/7139.jpg', '2025-01-22 16:24:38'),
(43, '7140.jpg', 'receipts/7140.jpg', '2025-01-22 16:24:38'),
(44, '7141.jpg', 'receipts/7141.jpg', '2025-01-22 16:24:38'),
(45, '7142.jpg', 'receipts/7142.jpg', '2025-01-22 16:24:38'),
(46, '7143.jpg', 'receipts/7143.jpg', '2025-01-22 16:24:38'),
(47, '7144.jpg', 'receipts/7144.jpg', '2025-01-22 16:24:38'),
(48, '7145.jpg', 'receipts/7145.jpg', '2025-01-22 16:24:38'),
(49, '7146.jpg', 'receipts/7146.jpg', '2025-01-22 16:24:38'),
(50, '7147.jpg', 'receipts/7147.jpg', '2025-01-22 16:24:38'),
(51, '7148.jpg', 'receipts/7148.jpg', '2025-01-22 16:24:38'),
(52, '7149.jpg', 'receipts/7149.jpg', '2025-01-22 16:29:22'),
(53, '7150.jpg', 'receipts/7150.jpg', '2025-01-22 16:29:22'),
(54, '7151.jpg', 'receipts/7151.jpg', '2025-01-22 16:29:22'),
(55, '7152.jpg', 'receipts/7152.jpg', '2025-01-22 16:29:22'),
(56, '7153.jpg', 'receipts/7153.jpg', '2025-01-22 16:29:22'),
(57, '7154.jpg', 'receipts/7154.jpg', '2025-01-22 16:29:22'),
(58, '7155.jpg', 'receipts/7155.jpg', '2025-01-22 16:29:22'),
(59, '7156.jpg', 'receipts/7156.jpg', '2025-01-22 16:29:22'),
(60, '7157.jpg', 'receipts/7157.jpg', '2025-01-22 16:29:22'),
(61, '7158.jpg', 'receipts/7158.jpg', '2025-01-22 16:30:09'),
(62, '7159.jpg', 'receipts/7159.jpg', '2025-01-22 16:30:09'),
(63, '7160.jpg', 'receipts/7160.jpg', '2025-01-22 16:30:09'),
(64, '7161.jpg', 'receipts/7161.jpg', '2025-01-22 16:30:09'),
(65, '7162.jpg', 'receipts/7162.jpg', '2025-01-22 16:30:09'),
(66, '7163.jpg', 'receipts/7163.jpg', '2025-01-22 16:30:09'),
(67, '7164.jpg', 'receipts/7164.jpg', '2025-01-22 16:30:09'),
(68, '7165.jpg', 'receipts/7165.jpg', '2025-01-22 16:30:09'),
(69, '7166.jpg', 'receipts/7166.jpg', '2025-01-22 16:30:09'),
(70, '7167.jpg', 'receipts/7167.jpg', '2025-01-22 16:30:09'),
(71, '7168.jpg', 'receipts/7168.jpg', '2025-01-22 16:30:57'),
(72, '7169.jpg', 'receipts/7169.jpg', '2025-01-22 16:30:57'),
(73, '7170.jpg', 'receipts/7170.jpg', '2025-01-22 16:30:57'),
(74, '7171.jpg', 'receipts/7171.jpg', '2025-01-22 16:30:57'),
(75, '7172.jpg', 'receipts/7172.jpg', '2025-01-22 16:30:57'),
(76, '7173.jpg', 'receipts/7173.jpg', '2025-01-22 16:30:57'),
(77, '7174.jpg', 'receipts/7174.jpg', '2025-01-22 16:30:57'),
(78, '7175.jpg', 'receipts/7175.jpg', '2025-01-22 16:30:57'),
(79, '7176.jpg', 'receipts/7176.jpg', '2025-01-22 16:30:57'),
(80, '7177.jpg', 'receipts/7177.jpg', '2025-01-22 16:30:57'),
(81, '7178.jpg', 'receipts/7178.jpg', '2025-01-22 16:31:29'),
(82, '7179.jpg', 'receipts/7179.jpg', '2025-01-22 16:31:29'),
(83, '7180.jpg', 'receipts/7180.jpg', '2025-01-22 16:31:29'),
(84, '7181.jpg', 'receipts/7181.jpg', '2025-01-22 16:31:29'),
(85, '7182.jpg', 'receipts/7182.jpg', '2025-01-22 16:31:29'),
(86, '7183.jpg', 'receipts/7183.jpg', '2025-01-22 16:31:29'),
(87, '7184.jpg', 'receipts/7184.jpg', '2025-01-22 16:31:29'),
(88, '7185.jpg', 'receipts/7185.jpg', '2025-01-22 16:31:29'),
(89, '7186.jpg', 'receipts/7186.jpg', '2025-01-22 16:31:29'),
(90, '7187.jpg', 'receipts/7187.jpg', '2025-01-22 16:31:29'),
(91, '7188.jpg', 'receipts/7188.jpg', '2025-01-22 16:31:29'),
(92, '7189.jpg', 'receipts/7189.jpg', '2025-01-22 16:31:29'),
(93, '7190.jpg', 'receipts/7190.jpg', '2025-01-22 16:31:29'),
(94, '7191.jpg', 'receipts/7191.jpg', '2025-01-22 16:31:29'),
(95, '7192.jpg', 'receipts/7192.jpg', '2025-01-22 16:31:29'),
(96, '7193.jpg', 'receipts/7193.jpg', '2025-02-08 12:44:00'),
(97, '7194.jpg', 'receipts/7194.jpg', '2025-02-08 12:44:00'),
(98, '7195.jpg', 'receipts/7195.jpg', '2025-02-08 12:44:00'),
(99, '7196.jpg', 'receipts/7196.jpg', '2025-02-08 12:44:01'),
(100, '7197.jpg', 'receipts/7197.jpg', '2025-02-08 12:44:01'),
(101, '7198.jpg', 'receipts/7198.jpg', '2025-02-08 12:44:01'),
(102, '7199.jpg', 'receipts/7199.jpg', '2025-02-08 12:44:01'),
(103, '7200.jpg', 'receipts/7200.jpg', '2025-02-08 12:44:01'),
(104, '7201.jpg', 'receipts/7201.jpg', '2025-02-08 12:44:02'),
(105, '7202.jpg', 'receipts/7202.jpg', '2025-02-08 12:44:02'),
(106, '7203.jpg', 'receipts/7203.jpg', '2025-02-08 12:44:02'),
(107, '7204.jpg', 'receipts/7204.jpg', '2025-02-08 12:44:02'),
(108, '7205.jpg', 'receipts/7205.jpg', '2025-02-08 12:44:02'),
(109, '7206.jpg', 'receipts/7206.jpg', '2025-02-08 12:44:02'),
(110, '7207.jpg', 'receipts/7207.jpg', '2025-02-08 12:44:03'),
(111, '7208.jpg', 'receipts/7208.jpg', '2025-02-08 12:44:03'),
(112, '7209.jpg', 'receipts/7209.jpg', '2025-02-08 12:44:03'),
(113, '7210.jpg', 'receipts/7210.jpg', '2025-02-08 12:44:03'),
(114, '7211.jpg', 'receipts/7211.jpg', '2025-02-08 12:44:03'),
(115, '7212.jpg', 'receipts/7212.jpg', '2025-02-08 12:44:04'),
(116, '7213.jpg', 'receipts/7213.jpg', '2025-02-08 12:47:14'),
(117, '7214.jpg', 'receipts/7214.jpg', '2025-02-08 12:47:14'),
(118, '7215.jpg', 'receipts/7215.jpg', '2025-02-08 12:47:14'),
(119, '7216.jpg', 'receipts/7216.jpg', '2025-02-08 12:47:15'),
(120, '7217.jpg', 'receipts/7217.jpg', '2025-02-08 12:47:15'),
(121, '7218.jpg', 'receipts/7218.jpg', '2025-02-08 12:47:15'),
(122, '7219.jpg', 'receipts/7219.jpg', '2025-02-08 12:47:15'),
(123, '7220.jpg', 'receipts/7220.jpg', '2025-02-08 12:47:15'),
(124, '7221.jpg', 'receipts/7221.jpg', '2025-02-08 12:47:15'),
(125, '7222.jpg', 'receipts/7222.jpg', '2025-02-08 12:47:16'),
(126, '7223.jpg', 'receipts/7223.jpg', '2025-02-08 12:47:16'),
(127, '7224.jpg', 'receipts/7224.jpg', '2025-02-15 14:23:07'),
(128, '7225.jpg', 'receipts/7225.jpg', '2025-02-15 14:23:07'),
(129, '7226.jpg', 'receipts/7226.jpg', '2025-02-15 14:23:07'),
(130, '7227.jpg', 'receipts/7227.jpg', '2025-02-15 14:23:08'),
(131, '7228.jpg', 'receipts/7228.jpg', '2025-02-15 14:23:08'),
(132, '7229.jpg', 'receipts/7229.jpg', '2025-02-15 14:23:08'),
(133, '7230.jpg', 'receipts/7230.jpg', '2025-02-15 14:23:08'),
(134, '7231.jpg', 'receipts/7231.jpg', '2025-02-15 14:23:08'),
(135, '7232.jpg', 'receipts/7232.jpg', '2025-02-15 14:23:09'),
(136, '7233.jpg', 'receipts/7233.jpg', '2025-02-15 14:23:09'),
(137, '7234.jpg', 'receipts/7234.jpg', '2025-02-15 14:23:09'),
(138, '7235.jpg', 'receipts/7235.jpg', '2025-02-15 14:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `student_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) NOT NULL DEFAULT 'super_admin',
  `updated_by` varchar(255) NOT NULL DEFAULT 'super_admin',
  `status` enum('active','inactive','left','completed') NOT NULL DEFAULT 'active',
  `course_status` enum('ongoing','completed','dropped') NOT NULL DEFAULT 'ongoing',
  `installment_no` int(11) DEFAULT 1,
  `edit_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `is_active`, `student_id`, `name`, `father_name`, `doa`, `batch`, `photo`, `created_at`, `updated_at`, `course_id`, `contact_number`, `added_by`, `updated_by`, `status`, `course_status`, `installment_no`, `edit_count`) VALUES
(1, 1, 1129, 'Gulkesh Kamar', 'Md. Amin Uddin', '2024-08-31', '10:00 AM', '1129.jpg', '2024-12-18 01:13:28', '2025-03-14 07:24:47', 445, '93136 68328', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(2, 1, 1130, 'Aarti ', 'Mr. Mukesh Kumar', '2024-09-09', '09:00 AM', '1130.jpg', '2024-12-18 01:13:28', '2025-03-11 23:36:32', 407, ' 87440 21359', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(3, 1, 1131, 'Manish Dang', 'Devender Kumar', '2024-09-03', '8AM', '1131.jpg', '2024-12-18 01:13:28', '2025-01-20 01:12:56', 417, '98733 88853', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(4, 1, 1133, 'Inderjeet Kaur', 'Jagmohan Singh', '2024-09-09', '9AM', '1133.jpg', '2024-12-18 01:13:28', '2025-01-20 02:47:38', 400, ' 93108 59955', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(5, 1, 1134, 'Balbir Singh', 'Jagmohan Singh', '2024-09-09', '9AM', '1134.jpg', '2024-12-18 01:13:28', '2025-01-20 02:48:06', 400, ' 93108 59955', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(6, 1, 1135, 'Ruchita Mehta', ' Mr. Jagat Singh', '2024-09-20', '11AM', '1135.jpg', '2024-12-18 01:13:28', '2025-01-30 08:20:50', 400, ' 98731 41802', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(7, 1, 1136, 'Kashish Rajput', ' Mr. Vipin', '2024-09-20', '11AM', '1136.jpg', '2024-12-18 01:13:28', '2025-02-12 22:17:05', 400, ' 70657 35487', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(8, 1, 1137, 'Vijay', 'Mr. Ranvir Singh', '2024-09-20', '11:00 AM', '1137.jpg', '2024-12-18 01:13:28', '2025-03-14 07:24:50', 404, '98704 55357', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(9, 1, 1138, 'Mohd Sami ', 'Mohd. Tahir', '2024-09-16', '2PM', '1138.jpg', '2024-12-18 01:13:28', '2025-01-20 01:12:56', 400, ' 87001 51686', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(10, 1, 1142, 'Zhilik Mandal', 'Mr. Sukhen Mandal', '2024-09-24', '12:00 PM', '1142.jpg', '2024-12-18 01:13:28', '2025-03-11 23:08:22', 413, ' 82874 82757', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(11, 1, 1143, 'Mayank Gehlot', 'Ravinder Kumar', '2024-09-26', '1PM', '1143.jpg', '2024-12-18 01:13:28', '2025-01-20 01:12:56', 400, ' 93544 32251', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(12, 1, 1144, 'Geeta', 'Raj Kumar Thakur', '2024-09-26', '08:00 AM - 09:00 AM', '1144.jpg', '2024-12-18 01:13:28', '2025-02-11 04:38:34', 400, '95829 80266', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(13, 1, 1145, 'Siddharth', 'Phool Kishore ', '2024-09-26', '12PM', '1145.jpg', '2024-12-18 01:13:28', '2025-01-20 01:12:56', 400, '92890 40261', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(14, 1, 1146, 'Gulshan Kumar', 'Mr. Inder Bhan', '2024-09-11', '4-6PM', '1146.jpg', '2024-12-18 01:13:28', '2025-01-20 01:12:56', 412, ' 89292 46479', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(15, 1, 1147, 'Abhilash', 'Mr. Hemraj', '2024-09-26', '07:00 PM', '1147.jpg', '2024-12-18 01:13:28', '2025-03-11 23:36:27', 445, ' 98212 02632', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(16, 1, 1148, 'Raja Kumar', 'Mr. Mahender', '2024-09-27', '9AM', '1148.jpg', '2024-12-18 01:13:28', '2025-01-20 01:12:56', 407, ' 88105 82120', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(17, 1, 1149, 'Roshan Kumar', 'Mr. Pramod Kumar', '2024-09-27', '07:00 PM', '1149.jpg', '2024-12-18 01:13:28', '2025-03-11 23:36:28', 445, ' 96542 25824', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(18, 1, 1151, 'Piyush', 'Sahdev', '2024-10-03', '1PM', '1151.jpg', '2024-12-18 01:13:28', '2025-01-20 01:12:56', 400, '98730 58306', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(19, 1, 1152, 'Sumit singh', 'Balbir Singh', '2024-10-05', '1PM', '1152.jpg', '2024-12-18 01:13:28', '2025-01-20 01:12:56', 400, '9953882451', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(20, 1, 1153, 'Reema Sonkar', 'Deenanath Sonkar', '2024-10-08', '08:00 AM', '1153.jpg', '2024-12-18 01:13:28', '2025-03-12 08:00:14', 400, '89205 77976', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(21, 1, 1154, 'Rohit Kumar', 'Kishan Kumar', '2024-10-17', '11:00 AM', '1154.jpg', '2024-12-18 01:13:28', '2025-03-11 23:08:15', 407, '88007 06451', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(22, 1, 1155, 'Pooja', 'Ghanshyam', '2024-10-23', '09:00 AM', '1155.jpg', '2024-12-18 01:13:28', '2025-03-12 07:47:09', 413, '88514 67462', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(23, 1, 1156, 'Vijay Kumar', 'Ravinder prasad', '2024-11-06', '11 AM', '1156.jpg', '2024-12-31 10:25:48', '2025-03-14 07:02:08', 428, '92663 73516', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(24, 1, 1157, 'Vaibhav Suri ', 'Kamal Suri', '2024-11-06', '6:30pm', '1157.jpg', '2024-12-31 10:25:48', '2025-02-12 00:22:43', 411, '99530 46195', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(25, 1, 1158, 'Rihan Siddiqui', 'Hashim Siddiqui', '2024-11-07', '11:00 AM', '1158.jpg', '2024-12-31 10:25:48', '2025-03-12 08:52:42', 454, '98737 16274', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(26, 1, 1159, 'Hemant Gandhi', 'Nil', '2024-11-04', '9AM', '1159.jpg', '2024-12-31 10:25:48', '2025-02-12 00:22:24', 419, '81780 17956', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(27, 1, 1160, 'Kartik ', 'Sita Ram', '2024-11-18', '06:00 PM', '1160.jpg', '2024-12-31 10:25:48', '2025-03-12 08:00:17', 400, '93103 90133', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(28, 1, 1161, 'Radha Kishan', 'Munna Lal', '2024-12-04', '08:00 AM - 09:00 AM', '1161.jpg', '2024-12-31 10:25:48', '2025-02-12 00:23:11', 406, '9720331361', 'super_admin', 'super_admin', 'left', 'completed', 1, 0),
(29, 1, 1162, 'Gunjan Kumar', 's/o Ramesh Kumar', '2024-11-26', '07:00 PM', '1162.jpg', '2024-12-31 10:25:48', '2025-03-12 08:00:23', 405, '9811579976', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(30, 1, 1163, 'Dinesh Kumar', 'Rakesh Kumar', '2024-12-06', '07:00 PM', '1163.jpg', '2024-12-31 10:25:48', '2025-03-11 23:36:30', 400, '94566 73066', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(31, 1, 1166, 'Naresh sahu', 'Raj Bahadur ', '2024-11-30', '8AM', '1166.jpg', '2024-12-31 10:25:48', '2025-01-20 01:12:56', 405, '78274 02918', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(32, 1, 1168, 'Hema  Gurnani', 'Nil', '2024-12-09', '08:00 AM - 09:00 AM', '1168.jpg', '2024-12-31 10:25:48', '2025-02-12 01:53:28', 419, '8851771267', 'super_admin', 'super_admin', 'left', 'completed', 1, 0),
(33, 1, 1169, 'Abhishek Chaudhary', 'Basuki Nath Chaudhary', '2024-11-26', '09:00 AM', '1169.jpg', '2024-12-31 10:25:48', '2025-03-12 02:37:50', 413, '88261 96089', 'super_admin', 'super_admin', 'left', 'dropped', 1, 0),
(34, 1, 1170, 'Shantanu Sharma', 'Rajesh Sharma', '2024-12-11', '10:00 AM', '1170.jpg', '2024-12-31 10:25:48', '2025-03-13 11:54:48', 400, '93132 83929', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(35, 1, 1172, 'Pawan Kumar Gupta', 'Nanhe Lal Gupta', '2024-12-12', '08 AM', '1172.jpg', '2024-12-31 10:25:48', '2025-03-11 06:30:16', 400, '73908 12606', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(36, 1, 1173, 'Aakash Kumar', 'Dinesh Kumar ', '2024-12-16', '11:00 AM', '1173.jpg', '2024-12-31 10:25:48', '2025-03-11 23:08:17', 413, '99992 09158', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(37, 1, 1084, 'Durgesh Kumar', 'Mr. Suraj Bhan', '2024-05-09', '08:00 AM - 09:00 AM', '1084.jpg', '2024-12-31 10:39:56', '2025-01-23 06:47:04', 424, '76785 52239', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(38, 1, 1085, 'Prince dutta', 'S/o Prem Dutta ', '2024-05-13', '06:00 PM', '1085.jpg', '2024-12-31 10:39:56', '2025-03-12 05:42:20', 445, '85060 42630', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(39, 1, 1086, 'Puspinder ', 'S/o Sovinder Singh', '2024-05-16', '11AM', '1086.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 400, '82872 07362', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(40, 1, 1087, 'Suraj', 'S/o Sh. Parshuram Yadav', '2024-05-17', '8AM', '1087.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 405, '88534 74283', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(41, 1, 1089, 'Mayank Dewett', 'S/o Kamaljeet  Dewett', '2024-05-22', '07:00 PM', '1089.jpg', '2024-12-31 10:39:56', '2025-03-12 05:42:18', 407, '97114 11698', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(42, 1, 1092, 'Neha', 'D/o Kusum Pal', '2024-05-24', '11AM', '1092.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 400, '76786 50420', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(43, 1, 1093, 'Gayatri', 'D/o Kusum Pal', '2024-05-24', '11AM', '1093.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 400, '76786 50420', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(44, 1, 1095, 'Manish kumar', 's/o Rajender pal', '2024-06-04', '2PM', '1095.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 406, '70653 80839', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(45, 1, 1096, 'Cheshta bansal', 'D/o Mr.Naresh Kumar', '2024-06-05', '05:00 PM', '1096.jpg', '2024-12-31 10:39:56', '2025-03-12 05:42:21', 407, '88006 94350', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(46, 1, 1097, 'Arun Kumar', 's/o Shri Ram kumar', '2024-06-11', '9-11AM', '1097.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 407, '99999 87067', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(47, 1, 1100, 'Sushmita ', ' Sukhpal Singh', '2024-06-12', '7PM', '1100.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 404, '73516 98605', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(48, 1, 1101, 'Tannu Mittal', 'd/o Satish Kumar', '2024-06-13', '4PM', '1101.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 400, '99531 11204', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(49, 1, 1103, 'Rimi Biswas', 'D/o Subhash Biswas', '2024-06-27', '2PM', '1103.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 405, '98210 83249', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(50, 1, 1104, 'Abhishek Kumar', 'Mr. Ram nath Sharma', '2024-06-27', '2PM', '1104.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 400, '76784 56855', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(51, 1, 1105, 'Lovenish Gupta', 'Lt. s/o Satish Gupta', '2024-06-29', '7PM', '1105.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 400, '97112 06885', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(52, 1, 1106, 'Himanshu ', 's/o  Anil Kumar', '2024-07-04', '11AM', '1106.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 405, '95822 53719', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(53, 1, 1107, 'Muskan', 'D/o Mr. Sunil Dutt', '2024-07-04', '12PM', '1107.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 400, '95992 92553', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(54, 1, 1110, 'Neha Kashyap', 'w/o Rohit Kashyap', '2024-07-10', '1PM', '1110.jpg', '2024-12-31 10:39:56', '2024-12-31 10:39:56', 400, '7701 921 092', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(55, 1, 1111, 'Deepanshu Gola', 's/o Hariom Gola ', '2024-07-13', '8AM', '1111.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 400, '96256 73192', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(56, 1, 1112, 'Sandeep Kumar', 's/o Mahender Kumar', '2024-07-15', '9AM', '1112.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 419, '98715 80515', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(57, 1, 1113, 'Nishant Nimesh', 's/o Govind singh', '2024-07-16', '6PM', '1113.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 400, '88511 23725', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(58, 1, 1114, 'Sneha  ', 'd/o Mr. Gopal Sah', '2024-07-18', '10-12PM', '1114.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 417, '87501 19472', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(59, 1, 1115, 'Md. Arsh', 'Gufran Ahmad ', '2024-07-22', '12PM', '1115.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 404, '1111111110', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(60, 1, 1117, 'Varun', 'Deepak ', '2024-07-25', '10AM', '1117.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 404, '81784 99585', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(61, 1, 1119, 'Sujad', 'Mr. Guddu', '2024-08-01', '04:00 PM', '1119.jpg', '2024-12-31 10:39:56', '2025-03-12 00:11:01', 413, '93102 96479', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(62, 1, 1120, 'Parul Singh', 'Mr. Pardeep', '2024-08-02', '1PM', '1120.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 400, '87560 37092', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(63, 1, 1121, 'Anvi', 'Mr. Gyan Chand ', '2024-08-03', '2PM', '1121.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 404, '96436 18138', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(64, 1, 1122, 'Dhananjay', 'Mr. Satish Kumar', '2024-08-05', '5PM', '1122.jpg', '2024-12-31 10:39:56', '2025-02-01 12:36:58', 400, '92056 07301', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(65, 1, 1124, 'Adarsh Kumar', 's/o Omkar Nath Singh', '2024-08-13', '08:00 AM - 09:00 AM', '1124.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 417, '92419 06164', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(66, 1, 1125, 'Abhishek  ', 's/o Mr. Dilip', '2024-08-13', '7PM', '1125.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 404, '79826 87063', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(67, 1, 1127, 'Sangam Bharti', 'Jai Prakash', '2024-08-21', '10:00 AM', '1127.jpg', '2024-12-31 10:39:56', '2025-03-11 23:07:36', 413, '98739 36149', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(68, 1, 1128, 'Prem', 'Sri Niwas ', '2024-08-22', '3PM', '1128.jpg', '2024-12-31 10:39:56', '2025-01-20 01:12:56', 404, '88602 06051', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(72, 1, 1022, 'Vaishnavi', 'Shravan Lal', '2024-03-05', '1Pm', '1022.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 454, '92505 37952', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(73, 1, 1023, 'Meena', 'Dharamvir', '2024-03-07', '04:00 PM', '1023.jpg', '2024-12-31 10:53:21', '2025-03-12 08:00:25', 413, '99530 79665', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(74, 1, 1024, 'Ram Pravesh Mishra', 'Lt. Jagdish Mishra', '2024-03-09', '7PM', '1024.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '93117 81385', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(75, 1, 1026, 'Shivani Saxena', 'Ram Pal', '2024-03-14', '8:30AM', '1026.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '88005 81683', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(76, 1, 1027, 'Dilip Bhaskar', 'Harish Kr. Bhaskar', '2024-03-15', '09:00 AM', '1027.jpg', '2024-12-31 10:53:21', '2025-03-13 11:54:40', 404, '88601 91713', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(77, 1, 1028, 'Anuj Bhaskar', 'Harish Kr. Bhaskar', '2024-03-15', '(8-10)AM', '1028.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 404, '88601 91713', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(78, 1, 1029, 'Naveen', 'Mr. Sudama Kumar', '2024-03-20', '1PM', '1029.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 406, '99580 76605', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(79, 1, 1030, 'Yash', 'Dalchand', '2024-03-18', '10AM', '1030.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '93507 39204', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(80, 1, 1031, 'Mamta', 'Mr. Niranjan Singh', '2024-03-20', '3PM', '1031.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '79828 48811', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(81, 1, 1032, 'Aanchal', 'Mr. Dinesh Kumar', '2024-03-20', '7PM', '1032.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '98210 09839', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(82, 1, 1035, 'Nandani', 'Mr.Prakash', '2024-03-26', '4PM', '1035.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '88607 05746', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(83, 1, 1038, 'Rachita', 'Mr. Ajay kumar', '2024-04-01', '11AM', '1038.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 404, '98117 86870', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(84, 1, 1039, 'Akshit', 'Mr. Ajay kumar', '2024-04-01', '11AM', '1039.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '98117 86870', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(85, 1, 1040, 'Nitin Chaudhary', 'Mr. Kailash Chaudhary', '2024-04-01', '09:00 AM', '1040.jpg', '2024-12-31 10:53:21', '2025-03-13 11:54:44', 404, '9625289071', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(86, 1, 1041, 'Tousin', 'Deen Mohammed', '2024-04-01', '2PM', '1041.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '98710 40189', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(87, 1, 1042, 'Deepanshu', 'Mr. Shiv Charan', '2024-04-02', '6PM', '1042.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '81787 22199', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(88, 1, 1044, 'Dev Kumar', 'Indal Prasad', '2024-04-03', '9AM', '1044.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '76830 59733', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(89, 1, 1046, 'Chanchal', 'Suresh Kumar', '2024-04-03', '3PM', '1046.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '93100 34161', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(90, 1, 1048, 'Nakul', 'Mr. Mukesh Kumar', '2024-04-03', '10AM', '1048.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '80761 77913', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(91, 1, 1049, 'Ishant', 'Mr. Sunil Kumar', '2024-04-04', '6PM', '1049.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '98997 31245', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(92, 1, 1050, 'Kasish', 'Mr. Gopal Sharma', '2024-04-04', '4PM', '1050.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '70112 12184', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(93, 1, 1051, 'Vrinda Koli', 'Virender Kumar', '2024-04-06', '6PM', '1051.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 411, '99531 24835', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(94, 1, 1052, 'Chirag Koli', 'Virender Kumar', '2024-04-06', '6PM', '1052.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 409, '99531 24835', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(95, 1, 1054, 'Mohit', 'Mr. Vijay', '2024-04-08', '12PM', '1054.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '97112 69421', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(96, 1, 1055, 'Pooja Kumari', 'Mrs. Usha Devi', '2024-04-08', '1PM', '1055.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 454, '87503 30036', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(97, 1, 1056, 'James', 'Mr. Rajan', '2024-04-09', '6PM', '1056.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 413, ' 86373 60836', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(98, 1, 1058, 'Saba Khan', ' Mustafa Khan', '2024-04-12', '7PM', '1058.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 445, '76782 01064', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(99, 1, 1059, 'Vishal', 'Mr. Binod Ram', '2024-04-12', '4PM', '1059.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '89209 77709', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(100, 1, 1060, 'Pari', 'Mr. Shyam Sunder', '2024-04-12', '4PM', '1060.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '82870 83244', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(101, 1, 1061, 'Ruchi Rani', 'Mr.Rakesh Singh', '2024-04-13', '(10-12)PM', '1061.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 433, '96752 28682', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(102, 1, 1062, 'Lalit Oria', 'Rajesh Kumar', '2024-04-10', '8AM', '1062.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 454, '88602 53492', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(103, 1, 1063, 'Chahat', 'Mr. Deepak Kumar', '2024-04-15', '4PM', '1063.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '80107 41199', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(104, 1, 1064, 'Kanika', 'Mr. Sanjay', '2024-04-15', '4PM', '1064.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '84471 17306', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(105, 1, 1067, 'Ankush Kumar', 'Mr. Mahesh Sah', '2024-04-22', '06:00 PM', '1067.jpg', '2024-12-31 10:53:21', '2025-03-12 07:47:25', 413, '78274 02918', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(106, 1, 1068, 'Jabir', 'Md. Zakir', '2024-04-22', '06:00 PM', '1068.jpg', '2024-12-31 10:53:21', '2025-03-11 23:36:26', 413, '88602 70899', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(107, 1, 1071, 'Madhu', 'Mr.Ram Saran', '2024-04-24', '11AM', '1071.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 445, '98101 98075', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(108, 1, 1075, 'Simran Gupta', 'Mr. Arjun Gupta', '2024-05-02', '11:00 AM', '1075.jpg', '2024-12-31 10:53:21', '2025-03-11 23:08:20', 445, '89209 81299', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(109, 1, 1076, 'Padam', 'Mr.Balram', '2024-05-02', '6PM', '1076.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '88601 61958', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(110, 1, 1080, 'Abdul Mobin', 'Md. Israfil', '2024-05-03', '1PM', '1080.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 406, '75034 85100', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(111, 1, 1081, 'Vaasu', 'Mr. Sanjeev Kumar', '2024-05-04', '5PM', '1081.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '83778 08933', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(112, 1, 1082, 'Swati', 'Late Bala', '2024-05-07', '4PM', '1082.jpg', '2024-12-31 10:53:21', '2024-12-31 10:53:21', 400, '99998 68512', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(113, 1, 1083, 'Sohail Khan', 'Md. Firoz Khan', '2024-05-09', '09:00 AM', '1083.jpg', '2024-12-31 10:53:21', '2025-03-14 07:24:43', 404, '70115 97500', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(114, 1, 985, 'Yogesh', 'Bhagwan Dass', '2023-08-12', '8Am', '985.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 445, '74285 44512', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(116, 1, 991, 'Viren Yadav', 'Mr. Chand Pal Singh Yadav', '2023-12-27', '12PM', '991.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 406, '91364 82664', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(117, 1, 993, 'Kulvinder Singh', 'Mr. Gurbachan singh', '2024-01-06', '1PM', '993.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 406, '75006 11038', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(118, 1, 995, 'Priyanka Kri. Singh', 'Mr. Chitaranjan Kumar', '2023-01-13', '4PM', '995.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 405, '88102 99014', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(119, 1, 996, 'Prince Kumar Singh', 'Mr. Chitaranjan Kumar', '2024-01-13', '4PM', '996.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 405, '88102 99014', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(120, 1, 997, 'Pari Patel', 'Mr. Diwakar Patel', '2024-01-15', '11AM', '997.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 400, '98712 75598', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(121, 1, 998, 'Vaishnavi Patel', 'Mr. Diwakar Patel', '2024-01-15', '11AM', '998.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 400, '78384 13093', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(122, 1, 999, 'Priyanshu Tripathi', 'Mr. Bhola nath', '2024-01-16', '2-4PM', '999.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 400, '98918 06568', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(123, 1, 1000, 'Divyanshu ', 'Mr.  Surender kumar', '2024-01-17', '11-12PM', '1000.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 405, '99993 02669', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(124, 1, 1002, 'Dheeraj kumar', 'Mr. Saroj', '2024-01-23', '7PM', '1002.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 404, '88009 76508', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(125, 1, 1003, 'Sifa', 'Md.  Ishak', '2024-01-20', '06:00 PM', '1003.jpg', '2024-12-31 10:55:45', '2025-03-12 07:46:56', 413, '98714 25594', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(126, 1, 1007, 'Rahul Singh', 'Rakesh Kumar', '2024-02-08', '1PM', '1007.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 405, '98119 59081', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(127, 1, 1008, 'Akshita', 'Mahipal Singh', '2024-02-09', '01:00 PM', '1008.jpg', '2024-12-31 10:55:45', '2025-03-12 07:47:01', 413, '88603 12623', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(128, 1, 1011, 'Sumit Singh Ydv.', 'Shri Krishan Ydv.', '2024-02-09', '6PM', '1011.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 400, '88877 32701', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(129, 1, 1012, 'Sonu Kumar', 'Dinesh ', '2024-02-09', '10PM', '1012.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 400, '93195 79926', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(130, 1, 1013, 'Ashish Kumar Singh', 'Mr. Virender Singh', '2024-02-09', '9AM', '1013.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 405, '96505 67809', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(131, 1, 1014, 'Devendra Singh', 'Mr. Kheem Singh', '2024-02-18', '08 AM', '1014.jpg', '2024-12-31 10:55:45', '2025-03-03 05:10:52', 400, '70171 37994', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(132, 1, 1015, 'Kush', 'Mr. Hari Sahnkar', '2024-02-16', '9AM', '1015.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 445, '98994 63630', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(133, 1, 1016, 'Pravin Kumar Singh', 'Mr. Satya Narayan Mukhiya', '2024-02-19', '12PM', '1016.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 406, '76320 83918', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(134, 1, 1017, 'Varun Kumar', 'Mr. Devender Kumar', '2024-02-20', '4PM', '1017.jpg', '2024-12-31 10:55:45', '2024-12-31 10:55:45', 400, '95609 84060', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(135, 1, 1019, 'Rinkal Singh', 'Peshkar Singh', '2024-02-21', '07:00 PM', '1019.jpg', '2024-12-31 10:55:45', '2025-03-12 07:47:30', 413, '80763 04689', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(136, 1, 964, 'Jai', 'Mr. Vijay', '2023-10-20', '5PM', '964.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 400, '74289 97282', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(137, 1, 965, 'Bhawna Verma', 'Mr.Vinod Kumar', '2023-10-23', '11AM', '965.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 445, '91368 89907', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(138, 1, 967, 'Kavita Yadav', 'Shravan Yadav', '2023-10-28', '4Pm', '967.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 400, '85120 74814', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(139, 1, 968, 'Shivam singh', 'Mr. Shamsher Singh', '2023-10-30', '05:00 PM', '968.jpg', '2024-12-31 11:17:03', '2025-03-14 07:24:49', 445, '78145 58184', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(140, 1, 969, 'Labib Chaudhary', 'Mr. Faigan Ali', '2023-10-31', '6PM', '969.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 445, '79826 62819', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(141, 1, 970, 'Anil Kumar', 'Mr. Kishori Lal', '2023-11-01', '9AM', '970.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 417, '88604 91640', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(142, 1, 971, 'Harsh Sarwan', 'Mr. Sohan Lal', '2023-11-01', '6PM', '971.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 413, ' 88261 44697', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(143, 1, 972, 'Ajeet Chauhan', 'Virendra Chauhan', '2023-11-02', '9AM', '972.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 406, '97166 81380', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(144, 1, 974, 'Mahesh', 'Mr. Prahlad', '2023-11-03', '10AM', '974.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 413, '78388 21334', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(145, 1, 976, 'Ram Datal Sahni', 'Mr. Ramprit Sahni', '2023-11-06', '6PM', '976.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 406, '87095 91405', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(146, 1, 977, 'Aman singh', 'Mr. Surender Singh', '2023-11-06', '9AM', '977.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 417, '85879 66037', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(147, 1, 981, 'Vikas', 'Mr. Indel Yadav', '2023-11-28', '2PM', '981.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 400, '81301 53540', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(148, 1, 983, 'Satyam Kumar', 'Shri Pankaj Kr, Poddar', '2023-12-07', '10AM', '983.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 400, '85418 85117', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(149, 1, 984, 'suraj', 'Dhuram ', '2023-12-04', '12PM', '984.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 406, '82876 42365', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(150, 1, 986, 'Muskan', 'Balbir Singh', '2023-11-28', '3PM', '986.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 400, ' 99538 82451', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(151, 1, 987, 'Azmeera Khatoon', 'Abbas Beg', '2023-11-28', '6PM', '987.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 420, '97736 89264', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(152, 1, 988, 'Nivesh', 'Sunil', '2023-12-12', '3PM', '988.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 400, '99994 12775', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(153, 1, 990, 'Khushant', 'Deepak', '2023-12-20', '11AM', '990.jpg', '2024-12-31 11:17:03', '2024-12-31 11:17:03', 445, '93117 06201', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(154, 1, 910, 'Chandan Prajapati', 'Mr. Rajesh Prajapati', '1970-01-01', '10AM', '=CONCATENATE(A2,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 445, '7398370472', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(155, 1, 911, 'Anshu', 'Chanderpal Singh', '1970-01-01', '2PM', '911.jpg\r\n', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 454, '85120 83255', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(156, 1, 912, 'Khushi', 'Ramnaresh Giri', '1970-01-01', '6PM', '=CONCATENATE(A4,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 413, '84481 48747', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(157, 1, 913, 'Shourya Chauhan', 'Pankaj Kumar', '1970-01-01', '9PM', '=CONCATENATE(A5,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 413, '6396 359 539', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(158, 1, 914, 'Karan', 'Prabhu Dayal', '1970-01-01', '09:00 AM', '=CONCATENATE(A6,\".jpg\")', '2024-12-31 11:18:13', '2025-03-11 23:36:38', 413, '95408 85345', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(159, 1, 915, 'Kritika', 'W/O Shubham jain', '1970-01-01', '11AM', '915.jpg', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 448, '8810374229', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(160, 1, 916, 'Niranjan Yadav', 'Ranjit Yadav', '1970-01-01', '3PM', '=CONCATENATE(A8,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '920503379', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(161, 1, 917, 'Neha', 'Munna Thakur', '1970-01-01', '7PM', '=CONCATENATE(A9,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '85279 78166', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(162, 1, 545, 'Sumit Kumar', 'Parmod Kumar', '1970-01-01', '6PM', '=CONCATENATE(A10,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 417, '84477 80245', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(163, 1, 918, 'Bhawna', 'Netrapal Singh', '1970-01-01', '10AM', '=CONCATENATE(A11,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 413, '89206 94087', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(164, 1, 919, 'Bhawna', 'Rajvir Singh', '1970-01-01', '10AM', '=CONCATENATE(A12,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 413, ' 88825 89839', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(165, 1, 920, 'Neha', 'Sanjya Kumar', '1970-01-01', '6PM', '=CONCATENATE(A13,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '93198 23011', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(166, 1, 921, 'Banty', 'Dhara Singh', '1970-01-01', '7AM', '=CONCATENATE(A14,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 417, '84451 72380', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(167, 1, 922, 'Bhumika', 'Harvinder', '1970-01-01', '6PM', '=CONCATENATE(A15,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '83687 91528', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(168, 1, 923, 'Shivam', 'Amar Nath Dubey', '1970-01-01', '8AM', '=CONCATENATE(A16,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 405, '83680 45376', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(169, 1, 924, 'Mohd Salman', 'Md Sakil', '1970-01-01', '10AM', '=CONCATENATE(A17,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '78408 16592', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(170, 1, 925, 'Sachin Saroj', 'Mr. Amar Dev Saroj', '1970-01-01', '7PM', '=CONCATENATE(A18,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 404, ' 83681 54332', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(171, 1, 926, 'Sneha', 'Sanjay Kumar', '1970-01-01', '12PM', '=CONCATENATE(A19,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 404, '96674 37670', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(172, 1, 927, 'Khushi', 'Ratnesh Kumar Singh', '1970-01-01', '3PM', '=CONCATENATE(A20,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 445, '70111 86215', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(173, 1, 928, 'Saurabh', 'Pradeep', '1970-01-01', '08:00 AM', '=CONCATENATE(A21,\".jpg\")', '2024-12-31 11:18:13', '2025-03-11 23:36:14', 404, '9958943225', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(174, 1, 929, 'Priya singh', 'Devendra Pal Singh', '1970-01-01', '04:00 PM', '=CONCATENATE(A22,\".jpg\")', '2024-12-31 11:18:13', '2025-03-12 08:00:29', 400, '85869 14048', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(175, 1, 930, 'Akram', 'Shaukat Ali', '1970-01-01', '6PM', '=CONCATENATE(A23,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 404, '79824 95472', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(176, 1, 931, 'Yash Kumar', 'Sushil Kumar ', '1970-01-01', '7PM', '=CONCATENATE(A24,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 417, '95604 01647', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(177, 1, 932, 'Kanak', 'Arvind Kumar', '1970-01-01', '11AM', '=CONCATENATE(A25,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 420, '93104 10161', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(178, 1, 933, 'Aarfin', 'Aslam Khan', '1970-01-01', '5PM', '933.jpg', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 454, '89290 35186', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(179, 1, 934, 'Kajal', 'W/O Kamaldeep', '1970-01-01', '9AM', '=CONCATENATE(A27,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '78279 50610', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(180, 1, 935, 'Tanishka', 'Snajay Sharma', '1970-01-01', '4PM', '=CONCATENATE(A28,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 445, '87503 79597', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(181, 1, 936, 'Vishal Sharma', 'Saty Nrayan Sharma', '1970-01-01', '10-12PM', '=CONCATENATE(A29,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 407, '85272 47072', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(182, 1, 937, 'Aryan', 'Ratnesh', '1970-01-01', '10AM', '=CONCATENATE(A30,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 445, '84475 36750', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(183, 1, 938, 'Riya', 'Jitender Kumar', '1970-01-01', '7PM', '=CONCATENATE(A31,\".jpg\")', '2024-12-31 11:18:13', '2025-02-12 22:38:00', 407, ' 99715 04302', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(184, 1, 939, 'Suraj Pandey', 'Srinath Pandey', '1970-01-01', '8AM', '=CONCATENATE(A32,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 407, '87663 67624', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(185, 1, 940, 'Sanjeet', 'Mr. Mangal Parsad', '1970-01-01', '7PM', '=CONCATENATE(A33,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 424, '95827 47042', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(186, 1, 941, 'Rohit', 'Mr. Ganpat', '1970-01-01', '6PM', '=CONCATENATE(A34,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '74284 10601', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(187, 1, 942, 'Sanjana', 'Sanjay', '1970-01-01', '6PM', '942.jpg', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 454, '93102 66918', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(188, 1, 944, 'Sanjana', 'Prabhu Das', '2024-09-25', '05:00 PM', '=CONCATENATE(A37,\".jpg\")', '2024-12-31 11:18:13', '2025-03-12 05:42:15', 404, '81302 61937', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(189, 1, 945, 'Mohsin Siddiqui', 'Mhd.Tahsim Siddiqui', '1970-01-01', '10AM', '=CONCATENATE(A38,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '84481 28498', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(190, 1, 946, 'Rishu Chaudhary', 'Jai Prakash', '1970-01-01', '12PM', '=CONCATENATE(A39,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '93361 71439', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(191, 1, 948, 'Nikhil', 'Harshan Pal', '1970-01-01', '6PM', '=CONCATENATE(A41,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 407, '93549 52867', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(192, 1, 949, 'Reshma', 'Ashu', '1970-01-01', '3PM', '949.jpg', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 454, '99581 48123', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(193, 1, 950, 'Shahnawaz', 'Noor Mohd.', '1970-01-01', '11AM', '=CONCATENATE(A43,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '93541 60884', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(194, 1, 951, 'Shahzad', 'Noor Mohd.', '1970-01-01', '11AM', '=CONCATENATE(A44,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '93541 60884', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(195, 1, 952, 'Shoaib Akhtar', 'Mohd.Alam', '1970-01-01', '11AM', '=CONCATENATE(A45,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '80849 39947', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(196, 1, 953, 'Poonam', 'D/O Om Prakash', '1970-01-01', '9AM', '=CONCATENATE(A46,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 405, '98717 03643', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(197, 1, 954, 'Kajal', 'Sonu', '1970-01-01', '1PM', '954.jpg', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 454, ' 95409 35082', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(198, 1, 955, 'Hritik', 'Ram Sagar', '1970-01-01', '5PM', '=CONCATENATE(A48,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 405, '72178 95844', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(199, 1, 956, 'Om Kumar', 'Bablu Singh', '1970-01-01', '11AM', '=CONCATENATE(A49,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 406, '85273 53396', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(201, 1, 958, 'Ronit Gupta', 'Mr. Rajender Gupta', '1970-01-01', '5PM', '=CONCATENATE(A51,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 407, '96543 79465', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(202, 1, 959, 'Neha Kumari', 'Jung  Bahadur', '1970-01-01', '7PM', '=CONCATENATE(A52,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, '70112 41926', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(203, 1, 960, 'Yogesh', 'Mr. Rakesh', '1970-01-01', '5PM', '=CONCATENATE(A53,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 407, '78387 21236', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(204, 1, 961, 'Mohit', 'Mr. Brij Mohan', '1970-01-01', '5PM', '=CONCATENATE(A54,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 406, '98113 41659', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(205, 1, 962, 'Deepak Chaudhry', 'Hari Ram', '1970-01-01', '5PM', '=CONCATENATE(A55,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 407, '84478 75383', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(206, 1, 963, 'Vikram Kumar', 'Mr. Ram Jatan', '1970-01-01', '8AM', '=CONCATENATE(A56,\".jpg\")', '2024-12-31 11:18:13', '2024-12-31 11:18:13', 400, ' 87662 05438', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(207, 1, 816, 'Shobhna Das', 'Subhash Das', '2023-05-15', '6PM', '0', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 407, '81784 32443', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(208, 1, 817, 'Santosh  Kumar Sahu', 'Ramprasad Sahu', '2023-05-16', '6PM', '817.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 446, '82524 08340', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(209, 1, 819, 'Akash Singh', 'Parmal Singh', '2023-05-16', '7PM', '819.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 405, '89208 62120', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(210, 1, 820, 'Bhanu', 'Om Prakash', '2023-05-15', '2PM', '820.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '99719 33187', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(211, 1, 821, 'Jatin', 'Roshan Lal', '2023-05-17', '6PM', '821.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '99535 19569', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(212, 1, 822, 'Rimjhim', 'Ranglal', '2023-05-23', '6PM', '822.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '96670 92973', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(213, 1, 823, 'Mrs.Pooja Chauhan', 'w/o Lakhan Chauhan', '2023-05-25', '9AM', '823.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 407, '9582931303', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(214, 1, 825, 'Kapil', 'Yogiender Kumar', '2023-05-31', '10AM', '825.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 407, '88603 73521', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(215, 1, 826, 'Anchal', 'Dilwar Singh Rawat', '2023-06-01', '5PM', '826.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '6398 648 738', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(216, 1, 827, 'Shivakant Gautam', 'Mr.Chhatthu Gautam', '2023-06-02', '8AM', '827.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, ' 99905 94961', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(217, 1, 828, 'Mamta Singh', 'Narayan Singh', '2023-06-03', '9AM', '828.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '96255 65341', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(218, 1, 829, 'Shrishti Verma', 'Shivji Verma', '2023-06-06', '6PM', '829.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '78408 44156', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(219, 1, 830, 'Lucky Solanki', 'Kali Chran', '2023-06-08', '10AM', '830.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 421, '99115 53878', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(220, 1, 831, 'Bharti', 'Anup Kumar', '2023-06-09', '9AM', '831.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 445, '92898 53157', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(221, 1, 832, 'Vishal Kumar', 'Naresh  Kumar', '2023-06-13', '10AM', '832.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 454, '96547 44326', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(222, 1, 833, 'Himanshu', 'Om Prakash Verma', '2023-06-13', '10AM', '833.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 413, '88261 09334', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(223, 1, 834, 'Yuvraj Gaur', 'Amit Gaur', '2023-06-13', '11AM', '834.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '88004 46063', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(224, 1, 835, 'Arti', 'Ram Baran', '2023-06-13', '10AM', '835.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 454, '82856 66430', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(225, 1, 836, 'Sandeep Pardhan', 'Kamlesh Pradhan', '2023-06-13', '5PM', '836.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 406, '84489 08726', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(226, 1, 837, 'Pooja', 'Kamlesh Pradhan', '2023-06-13', '5PM', '837.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 449, '95991 60947', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(227, 1, 838, 'Varun ', 'Ajay Singh', '2023-06-14', '10AM', '838.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 413, '99716 16691', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(228, 1, 839, 'Ashish Kumar Prajapati', 'Rakesh Kumar Prajapati', '2023-06-14', '6PM', '839.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 447, '99537 37830', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(229, 1, 841, 'Zeenat Parveen', 'MD. Niyazuddin', '2023-06-15', '10AM', '841.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '98916 08929', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(230, 1, 844, 'Virender', 'Badlu', '2023-06-16', '10AM', '844.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 407, '99714 10620', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(231, 1, 845, 'Md.sharik', 'Md.Momin', '2023-06-19', '12PM', '845.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '93156 18990', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(232, 1, 846, 'Bhumika Sharma', 'Lalit kumar', '2023-06-15', '5PM', '846.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '95920 73177', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(233, 1, 847, 'Sachin', 'Deshraj', '2023-06-26', '5PM', '847.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '89294 33987', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(234, 1, 848, 'Tanisha', 'Mr.Suresh sonkar', '2023-06-26', '3PM', '848.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '93190 45890', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(235, 1, 849, 'Sonu', 'Mr.Jural prasad', '2023-06-27', '9Am', '849.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, ' 80763 66064', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(236, 1, 850, 'Aakash', 'Surender Mishra', '2023-06-27', '8AM', '850.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '93104 70117', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(237, 1, 851, 'Aman Mishra', 'Surender Mishra', '2023-06-27', '8AM', '851.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '93104 70117', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(238, 1, 852, 'Rakshit Garg', 'Mr.Mukesh Garg', '2023-07-01', '12PM', '852.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 409, '72919 79792', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(239, 1, 855, 'Sonia', 'Mangal Singh', '2023-07-01', '9AM', '855.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '70539 42451', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(240, 1, 856, 'Raghav kumar Chaudhary', 'Ramnath Choudhary', '2023-06-28', '10AM', '856.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 406, '81307 49089', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(241, 1, 857, 'Krishna', 'Ajeet Vaid', '2023-06-17', '7PM', '857.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '96508 10473', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(242, 1, 858, 'Babli', 'Pawan Kumar', '2023-06-30', '4PM', '858.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 445, '74289 68187', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(243, 1, 859, 'Ruby Rathore', 'Chob Singh Rathore', '2023-07-03', '4PM', '859.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '88607 40181', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0);
INSERT INTO `students` (`id`, `is_active`, `student_id`, `name`, `father_name`, `doa`, `batch`, `photo`, `created_at`, `updated_at`, `course_id`, `contact_number`, `added_by`, `updated_by`, `status`, `course_status`, `installment_no`, `edit_count`) VALUES
(244, 1, 860, 'Renu Rathore', 'Chob Singh Rathore', '2023-07-03', '4PM', '860.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '89294 04069', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(245, 1, 861, 'Aman Kumar', 'Munish Kumar', '2023-07-03', '7PM', '861.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 454, '98919 27115', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(246, 1, 862, 'Himanshu', 'Pati Ram', '2023-07-04', '12PM', '862.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 400, '85880 92402', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(247, 1, 863, 'Vikram Kumar', 'Vinod Singh', '2023-07-04', '12PM', '863.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 454, '88515 18487', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(248, 1, 864, 'Abhneet', 'Shri Niwas singh', '2023-07-04', '12PM', '864.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 428, '75032 66502', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(249, 1, 865, 'Bharat Kumar Sapra', 'Rajender Sapra', '2023-07-04', '12PM', '865.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 428, '84485 30545', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(250, 1, 866, 'Gourav Jha', 'Mohan Jha', '2023-07-04', '12PM', '866.jpg', '2024-12-31 11:22:59', '2024-12-31 11:22:59', 454, '81784 29839', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(251, 1, 1150, 'shivani', 'noname', '2024-12-04', '11:00 AM', '1150.jpg', '2025-01-20 01:25:28', '2025-03-12 03:59:31', 454, '96542 25824', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(252, 1, 1118, 'Altmas', 'Guddu', '2024-08-01', '04:00 PM', '1118.jpg', '2025-01-20 01:37:35', '2025-03-11 23:36:00', 454, '9310296479', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(253, 1, 805, 'Noor Aaliya', 'Qamar ali', '2024-10-21', '08:00 AM - 09:00 AM', '805.jpg', '2025-01-20 01:46:41', '2025-02-12 22:25:44', 407, '9899392526', 'super_admin', 'super_admin', 'left', 'completed', 1, 0),
(254, 1, 1079, 'Akash', 'Mr. Rajesh', '2024-05-03', '09:00 AM', '1079.jpg', '2025-01-20 01:53:51', '2025-03-12 01:45:27', 407, '9311257226', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(255, 1, 1077, 'Lekhika Saini', 'Lt. Jograj Saini', '2024-05-02', '06:00 PM', '1077.jpg', '2025-01-20 01:59:22', '2025-03-11 23:36:13', 453, '8826792427', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(256, 1, 1171, 'Hariom', 'Shyam Naresh', '2025-01-11', '10:00 AM', '1066.jpg', '2025-01-20 03:04:49', '2025-03-11 23:07:46', 459, '90135 07309', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(257, 1, 1099, 'Rahul', 'Lal Chand', '2024-06-12', '10:00 AM - 11:00 AM', '1099.jpg', '2025-01-20 03:12:08', '2025-02-17 07:51:59', 454, '78275 43168', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(258, 1, 1174, 'Sameer Ranjan', 'Unknown', '2024-12-16', '2:00 PM', '1174.jpg', '2025-01-20 03:22:51', '2025-03-11 23:07:10', 430, '93115 32305', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(259, 1, 1065, 'Pooja Sharma', 'Mr.Raju Sharma', '2024-04-16', '04:00 PM', '1065.jpg', '2025-01-20 03:28:26', '2025-03-12 05:42:12', 407, '76782 66308', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(260, 1, 1102, 'Aman', 'Dinesh', '2024-06-19', '08:00 AM', '1102.jpg', '2025-01-20 03:37:53', '2025-03-12 00:09:54', 454, '87997 43646', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(261, 1, 1126, 'Himanshu', 'Mr. Sanjay Yadav', '2024-08-20', '08:00 AM', '1126.jpg', '2025-01-20 03:42:48', '2025-03-12 00:09:58', 454, '98739 02511', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(262, 1, 1088, 'Purnima', 'Bablu', '2024-05-21', '09:00 AM', '1088.jpg', '2025-01-20 03:46:51', '2025-03-12 01:45:18', 445, '82876 05431', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(263, 1, 1091, 'Khushi', 'Raman Jha', '2024-05-22', '09:00 AM', '1091.jpg', '2025-01-20 03:54:43', '2025-03-12 01:45:21', 445, '78272 51882', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(264, 1, 886, 'Love Singh', 'Rajpal Singh', '2024-10-08', '12:00 PM - 01:00 PM', '886.jpg', '2025-01-23 06:54:45', '2025-01-23 06:58:03', 405, '7011353361', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(265, 1, 1165, 'Umashankar', 'Mr. Mahendra Kumar', '2024-11-29', '09:00 AM - 10:00 AM', 'IMG-20241130-WA0001.jpg', '2025-01-28 04:44:24', '2025-01-28 04:44:24', 424, '8306075838', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(266, 1, 11, 'New Member', 'Om Prakash', '2025-02-04', '10:00 AM - 11:00 AM', '11.jpg', '2025-02-05 10:40:00', '2025-02-05 10:40:00', 410, '8368066493', 'super_admin', 'super_admin', 'inactive', 'completed', 1, 0),
(267, 1, 1175, 'Shri Devi', 'W/O Mukesh Kumar', '2025-01-07', '12:00 PM - 01:00 PM', '1175.jpg', '2025-02-05 12:31:36', '2025-02-05 23:35:18', 460, '8447983337', 'super_admin', 'super_admin', 'completed', 'completed', 1, 0),
(268, 1, 1164, 'Nishant Kumar', 'not forwarded', '2025-01-28', '09:00 AM', '1164.jpg', '2025-02-05 19:29:18', '2025-03-11 23:36:17', 445, '8384094911', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(269, 1, 1141, 'Kavita Mehta', 'Devendra Singh', '2024-09-25', '08:00 AM', '1141.jpg', '2025-02-05 19:50:10', '2025-03-12 00:09:56', 454, '7618427458', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(270, 1, 1176, 'Vaishali sahu', 'Rajesh kumar', '2025-02-10', '05:00 PM', '1176.jpg', '2025-02-05 23:57:23', '2025-03-11 23:36:10', 417, '8178666186', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(271, 1, 1177, 'Deepak Kumar', 'Mukesh Giri', '2025-02-13', '09:00 AM - 10:00 AM', '1031.jpg', '2025-02-06 00:02:36', '2025-02-10 23:45:29', 430, '8766306356', 'super_admin', 'super_admin', 'left', 'completed', 1, 0),
(272, 1, 1178, 'Pinki', 'not forwarded', '2025-01-15', '08:00 AM', '1031.jpg', '2025-02-06 00:14:05', '2025-03-12 00:09:59', 405, '9205591136', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(273, 1, 1179, 'ARMAN HASSAN', 'JAMEEN HASSAN', '2025-01-18', '09:00 AM', '1179.jpg', '2025-02-06 00:43:03', '2025-03-14 07:24:39', 410, '7827112606', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(274, 1, 1180, 'Dharmesh', 'not forwarded', '2025-01-20', '11:00 AM', '1180.jpg', '2025-02-06 00:53:06', '2025-03-11 23:08:00', 445, '9899632597', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(275, 1, 1181, 'Jeet singh', 'Tejveer Singh', '2025-01-21', '11:00 AM', '1181.jpg', '2025-02-06 01:02:25', '2025-03-11 23:08:02', 445, '7303288469', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(276, 1, 1182, 'Sonam Rathore', 'w/o Vineet Singh Rathore', '2025-01-24', '03:00 PM', '1182.jpg', '2025-02-07 03:57:43', '2025-03-12 05:42:17', 410, NULL, 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(277, 1, 1183, 'Abhay Parmal', 'Subhash', '2025-01-25', '08:00 AM', 'default_image.jpg', '2025-02-07 03:59:05', '2025-03-12 04:02:13', 410, '8447400927', 'super_admin', 'super_admin', 'left', 'dropped', 1, 0),
(278, 1, 1184, 'Nusrat Parveen', 'Md Gani', '2025-01-25', '2:00 PM', '1184.jpg', '2025-02-07 04:23:05', '2025-03-11 23:07:13', 405, '9599535291', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(279, 1, 1185, 'Manjeet', 'Ramlal', '2025-01-27', '11:00 AM', '1185.jpg', '2025-02-07 04:25:00', '2025-03-11 23:08:04', 410, '8826963051', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(280, 1, 1186, 'Atul', 'Man Singh', '2025-01-28', '06:00 PM', 'default-avatar.jpg', '2025-02-07 04:27:34', '2025-03-11 23:36:18', 456, '9354676784', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(281, 1, 1187, 'Madhavi Sharma', 'Raghav Sharma', '2025-01-30', '09:00 AM', '1187.jpg', '2025-02-07 04:29:44', '2025-03-11 23:36:20', 454, '7410981176', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(282, 1, 1188, 'Umang Grover', 'Mr. Ramesh Kumar', '2025-02-01', '12:00 PM', '1188.jpg', '2025-02-07 04:32:03', '2025-03-11 23:08:13', 414, '9711503551', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(283, 1, 1189, 'Kishan Kumar', 'Jitender Kumar', '2025-02-02', '08:00 AM', '1189.jpg', '2025-02-07 04:43:27', '2025-03-11 23:36:06', 400, '9910247625', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(284, 1, 1073, 'Minakshi Joshi', 'Nand Kishor', '2024-05-01', '04:00 PM', 'default_image.jpg', '2025-02-08 02:42:36', '2025-03-12 05:42:14', 410, '9520714095', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(285, 1, 1190, 'Hardeep Kaur', 'Mr. Gurbachan Singh', '2025-02-07', '2:00 PM', '1190.jpg', '2025-02-08 03:12:23', '2025-03-11 23:07:16', 413, '7827484750', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(286, 1, 1191, 'Mohammad Raza Zaidi', 'Taukir Hassan Zaidi', '2025-02-10', '09:00 AM', '1191.jpg', '2025-02-09 00:58:47', '2025-03-11 23:36:22', 413, '9891312517', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(287, 1, 1192, 'Anuj', 'Balak Ram', '2025-02-11', '10:00 AM', '1192.jpg', '2025-02-11 03:38:09', '2025-03-11 23:07:52', 400, '8295541839', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(288, 1, 1193, 'VANSH DUA', 'MR. VIKASH DUA', '2006-02-19', '08:00 AM', '1193.jpg', '2025-02-19 00:05:26', '2025-03-12 01:45:24', 404, '8800525117', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(289, 1, 1194, 'Anjali', 'Ravinder', '2025-02-20', '08:00 AM', '1194.jpg', '2025-02-20 06:30:44', '2025-03-11 23:36:08', 406, '8447828097', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(290, 1, 1195, 'SHIVANI', 'RAJU', '2024-02-20', '11:00 AM', '1195.jpg', '2025-02-27 02:12:36', '2025-03-11 23:08:09', 407, '8744908360', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(292, 1, 1196, 'MADHU', 'HARI SINGH', '2025-03-06', '10:00 AM', '1196.jpg', '2025-03-05 23:22:05', '2025-03-11 23:07:48', 427, '8800184150', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(293, 1, 1199, 'SIMRAN', 'BHUMESH', '2025-03-12', '11:00 AM', '1199.jpg', '2025-03-12 00:24:05', '2025-03-12 08:00:32', 400, '9654225824', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(294, 1, 1197, 'USHA', 'RAMESH SINGH', '2025-03-06', '04:00 PM', '1197.jpg', '2025-03-12 01:37:03', '2025-03-12 07:47:35', 417, '9354943841', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(295, 1, 1200, 'BAIJNATH SAHU', 'DHANESHWAR SAHU', '2025-03-11', '04:00 PM', '1200.jpg', '2025-03-12 01:43:55', '2025-03-12 05:43:18', 427, '7257844708', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(296, 1, 1025, 'Jyoti', 'Virender Kumar', '2025-03-09', '12 PM', 'default_image.jpg', '2025-03-12 08:05:31', '2025-03-12 08:06:52', 451, '9971274708', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0),
(297, 1, 1047, 'Sarita Yadav', 'Shyam Kishor Yadav', '2024-04-03', '10:00 AM', '1047.jpg', '2025-03-13 12:08:06', '2025-03-14 07:24:42', 407, '8527295816', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(298, 1, 1078, 'Shahbaj', 'Hamid Ali', '2024-05-03', '09:00 AM', '1078.jpg', '2025-03-13 12:14:52', '2025-03-14 07:24:44', 410, '9911141020', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(299, 1, 1069, 'Neeraj', 'Anil Kumar', '2024-04-23', '09:00 AM', '1069.jpg', '2025-03-14 06:47:56', '2025-03-14 07:24:46', 410, '9310139732', 'super_admin', 'super_admin', 'completed', 'ongoing', 1, 0),
(300, 1, 1070, 'Abhinav', 'Mr. Ravi Kumar', '2024-04-24', '07:00 PM', '1070.jpg', '2025-03-14 07:23:35', '2025-03-14 07:24:51', 407, '9643097902', 'super_admin', 'super_admin', 'active', 'ongoing', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_status`
--

CREATE TABLE `student_fees_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `doa` date NOT NULL DEFAULT '2000-01-01',
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `total_fees` decimal(10,2) NOT NULL,
  `installments` bigint(20) DEFAULT NULL,
  `fees_paid` decimal(10,2) DEFAULT 0.00,
  `fees_due` decimal(10,2) DEFAULT 0.00,
  `status` enum('Paid','Paid but Pending Next Month','Pending') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `installments_paid` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `student_fees_status`
--

INSERT INTO `student_fees_status` (`id`, `student_id`, `student_name`, `doa`, `course_id`, `course_title`, `total_fees`, `installments`, `fees_paid`, `fees_due`, `status`, `created_at`, `updated_at`, `installments_paid`) VALUES
(6, 1111, 'Deepanshu Gola', '2024-07-13', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(7, 1112, 'Sandeep Kumar', '2024-07-15', 419, 'Share Trading', 15000.00, 3, 0.00, 15000.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(8, 1113, 'Nishant Nimesh', '2024-07-16', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(9, 1114, 'Sneha  ', '2024-07-18', 417, 'ADV.EXCL', 7850.00, 3, 0.00, 7850.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(10, 1115, 'Md. Arsh', '2024-07-22', 404, 'HDCS(WEB)', 30350.00, 12, 0.00, 30350.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(11, 1117, 'Varun', '2024-07-25', 404, 'HDCS(WEB)', 30350.00, 12, 0.00, 30350.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(12, 1119, 'Sujad', '2024-08-01', 405, 'TALLY(PRIME)', 16000.00, 3, 3200.00, 4400.00, 'Paid but Pending Next Month', NULL, '2025-02-05 23:40:04', 0),
(13, 1120, 'Parul Singh', '2024-08-02', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(14, 1121, 'Anvi', '2024-08-03', 404, 'HDCS(WEB)', 30350.00, 12, 0.00, 30350.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(15, 1122, 'Dhananjay', '2024-08-05', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(16, 1124, 'Adarsh Kumar', '2024-08-13', 417, 'ADV.EXCL', 7850.00, 3, 0.00, 7850.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(17, 1125, 'Abhishek  ', '2024-08-13', 404, 'HDCS(WEB)', 30350.00, 12, 0.00, 30350.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(18, 1127, 'Sangam Bharti ', '2024-08-21', 413, 'HDCS(ACC)', 30350.00, 12, 7500.00, 22850.00, 'Paid but Pending Next Month', NULL, '2025-03-05 08:04:55', 0),
(19, 1128, 'Prem', '2024-08-22', 404, 'HDCS(WEB)', 30350.00, 12, 0.00, 30350.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(20, 1129, 'Gulkesh Kamar', '2024-08-31', 445, 'HDCA', 18350.00, 12, 0.00, 18350.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(21, 1130, 'Aarti ', '2024-09-09', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 35000.00, 5350.00, 'Paid but Pending Next Month', NULL, '2025-02-17 09:50:54', 0),
(22, 1131, 'Manish Dang', '2024-09-03', 417, 'ADV.EXCL', 7850.00, 3, 0.00, 7850.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(23, 1133, 'Inderjeet Kaur', '2024-09-09', 400, 'BASIC', 4100.00, 4, 4000.00, 100.00, 'Paid but Pending Next Month', NULL, '2025-02-12 02:00:58', 0),
(24, 1134, 'Balbir Singh', '2024-09-09', 400, 'BASIC', 4100.00, 4, 4100.00, 0.00, 'Paid', NULL, '2025-02-12 02:02:01', 0),
(25, 1135, 'Ruchika Mehta', '2024-09-20', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(26, 1136, 'Kashish Rajput', '2024-09-20', 400, 'BASIC', 3950.00, 4, 3700.00, 250.00, 'Paid but Pending Next Month', NULL, '2025-02-12 22:16:12', 0),
(27, 1137, 'Vijay', '2024-09-20', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 0.00, 40350.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(28, 1138, 'Mohd Sami ', '2024-09-16', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(29, 1142, 'Zhilik Mandal', '2024-09-24', 413, 'HDCS(ACC)', 27350.00, 12, 6750.00, 20600.00, 'Paid but Pending Next Month', NULL, '2025-03-05 07:59:07', 0),
(30, 1143, 'Mayank Gehlot', '2024-09-26', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(31, 1144, 'Geeta ', '2024-09-26', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(32, 1145, 'Siddharth', '2024-09-26', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(33, 1146, 'Gulshan Kumar', '2024-09-11', 412, 'BUSY', 6350.00, 4, 0.00, 6350.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(34, 1147, 'Abhilash', '2024-09-26', 445, 'HDCA', 18350.00, 12, 5250.00, 13100.00, 'Paid but Pending Next Month', NULL, '2025-03-12 08:55:35', 0),
(35, 1148, 'Raja Kumar', '2024-09-27', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 0.00, 40350.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(36, 1149, 'Roshan Kumar', '2024-09-27', 445, 'HDCA', 15350.00, 12, 5250.00, 10100.00, 'Paid but Pending Next Month', NULL, '2025-03-05 08:13:00', 0),
(37, 1151, 'Piyush', '2024-10-03', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(38, 1152, 'Sumit singh', '2024-10-05', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(39, 1153, 'Reema Sonkar', '2024-10-08', 400, 'BASIC', 3950.00, 4, 1800.00, 2300.00, 'Paid but Pending Next Month', NULL, '2025-02-14 11:19:11', 0),
(40, 1154, 'Rohit Kumar', '2024-10-17', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 7500.00, 32850.00, 'Paid but Pending Next Month', NULL, '2025-02-24 08:58:46', 0),
(41, 1155, 'Pooja', '2024-10-23', 413, 'HDCS(ACC)', 23350.00, 12, 5700.00, 17650.00, 'Paid but Pending Next Month', NULL, '2025-03-05 07:57:46', 0),
(42, 1156, 'Vijay Kumar', '2024-11-06', 428, 'EXCEL+PRIME', 13850.00, 4, 19600.00, -6000.00, 'Paid', NULL, '2025-02-05 22:59:30', 0),
(43, 1157, 'Vaibhav Suri ', '2024-11-06', 411, 'PYTHON', 10950.00, 3, 2000.00, 8950.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(44, 1158, 'Rihan Siddiqui', '2024-11-07', 400, 'BASIC', 11850.00, 4, 3950.00, 0.00, 'Paid', NULL, '2025-02-13 07:41:28', 0),
(45, 1159, 'Hemant Gandhi', '2024-11-04', 419, 'Share Trading', 15000.00, 3, 0.00, 15000.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(46, 1160, 'Kartik ', '2024-11-18', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(47, 1161, 'Radha Kishan', '2024-12-04', 406, 'MARG', 10600.00, 4, 3100.00, 7500.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(48, 1162, 'Gunjan Kumar', '2024-11-26', 405, 'TALLY(PRIME)', 7600.00, 3, 0.00, 7600.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(49, 1163, 'Dinesh Kumar', '2024-12-06', 400, 'BASIC', 4100.00, 4, 4100.00, 0.00, 'Paid', NULL, '2025-03-12 08:44:21', 0),
(50, 1166, 'Naresh sahu', '2024-11-30', 405, 'TALLY(PRIME)', 7600.00, 3, 0.00, 7600.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(51, 1168, 'Hema  Gurnani', '2024-12-09', 419, 'Share Trading', 15000.00, 3, 4000.00, 11000.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(52, 1169, 'Abhishek Chaudhary', '2024-11-26', 413, 'HDCS(ACC)', 30350.00, 12, 7600.00, 16750.00, 'Paid but Pending Next Month', NULL, '2025-02-05 19:41:18', 0),
(53, 1170, 'Shantanu Sharma', '2024-12-11', 400, 'BASIC', 4100.00, 4, 5100.00, -1000.00, 'Paid', NULL, '2025-03-12 08:48:21', 0),
(54, 1172, 'Pawan Kumar Gupta', '2024-12-12', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', NULL, '2025-01-20 01:11:55', 0),
(55, 1173, 'Aakash Kumar', '2024-12-16', 405, 'TALLY(PRIME)', 30350.00, 3, 5100.00, 2500.00, 'Paid but Pending Next Month', NULL, '2025-02-06 00:23:55', 0),
(56, 1150, 'shivani', '2024-12-04', 454, 'DCA(PRIME)', 11550.00, 8, 5600.00, 5950.00, 'Paid but Pending Next Month', NULL, '2025-03-12 08:20:38', 0),
(57, 1118, 'Altmas', '2024-08-01', 454, 'DCA(PRIME)', 12350.00, 8, 6000.00, 6350.00, 'Paid but Pending Next Month', NULL, '2025-03-12 08:24:13', 0),
(58, 1079, 'Akash', '2024-05-03', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 10000.00, 30350.00, 'Paid but Pending Next Month', NULL, '2025-03-12 08:38:22', 0),
(59, 1077, 'Lekhika Saini', '2024-05-02', 453, 'BASIC+ADV. EXCL+TALLY', 13600.00, 8, 6800.00, 6800.00, 'Paid but Pending Next Month', NULL, '2025-03-12 08:31:19', 0),
(60, 1075, 'Simran Gupta', '2024-05-02', 445, 'HDCA', 18350.00, 12, 6000.00, 12350.00, 'Paid but Pending Next Month', NULL, '2025-03-12 08:43:10', 0),
(61, 928, 'Saurabh', '1970-01-01', 404, 'HDCS(WEB)', 30350.00, 12, 2500.00, 27850.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(62, 805, 'Noor Aaliya', '2024-10-21', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 2500.00, 37850.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(63, 1174, 'Sameer Ranjan', '2024-12-16', 430, 'TYPING', 2250.00, 3, 2350.00, -100.00, 'Paid', NULL, '2025-02-17 07:47:59', 0),
(64, 1171, 'Hariom', '2025-01-11', 459, 'JAVA', 15000.00, 5, 9000.00, 6000.00, 'Paid but Pending Next Month', NULL, '2025-02-24 08:56:46', 0),
(65, 1126, 'Himanshu', '2024-08-20', 454, 'DCA(PRIME)', 12100.00, 8, 4500.00, 7600.00, 'Paid but Pending Next Month', NULL, '2025-02-20 06:25:29', 0),
(66, 1102, 'Aman', '2024-06-19', 405, 'TALLY(PRIME)', 12350.00, 3, 1500.00, 6100.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(67, 1099, 'Rahul', '2024-06-12', 454, 'DCA(PRIME)', 18350.00, 8, 3050.00, 15300.00, 'Paid but Pending Next Month', NULL, '2025-02-06 00:07:27', 0),
(68, 1091, 'Khushi', '2024-05-22', 445, 'HDCA', 18350.00, 12, 4500.00, 13850.00, 'Paid but Pending Next Month', NULL, '2025-03-05 08:14:24', 0),
(69, 1089, 'Mayank Dewett', '2024-05-22', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 7500.00, 32850.00, 'Paid but Pending Next Month', NULL, '2025-03-05 07:54:27', 0),
(70, 1088, 'Purnima', '2024-05-21', 445, 'HDCA', 18350.00, 12, 4500.00, 13850.00, 'Paid but Pending Next Month', NULL, '2025-03-05 08:07:41', 0),
(71, 1068, 'Jabir', '2024-04-22', 413, 'HDCS(ACC)', 24350.00, 12, 6000.00, 18350.00, 'Paid but Pending Next Month', NULL, '2025-03-05 07:51:47', 0),
(72, 1067, 'Ankush Kumar', '2024-04-22', 413, 'HDCS(ACC)', 24350.00, 12, 6000.00, 18350.00, 'Paid but Pending Next Month', NULL, '2025-03-05 08:12:23', 0),
(73, 1065, 'Pooja Sharma', '2024-04-16', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 7500.00, 32850.00, 'Paid but Pending Next Month', NULL, '2025-02-20 06:17:01', 0),
(74, 1040, 'Nitin Chaudhary', '2024-04-01', 404, 'HDCS(WEB)', 30350.00, 12, 30100.00, 250.00, 'Paid but Pending Next Month', NULL, '2025-02-14 11:17:12', 0),
(75, 1019, 'Rinkal Singh', '2024-02-21', 413, 'HDCS(ACC)', 24850.00, 12, 8000.00, 16850.00, 'Paid but Pending Next Month', NULL, '2025-02-21 22:40:25', 0),
(76, 1014, 'Devender Singh', '2024-02-18', 400, 'BASIC', 4100.00, 4, 2500.00, 1600.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(77, 1008, 'Akshita', '2024-02-09', 400, 'BASIC', 24350.00, 4, 2400.00, 1700.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(78, 1003, 'Sifa', '2024-01-20', 413, 'HDCS(ACC)', 24350.00, 12, 8000.00, 16350.00, 'Paid but Pending Next Month', NULL, '2025-03-12 08:36:07', 0),
(79, 944, 'Sanjana', '2024-09-25', 445, 'HDCA', 30350.00, 12, 2500.00, 15850.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(80, 938, 'Riya', '1970-01-01', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 2500.00, 37850.00, 'Pending', NULL, '2025-01-22 10:23:53', 0),
(81, 914, 'Karan', '1970-01-01', 413, 'HDCS(ACC)', 24350.00, 12, 6000.00, 18350.00, 'Paid but Pending Next Month', NULL, '2025-02-17 09:49:11', 0),
(82, 1164, 'Nishant Kumar', '2025-01-28', 445, 'HDCA', 18350.00, 12, 3000.00, 15350.00, 'Paid but Pending Next Month', '2025-02-05 22:46:01', '2025-03-05 08:21:21', 0),
(83, 1141, 'Kavita Mehta', '2024-09-25', 454, 'DCA(PRIME)', 10350.00, 8, 2500.00, 7850.00, 'Paid but Pending Next Month', '2025-02-05 22:46:01', '2025-03-05 07:56:22', 0),
(84, 1175, 'Shri Devi', '2025-01-07', 456, 'Graphic Design', 3000.00, 4, 3000.00, 350.00, 'Paid but Pending Next Month', '2025-02-05 23:37:46', '2025-02-05 23:39:21', 0),
(85, 1176, 'Vaishali sahu', '2025-02-10', 417, 'ADV.EXCL', 7850.00, 3, 7850.00, 0.00, 'Paid', '2025-02-05 23:57:31', '2025-03-12 08:45:11', 0),
(86, 1177, 'Deepak Kumar', '2025-02-13', 430, 'TYPING', 2250.00, 3, 850.00, 1400.00, 'Paid but Pending Next Month', '2025-02-06 00:02:49', '2025-02-06 00:03:55', 0),
(87, 1178, 'Pinki', '2025-01-15', 405, 'TALLY(PRIME)', 7850.00, 3, 5100.00, 2750.00, 'Paid but Pending Next Month', '2025-02-06 00:14:19', '2025-02-17 07:47:01', 0),
(88, 1096, 'Cheshta bansal', '2024-06-05', 407, 'HDCS(WEB+DGT)', 40350.00, 16, 5000.00, 35350.00, 'Paid but Pending Next Month', '2025-02-06 00:22:15', '2025-02-24 08:55:51', 0),
(89, 1085, 'Prince dutta', '2024-05-13', 400, 'BASIC', 4100.00, 4, 0.00, 4100.00, 'Pending', '2025-02-06 00:29:21', '2025-02-06 00:29:21', 0),
(90, 1179, 'ARMAN HASSAN', '2025-01-18', 410, 'HDCS(WEB+DGT)', 40350.00, 16, 2600.00, 37750.00, 'Paid but Pending Next Month', '2025-02-06 00:43:11', '2025-02-06 00:43:49', 0),
(91, 1180, 'Dharmesh', '2025-01-20', 445, 'HDCA', 18350.00, 12, 4600.00, 13750.00, 'Paid but Pending Next Month', '2025-02-06 00:53:27', '2025-02-21 22:46:16', 0),
(92, 1181, 'Jeet singh', '2025-01-21', 445, 'HDCA', 18350.00, 12, 4600.00, 13750.00, 'Paid but Pending Next Month', '2025-02-06 01:02:35', '2025-02-21 22:44:33', 0),
(93, 1189, 'Kishan Kumar', '2025-02-02', 400, 'BASIC', 4100.00, 4, 4100.00, 0.00, 'Paid', '2025-02-07 07:18:57', '2025-02-08 03:03:22', 0),
(94, 1184, 'Nusrat Parveen', '2025-01-25', 405, 'TALLY(PRIME)', 7850.00, 3, 5100.00, 2750.00, 'Paid but Pending Next Month', '2025-02-07 07:18:57', '2025-03-05 08:07:00', 0),
(95, 1182, 'Sonam Rathore', '2025-01-24', 410, 'HDCS(WEB+DGT)', 32850.00, 16, 32600.00, 0.00, 'Paid', '2025-02-07 07:18:57', '2025-02-08 03:26:25', 0),
(96, 1183, 'Abhay Parmal', '2025-01-25', 410, 'HDCS(WEB+DGT)', 45350.00, 16, 2600.00, 37750.00, 'Paid but Pending Next Month', '2025-02-07 07:18:57', '2025-02-08 02:32:55', 0),
(97, 1185, 'Manjeet', '2025-01-27', 410, 'HDCS(WEB+DGT)', 40350.00, 16, 5100.00, 35250.00, 'Paid but Pending Next Month', '2025-02-07 07:18:57', '2025-03-05 08:16:37', 0),
(98, 1188, 'Umang Grover', '2025-02-01', 414, 'PHP', 10350.00, 3, 5100.00, 1000.00, 'Paid but Pending Next Month', '2025-02-07 07:18:57', '2025-03-12 08:21:46', 0),
(99, 1186, 'Atul', '2025-01-28', 448, 'DTP', 10350.00, 2, 0.00, 5350.00, 'Pending', '2025-02-07 07:18:57', '2025-02-07 07:18:57', 0),
(100, 1187, 'Madhavi Sharma', '2025-01-30', 454, 'DCA(PRIME)', 12350.00, 8, 3100.00, 9250.00, 'Paid but Pending Next Month', '2025-02-07 07:18:57', '2025-03-05 08:17:39', 0),
(101, 1073, 'Minakshi Joshi', '2024-05-01', 410, 'HDCS(WEB+DGT)', 40350.00, 16, 12250.00, 28100.00, 'Paid but Pending Next Month', '2025-02-08 02:42:42', '2025-03-12 08:33:00', 0),
(102, 1190, 'Hardeep Kaur', '2025-02-07', 404, 'HDCS(WEB)', 30350.00, 12, 3500.00, 26850.00, 'Paid but Pending Next Month', '2025-02-08 03:12:28', '2025-02-08 03:14:57', 0),
(103, 1191, 'Mohammad Raza Zaidi', '2025-02-10', 413, 'HDCS(ACC)', 24350.00, 12, 9000.00, 15350.00, 'Paid but Pending Next Month', '2025-02-09 02:35:25', '2025-02-11 23:01:07', 0),
(104, 1192, 'Anuj', '2025-02-11', 400, 'BASIC', 3950.00, 4, 1900.00, 2050.00, 'Paid but Pending Next Month', '2025-02-11 04:02:25', '2025-03-12 08:47:02', 0),
(105, 1193, 'VANSH DUA', '2006-02-07', 404, 'HDCS(WEB)', 30350.00, 12, 4100.00, 26250.00, 'Paid but Pending Next Month', '2025-02-19 20:31:01', '2025-02-20 06:08:24', 0),
(106, 1194, 'Anjali', '2025-02-20', 406, 'MARG', 9890.00, 4, 9540.00, 1060.00, 'Paid but Pending Next Month', '2025-02-20 06:30:59', '2025-02-20 06:35:02', 0),
(107, 1195, 'SHIVANI', '2024-02-20', 404, 'HDCS(WEB)', 48350.00, 12, 4000.00, 26350.00, 'Paid but Pending Next Month', '2025-02-28 09:15:38', '2025-03-05 08:11:00', 0),
(109, 1027, 'Dilip Bhaskar', '2024-03-15', 404, 'HDCS(WEB)', 30350.00, 12, 2750.00, 27600.00, 'Paid but Pending Next Month', '2025-03-05 08:24:23', '2025-03-05 08:25:14', 0),
(110, 1196, 'MADHU', '2025-03-06', 427, 'TALLY+EXCL', 12350.00, 6, 2100.00, 10250.00, 'Paid but Pending Next Month', '2025-03-07 10:09:25', '2025-03-12 08:22:43', 0),
(111, 1199, 'SIMRAN', '2025-03-12', 400, 'BASIC', 4100.00, 4, 1100.00, 3000.00, 'Paid but Pending Next Month', '2025-03-12 08:12:59', '2025-03-12 08:56:34', 0),
(112, 1197, 'USHA', '2025-03-06', 417, 'ADV.EXCL', 7350.00, 3, 71000.00, -63150.00, 'Paid', '2025-03-12 08:13:00', '2025-03-12 08:34:04', 0),
(113, 1200, 'BAIJNATH SAHU', '2025-03-11', 427, 'TALLY+EXCL', 12350.00, 6, 2100.00, 10250.00, 'Paid but Pending Next Month', '2025-03-12 08:13:00', '2025-03-12 08:54:56', 0),
(114, 1025, 'Jyoti', '2025-03-09', 451, 'TALLY+BUSY', 9800.00, 6, 0.00, 9800.00, 'Pending', '2025-03-12 08:13:00', '2025-03-12 08:13:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_versions`
--

CREATE TABLE `student_versions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `old_data` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL CHECK (json_valid(`old_data`)),
  `new_data` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL CHECK (json_valid(`new_data`)),
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_versions`
--

INSERT INTO `student_versions` (`id`, `student_id`, `old_data`, `new_data`, `status`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1102, '\"{\\\"name\\\":\\\"Aman\\\",\\\"father_name\\\":\\\"Dinesh\\\",\\\"doa\\\":\\\"2024-06-19\\\",\\\"course_id\\\":454,\\\"batch\\\":\\\"8:00 AM\\\",\\\"contact_number\\\":\\\"87997 43646\\\",\\\"photo\\\":\\\"1102.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 3, '2025-03-11 08:02:20', '2025-03-12 00:09:54'),
(2, 1027, '\"{\\\"name\\\":\\\"Dilip Bhaskar\\\",\\\"father_name\\\":\\\"Harish Kr. Bhaskar\\\",\\\"doa\\\":\\\"2024-03-15\\\",\\\"course_id\\\":404,\\\"batch\\\":\\\"08:00 AM\\\",\\\"contact_number\\\":\\\"88601 91713\\\",\\\"photo\\\":\\\"1027.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 65, '2025-03-11 08:04:31', '2025-03-13 11:54:40'),
(3, 1118, '\"{\\\"name\\\":\\\"Altmas\\\",\\\"father_name\\\":\\\"Guddu\\\",\\\"doa\\\":\\\"2024-08-01\\\",\\\"course_id\\\":454,\\\"batch\\\":\\\"4:00 PM\\\",\\\"contact_number\\\":\\\"9310296479\\\",\\\"photo\\\":\\\"1118.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"04:00 PM\\\"}\"', 'approved', 3, '2025-03-11 08:06:06', '2025-03-11 23:36:00'),
(4, 1141, '\"{\\\"name\\\":\\\"Kavita Mehta\\\",\\\"father_name\\\":\\\"Devendra Singh\\\",\\\"doa\\\":\\\"2024-09-25\\\",\\\"course_id\\\":454,\\\"batch\\\":\\\"8:00 AM\\\",\\\"contact_number\\\":\\\"7618427458\\\",\\\"photo\\\":\\\"1141.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 3, '2025-03-11 08:07:20', '2025-03-12 00:09:56'),
(5, 1126, '\"{\\\"name\\\":\\\"Himanshu\\\",\\\"father_name\\\":\\\"Mr. Sanjay Yadav\\\",\\\"doa\\\":\\\"2024-08-20\\\",\\\"course_id\\\":454,\\\"batch\\\":\\\"8:00 AM\\\",\\\"contact_number\\\":\\\"98739 02511\\\",\\\"photo\\\":\\\"1126.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 3, '2025-03-11 08:07:29', '2025-03-12 00:09:58'),
(6, 1178, '\"{\\\"name\\\":\\\"Pinki\\\",\\\"father_name\\\":\\\"not forwarded\\\",\\\"doa\\\":\\\"2025-01-15\\\",\\\"course_id\\\":405,\\\"batch\\\":\\\"8:00 AM\\\",\\\"contact_number\\\":\\\"9205591136\\\",\\\"photo\\\":\\\"1031.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 3, '2025-03-11 08:07:38', '2025-03-12 00:09:59'),
(7, 1119, '\"{\\\"name\\\":\\\"Sujad\\\",\\\"father_name\\\":\\\"Mr. Guddu\\\",\\\"doa\\\":\\\"2024-08-01\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"4:00 PM\\\",\\\"contact_number\\\":\\\"93102 96479\\\",\\\"photo\\\":\\\"1119.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"04:00 PM\\\"}\"', 'approved', 3, '2025-03-11 08:08:30', '2025-03-12 00:11:01'),
(8, 1189, '\"{\\\"name\\\":\\\"Kishan Kumar\\\",\\\"father_name\\\":\\\"Jitender Kumar\\\",\\\"doa\\\":\\\"2025-02-02\\\",\\\"course_id\\\":400,\\\"batch\\\":\\\"8:00 AM\\\",\\\"contact_number\\\":\\\"9910247625\\\",\\\"photo\\\":\\\"1189.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 3, '2025-03-11 08:09:22', '2025-03-11 23:36:06'),
(9, 1194, '\"{\\\"name\\\":\\\"Anjali\\\",\\\"father_name\\\":\\\"Ravinder\\\",\\\"doa\\\":\\\"2025-02-20\\\",\\\"course_id\\\":406,\\\"batch\\\":\\\"8:00 AM\\\",\\\"contact_number\\\":\\\"8447828097\\\",\\\"photo\\\":\\\"1194.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 3, '2025-03-11 22:58:01', '2025-03-11 23:36:08'),
(10, 1174, '\"{\\\"name\\\":\\\"Sameer Ranjan\\\",\\\"father_name\\\":\\\"Unknown\\\",\\\"doa\\\":\\\"2024-12-16\\\",\\\"course_id\\\":430,\\\"batch\\\":\\\"02:00 PM - 03:00 PM\\\",\\\"contact_number\\\":\\\"93115 32305\\\",\\\"photo\\\":\\\"1174.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"2:00 PM\\\"}\"', 'approved', 3, '2025-03-11 22:58:42', '2025-03-11 23:07:10'),
(11, 1184, '\"{\\\"name\\\":\\\"Nusrat Parveen\\\",\\\"father_name\\\":\\\"Md Gani\\\",\\\"doa\\\":\\\"2025-01-25\\\",\\\"course_id\\\":405,\\\"batch\\\":\\\"02:00 PM - 03:00 PM\\\",\\\"contact_number\\\":\\\"9599535291\\\",\\\"photo\\\":\\\"1184.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"2:00 PM\\\"}\"', 'approved', 3, '2025-03-11 22:58:50', '2025-03-11 23:07:13'),
(12, 1190, '\"{\\\"name\\\":\\\"Hardeep Kaur\\\",\\\"father_name\\\":\\\"Mr. Gurbachan Singh\\\",\\\"doa\\\":\\\"2025-02-07\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"02:00 PM - 03:00 PM\\\",\\\"contact_number\\\":\\\"7827484750\\\",\\\"photo\\\":\\\"1190.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"2:00 PM\\\"}\"', 'approved', 3, '2025-03-11 22:58:57', '2025-03-11 23:07:16'),
(13, 1065, '\"{\\\"name\\\":\\\"Pooja Sharma\\\",\\\"father_name\\\":\\\"Mr.Raju Sharma\\\",\\\"doa\\\":\\\"2024-04-16\\\",\\\"course_id\\\":407,\\\"batch\\\":\\\"4:00 PM\\\",\\\"contact_number\\\":\\\"76782 66308\\\",\\\"photo\\\":\\\"1065.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"04:00 PM\\\"}\"', 'approved', 3, '2025-03-11 22:59:04', '2025-03-12 05:42:12'),
(14, 1073, '\"{\\\"name\\\":\\\"Minakshi Joshi\\\",\\\"father_name\\\":\\\"Nand Kishor\\\",\\\"doa\\\":\\\"2024-05-01\\\",\\\"course_id\\\":410,\\\"batch\\\":\\\"4:00 PM\\\",\\\"contact_number\\\":\\\"9520714095\\\",\\\"photo\\\":\\\"default_image.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"04:00 PM\\\"}\"', 'approved', 3, '2025-03-11 22:59:10', '2025-03-12 05:42:14'),
(15, 1176, '\"{\\\"name\\\":\\\"Vaishali sahu\\\",\\\"father_name\\\":\\\"Rajesh kumar\\\",\\\"doa\\\":\\\"2025-02-10\\\",\\\"course_id\\\":417,\\\"batch\\\":\\\"5:00 PM\\\",\\\"contact_number\\\":\\\"8178666186\\\",\\\"photo\\\":\\\"1176.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"05:00 PM\\\"}\"', 'approved', 3, '2025-03-11 22:59:18', '2025-03-11 23:36:10'),
(16, 1179, '\"{\\\"name\\\":\\\"ARMAN HASSAN\\\",\\\"father_name\\\":\\\"JAMEEN HASSAN\\\",\\\"doa\\\":\\\"2025-01-18\\\",\\\"course_id\\\":410,\\\"batch\\\":\\\"06:00 PM\\\",\\\"contact_number\\\":\\\"7827112606\\\",\\\"photo\\\":\\\"1179.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-11 22:59:34', '2025-03-14 07:24:39'),
(17, 1077, '\"{\\\"name\\\":\\\"Lekhika Saini\\\",\\\"father_name\\\":\\\"Lt. Jograj Saini\\\",\\\"doa\\\":\\\"2024-05-02\\\",\\\"course_id\\\":453,\\\"batch\\\":\\\"6:00 PM\\\",\\\"contact_number\\\":\\\"8826792427\\\",\\\"photo\\\":\\\"1077.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"06:00 PM\\\"}\"', 'approved', 3, '2025-03-11 22:59:44', '2025-03-11 23:36:13'),
(18, 928, '\"{\\\"name\\\":\\\"Saurabh\\\",\\\"father_name\\\":\\\"Pradeep\\\",\\\"doa\\\":\\\"1970-01-01\\\",\\\"course_id\\\":404,\\\"batch\\\":\\\"8:00 AM\\\",\\\"contact_number\\\":\\\"9958943225\\\",\\\"photo\\\":\\\"=CONCATENATE(A21,\\\\\\\".jpg\\\\\\\")\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:00:00', '2025-03-11 23:36:14'),
(19, 944, '\"{\\\"name\\\":\\\"Sanjana\\\",\\\"father_name\\\":\\\"Prabhu Das\\\",\\\"doa\\\":\\\"2024-09-25\\\",\\\"course_id\\\":404,\\\"batch\\\":\\\"04:00 PM\\\",\\\"contact_number\\\":\\\"81302 61937\\\",\\\"photo\\\":\\\"=CONCATENATE(A37,\\\\\\\".jpg\\\\\\\")\\\"}\"', '\"{\\\"batch\\\":\\\"05:00 PM\\\"}\"', 'approved', 66, '2025-03-11 23:00:12', '2025-03-12 05:42:15'),
(20, 1040, '\"{\\\"name\\\":\\\"Nitin Chaudhary\\\",\\\"father_name\\\":\\\"Mr. Kailash Chaudhary\\\",\\\"doa\\\":\\\"2024-04-01\\\",\\\"course_id\\\":404,\\\"batch\\\":\\\"08:00 AM\\\",\\\"contact_number\\\":\\\"9625289071\\\",\\\"photo\\\":\\\"1040.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 65, '2025-03-11 23:00:18', '2025-03-13 11:54:44'),
(21, 1127, '\"{\\\"name\\\":\\\"Sangam Bharti\\\",\\\"father_name\\\":\\\"Jai Prakash\\\",\\\"doa\\\":\\\"2024-08-21\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"08:00 AM - 09:00 AM\\\",\\\"contact_number\\\":\\\"98739 36149\\\",\\\"photo\\\":\\\"1127.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"10:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:00:28', '2025-03-11 23:07:36'),
(22, 1164, '\"{\\\"name\\\":\\\"Nishant Kumar\\\",\\\"father_name\\\":\\\"not forwarded\\\",\\\"doa\\\":\\\"2025-01-28\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"9:00 AM\\\",\\\"contact_number\\\":\\\"8384094911\\\",\\\"photo\\\":\\\"1164.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:01:08', '2025-03-11 23:36:17'),
(23, 1186, '\"{\\\"name\\\":\\\"Atul\\\",\\\"father_name\\\":\\\"Man Singh\\\",\\\"doa\\\":\\\"2025-01-28\\\",\\\"course_id\\\":456,\\\"batch\\\":\\\"06:00 PM\\\",\\\"contact_number\\\":\\\"9354676784\\\",\\\"photo\\\":\\\"default-avatar.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"06:00 PM\\\"}\"', 'approved', 3, '2025-03-11 23:01:17', '2025-03-12 03:59:21'),
(24, 1187, '\"{\\\"name\\\":\\\"Madhavi Sharma\\\",\\\"father_name\\\":\\\"Raghav Sharma\\\",\\\"doa\\\":\\\"2025-01-30\\\",\\\"course_id\\\":454,\\\"batch\\\":\\\"9:00 AM\\\",\\\"contact_number\\\":\\\"7410981176\\\",\\\"photo\\\":\\\"1187.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:01:30', '2025-03-11 23:36:20'),
(25, 1191, '\"{\\\"name\\\":\\\"Mohammad Raza Zaidi\\\",\\\"father_name\\\":\\\"Taukir Hassan Zaidi\\\",\\\"doa\\\":\\\"2025-02-10\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"9:00 AM\\\",\\\"contact_number\\\":\\\"9891312517\\\",\\\"photo\\\":\\\"1191.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:01:37', '2025-03-11 23:36:22'),
(26, 1171, '\"{\\\"name\\\":\\\"Hariom\\\",\\\"father_name\\\":\\\"Shyam Naresh\\\",\\\"doa\\\":\\\"2025-01-11\\\",\\\"course_id\\\":459,\\\"batch\\\":\\\"10:00 AM - 11:00 AM\\\",\\\"contact_number\\\":\\\"90135 07309\\\",\\\"photo\\\":\\\"1066.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"10:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:01:46', '2025-03-11 23:07:46'),
(27, 1196, '\"{\\\"name\\\":\\\"MADHU\\\",\\\"father_name\\\":\\\"HARI SINGH\\\",\\\"doa\\\":\\\"2025-03-06\\\",\\\"course_id\\\":427,\\\"batch\\\":\\\"10 AM\\\",\\\"contact_number\\\":\\\"8800184150\\\",\\\"photo\\\":\\\"1196.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"10:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:02:06', '2025-03-11 23:07:48'),
(28, 1182, '\"{\\\"name\\\":\\\"Sonam Rathore\\\",\\\"father_name\\\":\\\"w\\\\\\/o Vineet Singh Rathore\\\",\\\"doa\\\":\\\"2025-01-24\\\",\\\"course_id\\\":410,\\\"batch\\\":\\\"10:00 AM\\\",\\\"contact_number\\\":null,\\\"photo\\\":\\\"1182.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"03:00 PM\\\"}\"', 'approved', 66, '2025-03-11 23:02:19', '2025-03-12 05:42:17'),
(29, 1192, '\"{\\\"name\\\":\\\"Anuj\\\",\\\"father_name\\\":\\\"Balak Ram\\\",\\\"doa\\\":\\\"2025-02-11\\\",\\\"course_id\\\":400,\\\"batch\\\":\\\"10:00 AM - 11:00 AM\\\",\\\"contact_number\\\":\\\"8295541839\\\",\\\"photo\\\":\\\"1192.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"10:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:02:26', '2025-03-11 23:07:52'),
(30, 1150, '\"{\\\"name\\\":\\\"shivani\\\",\\\"father_name\\\":\\\"noname\\\",\\\"doa\\\":\\\"2024-12-04\\\",\\\"course_id\\\":454,\\\"batch\\\":\\\"10:00 AM\\\",\\\"contact_number\\\":\\\"96542 25824\\\",\\\"photo\\\":\\\"1150.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 65, '2025-03-11 23:02:31', '2025-03-12 03:59:31'),
(31, 1088, '\"{\\\"name\\\":\\\"Purnima\\\",\\\"father_name\\\":\\\"Bablu\\\",\\\"doa\\\":\\\"2024-05-21\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"11:00 AM\\\",\\\"contact_number\\\":\\\"82876 05431\\\",\\\"photo\\\":\\\"1088.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 65, '2025-03-11 23:02:46', '2025-03-12 01:45:18'),
(32, 1091, '\"{\\\"name\\\":\\\"Khushi\\\",\\\"father_name\\\":\\\"Raman Jha\\\",\\\"doa\\\":\\\"2024-05-22\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"11:00 AM\\\",\\\"contact_number\\\":\\\"78272 51882\\\",\\\"photo\\\":\\\"1091.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 65, '2025-03-11 23:02:51', '2025-03-12 01:45:21'),
(33, 1180, '\"{\\\"name\\\":\\\"Dharmesh\\\",\\\"father_name\\\":\\\"not forwarded\\\",\\\"doa\\\":\\\"2025-01-20\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"11:00 AM - 12:00 PM\\\",\\\"contact_number\\\":\\\"9899632597\\\",\\\"photo\\\":\\\"1180.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:02:58', '2025-03-11 23:08:00'),
(34, 1181, '\"{\\\"name\\\":\\\"Jeet singh\\\",\\\"father_name\\\":\\\"Tejveer Singh\\\",\\\"doa\\\":\\\"2025-01-21\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"11:00 AM - 12:00 PM\\\",\\\"contact_number\\\":\\\"7303288469\\\",\\\"photo\\\":\\\"1181.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:03:05', '2025-03-11 23:08:02'),
(35, 1185, '\"{\\\"name\\\":\\\"Manjeet\\\",\\\"father_name\\\":\\\"Ramlal\\\",\\\"doa\\\":\\\"2025-01-27\\\",\\\"course_id\\\":410,\\\"batch\\\":\\\"11:00 AM - 12:00 PM\\\",\\\"contact_number\\\":\\\"8826963051\\\",\\\"photo\\\":\\\"1185.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:03:14', '2025-03-11 23:08:04'),
(36, 1193, '\"{\\\"name\\\":\\\"VANSH DUA\\\",\\\"father_name\\\":\\\"MR. VIKASH DUA\\\",\\\"doa\\\":\\\"2006-02-19\\\",\\\"course_id\\\":404,\\\"batch\\\":\\\"11:00 AM\\\",\\\"contact_number\\\":\\\"8800525117\\\",\\\"photo\\\":\\\"1193.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 65, '2025-03-11 23:03:21', '2025-03-12 01:45:24'),
(37, 1089, '\"{\\\"name\\\":\\\"Mayank Dewett\\\",\\\"father_name\\\":\\\"S\\\\\\/o Kamaljeet  Dewett\\\",\\\"doa\\\":\\\"2024-05-22\\\",\\\"course_id\\\":407,\\\"batch\\\":\\\"06:00 PM\\\",\\\"contact_number\\\":\\\"97114 11698\\\",\\\"photo\\\":\\\"1089.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"07:00 PM\\\"}\"', 'approved', 66, '2025-03-11 23:03:28', '2025-03-12 05:42:18'),
(38, 1195, '\"{\\\"name\\\":\\\"SHIVANI\\\",\\\"father_name\\\":\\\"RAJU\\\",\\\"doa\\\":\\\"2024-02-20\\\",\\\"course_id\\\":407,\\\"batch\\\":\\\"11:00 AM - 12:00 PM\\\",\\\"contact_number\\\":\\\"8744908360\\\",\\\"photo\\\":\\\"1195.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:03:41', '2025-03-11 23:08:09'),
(39, 1079, '\"{\\\"name\\\":\\\"Akash\\\",\\\"father_name\\\":\\\"Mr. Rajesh\\\",\\\"doa\\\":\\\"2024-05-03\\\",\\\"course_id\\\":407,\\\"batch\\\":\\\"11:00 AM\\\",\\\"contact_number\\\":\\\"9311257226\\\",\\\"photo\\\":\\\"1079.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 65, '2025-03-11 23:03:54', '2025-03-12 01:45:27'),
(40, 1188, '\"{\\\"name\\\":\\\"Umang Grover\\\",\\\"father_name\\\":\\\"Mr. Ramesh Kumar\\\",\\\"doa\\\":\\\"2025-02-01\\\",\\\"course_id\\\":414,\\\"batch\\\":\\\"12:00 PM - 01:00 PM\\\",\\\"contact_number\\\":\\\"9711503551\\\",\\\"photo\\\":\\\"1188.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"12:00 PM\\\"}\"', 'approved', 3, '2025-03-11 23:04:01', '2025-03-11 23:08:13'),
(41, 1154, '\"{\\\"name\\\":\\\"Rohit Kumar\\\",\\\"father_name\\\":\\\"Kishan Kumar\\\",\\\"doa\\\":\\\"2024-10-17\\\",\\\"course_id\\\":407,\\\"batch\\\":\\\"11AM\\\",\\\"contact_number\\\":\\\"88007 06451\\\",\\\"photo\\\":\\\"1154.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:04:17', '2025-03-11 23:08:15'),
(42, 1173, '\"{\\\"name\\\":\\\"Aakash Kumar\\\",\\\"father_name\\\":\\\"Dinesh Kumar \\\",\\\"doa\\\":\\\"2024-12-16\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"11AM\\\",\\\"contact_number\\\":\\\"99992 09158\\\",\\\"photo\\\":\\\"1173.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:04:23', '2025-03-11 23:08:17'),
(43, 1085, '\"{\\\"name\\\":\\\"Prince dutta\\\",\\\"father_name\\\":\\\"S\\\\\\/o Prem Dutta \\\",\\\"doa\\\":\\\"2024-05-13\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"11:00 AM\\\",\\\"contact_number\\\":\\\"85060 42630\\\",\\\"photo\\\":\\\"1085.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"06:00 PM\\\"}\"', 'approved', 66, '2025-03-11 23:04:29', '2025-03-12 05:42:20'),
(44, 1075, '\"{\\\"name\\\":\\\"Simran Gupta\\\",\\\"father_name\\\":\\\"Mr. Arjun Gupta\\\",\\\"doa\\\":\\\"2024-05-02\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"11AM\\\",\\\"contact_number\\\":\\\"89209 81299\\\",\\\"photo\\\":\\\"1075.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:04:35', '2025-03-11 23:08:20'),
(45, 1142, '\"{\\\"name\\\":\\\"Zhilik Mandal\\\",\\\"father_name\\\":\\\"Mr. Sukhen Mandal\\\",\\\"doa\\\":\\\"2024-09-24\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"12PM\\\",\\\"contact_number\\\":\\\" 82874 82757\\\",\\\"photo\\\":\\\"1142.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"12:00 PM\\\"}\"', 'approved', 3, '2025-03-11 23:04:42', '2025-03-11 23:08:22'),
(46, 1003, '\"{\\\"name\\\":\\\"Sifa\\\",\\\"father_name\\\":\\\"Md.  Ishak\\\",\\\"doa\\\":\\\"2024-01-20\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"04:00 PM\\\",\\\"contact_number\\\":\\\"98714 25594\\\",\\\"photo\\\":\\\"1003.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"06:00 PM\\\"}\"', 'approved', 64, '2025-03-11 23:04:54', '2025-03-12 07:46:56'),
(47, 1008, '\"{\\\"name\\\":\\\"Akshita\\\",\\\"father_name\\\":\\\"Mahipal Singh\\\",\\\"doa\\\":\\\"2024-02-09\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"04:00 PM\\\",\\\"contact_number\\\":\\\"88603 12623\\\",\\\"photo\\\":\\\"1008.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"01:00 PM\\\"}\"', 'approved', 64, '2025-03-11 23:04:59', '2025-03-12 07:47:01'),
(48, 1096, '\"{\\\"name\\\":\\\"Cheshta bansal\\\",\\\"father_name\\\":\\\"D\\\\\\/o Mr.Naresh Kumar\\\",\\\"doa\\\":\\\"2024-06-05\\\",\\\"course_id\\\":407,\\\"batch\\\":\\\"04:00 PM\\\",\\\"contact_number\\\":\\\"88006 94350\\\",\\\"photo\\\":\\\"1096.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"05:00 PM\\\"}\"', 'approved', 66, '2025-03-11 23:05:07', '2025-03-12 05:42:21'),
(49, 1155, '\"{\\\"name\\\":\\\"Pooja\\\",\\\"father_name\\\":\\\"Ghanshyam\\\",\\\"doa\\\":\\\"2024-10-23\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"06:00 PM\\\",\\\"contact_number\\\":\\\"88514 67462\\\",\\\"photo\\\":\\\"1155.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 64, '2025-03-11 23:05:15', '2025-03-12 07:47:09'),
(50, 1068, '\"{\\\"name\\\":\\\"Jabir\\\",\\\"father_name\\\":\\\"Md. Zakir\\\",\\\"doa\\\":\\\"2024-04-22\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"6:00 PM\\\",\\\"contact_number\\\":\\\"88602 70899\\\",\\\"photo\\\":\\\"1068.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"06:00 PM\\\"}\"', 'approved', 3, '2025-03-11 23:05:36', '2025-03-11 23:36:26'),
(51, 1147, '\"{\\\"name\\\":\\\"Abhilash\\\",\\\"father_name\\\":\\\"Mr. Hemraj\\\",\\\"doa\\\":\\\"2024-09-26\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"7:00 PM\\\",\\\"contact_number\\\":\\\" 98212 02632\\\",\\\"photo\\\":\\\"1147.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"07:00 PM\\\"}\"', 'approved', 3, '2025-03-11 23:05:41', '2025-03-11 23:36:27'),
(52, 1149, '\"{\\\"name\\\":\\\"Roshan Kumar\\\",\\\"father_name\\\":\\\"Mr. Pramod Kumar\\\",\\\"doa\\\":\\\"2024-09-27\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"7:00 PM\\\",\\\"contact_number\\\":\\\" 96542 25824\\\",\\\"photo\\\":\\\"1149.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"07:00 PM\\\"}\"', 'approved', 3, '2025-03-11 23:05:47', '2025-03-11 23:36:28'),
(53, 1163, '\"{\\\"name\\\":\\\"Dinesh Kumar\\\",\\\"father_name\\\":\\\"Rakesh Kumar\\\",\\\"doa\\\":\\\"2024-12-06\\\",\\\"course_id\\\":400,\\\"batch\\\":\\\"7:00 PM\\\",\\\"contact_number\\\":\\\"94566 73066\\\",\\\"photo\\\":\\\"1163.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"07:00 PM\\\"}\"', 'approved', 3, '2025-03-11 23:05:53', '2025-03-11 23:36:30'),
(54, 1153, '\"{\\\"name\\\":\\\"Reema Sonkar\\\",\\\"father_name\\\":\\\"Deenanath Sonkar\\\",\\\"doa\\\":\\\"2024-10-08\\\",\\\"course_id\\\":400,\\\"batch\\\":\\\"06:00 PM\\\",\\\"contact_number\\\":\\\"89205 77976\\\",\\\"photo\\\":\\\"1153.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:06:06', '2025-03-12 08:00:14'),
(55, 1130, '\"{\\\"name\\\":\\\"Aarti \\\",\\\"father_name\\\":\\\"Mr. Mukesh Kumar\\\",\\\"doa\\\":\\\"2024-09-09\\\",\\\"course_id\\\":407,\\\"batch\\\":\\\"9:00 AM\\\",\\\"contact_number\\\":\\\" 87440 21359\\\",\\\"photo\\\":\\\"1130.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:06:14', '2025-03-11 23:36:32'),
(56, 1169, '\"{\\\"name\\\":\\\"Abhishek Chaudhary\\\",\\\"father_name\\\":\\\"Basuki Nath Chaudhary\\\",\\\"doa\\\":\\\"2024-11-26\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"9:00 AM\\\",\\\"contact_number\\\":\\\"88261 96089\\\",\\\"photo\\\":\\\"1169.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:06:22', '2025-03-11 23:36:34'),
(57, 1170, '\"{\\\"name\\\":\\\"Shantanu Sharma\\\",\\\"father_name\\\":\\\"Rajesh Sharma\\\",\\\"doa\\\":\\\"2024-12-11\\\",\\\"course_id\\\":400,\\\"batch\\\":\\\"09:00 AM\\\",\\\"contact_number\\\":\\\"93132 83929\\\",\\\"photo\\\":\\\"1170.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"10:00 AM\\\"}\"', 'approved', 65, '2025-03-11 23:06:30', '2025-03-13 11:54:48'),
(58, 1067, '\"{\\\"name\\\":\\\"Ankush Kumar\\\",\\\"father_name\\\":\\\"Mr. Mahesh Sah\\\",\\\"doa\\\":\\\"2024-04-22\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"09:00 AM\\\",\\\"contact_number\\\":\\\"78274 02918\\\",\\\"photo\\\":\\\"1067.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"06:00 PM\\\"}\"', 'approved', 64, '2025-03-11 23:06:40', '2025-03-12 07:47:25'),
(59, 1019, '\"{\\\"name\\\":\\\"Rinkal Singh\\\",\\\"father_name\\\":\\\"Peshkar Singh\\\",\\\"doa\\\":\\\"2024-02-21\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"09:00 AM\\\",\\\"contact_number\\\":\\\"80763 04689\\\",\\\"photo\\\":\\\"1019.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"07:00 PM\\\"}\"', 'approved', 64, '2025-03-11 23:06:47', '2025-03-12 07:47:30'),
(60, 914, '\"{\\\"name\\\":\\\"Karan\\\",\\\"father_name\\\":\\\"Prabhu Dayal\\\",\\\"doa\\\":\\\"1970-01-01\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"9:00 AM\\\",\\\"contact_number\\\":\\\"95408 85345\\\",\\\"photo\\\":\\\"=CONCATENATE(A6,\\\\\\\".jpg\\\\\\\")\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:06:57', '2025-03-11 23:36:38'),
(61, 1183, '\"{\\\"name\\\":\\\"Abhay Parmal\\\",\\\"father_name\\\":\\\"Subhash\\\",\\\"doa\\\":\\\"2025-01-25\\\",\\\"course_id\\\":410,\\\"batch\\\":\\\"8:00 AM\\\",\\\"contact_number\\\":\\\"8447400927\\\",\\\"photo\\\":\\\"default_image.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"08:00 AM\\\"}\"', 'approved', 3, '2025-03-11 23:09:49', '2025-03-11 23:36:40'),
(62, 1200, '\"{\\\"name\\\":\\\"BAIJNATH SAHU\\\",\\\"father_name\\\":\\\"DHANESHWAR SAHU\\\",\\\"doa\\\":\\\"2025-03-11\\\",\\\"course_id\\\":427,\\\"batch\\\":\\\"04 PM\\\",\\\"contact_number\\\":\\\"7257844708\\\",\\\"photo\\\":\\\"1200.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"04:00 PM\\\"}\"', 'approved', 3, '2025-03-12 05:43:06', '2025-03-12 05:43:18'),
(63, 1197, '\"{\\\"name\\\":\\\"USHA\\\",\\\"father_name\\\":\\\"RAMESH SINGH\\\",\\\"doa\\\":\\\"2025-03-06\\\",\\\"course_id\\\":417,\\\"batch\\\":\\\"06 PM\\\",\\\"contact_number\\\":\\\"9354943841\\\",\\\"photo\\\":\\\"1197.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"04:00 PM\\\"}\"', 'approved', 64, '2025-03-12 07:25:06', '2025-03-12 07:47:35'),
(64, 1160, '\"{\\\"name\\\":\\\"Kartik \\\",\\\"father_name\\\":\\\"Sita Ram\\\",\\\"doa\\\":\\\"2024-11-18\\\",\\\"course_id\\\":400,\\\"batch\\\":\\\"4-6PM\\\",\\\"contact_number\\\":\\\"93103 90133\\\",\\\"photo\\\":\\\"1160.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"06:00 PM\\\"}\"', 'approved', 3, '2025-03-12 07:58:05', '2025-03-12 08:00:17'),
(65, 1156, '\"{\\\"name\\\":\\\"Vijay Kumar\\\",\\\"father_name\\\":\\\"Ravinder prasad\\\",\\\"doa\\\":\\\"2024-11-06\\\",\\\"course_id\\\":428,\\\"batch\\\":\\\"12-2PM\\\",\\\"contact_number\\\":\\\"92663 73516\\\",\\\"photo\\\":\\\"1156.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"12:00 PM\\\"}\"', 'approved', 3, '2025-03-12 07:58:28', '2025-03-12 08:00:19'),
(66, 1158, '\"{\\\"name\\\":\\\"Rihan Siddiqui\\\",\\\"father_name\\\":\\\"Hashim Siddiqui\\\",\\\"doa\\\":\\\"2024-11-07\\\",\\\"course_id\\\":400,\\\"batch\\\":\\\"11AM\\\",\\\"contact_number\\\":\\\"98737 16274\\\",\\\"photo\\\":\\\"1158.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-12 07:58:37', '2025-03-12 08:00:21'),
(67, 1162, '\"{\\\"name\\\":\\\"Gunjan Kumar\\\",\\\"father_name\\\":\\\"s\\\\\\/o Ramesh Kumar\\\",\\\"doa\\\":\\\"2024-11-26\\\",\\\"course_id\\\":405,\\\"batch\\\":\\\"8AM\\\",\\\"contact_number\\\":\\\"9811579976\\\",\\\"photo\\\":\\\"1162.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"07:00 PM\\\"}\"', 'approved', 3, '2025-03-12 07:58:47', '2025-03-12 08:00:23'),
(68, 1023, '\"{\\\"name\\\":\\\"Meena\\\",\\\"father_name\\\":\\\"Dharamvir\\\",\\\"doa\\\":\\\"2024-03-07\\\",\\\"course_id\\\":413,\\\"batch\\\":\\\"5PM\\\",\\\"contact_number\\\":\\\"99530 79665\\\",\\\"photo\\\":\\\"1023.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"04:00 PM\\\"}\"', 'approved', 3, '2025-03-12 07:58:57', '2025-03-12 08:00:25'),
(69, 929, '\"{\\\"name\\\":\\\"Priya singh\\\",\\\"father_name\\\":\\\"Devendra Pal Singh\\\",\\\"doa\\\":\\\"1970-01-01\\\",\\\"course_id\\\":400,\\\"batch\\\":\\\"4-6PM\\\",\\\"contact_number\\\":\\\"85869 14048\\\",\\\"photo\\\":\\\"=CONCATENATE(A22,\\\\\\\".jpg\\\\\\\")\\\"}\"', '\"{\\\"batch\\\":\\\"04:00 PM\\\"}\"', 'approved', 3, '2025-03-12 07:59:07', '2025-03-12 08:00:29'),
(70, 1199, '\"{\\\"name\\\":\\\"SIMRAN\\\",\\\"father_name\\\":\\\"BHUMESH\\\",\\\"doa\\\":\\\"2025-03-12\\\",\\\"course_id\\\":400,\\\"batch\\\":\\\"11 AM\\\",\\\"contact_number\\\":\\\"9654225824\\\",\\\"photo\\\":\\\"1199.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-12 07:59:24', '2025-03-12 08:00:32'),
(71, 1047, '\"{\\\"name\\\":\\\"Sarita Yadav\\\",\\\"father_name\\\":\\\"Shyam Kishor Yadav\\\",\\\"doa\\\":\\\"2024-04-03\\\",\\\"course_id\\\":407,\\\"batch\\\":\\\"10 AM\\\",\\\"contact_number\\\":\\\"8527295816\\\",\\\"photo\\\":\\\"1047.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"10:00 AM\\\"}\"', 'approved', 3, '2025-03-14 07:16:25', '2025-03-14 07:24:42'),
(72, 1083, '\"{\\\"name\\\":\\\"Sohail Khan\\\",\\\"father_name\\\":\\\"Md. Firoz Khan\\\",\\\"doa\\\":\\\"2024-05-09\\\",\\\"course_id\\\":404,\\\"batch\\\":\\\"08 AM\\\",\\\"contact_number\\\":\\\"70115 97500\\\",\\\"photo\\\":\\\"1083.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-14 07:16:42', '2025-03-14 07:24:43'),
(73, 1078, '\"{\\\"name\\\":\\\"Shahbaj\\\",\\\"father_name\\\":\\\"Hamid Ali\\\",\\\"doa\\\":\\\"2024-05-03\\\",\\\"course_id\\\":410,\\\"batch\\\":\\\"10 AM\\\",\\\"contact_number\\\":\\\"9911141020\\\",\\\"photo\\\":\\\"1078.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-14 07:17:00', '2025-03-14 07:24:44'),
(74, 1069, '\"{\\\"name\\\":\\\"Neeraj\\\",\\\"father_name\\\":\\\"Anil Kumar\\\",\\\"doa\\\":\\\"2024-04-23\\\",\\\"course_id\\\":410,\\\"batch\\\":\\\"09 AM\\\",\\\"contact_number\\\":\\\"9310139732\\\",\\\"photo\\\":\\\"1069.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"09:00 AM\\\"}\"', 'approved', 3, '2025-03-14 07:17:46', '2025-03-14 07:24:46'),
(75, 1129, '\"{\\\"name\\\":\\\"Gulkesh Kamar\\\",\\\"father_name\\\":\\\"Md. Amin Uddin\\\",\\\"doa\\\":\\\"2024-08-31\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"10-12PM\\\",\\\"contact_number\\\":\\\"93136 68328\\\",\\\"photo\\\":\\\"1129.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"10:00 AM\\\"}\"', 'approved', 3, '2025-03-14 07:18:03', '2025-03-14 07:24:47'),
(76, 968, '\"{\\\"name\\\":\\\"Shivam singh\\\",\\\"father_name\\\":\\\"Mr. Shamsher Singh\\\",\\\"doa\\\":\\\"2023-10-30\\\",\\\"course_id\\\":445,\\\"batch\\\":\\\"08 AM\\\",\\\"contact_number\\\":\\\"78145 58184\\\",\\\"photo\\\":\\\"968.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"05:00 PM\\\"}\"', 'approved', 3, '2025-03-14 07:18:37', '2025-03-14 07:24:49'),
(77, 1137, '\"{\\\"name\\\":\\\"Vijay\\\",\\\"father_name\\\":\\\"Mr. Ranvir Singh\\\",\\\"doa\\\":\\\"2024-09-20\\\",\\\"course_id\\\":404,\\\"batch\\\":\\\"11 AM\\\",\\\"contact_number\\\":\\\"98704 55357\\\",\\\"photo\\\":\\\"1137.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"11:00 AM\\\"}\"', 'approved', 3, '2025-03-14 07:19:31', '2025-03-14 07:24:50'),
(78, 1070, '\"{\\\"name\\\":\\\"Abhinav\\\",\\\"father_name\\\":\\\"Mr. Ravi Kumar\\\",\\\"doa\\\":\\\"2024-04-24\\\",\\\"course_id\\\":407,\\\"batch\\\":\\\"09 AM\\\",\\\"contact_number\\\":\\\"9643097902\\\",\\\"photo\\\":\\\"1070.jpg\\\"}\"', '\"{\\\"batch\\\":\\\"07:00 PM\\\"}\"', 'approved', 3, '2025-03-14 07:24:02', '2025-03-14 07:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, NULL, 'Niceweb', 'nicewebtechnologies@gmail.com', 'nice304', NULL, '$2y$12$qjHIsKdeZDW0Harvz.6D.uF322M4KspBjk722p5QQP6Af1PQ7abWi', NULL, '2024-11-08 13:30:42', '2024-11-08 13:30:42', 'super_admin'),
(2, NULL, 'Rakesh Kumar Singh', 'rakeshdelhi.singh@gmail.com', 'nice110', NULL, '$2y$12$uhYZEjkKw6TOzgcv/FuayeMC.MLocvEQjObXikRPOcIT9f.faat/y', NULL, '2025-02-01 12:27:30', '2025-02-01 12:27:30', 'admin'),
(3, NULL, 'Teacher', 'teacher@nicewebtechnologies.com', 'nice404', NULL, '$2y$12$ymlNgUkINTMbcznfgysEvOzqGtm6uGBd7BUKNsTyU6jU2xrXyFmXq', NULL, '2025-02-01 12:28:31', '2025-02-01 12:28:31', 'teacher'),
(4, NULL, 'Student', 'student@nicewebtechnologies.com', 'nice156', NULL, '$2y$12$4XuOEAFpbjqC46GellZUb.1XpiPNyPqS70/JbebtaSLhqVDocTosq', NULL, '2025-02-01 12:29:11', '2025-02-01 12:29:11', 'student'),
(5, 1130, 'Aarti ', 'nice345541130@nicewebtechnologies.com', 'nice5431130', NULL, '$2y$12$IjuD.UgyV88AB0yd15alI.SbYyPXSoyhNh3sO5Z6BApbOuiGFTJ6C', NULL, '2025-03-09 08:57:24', '2025-03-09 08:57:24', 'student'),
(6, 1142, 'Zhilik Mandal', 'nice893701142@nicewebtechnologies.com', 'nice9561142', NULL, '$2y$12$fhNgYaM2FEfIrLSrebzE6.ylgeaQOLvb.1l0M9gQeSvDwZDdMqPO.', NULL, '2025-03-09 08:57:25', '2025-03-09 08:57:25', 'student'),
(7, 1147, 'Abhilash', 'nice749541147@nicewebtechnologies.com', 'nice8311147', NULL, '$2y$12$.tPqGQJlbNe3zwtPos4CZesbCi3vkHHFBZRKCdWgUs.UGHHb4ZL1C', NULL, '2025-03-09 08:57:25', '2025-03-09 08:57:25', 'student'),
(8, 1149, 'Roshan Kumar', 'nice632721149@nicewebtechnologies.com', 'nice6031149', NULL, '$2y$12$2rL5cmWKfXfXUIdgA.pcyuNZV7EUxEMi34ilCopYzedJlcCRIQ8qy', NULL, '2025-03-09 08:57:25', '2025-03-09 08:57:25', 'student'),
(9, 1153, 'Reema Sonkar', 'nice416961153@nicewebtechnologies.com', 'nice8101153', NULL, '$2y$12$4rjMqIPaUxqs9qwKfLjbLe8f9M62uZVLJFiFhLGOo1ulsdBazQ7O2', NULL, '2025-03-09 08:57:25', '2025-03-09 08:57:25', 'student'),
(10, 1154, 'Rohit Kumar', 'nice797001154@nicewebtechnologies.com', 'nice7931154', NULL, '$2y$12$lZCJi0WpcWG75tKxc6O.lOcfTuilGPOEzhsmqEPEbLqWcDmWca.Fe', NULL, '2025-03-09 08:57:26', '2025-03-09 08:57:26', 'student'),
(11, 1155, 'Pooja', 'nice442721155@nicewebtechnologies.com', 'nice6961155', NULL, '$2y$12$QV3fRWcc04AUKt0G6NI2hexQunt3KDrImDYIWBOiLGSLDz8cL27uK', NULL, '2025-03-09 08:57:26', '2025-03-09 08:57:26', 'student'),
(12, 1163, 'Dinesh Kumar', 'nice268941163@nicewebtechnologies.com', 'nice2031163', NULL, '$2y$12$D4neW93PYbbDC.401qw06uJKfgo6rdV4Unq56RzTA9YpijSnQmTRy', NULL, '2025-03-09 08:57:26', '2025-03-09 08:57:26', 'student'),
(13, 1169, 'Abhishek Chaudhary', 'nice484651169@nicewebtechnologies.com', 'nice1221169', NULL, '$2y$12$FD0Q/.wbGSqCFv8a2Tos8.YWc4t/ykRHixftSlp8.pDGNznPP.zRy', NULL, '2025-03-09 08:57:26', '2025-03-09 08:57:26', 'student'),
(14, 1170, 'Shantanu Sharma', 'nice143861170@nicewebtechnologies.com', 'nice9471170', NULL, '$2y$12$.gHthjdwvk8YY3cw19YtW.ie7ZGzmuF6R9yRMBQJ5.ExL/dYplk/a', NULL, '2025-03-09 08:57:27', '2025-03-09 08:57:27', 'student'),
(15, 1173, 'Aakash Kumar', 'nice275321173@nicewebtechnologies.com', 'nice5921173', NULL, '$2y$12$egN.hbR8C5jezQTxre6mOeL0vq44LE2hpJWJg0BmLaJ8AiRNg9xRG', NULL, '2025-03-09 08:57:27', '2025-03-09 08:57:27', 'student'),
(16, 1085, 'Prince dutta', 'nice932371085@nicewebtechnologies.com', 'nice4351085', NULL, '$2y$12$e6IC5pL5fE6LbllIcGh23uYnwx/T/uggIBv8YP4H7qM3JuXUieonO', NULL, '2025-03-09 08:57:27', '2025-03-09 08:57:27', 'student'),
(17, 1089, 'Mayank Dewett', 'nice596561089@nicewebtechnologies.com', 'nice5071089', NULL, '$2y$12$v05d3SmOkMlBA0LFCZxpPuG.hSyqsv1cUP7Eqmwo3VFr7WoS2pSc.', NULL, '2025-03-09 08:57:28', '2025-03-09 08:57:28', 'student'),
(18, 1096, 'Cheshta bansal', 'nice938581096@nicewebtechnologies.com', 'nice6271096', NULL, '$2y$12$HnMOZtG4xgisRvpLavauWebGH9Zc8vWwgrle86HdOcc7ywgu8VW/C', NULL, '2025-03-09 08:57:28', '2025-03-09 08:57:28', 'student'),
(19, 1119, 'Sujad', 'nice723481119@nicewebtechnologies.com', 'nice5971119', NULL, '$2y$12$IloNExk2Dgw8YqbO5TDA5eh.o0a/AdfLwENeR3/IYfpYyJUyO7V66', NULL, '2025-03-09 08:57:28', '2025-03-09 08:57:28', 'student'),
(20, 1127, 'Sangam Bharti', 'nice978691127@nicewebtechnologies.com', 'nice7501127', NULL, '$2y$12$6H98hBlLJEq0.qQZW4lNCuq0vOIEfODjSVAxzas.x4/LGWK8H1pEC', NULL, '2025-03-09 08:57:29', '2025-03-09 08:57:29', 'student'),
(21, 1027, 'Dilip Bhaskar', 'nice177441027@nicewebtechnologies.com', 'nice9381027', NULL, '$2y$12$ZNWikuehiMpomamnkSm17.PDnk6BE.Wplxg8Cy536cE4r2wVLELja', NULL, '2025-03-09 08:57:29', '2025-03-09 08:57:29', 'student'),
(22, 1040, 'Nitin Chaudhary', 'nice164311040@nicewebtechnologies.com', 'nice5001040', NULL, '$2y$12$aatS3kypC.CYv3pByRi2lOhcCC1FUpRyYA0FEbIWVuK9IYvw6h/Fi', NULL, '2025-03-09 08:57:29', '2025-03-09 08:57:29', 'student'),
(23, 1067, 'Ankush Kumar', 'nice323411067@nicewebtechnologies.com', 'nice8271067', NULL, '$2y$12$x6SYUZUFgPHb9D.8QWU03Ohd95pt9LnWhTqBcTP8w8A11hVPbCV0m', NULL, '2025-03-09 08:57:29', '2025-03-09 08:57:29', 'student'),
(24, 1068, 'Jabir', 'nice658431068@nicewebtechnologies.com', 'nice1551068', NULL, '$2y$12$/9.ALQ/plnrL44KSC2vkYu4kKuLWWpXnXov/Y2tahiRmOg.nWkmdO', NULL, '2025-03-09 08:57:30', '2025-03-09 08:57:30', 'student'),
(25, 1075, 'Simran Gupta', 'nice952311075@nicewebtechnologies.com', 'nice9261075', NULL, '$2y$12$FEGFvLIBWIBXv93Zd4dB9e.rIFjY1qloBa6Oc5.WPz8g2vqN0EgnW', NULL, '2025-03-09 08:57:30', '2025-03-09 08:57:30', 'student'),
(26, 1003, 'Sifa', 'nice122061003@nicewebtechnologies.com', 'nice9541003', NULL, '$2y$12$RwLoVNVD75ITSQ4xO/Y6c.9e2lsF7u0LbYxFFnn0dn.Csfq0JViMy', NULL, '2025-03-09 08:57:30', '2025-03-09 08:57:30', 'student'),
(27, 1008, 'Akshita', 'nice943241008@nicewebtechnologies.com', 'nice7141008', NULL, '$2y$12$7Q/4OGhganectYNOajITj.rMVAV9WVMWhqRuDno8KhtBJ.iIz2B0m', NULL, '2025-03-09 08:57:30', '2025-03-09 08:57:30', 'student'),
(28, 1019, 'Rinkal Singh', 'nice487521019@nicewebtechnologies.com', 'nice8751019', NULL, '$2y$12$XzbyKxnlnx3K8VZvGsEah.FpUUv3YtBpPby0tzLeXlSxevG/in7Sq', NULL, '2025-03-09 08:57:31', '2025-03-09 08:57:31', 'student'),
(29, 914, 'Karan', 'nice14239914@nicewebtechnologies.com', 'nice619914', NULL, '$2y$12$v8j7zIS2n7Boj5a2oWW2a.e7Q5YXy3d/LyI12K08lrxk7odw.saZm', NULL, '2025-03-09 08:57:31', '2025-03-09 08:57:31', 'student'),
(30, 928, 'Saurabh', 'nice96678928@nicewebtechnologies.com', 'nice497928', NULL, '$2y$12$F9ruMr6xhAlzskKFlFXB8OMaR.8TRwhl4uDqurLj859SEDCLabxwK', NULL, '2025-03-09 08:57:31', '2025-03-09 08:57:31', 'student'),
(31, 944, 'Sanjana', 'nice92086944@nicewebtechnologies.com', 'nice493944', NULL, '$2y$12$qyt7zGkj0O13eSUuhJi0euBMcgNiR1ZLZX1n78s2mKArWsXtAzelO', NULL, '2025-03-09 08:57:31', '2025-03-09 08:57:31', 'student'),
(32, 1150, 'shivani', 'nice333961150@nicewebtechnologies.com', 'nice6261150', NULL, '$2y$12$UwIDQtbBHyqclb8wNIW4qOqBKxA6XuBtSm2RHUrflEW5tTikVMAVm', NULL, '2025-03-09 08:57:32', '2025-03-09 08:57:32', 'student'),
(33, 1118, 'Altmas', 'nice402261118@nicewebtechnologies.com', 'nice1811118', NULL, '$2y$12$uDlMHvroVbsbrqObH64oj.YlwKGZf1oQcfvsHvrmIHIOo8JNaCVcS', NULL, '2025-03-09 08:57:32', '2025-03-09 08:57:32', 'student'),
(34, 1079, 'Akash', 'nice458341079@nicewebtechnologies.com', 'nice8511079', NULL, '$2y$12$79t9ml5Q1yoIlQ7dhGBHw.MHaY0YLovXCjhgaRq202KGFKRJWdrnG', NULL, '2025-03-09 08:57:32', '2025-03-09 08:57:32', 'student'),
(35, 1077, 'Lekhika Saini', 'nice207761077@nicewebtechnologies.com', 'nice8701077', NULL, '$2y$12$ocy275HS1bL//RKkd6LpZO5UjCm4zeDTSYsqGz9PmbEAT.ATQ0Axe', NULL, '2025-03-09 08:57:32', '2025-03-09 08:57:32', 'student'),
(36, 1171, 'Hariom', 'nice817411171@nicewebtechnologies.com', 'nice4331171', NULL, '$2y$12$9xsv0eI5MWp/3ICYM0i9TuWuOm4GRIMdW/ZpTHGjjmBqxSPbQLHBO', NULL, '2025-03-09 08:57:33', '2025-03-09 08:57:33', 'student'),
(37, 1174, 'Sameer Ranjan', 'nice998701174@nicewebtechnologies.com', 'nice1421174', NULL, '$2y$12$U53UbgQkWWpfjU.zp6imp.VU13EE7e.fMfukCpq/5DPoF90F/S36i', NULL, '2025-03-09 08:57:33', '2025-03-09 08:57:33', 'student'),
(38, 1065, 'Pooja Sharma', 'nice489211065@nicewebtechnologies.com', 'nice8521065', NULL, '$2y$12$mw5Yed/203kpFQ4qsqz2nupJoBTHlna/n1baIWdc/nBkrABKgFlmy', NULL, '2025-03-09 08:57:33', '2025-03-09 08:57:33', 'student'),
(39, 1126, 'Himanshu', 'nice939961126@nicewebtechnologies.com', 'nice6191126', NULL, '$2y$12$f7aIxvR/DnTxTqfuBmC.tOCgfbF/XZ6tWJB2a7RewqSf/xVWcWhci', NULL, '2025-03-09 08:57:34', '2025-03-09 08:57:34', 'student'),
(40, 1088, 'Purnima', 'nice580281088@nicewebtechnologies.com', 'nice9751088', NULL, '$2y$12$0SOA1Tf72iwr3ujSObZ9Au5i2M7W8SHnPchiHv114zP/v65AkZjVW', NULL, '2025-03-09 08:57:34', '2025-03-09 08:57:34', 'student'),
(41, 1091, 'Khushi', 'nice636681091@nicewebtechnologies.com', 'nice3301091', NULL, '$2y$12$rdL7U6VzF9sOrVMc/PxP8.zKWIY2cPU6MXlU3bvRv1j0EH9FmQU5O', NULL, '2025-03-09 08:57:34', '2025-03-09 08:57:34', 'student'),
(42, 1164, 'Nishant Kumar', 'nice507561164@nicewebtechnologies.com', 'nice2351164', NULL, '$2y$12$iQqpihnLHFcHxLjr2xxhLudp.WRrtMz/pwAqxl8kvAnUI27/PZs72', NULL, '2025-03-09 08:57:34', '2025-03-09 08:57:34', 'student'),
(43, 1141, 'Kavita Mehta', 'nice349131141@nicewebtechnologies.com', 'nice3401141', NULL, '$2y$12$HvEtwjcU.NG/MDnRMJyklONybJBeVUwGBHMUJy5/6rNHhW0tZNnAm', NULL, '2025-03-09 08:57:35', '2025-03-09 08:57:35', 'student'),
(44, 1176, 'Vaishali sahu', 'nice309971176@nicewebtechnologies.com', 'nice4441176', NULL, '$2y$12$KiqERF3rQyNbdb/mNAhEeuPkCQCBu/om4n2DDRexlHx.NNx4ntpYu', NULL, '2025-03-09 08:57:35', '2025-03-09 08:57:35', 'student'),
(45, 1178, 'Pinki', 'nice444031178@nicewebtechnologies.com', 'nice5471178', NULL, '$2y$12$2d7lVwoQXy3iAYPK4S.EpO.I7uCJUJiH4Ns4T.ANRV/FgYnXOKPSC', NULL, '2025-03-09 08:57:35', '2025-03-09 08:57:35', 'student'),
(46, 1179, 'ARMAN HASSAN', 'nice556951179@nicewebtechnologies.com', 'nice5301179', NULL, '$2y$12$D2T9AWhApKTm.lQ8fjdHM.FmFj4.3zy3RkizPAJypvQYKqDSoW2mW', NULL, '2025-03-09 08:57:35', '2025-03-09 08:57:35', 'student'),
(47, 1180, 'Dharmesh', 'nice922741180@nicewebtechnologies.com', 'nice6041180', NULL, '$2y$12$r7fxmvPTtoid2NExjgBvd.XSNyJie1q07lDUwf/Mzlt9iT.SfFFwC', NULL, '2025-03-09 08:57:36', '2025-03-09 08:57:36', 'student'),
(48, 1181, 'Jeet singh', 'nice863511181@nicewebtechnologies.com', 'nice4951181', NULL, '$2y$12$sknSfvphtyMH9kSeVpilbuSJwQ3owZ8BUrsDX9pQtwOe.4FsFID.a', NULL, '2025-03-09 08:57:36', '2025-03-09 08:57:36', 'student'),
(49, 1182, 'Sonam Rathore', 'nice736211182@nicewebtechnologies.com', 'nice6711182', NULL, '$2y$12$bf.qvEeotmK5kT4KZYPmKuLtxHNesBsecSmGeGvnpmkb00AXBL.pi', NULL, '2025-03-09 08:57:36', '2025-03-09 08:57:36', 'student'),
(50, 1183, 'Abhay Parmal', 'nice225751183@nicewebtechnologies.com', 'nice4981183', NULL, '$2y$12$vb7t5lUnfvki2.G7SBJ5zOjVfc6V5rtaApfZ8/hZkX.BFPmUn2zvK', NULL, '2025-03-09 08:57:36', '2025-03-09 08:57:36', 'student'),
(51, 1184, 'Nusrat Parveen', 'nice417011184@nicewebtechnologies.com', 'nice5841184', NULL, '$2y$12$t2nOXEaVj2j8p2JIN886lOqaZVgGbtxxKh2U.CKuqzSlytU8X.oCW', NULL, '2025-03-09 08:57:37', '2025-03-09 08:57:37', 'student'),
(52, 1185, 'Manjeet', 'nice158811185@nicewebtechnologies.com', 'nice2471185', NULL, '$2y$12$9bEhs/DK16qvOw3MFs12hudIWCdI6CDrXOy2RNklmDxHmP1NWJVry', NULL, '2025-03-09 08:57:37', '2025-03-09 08:57:37', 'student'),
(53, 1186, 'Atul', 'nice503301186@nicewebtechnologies.com', 'nice9931186', NULL, '$2y$12$7FroB8FVhDHZOI8bvPKF4eG.vKgK8EBMofzaY1FsMZR3hwSNVVmba', NULL, '2025-03-09 08:57:37', '2025-03-09 08:57:37', 'student'),
(54, 1187, 'Madhavi Sharma', 'nice555331187@nicewebtechnologies.com', 'nice8391187', NULL, '$2y$12$0rcPJ844ac4wzGDpzNaDHui7ME25V2t1f3xHdd5xu9Tl4W.zSkes.', NULL, '2025-03-09 08:57:38', '2025-03-09 08:57:38', 'student'),
(55, 1188, 'Umang Grover', 'nice438561188@nicewebtechnologies.com', 'nice6931188', NULL, '$2y$12$bT/d1L0fFvNQYk40TAcf4ed4zj3Zm.4PEAYeX.EEADcbio4eKg.9i', NULL, '2025-03-09 08:57:38', '2025-03-09 08:57:38', 'student'),
(56, 1073, 'Minakshi Joshi', 'nice145031073@nicewebtechnologies.com', 'nice3611073', NULL, '$2y$12$rS4ns0WzUFSB2T/MbCRE6.Dv0t78S30wotN.70z797bdtQqgykBuu', NULL, '2025-03-09 08:57:38', '2025-03-09 08:57:38', 'student'),
(57, 1190, 'Hardeep Kaur', 'nice331311190@nicewebtechnologies.com', 'nice1771190', NULL, '$2y$12$gmDiaXgMIdZ9tYHN5Vshw.NCxsmE0cuFqyshs9k2tI3cwelPNq69q', NULL, '2025-03-09 08:57:38', '2025-03-09 08:57:38', 'student'),
(58, 1191, 'Mohammad Raza Zaidi', 'nice373321191@nicewebtechnologies.com', 'nice4531191', NULL, '$2y$12$GP4aKBXRhz7XSlhwBt51ZucwGWagV.7TXhm2/0CAejnWUclc/RTWK', NULL, '2025-03-09 08:57:39', '2025-03-09 08:57:39', 'student'),
(59, 1192, 'Anuj', 'nice790591192@nicewebtechnologies.com', 'nice5941192', NULL, '$2y$12$6Zd7zzaYAEDdv8Zb0aqYtev9y5tRHdPcToFo3t6l81.XcXWRNsCbC', NULL, '2025-03-09 08:57:39', '2025-03-09 08:57:39', 'student'),
(60, 1193, 'VANSH DUA', 'nice477271193@nicewebtechnologies.com', 'nice2101193', NULL, '$2y$12$p477aVelP0XQpmkn0kUz0.iXYx2WDYP58vFpDb9oC9Xoc31abxavW', NULL, '2025-03-09 08:57:39', '2025-03-09 08:57:39', 'student'),
(61, 1194, 'Anjali', 'nice964311194@nicewebtechnologies.com', 'nice6351194', NULL, '$2y$12$laPrBN9EHs/rX2F9caO.lOllI/kYiKI6mACs1b2eAE39VXT.VPlsC', NULL, '2025-03-09 08:57:40', '2025-03-09 08:57:40', 'student'),
(62, 1195, 'SHIVANI', 'nice655091195@nicewebtechnologies.com', 'nice8531195', NULL, '$2y$12$d7oCr70FK75X0tUtCZcZVuTp5SaZ8odotsuh4lRgI95bTUOjl83Sm', NULL, '2025-03-09 08:57:40', '2025-03-09 08:57:40', 'student'),
(63, 1196, 'MADHU', 'nice262011196@nicewebtechnologies.com', 'nice5141196', NULL, '$2y$12$vlU7Woq4k0lupZRa/ztpluhQegZiV7OLanSTIJtEEq8h2t3pjSp2O', NULL, '2025-03-09 08:57:40', '2025-03-09 08:57:40', 'student'),
(64, NULL, 'Pushpinder', 'pushpinder@nicewebtechnologies.com', 'pushpinder65743', NULL, '$2y$12$f6.X64QTpRIF8cZ8gkM0TuRw2HgzXKjUjKJzFgAnNEcGTUiPDI6ka', NULL, '2025-03-11 07:00:15', '2025-03-11 07:00:15', 'teacher'),
(65, NULL, 'Muskaan', 'muskaan@nicewebtechnologies.com', 'muskaan52917', NULL, '$2y$12$/r0n0i0W3Tw69mxXZT6qFO4RtxxcSLcL3B6MDIcExySjiaECCIgTi', NULL, '2025-03-12 00:34:13', '2025-03-12 00:34:13', 'teacher'),
(66, NULL, 'Arunima', 'arunima@nicewebtechnologies.com', 'arunima44121', NULL, '$2y$12$4YhFnLdi8C/jsEpu8IQt2u7j8hvABuALQrq9cVCFpZYUkKb1cWx8S', NULL, '2025-03-12 05:00:57', '2025-03-12 05:00:57', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_student_id_foreign` (`student_id`),
  ADD KEY `assignments_added_by_foreign` (`added_by`),
  ADD KEY `assignments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `unique_student_code` (`student_id`,`code`),
  ADD KEY `idx_student_id` (`student_id`),
  ADD KEY `idx_name` (`name`);

--
-- Indexes for table `certificate_types`
--
ALTER TABLE `certificate_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificate_types_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `fee_versions`
--
ALTER TABLE `fee_versions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_student_id` (`student_id`),
  ADD KEY `fk_course_id` (`course_id`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_student_id` (`student_id`);

--
-- Indexes for table `student_fees_status`
--
ALTER TABLE `student_fees_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student_id_unique` (`student_id`),
  ADD KEY `fk_course_id_unique` (`course_id`);

--
-- Indexes for table `student_versions`
--
ALTER TABLE `student_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=852;

--
-- AUTO_INCREMENT for table `certificate_types`
--
ALTER TABLE `certificate_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=675;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `fee_versions`
--
ALTER TABLE `fee_versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `student_fees_status`
--
ALTER TABLE `student_fees_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `student_versions`
--
ALTER TABLE `student_versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fee_versions`
--
ALTER TABLE `fee_versions`
  ADD CONSTRAINT `fee_versions_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `fee_versions_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `fee_versions_ibfk_3` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student_fees_status`
--
ALTER TABLE `student_fees_status`
  ADD CONSTRAINT `fk_course_id_unique` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_student_id_unique` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
