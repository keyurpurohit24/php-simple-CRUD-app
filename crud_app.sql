-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2024 at 06:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 2,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `dob` date NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `fname`, `lname`, `age`, `dob`, `is_deleted`) VALUES
(1, 1, 'Keyur', 'Purohit', 21, '2002-10-28', 0),
(2, 2, 'Amit', 'Jain', 35, '1989-06-13', 1),
(3, 2, 'Aditya', 'Purohit', 19, '2024-09-10', 0),
(4, 2, 'Akash', 'Sharma', 26, '2000-09-11', 1),
(5, 2, 'Abhishek', 'desai', 20, '2024-09-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `password`) VALUES
(1, 'e19a91ac16816a7c9357ed166a058456');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` tinyint(4) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_role` (`role_id`);

--
-- Constraints for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD CONSTRAINT `user_cred_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
