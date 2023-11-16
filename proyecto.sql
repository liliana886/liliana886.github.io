-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 14-11-2023 a las 17:22:33
-- Versión del servidor: 10.10.2-MariaDB
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `inventario` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `imagen` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `precio`, `descripcion`, `categoria`, `inventario`, `fecha_creacion`, `imagen`) VALUES
(18, 'Apple iPhone 12', '8406.00', ' 128 GB, Azul ', 'Telefono', 30, '2023-11-12 22:13:03', 0x3531334e49357870596a4c2e5f41435f534c313030305f2e6a7067),
(17, 'Apple iPhone 13 Pro', '14999.00', '128GB, Azul Sierra', 'Telefono', 50, '2023-11-12 22:07:26', 0x6970686f6e652d373437393330335f313238302e6a7067),
(19, 'Apple iPhone 15 Pro', '23999.00', '(128 GB) - Titanio Blanco', 'Telefono', 20, '2023-11-12 22:14:47', 0x38316562764f37455a784c2e5f41435f534c313530305f2e6a7067),
(20, 'Apple iPhone 15 Pro MAX', '28999.00', '256 GB) - Titanio Azul', 'Telefono', 10, '2023-11-12 22:15:50', 0x3831664f32433963596a4c2e5f41435f534c313530305f2e6a7067),
(21, 'Apple iPhone 15 Plus', '21999.00', '(128 GB) - Negro', 'Telefono', 10, '2023-11-12 22:17:06', 0x35316e48742b6a58646a4c2e5f41435f534c313030305f2e6a7067),
(22, 'Apple 2020 Laptop MacBook Air', '32699.00', 'Chip M1 de Apple, Pantalla Retina de 13 Pulgadas, 8 GB de RAM, Almacenamiento SSD de 512 GB', 'Laptop', 10, '2023-11-12 22:18:46', 0x373176464b42704b616b4c2e5f41435f534c313530305f2e6a7067),
(23, 'Apple 2022 Laptop MacBook Pro', '29999.00', 'Chip M2 : Pantalla Retina de 13 Pulgadas, 8GB de RAM, Almacenamiento SSD de 256 GB', 'Laptop', 5, '2023-11-12 22:20:09', 0x343132774c4e715739324c2e5f41435f534c313030305f2e6a7067),
(24, 'Apple 2023 Laptop MacBook Pro', '69999.00', 'Chip M2 MAX con CPU de 12 nÃºcleos y GPU de 30 nÃºcleos: Pantalla Liquid Retina XDR de 14 Pulgadas, 32GB de Memoria unificada, 1 TB de Almacenamiento SSD, Color Plata', 'Laptop', 4, '2023-11-12 22:21:04', 0x363143487153333150694c2e5f41435f534c313530305f2e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cargo` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `correo`, `usuario`, `contrasena`, `id_cargo`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 1),
(2, '123', '123', '123', '123', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
