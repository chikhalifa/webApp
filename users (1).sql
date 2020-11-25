-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2020 at 05:20 PM
-- Server version: 5.6.43
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `role` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `mobile`, `address`, `password`, `account_type`, `role`, `created_at`) VALUES
(1, 'chika joseph', 'user', 'leye_adekanye@nubiaville.onmicrosoft.com', '090877', 'no 33 ikeja', '827ccb0eea8a706c4c34a16891f84e7b', 'Mentor', 1, '2020-11-24 16:54:27.000000'),
(2, 'chika joseph', 'user', 'leye_adekanye@nubiaville.onmicrosoft.com', '090877', 'no 33 ikeja', '827ccb0eea8a706c4c34a16891f84e7b', 'Mentor', 1, '2020-11-24 16:58:44.000000'),
(3, 'joseph Chika', 'chika', 'testadmin@gmail.com', '090877', 'no 33 ikeja', '827ccb0eea8a706c4c34a16891f84e7b', 'Mentor', 1, '2020-11-24 16:59:45.000000'),
(4, 'joseph Chika', 'chika22', 'superadmin@gmail.com', '090877', 'no 33 ikeja', '827ccb0eea8a706c4c34a16891f84e7b', '', 0, '2020-11-24 17:09:30.000000'),
(5, 'account_type', 'chika22', 'superadmin@gmail.com', '090877', 'no 33 ikeja', '827ccb0eea8a706c4c34a16891f84e7b', 'Mentee', 2, '2020-11-24 17:11:30.000000'),
(6, 'paul steve', 'paul', 'superadmin@gmail.com', '090877', 'no 33 ikeja', 'e10adc3949ba59abbe56e057f20f883e', 'Mentor', 1, '2020-11-24 22:22:16.000000'),
(7, 'joseph Chika', 'user', 'leye_adekanye@nubiaville.onmicrosoft.com', '090877', 'no 33 ikeja', 'e10adc3949ba59abbe56e057f20f883e', 'Mentee', 2, '2020-11-24 22:57:50.000000');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
