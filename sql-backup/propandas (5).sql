-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2020 at 08:49 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propandas`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_image` longtext COLLATE utf8mb4_unicode_ci,
  `about_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `about_image`, `about_title`, `about_description`, `created_at`, `updated_at`) VALUES
(2, 'uploads/about-img/943243big-logo.jpg', 'PROPANDAS MISSION', '<p>We believe that law has to be accessible for everyone. While our world is full of brilliant lawyers, the traditional law firm structure makes it sometimes hardly accessible for many people, especially for small businesses. Many small companies cannot afford to pay hourly rates that are largely composed of overhead costs for inflated law firm structures and are rather interested in a having narrowly defined legal issues resolved in an efficient way. On the other hand, a big part of highly capable lawyers find themselves stuck in the hierarchies of the corporate legalworld with few opportunities for their professional self-fulfillment.</p>\r\n\r\n<p>ProPandas mission is to streamline the process of hiring a lawyer through avoidingcostly law firm structures and digitalizing the way how clients and lawyers canmeet.</p>', NULL, '2020-06-17 11:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `academic_models`
--

CREATE TABLE `academic_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_details` longtext COLLATE utf8mb4_unicode_ci,
  `association_certification` longtext COLLATE utf8mb4_unicode_ci,
  `address_proof` longtext COLLATE utf8mb4_unicode_ci,
  `identity_proof` longtext COLLATE utf8mb4_unicode_ci,
  `law_school_attendance` longtext COLLATE utf8mb4_unicode_ci,
  `other_services` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourly_rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_like` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `law_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` longtext COLLATE utf8mb4_unicode_ci,
  `bank_fname` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_lname` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_bic` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_iban` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_models`
--

