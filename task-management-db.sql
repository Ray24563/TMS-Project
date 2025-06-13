-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 09:42 AM
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
-- Database: `task-management-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_picture` varchar(255) DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `username`, `password`, `created_at`, `profile_picture`) VALUES
(1, 'tester1', '$2y$10$FAlraheGYi2fqM5gBoHjNeW8rFUWfl6XZmKK9oW8IdRtVk3EaFB5e', '2025-06-13 07:36:46', 'user.png'),
(2, 'tester2', '$2y$10$Mddn5nWbbP.j8BkG3bfl2O9yAXgCXbC/2G12fDmjBZaJI2Ib.5YXq', '2025-06-13 07:37:30', '1749800316_d280f38f9a74da8ee308.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('To-Do','In Progress','Completed') NOT NULL DEFAULT 'To-Do',
  `due_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `user_id`, `status`, `due_date`, `created_at`, `updated_at`) VALUES
(3, 'Prototyping', 'Task Management System prototyping', 1, 'Completed', '2025-04-01', '2025-04-09 03:42:29', '2025-04-10 19:15:07'),
(4, 'Front-end Development', 'Front-end development of the system', 4, 'Completed', '2025-04-02', '2025-04-09 03:50:07', '2025-04-10 19:58:42'),
(5, 'Back-end Development', 'Back-end development of the system', 2, 'Completed', '2025-04-10', '2025-04-09 03:58:00', '2025-04-10 19:15:59'),
(6, 'System Documentation', 'To document the entire system', 5, 'In Progress', '2025-04-11', '2025-04-09 09:49:05', '2025-04-10 19:16:16'),
(7, 'Slides Presentation', 'Create and design the presentation for the system project', 8, 'To-Do', '2025-04-11', '2025-04-09 09:50:14', '2025-04-10 21:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Joanna Mae', 'Martinez', 'jm.martinez@example.com', 'Jekyll', '09123456789', 'Active', '2025-04-06 03:29:35', '2025-04-10 08:14:00'),
(2, 'Mark Nathan', 'Olmedo', 'mn.olmedo4@gmail.com', 'Merami', '09987654321', 'Active', '2025-04-06 04:05:53', '2025-04-09 09:45:07'),
(4, 'Raymond Charles', 'Palatino', 'bari@example.com', 'Bari', '09857694312', 'Active', '2025-04-06 04:24:35', '2025-04-10 19:58:35'),
(5, 'Andre-iy', 'Enriquez', 'acidgaming@example.com', 'Acid', '09856744323', 'Active', '2025-04-06 04:30:03', '2025-04-09 09:43:48'),
(8, 'Kurt Armon', 'Zamora', 'kurtzamora@example.com', 'Helkurt', '09456378292', 'Active', '2025-04-09 09:44:55', '2025-04-09 09:49:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
