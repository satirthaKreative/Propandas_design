-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 02:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propandas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admincategories`
--

CREATE TABLE `admincategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admincategories`
--

INSERT INTO `admincategories` (`id`, `category_name`, `category_title`, `category_description`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Category01', 'QA-Category', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 1, '2020-02-24 03:27:12', '2020-02-24 03:27:12'),
(2, 'Category02', 'QA-Category', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 1, '2020-02-24 03:27:28', '2020-02-24 03:27:28'),
(3, 'Category03', 'QA-Category', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, 1, '2020-03-03 00:56:25', '2020-03-03 00:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `admincateques`
--

CREATE TABLE `admincateques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `option_id` bigint(20) NOT NULL,
  `ques_priority` int(11) NOT NULL DEFAULT 0,
  `next_ques_id` bigint(20) NOT NULL,
  `check_yn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admincateques`
--

INSERT INTO `admincateques` (`id`, `category_id`, `question_id`, `option_id`, `ques_priority`, `next_ques_id`, `check_yn`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, 1, NULL, '2020-02-26 00:21:34', '2020-02-26 00:21:34'),
(2, 1, 1, 0, 0, 3, NULL, '2020-02-26 00:21:50', '2020-02-26 00:21:50'),
(3, 1, 2, 2, 3, 4, NULL, '2020-02-26 00:28:52', '2020-02-26 00:28:52'),
(4, 1, 3, 0, 0, 4, NULL, '2020-02-26 00:29:33', '2020-02-26 00:29:33'),
(5, 1, 4, 4, 1, 1, NULL, '2020-02-26 00:29:49', '2020-02-26 00:29:49'),
(6, 3, 5, 8, 1, 1, NULL, '2020-03-03 00:58:15', '2020-03-03 00:58:15'),
(7, 3, 5, 9, 3, 3, NULL, '2020-03-03 00:58:37', '2020-03-03 00:58:37'),
(8, 3, 5, 10, 2, 4, NULL, '2020-03-03 00:59:02', '2020-03-03 00:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `adminfreelegaldocxes`
--

CREATE TABLE `adminfreelegaldocxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `is_upload` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `uploaded_path` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminfreelegaldocxes`
--

INSERT INTO `adminfreelegaldocxes` (`id`, `cate_id`, `is_upload`, `uploaded_path`, `uploaded_text`, `uploaded_type`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'uploads/file-sample_1MB.doc', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'doc', NULL, NULL),
(2, 3, '1', 'uploads/file-sample_1MB.doc', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'doc', NULL, NULL),
(3, 2, '0', '', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '', NULL, NULL),
(4, 1, '0', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', NULL, NULL),
(5, 2, '0', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', NULL, NULL),
(6, 3, '0', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '', NULL, NULL),
(7, 2, '1', 'uploads/colorful.webp', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'webp', NULL, NULL),
(8, 3, '1', 'uploads/colorful.webp', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'webp', NULL, NULL),
(9, 1, '1', 'uploads/file-sample_100kB.docx', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'docx', NULL, NULL),
(10, 2, '1', 'uploads/file-sample_100kB.docx', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'docx', NULL, NULL),
(11, 3, '1', 'uploads/file-sample_100kB.docx', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'docx', NULL, NULL),
(12, 1, '1', 'uploads/sample1.pdf', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'pdf', NULL, NULL),
(13, 2, '1', 'uploads/sample1.pdf', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'pdf', NULL, NULL),
(14, 3, '1', 'uploads/sample1.pdf', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'pdf', NULL, NULL),
(15, 1, '1', 'uploads/111.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'jpg', NULL, NULL),
(16, 2, '1', 'uploads/111.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'jpg', NULL, NULL),
(17, 3, '1', 'uploads/111.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 'jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adminoptions`
--

CREATE TABLE `adminoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ques_id` bigint(20) NOT NULL,
  `option_label` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminoptions`
--

INSERT INTO `adminoptions` (`id`, `ques_id`, `option_label`, `created_at`, `updated_at`) VALUES
(1, 2, 'opt 01', NULL, NULL),
(2, 2, 'opt 02', NULL, NULL),
(3, 2, 'opt 03', NULL, NULL),
(4, 4, 'option A1', NULL, NULL),
(5, 4, 'option A2', NULL, NULL),
(6, 4, 'option A3', NULL, NULL),
(7, 4, 'option A4', NULL, NULL),
(8, 5, 'dyghdfh', NULL, NULL),
(9, 5, 'ghdfhjdgfj', NULL, NULL),
(10, 5, 'dhdgf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adminquestions`
--

CREATE TABLE `adminquestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_subheading` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminquestions`
--

INSERT INTO `adminquestions` (`id`, `question_name`, `question_type`, `question_description`, `question_subheading`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Question 01', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2020-02-24 03:27:58', '2020-02-24 03:27:58'),
(2, 'Question 02', '5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2020-02-24 03:28:14', '2020-02-24 03:28:14'),
(3, 'Question 03', '3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2020-02-24 03:28:34', '2020-02-24 03:28:34'),
(4, 'Question 04', '4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2020-02-24 03:29:03', '2020-02-24 03:29:03'),
(5, 'Question 06', '3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2020-03-03 00:56:46', '2020-03-03 00:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$j.pzgbAr1sUMV.r5EaYiYexjstxUNN55h1D3aYfmBCTi6ls/.pc82', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country_list`
--

CREATE TABLE `country_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonecode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_list`
--

INSERT INTO `country_list` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', '4', '93', NULL, NULL),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', '8', '355', NULL, NULL),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', '12', '213', NULL, NULL),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', '16', '1684', NULL, NULL),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', '20', '376', NULL, NULL),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', '24', '244', NULL, NULL),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', '660', '1264', NULL, NULL),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', '', '', '0', NULL, NULL),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', '28', '1268', NULL, NULL),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', '32', '54', NULL, NULL),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', '51', '374', NULL, NULL),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', '533', '297', NULL, NULL),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', '36', '61', NULL, NULL),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', '40', '43', NULL, NULL),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', '31', '994', NULL, NULL),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', '44', '1242', NULL, NULL),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', '48', '973', NULL, NULL),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', '50', '880', NULL, NULL),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', '52', '1246', NULL, NULL),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', '112', '375', NULL, NULL),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', '56', '32', NULL, NULL),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', '84', '501', NULL, NULL),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', '204', '229', NULL, NULL),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', '60', '1441', NULL, NULL),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', '64', '975', NULL, NULL),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', '68', '591', NULL, NULL),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', '70', '387', NULL, NULL),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', '72', '267', NULL, NULL),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', '', '', '0', NULL, NULL),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', '76', '55', NULL, NULL),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', '', '', '246', NULL, NULL),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', '96', '673', NULL, NULL),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', '100', '359', NULL, NULL),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', '854', '226', NULL, NULL),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', '108', '257', NULL, NULL),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', '116', '855', NULL, NULL),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', '120', '237', NULL, NULL),
(38, 'CA', 'CANADA', 'Canada', 'CAN', '124', '1', NULL, NULL),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', '132', '238', NULL, NULL),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', '136', '1345', NULL, NULL),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', '140', '236', NULL, NULL),
(42, 'TD', 'CHAD', 'Chad', 'TCD', '148', '235', NULL, NULL),
(43, 'CL', 'CHILE', 'Chile', 'CHL', '152', '56', NULL, NULL),
(44, 'CN', 'CHINA', 'China', 'CHN', '156', '86', NULL, NULL),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', '', '', '61', NULL, NULL),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', '', '', '672', NULL, NULL),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', '170', '57', NULL, NULL),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', '174', '269', NULL, NULL),
(49, 'CG', 'CONGO', 'Congo', 'COG', '178', '242', NULL, NULL),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', '180', '242', NULL, NULL),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', '184', '682', NULL, NULL),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', '188', '506', NULL, NULL),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', '384', '225', NULL, NULL),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', '191', '385', NULL, NULL),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', '192', '53', NULL, NULL),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', '196', '357', NULL, NULL),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', '203', '420', NULL, NULL),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', '208', '45', NULL, NULL),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', '262', '253', NULL, NULL),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', '212', '1767', NULL, NULL),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', '214', '1809', NULL, NULL),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', '218', '593', NULL, NULL),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', '818', '20', NULL, NULL),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', '222', '503', NULL, NULL),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', '226', '240', NULL, NULL),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', '232', '291', NULL, NULL),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', '233', '372', NULL, NULL),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', '231', '251', NULL, NULL),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', '238', '500', NULL, NULL),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', '234', '298', NULL, NULL),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', '242', '679', NULL, NULL),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', '246', '358', NULL, NULL),
(73, 'FR', 'FRANCE', 'France', 'FRA', '250', '33', NULL, NULL),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', '254', '594', NULL, NULL),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', '258', '689', NULL, NULL),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', '', '', '0', NULL, NULL),
(77, 'GA', 'GABON', 'Gabon', 'GAB', '266', '241', NULL, NULL),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', '270', '220', NULL, NULL),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', '268', '995', NULL, NULL),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', '276', '49', NULL, NULL),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', '288', '233', NULL, NULL),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', '292', '350', NULL, NULL),
(83, 'GR', 'GREECE', 'Greece', 'GRC', '300', '30', NULL, NULL),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', '304', '299', NULL, NULL),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', '308', '1473', NULL, NULL),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', '312', '590', NULL, NULL),
(87, 'GU', 'GUAM', 'Guam', 'GUM', '316', '1671', NULL, NULL),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', '320', '502', NULL, NULL),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', '324', '224', NULL, NULL),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', '624', '245', NULL, NULL),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', '328', '592', NULL, NULL),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', '332', '509', NULL, NULL),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', '', '', '0', NULL, NULL),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', '336', '39', NULL, NULL),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', '340', '504', NULL, NULL),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', '344', '852', NULL, NULL),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', '348', '36', NULL, NULL),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', '352', '354', NULL, NULL),
(99, 'IN', 'INDIA', 'India', 'IND', '356', '91', NULL, NULL),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', '360', '62', NULL, NULL),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', '364', '98', NULL, NULL),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', '368', '964', NULL, NULL),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', '372', '353', NULL, NULL),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', '376', '972', NULL, NULL),
(105, 'IT', 'ITALY', 'Italy', 'ITA', '380', '39', NULL, NULL),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', '388', '1876', NULL, NULL),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', '392', '81', NULL, NULL),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', '400', '962', NULL, NULL),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', '398', '7', NULL, NULL),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', '404', '254', NULL, NULL),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', '296', '686', NULL, NULL),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', '408', '850', NULL, NULL),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', '410', '82', NULL, NULL),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', '414', '965', NULL, NULL),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', '417', '996', NULL, NULL),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', '418', '856', NULL, NULL),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', '428', '371', NULL, NULL),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', '422', '961', NULL, NULL),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', '426', '266', NULL, NULL),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', '430', '231', NULL, NULL),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', '434', '218', NULL, NULL),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', '438', '423', NULL, NULL),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', '440', '370', NULL, NULL),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', '442', '352', NULL, NULL),
(125, 'MO', 'MACAO', 'Macao', 'MAC', '446', '853', NULL, NULL),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', '807', '389', NULL, NULL),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', '450', '261', NULL, NULL),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', '454', '265', NULL, NULL),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', '458', '60', NULL, NULL),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', '462', '960', NULL, NULL),
(131, 'ML', 'MALI', 'Mali', 'MLI', '466', '223', NULL, NULL),
(132, 'MT', 'MALTA', 'Malta', 'MLT', '470', '356', NULL, NULL),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', '584', '692', NULL, NULL),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', '474', '596', NULL, NULL),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', '478', '222', NULL, NULL),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', '480', '230', NULL, NULL),
(137, 'YT', 'MAYOTTE', 'Mayotte', '', '', '269', NULL, NULL),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', '484', '52', NULL, NULL),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', '583', '691', NULL, NULL),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', '498', '373', NULL, NULL),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', '492', '377', NULL, NULL),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', '496', '976', NULL, NULL),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', '500', '1664', NULL, NULL),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', '504', '212', NULL, NULL),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', '508', '258', NULL, NULL),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', '104', '95', NULL, NULL),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', '516', '264', NULL, NULL),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', '520', '674', NULL, NULL),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', '524', '977', NULL, NULL),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', '528', '31', NULL, NULL),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', '530', '599', NULL, NULL),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', '540', '687', NULL, NULL),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', '554', '64', NULL, NULL),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', '558', '505', NULL, NULL),
(155, 'NE', 'NIGER', 'Niger', 'NER', '562', '227', NULL, NULL),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', '566', '234', NULL, NULL),
(157, 'NU', 'NIUE', 'Niue', 'NIU', '570', '683', NULL, NULL),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', '574', '672', NULL, NULL),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', '580', '1670', NULL, NULL),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', '578', '47', NULL, NULL),
(161, 'OM', 'OMAN', 'Oman', 'OMN', '512', '968', NULL, NULL),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', '586', '92', NULL, NULL),
(163, 'PW', 'PALAU', 'Palau', 'PLW', '585', '680', NULL, NULL),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', '', '', '970', NULL, NULL),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', '591', '507', NULL, NULL),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', '598', '675', NULL, NULL),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', '600', '595', NULL, NULL),
(168, 'PE', 'PERU', 'Peru', 'PER', '604', '51', NULL, NULL),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', '608', '63', NULL, NULL),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', '612', '0', NULL, NULL),
(171, 'PL', 'POLAND', 'Poland', 'POL', '616', '48', NULL, NULL),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', '620', '351', NULL, NULL),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', '630', '1787', NULL, NULL),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', '634', '974', NULL, NULL),
(175, 'RE', 'REUNION', 'Reunion', 'REU', '638', '262', NULL, NULL),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', '642', '40', NULL, NULL),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', '643', '70', NULL, NULL),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', '646', '250', NULL, NULL),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', '654', '290', NULL, NULL),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', '659', '1869', NULL, NULL),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', '662', '1758', NULL, NULL),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', '666', '508', NULL, NULL),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', '670', '1784', NULL, NULL),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', '882', '684', NULL, NULL),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', '674', '378', NULL, NULL),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', '678', '239', NULL, NULL),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', '682', '966', NULL, NULL),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', '686', '221', NULL, NULL),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', '', '', '381', NULL, NULL),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', '690', '248', NULL, NULL),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', '694', '232', NULL, NULL),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', '702', '65', NULL, NULL),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', '703', '421', NULL, NULL),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', '705', '386', NULL, NULL),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', '90', '677', NULL, NULL),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', '706', '252', NULL, NULL),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', '710', '27', NULL, NULL),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', '', '', '0', NULL, NULL),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', '724', '34', NULL, NULL),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', '144', '94', NULL, NULL),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', '736', '249', NULL, NULL),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', '740', '597', NULL, NULL),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', '744', '47', NULL, NULL),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', '748', '268', NULL, NULL),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', '752', '46', NULL, NULL),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', '756', '41', NULL, NULL),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', '760', '963', NULL, NULL),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', '158', '886', NULL, NULL),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', '762', '992', NULL, NULL),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', '834', '255', NULL, NULL),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', '764', '66', NULL, NULL),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', '', '', '670', NULL, NULL),
(213, 'TG', 'TOGO', 'Togo', 'TGO', '768', '228', NULL, NULL),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', '772', '690', NULL, NULL),
(215, 'TO', 'TONGA', 'Tonga', 'TON', '776', '676', NULL, NULL),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', '780', '1868', NULL, NULL),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', '788', '216', NULL, NULL),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', '792', '90', NULL, NULL),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', '795', '7370', NULL, NULL),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', '796', '1649', NULL, NULL),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', '798', '688', NULL, NULL),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', '800', '256', NULL, NULL),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', '804', '380', NULL, NULL),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', '784', '971', NULL, NULL),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', '826', '44', NULL, NULL),
(226, 'US', 'UNITED STATES', 'United States', 'USA', '840', '1', NULL, NULL),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', '', '', '1', NULL, NULL),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', '858', '598', NULL, NULL),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', '860', '998', NULL, NULL),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', '548', '678', NULL, NULL),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', '862', '58', NULL, NULL),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', '704', '84', NULL, NULL),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', '92', '1284', NULL, NULL),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', '850', '1340', NULL, NULL),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', '876', '681', NULL, NULL),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', '732', '212', NULL, NULL),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', '887', '967', NULL, NULL),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', '894', '260', NULL, NULL),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', '716', '263', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_12_132650_create_admins_table', 2),
(4, '2020_02_17_105422_create_admincategories_table', 3),
(5, '2020_02_19_054011_create_adminquestions_table', 4),
(6, '2020_02_19_093434_alter_questionsubhead_maintble_column', 5),
(7, '2020_02_19_112629_create_adminoptions_table', 6),
(10, '2020_02_21_051027_create_admincateques_table', 7),
(11, '2020_02_24_070432_alter_table_add_column_check', 7),
(12, '2020_02_24_131658_alter_table_ques_modifiy_column', 8),
(13, '2020_02_26_062351_alter_add_tbl_lawyer_data', 9),
(14, '2020_02_26_065002_rename_column_on_auth', 10),
(16, '2020_03_11_110237_create_adminfreelegaldocxes_table', 11),
(17, '2020_03_13_105116_change_data_type_users_table', 12),
(18, '2020_03_16_053531_alter_users_add_column', 13),
(19, '2020_03_16_094518_create_country_table', 14),
(20, '2020_03_16_105101_create_country_table', 15),
(21, '2020_03_16_121802_alter_users_table_password_field_type_nullable', 16),
(22, '2020_03_18_102207_add_column_to_users_table', 17),
(23, '2020_03_18_103613_change_file_format_to_users_table', 18);

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
-- Table structure for table `timezone_list`
--

