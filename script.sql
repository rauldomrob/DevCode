-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2023 a las 21:35:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `devcode`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feed`
--

CREATE TABLE `feed` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `path_image` varchar(400) DEFAULT NULL,
  `text` text NOT NULL,
  `likes` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `feed`
--

INSERT INTO `feed` (`id`, `name`, `path_image`, `text`, `likes`, `id_user`, `fecha_hora`) VALUES
(7, 'Problemas de código y depuración', './img-publicaciones-usuario/32/img-publicacion2.png', 'Ayuda me da un error', 0, 32, '2023-12-10 18:38:15'),
(8, 'Problemas de código y depuración', './img-publicaciones-usuario/32/img-publicacion4.png', 'Ayuda me da un error, que puedo hacer?\r\nFatal error: Uncaught mysqli_sql_exception: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use on line 23', 3000, 32, '2023-12-10 18:43:15'),
(9, 'Frameworks y Bibliotecas', './img-publicaciones-usuario/32/img-publicacion1.jpeg', 'Alguien tiene algún plugin de python para leer códigos QR? Lo necesito para poder escanearlos desde el móvil.', 100, 32, '2023-12-10 18:46:00'),
(10, 'Carrera y Desarrollo Profesional', './img-publicaciones-usuario/32/img-publicacion5.png', 'Acabo de terminar el ciclo superior de Desarrollo de Aplicaciones Web, que me recomendáis para continuar por la rama de desarrollo web', 0, 32, '2023-12-10 18:48:30'),
(11, 'Problemas de código y depuración', './img-publicaciones-usuario/32/img-publicacion6.png', 'Cómo puedo hacer para enviar un formulario sin necesidad de un boton submit, solamente pulsando la tecla Enter', 0, 32, '2023-12-10 18:49:55'),
(12, 'Nuevas tecnologías', './img-publicaciones-usuario/32/img-publicacion7.png', 'Hola a todos soy nuevo en DevCode', 0, 32, '2023-12-10 18:50:55'),
(13, 'Desarrollo Frontend', './img-publicaciones-usuario/32/img-publicacion8.png', 'Como me puedo empezar en el desarrollo FrontEnd?', 0, 32, '2023-12-10 18:51:41'),
(15, 'Desarrollo de Aplicaciones Móviles', './img-publicaciones-usuario/32/img-publicacion10.png', 'No me abre WhatsApp AYUDAAAAAAAAAAAAA', 5000, 32, '2023-12-10 18:53:49'),
(16, 'Carrera y Desarrollo Profesional', './img-publicaciones-usuario/32/img-publicacion2.jpeg', 'Acabo de terminar una carrera en desarrollo de software y no encuentro trabajo, algún consejo??', 0, 32, '2023-12-10 18:55:20'),
(17, 'Herramientas y Entorno de Desarrollo', './img-publicaciones-usuario/32/img-publicacion11.png', 'No me funciona NetBeans, tengo la versión 12.4 y se me cierra a los 10 minutos de abrirlo.', 300, 32, '2023-12-10 18:58:01'),
(18, 'Carrera y Desarrollo Profesional', './img-publicaciones-usuario/32/img-publicacion3.jpeg', 'Estoy cansado de estudiar, tendría que haber estudiado magisterio', 0, 32, '2023-12-10 18:58:38'),
(19, 'Nuevas tecnologías', './img-publicaciones-usuario/33/img-publicacion1.png', 'No me va la foto de perfil', 0, 33, '2023-12-10 21:00:07'),
(20, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(21, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(22, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(23, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(24, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(25, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(26, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(27, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(28, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(29, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(30, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(31, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(32, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(33, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(34, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(35, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(36, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(37, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(38, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(39, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(40, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(41, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(42, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(43, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(44, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(45, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(46, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(47, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(48, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(49, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(50, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(51, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(52, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(53, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(54, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(55, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(56, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(57, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(58, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(59, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(60, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(61, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(62, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(63, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(64, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(65, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(66, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(67, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(68, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(69, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(70, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(71, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(72, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(73, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(74, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(75, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(76, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(77, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(78, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(79, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(80, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(81, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(82, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(83, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(84, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(85, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(86, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(87, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(88, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(89, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(90, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(91, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(92, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(93, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(94, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(95, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(96, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(97, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(98, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(99, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(100, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(101, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(102, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(103, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(104, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(105, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(106, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(107, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(108, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(109, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(110, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(111, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(112, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(113, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(114, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(115, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(116, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(117, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(118, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(119, 'Desarrollo Frontend', './img-publicaciones-usuario/34/img-publicacion1.jpeg', 'Esto es una publicación de prueba (simula ser una publicación realizada por un usuario diferentes veces). No se trata de una publicación real.', 0, 34, '2023-12-10 21:12:13'),
(120, 'Desarrollo Backend', './img-publicaciones-usuario/34/img-publicacion1.png', 'No me va este código, ayuda.', 0, 34, '2023-12-10 21:16:20'),
(121, 'Nuevas tecnologías', './img-publicaciones-usuario/33/img-publicacion1.jpeg', 'No me abre instagram. AYUDAAAAAAAAAAAA', 22, 33, '2023-12-10 21:17:11'),
(122, 'Desarrollo Ágil y Metodologías', './img-publicaciones-usuario/33/img-publicacion2.png', 'Soy Scrum Master pero no se como dirigir a mi equipo, algún consejo?? ', 1000, 33, '2023-12-10 21:18:41'),
(123, 'Carrera y Desarrollo Profesional', './img-publicaciones-usuario/33/img-publicacion3.png', 'Me gustaría aprender más sobre DAM', 0, 33, '2023-12-10 21:19:12'),
(124, 'Problemas de código y depuración', './img-publicaciones-usuario/32/img-publicacion12.png', '@Raul me cae muy mal, me cambia todo el rato el código y no lo comenta, encima non avisa de que lo hace 😡🤬', 25, 32, '2023-12-10 21:21:11'),
(125, 'Desarrollo Backend', './img-publicaciones-usuario/32/img-publicacion13.png', 'Cocinando código 💻🖱️🌯', 2000, 32, '2023-12-10 21:23:23'),
(126, 'Desarrollo Ágil y Metodologías', './img-publicaciones-usuario/33/img-publicacion4.png', '@Rares me caes muy mal, siempre me la lías con los commits 👺👺🤯😡', 26, 33, '2023-12-10 21:25:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_feed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias`
--

