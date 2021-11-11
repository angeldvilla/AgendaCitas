-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2021 a las 07:01:46
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agendacitas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendamiento`
--

CREATE TABLE `agendamiento` (
  `id_agendamiento` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `apellidos` varchar(55) NOT NULL,
  `especialidad` varchar(55) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `correo` varchar(55) NOT NULL,
  `pago_id_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agendamiento`
--

INSERT INTO `agendamiento` (`id_agendamiento`, `nombre`, `apellidos`, `especialidad`, `fecha`, `hora`, `correo`, `pago_id_pago`) VALUES
(2, 'Sofia', 'Castro', 'Psicologia', '2021-11-13', '15:30:00', 'soficastro@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `pacientes_id_paciente` int(11) NOT NULL,
  `doctores_id_doctores` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `pacientes_id_paciente`, `doctores_id_doctores`, `fecha_cita`, `hora_cita`, `estado`) VALUES
(3, 5, 4, '2021-11-12', '10:30:00', 'SIN CANCELAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_doctores` int(11) NOT NULL,
  `nombre_doctor` varchar(55) NOT NULL,
  `apellidos_doctor` varchar(55) NOT NULL,
  `num_documento` varchar(55) NOT NULL,
  `especialidad` int(11) NOT NULL,
  `genero` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telefono` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctores`, `nombre_doctor`, `apellidos_doctor`, `num_documento`, `especialidad`, `genero`, `email`, `telefono`) VALUES
(4, 'Ricardo', 'Ruiz', '521554', 4, 'Masculino', 'richard@outlook.com', '3105674324'),
(8, 'Victor', 'Parra', '525234234\r\n 			', 2, 'Masculino', 'vaar@gmail.com', '7234212423');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidades` int(11) NOT NULL,
  `tipo_especialidad` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidades`, `tipo_especialidad`) VALUES
(1, 'Gastroenterologia'),
(2, 'Cardiologia'),
(3, 'Psicologia'),
(4, 'Neumonologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id_historia_clinica` int(11) NOT NULL,
  `nombre_sede` varchar(55) NOT NULL,
  `pacientes_id_pacientes` int(11) NOT NULL,
  `motivo_cita` varchar(55) NOT NULL,
  `antecedentes` varchar(55) NOT NULL,
  `ordenes_medicas` varchar(55) NOT NULL,
  `informe` varchar(100) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historia_clinica`
--

INSERT INTO `historia_clinica` (`id_historia_clinica`, `nombre_sede`, `pacientes_id_pacientes`, `motivo_cita`, `antecedentes`, `ordenes_medicas`, `informe`, `fecha_ingreso`, `fecha_salida`) VALUES
(1, 'Medicare', 1, 'Convulsion', 'Asfixia, Asma', 'Reposo en cama, tomar sus pastillas', 'El joven reporto un caso de convulsion, el cual fue con', '2021-11-10', '2021-11-12'),
(2, 'Medicare', 3, 'Dolores', 'Mareos', 'Una pasta de acetaminofen cada 12 horas', 'Debe estar en reposo la mayor parte del tiempo', '2021-11-11', '2021-11-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_pacientes` int(11) NOT NULL,
  `nombre_paciente` varchar(55) NOT NULL,
  `apellidos` varchar(55) NOT NULL,
  `num_documento` varchar(55) NOT NULL,
  `genero` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(55) NOT NULL,
  `enfermedad` varchar(55) NOT NULL,
  `medicamentos` varchar(55) NOT NULL,
  `alergias` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_pacientes`, `nombre_paciente`, `apellidos`, `num_documento`, `genero`, `email`, `telefono`, `enfermedad`, `medicamentos`, `alergias`) VALUES
(1, 'Ricardo', 'Aguilar', '521554', 'Masculino', 'richard@outlook.com', '3015985993', 'Asma', 'Acetaminofen', 'Ninguna'),
(2, 'das', 'fga', '14231', 'Masculino\r\n 			', 'fasda@example.com', '31624252414', 'Vomito', 'Acetaminofen', 'NO'),
(3, 'rara', 'tjsad', '375623', 'Masculino\r\n 			', 'fhsrgh@outlook.com', '53463212', 'Faringitis', 'Propoleo', 'SI'),
(4, 'luar', '3letra', '06964235', 'Masculino\r\n 			', 'fsghsa@3letra.com', '628324252', 'Taquicardia', 'Percoset', 'NO'),
(5, 'malu', 'trevejo', '74252', 'Femenino\r\n 			', 'malutrevejo@ig.com', '7576352', 'Parkirson', 'jarabe de limon con cereza', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `estado` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `estado`) VALUES
(1, 'CANCELADA'),
(2, 'SIN CANCELAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Doctor'),
(3, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `apellidos` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo_usuario_id_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `username`, `password`, `tipo_usuario_id_FK`) VALUES
(5, 'Luis', 'Hernandez', 'lusih@gmail.com', 'luish22', '29d48c865079f37ecd2c43a293d610ef', 1),
(6, 'Johan', 'Posada', 'leiderps@gmail.com\r\n 			', 'jhoanps', '3ada65b7bae1aeeca499bfbe2193fd5f', 3),
(7, 'Federico', 'Castro', 'fedeg@gmail.com', 'fedegz21', 'a0cc42e8138adbce43f86e0128db65d1', 2),
(8, 'Roger', 'Gomez', 'rgmez@gmail.com', 'roger', '078d52006eef820aab1a1bed25aa6f4f', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendamiento`
--
ALTER TABLE `agendamiento`
  ADD PRIMARY KEY (`id_agendamiento`),
  ADD KEY `pago_id_FK` (`pago_id_pago`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `pacientes_id_FK` (`pacientes_id_paciente`),
  ADD KEY `doctores_id_FK` (`doctores_id_doctores`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doctores`),
  ADD KEY `especialidad_FK` (`especialidad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidades`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`id_historia_clinica`),
  ADD KEY `pacientes_id_pacientes` (`pacientes_id_pacientes`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_pacientes`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo_usuario_id_FK` (`tipo_usuario_id_FK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agendamiento`
--
ALTER TABLE `agendamiento`
  MODIFY `id_agendamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id_historia_clinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_pacientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agendamiento`
--
ALTER TABLE `agendamiento`
  ADD CONSTRAINT `pago_id_FK` FOREIGN KEY (`pago_id_pago`) REFERENCES `pago` (`id_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `doctores_id_FK` FOREIGN KEY (`doctores_id_doctores`) REFERENCES `doctores` (`id_doctores`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pacientes_id_FK` FOREIGN KEY (`pacientes_id_paciente`) REFERENCES `pacientes` (`id_pacientes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `especialidad_FK` FOREIGN KEY (`especialidad`) REFERENCES `especialidades` (`id_especialidades`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `pacientes_id_pacientes` FOREIGN KEY (`pacientes_id_pacientes`) REFERENCES `pacientes` (`id_pacientes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `tipo_usuario_id_FK` FOREIGN KEY (`tipo_usuario_id_FK`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
