-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2024 a las 03:10:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

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
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_chat` varchar(480) NOT NULL,
  `id_receptor` varchar(480) NOT NULL,
  `id_emisor` varchar(480) NOT NULL,
  `message` text NOT NULL,
  `send_message` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_chat`, `id_receptor`, `id_emisor`, `message`, `send_message`) VALUES
('2572368a-1160-11ef-bb13-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', '70acc8b1-7a87-11ee-9752-047c168ab67a', 'Hola', '2024-05-13 14:36:51'),
('b5ff9c42-1163-11ef-bb13-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', 'A', '2024-05-13 15:02:22'),
('b89b35f0-1163-11ef-bb13-047c168ab67a', 'ac27578f-1160-11ef-bb13-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', 'a', '2024-05-13 15:02:26'),
('bacb10b9-1163-11ef-bb13-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', 's', '2024-05-13 15:02:30'),
('824ba36c-116f-11ef-b22f-047c168ab67a', '70acc8b1-7a87-11ee-9752-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', 'Cómo vas', '2024-05-13 16:26:49'),
('9fd2aac5-116f-11ef-b22f-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', '70acc8b1-7a87-11ee-9752-047c168ab67a', 'Bien y tú?', '2024-05-13 16:27:39'),
('ad3cb8c1-116f-11ef-b22f-047c168ab67a', '70acc8b1-7a87-11ee-9752-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', 'Súper bien', '2024-05-13 16:28:01'),
('23e22a6d-1170-11ef-b22f-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', '70acc8b1-7a87-11ee-9752-047c168ab67a', 'Pues yo tengo un prolapso, qué hago?', '2024-05-13 16:31:20'),
('2aae0673-1170-11ef-b22f-047c168ab67a', '70acc8b1-7a87-11ee-9752-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', 'Deberías meterte un dildo', '2024-05-13 16:31:32'),
('f4627cd1-1185-11ef-b22f-047c168ab67a', '9fa4cdb5-1171-11ef-b22f-047c168ab67a', '8b15ca21-115f-11ef-bb13-047c168ab67a', 'Hola juan, ¿cómo vas?', '2024-05-13 19:07:30'),
('cc499b8e-1189-11ef-b22f-047c168ab67a', '9fa4cdb5-1171-11ef-b22f-047c168ab67a', 'ac27578f-1160-11ef-bb13-047c168ab67a', 'Hola juan', '2024-05-13 19:35:00'),
('29c34ee3-118a-11ef-b22f-047c168ab67a', '9fa4cdb5-1171-11ef-b22f-047c168ab67a', 'ac27578f-1160-11ef-bb13-047c168ab67a', 'Cómo vas', '2024-05-13 19:37:37'),
('428a035a-118a-11ef-b22f-047c168ab67a', 'ac27578f-1160-11ef-bb13-047c168ab67a', '9fa4cdb5-1171-11ef-b22f-047c168ab67a', 'Súper bien y tú', '2024-05-13 19:38:19');

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
(13, 1, '2023-11-06 16:29:46', '96eda10c-7cea-11ee-b40d-047c168ab67a', 2),
(14, 2, '2024-05-13 14:46:32', '2d04c39d-7cf8-11ee-b40d-047c168ab67a', 1);

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
(25, '70', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', '2023-11-06 18:34:34'),
(26, '50', '9fa4cdb5-1171-11ef-b22f-047c168ab67a', '2024-05-13 17:24:14'),
(27, '50', '83293bc3-1186-11ef-b22f-047c168ab67a', '2024-05-13 19:11:59');

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
(29, 588, '2023-11-06 18:36:20', 'a3459ea2-7cf9-11ee-b40d-047c168ab67a'),
(30, 500, '2024-05-13 14:46:45', '2d04c39d-7cf8-11ee-b40d-047c168ab67a'),
(31, 500, '2024-05-13 14:46:45', '2d04c39d-7cf8-11ee-b40d-047c168ab67a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(1020) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`id`, `nombre`) VALUES
(1, 'Médico general'),
(2, 'Nutricionista'),
(3, 'Psicólogo deportivo'),
(4, 'Entrenador físico');

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
(2, 'Usuario'),
(3, 'Médico');

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
  `rol` int(11) NOT NULL DEFAULT 2,
  `id_number` varchar(64) DEFAULT NULL,
  `id_profession` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `rol`, `id_number`, `id_profession`) VALUES
('2d04c39d-7cf8-11ee-b40d-047c168ab67a', 'cacorro', '$2y$10$LtcI1NU0DL6.gLPOtr4H9OfAgCDDh4hVoQgD1MTsyUN7/Gr7gxCAi', 'cacorro@gmail.com', 2, NULL, NULL),
('70acc8b1-7a87-11ee-9752-047c168ab67a', 'admin', '$2y$10$LtcI1NU0DL6.gLPOtr4H9OfAgCDDh4hVoQgD1MTsyUN7/Gr7gxCAi', 'admins@gmails.com', 1, NULL, NULL),
('83293bc3-1186-11ef-b22f-047c168ab67a', 'pepe', '$2y$10$CHn9dFvGFOTix93zZrAqXe44NreHPrVJxViQUIlrj4oaE9IJRvhLG', 'pepe@pepe.co', 2, NULL, NULL),
('8b15ca21-115f-11ef-bb13-047c168ab67a', 'medico', '$2y$10$IOXTHEZrf6424kIJbd6POeOfo593dbUcZsS/iczIlfA3QunUynzx6', 'medico@medico.com', 3, '123213', 1),
('91abee9a-7cf9-11ee-b40d-047c168ab67a', 'v', '$2y$10$ibW7gU4EHbzBmENZE87pB.bRLRSdnMs.ELbtR1lAyPT3qHWqVENS2', 'v@g.com', 2, NULL, NULL),
('96eda10c-7cea-11ee-b40d-047c168ab67a', 'd', '$2y$10$kmpJ9EmhNA.6HlwooiNksuAGwglybcccHAO2pr.n2b8oRMXuZNoyq', 'd@gmail.com', 2, NULL, NULL),
('99b92067-7cf6-11ee-b40d-047c168ab67a', 'a', '$2y$10$8dhLvfJEknmJazaszpQ6HeJqRR.omkJfz/mfuAZg7M82QXQm4wuHi', 'a@gmail.com', 2, NULL, NULL),
('9fa4cdb5-1171-11ef-b22f-047c168ab67a', 'juan', '$2y$10$zBKRMdRsQU8gqf2eLFWLP.ADMCkh9kcHt8wTUf1t3Ni0ufPVSf6OS', 'juan@juan.co', 2, NULL, NULL),
('a3459ea2-7cf9-11ee-b40d-047c168ab67a', 't', '$2y$10$vFbaMnj6cabSyU3UvY8Y8OmtTtxZkOUryW6fA0W/VLbNDVjHZv7YO', 't@c.com', 2, NULL, NULL),
('a84026c8-1186-11ef-b22f-047c168ab67a', 'pepino', '$2y$10$udaN0Ji3HqrMvaxwJ9q8l.iZnbQwinqpoZf22iv94vbReF0Pxwh2y', 'pepino@pepino.com', 2, NULL, NULL),
('ac27578f-1160-11ef-bb13-047c168ab67a', 'mexico', '$2y$10$0dTdt2kpZRuireX9bv3toeLSxwbIMrr.mnC2cHoGmLWhtmBvnkIZi', 'mexico@mexico.com', 3, '546546', 3),
('b38d4970-1186-11ef-b22f-047c168ab67a', 'juana', '$2y$10$gzEouab/ScNn2eJV.miCD.CE3bXviws/Ijb95XFUQkAIkaq6bMUM6', 'juana@juana.com', 2, NULL, NULL);

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
  `calorias_necesarias` varchar(10) NOT NULL,
  `response_questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`response_questions`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_info`
--

INSERT INTO `usuarios_info` (`id`, `id_user`, `edad`, `imc`, `peso`, `id_obesidad`, `altura`, `porcentaje_grasa`, `agua_necesaria`, `gender`, `calorias_necesarias`, `response_questions`) VALUES
(15, '70acc8b1-7a87-11ee-9752-047c168ab67a', 15, '0', '25', 3, '1.50', '', '1.75', 2, '28064.5', '{\"MTRANS_Automobile\":\"0\",\"MTRANS_Bike\":\"0\",\"MTRANS_Motorbike\":\"1\",\"MTRANS_Public_Transportation\":\"1\",\"MTRANS_Walking\":\"1\",\"female\":\"1\",\"Age\":\"15\",\"Height\":\"1.50\",\"Weight\":\"50\",\"family_history_overweight\":\"1\",\"FAVC\":\"1\",\"FCVC\":\"1\",\"NCP\":\"1\",\"CAEC\":\"1\",\"SMOKE\":\"0\",\"CH2O\":\"1\",\"SCC\":\"\",\"FAF\":\"1\",\"TUE\":\"1\",\"CALC\":\"1\",\"predictionResult\":\"\"}'),
(16, '91278644-7a8d-11ee-9752-047c168ab67a', 15, '50', '50', 1, '1.50', '', '1.75', 1, '1334.5', '{\"MTRANS_Automobile\":\"1\",\"MTRANS_Bike\":\"1\",\"MTRANS_Motorbike\":\"1\",\"MTRANS_Public_Transportation\":\"1\",\"MTRANS_Walking\":\"1\",\"female\":\"1\",\"Age\":\"15\",\"Height\":\"1.50\",\"Weight\":\"50\",\"family_history_overweight\":\"1\",\"FAVC\":\"1\",\"FCVC\":\"1\",\"NCP\":\"1\",\"CAEC\":\"1\",\"SMOKE\":\"1\",\"CH2O\":\"1\",\"SCC\":\"\",\"FAF\":\"1\",\"TUE\":\"1\",\"CALC\":\"1\",\"predictionResult\":\"\"}'),
(17, '96eda10c-7cea-11ee-b40d-047c168ab67a', 1, '50', '80', 1, '1.50', '', '1.75', 2, '1400.3', '{\"MTRANS_Automobile\":\"1\",\"MTRANS_Bike\":\"1\",\"MTRANS_Motorbike\":\"1\",\"MTRANS_Public_Transportation\":\"1\",\"MTRANS_Walking\":\"1\",\"female\":\"1\",\"Age\":\"15\",\"Height\":\"1.50\",\"Weight\":\"50\",\"family_history_overweight\":\"1\",\"FAVC\":\"1\",\"FCVC\":\"1\",\"NCP\":\"1\",\"CAEC\":\"1\",\"SMOKE\":\"1\",\"CH2O\":\"1\",\"SCC\":\"\",\"FAF\":\"1\",\"TUE\":\"1\",\"CALC\":\"1\",\"predictionResult\":\"\"}'),
(18, '99b92067-7cf6-11ee-b40d-047c168ab67a', 15, '0', '60', 1, '170', '', '2.1', 0, '85786', '{\"MTRANS_Automobile\":\"1\",\"MTRANS_Bike\":\"1\",\"MTRANS_Motorbike\":\"1\",\"MTRANS_Public_Transportation\":\"1\",\"MTRANS_Walking\":\"1\",\"female\":\"1\",\"Age\":\"15\",\"Height\":\"1.50\",\"Weight\":\"50\",\"family_history_overweight\":\"1\",\"FAVC\":\"1\",\"FCVC\":\"1\",\"NCP\":\"1\",\"CAEC\":\"1\",\"SMOKE\":\"1\",\"CH2O\":\"1\",\"SCC\":\"\",\"FAF\":\"1\",\"TUE\":\"1\",\"CALC\":\"1\",\"predictionResult\":\"\"}'),
(19, '2d04c39d-7cf8-11ee-b40d-047c168ab67a', 50, '15', '15', 1, '1.50', '', '0.525', 1, '834', '{\"MTRANS_Automobile\":\"1\",\"MTRANS_Bike\":\"1\",\"MTRANS_Motorbike\":\"1\",\"MTRANS_Public_Transportation\":\"1\",\"MTRANS_Walking\":\"1\",\"female\":\"1\",\"Age\":\"15\",\"Height\":\"1.50\",\"Weight\":\"50\",\"family_history_overweight\":\"1\",\"FAVC\":\"1\",\"FCVC\":\"1\",\"NCP\":\"1\",\"CAEC\":\"1\",\"SMOKE\":\"1\",\"CH2O\":\"1\",\"SCC\":\"\",\"FAF\":\"1\",\"TUE\":\"1\",\"CALC\":\"1\",\"predictionResult\":\"\"}'),
(20, '91abee9a-7cf9-11ee-b40d-047c168ab67a', 15, '15', '15', 1, '1.50', '', '0.525', 1, '998.5', '{\"MTRANS_Automobile\":\"1\",\"MTRANS_Bike\":\"1\",\"MTRANS_Motorbike\":\"1\",\"MTRANS_Public_Transportation\":\"1\",\"MTRANS_Walking\":\"1\",\"female\":\"1\",\"Age\":\"15\",\"Height\":\"1.50\",\"Weight\":\"50\",\"family_history_overweight\":\"1\",\"FAVC\":\"1\",\"FCVC\":\"1\",\"NCP\":\"1\",\"CAEC\":\"1\",\"SMOKE\":\"1\",\"CH2O\":\"1\",\"SCC\":\"\",\"FAF\":\"1\",\"TUE\":\"1\",\"CALC\":\"1\",\"predictionResult\":\"\"}'),
(21, 'a3459ea2-7cf9-11ee-b40d-047c168ab67a', 76, '19.39', '70', 1, '1.90', '29.330', '2.765', 1, '1398.2', '{\"MTRANS_Automobile\":\"1\",\"MTRANS_Bike\":\"1\",\"MTRANS_Motorbike\":\"1\",\"MTRANS_Public_Transportation\":\"1\",\"MTRANS_Walking\":\"1\",\"female\":\"1\",\"Age\":\"15\",\"Height\":\"1.50\",\"Weight\":\"50\",\"family_history_overweight\":\"1\",\"FAVC\":\"1\",\"FCVC\":\"1\",\"NCP\":\"1\",\"CAEC\":\"1\",\"SMOKE\":\"1\",\"CH2O\":\"1\",\"SCC\":\"\",\"FAF\":\"1\",\"TUE\":\"1\",\"CALC\":\"1\",\"predictionResult\":\"\"}'),
(22, '9fa4cdb5-1171-11ef-b22f-047c168ab67a', 15, '22.22', '50', 2, '1.50', '', '1.75', 1, '1334.5', '{\"MTRANS_Automobile\":\"1\",\"MTRANS_Bike\":\"1\",\"MTRANS_Motorbike\":\"1\",\"MTRANS_Public_Transportation\":\"1\",\"MTRANS_Walking\":\"1\",\"female\":\"1\",\"Age\":\"15\",\"Height\":\"1.50\",\"Weight\":\"50\",\"family_history_overweight\":\"1\",\"FAVC\":\"1\",\"FCVC\":\"1\",\"NCP\":\"1\",\"CAEC\":\"1\",\"SMOKE\":\"1\",\"CH2O\":\"1\",\"SCC\":\"\",\"FAF\":\"1\",\"TUE\":\"1\",\"CALC\":\"1\",\"predictionResult\":\"\"}'),
(23, '83293bc3-1186-11ef-b22f-047c168ab67a', 50, '22.22', '50', 2, '1.50', '', '1.75', 1, '1170', '{\"MTRANS_Automobile\":\"0\",\"MTRANS_Bike\":\"0\",\"MTRANS_Motorbike\":\"0\",\"MTRANS_Public_Transportation\":\"0\",\"MTRANS_Walking\":\"0\",\"female\":\"1\",\"Age\":\"50\",\"Height\":\"1.50\",\"Weight\":\"50\",\"family_history_overweight\":\"0\",\"FAVC\":\"0\",\"FCVC\":\"0\",\"NCP\":\"0\",\"CAEC\":\"0\",\"SMOKE\":\"0\",\"CH2O\":\"0\",\"SCC\":\"0\",\"FAF\":\"0\",\"TUE\":\"0\",\"CALC\":\"0\",\"predictionResult\":\"\"}');

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
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD KEY `id_receptor` (`id_receptor`),
  ADD KEY `id_receptor_2` (`id_receptor`),
  ADD KEY `id_emisor` (`id_emisor`);

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
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `rol` (`rol`),
  ADD KEY `id_profession` (`id_profession`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `log_peso_user`
--
ALTER TABLE `log_peso_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pasos_persona`
--
ALTER TABLE `pasos_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol_users`
--
ALTER TABLE `rol_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol_users` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_profession`) REFERENCES `profesiones` (`id`);

--
-- Filtros para la tabla `usuarios_info`
--
ALTER TABLE `usuarios_info`
  ADD CONSTRAINT `usuarios_info_ibfk_2` FOREIGN KEY (`id_obesidad`) REFERENCES `tipos_obesidad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
