

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spade_test`
--

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zoe Romaguera', 'citlalli00@example.net', 'm', '2023-01-16 16:26:35', 'S-vmTh`r]jH#H-c1PL?', NULL, '2023-01-16 16:26:35', '2023-01-16 16:26:35'),
(2, 'Mike Bashirian', 'kole11@example.net', 'm', '2023-01-16 16:26:35', 'n\"9NLRK/3glKM', NULL, '2023-01-16 16:26:35', '2023-01-18 22:41:20'),
(3, 'Brook Stehr I', 'kiehn.scarlett@example.com', 'f', '2023-01-16 16:26:35', 'K4uc%(C;^omW', NULL, '2023-01-16 16:26:35', '2023-01-16 16:26:35'),
(4, 'General Walker', 'karen.cummings@example.com', 'n', '2023-01-16 16:26:35', 'wP}XGTf*,<f%#~Pr', NULL, '2023-01-16 16:26:35', '2023-01-16 16:26:35'),
(5, 'Eloisa Fahey', 'osborne28@example.com', 't', '2023-01-16 16:26:35', '+y=$X>6*GAE2M`0', NULL, '2023-01-16 16:26:35', '2023-01-18 22:53:39'),
(20, 'Tom Cruise', 'tom@aol.com', 'm', '2023-01-18 21:23:25', '02c75fb22c75b23dc963c7eb91a062cc', NULL, '2023-01-18 21:23:25', '2023-01-18 22:40:31'),
(21, 'Tom Hanks', 'tom.tom@gmail.com', 'n', '2023-01-18 22:48:11', '46241a9cbf6a787d2cde04ecd407352c', NULL, '2023-01-18 22:48:11', '2023-01-18 22:48:11'),
(22, 'Keven McGlynn', 'kenya53@example.com', 'f', '2023-01-18 22:59:16', 'd8f759d7d210e3e879d2557ecd62870b', NULL, '2023-01-18 22:59:16', '2023-01-18 22:59:16'),
(23, 'Karli West', 'batz.ima@example.org', 'n', '2023-01-18 22:59:16', 'b7a2c1bb7fb85265f193b72a5f63fc81', NULL, '2023-01-18 22:59:16', '2023-01-18 22:59:16'),
(24, 'Enid Romaguera', 'maggio.madonna@example.com', 'f', '2023-01-18 22:59:16', '19d27e4029140cfd38565707b84e81ee', NULL, '2023-01-18 22:59:16', '2023-01-18 22:59:16'),
(25, 'Salvador Wisoky', 'vkihn@example.net', 't', '2023-01-18 22:59:16', '66dc9735a88b26b8645ef8b046d6da8b', NULL, '2023-01-18 22:59:16', '2023-01-18 22:59:16'),
(26, 'Bennie Dach', 'mboyle@example.org', 'm', '2023-01-18 22:59:16', '9208ac38b319ae8d222f70f5e8c5f1c3', NULL, '2023-01-18 22:59:16', '2023-01-18 22:59:16'),
(27, 'Bradly Windler IV', 'alysson89@example.com', 't', '2023-01-18 22:59:30', '92a0fc30bce5f97a6c72e5424ba920f0', NULL, '2023-01-18 22:59:30', '2023-01-18 22:59:30'),
(28, 'Dr. Conner Eichmann IV', 'alden72@example.org', 'n', '2023-01-18 22:59:30', 'd9bf4d2890cdbb0dcb9cc8799e0ec6b7', NULL, '2023-01-18 22:59:30', '2023-01-18 22:59:30'),
(29, 'Prof. Elton Murazik MD', 'samson22@example.com', 'n', '2023-01-18 22:59:30', '3e8aaeb546f2a14b44ed098f8aefebdd', NULL, '2023-01-18 22:59:30', '2023-01-18 22:59:30'),
(30, 'Beaulah Gusikowski', 'dhermann@example.org', 'n', '2023-01-18 22:59:30', '12dbe2c312abfeb035c532e130c97591', NULL, '2023-01-18 22:59:30', '2023-01-18 22:59:30'),
(31, 'Zack Bruen', 'brooklyn32@example.com', 'n', '2023-01-18 22:59:30', 'dea7bf3b8af30233ccc1708e0ef00414', NULL, '2023-01-18 22:59:30', '2023-01-18 22:59:30'),
(32, 'Kaylah Rempel MD', 'timmothy.kertzmann@example.net', 'f', '2023-01-18 22:59:32', 'b9a3fcdf7ac19a8e572c9a80a4b0168c', NULL, '2023-01-18 22:59:32', '2023-01-18 22:59:32'),
(33, 'Marge Zemlak Sr.', 'rashad44@example.net', 'n', '2023-01-18 22:59:32', 'b9faee2176acfa0c0790e5bf9d78f52b', NULL, '2023-01-18 22:59:32', '2023-01-18 22:59:32'),
(34, 'Prof. Edward Williamson', 'kitty.lowe@example.com', 'm', '2023-01-18 22:59:32', '8d0f68767b3e0b944436caebffbc199d', NULL, '2023-01-18 22:59:32', '2023-01-18 22:59:32'),
(35, 'Althea Cummings DVM', 'margaret84@example.com', 't', '2023-01-18 22:59:32', 'fd33954dc5b7deab25228742234b44b2', NULL, '2023-01-18 22:59:32', '2023-01-18 22:59:32'),
(36, 'Karen Lakin', 'morissette.alvera@example.net', 'n', '2023-01-18 22:59:32', '75a1a58aad3b8ead277f688e6da297e8', NULL, '2023-01-18 22:59:32', '2023-01-18 22:59:32'),
(37, 'Hester Champlin', 'qcronin@example.net', 'f', '2023-01-18 22:59:34', '5cf4a0b3d3ffce45eae4edc90b16e2b0', NULL, '2023-01-18 22:59:34', '2023-01-18 22:59:34'),
(38, 'Mr. Lonzo McKenzie Jr.', 'rahul.klein@example.org', 'f', '2023-01-18 22:59:34', '81f37c2eed39d6264af9c68e95d4c8bc', NULL, '2023-01-18 22:59:34', '2023-01-18 22:59:34'),
(39, 'Nettie Kemmer', 'abigale38@example.org', 't', '2023-01-18 22:59:34', 'faf688893c78d5c7ea3e4343c1b0da7f', NULL, '2023-01-18 22:59:34', '2023-01-18 23:22:44'),
(40, 'Matt Pfeffer', 'willis.bins@example.net', 'm', '2023-01-18 22:59:34', '7a8c092477209c4909307d9728a04c5d', NULL, '2023-01-18 22:59:34', '2023-01-18 22:59:34'),
(41, 'Verlie Wilkinson', 'crist.olga@example.net', 'n', '2023-01-18 22:59:34', '38d4ea8766c8e0ada6617681bf2ac60a', NULL, '2023-01-18 22:59:34', '2023-01-18 22:59:34'),
(42, 'Ms. Jadyn Mante', 'vicky.heller@example.net', 't', '2023-01-18 22:59:35', '82094fa910e756a3da0192e58adb4204', NULL, '2023-01-18 22:59:35', '2023-01-18 22:59:35'),
(43, 'Mr. Roderick Robel', 'rau.ted@example.net', 'f', '2023-01-18 22:59:35', 'ef69bd0714931d368da94ff62e2f9e39', NULL, '2023-01-18 22:59:35', '2023-01-18 22:59:35'),
(44, 'Clement Armstrong', 'gcruickshank@example.org', 'n', '2023-01-18 22:59:35', '2c6f4e9cd42d830fefeb9b56137151cf', NULL, '2023-01-18 22:59:35', '2023-01-18 22:59:35'),
(45, 'Rosalyn Hackett', 'aondricka@example.net', 'f', '2023-01-18 22:59:35', 'f9ada8d7e785997d5897e0814220bb3b', NULL, '2023-01-18 22:59:35', '2023-01-18 22:59:35'),
(46, 'Morgan Roberts', 'gbogan@example.com', 't', '2023-01-18 22:59:35', 'e7d22784662f723a72f5f98989850a1f', NULL, '2023-01-18 22:59:35', '2023-01-18 22:59:35'),
(47, 'Tabitha Rutherford', 'liza67@example.net', 't', '2023-01-18 22:59:36', 'e643a6a34c4260f66a5133b1b898e13d', NULL, '2023-01-18 22:59:36', '2023-01-18 22:59:36'),
(48, 'Prof. Melba VonRueden PhD', 'ylabadie@example.org', 'f', '2023-01-18 22:59:36', 'fcc81da2597ab73d3a6a2a0af6ecce2a', NULL, '2023-01-18 22:59:36', '2023-01-18 22:59:36'),
(49, 'Prof. Johnnie Kreiger II', 'easton.spencer@example.net', 'n', '2023-01-18 22:59:36', 'c9b3664da860ae2e4d82b5b487f70939', NULL, '2023-01-18 22:59:36', '2023-01-18 22:59:36'),
(50, 'Savannah Hoeger', 'karl.schuppe@example.com', 'n', '2023-01-18 22:59:36', 'cf59a7e6f01e8c0d8d662299d6e8db39', NULL, '2023-01-18 22:59:36', '2023-01-18 22:59:36'),
(51, 'Mr. Eusebio Stehr', 'qziemann@example.org', 'f', '2023-01-18 22:59:36', '3776ae5d2bd30e51af1f8253822d9b29', NULL, '2023-01-18 22:59:36', '2023-01-18 22:59:36'),
(52, 'Addie Kris', 'waters.lindsey@example.org', 'f', '2023-01-18 23:02:03', 'fee6f9ff6c8c788135660f03c77029e3', NULL, '2023-01-18 23:02:03', '2023-01-18 23:02:03'),
(53, 'Jackie Kunze', 'kgoyette@example.net', 't', '2023-01-18 23:02:03', 'effead05b96c6d5031c97ae03a082a1b', NULL, '2023-01-18 23:02:03', '2023-01-18 23:02:03'),
(54, 'Brian Trantow', 'pwalsh@example.net', 'm', '2023-01-18 23:02:03', 'f88194223e12d8b3823ddbb27e9a4c18', NULL, '2023-01-18 23:02:03', '2023-01-18 23:02:03'),
(55, 'Otho Hoeger', 'storphy@example.com', 'm', '2023-01-18 23:02:03', '24f1b435028fd05ac01ed924b4adf5ef', NULL, '2023-01-18 23:02:03', '2023-01-18 23:02:03'),
(56, 'Roman Hartmann', 'kamryn.becker@example.org', 'f', '2023-01-18 23:02:03', '098df7bdc4d173b18ebade6fa0b1d569', NULL, '2023-01-18 23:02:03', '2023-01-18 23:02:03');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
