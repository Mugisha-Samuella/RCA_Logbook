-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 11:03 AM
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
-- Database: `log_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `logbook_entries`
--

CREATE TABLE `logbook_entries` (
  `id` int(11) NOT NULL,
  `entry_date` varchar(100) NOT NULL,
  `entry_time` varchar(100) NOT NULL,
  `days` varchar(100) NOT NULL,
  `week` varchar(100) NOT NULL,
  `activity_description` text DEFAULT NULL,
  `working_hour` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_student`
--

CREATE TABLE `user_student` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_student`
--

INSERT INTO `user_student` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'kevine', '$2y$10$UxCmO1HYKLWIeTEJH.4Z3OEPfo5FpVEk5EXc9jdqBw1YNqeF046Vy', 'kevine@gmail.com', '2024-05-30 07:47:30'),
(2, 'gloria', '$2y$10$N7//R/R8JXwruZ8eM30kJ.iQxpoMt6JwE71flqdmB/1pmrTAsGgya', 'gloria@gmail.com', '2024-05-30 07:50:05'),
(3, 'samuella', '$2y$10$ZJOyLpnwn/n2vYV8CrVLk.h314YTl64UHmrX9PdH89Tc9hazuJcZ6', 'samuella@gmail.com', '2024-05-30 08:27:37'),
(4, 'divine', '$2y$10$sYi2GqfcBG6zLJYxbwz1VOe9yv4I775RA2/uUWwqykj9JEeVTJH9.', 'divine@gmail.com', '2024-05-30 08:38:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logbook_entries`
--
ALTER TABLE `logbook_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_student`
--
ALTER TABLE `user_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logbook_entries`
--
ALTER TABLE `logbook_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_student`
--
ALTER TABLE `user_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
