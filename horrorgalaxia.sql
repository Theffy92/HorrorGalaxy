-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2018 a las 06:00:28
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `horrorgalaxia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_descripcion`) VALUES
(1, 'novela'),
(2, 'comic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `consulta_id` int(11) NOT NULL,
  `nombre_consulta` varchar(50) NOT NULL,
  `apellido_consulta` varchar(50) NOT NULL,
  `email_consulta` varchar(100) NOT NULL,
  `telefono_consulta` varchar(50) NOT NULL,
  `consulta_descripcion` varchar(600) NOT NULL,
  `leido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`consulta_id`, `nombre_consulta`, `apellido_consulta`, `email_consulta`, `telefono_consulta`, `consulta_descripcion`, `leido`) VALUES
(1, 'Yolanda', 'Romero', 'yoliromero@gmail.com', '3794050586', 'Mi consulta es si hacen descuentos a bibliotecas populares.', 1),
(2, 'Leonela', 'Lopez', 'leo@gmail.com', '1123456789', 'Mi consulta es si hacen envíos a la ciudad de Resistencia.', 0),
(3, 'Luciano', 'Lujan', 'Lulujan@gmail.com', '1156987456', 'Mi consulta es si venderán libros de escritores argentinos, como por ejemplo Salvador Sanz.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `genero_id` int(11) NOT NULL,
  `genero_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`genero_id`, `genero_descripcion`) VALUES
(1, 'terror'),
(2, 'thriller psicologico'),
(3, 'suspense'),
(4, 'gótico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `libro_id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `isbn` bigint(13) NOT NULL,
  `editorial` varchar(100) NOT NULL,
  `anio_edicion` int(4) NOT NULL,
  `idioma` varchar(50) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado_libro` tinyint(1) NOT NULL,
  `stock_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`libro_id`, `titulo`, `descripcion`, `autor`, `categoria_id`, `genero_id`, `isbn`, `editorial`, `anio_edicion`, `idioma`, `precio`, `imagen`, `estado_libro`, `stock_libro`) VALUES
