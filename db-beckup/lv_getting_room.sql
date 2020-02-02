-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2020 at 10:24 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lv_getting_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@app.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2020-01-05 09:41:35', '2020-01-05 09:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `listing_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"displayName\":\"App\\\\Notifications\\\\SendEmailVerificationCode\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\SendEmailVerificationCode\\\":10:{s:4:\\\"code\\\";i:7348;s:2:\\\"id\\\";s:36:\\\"4ecf1e82-a97a-4fee-91c0-b9df28657e9e\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579711275, 1579711275),
(2, 'default', '{\"displayName\":\"App\\\\Notifications\\\\SendEmailVerificationCode\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\SendEmailVerificationCode\\\":10:{s:4:\\\"code\\\";i:3323;s:2:\\\"id\\\";s:36:\\\"e4e43d43-44c6-4221-8fd2-f8a272525220\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579711670, 1579711670),
(3, 'default', '{\"displayName\":\"App\\\\Notifications\\\\SendEmailVerificationCode\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\SendEmailVerificationCode\\\":10:{s:4:\\\"code\\\";i:2777;s:2:\\\"id\\\";s:36:\\\"c7af5743-ccfd-45c3-b49c-e8ccfe385cf1\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579711857, 1579711857),
(4, 'default', '{\"displayName\":\"App\\\\Notifications\\\\SendEmailVerificationCode\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\",\"command\":\"O:48:\\\"Illuminate\\\\Notifications\\\\SendQueuedNotifications\\\":13:{s:11:\\\"notifiables\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:12:\\\"notification\\\";O:43:\\\"App\\\\Notifications\\\\SendEmailVerificationCode\\\":10:{s:4:\\\"code\\\";i:3610;s:2:\\\"id\\\";s:36:\\\"c6951ba4-d1af-46e4-8a62-fe54a81d70cc\\\";s:6:\\\"locale\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}s:8:\\\"channels\\\";a:1:{i:0;s:4:\\\"mail\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579711985, 1579711985);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `text`, `read`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'hello', 1, '2020-01-08 07:02:08', '2020-01-08 07:08:35'),
(2, 2, 1, 'yep', 1, '2020-01-08 07:03:32', '2020-01-21 11:06:48'),
(3, 1, 2, 'are you there??', 1, '2020-01-08 07:03:44', '2020-01-08 07:08:35'),
(4, 2, 1, 'heiii', 1, '2020-01-08 07:04:35', '2020-01-21 11:06:48'),
(5, 1, 2, 'ype', 1, '2020-01-08 07:05:42', '2020-01-08 07:08:35'),
(6, 1, 1, 'dd', 0, '2020-01-21 10:04:02', '2020-01-21 10:04:02'),
(7, 1, 4, 'hello', 0, '2020-01-25 09:17:49', '2020-01-25 09:17:49');

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
(3, '2019_05_03_000001_create_customer_columns', 1),
(4, '2019_05_03_000002_create_subscriptions_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_11_13_042354_create_social_identities_table', 1),
(7, '2019_11_13_190820_create_admins_table', 1),
(8, '2019_11_18_183407_create_need_rooms_table', 1),
(9, '2019_11_18_183514_create_offer_rooms_table', 1),
(10, '2019_11_18_183541_create_need_apartments_table', 1),
(11, '2019_11_18_183551_create_offer_apartments_table', 1),
(12, '2019_11_18_183818_create_bookmarks_table', 1),
(13, '2019_12_09_085905_create_utilities_table', 1),
(14, '2019_12_19_134312_create_verifications_table', 1),
(15, '2019_12_20_152402_create_jobs_table', 1),
(16, '2020_01_01_112433_create_messages_table', 1),
(17, '2020_01_02_160249_create_supports_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `need_apartments`
--

CREATE TABLE `need_apartments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_rent` decimal(8,2) NOT NULL,
  `rental_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_short_term` tinyint(1) NOT NULL DEFAULT '0',
  `move_date` date NOT NULL,
  `leave_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `apartment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_furnished` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `amenities` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `need_apartments`
