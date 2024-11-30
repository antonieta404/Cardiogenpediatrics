-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2024 a las 01:58:32
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
-- Base de datos: `cardiogenpediatrics`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `edad`, `genero`, `peso`, `id_paciente`) VALUES
(1, '10 años', 'Masculino', '30 kg', 1),
(2, '4 años', 'Masculino', '15 kg', 2),
(3, '7 años', 'Masculino', '23 kg', 3),
(4, '5 años', 'Masculino', '12 kg', 4),
(5, '13 años', 'Femenino', '43 kg', 5),
(6, '9 años', 'Femenino', '18 kg', 6),
(7, '11 años', 'Femenino', '25 kg', 7),
(8, '8 años', 'Femenino', '30 kg', 8),
(9, '12 años', 'Femenino', '28 kg', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id_diag` int(11) NOT NULL,
  `historial_clinico` varchar(255) DEFAULT NULL,
  `sintomas` varchar(255) DEFAULT NULL,
  `datos_estadisticos` varchar(255) DEFAULT NULL,
  `id_consulta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`id_diag`, `historial_clinico`, `sintomas`, `datos_estadisticos`, `id_consulta`) VALUES
(1, 'Edad: 10 años, Diagnóstico: Comunicación interventricular', 'Cianosis, dificultad para respirar', 'Estadísticas de casos similares disponibles', 1),
(2, 'Edad: 4 años, Diagnóstico: Defecto septal auricular', 'Fatiga, palpitaciones', 'Baja prevalencia en la infancia temprana', 2),
(3, 'Edad: 7 años, Diagnóstico: Tetralogía de Fallot', 'Cianosis, retraso en el crecimiento', '1 en cada 2500 nacimientos', 3),
(4, 'Edad: 5 años, Diagnóstico: Estenosis ártica', 'Dificultad para respirar, fatiga', 'Severidad variable', 4),
(5, 'Edad: 13 años, Diagnóstico: Comunicación interauricular pequeña', 'Asintomático', 'Controlado y bajo observación', 5),
(6, 'Edad: 9 años, Diagnóstico: Hipertensión pulmonar', 'Disnea, cianosis leve', 'Aumento en prevalencia', 6),
(7, 'Edad: 11 años, Diagnóstico: Miocardiopatía dilatada', 'Fatiga, edema', 'Casos documentados en estudios recientes', 7),
(8, 'Edad: 8 años, Diagnóstico: Insuficiencia mitral', 'Palpitaciones, dificultad para respirar', 'Casos en población infantil', 8),
(9, 'Edad: 12 años, Diagnóstico: Pericarditis', 'Dolor torácico, fiebre', 'Mis común en adolescentes', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `cedula_profesional` varchar(50) DEFAULT NULL,
  `nombre_hospital` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `horario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_medico`, `nombre`, `cedula_profesional`, `nombre_hospital`, `foto`, `horario`) VALUES
