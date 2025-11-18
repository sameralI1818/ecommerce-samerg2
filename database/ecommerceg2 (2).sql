-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2025 a las 19:23:27
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
-- Base de datos: `ecommerceg2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `email_administrador` text NOT NULL,
  `password_administrador` text NOT NULL,
  `rol_administrador` text NOT NULL,
  `nombre_administrador` text NOT NULL,
  `foto_administrador` text NOT NULL,
  `ultimo_login_administrador` datetime DEFAULT NULL,
  `fyh_creacion_administrador` timestamp NOT NULL DEFAULT current_timestamp(),
  `fyh_actualizacion_administrador` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_active_administrador` int(11) NOT NULL,
  `token_administrador` text NOT NULL,
  `expiracion_token_administrador` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `email_administrador`, `password_administrador`, `rol_administrador`, `nombre_administrador`, `foto_administrador`, `ultimo_login_administrador`, `fyh_creacion_administrador`, `fyh_actualizacion_administrador`, `is_active_administrador`, `token_administrador`, `expiracion_token_administrador`) VALUES
(1, 'admin@gmail.com', '$argon2id$v=19$m=131072,t=4,p=2$V3dJc1VJdEx6QnNqMXc4WQ$GhnTOZNdEpNIt6m6upzV6LQNpk7TEUbbN/EGNw3A7as', 'administrador', 'william mejía', '', '2025-10-30 19:21:32', '2025-10-14 21:43:50', '2025-10-30 18:21:32', 0, '', ''),
(2, 'editor@gmail.com', '$argon2id$v=19$m=131072,t=4,p=2$V3dJc1VJdEx6QnNqMXc4WQ$GhnTOZNdEpNIt6m6upzV6LQNpk7TEUbbN/EGNw3A7as', 'editor', 'juanito editor', '', NULL, '2025-10-14 21:43:50', '2025-10-30 17:51:44', 0, '', ''),
(3, 'william@gmail.com', '$argon2id$v=19$m=131072,t=4,p=2$V3dJc1VJdEx6QnNqMXc4WQ$GhnTOZNdEpNIt6m6upzV6LQNpk7TEUbbN/EGNw3A7as', 'administrador', 'William Mejia', '', NULL, '2025-10-29 19:45:57', '2025-10-30 17:51:47', 1, '', ''),
(4, 'junior@gmail.com', '$argon2id$v=19$m=131072,t=4,p=2$V3dJc1VJdEx6QnNqMXc4WQ$GhnTOZNdEpNIt6m6upzV6LQNpk7TEUbbN/EGNw3A7as', 'administrador', 'William Mejia', '', NULL, '2025-10-29 19:50:42', NULL, 1, '', ''),
(5, 'usuario@gmail.com', '$argon2id$v=19$m=131072,t=4,p=2$bWNwVlAwWGxSUWdWRWpaSg$FL7FlY4Y42yf0e0oZDrUthgoSa8EpNHRdu0kWM25INA', 'administrador', 'Nombre usuario', '', NULL, '2025-10-30 17:31:57', NULL, 1, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
