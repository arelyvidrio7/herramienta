-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 02:21:14
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `percentiles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adultom_hombre`
--

CREATE TABLE `adultom_hombre` (
  `grupo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `edad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p1_5` decimal(10,1) NOT NULL,
  `p1_10` decimal(10,1) NOT NULL,
  `p1_25` decimal(10,1) NOT NULL,
  `p1_50` decimal(10,1) NOT NULL,
  `p1_75` decimal(10,1) NOT NULL,
  `p1_90` decimal(10,1) NOT NULL,
  `p1_95` decimal(10,1) NOT NULL,
  `p2_5` decimal(10,1) NOT NULL,
  `p2_10` decimal(10,1) NOT NULL,
  `p2_25` decimal(10,1) NOT NULL,
  `p2_50` decimal(10,1) NOT NULL,
  `p2_75` decimal(10,1) NOT NULL,
  `p2_90` decimal(10,1) NOT NULL,
  `p2_95` decimal(10,1) NOT NULL,
  `p3_5` decimal(10,1) NOT NULL,
  `p3_10` decimal(10,1) NOT NULL,
  `p3_25` decimal(10,1) NOT NULL,
  `p3_50` decimal(10,1) NOT NULL,
  `p3_75` decimal(10,1) NOT NULL,
  `p3_90` decimal(10,1) NOT NULL,
  `p3_95` decimal(10,1) NOT NULL,
  `p4_5` decimal(10,1) NOT NULL,
  `p4_10` decimal(10,1) NOT NULL,
  `p4_25` decimal(10,1) NOT NULL,
  `p4_50` decimal(10,1) NOT NULL,
  `p4_75` decimal(10,1) NOT NULL,
  `p4_90` decimal(10,1) NOT NULL,
  `p4_95` decimal(10,1) NOT NULL,
  `p5_5` decimal(10,1) NOT NULL,
  `p5_10` decimal(10,1) NOT NULL,
  `p5_25` decimal(10,1) NOT NULL,
  `p5_50` decimal(10,1) NOT NULL,
  `p5_75` decimal(10,1) NOT NULL,
  `p5_90` decimal(10,1) NOT NULL,
  `p5_95` decimal(10,1) NOT NULL,
  `p6_5` decimal(10,1) NOT NULL,
  `p6_10` decimal(10,1) NOT NULL,
  `p6_25` decimal(10,1) NOT NULL,
  `p6_50` decimal(10,1) NOT NULL,
  `p6_75` decimal(10,1) NOT NULL,
  `p6_90` decimal(10,1) NOT NULL,
  `p6_95` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `adultom_hombre`
--

INSERT INTO `adultom_hombre` (`grupo`, `edad`, `p1_5`, `p1_10`, `p1_25`, `p1_50`, `p1_75`, `p1_90`, `p1_95`, `p2_5`, `p2_10`, `p2_25`, `p2_50`, `p2_75`, `p2_90`, `p2_95`, `p3_5`, `p3_10`, `p3_25`, `p3_50`, `p3_75`, `p3_90`, `p3_95`, `p4_5`, `p4_10`, `p4_25`, `p4_50`, `p4_75`, `p4_90`, `p4_95`, `p5_5`, `p5_10`, `p5_25`, `p5_50`, `p5_75`, `p5_90`, `p5_95`, `p6_5`, `p6_10`, `p6_25`, `p6_50`, `p6_75`, `p6_90`, `p6_95`) VALUES
('num0', '<60', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0'),
('num1', '60-64', '153.0', '155.8', '159.3', '162.8', '167.0', '171.4', '173.6', '55.8', '59.8', '63.8', '70.6', '77.4', '83.0', '87.4', '21.8', '22.6', '24.5', '26.5', '28.6', '30.7', '31.7', '25.0', '26.1', '27.5', '29.6', '31.4', '33.0', '34.0', '27.1', '30.2', '35.7', '42.9', '49.3', '56.6', '62.6', '81.5', '85.0', '90.0', '95.0', '100.0', '105.5', '108.5'),
('num2', '65-69', '152.1', '156.0', '159.2', '164.2', '167.9', '172.6', '174.4', '52.4', '55.6', '61.8', '70.4', '76.6', '88.0', '93.2', '20.4', '21.0', '23.4', '25.7', '28.2', '31.3', '32.5', '24.3', '25.0', '26.3', '28.6', '30.6', '32.6', '34.5', '23.4', '27.4', '31.4', '38.2', '45.5', '55.4', '64.5', '79.5', '82.0', '88.2', '94.7', '100.0', '106.8', '110.0'),
('num3', '70-74', '152.2', '154.0', '157.9', '161.7', '167.2', '171.0', '173.0', '51.6', '57.0', '61.2', '67.6', '74.2', '86.2', '88.8', '21.5', '22.0', '24.0', '25.9', '27.8', '30.7', '30.8', '23.7', '24.2', '27.0', '28.5', '30.2', '32.2', '33.0', '22.2', '25.8', '31.8', '37.9', '43.7', '47.7', '54.3', '81.0', '83.0', '89.3', '93.0', '96.7', '103.0', '108.0'),
('num4', '74-79', '154.0', '156.8', '159.2', '163.0', '166.7', '168.5', '172.0', '48.0', '56.6', '61.4', '65.4', '72.8', '79.0', '92.0', '19.5', '21.1', '23.0', '25.3', '27.5', '29.5', '32.4', '23.4', '24.0', '25.8', '28.6', '29.9', '32.1', '33.4', '20.4', '23.4', '28.0', '35.9', '43.6', '48.5', '55.3', '78.7', '80.0', '87.9', '92.0', '97.3', '103.0', '106.0'),
('num5', '80+', '152.3', '153.8', '157.7', '162.0', '165.0', '167.6', '170.8', '52.6', '53.8', '58.6', '65.4', '73.4', '84.0', '87.0', '21.6', '21.8', '24.0', '25.3', '27.4', '30.3', '31.1', '24.7', '25.0', '25.9', '27.5', '28.5', '31.0', '32.0', '24.8', '25.9', '28.2', '33.1', '41.2', '50.4', '56.3', '84.5', '86.0', '89.3', '92.0', '103.0', '107.5', '107.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adultom_mujer`
--

CREATE TABLE `adultom_mujer` (
  `grupo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `edad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p1_5` decimal(10,1) NOT NULL,
  `p1_10` decimal(10,1) NOT NULL,
  `p1_25` decimal(10,1) NOT NULL,
  `p1_50` decimal(10,1) NOT NULL,
  `p1_75` decimal(10,1) NOT NULL,
  `p1_90` decimal(10,1) NOT NULL,
  `p1_95` decimal(10,1) NOT NULL,
  `p2_5` decimal(10,1) NOT NULL,
  `p2_10` decimal(10,1) NOT NULL,
  `p2_25` decimal(10,1) NOT NULL,
  `p2_50` decimal(10,1) NOT NULL,
  `p2_75` decimal(10,1) NOT NULL,
  `p2_90` decimal(10,1) NOT NULL,
  `p2_95` decimal(10,1) NOT NULL,
  `p3_5` decimal(10,1) NOT NULL,
  `p3_10` decimal(10,1) NOT NULL,
  `p3_25` decimal(10,1) NOT NULL,
  `p3_50` decimal(10,1) NOT NULL,
  `p3_75` decimal(10,1) NOT NULL,
  `p3_90` decimal(10,1) NOT NULL,
  `p3_95` decimal(10,1) NOT NULL,
  `p4_5` decimal(10,1) NOT NULL,
  `p4_10` decimal(10,1) NOT NULL,
  `p4_25` decimal(10,1) NOT NULL,
  `p4_50` decimal(10,1) NOT NULL,
  `p4_75` decimal(10,1) NOT NULL,
  `p4_90` decimal(10,1) NOT NULL,
  `p4_95` decimal(10,1) NOT NULL,
  `p5_5` decimal(10,1) NOT NULL,
  `p5_10` decimal(10,1) NOT NULL,
  `p5_25` decimal(10,1) NOT NULL,
  `p5_50` decimal(10,1) NOT NULL,
  `p5_75` decimal(10,1) NOT NULL,
  `p5_90` decimal(10,1) NOT NULL,
  `p5_95` decimal(10,1) NOT NULL,
  `p6_5` decimal(10,1) NOT NULL,
  `p6_10` decimal(10,1) NOT NULL,
  `p6_25` decimal(10,1) NOT NULL,
  `p6_50` decimal(10,1) NOT NULL,
  `p6_75` decimal(10,1) NOT NULL,
  `p6_90` decimal(10,1) NOT NULL,
  `p6_95` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `adultom_mujer`
--

INSERT INTO `adultom_mujer` (`grupo`, `edad`, `p1_5`, `p1_10`, `p1_25`, `p1_50`, `p1_75`, `p1_90`, `p1_95`, `p2_5`, `p2_10`, `p2_25`, `p2_50`, `p2_75`, `p2_90`, `p2_95`, `p3_5`, `p3_10`, `p3_25`, `p3_50`, `p3_75`, `p3_90`, `p3_95`, `p4_5`, `p4_10`, `p4_25`, `p4_50`, `p4_75`, `p4_90`, `p4_95`, `p5_5`, `p5_10`, `p5_25`, `p5_50`, `p5_75`, `p5_90`, `p5_95`, `p6_5`, `p6_10`, `p6_25`, `p6_50`, `p6_75`, `p6_90`, `p6_95`) VALUES
('num0', '<60', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0'),
('num1', '60-64', '142.0', '145.0', '147.4', '151.4', '155.0', '158.5', '160.5', '49.6', '52.0', '57.8', '64.2', '72.0', '78.6', '85.0', '21.8', '23.6', '25.7', '27.9', '30.8', '34.2', '36.4', '24.8', '26.2', '28.0', '30.5', '33.4', '35.5', '37.0', '21.8', '25.3', '31.6', '40.9', '52.8', '62.8', '69.4', '76.0', '79.5', '83.5', '89.0', '96.4', '103.5', '109.5'),
('num2', '65-69', '140.6', '141.7', '144.9', '149.0', '153.7', '157.2', '159.9', '46.8', '49.2', '54.2', '59.6', '68.4', '74.8', '80.6', '20.6', '22.8', '24.2', '27.1', '29.9', '32.8', '34.6', '24.5', '25.0', '26.5', '29.2', '31.6', '34.0', '35.6', '20.3', '22.7', '29.4', '37.7', '49.1', '58.3', '64.7', '71.9', '75.5', '82.2', '91.0', '97.4', '102.5', '109.1'),
('num3', '70-74', '139.9', '142.4', '145.0', '148.3', '152.4', '156.4', '158.0', '47.6', '49.0', '52.8', '58.9', '64.6', '68.2', '71.4', '21.5', '21.9', '24.6', '26.6', '28.8', '30.1', '33.2', '24.0', '24.6', '26.0', '28.6', '31.4', '33.9', '35.0', '20.3', '21.5', '25.3', '34.2', '45.0', '55.7', '64.0', '74.5', '78.0', '83.0', '87.5', '94.4', '101.5', '106.0'),
('num4', '74-79', '135.3', '141.2', '144.0', '148.3', '150.7', '153.9', '157.8', '43.4', '45.4', '51.2', '57.2', '62.4', '68.0', '73.8', '20.5', '21.8', '24.2', '26.4', '28.2', '30.2', '31.7', '22.5', '24.0', '26.6', '28.5', '30.8', '33.7', '35.0', '17.3', '20.3', '27.2', '35.9', '47.3', '55.7', '61.7', '69.2', '72.0', '82.4', '88.0', '97.0', '102.5', '106.4'),
('num5', '80+', '137.0', '137.7', '140.5', '146.6', '149.9', '157.2', '159.5', '37.8', '38.9', '47.8', '57.3', '63.2', '67.9', '70.8', '17.8', '19.4', '22.0', '26.0', '29.3', '32.7', '33.4', '19.8', '20.6', '25.2', '27.0', '29.4', '32.5', '33.7', '14.2', '15.1', '22.0', '28.7', '40.7', '49.1', '53.9', '70.0', '75.8', '82.5', '91.5', '99.0', '104.0', '105.5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
