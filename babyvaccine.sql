-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 05:32 PM
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
-- Database: `babyvaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appt_id` int(11) NOT NULL,
  `baby_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `appt_date` date NOT NULL,
  `appt_time` time NOT NULL,
  `notes` text DEFAULT NULL,
  `status` enum('Pending','Confirmed','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appt_id`, `baby_id`, `staff_id`, `vaccine_id`, `appt_date`, `appt_time`, `notes`, `status`) VALUES
(11, 1, 1, 13, '2026-01-14', '09:00:00', '1234567890', 'Confirmed'),
(12, 5, 5, 13, '2026-01-15', '09:00:00', 'anak saya sukamain roblok', 'Confirmed'),
(13, 5, 1, 13, '2026-01-22', '11:00:00', '', 'Pending'),
(15, 7, 1, 8, '2026-05-08', '11:00:00', 'anak saya cacat, dia suka main orblox', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `babies`
--

CREATE TABLE `babies` (
  `baby_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `baby_name` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `babies`
--

INSERT INTO `babies` (`baby_id`, `parent_id`, `baby_name`, `birth_date`, `gender`) VALUES
(1, 1, 'pipi', '2025-06-10', 'Female'),
(2, 2, 'zikril', '2025-12-31', 'Male'),
(5, 3, 'sufi', '2006-01-01', 'Male'),
(6, 4, 'dina', '2026-01-06', 'Female'),
(7, 5, 'hanzo', '2059-09-02', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specialty` varchar(100) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `name`, `specialty`, `password`) VALUES
(1, 'hulk', 'Bruce Banner', 'Dr. with degree in clinical and pharmacutical', '123'),
(2, 'zzz', 'Ezzraf', 'Pakar Vaksin dan rawatan moden', '123'),
(3, 'ddd', 'aidil', 'ubat', '123'),
(4, 'zik', 'Zikril Hakim Bin Shahril', 'pakar kiropraktor', '123'),
(5, 'syaq', 'Syaqir', 'Pakar urut', '123'),
(50, 'aiman', 'Muhammad aiman', 'mkan nasi', '123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone_number`) VALUES
(1, 'abi', '123', 'abi@g', 'abi', '0112223333'),
(2, 'farpanda', '1234', 'farpandan@gmail.com', 'farabi', '0199999999'),
(3, 'bapak1', '123', 'bapak@gmail.com', 'bapak', '0112334333'),
(4, 'adhmzriff', 'haha', 'adhmzriff@gmail.com', 'Adham', '017-7461253'),
(5, 'b11', '1', 'a@b.c', 'bapak anak', '0112344321');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(100) NOT NULL,
  `recommended_month` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccine_id`, `vaccine_name`, `recommended_month`, `description`) VALUES
(1, 'BCG', '0', 'Prevents Tuberculosis (Tibi)'),
(2, 'Hepatitis B (Dose 1)', '0', 'Prevents Hepatitis B infection'),
(3, 'Hepatitis B (Dose 2)', '1', 'Prevents Hepatitis B infection'),
(4, 'DTaP-IPV-HepB-Hib (Dose 1)', '2', '6-in-1 vaccine: Diphtheria, Tetanus, Pertussis, Polio, Hep B, and Hib'),
(5, 'Pneumococcal (Dose 1)', '2', 'Prevents invasive pneumococcal disease and pneumonia'),
(6, 'DTaP-IPV-HepB-Hib (Dose 2)', '3', '6-in-1 vaccine: Diphtheria, Tetanus, Pertussis, Polio, Hep B, and Hib'),
(7, 'Pneumococcal (Dose 2)', '4', 'Prevents invasive pneumococcal disease and pneumonia'),
(8, 'DTaP-IPV-HepB-Hib (Dose 3)', '5', '6-in-1 vaccine: Diphtheria, Tetanus, Pertussis, Polio, Hep B, and Hib'),
(9, 'MMR (Dose 1)', '9', 'Prevents Measles, Mumps, and Rubella'),
(10, 'MMR (Dose 2)', '12', 'Prevents Measles, Mumps, and Rubella'),
(11, 'Pneumococcal (Booster)', '12', 'Booster for pneumococcal protection'),
(12, 'DTaP-IPV-HepB-Hib (Booster)', '18', 'Booster for Diphtheria, Tetanus, Pertussis, Polio, Hep B, and Hib'),
(13, 'General Checkup', 'Non-vaccine related ', 'Non-vaccine related health visit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appt_id`),
  ADD KEY `baby_id` (`baby_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `babies`
--
ALTER TABLE `babies`
  ADD PRIMARY KEY (`baby_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `babies`
--
ALTER TABLE `babies`
  MODIFY `baby_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`baby_id`) REFERENCES `babies` (`baby_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccines` (`vaccine_id`);

--
-- Constraints for table `babies`
--
ALTER TABLE `babies`
  ADD CONSTRAINT `babies_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
