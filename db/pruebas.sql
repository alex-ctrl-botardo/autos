-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2026 at 05:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pruebas`
--

-- --------------------------------------------------------

--
-- Table structure for table `Marca`
--

CREATE TABLE `Marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Marca`
--

INSERT INTO `Marca` (`id_marca`, `nombre`, `pais`) VALUES
(1, 'Toyota', 'Japón'),
(2, 'BMW', 'Alemania'),
(3, 'Audi', 'Alemania'),
(5, 'Seat', 'España'),
(6, 'Fiat', 'Italia'),
(7, 'Honda', 'Japón'),
(8, 'Ferrari', 'Italia'),
(9, 'Masserati', 'Italia');

-- --------------------------------------------------------

--
-- Table structure for table `Modelo`
--

CREATE TABLE `Modelo` (
  `Id_modelo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_motor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Modelo`
--

INSERT INTO `Modelo` (`Id_modelo`, `nombre`, `id_motor`) VALUES
(1, 'Corola', 1),
(2, 'Yaris', 1),
(3, 'M3', 2),
(4, 'Ibiza', 5),
(5, 'GR Yaris', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Motor`
--

CREATE TABLE `Motor` (
  `id_motor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `potencia` varchar(100) NOT NULL,
  `par` varchar(100) NOT NULL,
  `cilindrada` decimal(10,4) NOT NULL,
  `num_pistones` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Motor`
--

INSERT INTO `Motor` (`id_motor`, `nombre`, `potencia`, `par`, `cilindrada`, `num_pistones`, `id_marca`) VALUES
(1, '2.0 TDI', '150', '340', 1968.0000, 4, 1),
(2, '2.3 TDI', '180', '380', 2268.0000, 4, 2),
(4, '1.8 Hybrid 200H', '200', '400', 1760.0000, 4, 1),
(5, '1.8 TDI', '130', '370', 1720.0000, 4, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Marca`
--
ALTER TABLE `Marca`
  ADD PRIMARY KEY (`id_marca`) USING BTREE;

--
-- Indexes for table `Modelo`
--
ALTER TABLE `Modelo`
  ADD PRIMARY KEY (`Id_modelo`),
  ADD KEY `fk_modelo_motor` (`id_motor`) USING BTREE;

--
-- Indexes for table `Motor`
--
ALTER TABLE `Motor`
  ADD PRIMARY KEY (`id_motor`) USING BTREE,
  ADD KEY `fk_motor_marca` (`id_marca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Marca`
--
ALTER TABLE `Marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Modelo`
--
ALTER TABLE `Modelo`
  MODIFY `Id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Motor`
--
ALTER TABLE `Motor`
  MODIFY `id_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Modelo`
--
ALTER TABLE `Modelo`
  ADD CONSTRAINT `fk_modelo_motor` FOREIGN KEY (`id_motor`) REFERENCES `Motor` (`Id_motor`);

--
-- Constraints for table `Motor`
--
ALTER TABLE `Motor`
  ADD CONSTRAINT `fk_motor_marca` FOREIGN KEY (`id_marca`) REFERENCES `Marca` (`Id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
