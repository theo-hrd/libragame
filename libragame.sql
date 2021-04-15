-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 172.19.0.2
-- Generation Time: Apr 15, 2021 at 07:52 PM
-- Server version: 10.3.28-MariaDB-1:10.3.28+maria~focal
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libragame`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `userid`, `gameid`) VALUES
(25, 11, 1030),
(26, 11, 4200),
(27, 11, 4003),
(28, 11, 13633),
(29, 11, 3498);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(5, 'tttt', 'ttt@ttt.com', '$2y$10$Fd2IBV/K7BhsT5p6Fkv8XeYJzC9RFAfKmiINDs2.wh975eWTgqAPe'),
(6, 'testspace', 'ffqf@fff.com', '$2y$10$gHLck.nOxGaFHP04ADrjp.eEQsqeWwu0wGYE40pn813KD9A9b8ke2'),
(7, 'testspaces', 'testspace@aaa.com', '$2y$10$Bf/VfmVzMLeETMXMlOMClutWUNmr4Q/y7XXYCB.tHRKTUZjCXw1TK'),
(8, 'testspacesdd', 'testspaced@aaa.com', '$2y$10$we6STi6zegGN3dUPd/Y6/u1DLwVbrfzh0GvprnODfi0zKMxQ4JPXu'),
(9, 'testspacesddff', 'testspacedf@aaa.com', '$2y$10$xV446M9VnNFq1PtqjvtvXODaY5pmes2Mz4dg7IksEuPtMFDjqBIEy'),
(10, 'salut', 'coucou@a.com', '$2y$10$hLn/UGg0EMDJlqknHy.cIOLkYSxI8NJb5Z4GQ2dYg40fR/4KaMOKq'),
(11, 'theo', 'theo@ttt.com', '$2y$10$DDFgfyCsvvUX9hDrpHZk7eSaKUoxRSscT503yjYf4SU7OwNhfeHDK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