(1, 'Juan Fernando Perez del Corral', '764767647', 'CardioGen Pediatrics', '764767647.jpg', 'Lunes - Domingo (Dia libre el lunes): 9:00 AM - 9:00 PM'),
(2, 'Julieta Ponce de Leon', '765489080', 'CardioGen Pediatrics', '765489080.jpg', 'Lunes - Domingo (Dia libre el martes): 9:00 PM - 9:00 AM'),
(3, 'Martin Elias de los Rios Acosta', '543235678', 'CardioGen Pediatrics', '543235678.jpg', 'Lunes - Domingo (Dia libre el miércoles): 9:00 AM - 9:00 PM'),
(4, 'Efrain de las Casas Mejia', '543212349', 'CardioGen Pediatrics', '543212349.jpg', 'Lunes - Domingo (Dia libre el jueves): 9:00 PM - 9:00 AM'),
(5, 'Laura Guzmán Huesca', '543210987', 'CardioGen Pediatrics', '543210987.jpg', 'Lunes - Domingo (Dia libre el viernes): 9:00 AM - 9:00 PM'),
(6, 'Carlos Enrique Rodríguez', '543219876', 'CardioGen Pediatrics', '543219876.jpg', 'Lunes - Domingo (Dia libre el sábado): 9:00 PM - 9:00 AM'),
(7, 'Verónica López Silva', '543218765', 'CardioGen Pediatrics', '543218765.jpg', 'Lunes - Sábado (Dia libre el domingo): 9:00 AM - 9:00 PM'),
(8, 'Héctor Alvarado Ramírez', '543217654', 'CardioGen Pediatrics', '543217654.jpg', 'Martes - Domingo (Dia libre el lunes): 9:00 PM - 9:00 AM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos_pacientes`
--

CREATE TABLE `medicos_pacientes` (
  `id_medicos_pacientes` int(11) NOT NULL,
  `id_medico` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `id_hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre`, `apellido_paterno`, `apellido_materno`, `genero`, `fecha_de_nacimiento`, `id_hospital`) VALUES
(1, 'Daniel', 'Hernandez', 'Leon', 'Masculino', '2014-10-07', 1),
(2, 'Pedro', 'Bravo', 'Rosalio', 'Masculino', '2020-08-06', 1),
(3, 'Samuel', 'Infante', 'Galvan', 'Masculino', '2017-03-03', 1),
(4, 'Gilberto', 'Hernandez', 'Resendiz', 'Masculino', '2018-12-10', 1),
(5, 'Abigail', 'Gomez', 'Ortega', 'Femenino', '2011-04-05', 1),
(6, 'Violeta', 'Jalil', 'Huesca', 'Femenino', '2015-07-15', 1),
(7, 'Alinne', 'Morales', 'Leon', 'Femenino', '2013-09-25', 1),
(8, 'Sandra', 'Martinez', 'Guerrero', 'Femenino', '2016-06-18', 1),
(9, 'Antonela', 'Sanchez', 'Ramirez', 'Femenino', '2012-11-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `consulta_detalle` varchar(255) DEFAULT NULL,
  `diagnostico_detalle` varchar(255) DEFAULT NULL,
  `tratamiento_detalle` varchar(255) DEFAULT NULL,
  `id_trat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `consulta_detalle`, `diagnostico_detalle`, `tratamiento_detalle`, `id_trat`) VALUES
(1, 'Consulta Inicial con Cardiólogo Pediátrico: Incluye evaluación clínica completa, revisión del historial médico, y antecedentes familiares. (Diagnóstico y Tratamiento) precio: $3500', 'Diagnóstico - Pruebas Básicas: Te incluimos - Electrocardiograma (ECG) - Ecocardiograma. El precio ya está incluido en la consulta inicial.', 'Tratamiento recetado: Recomendaciones de tratamiento segun el diagnóstico. Prescripción de medicamentos (si es necesario). Indicación de seguimiento y controles posteriores. El precio ya está incluido en la consulta inicial.', 1),
(2, 'Consulta Inicial con Cardiólogo Pediátrico: Incluye evaluación clínica completa, revisión del historial médico, y antecedentes familiares. precio: $1500', 'Diagnóstico - Pruebas Básicas: Te incluimos - Electrocardiograma (ECG) - Ecocardiograma. El precio ya está incluido en la consulta inicial.', 'Tratamiento recetado: Recomendaciones de tratamiento según el diagnóstico. Prescripción de medicamentos (si es necesario). Indicación de seguimiento y controles posteriores. El precio individual es de $2000.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id_trat` int(11) NOT NULL,
  `medicamento` varchar(255) DEFAULT NULL,
  `monitoreo_de_sintomas` varchar(255) DEFAULT NULL,
  `seguimiento_medico` varchar(255) DEFAULT NULL,
  `id_diag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id_trat`, `medicamento`, `monitoreo_de_sintomas`, `seguimiento_medico`, `id_diag`) VALUES
(1, 'Enalapril 2.5 mg/día', 'Verificar reducción de dificultad para respirar', 'Ecocardiograma cada 6 meses', 1),
(2, 'Furosemida (diurético)', 'Evaluar disminución de edema y mejora en cianosis', 'Control de peso y balance hídrico semanal', 2),
(3, 'Carvedilol 12.5 mg/día', 'Observar mejora en la fatiga y capacidad de ejercicio', 'Control de marcapasos cada 3 meses', 3),
(4, 'Ninguno (para Estenosis ártica)', 'Soplo cardiaco estable, sin nuevos síntomas', 'Ecocardiograma anual', 4),
(5, 'Ninguno (para CIA pequeña)', 'Monitorizar palpitaciones, revisar fatiga', 'Revisión cada 6 meses con electrocardiograma', 5),
(6, 'Aspirina', 'Monitorear efectos secundarios', 'Consulta mensual', 6),
(7, 'Beta bloqueador', 'Evaluar la frecuencia cardiaca', 'Control trimestral', 7),
(8, 'Ibuprofeno', 'Controlar dolor y fiebre', 'Seguimiento según síntomas', 8),
(9, 'Enalapril 2.5 mg/dia', 'Verificar reducción de dificultad para respirar', 'Ecocardiograma cada 6 meses', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id_diag`),
  ADD KEY `id_consulta` (`id_consulta`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id_medico`);

--
-- Indices de la tabla `medicos_pacientes`
--
ALTER TABLE `medicos_pacientes`
  ADD PRIMARY KEY (`id_medicos_pacientes`),
  ADD KEY `id_medico` (`id_medico`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_trat` (`id_trat`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id_trat`),
  ADD KEY `id_diag` (`id_diag`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicos_pacientes`
--
ALTER TABLE `medicos_pacientes`
  MODIFY `id_medicos_pacientes` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_ibfk_1` FOREIGN KEY (`id_consulta`) REFERENCES `consultas` (`id_consulta`);

--
-- Filtros para la tabla `medicos_pacientes`
--
ALTER TABLE `medicos_pacientes`
  ADD CONSTRAINT `medicos_pacientes_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`id_medico`),
  ADD CONSTRAINT `medicos_pacientes_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_trat`) REFERENCES `tratamientos` (`id_trat`);

--
-- Filtros para la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD CONSTRAINT `tratamientos_ibfk_1` FOREIGN KEY (`id_diag`) REFERENCES `diagnosticos` (`id_diag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