(1, 'It', 'acá va una descripcion', 'Stephen King', 1, 1, 9788498382372, 'Ediciones B', 2000, 'español', '360.00', 'uploads/imagenes_libro/IT.jpg', 1, 34),
(2, 'Colder', 'acá va otra descripcion', 'Paul Tobin', 2, 1, 9788498721805, 'La factoría de ideas', 2012, 'español', '300.00', 'uploads/imagenes_libro/colder.jpg', 1, 99),
(3, 'Hellraiser', 'agregar descripcion', 'Clive Barker', 1, 1, 9788498003992, 'Salamandra', 2012, 'español', '350.00', 'uploads/imagenes_libro/hellraiser.jpg', 1, 30),
(4, 'Coraline', 'coraline', 'Neil Gaiman', 1, 3, 9789871165124, 'AGEBE', 2015, 'español', '300.00', 'uploads/imagenes_libro/coraline.jpg', 1, 20),
(5, 'El psicoanalista', 'agregar descripcion luego', 'John Katzenbach', 1, 2, 9789874618948, 'Ediciones B', 2015, 'español', '350.00', 'uploads/imagenes_libro/Elpsicoanalista.jpg', 1, 30),
(6, 'Narraciones Extraordinarias', 'agregare descripcion luego', 'Edgar Allan Poe', 1, 3, 9874568945678, 'Ediciones B', 2013, 'español', '500.00', 'uploads/imagenes_libro/narraciones-extraordinarias-poe.jpg', 1, 30),
(7, 'The Steam Man', 'add ', 'Mark Allan Miller', 2, 1, 9635842135478, 'Salamandra', 2012, 'español', '400.00', 'uploads/imagenes_libro/Thesteam.jpg', 1, 50),
(8, 'Outcast', 'agregar descripcion ', 'Paul Tobin', 2, 1, 9874569874564, 'La factoría de ideas', 2012, 'español', '450.00', 'uploads/imagenes_libro/outcast.jpg', 1, 25),
(9, 'Wytches', 'El argumento no difiere demasiado de la típica película de terror que hemos visto en diferentes versiones miles de veces: Una familia se muda a una casa en el campo tras sufrir la hija un trauma en su localidad de residencia, al presenciar la desaparición en el bosque cercano de otra niña que la ame', 'Scott Snyder', 2, 1, 9554758578945, 'Salamandra', 2014, 'español', '370.00', 'uploads/imagenes_libro/wytches.jpg', 1, 15),
(10, 'Las hijas de Lilith', 'Nada podra prepararte para el aquelarre. Lidia acaba de descubrir que es una bruja, una bruja mediocre.', 'Rafael de la Rosa', 1, 1, 9781973239253, 'Independently published', 2017, 'español', '150.00', 'uploads/imagenes_libro/hijasdelilith.jpg', 1, 20),
(11, 'Sandman Lucifer', 'Lucifer Morningstar is a rebel archangel who was once given Hell as his own domain.', 'Neil Gaiman', 2, 3, 9874563298745, 'Vertigo Comics', 2012, 'español', '500.00', 'uploads/imagenes_libro/3_krf9.jpg', 1, 50),
(12, 'House of whispers', 'agregar descripcion', 'Neil Gaiman', 2, 3, 9632589856324, 'Vertigo Comics', 2018, 'español', '600.00', 'uploads/imagenes_libro/4_3b7c.jpg', 1, 60),
(13, 'Posesion', 'Uno de los mejores libros de Stephen King, bajo el pseudónimo de Richard Bachman.', 'Stephen King', 1, 1, 9788497595940, 'DEBOLSILLO', 1989, 'español', '460.00', 'uploads/imagenes_libro/9788497595940.jpg', 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_detalle`
--

CREATE TABLE `orden_detalle` (
  `detalle_id` int(11) NOT NULL,
  `orden_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden_detalle`
--

INSERT INTO `orden_detalle` (`detalle_id`, `orden_id`, `libro_id`, `detalle_cantidad`, `detalle_precio`) VALUES
(17, 40, 1, 2, '360.00'),
(18, 40, 12, 1, '600.00'),
(19, 41, 5, 1, '350.00'),
(20, 42, 4, 1, '300.00'),
(21, 42, 2, 1, '300.00'),
(22, 43, 7, 1, '400.00'),
(23, 44, 11, 1, '500.00'),
(24, 45, 6, 1, '500.00'),
(25, 46, 10, 1, '150.00'),
(26, 46, 13, 1, '460.00'),
(27, 48, 3, 2, '350.00'),
(28, 48, 5, 1, '350.00'),
(29, 48, 4, 1, '300.00'),
(30, 49, 8, 2, '450.00'),
(31, 49, 9, 2, '370.00'),
(32, 49, 2, 1, '300.00'),
(33, 50, 11, 2, '500.00'),
(34, 50, 9, 1, '370.00'),
(35, 50, 5, 1, '350.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_pedido`
--

CREATE TABLE `orden_pedido` (
  `orden_id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `orden_fecha` date NOT NULL,
  `orden_total` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden_pedido`
--

INSERT INTO `orden_pedido` (`orden_id`, `id_persona`, `orden_fecha`, `orden_total`) VALUES
(40, 5, '2018-06-06', '1320.00'),
(41, 2, '2018-06-06', '350.00'),
(42, 3, '2018-06-06', '600.00'),
(43, 4, '2018-06-06', '400.00'),
(44, 8, '2018-06-06', '500.00'),
(45, 7, '2018-06-06', '500.00'),
(46, 8, '2018-06-07', '610.00'),
(47, 8, '2018-06-07', '0.00'),
(48, 2, '2018-06-08', '1350.00'),
(49, 5, '2018-06-08', '1940.00'),
(50, 5, '2018-06-08', '1720.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `perfil_id` int(11) NOT NULL,
  `perfil_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`perfil_id`, `perfil_descripcion`) VALUES
(1, 'administrador'),
(2, 'cliente'),
(3, 'visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `apellido`, `email`, `telefono`, `perfil_id`) VALUES
(1, 'Estefania', 'Reyess', 'estefyreyes.92@gmail.com', '3794022196', 1),
(2, 'Laura', 'Romero', 'laura@gmail.com', '37798466445', 2),
(3, 'Luciano', 'Salina', 'lucianoS@gmail.com', '3333333333', 2),
(4, 'Sara', 'Reyes', 'sara.y.kings.98@gmail.com', '3354558897', 2),
(5, 'Alicia', 'Pared', 'elenalicia@hotmail.com', '3794856978', 2),
(6, 'Tomas', 'Reyes', 'tomas@gmail.com', '3794526987', 2),
(7, 'Kevin', 'Jara', 'kevinjosue@gmail.com', '3784569546', 2),
(8, 'Sofia', 'Bruno', 'sofia@gmail.com', '1125252624', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `estado_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `password`, `id_persona`, `estado_usuario`) VALUES
(1, 'estefyreyes.92@gmail.com', 'MTIzNDU2Nzg=', 1, 0),
(2, 'laura@gmail.com', 'bGF1cmExMjM=', 2, 0),
(3, 'lucianoS@gmail.com', 'MTAwOTE5OTQ=', 3, 0),
(4, 'sara.y.kings.98@gmail.com', 'MTIzNDU2Nzg=', 4, 0),
(5, 'elenalicia@hotmail.com', 'MTIzNDU2Nzg=', 5, 0),
(6, 'tomas@gmail.com', 'MTIzNDU2Nzg=', 6, 0),
(7, 'kevinjosue@gmail.com', 'MTIzNDU2Nzg=', 7, 0),
(8, 'sofia@gmail.com', 'MTIzNDU2Nzg=', 8, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`consulta_id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`genero_id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`libro_id`);

--
-- Indices de la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  ADD PRIMARY KEY (`detalle_id`);

--
-- Indices de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  ADD PRIMARY KEY (`orden_id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`perfil_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `consulta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `libro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `orden_detalle`
--
ALTER TABLE `orden_detalle`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
  MODIFY `orden_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `perfil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
