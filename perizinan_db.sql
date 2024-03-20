-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2024 at 02:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perizinan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id_izin` int(11) NOT NULL,
  `id_orang_tua` int(11) NOT NULL,
  `tanggal_izin` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id_izin`, `id_orang_tua`, `tanggal_izin`, `tanggal_masuk`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, 3, '2022-12-15', '2022-12-09', 'jalan jalan', '2022-12-03 20:46:00', '2022-12-03 20:46:00'),
(9, 2, '2022-12-16', '2022-12-13', 'jalan jala', '2022-12-03 21:19:10', '2022-12-03 21:19:10'),
(10, 2, '2022-12-10', '2022-12-13', 'jalan jalan dirumah', '2022-12-03 21:25:20', '2022-12-03 21:25:20'),
(11, 1, '2022-12-01', '2022-12-09', 'jalan jala', '2022-12-03 21:27:30', '2022-12-03 21:27:30'),
(12, 3, '2023-01-24', '2023-01-24', 'sakit seee', '2022-12-31 19:08:56', '2022-12-31 19:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id_orang_tua` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_orang_tua` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id_orang_tua`, `id_user`, `nama_orang_tua`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 123456789, 'Sugianto', '081234562738', '2022-12-04 02:10:47', '2022-12-04 02:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `id_orang_tua` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama_santri` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id_santri`, `id_orang_tua`, `nis`, `nama_santri`, `created_at`, `updated_at`) VALUES
(1, 123456788, '1332132', 'Anti Gila', '2022-12-04 02:11:52', '2022-12-04 02:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$L1clpJ5ZB0Zs.Q5lRjP9zen4Luw4ALuMNItGFzBHCiadhnC/8TFKS', 'Administrator', '2022-12-04 01:10:25', '2022-12-04 01:49:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id_orang_tua`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id_orang_tua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
