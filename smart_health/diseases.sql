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
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `specialization` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`disease_id`, `disease_name`, `description`, `specialization`) VALUES
(1, 'Common Cold', 'Viral infection affecting nose and throat', 'General Physician'),
(2, 'Flu', 'Influenza viral infection', 'General Physician'),
(3, 'COVID-19', 'Respiratory illness caused by coronavirus', 'Pulmonologist'),
(4, 'Dengue', 'Mosquito-borne viral disease', 'General Physician'),
(5, 'Malaria', 'Mosquito-borne parasitic disease', 'General Physician'),
(6, 'Typhoid', 'Bacterial infection caused by Salmonella', 'General Physician'),
(7, 'Pneumonia', 'Infection that inflames air sacs in lungs', 'Pulmonologist'),
(8, 'Asthma', 'Respiratory condition causing breathing difficulty', 'Pulmonologist'),
(9, 'Bronchitis', 'Inflammation of bronchial tubes', 'Pulmonologist'),
(10, 'Migraine', 'Severe headache disorder', 'Neurologist'),
(11, 'Food Poisoning', 'Illness caused by contaminated food', 'General Physician'),
(12, 'Gastritis', 'Inflammation of stomach lining', 'Gastroenterologist'),
(13, 'Acidity', 'Excess acid production in stomach', 'Gastroenterologist'),
(14, 'Appendicitis', 'Inflammation of appendix', 'Surgeon'),
(15, 'Diabetes', 'Chronic condition affecting blood sugar', 'Endocrinologist'),
(16, 'Hypertension', 'High blood pressure', 'Cardiologist'),
(17, 'Heart Disease', 'Disease affecting heart function', 'Cardiologist'),
(18, 'Anemia', 'Low red blood cell count', 'General Physician'),
(19, 'Arthritis', 'Joint inflammation disease', 'Orthopedic'),
(20, 'Back Pain Disorder', 'Chronic back pain condition', 'Orthopedic'),
(21, 'Sinusitis', 'Inflammation of sinuses', 'ENT Specialist'),
(22, 'Allergy', 'Immune system reaction', 'ENT Specialist'),
(23, 'Tonsillitis', 'Inflammation of tonsils', 'ENT Specialist'),
(24, 'Ear Infection', 'Infection in ear', 'ENT Specialist'),
(25, 'UTI', 'Urinary tract infection', 'Urologist'),
(26, 'Kidney Stone', 'Hard deposits in kidney', 'Urologist'),
(27, 'Jaundice', 'Yellowing of skin due to liver issue', 'General Physician'),
(28, 'Depression', 'Mood disorder', 'Psychiatrist'),
(29, 'Anxiety Disorder', 'Mental health disorder', 'Psychiatrist'),
(30, 'Insomnia', 'Sleep disorder', 'Psychiatrist'),
(31, 'Heat Stroke', 'Overheating of body', 'General Physician'),
(32, 'Dehydration', 'Loss of body fluids', 'General Physician');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`disease_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