--

INSERT INTO `need_apartments` (`id`, `listing_id`, `user_id`, `title`, `location`, `lat`, `lng`, `monthly_rent`, `rental_currency`, `is_short_term`, `move_date`, `leave_date`, `description`, `apartment_type`, `is_furnished`, `amenities`, `status`, `created_at`, `updated_at`) VALUES
(1, 31100012, 1, 'Need Apartments', 'Yor, Guma, Benue, Nigeria', '7.9768', '8.7127', '1200.00', 'USD', 0, '2020-01-21', NULL, 'Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful\n\n listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.', 'Studio,2 Bedrooms,4 Bedrooms,1 Bedroom,3 Bedrooms,5 Bedrooms', 'yes', 'High-rise,Walkup,Elevator,Parking Lot,Near Bus Stop,Electronic Security,Street Parking,Covered Parking,Doorman,Low-rise,Disability Access', 1, '2020-01-21 09:30:55', '2020-01-23 06:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `need_rooms`
--

CREATE TABLE `need_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_rent` decimal(8,2) NOT NULL,
  `rental_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_short_term` tinyint(1) NOT NULL DEFAULT '0',
  `move_date` date NOT NULL,
  `leave_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cleanliness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overnight_guest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `party_habit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `go_to_bed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_preference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smoker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefer_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefer_smoker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefer_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `my_pet` text COLLATE utf8mb4_unicode_ci,
  `prefer_pet` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `need_rooms`
--

INSERT INTO `need_rooms` (`id`, `listing_id`, `user_id`, `title`, `location`, `lat`, `lng`, `monthly_rent`, `rental_currency`, `is_short_term`, `move_date`, `leave_date`, `description`, `cleanliness`, `overnight_guest`, `party_habit`, `get_up`, `go_to_bed`, `food_preference`, `smoker`, `work_schedule`, `occupation`, `prefer_age`, `prefer_smoker`, `prefer_student`, `my_pet`, `prefer_pet`, `status`, `created_at`, `updated_at`) VALUES
(2, 21100005, 1, 'Need a room', 'New York, United States of America', '40.7127281', '-74.0060152', '120.00', 'USD', 1, '2020-01-22', NULL, 'description description description\n\ndescription\n\ndescription\n\ndescription', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18,99', NULL, 'yes', NULL, NULL, 1, '2020-01-06 08:15:47', '2020-01-22 11:35:59'),
(3, 21100006, 1, 'Need Another Room', 'New York, United States of America', '40.7127281', '-74.0060152', '1200.00', 'USD', 0, '2020-01-19', NULL, 'Try to have at least 20 words. Our most successful listings are more than 160 words long.\n\nTry to have at least 20 words. Our most successful listings are more than 160 words long.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18,99', NULL, 'no', NULL, NULL, 1, '2020-01-19 07:18:21', '2020-01-19 07:18:21'),
(4, 21100007, 1, 'listing 3', 'New York, United States of America', '40.7127281', '-74.0060152', '500.00', 'USD', 0, '2020-01-19', NULL, 'Try to have at least 20 words. Our most successful listings are more than 160 words long.\n\nTry to have at least 20 words. Our most successful listings are more than 160 words long.\n\n\nTry to have at least 20 words. Our most successful listings are more than 160 words long.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18,99', NULL, 'no', NULL, NULL, 1, '2020-01-19 07:18:52', '2020-01-19 07:18:52'),
(5, 21100008, 1, 'Try to have at least 20 words. Our most successful listings are more than 160 words long.', 'New York, United States of America', '40.7127281', '-74.0060152', '2000.00', 'USD', 0, '2020-01-19', NULL, 'Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18,99', NULL, 'no', NULL, NULL, 1, '2020-01-19 07:19:19', '2020-01-19 07:19:19'),
(6, 21100009, 1, 'Try to have at least 20 words.', 'New York, United States of America', '40.7127281', '-74.0060152', '120.00', 'USD', 1, '2020-01-19', '2020-01-31', 'Try to have at least 20 words. Our most successful listings are more than 160 words long.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18,99', NULL, 'no', NULL, NULL, 1, '2020-01-19 07:19:51', '2020-01-19 07:19:51'),
(7, 21100010, 1, 'Try to have at least 20 words. Our most successful listings are more than 160 words long.', 'The Den, Stockholm Road, Telegraph Hill, London Borough of Lewisham, London, Greater London, England, SE14 5SX, Reino Unido', '51.485910149999995', '-0.05091550924140033', '3000.00', 'USD', 1, '2020-01-19', '2020-01-31', 'Try to have at least 20 words. Our most successful listings are more than 160 words long.\nTry to have at least 20 words. Our most successful listings are more than 160 words long.\nTry to have at least 20 words. Our most successful listings are more than 160 words long.\nTry to have at least 20 words. Our most successful listings are more than 160 words long.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18,99', NULL, 'no', NULL, NULL, 1, '2020-01-19 07:23:47', '2020-01-19 07:23:47'),
(8, 21100016, 4, 'Need room', 'New York State Thruway, New York, USA', '42.9586191', '-76.9087279', '120.00', 'USD', 0, '2020-01-25', NULL, 'Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18,99', NULL, 'no', NULL, NULL, 1, '2020-01-25 00:41:17', '2020-01-25 00:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `offer_apartments`
--

CREATE TABLE `offer_apartments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_rent` decimal(8,2) NOT NULL,
  `rental_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_short_term` tinyint(1) NOT NULL DEFAULT '0',
  `move_date` date NOT NULL,
  `leave_date` date DEFAULT NULL,
  `minimum_stay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `bedroom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measurement` decimal(8,2) DEFAULT NULL,
  `measurement_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_furnished` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `amenities` text COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_apartments`
--

INSERT INTO `offer_apartments` (`id`, `listing_id`, `user_id`, `title`, `location`, `lat`, `lng`, `monthly_rent`, `rental_currency`, `is_short_term`, `move_date`, `leave_date`, `minimum_stay`, `description`, `bedroom`, `bathroom`, `measurement`, `measurement_unit`, `is_furnished`, `amenities`, `images`, `status`, `created_at`, `updated_at`) VALUES
(1, 32100013, 1, 'Offering Entire Apartment', 'ddd, Kampong Chhnang, Cambodia', '11.9298257', '104.2656906', '4000.00', 'USD', 0, '2020-01-22', NULL, '4 nights', 'Try to have at least 20 words. Our most successful listings are more than 160 words long.\n\nTry to have at least 20 words. Our most successful listings are more than 160 words long.\n\nTry to have at least 20 words. Our most successful listings are more than 160 words long.\n\nTry to have at least 20 words. Our most successful listings are more than 160 words long.', '2 bedrooms', '2', '1250.00', 'Square feet', 'yes', 'High-rise,Laundromat,Near Bus Stop,Near Subway,Garage,Covered Parking,Doorman', 'imageForListing/1wBedkUF7PnXeFug80qTFxs9lPr0HMGCXJwxp3bU.jpeg,imageForListing/uFFVhJmmxjKPKVEeAefB3skmEtQvj1MA08eEcGt6.jpeg', 1, '2020-01-22 00:09:36', '2020-01-22 00:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `offer_rooms`
--

CREATE TABLE `offer_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_rent` decimal(8,2) NOT NULL,
  `rental_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_short_term` tinyint(1) NOT NULL DEFAULT '0',
  `move_date` date NOT NULL,
  `leave_date` date DEFAULT NULL,
  `minimum_stay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `building_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `move_in_fee` decimal(8,2) DEFAULT NULL,
  `utility_cost` decimal(8,2) DEFAULT NULL,
  `parking_rent` decimal(8,2) DEFAULT NULL,
  `is_furnished` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `amenities` text COLLATE utf8mb4_unicode_ci,
  `household_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `people_in_household` int(11) DEFAULT NULL,
  `household_sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cleanliness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overnight_guest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `party_habit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `go_to_bed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_preference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smoker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefer_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefer_smoker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefer_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `household_pets` text COLLATE utf8mb4_unicode_ci,
  `prefer_pets` text COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_rooms`
--

INSERT INTO `offer_rooms` (`id`, `listing_id`, `user_id`, `title`, `location`, `lat`, `lng`, `monthly_rent`, `rental_currency`, `is_short_term`, `move_date`, `leave_date`, `minimum_stay`, `description`, `building_type`, `move_in_fee`, `utility_cost`, `parking_rent`, `is_furnished`, `amenities`, `household_age`, `people_in_household`, `household_sex`, `cleanliness`, `overnight_guest`, `party_habit`, `get_up`, `go_to_bed`, `food_preference`, `smoker`, `work_schedule`, `occupation`, `prefer_age`, `prefer_smoker`, `prefer_student`, `household_pets`, `prefer_pets`, `images`, `status`, `created_at`, `updated_at`) VALUES
(1, 22100011, 1, 'I am Offering a room', 'Chicago Riverwalk, Chicago, IL, USA', '41.8874557', '-87.6263846', '1000.00', 'USD', 1, '2020-01-23', '2020-01-22', '3 nights', 'Try to have at least 20 words. Our most successful listings are more than 160 words long.\n\nTry to have at least 20 words. Our most successful listings are more than 160 words long.\n\nTry to have at least 20 words. Our most successful listings are more than 160 words long.', 'Apartment Building (10+ units)', '120.00', NULL, NULL, 'yes', 'Gym,Jacuzzi,Dishwasher,Parking,Deck or Patio,Private Closet,Phone Jack,Air Conditioning,Wood Floors,Carpet,Elevator,Laundry,Pool,Cable TV Jack,Internet,Private Entrance,Wireless Internet,Private Bathroom,Tennis,Fireplace,Storage,Yard', '18,50', 3, 'Male', 'Clean', 'Rarely', 'Occasionally', '8AM - 10AM', '12AM - 2AM', 'Almost Anything', 'Outside Only', 'Mixed', 'Student/Graduate', '18,56', 'Outside Only', 'no', 'Small Pets,Cats,Reptiles,Dogs,Birds,Fish', 'Dogs,Small Pets,Fish,Cats,Birds,Reptiles', 'imageForListing/btyTHfDOPi8KGKtzFPTt7fEMhpfqIVh6hDDza1W7.jpeg,imageForListing/Vb9cCMGXpPKEMoxf899PdCtl8QmXs0TIN9NkXb0a.jpeg,imageForListing/Y3v0zpqcr0m1adco4NDaHjPHO704EkCm6iKgDtOF.jpeg,imageForListing/7jzs2nWtxeNT18hqDsKAEXtjJZUKwzQqjZ30lnfa.jpeg', 1, '2020-01-19 10:24:57', '2020-01-25 00:23:05'),
(2, 22100015, 1, 'Offering another room', 'Orlando Ave, Winter Park, FL, USA', '28.6079893', '-81.36512780000001', '120.00', 'USD', 0, '2020-01-23', NULL, NULL, 'Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.Try to have at least 20 words. Our most successful listings are more than 160 words long.', NULL, NULL, NULL, NULL, 'no', '', '18,99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18,99', NULL, 'no', '', '', '', 1, '2020-01-23 11:00:31', '2020-01-23 11:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shahen@gmail.com', '$2y$10$YqENAMvZRbn3bawW7wzrcuOOBCmqrbatnvMEMPnf4PC2FoWAlxZE6', '2020-01-07 11:45:35'),
('user@gmail.com', '$2y$10$/6m.99M2c/htwJd8xw/oBO8zb1pZtTQmT5YsPpdAFUzzpik3PKXPO', '2020-01-25 07:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `social_identities`
--

CREATE TABLE `social_identities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_identities`
--

INSERT INTO `social_identities` (`id`, `user_id`, `provider_name`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'google', '109852772353289761628', '2020-01-06 04:44:40', '2020-01-06 04:44:40'),
(2, 6, 'facebook', '960009154378735', '2020-01-25 10:44:46', '2020-01-25 10:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_status`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'default', 'sub_GUwKXf2cQ15oYM', 'active', '311', 1, NULL, NULL, '2020-01-06 08:20:40', '2020-01-06 08:20:40'),
(2, 2, 'default', 'sub_GVfW9nDxnXFYaV', 'active', '312', 1, NULL, NULL, '2020-01-08 07:03:07', '2020-01-08 07:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `user_id`, `admin`, `subject`, `message`, `read`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Welcome to GettingRoom!', 'If you have any questions about your Gettingroom account, there is a site representative who is always available, and in most cases responds to you within minutes.', '1', '2020-01-06 04:44:40', '2020-01-25 08:02:19'),
(2, 2, 'admin', 'Welcome to GettingRoom!', 'If you have any questions about your Gettingroom account, there is a site representative who is always available, and in most cases responds to you within minutes.', '1', '2020-01-06 09:29:59', '2020-01-06 09:47:19'),
(3, 3, 'admin', 'Welcome to GettingRoom!', 'If you have any questions about your Gettingroom account, there is a site representative who is always available, and in most cases responds to you within minutes.', '0', '2020-01-06 10:23:30', '2020-01-06 10:23:30'),
(4, 4, 'admin', 'Welcome to GettingRoom!', 'If you have any questions about your Gettingroom account, there is a site representative who is always available, and in most cases responds to you within minutes.', '1', '2020-01-20 11:12:36', '2020-01-22 10:45:24'),
(5, 5, 'admin', 'Welcome to GettingRoom!', 'If you have any questions about your Gettingroom account, there is a site representative who is always available, and in most cases responds to you within minutes.', '1', '2020-01-25 08:03:35', '2020-01-25 08:03:38'),
(6, 6, 'admin', 'Welcome to GettingRoom!', 'If you have any questions about your Gettingroom account, there is a site representative who is always available, and in most cases responds to you within minutes.', '0', '2020-01-25 10:44:46', '2020-01-25 10:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `facebook_verified` tinyint(1) NOT NULL DEFAULT '0',
  `google_verified` tinyint(1) NOT NULL DEFAULT '0',
  `instagram_verified` tinyint(1) NOT NULL DEFAULT '0',
  `twitter_verified` tinyint(1) NOT NULL DEFAULT '0',
  `linkedin_verified` tinyint(1) NOT NULL DEFAULT '0',
  `package` tinyint(1) NOT NULL DEFAULT '0',
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `active_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `dob`, `gender`, `avatar`, `phone`, `email`, `password`, `phone_verified`, `email_verified`, `facebook_verified`, `google_verified`, `instagram_verified`, `twitter_verified`, `linkedin_verified`, `package`, `country`, `city`, `place`, `language`, `about`, `active_status`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 'Hijbullah', 'Amin', '1992-05-12', 'male', 'avatar/2nG304RIKS8SpjzJC4hKiJuXUxcXoqZiKhdOAP9B.jpeg', '01858078583', 'hijbullaah@gmail.com', NULL, 0, 1, 1, 1, 1, 1, 1, 0, NULL, 'new york', NULL, 'English', 'I am a very nice person', '1', '4X2kkRKjTrGnOzaujkb76qW6PPe6k5YRYmHZO0tYD1BaIEBzuIZtMwntX2ck', '2020-01-06 04:44:40', '2020-01-22 10:55:45', 'cus_GUwKcE4HU7VKeH', 'visa', '4242', NULL),
(2, 'Shahen', 'Mahmud', '2009-07-11', 'male', NULL, NULL, 'shahen@gmail.com', '$2y$10$Uz9PXb6IMxPWWmM4koqwhObJwK6OJSQay8TzkN0lu9vOioWmtv4tS', 0, 0, 0, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2020-01-06 09:29:59', '2020-01-10 10:41:02', 'cus_GVfWgIQcjUM52k', 'visa', '4242', NULL),
(4, 'new', 'Your', '1994-10-10', 'male', NULL, NULL, 'user@gmail.com', '$2y$10$gv4Mm4tWAcm3Vyy4xofkjO0sN4EvaSgBQjxJv1k0LEhro3r1QZznm', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2020-01-20 11:12:36', '2020-01-20 11:12:36', NULL, NULL, NULL, NULL),
(5, 'user new', 'web', '2009-10-10', 'male', NULL, NULL, 'user2@gmail.com', '$2y$10$JL2mnkFjFddIwo1O1Dv0seil67d7YFThmdoUDnNtZWAXtChmW7TI2', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2020-01-25 08:03:35', '2020-01-25 08:03:35', NULL, NULL, NULL, NULL),
(6, 'Hijbullah', 'Amin', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '1', 'ablbJRklzVA2dERDAkbCToiFFcU6eyAFcoitN8REM2gseTBFv9omsaaIkkYU', '2020-01-25 10:44:46', '2020-01-25 10:44:46', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'listing_id', 100017, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE `verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`id`, `user_id`, `type`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'phone', '9298', '2020-01-22 10:29:51', '2020-01-22 10:29:51'),
(2, 4, 'email', '7348', '2020-01-22 10:41:15', '2020-01-22 10:41:15'),
(7, 1, 'phone', '1076', '2020-01-22 10:55:57', '2020-01-22 10:55:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookmarks_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `need_apartments`
--
ALTER TABLE `need_apartments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `need_apartments_listing_id_unique` (`listing_id`),
  ADD KEY `need_apartments_user_id_foreign` (`user_id`);

--
-- Indexes for table `need_rooms`
--
ALTER TABLE `need_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `need_rooms_listing_id_unique` (`listing_id`),
  ADD KEY `need_rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `offer_apartments`
--
ALTER TABLE `offer_apartments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offer_apartments_listing_id_unique` (`listing_id`),
  ADD KEY `offer_apartments_user_id_foreign` (`user_id`);

--
-- Indexes for table `offer_rooms`
--
ALTER TABLE `offer_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offer_rooms_listing_id_unique` (`listing_id`),
  ADD KEY `offer_rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `social_identities`
--
ALTER TABLE `social_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_identities_provider_id_unique` (`provider_id`),
  ADD KEY `social_identities_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verifications_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `need_apartments`
--
ALTER TABLE `need_apartments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `need_rooms`
--
ALTER TABLE `need_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `offer_apartments`
--
ALTER TABLE `offer_apartments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offer_rooms`
--
ALTER TABLE `offer_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `social_identities`
--
ALTER TABLE `social_identities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `need_apartments`
--
ALTER TABLE `need_apartments`
  ADD CONSTRAINT `need_apartments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `need_rooms`
--
ALTER TABLE `need_rooms`
  ADD CONSTRAINT `need_rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_apartments`
--
ALTER TABLE `offer_apartments`
  ADD CONSTRAINT `offer_apartments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_rooms`
--
ALTER TABLE `offer_rooms`
  ADD CONSTRAINT `offer_rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_identities`
--
ALTER TABLE `social_identities`
  ADD CONSTRAINT `social_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `verifications`
--
ALTER TABLE `verifications`
  ADD CONSTRAINT `verifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
