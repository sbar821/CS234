-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2023 at 05:12 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `album` varchar(255) DEFAULT NULL,
  `dress` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `album`, `dress`, `user_id`) VALUES
(4, NULL, NULL, 1),
(5, 'Rose Garden Pink', 'Pink', 1),
(6, NULL, NULL, 1),
(7, NULL, NULL, 1),
(8, NULL, NULL, 1),
(9, NULL, NULL, 1),
(10, NULL, NULL, 1),
(12, 'Pink', 'Orange', 9),
(13, NULL, NULL, 1),
(14, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`) VALUES
(1, 'sy', '$2y$10$M/6wecW0rp/fzDqWFKiom.WcHQMJeOiCJ5etMKWCiON7aoEfm511a'),
(2, 'syd', '$2y$10$Jmlaa.ZEJa7Fgv5iUkeef.n9wfigzzWo/dtMgjWlTxWijyGl570UK'),
(4, 'sydne', '$2y$10$ARQJ3jzbf16KirJM5ET5/OHm0Fgv/ai8YUeDHCbe5w7V8lBO17HBS'),
(6, 'blug', '$2y$10$3yD5o4rwUhzb9KV5bXUgTeamc73G0FM9gBSwd99d8/5RNJIzUGrVe'),
(7, 'plagg', '$2y$10$bhw9lnVgxNGPqFtoj/dAYe2iEiQsMWcz008n/ah.anu1z3rOrIbMu'),
(8, 'ocho', '$2y$10$SpkEGnsADYlqDul/1QiDQOxm5QLp.ItlwtMrKWrK7.VuCz1gwjQoa'),
(9, 'bungo', '$2y$10$cOsR/QC795rGnKCkPHC0CeF5NLI6KduXhhJmSmOD9xyCUh7ky6j6m'),
(11, 'tres', '$2y$10$FjME8AB4EEI0GtW6ulbSVuF3z2/9pNbSsT5DfCeYIeogauhSpeHuq'),
(15, 'admin', '$2y$10$KKfZ3dH83qOPfxL1X7mmNeY4oGIcCr1jyYa.cWQuIMsHoaCpIRKH6'),
(16, 'sybarne', '$2y$10$5eaSjOFayq5AZT9y/4qk/eTXtGjaSTodQSfHuAPvIR2JFsHRBMMQe');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `vault` varchar(255) DEFAULT NULL,
  `dlx` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `vault`, `dlx`, `user_id`) VALUES
(1, 'Slut!', 'New Romantics', 2),
(3, NULL, NULL, 1),
(4, NULL, NULL, 1),
(5, 'Slut!', NULL, 1),
(6, 'Slut!', NULL, 1),
(7, 'Suburban Legends', 'New Romantics', 1),
(8, 'Now That We Don\'t Talk', 'In Love', 11),
(9, 'Say Dont Go', 'Youre In Love', 1),
(10, 'Say Don\'t Go', 'Wonderland', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`id`);

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
