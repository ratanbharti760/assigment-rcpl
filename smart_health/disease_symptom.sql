-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2026 at 10:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `disease_symptom`
--

CREATE TABLE `disease_symptom` (
  `id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `symptom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disease_symptom`
--

INSERT INTO `disease_symptom` (`id`, `disease_id`, `symptom_id`) VALUES
(1, 1, 22),
(2, 1, 23),
(3, 1, 10),
(4, 1, 11),
(5, 1, 39),
(6, 1, 40),
(7, 1, 47),
(8, 1, 50),
(9, 2, 10),
(10, 2, 11),
(11, 2, 40),
(12, 2, 47),
(13, 2, 29),
(14, 2, 50),
(15, 3, 22),
(16, 3, 23),
(17, 3, 9),
(18, 3, 20),
(19, 3, 51),
(20, 4, 5),
(21, 4, 3),
(22, 4, 12),
(23, 4, 23),
(24, 4, 2),
(25, 4, 42),
(26, 5, 7),
(27, 5, 6),
(28, 5, 38),
(29, 5, 46),
(30, 5, 44),
(31, 6, 25),
(32, 6, 23),
(33, 6, 42),
(34, 6, 20),
(35, 6, 53),
(36, 7, 30),
(37, 7, 26),
(38, 7, 41),
(39, 7, 18),
(40, 7, 43),
(41, 7, 33),
(42, 8, 31),
(43, 8, 28),
(44, 8, 37),
(45, 8, 48),
(46, 8, 52),
(47, 9, 22),
(48, 9, 11),
(49, 9, 46),
(50, 9, 9),
(51, 9, 7),
(52, 10, 55),
(53, 10, 12),
(54, 10, 20),
(55, 10, 3),
(56, 10, 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease_symptom`
--
ALTER TABLE `disease_symptom`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disease_symptom`
--
ALTER TABLE `disease_symptom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
