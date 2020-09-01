-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2020 a las 05:37:14
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_eduvial`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerPrivilegio` (IN `privilegioadmin` INT(3))  BEGIN
    SELECT * 
    FROM login
    WHERE privilegio = privilegioadmin;
END$$

DELIMITER ;

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

--
-- Volcado de datos para la tabla `capacim`
--

INSERT INTO `capacim` (`idCapacim`, `idCapacitador`, `idLugar`, `idCapacitacion`, `fecha`) VALUES
(2, 2, 2, 2, '2020-05-15'),
(3, 3, 2, 1, '2020-05-23'),
(4, 1, 2, 2, '2020-05-15'),
(6, 2, 2, 1, '2020-05-07'),
(7, 3, 3, 3, '2020-05-14'),
(8, 2, 2, 1, '2020-05-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitacion`
--

CREATE TABLE `capacitacion` (
  `idCapacitacion` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tiempo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `capacitacion`
--

INSERT INTO `capacitacion` (`idCapacitacion`, `nombre`, `tiempo`) VALUES
(1, 'Accidentes de Motocicletas', '01:00:00'),
(2, 'Accidentes de Transito', '01:30:00'),
(3, 'Tipos de esquelas', '01:30:00'),
(5, 'Seguridad Trailera', '02:00:00'),
(6, 'Tipos de esquelas', '01:30:00'),
(7, 'Tipos de esquelas', '01:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitador`
--

CREATE TABLE `capacitador` (
  `id` int(10) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `capacitador`
--

INSERT INTO `capacitador` (`id`, `usuario`, `apellido`, `direccion`, `correo`, `clave`, `genero`, `telefono`) VALUES
(1, 'tois', 'Ã±e', 'lislique', 'tois@hotmail.com', '', 'femenino', ''),
(2, 'toi', 'toi', 'usulutan', 'tois@hotmail', '', 'femenino', ''),
(3, 'Roberto', 'Cardona', 'Morazan', 'RobertCa@gmail.com', '', 'masculino', '2344-0099');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_juegos`
--

CREATE TABLE `historial_juegos` (
  `id_historial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nivel` int(1) NOT NULL,
  `movimientos` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historial_juegos`
--

INSERT INTO `historial_juegos` (`id_historial`, `id`, `nivel`, `movimientos`) VALUES
(1, 35, 1, 4),
(2, 36, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(303) NOT NULL,
  `privilegio` int(3) NOT NULL,
  `nombre` varchar(10) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `correo`, `usuario`, `clave`, `privilegio`, `nombre`, `apellido`, `direccion`, `telefono`, `genero`) VALUES
(27, 'tois@gmail.com', 'Tois11', 'mortadela123', 1, 'Tania', 'Bonilla', 'La Union', '2345-9088', 'femenino'),
(31, 'marisol1980@gmail.com', 'Marisol', 'af9c8c68a0d643e028dfd99935220913ab9c553e533dc8cc46166a9696839fffb44b8a573b65ba7c6a6a690c1e23bcf4b15c8a568d06d42d77c58b7c54fe8607', 0, '', '', '', '', ''),
(32, 'tois@gmail.com', 'Tania', 'af9c8c68a0d643e028dfd99935220913ab9c553e533dc8cc46166a9696839fffb44b8a573b65ba7c6a6a690c1e23bcf4b15c8a568d06d42d77c58b7c54fe8607', 0, '', '', '', '', ''),
(33, 'pepito@hotmail.com', 'Peps', 'mortadela1', 1, 'Jose', 'Bonilla', 'usulutan', '23456677', 'masculino'),
(34, 'silvia123@gmail.com', 'Silvia', 'mortadela1', 2, 'Silvia', 'Penado', 'Lislique', '71690000', 'femenino'),
(35, 'angelbranm@gmail.com', 'angel', 'd56aef3b5fa644d677096e5568aadd6b2d889b3791b79e1f66d80f54c3664aca7b9d7c973fd2ec812bd4fa197443826ef1c094483390228292c68d77a8fb7af3', 0, NULL, NULL, NULL, NULL, NULL),
(36, 'test1@correo.local', 'test', 'd56aef3b5fa644d677096e5568aadd6b2d889b3791b79e1f66d80f54c3664aca7b9d7c973fd2ec812bd4fa197443826ef1c094483390228292c68d77a8fb7af3', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` int(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `clave` varchar(303) NOT NULL,
  `genero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logincapacitador`
--

CREATE TABLE `logincapacitador` (
  `id` int(11) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(303) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `logincapacitador`
--

INSERT INTO `logincapacitador` (`id`, `correo`, `usuario`, `clave`, `apellido`, `direccion`, `genero`, `telefono`) VALUES
(16, 't.a.b.a.tania@hotmail.com', 'toismustlive', 'af9c8c68a0d643e028dfd99935220913ab9c553e533dc8cc46166a9696839fffb44b8a573b65ba7c6a6a690c1e23bcf4b15c8a568d06d42d77c58b7c54fe8607', 'Bonilla', 'Barrio el calvario Usulutan', 'femenino', '6020-0286');

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

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`idLugar`, `direccion`, `solicitante`, `telefono`) VALUES
(2, 'INU', 'Pedro', '9877-0001'),
(3, 'UGB', 'Fabiola', '5689-0011'),
(4, 'Santa Maria', 'lic Juan carlos Bodoque', '2645-0900'),
(5, 'Basilio Blandon', 'Don kentucky', '2345-0999'),
(7, 'Basilio Blandon', 'Mario Fuentes', '2345-9910');

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_juegos`
--
ALTER TABLE `historial_juegos`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `logincapacitador`
--
ALTER TABLE `logincapacitador`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`idLugar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capacim`
--
ALTER TABLE `capacim`
  MODIFY `idCapacim` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `idCapacitacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `capacitador`
--
ALTER TABLE `capacitador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historial_juegos`
--
ALTER TABLE `historial_juegos`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logincapacitador`
--
ALTER TABLE `logincapacitador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `idLugar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capacim`
--
ALTER TABLE `capacim`
  ADD CONSTRAINT `capacim_ibfk_1` FOREIGN KEY (`idCapacitador`) REFERENCES `capacitador` (`id`),
  ADD CONSTRAINT `capacim_ibfk_2` FOREIGN KEY (`idLugar`) REFERENCES `lugar` (`idLugar`),
  ADD CONSTRAINT `capacim_ibfk_3` FOREIGN KEY (`idCapacitacion`) REFERENCES `capacitacion` (`idCapacitacion`);

--
-- Filtros para la tabla `historial_juegos`
--
ALTER TABLE `historial_juegos`
  ADD CONSTRAINT `historial_juegos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
