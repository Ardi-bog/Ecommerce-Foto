-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 02:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotomedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$beo2ZIbljDhW25TVAICO7eOZRNH9pHVXpREdOj6RrIUT7R1ih7XZa', NULL, NULL, NULL);

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `hapus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `hapus`, `created_at`, `updated_at`) VALUES
(1, 'Wedding', 0, '2023-03-05 04:20:56', '2023-03-05 04:38:35');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_04_124046_admin', 1),
(6, '2023_03_05_004659_kategori', 1),
(7, '2023_03_05_004707_vendor', 1),
(8, '2023_03_05_005438_pesanan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `waktu_awal` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_user`, `id_vendor`, `waktu_awal`, `waktu_akhir`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-03-06 00:10:13', '2023-03-07 00:10:15', 'Keterangan', '2023-03-02 12:00:00', '2023-03-02 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dony', 'dony@gmail.com', NULL, '$2y$10$kWoWQtPEbAwilkHxBkiPLeX8MY5w4lyXVT9kxWGl5WFCYaBE0TgPC', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `paket` text DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `hapus` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `like` int(20) NOT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `jenis_vendor` int(11) DEFAULT 1,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `asal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `nama_vendor`, `alamat`, `no_telp`, `foto`, `paket`, `id_kategori`, `hapus`, `created_at`, `updated_at`, `username`, `password`, `like`, `harga`, `jenis_vendor`, `facebook`, `instagram`, `asal`) VALUES
(1, 'Vendor', 'Jl Sawojajar 11', '0812314123', '1678040605_pexels-trung-nguyen-1751682.jpg', 'Selamat datang di Foto Wedding Indonesia, kami adalah vendor foto wedding yang siap membantu Anda untuk mengabadikan momen-momen terindah dalam hidup Anda. Dengan tim fotografer dan editor yang berpengalaman, kami menjamin hasil karya yang berkualitas tinggi dan memuaskan hati klien.\r\n\r\nKami menawarkan paket layanan yang lengkap, mulai dari pengambilan gambar pre-wedding, dokumentasi acara pernikahan, hingga pembuatan album foto. Kami juga dapat menyesuaikan gaya fotografi sesuai dengan keinginan klien, baik itu gaya klasik atau modern.\r\n\r\nBerbagai testimoni dari klien kami yang puas dapat dilihat di website kami, sehingga Anda dapat melihat langsung kualitas layanan yang kami berikan. Selain itu, kami juga menawarkan harga yang kompetitif dan promo khusus untuk memudahkan Anda dalam memilih layanan yang sesuai dengan kebutuhan Anda.', 1, 0, '2023-03-05 11:52:34', '2023-03-22 13:19:00', 'vendor', '$2y$10$sWXADkUkIUVTht8E4xllgOUXQv.B0V2dj7xfAczP/0yXeKwLDDFU2', 1, '200000', 1, 'facebook', 'instagram', 'Malang'),
(2, 'Vendor Wedding', 'Jl Sawojajar 11', '0812314123', 'wedding1.jpg', 'Selamat datang di Foto Wedding Indonesia, kami adalah vendor foto wedding yang siap membantu Anda untuk mengabadikan momen-momen terindah dalam hidup Anda. Dengan tim fotografer dan editor yang berpengalaman, kami menjamin hasil karya yang berkualitas tinggi dan memuaskan hati klien.\n\nKami menawarkan paket layanan yang lengkap, mulai dari pengambilan gambar pre-wedding, dokumentasi acara pernikahan, hingga pembuatan album foto. Kami juga dapat menyesuaikan gaya fotografi sesuai dengan keinginan klien, baik itu gaya klasik atau modern.\n\nBerbagai testimoni dari klien kami yang puas dapat dilihat di website kami, sehingga Anda dapat melihat langsung kualitas layanan yang kami berikan. Selain itu, kami juga menawarkan harga yang kompetitif dan promo khusus untuk memudahkan Anda dalam memilih layanan yang sesuai dengan kebutuhan Anda.', 1, 0, '2023-03-05 11:52:34', '2023-03-05 13:37:58', 'vendor2', '$2y$10$teeHH51iibdYjifStyybqu.jvAx0fnZ1rhpImgquHHUl9jBMys8Q6', 0, '2000000', 2, '', '', ''),
(3, 'Vendor Wedding 1', 'alamat', '08123412931', 'wedding3.jpg', 'Selamat datang di Foto Wedding Indonesia, kami adalah vendor foto wedding yang siap membantu Anda untuk mengabadikan momen-momen terindah dalam hidup Anda. Dengan tim fotografer dan editor yang berpengalaman, kami menjamin hasil karya yang berkualitas tinggi dan memuaskan hati klien.\n\nKami menawarkan paket layanan yang lengkap, mulai dari pengambilan gambar pre-wedding, dokumentasi acara pernikahan, hingga pembuatan album foto. Kami juga dapat menyesuaikan gaya fotografi sesuai dengan keinginan klien, baik itu gaya klasik atau modern.\n\nBerbagai testimoni dari klien kami yang puas dapat dilihat di website kami, sehingga Anda dapat melihat langsung kualitas layanan yang kami berikan. Selain itu, kami juga menawarkan harga yang kompetitif dan promo khusus untuk memudahkan Anda dalam memilih layanan yang sesuai dengan kebutuhan Anda.', 1, 0, '2023-03-14 11:22:28', '2023-03-16 12:45:22', 'vendor3', '$2y$10$TmSerRz6V/vDpvXTYE3l..FqPoGlcwfozIeCVWYpCoWn7X4G2Sh..', 0, '2000000', 2, '1facebook', '1instagram', 'malang1');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_slider`
--

CREATE TABLE `vendor_slider` (
  `id` int(11) NOT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `slider` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_slider`
--

INSERT INTO `vendor_slider` (`id`, `id_vendor`, `slider`, `updated_at`, `created_at`) VALUES
(4, 1, 'wedding1.jpg', '2023-03-14 13:20:59', '2023-03-14 13:20:59'),
(5, 1, 'wedding3.jpg', '2023-03-15 05:15:16', '2023-03-15 05:15:16'),
(6, 1, '1678984511_1678025075_pexels-trung-nguyen-1751682.jpg', '2023-03-16 16:35:11', '2023-03-16 16:35:11'),
(7, 1, '1678984558_wedding.jpg', '2023-03-16 16:35:58', '2023-03-16 16:35:58'),
(8, 18, '1679485385_ultah.jpg', '2023-03-22 11:43:05', '2023-03-22 11:43:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_slider`
--
ALTER TABLE `vendor_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vendor_slider`
--
ALTER TABLE `vendor_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
