-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2025 pada 08.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkatan1_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(13) NOT NULL,
  `customer_address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_phone`, `customer_address`, `created_at`, `updated_at`) VALUES
(9, 'Andi', '0878254123456', 'Jakarta Pusat', '2025-03-18 07:34:23', '2025-03-18 07:39:54'),
(10, 'Ratu', '0878254123123', 'Jakarta Timur', '2025-03-19 00:38:34', NULL),
(11, 'Panglima', '0878254123789', 'Jakarta Selatan', '2025-03-19 00:38:48', NULL),
(12, 'Wawan', '0878254123456', 'Jakarta Utara', '2025-03-19 00:39:13', NULL),
(13, 'Wanto', '0878254123789', 'Jakarta Barat', '2025-03-19 00:39:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `level_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', '2025-03-18 02:18:20', NULL),
(2, 'Owner', '2025-03-19 01:37:45', '2025-03-19 04:15:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_price` int(10) NOT NULL,
  `service_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_price`, `service_description`, `created_at`, `updated_at`) VALUES
(1, 'Cuci + Setrika', 10000, 'Per-Kilo', '2025-03-19 01:00:58', NULL),
(2, 'Cuci', 7000, 'Per-Kilo', '2025-03-19 01:01:19', NULL),
(3, 'Setrika', 5000, 'Per-Kilo', '2025-03-19 01:01:55', NULL),
(4, 'Express Bundling (Cuci + Setrika)', 20000, 'Pengerjaan 1 hari (Per-Kilo)', '2025-03-19 01:03:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order`
--

CREATE TABLE `trans_order` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `trans_code` varchar(30) NOT NULL,
  `order_date` date NOT NULL,
  `order_end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `pay` int(11) NOT NULL,
  `change_pay` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order`
--

INSERT INTO `trans_order` (`id`, `id_customer`, `trans_code`, `order_date`, `order_end_date`, `status`, `pay`, `change_pay`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(25, 11, 'TR 032525001', '0000-00-00', '2025-03-27', 1, 0, 0, 36000, '2025-03-25 02:02:30', '2025-03-25 02:02:30', 0),
(26, 10, 'TR 032525026', '0000-00-00', '2025-03-21', 1, 0, 0, 40000, '2025-03-25 02:03:48', '2025-03-25 02:03:48', 0),
(27, 10, 'TR 032525026', '0000-00-00', '2025-03-21', 1, 0, 0, 40000, '2025-03-25 02:53:02', '2025-03-25 02:53:02', 0),
(28, 10, 'TR 032525028', '0000-00-00', '2025-02-25', 1, 0, 0, 20000, '2025-03-25 02:53:22', '2025-03-25 02:53:22', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order_detail`
--

CREATE TABLE `trans_order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order_detail`
--

INSERT INTO `trans_order_detail` (`id`, `id_order`, `id_service`, `qty`, `subtotal`, `notes`, `created_at`, `updated_at`) VALUES
(5, 25, 1, 2, 5000, 'sdfsd', '2025-03-25 02:02:30', NULL),
(6, 25, 1, 1, 5000, 'sdfsdf', '2025-03-25 02:02:30', NULL),
(7, 25, 1, 3, 7000, 'sdfsdfsd', '2025-03-25 02:02:30', NULL),
(8, 26, 4, 2, 20000, 'bj', '2025-03-25 02:03:48', NULL),
(9, 27, 4, 2, 20000, 'bj', '2025-03-25 02:53:02', NULL),
(10, 28, 1, 2, 10000, 'sdfsd', '2025-03-25 02:53:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 2, 'admin', 'admin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2025-03-18 02:20:22', '2025-03-24 01:10:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_order_id_to_id_tr_detail` (`id_order`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  ADD CONSTRAINT `trans_order_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Ketidakleluasaan untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  ADD CONSTRAINT `trans_order_id_to_id_tr_detail` FOREIGN KEY (`id_order`) REFERENCES `trans_order` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
