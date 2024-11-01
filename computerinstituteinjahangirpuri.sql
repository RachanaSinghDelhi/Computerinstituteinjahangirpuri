-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 05:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computerinstituteinjahangirpuri`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_image.jpg',
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_image`, `course_title`, `course_desc`, `course_content`, `created_at`, `updated_at`) VALUES
(56, '66876de717c8a_images1st.jpg', 'Basic Course', 'gjjh', 'hgbh', '2024-04-26 10:55:05', '2024-07-04 22:22:07'),
(57, '662bd55f45a4a_SOFTWARE.jpg', 'Basic Course', 'gjjh', 'hgbh', '2024-04-26 10:55:05', '2024-04-26 10:55:05'),
(58, 'course_image/662bd59582e91_images1st.jpg', 'nb', 'jhghj', 'hghj', '2024-04-26 10:55:57', '2024-04-26 10:55:57'),
(59, '662bd59582e91_images1st.jpg', 'nb', 'jhghj', 'hghj', '2024-04-26 10:55:57', '2024-04-26 10:55:57'),
(60, '662bd5d32f717_Untitled.png', 'nb', 'jk', 'jghj', '2024-04-26 10:56:59', '2024-04-26 10:56:59'),
(66, '662c5be9d8abc_Untitled.png', 'jasjk', 'hbc', 'zbcnxz', '2024-04-26 20:29:05', '2024-04-26 20:29:05'),
(67, '662c67b7ad6e1_Untitled.jpg', 'nb', 'kcjajs', 'csncm', '2024-04-26 21:19:27', '2024-04-26 21:19:27'),
(68, '662c689551fc5_images1st.jpg', 'nb', 'sdfjs', 'mncsd', '2024-04-26 21:23:09', '2024-04-26 21:23:09'),
(69, '662c6af577432_images1st.jpg', 'Basic Course', 'jhsdja', 'asjdh', '2024-04-26 21:33:17', '2024-04-26 21:33:17'),
(70, '662c6b912cbd3_Untitled.jpg', 'jasjk', 'jsfh', 'jshdfj', '2024-04-26 21:35:53', '2024-04-26 21:35:53'),
(71, '662c6c0ad3dbd_SOFTWARE.jpg', 'nb', 'jhjkfhkz', 'mnSNm', '2024-04-26 21:37:54', '2024-04-26 21:37:54'),
(72, '662c6cbb21a15_SOFTWARE.jpg', 'Basic Course', 'jhghj', 'hgh', '2024-04-26 21:40:51', '2024-04-26 21:40:51'),
(73, '662c6dd39d22d_Untitled1.jpg', 'nb', 'hjghjh', 'jghhjg', '2024-04-26 21:45:31', '2024-04-26 21:45:31'),
(74, '662c70386a8f2_SOFTWARE.jpg', 'nb', 'ihk', 'vhbnvn', '2024-04-26 21:55:44', '2024-04-26 21:55:44'),
(75, '662c721876dcc_Untitled.png', 'hgv', 'hjgg', 'ghjgh', '2024-04-26 22:03:44', '2024-04-26 22:03:44'),
(76, '662c727b93bb0_Untitled.png', 'Basic Course', 'zcz', 'zczx', '2024-04-26 22:05:23', '2024-04-26 22:05:23'),
(77, '662c72cd8971a_Untitled.jpg', 'Basic Course', 'SDz', 'AD', '2024-04-26 22:06:45', '2024-04-26 22:06:45'),
(78, '6687716fcb07a_IMG_20230624_132629_1.jpg', 'Basic Course', 'jhghj', 'jhj', '2024-04-26 22:12:14', '2024-07-04 22:37:11'),
(79, '662c745827a48_Untitled.jpg', 'jasjk', 'ghfgfgh', 'hjghg', '2024-04-26 22:13:20', '2024-04-26 22:13:20'),
(80, '662d1d97532b0_nice_web_wishes.png', 'nb', 'kljk', 'mnmb', '2024-04-27 10:15:27', '2024-04-27 10:15:27'),
(81, '662d1de7c50fb_images1st.jpg', 'Basic Course', 'nbnn', 'nbnmb', '2024-04-27 10:16:47', '2024-07-04 22:15:20'),
(82, '66876f6634f93_IMG_20230624_132339.jpg', 'Basic Course .,k', 'Hello world', 'Hello Hello', '2024-05-20 00:17:16', '2024-07-04 22:28:30'),
(83, '66876f9947f5f_IMG_20230624_132343.jpg', 'nb', ',kk', 'm,nm,', '2024-07-04 22:23:14', '2024-07-04 22:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_24_161407_create_courses_table', 2),
(6, '2024_04_24_162313_create_about_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
