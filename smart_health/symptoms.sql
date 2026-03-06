-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2026 at 10:50 AM
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
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `symptom_id` int(11) NOT NULL,
  `symptom_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`symptom_id`, `symptom_name`) VALUES
(1, 'Cold'),
(2, 'Runny Nose'),
(3, 'Sneezing'),
(4, 'Fever'),
(5, 'Cough'),
(6, 'Body Pain'),
(7, 'Dry Cough'),
(8, 'Loss of Smell'),
(9, 'High Fever'),
(10, 'Joint Pain'),
(11, 'Fatigue'),
(12, 'Chills'),
(13, 'Weakness'),
(14, 'Headache'),
(15, 'Chest Pain'),
(16, 'Shortness of Breath'),
(17, 'Chest Tightness'),
(18, 'Nausea'),
(19, 'Sensitivity to Light'),
(20, 'Vomiting'),
(21, 'Diarrhea'),
(22, 'Abdominal Pain'),
(23, 'Heartburn'),
(24, 'Chest Discomfort'),
(25, 'Frequent Urination'),
(26, 'Increased Thirst'),
(27, 'Dizziness'),
(28, 'Pale Skin'),
(29, 'Swelling'),
(30, 'Stiffness'),
(31, 'Back Pain'),
(32, 'Muscle Stiffness'),
(33, 'Facial Pain'),
(34, 'Nasal Congestion'),
(35, 'Itchy Eyes'),
(36, 'Sore Throat'),
(37, 'Difficulty Swallowing'),
(38, 'Ear Pain'),
(39, 'Hearing Difficulty'),
(40, 'Burning Urination'),
(41, 'Lower Abdominal Pain'),
(42, 'Severe Back Pain'),
(43, 'Blood in Urine'),
(44, 'Yellow Skin'),
(45, 'Dark Urine'),
(46, 'Sadness'),
(47, 'Loss of Interest'),
(48, 'Sleep Problems'),
(49, 'Nervousness'),
(50, 'Rapid Heartbeat'),
(51, 'Sweating'),
(52, 'Difficulty Sleeping'),
(53, 'Irritability'),
(54, 'High Body Temperature'),
(55, 'Dry Mouth'),
(56, 'Reduced Urination');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`symptom_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `symptom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
