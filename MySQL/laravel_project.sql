-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2021 pada 15.45
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_17_094714_create_prodis_table', 1),
(5, '2021_06_17_094730_create_products_table', 1),
(6, '2021_06_19_055509_create_types_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_prodi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id`, `image`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(10, '1624194927.jpg', 'Informatika', '2021-06-20 20:15:27', '2021-06-20 20:15:27'),
(11, '1624194942.jpg', 'Teknologi Informasi', '2021-06-20 20:15:42', '2021-06-20 20:15:42'),
(12, '1624194954.jpg', 'Elektro', '2021-06-20 20:15:54', '2021-06-20 20:15:54'),
(13, '1624194972.jpg', 'Sistem Informasi', '2021-06-20 20:16:12', '2021-06-20 20:16:12'),
(14, '1624194988.jpg', 'Rekayasa Perangkat Lunak', '2021-06-20 20:16:28', '2021-06-23 18:38:48'),
(16, '1624705449.jpg', 'Broadcast', '2021-06-26 18:04:09', '2021-06-26 18:04:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `title`, `thumbnail`, `type_id`, `user_id`, `tahun`, `created_at`, `updated_at`) VALUES
(4, 'tugas-perbedaan-proses-dan-thread.svg', '1624275715.jpg', 3, 13, '2020', '2021-06-21 18:41:55', '2021-06-21 18:42:14'),
(5, 'produk-1-update.pdf', '1624289758.jpg', 3, 13, '2020', '2021-06-21 18:47:38', '2021-06-21 22:35:58'),
(7, 'tugas-perbedaan-proses-dan-thread.pdf', NULL, 3, 13, '2021', '2021-06-21 18:48:28', '2021-06-21 18:49:05'),
(9, 'uji-coba-str-slug-dengan-time-kedua1624290157.pptx', NULL, 3, 13, '2028', '2021-06-21 22:42:37', '2021-06-22 17:30:52'),
(10, 'uji-coba-str-slug-dengan-time-ketiga-1624290203.pptx', NULL, 3, 13, '2020', '2021-06-21 22:43:23', '2021-06-23 19:04:46'),
(11, 'produk-1-update-1624704240.pdf', '1624704240.jpg', 3, 18, '2020', '2021-06-26 17:44:00', '2021-06-26 17:45:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Skripsi', NULL, NULL),
(3, 'Jurnal', NULL, NULL),
(4, 'Makalah', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gender` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user` enum('admin','mahasiswa','dosen') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `prodi_id`, `gender`, `address`, `nomor_induk`, `level_user`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'none.jpg', 'admin@email.tes', NULL, 'Laki-Laki', 'Pontianak, Kalimantan Barat', 'admin@example.com', 'admin', '$2y$10$VUmgcF9VmqMKqY4NHHhrw.kr.wfXg7yvD.uz/NBaV6p/Fs7.fJemC', NULL, NULL, '2021-06-20 20:58:42'),
(4, 'Muhammad Nurul Hidayatullah', 'none.jpg', 'dosen@tes1', NULL, 'Laki-Laki', 'Karanganyar\r\nPaiton', '12345432123456', 'dosen', '$2y$10$E4p8hCmSp.Vj./voLa8.r.qVbUS4F1cv1v21BOxYzylo/MuXnNMFi', NULL, '2021-06-19 17:30:54', '2021-06-23 19:02:20'),
(8, 'Hafid Mahasiswa Update', 'none.jpg', 'hafidUpdate@gmail.com', NULL, 'Laki-Laki', 'Karanganyar\r\nPaiton Update', '234567865432', 'mahasiswa', '$2y$10$xVgQoVGcNMhJLkYF4q3F7Ok1d19A5lEhGp98P.qCv8P3VeTzmt0nq', NULL, '2021-06-20 12:50:02', '2021-06-20 13:28:34'),
(10, 'Dosen Uji Coba Update', 'none.jpg', 'dosen@example.comUpdate', NULL, 'Laki-Laki', 'Karanganyar\r\nPaiton Udpate', '12345697654325', 'dosen', '$2y$10$qWviDpuf09g2ioTNUmw.u.s7NBk3USj2R60SX5zmEOZJFmfH.vXpK', NULL, '2021-06-20 20:11:51', '2021-06-20 20:13:08'),
(13, 'Muhammad Nurul Hidayatullah', 'none.jpg', 'nurul@gmail.com', 11, 'Laki-Laki', 'Karanganyar\r\nPaiton', '1821500073', 'mahasiswa', '$2y$10$DcZ3gkKFvmXyR0TuvJWIK.UMJqIYHMWk3etcS9RnAi07rSzGo8WW6', NULL, '2021-06-20 21:05:05', '2021-06-21 13:34:35'),
(14, 'Hafid Dosen', 'none.jpg', 'hafid@gmail.comUpdate', NULL, 'Laki-Laki', 'Karanganyar\r\nPaiton3', '0909090909', 'dosen', '$2y$10$Ryve7ZEMXtgrsf6wpC7rLuBsCmICpgrWo0K/okaxAV./C/9vtIRF.', NULL, '2021-06-20 21:05:41', '2021-06-21 13:47:49'),
(18, 'lutfi', '1624701776.jpg', 'lutfi@gmail.com', 10, 'Laki-Laki', 'dfghjkjhgf', '12121212', 'mahasiswa', '$2y$10$9poDPP5bdV0asRxXdq..gOLXYQluiXDCLmDr.a0kMMMykiddZ/kkW', NULL, '2021-06-26 10:57:10', '2021-06-26 17:02:56'),
(19, 'Dosen', '1624703009.png', 'muhammadnurulhidayatullah7@gmail.com', NULL, 'Laki-Laki', 'Karanganyar\r\nPaiton', '13131313', 'dosen', '$2y$10$jNp8NpTt52S5p1a/Y7iKvu2n9Bofx/swfkF5tnu.ozfMfDNI2/dbW', NULL, '2021-06-26 16:55:56', '2021-06-26 17:23:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_2` (`type_id`),
  ADD KEY `products_ibfk_3` (`user_id`);

--
-- Indeks untuk tabel `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nomor_induk_unique` (`nomor_induk`),
  ADD KEY `users_ibfk_1` (`prodi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
