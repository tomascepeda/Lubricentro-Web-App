-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2020 a las 03:22:19
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
  `nombre` text NOT NULL,
  `origen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `origen`) VALUES
(1, 'CEPSA', 'ESPAÑA'),
(4, 'ELAION', 'ARGENTINA'),
(5, 'GULF', 'ESTADOS UNIDOS'),
(7, 'TOTAL', 'ARGENTINA'),
(13, 'SHELL', 'ESTADOS UNIDOS'),
(18, 'ELF', 'ESTADOS UNIDOS'),
(19, 'PETRONAS', 'ITALIA'),
(20, 'WEGA', 'ITALIA');

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
(28, 'AVANT 5W30', '4L', 2850, 1),
(31, 'AVANT 10W40', '1L', 590, 1),
(33, 'AVANT 15W40', '1L', 500, 1),
(37, 'F50', '1L', 1190, 4),
(38, 'F50', '4L', 4120, 4),
(39, 'F30', '1L', 690, 4),
(44, 'GULF MAX 15W40', '1L', 410, 5),
(45, 'GULF MAX 15W40', '4L', 1350, 5),
(46, 'GULF MAX  20W50', '1L', 390, 5),
(47, 'GULF MAX  20W50', '4L', 1330, 5),
(51, 'HELIX HX7', '4L', 2740, 13),
(53, 'HELIX HX5', '4L', 2230, 13),
(56, 'QUARTZ 9000', '1L', 1190, 7),
(58, 'QUARTZ 7000', '1L', 860, 7),
(69, 'ELF 75W80', '1L', 630, 18),
(70, 'SELENIA K 15W40', '1L', 820, 19),
(71, 'SELENIA K 15W40', '4L', 2430, 19),
(74, 'WO 120', 'CHEVROLET CORSA 1.7 DIESEL', 604.8, 20),
(75, 'WO 130', 'CHEVROLET CORSA, BLAZER, S10 NAFTA', 518.4, 20),
(76, 'WO 150', 'FORD FIESTA, KA', 626.4, 20),
(208, 'AKX 1965', 'TOYOTA HILUX', 604.8, 20),
(209, 'AKX 1993', 'CHEVROLET S10', 810, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `contraseña` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `contraseña`) VALUES
(7, 'tomas', '$2y$10$gTJSBhiaKzSR6lFg1mtXr...txpWL4y0cgdyti/GK4DWXz4SFBegW');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
