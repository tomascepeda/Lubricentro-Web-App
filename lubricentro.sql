-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2020 a las 13:53:42
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
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `puntaje` int(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `usuario_id`, `producto_id`, `texto`, `puntaje`, `fecha`) VALUES
(102, 7, 28, 'test', 3, '2020-11-12 16:37:09'),
(114, 7, 46, 'bueno', 5, '2020-11-13 18:24:40'),
(122, 7, 69, 'test', 5, '2020-11-21 03:12:11'),
(123, 15, 28, 'test', 3, '2020-11-21 03:17:50'),
(125, 15, 69, 'test\n', 3, '2020-11-21 03:18:32'),
(126, 15, 58, 'test\n', 3, '2020-11-21 03:23:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre_marca` text NOT NULL,
  `origen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre_marca`, `origen`) VALUES
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
  `precio` int(255) NOT NULL,
  `imagen` text DEFAULT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `id_marca`) VALUES
(28, 'AVANT 5W30', '4L', 129, NULL, 1),
(33, 'AVANT 15W40', '1L', 227, NULL, 1),
(44, 'GULF MAX 15W40', '1L', 410, NULL, 5),
(46, 'GULF MAX  20W50', '1L', 390, NULL, 5),
(51, 'HELIX HX7', '4L', 2740, NULL, 13),
(53, 'HELIX HX5', '4L', 2230, NULL, 13),
(56, 'QUARTZ 9000', '1L', 1352, NULL, 7),
(58, 'QUARTZ 7000', '1L', 894, NULL, 7),
(69, 'ELF 75W80', '1L', 630, NULL, 18),
(70, 'SELENIA K 15W40', '1L', 902, NULL, 19),
(71, 'SELENIA K 15W40', '4L', 2673, NULL, 19),
(260, 'WO 440', 'FORD 250, 350 (PERKINS 6)', 1213, NULL, 20),
(261, 'WO 460', 'DODGE 1500 - FIAT DUNA, TIPO, FIORINO - RENAULT 18', 898, NULL, 20),
(262, 'WO 490', 'RENAULT CLIO DIESEL 1.9, EXPRESS', 1143, NULL, 20),
(263, 'WO 500', 'RENAULT 18, 19 DIESEL, TRAFIC', 828, NULL, 20),
(264, 'WO 540', 'CHEVROLET S10 MWM 2.8 DIESEL', 2065, NULL, 20),
(265, 'WO 541', 'FORD RANGER 3.0 TDI 2008+', 805, NULL, 20),
(266, 'WO 570', 'RENAULT', 921, NULL, 20),
(409, 'F50E', '4L', 2430, NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `contraseña` text NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `contraseña`, `admin`) VALUES
(7, 'tomas', '$2y$10$gTJSBhiaKzSR6lFg1mtXr...txpWL4y0cgdyti/GK4DWXz4SFBegW', 1),
(8, 'admin', '$2y$10$EUaZKU4LGQDM6S2e0RukEui1wNi5umGsxF7P7hIeMvfqX/v8xhRn6', 1),
(14, 'general', '$2y$10$cKazLaj8dPCL31BXpFRJzOa7YyJL1mB2R9DwrtobgyWzJuHwDfm42', 0),
(15, 'invitado', '$2y$10$1Uf/Ln.vLTMNlNLqAnHueu/NNZyoFSOwTOxPv.MBYqouh5gbHEAwy', 0),
(16, 'root', '$2y$10$KVeSVnjPdbMFcQ6F7EGjIuEdoFfNNs8FaZ31VJtI.gh1JX8hpyqxS', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `usuario_id` (`usuario_id`);

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
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
