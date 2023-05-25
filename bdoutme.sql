-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-05-2023 a las 02:45:36
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_conjuntos`
--

CREATE TABLE `tbl_conjuntos` (
  `idConjuntos` int NOT NULL,
  `idPersona` int NOT NULL,
  `FotoOutfit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfil`
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
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `id` int NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`id`, `Usuario`, `Email`, `Contraseña`) VALUES
(1, 'yael', 'yael@gmail.com', '5289cd68a5281b5b34fafc4fda54cf43'),
(2, 'Octavio', 'octavio@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_prenda`
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
-- Volcado de datos para la tabla `tbl_prenda`
--

INSERT INTO `tbl_prenda` (`idPrenda`, `idPersona`, `FotoPrenda`, `Tipo`, `Color`, `Estilo`) VALUES
(1, 1, 'img_prenda\\playera_roja.png', 'Playera', 'Rojo', 'Casual'),
(2, 1, 'img_prenda\\vestido4.jpg', 'Vestido', 'Blanco', 'Formal'),
(3, 1, 'img_prenda\\pantalon_azul.jpg', 'Pantalon', 'Azul', 'Casual'),
(14, 1, 'img_prenda/camisa4.jpg', 'Camisa', 'Negro', 'Formal'),
(15, 1, 'img_prenda/tenis_negros.png', 'Teni', 'Negro', 'Casual'),
(16, 1, 'img_prenda/suda4.jpg', 'Sudadera', 'Azul', 'Casual'),
(17, 1, 'img_prenda/panta4.jpg', 'Pantalon', 'Cafe', 'Casual'),
(18, 1, 'img_prenda/abrigo6.jpg', 'Abrigo', 'Gris', 'Formal'),
(19, 1, 'img_prenda/bolsa5.jpg', 'Bolsa', 'Gris', 'Casual'),
(20, 1, 'img_prenda/vestido10.jpg.png', 'Vestido', 'Blanco', 'Formal'),
(21, 1, 'img_prenda/camisa3.jpg', 'Playera', 'Rojo', 'Casual'),
(22, 1, 'img_prenda/play3.jpg', 'Playera', 'Azul', 'Casual'),
(23, 1, 'img_prenda/play1.jpg', 'Playera', 'Negro', 'Casual'),
(24, 1, 'img_prenda/playeranara.png', 'Playera', 'Amarillo', 'Casual'),
(25, 2, 'img_prenda/prenda_fondo_eliminado_646ebaaa101c0.png', 'Pantalon', 'Morado', 'Casual'),
(26, 2, 'img_prenda/prenda_fondo_eliminado_323pll56100fg.png', 'Sudadera', 'Negro', 'Casual'),
(27, 2, 'img_prenda/prenda_fondo_eliminado_642hhu46925bp.png', 'Pantalon', 'Azul', 'Casual'),
(28, 2, 'img_prenda/prenda_fondo_eliminado_689lpo45203jg.png', 'Teni', 'Blanco', 'Deportivo');

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
  MODIFY `idConjuntos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `idPrenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
