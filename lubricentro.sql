-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2020 a las 03:16:40
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
(51, 7, 58, 'saddsad', 1, '2020-11-11 21:46:56'),
(52, 7, 58, 'asas', 4, '2020-11-11 21:47:12'),
(53, 7, 58, 'asssssssssss', 3, '2020-11-11 21:47:57'),
(54, 7, 58, 'a', 5, '2020-11-11 21:48:00'),
(62, 12, 209, 'swdfasdfdsa', 3, '2020-11-11 23:26:27'),
(63, 12, 209, 'sdfsdfsd', 3, '2020-11-11 23:26:31'),
(64, 12, 209, 'sadsa', 3, '2020-11-11 23:28:38'),
(65, 12, 209, 's', 3, '2020-11-11 23:28:49'),
(66, 12, 209, 'wedsads', 5, '2020-11-11 23:31:39'),
(67, 12, 209, 'vzdzgvdvz', 5, '2020-11-11 23:32:08'),
(68, 12, 209, 'una kk', 1, '2020-11-11 23:41:41'),
(69, 12, 209, 'gfadgad', 3, '2020-11-11 23:42:00'),
(70, 12, 209, 'dfasasdf', 3, '2020-11-11 23:42:56'),
(71, 12, 209, 'gdfgsdfg', 1, '2020-11-11 23:43:03'),
(97, 12, 231, 'estoy sin permisos', 3, '2020-11-12 16:34:30'),
(98, 7, 231, 'yo si tengo\n', 3, '2020-11-12 16:35:55'),
(101, 7, 209, 'test', 3, '2020-11-12 16:36:57'),
(102, 7, 28, 'test', 3, '2020-11-12 16:37:09'),
(103, 7, 226, 'test', 3, '2020-11-12 16:37:34'),
(106, 7, 232, 'fixeado', 3, '2020-11-13 02:13:29');

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
(20, 'WEGA', 'ITALIA'),
(50, 'YIRRAP', 'BOLIVIA');

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
(45, 'GULF MAX 15W40', '4L', 1350, NULL, 5),
(46, 'GULF MAX  20W50', '1L', 390, NULL, 5),
(47, 'GULF MAX  20W50', '4L', 1330, NULL, 5),
(51, 'HELIX HX7', '4L', 2740, NULL, 13),
(53, 'HELIX HX5', '4L', 2230, NULL, 13),
(56, 'QUARTZ 9000', '1L', 1300, NULL, 7),
(58, 'QUARTZ 7000', '1L', 860, NULL, 7),
(69, 'ELF 75W80', '1L', 630, NULL, 18),
(70, 'SELENIA K 15W40', '1L', 820, NULL, 19),
(71, 'SELENIA K 15W40', '4L', 2430, NULL, 19),
(209, 'AKX 1993', 'CHEVROLET S10', 570, NULL, 20),
(226, 'WO 130', '1L', 530, NULL, 20),
(231, 'AGREGADO DESDE LA API 2 XD', 'ASASASASAS', 140, NULL, 1),
(232, 'AA CON IMAGEN 2 EDIT', 'SADSAD', 545454, NULL, 18),
(233, 'AA CON IMAGEN EDIT NEW', '1L', 45454545, NULL, 18),
(234, 'PEPE', 'ETE SECH', 54545454, NULL, 19),
(235, 'ETE SECH 2.0', 'PPEE', 4545454, NULL, 19),
(236, 'ETE SECH 2.0', 'PPEE', 4545454, NULL, 19),
(237, 'AAA NUEVO', 'SADSA', 4545454, NULL, 18);

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
(12, 'public', '$2y$10$tJf9JYqkMibJqqoko/GMeefmSNWcyoK.V4HEMGo/llx6WIV0af1Lm', 0);

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
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
