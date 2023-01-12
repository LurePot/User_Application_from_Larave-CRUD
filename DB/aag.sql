-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 07:32 PM
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
-- Database: `aag`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upozila_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cgpa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tdetail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `name`, `email`, `user_id`, `division_id`, `district_id`, `upozila_id`, `address`, `language`, `photo`, `cv`, `exam`, `board`, `year`, `cgpa`, `tname`, `tdetail`, `created_at`, `updated_at`) VALUES
(3, 'Imran Hussain', 'imranislamp@gmail.com', 1, 2, 7, 7, 'Ka-30/1/A, Shahjadpur', 'PHP,C++', '2.jpg', '2_resume_Imran.pdf', 'MA,HSC,BA,SSC', 'DU,BAR,DU,BAR', '2015,2015,2015,2015', '3.47,3.47,3.28,4.63', 'Clab', 'moon', '2022-12-16 10:37:06', '2022-12-16 11:45:49'),
(4, 'Imran Hussain', 'imranislamp@gmail.com', 1, 2, 7, 8, 'Horin Khola, Agathakurpara', 'Java,C++', '4.jpg', '4_Web MD. IMRAN HUSSAIN.pdf', 'MA,BA,HSC', 'DU,CU,BAR', '2020,2017,2015', '3.47,3.28,4.83', 'MMB,IIT', 'OOU,OOU', '2022-12-16 10:44:17', '2022-12-16 10:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', '2022-12-12 13:51:22', '2022-12-12 13:51:22'),
(2, 1, 'Gazipur', '2022-12-12 13:51:46', '2022-12-12 15:38:47'),
(3, 1, 'Kishoreganj', '2022-12-12 13:51:59', '2022-12-12 15:39:03'),
(4, 1, 'Manikganj', '2022-12-12 13:52:13', '2022-12-12 15:39:26'),
(5, 1, 'Narsingdi', '2022-12-12 13:52:38', '2022-12-12 15:40:13'),
(6, 2, 'Barisal', '2022-12-12 13:53:40', '2022-12-12 13:53:40'),
(7, 2, 'Barguna', '2022-12-12 13:54:01', '2022-12-12 13:54:01'),
(8, 2, 'Bhola', '2022-12-12 13:54:21', '2022-12-12 13:54:21'),
(9, 2, 'Potuakhali', '2022-12-12 13:55:07', '2022-12-12 13:55:07'),
(10, 2, 'Pirojpur', '2022-12-12 13:56:18', '2022-12-12 13:56:18'),
(11, 3, 'Khulna', '2022-12-12 13:57:34', '2022-12-12 13:57:34'),
(12, 3, 'Shatkhira', '2022-12-12 13:57:55', '2022-12-12 13:57:55'),
(13, 4, 'Chottogram', '2022-12-12 13:58:22', '2022-12-12 13:58:22'),
(14, 4, 'Comilla', '2022-12-12 13:59:01', '2022-12-12 13:59:01'),
(15, 4, 'Noakhali', '2022-12-12 13:59:23', '2022-12-12 13:59:23'),
(16, 5, 'Rajshahi', '2022-12-12 14:00:43', '2022-12-12 14:00:43'),
(17, 6, 'Rangpur', '2022-12-12 14:00:57', '2022-12-12 14:00:57'),
(18, 7, 'Sylhet', '2022-12-12 14:01:14', '2022-12-12 14:01:14'),
(19, 8, 'Mymensingh', '2022-12-12 14:01:46', '2022-12-12 14:01:46'),
(20, 5, 'Natore', '2022-12-12 15:35:18', '2022-12-12 15:35:18'),
(21, 5, 'Bogura', '2022-12-12 15:35:41', '2022-12-12 15:35:41'),
(22, 7, 'Sunamganj', '2022-12-12 15:36:23', '2022-12-12 15:36:23'),
(23, 7, 'Moulvibazar', '2022-12-12 15:36:46', '2022-12-12 15:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2022-12-12 12:09:06', '2022-12-12 12:09:06'),
(2, 'Barisal', '2022-12-12 12:15:57', '2022-12-12 12:15:57'),
(3, 'Khulna', '2022-12-12 12:19:26', '2022-12-12 12:19:26'),
(4, 'Chattogram', '2022-12-12 12:21:47', '2022-12-12 12:21:47'),
(5, 'Rajshahi', '2022-12-12 12:28:33', '2022-12-12 12:28:33'),
(6, 'Rangpur', '2022-12-12 12:34:19', '2022-12-12 12:34:19'),
(7, 'Sylhet', '2022-12-12 12:35:02', '2022-12-12 12:35:02'),
(8, 'Mymensingh', '2022-12-12 12:35:27', '2022-12-12 12:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `exam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` bigint(20) NOT NULL,
  `cgpa` decimal(3,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_12_12_173554_create_sessions_table', 1),
(7, '2022_12_12_231716_create_divisions_table', 1),
(8, '2022_12_12_231835_create_districts_table', 1),
(9, '2022_12_12_232018_create_upozilas_table', 1),
(10, '2022_12_12_232109_create_applicants_table', 1),
(11, '2022_12_13_155319_create_education_table', 1),
(12, '2022_12_13_155424_create_trainings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('xEjy7wHm9PARvUW0rJwXlRNrs2pFf83o1zkaegwd', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUHFNcUtjRXZZM0c4UlU0YlU1TTNtSzBhTmVXYmFKcUZVaHFHaFBNUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvQUFHL3B1YmxpYy9hcHBsaWNhbnQvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRQUVI5N0p3UlJyT1B4MUVnZjUzOUcuYk1zSi4yejFsVmpabk0uaC9DU3RlQUtYQy80Sm5hLiI7fQ==', 1671215380);

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upozilas`
--

CREATE TABLE `upozilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upozilas`
--

INSERT INTO `upozilas` (`id`, `district_id`, `division_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Gulshan', '2022-12-12 15:40:33', '2022-12-12 15:40:33'),
(2, 1, 1, 'Badda', '2022-12-12 15:40:52', '2022-12-12 15:40:52'),
(3, 1, 1, 'Banani', '2022-12-12 15:41:07', '2022-12-12 15:41:07'),
(4, 6, 2, 'Bakerganj', '2022-12-12 15:41:51', '2022-12-12 15:41:51'),
(5, 6, 2, 'Muladi', '2022-12-12 15:42:41', '2022-12-12 15:42:41'),
(6, 7, 2, 'Amtali', '2022-12-12 15:42:57', '2022-12-12 15:42:57'),
(7, 7, 2, 'Taltoli', '2022-12-12 15:43:16', '2022-12-12 15:43:16'),
(8, 7, 2, 'Barguna', '2022-12-12 15:43:31', '2022-12-12 15:43:31'),
(9, 7, 2, 'Patharghata', '2022-12-12 15:44:53', '2022-12-12 15:44:53'),
(10, 19, 8, 'Gafargaon', '2022-12-12 15:45:37', '2022-12-12 15:45:37');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Imran Hussain', 'imranislamp@gmail.com', NULL, '$2y$10$PQR97JwRRrOPx1Egf539G.bMsJ.2z1lVjZnM.h/CSteAKXC/4Jna.', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-15 12:06:07', '2022-12-15 12:06:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicants_user_id_foreign` (`user_id`),
  ADD KEY `applicants_division_id_foreign` (`division_id`),
  ADD KEY `applicants_district_id_foreign` (`district_id`),
  ADD KEY `applicants_upozila_id_foreign` (`upozila_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_applicant_id_foreign` (`applicant_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `upozilas`
--
ALTER TABLE `upozilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upozilas_district_id_foreign` (`district_id`),
  ADD KEY `upozilas_division_id_foreign` (`division_id`);

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
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upozilas`
--
ALTER TABLE `upozilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applicants_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applicants_upozila_id_foreign` FOREIGN KEY (`upozila_id`) REFERENCES `upozilas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applicants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upozilas`
--
ALTER TABLE `upozilas`
  ADD CONSTRAINT `upozilas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upozilas_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