CREATE TABLE `timezone_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zone_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timezone_list`
--

INSERT INTO `timezone_list` (`id`, `zone_code`, `zone`, `created_at`, `updated_at`) VALUES
(1, 'AD', 'Europe/Andorra', NULL, NULL),
(2, 'AE', 'Asia/Dubai', NULL, NULL),
(3, 'AF', 'Asia/Kabul', NULL, NULL),
(4, 'AG', 'America/Antigua', NULL, NULL),
(5, 'AI', 'America/Anguilla', NULL, NULL),
(6, 'AL', 'Europe/Tirane', NULL, NULL),
(7, 'AM', 'Asia/Yerevan', NULL, NULL),
(8, 'AO', 'Africa/Luanda', NULL, NULL),
(9, 'AQ', 'Antarctica/McMurdo', NULL, NULL),
(10, 'AQ', 'Antarctica/Casey', NULL, NULL),
(11, 'AQ', 'Antarctica/Davis', NULL, NULL),
(12, 'AQ', 'Antarctica/DumontDUrville', NULL, NULL),
(13, 'AQ', 'Antarctica/Mawson', NULL, NULL),
(14, 'AQ', 'Antarctica/Palmer', NULL, NULL),
(15, 'AQ', 'Antarctica/Rothera', NULL, NULL),
(16, 'AQ', 'Antarctica/Syowa', NULL, NULL),
(17, 'AQ', 'Antarctica/Troll', NULL, NULL),
(18, 'AQ', 'Antarctica/Vostok', NULL, NULL),
(19, 'AR', 'America/Argentina/Buenos_Aires', NULL, NULL),
(20, 'AR', 'America/Argentina/Cordoba', NULL, NULL),
(21, 'AR', 'America/Argentina/Salta', NULL, NULL),
(22, 'AR', 'America/Argentina/Jujuy', NULL, NULL),
(23, 'AR', 'America/Argentina/Tucuman', NULL, NULL),
(24, 'AR', 'America/Argentina/Catamarca', NULL, NULL),
(25, 'AR', 'America/Argentina/La_Rioja', NULL, NULL),
(26, 'AR', 'America/Argentina/San_Juan', NULL, NULL),
(27, 'AR', 'America/Argentina/Mendoza', NULL, NULL),
(28, 'AR', 'America/Argentina/San_Luis', NULL, NULL),
(29, 'AR', 'America/Argentina/Rio_Gallegos', NULL, NULL),
(30, 'AR', 'America/Argentina/Ushuaia', NULL, NULL),
(31, 'AS', 'Pacific/Pago_Pago', NULL, NULL),
(32, 'AT', 'Europe/Vienna', NULL, NULL),
(33, 'AU', 'Australia/Lord_Howe', NULL, NULL),
(34, 'AU', 'Antarctica/Macquarie', NULL, NULL),
(35, 'AU', 'Australia/Hobart', NULL, NULL),
(36, 'AU', 'Australia/Currie', NULL, NULL),
(37, 'AU', 'Australia/Melbourne', NULL, NULL),
(38, 'AU', 'Australia/Sydney', NULL, NULL),
(39, 'AU', 'Australia/Broken_Hill', NULL, NULL),
(40, 'AU', 'Australia/Brisbane', NULL, NULL),
(41, 'AU', 'Australia/Lindeman', NULL, NULL),
(42, 'AU', 'Australia/Adelaide', NULL, NULL),
(43, 'AU', 'Australia/Darwin', NULL, NULL),
(44, 'AU', 'Australia/Perth', NULL, NULL),
(45, 'AU', 'Australia/Eucla', NULL, NULL),
(46, 'AW', 'America/Aruba', NULL, NULL),
(47, 'AX', 'Europe/Mariehamn', NULL, NULL),
(48, 'AZ', 'Asia/Baku', NULL, NULL),
(49, 'BA', 'Europe/Sarajevo', NULL, NULL),
(50, 'BB', 'America/Barbados', NULL, NULL),
(51, 'BD', 'Asia/Dhaka', NULL, NULL),
(52, 'BE', 'Europe/Brussels', NULL, NULL),
(53, 'BF', 'Africa/Ouagadougou', NULL, NULL),
(54, 'BG', 'Europe/Sofia', NULL, NULL),
(55, 'BH', 'Asia/Bahrain', NULL, NULL),
(56, 'BI', 'Africa/Bujumbura', NULL, NULL),
(57, 'BJ', 'Africa/Porto-Novo', NULL, NULL),
(58, 'BL', 'America/St_Barthelemy', NULL, NULL),
(59, 'BM', 'Atlantic/Bermuda', NULL, NULL),
(60, 'BN', 'Asia/Brunei', NULL, NULL),
(61, 'BO', 'America/La_Paz', NULL, NULL),
(62, 'BQ', 'America/Kralendijk', NULL, NULL),
(63, 'BR', 'America/Noronha', NULL, NULL),
(64, 'BR', 'America/Belem', NULL, NULL),
(65, 'BR', 'America/Fortaleza', NULL, NULL),
(66, 'BR', 'America/Recife', NULL, NULL),
(67, 'BR', 'America/Araguaina', NULL, NULL),
(68, 'BR', 'America/Maceio', NULL, NULL),
(69, 'BR', 'America/Bahia', NULL, NULL),
(70, 'BR', 'America/Sao_Paulo', NULL, NULL),
(71, 'BR', 'America/Campo_Grande', NULL, NULL),
(72, 'BR', 'America/Cuiaba', NULL, NULL),
(73, 'BR', 'America/Santarem', NULL, NULL),
(74, 'BR', 'America/Porto_Velho', NULL, NULL),
(75, 'BR', 'America/Boa_Vista', NULL, NULL),
(76, 'BR', 'America/Manaus', NULL, NULL),
(77, 'BR', 'America/Eirunepe', NULL, NULL),
(78, 'BR', 'America/Rio_Branco', NULL, NULL),
(79, 'BS', 'America/Nassau', NULL, NULL),
(80, 'BT', 'Asia/Thimphu', NULL, NULL),
(81, 'BW', 'Africa/Gaborone', NULL, NULL),
(82, 'BY', 'Europe/Minsk', NULL, NULL),
(83, 'BZ', 'America/Belize', NULL, NULL),
(84, 'CA', 'America/St_Johns', NULL, NULL),
(85, 'CA', 'America/Halifax', NULL, NULL),
(86, 'CA', 'America/Glace_Bay', NULL, NULL),
(87, 'CA', 'America/Moncton', NULL, NULL),
(88, 'CA', 'America/Goose_Bay', NULL, NULL),
(89, 'CA', 'America/Blanc-Sablon', NULL, NULL),
(90, 'CA', 'America/Toronto', NULL, NULL),
(91, 'CA', 'America/Nipigon', NULL, NULL),
(92, 'CA', 'America/Thunder_Bay', NULL, NULL),
(93, 'CA', 'America/Iqaluit', NULL, NULL),
(94, 'CA', 'America/Pangnirtung', NULL, NULL),
(95, 'CA', 'America/Atikokan', NULL, NULL),
(96, 'CA', 'America/Winnipeg', NULL, NULL),
(97, 'CA', 'America/Rainy_River', NULL, NULL),
(98, 'CA', 'America/Resolute', NULL, NULL),
(99, 'CA', 'America/Rankin_Inlet', NULL, NULL),
(100, 'CA', 'America/Regina', NULL, NULL),
(101, 'CA', 'America/Swift_Current', NULL, NULL),
(102, 'CA', 'America/Edmonton', NULL, NULL),
(103, 'CA', 'America/Cambridge_Bay', NULL, NULL),
(104, 'CA', 'America/Yellowknife', NULL, NULL),
(105, 'CA', 'America/Inuvik', NULL, NULL),
(106, 'CA', 'America/Creston', NULL, NULL),
(107, 'CA', 'America/Dawson_Creek', NULL, NULL),
(108, 'CA', 'America/Fort_Nelson', NULL, NULL),
(109, 'CA', 'America/Vancouver', NULL, NULL),
(110, 'CA', 'America/Whitehorse', NULL, NULL),
(111, 'CA', 'America/Dawson', NULL, NULL),
(112, 'CC', 'Indian/Cocos', NULL, NULL),
(113, 'CD', 'Africa/Kinshasa', NULL, NULL),
(114, 'CD', 'Africa/Lubumbashi', NULL, NULL),
(115, 'CF', 'Africa/Bangui', NULL, NULL),
(116, 'CG', 'Africa/Brazzaville', NULL, NULL),
(117, 'CH', 'Europe/Zurich', NULL, NULL),
(118, 'CI', 'Africa/Abidjan', NULL, NULL),
(119, 'CK', 'Pacific/Rarotonga', NULL, NULL),
(120, 'CL', 'America/Santiago', NULL, NULL),
(121, 'CL', 'America/Punta_Arenas', NULL, NULL),
(122, 'CL', 'Pacific/Easter', NULL, NULL),
(123, 'CM', 'Africa/Douala', NULL, NULL),
(124, 'CN', 'Asia/Shanghai', NULL, NULL),
(125, 'CN', 'Asia/Urumqi', NULL, NULL),
(126, 'CO', 'America/Bogota', NULL, NULL),
(127, 'CR', 'America/Costa_Rica', NULL, NULL),
(128, 'CU', 'America/Havana', NULL, NULL),
(129, 'CV', 'Atlantic/Cape_Verde', NULL, NULL),
(130, 'CW', 'America/Curacao', NULL, NULL),
(131, 'CX', 'Indian/Christmas', NULL, NULL),
(132, 'CY', 'Asia/Nicosia', NULL, NULL),
(133, 'CY', 'Asia/Famagusta', NULL, NULL),
(134, 'CZ', 'Europe/Prague', NULL, NULL),
(135, 'DE', 'Europe/Berlin', NULL, NULL),
(136, 'DE', 'Europe/Busingen', NULL, NULL),
(137, 'DJ', 'Africa/Djibouti', NULL, NULL),
(138, 'DK', 'Europe/Copenhagen', NULL, NULL),
(139, 'DM', 'America/Dominica', NULL, NULL),
(140, 'DO', 'America/Santo_Domingo', NULL, NULL),
(141, 'DZ', 'Africa/Algiers', NULL, NULL),
(142, 'EC', 'America/Guayaquil', NULL, NULL),
(143, 'EC', 'Pacific/Galapagos', NULL, NULL),
(144, 'EE', 'Europe/Tallinn', NULL, NULL),
(145, 'EG', 'Africa/Cairo', NULL, NULL),
(146, 'EH', 'Africa/El_Aaiun', NULL, NULL),
(147, 'ER', 'Africa/Asmara', NULL, NULL),
(148, 'ES', 'Europe/Madrid', NULL, NULL),
(149, 'ES', 'Africa/Ceuta', NULL, NULL),
(150, 'ES', 'Atlantic/Canary', NULL, NULL),
(151, 'ET', 'Africa/Addis_Ababa', NULL, NULL),
(152, 'FI', 'Europe/Helsinki', NULL, NULL),
(153, 'FJ', 'Pacific/Fiji', NULL, NULL),
(154, 'FK', 'Atlantic/Stanley', NULL, NULL),
(155, 'FM', 'Pacific/Chuuk', NULL, NULL),
(156, 'FM', 'Pacific/Pohnpei', NULL, NULL),
(157, 'FM', 'Pacific/Kosrae', NULL, NULL),
(158, 'FO', 'Atlantic/Faroe', NULL, NULL),
(159, 'FR', 'Europe/Paris', NULL, NULL),
(160, 'GA', 'Africa/Libreville', NULL, NULL),
(161, 'GB', 'Europe/London', NULL, NULL),
(162, 'GD', 'America/Grenada', NULL, NULL),
(163, 'GE', 'Asia/Tbilisi', NULL, NULL),
(164, 'GF', 'America/Cayenne', NULL, NULL),
(165, 'GG', 'Europe/Guernsey', NULL, NULL),
(166, 'GH', 'Africa/Accra', NULL, NULL),
(167, 'GI', 'Europe/Gibraltar', NULL, NULL),
(168, 'GL', 'America/Godthab', NULL, NULL),
(169, 'GL', 'America/Danmarkshavn', NULL, NULL),
(170, 'GL', 'America/Scoresbysund', NULL, NULL),
(171, 'GL', 'America/Thule', NULL, NULL),
(172, 'GM', 'Africa/Banjul', NULL, NULL),
(173, 'GN', 'Africa/Conakry', NULL, NULL),
(174, 'GP', 'America/Guadeloupe', NULL, NULL),
(175, 'GQ', 'Africa/Malabo', NULL, NULL),
(176, 'GR', 'Europe/Athens', NULL, NULL),
(177, 'GS', 'Atlantic/South_Georgia', NULL, NULL),
(178, 'GT', 'America/Guatemala', NULL, NULL),
(179, 'GU', 'Pacific/Guam', NULL, NULL),
(180, 'GW', 'Africa/Bissau', NULL, NULL),
(181, 'GY', 'America/Guyana', NULL, NULL),
(182, 'HK', 'Asia/Hong_Kong', NULL, NULL),
(183, 'HN', 'America/Tegucigalpa', NULL, NULL),
(184, 'HR', 'Europe/Zagreb', NULL, NULL),
(185, 'HT', 'America/Port-au-Prince', NULL, NULL),
(186, 'HU', 'Europe/Budapest', NULL, NULL),
(187, 'ID', 'Asia/Jakarta', NULL, NULL),
(188, 'ID', 'Asia/Pontianak', NULL, NULL),
(189, 'ID', 'Asia/Makassar', NULL, NULL),
(190, 'ID', 'Asia/Jayapura', NULL, NULL),
(191, 'IE', 'Europe/Dublin', NULL, NULL),
(192, 'IL', 'Asia/Jerusalem', NULL, NULL),
(193, 'IM', 'Europe/Isle_of_Man', NULL, NULL),
(194, 'IN', 'Asia/Kolkata', NULL, NULL),
(195, 'IO', 'Indian/Chagos', NULL, NULL),
(196, 'IQ', 'Asia/Baghdad', NULL, NULL),
(197, 'IR', 'Asia/Tehran', NULL, NULL),
(198, 'IS', 'Atlantic/Reykjavik', NULL, NULL),
(199, 'IT', 'Europe/Rome', NULL, NULL),
(200, 'JE', 'Europe/Jersey', NULL, NULL),
(201, 'JM', 'America/Jamaica', NULL, NULL),
(202, 'JO', 'Asia/Amman', NULL, NULL),
(203, 'JP', 'Asia/Tokyo', NULL, NULL),
(204, 'KE', 'Africa/Nairobi', NULL, NULL),
(205, 'KG', 'Asia/Bishkek', NULL, NULL),
(206, 'KH', 'Asia/Phnom_Penh', NULL, NULL),
(207, 'KI', 'Pacific/Tarawa', NULL, NULL),
(208, 'KI', 'Pacific/Enderbury', NULL, NULL),
(209, 'KI', 'Pacific/Kiritimati', NULL, NULL),
(210, 'KM', 'Indian/Comoro', NULL, NULL),
(211, 'KN', 'America/St_Kitts', NULL, NULL),
(212, 'KP', 'Asia/Pyongyang', NULL, NULL),
(213, 'KR', 'Asia/Seoul', NULL, NULL),
(214, 'KW', 'Asia/Kuwait', NULL, NULL),
(215, 'KY', 'America/Cayman', NULL, NULL),
(216, 'KZ', 'Asia/Almaty', NULL, NULL),
(217, 'KZ', 'Asia/Qyzylorda', NULL, NULL),
(218, 'KZ', 'Asia/Qostanay', NULL, NULL),
(219, 'KZ', 'Asia/Aqtobe', NULL, NULL),
(220, 'KZ', 'Asia/Aqtau', NULL, NULL),
(221, 'KZ', 'Asia/Atyrau', NULL, NULL),
(222, 'KZ', 'Asia/Oral', NULL, NULL),
(223, 'LA', 'Asia/Vientiane', NULL, NULL),
(224, 'LB', 'Asia/Beirut', NULL, NULL),
(225, 'LC', 'America/St_Lucia', NULL, NULL),
(226, 'LI', 'Europe/Vaduz', NULL, NULL),
(227, 'LK', 'Asia/Colombo', NULL, NULL),
(228, 'LR', 'Africa/Monrovia', NULL, NULL),
(229, 'LS', 'Africa/Maseru', NULL, NULL),
(230, 'LT', 'Europe/Vilnius', NULL, NULL),
(231, 'LU', 'Europe/Luxembourg', NULL, NULL),
(232, 'LV', 'Europe/Riga', NULL, NULL),
(233, 'LY', 'Africa/Tripoli', NULL, NULL),
(234, 'MA', 'Africa/Casablanca', NULL, NULL),
(235, 'MC', 'Europe/Monaco', NULL, NULL),
(236, 'MD', 'Europe/Chisinau', NULL, NULL),
(237, 'ME', 'Europe/Podgorica', NULL, NULL),
(238, 'MF', 'America/Marigot', NULL, NULL),
(239, 'MG', 'Indian/Antananarivo', NULL, NULL),
(240, 'MH', 'Pacific/Majuro', NULL, NULL),
(241, 'MH', 'Pacific/Kwajalein', NULL, NULL),
(242, 'MK', 'Europe/Skopje', NULL, NULL),
(243, 'ML', 'Africa/Bamako', NULL, NULL),
(244, 'MM', 'Asia/Yangon', NULL, NULL),
(245, 'MN', 'Asia/Ulaanbaatar', NULL, NULL),
(246, 'MN', 'Asia/Hovd', NULL, NULL),
(247, 'MN', 'Asia/Choibalsan', NULL, NULL),
(248, 'MO', 'Asia/Macau', NULL, NULL),
(249, 'MP', 'Pacific/Saipan', NULL, NULL),
(250, 'MQ', 'America/Martinique', NULL, NULL),
(251, 'MR', 'Africa/Nouakchott', NULL, NULL),
(252, 'MS', 'America/Montserrat', NULL, NULL),
(253, 'MT', 'Europe/Malta', NULL, NULL),
(254, 'MU', 'Indian/Mauritius', NULL, NULL),
(255, 'MV', 'Indian/Maldives', NULL, NULL),
(256, 'MW', 'Africa/Blantyre', NULL, NULL),
(257, 'MX', 'America/Mexico_City', NULL, NULL),
(258, 'MX', 'America/Cancun', NULL, NULL),
(259, 'MX', 'America/Merida', NULL, NULL),
(260, 'MX', 'America/Monterrey', NULL, NULL),
(261, 'MX', 'America/Matamoros', NULL, NULL),
(262, 'MX', 'America/Mazatlan', NULL, NULL),
(263, 'MX', 'America/Chihuahua', NULL, NULL),
(264, 'MX', 'America/Ojinaga', NULL, NULL),
(265, 'MX', 'America/Hermosillo', NULL, NULL),
(266, 'MX', 'America/Tijuana', NULL, NULL),
(267, 'MX', 'America/Bahia_Banderas', NULL, NULL),
(268, 'MY', 'Asia/Kuala_Lumpur', NULL, NULL),
(269, 'MY', 'Asia/Kuching', NULL, NULL),
(270, 'MZ', 'Africa/Maputo', NULL, NULL),
(271, 'NA', 'Africa/Windhoek', NULL, NULL),
(272, 'NC', 'Pacific/Noumea', NULL, NULL),
(273, 'NE', 'Africa/Niamey', NULL, NULL),
(274, 'NF', 'Pacific/Norfolk', NULL, NULL),
(275, 'NG', 'Africa/Lagos', NULL, NULL),
(276, 'NI', 'America/Managua', NULL, NULL),
(277, 'NL', 'Europe/Amsterdam', NULL, NULL),
(278, 'NO', 'Europe/Oslo', NULL, NULL),
(279, 'NP', 'Asia/Kathmandu', NULL, NULL),
(280, 'NR', 'Pacific/Nauru', NULL, NULL),
(281, 'NU', 'Pacific/Niue', NULL, NULL),
(282, 'NZ', 'Pacific/Auckland', NULL, NULL),
(283, 'NZ', 'Pacific/Chatham', NULL, NULL),
(284, 'OM', 'Asia/Muscat', NULL, NULL),
(285, 'PA', 'America/Panama', NULL, NULL),
(286, 'PE', 'America/Lima', NULL, NULL),
(287, 'PF', 'Pacific/Tahiti', NULL, NULL),
(288, 'PF', 'Pacific/Marquesas', NULL, NULL),
(289, 'PF', 'Pacific/Gambier', NULL, NULL),
(290, 'PG', 'Pacific/Port_Moresby', NULL, NULL),
(291, 'PG', 'Pacific/Bougainville', NULL, NULL),
(292, 'PH', 'Asia/Manila', NULL, NULL),
(293, 'PK', 'Asia/Karachi', NULL, NULL),
(294, 'PL', 'Europe/Warsaw', NULL, NULL),
(295, 'PM', 'America/Miquelon', NULL, NULL),
(296, 'PN', 'Pacific/Pitcairn', NULL, NULL),
(297, 'PR', 'America/Puerto_Rico', NULL, NULL),
(298, 'PS', 'Asia/Gaza', NULL, NULL),
(299, 'PS', 'Asia/Hebron', NULL, NULL),
(300, 'PT', 'Europe/Lisbon', NULL, NULL),
(301, 'PT', 'Atlantic/Madeira', NULL, NULL),
(302, 'PT', 'Atlantic/Azores', NULL, NULL),
(303, 'PW', 'Pacific/Palau', NULL, NULL),
(304, 'PY', 'America/Asuncion', NULL, NULL),
(305, 'QA', 'Asia/Qatar', NULL, NULL),
(306, 'RE', 'Indian/Reunion', NULL, NULL),
(307, 'RO', 'Europe/Bucharest', NULL, NULL),
(308, 'RS', 'Europe/Belgrade', NULL, NULL),
(309, 'RU', 'Europe/Kaliningrad', NULL, NULL),
(310, 'RU', 'Europe/Moscow', NULL, NULL),
(311, 'UA', 'Europe/Simferopol', NULL, NULL),
(312, 'RU', 'Europe/Kirov', NULL, NULL),
(313, 'RU', 'Europe/Astrakhan', NULL, NULL),
(314, 'RU', 'Europe/Volgograd', NULL, NULL),
(315, 'RU', 'Europe/Saratov', NULL, NULL),
(316, 'RU', 'Europe/Ulyanovsk', NULL, NULL),
(317, 'RU', 'Europe/Samara', NULL, NULL),
(318, 'RU', 'Asia/Yekaterinburg', NULL, NULL),
(319, 'RU', 'Asia/Omsk', NULL, NULL),
(320, 'RU', 'Asia/Novosibirsk', NULL, NULL),
(321, 'RU', 'Asia/Barnaul', NULL, NULL),
(322, 'RU', 'Asia/Tomsk', NULL, NULL),
(323, 'RU', 'Asia/Novokuznetsk', NULL, NULL),
(324, 'RU', 'Asia/Krasnoyarsk', NULL, NULL),
(325, 'RU', 'Asia/Irkutsk', NULL, NULL),
(326, 'RU', 'Asia/Chita', NULL, NULL),
(327, 'RU', 'Asia/Yakutsk', NULL, NULL),
(328, 'RU', 'Asia/Khandyga', NULL, NULL),
(329, 'RU', 'Asia/Vladivostok', NULL, NULL),
(330, 'RU', 'Asia/Ust-Nera', NULL, NULL),
(331, 'RU', 'Asia/Magadan', NULL, NULL),
(332, 'RU', 'Asia/Sakhalin', NULL, NULL),
(333, 'RU', 'Asia/Srednekolymsk', NULL, NULL),
(334, 'RU', 'Asia/Kamchatka', NULL, NULL),
(335, 'RU', 'Asia/Anadyr', NULL, NULL),
(336, 'RW', 'Africa/Kigali', NULL, NULL),
(337, 'SA', 'Asia/Riyadh', NULL, NULL),
(338, 'SB', 'Pacific/Guadalcanal', NULL, NULL),
(339, 'SC', 'Indian/Mahe', NULL, NULL),
(340, 'SD', 'Africa/Khartoum', NULL, NULL),
(341, 'SE', 'Europe/Stockholm', NULL, NULL),
(342, 'SG', 'Asia/Singapore', NULL, NULL),
(343, 'SH', 'Atlantic/St_Helena', NULL, NULL),
(344, 'SI', 'Europe/Ljubljana', NULL, NULL),
(345, 'SJ', 'Arctic/Longyearbyen', NULL, NULL),
(346, 'SK', 'Europe/Bratislava', NULL, NULL),
(347, 'SL', 'Africa/Freetown', NULL, NULL),
(348, 'SM', 'Europe/San_Marino', NULL, NULL),
(349, 'SN', 'Africa/Dakar', NULL, NULL),
(350, 'SO', 'Africa/Mogadishu', NULL, NULL),
(351, 'SR', 'America/Paramaribo', NULL, NULL),
(352, 'SS', 'Africa/Juba', NULL, NULL),
(353, 'ST', 'Africa/Sao_Tome', NULL, NULL),
(354, 'SV', 'America/El_Salvador', NULL, NULL),
(355, 'SX', 'America/Lower_Princes', NULL, NULL),
(356, 'SY', 'Asia/Damascus', NULL, NULL),
(357, 'SZ', 'Africa/Mbabane', NULL, NULL),
(358, 'TC', 'America/Grand_Turk', NULL, NULL),
(359, 'TD', 'Africa/Ndjamena', NULL, NULL),
(360, 'TF', 'Indian/Kerguelen', NULL, NULL),
(361, 'TG', 'Africa/Lome', NULL, NULL),
(362, 'TH', 'Asia/Bangkok', NULL, NULL),
(363, 'TJ', 'Asia/Dushanbe', NULL, NULL),
(364, 'TK', 'Pacific/Fakaofo', NULL, NULL),
(365, 'TL', 'Asia/Dili', NULL, NULL),
(366, 'TM', 'Asia/Ashgabat', NULL, NULL),
(367, 'TN', 'Africa/Tunis', NULL, NULL),
(368, 'TO', 'Pacific/Tongatapu', NULL, NULL),
(369, 'TR', 'Europe/Istanbul', NULL, NULL),
(370, 'TT', 'America/Port_of_Spain', NULL, NULL),
(371, 'TV', 'Pacific/Funafuti', NULL, NULL),
(372, 'TW', 'Asia/Taipei', NULL, NULL),
(373, 'TZ', 'Africa/Dar_es_Salaam', NULL, NULL),
(374, 'UA', 'Europe/Kiev', NULL, NULL),
(375, 'UA', 'Europe/Uzhgorod', NULL, NULL),
(376, 'UA', 'Europe/Zaporozhye', NULL, NULL),
(377, 'UG', 'Africa/Kampala', NULL, NULL),
(378, 'UM', 'Pacific/Midway', NULL, NULL),
(379, 'UM', 'Pacific/Wake', NULL, NULL),
(380, 'US', 'America/New_York', NULL, NULL),
(381, 'US', 'America/Detroit', NULL, NULL),
(382, 'US', 'America/Kentucky/Louisville', NULL, NULL),
(383, 'US', 'America/Kentucky/Monticello', NULL, NULL),
(384, 'US', 'America/Indiana/Indianapolis', NULL, NULL),
(385, 'US', 'America/Indiana/Vincennes', NULL, NULL),
(386, 'US', 'America/Indiana/Winamac', NULL, NULL),
(387, 'US', 'America/Indiana/Marengo', NULL, NULL),
(388, 'US', 'America/Indiana/Petersburg', NULL, NULL),
(389, 'US', 'America/Indiana/Vevay', NULL, NULL),
(390, 'US', 'America/Chicago', NULL, NULL),
(391, 'US', 'America/Indiana/Tell_City', NULL, NULL),
(392, 'US', 'America/Indiana/Knox', NULL, NULL),
(393, 'US', 'America/Menominee', NULL, NULL),
(394, 'US', 'America/North_Dakota/Center', NULL, NULL),
(395, 'US', 'America/North_Dakota/New_Salem', NULL, NULL),
(396, 'US', 'America/North_Dakota/Beulah', NULL, NULL),
(397, 'US', 'America/Denver', NULL, NULL),
(398, 'US', 'America/Boise', NULL, NULL),
(399, 'US', 'America/Phoenix', NULL, NULL),
(400, 'US', 'America/Los_Angeles', NULL, NULL),
(401, 'US', 'America/Anchorage', NULL, NULL),
(402, 'US', 'America/Juneau', NULL, NULL),
(403, 'US', 'America/Sitka', NULL, NULL),
(404, 'US', 'America/Metlakatla', NULL, NULL),
(405, 'US', 'America/Yakutat', NULL, NULL),
(406, 'US', 'America/Nome', NULL, NULL),
(407, 'US', 'America/Adak', NULL, NULL),
(408, 'US', 'Pacific/Honolulu', NULL, NULL),
(409, 'UY', 'America/Montevideo', NULL, NULL),
(410, 'UZ', 'Asia/Samarkand', NULL, NULL),
(411, 'UZ', 'Asia/Tashkent', NULL, NULL),
(412, 'VA', 'Europe/Vatican', NULL, NULL),
(413, 'VC', 'America/St_Vincent', NULL, NULL),
(414, 'VE', 'America/Caracas', NULL, NULL),
(415, 'VG', 'America/Tortola', NULL, NULL),
(416, 'VI', 'America/St_Thomas', NULL, NULL),
(417, 'VN', 'Asia/Ho_Chi_Minh', NULL, NULL),
(418, 'VU', 'Pacific/Efate', NULL, NULL),
(419, 'WF', 'Pacific/Wallis', NULL, NULL),
(420, 'WS', 'Pacific/Apia', NULL, NULL),
(421, 'YE', 'Asia/Aden', NULL, NULL),
(422, 'YT', 'Indian/Mayotte', NULL, NULL),
(423, 'ZA', 'Africa/Johannesburg', NULL, NULL),
(424, 'ZM', 'Africa/Lusaka', NULL, NULL),
(425, 'ZW', 'Africa/Harare', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phn_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `law_firm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `law_firm_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_upload` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_lawyer` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `email`, `degree`, `phn_num`, `address1`, `address2`, `city`, `zipcode`, `country`, `timezone`, `law_firm`, `law_firm_address`, `file_upload`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_lawyer`) VALUES
(1, 'Satirtha', 'Das', 'satirtha.kreative@gmail.com', 'Dr.', '7908194389', NULL, NULL, 'Kolkata', '700012', '99', NULL, 'Lawyer', 'Kolkata', 'uploads/lawyer_doc/sample1.pdf', NULL, '$2y$10$o4NqEWHuuI30oky33ao6MOf1BsqTso9d0ENnIcxtkHvklr/E.gCUK', 'ZIT4UXeH7TIamN07kYnO6A1ZpFYcHmWKothoSnf5t8MaScCUHQIf7dWX5mtO', '2020-03-19 02:17:08', '2020-03-19 02:17:08', 1),
(3, 'fgdf', 'dfgd', 'satirtha64@gmail.com', 'rgedf', '7908194389', 'sggdsf', NULL, 'sgs', '735221', '99', '194', NULL, NULL, NULL, NULL, '$2y$10$t.Yh.C6skQJpmw7DuoDcsev7eQ/RmU6BkNxVCEJgr4CEuA/nX4o9a', 'TXkhYneJhHtqc6v7BF1TH0uF9qQ3tuVCC7CpvlXLpq8n3dcuKPFfHkNcNhQh', '2020-03-19 02:21:07', '2020-03-19 02:21:07', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admincategories`
--
ALTER TABLE `admincategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admincateques`
--
ALTER TABLE `admincateques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminfreelegaldocxes`
--
ALTER TABLE `adminfreelegaldocxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminoptions`
--
ALTER TABLE `adminoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminquestions`
--
ALTER TABLE `adminquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `country_list`
--
ALTER TABLE `country_list`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `timezone_list`
--
ALTER TABLE `timezone_list`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admincategories`
--
ALTER TABLE `admincategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admincateques`
--
ALTER TABLE `admincateques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `adminfreelegaldocxes`
--
ALTER TABLE `adminfreelegaldocxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `adminoptions`
--
ALTER TABLE `adminoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `adminquestions`
--
ALTER TABLE `adminquestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_list`
--
ALTER TABLE `country_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `timezone_list`
--
ALTER TABLE `timezone_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
