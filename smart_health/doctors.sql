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
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `disease_id` int(11) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `specialization`, `mobile`, `disease_id`, `contact`) VALUES
(1, 'Dr. Sharma', 'General Physician', '9876500001', 1, '9876500001'),
(2, 'Dr. Rakesh Verma', 'General Physician', '9876500002', 1, '9876500002'),
(3, 'Dr. Neha Kapoor', 'General Physician', '9876500003', 1, '9876500003'),
(4, 'Dr. Mehta', 'Endocrinologist', '9876500004', 2, '9876500004'),
(5, 'Dr. Anjali Singh', 'Diabetologist', '9876500005', 2, '9876500005'),
(6, 'Dr. Raj Malhotra', 'Endocrinologist', '9876500006', 2, '9876500006'),
(7, 'Dr. Arvind Kumar', 'Cardiologist', '9876500007', 3, '9876500007'),
(8, 'Dr. Pooja Sharma', 'Cardiologist', '9876500008', 3, '9876500008'),
(9, 'Dr. Sandeep Roy', 'Cardiologist', '9876500009', 3, '9876500009'),
(10, 'Dr. Vivek Anand', 'Cardiologist', '9876500010', 3, '9876500010'),
(11, 'Dr. Singh', 'Neurologist', '9876500011', 4, '9876500011'),
(12, 'Dr. Kiran Rao', 'Neurologist', '9876500012', 4, '9876500012'),
(13, 'Dr. Manish Tiwari', 'Neurologist', '9876500013', 4, '9876500013'),
(14, 'Dr. Aditi Jain', 'Pulmonologist', '9876500014', 5, '9876500014'),
(15, 'Dr. Rohit Yadav', 'Pulmonologist', '9876500015', 5, '9876500015'),
(16, 'Dr. Sunita Das', 'Pulmonologist', '9876500016', 5, '9876500016'),
(17, 'Dr. Mahesh Gupta', 'Orthopedic', '9876500017', 6, '9876500017'),
(18, 'Dr. Alok Mishra', 'Orthopedic', '9876500018', 6, '9876500018'),
(19, 'Dr. Priya Nair', 'Orthopedic', '9876500019', 6, '9876500019'),
(20, 'Dr. Sneha Iyer', 'Dermatologist', '9876500020', 7, '9876500020'),
(21, 'Dr. Tarun Bansal', 'Dermatologist', '9876500021', 7, '9876500021'),
(22, 'Dr. Reena Thomas', 'Dermatologist', '9876500022', 7, '9876500022'),
(23, 'Dr. Amit Joshi', 'Psychiatrist', '9876500023', 8, '9876500023'),
(24, 'Dr. Kavita Rao', 'Psychiatrist', '9876500024', 8, '9876500024'),
(25, 'Dr. Rahul Sinha', 'Psychiatrist', '9876500025', 8, '9876500025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
