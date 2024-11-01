-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 04:10 PM
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
-- Database: `admissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'tu', '123456'),
(3, 'chuong', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `graduation_status` enum('THCS','THPT','Nghề') NOT NULL,
  `admission_type` enum('Trung Cấp','Cao Đẳng','Khác') NOT NULL,
  `major` enum('CNTT','Dược','Thú Y') NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Đang chờ xử lý','Đã phê duyệt','Bị từ chối') DEFAULT 'Đang chờ xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `phone`, `address`, `graduation_status`, `admission_type`, `major`, `message`, `created_at`, `status`) VALUES
(48, 'báu', '0123047435', 'bmt', 'Nghề', 'Trung Cấp', 'Thú Y', 'mong được nhà trường hỗ trợ', '2024-10-22 15:46:15', 'Đang chờ xử lý'),
(49, 'long', '1982838273', 'bmt', 'THCS', 'Khác', 'Thú Y', 'mong được giúp đỡ', '2024-10-23 01:07:01', 'Đang chờ xử lý'),
(50, 'thầy hiếu', '0132020138', 'bmt', 'THCS', 'Khác', 'Thú Y', 'mong đc tư vấn', '2024-10-24 01:35:40', 'Bị từ chối'),
(51, 'y tú mloo', '3213132131', 'bmt', 'THCS', 'Trung Cấp', 'CNTT', '', '2024-10-24 01:43:30', 'Đang chờ xử lý');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
