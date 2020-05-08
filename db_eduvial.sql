-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2020 a las 05:44:25
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_eduvial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacim`
--

CREATE TABLE `capacim` (
  `idCapacim` int(10) NOT NULL,
  `idCapacitador` int(10) NOT NULL,
  `idLugar` int(10) NOT NULL,
  `idCapacitacion` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion`
--

CREATE TABLE `capacitacion` (
  `idCapacitacion` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tiempo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitador`
--

CREATE TABLE `capacitador` (
  `idCapacitador` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `idLugar` int(10) NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `solicitante` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `correo`, `genero`) VALUES
(1, 'Tania', 'Usulutan', 'tois@hotmail.com', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_`
--

CREATE TABLE `usuario_` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_`
--

INSERT INTO `usuario_` (`id`, `usuario`, `pass`) VALUES
(1, 'Prueva1', 'Prueva12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capacim`
--
ALTER TABLE `capacim`
  ADD PRIMARY KEY (`idCapacim`),
  ADD KEY `idCapacitador` (`idCapacitador`,`idLugar`),
  ADD KEY `idLugar` (`idLugar`),
  ADD KEY `idCapacitacion` (`idCapacitacion`);

--
-- Indices de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD PRIMARY KEY (`idCapacitacion`);

--
-- Indices de la tabla `capacitador`
--
ALTER TABLE `capacitador`
  ADD PRIMARY KEY (`idCapacitador`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`idLugar`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuario_`
--
ALTER TABLE `usuario_`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capacim`
--
ALTER TABLE `capacim`
  MODIFY `idCapacim` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `idCapacitacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `capacitador`
--
ALTER TABLE `capacitador`
  MODIFY `idCapacitador` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `idLugar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario_`
--
ALTER TABLE `usuario_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capacim`
--
ALTER TABLE `capacim`
  ADD CONSTRAINT `capacim_ibfk_1` FOREIGN KEY (`idCapacitador`) REFERENCES `capacitador` (`idCapacitador`),
  ADD CONSTRAINT `capacim_ibfk_2` FOREIGN KEY (`idLugar`) REFERENCES `lugar` (`idLugar`),
  ADD CONSTRAINT `capacim_ibfk_3` FOREIGN KEY (`idCapacitacion`) REFERENCES `capacitacion` (`idCapacitacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
