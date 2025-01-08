-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 02:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukm_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ukm_id` int(15) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `image`, `ukm_id`, `user_id`, `title`, `description`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(3, 'images/activities/d9VEfYVGvg2fav3dIyj7BFnYaxPOoZjdhw5TO0Dm.jpg', 4, NULL, 'Latihan Kader', 'Kegiatan Rutin dalam menyambut Calon Anggota Baru UKM IK', '2024-01-01', '2024-01-02', '2024-11-17 00:11:32', '2024-12-06 04:16:14'),
(5, 'images/activities/mlvZ8i5QKHMWILbwUK5mXyq7M7N1oHCTSqw9MptW.jpg', 4, NULL, 'HUT UKM IK', 'Perayaan Hari Ulang Tahun UKMIK', '2024-12-06', '2024-12-07', '2024-12-06 04:12:02', '2024-12-06 04:12:02'),
(7, 'images/activities/TSHfk9ZyC6hDZgSt4ZTxgRyLE6j66GigyanvQ6vf.jpg', 9, NULL, 'Turnamen Futsal UTDI', '**Turnamen Futsal UTDI** adalah ajang kompetisi futsal antar mahasiswa Universitas Teknologi Digital Indonesia (UTDI) yang bertujuan untuk meningkatkan semangat olahraga, kebersamaan, dan kompetisi sehat di kalangan mahasiswa. Turnamen ini mengundang tim futsal dari berbagai fakultas untuk bersaing dalam pertandingan yang seru dan menantang. Selain sebagai wadah untuk menyalurkan hobi, Turnamen Futsal UTDI juga bertujuan untuk mempererat tali persaudaraan antar mahasiswa, serta menciptakan atmosfer sportifitas yang tinggi di kampus.', '2024-12-13', '2024-12-15', '2024-12-12 03:39:13', '2024-12-12 03:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE `documentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_03_023605_create_ukms_table', 1),
(5, '2024_11_03_023606_create_activities_table', 1),
(6, '2024_11_03_023607_create_documentations_table', 1),
(7, '2024_11_03_023608_create_contacts_table', 1),
(8, '2024_11_03_023610_create_ukm_users_table', 1),
(9, '2024_11_03_090947_create_ukms_table', 2),
(10, '2024_11_03_090949_create_activities_table', 3),
(11, '2024_11_20_122011_add_timestamps_to_ukm_user_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$12$F1f2JSb61NFfUt44B/cUm.3fYeG8JySUyI23FXa6heKGd0wE/3Cje', '2024-12-24 18:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GIJ4Gz9eUim7eRK38sE32JadSbfpfG4jFPqa2Vb0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVWdXSFU0QVBTV1k0aTJlbzVPaTZxZW5Fb2o0S0tRZ21HV295UkkySiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1735389085),
('MZjrEQiazDxeWOTkJrREvqnkLUHCJXNtnBpHwbAP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUxTTjdISW1uZm52MmE0S0Q5ODdzWHFHTURtYUF1YlRiVHZ0aGVPOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91a20iO319', 1735340952);

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id`, `name`, `description`, `mission`, `logo_url`, `created_at`, `updated_at`) VALUES
(4, 'UKM Informatika & Komputer', 'UKM Informatika & Komputer Universitas Teknologi Digital Indonesia (UTDI) adalah unit kegiatan mahasiswa yang berfokus pada pengembangan keterampilan di bidang teknologi informasi dan komputer. UKM ini menjadi wadah bagi mahasiswa yang memiliki minat dan bakat dalam dunia pemrograman, pengembangan perangkat lunak, jaringan komputer, dan teknologi digital lainnya. Melalui berbagai kegiatan, seperti pelatihan, workshop, kompetisi, dan proyek teknologi, UKM Informatika & Komputer UTDI bertujuan untuk meningkatkan kemampuan teknis anggotanya serta mendorong inovasi di bidang IT. UKM ini juga memberikan kesempatan bagi mahasiswa untuk berkolaborasi dan berbagi pengetahuan, serta mengaplikasikan ilmu yang didapatkan di dunia nyata. Test', 'Script JavaScript di bagian bawah digunakan untuk mengontrol tombol \"Close\". Saya menambahkan event listener pada tombol dengan kelas .close-modal untuk menyembunyikan modal saat tombol diklik.', 'logos/jI9TgTVbCvKuG6uA9DapZD2tVdo9YaY5TGJXIZPu.png', '2024-11-09 23:45:39', '2024-12-24 18:01:20'),
(5, 'UKM Taekwondo UTDI', 'Unit Kegiatan Mahasiswa Taekwondo di Kampus UTDI', 'test', 'ukm_logos/dmsjSdZZ4BYHNmRuJTlFurIIWSKzJjtuOwI0GUMk.png', '2024-11-09 23:49:30', '2024-12-15 00:08:06'),
(6, 'UKM Paduan Suara UTDI', 'UKM Paduan Suara Universitas Teknologi Digital Indonesia (UTDI) adalah unit kegiatan mahasiswa yang mengajak mahasiswa untuk mengembangkan bakat dan minat dalam bidang musik, khususnya paduan suara. UKM ini menjadi wadah bagi mahasiswa yang memiliki kecintaan terhadap dunia musik dan vokal, serta berkomitmen untuk memupuk kerjasama tim dan kekompakan dalam bernyanyi. Melalui berbagai latihan dan penampilan, UKM Paduan Suara UTDI tidak hanya berfokus pada pengembangan keterampilan vokal, tetapi juga memperkenalkan kekayaan budaya musik Indonesia serta internasional. UKM ini berperan sebagai sarana untuk menumbuhkan semangat kreatif, disiplin, dan kolaborasi di kalangan mahasiswa.', NULL, 'logos/vSHlVVP6whqDHpJLHqIN8haa9d8NTeAm4FRYwobS.png', '2024-11-10 07:49:19', '2024-12-12 03:35:12'),
(9, 'UKM Futsal UTDI', 'UKM yang berfokus pada kegiatan olahraga untuk menjaga kebugaran tubuh.', NULL, 'logos/lpOcRFLrMnCjwXlDmfVlQ30ovxzcswqmzLcj9mbH.jpg', '2024-11-10 07:49:19', '2024-12-19 06:00:02'),
(10, 'UKM Mapala Wamadika', 'UKM yang memiliki aktivitas di alam bebas, seperti hiking, camping, dan konservasi alam.', NULL, 'logos/u98x1CZqI1r0rmuLL0R9ANgtbM80rQnetxcJCIqx.png', '2024-11-10 07:49:19', '2024-12-12 03:32:55'),
(12, 'UKM Wamika UTDI', 'UKM Wahana Aspirasi Mahasiswa Islam (WAMI) Kampus Universitas Teknologi Digital Indonesia adalah organisasi kemahasiswaan yang bertujuan untuk menumbuhkan semangat keberagaman, ukhuwah, dan kepedulian sosial di kalangan mahasiswa. WAMI berfokus pada pembinaan karakter melalui kegiatan yang berbasis pada nilai-nilai Islam, serta menyediakan wadah bagi mahasiswa untuk mengembangkan potensi diri dalam bidang keagamaan, sosial, dan intelektual. Melalui berbagai program, seperti kajian, pelatihan, dan kegiatan sosial, WAMI berusaha menjadi inspirasi bagi mahasiswa untuk berkontribusi pada masyarakat dengan semangat kebersamaan dan rasa tanggung jawab.', NULL, 'logos/iOLydl1a6dSk39H7Um8hVZSdRM7LGY4vTHvb9THl.png', '2024-12-12 03:29:55', '2024-12-12 03:32:33'),
(20, 'sssss', 'aqws', NULL, 'logos/gbd6lja6117ZjgtkYPCL07BYh7cXbSK7BTiDpd7X.png', '2024-12-23 02:53:03', '2024-12-24 17:18:15'),
(21, '1111111', '11111111', NULL, 'logos/BVdo0pwHRrdV30gz5CAbIZ2XGxV68axA8qgwDrq7.png', '2024-12-23 02:54:31', '2024-12-24 17:17:53'),
(23, '11312312', '2131231', NULL, 'logos/9d6gjBhxhoiC805wdAPSnQihoBdA7XZIiuO2Xjvr.png', '2024-12-24 17:23:13', '2024-12-24 17:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `ukm_user`
--

CREATE TABLE `ukm_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'user',
  `ukm_id` int(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ukm_user`
--

INSERT INTO `ukm_user` (`user_id`, `role`, `ukm_id`, `created_at`, `updated_at`) VALUES
(3, 'user', 4, NULL, NULL),
(3, 'user', 5, NULL, NULL),
(6, 'user', 4, NULL, NULL),
(6, 'user', 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$8ER1KmVWSv3lFlQWBZbL/emYWLRl8tT3Hkj4F8UX4zvkRGHWuAD6S', NULL, '2024-11-02 22:22:34', '2024-12-19 06:24:05'),
(3, 'user', 'user', 'user@gmail.com', NULL, '$2y$12$gNfaKfTl30dhDpOrB8cWr.x7JI.BOGFXCaidIDbhgk8qAMtZiY7bC', NULL, '2024-11-06 04:30:05', '2024-12-19 06:25:21'),
(6, 'user3', 'user', 'user3@gmail.com', NULL, '$2y$12$gNfaKfTl30dhDpOrB8cWr.x7JI.BOGFXCaidIDbhgk8qAMtZiY7bC', NULL, '2024-12-06 03:39:45', '2024-12-06 03:39:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ukm_id` (`ukm_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `documentations`
--
ALTER TABLE `documentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ukm_user`
--
ALTER TABLE `ukm_user`
  ADD PRIMARY KEY (`user_id`,`ukm_id`),
  ADD KEY `ukm_user_ibfk_1` (`ukm_id`);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ukm_user`
--
ALTER TABLE `ukm_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`ukm_id`) REFERENCES `ukm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ukm_user`
--
ALTER TABLE `ukm_user`
  ADD CONSTRAINT `ukm_user_ibfk_1` FOREIGN KEY (`ukm_id`) REFERENCES `ukm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ukm_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
