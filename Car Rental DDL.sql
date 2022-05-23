-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 02:23 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `machina`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Owner_id` bigint(20) UNSIGNED NOT NULL,
  `Brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` double(8,2) NOT NULL,
  `Model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Trans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `Owner_id`, `Brand`, `Information`, `Price`, `Model`, `Image`, `Status`, `AC`, `Type`, `Trans`, `City`, `created_at`, `updated_at`) VALUES
(1, 1, 'BMW', 'Good', 150.00, 'M5', '1641819036.jpg', 'Available', 'Yes', 'SUV', 'Automatic', 'Alexandria', '2022-01-10 10:50:36', '2022-01-10 10:50:36'),
(2, 2, 'BMW', 'Beast', 180.00, 'M6', '1641820060.jpg', 'Available', 'Yes', 'Sports', 'Automatic', 'Alexandria', '2022-01-10 11:07:40', '2022-01-10 11:07:40'),
(3, 2, 'Opel', 'Good', 180.00, 'Astra', '1641820094.jpg', 'Available', 'Yes', 'Sedan', 'Automatic', 'Alexandria', '2022-01-10 11:08:14', '2022-01-10 11:08:14'),
(4, 2, 'Porsche', 'Good', 150.00, '911', '1641820159.png', 'Available', 'Yes', 'Sports', 'Automatic', 'Alexandria', '2022-01-10 11:09:19', '2022-01-10 11:09:19'),
(5, 2, 'Mercedes', 'Good', 180.00, 'C180', '1641820283.jpg', 'Available', 'Yes', 'Sports', 'Automatic', 'Alexandria', '2022-01-10 11:11:23', '2022-01-10 11:11:23'),
(6, 2, 'Mercedes', 'Beast', 300.00, 'AMG', '1641820332.jpg', 'Available', 'Yes', 'Sports', 'Automatic', 'Alexandria', '2022-01-10 11:12:12', '2022-01-10 11:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `BrandLogo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_brands`
--

INSERT INTO `car_brands` (`id`, `Brand`, `user_id`, `BrandLogo`, `created_at`, `updated_at`) VALUES
(1, 'BMW', 1, '1641818988.jpg', '2022-01-10 10:49:48', '2022-01-10 10:49:48'),
(2, 'Honda', 2, '1641819911.png', '2022-01-10 11:05:11', '2022-01-10 11:05:11'),
(3, 'Lamborghini', 2, '1641819922.png', '2022-01-10 11:05:22', '2022-01-10 11:05:22'),
(4, 'Porsche', 2, '1641819933.png', '2022-01-10 11:05:33', '2022-01-10 11:05:33'),
(5, 'Mercedes', 2, '1641819945.jpg', '2022-01-10 11:05:45', '2022-01-10 11:05:45'),
(6, 'Ferrari', 2, '1641819956.jpg', '2022-01-10 11:05:56', '2022-01-10 11:05:56'),
(7, 'Geely', 2, 'carlogo.svg', '2022-01-10 11:06:07', '2022-01-10 11:06:07'),
(8, 'Rolls Royce', 2, '1641819990.jpg', '2022-01-10 11:06:30', '2022-01-10 11:06:30'),
(9, 'Opel', 2, '1641820006.png', '2022-01-10 11:06:46', '2022-01-10 11:06:46');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_29_160930_create_offices_table', 1),
(6, '2021_12_29_174736_create_car_brands_table', 1),
(7, '2021_12_29_176736_create_car_models_table', 1),
(8, '2021_12_31_210303_create_rentals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `Country`, `City`, `created_at`, `updated_at`) VALUES
(1, 'Egypt', 'Alexandria', '2022-01-10 10:50:09', '2022-01-10 10:50:09'),
(2, 'Egypt', 'Cairo', '2022-01-10 11:16:57', '2022-01-10 11:16:57'),
(3, 'England', 'Liverpool', '2022-01-10 11:17:12', '2022-01-10 11:17:12'),
(4, 'Spain', 'Madrid', '2022-01-10 11:17:49', '2022-01-10 11:17:49');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Car_id` bigint(20) UNSIGNED NOT NULL,
  `Owner_id` bigint(20) UNSIGNED NOT NULL,
  `Renter_id` bigint(20) UNSIGNED NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Start_date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TMoney` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `Car_id`, `Owner_id`, `Renter_id`, `City`, `Start_date`, `End_Date`, `Paid`, `TMoney`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Alexandria', '2022-01-11', '2022-01-21', 'No', 0.00, '2022-01-10 10:58:54', '2022-01-10 10:58:54'),
(2, 2, 2, 1, 'Alexandria', '2022-01-11', '2022-01-25', 'No', 0.00, '2022-01-10 11:18:41', '2022-01-10 11:18:41'),
(3, 4, 2, 1, 'Alexandria', '2022-01-13', '2022-01-29', 'No', 0.00, '2022-01-10 11:19:04', '2022-01-10 11:19:04'),
(4, 5, 2, 1, 'Alexandria', '2022-01-26', '2022-01-31', 'No', 0.00, '2022-01-10 11:19:17', '2022-01-10 11:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `role`, `profile_image`, `phoneNumber`, `age`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aly Aboelnasr', 'alyaboelnasr@gmail.com', 'Alyaboelnasr', NULL, '$2y$10$HB3P6StI1iYaSq/JS5p0wuUOQAyQ3r1DTbPVLagfFh7ol7AAFekce', 'Customer', '1641818764.jpeg', '+201111905852', 22, NULL, '2022-01-10 10:45:43', '2022-01-10 10:46:04'),
(2, 'Admin', 'admin@admin.com', 'Admin', NULL, '$2y$10$XLllEiIFAIK6lGijKMeu.OEi1TE2whul8dHDoE.Kei3QM1B4iRh8G', 'Admin', 'Usericon.png', '011111905852', 23, NULL, '2022-01-10 11:03:34', '2022-01-10 11:04:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_owner_id_foreign` (`Owner_id`),
  ADD KEY `cars_brand_foreign` (`Brand`),
  ADD KEY `cars_city_foreign` (`City`);

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_brands_brand_unique` (`Brand`),
  ADD KEY `car_brands_user_id_foreign` (`user_id`);

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
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offices_city_unique` (`City`);

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
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_car_id_foreign` (`Car_id`),
  ADD KEY `rentals_owner_id_foreign` (`Owner_id`),
  ADD KEY `rentals_renter_id_foreign` (`Renter_id`),
  ADD KEY `rentals_city_foreign` (`City`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_brand_foreign` FOREIGN KEY (`Brand`) REFERENCES `car_brands` (`Brand`),
  ADD CONSTRAINT `cars_city_foreign` FOREIGN KEY (`City`) REFERENCES `offices` (`City`),
  ADD CONSTRAINT `cars_owner_id_foreign` FOREIGN KEY (`Owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD CONSTRAINT `car_brands_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`Car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `rentals_city_foreign` FOREIGN KEY (`City`) REFERENCES `cars` (`City`),
  ADD CONSTRAINT `rentals_owner_id_foreign` FOREIGN KEY (`Owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rentals_renter_id_foreign` FOREIGN KEY (`Renter_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
