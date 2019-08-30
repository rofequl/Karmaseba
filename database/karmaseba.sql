-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 05:44 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karmaseba`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_resources`
--

CREATE TABLE `add_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `resource_type` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_services`
--

CREATE TABLE `add_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_panels`
--

CREATE TABLE `admin_panels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_plans`
--

CREATE TABLE `business_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_01_21_061354_create_add_resources_table', 1),
(2, '2019_01_21_061615_create_add_services_table', 1),
(3, '2019_01_21_061940_create_business_plans_table', 1),
(4, '2019_01_21_062207_create_operation_informations_table', 1),
(5, '2019_01_21_062340_create_register_users_table', 1),
(6, '2019_01_21_062427_create_resource_sps_table', 1),
(7, '2019_01_21_062624_create_service_categories_table', 1),
(8, '2019_01_21_062652_create_service_subcategories_table', 1),
(9, '2019_01_21_062731_create_user_informations_table', 1),
(10, '2019_01_22_044124_create_admin_panels_table', 1),
(11, '2019_01_23_201021_create_sp_shedules_table', 1),
(12, '2019_01_24_075651_create_sp_leaves_table', 1),
(13, '2019_01_24_114718_create_sp_terms_conditions_table', 1),
(14, '2019_01_25_075244_create_sp_helps_table', 1),
(15, '2019_01_25_135702_create_sp_announcements_table', 1),
(16, '2019_02_04_084055_create_service_3categories_table', 1),
(17, '2019_02_04_084315_create_service_4categories_table', 1),
(18, '2019_02_05_174704_create_service_panels_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operation_informations`
--

CREATE TABLE `operation_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register_users`
--

CREATE TABLE `register_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_sps`
--

CREATE TABLE `resource_sps` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalId_Number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalId_image1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalId_image2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource_id` int(11) NOT NULL,
  `soft_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_3categories`
--

CREATE TABLE `service_3categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `category3_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category3_nameBn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_4categories`
--

CREATE TABLE `service_4categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `category3_id` int(11) NOT NULL,
  `category4_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category4_nameBn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_nameBn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landing_view` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_panels`
--

CREATE TABLE `service_panels` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landing_view` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_subcategories`
--

CREATE TABLE `service_subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_nameBn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sp_announcements`
--

CREATE TABLE `sp_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(9999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sp_helps`
--

CREATE TABLE `sp_helps` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `help` varchar(9999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sp_leaves`
--

CREATE TABLE `sp_leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sp_shedules`
--

CREATE TABLE `sp_shedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` int(11) NOT NULL DEFAULT '0',
  `h2` int(11) NOT NULL DEFAULT '0',
  `h3` int(11) NOT NULL DEFAULT '0',
  `h4` int(11) NOT NULL DEFAULT '0',
  `h5` int(11) NOT NULL DEFAULT '0',
  `h6` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sp_terms_conditions`
--

CREATE TABLE `sp_terms_conditions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(9999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_informations`
--

CREATE TABLE `user_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalId_Number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalId_image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalId_image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_resources`
--
ALTER TABLE `add_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_services`
--
ALTER TABLE `add_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_panels`
--
ALTER TABLE `admin_panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_plans`
--
ALTER TABLE `business_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_informations`
--
ALTER TABLE `operation_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_users`
--
ALTER TABLE `register_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_sps`
--
ALTER TABLE `resource_sps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_3categories`
--
ALTER TABLE `service_3categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_4categories`
--
ALTER TABLE `service_4categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_panels`
--
ALTER TABLE `service_panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_subcategories`
--
ALTER TABLE `service_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_announcements`
--
ALTER TABLE `sp_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_helps`
--
ALTER TABLE `sp_helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_leaves`
--
ALTER TABLE `sp_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_shedules`
--
ALTER TABLE `sp_shedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_terms_conditions`
--
ALTER TABLE `sp_terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_informations`
--
ALTER TABLE `user_informations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_resources`
--
ALTER TABLE `add_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_services`
--
ALTER TABLE `add_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_panels`
--
ALTER TABLE `admin_panels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_plans`
--
ALTER TABLE `business_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `operation_informations`
--
ALTER TABLE `operation_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_users`
--
ALTER TABLE `register_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_sps`
--
ALTER TABLE `resource_sps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_3categories`
--
ALTER TABLE `service_3categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_4categories`
--
ALTER TABLE `service_4categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_panels`
--
ALTER TABLE `service_panels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_subcategories`
--
ALTER TABLE `service_subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_announcements`
--
ALTER TABLE `sp_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_helps`
--
ALTER TABLE `sp_helps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_leaves`
--
ALTER TABLE `sp_leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_shedules`
--
ALTER TABLE `sp_shedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_terms_conditions`
--
ALTER TABLE `sp_terms_conditions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_informations`
--
ALTER TABLE `user_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
