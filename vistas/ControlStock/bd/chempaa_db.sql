-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2023 a las 15:14:31
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chempaa_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `Id_asistencia` int(11) NOT NULL,
  `empleado` varchar(50) NOT NULL,
  `DNI` varchar(20) NOT NULL,
  `Fecha_entrada` datetime NOT NULL,
  `Fecha_salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `id_barrio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`id_barrio`, `nombre`) VALUES
(1, '12 DE OCTUBRE'),
(2, '16 DE JULIO'),
(3, '17 DE OCTUBRE'),
(4, '1° DE MAYO'),
(5, '20 de JULIO'),
(6, '2 DE ABRIL'),
(7, '7 DE MAYO'),
(8, '8 DE MARZO'),
(9, '8 DE OCTUBRE'),
(10, 'ANTENOR GAUNA'),
(11, 'ARTURO ILLIA'),
(12, 'ARTURO ILLIA II'),
(13, 'BARRIO MILITAR'),
(14, 'BARRIO VIAL'),
(15, 'BERNARDINO RIVADAVIA'),
(16, 'CO.VI.FOL.'),
(17, 'COLONIA BUENA VISTA'),
(18, 'COLONIA PASTORIL'),
(19, 'COLONIA VILLAFAÑE'),
(20, 'COMANDANTE FONTANA'),
(21, 'CLORINDA'),
(22, 'COLONIA BUENA VISTA'),
(23, 'COLONIA PASTORIL'),
(24, 'COLONIA VILLAFAÑE'),
(25, 'COMANDANTE FONTANA'),
(26, 'DIVINO NIÑO JESÚS'),
(27, 'DON BOSCO'),
(28, 'DR. RICARDO BALBÍN'),
(29, 'EL MISTOL'),
(30, 'EL PALOMAR'),
(31, 'EL PORVENIR'),
(32, 'EL QUEBRANTO'),
(33, 'EL RESGUARDO'),
(34, 'EMILIO TOMAS'),
(35, 'EVA PERÓN'),
(36, 'FACUNDO QUIROGA'),
(37, 'FORMOSA'),
(38, 'GENERAL LUCIO V. MANSILLA'),
(39, 'GENERAL MANUEL BELGRANO'),
(40, 'GENERAL MOSCONI'),
(41, 'GRAN GUARDIA'),
(42, 'GUADALUPE'),
(43, 'HERRADURA'),
(44, 'HIPÓLITO IRIGOYEN'),
(45, 'IBARRETA'),
(46, 'INGENIERO GUILLERMO N. JUAREZ'),
(47, 'INDEPENDENCIA'),
(48, 'ISLAS MALVINAS'),
(49, 'J.F. KENNEDY'),
(50, 'JUAN D. PERÓN'),
(51, 'JUAN M. DE ROSAS'),
(52, 'LA ESTRELLA'),
(53, 'LA FLORESTA'),
(54, 'LA PAZ'),
(55, 'LA VIRGEN NIÑA'),
(56, 'LAS DELICIAS'),
(57, 'LAS ORQUIDEAS'),
(58, 'LIBERTAD'),
(59, 'LIBORSI'),
(60, 'LOS INMIGRANTES'),
(61, 'MARIANO MORENO'),
(62, 'NANQOM'),
(63, 'PALMA SOLA'),
(64, 'PALO SANTO'),
(65, 'PARQUE INDUSTRIAL'),
(66, 'PARQUE URBANO'),
(67, 'POZO DEL TIGRE'),
(68, 'REPÚBLICA ARGENTINA'),
(69, 'ROBERTO SOTELO'),
(70, 'SAG. CORAZÓN DE MARÍA'),
(71, 'SAN AGUSTÍN'),
(72, 'SAN ANDRES'),
(73, 'SAN ANTONIO'),
(74, 'SAN CAYETANO'),
(75, 'SAN FRANCISCO'),
(76, 'SAN HILARIO'),
(77, 'SAN ISIDRO LABRADOR'),
(78, 'SAN JOSÉ OBRERO'),
(79, 'SAN JUAN'),
(80, 'SAN JUAN BAUTISTA'),
(81, 'SAN MARTÍN'),
(82, 'SAN MIGUEL'),
(83, 'SAN PÍO X'),
(84, 'SAN PEDRO'),
(85, 'SANTA LUCÍA'),
(86, 'SANTA ROSA'),
(87, 'SIMÓN BOLIVAR'),
(88, 'SOLANO LIMA'),
(89, 'STELLA MARIS'),
(90, 'VENEZUELA'),
(91, 'VIRGEN DE ITATÍ'),
(92, 'VIRGEN DE LUJÁN'),
(93, 'VILLA DEL ROSARIO'),
(94, 'VILLA HERMOSA'),
(95, 'VILLA LA PILAR'),
(96, 'VILLA LOURDES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Mostrador'),
(3, 'Gerente'),
(4, 'Recepcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_insumos`
--

CREATE TABLE `categoria_insumos` (
  `id_categoria_insumos` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_insumos`
--

INSERT INTO `categoria_insumos` (`id_categoria_insumos`, `categoria`) VALUES
(1, 'Ingrediente'),
(2, 'elemento de preparacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `id_contacto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `id_persona`, `id_direccion`, `id_contacto`) VALUES
(1, 1, 2, 1),
(2, 2, 1, 2),
(4, 4, 2, 1),
(3, 6, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_insumos`
--

CREATE TABLE `compras_insumos` (
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_ficticia`
--

CREATE TABLE `compra_ficticia` (
  `id_compra_ficticia` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_pcto` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra_ficticia`
--

INSERT INTO `compra_ficticia` (`id_compra_ficticia`, `id_producto`, `cantidad_pcto`) VALUES
(45, 5, 66);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_tipo_contacto` int(11) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `id_persona`, `id_tipo_contacto`, `valor`) VALUES
(1, 1, 1, '3704111111'),
(2, 2, 1, '3704000000'),
(3, 7, 1, '3705010840'),
(4, 8, 1, '3704383901'),
(5, 9, 1, '3704691655'),
(7, 24, 2, 'ticianovera@gmail.com'),
(8, 25, 1, '3704986753'),
(16, 30, 2, 'assa@hdsh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_detalle_compra` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_insumo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `n_factura` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id_detalle_pedidos` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id_detalle_pedidos`, `id_pedido`, `id_producto`, `cantidad`, `precio`) VALUES
(7, 24, 9, 2, 8000),
(8, 24, 4, 2, 8000),
(9, 25, 6, 1, 4000),
(12, 25, 9, 20, 8000),
(13, 28, 6, 2, 8000),
(14, 31, 10, 2, 4000),
(15, 31, 5, 2, 8000),
(16, 26, 3, 2, 4000),
(17, 30, 7, 2, 8000),
(18, 27, 7, 1, 2000),
(19, 29, 5, 1, 4000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_productos`
--

CREATE TABLE `detalle_productos` (
  `id_detalle_producto` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_insumo` int(11) DEFAULT NULL,
  `cantidad` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_productos`
--

INSERT INTO `detalle_productos` (`id_detalle_producto`, `id_producto`, `id_insumo`, `cantidad`) VALUES
(62, 5, 20, 0.058),
(63, 5, 19, 0.033),
(64, 5, 18, 0.025),
(81, 60, 44, 0.2),
(82, 60, 44, 0.216667),
(83, 60, 35, 0.133333),
(84, 60, 45, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `id_tipo_direccion` int(11) NOT NULL,
  `id_barrio` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `id_tipo_direccion`, `id_barrio`, `id_persona`, `id_localidad`, `id_provincia`) VALUES
(1, 1, 1, 2, 1, 1),
(4, 1, 35, 8, 10, 1),
(5, 1, 35, 9, 10, 1),
(6, 1, 35, 25, 10, 1),
(3, 1, 94, 7, 10, 1),
(2, 2, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_contacto` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `cuil` varchar(15) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `id_persona`, `id_cargo`, `id_contacto`, `id_direccion`, `cuil`, `id_usuario`) VALUES
(6, 7, 1, 3, 3, '20461544585', 9),
(7, 8, 3, 4, 4, '20461529255', 10),
(8, 9, 4, 5, 5, '20460661315', 11),
(9, 25, 3, 8, 6, '20456754359', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `cuit` int(11) NOT NULL,
  `cvu` varchar(20) NOT NULL,
  `cuenta_bancaria` varchar(50) NOT NULL,
  `nombre_razon_social` varchar(50) NOT NULL,
  `id_direccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pedidos`
--

CREATE TABLE `estado_pedidos` (
  `id_estado_pedido` int(11) NOT NULL,
  `descripcion_est` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_pedidos`
--

INSERT INTO `estado_pedidos` (`id_estado_pedido`, `descripcion_est`) VALUES
(1, 'Pendiente'),
(2, 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id_insumo` int(11) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_tipo_insumo` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_tipo_medida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id_insumo`, `id_proveedor`, `id_tipo_insumo`, `descripcion`, `cantidad`, `id_tipo_medida`) VALUES
(18, 17, 4, 'Jamon', 100, 1),
(19, 17, 2, 'Queso', 120, 1),
(20, 17, 4, 'picadillo', 123, 1),
(21, 17, 1, 'Carne', 124, 1),
(22, 17, 4, 'sal', 100, 1),
(23, 17, 4, 'condimentos varios', 124, 1),
(24, 17, 1, 'carne molida', 124, 1),
(25, 17, 1, 'barbacoa', 233, 1),
(26, 17, 4, 'pimienta', 134, 1),
(27, 17, 1, 'vacio desmechado', 123, 1),
(28, 17, 3, 'cebolla', 123, 1),
(29, 17, 3, 'Morrron', 222, 1),
(30, 17, 4, 'choclo', 222, 1),
(31, 17, 4, 'choclo grano', 122, 1),
(32, 17, 3, 'Tomate', 112, 1),
(33, 17, 4, 'alhabaca', 124, 1),
(34, 17, 4, 'azucar', 323, 1),
(35, 17, 2, 'Queso Mozzarella', 233, 1),
(36, 17, 3, 'azelga', 22, 1),
(37, 17, 3, 'zanahoria', 222, 1),
(38, 17, 4, 'Leche', 222, 2),
(39, 17, 4, 'harina', 22, 1),
(40, 17, 4, 'nuez moscada', 22, 1),
(41, 17, 4, 'mandioca', 22, 1),
(42, 17, 3, 'perejil', 22, 4),
(43, 17, 3, 'cebollita', 222, 4),
(44, 17, 1, 'chorizo aleman', 22, 1),
(45, 17, 4, 'savora', 22, 4),
(46, 17, 4, 'Limon', 66, 2),
(47, 17, 4, 'especias', 666, 4);

--
-- Disparadores `insumos`
--
DELIMITER $$
CREATE TRIGGER `insumoDelete` BEFORE DELETE ON `insumos` FOR EACH ROW BEGIN

INSERT INTO 
log(usuario, movimiento, informacion_actual)

VALUES(CURRENT_USER, "Se eliminó un insumo", concat('Informacion actual: ',OLD.descripcion, ' '));


END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insumoInsert` BEFORE INSERT ON `insumos` FOR EACH ROW BEGIN

INSERT INTO 
log(usuario, movimiento, informacion_actual)

VALUES(CURRENT_USER, "Se agregó un insumo", concat('Informacion actual: ',NEW.descripcion, ' '));


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id_localidad` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `codigo_telefonico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id_localidad`, `descripcion`, `codigo_telefonico`) VALUES
(1, 'Banco Payagua', 370),
(2, 'CLORINDA', 3718),
(3, 'COLONIA BUENA VISTA', 3718),
(4, 'COLONIA PASTORIL', 370),
(5, 'COLONIA VILLAFAÑE', 370),
(6, 'COMANDANTE FONTANA', 3716),
(7, 'EL COLORADO', 370),
(8, 'EL ESPINILLO', 3718),
(9, 'ESTANISLAO DEL CAMPO', 3716),
(10, 'FORMOSA', 370),
(11, 'GENERAL LUCIO V. MANSILLA', 370),
(12, 'GENERAL MANUEL BELGRANO', 3716),
(13, 'GENERAL MOSCONI', 3711),
(14, 'GRAN GUARDIA', 370),
(15, 'HERRADURA', 370),
(16, 'IBARRETA', 3716),
(17, 'INGENIERO GUILLERMO N. JUAREZ', 3711),
(18, 'LAGUNA BLANCA', 3718),
(19, 'LAGUNA GALLO', 3718),
(20, 'LAGUNA NAICK NECK', 3718),
(21, 'LAGUNA YEMA', 3715),
(22, 'LAS LOMITAS', 3715),
(23, 'LOS CHIRIGÜANOS', 3711),
(24, 'MARIA CRISTINA', 3711),
(25, 'MISION TACAAGLE', 3718),
(26, 'MOJON DE FIERRO', 370),
(27, 'PALMA SOLA', 3718),
(28, 'PALO SANTO', 370),
(29, 'PIRANE', 370),
(30, 'POZO DEL TIGRE', 3715),
(31, 'RIACHO HE-HE', 3718),
(32, 'SAN FRANCISCO DE LAISHI', 370),
(33, 'SAN HILARIO', 370),
(34, 'SAN MARTIN', 3716),
(35, 'SIETE PALMAS', 3718),
(36, 'TRES LAGUNAS', 3718),
(37, 'VILLA DOS TRECE', 370),
(38, 'VILLA GENERAL GÜEMES', 3716);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `movimiento` varchar(50) NOT NULL,
  `informacion_actual` text NOT NULL,
  `informacion_anterior` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id_log`, `usuario`, `fecha`, `movimiento`, `informacion_actual`, `informacion_anterior`) VALUES
(1, 0, '2023-07-25 11:34:13', 'Se agregó un insumo', 'Informacion actual: Carne molida 2', ''),
(2, 0, '2023-07-25 11:35:45', 'Se agregó un insumo', 'Informacion actual: Valentina 4', ''),
(3, 0, '2023-07-25 11:38:36', 'Se eliminó un insumo', 'Informacion actual: Carne molida 2', ''),
(4, 0, '2023-07-25 11:40:31', 'Se eliminó un insumo', 'Informacion actual: luciano 4', 'Informacion anterior: Jorge 4'),
(5, 0, '2023-08-01 20:52:49', 'Se eliminó un insumo', 'Informacion actual: Queso Mozzarella 2', ''),
(6, 0, '2023-08-01 20:52:49', 'Se eliminó un insumo', 'Informacion actual: Queso Sardo 3', ''),
(7, 0, '2023-08-01 20:52:49', 'Se eliminó un insumo', 'Informacion actual: lucas 1', ''),
(8, 0, '2023-08-01 20:52:49', 'Se eliminó un insumo', 'Informacion actual: luciano 4', ''),
(9, 0, '2023-08-01 20:52:49', 'Se eliminó un insumo', 'Informacion actual: Valentina 4', ''),
(10, 0, '2023-08-01 20:58:51', 'Se agregó un insumo', 'Informacion actual: Carne 3', ''),
(11, 0, '2023-08-01 20:58:51', 'Se agregó un insumo', 'Informacion actual: Queso 3', ''),
(12, 0, '2023-08-01 21:00:32', 'Se agregó un insumo', 'Informacion actual: Cebolla 1', ''),
(13, 0, '2023-08-01 21:10:46', 'Se eliminó un insumo', 'Informacion actual: Carne ', ''),
(14, 0, '2023-08-01 21:10:47', 'Se eliminó un insumo', 'Informacion actual: Queso ', ''),
(15, 0, '2023-08-01 21:10:49', 'Se eliminó un insumo', 'Informacion actual: Cebolla ', ''),
(16, 0, '2023-08-01 21:18:54', 'Se agregó un insumo', 'Informacion actual: Queso ', ''),
(17, 0, '2023-08-01 21:18:54', 'Se agregó un insumo', 'Informacion actual: Carne ', ''),
(18, 0, '2023-08-01 23:29:47', 'Se agregó un insumo', 'Informacion actual: Carne molida ', ''),
(19, 0, '2023-08-01 23:31:23', 'Se agregó un insumo', 'Informacion actual: prueba ', ''),
(20, 0, '2023-08-01 23:31:32', 'Se eliminó un insumo', 'Informacion actual: Carne molida ', ''),
(21, 0, '2023-08-01 23:33:21', 'Se agregó un insumo', 'Informacion actual: olalal ', ''),
(26, 0, '2023-08-01 23:36:00', 'Se eliminó un insumo', 'Informacion actual: olalal ', ''),
(27, 0, '2023-08-01 23:38:57', 'Se agregó un insumo', 'Informacion actual: sdsd ', ''),
(31, 0, '2023-08-01 23:46:14', 'Se eliminó un insumo', 'Informacion actual: sdsd ', ''),
(32, 0, '2023-08-01 23:46:18', 'Se eliminó un insumo', 'Informacion actual: prueba ', ''),
(35, 0, '2023-08-01 23:50:56', 'Se eliminó un insumo', 'Informacion actual: Queso ', ''),
(36, 0, '2023-08-01 23:51:01', 'Se eliminó un insumo', 'Informacion actual: Carne ', ''),
(37, 0, '2023-08-01 23:51:25', 'Se agregó un insumo', 'Informacion actual: Carne molida ', ''),
(38, 0, '2023-08-01 23:51:44', 'Se agregó un insumo', 'Informacion actual: Queso Mozzarella ', ''),
(39, 0, '2023-08-01 23:52:02', 'Se agregó un insumo', 'Informacion actual: prueba3 ', ''),
(40, 0, '2023-08-01 23:52:12', 'Se eliminó un insumo', 'Informacion actual: prueba3 ', ''),
(41, 0, '2023-08-02 00:00:13', 'Se agregó un insumo', 'Informacion actual: Queso ', ''),
(42, 0, '2023-08-02 00:06:26', 'Se eliminó un insumo', 'Informacion actual: Carne molida ', ''),
(43, 0, '2023-08-02 00:11:06', 'Se agregó un insumo', 'Informacion actual: ola ', ''),
(44, 0, '2023-08-02 00:11:48', 'Se eliminó un insumo', 'Informacion actual: Queso Mozzarella ', ''),
(47, 0, '2023-08-02 08:49:20', 'Se agregó un insumo', 'Informacion actual: xxsd ', ''),
(48, 0, '2023-08-09 02:18:30', 'Se eliminó un insumo', 'Informacion actual: Quesoop ', ''),
(49, 0, '2023-08-09 02:18:33', 'Se eliminó un insumo', 'Informacion actual: xxsd ', ''),
(50, 0, '2023-09-13 00:50:59', 'Se eliminó un insumo', 'Informacion actual: prueba ', ''),
(54, 0, '2023-09-28 11:31:00', 'Se agregó un insumo', 'Informacion actual: Jamon ', ''),
(55, 0, '2023-10-06 06:48:35', 'Se agregó un insumo', 'Informacion actual: Queso Mozzarella ', ''),
(56, 0, '2023-10-06 06:52:50', 'Se agregó un insumo', 'Informacion actual: Queso ', ''),
(57, 0, '2023-10-06 07:00:50', 'Se agregó un insumo', 'Informacion actual: Huevo ', ''),
(58, 0, '2023-10-06 07:04:04', 'Se agregó un insumo', 'Informacion actual: Picadillo ', ''),
(59, 0, '2023-11-02 18:28:44', 'Se agregó un insumo', 'Informacion actual: Carne ', ''),
(60, 0, '2023-11-02 18:28:44', 'Se agregó un insumo', 'Informacion actual: Cebolla ', ''),
(61, 0, '2023-11-02 18:29:52', 'Se agregó un insumo', 'Informacion actual: Sal ', ''),
(62, 0, '2023-11-02 18:29:52', 'Se agregó un insumo', 'Informacion actual: condimentos varios ', ''),
(63, 0, '2023-11-02 18:38:13', 'Se agregó un insumo', 'Informacion actual: Morron ', ''),
(64, 0, '2023-11-04 19:56:38', 'Se agregó un insumo', 'Informacion actual: nss ', ''),
(65, 0, '2023-11-04 19:57:12', 'Se eliminó un insumo', 'Informacion actual: nss ', ''),
(66, 0, '2023-11-04 19:59:15', 'Se agregó un insumo', 'Informacion actual: 124 ', ''),
(67, 0, '2023-11-04 20:01:01', 'Se eliminó un insumo', 'Informacion actual: 124 ', ''),
(70, 0, '2023-11-04 20:04:51', 'Se eliminó un insumo', 'Informacion actual: Jamon ', ''),
(71, 0, '2023-11-04 20:31:31', 'Se agregó un insumo', 'Informacion actual: prueba ', ''),
(72, 0, '2023-11-04 20:45:21', 'Se agregó un insumo', 'Informacion actual: borrar ', ''),
(73, 0, '2023-11-04 20:55:23', 'Se eliminó un insumo', 'Informacion actual: borrar ', ''),
(74, 0, '2023-11-04 20:55:29', 'Se eliminó un insumo', 'Informacion actual: Picadillo ', ''),
(75, 0, '2023-11-04 21:56:20', 'Se agregó un insumo', 'Informacion actual: Jamon ', ''),
(76, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: Queso Mozzarella ', ''),
(77, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: Queso ', ''),
(78, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: Huevo ', ''),
(79, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: Carne ', ''),
(80, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: Cebolla ', ''),
(81, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: Sal ', ''),
(82, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: condimentos varios ', ''),
(83, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: Morron ', ''),
(84, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: prueba ', ''),
(85, 0, '2023-11-05 14:26:15', 'Se eliminó un insumo', 'Informacion actual: Jamon ', ''),
(86, 0, '2023-11-05 14:27:49', 'Se agregó un insumo', 'Informacion actual: Jamon ', ''),
(87, 0, '2023-11-05 14:28:31', 'Se agregó un insumo', 'Informacion actual: Queso ', ''),
(88, 0, '2023-11-05 14:28:48', 'Se agregó un insumo', 'Informacion actual: picadillo ', ''),
(89, 0, '2023-11-05 14:29:12', 'Se agregó un insumo', 'Informacion actual: Carne ', ''),
(90, 0, '2023-11-05 14:29:47', 'Se agregó un insumo', 'Informacion actual: sal ', ''),
(91, 0, '2023-11-05 14:30:05', 'Se agregó un insumo', 'Informacion actual: condimentos varios ', ''),
(92, 0, '2023-11-05 14:30:46', 'Se agregó un insumo', 'Informacion actual: carne molida ', ''),
(93, 0, '2023-11-05 14:31:02', 'Se agregó un insumo', 'Informacion actual: barbacoa ', ''),
(94, 0, '2023-11-05 14:31:27', 'Se agregó un insumo', 'Informacion actual: pimienta ', ''),
(95, 0, '2023-11-05 14:31:50', 'Se agregó un insumo', 'Informacion actual: vacio desmechado ', ''),
(96, 0, '2023-11-05 14:32:12', 'Se agregó un insumo', 'Informacion actual: cebolla ', ''),
(97, 0, '2023-11-05 14:32:28', 'Se agregó un insumo', 'Informacion actual: Morrron ', ''),
(98, 0, '2023-11-05 14:33:14', 'Se agregó un insumo', 'Informacion actual: choclo ', ''),
(99, 0, '2023-11-05 14:33:33', 'Se agregó un insumo', 'Informacion actual: choclo grano ', ''),
(100, 0, '2023-11-05 14:34:07', 'Se agregó un insumo', 'Informacion actual: Tomate ', ''),
(101, 0, '2023-11-05 14:34:27', 'Se agregó un insumo', 'Informacion actual: alhabaca ', ''),
(102, 0, '2023-11-05 14:36:22', 'Se agregó un insumo', 'Informacion actual: azucar ', ''),
(103, 0, '2023-11-05 14:36:51', 'Se agregó un insumo', 'Informacion actual: Queso Mozzarella ', ''),
(104, 0, '2023-11-05 14:37:17', 'Se agregó un insumo', 'Informacion actual: azelga ', ''),
(105, 0, '2023-11-05 14:37:49', 'Se agregó un insumo', 'Informacion actual: zanahoria ', ''),
(106, 0, '2023-11-05 14:38:09', 'Se agregó un insumo', 'Informacion actual: Leche ', ''),
(107, 0, '2023-11-05 14:38:33', 'Se agregó un insumo', 'Informacion actual: harina ', ''),
(108, 0, '2023-11-05 14:39:28', 'Se agregó un insumo', 'Informacion actual: nuez moscada ', ''),
(109, 0, '2023-11-05 14:39:51', 'Se agregó un insumo', 'Informacion actual: mandioca ', ''),
(110, 0, '2023-11-05 14:40:21', 'Se agregó un insumo', 'Informacion actual: perejil ', ''),
(111, 0, '2023-11-05 14:41:08', 'Se agregó un insumo', 'Informacion actual: cebollita ', ''),
(112, 0, '2023-11-05 14:42:48', 'Se agregó un insumo', 'Informacion actual: chorizo aleman ', ''),
(113, 0, '2023-11-05 14:43:26', 'Se agregó un insumo', 'Informacion actual: savora ', ''),
(114, 0, '2023-11-05 14:44:55', 'Se agregó un insumo', 'Informacion actual: Limon ', ''),
(115, 0, '2023-11-05 14:45:55', 'Se agregó un insumo', 'Informacion actual: especias ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida_producto`
--

CREATE TABLE `medida_producto` (
  `id_medida_producto` int(11) NOT NULL,
  `medida` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medida_producto`
--

INSERT INTO `medida_producto` (`id_medida_producto`, `medida`) VALUES
(1, 'unidades'),
(2, 'docenas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_de_pago`
--

CREATE TABLE `metodo_de_pago` (
  `id_metodo_pago` int(11) NOT NULL,
  `descripcion_met` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metodo_de_pago`
--

INSERT INTO `metodo_de_pago` (`id_metodo_pago`, `descripcion_met`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de credito '),
(3, 'Tarjeta de debito'),
(4, 'Transferencia Bancaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_de_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_estado_pedido` int(11) NOT NULL,
  `id_metodo_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `id_tipo_de_pedido`, `fecha`, `id_estado_pedido`, `id_metodo_pago`) VALUES
(24, 1, 2, '2023-08-30', 2, 1),
(25, 2, 1, '2023-08-29', 2, 2),
(26, 3, 1, '2023-09-01', 2, 1),
(27, 4, 1, '2023-09-01', 2, 1),
(28, 3, 1, '2023-09-06', 1, 1),
(29, 1, 1, '2023-09-02', 2, 2),
(30, 4, 1, '2023-08-31', 2, 1),
(31, 2, 1, '2023-09-01', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `nombre_per` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre_per`, `apellido`, `fecha_nac`) VALUES
(1, 'Juan', 'Ramirez', '2015-07-01'),
(2, 'Hector', 'Perez', '2023-07-05'),
(3, 'Emilia', 'Mernes', '2013-08-08'),
(4, 'Mauro', 'Lombardo', '2018-08-02'),
(5, 'Paolo', 'Guerrero', '2023-09-07'),
(6, 'Maximiliano', 'Sarate', '2023-09-02'),
(7, 'Tici', 'tici', '2005-04-22'),
(8, 'leo', 'Gomez', '2005-04-22'),
(9, 'Luciano', 'Roa', '2004-10-12'),
(24, 'tici', 'vera', '2023-09-08'),
(25, 'raisha', 'raisha', '2004-07-03'),
(26, 'mik', 'owo', '2023-11-16'),
(27, 'mikaa', 'saaa', '2023-11-24'),
(28, 'yo', 'ww', '2023-11-30'),
(29, 'yo', 'ww', '2023-11-30'),
(30, 'sad', 'ew', '2023-12-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_pro` varchar(20) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_pro`, `precio`, `descripcion`, `img`) VALUES
(3, 'Pollo al disco', 300, 'Presas de pollo y verduras al disco desmenuzados', ''),
(4, 'Cheese Burger', 300, 'Blend de roast beef, tapita de asado, laminas de bacon y riquisimo cheddar.', ''),
(5, 'jamon y quesoo', 3000, 'Jamon cocido seleccionado con queso mozzarella', 'IMG-20230705-WA0094.jpg'),
(6, 'Caprese', 300, 'Tomates frescos con hojas de albahaca y mozzarella', ''),
(7, 'Verduras', 300, 'Espinacas de la huerta, salsita bechamel y una combinacion de queso sardo y mozzarella', ''),
(8, 'Choclo', 300, 'Mezcla de granos enteros y cremosos con mucho queso muzzarella', ''),
(9, 'Alemana', 300, 'Salchicha alemana exquisita y abundante mostaza acompañadas de queso mozzarella', ''),
(10, 'Arabe', 30, 'Carne, orrones, tomate, cebollita en cubos y el toque caracteristico de limon', ''),
(60, 'Alemana', 3000, 'Salchicha alemana exquisita y abundante mostaza acompañadas de queso mozzarella', 'IMG-20230705-WA0099.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `cuit` int(11) NOT NULL,
  `id_tipo_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `id_persona`, `cuit`, `id_tipo_proveedor`) VALUES
(17, 25, 2023, 1),
(23, 30, 33, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `codigo_postal` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `descripcion`, `codigo_postal`) VALUES
(1, 'Formosa', 'P3600'),
(2, 'Buenos Aires', 'B1708'),
(3, 'Catamarca', 'K4700'),
(4, 'Chaco', 'H3500'),
(5, 'Chubut', 'U9000'),
(6, 'Córdoba', 'X5000'),
(7, 'Corrientes', 'W3400'),
(8, 'Entre Ríos', 'E3100'),
(9, 'Jujuy', 'Y4600'),
(10, 'La Pampa', 'L6300'),
(11, 'La Rioja', 'F5300'),
(12, 'Mendoza', 'M5500'),
(13, 'Misiones', 'N3300'),
(14, 'Neuquén', 'Q8300'),
(15, 'Río Negro', 'R8500'),
(16, 'Salta', 'A4400'),
(17, 'San Juan', 'J5400'),
(18, 'San Luis', 'D5700'),
(19, 'Santa Cruz', 'Z9400'),
(20, 'Santa Fe', 'S3000'),
(21, 'Santiago del Estero', 'G4200'),
(22, 'Tierra del Fuego', 'V9410'),
(23, 'Tucumán', 'T4000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_insumos`
--

CREATE TABLE `stock_insumos` (
  `id_stock_insumo` int(11) NOT NULL,
  `id_insumo` int(11) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `id_tipo_medida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_productos`
--

CREATE TABLE `stock_productos` (
  `id_stock_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stock_productos`
--

INSERT INTO `stock_productos` (`id_stock_producto`, `id_producto`, `cantidad`) VALUES
(15, 3, 100),
(18, 6, 100),
(19, 7, 100),
(20, 8, 100),
(21, 9, 100),
(22, 10, 100),
(39, 5, 123),
(40, 60, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_pedidos`
--

CREATE TABLE `tipos_de_pedidos` (
  `id_tipo_pedido` int(11) NOT NULL,
  `descripcion_pe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_de_pedidos`
--

INSERT INTO `tipos_de_pedidos` (`id_tipo_pedido`, `descripcion_pe`) VALUES
(1, 'Envio'),
(2, 'Retiro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_proveedores`
--

CREATE TABLE `tipos_de_proveedores` (
  `id_tipo_proveedor` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_de_proveedores`
--

INSERT INTO `tipos_de_proveedores` (`id_tipo_proveedor`, `descripcion`) VALUES
(1, 'Juridica'),
(2, 'Empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_insumos`
--

CREATE TABLE `tipos_insumos` (
  `id_tipo_insumo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `id_categoria_insumo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_insumos`
--

INSERT INTO `tipos_insumos` (`id_tipo_insumo`, `descripcion`, `id_categoria_insumo`) VALUES
(1, 'Carne', 1),
(2, 'Queso', 1),
(3, 'Verdura', 1),
(4, '...', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_articulos`
--

CREATE TABLE `tipo_articulos` (
  `id_tipo_articulo` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contactos`
--

CREATE TABLE `tipo_contactos` (
  `id_tipo_contacto` int(11) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_contactos`
--

INSERT INTO `tipo_contactos` (`id_tipo_contacto`, `descripcion`) VALUES
(1, 'Telefono'),
(2, 'Email');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_direcciones`
--

CREATE TABLE `tipo_direcciones` (
  `id_tipo_direccion` int(11) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_direcciones`
--

INSERT INTO `tipo_direcciones` (`id_tipo_direccion`, `descripcion`) VALUES
(1, 'Personal'),
(2, 'Laboral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_domicilios_centro`
--

CREATE TABLE `tipo_domicilios_centro` (
  `id_domicilio_centro` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `altura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_domicilios_edificio`
--

CREATE TABLE `tipo_domicilios_edificio` (
  `id_tipo_edificio` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `torre` varchar(5) NOT NULL,
  `piso` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_domicilio_barrio`
--

CREATE TABLE `tipo_domicilio_barrio` (
  `id_tipo_barrio` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `manzana` varchar(50) NOT NULL,
  `casa` varchar(50) NOT NULL,
  `parcela` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_medida`
--

CREATE TABLE `tipo_medida` (
  `id_tipo_medida` int(11) NOT NULL,
  `Medida` varchar(8) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_medida`
--

INSERT INTO `tipo_medida` (`id_tipo_medida`, `Medida`, `descripcion`) VALUES
(1, 'Kg', 'Kilos'),
(2, 'L', 'Litros'),
(3, 'uds.', 'Unidades'),
(4, 'g', 'gramos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(16) NOT NULL,
  `contraseña` varchar(32) NOT NULL,
  `f_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `contraseña`, `f_registro`) VALUES
(9, 'tici', 'tici', '2023-09-12'),
(10, 'Leo', 'leo', '2023-09-12'),
(11, 'Roa', 'luci', '2023-09-12'),
(12, 'raisha', 'raisha', '2023-09-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`Id_asistencia`);

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`id_barrio`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `categoria_insumos`
--
ALTER TABLE `categoria_insumos`
  ADD PRIMARY KEY (`id_categoria_insumos`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`),
  ADD KEY `id_persona` (`id_persona`,`id_direccion`,`id_contacto`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_contacto` (`id_contacto`);

--
-- Indices de la tabla `compras_insumos`
--
ALTER TABLE `compras_insumos`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `compra_ficticia`
--
ALTER TABLE `compra_ficticia`
  ADD PRIMARY KEY (`id_compra_ficticia`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `id_persona` (`id_persona`,`id_tipo_contacto`),
  ADD KEY `id_tipo_contacto` (`id_tipo_contacto`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_detalle_compra`),
  ADD KEY `id_compra` (`id_compra`,`id_insumo`),
  ADD KEY `id_insumo` (`id_insumo`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id_detalle_pedidos`),
  ADD KEY `id_pedido` (`id_pedido`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_productos`
--
ALTER TABLE `detalle_productos`
  ADD PRIMARY KEY (`id_detalle_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_insumo` (`id_insumo`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_tipo_direccion` (`id_tipo_direccion`,`id_barrio`,`id_persona`,`id_localidad`,`id_provincia`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_barrio` (`id_barrio`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_persona` (`id_persona`,`id_cargo`,`id_contacto`,`id_direccion`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_contacto` (`id_contacto`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `id_direccion` (`id_direccion`);

--
-- Indices de la tabla `estado_pedidos`
--
ALTER TABLE `estado_pedidos`
  ADD PRIMARY KEY (`id_estado_pedido`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id_insumo`),
  ADD KEY `id_proveedor` (`id_proveedor`,`id_tipo_insumo`),
  ADD KEY `id_tipo_producto` (`id_tipo_insumo`),
  ADD KEY `insumos_ibfk_3` (`id_tipo_medida`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_usuario` (`usuario`);

--
-- Indices de la tabla `medida_producto`
--
ALTER TABLE `medida_producto`
  ADD PRIMARY KEY (`id_medida_producto`);

--
-- Indices de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `pedidos_ibfk_1` (`id_estado_pedido`),
  ADD KEY `pedidos_ibfk_2` (`id_tipo_de_pedido`),
  ADD KEY `pedidos_ibfk_3` (`id_metodo_pago`),
  ADD KEY `pedidos_ibfk_4` (`id_cliente`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `proveedores_ibfk_1` (`id_tipo_proveedor`),
  ADD KEY `proveedores_ibfk_2` (`id_persona`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `stock_insumos`
--
ALTER TABLE `stock_insumos`
  ADD PRIMARY KEY (`id_stock_insumo`),
  ADD KEY `fk_tipo_medida` (`id_tipo_medida`),
  ADD KEY `fk_insumos_id_insumo` (`id_insumo`);

--
-- Indices de la tabla `stock_productos`
--
ALTER TABLE `stock_productos`
  ADD PRIMARY KEY (`id_stock_producto`),
  ADD KEY `fk_productos_id_producto` (`id_producto`);

--
-- Indices de la tabla `tipos_de_pedidos`
--
ALTER TABLE `tipos_de_pedidos`
  ADD PRIMARY KEY (`id_tipo_pedido`);

--
-- Indices de la tabla `tipos_de_proveedores`
--
ALTER TABLE `tipos_de_proveedores`
  ADD PRIMARY KEY (`id_tipo_proveedor`);

--
-- Indices de la tabla `tipos_insumos`
--
ALTER TABLE `tipos_insumos`
  ADD PRIMARY KEY (`id_tipo_insumo`),
  ADD KEY `fk_insumos_id_categoria_insumo` (`id_categoria_insumo`);

--
-- Indices de la tabla `tipo_articulos`
--
ALTER TABLE `tipo_articulos`
  ADD PRIMARY KEY (`id_tipo_articulo`);

--
-- Indices de la tabla `tipo_contactos`
--
ALTER TABLE `tipo_contactos`
  ADD PRIMARY KEY (`id_tipo_contacto`);

--
-- Indices de la tabla `tipo_direcciones`
--
ALTER TABLE `tipo_direcciones`
  ADD PRIMARY KEY (`id_tipo_direccion`);

--
-- Indices de la tabla `tipo_domicilios_centro`
--
ALTER TABLE `tipo_domicilios_centro`
  ADD PRIMARY KEY (`id_domicilio_centro`),
  ADD KEY `tipo_domicilios_centro_ibfk_1` (`id_direccion`);

--
-- Indices de la tabla `tipo_domicilios_edificio`
--
ALTER TABLE `tipo_domicilios_edificio`
  ADD PRIMARY KEY (`id_tipo_edificio`),
  ADD KEY `tipo_domicilios_edificio_ibfk_1` (`id_direccion`);

--
-- Indices de la tabla `tipo_domicilio_barrio`
--
ALTER TABLE `tipo_domicilio_barrio`
  ADD PRIMARY KEY (`id_tipo_barrio`),
  ADD KEY `id_direccion` (`id_direccion`);

--
-- Indices de la tabla `tipo_medida`
--
ALTER TABLE `tipo_medida`
  ADD PRIMARY KEY (`id_tipo_medida`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `Id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria_insumos`
--
ALTER TABLE `categoria_insumos`
  MODIFY `id_categoria_insumos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compras_insumos`
--
ALTER TABLE `compras_insumos`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_ficticia`
--
ALTER TABLE `compra_ficticia`
  MODIFY `id_compra_ficticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id_detalle_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `detalle_productos`
--
ALTER TABLE `detalle_productos`
  MODIFY `id_detalle_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_pedidos`
--
ALTER TABLE `estado_pedidos`
  MODIFY `id_estado_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `medida_producto`
--
ALTER TABLE `medida_producto`
  MODIFY `id_medida_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `stock_insumos`
--
ALTER TABLE `stock_insumos`
  MODIFY `id_stock_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `stock_productos`
--
ALTER TABLE `stock_productos`
  MODIFY `id_stock_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tipos_de_pedidos`
--
ALTER TABLE `tipos_de_pedidos`
  MODIFY `id_tipo_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_de_proveedores`
--
ALTER TABLE `tipos_de_proveedores`
  MODIFY `id_tipo_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_insumos`
--
ALTER TABLE `tipos_insumos`
  MODIFY `id_tipo_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_articulos`
--
ALTER TABLE `tipo_articulos`
  MODIFY `id_tipo_articulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_contactos`
--
ALTER TABLE `tipo_contactos`
  MODIFY `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_direcciones`
--
ALTER TABLE `tipo_direcciones`
  MODIFY `id_tipo_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_domicilios_centro`
--
ALTER TABLE `tipo_domicilios_centro`
  MODIFY `id_domicilio_centro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_domicilios_edificio`
--
ALTER TABLE `tipo_domicilios_edificio`
  MODIFY `id_tipo_edificio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_domicilio_barrio`
--
ALTER TABLE `tipo_domicilio_barrio`
  MODIFY `id_tipo_barrio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_medida`
--
ALTER TABLE `tipo_medida`
  MODIFY `id_tipo_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`),
  ADD CONSTRAINT `clientes_ibfk_3` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id_contacto`);

--
-- Filtros para la tabla `compras_insumos`
--
ALTER TABLE `compras_insumos`
  ADD CONSTRAINT `compras_insumos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `compra_ficticia`
--
ALTER TABLE `compra_ficticia`
  ADD CONSTRAINT `compra_ficticia_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`id_tipo_contacto`) REFERENCES `tipo_contactos` (`id_tipo_contacto`),
  ADD CONSTRAINT `contactos_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_insumo`) REFERENCES `insumos` (`id_insumo`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compras_insumos` (`id_compra`);

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `detalle_pedidos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `detalle_productos`
--
ALTER TABLE `detalle_productos`
  ADD CONSTRAINT `detalle_productos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `detalle_productos_ibfk_2` FOREIGN KEY (`id_insumo`) REFERENCES `insumos` (`id_insumo`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`id_tipo_direccion`) REFERENCES `tipo_direcciones` (`id_tipo_direccion`),
  ADD CONSTRAINT `direcciones_ibfk_2` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`),
  ADD CONSTRAINT `direcciones_ibfk_3` FOREIGN KEY (`id_barrio`) REFERENCES `barrios` (`id_barrio`),
  ADD CONSTRAINT `direcciones_ibfk_4` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  ADD CONSTRAINT `direcciones_ibfk_5` FOREIGN KEY (`id_localidad`) REFERENCES `localidades` (`id_localidad`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`),
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`),
  ADD CONSTRAINT `empleados_ibfk_3` FOREIGN KEY (`id_contacto`) REFERENCES `contactos` (`id_contacto`),
  ADD CONSTRAINT `empleados_ibfk_4` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`),
  ADD CONSTRAINT `empleados_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `empleados_ibfk_6` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`);

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`id_tipo_insumo`) REFERENCES `tipos_insumos` (`id_tipo_insumo`),
  ADD CONSTRAINT `insumos_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `insumos_ibfk_3` FOREIGN KEY (`id_tipo_medida`) REFERENCES `tipo_medida` (`id_tipo_medida`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_estado_pedido`) REFERENCES `estado_pedidos` (`id_estado_pedido`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_tipo_de_pedido`) REFERENCES `tipos_de_pedidos` (`id_tipo_pedido`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodo_de_pago` (`id_metodo_pago`),
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_clientes`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`id_tipo_proveedor`) REFERENCES `tipos_de_proveedores` (`id_tipo_proveedor`),
  ADD CONSTRAINT `proveedores_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);

--
-- Filtros para la tabla `stock_insumos`
--
ALTER TABLE `stock_insumos`
  ADD CONSTRAINT `fk_insumos_id_insumo` FOREIGN KEY (`id_insumo`) REFERENCES `insumos` (`id_insumo`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_tipo_medida` FOREIGN KEY (`id_tipo_medida`) REFERENCES `tipo_medida` (`id_tipo_medida`);

--
-- Filtros para la tabla `stock_productos`
--
ALTER TABLE `stock_productos`
  ADD CONSTRAINT `fk_productos_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tipos_insumos`
--
ALTER TABLE `tipos_insumos`
  ADD CONSTRAINT `fk_insumos_id_categoria_insumo` FOREIGN KEY (`id_categoria_insumo`) REFERENCES `categoria_insumos` (`id_categoria_insumos`);

--
-- Filtros para la tabla `tipo_domicilios_centro`
--
ALTER TABLE `tipo_domicilios_centro`
  ADD CONSTRAINT `tipo_domicilios_centro_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`);

--
-- Filtros para la tabla `tipo_domicilios_edificio`
--
ALTER TABLE `tipo_domicilios_edificio`
  ADD CONSTRAINT `tipo_domicilios_edificio_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`);

--
-- Filtros para la tabla `tipo_domicilio_barrio`
--
ALTER TABLE `tipo_domicilio_barrio`
  ADD CONSTRAINT `tipo_domicilio_barrio_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
