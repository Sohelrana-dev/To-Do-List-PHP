-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2024 at 12:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(60) NOT NULL DEFAULT 'user',
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `type`, `deleted_at`) VALUES
(1, 'sumon rana', 'wyrafyk@mailinator.com', '$2y$10$W21T28NJSuEpic29xBbCbujFwbph3mnNT6YNvwOAEzmg0Wqx8I7vu', 'sub_admin', NULL),
(2, 'zeqej', 'pisy@mailinator.com', '$2y$10$wnE6H58mFkbhDPwIp/dLeuSj4pNt3h8hpMeYSXfnOG4JSwilgphqa', 'user', NULL),
(5, 'bonetadi', 'lozo@mailinator.com', '$2y$10$wtgrMzJ4NyImkz0AgAlr8uRfjN7eZmhwhmkLu98dN3cv6RcRt7/AG', 'user', '2024-03-15'),
(6, 'jytegiju', 'jicyd@mailinator.com', '$2y$10$RM8BnySS.CsqBx9V.QxrZOoNI4pIwyO80V0HDkj60yCJB0pP2A5ba', 'user', NULL),
(7, 'zyxyl', 'qafejeje@mailinator.com', '$2y$10$jf4Z/PQBiFPUi2Oyw.KhNuUalQcnQw6Q9N4g2xH0woqYWUMyciAC6', 'user', NULL),
(9, 'Sohel Rana', 'sohelrana.dev55@gmail.com', '$2y$10$gZNHZ2zYA48vfCijMV.LsecrdQFz7VcEkPv8FO5ITcANXNjUViXZW', 'Admin', NULL),
(10, 'pefynuke', 'nygysihimi@mailinator.com', '$2y$10$chvYg3f6iQvlGAvQ7LWgoOVkzyQ5yGhwf/aEXoTrMcZGpaXJ5Zrmq', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
