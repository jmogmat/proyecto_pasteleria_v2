-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-09-2022 a las 21:13:08
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pasteleria`
--

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS pasteleria;

use pasteleria;
--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(10) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`) VALUES
(1, 'Sin gluten'),
(2, 'Contiene gluten');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

CREATE TABLE `categorias_productos` (
  `id_producto` int(20) NOT NULL,
  `id_categoria` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias_productos`
--

INSERT INTO `categorias_productos` (`id_producto`, `id_categoria`) VALUES
(1, 2),
(2, 2),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 1),
(8, 2),
(9, 2),
(10, 1),
(11, 2),
(12, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) NOT NULL,
  `nombre_estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre_estado`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint(20) NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `ruta`) VALUES
(1, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pan\\barra_rustica.png\"'),
(2, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pan\\barras_de_pan.jpg\"'),
(3, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pan\\pan_de_cea.jpg\"'),
(4, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pan\\pan_de_molde.jpg\"'),
(5, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pan\\pan_integral.jpg\"'),
(6, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pan\\pan_redondo.jpg\"'),
(7, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pasteles\\biscocho_de_fresa.JPG\"'),
(8, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pasteles\\bizcocho-chocolate.jpg\"'),
(9, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pasteles\\brownie-de-chocolate.jpg\"'),
(10, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pasteles\\croissants.jpg\"'),
(11, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pasteles\\pasteles_de_nata.jpg\"'),
(12, '\"C:\\xampp\\htdocs\\pasteleria\\images\\imagenes_de_pasteles\\tarta_abuela.jpg\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_clientes`
--

CREATE TABLE `pedidos_clientes` (
  `id` bigint(20) NOT NULL,
  `fecha_pedido` datetime NOT NULL DEFAULT current_timestamp(),
  `cliente` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos_clientes`
--

INSERT INTO `pedidos_clientes` (`id`, `fecha_pedido`, `cliente`) VALUES
(1, '2022-09-28 20:46:03', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `producto` int(20) NOT NULL,
  `pedido` bigint(20) NOT NULL,
  `cantidad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`producto`, `pedido`, `cantidad`) VALUES
(3, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` bigint(20) NOT NULL,
  `tipo_producto` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `tipo_producto`) VALUES
(1, 'Barra de pan rústica', 'Pan artesanal horeando en horno de leña', 1.15, 30, 2),
(2, 'Barra de pan mediano', 'Pan artesanal mediano', 0.85, 20, 2),
(3, 'Pan tradicional de Cea', 'Pan hecho en Cea', 2.4, 5, 2),
(4, 'Pan de molde artesanal', 'Pan hecho con harina de centeno y harina de trigo', 1.9, 6, 2),
(5, 'Pan de molde integral', 'Pan hecho con semillas de sésamo, pipas de girasol y harina ingtegral', 2.2, 6, 2),
(6, 'Pan rústico redondo', 'Pan elavorado con harina de trigo y hecho en horno de leña', 2, 6, 2),
(7, 'Bizcocho de fresa', 'Biscocho de fresa y nata', 3.7, 4, 1),
(8, 'Bizcocho de chocolate', 'Bizcocho de chocolate y nueces', 3.5, 4, 1),
(9, 'Brownie de chocolate', 'Delicioso brownie hecho con chocolate puro 100% con almendras y nueces', 4.2, 4, 1),
(10, 'Croissants de mantequilla', 'Croissants de mantequilla recien horenados', 1.5, 12, 1),
(11, 'Pasteles de nata', 'Pasteles tradicionales de nata, irresistibles.', 1.4, 20, 1),
(12, 'Tarta de la abuela', 'Tarta tradicional de la abuela, receta mejorada', 4.7, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_imagenes`
--

CREATE TABLE `productos_imagenes` (
  `id_imagen` bigint(20) NOT NULL,
  `id_producto` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_imagenes`
--

INSERT INTO `productos_imagenes` (`id_imagen`, `id_producto`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(20) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre_rol`) VALUES
(1, 'admin'),
(3, 'conexion'),
(2, 'estandar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id` int(5) NOT NULL,
  `tipo_producto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `tipo_producto`) VALUES
(2, 'panaderia'),
(1, 'pasteleria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `codigo_postal` int(4) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_usuario` int(20) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_ultimo_acceso` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `telefono`, `direccion`, `ciudad`, `codigo_postal`, `provincia`, `imagen`, `password`, `rol_usuario`, `fecha_registro`, `fecha_ultimo_acceso`, `estado`) VALUES
(1, 'Matias ', 'Osorio', 'jmog.matvigo@gmail.com', '', '', '', 36211, 'Pontevedra', '', '$2y$10$9puYj4pvJoXUzxjTNFLW9OZ/H5nSjLqNfAQkJpNTSM.dD4ksMmD6.', 1, '2022-09-28 20:42:40', '2022-09-28 20:42:40', 1),
(2, 'Casandro', 'Limonsio', 'ca@gmail.com', '686987985', 'av gran via 120', 'Vigo', 36207, 'Pontevedra', '\\C:\\xampp\\htdocs\\pasteleria\\imgUsers\\codigoUsuario_2\\2.jpg', '$2y$10$CEjI2cAq.HJLPLLW/ZQ.2ud5CqQAAIoP5s6mPQbKDdGFXkYh.d3VG', 2, '2022-09-28 20:44:28', '2022-09-28 20:44:28', 1);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `actualiza_usuario_BU` BEFORE UPDATE ON `usuarios` FOR EACH ROW insert into Usuarios_actualizados (
anterior_nombre, anterior_apellido, anterior_email, anterior_telefono, anterior_direccion, anterior_ciudad, anterior_codigo_postal, anterior_provincia, anterior_imagen, anterior_password, anterior_fecha_registro,
nuevo_nombre, nuevo_apellido, nuevo_email, nuevo_telefono, nueva_direccion, nueva_ciudad, nuevo_codigo_postal, nueva_provincia, nueva_imagen, nueva_password, nueva_fecha, usuario, fecha_modificacion)
values (old.nombre, old.apellido, old.email, old.telefono, old.direccion, old.ciudad, old.codigo_postal, old.provincia, old.imagen, old.password, old.fecha_registro, new.nombre, new.apellido, new.email,
new.telefono, new.direccion, new.ciudad, new.codigo_postal, new.provincia, new.imagen, new.password, new.fecha_registro, current_user(), now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_actualizados`
--

CREATE TABLE `usuarios_actualizados` (
  `anterior_nombre` varchar(255) DEFAULT NULL,
  `anterior_apellido` varchar(255) DEFAULT NULL,
  `anterior_email` varchar(50) DEFAULT NULL,
  `anterior_telefono` varchar(9) DEFAULT NULL,
  `anterior_direccion` varchar(60) DEFAULT NULL,
  `anterior_ciudad` varchar(45) DEFAULT NULL,
  `anterior_codigo_postal` int(4) DEFAULT NULL,
  `anterior_provincia` varchar(50) DEFAULT NULL,
  `anterior_imagen` varchar(255) DEFAULT NULL,
  `anterior_password` varchar(255) DEFAULT NULL,
  `anterior_fecha_registro` datetime DEFAULT current_timestamp(),
  `nuevo_nombre` varchar(255) DEFAULT NULL,
  `nuevo_apellido` varchar(255) DEFAULT NULL,
  `nuevo_email` varchar(50) DEFAULT NULL,
  `nuevo_telefono` varchar(9) DEFAULT NULL,
  `nueva_direccion` varchar(60) DEFAULT NULL,
  `nueva_ciudad` varchar(45) DEFAULT NULL,
  `nuevo_codigo_postal` int(4) DEFAULT NULL,
  `nueva_provincia` varchar(50) DEFAULT NULL,
  `nueva_imagen` varchar(255) DEFAULT NULL,
  `nueva_password` varchar(255) DEFAULT NULL,
  `nueva_fecha` datetime DEFAULT current_timestamp(),
  `usuario` varchar(50) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_actualizados`
--

INSERT INTO `usuarios_actualizados` (`anterior_nombre`, `anterior_apellido`, `anterior_email`, `anterior_telefono`, `anterior_direccion`, `anterior_ciudad`, `anterior_codigo_postal`, `anterior_provincia`, `anterior_imagen`, `anterior_password`, `anterior_fecha_registro`, `nuevo_nombre`, `nuevo_apellido`, `nuevo_email`, `nuevo_telefono`, `nueva_direccion`, `nueva_ciudad`, `nuevo_codigo_postal`, `nueva_provincia`, `nueva_imagen`, `nueva_password`, `nueva_fecha`, `usuario`, `fecha_modificacion`) VALUES
('Casandro', 'Limonsio', 'ca@gmail.com', '686987985', '', '', 0, '', '', '$2y$10$CEjI2cAq.HJLPLLW/ZQ.2ud5CqQAAIoP5s6mPQbKDdGFXkYh.d3VG', '2022-09-28 20:44:28', 'Casandro', 'Limonsio', 'ca@gmail.com', '686987985', '', '', 0, '', '\\C:\\xampp\\htdocs\\pasteleria\\imgUsers\\codigoUsuario_2\\2.jpg', '$2y$10$CEjI2cAq.HJLPLLW/ZQ.2ud5CqQAAIoP5s6mPQbKDdGFXkYh.d3VG', '2022-09-28 20:44:28', 'root@localhost', '2022-09-28 20:44:50'),
('Casandro', 'Limonsio', 'ca@gmail.com', '686987985', '', '', 0, '', '\\C:\\xampp\\htdocs\\pasteleria\\imgUsers\\codigoUsuario_2\\2.jpg', '$2y$10$CEjI2cAq.HJLPLLW/ZQ.2ud5CqQAAIoP5s6mPQbKDdGFXkYh.d3VG', '2022-09-28 20:44:28', 'Casandro', 'Limonsio', 'ca@gmail.com', '686987985', 'av gran via 120', 'Vigo', 36207, 'Pontevedra', '\\C:\\xampp\\htdocs\\pasteleria\\imgUsers\\codigoUsuario_2\\2.jpg', '$2y$10$CEjI2cAq.HJLPLLW/ZQ.2ud5CqQAAIoP5s6mPQbKDdGFXkYh.d3VG', '2022-09-28 20:44:28', 'root@localhost', '2022-09-28 20:45:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`id_producto`,`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_clientes`
--
ALTER TABLE `pedidos_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente_pedidos` (`cliente`);

--
-- Indices de la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD KEY `fk_producto` (`producto`),
  ADD KEY `fk_pedido` (`pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado_tipo_producto` (`tipo_producto`);

--
-- Indices de la tabla `productos_imagenes`
--
ALTER TABLE `productos_imagenes`
  ADD PRIMARY KEY (`id_imagen`,`id_producto`),
  ADD KEY `fk_imagen` (`id_imagen`),
  ADD KEY `fk_producto_imagen` (`id_producto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nombre_rol` (`nombre_rol`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `tipo_producto` (`tipo_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_rol_usuario` (`rol_usuario`),
  ADD KEY `fk_estado_usuario` (`estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pedidos_clientes`
--
ALTER TABLE `pedidos_clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD CONSTRAINT `categorias_productos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categorias_productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos_clientes`
--
ALTER TABLE `pedidos_clientes`
  ADD CONSTRAINT `pedidos_clientes_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD CONSTRAINT `pedidos_productos_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_productos_ibfk_2` FOREIGN KEY (`pedido`) REFERENCES `pedidos_clientes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`tipo_producto`) REFERENCES `tipo_producto` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_imagenes`
--
ALTER TABLE `productos_imagenes`
  ADD CONSTRAINT `productos_imagenes_ibfk_1` FOREIGN KEY (`id_imagen`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_imagenes_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_usuario`) REFERENCES `roles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estados` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
