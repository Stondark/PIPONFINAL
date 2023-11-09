-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2023 a las 00:39:59
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pipon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agua_persona`
--

CREATE TABLE `agua_persona` (
  `id` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agua_persona`
--

INSERT INTO `agua_persona` (`id`, `cantidad`, `fecha`, `id_usuario`) VALUES
(36, 1.2, '2023-11-05 15:45:46', '70acc8b1-7a87-11ee-9752-047c168ab67a'),
(37, 0.5, '2023-11-05 15:47:09', '70acc8b1-7a87-11ee-9752-047c168ab67a'),
(38, 2, '2023-11-06 18:35:58', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a'),
(39, 8, '2023-11-06 18:36:00', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comida_contador`
--

CREATE TABLE `comida_contador` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(120) NOT NULL,
  `calorias` varchar(64) DEFAULT NULL,
  `grasa` varchar(64) DEFAULT NULL,
  `carbohidratos` varchar(64) DEFAULT NULL,
  `proteinas` varchar(64) DEFAULT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comida_contador`
--

INSERT INTO `comida_contador` (`id`, `id_usuario`, `calorias`, `grasa`, `carbohidratos`, `proteinas`, `fecha`) VALUES
(16, '70acc8b1-7a87-11ee-9752-047c168ab67a', '397.92', '13.98', '62.59', '11.11', '2023-11-05 15:50:01'),
(17, '70acc8b1-7a87-11ee-9752-047c168ab67a', '1.78', '0.00', '0.53', '0.00', '2023-11-05 15:50:24'),
(18, '70acc8b1-7a87-11ee-9752-047c168ab67a', '6.47', '0.21', '1.42', '0.23', '2023-11-06 13:52:17'),
(19, '96eda10c-7cea-11ee-b40d-047c168ab67a', '6.47', '0.21', '1.42', '0.23', '2023-11-06 16:29:36'),
(20, 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '468.44', '10.20', '75.87', '14.58', '2023-11-06 18:36:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio_persona`
--

CREATE TABLE `ejercicio_persona` (
  `id` int(11) NOT NULL,
  `cantidad` int(64) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` varchar(120) NOT NULL,
  `tipo_ejercicio` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejercicio_persona`
--

INSERT INTO `ejercicio_persona` (`id`, `cantidad`, `fecha`, `id_usuario`, `tipo_ejercicio`) VALUES
(10, 1, '2023-11-05 16:29:08', '70acc8b1-7a87-11ee-9752-047c168ab67a', 1),
(11, 2, '2023-11-05 16:29:32', '70acc8b1-7a87-11ee-9752-047c168ab67a', 1),
(12, 1, '2023-11-06 13:53:42', '70acc8b1-7a87-11ee-9752-047c168ab67a', 1),
(13, 1, '2023-11-06 16:29:46', '96eda10c-7cea-11ee-b40d-047c168ab67a', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_peso_user`
--

CREATE TABLE `log_peso_user` (
  `id` int(11) NOT NULL,
  `cantidad` varchar(6) NOT NULL,
  `id_usuario` varchar(120) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `log_peso_user`
--

INSERT INTO `log_peso_user` (`id`, `cantidad`, `id_usuario`, `fecha`) VALUES
(8, '50', '96eda10c-7cea-11ee-b40d-047c168ab67a', '2023-11-06 16:22:44'),
(9, '52', '96eda10c-7cea-11ee-b40d-047c168ab67a', '2023-11-06 16:27:55'),
(10, '53', '96eda10c-7cea-11ee-b40d-047c168ab67a', '2023-11-06 16:28:39'),
(11, '567', '70acc8b1-7a87-11ee-9752-047c168ab67a', '2023-11-06 16:31:55'),
(12, '25', '70acc8b1-7a87-11ee-9752-047c168ab67a', '2023-11-06 16:31:59'),
(13, '80', '96eda10c-7cea-11ee-b40d-047c168ab67a', '2023-11-06 17:36:24'),
(14, '60', '99b92067-7cf6-11ee-b40d-047c168ab67a', '2023-11-06 17:48:46'),
(15, '15', '2d04c39d-7cf8-11ee-b40d-047c168ab67a', '2023-11-06 18:09:33'),
(16, '15', '91abee9a-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:09:57'),
(17, '79', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:10:32'),
(18, '50', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:24:10'),
(19, '70', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:27:18'),
(20, '75', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:29:38'),
(21, '70', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:31:42'),
(22, '75', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:32:25'),
(23, '70', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:32:29'),
(24, '75', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:34:21'),
(25, '70', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:34:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos_persona`
--

CREATE TABLE `pasos_persona` (
  `id` int(11) NOT NULL,
  `cantidad` int(64) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pasos_persona`
--

INSERT INTO `pasos_persona` (`id`, `cantidad`, `fecha`, `id_usuario`) VALUES
(26, 1000, '2023-11-05 16:16:47', '70acc8b1-7a87-11ee-9752-047c168ab67a'),
(27, 500, '2023-11-05 16:36:59', '70acc8b1-7a87-11ee-9752-047c168ab67a'),
(28, 5000, '2023-11-06 16:29:14', '96eda10c-7cea-11ee-b40d-047c168ab67a'),
(29, 588, '2023-11-06 18:36:20', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_users`
--

CREATE TABLE `rol_users` (
  `id` int(11) NOT NULL,
  `type` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol_users`
--

INSERT INTO `rol_users` (`id`, `type`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suenio_persona`
--

CREATE TABLE `suenio_persona` (
  `id` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suenio_persona`
--

INSERT INTO `suenio_persona` (`id`, `cantidad`, `fecha`, `id_usuario`) VALUES
(13, 9, '2023-11-06 16:12:33', '70acc8b1-7a87-11ee-9752-047c168ab67a'),
(14, 8, '2023-11-07 16:12:55', '70acc8b1-7a87-11ee-9752-047c168ab67a'),
(15, 6, '2023-11-06 16:27:46', '96eda10c-7cea-11ee-b40d-047c168ab67a'),
(16, 8, '2023-11-06 18:35:51', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_obesidad`
--

CREATE TABLE `tipos_obesidad` (
  `id` int(11) NOT NULL,
  `tipo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_obesidad`
--

INSERT INTO `tipos_obesidad` (`id`, `tipo`) VALUES
(1, 'Insufficient_Weight'),
(2, 'Normal_Weight'),
(3, 'Obesity_Type_I'),
(4, 'Obesity_Type_II'),
(5, 'Obesity_Type_III'),
(6, 'Overweight_Level_I'),
(7, 'Overweight_Level_II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ejercicio`
--

CREATE TABLE `tipo_ejercicio` (
  `id` int(11) NOT NULL,
  `type` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ejercicio`
--

INSERT INTO `tipo_ejercicio` (`id`, `type`) VALUES
(1, 'Ejercicios de fuerza'),
(2, 'Ejercicios de cardio'),
(3, 'Yoga o ejercicios de estiramiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(120) NOT NULL,
  `usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `password` char(110) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `rol`) VALUES
('2d04c39d-7cf8-11ee-b40d-047c168ab67a', 'c', '$2y$10$dRS96Kc4FcxFiqIsltiEwORfZDWw2Nx6R1ZaXSIygJEb89kqfCQTO', 'c@gmail.com', 2),
('70acc8b1-7a87-11ee-9752-047c168ab67a', 'admin', '$2y$10$LtcI1NU0DL6.gLPOtr4H9OfAgCDDh4hVoQgD1MTsyUN7/Gr7gxCAi', 'admins@gmails.com', 1),
('91abee9a-7cf9-11ee-b40d-047c168ab67a', 'v', '$2y$10$ibW7gU4EHbzBmENZE87pB.bRLRSdnMs.ELbtR1lAyPT3qHWqVENS2', 'v@g.com', 2),
('96eda10c-7cea-11ee-b40d-047c168ab67a', 'd', '$2y$10$kmpJ9EmhNA.6HlwooiNksuAGwglybcccHAO2pr.n2b8oRMXuZNoyq', 'd@gmail.com', 2),
('99b92067-7cf6-11ee-b40d-047c168ab67a', 'a', '$2y$10$8dhLvfJEknmJazaszpQ6HeJqRR.omkJfz/mfuAZg7M82QXQm4wuHi', 'a@gmail.com', 2),
('a3459ea2-7cf9-11ee-b40d-047c168ab67a', 't', '$2y$10$vFbaMnj6cabSyU3UvY8Y8OmtTtxZkOUryW6fA0W/VLbNDVjHZv7YO', 't@c.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_info`
--

CREATE TABLE `usuarios_info` (
  `id` int(11) NOT NULL,
  `id_user` varchar(120) NOT NULL,
  `edad` int(3) NOT NULL,
  `imc` varchar(5) NOT NULL,
  `peso` varchar(6) NOT NULL,
  `id_obesidad` int(11) NOT NULL,
  `altura` varchar(6) NOT NULL,
  `porcentaje_grasa` varchar(6) NOT NULL DEFAULT '0',
  `agua_necesaria` varchar(6) NOT NULL,
  `gender` int(2) NOT NULL,
  `calorias_necesarias` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_info`
--

INSERT INTO `usuarios_info` (`id`, `id_user`, `edad`, `imc`, `peso`, `id_obesidad`, `altura`, `porcentaje_grasa`, `agua_necesaria`, `gender`, `calorias_necesarias`) VALUES
(15, '70acc8b1-7a87-11ee-9752-047c168ab67a', 15, '0', '25', 3, '1.50', '', '1.75', 2, '28064.5'),
(16, '91278644-7a8d-11ee-9752-047c168ab67a', 15, '50', '50', 1, '1.50', '', '1.75', 1, '1334.5'),
(17, '96eda10c-7cea-11ee-b40d-047c168ab67a', 1, '50', '80', 1, '1.50', '', '1.75', 2, '1400.3'),
(18, '99b92067-7cf6-11ee-b40d-047c168ab67a', 15, '0', '60', 1, '170', '', '2.1', 0, '85786'),
(19, '2d04c39d-7cf8-11ee-b40d-047c168ab67a', 50, '15', '15', 1, '1.50', '', '0.525', 1, '834'),
(20, '91abee9a-7cf9-11ee-b40d-047c168ab67a', 15, '15', '15', 1, '1.50', '', '0.525', 1, '998.5'),
(21, 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', 76, '19.39', '70', 1, '1.90', '29.330', '2.765', 1, '1398.2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agua_persona`
--
ALTER TABLE `agua_persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `comida_contador`
--
ALTER TABLE `comida_contador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_usuario`);

--
-- Indices de la tabla `ejercicio_persona`
--
ALTER TABLE `ejercicio_persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_ejercicio` (`tipo_ejercicio`);

--
-- Indices de la tabla `log_peso_user`
--
ALTER TABLE `log_peso_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pasos_persona`
--
ALTER TABLE `pasos_persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `rol_users`
--
ALTER TABLE `rol_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suenio_persona`
--
ALTER TABLE `suenio_persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_obesidad`
--
ALTER TABLE `tipos_obesidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_ejercicio`
--
ALTER TABLE `tipo_ejercicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `usuarios_info`
--
ALTER TABLE `usuarios_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `id_obesidad` (`id_obesidad`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agua_persona`
--
ALTER TABLE `agua_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `comida_contador`
--
ALTER TABLE `comida_contador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ejercicio_persona`
--
ALTER TABLE `ejercicio_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `log_peso_user`
--
ALTER TABLE `log_peso_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `pasos_persona`
--
ALTER TABLE `pasos_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `rol_users`
--
ALTER TABLE `rol_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `suenio_persona`
--
ALTER TABLE `suenio_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipos_obesidad`
--
ALTER TABLE `tipos_obesidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_ejercicio`
--
ALTER TABLE `tipo_ejercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios_info`
--
ALTER TABLE `usuarios_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejercicio_persona`
--
ALTER TABLE `ejercicio_persona`
  ADD CONSTRAINT `ejercicio_persona_ibfk_1` FOREIGN KEY (`tipo_ejercicio`) REFERENCES `tipo_ejercicio` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol_users` (`id`);

--
-- Filtros para la tabla `usuarios_info`
--
ALTER TABLE `usuarios_info`
  ADD CONSTRAINT `usuarios_info_ibfk_2` FOREIGN KEY (`id_obesidad`) REFERENCES `tipos_obesidad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
