-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 01:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_checklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `toilet_id` int(11) NOT NULL,
  `kloset` varchar(10) DEFAULT NULL,
  `wastafel` varchar(10) DEFAULT NULL,
  `lantai` varchar(10) DEFAULT NULL,
  `dinding` varchar(10) DEFAULT NULL,
  `kaca` varchar(10) DEFAULT NULL,
  `bau` varchar(10) DEFAULT NULL,
  `sabun` varchar(10) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `tanggal`, `toilet_id`, `kloset`, `wastafel`, `lantai`, `dinding`, `kaca`, `bau`, `sabun`, `users_id`) VALUES
(2, '2023-12-16 19:15:09', 321, 'Bersih', 'Bersih', 'Kotor', 'Kotor', 'Bersih', 'Tidak', 'Habis', 312210299),
(3, '2023-12-16 19:38:13', 323, 'Rusak', 'Kotor', 'Kotor', 'Kotor', 'Rusak', 'Ya', 'Hilang', 312210341),
(4, '2023-12-12 00:00:00', 327, 'Bersih', 'Kotor', 'Kotor', 'Kotor', 'Rusak', 'Ya', 'Ada', 312210294),
(6, '2023-12-13 00:00:00', 327, 'Bersih', 'Bersih', 'Bersih', 'Kotor', 'Bersih', 'Tidak', 'Ada', 312210346),
(7, '2023-12-15 00:00:00', 324, 'Kotor', 'Bersih', 'Bersih', 'Kotor', 'Bersih', 'Ya', 'Habis', 312210322),
(8, '2023-12-18 07:20:11', 328, 'Bersih', 'Kotor', 'Kotor', 'Bersih', 'Bersih', 'Tidak', 'Habis', 312210355),
(9, '2023-12-18 07:57:17', 325, 'Kotor', 'Kotor', 'Rusak', 'Kotor', 'Kotor', 'Ya', 'Hilang', 312210318),
(11, '2023-12-18 10:40:49', 322, 'Bersih', 'Kotor', 'Kotor', 'Bersih', 'Bersih', 'Tidak', 'Ada', 312210282);

-- --------------------------------------------------------

--
-- Table structure for table `toilet`
--

CREATE TABLE `toilet` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(45) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toilet`
--

INSERT INTO `toilet` (`id`, `lokasi`, `keterangan`) VALUES
(320, 'Security', 'Sudah'),
(321, 'Office', 'Sudah'),
(322, 'Factory 2', 'Sudah'),
(323, 'Office', 'Sudah'),
(324, 'Factory 1', 'Belum'),
(325, 'Factory 2', 'Belum'),
(326, 'Office', 'Belum'),
(327, 'Office', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `nama`, `email`, `status`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'hidayat@mhs.pelitabangsa.ac.id', 'Aktif', 'Admin'),
(2, 'user', 'user', 'user', 'hidayat@mhs.pelitabangsa.ac.id', 'Non Aktif', 'Admin'),
(6, 'alex', 'alexales', 'Gultom Alexander', 'alexmania77@gmail.com', 'Aktif', 'Admin'),
(7, 'bagas', 'heinzfritz', 'Bagas Utina', 'bagasaurus11@gmail.com', 'Aktif', 'User'),
(8, 'calpin', 'mascalpin33', 'Calvin Putra', 'calpincalpin@gmail.com', 'Aktif', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_checklist_toilet_idx` (`toilet_id`),
  ADD KEY `fk_checklist_users1_idx` (`users_id`);

--
-- Indexes for table `toilet`
--
ALTER TABLE `toilet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
