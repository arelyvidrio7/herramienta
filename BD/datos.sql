-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 02:21:46
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
-- Base de datos: `datos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_adulto`
--

CREATE TABLE `px_adulto` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `expediente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `sexo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nac` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `escolaridad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ocupacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `motivo_consulta` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico` text COLLATE utf8_unicode_ci NOT NULL,
  `enf1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enf2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enf3` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enf4` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enf5` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enf6` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enf7` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enf8` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `enf9` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `otro_problema` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `padece_enf` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `toma_med` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `medicamento` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dosis_med` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `desde_cuando` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `toma1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `toma2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `toma3` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `toma4` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cirugia` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ant1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ant2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ant3` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ant4` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ant5` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ant6` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `actividad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_ej` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia_ej` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `duracion_ej` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cuando_inicio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alcohol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tabaco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cafe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comidasxdia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `entre_comidas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `entresemana1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `entresemana2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `entresemana3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `finsemana1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `finsemana2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `finsemana3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quien_prepara` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apetito` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mas_hambre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `al_preferidos` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `al_nogustan` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `al_malestar` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alergia` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `al_alergia` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sup_com` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `suplemento` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dosis_sup` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `porq_sup` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cambio_com` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `consumo_varia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `agrega` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `grasa1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `grasa2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `grasa3` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `grasa4` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `otra_grasa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dieta_esp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cuantas_dietas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_dieta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hace_cuanto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cuanto_tiempo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `razon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apego` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `obt_resultados` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `med_bajar` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `medic_bajar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alimento1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alimento2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alimento3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alimento4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alimento5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alimento6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alimento7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alimento8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alimento9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `frecuencia9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vasos_agua` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vasos_bebidas` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dato1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato10` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato11` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato12` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato13` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato14` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato15` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato16` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato17` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato18` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato19` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato20` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato21` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato22` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato23` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato24` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato25` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato26` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato27` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dato28` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tmr` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `eta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `af` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hc1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hc2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hc3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prot1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prot2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prot3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lip1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lip2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lip3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `medicion1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medicion2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medicion3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medicion4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medicion5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medicion6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medicion7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medicion8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medicion9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor9` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `px_adulto`
--

INSERT INTO `px_adulto` (`id`, `nombre_usuario`, `fecha`, `expediente`, `nombre`, `edad`, `sexo`, `fecha_nac`, `estado_civil`, `escolaridad`, `direccion`, `ocupacion`, `telefono`, `email`, `motivo_consulta`, `diagnostico`, `enf1`, `enf2`, `enf3`, `enf4`, `enf5`, `enf6`, `enf7`, `enf8`, `enf9`, `otro_problema`, `padece_enf`, `toma_med`, `medicamento`, `dosis_med`, `desde_cuando`, `toma1`, `toma2`, `toma3`, `toma4`, `cirugia`, `ant1`, `ant2`, `ant3`, `ant4`, `ant5`, `ant6`, `actividad`, `tipo_ej`, `frecuencia_ej`, `duracion_ej`, `cuando_inicio`, `alcohol`, `tabaco`, `cafe`, `comidasxdia`, `entre_comidas`, `entresemana1`, `entresemana2`, `entresemana3`, `finsemana1`, `finsemana2`, `finsemana3`, `quien_prepara`, `apetito`, `mas_hambre`, `al_preferidos`, `al_nogustan`, `al_malestar`, `alergia`, `al_alergia`, `sup_com`, `suplemento`, `dosis_sup`, `porq_sup`, `cambio_com`, `consumo_varia`, `agrega`, `grasa1`, `grasa2`, `grasa3`, `grasa4`, `otra_grasa`, `dieta_esp`, `cuantas_dietas`, `tipo_dieta`, `hace_cuanto`, `cuanto_tiempo`, `razon`, `apego`, `obt_resultados`, `med_bajar`, `medic_bajar`, `alimento1`, `frecuencia1`, `alimento2`, `frecuencia2`, `alimento3`, `frecuencia3`, `alimento4`, `frecuencia4`, `alimento5`, `frecuencia5`, `alimento6`, `frecuencia6`, `alimento7`, `frecuencia7`, `alimento8`, `frecuencia8`, `alimento9`, `frecuencia9`, `vasos_agua`, `vasos_bebidas`, `dato1`, `dato2`, `dato3`, `dato4`, `dato5`, `dato6`, `dato7`, `dato8`, `dato9`, `dato10`, `dato11`, `dato12`, `dato13`, `dato14`, `dato15`, `dato16`, `dato17`, `dato18`, `dato19`, `dato20`, `dato21`, `dato22`, `dato23`, `dato24`, `dato25`, `dato26`, `dato27`, `dato28`, `tmr`, `eta`, `af`, `total`, `hc1`, `hc2`, `hc3`, `prot1`, `prot2`, `prot3`, `lip1`, `lip2`, `lip3`, `medicion1`, `fecha1`, `valor1`, `medicion2`, `fecha2`, `valor2`, `medicion3`, `fecha3`, `valor3`, `medicion4`, `fecha4`, `valor4`, `medicion5`, `fecha5`, `valor5`, `medicion6`, `fecha6`, `valor6`, `medicion7`, `fecha7`, `valor7`, `medicion8`, `fecha8`, `valor8`, `medicion9`, `fecha9`, `valor9`) VALUES
(1, 'prueba', '2005-11-21', '1', 'Martha Leticia López Leal', 36, 'mujer', '', 'ninguno', 'ninguna', '', '', '', '', 'nada', 'si', 'Si', 'Si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ninguna', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ninguno', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '77', '', '1.73', '', '', '', '', '', '72', '93', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'prueba', '2005-11-21', '1', 'Anai Vizcarra Guzman ', 20, 'mujer', '', 'soltero', 'universidad', '', '', '', '', 'Aumento de masa muscular, y bienestar tanto físico como mental.', 'la paciente esta en normopeso, ', 'Si', 'No', 'No', 'No', 'Si', 'No', 'No', 'No', 'No', '', '', 'No', '', '', '', 'No', 'No', 'No', 'No', '', 'Si', 'Si', 'No', 'No', 'Si', 'No', 'Muy ligera', '', '', '', '', '', '', '', '5', '2', '', '', '', '', '', '', 'su mama y ella ', 'bueno', '', '', 'coliflor, aguate, camote, pulpo,  cebolla, manzana. ', 'La leche ', '', 'pulpo y leche ', 'No', '', '', '', '', '', 'No', 'No', 'Si', 'No', 'No', '', 'si ', '1', 'hipocalorica ', '', '2 semanas ', 'para bajar de peso ', '', 'no ', 'No', '', 'embutidos ', '1 vez a la semana ', 'lácteos ', '2 veces por semana ', 'carnes rojas ', '3 veces a la semana ', 'pollo ', '3 veces ', 'huevo ', '4 veces por semana ', 'verduras ', '2 veces por semana ', 'frutas ', '3 veces por semana ', 'pescado ', '2 veces cada dos semanas ', 'cereales ', '3 veces a la semana ', '8', '5', '56.3 ', '58 ', '1.56 ', '', '', '', '', '26 cm ', '73 cm ', '100.5 cm ', '', 'normal ', '', '', '', '23.16 ', '', '34.9 ', '', '', '', '', '', '', '', '', '', '', '1223', '122', '1.2 ', '1554', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'prueba', '2007-11-21', '01', 'ANGEL VALDIVIA ', 28, 'hombre', '26 enero 1993', 'casado', 'ninguna', '', 'Carpintero', '3117463399', 'osvaldo_23@hotmail.com', 'Bajar de peso.', 'PX con Obesidad 1, se observa grasa acumulada en la parte abdominal, Brazos. piel normal', '', '', '', '', '', '', '', '', '', '', 'Migraña con aura, meñisco roto rodilla derecha', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'muy ligera', 'Bicilcleta, basquetball', 'muy poco frecuente', '', '', '1 vez c/2 meses', '', '', '4', 'Elotes , frituras,', '6', '1', '10-5-11', '', '', '', '', 'bueno', '5-6', '', 'caldo de pescado', '', 'No', '', 'Si', 'Vitaminas farmaton con ginsen', '', 'Inactividad fisica', 'No', '', 'Si', '', '', 'Si', '', 'capullo', 'no', '', '', '', '', '', '', '', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '5', '128.3', '', '1.97', '', '', '', '', '', '96', '105', '', '', '', '', '', '33.1', '71 a 96 kg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '3000', '50', '1500', '375', '25', '750', '187.5', '20', '600', '66', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'prueba', '2005-11-21', '1', 'yajaira jazmin', 26, 'mujer', '27-03-1995', 'casado', 'universidad', 'Revolución', 'ama de casa ', '(993) 363-7054', 'yajaira.jve@hotmail.com', 'bajar de peso y control de trigliceridos', 'obesidad tipo 1 segun el imc arrojado, y segun laboratorios presenta trigliceridos elevados.', 'No', 'No', 'No', 'No', 'No', 'Si', 'No', 'No', 'No', '', 'no', 'Si', 'atrovastatina', '1 diaria', '', 'No', 'No', 'No', 'Si', 'no', 'Si', 'Si', 'Si', 'Si', 'No', 'Si', 'Muy ligera', 'aerobicos', '1 vez por semana', '30 mnts', '3 meses', '', '', '', '3', 'si', '3', '1', '', '2', '1', '', 'ella misma', 'bueno', '10am', 'queso ', 'visceras', 'no', 'No', '', 'Si', 'complejo b', '1 pastilla al dia', 'indicado por el medico', 'Si', 'dejo de comer cuando estoy trizte', 'No', 'Si', 'Si', 'No', 'No', '', 'si', '1', 'baja en grasa', 'hace 2 meses', '2 meses', 'motivo de consulta', '50%', 'si', 'Si', 'orlistat', 'tacos', '2 veces por semana', 'pizza', '1 vez cada 20 dias', 'pollo', '5 veces por semana', 'pescado', '1 vez por semana', 'sandwich', '3 veces por semana', 'refresco', '1 vez cada 15 dias', 'bisteces o carnes rojas', '1 vez por semana', 'chocaben', '4 veces por semana', 'agua de frutas', '7 veces por semana', '6', '1', '82', '82', '1.62', '', '', '', '', '', '', '', '', '', '', '', '', '31.24', '57', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `px_adulto`
--
ALTER TABLE `px_adulto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `px_adulto`
--
ALTER TABLE `px_adulto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
