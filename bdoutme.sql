DROP DATABASE IF EXISTS `bdoutme`;
CREATE DATABASE `bdoutme`;
USE bdoutme;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-05-2023 a las 00:41:38
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdoutme`
--
--
-- Estructura de tabla para la tabla `tbl_conjuntos`
--

CREATE TABLE `bdoutme`.`tbl_conjuntos` (
  `idConjuntos` int NOT NULL,
  `idPersona` int NOT NULL,
  `FotoOutfit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfil`
--

CREATE TABLE `bdoutme`.`tbl_perfil` (
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
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `bdoutme`.`tbl_persona` (
  `id` int NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_prenda`
--

CREATE TABLE `bdoutme`.`tbl_prenda` (
  `idPrenda` int NOT NULL,
  `idPersona` int NOT NULL,
  `FotoPrenda` text NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Estilo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_conjuntos`
--
ALTER TABLE `tbl_conjuntos`
  ADD PRIMARY KEY (`idConjuntos`),
  ADD KEY `fk_idPersona` (`idPersona`);

--
-- Indices de la tabla `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_prenda`
--
ALTER TABLE `tbl_prenda`
  ADD PRIMARY KEY (`idPrenda`),
  ADD KEY `idPersona` (`idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_conjuntos`
--
ALTER TABLE `tbl_conjuntos`
  MODIFY `idConjuntos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  MODIFY `idPerfil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_prenda`
--
ALTER TABLE `tbl_prenda`
  MODIFY `idPrenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_conjuntos`
--
ALTER TABLE `tbl_conjuntos`
  ADD CONSTRAINT `tbl_conjuntos_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tbl_persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_perfil`
--
ALTER TABLE `tbl_perfil`
  ADD CONSTRAINT `tbl_perfil_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tbl_persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_prenda`
--
ALTER TABLE `tbl_prenda`
  ADD CONSTRAINT `tbl_prenda_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tbl_persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
