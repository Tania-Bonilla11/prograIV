-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2020 at 03:23 PM
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
-- Database: `db_eduvial`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerPrivilegio` (IN `privilegioadmin` INT(3))  BEGIN
    SELECT * 
    FROM login
    WHERE privilegio = privilegioadmin;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `capacim`
--

CREATE TABLE `capacim` (
  `idCapacim` int(10) NOT NULL,
  `idCapacitador` int(10) NOT NULL,
  `idLugar` int(10) NOT NULL,
  `idCapacitacion` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `capacim`
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
-- Table structure for table `capacitacion`
--

CREATE TABLE `capacitacion` (
  `idCapacitacion` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tiempo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `capacitacion`
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
-- Table structure for table `capacitador`
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
-- Dumping data for table `capacitador`
--

INSERT INTO `capacitador` (`id`, `usuario`, `apellido`, `direccion`, `correo`, `clave`, `genero`, `telefono`) VALUES
(1, 'tois', 'Ã±e', 'lislique', 'tois@hotmail.com', '', 'femenino', ''),
(2, 'toi', 'toi', 'usulutan', 'tois@hotmail', '', 'femenino', ''),
(3, 'Roberto', 'Cardona', 'Morazan', 'RobertCa@gmail.com', '', 'masculino', '2344-0099');

-- --------------------------------------------------------

--
-- Table structure for table `login`
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
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `correo`, `usuario`, `clave`, `privilegio`, `nombre`, `apellido`, `direccion`, `telefono`, `genero`) VALUES
(27, 'tois@gmail.com', 'Tois11', 'mortadela123', 1, 'Tania', 'Bonilla', 'La Union', '2345-9088', 'femenino'),
(31, 'marisol1980@gmail.com', 'Marisol', 'af9c8c68a0d643e028dfd99935220913ab9c553e533dc8cc46166a9696839fffb44b8a573b65ba7c6a6a690c1e23bcf4b15c8a568d06d42d77c58b7c54fe8607', 0, '', '', '', '', ''),
(32, 'tois@gmail.com', 'Tania', 'af9c8c68a0d643e028dfd99935220913ab9c553e533dc8cc46166a9696839fffb44b8a573b65ba7c6a6a690c1e23bcf4b15c8a568d06d42d77c58b7c54fe8607', 0, '', '', '', '', ''),
(33, 'pepito@hotmail.com', 'Peps', 'mortadela1', 1, 'Jose', 'Bonilla', 'usulutan', '23456677', 'masculino'),
(34, 'silvia123@gmail.com', 'Silvia', 'mortadela1', 2, 'Silvia', 'Penado', 'Lislique', '71690000', 'femenino'),
(35, 'angelbranm@gmail.com', 'angel', 'd56aef3b5fa644d677096e5568aadd6b2d889b3791b79e1f66d80f54c3664aca7b9d7c973fd2ec812bd4fa197443826ef1c094483390228292c68d77a8fb7af3', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
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
-- Table structure for table `logincapacitador`
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
-- Dumping data for table `logincapacitador`
--

INSERT INTO `logincapacitador` (`id`, `correo`, `usuario`, `clave`, `apellido`, `direccion`, `genero`, `telefono`) VALUES
(16, 't.a.b.a.tania@hotmail.com', 'toismustlive', 'af9c8c68a0d643e028dfd99935220913ab9c553e533dc8cc46166a9696839fffb44b8a573b65ba7c6a6a690c1e23bcf4b15c8a568d06d42d77c58b7c54fe8607', 'Bonilla', 'Barrio el calvario Usulutan', 'femenino', '6020-0286');

-- --------------------------------------------------------

--
-- Table structure for table `lugar`
--

CREATE TABLE `lugar` (
  `idLugar` int(10) NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `solicitante` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `lugar`
--

INSERT INTO `lugar` (`idLugar`, `direccion`, `solicitante`, `telefono`) VALUES
(2, 'INU', 'Pedro', '9877-0001'),
(3, 'UGB', 'Fabiola', '5689-0011'),
(4, 'Santa Maria', 'lic Juan carlos Bodoque', '2645-0900'),
(5, 'Basilio Blandon', 'Don kentucky', '2345-0999'),
(7, 'Basilio Blandon', 'Mario Fuentes', '2345-9910');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capacim`
--
ALTER TABLE `capacim`
  ADD PRIMARY KEY (`idCapacim`),
  ADD KEY `idCapacitador` (`idCapacitador`,`idLugar`),
  ADD KEY `idLugar` (`idLugar`),
  ADD KEY `idCapacitacion` (`idCapacitacion`);

--
-- Indexes for table `capacitacion`
--
ALTER TABLE `capacitacion`
  ADD PRIMARY KEY (`idCapacitacion`);

--
-- Indexes for table `capacitador`
--
ALTER TABLE `capacitador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `logincapacitador`
--
ALTER TABLE `logincapacitador`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`idLugar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capacim`
--
ALTER TABLE `capacim`
  MODIFY `idCapacim` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `capacitacion`
--
ALTER TABLE `capacitacion`
  MODIFY `idCapacitacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `capacitador`
--
ALTER TABLE `capacitador`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logincapacitador`
--
ALTER TABLE `logincapacitador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lugar`
--
ALTER TABLE `lugar`
  MODIFY `idLugar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capacim`
--
ALTER TABLE `capacim`
  ADD CONSTRAINT `capacim_ibfk_1` FOREIGN KEY (`idCapacitador`) REFERENCES `capacitador` (`id`),
  ADD CONSTRAINT `capacim_ibfk_2` FOREIGN KEY (`idLugar`) REFERENCES `lugar` (`idLugar`),
  ADD CONSTRAINT `capacim_ibfk_3` FOREIGN KEY (`idCapacitacion`) REFERENCES `capacitacion` (`idCapacitacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
