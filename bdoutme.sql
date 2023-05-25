-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: May 19, 2023 at 06:36 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdoutme`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conjuntos`
--

CREATE TABLE `tbl_conjuntos` (
  `idConjuntos` int NOT NULL,
  `idPersona` int NOT NULL,
  `FotoOutfit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perfil`
--

CREATE TABLE `tbl_perfil` (
  `idPerfil` int NOT NULL,
  `idPersona` int NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ApellidoP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ApellidoM` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Telefono` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `id` int NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_persona`
--

INSERT INTO `tbl_persona` (`id`, `Usuario`, `Email`, `Contraseña`) VALUES
(1, 'Yael', 'yael@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prenda`
--

CREATE TABLE `tbl_prenda` (
  `idPrenda` int NOT NULL,
  `idPersona` int NOT NULL,
  `FotoPrenda` text NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Estilo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_prenda`
--

INSERT INTO `tbl_prenda` (`idPrenda`, `idPersona`, `FotoPrenda`, `Tipo`, `Color`, `Estilo`) VALUES
(14, 1, 'img_prenda/abrigo1.jpg', 'Abrigo', 'Gris', 'Formal'),
(15, 1, 'img_prenda/abrigo6.jpg', 'Abrigo', 'Gris', 'Formal'),
(16, 1, 'img_prenda/bolsa5.jpg', 'Bolsa', 'Gris', 'Casual'),
(17, 1, 'img_prenda/bota1.jpg', 'Bota', 'Cafe', 'Casual'),
(18, 1, 'img_prenda/bota2.jpg', 'Bota', 'Cafe', 'Casual'),
(19, 1, 'img_prenda/bota3.jpg', 'Bota', 'Gris', 'Casual'),
(20, 1, 'img_prenda/bota4.jpg', 'Bota', 'Cafe', 'Casual'),
(21, 1, 'img_prenda/bota5.jpg', 'Bota', 'Negro', 'Casual'),
(22, 1, 'img_prenda/botita.jpg', 'Bota', 'Cafe', 'Casual'),
(23, 1, 'img_prenda/camisa3.jpg', 'Camisa', 'Gris', 'Casual'),
(24, 1, 'img_prenda/camisa4.jpg', 'Camisa', 'Negro', 'Casual'),
(25, 1, 'img_prenda/mezclilla.png', 'Pantalon', 'Azul', 'Casual'),
(26, 1, 'img_prenda/otroteni.png', 'Teni', 'Blanco', 'Casual'),
(27, 1, 'img_prenda/panta3.jpg', 'Pantalon', 'Gris', 'Casual'),
(28, 1, 'img_prenda/panto1.jpg', 'Pantalon', 'Azul', 'Casual'),
(29, 1, 'img_prenda/play.jpg', 'Playera', 'Morado', 'Casual'),
(30, 1, 'img_prenda/play1.jpg', 'Playera', 'Negro', 'Casual'),
(31, 1, 'img_prenda/play3.jpg', 'Playera', 'Azul', 'Casual'),
(32, 1, 'img_prenda/playera_roja.png', 'Playera', 'Rojo', 'Casual'),
(33, 1, 'img_prenda/playeranara.png', 'Playera', 'Amarillo', 'Casual'),
(34, 1, 'img_prenda/sanda2.jpg', 'Sandalia', 'Verde', 'Casual'),
(35, 1, 'img_prenda/suda4.jpg', 'Sudadera', 'Azul', 'Casual'),
(36, 1, 'img_prenda/sudaderaneg.jpg', 'Sudadera', 'Negro', 'Casual'),
(37, 1, 'img_prenda/sudaderaveige.jfif', 'Sudadera', 'Cafe', 'Casual'),
(38, 1, 'img_prenda/teniblanco.jpg', 'Teni', 'Blanco', 'Casual'),
(39, 1, 'img_prenda/teninegro.png', 'Teni', 'Negro', 'Casual'),
(40, 1, 'img_prenda/vestido4.jpg', 'Vestido', 'Blanco', 'Casual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_conjuntos`
--
ALTER TABLE `tbl_conjuntos`
  ADD PRIMARY KEY (`idConjuntos`),
  ADD KEY `fk_idPersona` (`idPersona`);

--
-- Indexes for table `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indexes for table `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prenda`
--
ALTER TABLE `tbl_prenda`
  ADD PRIMARY KEY (`idPrenda`),
  ADD KEY `idPersona` (`idPersona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_conjuntos`
--
ALTER TABLE `tbl_conjuntos`
  MODIFY `idConjuntos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  MODIFY `idPerfil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_prenda`
--
ALTER TABLE `tbl_prenda`
  MODIFY `idPrenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_conjuntos`
--
ALTER TABLE `tbl_conjuntos`
  ADD CONSTRAINT `tbl_conjuntos_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tbl_persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  ADD CONSTRAINT `tbl_perfil_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tbl_persona` (`id`);

--
-- Constraints for table `tbl_prenda`
--
ALTER TABLE `tbl_prenda`
  ADD CONSTRAINT `tbl_prenda_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tbl_persona` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
