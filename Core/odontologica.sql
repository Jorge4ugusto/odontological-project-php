-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-12-2016 a las 23:32:30
-- Versión del servidor: 5.6.29
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `odontologica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dientes`
--

CREATE TABLE `dientes` (
  `id_diente` int(11) NOT NULL,
  `id_odontograma` int(11) NOT NULL,
  `diente18` smallint(6) NOT NULL,
  `diente17` smallint(11) NOT NULL,
  `diente16` smallint(11) NOT NULL,
  `diente15` smallint(11) NOT NULL,
  `diente14` smallint(11) NOT NULL,
  `diente13` smallint(11) NOT NULL,
  `diente12` smallint(11) NOT NULL,
  `diente11` smallint(11) NOT NULL,
  `diente21` smallint(11) NOT NULL,
  `diente22` smallint(11) NOT NULL,
  `diente23` smallint(11) NOT NULL,
  `diente24` smallint(11) NOT NULL,
  `diente25` smallint(11) NOT NULL,
  `diente26` smallint(11) NOT NULL,
  `diente27` smallint(11) NOT NULL,
  `diente28` smallint(11) NOT NULL,
  `diente48` smallint(11) NOT NULL,
  `diente47` smallint(11) NOT NULL,
  `diente46` smallint(11) NOT NULL,
  `diente45` smallint(11) NOT NULL,
  `diente44` smallint(11) NOT NULL,
  `diente43` smallint(11) NOT NULL,
  `diente42` smallint(11) NOT NULL,
  `diente41` smallint(11) NOT NULL,
  `diente31` smallint(11) NOT NULL,
  `diente32` smallint(11) NOT NULL,
  `diente33` smallint(11) NOT NULL,
  `diente34` smallint(11) NOT NULL,
  `diente35` smallint(11) NOT NULL,
  `diente36` smallint(11) NOT NULL,
  `diente37` smallint(11) NOT NULL,
  `diente38` smallint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `imagen` mediumblob NOT NULL,
  `tipo_imagen` varchar(30) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontograma`
--

CREATE TABLE `odontograma` (
  `id_odontograma` int(11) NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `odontograma`
--

INSERT INTO `odontograma` (`id_odontograma`, `estado`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID_PACIENTE` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRES_PACIENTE` varchar(30) DEFAULT NULL,
  `APELLIDOS_PACIENTE` varchar(30) DEFAULT NULL,
  `GENERO` varchar(30) DEFAULT NULL,
  `EDAD` smallint(6) DEFAULT NULL,
  `ESTADO` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_PACIENTE`, `ID_USUARIO`, `NOMBRES_PACIENTE`, `APELLIDOS_PACIENTE`, `GENERO`, `EDAD`, `ESTADO`) VALUES
(1, 1, 'Andres', 'De La Barra', 'Masculino', 33, 1),
(2, 2, 'Roghelio', 'Caires', 'Masculino', 26, 1),
(3, 2, 'Ana', 'Lisamelano', 'Femenino', 28, 1),
(4, 3, 'Marco', 'Roger', 'Masculino', 50, 1),
(5, 3, 'Micaela', 'Zeballos', 'Femenino', 24, 1),
(6, 3, 'Pedro', 'Rodriguez', 'Masculino', 34, 1),
(7, 3, 'Marciano', 'Cayo', 'Masculino', 55, 1),
(8, 2, 'Aquiles', 'CaigoYo', 'Masculino', 22, 1),
(9, 2, 'Camilo', 'Perez', 'Masculino', 33, 1),
(10, 2, 'Mariana', 'Torrez', 'Femenino', 21, 1),
(11, 2, 'Vanessa', 'Arismendi', 'Femenino', 24, 1),
(13, 2, 'Wilson Ramiro', 'Ruiz Ballesteros', 'Masculino', 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `ID_SERVICIO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE_SERVICIO` varchar(80) DEFAULT NULL,
  `COSTO_SERVICIO` decimal(10,0) NOT NULL,
  `ESTADO` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`ID_SERVICIO`, `ID_USUARIO`, `NOMBRE_SERVICIO`, `COSTO_SERVICIO`, `ESTADO`) VALUES
(1, 1, 'Ortodoncia', '3800', 1),
(2, 2, 'Exodoncia', '50', 2),
(3, 2, 'Endodoncia', '350', 1),
(5, 3, 'Cirugia Terceros Molares', '350', 1),
(6, 3, 'Endodoncia', '280', 1),
(8, 3, 'Exodoncia', '40', 1),
(9, 2, 'Periodoncia', '200', 1),
(10, 2, 'Tratamiento23', '70', 1),
(11, 2, 'Tratamiento23', '70', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `ID_TRATAMIENTO` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_odontograma` int(11) NOT NULL,
  `paciente` varchar(70) NOT NULL,
  `tratamiento` varchar(60) NOT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_CONSULTA` date DEFAULT NULL,
  `ESTADO` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `USUARIO` varchar(30) DEFAULT NULL,
  `CONTRASEÑA` varchar(30) DEFAULT NULL,
  `ESTADO` smallint(6) DEFAULT NULL,
  `NOMBRE_COMPLETO` varchar(30) NOT NULL,
  `EDAD` int(3) NOT NULL,
  `GENERO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `USUARIO`, `CONTRASEÑA`, `ESTADO`, `NOMBRE_COMPLETO`, `EDAD`, `GENERO`) VALUES
(1, 'jorge_4ugusto', '123', 1, 'Jorge Augusto Rodriguez', 20, 'Masculino'),
(2, 'ramon80', '80', 1, 'Ramon Valdez', 80, 'Masculino'),
(3, 'lucy26', '26', 1, 'Lucilla Terrazas', 26, 'Femenino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dientes`
--
ALTER TABLE `dientes`
  ADD PRIMARY KEY (`id_diente`),
  ADD KEY `id_odontograma` (`id_odontograma`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD PRIMARY KEY (`id_odontograma`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID_PACIENTE`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`ID_SERVICIO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`ID_TRATAMIENTO`),
  ADD KEY `id_diente` (`id_odontograma`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dientes`
--
ALTER TABLE `dientes`
  MODIFY `id_diente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  MODIFY `id_odontograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID_PACIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `ID_SERVICIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `ID_TRATAMIENTO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dientes`
--
ALTER TABLE `dientes`
  ADD CONSTRAINT `dientes_ibfk_1` FOREIGN KEY (`id_odontograma`) REFERENCES `odontograma` (`id_odontograma`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `tratamiento_ibfk_1` FOREIGN KEY (`id_odontograma`) REFERENCES `odontograma` (`id_odontograma`),
  ADD CONSTRAINT `tratamiento_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_USUARIO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
