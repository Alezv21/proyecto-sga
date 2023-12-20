-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 11:54:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sdat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `id_entidad_educativa` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `anio` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `id_entidad_educativa`, `codigo`, `anio`, `descripcion`, `id_docente`) VALUES
(1, 1, '1', 2012, 'curso 1', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `documento` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `nombres`, `apellidos`, `documento`) VALUES
(3, 'Fiorella', 'Larriera', '1234567'),
(4, 'prueba', 'lokito', '123'),
(5, 'asd', 'asd', '12331'),
(6, 'jon', 'marston', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_entidades_educativas`
--

CREATE TABLE `docente_entidades_educativas` (
  `id_entidad_educativa` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad_educativa`
--

CREATE TABLE `entidad_educativa` (
  `id_entidad_educativa` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entidad_educativa`
--

INSERT INTO `entidad_educativa` (`id_entidad_educativa`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'entidad1', 'su casa', '123213');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `nombres`, `apellidos`, `edad`, `sexo`) VALUES
(4, 'asdsad', 'asdsad', 12, 'masculino'),
(6, 'juan', 'asdasasd', 12, 'masculino'),
(18, 'carlos', 'carlitos', 12, 'masculino'),
(19, 'Paula', 'Garcia', 13, 'femenino'),
(20, 'Fiorella', 'Fio', 22, 'femenino'),
(21, 'Alejandro', 'Zv', 23, 'masculino'),
(22, 'marco', 'londra', 13, 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE `etapas` (
  `id_etapa` int(11) NOT NULL,
  `rendimiento` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `comportamiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_estudiante_curso`
--

CREATE TABLE `registro_estudiante_curso` (
  `id_registro_estudiante_curso` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `Asistencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_estudiante_curso`
--

INSERT INTO `registro_estudiante_curso` (`id_registro_estudiante_curso`, `id_curso`, `id_estudiante`, `id_seccion`, `nota`, `Asistencia`) VALUES
(1, 1, 4, 1, 5, 100),
(3, 1, 6, 1, 1, 75),
(15, 1, 18, 1, 4, 80),
(16, 1, 19, 2, 1, 0),
(17, 1, 20, 3, 5, 100),
(18, 1, 21, 3, 1, 10),
(19, 1, 22, 3, 3, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `codigo`, `descripcion`, `id_curso`) VALUES
(1, '1', 'seccion 1', 1),
(2, '2', 'seccion 2', 1),
(3, '3', 'seccion 3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `umbrales`
--

CREATE TABLE `umbrales` (
  `id_umbral` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `rol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `user`, `pass`, `rol`) VALUES
(1, 'Alejandro', 'Zv', '$2y$10$STAUYFaGinGqinWP8p1rn..2i5tiZGKIGMjWaCjizh/QvpcX0HG9e', 1),
(2, 'sofiaaa', 'sofiaa', '$2y$10$yFInQDaCc3SpiuTOsveIdO8S7pLMb21iDT7nHxeQxSzXms9UIF/Uy', 1),
(5, 'eldocente', 'doc', '$2y$10$N19NvoEurBggD2b42Gp5ceW5.gLt.e0kgJIvwx8jRb.SH.nmiueDu', 2),
(6, 'jose', 'jose', '$2y$10$e3tj.drMEv6KZOL5/Lja1.NN6lxRnzEuz/wH5j.bcHSHDT0b3ru4G', 3),
(9, 'prueba', 'prueba', '$2y$10$GLa.A9Veq3cikdLpiYBQyO7iA1yqoj6slrYUhhZAkDRdfIDaAczhi', 1),
(11, 'docente', 'doce', '$2y$10$beQybGSMVO0o9j.X2BmNne6MEJYMQ.D03Q9mxIFBiKrCQuP1pAk0O', 2),
(13, 'admin', 'admin', '$2y$10$sp/fhtq5sVSXLiTFtElw6eE7gA4UXzNKhvhFcUdDQ9u3bFmhpF1Ti', 1),
(14, 'director', 'director', '$2y$10$o9nLi6ys8xeshjHcuiQp9eTaglZo2MxhTSSvi1PlL1r95FmhtSyJO', 2),
(15, 'profesor', 'profesor', '$2y$10$tCkPOx1kFujnva3c2/2VP.D73R0DYXnPr2ptyLxqEsd5kRWBWzcSO', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `entidad_educativa_cursos_fk` (`id_entidad_educativa`),
  ADD KEY `docente_cursos_fk` (`id_docente`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `docente_entidades_educativas`
--
ALTER TABLE `docente_entidades_educativas`
  ADD PRIMARY KEY (`id_entidad_educativa`,`id_docente`),
  ADD KEY `docente_docente_entidades_educativas_fk` (`id_docente`);

--
-- Indices de la tabla `entidad_educativa`
--
ALTER TABLE `entidad_educativa`
  ADD PRIMARY KEY (`id_entidad_educativa`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id_etapa`);

--
-- Indices de la tabla `registro_estudiante_curso`
--
ALTER TABLE `registro_estudiante_curso`
  ADD PRIMARY KEY (`id_registro_estudiante_curso`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_seccion` (`id_seccion`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `cursos_seccion_fk` (`id_curso`);

--
-- Indices de la tabla `umbrales`
--
ALTER TABLE `umbrales`
  ADD PRIMARY KEY (`id_umbral`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entidad_educativa`
--
ALTER TABLE `entidad_educativa`
  MODIFY `id_entidad_educativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_estudiante_curso`
--
ALTER TABLE `registro_estudiante_curso`
  MODIFY `id_registro_estudiante_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `umbrales`
--
ALTER TABLE `umbrales`
  MODIFY `id_umbral` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `docente_cursos_fk` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `entidad_educativa_cursos_fk` FOREIGN KEY (`id_entidad_educativa`) REFERENCES `entidad_educativa` (`id_entidad_educativa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente_entidades_educativas`
--
ALTER TABLE `docente_entidades_educativas`
  ADD CONSTRAINT `docente_docente_entidades_educativas_fk` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `entidad_educativa_docente_entidades_educativas_fk` FOREIGN KEY (`id_entidad_educativa`) REFERENCES `entidad_educativa` (`id_entidad_educativa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro_estudiante_curso`
--
ALTER TABLE `registro_estudiante_curso`
  ADD CONSTRAINT `registro_estudiante_curso_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `registro_estudiante_curso_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `registro_estudiante_curso_ibfk_3` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`);

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `cursos_seccion_fk` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
