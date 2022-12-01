-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2022 at 12:41 PM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `star_wars`
--
CREATE DATABASE IF NOT EXISTS `star_wars` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `star_wars`;

-- --------------------------------------------------------

--
-- Table structure for table `tCharacters_films`
--

CREATE TABLE `tCharacters_films` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `films` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tCharacters_hair`
--

CREATE TABLE `tCharacters_hair` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `has_brown_hair` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tClimates`
--

CREATE TABLE `tClimates` (
  `id` int(11) NOT NULL,
  `climate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tConsumables`
--

CREATE TABLE `tConsumables` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `consumables_in_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tManufacturer`
--

CREATE TABLE `tManufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tPlanets_days`
--

CREATE TABLE `tPlanets_days` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `days` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tPlanets_names`
--

CREATE TABLE `tPlanets_names` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tStarships_name`
--

CREATE TABLE `tStarships_name` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tTerrains`
--

CREATE TABLE `tTerrains` (
  `id` int(11) NOT NULL,
  `terrain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tCharacters_films`
--
ALTER TABLE `tCharacters_films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tCharacters_hair`
--
ALTER TABLE `tCharacters_hair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tClimates`
--
ALTER TABLE `tClimates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tConsumables`
--
ALTER TABLE `tConsumables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tManufacturer`
--
ALTER TABLE `tManufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tPlanets_days`
--
ALTER TABLE `tPlanets_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tPlanets_names`
--
ALTER TABLE `tPlanets_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tStarships_name`
--
ALTER TABLE `tStarships_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tTerrains`
--
ALTER TABLE `tTerrains`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tCharacters_films`
--
ALTER TABLE `tCharacters_films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tCharacters_hair`
--
ALTER TABLE `tCharacters_hair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tClimates`
--
ALTER TABLE `tClimates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tConsumables`
--
ALTER TABLE `tConsumables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tManufacturer`
--
ALTER TABLE `tManufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tPlanets_days`
--
ALTER TABLE `tPlanets_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `tPlanets_names`
--
ALTER TABLE `tPlanets_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tStarships_name`
--
ALTER TABLE `tStarships_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tTerrains`
--
ALTER TABLE `tTerrains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
