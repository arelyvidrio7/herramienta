-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 02:20:29
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
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardar_menus`
--

CREATE TABLE `guardar_menus` (
  `id` int(11) NOT NULL,
  `n_usuario` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_menu` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `desayuno_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion1_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `comida_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion2_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `cena_lunes` text COLLATE utf8_unicode_ci NOT NULL,
  `desayuno_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion1_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `comida_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion2_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `cena_martes` text COLLATE utf8_unicode_ci NOT NULL,
  `desayuno_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion1_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `comida_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion2_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `cena_miercoles` text COLLATE utf8_unicode_ci NOT NULL,
  `desayuno_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion1_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `comida_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion2_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `cena_jueves` text COLLATE utf8_unicode_ci NOT NULL,
  `desayuno_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion1_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `comida_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion2_viernes` text COLLATE utf8_unicode_ci NOT NULL,
  `cena_viernes` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `desayuno_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion1_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `comida_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion2_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `cena_sabado` text COLLATE utf8_unicode_ci NOT NULL,
  `desayuno_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion1_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `comida_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `colacion2_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `cena_domingo` text COLLATE utf8_unicode_ci NOT NULL,
  `equivalentes` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `guardar_menus`
--

INSERT INTO `guardar_menus` (`id`, `n_usuario`, `nombre_menu`, `descripcion`, `fecha`, `desayuno_lunes`, `colacion1_lunes`, `comida_lunes`, `colacion2_lunes`, `cena_lunes`, `desayuno_martes`, `colacion1_martes`, `comida_martes`, `colacion2_martes`, `cena_martes`, `desayuno_miercoles`, `colacion1_miercoles`, `comida_miercoles`, `colacion2_miercoles`, `cena_miercoles`, `desayuno_jueves`, `colacion1_jueves`, `comida_jueves`, `colacion2_jueves`, `cena_jueves`, `desayuno_viernes`, `colacion1_viernes`, `comida_viernes`, `colacion2_viernes`, `cena_viernes`, `desayuno_sabado`, `colacion1_sabado`, `comida_sabado`, `colacion2_sabado`, `cena_sabado`, `desayuno_domingo`, `colacion1_domingo`, `comida_domingo`, `colacion2_domingo`, `cena_domingo`, `equivalentes`) VALUES
(1, 'arelyvg', 'dieta', '                dieta', '2022-04-02', ' sandía picada 2 tza,                           ', '               ', '                              ', '               ', '                              ', '                              ', '               ', '                              ', '               ', ' aguacate hass  2/3 pza, sandía picada 1 tza, masa para tortillas 22 1/2 g,                     ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza, ', 'Fruta con yoghurt: pera 0.5 pza, manzana 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza,  ', 'Fruta con yoghurt: pera 0.5 pza, manzana 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza, ', 'Fruta con yoghurt: pera 0.5 pza, manzana 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza,  ', 'Fruta con yoghurt: pera 0.5 pza, manzana 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza, ', 'Fruta con yoghurt: pera 0.5 pza, manzana 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza,  ', 'Fruta con yoghurt: pera 0.5 pza, manzana 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza, ', 'Fruta con yoghurt: pera 0.5 pza, manzana 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza,  ', 'Fruta con yoghurt: pera 0.5 pza, manzana 1 pza,  ', 'Sandwuish de pollo: pan de caja 2 rebanada, mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza, jitomate bola 1 pza,  ', 'mayonesa 3 ctda, pollo sin piel cocido 60 g, lechuga 1.5 tza,', ' ', '', ' ', '', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(2, 'arelyvg', 'mi menu', 'este', '2022-01-12', 'si acelga cruda 0.0 tza,                           ', '               ', '                              ', '               ', '                              ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(3, 'arelyvg', 'menu nuevo', '', '2022-03-11', ' manzana 2 pza,                           ', '               ', '                              ', '               ', '                              ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(4, 'arelyvg', 'jiji', '', '2022-03-12', '                              ', '               ', '                              ', '               ', '                              ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1200,15,30,55,7,6,6,,1,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(6, 'arelyvg', 'menu', '', '2022-03-18', ' masa para tortillas 90 g, aceite 3 ctda,                        ', '               ', ' sandía picada 1 tza,                           ', '               ', '                              ', ' masa para tortillas 90 g, aceite 3 ctda,                        ', '               ', '                              ', '               ', '                              ', ' masa para tortillas 90 g, aceite 3 ctda,                        ', '               ', '                              ', '               ', '                              ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(7, 'prueba', 'Menu Dayane', '                                               este menú                 ', '2022-05-18', 'Huevos: Huevo entero fresco 2 pza, Zanahoria picada cruda 0.50 tza, aceite 2 ctda, ', ' ', 'Ensalada de nopal y queso panela: queso panela 120 g, nopal cocido 1 tza, jitomate bola 3/4 pza, cilantro picado 1/2 tza, chile cuaresmeño 1 pza, cebolla blanca 1/4 tza, aguacate hass 2/3 pza, tostada de maiz 3 pzas. Extra: Pera 1 pza,   ', ' ', ' Huevos: Huevo entero fresco 2 pza, Zanahoria picada cruda 0.50 tza, aceite 2 ctda, ', ' ', ' ', ' ', ' ', ' ', 'huevos Huevo entero fresco 2 pza, Zanahoria picada cruda 0.50 tza, aceite 2 ctda, ', '               ', 'Ensalada de nopal y queso panela: queso panela 120 g, nopal cocido 1 tza, jitomate bola 3/4 pza, cilantro picado 1/2 tza, chile cuaresmeño 1 pza, cebolla blanca 1/4 tza, aguacate hass 2/3 pza, tostada de maiz 3 pzas. Extra: Pera 1 pza,   ', '               ', 'Tacos de carne asada: arrachera cruda 105 g, tortilla de maíz 2 pzas, tortilla de harina 1 pza, guacamole 4 cdas, salsa de chile 1/2 tza, rábano rebanado 1/2 tza, pepino rebanado 1/2 tza. Extra: Manzana 1 pza,      ', 'Sandwuish de jamón: pan blanco 2 rebanadas, mayonesa 1 ctda, jamón de pavo 4 rebanadas, lechuga 3/4 tza, jitomate bola 1/4 pza, cebolla blanca 1/4 tza, aguacate hass 1/3 pza. Licuado: leche 1 tza, plátano 1 pza, galleta María 5 pza.                        ', '              ', 'Pollo en jugo V8: milanesa de pollo 90 g, jitomate bola 1/2 pza, cebolla blanca 1/4 tza, chile anahaim 1/2 pza, jugo de verduras 1/2 tza, zanahoria picada 1/4 tza, cilantro picado 1/2 tza, papa 1/2 pza, aceite 2 ctdas, tortilla de maíz 2 pzas. Extra: Papaya picada 2 tzas.', '               ', 'Quesadillas: tortilla de maíz 3 pzas, queso Mozzarella reducido en grasa 3 rebanadas, guacamole 4 cda, jitomate bola 1 pza, cebolla blanca 1/4 tza, chile jalapeño 1 1/2 pza, cilantro picado 1/2 tza. Extra: Naranja 2 pzas.    ', 'Enchiladas de pollo: tortilla de maíz 3 pzas, puré de tomate enlatado 1/4 tza, aceite 1 1/2 ctda, media crema 1 cda, fajita de pollo 60 g, queso fresco 40 g. Extra: Pera 1 pza, yoghurt lala batido 1 pza.    ', '               ', 'Camarones salteados con verdura: camarón mediano 18 pzas, jitomate bola 1/2 pza, cebolla blanca 1/4 tza, chile anahaim 1/2 pza, calabacita alargada 1/4 pza, brócoli 1/2 tza, zanahoria picada 1/2 tza, aceite 2 ctda, arroz cocido 1/2 tza. Extra: Jugo de toronja natural 1 tza. ', '               ', 'Ejotes con queso: ejotes cocidos 1/2 tza, jitomate bola 1/2 pza, cebolla blanca 1/4 tza, queso Mozzarella reducido en grasa 3 rebanadas, aceite 2 ctda, arroz cocido 3/4 tza,. Extra: Papaya picada 1 tza.    ', 'Chilaquiles con huevo: totopos de maíz 75 g, salsa de chile 1/2 tza, media crema 2 cdas, aguacate hass 1/3 pza, huevo 1 pza, queso fresco 40 g. Licuado: Leche 1 tza, manzana 1 pza.    ', '               ', 'Bistek con papas y verdura: bistec de res 90 g, jitomate bola 1 pza, cebolla blanca 1/4 tza, chile poblano 1/4 pza, papa cocida 1/2 pza, zanahoria picada 1/2 tza, aceite 2 ctda, tortilla de maíz 1 pza. Extra: Pera 1 pza.  ', '               ', 'Banderillas de salchicha: salchicha de pavo 2 pzas, huevo 1 pza, pan molido 8 cdtas, aceite 2 ctdas. Extra: Pepino rebanado 1 tza, jícama picada 1/2 tza, papaya picada 1 tza, galleta María 10 pzas.', 'Huevo con jamón: huevo 1 pza, jamón de pavo 2 rebanadas, aceite 2 ctdas, salsa de chile 1/2 tza, tortilla de maíz 2 pzas. Fruta con yoghurt: Plátano 1 pza, yoghurt natural 1 tza, granola 3 cdas.!', '              ', 'Tacos de chamberete: tortilla de maíz 2 pzas, chamberete de res 105 g, guacamole 4 cdas, lechuga 3/4 tza, salsa de chile 1/4 tza, pepino  rebanado 1/4 tza. Extra: Jícama picada 1 tza, pera 1 pza. ', '               ', 'Pasta con salchicha y queso parmesano: espagueti cocido 1 tza, mantequilla 3/4 ctda, mayonesa 1 ctda, media crema 1 cda, salchicha de pavo 2 pzas, queso parmesano 3 1/2 cdas. Jugo: naranja 2 pzas, zanahoria picada 1/2 tza, manzana 1 pza. ', '2000,20,30,50,6,5,8,,,3,2,3,,,,1,,6,,,,,,,,,,,,1,,3,,2,2,,2,,1,3,,2,,3,,,,,,,,,,,,,3,,,2,,,,,,,,,3,,,,,,,,,,,,,,,,1,,,,,,,,,,2,,2,,2,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(8, 'prueba', 'Menú 1800 kcal', '                                                                                                                                        Dayane', '2022-06-03', 'Huevo con calabacita rallada: huevo 2 pzas, calabacita redonda 2 pzas, aceite 2 ctdas, tortilla 3 pzas, leche entera 1 tza, plátano 1 pza, azúcar 2 ctdas.', '               ', 'Chuleta ahumada: 1 1/2 pza, puré de papa 1 tza. Verduras a la mantequilla: zanahoria picada 1/2 tza, brócoli 1/2 tza, calabacita redonda 1/2 pza, ejotes 1/2 tza, mantequilla 3 ctdas, jugo de toronja natural 1 tza, nuez en mitades 7.  ', '               ', 'Espagueti a la boloñesa: espagueti cocido 2/3 tza, mantequilla 1 1/2 ctda, carne molida de cerdo 80 g, jitomate bola 1/4 pza, cebolla blanca 1/4 tza, chile poblano 1/4 pza, puré de tomate 1/4 tza, aceite 1 ctda, mango picado 1 tza.', 'Sandwuish de pollo: pan integral 2 rebanadas, mayonesa 1 ctda, milanesa de pollo 60 g, lechuga 1 1/2 tza, jitomate bola 1 pza, aguacate hass 1/3 pza, cebolla morada 1/4 tza, fresas congeladas s/azúcar 1 tza, leche entera 1 tza, azúcar 2 ctda, galletas marías 5 pzas.', '', 'Espagueti con camarones con crema de chipotle: espagueti cocido 2/3 tza, mantequilla 3/4 ctda, media crema 4 cda, cebolla blanca 1/2 tza, chile chipotle 2 pzas, camarón  mediano 18 pzas. Pepino rebanado 1 tza, almendra 10 pza, pera 1 pza. ', '', 'Quesadillas: tortilla 2 pzas, queso Oaxaca Lala Light 60 g, flor de calabaza cocida 1 tza, aguacate hass 2/3 pza, pepino rebanado 1 tza, fresa rebanada 1 tza,            ', 'Avena con fruta: avena en hojuelas 1/2 tza, leche entera 1 tza, agua 1 tza, azúcar 2 ctdas, fresa rebanada 1 tza, plátano 1/2 pza, pan tostado 2 rebanadas, queso cottage 6 cdas, aguacate hass 2/3 pza, pepino rebanado 1 tza, jitomate bola 1 pza.', '', 'Tostadas: falda de res 105 g, tostada horneada 3 pzas, lechuga 3 tzas, jitomate bola 1/2 pza, pepino rebanado 1/2 tza, aguacate hass 1/3 pza, cebolla morada 1/2 tza, media crema 2 cdas, manzana verde 1 pza, nuez en mitades 7. (caldo de carne libre)', '', 'Hamburguesa con pan de lechuga: carne molida de cerdo 80 g, huevo 1 pza, pan molido 8 cdtas, lechuga 1 1/2 tza, jitomate bola 1 pza, mayonesa 1 ctda, aguacate hass 1/3 pza, cebolla morada 1/4 tza, papaya picada 1 tza, galleta María 5 pzas,', 'Sandwuish de requesón: pan integral 2 rebanadas, mayonesa 1 ctda, requesón 6 cdas, pepino rebanado 1/2 tza, jitomate bola 1/2 pza, aguacate hass 1/3 pza, cebolla morada 1/4 tza, mango congelado s/azúcar 1 tza, leche entera 1 tza, azúcar 2 ctdas, galletas marías 5 pzas.', '', 'Pollo con chile a la crema: milanesa de pollo 120 g, cebolla blanca 1/4 tza, chile poblano 1 pza, granos de elote 1 cda, aceite 1 ctda, media crema 2 cdas, tortilla 2 pzas, plátano 1 pza, cacahuate japonés 15 pzas.', '', 'Calabacita rellena: calabacita alargada 1 pza, salsa de tomate 1/2 tza, aceite 2 ctdas, queso panela 80 g, arroz cocido 1/2 tza, manzana picada 1/2 tza.           ', 'Omelette de espinaca: huevo 2 pzas, espinaca picada 1 tza, cebolla blanca 1/2 tza, aceite 2 ctdas, salsa de chile 1/4 tza, pan birote 1 pza. fresas congeladas s/azúcar 1 tza, leche entera 1 tza, azúcar 2 ctdas,      ', '               ', 'Pechugas rellenas: milanesa de pollo 80 g, espinaca 1/2 tza, queso amarillo 2 rebanadas. Ratatouille: berenjena rebanada 1/4 tza, calabacita rebanada 1/4 pza, jitomate bola rebanada 1 pza. Para la salsa: jitomate bola 1/2 pza, cebolla blanca 1/4 tza, pimiento rojo 1/4 pza, aceite 2 ctdas, (agregar tomillo, laurel y albahaca), puré de papa 1 tza, plátano 1 pza, nuez en mitades 7.', '               ', 'Enchiladas: tortilla 2 pzas, aceite 2 ctdas, puré de tomate 1/4 tza, jitomate bola 1/2 pza, cebolla blanca 1/4 tza, queso fresco 80 g, pera 1/2 pza.       ', 'Avena con fruta: avena en hojuelas 1/2 tza, leche entera 1 tza, agua 1 tza, azúcar 2 ctdas, plátano 1 pza, pan tostado 2 rebanadas, queso cottage 6 cdas, aguacate hass 2/3 pza, pepino rebanado 1 tza, jitomate bola 1 pza.', '', 'Caldo de pollo: milanesa de pollo 120 g, cebolla blanca 1/4 tza, chile poblano 1/4 pza, zanahoria picada 1/2 tza, calabacita redonda 1 pza, papa 1/2 pza, aceite 2 ctdas, tortilla 1 pza, manzana verde 1 pza, almendra 10 pzas.', '', 'Tacos de carne asada: arrachera cruda 70 g, tortilla 2 pzas, guacamole 4 cdas, salsa de chile 1/2 tza, rábano rebanado 1/2 tza, pepino rebanado 1/2 tza. Extra: papaya picada 1 tza.                     ', 'Huevos a la plancha: huevo 2 pzas, aceite 2 ctdas, tortilla 2 pzas, salsa de chile 1/2 tza. Fruta con yoghurt: manzana roja 1 pza, plátano 1/2 pza, yoghurt natural  1 tza, granola 3 cdas, lecherita 2 ctdas. Pepino rebanado 1 tza', '', 'Nopales con carne: bistec de res 90 g, nopal 2 pzas, cebolla blanca 1/4 tza, jitomate bola 1/4 pza, chile poblano 1/8 pza, puré de tomate 1/4 tza, aceite 2 ctdas,  (agregar agua al gusto), arroz cocido 1/2 tza, pera 1 pza, almendra 10 pzas.', '', 'Caldo de queso panela: queso panela 80 g, jitomate bola 1/4 pza, cebolla blanca 1/4 tza, cilantro picado 1/4 tza, chile anahaim 1/4 pza, puré de tomate 1/4 tza, aceite 2 ctdas, papa  1/2 pza, tortilla 1 pza. (Agregar agua al gusto y un chorrito de leche) mango picado 1 tza.', '1800,20,30,50,7,5,7,,,5,2,,,,,1,,6,1,1,,,,,,,,,,2,,3,,2,2,,2,,1,3,,2,,2,,,,,,,,,,,2,,3,,,,,,,2,,,,,,,,,,,,,,,,,,,,,1,,,,,,,,,,2,,2,,2,,,1,,,1,,,,,,,,,,,,,,,,,,,,,,,,,'),
(9, 'prueba', 'Menu hoy', 'Ejemplo', '2022-08-23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'huevito Huevo entero fresco 2 pza, aceite 1 ctda, Manzana 1.50 pza, ', '', ' ', ' ', ' ', '', '', '', '', '', '', '', '', '', '', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(10, 'prueba', 'Menu hoy', 'Ejemplo', '2022-08-23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'huevito Huevo entero fresco 2 pza, aceite 1 ctda, Manzana 1.50 pza, ', '', ' ', ' ', ' ', '', '', '', '', '', '', '', '', '', '', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(11, 'prueba', 'dieta hoy', 'ejemplo', '2022-08-23', '', '', '', '', '', ' Manzana 2 pza, Mayonesa 1 ctda, ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1200,20,30,50,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,'),
(12, 'prueba', 'dieta', 'menu bonito', '2022-08-25', ' Plátano 1 pza, Acelga cruda 2 tza, Chile en escabeche 225 g, chile en polvo 3 pza, ', ' ', ' ', ' ', ' ', ' Plátano 1 pza, Acelga cruda 2 tza, Chile en escabeche 225 g, chile en polvo 3 pza, ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `guardar_menus`
--
ALTER TABLE `guardar_menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `guardar_menus`
--
ALTER TABLE `guardar_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
