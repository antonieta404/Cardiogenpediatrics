-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2024 a las 01:58:39
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
-- Base de datos: `sistema_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha_registro`) VALUES
(1, 'maria', 'bravo ortega', 'maria.antonieta.bravo.ortega@gmail.com', '$2y$10$ywRsaVuHRz62gIctbpKbhORlC0dn9Nyr69Yiscf/gFmgb3Pke.hCO', '2024-10-31 01:56:17'),
(2, 'bere', 'galvan', 'bere@gmail.com', '$2y$10$FnEh1aTIu6bzRalU2x52cuqaHZCoPOYFr9iYmL3yxNv8wzlATLt6C', '2024-10-31 21:40:49'),
(3, 'evelyn', 'leon', 'evelynleon@gmail.com', '$2y$10$6DfdMmSNoZIWjz9VVpdy3O3pf.d65wHAImw.f/HlbdcBa5QDch71C', '2024-10-31 21:48:49'),
(4, 'paula', 'jimenez', 'paula@gmail.com', '$2y$10$IBDBl7t7HYERSmv4/Yy8r.3GHoM/0XtAet40KehZGi5eTeGEPb/w.', '2024-10-31 21:50:06'),
(5, 'vale', 'perez', 'vale@gmail.com', '$2y$10$bFXyGdQrgGZ/WhK8hESGWOZCUL5kAICXZZ7KyoRtPXLP4rh8KUHIq', '2024-10-31 21:54:49'),
(6, 'erick', 'beristain', 'erick@gmail.com', '$2y$10$5qTQnE6qtGQWUait2OS/Te3ZiOeYj.GfOxl8V428yPrqn0gJRlyKu', '2024-10-31 21:59:25'),
(7, 'adrian', 'valdez', 'adrian@gmail.com', '$2y$10$GkTxLFXcotg9PaJJjsYuG.mprs5kdQL0EMWvkVDaZiv9zXQitLVPu', '2024-11-06 23:35:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
