-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2023 a las 11:25:35
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apampa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_cont`
--

CREATE TABLE `caja_cont` (
  `id` bigint(10) NOT NULL,
  `movil_caja` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `deber` int(8) NOT NULL,
  `haber` int(8) NOT NULL,
  `saldo` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caja_cont`
--

INSERT INTO `caja_cont` (`id`, `movil_caja`, `fecha`, `deber`, `haber`, `saldo`) VALUES
(1, 14, '2022-06-13', 500, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id` bigint(10) NOT NULL,
  `fecha_ini` date NOT NULL,
  `tropa` varchar(15) NOT NULL,
  `movil` int(4) NOT NULL,
  `nombre_titular` varchar(30) NOT NULL,
  `dir_titular` varchar(30) NOT NULL,
  `cp_titular` int(4) NOT NULL,
  `cel_titular` int(10) NOT NULL,
  `dni_titular` int(10) NOT NULL,
  `email_titular` varchar(30) NOT NULL,
  `licencia_titular` int(5) NOT NULL,
  `nombre_chofer` varchar(30) NOT NULL,
  `dir_chofer` varchar(30) NOT NULL,
  `cp_chofer` int(4) NOT NULL,
  `cel_chofer` int(10) NOT NULL,
  `dni_chofer` int(10) NOT NULL,
  `email_chofer` varchar(30) NOT NULL,
  `nombre_chofer_2` varchar(30) NOT NULL,
  `dir_chofer_2` varchar(30) NOT NULL,
  `cp_chofer_2` int(4) NOT NULL,
  `cel_chofer_2` int(10) NOT NULL,
  `dni_chofer_2` int(10) NOT NULL,
  `email_chofer_2` varchar(30) NOT NULL,
  `marca_unidad` varchar(20) NOT NULL,
  `modelo_unidad` varchar(20) NOT NULL,
  `year_unidad` int(4) NOT NULL,
  `dominio_unidad` varchar(7) NOT NULL,
  `categoria_unidad` varchar(15) NOT NULL,
  `abono_unidad` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `fecha_ini`, `tropa`, `movil`, `nombre_titular`, `dir_titular`, `cp_titular`, `cel_titular`, `dni_titular`, `email_titular`, `licencia_titular`, `nombre_chofer`, `dir_chofer`, `cp_chofer`, `cel_chofer`, `dni_chofer`, `email_chofer`, `nombre_chofer_2`, `dir_chofer_2`, `cp_chofer_2`, `cel_chofer_2`, `dni_chofer_2`, `email_chofer_2`, `marca_unidad`, `modelo_unidad`, `year_unidad`, `dominio_unidad`, `categoria_unidad`, `abono_unidad`) VALUES
(1, '2023-03-03', 'TITULAR', 14, 'Fabian Nogueroles             ', 'Carlos Gardel3296             ', 1650, 1169356236, 14952694, 'laboratorio.fabian@gmail.com  ', 99999, 'Lucas Nogueroles              ', 'Camacua 3000                  ', 1408, 1134587458, 28147258, 'lucas_777@gmail.com           ', 'Cristofolo Colombo            ', 'Palos 2020                    ', 9999, 1144445555, 10258963, 'cristobal@gmail.com           ', 'Volkswagen          ', 'Gol                 ', 2005, 'EVW943 ', 'REMIS   ', '500.25'),
(2, '0000-00-00', 'TITULAR', 15, 'Alfredo Capasoto              ', 'Copelo 4050                   ', 1452, 1145784578, 11457784, 'fredo@gmail.com               ', 32768, 'Alfredo Capasoto              ', 'Copelo 4050                   ', 1452, 1145784578, 11458745, 'fredo@gmail.com               ', '                              ', '                              ', 0, 0, 0, '                              ', 'Ford                ', 'Focus               ', 2016, 'AA458DF', 'REMIS', '200.00'),
(3, '0000-00-00', 'TITULAR', 16, 'Pascual Perez', 'Campichuelo 550', 1210, 1145784578, 20457845, 'pascual@gmail.com', 27205, 'Arturo Caca', 'Pihue 450', 1258, 1145784578, 25124547, 'Arturo@gmial.com', '', '', 0, 0, 0, '', 'Chevrolet', 'Spin', 2018, 'Ac258FF', 'TAXI', '458.00'),
(5, '0000-00-00', 'TROPA', 331, 'Jorge Calastraca              ', 'Campichuelo 55                ', 1278, 1133333333, 12456789, 'calastraca@gmail.com          ', 76593, 'Eugenio pla                   ', 'Talcahuano 128                ', 1603, 1145784578, 11666666, 'eugenio@gmail.com             ', '                              ', '                              ', 0, 0, 0, '                              ', 'Toyota              ', 'Etios               ', 2021, 'AC589FD', 'BUENOS AIRES', '350.00'),
(7, '2019-08-16', 'TROPA', 123, 'Diaz Claudio Alberto', 'Asamblea 1912 casa', 1413, 1122223333, 129759683, 'diaz@gmail.com', 14586, 'Ramos Carrasco Fernando', 'Eva Peron1343', 2585, 1158516383, 92182354, 'ramos@gmail.com', '', '', 0, 0, 0, '', 'Chevroler', 'Spin', 20189, 'AC327SZ', 'PORTEÑO', '700.00'),
(8, '2013-06-18', 'TITULAR', 125, 'Palavecino Juan Carlos', 'Alvear 3748 Lanus Este', 2589, 1130024456, 22421209, 'palavecino@gmail.com', 35, 'Palavecino Juan Carlos', 'Alvear 3748 Lanus Este', 2589, 1130024456, 22421209, 'palavecino@gmail.com', '', '', 0, 0, 0, '', 'Volkswagen', 'Voyage', 2013, 'MOJ664', 'PORTEÑO', '550.00'),
(9, '2023-03-03', 'TITULAR', 1000, 'Juan Pinout', 'Carlos Gardel 3296', 1650, 1145784512, 12457895, 'juan@gmail.com', 475, 'Juan Marquez                  ', 'Estomba 3520 caba', 1422, 1145874512, 14582963, 'Mmarquez@gmail.com', '                              ', '                              ', 0, 0, 0, '', 'Fiat', 'Siena', 2008, 'CPO654', 'PORTEÑO', '500.00'),
(10, '0000-00-00', 'titular', 11, 'Juan Carlos Lopez', 'Camacua 1542', 1414, 1145782154, 14369258, 'Juan@gmail.com', 12456, '', '', 0, 0, 0, '', '', '', 0, 0, 0, '', 'Ford ', 'Focus', 2020, 'Ab001GF', 'porteño', '500.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja_cont`
--
ALTER TABLE `caja_cont`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movil` (`movil_caja`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movil` (`movil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja_cont`
--
ALTER TABLE `caja_cont`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja_cont`
--
ALTER TABLE `caja_cont`
  ADD CONSTRAINT `caja_cont_ibfk_1` FOREIGN KEY (`movil_caja`) REFERENCES `unidades` (`movil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
