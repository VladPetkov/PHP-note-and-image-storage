-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 02:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` varchar(64) NOT NULL,
  `passUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `passUsers`) VALUES
(1, 'Vlado', 'nezu@abv.bg', '$2y$10$s58Di4OIxZz9FTjet3AqmutC6HLL6rbXG9Jb96q5jfsSmZFmhUCZe'),
(7, 'Pepo', 'pepo@detopipa.gei', '$2y$10$eclD.iWhfXGlwhgNuNuBausiJPjFGO2Innv.g1.02qXCtP2LC1hjS'),
(8, 'gosho', 'test2@abv.bg', '$2y$10$i1SVu5TxwAKgQO0V2CUEQu75SULpKMOgmDzoqALXcriAjt6a8ROPS'),
(9, 'mims', 'mims@abv.bg', '$2y$10$/9PamPcpFs5xKktHPYt4veh02jYKqOp.HPDc0KgpFjMEN4g/khVMe');

-- --------------------------------------------------------

--
-- Table structure for table `usersob`
--

CREATE TABLE `usersob` (
  `id` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `img` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersob`
--

INSERT INTO `usersob` (`id`, `idUsers`, `img`, `time`) VALUES
(58, 9, 'uploads/1011917.jpg', '2019-12-15 11:26:57'),
(66, 1, 'uploads/1000030.jpg', '2019-12-16 18:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `userstext`
--

CREATE TABLE `userstext` (
  `id` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstext`
--

INSERT INTO `userstext` (`id`, `idUsers`, `text`, `time`) VALUES
(20, 9, 'hfjgjjjj', '2019-12-15 10:07:22'),
(43, 1, 'd[poiu', '2019-12-16 17:17:24'),
(47, 1, 'zsdaddasdasddsd', '2019-12-16 18:15:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `emailUsers` (`emailUsers`);

--
-- Indexes for table `usersob`
--
ALTER TABLE `usersob`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `userstext`
--
ALTER TABLE `userstext`
  ADD PRIMARY KEY (`id`),
  ADD KEY `isUsers` (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usersob`
--
ALTER TABLE `usersob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `userstext`
--
ALTER TABLE `userstext`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usersob`
--
ALTER TABLE `usersob`
  ADD CONSTRAINT `idUsers` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);

--
-- Constraints for table `userstext`
--
ALTER TABLE `userstext`
  ADD CONSTRAINT `isUsers` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
