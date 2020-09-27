-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2020 a las 03:43:13
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lubricentro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`) VALUES
(1, 'CEPSA'),
(2, 'LAAPSA'),
(3, 'CASTROL'),
(4, 'ELAION'),
(5, 'GULF'),
(7, 'TOTAL'),
(8, 'MOTUL'),
(9, 'PLUSBAT'),
(13, 'SHELL'),
(14, 'TRICO'),
(15, 'MICHELIN'),
(16, 'WHIZ'),
(17, 'MOLYKOTE'),
(18, 'ELF'),
(19, 'PETRONAS'),
(20, 'WEGA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `id_marca`) VALUES
(27, 'AVANT 5W30', '1L', 800, 1),
(28, 'AVANT 5W30', '4L', 2850, 1),
(35, 'F50E', '1L', 1100, 4),
(36, 'F50E', '4L', 3790, 4),
(37, 'F50', '1L', 1190, 4),
(38, 'F50', '4L', 4120, 4),
(44, 'GULF MAX 15W40', '1L', 410, 5),
(45, 'GULF MAX 15W40', '4L', 1350, 5),
(50, 'HELIX HX7', '1L', 720, 13),
(51, 'HELIX HX7', '4L', 2740, 13),
(56, 'QUARTZ 9000', '1L', 1190, 7),
(57, 'QUARTZ 9000', '4L', 3920, 7),
(69, 'ELF 75W80', '1L', 630, 18),
(70, 'SELENIA K 15W40', '1L', 820, 19),
(71, 'SELENIA K 15W40', '4L', 2430, 19),
(72, 'GTX 20W50', '1L', 480, 3),
(73, 'GTX 20W50', '4L', 1690, 3),
(74, 'WO 120', 'CHEVROLET CORSA 1.7 DIESEL', 560, 20),
(75, 'WO 130', 'CHEVROLET CORSA, BLAZER, S10 NAFTA', 480, 20),
(90, 'WO 400', 'RENAULT 9, 11, 12, 19', 670, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `contraseña`) VALUES
(1, 'root', 'root');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `nombre_marca` (`id_marca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