INSERT INTO `academic_models` (`id`, `heading`, `academic_details`, `association_certification`, `address_proof`, `identity_proof`, `law_school_attendance`, `other_services`, `hourly_rate`, `work_like`, `law_country`, `languages`, `bank_fname`, `bank_lname`, `bank_bic`, `bank_iban`, `user_id`, `active_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Propandas', 'Propandas details', 'uploads/profile-doc/Pro Pandas Requirements.pdf', 'uploads/profile-doc/Pro Pandas Requirements.pdf', '', 'Attendent1,Attendent2', 'lorem', '31', 'Single Consultation', '1', 'English,Afar,Abkhazian', 'satirtha', 'das', 'BLKI0008', 'BLKI0008', 10, 1, 1, NULL, '2020-06-08 07:46:23'),
(2, 'Propandas', 'Propandas', 'uploads/profile-doc/Pro Pandas Requirements.pdf', 'uploads/profile-doc/Pro Pandas Requirements.pdf', 'uploads/profile-doc/Pro Pandas Requirements.pdf', 'Attendent1,Attendent2', 'test', '89', 'Ongoing Assistance', '1', 'English,Afar', 'Satirtha', 'Das', 'BLKI0008', 'BLKI0008', 35, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admincategories`
--

CREATE TABLE `admincategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admincategories`
--

INSERT INTO `admincategories` (`id`, `category_name`, `category_title`, `category_description`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Startup', 'We need you to complete a very brief questionnaire to make sure we connect you with the right lawyers. This will only take a few minutes.', 'Most clients who post a job receive at least three bids from our network of qualified lawyers.Most clients who post a job receive at least three bids from our network of qualified lawyers.\r\nMost clients who post a job receive at least three bids from our network of qualified lawyers.\r\nMost clients who post a job receive at least three bids from our network of qualified lawyers.\r\nMost clients who post a job receive at least three bids from our network of qualified lawyers.\r\nMost clients who post a job receive at least three bids from our network of qualified lawyers.\r\n', 0, 1, '2020-04-14 13:11:18', '2020-04-14 13:11:18'),
(2, 'Business Structure', 'We need you to complete a very brief questionnaire to make sure we connect you with the right lawyers. This will only take a few minutes.', 'Most clients who post a job receive at least three bids from our network of qualified lawyers.', 0, 1, '2020-04-15 05:06:23', '2020-04-15 05:06:23'),
(3, 'Contracts & Agreements', 'We need you to complete a very brief questionnaire to make sure we connect you with the right lawyers. This will only take a few minutes', 'Most clients who post a job receive at least three bids from our network of qualified lawyers.', 0, 1, '2020-04-15 05:07:09', '2020-04-15 05:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `admincateques`
--

CREATE TABLE `admincateques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `option_id` bigint(20) NOT NULL,
  `ques_priority` int(11) NOT NULL DEFAULT '0',
  `next_ques_id` bigint(20) NOT NULL,
  `check_yn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admincateques`
--

INSERT INTO `admincateques` (`id`, `category_id`, `question_id`, `option_id`, `ques_priority`, `next_ques_id`, `check_yn`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0, 4, NULL, '2020-04-14 13:54:07', '2020-04-14 13:54:07'),
(2, 1, 1, 2, 0, 2, NULL, '2020-04-14 13:54:38', '2020-04-14 13:54:38'),
(3, 1, 1, 3, 0, 4, NULL, '2020-04-14 13:55:05', '2020-04-14 13:55:05'),
(4, 1, 1, 7, 0, 3, NULL, '2020-04-14 13:56:57', '2020-04-14 13:56:57'),
(5, 1, 1, 4, 0, 2, NULL, '2020-04-14 13:57:25', '2020-04-14 13:57:25'),
(6, 1, 1, 5, 0, 2, NULL, '2020-04-14 13:57:48', '2020-04-14 13:57:48'),
(7, 1, 2, 8, 0, 3, NULL, '2020-04-14 13:58:37', '2020-04-14 13:58:37'),
(8, 1, 2, 9, 0, 4, NULL, '2020-04-14 13:58:57', '2020-04-14 13:58:57'),
(9, 1, 2, 10, 0, 4, NULL, '2020-04-14 13:59:31', '2020-04-14 13:59:31'),
(10, 1, 4, 27, 0, 6, NULL, '2020-04-14 14:00:04', '2020-04-14 14:00:04'),
(11, 2, 6, 0, 0, 5, NULL, '2020-04-15 05:17:31', '2020-04-15 05:17:31'),
(12, 3, 6, 0, 0, 7, NULL, '2020-04-15 05:41:12', '2020-04-15 05:41:12'),
(13, 1, 7, 37, 6, 5, NULL, '2020-07-09 01:38:54', '2020-07-09 01:38:54'),
(14, 3, 7, 41, 4, 5, NULL, '2020-07-09 01:40:36', '2020-07-09 01:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `adminfreelegaldocxes`
--

CREATE TABLE `adminfreelegaldocxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `is_upload` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `uploaded_path` longtext COLLATE utf8mb4_unicode_ci,
  `uploaded_text` longtext COLLATE utf8mb4_unicode_ci,
  `uploaded_type` text COLLATE utf8mb4_unicode_ci,
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
(1, 1, 'Business Formation and Structure', NULL, NULL),
(2, 1, 'Contracts or Agreements', NULL, NULL),
(3, 1, 'Employment', NULL, NULL),
(4, 1, 'Trademark', NULL, NULL),
(5, 1, 'Patent', NULL, NULL),
(6, 1, 'Raising Capital', NULL, NULL),
(7, 1, 'Something Else', NULL, NULL),
(8, 2, 'One-Time Project', NULL, NULL),
(9, 2, 'Just a Consultation', NULL, NULL),
(10, 2, 'Ongoing Assistance', NULL, NULL),
(11, 3, 'Advisory Agreement', NULL, NULL),
(12, 3, 'Affiliate Agreement', NULL, NULL),
(13, 3, 'Asset Purchase Agreement', NULL, NULL),
(14, 3, 'Buyout Agreement', NULL, NULL),
(15, 3, 'Commercial Lease', NULL, NULL),
(16, 3, 'Commercial Loan', NULL, NULL),
(17, 3, 'Consulting Agreement', NULL, NULL),
(18, 3, 'Construction Agreement', NULL, NULL),
(19, 3, 'Contractor Agreement', NULL, NULL),
(20, 3, 'Distribution Agreement', NULL, NULL),
(21, 3, 'Employment Agreement', NULL, NULL),
(22, 3, 'Employee Equity Compensation Agreement', NULL, NULL),
(23, 3, 'Employee Severance Agreement', NULL, NULL),
(24, 3, 'Marketing or Advertising Agreement', NULL, NULL),
(25, 3, 'Non-Disclosure Agreement (NDA) for Business Partners', NULL, NULL),
(26, 3, 'SaaS or Software Agreement', NULL, NULL),
(27, 4, 'Change or Restructure an Existing Business', NULL, NULL),
(28, 4, 'Form a New Business', NULL, NULL),
(29, 5, 'Corporation', NULL, NULL),
(30, 5, 'Franchise', NULL, NULL),
(31, 5, 'Joint Venture', NULL, NULL),
(32, 5, 'LLC', NULL, NULL),
(33, 5, 'Non-Profit', NULL, NULL),
(34, 5, 'Partnership', NULL, NULL),
(35, 5, 'Other Type of Entity', NULL, NULL),
(36, 5, 'Not Sure, or Need a Lawyer\'s Help Deciding', NULL, NULL),
(37, 7, 'I am an individual', NULL, NULL),
(38, 7, '1 - 10', NULL, NULL),
(39, 7, '11 - 50', NULL, NULL),
(40, 7, '51 - 200', NULL, NULL),
(41, 7, '201 - 500', NULL, NULL),
(42, 7, '500+', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adminquestions`
--

CREATE TABLE `adminquestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` int(11) NOT NULL,
  `question_description` longtext COLLATE utf8mb4_unicode_ci,
  `question_subheading` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminquestions`
--

INSERT INTO `adminquestions` (`id`, `question_name`, `question_type`, `question_description`, `question_subheading`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What kind of startup assistance do you need?', 4, NULL, NULL, 1, '2020-04-14 13:18:43', '2020-04-14 13:18:43'),
(2, 'Which of the following best describes the type of legal assistance that you need?', 2, NULL, NULL, 1, '2020-04-14 13:23:34', '2020-04-14 13:23:34'),
(3, 'Which agreements would you like to discuss with a lawyer?', 5, NULL, NULL, 1, '2020-04-14 13:26:13', '2020-04-14 13:26:13'),
(4, 'Which of the following best describes your business formation or structure legal need(s)?', 2, NULL, NULL, 1, '2020-04-14 13:32:50', '2020-04-14 13:32:50'),
(5, 'Which type of business do you want to form?', 2, NULL, NULL, 1, '2020-04-14 13:34:54', '2020-04-14 13:34:54'),
(6, 'What will you need an UpCounsel lawyer to do?', 3, 'A good description includes:\r\nUnique details about your project or legal needsProject timeline and expected deliverablesYour budget expectationsSpecific legal expertise or background that you need\r\n Back', 'Please describe your legal needs in a few sentences. Try to include as many details as possible, as this will help us identify the best lawyers for your job.', 1, '2020-04-14 13:42:21', '2020-04-14 13:42:21'),
(7, 'How many employees are in your organization?', 2, NULL, NULL, 1, '2020-04-14 13:46:20', '2020-04-14 13:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_img` longtext COLLATE utf8mb4_unicode_ci,
  `recovery_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `admin_img`, `recovery_email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'uploads/admin/avatar.png', 'satirtha63@gmail.com', NULL, '$2y$10$j.pzgbAr1sUMV.r5EaYiYexjstxUNN55h1D3aYfmBCTi6ls/.pc82', 'BRSS80scodt2Ccr3JAXxdmLMqJ0EBN5RP4gCGQFfDUz1ZD856DYR1BJzlYFI', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner_table`
--

CREATE TABLE `banner_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `top_banner_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_banner_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_description` longtext COLLATE utf8mb4_unicode_ci,
  `banner_images` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_table`
--

INSERT INTO `banner_table` (`id`, `top_banner_title`, `main_banner_title`, `title_description`, `banner_images`, `created_at`, `updated_at`) VALUES
(1, 'Propandas The Digital Way To Get', 'LEGAL WORK DONE', 'ProPandas is the digital way to get your legal work done. Hire a lawyer online. Because the future requires technology.', 'uploads/banner/14710shutterstock_1422488645-min.jpg', '2020-04-23 04:44:41', '2020-04-28 10:43:55'),
(2, 'Propandas The Digital Way To Get', 'LEGAL WORK DONE', 'Get your quote today.', 'uploads/banner/73265shutterstock_1701445213-min.jpg', '2020-04-23 04:47:44', '2020-04-28 10:52:39'),
(3, 'Propandas The Digital Way To Get', 'LEGAL WORK DONE', 'Because hiring a lawyer should be as easy as hailing a ride.', 'uploads/banner/81452banner3.jpg', '2020-04-23 04:55:06', '2020-04-28 10:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `behind_propandas_tbl`
--

CREATE TABLE `behind_propandas_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `behind_propandas_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `behind_propandas_pdetails` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `behind_propandas_tbl`
--

INSERT INTO `behind_propandas_tbl` (`id`, `behind_propandas_images`, `owner_name`, `designation`, `behind_propandas_pdetails`, `created_at`, `updated_at`) VALUES
(1, 'uploads/owner-img/27819owner-1.jpg', 'Daniel Schwarzl', 'Co-Founder', 'Daniel Schwarzl is co-founder of ProPandas and an admitted attorney in New York with experience in technology law, cryptocurrencies and the entertainment industry.Having graduated from Stanford University, Daniel is focused on bridging with technology.', '2020-04-25 12:11:31', '2020-04-25 12:50:20'),
(15, 'uploads/owner-img/85833owner-2.jpg', 'Robin Lumsden', 'Co-Founder', 'Robin Lumsden is co-founder at ProPandas and managing partner of the business law firm Lumsden & Partner with offices in Vienna, New York, and Silicon Valley and an investor to multiple technology companies and founder of a digital asset hedge fund. He completed degrees at the Universities Berkeley and Stanford  and was formerly a professional tennis player.', '2020-04-27 06:06:02', '2020-04-28 09:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `career_tbl`
--

CREATE TABLE `career_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phn_num` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `career_tbl`
--

INSERT INTO `career_tbl` (`id`, `fname`, `lname`, `email`, `phn_num`, `msg`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Raj', 'Das', 'dassatirtha@gmail.com', '8900142003', 'text', 1, '2020-07-07 13:55:53', '2020-07-07 13:55:53'),
(6, 'Raj', 'Das', 'dassatirtha@gmail.com', '8965076558', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 1, '2020-07-08 06:29:35', '2020-07-08 06:29:35'),
(7, 'test', 'test', 'g', 'test', 'test', 1, '2020-09-08 16:51:53', '2020-09-08 16:51:53'),
(8, 'a', 'b', 'g', 'a', 'a', 1, '2020-09-08 16:52:08', '2020-09-08 16:52:08'),
(9, 'a', 'b', 'g', 'a', 'a', 1, '2020-09-08 16:52:28', '2020-09-08 16:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `category_icon_tbls`
--

CREATE TABLE `category_icon_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_icons` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_icon_tbls`
--

INSERT INTO `category_icon_tbls` (`id`, `category_id`, `category_icons`, `created_at`, `updated_at`) VALUES
(1, 1, 'fa-address-book', NULL, NULL),
(2, 3, 'fa-address-book', NULL, NULL),
(3, 2, 'fa-amazon', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_invitation_tbls`
--

CREATE TABLE `chat_invitation_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `project_name` longtext COLLATE utf8mb4_unicode_ci,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `active_or_inActive` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `readable_or` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_invitation_tbls`
--

INSERT INTO `chat_invitation_tbls` (`id`, `project_id`, `project_name`, `sender_id`, `receiver_id`, `active_or_inActive`, `status`, `created_at`, `updated_at`, `readable_or`) VALUES
(1, 1, 'PROPAN125473', 25, 10, 'yes', 1, '2020-08-19 04:31:20', '2020-09-10 13:27:06', 'yes'),
(2, 4, 'PROPAN602267', 25, 35, 'yes', 1, '2020-08-20 01:46:30', '2020-08-20 04:38:35', 'yes'),
(3, 2, 'PROPAN679298', 25, 35, 'no', 1, '2020-08-20 04:16:08', '2020-08-20 04:38:35', 'yes'),
(4, 1, 'PROPAN125473', 25, 35, 'no', 1, '2020-08-20 04:38:07', '2020-08-20 04:39:09', 'yes'),
(6, 2, 'PROPAN679298', 25, 10, 'yes', 1, '2020-08-20 06:09:10', '2020-09-10 13:27:06', 'yes'),
(7, 4, 'PROPAN602267', 25, 10, 'no', 1, '2020-08-20 06:11:38', '2020-09-10 13:27:06', 'yes'),
(8, 1, 'PROPAN125473', 25, 36, 'no', 0, '2020-09-03 07:23:14', '2020-09-03 07:23:14', 'no'),
(9, 6, 'PROPAN224010', 25, 4, 'no', 0, '2020-09-10 13:16:30', '2020-09-10 13:16:30', 'no'),
(10, 6, 'PROPAN224010', 25, 10, 'yes', 0, '2020-09-10 13:17:57', '2020-09-10 13:27:06', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `chat_tbl`
--

CREATE TABLE `chat_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `senderID` bigint(20) NOT NULL,
  `clientID` bigint(20) DEFAULT NULL,
  `projectID` bigint(20) NOT NULL,
  `projectNameID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text_type',
  `msg_content` longtext COLLATE utf8mb4_unicode_ci,
  `size_of_file` double(8,2) DEFAULT NULL,
  `parenID` int(11) NOT NULL DEFAULT '0',
  `chatting_visible_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `activeStatus` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_tbl`
--

INSERT INTO `chat_tbl` (`id`, `senderID`, `clientID`, `projectID`, `projectNameID`, `msg_type`, `msg_content`, `size_of_file`, `parenID`, `chatting_visible_ids`, `status`, `activeStatus`, `created_at`, `updated_at`) VALUES
(1, 10, NULL, 1, 'PROPAN000090', 'txt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, ', NULL, 0, '25,10', 1, 1, '2020-06-11 18:30:00', '2020-06-11 18:30:00'),
(2, 25, NULL, 1, 'PROPAN000090', 'txt', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,', NULL, 0, '25,10', 1, 1, '2020-06-11 18:30:00', '2020-06-11 18:30:00'),
(3, 10, NULL, 1, 'PROPAN000090', 'txt', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ', NULL, 0, '25,10', 1, 1, '2020-06-12 14:34:23', '2020-06-12 14:34:23'),
(4, 10, NULL, 1, 'PROPAN000090', 'txt', 'hi, testing', NULL, 0, '25,10', 1, 1, '2020-06-12 16:04:06', '2020-06-12 16:04:06'),
(5, 10, NULL, 2, 'PROPAN00001', 'txt', 'Hi, first text comments. Thank you', NULL, 0, '25,10', 1, 1, '2020-06-12 16:06:08', '2020-06-12 16:06:08'),
(6, 10, NULL, 2, 'PROPAN00001', 'txt', 'hey, what\'s up??', NULL, 0, '25,10', 1, 1, '2020-06-12 16:36:15', '2020-06-12 16:36:15'),
(7, 25, NULL, 2, 'PROPAN00001', 'txt', 'Hey, I\'m looking for a good lawyer for my case.', NULL, 0, '25,10', 1, 1, '2020-06-12 16:38:16', '2020-06-12 16:38:16'),
(8, 10, NULL, 2, 'PROPAN00001', 'txt', 'yes i know', NULL, 0, '25,10', 1, 1, '2020-06-12 16:39:27', '2020-06-12 16:39:27'),
(9, 10, NULL, 1, 'PROPAN000090', 'txt', 'hi , what happened??', NULL, 0, '25,10', 1, 1, '2020-06-12 16:50:33', '2020-06-12 16:50:33'),
(10, 25, NULL, 1, 'PROPAN000090', 'txt', 'alright', NULL, 1, '25,10', 1, 1, '2020-06-12 16:51:08', '2020-06-12 16:51:08'),
(11, 10, NULL, 1, 'PROPAN000090', 'txt', 'malayam', NULL, 0, '25,10', 1, 1, '2020-06-12 16:52:32', '2020-06-12 16:52:32'),
(12, 10, NULL, 1, 'PROPAN000090', 'txt', 'jio \n', NULL, 0, '25,10', 1, 1, '2020-06-13 00:08:07', '2020-06-13 00:08:07'),
(13, 10, NULL, 2, 'PROPAN00001', 'txt', 'hek', NULL, 0, '25,10', 1, 1, '2020-06-13 03:01:01', '2020-06-13 03:01:01'),
(14, 10, NULL, 1, 'PROPAN000090', 'txt', 'jelays', NULL, 0, '25,10', 1, 1, '2020-06-13 13:11:16', '2020-06-13 13:11:16'),
(15, 10, NULL, 2, 'PROPAN00001', 'txt', 'jio', NULL, 0, '25,10', 1, 1, '2020-06-13 13:13:32', '2020-06-13 13:13:32'),
(16, 10, NULL, 1, 'PROPAN000090', 'txt', 'hello', NULL, 0, '25,10', 1, 1, '2020-06-14 13:18:56', '2020-06-14 13:18:56'),
(17, 10, NULL, 1, 'PROPAN000090', 'txt', 'test', NULL, 0, '25,10', 1, 1, '2020-06-14 14:49:58', '2020-06-14 14:49:58'),
(18, 25, NULL, 1, 'PROPAN000090', 'txt', 'hey lawyer', NULL, 0, '25,10', 1, 1, '2020-06-14 14:51:32', '2020-06-14 14:51:32'),
(19, 10, NULL, 1, 'PROPAN000090', 'txt', 'lemon', NULL, 0, '25,10', 1, 1, '2020-06-14 15:03:39', '2020-06-14 15:03:39'),
(20, 10, NULL, 1, 'PROPAN000090', 'txt', 'lemon', NULL, 0, '25,10', 1, 1, '2020-06-14 15:04:07', '2020-06-14 15:04:07'),
(21, 10, NULL, 1, 'PROPAN000090', 'txt', 'lemon', NULL, 0, '25,10', 1, 1, '2020-06-14 15:04:42', '2020-06-14 15:04:42'),
(22, 25, NULL, 1, 'PROPAN000090', 'txt', 'jio', NULL, 0, '25,10', 1, 1, '2020-06-14 15:05:56', '2020-06-14 15:05:56'),
(23, 10, NULL, 1, 'PROPAN000090', 'txt', 'heavy', NULL, 0, '25,10', 1, 1, '2020-06-14 23:48:14', '2020-06-14 23:48:14'),
(24, 10, NULL, 1, 'PROPAN000090', 'txt', 'maldevis\n', NULL, 0, '25,10', 1, 1, '2020-06-14 23:51:14', '2020-06-14 23:51:14'),
(25, 10, NULL, 1, 'PROPAN000090', 'txt', 'my  new tsets', NULL, 0, '25,10', 1, 1, '2020-06-15 01:09:47', '2020-06-15 01:09:47'),
(26, 10, NULL, 1, 'PROPAN000090', 'txt', 'jio de', NULL, 1, '25,10', 1, 1, '2020-06-15 01:12:38', '2020-06-15 01:12:38'),
(27, 10, NULL, 1, 'PROPAN000090', 'txt', 'level 01', NULL, 0, '25,10,4,19', 1, 1, '2020-06-15 15:24:13', '2020-06-15 15:24:13'),
(28, 10, NULL, 1, 'PROPAN000090', 'txt', 'Doe John', NULL, 0, '25,10,4,19', 1, 1, '2020-06-15 23:25:26', '2020-06-15 23:25:26'),
(29, 10, NULL, 2, 'PROPAN00001', 'txt', 'level 01 upgrade', NULL, 0, '25,10', 1, 1, '2020-06-16 00:27:49', '2020-06-16 00:27:49'),
(30, 10, NULL, 2, 'PROPAN00001', 'txt', 'hi satirtha', NULL, 0, '25,10', 1, 1, '2020-06-16 00:30:14', '2020-06-16 00:30:14'),
(31, 4, NULL, 1, 'PROPAN000090', 'txt', 'level 02 under progress', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:32:15', '2020-06-16 00:32:15'),
(32, 10, NULL, 1, 'PROPAN000090', 'txt', 'testing', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:35:22', '2020-06-16 00:35:22'),
(33, 10, NULL, 1, 'PROPAN000090', 'txt', 'testing', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:35:38', '2020-06-16 00:35:38'),
(34, 4, NULL, 1, 'PROPAN000090', 'txt', 'ground level', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:35:47', '2020-06-16 00:35:47'),
(35, 10, NULL, 1, 'PROPAN000090', 'txt', 'testing', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:35:55', '2020-06-16 00:35:55'),
(36, 10, NULL, 1, 'PROPAN000090', 'txt', 'jiooo', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:37:48', '2020-06-16 00:37:48'),
(37, 4, NULL, 1, 'PROPAN000090', 'txt', '89', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:39:05', '2020-06-16 00:39:05'),
(38, 4, NULL, 1, 'PROPAN000090', 'txt', '9000', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:43:52', '2020-06-16 00:43:52'),
(39, 4, NULL, 1, 'PROPAN000090', 'txt', '9000', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:44:30', '2020-06-16 00:44:30'),
(40, 10, NULL, 1, 'PROPAN000090', 'txt', 'jelay', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 00:45:49', '2020-06-16 00:45:49'),
(41, 4, NULL, 1, 'PROPAN000090', 'txt', 'zeroooo', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 01:03:15', '2020-06-16 01:03:15'),
(42, 10, NULL, 1, 'PROPAN000090', 'txt', 'lamborgini', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 01:03:37', '2020-06-16 01:03:37'),
(43, 4, NULL, 1, 'PROPAN000090', 'txt', 'hey rah', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 01:04:53', '2020-06-16 01:04:53'),
(44, 10, NULL, 1, 'PROPAN000090', 'txt', 'hey are you there??', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 03:32:01', '2020-06-16 03:32:01'),
(45, 10, NULL, 2, 'PROPAN00001', 'txt', 'geometry', NULL, 0, '25,10', 1, 1, '2020-06-16 03:51:40', '2020-06-16 03:51:40'),
(46, 10, NULL, 1, 'PROPAN000090', 'txt', 'jegioig', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 03:52:38', '2020-06-16 03:52:38'),
(47, 4, NULL, 1, 'PROPAN000090', 'txt', 'dekho', NULL, 1, '25,10,4,19', 1, 1, '2020-06-16 03:52:56', '2020-06-16 03:52:56'),
(48, 10, NULL, 1, 'PROPAN000090', 'txt', 'hey', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 09:30:23', '2020-06-16 09:30:23'),
(49, 4, NULL, 1, 'PROPAN000090', 'txt', 'hello', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 09:33:05', '2020-06-16 09:33:05'),
(50, 10, NULL, 1, 'PROPAN000090', 'txt', 'lol', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 09:39:54', '2020-06-16 09:39:54'),
(51, 10, NULL, 1, 'PROPAN000090', 'txt', 'jelai', NULL, 0, '25,10,4,19', 1, 1, '2020-06-16 09:40:40', '2020-06-16 09:40:40'),
(52, 10, NULL, 1, 'PROPAN000090', 'txt', 'lets', NULL, 0, '25,10,4,19', 1, 1, '2020-06-17 13:13:17', '2020-06-17 13:13:17'),
(53, 10, NULL, 1, 'PROPAN000090', 'txt', 'jio', NULL, 0, '25,10,4,19', 1, 1, '2020-06-17 13:32:10', '2020-06-17 13:32:10'),
(54, 10, NULL, 1, 'PROPAN000090', 'txt', 'text', NULL, 1, '25,10,4,19,23,35', 1, 1, '2020-06-19 02:58:30', '2020-06-19 02:58:30'),
(55, 10, NULL, 1, 'PROPAN000090', 'txt', 'hhth', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-19 04:31:31', '2020-06-19 04:31:31'),
(56, 10, NULL, 1, 'PROPAN000090', 'txt', 'test', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-19 08:55:25', '2020-06-19 08:55:25'),
(63, 10, NULL, 1, 'PROPAN000090', 'txt', 'testing ... another value', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-19 15:00:51', '2020-06-19 15:00:51'),
(62, 25, NULL, 1, 'PROPAN000090', 'txt', 'go go..', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-19 14:54:29', '2020-06-19 14:54:29'),
(61, 10, NULL, 1, 'PROPAN000090', 'txt', 'lorem one , testing ', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-19 09:13:23', '2020-06-19 09:13:23'),
(64, 25, NULL, 1, 'PROPAN000090', 'txt', 'jelay', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-19 15:01:47', '2020-06-19 15:01:47'),
(65, 25, NULL, 1, 'PROPAN000090', 'txt', 'joy', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-19 16:43:02', '2020-06-19 16:43:02'),
(66, 25, NULL, 1, 'PROPAN000090', 'txt', 'jerroo', NULL, 1, '25,10,4,19,23,35', 1, 1, '2020-06-19 16:43:17', '2020-06-19 16:43:17'),
(67, 25, NULL, 1, 'PROPAN000090', 'txt', 'hello', NULL, 1, '25,10,4,19,23,35', 1, 1, '2020-06-19 17:22:54', '2020-06-19 17:22:54'),
(68, 25, NULL, 1, 'PROPAN000090', 'txt', 'jio', NULL, 1, '25,10,4,19,23,35', 1, 1, '2020-06-20 14:26:37', '2020-06-20 14:26:37'),
(69, 25, NULL, 2, 'PROPAN00001', 'txt', 'hi', NULL, 30, '25,10', 1, 1, '2020-06-20 15:02:58', '2020-06-20 15:02:58'),
(70, 25, NULL, 2, 'PROPAN00001', 'txt', 'hi', NULL, 30, '25,10', 1, 1, '2020-06-20 15:03:14', '2020-06-20 15:03:14'),
(71, 25, NULL, 1, 'PROPAN000090', 'txt', '78945', NULL, 1, '25,10,4,19,23,35', 1, 1, '2020-06-20 15:03:46', '2020-06-20 15:03:46'),
(72, 25, NULL, 1, 'PROPAN000090', 'txt', 'jeloy', NULL, 4, '25,10,4,19,23,35', 1, 1, '2020-06-20 15:04:58', '2020-06-20 15:04:58'),
(73, 25, NULL, 1, 'PROPAN000090', 'txt', 'lumia', NULL, 63, '25,10,4,19,23,35', 1, 1, '2020-06-20 15:31:03', '2020-06-20 15:31:03'),
(74, 25, NULL, 1, 'PROPAN000090', 'txt', '986lo', NULL, 1, '25,10,4,19,23,35', 1, 1, '2020-06-20 15:58:56', '2020-06-20 15:58:56'),
(75, 25, NULL, 1, 'PROPAN000090', 'txt', '986lo', NULL, 1, '25,10,4,19,23,35', 1, 1, '2020-06-20 15:59:02', '2020-06-20 15:59:02'),
(76, 25, NULL, 2, 'PROPAN00001', 'txt', 'hi', NULL, 29, '25,10', 1, 1, '2020-06-20 17:18:24', '2020-06-20 17:18:24'),
(77, 25, NULL, 2, 'PROPAN00001', 'txt', 'how may I help you?', NULL, 45, '25,10', 1, 1, '2020-06-21 07:41:44', '2020-06-21 07:41:44'),
(78, 25, NULL, 2, 'PROPAN00001', 'txt', 'jieooeoe', NULL, 45, '25,10', 1, 1, '2020-06-21 10:41:03', '2020-06-21 10:41:03'),
(79, 25, NULL, 1, 'PROPAN000090', 'txt', 'ravan', NULL, 65, '25,10,4,19,23,35', 1, 1, '2020-06-21 23:56:50', '2020-06-21 23:56:50'),
(80, 25, NULL, 1, 'PROPAN000090', 'txt', 'le la', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-21 23:57:01', '2020-06-21 23:57:01'),
(81, 25, NULL, 1, 'PROPAN000090', 'txt', 'tesr', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-22 12:21:13', '2020-06-22 12:21:13'),
(82, 25, NULL, 2, 'PROPAN00001', 'pdf', 'uploads/chat/main/13120Pro Pandas Requirements.pdf', NULL, 0, '25,10', 1, 1, '2020-06-22 14:58:11', '2020-06-22 14:58:11'),
(83, 25, NULL, 2, 'PROPAN00001', 'txt', 'hii', NULL, 82, '25,10', 1, 1, '2020-06-22 14:59:47', '2020-06-22 14:59:47'),
(84, 25, NULL, 2, 'PROPAN00001', 'docx', 'uploads/chat/main/48618TCGTester Feedback 05312020.docx', NULL, 0, '25,10', 1, 1, '2020-06-22 15:02:57', '2020-06-22 15:02:57'),
(85, 25, NULL, 2, 'PROPAN00001', 'png', 'uploads/chat/main/48916screencapture-localhost-8000-how-it-works-1-2020-05-26-20_01_43.png', NULL, 0, '25,10', 1, 1, '2020-06-22 15:03:53', '2020-06-22 15:03:53'),
(86, 25, NULL, 1, 'PROPAN000090', 'txt', 'jio', NULL, 65, '25,10,4,19,23,35', 1, 1, '2020-06-23 02:59:27', '2020-06-23 02:59:27'),
(87, 25, NULL, 1, 'PROPAN000090', 'pdf', 'uploads/chat/main/25256AmazonGiftReceipt (2).pdf', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-23 03:26:11', '2020-06-23 03:26:11'),
(88, 25, NULL, 2, 'PROPAN00001', 'pdf', 'uploads/chat/reply/67378AmazonGiftReceipt.pdf', NULL, 15, '25,10', 1, 1, '2020-06-23 03:34:52', '2020-06-23 03:34:52'),
(89, 25, NULL, 1, 'PROPAN000090', 'pdf', 'uploads/chat/main/97987AmazonGiftReceipt (2).pdf', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-24 03:35:19', '2020-06-24 03:35:19'),
(90, 25, NULL, 1, 'PROPAN000090', 'pdf', 'uploads/chat/main/83332AmazonGiftReceipt (2).pdf', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-24 03:37:39', '2020-06-24 03:37:39'),
(91, 25, NULL, 1, 'PROPAN000090', 'docx', 'uploads/chat/main/3722048618TCGTester Feedback 05312020 (8).docx', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-24 03:39:55', '2020-06-24 03:39:55'),
(92, 25, NULL, 1, 'PROPAN000090', 'docx', 'uploads/chat/main/6159648618TCGTester Feedback 05312020 (8).docx', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-24 03:52:39', '2020-06-24 03:52:39'),
(93, 25, NULL, 1, 'PROPAN000090', 'pdf', 'uploads/chat/main/18099AmazonGiftReceipt.pdf', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-24 08:09:37', '2020-06-24 08:09:37'),
(94, 25, NULL, 1, 'PROPAN000090', 'docx', 'uploads/chat/main/5234448618TCGTester Feedback 05312020 (7).docx', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-24 12:32:17', '2020-06-24 12:32:17'),
(95, 25, NULL, 1, 'PROPAN000090', 'pdf', 'uploads/chat/main/98355AmazonGiftReceipt (1).pdf', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-24 13:06:28', '2020-06-24 13:06:28'),
(96, 25, NULL, 1, 'PROPAN000090', 'docx', 'uploads/chat/main/937793722048618TCGTester Feedback 05312020 (8) (1).docx', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-24 13:07:17', '2020-06-24 13:07:17'),
(97, 25, NULL, 1, 'PROPAN000090', 'pdf', 'uploads/chat/main/85745AmazonGiftReceipt.pdf', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-25 00:42:29', '2020-06-25 00:42:29'),
(98, 25, NULL, 1, 'PROPAN000090', 'pdf', 'uploads/chat/main/88168AmazonGiftReceipt (2).pdf', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-25 00:43:48', '2020-06-25 00:43:48'),
(99, 25, NULL, 1, 'PROPAN000090', 'pdf', 'uploads/chat/main/74765AmazonGiftReceipt (2).pdf', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-25 00:46:31', '2020-06-25 00:46:31'),
(100, 25, NULL, 1, 'PROPAN000090', 'pdf', 'uploads/chat/main/51119AmazonGiftReceipt (1).pdf', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-25 08:23:23', '2020-06-25 08:23:23'),
(101, 25, NULL, 3, 'PROPAN409429', 'txt', 'hi', NULL, 0, '25,10', 1, 1, '2020-06-29 12:21:31', '2020-06-29 12:21:31'),
(102, 25, NULL, 1, 'PROPAN000090', 'txt', 'hi', NULL, 0, '25,10,4,19,23,35', 1, 1, '2020-06-29 12:22:33', '2020-06-29 12:22:33'),
(103, 25, NULL, 3, 'PROPAN409429', 'txt', 'jio', NULL, 0, '25,10', 1, 1, '2020-06-29 12:22:56', '2020-06-29 12:22:56'),
(104, 25, NULL, 3, 'PROPAN409429', 'txt', 'hhhh', NULL, 0, '25,10', 1, 1, '2020-07-20 08:25:14', '2020-07-20 08:25:14'),
(105, 10, NULL, 1, 'PROPAN125473', 'txt', 'khg', NULL, 0, '10,25', 1, 1, '2020-08-05 14:40:46', '2020-08-05 14:40:46'),
(106, 10, NULL, 1, 'PROPAN125473', 'txt', 'hi', NULL, 105, '10,25', 1, 1, '2020-08-05 14:41:53', '2020-08-05 14:41:53'),
(107, 10, NULL, 1, 'PROPAN125473', 'txt', 'hey', NULL, 105, '10,25', 1, 1, '2020-08-05 14:42:13', '2020-08-05 14:42:13'),
(108, 25, NULL, 1, 'PROPAN125473', 'txt', 'fvjvwf', NULL, 0, '10,25', 1, 1, '2020-08-05 16:25:03', '2020-08-05 16:25:03'),
(109, 10, NULL, 1, 'PROPAN125473', 'txt', 'hi', NULL, 0, '10,25', 1, 1, '2020-08-05 16:26:44', '2020-08-05 16:26:44'),
(110, 25, NULL, 1, 'PROPAN125473', 'txt', 'hello', NULL, 0, '10,25', 1, 1, '2020-08-05 16:27:21', '2020-08-05 16:27:21'),
(111, 25, NULL, 1, 'PROPAN125473', 'txt', 'hello', NULL, 0, '10,25', 1, 1, '2020-08-05 16:27:34', '2020-08-05 16:27:34'),
(112, 10, NULL, 1, 'PROPAN125473', 'txt', 'nsuvbdiuf', NULL, 109, '10,25', 1, 1, '2020-08-06 01:45:46', '2020-08-06 01:45:46'),
(113, 25, NULL, 3, 'PROPAN766250', 'txt', 'hi', NULL, 0, '10,25', 1, 1, '2020-08-10 07:25:46', '2020-08-10 07:25:46'),
(114, 10, NULL, 3, 'PROPAN766250', 'txt', 'jio', NULL, 0, '10,25', 1, 1, '2020-08-10 07:26:11', '2020-08-10 07:26:11'),
(115, 23, NULL, 2, 'PROPAN679298', 'txt', 'hi', NULL, 0, '23,25', 1, 1, '2020-08-12 07:41:51', '2020-08-12 07:41:51'),
(116, 23, NULL, 2, 'PROPAN679298', 'txt', 'jio', NULL, 0, '23,25', 1, 1, '2020-08-12 07:42:01', '2020-08-12 07:42:01'),
(117, 25, NULL, 2, 'PROPAN679298', 'txt', 'bgibdbgb', NULL, 0, '23,25', 1, 1, '2020-08-12 07:45:32', '2020-08-12 07:45:32'),
(118, 25, NULL, 2, 'PROPAN679298', 'txt', ' bsbfbsb', NULL, 0, '23,25', 1, 1, '2020-08-12 07:45:44', '2020-08-12 07:45:44'),
(119, 23, NULL, 2, 'PROPAN679298', 'txt', 'bfkjfbvgbe', NULL, 0, '23,25', 1, 1, '2020-08-12 07:46:37', '2020-08-12 07:46:37'),
(120, 23, NULL, 2, 'PROPAN679298', 'txt', 'vkfworf', NULL, 0, '23,25', 1, 1, '2020-08-12 07:46:58', '2020-08-12 07:46:58'),
(121, 25, NULL, 1, 'PROPAN125473', 'txt', 'hey sat h', NULL, 0, '10,25', 1, 1, '2020-08-29 09:44:10', '2020-08-29 09:44:10'),
(122, 10, NULL, 1, 'PROPAN125473', 'txt', 'test', NULL, 121, '10,25', 1, 1, '2020-08-29 09:45:08', '2020-08-29 09:45:08'),
(123, 25, NULL, 5, 'PROPAN224010', 'txt', 'neobe', NULL, 0, '10,25', 1, 1, '2020-08-31 01:40:00', '2020-08-31 01:40:00'),
(124, 25, NULL, 5, 'PROPAN224010', 'txt', 'neobe', NULL, 0, '10,25', 1, 1, '2020-08-31 01:40:15', '2020-08-31 01:40:15'),
(125, 25, NULL, 5, 'PROPAN224010', 'txt', 'neobe', NULL, 0, '10,25', 1, 1, '2020-08-31 01:40:35', '2020-08-31 01:40:35'),
(126, 25, NULL, 5, 'PROPAN224010', 'txt', 'neobe', NULL, 0, '10,25', 1, 1, '2020-08-31 01:40:36', '2020-08-31 01:40:36'),
(127, 25, NULL, 5, 'PROPAN224010', 'txt', 'hi', NULL, 0, '10,25', 1, 1, '2020-08-31 01:42:06', '2020-08-31 01:42:06'),
(128, 25, NULL, 5, 'PROPAN224010', 'txt', 'bgeiog', NULL, 0, '10,25', 1, 1, '2020-08-31 01:44:27', '2020-08-31 01:44:27'),
(129, 10, NULL, 5, 'PROPAN224010', 'txt', 'vgrg;o;', NULL, 0, '10,25', 1, 1, '2020-08-31 01:47:56', '2020-08-31 01:47:56'),
(130, 10, NULL, 1, 'PROPAN125473', 'txt', 'jo', NULL, 0, '10,25', 1, 1, '2020-08-31 01:50:45', '2020-08-31 01:50:45'),
(131, 25, NULL, 5, 'PROPAN224010', 'txt', 'hi', NULL, 0, '10,25', 1, 1, '2020-08-31 07:10:52', '2020-08-31 07:10:52'),
(132, 10, NULL, 5, 'PROPAN224010', 'txt', 'hey', NULL, 0, '10,25', 1, 1, '2020-08-31 07:11:24', '2020-08-31 07:11:24'),
(133, 25, NULL, 5, 'PROPAN224010', 'txt', 'jio testing. Hey data', NULL, 129, '10,25', 1, 1, '2020-08-31 07:12:02', '2020-08-31 07:12:02'),
(134, 25, NULL, 5, 'PROPAN224010', 'txt', 'Loram Maintenance of Way, Inc. is a railroad maintenance equipment and services provider. Loram provides track maintenance services to freight, passenger, and transit railroads worldwide, as well as sells and leases equipment which performs these functions.', NULL, 0, '10,25', 1, 1, '2020-08-31 07:12:55', '2020-08-31 07:12:55'),
(135, 10, NULL, 5, 'PROPAN224010', 'txt', 'hey what\'s the update?\n', NULL, 0, '10,25', 1, 1, '2020-08-31 07:13:39', '2020-08-31 07:13:39'),
(136, 25, NULL, 5, 'PROPAN224010', 'txt', 'it\'s good', NULL, 135, '10,25', 1, 1, '2020-08-31 07:14:29', '2020-08-31 07:14:29'),
(137, 10, NULL, 5, 'PROPAN224010', 'txt', 'okz.. cool!!!!', NULL, 135, '10,25', 1, 1, '2020-08-31 07:15:00', '2020-08-31 07:15:00'),
(138, 10, NULL, 5, 'PROPAN224010', 'txt', 'Loram Maintenance of Way, Inc. is a railroad maintenance equipment and services provider. Loram provides track maintenance services to freight, passenger, and transit railroads worldwide, as well as sells and leases equipment which performs these functions.', NULL, 135, '10,25', 1, 1, '2020-08-31 07:17:05', '2020-08-31 07:17:05'),
(139, 25, NULL, 5, 'PROPAN224010', 'txt', 'test', NULL, 0, '10,25', 1, 1, '2020-09-03 00:39:17', '2020-09-03 00:39:17'),
(140, 25, NULL, 1, 'PROPAN125473', 'txt', 'rrr', NULL, 0, '10,25', 1, 1, '2020-09-03 04:06:45', '2020-09-03 04:06:45'),
(141, 25, NULL, 1, 'PROPAN125473', 'txt', 'jio', NULL, 0, '10,25', 1, 1, '2020-09-03 04:29:02', '2020-09-03 04:29:02'),
(142, 25, NULL, 1, 'PROPAN125473', 'txt', 'jelay', NULL, 0, '10,25', 1, 1, '2020-09-03 05:10:02', '2020-09-03 05:10:02'),
(143, 25, NULL, 1, 'PROPAN125473', 'txt', ' vj', NULL, 0, '10,25', 1, 1, '2020-09-03 05:10:09', '2020-09-03 05:10:09'),
(144, 25, NULL, 1, 'PROPAN125473', 'txt', 'bkkbkbg', NULL, 0, '10,25', 1, 1, '2020-09-03 05:19:01', '2020-09-03 05:19:01'),
(145, 25, NULL, 5, 'PROPAN224010', 'txt', 'jhihi', NULL, 0, '10,25', 1, 1, '2020-09-03 05:32:00', '2020-09-03 05:32:00'),
(146, 25, NULL, 5, 'PROPAN224010', 'txt', 'gkmg', NULL, 145, '10,25', 1, 1, '2020-09-03 05:32:13', '2020-09-03 05:32:13'),
(147, 25, NULL, 5, 'PROPAN224010', 'txt', 'mfm', NULL, 0, '10,25', 1, 1, '2020-09-03 05:41:07', '2020-09-03 05:41:07'),
(148, 23, NULL, 2, 'PROPAN679298', 'txt', 'testing', NULL, 0, '23,25,10', 1, 1, '2020-09-03 05:44:02', '2020-09-03 05:44:02'),
(149, 25, NULL, 5, 'PROPAN224010', 'txt', 'testing...', NULL, 0, '10,25', 1, 1, '2020-09-03 05:49:07', '2020-09-03 05:49:07'),
(150, 25, NULL, 5, 'PROPAN224010', 'txt', 'bvjkbdv', NULL, 145, '10,25', 1, 1, '2020-09-03 05:50:00', '2020-09-03 05:50:00'),
(151, 25, NULL, 5, 'PROPAN224010', 'txt', 'bvjkbdv', NULL, 145, '10,25', 1, 1, '2020-09-03 05:50:03', '2020-09-03 05:50:03'),
(152, 25, NULL, 5, 'PROPAN224010', 'txt', 'localhost', NULL, 135, '10,25', 1, 1, '2020-09-03 05:51:56', '2020-09-03 05:51:56'),
(153, 25, NULL, 5, 'PROPAN224010', 'txt', 'fhf', NULL, 0, '10,25', 1, 1, '2020-09-03 05:56:13', '2020-09-03 05:56:13'),
(154, 25, NULL, 1, 'PROPAN125473', 'txt', 'test', NULL, 144, '10,25', 1, 1, '2020-09-03 08:01:44', '2020-09-03 08:01:44'),
(155, 10, NULL, 5, 'PROPAN224010', 'txt', 'hey sat what\'s the update ?\n', NULL, 0, '10,25', 1, 1, '2020-09-07 07:17:48', '2020-09-07 07:17:48'),
(156, 25, NULL, 5, 'PROPAN224010', 'txt', 'hi .. helo..', NULL, 0, '10,25', 1, 1, '2020-09-07 07:19:23', '2020-09-07 07:19:23'),
(157, 25, NULL, 5, 'PROPAN224010', 'txt', 'hello jeloy', NULL, 0, '10,25', 1, 1, '2020-09-07 07:23:06', '2020-09-07 07:23:06'),
(158, 10, NULL, 5, 'PROPAN224010', 'txt', 'jeio', NULL, 0, '10,25', 1, 1, '2020-09-07 07:23:20', '2020-09-07 07:23:20'),
(159, 25, NULL, 5, 'PROPAN224010', 'txt', 'helo hgdno  fngnnb', NULL, 0, '10,25', 1, 1, '2020-09-07 07:23:43', '2020-09-07 07:23:43'),
(160, 10, NULL, 5, 'PROPAN224010', 'txt', 'sabss', NULL, 0, '10,25', 1, 1, '2020-09-07 07:34:58', '2020-09-07 07:34:58'),
(161, 10, NULL, 5, 'PROPAN224010', 'txt', 'hoo', NULL, 0, '10,25', 1, 1, '2020-09-07 07:35:09', '2020-09-07 07:35:09'),
(162, 10, NULL, 5, 'PROPAN224010', 'txt', 'jio', NULL, 0, '10,25', 1, 1, '2020-09-10 06:15:48', '2020-09-10 06:15:48'),
(163, 25, NULL, 5, 'PROPAN224010', 'txt', 'lawyer', NULL, 0, '10,25', 1, 1, '2020-09-10 06:16:07', '2020-09-10 06:16:07'),
(164, 10, NULL, 5, 'PROPAN224010', 'txt', 'hey .. good evening', NULL, 0, '10,25', 1, 1, '2020-09-10 13:09:20', '2020-09-10 13:09:20'),
(165, 25, NULL, 5, 'PROPAN224010', 'txt', 'I\'m fine ....', NULL, 0, '10,25', 1, 1, '2020-09-10 13:09:59', '2020-09-10 13:09:59'),
(166, 49, NULL, 7, 'PROPAN986918', 'txt', 'hi', NULL, 0, '49,48', 1, 1, '2020-09-18 05:06:37', '2020-09-18 05:06:37'),
(167, 48, NULL, 7, 'PROPAN986918', 'txt', 'hello', NULL, 0, '49,48', 1, 1, '2020-09-18 05:07:23', '2020-09-18 05:07:23'),
(168, 49, NULL, 7, 'PROPAN986918', 'txt', 'what\'s the progress of that project ?', NULL, 0, '49,48', 1, 1, '2020-09-18 05:08:14', '2020-09-18 05:08:14'),
(169, 49, NULL, 7, 'PROPAN986918', 'txt', '70% work done', NULL, 0, '49,48', 1, 1, '2020-09-18 05:11:09', '2020-09-18 05:11:09'),
(170, 49, NULL, 7, 'PROPAN986918', 'txt', '??', NULL, 0, '49,48', 1, 1, '2020-09-18 05:11:19', '2020-09-18 05:11:19'),
(171, 48, NULL, 7, 'PROPAN986918', 'txt', 'yes .. working on it', NULL, 0, '49,48', 1, 1, '2020-09-18 05:12:27', '2020-09-18 05:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `clienttolawyerreview_tbls`
--

CREATE TABLE `clienttolawyerreview_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `review_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_service_count` tinyint(4) NOT NULL,
  `review_value_count` tinyint(4) NOT NULL,
  `review_time_count` tinyint(4) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clienttolawyerreview_tbls`
--

INSERT INTO `clienttolawyerreview_tbls` (`id`, `reviewer_id`, `review_id`, `review_title`, `review_details`, `review_service_count`, `review_value_count`, `review_time_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 25, 10, 'hi', 'what\'s up', 2, 5, 3, 'active', '2020-06-28 15:09:54', '2020-06-28 15:09:54'),
(2, 8, 1, 'test', 'tests', 3, 4, 3, 'active', '2020-06-30 14:25:14', '2020-06-30 14:25:14'),
(3, 8, 1, 'test', 'test', 3, 4, 3, 'active', '2020-07-01 13:13:34', '2020-07-01 13:13:34'),
(4, 8, 1, 'text', 'text', 3, 4, 2, 'active', '2020-07-03 13:48:58', '2020-07-03 13:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `contactquery`
--

CREATE TABLE `contactquery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regarding` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `your_msg` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactquery`
--

INSERT INTO `contactquery` (`id`, `name`, `email`, `regarding`, `subject`, `your_msg`, `created_at`, `updated_at`) VALUES
(1, 'Satirtha Das', 'dassatirtha@gmail.com', 'satirtha63@gmail.com', 'das', 'fda', NULL, NULL),
(2, 'Satirtha Das', 'satirtha63@gmail.com', 'satirtha63@gmail.com', 'Propandas Legal Support ', 'Looking for support assistant', NULL, NULL),
(3, 'Manick', 'manick.kreative@gmail.com', 'schwarzldaniel@hotmail.com', 'vodafone bill', 'fgfhghj', NULL, NULL),
(4, 'df', 'dassatirtha@gmail.com', '', 'test', 'test', NULL, NULL),
(5, 'df', 'dassatirtha@gmail.com', '', 'test', 'test', NULL, NULL),
(6, 'df', 'dassatirtha@gmail.com', 'schwarzldaniel@hotmail.com', 'test', 'test', NULL, NULL),
(7, 'Satirtha Das', 'satirtha.kreative@gmail.com', 'schwarzldaniel@hotmail.com', 'Test Propandas Contact Design', 'testing', NULL, NULL),
(8, 'Deepak', 'dfaf@dfadjlpd.com', 'schwarzldaniel@hotmail.com', 'Hello', 'what;s up?', NULL, NULL),
(9, 'a', 'a', 'schwarzldaniel@hotmail.com', 'a', 'test', NULL, NULL),
(10, 'a', 'a', 'schwarzldaniel@hotmail.com', 'a', 'test', NULL, NULL),
(11, 'test', 'test', 'schwarzldaniel@hotmail.com', 'test', 'test', NULL, NULL),
(12, 'test', 'test', 'schwarzldaniel@hotmail.com', 'test', 'test', NULL, NULL);

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
-- Table structure for table `filesize_actual_tbls`
--

CREATE TABLE `filesize_actual_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_in_gb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_in_kb` longtext COLLATE utf8mb4_unicode_ci,
  `price_of_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filesize_actual_tbls`
--

INSERT INTO `filesize_actual_tbls` (`id`, `size_in_gb`, `size_in_kb`, `price_of_size`, `created_at`, `updated_at`) VALUES
(1, '1', '1000000‬', '100', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `filesize_tbls`
--

CREATE TABLE `filesize_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_size` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_file_size` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_main_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filesize_tbls`
--

INSERT INTO `filesize_tbls` (`id`, `file_size`, `actual_file_size`, `project_id`, `project_name`, `user_main_id`, `created_at`, `updated_at`) VALUES
(1, '5538', '1000000‬', '1', 'PROPAN000090', '25', '2020-06-24 03:52:39', '2020-06-25 08:23:23'),
(2, '120', '2000000', '2', 'PROPAN00001', '25', '2020-06-25 03:41:08', '2020-06-25 04:15:25'),
(3, '542', '1000000‬', '1', 'PROPAN441013', '1', '2020-06-30 14:13:14', '2020-07-03 13:41:34'),
(4, '600', '1000000‬', '2', 'PROPAN885529', '1', '2020-07-01 13:10:50', '2020-07-01 13:10:50'),
(5, '67', '1000000‬', '5', 'PROPAN901109', '14', '2020-07-05 12:01:03', '2020-07-05 12:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `home_probehind_heading_tbl`
--

CREATE TABLE `home_probehind_heading_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_probehind_heading_tbl`
--

INSERT INTO `home_probehind_heading_tbl` (`id`, `heading_name`, `created_at`, `updated_at`) VALUES
(1, 'We have joined the legal tech movement.', '2020-04-25 14:02:18', '2020-04-28 09:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `howitwork_tbl`
--

CREATE TABLE `howitwork_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_count` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `howit_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `howitwork_tbl`
--

INSERT INTO `howitwork_tbl` (`id`, `heading_title`, `descriptions`, `year_count`, `year_text`, `contact_no`, `contact_text`, `howit_images`, `created_at`, `updated_at`) VALUES
(1, 'HOW IT WORKS', '<p>It&rsquo;s the ProPandas way of doing legal work.</p>\r\n\r\n<ul>\r\n	<li>You post your legal need on ProPandas</li>\r\n	<li>ProPandas will connect you with a lawyer through secure communication</li>\r\n	<li>The lawyer will take care of your legal need at ProPandas virtual office</li>\r\n</ul>\r\n\r\n<p>We believe that streamlining and digitalizing the legal market will make it more transparent, efficient, and secure for everyone. Hire a lawyer shall be as easy and efficient as hailing a ride. ProPandas will guarantee that communication with your lawyer will stay secure by using encryption technology.</p>\r\n\r\n<p>&nbsp;</p>', 'Satisfaction guarantee.', 'Hire a lawyer today.', '+1 6502509458', 'Contact us.', 'uploads/howitworks/23841shutterstock_1210498726-min.jpg', '2020-04-24 02:15:01', '2020-04-28 10:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `how_its_works_tbl`
--

CREATE TABLE `how_its_works_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_iframe_links` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_your_job_detail1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_your_job_detail2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `get_proposal1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `get_proposal2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire_lawyer1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire_lawyer2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_yourself1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_yourself2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_job1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_job2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `get_a_client1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `get_a_client2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_its_works_tbl`
--

INSERT INTO `how_its_works_tbl` (`id`, `video_iframe_links`, `post_your_job_detail1`, `post_your_job_detail2`, `get_proposal1`, `get_proposal2`, `hire_lawyer1`, `hire_lawyer2`, `register_yourself1`, `register_yourself2`, `search_job1`, `search_job2`, `get_a_client1`, `get_a_client2`, `created_at`, `updated_at`) VALUES
(1, '<iframe  src=\"https://www.youtube.com/embed/g-DAaCtRMPQ?autoplay=1&loop=1&rel=0&playlist=g-DAaCtRMPQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '<p>When you&rsquo;re ready, instantly hire the attorney that&rsquo;s right for you. Use our features to easily collaborate online and ensure your information stays safe and secure.</p>', '<ul>\r\n	<li>hire with a single click</li>\r\n	<li>flexible payment options</li>\r\n	<li>Save 70% compared to law firms</li>\r\n</ul>', '<p>When you&rsquo;re ready, instantly hire the attorney that&rsquo;s right for you. Use our features to easily collaborate online and ensure your information stays safe and secure.</p>', '<ul>\r\n	<li>hire with a single click</li>\r\n	<li>flexible payment options</li>\r\n	<li>Save 40% compared to law firms</li>\r\n</ul>', '<p>When you&rsquo;re ready, instantly hire the attorney that&rsquo;s right for you. Use our features to easily collaborate online and ensure your information stays safe and secure.</p>', '<ul>\r\n	<li>hire with a single click</li>\r\n	<li>flexible payment options</li>\r\n	<li>Save 60% compared to law firms1</li>\r\n</ul>', '<p>When you&rsquo;re ready, instantly hire the attorney that&rsquo;s right for you. Use our features to easily collaborate online and ensure your information stays safe and secure.</p>', '<ul>\r\n	<li>hire with a single click</li>\r\n	<li>flexible payment options</li>\r\n	<li>Save 60% compared to law firms</li>\r\n</ul>', '<p>When you&rsquo;re ready, instantly hire the attorney that&rsquo;s right for you. Use our features to easily collaborate online and ensure your information stays safe and secure.</p>', '<ul>\r\n	<li>hire with a single click</li>\r\n	<li>flexible payment options</li>\r\n	<li>Save 60% compared to law firms</li>\r\n</ul>', '<p>When you&rsquo;re ready, instantly hire the attorney that&rsquo;s right for you. Use our features to easily collaborate online and ensure your information stays safe and secure.</p>', '<ul>\r\n	<li>hire with a single click</li>\r\n	<li>flexible payment options</li>\r\n	<li>Save 50% compared to law firms</li>\r\n</ul>', NULL, '2020-06-03 15:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tbls`
--

CREATE TABLE `invoice_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `sent_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_check` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `active_check` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `accept_check` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `active_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `raise_description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_tbls`
--

INSERT INTO `invoice_tbls` (`id`, `invoice_id`, `project_id`, `project_name`, `client_id`, `lawyer_id`, `sent_date`, `due_date`, `pay_amount`, `pay_check`, `active_check`, `accept_check`, `active_status`, `created_at`, `updated_at`, `raise_description`) VALUES
(1, '#424915', 7, 'PROPAN224010', 25, 10, '2020-09-04 14:00:56', '2020-09-11 14:00:56', '20.00', 'no', 'yes', 'no', '0', '2020-09-04 08:30:56', '2020-09-04 08:30:56', 'lorem');

-- --------------------------------------------------------

--
-- Table structure for table `jobanswerclinetdesc`
--

CREATE TABLE `jobanswerclinetdesc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quesAnsDescrip` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `inserted_ids` longtext COLLATE utf8mb4_unicode_ci,
  `not_action_ids` longtext COLLATE utf8mb4_unicode_ci,
  `chat_Or_act_ids` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `projectId` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT '1',
  `project_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_accepting'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobanswerclinetdesc`
--

INSERT INTO `jobanswerclinetdesc` (`id`, `client_id`, `category_id`, `quesAnsDescrip`, `phone_number`, `inserted_ids`, `not_action_ids`, `chat_Or_act_ids`, `status`, `created_at`, `updated_at`, `projectId`, `active_status`, `project_status`) VALUES
(1, 25, 1, '1=>1,4=>27,6=>test', 91, '', '10,23', '10,23', 1, '2020-07-23 20:31:39', '2020-08-12 06:45:51', 'PROPAN679298', 1, 'not_accepting'),
(4, 25, 1, '1=>1,4=>28', 91, '', '10,23', '10,23', 1, '2020-08-04 18:07:30', '2020-08-11 13:04:36', 'PROPAN125473', 1, 'not_accepting'),
(3, 25, 1, '1=>1,1=>2,4=>28,0=>rtr', 91, '', '10,23,35', NULL, 1, '2020-07-23 20:49:58', '2020-07-25 20:49:58', 'PROPAN622452', 1, 'not_accepting'),
(5, 25, 2, '6=>kb,5=>34', 91, '10,23,35,44', '', '10', 1, '2020-08-10 12:54:19', '2020-08-22 07:25:05', 'PROPAN766250', 1, 'not_accepting'),
(6, 25, 1, '1=>1,4=>27,6=>testing', 917908194567, '10,23,35,44', '', '10', 1, '2020-08-10 13:15:10', '2020-08-22 07:51:39', 'PROPAN602267', 1, 'not_accepting'),
(7, 25, 1, '1=>1,4=>27,6=>test,6=>test', 91, '', '10,23,35,35', '10,23', 1, '2020-08-31 06:54:16', '2020-09-02 01:32:24', 'PROPAN224010', 1, 'not_accepting'),
(8, 25, 2, '6=>Test,5=>36', 91, '10,23,35,44,46', NULL, NULL, 1, '2020-09-15 19:13:40', '2020-09-15 19:13:40', 'PROPAN756318', 1, 'not_accepting'),
(9, 48, 1, '1=>7,3=>25', 91, '10,23,35,44,46,49', NULL, '49', 1, '2020-09-18 05:04:41', '2020-09-18 05:06:08', 'PROPAN986918', 1, 'not_accepting');

-- --------------------------------------------------------

--
-- Table structure for table `job_accept_tbls`
--

CREATE TABLE `job_accept_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_of_project` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days_of_project` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `work_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_started',
  `project_start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_close_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_users_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_accept_tbls`
--

INSERT INTO `job_accept_tbls` (`id`, `client_id`, `lawyer_id`, `project_id`, `project_name`, `budget_of_project`, `days_of_project`, `status`, `work_status`, `project_start_date`, `project_close_date`, `created_at`, `updated_at`, `total_users_ids`) VALUES
(1, 25, 10, 7, 'PROPAN224010', '19.9 / hrs', NULL, 1, 'started', '2020-09-04', NULL, '2020-09-03 18:30:00', '2020-09-03 18:30:00', '25,10');

-- --------------------------------------------------------

--
-- Table structure for table `job_chat_before_accept_tbls`
--

CREATE TABLE `job_chat_before_accept_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `lawyer_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_users_ids` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_chat_before_accept_tbls`
--

INSERT INTO `job_chat_before_accept_tbls` (`id`, `client_id`, `lawyer_id`, `project_id`, `project_name`, `total_users_ids`, `status`, `created_at`, `updated_at`) VALUES
(1, 25, 10, 4, 'PROPAN125473', '10,25', 0, '2020-08-05 07:24:35', '2020-08-20 01:40:53'),
(2, 25, 23, 1, 'PROPAN679298', '23,25,10', 0, '2020-08-06 06:45:51', '2020-08-20 06:10:25'),
(3, 25, 10, 5, 'PROPAN766250', '10,25', 0, '2020-08-10 07:25:05', '2020-08-10 07:25:05'),
(4, 25, 10, 6, 'PROPAN602267', '10,25,35', 0, '2020-08-10 07:51:39', '2020-08-20 01:55:03'),
(5, 25, 10, 7, 'PROPAN224010', '10,25', 0, '2020-08-31 01:31:38', '2020-08-31 01:31:38'),
(6, 25, 23, 7, 'PROPAN224010', '23,25,10', 0, '2020-08-31 01:32:24', '2020-09-10 13:18:10'),
(7, 48, 49, 9, 'PROPAN986918', '49,48', 0, '2020-09-18 05:05:54', '2020-09-18 05:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(49) CHARACTER SET utf8 DEFAULT NULL,
  `iso_639-1` char(2) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `iso_639-1`) VALUES
(1, 'English', 'en'),
(2, 'Afar', 'aa'),
(3, 'Abkhazian', 'ab'),
(4, 'Afrikaans', 'af'),
(5, 'Amharic', 'am'),
(6, 'Arabic', 'ar'),
(7, 'Assamese', 'as'),
(8, 'Aymara', 'ay'),
(9, 'Azerbaijani', 'az'),
(10, 'Bashkir', 'ba'),
(11, 'Belarusian', 'be'),
(12, 'Bulgarian', 'bg'),
(13, 'Bihari', 'bh'),
(14, 'Bislama', 'bi'),
(15, 'Bengali/Bangla', 'bn'),
(16, 'Tibetan', 'bo'),
(17, 'Breton', 'br'),
(18, 'Catalan', 'ca'),
(19, 'Corsican', 'co'),
(20, 'Czech', 'cs'),
(21, 'Welsh', 'cy'),
(22, 'Danish', 'da'),
(23, 'German', 'de'),
(24, 'Bhutani', 'dz'),
(25, 'Greek', 'el'),
(26, 'Esperanto', 'eo'),
(27, 'Spanish', 'es'),
(28, 'Estonian', 'et'),
(29, 'Basque', 'eu'),
(30, 'Persian', 'fa'),
(31, 'Finnish', 'fi'),
(32, 'Fiji', 'fj'),
(33, 'Faeroese', 'fo'),
(34, 'French', 'fr'),
(35, 'Frisian', 'fy'),
(36, 'Irish', 'ga'),
(37, 'Scots/Gaelic', 'gd'),
(38, 'Galician', 'gl'),
(39, 'Guarani', 'gn'),
(40, 'Gujarati', 'gu'),
(41, 'Hausa', 'ha'),
(42, 'Hindi', 'hi'),
(43, 'Croatian', 'hr'),
(44, 'Hungarian', 'hu'),
(45, 'Armenian', 'hy'),
(46, 'Interlingua', 'ia'),
(47, 'Interlingue', 'ie'),
(48, 'Inupiak', 'ik'),
(49, 'Indonesian', 'in'),
(50, 'Icelandic', 'is'),
(51, 'Italian', 'it'),
(52, 'Hebrew', 'iw'),
(53, 'Japanese', 'ja'),
(54, 'Yiddish', 'ji'),
(55, 'Javanese', 'jw'),
(56, 'Georgian', 'ka'),
(57, 'Kazakh', 'kk'),
(58, 'Greenlandic', 'kl'),
(59, 'Cambodian', 'km'),
(60, 'Kannada', 'kn'),
(61, 'Korean', 'ko'),
(62, 'Kashmiri', 'ks'),
(63, 'Kurdish', 'ku'),
(64, 'Kirghiz', 'ky'),
(65, 'Latin', 'la'),
(66, 'Lingala', 'ln'),
(67, 'Laothian', 'lo'),
(68, 'Lithuanian', 'lt'),
(69, 'Latvian/Lettish', 'lv'),
(70, 'Malagasy', 'mg'),
(71, 'Maori', 'mi'),
(72, 'Macedonian', 'mk'),
(73, 'Malayalam', 'ml'),
(74, 'Mongolian', 'mn'),
(75, 'Moldavian', 'mo'),
(76, 'Marathi', 'mr'),
(77, 'Malay', 'ms'),
(78, 'Maltese', 'mt'),
(79, 'Burmese', 'my'),
(80, 'Nauru', 'na'),
(81, 'Nepali', 'ne'),
(82, 'Dutch', 'nl'),
(83, 'Norwegian', 'no'),
(84, 'Occitan', 'oc'),
(85, '(Afan)/Oromoor/Oriya', 'om'),
(86, 'Punjabi', 'pa'),
(87, 'Polish', 'pl'),
(88, 'Pashto/Pushto', 'ps'),
(89, 'Portuguese', 'pt'),
(90, 'Quechua', 'qu'),
(91, 'Rhaeto-Romance', 'rm'),
(92, 'Kirundi', 'rn'),
(93, 'Romanian', 'ro'),
(94, 'Russian', 'ru'),
(95, 'Kinyarwanda', 'rw'),
(96, 'Sanskrit', 'sa'),
(97, 'Sindhi', 'sd'),
(98, 'Sangro', 'sg'),
(99, 'Serbo-Croatian', 'sh'),
(100, 'Singhalese', 'si'),
(101, 'Slovak', 'sk'),
(102, 'Slovenian', 'sl'),
(103, 'Samoan', 'sm'),
(104, 'Shona', 'sn'),
(105, 'Somali', 'so'),
(106, 'Albanian', 'sq'),
(107, 'Serbian', 'sr'),
(108, 'Siswati', 'ss'),
(109, 'Sesotho', 'st'),
(110, 'Sundanese', 'su'),
(111, 'Swedish', 'sv'),
(112, 'Swahili', 'sw'),
(113, 'Tamil', 'ta'),
(114, 'Telugu', 'te'),
(115, 'Tajik', 'tg'),
(116, 'Thai', 'th'),
(117, 'Tigrinya', 'ti'),
(118, 'Turkmen', 'tk'),
(119, 'Tagalog', 'tl'),
(120, 'Setswana', 'tn'),
(121, 'Tonga', 'to'),
(122, 'Turkish', 'tr'),
(123, 'Tsonga', 'ts'),
(124, 'Tatar', 'tt'),
(125, 'Twi', 'tw'),
(126, 'Ukrainian', 'uk'),
(127, 'Urdu', 'ur'),
(128, 'Uzbek', 'uz'),
(129, 'Vietnamese', 'vi'),
(130, 'Volapuk', 'vo'),
(131, 'Wolof', 'wo'),
(132, 'Xhosa', 'xh'),
(133, 'Yoruba', 'yo'),
(134, 'Chinese', 'zh'),
(135, 'Zulu', 'zu');

-- --------------------------------------------------------

--
-- Table structure for table `lawyertoclientreview_tbls`
--

CREATE TABLE `lawyertoclientreview_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `review_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_service_count` tinyint(4) NOT NULL,
  `review_value_count` tinyint(4) NOT NULL,
  `review_time_count` tinyint(4) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyertoclientreview_tbls`
--

INSERT INTO `lawyertoclientreview_tbls` (`id`, `reviewer_id`, `review_id`, `review_title`, `review_details`, `review_service_count`, `review_value_count`, `review_time_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 25, 'text', 'hi', 2, 4, 3, 'active', '2020-06-28 15:35:58', '2020-06-28 15:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_category_models`
--

CREATE TABLE `lawyer_category_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_category_models`
--

INSERT INTO `lawyer_category_models` (`id`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 3, 1, NULL, NULL),
(3, 1, 14, NULL, NULL),
(4, 2, 15, NULL, NULL),
(5, 1, 16, NULL, NULL),
(6, 2, 16, NULL, NULL),
(7, 1, 17, NULL, NULL),
(8, 3, 17, NULL, NULL),
(9, 1, 18, NULL, NULL),
(10, 3, 18, NULL, NULL),
(11, 1, 19, NULL, NULL),
(12, 3, 19, NULL, NULL),
(13, 1, 21, NULL, NULL),
(14, 2, 21, NULL, NULL),
(15, 3, 21, NULL, NULL),
(16, 4, 21, NULL, NULL),
(17, 5, 21, NULL, NULL),
(18, 1, 25, NULL, NULL),
(19, 2, 25, NULL, NULL),
(20, 3, 25, NULL, NULL),
(21, 1, 43, NULL, NULL),
(22, 2, 43, NULL, NULL),
(23, 1, 44, NULL, NULL),
(24, 3, 44, NULL, NULL),
(25, 1, 46, NULL, NULL),
(26, 3, 46, NULL, NULL),
(27, 1, 49, NULL, NULL),
(28, 3, 49, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_cities_tbls`
--

CREATE TABLE `lawyer_cities_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_cities_tbls`
--

INSERT INTO `lawyer_cities_tbls` (`id`, `city_name`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Berlin', 1, 1, NULL, NULL),
(2, 'Munich', 1, 1, NULL, NULL),
(3, 'Duesseldorf', 1, 1, NULL, NULL),
(4, 'Koeln', 1, 1, NULL, NULL),
(5, 'Hamburg', 1, 1, NULL, NULL),
(6, 'Hannover', 1, 1, NULL, NULL),
(7, 'Stuttgart', 1, 1, NULL, NULL),
(8, 'Frankfurt', 1, 1, NULL, NULL),
(9, 'Innsbruck', 2, 1, NULL, NULL),
(10, 'Vienna', 2, 1, NULL, NULL),
(11, 'Graz', 2, 1, NULL, NULL),
(12, 'Salzburg', 2, 1, NULL, NULL),
(13, 'Klagenfurt', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_country_tbls`
--

CREATE TABLE `lawyer_country_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_country_tbls`
--

INSERT INTO `lawyer_country_tbls` (`id`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Germany', 1, '2020-05-24 18:30:00', '2020-05-24 18:30:00'),
(2, 'Austria', 1, '2020-05-24 18:30:00', '2020-05-24 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_notify_tbls`
--

CREATE TABLE `lawyer_notify_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unread_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `active_status` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `notify_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyer_notify_tbls`
--

INSERT INTO `lawyer_notify_tbls` (`id`, `lawyer_id`, `client_id`, `project_id`, `project_name`, `unread_status`, `active_status`, `status`, `notify_type`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 17, 'PROPAN254916', 'read', 1, 1, 'invite', '2020-06-03 00:00:00', '2020-08-14 05:22:16'),
(2, 1, 8, 19, 'PROPAN441013', 'read', 1, 1, 'invite', '2020-06-30 00:00:00', '2020-08-14 05:18:58'),
(3, 1, 8, 21, 'PROPAN885529', 'read', 1, 1, 'invite', '2020-07-01 00:00:00', '2020-08-14 05:22:15'),
(4, 1, 8, 24, 'PROPAN946644', 'read', 1, 1, 'invite', '2020-07-03 00:00:00', '2020-08-14 05:17:07'),
(5, 21, 22, 30, 'PROPAN478766', 'read', 1, 1, 'invite', '2020-07-12 00:00:00', '2020-07-29 13:40:27'),
(6, 49, 48, 9, 'PROPAN986918', 'read', 1, 1, 'invite', '2020-09-18 00:00:00', '2020-09-18 05:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `law_schools_attended_tbls`
--

CREATE TABLE `law_schools_attended_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attendance_school_law` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `law_schools_attended_tbls`
--

INSERT INTO `law_schools_attended_tbls` (`id`, `attendance_school_law`, `created_at`, `updated_at`) VALUES
(1, 'Attendent1', NULL, NULL),
(2, 'Attendent2', NULL, NULL),
(3, 'Attendent3', NULL, NULL),
(4, 'Attendent4', NULL, NULL),
(5, 'Attendent5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `legalinfo`
--

CREATE TABLE `legalinfo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_one` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_two` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_link1` longtext COLLATE utf8mb4_unicode_ci,
  `google_link2` longtext COLLATE utf8mb4_unicode_ci,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `legal_heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_links` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legalinfo`
--

INSERT INTO `legalinfo` (`id`, `address_one`, `address_two`, `google_link1`, `google_link2`, `email_address`, `phone_number`, `legal_heading`, `heading_details`, `copyright`, `external_links`, `created_at`, `updated_at`) VALUES
(1, '<p>Propandas Technologies LLC</p>', '<p>Wiender Hauptstrasse 120</p>\r\n\r\n<p>1050 Vienna</p>\r\n\r\n<p>Austria</p>', 'https://goo.gl/maps/gesmjPwa2DmATZSFA', 'https://goo.gl/maps/jEC2UvrRhyuEk1HD6', 'office@propandas.com', '+1', 'Legal Information', '<p>Propandas Technologies LLC is a limited liability company incorporated in the State of Delaware and doing business entirely outside the United States.&nbsp;</p>', '<p>All content, trade marks, logos are in the property of Propandas Technologies LLC.&nbsp;</p>', '<p>www.rechtsanwaelte.at&nbsp;</p>', NULL, '2020-06-17 11:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `legal_document_tbls`
--

CREATE TABLE `legal_document_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `agreement_title` longtext COLLATE utf8mb4_unicode_ci,
  `agreement_short_desc` longtext COLLATE utf8mb4_unicode_ci,
  `agreement_full_desc` longtext COLLATE utf8mb4_unicode_ci,
  `agreement_category_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement_file_upload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `legal_cate_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement_full_details` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legal_document_tbls`
--

INSERT INTO `legal_document_tbls` (`id`, `category_id`, `agreement_title`, `agreement_short_desc`, `agreement_full_desc`, `agreement_category_desc`, `agreement_file_upload`, `legal_cate_type`, `agreement_full_details`, `created_at`, `updated_at`) VALUES
(2, 1, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummying text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'none', 'uploads/legal-document/50056796379.jpg', 'Documents', '<h2>Landlord</h2>\r\n\r\n<p>745 Silver Harbour, TX 777738, US</p>\r\n\r\n<p>ohn@example.com</p>\r\n\r\n<p>7894561234</p>\r\n\r\n<hr />\r\n<h2>Tenant</h2>\r\n\r\n<p>745 Silver Harbour, TX 777738, US</p>\r\n\r\n<p>ohn@example.com</p>\r\n\r\n<p>7894561234</p>\r\n\r\n<h3>1. Rented item</h3>\r\n\r\n<p>The subject of this agreement is the apartment Top Xin the building at[Street] (&quot;Rental Object&quot;). The Rental Goods have a usable area of 60 m&sup2;.</p>\r\n\r\n<p>The Tenant has inspected the Rental Object in detail and takes over the Rental Objectin the inspected condition.</p>\r\n\r\n<p>The Rental Objectmay be used by theTenantexclusively for residential purposes.</p>\r\n\r\n<p>The tenancy begins on [Date] and is concluded for a limited period of[X] years and thus ends on[Date] without the need for further notice of termination. After the expiry of one year, the Tenant shall be entitled to terminate the lease in accordance with Section 29 para. 2 MRG at the end of each month, either in court or in writing, subject to a three-month notice period.</p>\r\n\r\n<p>A termination on the part of the Landlord is only possible if there is an important reason according to &sect; 30 MRG. The parties agree in accordance with &sect; 30 para. 2 no. 13 MRG as an important and significant reason for termination by the Landlord.</p>\r\n\r\n<h3>2. Rent and termsof payment</h3>\r\n\r\n<p>The rent consists of:</p>\r\n\r\n<ul>\r\n	<li>The main rent</li>\r\n	<li>The fee for co-leased inventory</li>\r\n	<li>The proportionate operating costs, public charges and expenses</li>\r\n	<li>The proportionate heating and hot water costs</li>\r\n	<li>The value added tax at the respective statutory rate</li>\r\n</ul>\r\n\r\n<p>The rented item is subject to the partial application of the MRG in accordance with &sect; 1 para. 4 MRG. The main rentisEUR [X] per month.</p>\r\n\r\n<p>The pro rata operating costs, public charges and expenses are in particular those set out in sections 21-24 of the MRG. To cover these costs, the Tenant undertakes to pay a corresponding down-payment, in the amount prescribed by the Landlord, together with each payment of the main rent.</p>\r\n\r\n<p>Settlement of the amounts on account paid during a calendar year with the costs actually incurred shall be effected by 30 June of the following year. Any resulting credit notes or additional payments shall be settled within 14 days after this calculation.</p>\r\n\r\n<p>The total rent in accordance with is to be paid monthly in advance, without being requested to do so, by no later than the fifth day of each month to the following bank account, free of charges and deductions: IBAN [X].</p>\r\n\r\n<p>For the timeliness of this payment, the date of receipt at the bank account of the Landlord is decisive.</p>\r\n\r\n<p>In case of default of payment, the Landlord is entitled to charge reminder fees of EUR15,-per reminder and interest on arrears at a rate of 4% p.a. In addition, the Landlord is entitled to assign open claims to a debt collection agency and the costs arising from this are to be borne by the Tenant.</p>\r\n\r\n<h3>3 Value assurance</h3>\r\n\r\n<p>The stability of value of the main rent is agreed. The calculation of the value retention is based on the consumer price index for 20[X] published by Statistik Austria or an index replacing it in the future.</p>\r\n\r\n<p>The value of the main rent is adjusted annually. The main rent changes according to the extent to which the index changes. The index figure on the basis of which the last value guarantee was made serves as the basis for the subsequent value guarantee adjustment. Any waiver by the landlord of the application of the value guarantee must be made in writing.</p>\r\n\r\n<h3>4 Security deposit</h3>\r\n\r\n<p>At the latest by the time of signing the contract, the tenant shall pay a deposit of EUR[X] as security for all claims of the landlord. The deposit can be paid either in cash or by bank transfer.</p>\r\n\r\n<p>The security deposit serves to satisfy all claims arising from this contract which the tenant does not fulfil despite being due. In particular, it may be claimed in the event of rent arrears, breaches of the maintenance obligation, or clearance and cleaning costs upon termination of the rental agreement. If a claim is made, the Tenant undertakes to make the difference available in form within 14 days of a corresponding request from the Landlord.</p>\r\n\r\n<p>After termination of the tenancy, the deposit plus interest, less any costs incurred due to a claim, is to be returned to the tenant.</p>\r\n\r\n<h3>5 Maintenance</h3>\r\n\r\n<p>The Tenant has taken over the Rental Object in proper condition. Upon termination of the lease,Tenant shall return the Rental Goods to Landlord in the same good condition as the Rental Goods, except for wear and tear due to the contractual use of the Rental Goods.</p>\r\n\r\n<p>The landlord&#39;s obligation to maintain the apartment in accordance with &sect; 1096 ABGB is excluded by mutual agreement, unless it concerns the maintenance of a co-leased heating boiler (or hot water boiler or other heating device) in the apartment. The Tenant is obliged to treat the Rental Object, its equipment and the inventory of fixtures and fittings also let out, with due care and to carry out any necessary repairs at his own expense. In particular, the Tenant is obliged to maintain the equipment in the Rental Object at reasonable intervals at his own expense, and in the event of malfunctions to repair it properly and professionally.</p>\r\n\r\n<h3>6 Changestotherented item</h3>\r\n\r\n<p>The implementation of changes to the hired object requires the prior written consent of the Landlord.</p>\r\n\r\n<p>If the Landlord gives his consent in accordance with 8.1, he may make his consent dependent on theTenant&#39;s obligation to restore the previous condition when returning the Rental Object.</p>\r\n\r\n<p>Irrespective of his own fault, the Tenant shall be liable for all damage to the Rental Object or the House caused by the implementation of such changes. In this respect, the Tenant shall hold the Landlord completely harmless and indemnify the Landlord for any damage caused to third parties.</p>\r\n\r\n<p>Upon termination of the lease, all investments shall become the property of the Landlord without any claim for reimbursement of costs, unless the Landlord has demanded their cancellation in accordance with 8.2. The Tenant expressly waives the assertion of claims for compensation in accordance with &sect;&sect; 1036, 1037 ABGB in conjunction with &sect; 1097 ABGB.</p>\r\n\r\n<h3>7 Liability</h3>\r\n\r\n<p>The Tenant shall be liable to the Landlord for all damage to the Rental Object - in particular excessive wear and tear - which he or other persons for whom he is responsible have culpably caused. Landlord may have repair work that has become absolutely necessary as a result carried out at Tenant&#39;s expense.</p>\r\n\r\n<p>The Landlord shall only be liable to the Tenant for damage caused by him or by persons attributable to his sphere of influence with intent or gross negligence.</p>\r\n\r\n<h3>8 Usage</h3>\r\n\r\n<p>The Tenant undertakes to treat the Rental Object and also the general parts of the house with care and attention.</p>\r\n\r\n<p>The tenant agrees to comply with the house rules, which are attached to this contract and form an integral part of this contract.</p>\r\n\r\n<p>The keeping of animals requires the prior written consent of the Landlord. This consent is not required for the keeping of usual, harmless small animals, which are kept in cages and whose keeping does not require official permission.</p>\r\n\r\n<h3>9 Subcontracting and subletting</h3>\r\n\r\n<p>The total or partial subletting or other transfer to third parties, whether for payment or free of charge, is not permitted. The right of a permissible entry into the tenancy law in case of death according to &sect; 14 MRG remains unaffected. In the event of a breach of this provision, the Tenant undertakes to pay a penalty of EUR [X]. to the Landlord, which is to be paid within 14 days of written request by the Landlord. All other rights of the Landlord shall remain unaffected by the payment of this penalty.</p>\r\n\r\n<h3>10 Enteringtherentedproperty</h3>\r\n\r\n<p>The Tenant shall allow the Landlord or persons appointed by the Landlord to enter the Rental Object for important reasons and to allow necessary work to be carried out on the Rental Object. In the event of imminent danger, the Landlord and persons commissioned by the Landlord shall be entitled to enter the Rental Goods at any time - even in the absence of the Tenant.</p>\r\n\r\n<p>Moreover, in the event of termination of the contract or sale of the Rental Goods, the Landlord shall be entitled to enter the Rental Goods together with prospective tenants or purchasers for inspection, but only after having made an appointment with the Tenant in good time.</p>\r\n\r\n<h3>11 Termination ofthetenancy</h3>\r\n\r\n<p>Upon termination of the rental relationship - for whatever reason - the rental object together with any other rented objects and equipment as well as all keys handed over must be returned to the Landlord swept clean and cleared of any vehicles. A corresponding take-over record shall be drawn up for this return.</p>\r\n\r\n<h3>12 Miscellaneous</h3>\r\n\r\n<p>Several tenants shall be liable for all obligations arising from this contract to the undivided hand.</p>\r\n\r\n<p>The Contracting Parties shall waive their right to challenge the error.</p>\r\n\r\n<p>The tenant is not entitled to offset counterclaims against the rent to be paid.</p>\r\n\r\n<p>There are no subsidiary agreements to this contract. Changes to this contract must be made in writing. This also applies to any departure from this written form requirement.</p>\r\n\r\n<p>If one or more provisions of this contract are found to be invalid or void, the validity of the remaining provisions shall remain unaffected. The contracting parties shall replace the ineffective or invalid provision by an effective provision which comes as close as possible to the purpose of the ineffective or invalid provision.</p>\r\n\r\n<p>Declarations of the tenant, which are attached to payment receipts, are not legally valid. They cannot be tacitly taken note of by the landlord.</p>\r\n\r\n<p>Changes of address of one party must be notified to the other party without delay, otherwise written declarations sent to the last known address shall be deemed to have been duly delivered.</p>\r\n\r\n<p>The Tenant confirms receipt of an energy certificate for the Rental Object. The Landlord shall not assume any liability for the correctness of the information contained in the Energy Performance Certificate; any claims of the Tenant against the Landlord in this respect shall be excluded by mutual agreement.</p>\r\n\r\n<p>The costs of any legal representation or advice shall be borne by each party itself.</p>\r\n\r\n<p>This rental agreement is drawn up in two copies, one of which is given to each party.</p>\r\n\r\n<p>Landlord</p>\r\n\r\n<p>Tenant</p>\r\n\r\n<p>The Best Lawyers For Less</p>\r\n\r\n<p>Hire the top business lawyers and save up to 60% on legal fees</p>\r\n', '2020-08-24 04:46:25', '2020-08-26 08:04:28'),
(3, 1, 'testing', 'test', 'bsvuii', 'none\r\n\r\n', 'no file', 'Article', '<p>&nbsp;vk dkv</p>\r\n', '2020-08-24 04:48:46', '2020-08-26 09:06:04'),
(6, 3, 'nfnbld', 'f bkhdf', 'bvsfhv', 'none', 'no file', 'Article', NULL, '2020-08-24 07:42:46', '2020-08-24 07:42:46');

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
(23, '2020_03_18_103613_change_file_format_to_users_table', 18),
(24, '2020_03_22_144812_alter_admins_profile_add_img_column', 19),
(25, '2020_03_22_145434_alter_admins_profile_change_type_img_column', 20),
(26, '2020_03_23_062157_alter_add_recovery_email_column', 21),
(27, '2020_04_07_053649_create_client_job_answer_table', 22),
(31, '2020_04_08_084118_change_remove_unique_email_data', 23),
(32, '2020_04_11_115435_add_votes_to_profile_image_table', 24),
(35, '2020_04_13_055216_create_about_table', 25),
(36, '2020_04_14_072417_alter_test_add_test_column', 26),
(37, '2020_04_23_085828_create_banner_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `notification_tbl`
--

CREATE TABLE `notification_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lawyer_des` longtext COLLATE utf8mb4_unicode_ci,
  `lawyer_comment` longtext COLLATE utf8mb4_unicode_ci,
  `billing_option` tinyint(4) NOT NULL DEFAULT '0',
  `billing_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT '1',
  `unread_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `notify_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_tbl`
--

INSERT INTO `notification_tbl` (`id`, `lawyer_des`, `lawyer_comment`, `billing_option`, `billing_rate`, `lawyer_id`, `project_id`, `client_id`, `active_status`, `unread_status`, `created_at`, `updated_at`, `notify_type`) VALUES
(1, 'Lorem ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0, '20.00', 1, 9, 8, 0, 'read', '2020-06-01 05:29:41', '2020-06-01 05:29:41', 'proposal'),
(2, 'text', 'jkbfks', 0, '98', 1, 19, 8, 1, 'read', '2020-06-30 13:22:51', '2020-06-30 13:22:51', 'proposal'),
(3, 'like to do job', 'like to do job', 0, '79', 1, 21, 8, 1, 'read', '2020-07-01 13:05:32', '2020-07-01 13:05:32', 'proposal'),
(4, 'text', 'text', 0, '79.99', 1, 24, 8, 1, 'read', '2020-07-03 13:31:21', '2020-07-03 13:31:21', 'proposal'),
(5, 'I am good lawyer.', 'Happy to help', 0, '500', 14, 29, 11, 1, 'read', '2020-07-05 11:23:57', '2020-07-05 11:23:57', 'proposal'),
(6, 'dfdaf', 'dfwaf', 0, '40', 21, 9, 8, 1, 'read', '2020-07-08 14:04:15', '2020-07-08 14:04:15', 'proposal'),
(7, 'aifjoisdj', 'mkdoiasdo', 0, '400', 21, 30, 22, 1, 'read', '2020-07-12 15:24:05', '2020-07-12 15:24:05', 'proposal'),
(8, 'tesy', 'lorem', 0, '9000', 49, 9, 48, 1, 'unread', '2020-09-18 05:05:51', '2020-09-18 05:05:51', 'proposal');

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
-- Table structure for table `project_status_tbls`
--

CREATE TABLE `project_status_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lawyer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` longtext COLLATE utf8mb4_unicode_ci,
  `active_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_tbl`
--

CREATE TABLE `proposal_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lawyer_des` longtext COLLATE utf8mb4_unicode_ci,
  `lawyer_comment` longtext COLLATE utf8mb4_unicode_ci,
  `billing_option` tinyint(4) NOT NULL DEFAULT '0',
  `billing_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `propoal_act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_accepting'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal_tbl`
--

INSERT INTO `proposal_tbl` (`id`, `lawyer_des`, `lawyer_comment`, `billing_option`, `billing_rate`, `lawyer_id`, `project_id`, `client_id`, `active_status`, `created_at`, `updated_at`, `propoal_act`) VALUES
(1, 'tesy lorem sub', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 0, '78', 10, 1, 25, 1, '2020-08-03 19:12:39', '2020-08-03 19:12:39', 'not_accepting'),
(4, 'lorem', 'lorem', 1, '78', 23, 1, 25, 1, '2020-08-06 12:15:21', '2020-08-06 12:15:21', 'not_accepting'),
(5, 'df', 'jbg', 0, '78', 10, 5, 25, 1, '2020-08-10 12:55:01', '2020-08-10 12:55:01', 'not_accepting'),
(11, 'lorem', 'lorem', 1, '19.9', 10, 7, 25, 1, '2020-09-02 07:34:09', '2020-09-04 08:27:48', 'accepting'),
(12, 'tesy', 'lorem', 0, '9000', 49, 9, 48, 1, '2020-09-18 05:05:51', '2020-09-18 05:05:51', 'not_accepting');

-- --------------------------------------------------------

--
-- Table structure for table `system_msg_tbl`
--

CREATE TABLE `system_msg_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_or_lawyer_id` int(11) NOT NULL,
  `client_or_lawyer_type` int(11) NOT NULL,
  `client_or_lawyer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrator_msg` longtext COLLATE utf8mb4_unicode_ci,
  `system_msg_status` tinyint(4) NOT NULL DEFAULT '1',
  `unseen_status` tinyint(4) NOT NULL DEFAULT '0',
  `status_system` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_msg_tbl`
--

INSERT INTO `system_msg_tbl` (`id`, `client_or_lawyer_id`, `client_or_lawyer_type`, `client_or_lawyer_name`, `project_name`, `administrator_msg`, `system_msg_status`, `unseen_status`, `status_system`, `created_at`, `updated_at`) VALUES
(1, 8, 0, NULL, 'PROPAN00001', 'lorem', 1, 1, 0, '2020-06-01 05:35:06', '2020-06-01 05:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `terms_tbl`
--

CREATE TABLE `terms_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_tbl`
--

INSERT INTO `terms_tbl` (`id`, `terms`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>TERMS OF USE</strong></p>\r\n\r\n<p><a name=\"_7m5b3xg56u7y\"></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Last updated&nbsp;6/17/2020</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_a7mwfgcrtsqn\"></a><strong>AGREEMENT TO TERMS</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These Terms of Use constitute a legally binding agreement made between you, whether personally or on behalf of an entity (&ldquo;you&rdquo;) and Propandas Technologies LLC&nbsp;(&quot;<strong>Company</strong>&quot;, &ldquo;<strong>we</strong>&rdquo;, &ldquo;<strong>us</strong>&rdquo;, or &ldquo;<strong>our</strong>&rdquo;), concerning your access to and use of the&nbsp;www.propandas.com website as well as any other media form, media channel, mobile website or mobile application related, linked, or otherwise connected thereto (collectively, the &ldquo;Site&rdquo;). You agree that by accessing the Site, you have read, understood, and agreed to be bound by all of these Terms of Use. IF YOU DO NOT AGREE WITH ALL OF THESE TERMS OF USE, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE SITE AND YOU MUST DISCONTINUE USE IMMEDIATELY.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Supplemental terms and conditions or documents that may be posted on the Site from time to time are hereby expressly incorporated herein by reference. We reserve the right, in our sole discretion, to make changes or modifications to these Terms of Use at any time and for any reason. We will alert you about any changes by updating the &ldquo;Last updated&rdquo; date of these Terms of Use, and you waive any right to receive specific notice of each such change. It is your responsibility to periodically review these Terms of Use to stay informed of updates. You will be subject to, and will be deemed to have been made aware of and to have accepted, the changes in any revised Terms of Use by your continued use of the Site after the date such revised Terms of Use are posted.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The information provided on the Site is not intended for distribution to or use by any person or entity in any jurisdiction or country where such distribution or use would be contrary to law or regulation or which would subject us to any registration requirement within such jurisdiction or country. Accordingly, those persons who choose to access the Site from other locations do so on their own initiative and are solely responsible for compliance with local laws, if and to the extent local laws are applicable.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_4rd71iod99ud\"></a><strong>INTELLECTUAL PROPERTY RIGHTS</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Unless otherwise indicated, the Site is our proprietary property and all source code, databases, functionality, software, website designs, audio, video, text, photographs, and graphics on the Site (collectively, the &ldquo;Content&rdquo;) and the trademarks, service marks, and logos contained therein (the &ldquo;Marks&rdquo;) are owned or controlled by us or licensed to us, and are protected by copyright and trademark laws and various other intellectual property rights and unfair competition laws of the United States, international copyright laws, and international conventions. The Content and the Marks are provided on the Site &ldquo;AS IS&rdquo; for your information and personal use only. Except as expressly provided in these Terms of Use, no part of the Site and no Content or Marks may be copied, reproduced, aggregated, republished, uploaded, posted, publicly displayed, encoded, translated, transmitted, distributed, sold, licensed, or otherwise exploited for any commercial purpose whatsoever, without our express prior written permission.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Provided that you are eligible to use the Site, you are granted a limited license to access and use the Site and to download or print a copy of any portion of the Content to which you have properly gained access solely for your personal, non-commercial use. We reserve all rights not expressly granted to you in and to the Site, the Content and the Marks.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_vhkegautf00d\"></a><strong>USER REPRESENTATIONS</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>By using the Site, you represent and warrant that:&nbsp;&nbsp;(1) you have the legal capacity and you agree to comply with these Terms of Use;&nbsp;(2) you are not a minor in the jurisdiction in which you reside; (3) you will not access the Site through automated or non-human means, whether through a bot, script, or otherwise; (4) you will not use the Site for any illegal or unauthorized purpose; and (5) your use of the Site will not violate any applicable law or regulation.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If you provide any information that is untrue, inaccurate, not current, or incomplete, we have the right to suspend or terminate your account and refuse any and all current or future use of the Site (or any portion thereof).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_esuoutkhaf53\"></a></p>\r\n\r\n<p><a name=\"_1voziltdxegg\"></a></p>\r\n\r\n<p><strong>PROHIBITED ACTIVITIES</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You may not access or use the Site for any purpose other than that for which we make the Site available. The Site may not be used in connection with any commercial endeavors except those that are specifically endorsed or approved by us.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>As a user of the Site, you agree not to:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_zbbv9tgty199\"></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>USER GENERATED CONTRIBUTIONS</strong>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Site does not offer users to submit or post content. We may provide you with the opportunity to create, submit, post, display, transmit, perform, publish, distribute, or broadcast content and materials to us or on the Site, including but not limited to text, writings, video, audio, photographs, graphics, comments, suggestions, or personal information or other material (collectively, &quot;Contributions&quot;). Contributions may be viewable by other users of the Site and through third-party websites. As such, any Contributions you transmit may be treated in accordance with the Site Privacy Policy. When you create or make available any Contributions, you thereby represent and warrant that:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. &nbsp;The creation, distribution, transmission, public display, or performance, and the accessing, downloading, or copying of your Contributions do not and will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark, trade secret, or moral rights of any third party.<br />\r\n2. &nbsp;You are the creator and owner of or have the necessary licenses, rights, consents, releases, and permissions to use and to authorize us, the Site, and other users of the Site to use your Contributions in any manner contemplated by the Site and these Terms of Use.<br />\r\n3. &nbsp;You have the written consent, release, and/or permission of each and every identifiable individual person in your Contributions to use the name or likeness of each and every such identifiable individual person to enable inclusion and use of your Contributions in any manner contemplated by the Site and these Terms of Use.<br />\r\n4. &nbsp;Your Contributions are not false, inaccurate, or misleading.<br />\r\n5. &nbsp;Your Contributions are not unsolicited or unauthorized advertising, promotional materials, pyramid schemes, chain letters, spam, mass mailings, or other forms of solicitation.<br />\r\n6. &nbsp;Your Contributions are not obscene, lewd, lascivious, filthy, violent, harassing, libelous, slanderous, or otherwise objectionable (as determined by us).<br />\r\n7. &nbsp;Your Contributions do not ridicule, mock, disparage, intimidate, or abuse anyone.<br />\r\n8. &nbsp;Your Contributions do not advocate the violent overthrow of any government or incite, encourage, or threaten physical harm against another.<br />\r\n9. &nbsp;Your Contributions do not violate any applicable law, regulation, or rule.<br />\r\n10. &nbsp;Your Contributions do not violate the privacy or publicity rights of any third party.<br />\r\n11. &nbsp;Your Contributions do not contain any material that solicits personal information from anyone under the age of 18 or exploits people under the age of 18 in a sexual or violent manner.<br />\r\n12. &nbsp;Your Contributions do not violate any applicable law concerning child pornography, or otherwise intended to protect the health or well-being of minors;<br />\r\n13. &nbsp;Your Contributions do not include any offensive comments that are connected to race, national origin, gender, sexual preference, or physical handicap.<br />\r\n14. &nbsp;Your Contributions do not otherwise violate, or link to material that violates, any provision of these Terms of Use, or any applicable law or regulation.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Any use of the Site in violation of the foregoing violates these Terms of Use and may result in, among other things, termination or suspension of your rights to use the Site.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>CONTRIBUTION LICENSE</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You and the Site agree that we may access, store, process, and use any information and personal data that you provide following the terms of the Privacy Policy and your choices (including settings).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>By submitting suggestions or other feedback regarding the Site, you agree that we can use and share such feedback for any purpose without compensation to you.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We do not assert any ownership over your Contributions. You retain full ownership of all of your Contributions and any intellectual property rights or other proprietary rights associated with your Contributions. We are not liable for any statements or representations in your Contributions provided by you in any area on the Site. You are solely responsible for your Contributions to the Site and you expressly agree to exonerate us from any and all responsibility and to refrain from any legal action against us regarding your Contributions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_6nl7u6ag6use\"></a></p>\r\n\r\n<p><strong>SUBMISSIONS</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You acknowledge and agree that any questions, comments, suggestions, ideas, feedback, or other information regarding the Site (&quot;Submissions&quot;) provided by you to us are non-confidential and shall become our sole property. We shall own exclusive rights, including all intellectual property rights, and shall be entitled to the unrestricted use and dissemination of these Submissions for any lawful purpose, commercial or otherwise, without acknowledgment or compensation to you. You hereby waive all moral rights to any such Submissions, and you hereby warrant that any such Submissions are original with you or that you have the right to submit such Submissions. You agree there shall be no recourse against us for any alleged or actual infringement or misappropriation of any proprietary right in your Submissions.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_29ce8o9pbtmi\"></a></p>\r\n\r\n<p><a name=\"_wj13r09u8u3u\"></a><strong>SITE MANAGEMENT</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We reserve the right, but not the obligation, to: (1) monitor the Site for violations of these Terms of Use; (2) take appropriate legal action against anyone who, in our sole discretion, violates the law or these Terms of Use, including without limitation, reporting such user to law enforcement authorities; (3) in our sole discretion and without limitation, refuse, restrict access to, limit the availability of, or disable (to the extent technologically feasible) any of your Contributions or any portion thereof; (4) in our sole discretion and without limitation, notice, or liability, to remove from the Site or otherwise disable all files and content that are excessive in size or are in any way burdensome to our systems; and (5) otherwise manage the Site in a manner designed to protect our rights and property and to facilitate the proper functioning of the Site.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_jugvcvcw0oj9\"></a></p>\r\n\r\n<p><a name=\"_n081pott8yce\"></a></p>\r\n\r\n<p><a name=\"_sg28ikxq3swh\"></a></p>\r\n\r\n<p><a name=\"_k3mndam4w6w1\"></a><strong>TERM AND TERMINATION</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These Terms of Use shall remain in full force and effect while you use the Site. WITHOUT LIMITING ANY OTHER PROVISION OF THESE TERMS OF USE, WE RESERVE THE RIGHT TO, IN OUR SOLE DISCRETION AND WITHOUT NOTICE OR LIABILITY, DENY ACCESS TO AND USE OF THE SITE (INCLUDING BLOCKING CERTAIN IP ADDRESSES), TO ANY PERSON FOR ANY REASON OR FOR NO REASON, INCLUDING WITHOUT LIMITATION FOR BREACH OF ANY REPRESENTATION, WARRANTY, OR COVENANT CONTAINED IN THESE TERMS OF USE OR OF ANY APPLICABLE LAW OR REGULATION. WE MAY TERMINATE YOUR USE OR PARTICIPATION IN THE SITE OR DELETE&nbsp;ANY CONTENT OR INFORMATION THAT YOU POSTED AT ANY TIME, WITHOUT WARNING, IN OUR SOLE DISCRETION.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>If we terminate or suspend your account for any reason, you are prohibited from registering and creating a new account under your name, a fake or borrowed name, or the name of any third party, even if you may be acting on behalf of the third party. In addition to terminating or suspending your account, we reserve the right to take appropriate legal action, including without limitation pursuing civil, criminal, and injunctive redress.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_e2dep1hfgltt\"></a><strong>MODIFICATIONS AND INTERRUPTIONS</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We reserve the right to change, modify, or remove the contents of the Site at any time or for any reason at our sole discretion without notice. However, we have no obligation to update any information on our Site. We also reserve the right to modify or discontinue all or part of the Site without notice at any time. We will not be liable to you or any third party for any modification, price change, suspension, or discontinuance of the Site. &nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We cannot guarantee the Site will be available at all times. We may experience hardware, software, or other problems or need to perform maintenance related to the Site, resulting in interruptions, delays, or errors. We reserve the right to change, revise, update, suspend, discontinue, or otherwise modify the Site at any time or for any reason without notice to you. You agree that we have no liability whatsoever for any loss, damage, or inconvenience caused by your inability to access or use the Site during any downtime or discontinuance of the Site. Nothing in these Terms of Use will be construed to obligate us to maintain and support the Site or to supply any corrections, updates, or releases in connection therewith.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_p6vbf8atcwhs\"></a><strong>GOVERNING LAW</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These Terms shall be governed by and defined following the laws of&nbsp;__________.&nbsp;__________&nbsp;and yourself irrevocably consent that the courts of&nbsp;__________&nbsp;shall have exclusive jurisdiction to resolve any dispute which may arise in connection with these terms.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_v5i5tjw62cyw\"></a><strong>DISPUTE RESOLUTION</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Binding Arbitration</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Any dispute&nbsp;arising out of or in connection with this contract, including any question regarding its existence, validity or termination, shall be referred to and finally resolved by the International Commercial Arbitration Court under the European Arbitration Chamber (Belgium, Brussels, Avenue Louise, 146) according to the Rules of this ICAC, which, as a result of referring to it, is considered as the part of this clause. The number of arbitrators shall be&nbsp;__________.&nbsp;The seat, or legal place, of arbitration shall be&nbsp;__________.&nbsp;The language of the proceedings shall be&nbsp;__________.&nbsp;The governing law of the contract shall be the substantive law of&nbsp;__________.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_inlv5c77dhih\"></a><strong>Restrictions</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Parties agree that any arbitration shall be limited to the Dispute between the Parties individually. To the full extent permitted by law, (a) no arbitration shall be joined with any other proceeding; (b) there is no right or authority for any Dispute to be arbitrated on a class-action basis or to utilize class action procedures; and (c) there is no right or authority for any Dispute to be brought in a purported representative capacity on behalf of the general public or any other persons.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_mdjlt1af25uq\"></a><strong>Exceptions to Arbitration</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The Parties agree that the following Disputes are not subject to the above provisions concerning binding arbitration: (a) any Disputes seeking to enforce or protect, or concerning the validity of, any of the intellectual property rights of a Party; (b) any Dispute related to, or arising from, allegations of theft, piracy, invasion of privacy, or unauthorized use; and (c) any claim for injunctive relief. If this provision is found to be illegal or unenforceable, then neither Party will elect to arbitrate any Dispute falling within that portion of this provision found to be illegal or unenforceable and such Dispute shall be decided by a court of competent jurisdiction within the courts listed for jurisdiction above, and the Parties agree to submit to the personal jurisdiction of that court.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_mjgzo07ttzx5\"></a><strong>CORRECTIONS</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>There may be information on the Site that contains typographical errors, inaccuracies, or omissions, including descriptions, pricing, availability, and various other information. We reserve the right to correct any errors, inaccuracies, or omissions and to change or update the information on the Site at any time, without prior notice.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_gvi74blrahf9\"></a><strong>DISCLAIMER</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>THE SITE IS PROVIDED ON AN AS-IS AND AS-AVAILABLE BASIS. YOU AGREE THAT YOUR USE OF THE SITE AND OUR SERVICES WILL BE AT YOUR SOLE RISK. TO THE FULLEST EXTENT PERMITTED BY LAW, WE DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH THE SITE AND YOUR USE THEREOF, INCLUDING, WITHOUT LIMITATION, THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT. WE MAKE NO WARRANTIES OR REPRESENTATIONS ABOUT THE ACCURACY OR COMPLETENESS OF THE SITE&rsquo;S CONTENT OR THE CONTENT OF ANY WEBSITES LINKED TO THE SITE AND WE WILL ASSUME NO LIABILITY OR RESPONSIBILITY FOR ANY (1) ERRORS, MISTAKES, OR INACCURACIES OF CONTENT AND MATERIALS, (2) PERSONAL INJURY OR PROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF THE SITE, (3) ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN, (4) ANY INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM THE SITE, (5) ANY BUGS, VIRUSES, TROJAN HORSES, OR THE LIKE WHICH MAY BE TRANSMITTED TO OR THROUGH THE SITE BY ANY THIRD PARTY, AND/OR (6) ANY ERRORS OR OMISSIONS IN ANY CONTENT AND MATERIALS OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF ANY CONTENT POSTED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE SITE. WE DO NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR ANY PRODUCT OR SERVICE ADVERTISED OR OFFERED BY A THIRD PARTY THROUGH THE SITE, ANY HYPERLINKED WEBSITE, OR ANY WEBSITE OR MOBILE APPLICATION FEATURED IN ANY BANNER OR OTHER ADVERTISING, AND WE WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR MONITORING ANY TRANSACTION BETWEEN YOU AND ANY THIRD-PARTY PROVIDERS OF PRODUCTS OR SERVICES. AS WITH THE PURCHASE OF A PRODUCT OR SERVICE THROUGH ANY MEDIUM OR IN ANY ENVIRONMENT, YOU SHOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION WHERE APPROPRIATE.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_4pjah3d0455q\"></a><strong>LIMITATIONS OF LIABILITY</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>IN NO EVENT WILL WE OR OUR DIRECTORS, EMPLOYEES, OR AGENTS BE LIABLE TO YOU OR ANY THIRD PARTY FOR ANY DIRECT, INDIRECT, CONSEQUENTIAL, EXEMPLARY, INCIDENTAL, SPECIAL, OR PUNITIVE DAMAGES, INCLUDING LOST PROFIT, LOST REVENUE, LOSS OF DATA, OR OTHER DAMAGES ARISING FROM YOUR USE OF THE SITE, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.&nbsp;NOTWITHSTANDING ANYTHING TO THE CONTRARY CONTAINED HEREIN, OUR LIABILITY TO YOU FOR ANY CAUSE WHATSOEVER AND REGARDLESS OF THE FORM OF THE ACTION, WILL AT ALL TIMES BE LIMITED TO&nbsp;THE LESSER OF THE AMOUNT PAID, IF ANY, BY YOU TO US&nbsp;OR&nbsp;__________. CERTAIN US STATE LAWS AND INTERNATIONAL LAWS DO NOT ALLOW LIMITATIONS ON IMPLIED WARRANTIES OR THE EXCLUSION OR LIMITATION OF CERTAIN DAMAGES. IF THESE LAWS APPLY TO YOU, SOME OR ALL OF THE ABOVE DISCLAIMERS OR LIMITATIONS MAY NOT APPLY TO YOU, AND YOU MAY HAVE ADDITIONAL RIGHTS.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_k5ap68aj1dd4\"></a><strong>INDEMNIFICATION</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>You agree to defend, indemnify, and hold us harmless, including our subsidiaries, affiliates, and all of our respective officers, agents, partners, and employees, from and against any loss, damage, liability, claim, or demand, including reasonable attorneys&rsquo; fees and expenses, made by any third party due to or arising out of:&nbsp;(1) use of the Site; (2) breach of these Terms of Use; (3) any breach of your representations and warranties set forth in these Terms of Use; (4) your violation of the rights of a third party, including but not limited to intellectual property rights; or (5) any overt harmful act toward any other user of the Site with whom you connected via the Site. Notwithstanding the foregoing, we reserve the right, at your expense, to assume the exclusive defense and control of any matter for which you are required to indemnify us, and you agree to cooperate, at your expense, with our defense of such claims. We will use reasonable efforts to notify you of any such claim, action, or proceeding which is subject to this indemnification upon becoming aware of it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_ftgg17oha0ep\"></a><strong>USER DATA</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We will maintain certain data that you transmit to the Site for the purpose of managing the performance of the Site, as well as data relating to your use of the Site. Although we perform regular routine backups of data, you are solely responsible for all data that you transmit or that relates to any activity you have undertaken using the Site. You agree that we shall have no liability to you for any loss or corruption of any such data, and you hereby waive any right of action against us arising from any such loss or corruption of such data.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_dkovrslqodui\"></a><strong>ELECTRONIC COMMUNICATIONS, TRANSACTIONS, AND SIGNATURES</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Visiting the Site, sending us emails, and completing online forms constitute electronic communications. You consent to receive electronic communications, and you agree that all agreements, notices, disclosures, and other communications we provide to you electronically, via email and on the Site, satisfy any legal requirement that such communication be in writing. YOU HEREBY AGREE TO THE USE OF ELECTRONIC SIGNATURES, CONTRACTS, ORDERS, AND OTHER RECORDS, AND TO ELECTRONIC DELIVERY OF NOTICES, POLICIES, AND RECORDS OF TRANSACTIONS INITIATED OR COMPLETED BY US OR VIA THE SITE. You hereby waive any rights or requirements under any statutes, regulations, rules, ordinances, or other laws in any jurisdiction which require an original signature or delivery or retention of non-electronic records, or to payments or the granting of credits by any means other than electronic means.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_d4jvmcnxg0wt\"></a><strong>MISCELLANEOUS</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These Terms of Use and any policies or operating rules posted by us on the Site or in respect to the Site constitute the entire agreement and understanding between you and us. Our failure to exercise or enforce any right or provision of these Terms of Use shall not operate as a waiver of such right or provision. These Terms of Use operate to the fullest extent permissible by law. We may assign any or all of our rights and obligations to others at any time. We shall not be responsible or liable for any loss, damage, delay, or failure to act caused by any cause beyond our reasonable control. If any provision or part of a provision of these Terms of Use is determined to be unlawful, void, or unenforceable, that provision or part of the provision is deemed severable from these Terms of Use and does not affect the validity and enforceability of any remaining provisions. There is no joint venture, partnership, employment or agency relationship created between you and us as a result of these Terms of Use or use of the Site. You agree that these Terms of Use will not be construed against us by virtue of having drafted them. You hereby waive any and all defenses you may have based on the electronic form of these Terms of Use and the lack of signing by the parties hereto to execute these Terms of Use.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a name=\"_t4pq5cwn486q\"></a><strong>CONTACT US&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In order to resolve a complaint regarding the Site or to receive further information regarding use of the Site, please contact us at:&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>__________</strong></p>\r\n\r\n<p><strong>__________</strong></p>\r\n\r\n<p><strong>Phone:&nbsp;</strong><strong>__________</strong></p>\r\n\r\n<p><strong>__________</strong></p>', NULL, '2020-06-17 11:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials_tbl`
--

CREATE TABLE `testimonials_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_img` longtext COLLATE utf8mb4_unicode_ci,
  `client_comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_designation` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials_tbl`
--

INSERT INTO `testimonials_tbl` (`id`, `client_img`, `client_comment`, `client_name`, `client_designation`, `created_at`, `updated_at`) VALUES
(1, 'uploads/testimonials/20326sebastian.jpg', 'I am looking forward to the launch of ProPandas as it will enable me to connect with specialized lawyers on a case-to-case basis with no unnecessary overhead costs or office visits.', 'Sebastian Schwarzenegger', 'Investmentbanker and Entrepreneur', '2020-04-24 06:51:23', '2020-04-25 16:56:12'),
(7, 'uploads/testimonials/45211gernold.jpg', 'I often need quick and spontaneous legal advice, ProPandas will allow me to do this entirely online.', 'Dr. Gefeon Reingold', 'Expert', '2020-04-28 12:41:35', '2020-04-28 16:57:02');

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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileImg` longtext COLLATE utf8mb4_unicode_ci,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phn_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` longtext COLLATE utf8mb4_unicode_ci,
  `address2` longtext COLLATE utf8mb4_unicode_ci,
  `city` longtext COLLATE utf8mb4_unicode_ci,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_phn` tinyint(4) NOT NULL DEFAULT '0',
  `timezone` longtext COLLATE utf8mb4_unicode_ci,
  `law_firm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `law_firm_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_upload` longtext COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_lawyer` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `email`, `profileImg`, `degree`, `phn_num`, `address1`, `address2`, `city`, `zipcode`, `country`, `verify_phn`, `timezone`, `law_firm`, `law_firm_address`, `file_upload`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_lawyer`) VALUES
(4, 'Satirtha4', 'Das', 'highflyer.satirtha001@gmail.com', NULL, 'DE', '9001759639', 'Madhyamgram', 'Madhyamgram', 'kolkata', '700124', '99', 0, '194', NULL, NULL, NULL, NULL, '$2y$10$FT9WihgO4yh6XlUwoGi6TuNTrpEPDvugw1ex3pyaWK0MUrFlxHV.O', 'gxL8fcbOYe0etyLuPZ9EozDIQNcPwDfovhguFOJbEauEowAF1TehDoUDaKJV', '2020-04-07 08:32:07', '2020-04-07 08:32:07', 0),
(10, 'SaT H', 'Das', 'highflyer.satirtha001@gmail.com', 'uploads/dashboard/10865pngtree-user-vector-avatar-png-image_1541962.jpg', 'LL.M.', '9001759639', NULL, NULL, 'berlin', '700124', '80', 1, NULL, 'Jio Law firm', 'Madhyamgram', 'uploads/lawyer_doc/19ticket.pdf', NULL, '$2y$10$U58Ahfye/q3rG6jf4IbhfeWonUf5sC6Wb6slsEZSnlQqi8FCuCGVC', 'T9xrkeaoX3GZNtfWcW4h8KJSDy9G45fs8QFUNPaNCtcosFNWSJK2Tp1MQZeI', '2020-04-10 07:17:50', '2020-09-10 06:08:31', 1),
(23, 'Satirtha3', 'Das', 'dassatirtha@gmail.com', NULL, 'Dr.', '9001759639', NULL, NULL, 'Kolkata', '700130', '1', 0, NULL, 'United Bank of India', 'Arunachal road', 'uploads/lawyer_doc/19ticket.pdf', NULL, '$2y$10$g9pW5INg5NxmZHKztStRPO.hmPvRLkhoN9C1XuBSB7CLtq4bnaIGO', 'MLsA0ZLNHDzQLvOQE9S4bUWw3y5B3lM13o0cz5PICEjyyuP5ip8Fyxj6zsOr', '2020-04-23 00:48:34', '2020-04-23 00:48:34', 1),
(25, 'Rajakhs', 'Highflyer', 'satirtha.kreative@gmail.com', 'uploads/dashboard/153154no-img.jpg', 'B.tech', '9001759639', 'Arunachal road', 'Madhyamgram', 'Kolkata', '700130', '99', 0, '194', NULL, NULL, NULL, NULL, '$2y$10$kZMDTGSTnYI3SpmnvY2oFO/dAAHUBHRRmzVN6J8RLCyYZpC0OB69O', '52vrObk9CXXQVd2mJ9FIHtzSjS7ZeLYWfzCuzOTA0rxRq0rK9oUGl0hWM3vN', '2020-04-30 02:06:25', '2020-05-14 23:02:42', 0),
(35, 'goods', 'Raj', 'satirtha64@gmail.com', NULL, 'Mag.', '9001759639', NULL, NULL, 'Kolkata', '700130', '5', 0, NULL, 'United Bank of India', 'Arunachal road', 'uploads/lawyer_doc/screencapture-localhost-8000-how-it-works-1-2020-05-26-20_01_43.pdf', NULL, '$2y$10$g9pW5INg5NxmZHKztStRPO.hmPvRLkhoN9C1XuBSB7CLtq4bnaIGO', 'rVc9EmDXyqXuIm2UZJU13vVPnqSi3NgSAeKVBj0lNCe7T4aIzun9v5PrDTri', '2020-06-01 07:34:09', '2020-06-01 07:34:09', 1),
(36, 'Goods', 'Client', 'satirtha64@gmail.com', NULL, 'B.tech', '9001759639', 'Arunachal road', 'Madhyamgram', 'Kolkata', '700130', '99', 0, '194', NULL, NULL, NULL, NULL, '$2y$10$VJN6kiu8MsdbtzuQmqmfAOt5IAxt6A3kM1w5QwRF4gyjNCBlJOcgm', NULL, '2020-06-02 01:25:25', '2020-06-02 01:25:25', 0),
(44, 'Satirtha', 'KreativeLawyer', 'satirtha.kreative@gmail.com', 'uploads/dashboard/622463pngtree-user-vector-avatar-png-image_1541962.jpg', 'Dr.', '7908194389', NULL, NULL, 'Kolkata', '700130', '99', 1, NULL, 'United Bank of India', 'N0092\r\nMadhyamgram', 'uploads/lawyer_doc/text.docx', NULL, '$2y$10$kZMDTGSTnYI3SpmnvY2oFO/dAAHUBHRRmzVN6J8RLCyYZpC0OB69O', NULL, '2020-09-10 07:13:09', '2020-09-10 07:16:01', 1),
(45, 'Satirtha', 'Client', 'satirtha63@gmail.com', 'uploads/dashboard/715656male-profile-avatar-with-brown-hair-vector-12055105.jpg', 'Dr.', '7908194389', 'Arunachal road', 'Madhyamgram', 'Kolkata', '700130', '99', 0, '194', NULL, NULL, NULL, NULL, '$2y$10$NqVuyCCXD1.THIxpzuwfvugavr64.I8s1fLqqZzmG6LqTp6kdcCiq', NULL, '2020-09-10 07:24:13', '2020-09-10 07:27:52', 0),
(46, 'asd', 'asd', 'g.vrana@live.at', NULL, 'Dr.', '01234', NULL, NULL, 'Vienna', '1110', '14', 0, NULL, '123', 'abc', 'uploads/lawyer_doc/avatar.png', NULL, NULL, NULL, '2020-09-10 16:38:34', '2020-09-10 16:38:34', 1),
(47, 'a', 'a', 'a@a.a', NULL, 'a', 'a', 'a', 'a', 'a', 'a', '4', 0, '32', NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-11 06:50:41', '2020-09-11 06:50:41', 0),
(48, 'Propandas', 'Client', 'propandas20@gmail.com', NULL, 'DR', '7001204897', 'N0092', 'Madhyamgram', 'Kolkata', '700130', '99', 0, '194', NULL, NULL, NULL, NULL, '$2y$10$pPmPSMG82Nb9un0ntehbl./PxeatO6dZc3V.GDLiu4Klxc05Nht3W', NULL, '2020-09-18 04:53:38', '2020-09-18 04:53:38', 0),
(49, 'Propandas', 'Lawyer', 'propandas20@gmail.com', NULL, 'Dr.', '7001204896', NULL, NULL, 'Kolkata', '700130', '99', 0, NULL, 'United Bank of India', 'N0092\r\nMadhyamgram', 'uploads/lawyer_doc/text.docx', NULL, '$2y$10$pPmPSMG82Nb9un0ntehbl./PxeatO6dZc3V.GDLiu4Klxc05Nht3W', NULL, '2020-09-18 04:56:57', '2020-09-18 04:56:57', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_models`
--
ALTER TABLE `academic_models`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `banner_table`
--
ALTER TABLE `banner_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `behind_propandas_tbl`
--
ALTER TABLE `behind_propandas_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_tbl`
--
ALTER TABLE `career_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_invitation_tbls`
--
ALTER TABLE `chat_invitation_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_tbl`
--
ALTER TABLE `chat_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clienttolawyerreview_tbls`
--
ALTER TABLE `clienttolawyerreview_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactquery`
--
ALTER TABLE `contactquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_list`
--
ALTER TABLE `country_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filesize_actual_tbls`
--
ALTER TABLE `filesize_actual_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filesize_tbls`
--
ALTER TABLE `filesize_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_probehind_heading_tbl`
--
ALTER TABLE `home_probehind_heading_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howitwork_tbl`
--
ALTER TABLE `howitwork_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_its_works_tbl`
--
ALTER TABLE `how_its_works_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_tbls`
--
ALTER TABLE `invoice_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobanswerclinetdesc`
--
ALTER TABLE `jobanswerclinetdesc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_accept_tbls`
--
ALTER TABLE `job_accept_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_chat_before_accept_tbls`
--
ALTER TABLE `job_chat_before_accept_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyertoclientreview_tbls`
--
ALTER TABLE `lawyertoclientreview_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_category_models`
--
ALTER TABLE `lawyer_category_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_cities_tbls`
--
ALTER TABLE `lawyer_cities_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_country_tbls`
--
ALTER TABLE `lawyer_country_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_notify_tbls`
--
ALTER TABLE `lawyer_notify_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `law_schools_attended_tbls`
--
ALTER TABLE `law_schools_attended_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legalinfo`
--
ALTER TABLE `legalinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legal_document_tbls`
--
ALTER TABLE `legal_document_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `project_status_tbls`
--
ALTER TABLE `project_status_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_tbl`
--
ALTER TABLE `proposal_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_msg_tbl`
--
ALTER TABLE `system_msg_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_tbl`
--
ALTER TABLE `terms_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials_tbl`
--
ALTER TABLE `testimonials_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timezone_list`
--
ALTER TABLE `timezone_list`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `academic_models`
--
ALTER TABLE `academic_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admincategories`
--
ALTER TABLE `admincategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admincateques`
--
ALTER TABLE `admincateques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `adminfreelegaldocxes`
--
ALTER TABLE `adminfreelegaldocxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `adminoptions`
--
ALTER TABLE `adminoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `adminquestions`
--
ALTER TABLE `adminquestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner_table`
--
ALTER TABLE `banner_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `behind_propandas_tbl`
--
ALTER TABLE `behind_propandas_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `career_tbl`
--
ALTER TABLE `career_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `chat_invitation_tbls`
--
ALTER TABLE `chat_invitation_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `chat_tbl`
--
ALTER TABLE `chat_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT for table `clienttolawyerreview_tbls`
--
ALTER TABLE `clienttolawyerreview_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contactquery`
--
ALTER TABLE `contactquery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `country_list`
--
ALTER TABLE `country_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `filesize_actual_tbls`
--
ALTER TABLE `filesize_actual_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `filesize_tbls`
--
ALTER TABLE `filesize_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `home_probehind_heading_tbl`
--
ALTER TABLE `home_probehind_heading_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `howitwork_tbl`
--
ALTER TABLE `howitwork_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `how_its_works_tbl`
--
ALTER TABLE `how_its_works_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice_tbls`
--
ALTER TABLE `invoice_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobanswerclinetdesc`
--
ALTER TABLE `jobanswerclinetdesc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `job_accept_tbls`
--
ALTER TABLE `job_accept_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job_chat_before_accept_tbls`
--
ALTER TABLE `job_chat_before_accept_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `lawyertoclientreview_tbls`
--
ALTER TABLE `lawyertoclientreview_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lawyer_category_models`
--
ALTER TABLE `lawyer_category_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `lawyer_cities_tbls`
--
ALTER TABLE `lawyer_cities_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `lawyer_country_tbls`
--
ALTER TABLE `lawyer_country_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lawyer_notify_tbls`
--
ALTER TABLE `lawyer_notify_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `law_schools_attended_tbls`
--
ALTER TABLE `law_schools_attended_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `legalinfo`
--
ALTER TABLE `legalinfo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `legal_document_tbls`
--
ALTER TABLE `legal_document_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `notification_tbl`
--
ALTER TABLE `notification_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `project_status_tbls`
--
ALTER TABLE `project_status_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposal_tbl`
--
ALTER TABLE `proposal_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `system_msg_tbl`
--
ALTER TABLE `system_msg_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `terms_tbl`
--
ALTER TABLE `terms_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testimonials_tbl`
--
ALTER TABLE `testimonials_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `timezone_list`
--
ALTER TABLE `timezone_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
