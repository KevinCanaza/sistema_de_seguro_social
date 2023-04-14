-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2023 a las 21:23:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sistema_seguro_social`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoderado`
--

CREATE TABLE `apoderado` (
  `id_apoderado` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `ci` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `apoderado`
--

INSERT INTO `apoderado` (`id_apoderado`, `first_name`, `last_name`, `ci`, `celular`, `fecha_nacimiento`, `estado`) VALUES
(1, 'apoderado unos', 'apellido uno', 4332423, 454654, '2004-03-10', '1'),
(2, 'apoderado 2', 'apellido de apoderado 2', 1111111, 32432423, '1996-02-07', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `estado` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`, `area`, `estado`) VALUES
(1, 'ciencias sociales', 'Investigación', '0'),
(3, 'ingieria de sistemas', 'sin area', '0'),
(4, 'ciencias de la comunicacion', 'social', '0'),
(5, 'Medicina', 'salud', '0'),
(6, 'Administración de empresas', '', '1'),
(7, 'Arquitectura', '', '1'),
(8, 'Ciencias del desarrollo', '', '1'),
(9, 'Ciencias de la educación', '', '1'),
(10, 'Comunicación social', '', '1'),
(11, 'Ingeniería de sistemas', '', '1'),
(12, 'Ingeniería electrónica', '', '1'),
(13, 'Ingeniería en gas y petroquímica', '', '1'),
(14, 'Ingeniería en producción empresarial', '', '1'),
(15, 'Lingüística', '', '1'),
(16, 'Medicina', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_estudiante`
--

CREATE TABLE `datos_estudiante` (
  `id_datos` int(15) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `CI` int(15) NOT NULL,
  `carrera_unidad` int(11) NOT NULL,
  `direccion_est` varchar(255) NOT NULL,
  `telefono` int(10) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_fin_seguro` datetime NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado_datos` enum('1','0') NOT NULL,
  `estado_revision` enum('0','1') NOT NULL,
  `id_usuario` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_estudiante`
--

INSERT INTO `datos_estudiante` (`id_datos`, `first_name`, `last_name`, `fecha_nacimiento`, `CI`, `carrera_unidad`, `direccion_est`, `telefono`, `fecha_registro`, `fecha_fin_seguro`, `imagen`, `estado_datos`, `estado_revision`, `id_usuario`) VALUES
(1, 'kevin', 'canaza', '2001-07-30', 3424, 7, 'por la upea', 5324242, '2023-03-31 17:40:35', '2023-10-01 00:00:00', 'foto.jpg', '1', '0', 1),
(2, 'OMAR', 'TORREZ', '2003-02-04', 1111111, 11, '342432', 2131231, '2023-03-30 19:31:00', '2023-05-01 19:31:00', 'foto.jpg', '1', '0', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_doctor` int(15) NOT NULL,
  `nombre_doctor` varchar(100) NOT NULL,
  `ci_doctor` varchar(15) NOT NULL,
  `celular_doctor` int(10) NOT NULL,
  `email_doctor` varchar(100) NOT NULL,
  `imagen_doctor` varchar(255) NOT NULL,
  `link_face` varchar(255) DEFAULT NULL,
  `link_twitter` varchar(255) DEFAULT NULL,
  `estado_doctor` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `nombre_doctor`, `ci_doctor`, `celular_doctor`, `email_doctor`, `imagen_doctor`, `link_face`, `link_twitter`, `estado_doctor`) VALUES
(2, 'Doctore kevin', '432432432', 42424, 'kevin@gmail.com', 'foto2.jpg', 'kevin.youtbe', 'kevin.com', '1'),
(3, 'Omar el doctors', '433243243', 9986969, 'omar@gmaol.com', 'foto2.jpg', 'omar.twitt', 'omar.coms', '1'),
(4, 'doctordos', '156454', 456465, 'docto@gmail.com', 'foto2.jpg', '', '', '1'),
(5, 'dwadwa', '1213213', 132131, 'ad@gmail.com', 'base_de_datos_seguro_social_old.png', '', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_especialidad`
--

CREATE TABLE `doctor_especialidad` (
  `id_doctor_especialidad` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `estado` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctor_especialidad`
--

INSERT INTO `doctor_especialidad` (`id_doctor_especialidad`, `id_doctor`, `id_especialidad`, `estado`) VALUES
(1, 2, 2, '1'),
(3, 2, 2, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id_enfermedad` int(15) NOT NULL,
  `nombre_enfermedad` varchar(100) NOT NULL,
  `estado_enfermedad` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`id_enfermedad`, `nombre_enfermedad`, `estado_enfermedad`) VALUES
(1, 'Autismo', '1'),
(2, 'Ébola', '1'),
(3, 'Influenza (gripe)', '1'),
(4, 'a', '1'),
(5, 'b', '1'),
(12, 'TOS', '1'),
(13, 'GRIPE', '1'),
(14, 'LUNAs', '1'),
(19, 'AAAA', '1'),
(21, 'CCCC', '1'),
(22, 'fdgdg', '1'),
(23, 'nuevo dato', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad_estudiante`
--

CREATE TABLE `enfermedad_estudiante` (
  `id_enfer_est` int(11) NOT NULL,
  `id_enfermedad` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `estado` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermedad_estudiante`
--

INSERT INTO `enfermedad_estudiante` (`id_enfer_est`, `id_enfermedad`, `id_estudiante`, `estado`) VALUES
(1, 2, 2, '0'),
(2, 3, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidades` int(15) NOT NULL,
  `nombre_especialidad` varchar(255) NOT NULL,
  `tipo_especialidad` varchar(255) NOT NULL,
  `estado` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidades`, `nombre_especialidad`, `tipo_especialidad`, `estado`) VALUES
(1, 'Cardiología', 'Especialidades clínicas', '1'),
(2, 'Especialidades', 'Angry birds', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id_ficha` int(15) NOT NULL,
  `id_servicio` int(15) DEFAULT NULL,
  `id_doctor` int(15) NOT NULL,
  `id_datos_estudiante` int(15) DEFAULT NULL,
  `id_horario_doctor` int(15) NOT NULL,
  `estado_ficha` enum('1','0') NOT NULL,
  `estado_atendido` enum('1','0') NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_ficha` datetime NOT NULL,
  `ci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `id_servicio`, `id_doctor`, `id_datos_estudiante`, `id_horario_doctor`, `estado_ficha`, `estado_atendido`, `fecha_registro`, `fecha_ficha`, `ci`) VALUES
(1, 1, 2, 1, 1, '1', '1', '2023-03-27 04:02:00', '2023-03-11 01:02:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_parentesco`
--

CREATE TABLE `grado_parentesco` (
  `id_grado` int(15) NOT NULL,
  `grado_parentesco` varchar(100) NOT NULL,
  `estado` enum('1','0') NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_apoderado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado_parentesco`
--

INSERT INTO `grado_parentesco` (`id_grado`, `grado_parentesco`, `estado`, `id_estudiante`, `id_apoderado`) VALUES
(1, 'Madre', '0', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `estado` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `estado`) VALUES
(1, 'Administrador', 'Permite gestionar como operaciones básicas de adición, modificación y eliminación de registros.', '1'),
(2, 'Usuario', 'Acceso restrictivo a un numero limitado de operaciones', '1'),
(3, 'Doctor', 'Usuario que administra a los estudiante beneficiador con el seguro social.', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_medico`
--

CREATE TABLE `horario_medico` (
  `id_horario_medico` int(15) NOT NULL,
  `dia_laborable` text NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `cita_duracion` varchar(100) NOT NULL,
  `id_medico` int(15) NOT NULL,
  `estado_horario` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario_medico`
--

INSERT INTO `horario_medico` (`id_horario_medico`, `dia_laborable`, `hora_inicio`, `hora_fin`, `cita_duracion`, `id_medico`, `estado_horario`) VALUES
(1, 'Lunes - Martes', '23:07:00', '22:06:00', '30 min', 2, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_rating`
--

CREATE TABLE `item_rating` (
  `id_rating` int(15) NOT NULL,
  `letra_rating` varchar(5) NOT NULL,
  `id_user` int(15) NOT NULL,
  `unnamed2` varchar(100) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `comentario` text NOT NULL,
  `id_notificacion` int(15) NOT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `estado_rating` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `item_rating`
--

INSERT INTO `item_rating` (`id_rating`, `letra_rating`, `id_user`, `unnamed2`, `titulo`, `comentario`, `id_notificacion`, `creado`, `modificado`, `estado_rating`) VALUES
(1, 'A', 2, 'kevan', 'Talleres', 'dwadwa', 1, '2023-03-27 17:44:07', '2023-03-27 17:55:29', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(15) NOT NULL,
  `id_datos` int(15) NOT NULL,
  `user2` int(15) NOT NULL,
  `celular_emerg` int(10) NOT NULL,
  `comentario` text NOT NULL,
  `detalle_not` varchar(255) NOT NULL,
  `unnamed2` varchar(100) NOT NULL,
  `grado_incidente` varchar(100) NOT NULL,
  `leido` enum('1','0') NOT NULL,
  `id_doctor` int(15) NOT NULL,
  `enviado_al_doctor` int(1) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_notificacion`, `id_datos`, `user2`, `celular_emerg`, `comentario`, `detalle_not`, `unnamed2`, `grado_incidente`, `leido`, `id_doctor`, `enviado_al_doctor`, `fecha`, `estado`) VALUES
(1, 2, 1, 1111111, 'enfermedad', 'sin detalle', 'kevan', 'grave', '1', 3, 0, '2023-03-25 11:03:00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_de_atencion`
--

CREATE TABLE `servicios_de_atencion` (
  `id_servicios` int(15) NOT NULL,
  `id_doctor_encargado` int(15) NOT NULL,
  `gestion` varchar(15) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `fuente` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `foto_servicio` varchar(255) NOT NULL,
  `estado_servicio` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios_de_atencion`
--

INSERT INTO `servicios_de_atencion` (`id_servicios`, `id_doctor_encargado`, `gestion`, `fecha_inicio`, `fecha_fin`, `fuente`, `descripcion`, `foto_servicio`, `estado_servicio`) VALUES
(1, 2, '2023-09', '2023-03-27 00:00:00', '2023-03-30 04:00:00', 'google', 'area de enfermeria', 'foto.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `id_sintoma` int(15) NOT NULL,
  `nombre_sintoma` varchar(100) NOT NULL,
  `estado_sintoma` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sintomas`
--

INSERT INTO `sintomas` (`id_sintoma`, `nombre_sintoma`, `estado_sintoma`) VALUES
(1, 'Fiebre o escalofríos', '1'),
(2, 'Tos', '1'),
(3, 'Dificultad para respirar (sentir que le falta el aire)', '1'),
(4, 'Fatiga', '0'),
(5, 'Cancer', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintoma_estudiante`
--

CREATE TABLE `sintoma_estudiante` (
  `id_sint_est` int(11) NOT NULL,
  `id_datos` int(11) NOT NULL,
  `id_sintoma` int(11) NOT NULL,
  `estado` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sintoma_estudiante`
--

INSERT INTO `sintoma_estudiante` (`id_sint_est`, `id_datos`, `id_sintoma`, `estado`) VALUES
(1, 1, 1, '1'),
(2, 2, 3, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_selector` int(1) NOT NULL,
  `activation_code` int(1) NOT NULL,
  `forgotten_passwordd_selector` int(1) NOT NULL,
  `forgotten_passwordd_code` varchar(100) NOT NULL,
  `forgotten_passwordd_time` time NOT NULL,
  `remember_selector` int(1) NOT NULL,
  `remember_code` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1',
  `company` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `ci_persona` varchar(20) NOT NULL,
  `usuario_mae` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_selector`, `activation_code`, `forgotten_passwordd_selector`, `forgotten_passwordd_code`, `forgotten_passwordd_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `company`, `first_name`, `last_name`, `ci_persona`, `usuario_mae`) VALUES
(1, '::1', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 'admin@gmail.com', 0, 0, 0, '', '00:00:00', 0, 0, '2023-03-09 14:36:32', '2023-04-05 21:48:04', '1', 'Admin Corps', 'Admin', 'Admin', '', ''),
(2, '::1', 'CanazaKevin', 'ffb4761cba839470133bee36aeb139f58d7dbaa9', '', 'kevin@gmail.com', 0, 0, 0, '', '00:00:00', 0, 0, '2023-03-26 00:06:33', '2023-04-05 21:57:12', '1', 'Compañía kevin', 'Kevin ', 'Canaza', '', 'Kevin123456'),
(3, '::1', 'DoctorUno', 'd0afb7b4da2e6cc1b2b6471730522e2670d85619', '', 'doctor1@gmail.com', 0, 0, 0, '', '00:00:00', 0, 0, '2023-04-04 21:35:32', '2023-04-05 21:53:06', '1', '', 'Doctor uno', 'Apellido del doctor uno', '8888888', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `group_id` int(15) NOT NULL,
  `estado` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`, `estado`) VALUES
(1, 1, 1, '1'),
(4, 2, 2, '1'),
(5, 3, 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `1id_visita` int(10) NOT NULL,
  `fecha_visita` datetime NOT NULL,
  `ip_visita` varchar(15) NOT NULL,
  `datos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apoderado`
--
ALTER TABLE `apoderado`
  ADD PRIMARY KEY (`id_apoderado`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `datos_estudiante`
--
ALTER TABLE `datos_estudiante`
  ADD PRIMARY KEY (`id_datos`),
  ADD KEY `fk_id_usuario` (`id_usuario`),
  ADD KEY `id_datos` (`id_datos`),
  ADD KEY `fk_id_carrera` (`carrera_unidad`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Indices de la tabla `doctor_especialidad`
--
ALTER TABLE `doctor_especialidad`
  ADD PRIMARY KEY (`id_doctor_especialidad`),
  ADD KEY `fk_id_doctor` (`id_doctor`),
  ADD KEY `fk_id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`id_enfermedad`),
  ADD KEY `id_enfermedad` (`id_enfermedad`);

--
-- Indices de la tabla `enfermedad_estudiante`
--
ALTER TABLE `enfermedad_estudiante`
  ADD PRIMARY KEY (`id_enfer_est`),
  ADD KEY `fk_id_enfermedad` (`id_enfermedad`),
  ADD KEY `fk_id_estudiante1` (`id_estudiante`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidades`),
  ADD KEY `id_especialidades` (`id_especialidades`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `fk_id_estudiante_ficha` (`id_datos_estudiante`),
  ADD KEY `fk_id_doctor_ficha` (`id_doctor`),
  ADD KEY `fk_id_servicio_ficha` (`id_servicio`),
  ADD KEY `fk_id_horario_doctor` (`id_horario_doctor`);

--
-- Indices de la tabla `grado_parentesco`
--
ALTER TABLE `grado_parentesco`
  ADD PRIMARY KEY (`id_grado`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `fk_id_estudiante` (`id_estudiante`),
  ADD KEY `fk_id_apoderado` (`id_apoderado`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `horario_medico`
--
ALTER TABLE `horario_medico`
  ADD PRIMARY KEY (`id_horario_medico`),
  ADD KEY `fk_id_doctor_horario` (`id_medico`);

--
-- Indices de la tabla `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `fk_id_user_item` (`id_user`),
  ADD KEY `fk_id_notificacion` (`id_notificacion`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `fk_id_estudiante_notificaciones` (`id_datos`),
  ADD KEY `fk_id_use2` (`user2`),
  ADD KEY `fk_id_doctor_notificaciones` (`id_doctor`),
  ADD KEY `id_notificacion` (`id_notificacion`);

--
-- Indices de la tabla `servicios_de_atencion`
--
ALTER TABLE `servicios_de_atencion`
  ADD PRIMARY KEY (`id_servicios`),
  ADD KEY `fk_id_doctor_servicio` (`id_doctor_encargado`),
  ADD KEY `id_servicios` (`id_servicios`);

--
-- Indices de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id_sintoma`);

--
-- Indices de la tabla `sintoma_estudiante`
--
ALTER TABLE `sintoma_estudiante`
  ADD PRIMARY KEY (`id_sint_est`),
  ADD KEY `fk_id_datos_estudiante` (`id_datos`),
  ADD KEY `fk_id_sintomas` (`id_sintoma`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indices de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`1id_visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apoderado`
--
ALTER TABLE `apoderado`
  MODIFY `id_apoderado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `datos_estudiante`
--
ALTER TABLE `datos_estudiante`
  MODIFY `id_datos` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctor` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `doctor_especialidad`
--
ALTER TABLE `doctor_especialidad`
  MODIFY `id_doctor_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `id_enfermedad` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `enfermedad_estudiante`
--
ALTER TABLE `enfermedad_estudiante`
  MODIFY `id_enfer_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidades` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grado_parentesco`
--
ALTER TABLE `grado_parentesco`
  MODIFY `id_grado` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario_medico`
--
ALTER TABLE `horario_medico`
  MODIFY `id_horario_medico` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `id_rating` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicios_de_atencion`
--
ALTER TABLE `servicios_de_atencion`
  MODIFY `id_servicios` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id_sintoma` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sintoma_estudiante`
--
ALTER TABLE `sintoma_estudiante`
  MODIFY `id_sint_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `1id_visita` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_estudiante`
--
ALTER TABLE `datos_estudiante`
  ADD CONSTRAINT `fk_id_carrera` FOREIGN KEY (`carrera_unidad`) REFERENCES `carreras` (`id_carrera`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `doctor_especialidad`
--
ALTER TABLE `doctor_especialidad`
  ADD CONSTRAINT `fk_id_doctor` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_especialidad` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidades`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `enfermedad_estudiante`
--
ALTER TABLE `enfermedad_estudiante`
  ADD CONSTRAINT `fk_id_enfermedad` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedades` (`id_enfermedad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_estudiante1` FOREIGN KEY (`id_estudiante`) REFERENCES `datos_estudiante` (`id_datos`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `fk_id_doctor_ficha` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_estudiante_ficha` FOREIGN KEY (`id_datos_estudiante`) REFERENCES `datos_estudiante` (`id_datos`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_horario_doctor` FOREIGN KEY (`id_horario_doctor`) REFERENCES `horario_medico` (`id_horario_medico`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_servicio_ficha` FOREIGN KEY (`id_servicio`) REFERENCES `servicios_de_atencion` (`id_servicios`) ON DELETE CASCADE;

--
-- Filtros para la tabla `grado_parentesco`
--
ALTER TABLE `grado_parentesco`
  ADD CONSTRAINT `fk_id_apoderado` FOREIGN KEY (`id_apoderado`) REFERENCES `apoderado` (`id_apoderado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `datos_estudiante` (`id_datos`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario_medico`
--
ALTER TABLE `horario_medico`
  ADD CONSTRAINT `fk_id_doctor_horario` FOREIGN KEY (`id_medico`) REFERENCES `doctores` (`id_doctor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `item_rating`
--
ALTER TABLE `item_rating`
  ADD CONSTRAINT `fk_id_notificacion` FOREIGN KEY (`id_notificacion`) REFERENCES `notificaciones` (`id_notificacion`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_user_item` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `fk_id_doctor_notificaciones` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_estudiante_notificaciones` FOREIGN KEY (`id_datos`) REFERENCES `datos_estudiante` (`id_datos`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_use2` FOREIGN KEY (`user2`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `servicios_de_atencion`
--
ALTER TABLE `servicios_de_atencion`
  ADD CONSTRAINT `fk_id_doctor_servicio` FOREIGN KEY (`id_doctor_encargado`) REFERENCES `doctores` (`id_doctor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sintoma_estudiante`
--
ALTER TABLE `sintoma_estudiante`
  ADD CONSTRAINT `fk_id_datos_estudiante` FOREIGN KEY (`id_datos`) REFERENCES `datos_estudiante` (`id_datos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_sintomas` FOREIGN KEY (`id_sintoma`) REFERENCES `sintomas` (`id_sintoma`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
