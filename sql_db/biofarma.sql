-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 06:29 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biofarma`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2020_06_06_070202_create_dataperangkats_table', 1),
(4, '2020_06_06_070332_create_datapengukurans_table', 1),
(5, '2020_06_06_170111_create_tentangs_table', 1),
(6, '2020_06_12_034903_create_settings_table', 2),
(7, '2020_06_18_001935_setlaporan', 3),
(8, '2020_06_18_004905_create_setmqtts_table', 4),
(9, '2020_06_18_005042_create_logs_table', 5),
(10, '2020_06_18_100529_create_vestiblerooms_table', 6),
(11, '2020_06_18_100550_create_dressingrooms_table', 6),
(12, '2020_06_18_100617_create_trfrooms_table', 6),
(13, '2020_06_18_100634_create_airlockrooms_table', 6),
(14, '2020_06_18_100650_create_ujirooms_table', 6),
(15, '2020_06_18_101338_create_satuans_table', 7),
(16, '2020_06_18_101546_create_ruangans_table', 7),
(17, '2020_06_20_054116_create_activity_log_table', 8),
(18, '2020_06_20_081908_create_activity_log_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id_monitoring` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `suhu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelembapan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekanan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alarm` tinyint(1) NOT NULL,
  `perangkat_id` int(10) UNSIGNED NOT NULL,
  `ruangan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perangkats`
--

CREATE TABLE `perangkats` (
  `id_perangkat` int(10) UNSIGNED NOT NULL,
  `no_seri` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_aktivasi` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `instansi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perangkats`
--

INSERT INTO `perangkats` (`id_perangkat`, `no_seri`, `latitude`, `longitude`, `tgl_aktivasi`, `user_id`, `instansi`, `no_tlp`, `status`, `created_at`) VALUES
(1, '0001', '-68.0012', '107.9138392', '2020-06-10', 1, 'Unikom', '085759066401', 'Aktif', '2020-06-09 10:40:20'),
(221, '002', '-69.13049', '107.8139920', '2020-06-09', 1, 'Unikom', '085759066401', 'Aktif', '2020-06-09 10:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'TRF Sample', 'trf_sample.png', NULL, NULL),
(2, 'Uji', 'uji.png', NULL, NULL),
(3, 'Air Lock', 'air_lock.png', NULL, NULL),
(4, 'Dressing', 'dressing.png', NULL, NULL),
(5, 'Vestibule', 'vestibule.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `satuans`
--

CREATE TABLE `satuans` (
  `id` int(10) UNSIGNED NOT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setapps`
--

CREATE TABLE `setapps` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_apps` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setapps`
--

INSERT INTO `setapps` (`id`, `nama_apps`, `icon`, `overview`, `created_at`, `updated_at`) VALUES
(1, 'BIOFARMA', 'uploads/posts/159159954779792840_2391637187769848_7805310428560490496_o.jpg', 'Bio Farma\'s competitive superiority in the field of biotech expertise is implemented through knowledge-based and R&D-base driven. Bio Farma\'s business focus is in line with the philosophy of serving a better quality of life. Bio Farma focuses on research, development, production and marketing of biological products, pharmaceutical products nationally and globally. Bio Farma plays an active role in developing vaccine research and technology, conducting new vaccine research in ensuring the independence of vaccine needs in the country as well as the availability of vaccines to meet the needs of quality and affordable vaccines in the world.', '2020-06-10 14:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setlaporan`
--

CREATE TABLE `setlaporan` (
  `id` int(10) UNSIGNED NOT NULL,
  `header_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setmqtts`
--

CREATE TABLE `setmqtts` (
  `id` int(10) UNSIGNED NOT NULL,
  `url_broker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qos` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keep_alive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setparameters`
--

CREATE TABLE `setparameters` (
  `id_setting` int(10) UNSIGNED NOT NULL,
  `suhu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelembapan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekanan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cahaya` tinyint(1) NOT NULL,
  `alarm` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setparameters`
--

INSERT INTO `setparameters` (`id_setting`, `suhu`, `kelembapan`, `tekanan`, `cahaya`, `alarm`, `created_at`) VALUES
(1, '30.00', '28.08', '35.00', 0, 127, '2020-06-12 02:56:40'),
(2, '35.00', '95.00', '130', 80, 127, '2020-06-12 20:53:03'),
(3, '28.00', '28.08', '30.00', 60, 127, '2020-06-12 20:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('Admin','Operator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `nik`, `instansi`, `jabatan`, `no_hp`, `foto`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aditiya Fadillah', '123456789', 'Unikom', 'Mahasiswa', '085759066401', 'uploads/posts/159159954779792840_2391637187769848_7805310428560490496_o.jpg', 'Admin', 'aditiyafadillah97@gmail.com', '2020-06-08 00:02:32', '$2y$10$DF6eCvy4LQSMfSj4wNmqiuP09ZLTHFCOzVWnm68eOWbQc41phK7G6', 'QV4cpHwf9ZYcU11J5rUewW5Qic6iuj9OHXR8rSW5ashD4yqjbtSaW6HirGZC', '2020-06-07 23:59:07', '2020-06-15 21:54:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id_monitoring`),
  ADD KEY `datapengukurans_perangkat_id_foreign` (`perangkat_id`),
  ADD KEY `ruangan_id` (`ruangan_id`);

--
-- Indexes for table `perangkats`
--
ALTER TABLE `perangkats`
  ADD PRIMARY KEY (`id_perangkat`),
  ADD UNIQUE KEY `dataperangkats_no_seri_unique` (`no_seri`),
  ADD KEY `dataperangkats_user_id_foreign` (`user_id`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setapps`
--
ALTER TABLE `setapps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setlaporan`
--
ALTER TABLE `setlaporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setmqtts`
--
ALTER TABLE `setmqtts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setparameters`
--
ALTER TABLE `setparameters`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id_monitoring` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `perangkats`
--
ALTER TABLE `perangkats`
  MODIFY `id_perangkat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setapps`
--
ALTER TABLE `setapps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setlaporan`
--
ALTER TABLE `setlaporan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setmqtts`
--
ALTER TABLE `setmqtts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setparameters`
--
ALTER TABLE `setparameters`
  MODIFY `id_setting` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD CONSTRAINT `datapengukurans_perangkat_id_foreign` FOREIGN KEY (`perangkat_id`) REFERENCES `perangkats` (`id_perangkat`) ON DELETE CASCADE,
  ADD CONSTRAINT `monitoring_ibfk_1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangans` (`id`);

--
-- Constraints for table `perangkats`
--
ALTER TABLE `perangkats`
  ADD CONSTRAINT `dataperangkats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
