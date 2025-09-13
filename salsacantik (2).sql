-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2025 at 03:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salsacantik`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_bale`
--

CREATE TABLE `db_bale` (
  `id_hewan` int(11) NOT NULL,
  `nama_hewan` varchar(25) NOT NULL,
  `jenis_hewan` varchar(25) NOT NULL,
  `asal` text NOT NULL,
  `jumlah` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_bale`
--

INSERT INTO `db_bale` (`id_hewan`, `nama_hewan`, `jenis_hewan`, `asal`, `jumlah`) VALUES
(4, 'Harimau sumatra', 'Mamalia (karnivora)', 'sumatra,Indonesia', 600),
(5, 'Gajah Afrika', 'Mamalia (herbivora)', 'Afrika', 415),
(6, 'Komodo', 'Reptil (kadal besar)', 'pulau komodo,Rinca,flores (indonesia)', 38),
(27, 'kupu-kupu raja(Monarch Bu', 'serangga', 'Amerika Utara', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','operator','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '12345', 'admin'),
(2, 'operator1', '12345', 'operator'),
(3, 'user1', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_bale`
--
ALTER TABLE `db_bale`
  ADD PRIMARY KEY (`id_hewan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_bale`
--
ALTER TABLE `db_bale`
  MODIFY `id_hewan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
