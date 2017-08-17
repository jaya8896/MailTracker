-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 08:08 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mail_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(93, '2014_10_12_000000_create_users_table', 1),
(94, '2014_10_12_100000_create_password_resets_table', 1),
(95, '2017_08_09_130211_create_sent_tokens_table', 1),
(96, '2017_08_09_130237_create_opened_tokens_table', 1),
(97, '2017_08_16_143455_create_token_destinations_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `opened_tokens`
--

CREATE TABLE `opened_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `tracker_id` int(10) UNSIGNED NOT NULL,
  `user_ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Other',
  `os` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Other',
  `device` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Other'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opened_tokens`
--

INSERT INTO `opened_tokens` (`id`, `tracker_id`, `user_ip`, `user_agent`, `created_at`, `updated_at`, `browser`, `os`, `device`) VALUES
(1, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 10:38:53', '2017-08-11 10:38:54', 'Other Browser', 'Other OS', 'Other Device'),
(2, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 10:38:53', '2017-08-11 10:38:58', 'Other Browser', 'Other OS', 'Other Device'),
(3, 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 10:39:04', '2017-08-11 10:39:04', 'Other Browser', 'Other OS', 'Other Device'),
(4, 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 10:39:08', '2017-08-11 10:39:08', 'Other Browser', 'Other OS', 'Other Device'),
(5, 15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 10:39:14', '2017-08-11 10:39:14', 'Other Browser', 'Other OS', 'Other Device'),
(6, 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 10:39:19', '2017-08-11 10:39:19', 'Other Browser', 'Other OS', 'Other Device'),
(7, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 10:39:23', '2017-08-11 10:39:23', 'Other Browser', 'Other OS', 'Other Device'),
(8, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 10:53:20', '2017-08-11 10:53:20', 'Other Browser', 'Other OS', 'Other Device'),
(9, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 11:49:25', '2017-08-11 11:49:25', 'Other Browser', 'Other OS', 'Other Device'),
(10, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 11:51:43', '2017-08-11 11:51:43', 'Other Browser', 'Other OS', 'Other Device'),
(11, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 12:02:51', '2017-08-11 12:02:51', 'Other Browser', 'Other OS', 'Other Device'),
(12, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 12:17:55', '2017-08-11 12:17:56', 'Other Browser', 'Other OS', 'Other Device'),
(13, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 12:17:55', '2017-08-11 12:17:57', 'Other Browser', 'Other OS', 'Other Device'),
(14, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:55:20', '2017-08-11 13:55:21', 'Other Browser', 'Other OS', 'Other Device'),
(15, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:55:22', '2017-08-11 13:55:22', 'Other Browser', 'Other OS', 'Other Device'),
(16, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:55:24', '2017-08-11 13:55:24', 'Other Browser', 'Other OS', 'Other Device'),
(17, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:55:24', '2017-08-11 13:55:26', 'Other Browser', 'Other OS', 'Other Device'),
(18, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:03', '2017-08-11 13:56:03', 'Other Browser', 'Other OS', 'Other Device'),
(19, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:04', '2017-08-11 13:56:04', 'Other Browser', 'Other OS', 'Other Device'),
(20, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:05', '2017-08-11 13:56:05', 'Other Browser', 'Other OS', 'Other Device'),
(21, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:06', '2017-08-11 13:56:06', 'Other Browser', 'Other OS', 'Other Device'),
(22, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:07', '2017-08-11 13:56:08', 'Other Browser', 'Other OS', 'Other Device'),
(23, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:08', '2017-08-11 13:56:08', 'Other Browser', 'Other OS', 'Other Device'),
(24, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:25', '2017-08-11 13:56:25', 'Other Browser', 'Other OS', 'Other Device'),
(25, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:26', '2017-08-11 13:56:26', 'Other Browser', 'Other OS', 'Other Device'),
(26, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:27', '2017-08-11 13:56:27', 'Other Browser', 'Other OS', 'Other Device'),
(27, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:28', '2017-08-11 13:56:28', 'Other Browser', 'Other OS', 'Other Device'),
(28, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:29', '2017-08-11 13:56:29', 'Other Browser', 'Other OS', 'Other Device'),
(29, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:29', '2017-08-11 13:56:30', 'Other Browser', 'Other OS', 'Other Device'),
(30, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:29', '2017-08-11 13:56:30', 'Other Browser', 'Other OS', 'Other Device'),
(31, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:56:31', '2017-08-11 13:56:31', 'Other Browser', 'Other OS', 'Other Device'),
(32, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:58:23', '2017-08-11 13:58:23', 'Other Browser', 'Other OS', 'Other Device'),
(33, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:58:24', '2017-08-11 13:58:24', 'Other Browser', 'Other OS', 'Other Device'),
(34, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:58:25', '2017-08-11 13:58:25', 'Other Browser', 'Other OS', 'Other Device'),
(35, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:58:26', '2017-08-11 13:58:26', 'Other Browser', 'Other OS', 'Other Device'),
(36, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:58:27', '2017-08-11 13:58:27', 'Other Browser', 'Other OS', 'Other Device'),
(37, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:58:28', '2017-08-11 13:58:28', 'Other Browser', 'Other OS', 'Other Device'),
(38, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:58:29', '2017-08-11 13:58:29', 'Other Browser', 'Other OS', 'Other Device'),
(40, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 13:58:30', '2017-08-11 13:58:31', 'Other Browser', 'Other OS', 'Other Device'),
(41, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 14:21:27', '2017-08-11 14:21:28', 'Other Browser', 'Other OS', 'Other Device'),
(42, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 14:25:38', '2017-08-11 14:25:38', 'Other Browser', 'Other OS', 'Other Device'),
(43, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 14:25:39', '2017-08-11 14:25:39', 'Other Browser', 'Other OS', 'Other Device'),
(44, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-11 14:25:50', '2017-08-11 14:25:50', 'Other Browser', 'Other OS', 'Other Device'),
(45, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-14 07:31:32', '2017-08-14 07:31:34', 'Other Browser', 'Other OS', 'Other Device'),
(46, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-14 07:49:34', '2017-08-14 07:49:34', 'Other Browser', 'Other OS', 'Other Device'),
(47, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-14 08:59:33', '2017-08-14 08:59:33', 'Other Browser', 'Other OS', 'Other Device'),
(48, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-14 08:59:37', '2017-08-14 08:59:37', 'Other Browser', 'Other OS', 'Other Device'),
(49, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-14 10:15:52', '2017-08-14 10:15:53', 'Other Browser', 'Other OS', 'Other Device'),
(50, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-14 10:25:07', '2017-08-14 10:25:07', 'Other Browser', 'Other OS', 'Other Device'),
(51, 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-14 12:37:47', '2017-08-14 12:37:47', 'Other Browser', 'Other OS', 'Other Device'),
(52, 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-14 12:37:56', '2017-08-14 12:37:56', 'Other Browser', 'Other OS', 'Other Device'),
(53, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 11:10:42', '2017-08-16 11:10:43', 'Other Browser', 'Other OS', 'Other Device'),
(54, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 11:10:46', '2017-08-16 11:10:46', 'Other Browser', 'Other OS', 'Other Device'),
(55, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 11:12:07', '2017-08-16 11:12:07', 'Other Browser', 'Other OS', 'Other Device'),
(56, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 11:12:31', '2017-08-16 11:12:31', 'Other Browser', 'Other OS', 'Other Device'),
(57, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 11:14:52', '2017-08-16 11:14:53', 'Other Browser', 'Other OS', 'Other Device'),
(58, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 11:15:15', '2017-08-16 11:15:15', 'Other Browser', 'Other OS', 'Other Device'),
(59, 24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 11:24:23', '2017-08-16 11:24:23', 'Other Browser', 'Other OS', 'Other Device'),
(60, 26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 11:26:01', '2017-08-16 11:26:02', 'Other Browser', 'Other OS', 'Other Device'),
(61, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 11:46:16', '2017-08-16 11:46:17', 'Other Browser', 'Other OS', 'Other Device'),
(62, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 14:49:47', '2017-08-16 14:49:47', 'Other Browser', 'Other OS', 'Other Device'),
(63, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 14:49:48', '2017-08-16 14:49:48', 'Other Browser', 'Other OS', 'Other Device'),
(64, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 14:49:54', '2017-08-16 14:49:54', 'Other Browser', 'Other OS', 'Other Device'),
(65, 23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 14:50:06', '2017-08-16 14:50:06', 'Other Browser', 'Other OS', 'Other Device'),
(66, 29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 14:54:18', '2017-08-16 14:54:18', 'Other Browser', 'Other OS', 'Other Device'),
(67, 29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-16 14:54:47', '2017-08-16 14:54:47', 'Other Browser', 'Other OS', 'Other Device'),
(68, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 09:36:38', '2017-08-17 09:36:39', 'Other Browser', 'Other OS', 'Other Device'),
(69, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:10:38', '2017-08-17 11:10:38', 'Chrome', 'Windows', 'Desktop'),
(70, 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:10:42', '2017-08-17 11:10:42', 'Chrome', 'Windows', 'Desktop'),
(71, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:10:45', '2017-08-17 11:10:45', 'Chrome', 'Windows', 'Desktop'),
(72, 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:13:12', '2017-08-17 11:13:12', 'Chrome', 'Windows', 'Desktop'),
(73, 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:13:18', '2017-08-17 11:13:18', 'Chrome', 'Windows', 'Desktop'),
(74, 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:13:22', '2017-08-17 11:13:22', 'Chrome', 'Windows', 'Desktop'),
(75, 23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:13:27', '2017-08-17 11:13:27', 'Chrome', 'Windows', 'Desktop'),
(76, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:13:33', '2017-08-17 11:13:33', 'Chrome', 'Windows', 'Desktop'),
(77, 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:15:21', '2017-08-17 11:15:21', 'Chrome', 'Windows', 'Desktop'),
(78, 21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:15:30', '2017-08-17 11:15:30', 'Chrome', 'Windows', 'Desktop'),
(79, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:15:34', '2017-08-17 11:15:34', 'Chrome', 'Windows', 'Desktop'),
(80, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393', '2017-08-17 11:23:51', '2017-08-17 11:23:51', 'Edge', 'Windows', 'Desktop'),
(81, 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393', '2017-08-17 11:24:09', '2017-08-17 11:24:09', 'Edge', 'Windows', 'Desktop'),
(82, 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36 Edge/14.14393', '2017-08-17 11:24:30', '2017-08-17 11:24:30', 'Edge', 'Windows', 'Desktop'),
(83, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:26:29', '2017-08-17 11:26:29', 'Chrome', 'Windows', 'Desktop'),
(84, 22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:26:33', '2017-08-17 11:26:33', 'Chrome', 'Windows', 'Desktop'),
(85, 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:28:13', '2017-08-17 11:28:13', 'Chrome', 'Windows', 'Desktop'),
(86, 9, '122.15.120.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:35:49', '2017-08-17 11:35:49', 'Chrome', 'Windows', 'Desktop'),
(87, 9, '122.15.120.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:37:51', '2017-08-17 11:37:51', 'Chrome', 'Windows', 'Desktop'),
(88, 9, '122.15.120.178', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 11:42:11', '2017-08-17 11:42:11', 'Chrome', 'Android', 'Mobile'),
(89, 9, '2405:204:202d:4908:404c:1494:8452:1a22', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 11:43:00', '2017-08-17 11:43:01', 'Chrome', 'Android', 'Mobile'),
(90, 9, '2405:204:202d:4908:404c:1494:8452:1a22', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 11:44:22', '2017-08-17 11:44:23', 'Chrome', 'Android', 'Mobile'),
(91, 9, '122.15.120.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:47:31', '2017-08-17 11:47:31', 'Chrome', 'Windows', 'Desktop'),
(92, 22, '122.15.120.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 11:47:32', '2017-08-17 11:47:32', 'Chrome', 'Windows', 'Desktop'),
(93, 9, '2405:204:202d:4908:404c:1494:8452:1a22', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 11:55:27', '2017-08-17 11:55:28', 'Chrome', 'Android', 'Mobile'),
(94, 9, '122.15.120.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 12:00:24', '2017-08-17 12:00:24', 'Chrome', 'Windows', 'Desktop'),
(95, 9, '122.15.120.178', 'Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0', '2017-08-17 12:01:30', '2017-08-17 12:01:30', 'Firefox', 'Linux', 'Desktop'),
(96, 9, '2405:204:202d:4908:404c:1494:8452:1a22', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 12:04:22', '2017-08-17 12:04:22', 'Chrome', 'Android', 'Mobile'),
(97, 9, '122.15.120.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 12:21:40', '2017-08-17 12:21:41', 'Chrome', 'Windows', 'Desktop'),
(98, 9, '122.15.120.178', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 12:34:51', '2017-08-17 12:34:51', 'Chrome', 'Android', 'Mobile'),
(99, 9, '122.15.120.178', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 12:38:16', '2017-08-17 12:38:17', 'Chrome', 'Android', 'Mobile'),
(100, 9, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 13:29:07', '2017-08-17 13:29:07', 'Other Browser', 'Other OS', 'Other Device'),
(101, 9, '122.15.120.178', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 13:35:30', '2017-08-17 13:35:30', 'Other Browser', 'Other OS', 'Other Device'),
(102, 9, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 13:35:42', '2017-08-17 13:35:42', 'Other Browser', 'Other OS', 'Other Device'),
(103, 9, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 13:42:24', '2017-08-17 13:42:24', 'Other Browser', 'Other OS', 'Other Device'),
(104, 9, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 13:44:10', '2017-08-17 13:44:10', 'Chrome', 'Other OS', 'Other Device'),
(105, 9, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 13:52:39', '2017-08-17 13:52:40', 'Chrome', 'Windows', 'Desktop'),
(106, 9, '122.15.120.178', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 13:53:16', '2017-08-17 13:53:16', 'Chrome', 'Android', 'Mobile'),
(107, 22, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 13:56:45', '2017-08-17 13:56:45', 'Chrome', 'Windows', 'Desktop'),
(108, 9, '122.15.120.178', 'Mozilla/5.0 (Linux; U; Android 7.0; en-us; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/53.0.2785.146 Mobile Safari/537.36 XiaoMi/MiuiBrowser/8.7.7', '2017-08-17 14:00:26', '2017-08-17 14:00:26', 'Chrome', 'Android', 'Mobile'),
(109, 9, '122.15.120.178', 'UCWEB/2.0 (MIDP-2.0; U; Adr 7.0; en-US; Redmi_Note_4) U2/1.0.0 UCBrowser/10.9.5.983 U2/1.0.0 Mobile', '2017-08-17 14:01:15', '2017-08-17 14:01:15', 'UC', 'Android', 'Mobile'),
(110, 22, '122.15.120.178', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 15:03:36', '2017-08-17 15:03:36', 'Chrome', 'Android', 'Mobile'),
(111, 9, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 15:05:44', '2017-08-17 15:05:44', 'Chrome', 'Windows', 'Desktop'),
(112, 22, '115.114.17.146', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', '2017-08-17 15:05:58', '2017-08-17 15:05:58', 'Safari', 'macOS', 'Desktop'),
(113, 22, '115.114.17.146', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', '2017-08-17 15:06:06', '2017-08-17 15:06:07', 'Safari', 'macOS', 'Desktop'),
(114, 22, '122.15.120.178', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 15:09:31', '2017-08-17 15:09:31', 'Chrome', 'macOS', 'Desktop'),
(115, 9, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 15:25:37', '2017-08-17 15:25:37', 'Chrome', 'Windows', 'Desktop'),
(116, 22, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 15:25:43', '2017-08-17 15:25:44', 'Chrome', 'Windows', 'Desktop'),
(117, 22, '122.15.120.178', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 15:29:26', '2017-08-17 15:29:26', 'Chrome', 'Android', 'Mobile'),
(118, 9, '122.15.120.178', 'UCWEB/2.0 (MIDP-2.0; U; Adr 7.0; en-US; Redmi_Note_4) U2/1.0.0 UCBrowser/10.9.5.983 U2/1.0.0 Mobile', '2017-08-17 15:29:44', '2017-08-17 15:29:44', 'UC', 'Android', 'Mobile'),
(119, 22, '122.15.120.178', 'Mozilla/5.0 (Linux; Android 7.0; Redmi Note 4 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.125 Mobile Safari/537.36', '2017-08-17 15:34:49', '2017-08-17 15:34:49', 'Chrome', 'Android', 'Mobile'),
(120, 9, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 15:46:23', '2017-08-17 15:46:23', 'Chrome', 'Windows', 'Desktop'),
(121, 22, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', '2017-08-17 15:47:07', '2017-08-17 15:47:07', 'Firefox', 'Windows', 'Desktop'),
(122, 9, '122.15.120.178', 'UCWEB/2.0 (MIDP-2.0; U; Adr 7.0; en-US; Redmi_Note_4) U2/1.0.0 UCBrowser/10.9.5.983 U2/1.0.0 Mobile', '2017-08-17 15:47:54', '2017-08-17 15:47:54', 'UC', 'Android', 'Mobile'),
(123, 22, '107.21.253.49', 'Mozilla/5.0 (compatible; Embedly/0.2; +http://support.embed.ly/)', '2017-08-17 15:49:45', '2017-08-17 15:49:45', 'Other Browser', 'Other OS', 'Other Device'),
(124, 22, '122.15.120.178', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 15:49:49', '2017-08-17 15:49:49', 'Chrome', 'Windows', 'Desktop'),
(125, 9, '115.114.59.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '2017-08-17 15:52:28', '2017-08-17 15:52:28', 'Chrome', 'Windows', 'Desktop'),
(126, 9, '122.15.120.178', 'UCWEB/2.0 (MIDP-2.0; U; Adr 7.0; en-US; Redmi_Note_4) U2/1.0.0 UCBrowser/10.9.5.983 U2/1.0.0 Mobile', '2017-08-17 16:41:16', '2017-08-17 16:41:16', 'UC', 'Android', 'Mobile'),
(127, 9, '122.15.120.178', 'UCWEB/2.0 (MIDP-2.0; U; Adr 7.0; en-US; Redmi_Note_4) U2/1.0.0 UCBrowser/10.9.5.983 U2/1.0.0 Mobile', '2017-08-17 16:41:26', '2017-08-17 16:41:26', 'UC', 'Android', 'Mobile'),
(128, 22, '122.15.120.178', 'UCWEB/2.0 (MIDP-2.0; U; Adr 7.0; en-US; Redmi_Note_4) U2/1.0.0 UCBrowser/10.9.5.983 U2/1.0.0 Mobile', '2017-08-17 16:41:34', '2017-08-17 16:41:34', 'UC', 'Android', 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sent_tokens`
--

CREATE TABLE `sent_tokens` (
  `created_by` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `opens` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sent_tokens`
--

INSERT INTO `sent_tokens` (`created_by`, `id`, `opens`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2017-08-11 10:28:16', '2017-08-11 10:28:16'),
(1, 2, 1, '2017-08-11 10:28:25', '2017-08-11 10:39:23'),
(1, 3, 0, '2017-08-11 10:28:27', '2017-08-11 10:28:27'),
(1, 4, 1, '2017-08-11 10:28:28', '2017-08-11 10:39:04'),
(1, 5, 0, '2017-08-11 10:28:30', '2017-08-11 10:28:30'),
(2, 6, 0, '2017-08-11 10:28:40', '2017-08-11 10:28:40'),
(2, 7, 2, '2017-08-11 10:28:42', '2017-08-17 11:13:12'),
(2, 8, 51, '2017-08-11 10:28:43', '2017-08-17 11:24:09'),
(2, 9, 39, '2017-08-11 10:28:45', '2017-08-17 16:41:26'),
(2, 10, 1, '2017-08-11 10:28:46', '2017-08-17 15:51:26'),
(3, 11, 0, '2017-08-11 10:28:54', '2017-08-11 10:28:54'),
(3, 12, 1, '2017-08-11 10:28:55', '2017-08-11 10:39:19'),
(3, 13, 0, '2017-08-11 10:28:58', '2017-08-11 10:28:58'),
(3, 14, 0, '2017-08-11 10:28:59', '2017-08-11 10:28:59'),
(3, 15, 1, '2017-08-11 10:29:01', '2017-08-11 10:39:14'),
(2, 18, 0, '2017-08-14 11:37:31', '2017-08-14 11:37:31'),
(2, 19, 0, '2017-08-14 12:34:46', '2017-08-14 12:34:46'),
(2, 20, 0, '2017-08-14 12:36:09', '2017-08-14 12:36:09'),
(2, 21, 5, '2017-08-14 12:36:19', '2017-08-17 11:15:30'),
(2, 22, 31, '2017-08-16 11:06:58', '2017-08-17 16:41:34'),
(2, 23, 2, '2017-08-16 11:07:45', '2017-08-17 11:13:27'),
(2, 24, 1, '2017-08-16 11:24:07', '2017-08-16 11:24:23'),
(2, 25, 0, '2017-08-16 11:24:57', '2017-08-16 11:24:57'),
(2, 26, 1, '2017-08-16 11:25:40', '2017-08-16 11:26:02'),
(2, 27, 0, '2017-08-16 14:51:15', '2017-08-16 14:51:15'),
(2, 28, 0, '2017-08-16 14:52:01', '2017-08-16 14:52:01'),
(2, 29, 2, '2017-08-16 14:54:01', '2017-08-16 14:54:47'),
(2, 31, 0, '2017-08-17 08:29:51', '2017-08-17 08:29:51'),
(2, 32, 0, '2017-08-17 08:35:38', '2017-08-17 08:35:38'),
(2, 33, 0, '2017-08-17 08:37:09', '2017-08-17 08:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `token_destinations`
--

CREATE TABLE `token_destinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `dest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `token_destinations`
--

INSERT INTO `token_destinations` (`id`, `dest`) VALUES
(22, 'https://www.google.com'),
(23, 'https://www.laracasts.com'),
(29, 'https://www.yahoo.com'),
(31, 'https://www.google.com'),
(32, 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokens_created` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `tokens_created`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'pass1', 5, NULL, '2017-08-11 10:28:30'),
(2, 'user2', 'pass2', 23, NULL, '2017-08-17 08:37:09'),
(3, 'user3', 'pass3', 5, NULL, '2017-08-11 10:29:01'),
(4, 'user4', 'pass4', 0, NULL, NULL),
(5, 'admin', 'admin', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opened_tokens`
--
ALTER TABLE `opened_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opened_tokens_tracker_id_foreign` (`tracker_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sent_tokens`
--
ALTER TABLE `sent_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sent_tokens_created_by_foreign` (`created_by`);

--
-- Indexes for table `token_destinations`
--
ALTER TABLE `token_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `opened_tokens`
--
ALTER TABLE `opened_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `sent_tokens`
--
ALTER TABLE `sent_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `opened_tokens`
--
ALTER TABLE `opened_tokens`
  ADD CONSTRAINT `opened_tokens_tracker_id_foreign` FOREIGN KEY (`tracker_id`) REFERENCES `sent_tokens` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sent_tokens`
--
ALTER TABLE `sent_tokens`
  ADD CONSTRAINT `sent_tokens_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token_destinations`
--
ALTER TABLE `token_destinations`
  ADD CONSTRAINT `token_destinations_id_foreign` FOREIGN KEY (`id`) REFERENCES `sent_tokens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
