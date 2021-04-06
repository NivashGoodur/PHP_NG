-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2021 at 12:57 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immobilier`
--

-- --------------------------------------------------------

--
-- Table structure for table `logements`
--

CREATE TABLE `logements` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `ville` varchar(65) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `surface` int(4) NOT NULL,
  `prix` int(5) NOT NULL,
  `photo` blob NOT NULL,
  `type` varchar(8) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logements`
--

INSERT INTO `logements` (`id`, `titre`, `adresse`, `ville`, `code_postal`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(1, 'titre', 'adresse', 'ville', 11111, 10, 5, '', 'location', ''),
(2, 'titre', 'adresse', 'ville', 11111, 10, 5, '', 'vente', ''),
(3, 'titre', 'adresse', 'drancy', 93100, 1, 5, '', 'vente', 'aaaaaaa'),
(4, 'test', 'test', 'test', 33333, 1000, 10000, '', 'vente', ''),
(5, 'titre', 'adresse', 'drancy', 93100, 1, 5, '', 'vente', 'aaaaaaa'),
(6, 'aaaa', 'aaaaaa', 'aaaa', 11111, 5, 5, '', 'location', ''),
(7, 'aaaa', 'aaaaaa', 'aaaa', 11111, 5, 5, '', 'location', ''),
(8, 'aaaa', 'aaaaaa', 'aaaa', 11111, 5, 5, '', 'location', ''),
(9, 'aaaaaa', 'aaaa', 'aaaaaa', 11111, 1, 5, '', 'vente', 'aaaaaaa'),
(10, 'aaaa', 'aaaaaa', 'aaaaa', 11111, 4, 5, 0x433a5c55736572735c4e697661735c417070446174615c4c6f63616c5c54656d705c706870454338362e746d70, 'vente', 'aaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logements`
--
ALTER TABLE `logements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