CREATE TABLE `sugerencias` (
  `id` int(11) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `sugerencia` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sugerencias`
--

INSERT INTO `sugerencias` (`id`, `asunto`, `sugerencia`) VALUES
(1, 'Comunidades', '¿Por qué se han deshabilitado las comunidades?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `id_feed` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `threads`
--

INSERT INTO `threads` (`id`, `text`, `id_feed`, `id_user`) VALUES
(7, 'Te falta un \"WHERE\" en la línea 27, donde la consulta.', 8, 33),
(8, 'También te falta otro \"WHERE\" en la línea 32 antes de id', 8, 33),
(9, 'Tu me caes peor, no paras de encontrar bugs', 124, 33),
(10, 'Callate que no sabes ni centrar un div ', 126, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `birth` date NOT NULL,
  `pass_question` varchar(50) NOT NULL,
  `pass_answer` varchar(50) NOT NULL,
  `followers` int(11) NOT NULL,
  `follows` int(11) NOT NULL,
  `path_img_profile` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `name`, `surname`, `user_name`, `password`, `email`, `phone`, `birth`, `pass_question`, `pass_answer`, `followers`, `follows`, `path_img_profile`) VALUES
(32, 'Rares Andrei', 'Ana', 'Rares', 'Contra123', 'rares@gmail.com', 123456789, '2003-11-17', '¿Cuál es tu comida favorita?', 'Pizza', 0, 0, './img-users/carpeta32/foto-perfil32.jpeg'),
(33, 'Raúl', 'Dominguez Robles', 'Raul', 'Contra123', 'raul@gmail.com', 123123123, '2004-05-20', '¿Cómo se llama la escuela en la que estudiaste?', 'Fuenlabrada', 0, 0, './img-users/carpeta33/foto-perfil33.jpeg'),
(34, 'Usuario', 'Prueba', 'Usuario', 'Usuario123', 'usuario@gmail.com', 123412345, '2000-11-11', '¿Cuál es tu comida favorita?', 'Pasta', 0, 0, './img-users/foto-perfil-predeterminada.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sugerencias`
--
ALTER TABLE `sugerencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_feed` (`id_feed`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sugerencias`
--
ALTER TABLE `sugerencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `feed`
--
ALTER TABLE `feed`
  ADD CONSTRAINT `feed_user` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_feed` FOREIGN KEY (`id_feed`) REFERENCES `feed` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threads_user` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
