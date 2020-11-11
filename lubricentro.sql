-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2020 a las 03:47:50
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
(6, 7, 231, 'editado desde la api', 5, '2020-11-09 18:40:16'),
(8, 7, 231, 'agregado desde la api', 5, '2020-11-09 18:40:32'),
(9, 9, 44, 'nuevo', 1, '2020-11-05 22:26:08'),
(10, 7, 226, 'nuevo desde la api', 5, '2020-11-09 23:20:41'),
(11, 7, 231, 'muy bueno', 3, '2020-11-09 23:25:02'),
(12, 7, 231, 'comentado desde el formulario', 3, '2020-11-09 23:25:33'),
(22, 7, 231, 'a', 3, '2020-11-11 01:06:59'),
(23, 7, 28, 'subir promedio', 3, '2020-11-11 02:29:43'),
(24, 7, 46, 'comentario', 3, '2020-11-11 02:44:02'),
(25, 7, 46, 'otro', 3, '2020-11-11 02:44:21'),
(26, 7, 51, 'aaaaaa', 5, '2020-11-11 02:45:45');

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
  `precio` int(255) NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `id_marca`) VALUES
(28, 'AVANT 5W30', '4L', 129, 1),
(33, 'AVANT 15W40', '1L', 227, 1),
(44, 'GULF MAX 15W40', '1L', 410, 5),
(45, 'GULF MAX 15W40', '4L', 1350, 5),
(46, 'GULF MAX  20W50', '1L', 390, 5),
(47, 'GULF MAX  20W50', '4L', 1330, 5),
(51, 'HELIX HX7', '4L', 2740, 13),
(53, 'HELIX HX5', '4L', 2230, 13),
(56, 'QUARTZ 9000', '1L', 1300, 7),
(58, 'QUARTZ 7000', '1L', 860, 7),
(69, 'ELF 75W80', '1L', 630, 18),
(70, 'SELENIA K 15W40', '1L', 820, 19),
(71, 'SELENIA K 15W40', '4L', 2430, 19),
(209, 'AKX 1993', 'CHEVROLET S10', 570, 20),
(226, 'WO 130', '1L', 530, 20),
(231, 'AGREGADO DESDE LA API 2 XD', 'ASASASASAS', 140, 1);

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
(9, 'yirrap', '$2y$10$C65jOXDDVKe/0wJ8aprFKuatypa7A4XwZKouAZxk0OLzT2zJ41Jf6', 0);

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
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
