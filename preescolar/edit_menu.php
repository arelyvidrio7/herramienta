<?php
session_start();
$_SESSION['nombre_usuario'];

include 'navbar.php';
//Obteniendo las listas de alimentos
include '../conex/tag.php';
include '../conex/tag2.php';

$consulta = ConsultarNombre($_GET['id']);

function ConsultarNombre($id_user){
    $con = mysqli_connect("localhost", "root", "", "registro");

    $sent = "SELECT * FROM guardar_menus WHERE id='".$id_user."' ";
    $resultado = mysqli_query($con, $sent) or die (mysqli_error());
    $filas=mysqli_fetch_assoc($resultado);
    return[
        $filas['id'],$filas['n_usuario'],$filas['nombre_menu'],$filas['descripcion'],$filas['fecha'],
        $filas['desayuno_lunes'],$filas['colacion1_lunes'],$filas['comida_lunes'],$filas['colacion2_lunes'],$filas['cena_lunes'],
        $filas['desayuno_martes'],$filas['colacion1_martes'],$filas['comida_martes'],$filas['colacion2_martes'],$filas['cena_martes'],
        $filas['desayuno_miercoles'],$filas['colacion1_miercoles'], $filas['comida_miercoles'],$filas['colacion2_miercoles'],$filas['cena_miercoles'],
        $filas['desayuno_jueves'],$filas['colacion1_jueves'],$filas['comida_jueves'],$filas['colacion2_jueves'],$filas['cena_jueves'],
        $filas['desayuno_viernes'],$filas['colacion1_viernes'],$filas['comida_viernes'],$filas['colacion2_viernes'],$filas['cena_viernes'],
        $filas['desayuno_sabado'],$filas['colacion1_sabado'],$filas['comida_sabado'],$filas['colacion2_sabado'],$filas['cena_sabado'],
        $filas['desayuno_domingo'],$filas['colacion1_domingo'],$filas['comida_domingo'],$filas['colacion2_domingo'],$filas['cena_domingo'],
        $filas['equivalentes']
    ];
}

$equiv = $consulta[40];
$separador = ",";
$separada = explode($separador, $equiv);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>NutriPAES - Niño (Editar menú)</title>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" type="text/css" href="../jquery-ui.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css_px/elab_m.css">

        <script src="https://kit.fontawesome.com/336ceace9e.js" crossorigin="anonymous"></script>
        <style type="text/css">
        input[type=button] {
                font-family: FontAwesome, 'Open Sans', sans-serif;
        }
        #almuerzo, #comida, #merienda, #cena{
            display: none;
        }
        .rotar180{
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            margin-bottom: 0px;
			margin-top: 0px;
        }
        .btnPdf{
            padding: 10px 20px;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none;
            font-size: 14px;
            background: green;
            color: white;
            cursor: pointer;
            outline: none;  
        }
        </style>
    </head>
    <body>
        <br><br><br>
        <form style="text-align:center">
        <div class="btn-group">
            <input type="radio" class="btn-check" name="bdAlim" id="smae4" value="smae4" checked>
            <label class="btn btn-outline-primary" for="smae4">Smae 4ta Edición</label>

            <input type="radio" class="btn-check" name="bdAlim" id="smae5" value="smae5">
            <label class="btn btn-outline-primary" for="smae5">Smae 5ta Edición</label>
        </div>
        </form>
        <br>
        <p style="text-align:center"><a class="btn btn-primary" href="#" id="show"><i class="fa fa-eye"></i> Mostrar distribución</a></p>
        
        <!-- DIV QUE SE MOSTRARÁ Y OCULTARÁ -->
    
        <div id="content" class="col-lg-12">
            <div id="element" class="col-lg-12" style="display: none;"> 
                <div id="close"><a class="btn btn-small" href="#" id="hide" title="Cerrar"><i class="fa fa-close"></i></a></div>

                <section class="seccion_f" id="seccion_f" onkeyup="equiv()">
                <div id="t_distribucion" class="t_distribucion" onkeyup="calculo_dist()">
                <table id="kcal_totales" name="kcal_totales" class="kcal_totales">
                    <thead>
                        <tr>
                            <th style="width:120px"></th>
                            <th style="width:150px"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total Kcal</td>
                            <td><input id="valor_kcal" name="valor_kcal" style="width:150px" placeholder="Kcal asignadas" value="<?php echo $separada[0];?>"></td>
                            <td>Prot</td>
                            <td><input id="porc_prot" name="porc_prot" style="width:60px" placeholder="%" value="<?php echo $separada[1];?>"></td>
                            <td>Líp</td>
                            <td><input id="porc_lip" name="porc_lip" style="width:60px" placeholder="%" value="<?php echo $separada[2];?>"></td>
                            <td>HC</td>
                            <td><input id="porc_carb" name="porc_carb" style="width:60px" placeholder="%" value="<?php echo $separada[3];?>"></td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <table class="tabla_distribucion">
                <thead>
                <tr>
                <th rowspan="2" style="width:90px">Grupos</th>
                <th rowspan="2" style="width:160px">Subgrupos</th>
                <th colspan="9">Aporte nutrimental promedio</th>
                </tr>

                <tr>
                <th style="width:40px">Eq</th>
                <th colspan="2" style="width:80px">Energía</th>
                <th colspan="2" style="width:80px">Proteína (g)</th>
                <th colspan="2" style="width:80px">Lípidos (g)</th>
                <th colspan="2" style="width:100px">Hidratos de Carbono (g)</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                <td colspan="2">Verduras</td>
                <td><input id="eq1" name="eq1" placeholder="Eq" style="width:40px" value="<?php echo $separada[4];?>"></td>
                <td id="energia_eq1">25</td>
                <td id="energia_r1" style="color:red">0</td>
                <td id="proteina_eq1">2</td>
                <td id="proteina_r1" style="color:red">0</td>
                <td id="lipidos_eq1">0</td>
                <td id="lipidos_r1" style="color:red">0</td>
                <td id="carbos_eq1">4</td>
                <td id="carbos_r1" style="color:red">0</td>
                </tr>

                <tr>
                <td colspan="2">Frutas</td>
                <td><input id="eq2" name="eq2" placeholder="Eq" style="width:40px" value="<?php echo $separada[5];?>"></td>
                <td id="energia_eq2">60</td>
                <td id="energia_r2" style="color:red">0</td>
                <td id="proteina_eq2">0</td>
                <td id="proteina_r2" style="color:red">0</td>
                <td id="lipidos_eq2">0</td>
                <td id="lipidos_r2" style="color:red">0</td>
                <td id="carbos_eq2">15</td>
                <td id="carbos_r2" style="color:red">0</td>
                </tr>

                <tr>
                <td rowspan="2">Cereales y tubérculos</td>
                <td>Sin grasa</td>
                <td><input id="eq3" name="eq3" placeholder="Eq" style="width:40px" value="<?php echo $separada[6];?>"></td>
                <td id="energia_eq3">70</td>
                <td id="energia_r3" style="color:red">0</td>
                <td id="proteina_eq3">2</td>
                <td id="proteina_r3" style="color:red">0</td>
                <td id="lipidos_eq3">0</td>
                <td id="lipidos_r3" style="color:red">0</td>
                <td id="carbos_eq3">15</td>
                <td id="carbos_r3" style="color:red">0</td>
                </tr>

                <tr>
                <td>Con grasa</td>
                <td><input id="eq4" name="eq4" placeholder="Eq" style="width:40px" value="<?php echo $separada[7];?>"></td>
                <td id="energia_eq4">115</td>
                <td id="energia_r4" style="color:red">0</td>
                <td id="proteina_eq4">2</td>
                <td id="proteina_r4" style="color:red">0</td>
                <td id="lipidos_eq4">5</td>
                <td id="lipidos_r4" style="color:red">0</td>
                <td id="carbos_eq4">15</td>
                <td id="carbos_r4" style="color:red">0</td>
                </tr>

                <tr>
                <td colspan="2">Leguminosas</td>
                <td><input id="eq5" name="eq5" placeholder="Eq" style="width:40px" value="<?php echo $separada[8];?>"></td>
                <td id="energia_eq5">120</td>
                <td id="energia_r5" style="color:red">0</td>
                <td id="proteina_eq5">8</td>
                <td id="proteina_r5" style="color:red">0</td>
                <td id="lipidos_eq5">1</td>
                <td id="lipidos_r5" style="color:red">0</td>
                <td id="carbos_eq5">20</td>
                <td id="carbos_r5" style="color:red">0</td>
                </tr>

                <tr>
                <td rowspan="4">Alimentos de Origen animal</td>
                <td>Muy bajo en grasa</td>
                <td><input id="eq6" name="eq6" placeholder="Eq" style="width:40px" value="<?php echo $separada[9];?>"></td>
                <td id="energia_eq6">40</td>
                <td id="energia_r6" style="color:red">0</td>
                <td id="proteina_eq6">7</td>
                <td id="proteina_r6" style="color:red">0</td>
                <td id="lipidos_eq6">1</td>
                <td id="lipidos_r6" style="color:red">0</td>
                <td id="carbos_eq6">0</td>
                <td id="carbos_r6" style="color:red">0</td>
                </tr>

                <tr>
                <td>Bajo en grasa</td>
                <td><input id="eq7" name="eq7" placeholder="Eq" style="width:40px" value="<?php echo $separada[10];?>"></td>
                <td id="energia_eq7">55</td>
                <td id="energia_r7" style="color:red">0</td>
                <td id="proteina_eq7">7</td>
                <td id="proteina_r7" style="color:red">0</td>
                <td id="lipidos_eq7">3</td>
                <td id="lipidos_r7" style="color:red">0</td>
                <td id="carbos_eq7">0</td>
                <td id="carbos_r7" style="color:red">0</td>
                </tr>

                <tr>
                <td>Moderado en grasa</td>
                <td><input id="eq8" name="eq8" placeholder="Eq" style="width:40px" value="<?php echo $separada[11];?>"></td>
                <td id="energia_eq8">75</td>
                <td id="energia_r8" style="color:red">0</td>
                <td id="proteina_eq8">7</td>
                <td id="proteina_r8" style="color:red">0</td>
                <td id="lipidos_eq8">5</td>
                <td id="lipidos_r8" style="color:red">0</td>
                <td id="carbos_eq8">0</td>
                <td id="carbos_r8" style="color:red">0</td>
                </tr>

                <tr>
                <td>Alto en grasa</td>
                <td><input id="eq9" name="eq9" placeholder="Eq" style="width:40px" value="<?php echo $separada[12];?>"></td>
                <td id="energia_eq9">100</td>
                <td id="energia_r9" style="color:red">0</td>
                <td id="proteina_eq9">7</td>
                <td id="proteina_r9" style="color:red">0</td>
                <td id="lipidos_eq9">8</td>
                <td id="lipidos_r9" style="color:red">0</td>
                <td id="carbos_eq9">0</td>
                <td id="carbos_r9" style="color:red">0</td>
                </tr>

                <tr>
                <td rowspan="4">Leche</td>
                <td>Descremada</td>
                <td><input id="eq10" name="eq10" placeholder="Eq" style="width:40px" value="<?php echo $separada[13];?>"></td>
                <td id="energia_eq10">95</td>
                <td id="energia_r10" style="color:red">0</td>
                <td id="proteina_eq10">9</td>
                <td id="proteina_r10" style="color:red">0</td>
                <td id="lipidos_eq10">2</td>
                <td id="lipidos_r10" style="color:red">0</td>
                <td id="carbos_eq10">12</td>
                <td id="carbos_r10" style="color:red">0</td>
                </tr>

                <tr>
                <td>Semidescremada</td>
                <td><input id="eq11" name="eq11" placeholder="Eq" style="width:40px" value="<?php echo $separada[14];?>"></td>
                <td id="energia_eq11">110</td>
                <td id="energia_r11" style="color:red">0</td>
                <td id="proteina_eq11">9</td>
                <td id="proteina_r11" style="color:red">0</td>
                <td id="lipidos_eq11">4</td>
                <td id="lipidos_r11" style="color:red">0</td>
                <td id="carbos_eq11">12</td>
                <td id="carbos_r11" style="color:red">0</td>
                </tr>

                <tr>
                <td>Entera</td>
                <td><input id="eq12" name="eq12" placeholder="Eq" style="width:40px" value="<?php echo $separada[15];?>"></td>
                <td id="energia_eq12">150</td>
                <td id="energia_r12" style="color:red">0</td>
                <td id="proteina_eq12">9</td>
                <td id="proteina_r12" style="color:red">0</td>
                <td id="lipidos_eq12">8</td>
                <td id="lipidos_r12" style="color:red">0</td>
                <td id="carbos_eq12">12</td>
                <td id="carbos_r12" style="color:red">0</td>
                </tr>

                <tr>
                <td>Con azúcar</td>
                <td><input id="eq13" name="eq13" placeholder="Eq" style="width:40px" value="<?php echo $separada[16];?>"></td>
                <td id="energia_eq13">200</td>
                <td id="energia_r13" style="color:red">0</td>
                <td id="proteina_eq13">8</td>
                <td id="proteina_r13" style="color:red">0</td>
                <td id="lipidos_eq13">5</td>
                <td id="lipidos_r13" style="color:red">0</td>
                <td id="carbos_eq13">30</td>
                <td id="carbos_r13" style="color:red">0</td>
                </tr>

                <tr>
                <td rowspan="2">Aceites y Grasas</td>
                <td>Sin proteína</td>
                <td><input id="eq14" name="eq14" placeholder="Eq" style="width:40px" value="<?php echo $separada[17];?>"></td>
                <td id="energia_eq14">45</td>
                <td id="energia_r14" style="color:red">0</td>
                <td id="proteina_eq14">0</td>
                <td id="proteina_r14" style="color:red">0</td>
                <td id="lipidos_eq14">5</td>
                <td id="lipidos_r14" style="color:red">0</td>
                <td id="carbos_eq14">0</td>
                <td id="carbos_r14" style="color:red">0</td>
                </tr>

                <tr>
                <td>Con proteína</td>
                <td><input id="eq15" name="eq15" placeholder="Eq" style="width:40px" value="<?php echo $separada[18];?>"></td>
                <td id="energia_eq15">70</td>
                <td id="energia_r15" style="color:red">0</td>
                <td id="proteina_eq15">3</td>
                <td id="proteina_r15" style="color:red">0</td>
                <td id="lipidos_eq15">5</td>
                <td id="lipidos_r15" style="color:red">0</td>
                <td id="carbos_eq15">3</td>
                <td id="carbos_r15" style="color:red">0</td>
                </tr>

                <tr>
                <td rowspan="2">Azúcares</td>
                <td>Sin grasa</td>
                <td><input id="eq16" name="eq16" placeholder="Eq" style="width:40px" value="<?php echo $separada[19];?>"></td>
                <td id="energia_eq16">40</td>
                <td id="energia_r16" style="color:red">0</td>
                <td id="proteina_eq16">0</td>
                <td id="proteina_r16" style="color:red">0</td>
                <td id="lipidos_eq16">0</td>
                <td id="lipidos_r16" style="color:red">0</td>
                <td id="carbos_eq16">10</td>
                <td id="carbos_r16" style="color:red">0</td>
                </tr>

                <tr>
                <td>Con grasa</td>
                <td><input id="eq17" name="eq17" placeholder="Eq" style="width:40px" value="<?php echo $separada[20];?>"></td>
                <td id="energia_eq17">85</td>
                <td id="energia_r17" style="color:red">0</td>
                <td id="proteina_eq17">0</td>
                <td id="proteina_r17" style="color:red">0</td>
                <td id="lipidos_eq17">5</td>
                <td id="lipidos_r17" style="color:red">0</td>
                <td id="carbos_eq17">10</td>
                <td id="carbos_r17" style="color:red">0</td>
                </tr>

                <tr>
                <td colspan="2">Alimentos libres de energía</td>
                <td><input id="eq18" name="eq18" placeholder="Eq" style="width:40px" value="<?php echo $separada[21];?>"></td>
                <td id="energia_eq18">0</td>
                <td id="energia_r18" style="color:red">0</td>
                <td id="proteina_eq18">0</td>
                <td id="proteina_r18" style="color:red">0</td>
                <td id="lipidos_eq18">0</td>
                <td id="lipidos_r18" style="color:red">0</td>
                <td id="carbos_eq18">0</td>
                <td id="carbos_r18" style="color:red">0</td>
                </tr>

                <tr>
                <td colspan="2">Bebidas alcohólicas</td>
                <td><input id="eq19" name="eq19" placeholder="Eq" style="width:40px" value="<?php echo $separada[22];?>"></td>
                <td id="energia_eq19">140</td>
                <td id="energia_r19" style="color:red">0</td>
                <td id="proteina_eq19">0</td>
                <td id="proteina_r19" style="color:red">0</td>
                <td id="lipidos_eq19">0</td>
                <td id="lipidos_r19" style="color:red">0</td>
                <td id="carbos_eq19">20</td>
                <td id="carbos_r19" style="color:red">0</td>
                </tr>

                <!-- EXTRA -->
                <tr>
                <td colspan="2"><input id="otro_subgrupo" name="otro_subgrupo" placeholder="Otro subgrupo" value="<?php echo $separada[23];?>"></td>
                <td><input id="eq20" name="eq20" placeholder="Eq" style="width:40px" value="<?php echo $separada[24];?>"></td>
                <td><input id="energia_eq20" name="energia_eq20" placeholder="--" style="width:40px" value="<?php echo $separada[25];?>"></td>
                <td id="energia_r20" style="color:red">0</td>
                <td><input id="proteina_eq20" name="proteina_eq20" placeholder="--" style="width:40px" value="<?php echo $separada[26];?>"></td>
                <td id="proteina_r20" style="color:red">0</td>
                <td><input id="lipidos_eq20" name="lipidos_eq20" placeholder="--" style="width:40px" value="<?php echo $separada[27];?>"></td>
                <td id="lipidos_r20" style="color:red">0</td>
                <td><input id="carbos_eq20" name="carbos_eq20" placeholder="--" style="width:50px" value="<?php echo $separada[28];?>"></td>
                <td id="carbos_r20" style="color:red">0</td>
                </tr>

                <tr>
                <td></td>
                <td></td>
                <td>Total</td>
                <td></td>
                <td id="energia_total" style="color:red">0</td>
                <td></td>
                <td id="proteina_total" style="color:red">0</td>
                <td></td>
                <td id="lipidos_total" style="color:red">0</td>
                <td></td>
                <td id="carbos_total" style="color:red">0</td>
                </tr>

                <tr>
                <td></td>
                <td></td>
                <td>%</td>
                <td></td>
                <td id="energia_porcentaje"></td>
                <td></td>
                <td id="proteina_porcentaje"></td>
                <td></td>
                <td id="lipidos_porcentaje"></td>
                <td></td>
                <td id="carbos_porcentaje"></td>
                </tr>
                </tbody>
                </table>
                </div>
                
                <div id="d_xcomida" class="d_xcomida" onkeyup="calculo_dist()">
                <br>
                <br>
                <br>
                <table class="distxcomida">
                <thead>
                <tr>
                <th colspan="8">Distribución por tiempo de comida</th>
                </tr>

                <tr>
                <th colspan="2">Alimento</th>
                <th style="width:40px">Eq</th>
                <th style="width:60px">Desayuno</th>
                <th style="width:30px">Col</th>
                <th style="width:60px">Comida</th>
                <th style="width:30px">Col</th>
                <th style="width:30px">Cena</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                <td colspan="2">Verduras</td>
                <td id="copiar1"></td>
                <td><input id="desayuno_f1" name="desayuno_f1" style="width:60px" placeholder="--" value="<?php echo $separada[29];?>"></td>
                <td><input id="colacionm_f1" name="colacionm_f1" style="width:30px" placeholder="--" value="<?php echo $separada[30];?>"></td>
                <td><input id="comida_f1" name="comida_f1" style="width:60px" placeholder="--" value="<?php echo $separada[31];?>"></td>
                <td><input id="colacionv_f1" name="colacionv_f1" style="width:30px" placeholder="--" value="<?php echo $separada[32];?>"></td>
                <td><input id="cena_f1" name="cena_f1" style="width:30px" placeholder="--" value="<?php echo $separada[33];?>"></td>
                </tr>

                <tr>
                <td colspan="2">Frutas</td>
                <td id="copiar2"></td>
                <td><input id="desayuno_f2" name="desayuno_f2" style="width:60px" placeholder="--" value="<?php echo $separada[34];?>"></td>
                <td><input id="colacionm_f2" name="colacionm_f2" style="width:30px" placeholder="--" value="<?php echo $separada[35];?>"></td>
                <td><input id="comida_f2" name="comida_f2" style="width:60px" placeholder="--" value="<?php echo $separada[36];?>"></td>
                <td><input id="colacionv_f2" name="colacionv_f2" style="width:30px" placeholder="--" value="<?php echo $separada[37];?>"></td>
                <td><input id="cena_f2" name="cena_f2" style="width:30px" placeholder="--" value="<?php echo $separada[38];?>"></td>
                </tr>

                <tr>
                <td rowspan="2" style="width:90px">Cereales y tubérculos</td>
                <td>Sin grasa</td>
                <td id="copiar3"></td>
                <td><input id="desayuno_f3" name="desayuno_f3" style="width:60px" placeholder="--" value="<?php echo $separada[39];?>"></td>
                <td><input id="colacionm_f3" name="colacionm_f3" style="width:30px" placeholder="--" value="<?php echo $separada[40];?>"></td>
                <td><input id="comida_f3" name="comida_f3" style="width:60px" placeholder="--" value="<?php echo $separada[41];?>"></td>
                <td><input id="colacionv_f3" name="colacionv_f3" style="width:30px" placeholder="--" value="<?php echo $separada[42];?>"></td>
                <td><input id="cena_f3" name="cena_f3" style="width:30px" placeholder="--" value="<?php echo $separada[43];?>"></td>
                </tr>

                <tr>
                <td>Con grasa</td>
                <td id="copiar4"></td>
                <td><input id="desayuno_f4" name="desayuno_f4" style="width:60px" placeholder="--" value="<?php echo $separada[44];?>"></td>
                <td><input id="colacionm_f4" name="colacionm_f4" style="width:30px" placeholder="--" value="<?php echo $separada[45];?>"></td>
                <td><input id="comida_f4" name="comida_f4" style="width:60px" placeholder="--" value="<?php echo $separada[46];?>"></td>
                <td><input id="colacionv_f4" name="colacionv_f4" style="width:30px" placeholder="--" value="<?php echo $separada[47];?>"></td>
                <td><input id="cena_f4" name="cena_f4" style="width:30px" placeholder="--" value="<?php echo $separada[48];?>"></td>
                </tr>

                <tr>
                <td colspan="2">Leguminosas</td>
                <td id="copiar5"></td>
                <td><input id="desayuno_f5" name="desayuno_f5" style="width:60px" placeholder="--" value="<?php echo $separada[49];?>"></td>
                <td><input id="colacionm_f5" name="colacionm_f5" style="width:30px" placeholder="--" value="<?php echo $separada[50];?>"></td>
                <td><input id="comida_f5" name="comida_f5" style="width:60px" placeholder="--" value="<?php echo $separada[51];?>"></td>
                <td><input id="colacionv_f5" name="colacionv_f5" style="width:30px" placeholder="--" value="<?php echo $separada[52];?>"></td>
                <td><input id="cena_f5" name="cena_f5" style="width:30px" placeholder="--" value="<?php echo $separada[53];?>"></td>
                </tr>

                <tr>
                <td rowspan="4" style="width:90px">Alimentos de Origen animal</td>
                <td>Muy bajo en grasa</td>
                <td id="copiar6"></td>
                <td><input id="desayuno_f6" name="desayuno_f6" style="width:60px" placeholder="--" value="<?php echo $separada[54];?>"></td>
                <td><input id="colacionm_f6" name="colacionm_f6" style="width:30px" placeholder="--" value="<?php echo $separada[55];?>"></td>
                <td><input id="comida_f6" name="comida_f6" style="width:60px" placeholder="--" value="<?php echo $separada[56];?>"></td>
                <td><input id="colacionv_f6" name="colacionv_f6" style="width:30px" placeholder="--" value="<?php echo $separada[57];?>"></td>
                <td><input id="cena_f6" name="cena_f6" style="width:30px" placeholder="--" value="<?php echo $separada[58];?>"></td>
                </tr>

                <tr>
                <td>Bajo en grasa</td>
                <td id="copiar7"></td>
                <td><input id="desayuno_f7" name="desayuno_f7" style="width:60px" placeholder="--" value="<?php echo $separada[59];?>"></td>
                <td><input id="colacionm_f7" name="colacionm_f7" style="width:30px" placeholder="--" value="<?php echo $separada[60];?>"></td>
                <td><input id="comida_f7" name="comida_f7" style="width:60px" placeholder="--" value="<?php echo $separada[61];?>"></td>
                <td><input id="colacionv_f7" name="colacionv_f7" style="width:30px" placeholder="--" value="<?php echo $separada[62];?>"></td>
                <td><input id="cena_f7" name="cena_f7" style="width:30px" placeholder="--" value="<?php echo $separada[63];?>"></td>
                </tr>

                <tr>
                <td>Moderado en grasa</td>
                <td id="copiar8"></td>
                <td><input id="desayuno_f8" name="desayuno_f8" style="width:60px" placeholder="--" value="<?php echo $separada[64];?>"></td>
                <td><input id="colacionm_f8" name="colacionm_f8" style="width:30px" placeholder="--" value="<?php echo $separada[65];?>"></td>
                <td><input id="comida_f8" name="comida_f8" style="width:60px" placeholder="--" value="<?php echo $separada[66];?>"></td>
                <td><input id="colacionv_f8" name="colacionv_f8" style="width:30px" placeholder="--" value="<?php echo $separada[67];?>"></td>
                <td><input id="cena_f8" name="cena_f8" style="width:30px" placeholder="--" value="<?php echo $separada[68];?>"></td>
                </tr>

                <tr>
                <td>Alto en grasa</td>
                <td id="copiar9"></td>
                <td><input id="desayuno_f9" name="desayuno_f9" style="width:60px" placeholder="--" value="<?php echo $separada[69];?>"></td>
                <td><input id="colacionm_f9" name="colacionm_f9" style="width:30px" placeholder="--" value="<?php echo $separada[70];?>"></td>
                <td><input id="comida_f9" name="comida_f9" style="width:60px" placeholder="--" value="<?php echo $separada[71];?>"></td>
                <td><input id="colacionv_f9" name="colacionv_f9" style="width:30px" placeholder="--" value="<?php echo $separada[72];?>"></td>
                <td><input id="cena_f9" name="cena_f9" style="width:30px" placeholder="--" value="<?php echo $separada[73];?>"></td>
                </tr>

                <tr>
                <td rowspan="4" style="width:90px">Leche</td>
                <td>Descremada</td>
                <td id="copiar10"></td>
                <td><input id="desayuno_f10" name="desayuno_f10" style="width:60px" placeholder="--" value="<?php echo $separada[74];?>"></td>
                <td><input id="colacionm_f10" name="colacionm_f10" style="width:30px" placeholder="--" value="<?php echo $separada[75];?>"></td>
                <td><input id="comida_f10" name="comida_f10" style="width:60px" placeholder="--" value="<?php echo $separada[76];?>"></td>
                <td><input id="colacionv_f10" name="colacionv_f10" style="width:30px" placeholder="--" value="<?php echo $separada[77];?>"></td>
                <td><input id="cena_f10" name="cena_f10" style="width:30px" placeholder="--" value="<?php echo $separada[78];?>"></td>
                </tr>

                <tr>
                <td>Semidescremada</td>
                <td id="copiar11"></td>
                <td><input id="desayuno_f11" name="desayuno_f11" style="width:60px" placeholder="--" value="<?php echo $separada[79];?>"></td>
                <td><input id="colacionm_f11" name="colacionm_f11" style="width:30px" placeholder="--" value="<?php echo $separada[80];?>"></td>
                <td><input id="comida_f11" name="comida_f11" style="width:60px" placeholder="--" value="<?php echo $separada[81];?>"></td>
                <td><input id="colacionv_f11" name="colacionv_f11" style="width:30px" placeholder="--" value="<?php echo $separada[82];?>"></td>
                <td><input id="cena_f11" name="cena_f11" style="width:30px" placeholder="--" value="<?php echo $separada[83];?>"></td>
                </tr>

                <tr>
                <td>Entera</td>
                <td id="copiar12"></td>
                <td><input id="desayuno_f12" name="desayuno_f12" style="width:60px" placeholder="--" value="<?php echo $separada[84];?>"></td>
                <td><input id="colacionm_f12" name="colacionm_f12" style="width:30px" placeholder="--" value="<?php echo $separada[85];?>"></td>
                <td><input id="comida_f12" name="comida_f12" style="width:60px" placeholder="--" value="<?php echo $separada[86];?>"></td>
                <td><input id="colacionv_f12" name="colacionv_f12" style="width:30px" placeholder="--" value="<?php echo $separada[87];?>"></td>
                <td><input id="cena_f12" name="cena_f12" style="width:30px" placeholder="--" value="<?php echo $separada[88];?>"></td>
                </tr>

                <tr>
                <td>Con azúcar</td>
                <td id="copiar13"></td>
                <td><input id="desayuno_f13" name="desayuno_f13" style="width:60px" placeholder="--" value="<?php echo $separada[89];?>"></td>
                <td><input id="colacionm_f13" name="colacionm_f13" style="width:30px" placeholder="--" value="<?php echo $separada[90];?>"></td>
                <td><input id="comida_f13" name="comida_f13" style="width:60px" placeholder="--" value="<?php echo $separada[91];?>"></td>
                <td><input id="colacionv_f13" name="colacionv_f13" style="width:30px" placeholder="--" value="<?php echo $separada[92];?>"></td>
                <td><input id="cena_f13" name="cena_f13" style="width:30px" placeholder="--" value="<?php echo $separada[93];?>"></td>
                </tr>

                <tr>
                <td rowspan="2" style="width:90px">Aceites y Grasas</td>
                <td>Sin proteína</td>
                <td id="copiar14"></td>
                <td><input id="desayuno_f14" name="desayuno_f14" style="width:60px" placeholder="--" value="<?php echo $separada[94];?>"></td>
                <td><input id="colacionm_f14" name="colacionm_f14" style="width:30px" placeholder="--" value="<?php echo $separada[95];?>"></td>
                <td><input id="comida_f14" name="comida_f14" style="width:60px" placeholder="--" value="<?php echo $separada[96];?>"></td>
                <td><input id="colacionv_f14" name="colacionv_f14" style="width:30px" placeholder="--" value="<?php echo $separada[97];?>"></td>
                <td><input id="cena_f14" name="cena_f14" style="width:30px" placeholder="--" value="<?php echo $separada[98];?>"></td>
                </tr>

                <tr>
                <td>Con proteína</td>
                <td id="copiar15"></td>
                <td><input id="desayuno_f15" name="desayuno_f15" style="width:60px" placeholder="--" value="<?php echo $separada[99];?>"></td>
                <td><input id="colacionm_f15" name="colacionm_f15" style="width:30px" placeholder="--" value="<?php echo $separada[100];?>"></td>
                <td><input id="comida_f15" name="comida_f15" style="width:60px" placeholder="--" value="<?php echo $separada[101];?>"></td>
                <td><input id="colacionv_f15" name="colacionv_f15" style="width:30px" placeholder="--" value="<?php echo $separada[102];?>"></td>
                <td><input id="cena_f15" name="cena_f15" style="width:30px" placeholder="--" value="<?php echo $separada[103];?>"></td>
                </tr>

                <tr>
                <td rowspan="2" style="width:90px">Azúcares</td>
                <td>Sin grasa</td>
                <td id="copiar16"></td>
                <td><input id="desayuno_f16" name="desayuno_f16" style="width:60px" placeholder="--" value="<?php echo $separada[104];?>"></td>
                <td><input id="colacionm_f16" name="colacionm_f16" style="width:30px" placeholder="--" value="<?php echo $separada[105];?>"></td>
                <td><input id="comida_f16" name="comida_f16" style="width:60px" placeholder="--" value="<?php echo $separada[106];?>"></td>
                <td><input id="colacionv_f16" name="colacionv_f16" style="width:30px" placeholder="--" value="<?php echo $separada[107];?>"></td>
                <td><input id="cena_f16" name="cena_f16" style="width:30px" placeholder="--" value="<?php echo $separada[108];?>"></td>
                </tr>

                <tr>
                <td>Con grasa</td>
                <td id="copiar17"></td>
                <td><input id="desayuno_f17" name="desayuno_f17" style="width:60px" placeholder="--" value="<?php echo $separada[109];?>"></td>
                <td><input id="colacionm_f17" name="colacionm_f17" style="width:30px" placeholder="--" value="<?php echo $separada[110];?>"></td>
                <td><input id="comida_f17" name="comida_f17" style="width:60px" placeholder="--" value="<?php echo $separada[111];?>"></td>
                <td><input id="colacionv_f17" name="colacionv_f17" style="width:30px" placeholder="--" value="<?php echo $separada[112];?>"></td>
                <td><input id="cena_f17" name="cena_f17" style="width:30px" placeholder="--" value="<?php echo $separada[113];?>"></td>
                </tr>

                <tr>
                <td colspan="2">Alimentos libres de energía</td>
                <td id="copiar18"></td>
                <td><input id="desayuno_f18" name="desayuno_f18" style="width:60px" placeholder="--" value="<?php echo $separada[114];?>"></td>
                <td><input id="colacionm_f18" name="colacionm_f18" style="width:30px" placeholder="--" value="<?php echo $separada[115];?>"></td>
                <td><input id="comida_f18" name="comida_f18" style="width:60px" placeholder="--" value="<?php echo $separada[116];?>"></td>
                <td><input id="colacionv_f18" name="colacionv_f18" style="width:30px" placeholder="--" value="<?php echo $separada[117];?>"></td>
                <td><input id="cena_f18" name="cena_f18" style="width:30px" placeholder="--" value="<?php echo $separada[118];?>"></td>
                </tr>

                <tr>
                <td colspan="2">Bebidas alcohólicas</td>
                <td id="copiar19"></td>
                <td><input id="desayuno_f19" name="desayuno_f19" style="width:60px" placeholder="--" value="<?php echo $separada[119];?>"></td>
                <td><input id="colacionm_f19" name="colacionm_f19" style="width:30px" placeholder="--" value="<?php echo $separada[120];?>"></td>
                <td><input id="comida_f19" name="comida_f19" style="width:60px" placeholder="--" value="<?php echo $separada[121];?>"></td>
                <td><input id="colacionv_f19" name="colacionv_f19" style="width:30px" placeholder="--" value="<?php echo $separada[122];?>"></td>
                <td><input id="cena_f19" name="cena_f19" style="width:30px" placeholder="--" value="<?php echo $separada[123];?>"></td>
                </tr>

                <tr>
                <td id="copiar_subgrupo" colspan="2"></td>
                <td id="copiar20"></td>
                <td><input id="desayuno_f20" name="desayuno_f20" style="width:60px" placeholder="--" value="<?php echo $separada[124];?>"></td>
                <td><input id="colacionm_f20" name="colacionm_f20" style="width:30px" placeholder="--" value="<?php echo $separada[125];?>"></td>
                <td><input id="comida_f20" name="comida_f20" style="width:60px" placeholder="--" value="<?php echo $separada[126];?>"></td>
                <td><input id="colacionv_f20" name="colacionv_f20" style="width:30px" placeholder="--" value="<?php echo $separada[127];?>"></td>
                <td><input id="cena_f20" name="cena_f20" style="width:30px" placeholder="--" value="<?php echo $separada[128];?>"></td>
                </tr>
                </tbody>
                </table>
                </div>
                </section>
            </div>
        </div> 
    <hr>

    <div style="text-align:center">
        <h1>Crear Menú</h1>
        <p>Elige los nutrientes que deseas calcular en tu menú...</p>
        <select id="opcion1" name="opcion1" style="width:150px;" onclick="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal">Energía (Kcal)</option>
            <option value="prot">Proteína (g)</option>
            <option value="lip">Lípidos (g)</option>
            <option value="carb">Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>
        
        <select id="opcion2" name="opcion2" style="width:150px;" onchange="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal">Energía (Kcal)</option>
            <option value="prot">Proteína (g)</option>
            <option value="lip">Lípidos (g)</option>
            <option value="carb">Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>

        <select id="opcion3" name="opcion3" style="width:150px;" onchange="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal">Energía (Kcal)</option>
            <option value="prot">Proteína (g)</option>
            <option value="lip">Lípidos (g)</option>
            <option value="carb">Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>
        <select id="opcion4" name="opcion4" style="width:150px;" onchange="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal">Energía (Kcal)</option>
            <option value="prot">Proteína (g)</option>
            <option value="lip">Lípidos (g)</option>
            <option value="carb">Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>
        <select id="opcion5" name="opcion5" style="width:150px;" onchange="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal">Energía (Kcal)</option>
            <option value="prot">Proteína (g)</option>
            <option value="lip">Lípidos (g)</option>
            <option value="carb">Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>
        <select id="opcion6" name="opcion6" style="width:150px;" onchange="rellenar()">
            <option value="" disabled>Selecciona el nutriente</option>
            <option value="vacio"></option>
            <option value="pb">Peso Bruto (g)</option>
            <option value="pn">Peso Neto (g)</option>
            <option value="h2o">Agua (ml)</option>
            <option value="kcal">Energía (Kcal)</option>
            <option value="prot">Proteína (g)</option>
            <option value="lip">Lípidos (g)</option>
            <option value="carb">Carbohidratos (g)</option>
            <option value="fibra">Fibra (g)</option>
            <option value="vitA">Vitamina A (µg-RE)</option>
            <option value="a_asc">Ácido ascorbico (mg)</option>
            <option value="a_fol">Ácido Folico (µg)</option>
            <option value="fe">Hierro (mg)</option>
            <option value="k">Potasio (mg)</option>
            <option value="ig">Índice glucémico</option>
            <option value="cg">Carga glucémica</option>
            <option value="azucar">Azúcar (g)</option>
            <option value="ca">Calcio (mg)</option>
            <option value="na">Sodio (mg)</option>
            <option value="se">Selenio (µg)</option>
            <option value="p">Fosforo (mg)</option>
            <option value="col">Colesterol (mg)</option>
            <option value="ag_sat">ÁG saturados (g)</option>
            <option value="ag_mono">ÁG monoinsaturados (g)</option>
            <option value="ag_poli">ÁG poliinsaturados (g)</option>
            <option value="etoh">Etanol (g)</option>
        </select>
    </div>

    <section class="elaborar_menu" id="elaborar_menu">
        <!--Tabla para Elaborar Menú-->
        <div id="lunes" onclick="sumartablas()" style="margin: 0 auto;">
        <button type="button" id="eliminar_datos" name="eliminar_datos" class="eliminar_datos" onclick="eliminar_d()">Borrar datos</button>
        <!-- Botones para mostrar y ocultar comidas -->
        <div class="text-center">
            <div class="btn-group" role="group" aria-label="">
                <button id="btn_desayuno" type="button" class="btn btn-primary" onclick="mostrarDesayuno()">Desayuno</button>
                <button id="btn_almuerzo" type="button" class="btn btn-primary" onclick="mostrarAlmuerzo()">Almuerzo</button>
                <button id="btn_comida" type="button" class="btn btn-primary" onclick="mostrarComida()">Comida</button>
                <button id="btn_merienda" type="button" class="btn btn-primary" onclick="mostrarMerienda()">Merienda</button>
                <button id="btn_cena" type="button" class="btn btn-primary" onclick="mostrarCena()">Cena</button>
            </div>
        </div>
        
        <div id="desayuno">
        <div id="eliminar_desayuno" name="eliminar_desayuno" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_desayuno()" value="&#xf2ed;">
        <h2> Desayuno</h2>
        </div>
        <table class="nombre_com" id="nombre_desayuno">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_desayuno" name="n_desayuno" placeholder="Escribe un nombre para el desayuno" style="width:300px"></td>
        </tr>
        </tbody>
        </table>

        <table class="tabla1">
            <thead>
                <tr>
                    <th class="autocompletar">Alimento</th>
                    <th class="porcion">Porción</th>
                    <th class="grupo">Grupo</th>
                    <th class="cantidad">Cantidad</th>
                    <th class="seleccion1" style="width:60px" class="t60"></th>
                    <th class="seleccion2" style="width:60px" class="t60"></th>
                    <th class="seleccion3" style="width:60px" class="t60"></th>
                    <th class="seleccion4" style="width:60px" class="t60"></th>
                    <th class="seleccion5" style="width:60px" class="t60"></th>
                    <th class="seleccion6" style="width:60px" class="t60"></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                    <td><input id="tag1" name="tag1" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular1()"></td>
                    <td><input id="porcion1" name="porcion1" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc1()"></td>
                    <td><input id="grupo1" name="grupo1" class="grupo"></td>
                    <td><input id="cantidad1" name="cantidad1" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f1" name="nut1_f1" class="nut1 t60"></td>
                    <td><input id="nut2_f1" name="nut2_f1" class="nut2 t60"></td>
                    <td><input id="nut3_f1" name="nut3_f1" class="nut3 t60"></td>
                    <td><input id="nut4_f1" name="nut4_f1" class="nut4 t60"></td>
                    <td><input id="nut5_f1" name="nut5_f1" class="nut5 t60"></td>
                    <td><input id="nut6_f1" name="nut6_f1" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag2" name="tag2" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular2()"></td>
                    <td><input id="porcion2" name="porcion2" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc2()"></td>
                    <td><input id="grupo2" name="grupo2" class="grupo"></td>
                    <td><input id="cantidad2" name="cantidad2" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f2" name="nut1_f2" class="nut1 t60"></td>
                    <td><input id="nut2_f2" name="nut2_f2" class="nut2 t60"></td>
                    <td><input id="nut3_f2" name="nut3_f2" class="nut3 t60"></td>
                    <td><input id="nut4_f2" name="nut4_f2" class="nut4 t60"></td>
                    <td><input id="nut5_f2" name="nut5_f2" class="nut5 t60"></td>
                    <td><input id="nut6_f2" name="nut6_f2" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag3" name="tag3" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular3()"></td>
                    <td><input id="porcion3" name="porcion3" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc3()"></td>
                    <td><input id="grupo3" name="grupo3" class="grupo"></td>
                    <td><input id="cantidad3" name="cantidad3" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f3" name="nut1_f3" class="nut1 t60"></td>
                    <td><input id="nut2_f3" name="nut2_f3" class="nut2 t60"></td>
                    <td><input id="nut3_f3" name="nut3_f3" class="nut3 t60"></td>
                    <td><input id="nut4_f3" name="nut4_f3" class="nut4 t60"></td>
                    <td><input id="nut5_f3" name="nut5_f3" class="nut5 t60"></td>
                    <td><input id="nut6_f3" name="nut6_f3" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag4" name="tag4" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular4()"></td>
                    <td><input id="porcion4" name="porcion4" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc4()"></td>
                    <td><input id="grupo4" name="grupo4" class="grupo"></td>
                    <td><input id="cantidad4" name="cantidad4" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f4" name="nut1_f4" class="nut1 t60"></td>
                    <td><input id="nut2_f4" name="nut2_f4" class="nut2 t60"></td>
                    <td><input id="nut3_f4" name="nut3_f4" class="nut3 t60"></td>
                    <td><input id="nut4_f4" name="nut4_f4" class="nut4 t60"></td>
                    <td><input id="nut5_f4" name="nut5_f4" class="nut5 t60"></td>
                    <td><input id="nut6_f4" name="nut6_f4" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag5" name="tag5" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular5()"></td>
                    <td><input id="porcion5" name="porcion5" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc5()"></td>
                    <td><input id="grupo5" name="grupo5" class="grupo"></td>
                    <td><input id="cantidad5" name="cantidad5" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f5" name="nut1_f5" class="nut1 t60"></td>
                    <td><input id="nut2_f5" name="nut2_f5" class="nut2 t60"></td>
                    <td><input id="nut3_f5" name="nut3_f5" class="nut3 t60"></td>
                    <td><input id="nut4_f5" name="nut4_f5" class="nut4 t60"></td>
                    <td><input id="nut5_f5" name="nut5_f5" class="nut5 t60"></td>
                    <td><input id="nut6_f5" name="nut6_f5" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag6" name="tag6" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular6()"></td>
                    <td><input id="porcion6" name="porcion6" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc6()"></td>
                    <td><input id="grupo6" name="grupo6" class="grupo"></td>
                    <td><input id="cantidad6" name="cantidad6" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f6" name="nut1_f6" class="nut1 t60"></td>
                    <td><input id="nut2_f6" name="nut2_f6" class="nut2 t60"></td>
                    <td><input id="nut3_f6" name="nut3_f6" class="nut3 t60"></td>
                    <td><input id="nut4_f6" name="nut4_f6" class="nut4 t60"></td>
                    <td><input id="nut5_f6" name="nut5_f6" class="nut5 t60"></td>
                    <td><input id="nut6_f6" name="nut6_f6" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag7" name="tag7" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular7()"></td>
                    <td><input id="porcion7" name="porcion7" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc7()"></td>
                    <td><input id="grupo7" name="grupo7" class="grupo"></td>
                    <td><input id="cantidad7" name="cantidad7" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f7" name="nut1_f7" class="nut1 t60"></td>
                    <td><input id="nut2_f7" name="nut2_f7" class="nut2 t60"></td>
                    <td><input id="nut3_f7" name="nut3_f7" class="nut3 t60"></td>
                    <td><input id="nut4_f7" name="nut4_f7" class="nut4 t60"></td>
                    <td><input id="nut5_f7" name="nut5_f7" class="nut5 t60"></td>
                    <td><input id="nut6_f7" name="nut6_f7" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag8" name="tag8" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular8()"></td>
                    <td><input id="porcion8" name="porcion8" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc8()"></td>
                    <td><input id="grupo8" name="grupo8" class="grupo"></td>
                    <td><input id="cantidad8" name="cantidad8" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f8" name="nut1_f8" class="nut1 t60"></td>
                    <td><input id="nut2_f8" name="nut2_f8" class="nut2 t60"></td>
                    <td><input id="nut3_f8" name="nut3_f8" class="nut3 t60"></td>
                    <td><input id="nut4_f8" name="nut4_f8" class="nut4 t60"></td>
                    <td><input id="nut5_f8" name="nut5_f8" class="nut5 t60"></td>
                    <td><input id="nut6_f8" name="nut6_f8" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag9" name="tag9" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular9()"></td>
                    <td><input id="porcion9" name="porcion9" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc9()"></td>
                    <td><input id="grupo9" name="grupo9" class="grupo"></td>
                    <td><input id="cantidad9" name="cantidad9" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f9" name="nut1_f9" class="nut1 t60"></td>
                    <td><input id="nut2_f9" name="nut2_f9" class="nut2 t60"></td>
                    <td><input id="nut3_f9" name="nut3_f9" class="nut3 t60"></td>
                    <td><input id="nut4_f9" name="nut4_f9" class="nut4 t60"></td>
                    <td><input id="nut5_f9" name="nut5_f9" class="nut5 t60"></td>
                    <td><input id="nut6_f9" name="nut6_f9" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag10" name="tag10" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular10()"></td>
                    <td><input id="porcion10" name="porcion10" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc10()"></td>
                    <td><input id="grupo10" name="grupo10" class="grupo"></td>
                    <td><input id="cantidad10" name="cantidad10" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f10" name="nut1_f10" class="nut1 t60"></td>
                    <td><input id="nut2_f10" name="nut2_f10" class="nut2 t60"></td>
                    <td><input id="nut3_f10" name="nut3_f10" class="nut3 t60"></td>
                    <td><input id="nut4_f10" name="nut4_f10" class="nut4 t60"></td>
                    <td><input id="nut5_f10" name="nut5_f10" class="nut5 t60"></td>
                    <td><input id="nut6_f10" name="nut6_f10" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total1_opcion1" name="total1_opcion1" class="t60"></td>
                    <td><input id="total1_opcion2" name="total1_opcion2" class="t60"></td>
                    <td><input id="total1_opcion3" name="total1_opcion3" class="t60"></td>
                    <td><input id="total1_opcion4" name="total1_opcion4" class="t60"></td>
                    <td><input id="total1_opcion5" name="total1_opcion5" class="t60"></td>
                    <td><input id="total1_opcion6" name="total1_opcion6" class="t60"></td>
                </tr>
            </tbody>
        </table>
        </div>

        <div id="almuerzo">
        <div id="eliminar_c1" name="eliminar_c1" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_c1()" value="&#xf2ed;">
        <h2> Almuerzo</h2>
        </div>
        <table class="nombre_com" id="nombre_colacion1">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_colacion1" name="n_colacion1" placeholder="Escribe un nombre para la colación" style="width:300px"></td>
        </tr>
        </tbody>
        </table>
        <table class="tabla1">
            <thead>
                <tr>
                    <th class="autocompletar">Alimento</th>
                    <th class="porcion">Porción</th>
                    <th class="grupo">Grupo</th>
                    <th class="cantidad">Cantidad</th>
                    <th class="seleccion1" style="width:60px"></th>
                    <th class="seleccion2" style="width:60px"></th>
                    <th class="seleccion3" style="width:60px"></th>
                    <th class="seleccion4" style="width:60px"></th>
                    <th class="seleccion5" style="width:60px"></th>
                    <th class="seleccion6" style="width:60px"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input id="tag11" name="tag11" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular11()"></td>
                    <td><input id="porcion11" name="porcion11" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc11()"></td>
                    <td><input id="grupo11" name="grupo11" class="grupo"></td>
                    <td><input id="cantidad11" name="cantidad11" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f11" name="nut1_f11" class="nut1 t60"></td>
                    <td><input id="nut2_f11" name="nut2_f11" class="nut2 t60"></td>
                    <td><input id="nut3_f11" name="nut3_f11" class="nut3 t60"></td>
                    <td><input id="nut4_f11" name="nut4_f11" class="nut4 t60"></td>
                    <td><input id="nut5_f11" name="nut5_f11" class="nut5 t60"></td>
                    <td><input id="nut6_f11" name="nut6_f11" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag12" name="tag12" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular12()"></td>
                    <td><input id="porcion12" name="porcion12" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc12()"></td>
                    <td><input id="grupo12" name="grupo12" class="grupo"></td>
                    <td><input id="cantidad12" name="cantidad12" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f12" name="nut1_f12" class="nut1 t60"></td>
                    <td><input id="nut2_f12" name="nut2_f12" class="nut2 t60"></td>
                    <td><input id="nut3_f12" name="nut3_f12" class="nut3 t60"></td>
                    <td><input id="nut4_f12" name="nut4_f12" class="nut4 t60"></td>
                    <td><input id="nut5_f12" name="nut5_f12" class="nut5 t60"></td>
                    <td><input id="nut6_f12" name="nut6_f12" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag13" name="tag13" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular13()"></td>
                    <td><input id="porcion13" name="porcion13" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc13()"></td>
                    <td><input id="grupo13" name="grupo13" class="grupo"></td>
                    <td><input id="cantidad13" name="cantidad13" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f13" name="nut1_f13" class="nut1 t60"></td>
                    <td><input id="nut2_f13" name="nut2_f13" class="nut2 t60"></td>
                    <td><input id="nut3_f13" name="nut3_f13" class="nut3 t60"></td>
                    <td><input id="nut4_f13" name="nut4_f13" class="nut4 t60"></td>
                    <td><input id="nut5_f13" name="nut5_f13" class="nut5 t60"></td>
                    <td><input id="nut6_f13" name="nut6_f13" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag14" name="tag14" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular14()"></td>
                    <td><input id="porcion14" name="porcion14" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc14()"></td>
                    <td><input id="grupo14" name="grupo14" class="grupo"></td>
                    <td><input id="cantidad14" name="cantidad14" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f14" name="nut1_f14" class="nut1 t60"></td>
                    <td><input id="nut2_f14" name="nut2_f14" class="nut2 t60"></td>
                    <td><input id="nut3_f14" name="nut3_f14" class="nut3 t60"></td>
                    <td><input id="nut4_f14" name="nut4_f14" class="nut4 t60"></td>
                    <td><input id="nut5_f14" name="nut5_f14" class="nut5 t60"></td>
                    <td><input id="nut6_f14" name="nut6_f14" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag15" name="tag15" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular15()"></td>
                    <td><input id="porcion15" name="porcion15" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc15()"></td>
                    <td><input id="grupo15" name="grupo15" class="grupo"></td>
                    <td><input id="cantidad15" name="cantidad15" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f15" name="nut1_f15" class="nut1 t60"></td>
                    <td><input id="nut2_f15" name="nut2_f15" class="nut2 t60"></td>
                    <td><input id="nut3_f15" name="nut3_f15" class="nut3 t60"></td>
                    <td><input id="nut4_f15" name="nut4_f15" class="nut4 t60"></td>
                    <td><input id="nut5_f15" name="nut5_f15" class="nut5 t60"></td>
                    <td><input id="nut6_f15" name="nut6_f15" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total2_opcion1" name="total2_opcion1" class="t60"></td>
                    <td><input id="total2_opcion2" name="total2_opcion2" class="t60"></td>
                    <td><input id="total2_opcion3" name="total2_opcion3" class="t60"></td>
                    <td><input id="total2_opcion4" name="total2_opcion4" class="t60"></td>
                    <td><input id="total2_opcion5" name="total2_opcion5" class="t60"></td>
                    <td><input id="total2_opcion6" name="total2_opcion6" class="t60"></td>
                </tr>
            </tbody>
        </table>
        </div>
        
        <div id="comida">
        <div id="eliminar_comida" name="eliminar_comida" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_comida()" value="&#xf2ed;">
        <h2> Comida</h2>
        </div>
        <table class="nombre_com" id="nombre_comida">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_comida" name="n_comida" placeholder="Escribe un nombre para la comida" style="width:300px"></td>
        </tr>
        </tbody>
        </table>
        <table class="tabla1">
            <thead>
                <tr>
                    <th class="autocompletar">Alimento</th>
                    <th class="porcion">Porción</th>
                    <th class="grupo">Grupo</th>
                    <th class="cantidad">Cantidad</th>
                    <th class="seleccion1" style="width:60px"></th>
                    <th class="seleccion2" style="width:60px"></th>
                    <th class="seleccion3" style="width:60px"></th>
                    <th class="seleccion4" style="width:60px"></th>
                    <th class="seleccion5" style="width:60px"></th>
                    <th class="seleccion6" style="width:60px"></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                    <td><input id="tag16" name="tag16" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular16()"></td>
                    <td><input id="porcion16" name="porcion16" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc16()"></td>
                    <td><input id="grupo16" name="grupo16" class="grupo"></td>
                    <td><input id="cantidad16" name="cantidad16" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f16" name="nut1_f16" class="nut1 t60"></td>
                    <td><input id="nut2_f16" name="nut2_f16" class="nut2 t60"></td>
                    <td><input id="nut3_f16" name="nut3_f16" class="nut3 t60"></td>
                    <td><input id="nut4_f16" name="nut4_f16" class="nut4 t60"></td>
                    <td><input id="nut5_f16" name="nut5_f16" class="nut5 t60"></td>
                    <td><input id="nut6_f16" name="nut6_f16" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag17" name="tag17" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular17()"></td>
                    <td><input id="porcion17" name="porcion17" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc17()"></td>
                    <td><input id="grupo17" name="grupo17" class="grupo"></td>
                    <td><input id="cantidad17" name="cantidad17" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f17" name="nut1_f17" class="nut1 t60"></td>
                    <td><input id="nut2_f17" name="nut2_f17" class="nut2 t60"></td>
                    <td><input id="nut3_f17" name="nut3_f17" class="nut3 t60"></td>
                    <td><input id="nut4_f17" name="nut4_f17" class="nut4 t60"></td>
                    <td><input id="nut5_f17" name="nut5_f17" class="nut5 t60"></td>
                    <td><input id="nut6_f17" name="nut6_f17" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag18" name="tag18" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular18()"></td>
                    <td><input id="porcion18" name="porcion18" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc18()"></td>
                    <td><input id="grupo18" name="grupo18" class="grupo"></td>
                    <td><input id="cantidad18" name="cantidad18" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f18" name="nut1_f18" class="nut1 t60"></td>
                    <td><input id="nut2_f18" name="nut2_f18" class="nut2 t60"></td>
                    <td><input id="nut3_f18" name="nut3_f18" class="nut3 t60"></td>
                    <td><input id="nut4_f18" name="nut4_f18" class="nut4 t60"></td>
                    <td><input id="nut5_f18" name="nut5_f18" class="nut5 t60"></td>
                    <td><input id="nut6_f18" name="nut6_f18" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag19" name="tag19" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular19()"></td>
                    <td><input id="porcion19" name="porcion19" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc19()"></td>
                    <td><input id="grupo19" name="grupo19" class="grupo"></td>
                    <td><input id="cantidad19" name="cantidad19" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f19" name="nut1_f19" class="nut1 t60"></td>
                    <td><input id="nut2_f19" name="nut2_f19" class="nut2 t60"></td>
                    <td><input id="nut3_f19" name="nut3_f19" class="nut3 t60"></td>
                    <td><input id="nut4_f19" name="nut4_f19" class="nut4 t60"></td>
                    <td><input id="nut5_f19" name="nut5_f19" class="nut5 t60"></td>
                    <td><input id="nut6_f19" name="nut6_f19" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag20" name="tag20" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular20()"></td>
                    <td><input id="porcion20" name="porcion20" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc20()"></td>
                    <td><input id="grupo20" name="grupo20" class="grupo"></td>
                    <td><input id="cantidad20" name="cantidad20" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f20" name="nut1_f20" class="nut1 t60"></td>
                    <td><input id="nut2_f20" name="nut2_f20" class="nut2 t60"></td>
                    <td><input id="nut3_f20" name="nut3_f20" class="nut3 t60"></td>
                    <td><input id="nut4_f20" name="nut4_f20" class="nut4 t60"></td>
                    <td><input id="nut5_f20" name="nut5_f20" class="nut5 t60"></td>
                    <td><input id="nut6_f20" name="nut6_f20" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag21" name="tag21" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular21()"></td>
                    <td><input id="porcion21" name="porcion21" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc21()"></td>
                    <td><input id="grupo21" name="grupo21" class="grupo"></td>
                    <td><input id="cantidad21" name="cantidad21" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f21" name="nut1_f21" class="nut1 t60"></td>
                    <td><input id="nut2_f21" name="nut2_f21" class="nut2 t60"></td>
                    <td><input id="nut3_f21" name="nut3_f21" class="nut3 t60"></td>
                    <td><input id="nut4_f21" name="nut4_f21" class="nut4 t60"></td>
                    <td><input id="nut5_f21" name="nut5_f21" class="nut5 t60"></td>
                    <td><input id="nut6_f21" name="nut6_f21" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag22" name="tag22" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular22()"></td>
                    <td><input id="porcion22" name="porcion22" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc22()"></td>
                    <td><input id="grupo22" name="grupo22" class="grupo"></td>
                    <td><input id="cantidad22" name="cantidad22" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f22" name="nut1_f22" class="nut1 t60"></td>
                    <td><input id="nut2_f22" name="nut2_f22" class="nut2 t60"></td>
                    <td><input id="nut3_f22" name="nut3_f22" class="nut3 t60"></td>
                    <td><input id="nut4_f22" name="nut4_f22" class="nut4 t60"></td>
                    <td><input id="nut5_f22" name="nut5_f22" class="nut5 t60"></td>
                    <td><input id="nut6_f22" name="nut6_f22" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag23" name="tag23" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular23()"></td>
                    <td><input id="porcion23" name="porcion23" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc23()"></td>
                    <td><input id="grupo23" name="grupo23" class="grupo"></td>
                    <td><input id="cantidad23" name="cantidad23" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f23" name="nut1_f23" class="nut1 t60"></td>
                    <td><input id="nut2_f23" name="nut2_f23" class="nut2 t60"></td>
                    <td><input id="nut3_f23" name="nut3_f23" class="nut3 t60"></td>
                    <td><input id="nut4_f23" name="nut4_f23" class="nut4 t60"></td>
                    <td><input id="nut5_f23" name="nut5_f23" class="nut5 t60"></td>
                    <td><input id="nut6_f23" name="nut6_f23" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag24" name="tag24" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular24()"></td>
                    <td><input id="porcion24" name="porcion24" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc24()"></td>
                    <td><input id="grupo24" name="grupo24" class="grupo"></td>
                    <td><input id="cantidad24" name="cantidad24" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f24" name="nut1_f24" class="nut1 t60"></td>
                    <td><input id="nut2_f24" name="nut2_f24" class="nut2 t60"></td>
                    <td><input id="nut3_f24" name="nut3_f24" class="nut3 t60"></td>
                    <td><input id="nut4_f24" name="nut4_f24" class="nut4 t60"></td>
                    <td><input id="nut5_f24" name="nut5_f24" class="nut5 t60"></td>
                    <td><input id="nut6_f24" name="nut6_f24" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag25" name="tag25" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular25()"></td>
                    <td><input id="porcion25" name="porcion25" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc25()"></td>
                    <td><input id="grupo25" name="grupo25" class="grupo"></td>
                    <td><input id="cantidad25" name="cantidad25" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f25" name="nut1_f25" class="nut1 t60"></td>
                    <td><input id="nut2_f25" name="nut2_f25" class="nut2 t60"></td>
                    <td><input id="nut3_f25" name="nut3_f25" class="nut3 t60"></td>
                    <td><input id="nut4_f25" name="nut4_f25" class="nut4 t60"></td>
                    <td><input id="nut5_f25" name="nut5_f25" class="nut5 t60"></td>
                    <td><input id="nut6_f25" name="nut6_f25" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total3_opcion1" name="total3_opcion1" class="t60"></td>
                    <td><input id="total3_opcion2" name="total3_opcion2" class="t60"></td>
                    <td><input id="total3_opcion3" name="total3_opcion3" class="t60"></td>
                    <td><input id="total3_opcion4" name="total3_opcion4" class="t60"></td>
                    <td><input id="total3_opcion5" name="total3_opcion5" class="t60"></td>
                    <td><input id="total3_opcion6" name="total3_opcion6" class="t60"></td>
                </tr>
            </tbody>
        </table>
        </div>

        <div id="merienda">
        <div id="eliminar_c2" name="eliminar_c2" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_c2()" value="&#xf2ed;">
        <h2> Merienda</h2>
        </div>
        <table class="nombre_com" id="nombre_colacion2">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_colacion2" name="n_colacion2" placeholder="Escribe un nombre para la colación" style="width:300px"></td>
        </tr>
        </tbody>
        </table>
        <table class="tabla1">
            <thead>
                <tr>
                    <th class="autocompletar">Alimento</th>
                    <th class="porcion">Porción</th>
                    <th class="grupo">Grupo</th>
                    <th class="cantidad">Cantidad</th>
                    <th class="seleccion1" style="width:60px"></th>
                    <th class="seleccion2" style="width:60px"></th>
                    <th class="seleccion3" style="width:60px"></th>
                    <th class="seleccion4" style="width:60px"></th>
                    <th class="seleccion5" style="width:60px"></th>
                    <th class="seleccion6" style="width:60px"></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                    <td><input id="tag26" name="tag26" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular26()"></td>
                    <td><input id="porcion26" name="porcion26" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc26()"></td>
                    <td><input id="grupo26" name="grupo26" class="grupo"></td>
                    <td><input id="cantidad26" name="cantidad26" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f26" name="nut1_f26" class="nut1 t60"></td>
                    <td><input id="nut2_f26" name="nut2_f26" class="nut2 t60"></td>
                    <td><input id="nut3_f26" name="nut3_f26" class="nut3 t60"></td>
                    <td><input id="nut4_f26" name="nut4_f26" class="nut4 t60"></td>
                    <td><input id="nut5_f26" name="nut5_f26" class="nut5 t60"></td>
                    <td><input id="nut6_f26" name="nut6_f26" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag27" name="tag27" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular27()"></td>
                    <td><input id="porcion27" name="porcion27" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc27()"></td>
                    <td><input id="grupo27" name="grupo27" class="grupo"></td>
                    <td><input id="cantidad27" name="cantidad27" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f27" name="nut1_f27" class="nut1 t60"></td>
                    <td><input id="nut2_f27" name="nut2_f27" class="nut2 t60"></td>
                    <td><input id="nut3_f27" name="nut3_f27" class="nut3 t60"></td>
                    <td><input id="nut4_f27" name="nut4_f27" class="nut4 t60"></td>
                    <td><input id="nut5_f27" name="nut5_f27" class="nut5 t60"></td>
                    <td><input id="nut6_f27" name="nut6_f27" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag28" name="tag28" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular28()"></td>
                    <td><input id="porcion28" name="porcion28" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc28()"></td>
                    <td><input id="grupo28" name="grupo28" class="grupo"></td>
                    <td><input id="cantidad28" name="cantidad28" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f28" name="nut1_f28" class="nut1 t60"></td>
                    <td><input id="nut2_f28" name="nut2_f28" class="nut2 t60"></td>
                    <td><input id="nut3_f28" name="nut3_f28" class="nut3 t60"></td>
                    <td><input id="nut4_f28" name="nut4_f28" class="nut4 t60"></td>
                    <td><input id="nut5_f28" name="nut5_f28" class="nut5 t60"></td>
                    <td><input id="nut6_f28" name="nut6_f28" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag29" name="tag29" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular29()"></td>
                    <td><input id="porcion29" name="porcion29" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc29()"></td>
                    <td><input id="grupo29" name="grupo29" class="grupo"></td>
                    <td><input id="cantidad29" name="cantidad29" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f29" name="nut1_f29" class="nut1 t60"></td>
                    <td><input id="nut2_f29" name="nut2_f29" class="nut2 t60"></td>
                    <td><input id="nut3_f29" name="nut3_f29" class="nut3 t60"></td>
                    <td><input id="nut4_f29" name="nut4_f29" class="nut4 t60"></td>
                    <td><input id="nut5_f29" name="nut5_f29" class="nut5 t60"></td>
                    <td><input id="nut6_f29" name="nut6_f29" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag30" name="tag30" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular30()"></td>
                    <td><input id="porcion30" name="porcion30" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc30()"></td>
                    <td><input id="grupo30" name="grupo30" class="grupo"></td>
                    <td><input id="cantidad30" name="cantidad30" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f30" name="nut1_f30" class="nut1 t60"></td>
                    <td><input id="nut2_f30" name="nut2_f30" class="nut2 t60"></td>
                    <td><input id="nut3_f30" name="nut3_f30" class="nut3 t60"></td>
                    <td><input id="nut4_f30" name="nut4_f30" class="nut4 t60"></td>
                    <td><input id="nut5_f30" name="nut5_f30" class="nut5 t60"></td>
                    <td><input id="nut6_f30" name="nut6_f30" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total4_opcion1" name="total4_opcion1" class="t60"></td>
                    <td><input id="total4_opcion2" name="total4_opcion2" class="t60"></td>
                    <td><input id="total4_opcion3" name="total4_opcion3" class="t60"></td>
                    <td><input id="total4_opcion4" name="total4_opcion4" class="t60"></td>
                    <td><input id="total4_opcion5" name="total4_opcion5" class="t60"></td>
                    <td><input id="total4_opcion6" name="total4_opcion6" class="t60"></td>
                </tr>
            </tbody>
        </table>
        </div>

        <div id="cena">
        <div id="eliminar_cena" name="eliminar_cena" class="eliminar_comidas">
        <input type="button" class="btn-xs btn-danger" onclick="eliminar_cena()" value="&#xf2ed;">
        <h2> Cena</h2>
        </div>
        <table class="nombre_com" id="nombre_cena">
        <thead>
        <tr>
        <th></th>
        <th></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td>Nombre del platillo: </td>
        <td><input id="n_cena" name="n_cena" placeholder="Escribe un nombre para la cena" style="width:300px"></td>
        </tr>
        </tbody>
        </table>
        <table class="tabla1">
            <thead>
                <tr>
                    <th class="autocompletar">Alimento</th>
                    <th class="porcion">Porción</th>
                    <th class="grupo">Grupo</th>
                    <th class="cantidad">Cantidad</th>
                    <th class="seleccion1" style="width:60px"></th>
                    <th class="seleccion2" style="width:60px"></th>
                    <th class="seleccion3" style="width:60px"></th>
                    <th class="seleccion4" style="width:60px"></th>
                    <th class="seleccion5" style="width:60px"></th>
                    <th class="seleccion6" style="width:60px"></th>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                    <td><input id="tag31" name="tag31" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular31()"></td>
                    <td><input id="porcion31" name="porcion31" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc31()"></td>
                    <td><input id="grupo31" name="grupo31" class="grupo"></td>
                    <td><input id="cantidad31" name="cantidad31" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f31" name="nut1_f31" class="nut1 t60"></td>
                    <td><input id="nut2_f31" name="nut2_f31" class="nut2 t60"></td>
                    <td><input id="nut3_f31" name="nut3_f31" class="nut3 t60"></td>
                    <td><input id="nut4_f31" name="nut4_f31" class="nut4 t60"></td>
                    <td><input id="nut5_f31" name="nut5_f31" class="nut5 t60"></td>
                    <td><input id="nut6_f31" name="nut6_f31" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag32" name="tag32" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular32()"></td>
                    <td><input id="porcion32" name="porcion32" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc32()"></td>
                    <td><input id="grupo32" name="grupo32" class="grupo"></td>
                    <td><input id="cantidad32" name="cantidad32" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f32" name="nut1_f32" class="nut1 t60"></td>
                    <td><input id="nut2_f32" name="nut2_f32" class="nut2 t60"></td>
                    <td><input id="nut3_f32" name="nut3_f32" class="nut3 t60"></td>
                    <td><input id="nut4_f32" name="nut4_f32" class="nut4 t60"></td>
                    <td><input id="nut5_f32" name="nut5_f32" class="nut5 t60"></td>
                    <td><input id="nut6_f32" name="nut6_f32" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag33" name="tag33" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular33()"></td>
                    <td><input id="porcion33" name="porcion33" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc33()"></td>
                    <td><input id="grupo33" name="grupo33" class="grupo"></td>
                    <td><input id="cantidad33" name="cantidad33" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f33" name="nut1_f33" class="nut1 t60"></td>
                    <td><input id="nut2_f33" name="nut2_f33" class="nut2 t60"></td>
                    <td><input id="nut3_f33" name="nut3_f33" class="nut3 t60"></td>
                    <td><input id="nut4_f33" name="nut4_f33" class="nut4 t60"></td>
                    <td><input id="nut5_f33" name="nut5_f33" class="nut5 t60"></td>
                    <td><input id="nut6_f33" name="nut6_f33" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag34" name="tag34" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular34()"></td>
                    <td><input id="porcion34" name="porcion34" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc34()"></td>
                    <td><input id="grupo34" name="grupo34" class="grupo"></td>
                    <td><input id="cantidad34" name="cantidad34" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f34" name="nut1_f34" class="nut1 t60"></td>
                    <td><input id="nut2_f34" name="nut2_f34" class="nut2 t60"></td>
                    <td><input id="nut3_f34" name="nut3_f34" class="nut3 t60"></td>
                    <td><input id="nut4_f34" name="nut4_f34" class="nut4 t60"></td>
                    <td><input id="nut5_f34" name="nut5_f34" class="nut5 t60"></td>
                    <td><input id="nut6_f34" name="nut6_f34" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag35" name="tag35" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular35()"></td>
                    <td><input id="porcion35" name="porcion35" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc35()"></td>
                    <td><input id="grupo35" name="grupo35" class="grupo"></td>
                    <td><input id="cantidad35" name="cantidad35" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f35" name="nut1_f35" class="nut1 t60"></td>
                    <td><input id="nut2_f35" name="nut2_f35" class="nut2 t60"></td>
                    <td><input id="nut3_f35" name="nut3_f35" class="nut3 t60"></td>
                    <td><input id="nut4_f35" name="nut4_f35" class="nut4 t60"></td>
                    <td><input id="nut5_f35" name="nut5_f35" class="nut5 t60"></td>
                    <td><input id="nut6_f35" name="nut6_f35" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag36" name="tag36" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular36()"></td>
                    <td><input id="porcion36" name="porcion36" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc36()"></td>
                    <td><input id="grupo36" name="grupo36" class="grupo"></td>
                    <td><input id="cantidad36" name="cantidad36" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f36" name="nut1_f36" class="nut1 t60"></td>
                    <td><input id="nut2_f36" name="nut2_f36" class="nut2 t60"></td>
                    <td><input id="nut3_f36" name="nut3_f36" class="nut3 t60"></td>
                    <td><input id="nut4_f36" name="nut4_f36" class="nut4 t60"></td>
                    <td><input id="nut5_f36" name="nut5_f36" class="nut5 t60"></td>
                    <td><input id="nut6_f36" name="nut6_f36" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag37" name="tag37" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular37()"></td>
                    <td><input id="porcion37" name="porcion37" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc37()"></td>
                    <td><input id="grupo37" name="grupo37" class="grupo"></td>
                    <td><input id="cantidad37" name="cantidad37" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f37" name="nut1_f37" class="nut1 t60"></td>
                    <td><input id="nut2_f37" name="nut2_f37" class="nut2 t60"></td>
                    <td><input id="nut3_f37" name="nut3_f37" class="nut3 t60"></td>
                    <td><input id="nut4_f37" name="nut4_f37" class="nut4 t60"></td>
                    <td><input id="nut5_f37" name="nut5_f37" class="nut5 t60"></td>
                    <td><input id="nut6_f37" name="nut6_f37" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag38" name="tag38" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular38()"></td>
                    <td><input id="porcion38" name="porcion38" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc38()"></td>
                    <td><input id="grupo38" name="grupo38" class="grupo"></td>
                    <td><input id="cantidad38" name="cantidad38" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f38" name="nut1_f38" class="nut1 t60"></td>
                    <td><input id="nut2_f38" name="nut2_f38" class="nut2 t60"></td>
                    <td><input id="nut3_f38" name="nut3_f38" class="nut3 t60"></td>
                    <td><input id="nut4_f38" name="nut4_f38" class="nut4 t60"></td>
                    <td><input id="nut5_f38" name="nut5_f38" class="nut5 t60"></td>
                    <td><input id="nut6_f38" name="nut6_f38" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag39" name="tag39" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular39()"></td>
                    <td><input id="porcion39" name="porcion39" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc39()"></td>
                    <td><input id="grupo39" name="grupo39" class="grupo"></td>
                    <td><input id="cantidad39" name="cantidad39" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f39" name="nut1_f39" class="nut1 t60"></td>
                    <td><input id="nut2_f39" name="nut2_f39" class="nut2 t60"></td>
                    <td><input id="nut3_f39" name="nut3_f39" class="nut3 t60"></td>
                    <td><input id="nut4_f39" name="nut4_f39" class="nut4 t60"></td>
                    <td><input id="nut5_f39" name="nut5_f39" class="nut5 t60"></td>
                    <td><input id="nut6_f39" name="nut6_f39" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td><input id="tag40" name="tag40" class="autocompletar" placeholder="Elige un alimento" onkeyup="calcular40()"></td>
                    <td><input id="porcion40" name="porcion40" class="porcion" placeholder="Num" style="width:60px" onkeyup="calc40()"></td>
                    <td><input id="grupo40" name="grupo40" class="grupo"></td>
                    <td><input id="cantidad40" name="cantidad40" class="cantidad" style="width:150px"></td>
                    <td><input id="nut1_f40" name="nut1_f40" class="nut1 t60"></td>
                    <td><input id="nut2_f40" name="nut2_f40" class="nut2 t60"></td>
                    <td><input id="nut3_f40" name="nut3_f40" class="nut3 t60"></td>
                    <td><input id="nut4_f40" name="nut4_f40" class="nut4 t60"></td>
                    <td><input id="nut5_f40" name="nut5_f40" class="nut5 t60"></td>
                    <td><input id="nut6_f40" name="nut6_f40" class="nut6 t60"></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total =</td>
                    <td><input id="total5_opcion1" name="total5_opcion1" class="t60"></td>
                    <td><input id="total5_opcion2" name="total5_opcion2" class="t60"></td>
                    <td><input id="total5_opcion3" name="total5_opcion3" class="t60"></td>
                    <td><input id="total5_opcion4" name="total5_opcion4" class="t60"></td>
                    <td><input id="total5_opcion5" name="total5_opcion5" class="t60"></td>
                    <td><input id="total5_opcion6" name="total5_opcion6" class="t60"></td>
                </tr>
            </tbody>
        </table>
        </div>
        <br>

        <table class="tabla6" id="tabla6" style="margin: 0 auto">
            <thead>
                <tr>
                    <th class="t100"></th>
                    <th class="seleccion1" style="width:60px" class="t60"></th>
                    <th class="seleccion2" style="width:60px" class="t60"></th>
                    <th class="seleccion3" style="width:60px" class="t60"></th>
                    <th class="seleccion4" style="width:60px" class="t60"></th>
                    <th class="seleccion5" style="width:60px" class="t60"></th>
                    <th class="seleccion6" style="width:60px" class="t60"></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Total =</td>
                    <td><input id="total6_opcion1" name="total6_opcion1" class="t60"></td>
                    <td><input id="total6_opcion2" name="total6_opcion2" class="t60"></td>
                    <td><input id="total6_opcion3" name="total6_opcion3" class="t60"></td>
                    <td><input id="total6_opcion4" name="total6_opcion4" class="t60"></td>
                    <td><input id="total6_opcion5" name="total6_opcion5" class="t60"></td>
                    <td><input id="total6_opcion6" name="total6_opcion6" class="t60"></td>
                </tr>
            </tbody>
        </table>
                    <label>Elige las opciones:</label>
                    <select id="tiempo" name="tiempo">
                    <option value="todo">Todo</option>
                    <option value="desayuno">Desayuno</option>
                    <option value="almuerzo">Almuerzo</option>
                    <option value="comida">Comida</option>
                    <option value="merienda">Merienda</option>
                    <option value="cena">Cena</option>
                    </select>

                    <select id="dia" name="dia">
                    <option value="lunes">Lunes</option>
                    <option value="martes">Martes</option>
                    <option value="miercoles">Miércoles</option>
                    <option value="jueves">Jueves</option>
                    <option value="viernes">Viernes</option>
                    <option value="sabado">Sábado</option>
                    <option value="domingo">Domingo</option>
                    </select>
                    <input type="button" id="enviar_menu" name="enviar_menu" class="enviar_menu" value="Enviar Menú" onclick="enviar_menu()">
            </div>
            <br><br><br>
            <div id="tablasemanal_pdf" class="tablasemanal_pdf" style="margin: 0 auto">
            <h1>Menú Semanal</h1>
            <form action="insertar2.php" method="POST">
            <!-- Input invisible -->
            <input type="hidden" id="id_db" name="id_db" value="<?php echo $consulta[0]?>">
            <!-- Input invisible -->
            <input type="hidden" id="usuario_db" name="usuario_db" value="<?php echo $consulta[1]?>">

            <!-- INPUT DE EQUIVALENTES-->
            <input type="hidden" id="equivalentes" name="equivalentes" value="<?php echo $consulta[40]?>">

            <input type="date" id="hoy" name="hoy" value="<?php echo $consulta[4]?>">
            <div class="datos_menu">
            <table class="nombre_menu" id="nombre_menu">
            <thead>
            <tr>
            <th></th>
            <th></th>
            </tr>
            </thead>

            <tbody>
            <tr>
            <td>Nombre del menú: </td>
            <td><input id="n_menu" name="n_menu" placeholder="Nombre de tu menú" value="<?php echo $consulta[2]?>" style="width:200px"></td>
            </tr>
            </tbody>
            </table>
            <!-- Espacio para descripción -->
            <table class="nombre_menu" id="descripcion">
            <thead>
            <tr>
            <th></th>
            <th></th>
            </tr>
            </thead>

            <tbody>
            <tr>
            <td>Descripción: </td>
            <td><input id="n_descripcion" name="n_descripcion" placeholder="Escribe algunas características de tu menú" value="<?php echo $consulta[3]?>" style="width:500px"></td>
            </tr>
            </tbody>
            </table>
            </div>

            <table class="tablasemanal" id="tablasemanal">
                <thead>
                    <tr>
                        <th style="width:70px">Día</th>
                        <th>Desayuno</th>
                        <th>Almuerzo</th>
                        <th>Comida</th>
                        <th>Merienda</th>
                        <th>Cena</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><p class="rotar180">Lunes</p></td>
                        <td><textarea cols="30" rows="10" id="desayuno_lunes" name="desayuno_lunes" class="textarea"><?php echo $consulta[5]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion1_lunes" name="colacion1_lunes" class="textarea"><?php echo $consulta[6]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="comida_lunes" name="comida_lunes" class="textarea"><?php echo $consulta[7]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion2_lunes" name="colacion2_lunes" class="textarea"><?php echo $consulta[8]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="cena_lunes" name="cena_lunes" class="textarea"><?php echo $consulta[9]?></textarea></td>
                    </tr>

                    <tr>
                        <td><p class="rotar180">Martes</p></td>
                        <td><textarea cols="30" rows="10" id="desayuno_martes" name="desayuno_martes" class="textarea"><?php echo $consulta[10]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion1_martes" name="colacion1_martes" class="textarea"><?php echo $consulta[11]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="comida_martes" name="comida_martes" class="textarea"><?php echo $consulta[12]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion2_martes" name="colacion2_martes" class="textarea"><?php echo $consulta[13]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="cena_martes" name="cena_martes" class="textarea"><?php echo $consulta[14]?></textarea></td>
                    </tr>

                    <tr>
                        <td><p class="rotar180">Miércoles</p></td>
                        <td><textarea cols="30" rows="10" id="desayuno_miercoles" name="desayuno_miercoles" class="textarea"><?php echo $consulta[15]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion1_miercoles" name="colacion1_miercoles" class="textarea"><?php echo $consulta[16]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="comida_miercoles" name="comida_miercoles" class="textarea"><?php echo $consulta[17]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion2_miercoles" name="colacion2_miercoles" class="textarea"><?php echo $consulta[18]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="cena_miercoles" name="cena_miercoles" class="textarea"><?php echo $consulta[19]?></textarea></td>
                    </tr>

                    <tr>
                        <td><p class="rotar180">Jueves</p></td>
                        <td><textarea cols="30" rows="10" id="desayuno_jueves" name="desayuno_jueves" class="textarea"><?php echo $consulta[20]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion1_jueves" name="colacion1_jueves" class="textarea"><?php echo $consulta[21]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="comida_jueves" name="comida_jueves" class="textarea"><?php echo $consulta[22]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion2_jueves" name="colacion2_jueves" class="textarea"><?php echo $consulta[23]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="cena_jueves" name="cena_jueves" class="textarea"><?php echo $consulta[24]?></textarea></td>
                    </tr>

                    <tr>
                        <td><p class="rotar180">Viernes</p></td>
                        <td><textarea cols="30" rows="10" id="desayuno_viernes" name="desayuno_viernes" class="textarea"><?php echo $consulta[25]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion1_viernes" name="colacion1_viernes" class="textarea"><?php echo $consulta[26]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="comida_viernes" name="comida_viernes" class="textarea"><?php echo $consulta[27]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion2_viernes" name="colacion2_viernes" class="textarea"><?php echo $consulta[28]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="cena_viernes" name="cena_viernes" class="textarea"><?php echo $consulta[29]?></textarea></td>
                    </tr>

                    <tr>
                        <td><p class="rotar180">Sábado</p></td>
                        <td><textarea cols="30" rows="10" id="desayuno_sabado" name="desayuno_sabado" class="textarea"><?php echo $consulta[30]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion1_sabado" name="colacion1_sabado" class="textarea"><?php echo $consulta[31]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="comida_sabado" name="comida_sabado" class="textarea"><?php echo $consulta[32]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion2_sabado" name="colacion2_sabado" class="textarea"><?php echo $consulta[33]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="cena_sabado" name="cena_sabado" class="textarea"><?php echo $consulta[34]?></textarea></td>
                    </tr>

                    <tr>
                        <td><p class="rotar180">Domingo</p></td>
                        <td><textarea cols="30" rows="10" id="desayuno_domingo" name="desayuno_domingo" class="textarea"><?php echo $consulta[35]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion1_domingo" name="colacion1_domingo" class="textarea"><?php echo $consulta[36]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="comida_domingo" name="comida_domingo" class="textarea"><?php echo $consulta[37]?></textarea></td>
                        <td><textarea cols="15" rows="10" id="colacion2_domingo" name="colacion2_domingo" class="textarea"><?php echo $consulta[38]?></textarea></td>
                        <td><textarea cols="30" rows="10" id="cena_domingo" name="cena_domingo" class="textarea"><?php echo $consulta[39]?></textarea></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" id="guardar_cambios" name="guardar_cambios" class="guardar_cambios" value="Guardar Cambios">
            <input type="submit" id="btnPdf" name="btnPdf" class="btnPdf" value="Generar Menú PDF">
            </form>
            </div>
        </section>
        
        <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="../jquery-ui.js"></script>
        <script type="text/javascript">
        //MOSTRAR Y OCULTAR TABLAS DE DISTRIBUCIÓN
        $(document).ready(function(){
            $("#hide").on('click', function(){$("#element").hide(); return false;});
            $("#show").on('click', function(){$("#element").show(); return false;}); 

            //Aparecerán los resultados de los select al recargar la pagina
            rellenar()
        });

        function calcular1(){
            var porc = $('#porcion1').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag1').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad1').val(" " + cant + json.unidad), $('#grupo1').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f1').val(json.opcion1);
                        }else{$('#nut1_f1').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f1').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f1').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f1').css("background-color","green");}else{$('#nut1_f1').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f1').val(json.opcion2);
                        }else{$('#nut2_f1').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f1').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f1').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f1').css("background-color","green");}else{$('#nut2_f1').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f1').val(json.opcion3);
                        }else{$('#nut3_f1').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f1').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f1').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f1').css("background-color","green");}else{$('#nut3_f1').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f1').val(json.opcion4);
                        }else{$('#nut4_f1').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f1').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f1').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f1').css("background-color","green");}else{$('#nut4_f1').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f1').val(json.opcion5);
                        }else{$('#nut5_f1').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f1').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f1').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f1').css("background-color","green");}else{$('#nut5_f1').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f1').val(json.opcion6);
                        }else{$('#nut6_f1').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f1').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f1').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f1').css("background-color","green");}else{$('#nut6_f1').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc1(){
            var porc = $('#porcion1').val(), alim1 = $('#tag1').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad1').val(" " + cant + json.unidad), $('#grupo1').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f1').val(json.opcion1);
                        }else{$('#nut1_f1').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f1').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f1').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f1').css("background-color","green");}else{$('#nut1_f1').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f1').val(json.opcion2);
                        }else{$('#nut2_f1').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f1').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f1').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f1').css("background-color","green");}else{$('#nut2_f1').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f1').val(json.opcion3);
                        }else{$('#nut3_f1').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f1').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f1').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f1').css("background-color","green");}else{$('#nut3_f1').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f1').val(json.opcion4);
                        }else{$('#nut4_f1').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f1').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f1').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f1').css("background-color","green");}else{$('#nut4_f1').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f1').val(json.opcion5);
                        }else{$('#nut5_f1').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f1').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f1').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f1').css("background-color","green");}else{$('#nut5_f1').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f1').val(json.opcion6);
                        }else{$('#nut6_f1').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f1').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f1').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f1').css("background-color","green");}else{$('#nut6_f1').css("background-color","transparent");}
                    }
                });
        }

        function calcular2(){
            var porc = $('#porcion2').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag2').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad2').val(" " + cant + json.unidad), $('#grupo2').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f2').val(json.opcion1);
                        }else{$('#nut1_f2').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f2').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f2').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f2').css("background-color","green");}else{$('#nut1_f2').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f2').val(json.opcion2);
                        }else{$('#nut2_f2').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f2').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f2').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f2').css("background-color","green");}else{$('#nut2_f2').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f2').val(json.opcion3);
                        }else{$('#nut3_f2').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f2').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f2').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f2').css("background-color","green");}else{$('#nut3_f2').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f2').val(json.opcion4);
                        }else{$('#nut4_f2').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f2').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f2').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f2').css("background-color","green");}else{$('#nut4_f2').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f2').val(json.opcion5);
                        }else{$('#nut5_f2').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f2').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f2').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f2').css("background-color","green");}else{$('#nut5_f2').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f2').val(json.opcion6);
                        }else{$('#nut6_f2').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f2').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f2').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f2').css("background-color","green");}else{$('#nut6_f2').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc2(){
            var porc = $('#porcion2').val(), alim1 = $('#tag2').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad2').val(" " + cant + json.unidad), $('#grupo2').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f2').val(json.opcion1);
                        }else{$('#nut1_f2').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f2').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f2').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f2').css("background-color","green");}else{$('#nut1_f2').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f2').val(json.opcion2);
                        }else{$('#nut2_f2').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f2').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f2').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f2').css("background-color","green");}else{$('#nut2_f2').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f2').val(json.opcion3);
                        }else{$('#nut3_f2').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f2').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f2').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f2').css("background-color","green");}else{$('#nut3_f2').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f2').val(json.opcion4);
                        }else{$('#nut4_f2').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f2').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f2').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f2').css("background-color","green");}else{$('#nut4_f2').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f2').val(json.opcion5);
                        }else{$('#nut5_f2').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f2').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f2').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f2').css("background-color","green");}else{$('#nut5_f2').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f2').val(json.opcion6);
                        }else{$('#nut6_f2').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f2').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f2').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f2').css("background-color","green");}else{$('#nut6_f2').css("background-color","transparent");}
                    }
                });
        }

        function calcular3(){
            var porc = $('#porcion3').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag3').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad3').val(" " + cant + json.unidad), $('#grupo3').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f3').val(json.opcion1);
                        }else{$('#nut1_f3').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f3').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f3').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f3').css("background-color","green");}else{$('#nut1_f3').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f3').val(json.opcion2);
                        }else{$('#nut2_f3').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f3').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f3').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f3').css("background-color","green");}else{$('#nut2_f3').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f3').val(json.opcion3);
                        }else{$('#nut3_f3').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f3').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f3').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f3').css("background-color","green");}else{$('#nut3_f3').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f3').val(json.opcion4);
                        }else{$('#nut4_f3').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f3').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f3').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f3').css("background-color","green");}else{$('#nut4_f3').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f3').val(json.opcion5);
                        }else{$('#nut5_f3').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f3').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f3').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f3').css("background-color","green");}else{$('#nut5_f3').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f3').val(json.opcion6);
                        }else{$('#nut6_f3').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f3').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f3').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f3').css("background-color","green");}else{$('#nut6_f3').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc3(){
            var porc = $('#porcion3').val(), alim1 = $('#tag3').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad3').val(" " + cant + json.unidad), $('#grupo3').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f3').val(json.opcion1);
                        }else{$('#nut1_f3').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f3').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f3').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f3').css("background-color","green");}else{$('#nut1_f3').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f3').val(json.opcion2);
                        }else{$('#nut2_f3').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f3').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f3').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f3').css("background-color","green");}else{$('#nut2_f3').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f3').val(json.opcion3);
                        }else{$('#nut3_f3').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f3').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f3').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f3').css("background-color","green");}else{$('#nut3_f3').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f3').val(json.opcion4);
                        }else{$('#nut4_f3').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f3').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f3').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f3').css("background-color","green");}else{$('#nut4_f3').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f3').val(json.opcion5);
                        }else{$('#nut5_f3').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f3').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f3').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f3').css("background-color","green");}else{$('#nut5_f3').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f3').val(json.opcion6);
                        }else{$('#nut6_f3').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f3').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f3').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f3').css("background-color","green");}else{$('#nut6_f3').css("background-color","transparent");}
                    }
                });
        }

        function calcular4(){
            var porc = $('#porcion4').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag4').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad4').val(" " + cant + json.unidad), $('#grupo4').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f4').val(json.opcion1);
                        }else{$('#nut1_f4').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f4').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f4').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f4').css("background-color","green");}else{$('#nut1_f4').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f4').val(json.opcion2);
                        }else{$('#nut2_f4').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f4').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f4').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f4').css("background-color","green");}else{$('#nut2_f4').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f4').val(json.opcion3);
                        }else{$('#nut3_f4').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f4').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f4').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f4').css("background-color","green");}else{$('#nut3_f4').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f4').val(json.opcion4);
                        }else{$('#nut4_f4').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f4').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f4').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f4').css("background-color","green");}else{$('#nut4_f4').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f4').val(json.opcion5);
                        }else{$('#nut5_f4').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f4').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f4').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f4').css("background-color","green");}else{$('#nut5_f4').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f4').val(json.opcion6);
                        }else{$('#nut6_f4').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f4').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f4').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f4').css("background-color","green");}else{$('#nut6_f4').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc4(){
            var porc = $('#porcion4').val(), alim1 = $('#tag4').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad4').val(" " + cant + json.unidad), $('#grupo4').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f4').val(json.opcion1);
                        }else{$('#nut1_f4').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f4').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f4').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f4').css("background-color","green");}else{$('#nut1_f4').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f4').val(json.opcion2);
                        }else{$('#nut2_f4').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f4').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f4').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f4').css("background-color","green");}else{$('#nut2_f4').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f4').val(json.opcion3);
                        }else{$('#nut3_f4').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f4').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f4').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f4').css("background-color","green");}else{$('#nut3_f4').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f4').val(json.opcion4);
                        }else{$('#nut4_f4').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f4').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f4').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f4').css("background-color","green");}else{$('#nut4_f4').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f4').val(json.opcion5);
                        }else{$('#nut5_f4').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f4').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f4').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f4').css("background-color","green");}else{$('#nut5_f4').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f4').val(json.opcion6);
                        }else{$('#nut6_f4').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f4').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f4').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f4').css("background-color","green");}else{$('#nut6_f4').css("background-color","transparent");}
                    }
                });
        }

        function calcular5(){
            var porc = $('#porcion5').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag5').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad5').val(" " + cant + json.unidad), $('#grupo5').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f5').val(json.opcion1);
                        }else{$('#nut1_f5').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f5').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f5').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f5').css("background-color","green");}else{$('#nut1_f5').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f5').val(json.opcion2);
                        }else{$('#nut2_f5').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f5').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f5').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f5').css("background-color","green");}else{$('#nut2_f5').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f5').val(json.opcion3);
                        }else{$('#nut3_f5').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f5').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f5').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f5').css("background-color","green");}else{$('#nut3_f5').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f5').val(json.opcion4);
                        }else{$('#nut4_f5').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f5').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f5').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f5').css("background-color","green");}else{$('#nut4_f5').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f5').val(json.opcion5);
                        }else{$('#nut5_f5').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f5').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f5').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f5').css("background-color","green");}else{$('#nut5_f5').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f5').val(json.opcion6);
                        }else{$('#nut6_f5').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f5').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f5').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f5').css("background-color","green");}else{$('#nut6_f5').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc5(){
            var porc = $('#porcion5').val(), alim1 = $('#tag5').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad5').val(" " + cant + json.unidad), $('#grupo5').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f5').val(json.opcion1);
                        }else{$('#nut1_f5').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f5').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f5').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f5').css("background-color","green");}else{$('#nut1_f5').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f5').val(json.opcion2);
                        }else{$('#nut2_f5').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f5').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f5').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f5').css("background-color","green");}else{$('#nut2_f5').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f5').val(json.opcion3);
                        }else{$('#nut3_f5').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f5').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f5').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f5').css("background-color","green");}else{$('#nut3_f5').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f5').val(json.opcion4);
                        }else{$('#nut4_f5').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f5').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f5').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f5').css("background-color","green");}else{$('#nut4_f5').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f5').val(json.opcion5);
                        }else{$('#nut5_f5').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f5').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f5').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f5').css("background-color","green");}else{$('#nut5_f5').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f5').val(json.opcion6);
                        }else{$('#nut6_f5').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f5').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f5').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f5').css("background-color","green");}else{$('#nut6_f5').css("background-color","transparent");}
                    }
                });
        }

        function calcular6(){
            var porc = $('#porcion6').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag6').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad6').val(" " + cant + json.unidad), $('#grupo6').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f6').val(json.opcion1);
                        }else{$('#nut1_f6').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f6').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f6').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f6').css("background-color","green");}else{$('#nut1_f6').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f6').val(json.opcion2);
                        }else{$('#nut2_f6').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f6').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f6').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f6').css("background-color","green");}else{$('#nut2_f6').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f6').val(json.opcion3);
                        }else{$('#nut3_f6').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f6').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f6').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f6').css("background-color","green");}else{$('#nut3_f6').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f6').val(json.opcion4);
                        }else{$('#nut4_f6').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f6').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f6').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f6').css("background-color","green");}else{$('#nut4_f6').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f6').val(json.opcion5);
                        }else{$('#nut5_f6').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f6').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f6').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f6').css("background-color","green");}else{$('#nut5_f6').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f6').val(json.opcion6);
                        }else{$('#nut6_f6').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f6').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f6').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f6').css("background-color","green");}else{$('#nut6_f6').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc6(){
            var porc = $('#porcion6').val(), alim1 = $('#tag6').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad6').val(" " + cant + json.unidad), $('#grupo6').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f6').val(json.opcion1);
                        }else{$('#nut1_f6').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f6').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f6').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f6').css("background-color","green");}else{$('#nut1_f6').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f6').val(json.opcion2);
                        }else{$('#nut2_f6').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f6').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f6').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f6').css("background-color","green");}else{$('#nut2_f6').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f6').val(json.opcion3);
                        }else{$('#nut3_f6').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f6').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f6').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f6').css("background-color","green");}else{$('#nut3_f6').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f6').val(json.opcion4);
                        }else{$('#nut4_f6').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f6').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f6').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f6').css("background-color","green");}else{$('#nut4_f6').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f6').val(json.opcion5);
                        }else{$('#nut5_f6').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f6').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f6').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f6').css("background-color","green");}else{$('#nut5_f6').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f6').val(json.opcion6);
                        }else{$('#nut6_f6').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f6').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f6').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f6').css("background-color","green");}else{$('#nut6_f6').css("background-color","transparent");}
                    }
                });
        }

        function calcular7(){
            var porc = $('#porcion7').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag7').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad7').val(" " + cant + json.unidad), $('#grupo7').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f7').val(json.opcion1);
                        }else{$('#nut1_f7').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f7').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f7').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f7').css("background-color","green");}else{$('#nut1_f7').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f7').val(json.opcion2);
                        }else{$('#nut2_f7').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f7').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f7').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f7').css("background-color","green");}else{$('#nut2_f7').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f7').val(json.opcion3);
                        }else{$('#nut3_f7').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f7').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f7').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f7').css("background-color","green");}else{$('#nut3_f7').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f7').val(json.opcion4);
                        }else{$('#nut4_f7').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f7').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f7').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f7').css("background-color","green");}else{$('#nut4_f7').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f7').val(json.opcion5);
                        }else{$('#nut5_f7').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f7').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f7').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f7').css("background-color","green");}else{$('#nut5_f7').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f7').val(json.opcion6);
                        }else{$('#nut6_f7').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f7').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f7').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f7').css("background-color","green");}else{$('#nut6_f7').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc7(){
            var porc = $('#porcion7').val(), alim1 = $('#tag7').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad7').val(" " + cant + json.unidad), $('#grupo7').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f7').val(json.opcion1);
                        }else{$('#nut1_f7').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f7').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f7').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f7').css("background-color","green");}else{$('#nut1_f7').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f7').val(json.opcion2);
                        }else{$('#nut2_f7').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f7').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f7').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f7').css("background-color","green");}else{$('#nut2_f7').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f7').val(json.opcion3);
                        }else{$('#nut3_f7').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f7').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f7').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f7').css("background-color","green");}else{$('#nut3_f7').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f7').val(json.opcion4);
                        }else{$('#nut4_f7').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f7').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f7').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f7').css("background-color","green");}else{$('#nut4_f7').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f7').val(json.opcion5);
                        }else{$('#nut5_f7').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f7').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f7').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f7').css("background-color","green");}else{$('#nut5_f7').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f7').val(json.opcion6);
                        }else{$('#nut6_f7').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f7').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f7').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f7').css("background-color","green");}else{$('#nut6_f7').css("background-color","transparent");}
                    }
                });
        }

        function calcular8(){
            var porc = $('#porcion8').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag8').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad8').val(" " + cant + json.unidad), $('#grupo8').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f8').val(json.opcion1);
                        }else{$('#nut1_f8').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f8').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f8').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f8').css("background-color","green");}else{$('#nut1_f8').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f8').val(json.opcion2);
                        }else{$('#nut2_f8').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f8').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f8').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f8').css("background-color","green");}else{$('#nut2_f8').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f8').val(json.opcion3);
                        }else{$('#nut3_f8').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f8').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f8').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f8').css("background-color","green");}else{$('#nut3_f8').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f8').val(json.opcion4);
                        }else{$('#nut4_f8').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f8').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f8').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f8').css("background-color","green");}else{$('#nut4_f8').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f8').val(json.opcion5);
                        }else{$('#nut5_f8').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f8').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f8').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f8').css("background-color","green");}else{$('#nut5_f8').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f8').val(json.opcion6);
                        }else{$('#nut6_f8').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f8').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f8').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f8').css("background-color","green");}else{$('#nut6_f8').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc8(){
            var porc = $('#porcion8').val(), alim1 = $('#tag8').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad8').val(" " + cant + json.unidad), $('#grupo8').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f8').val(json.opcion1);
                        }else{$('#nut1_f8').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f8').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f8').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f8').css("background-color","green");}else{$('#nut1_f8').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f8').val(json.opcion2);
                        }else{$('#nut2_f8').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f8').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f8').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f8').css("background-color","green");}else{$('#nut2_f8').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f8').val(json.opcion3);
                        }else{$('#nut3_f8').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f8').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f8').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f8').css("background-color","green");}else{$('#nut3_f8').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f8').val(json.opcion4);
                        }else{$('#nut4_f8').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f8').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f8').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f8').css("background-color","green");}else{$('#nut4_f8').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f8').val(json.opcion5);
                        }else{$('#nut5_f8').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f8').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f8').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f8').css("background-color","green");}else{$('#nut5_f8').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f8').val(json.opcion6);
                        }else{$('#nut6_f8').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f8').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f8').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f8').css("background-color","green");}else{$('#nut6_f8').css("background-color","transparent");}
                    }
                });
        }

        function calcular9(){
            var porc = $('#porcion9').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag9').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad9').val(" " + cant + json.unidad), $('#grupo9').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f9').val(json.opcion1);
                        }else{$('#nut1_f9').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f9').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f9').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f9').css("background-color","green");}else{$('#nut1_f9').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f9').val(json.opcion2);
                        }else{$('#nut2_f9').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f9').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f9').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f9').css("background-color","green");}else{$('#nut2_f9').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f9').val(json.opcion3);
                        }else{$('#nut3_f9').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f9').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f9').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f9').css("background-color","green");}else{$('#nut3_f9').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f9').val(json.opcion4);
                        }else{$('#nut4_f9').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f9').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f9').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f9').css("background-color","green");}else{$('#nut4_f9').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f9').val(json.opcion5);
                        }else{$('#nut5_f9').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f9').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f9').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f9').css("background-color","green");}else{$('#nut5_f9').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f9').val(json.opcion6);
                        }else{$('#nut6_f9').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f9').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f9').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f9').css("background-color","green");}else{$('#nut6_f9').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc9(){
            var porc = $('#porcion9').val(), alim1 = $('#tag9').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad9').val(" " + cant + json.unidad), $('#grupo9').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f9').val(json.opcion1);
                        }else{$('#nut1_f9').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f9').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f9').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f9').css("background-color","green");}else{$('#nut1_f9').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f9').val(json.opcion2);
                        }else{$('#nut2_f9').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f9').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f9').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f9').css("background-color","green");}else{$('#nut2_f9').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f9').val(json.opcion3);
                        }else{$('#nut3_f9').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f9').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f9').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f9').css("background-color","green");}else{$('#nut3_f9').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f9').val(json.opcion4);
                        }else{$('#nut4_f9').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f9').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f9').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f9').css("background-color","green");}else{$('#nut4_f9').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f9').val(json.opcion5);
                        }else{$('#nut5_f9').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f9').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f9').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f9').css("background-color","green");}else{$('#nut5_f9').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f9').val(json.opcion6);
                        }else{$('#nut6_f9').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f9').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f9').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f9').css("background-color","green");}else{$('#nut6_f9').css("background-color","transparent");}
                    }
                });
        }

        function calcular10(){
            var porc = $('#porcion10').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag10').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad10').val(" " + cant + json.unidad), $('#grupo10').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f10').val(json.opcion1);
                        }else{$('#nut1_f10').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f10').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f10').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f10').css("background-color","green");}else{$('#nut1_f10').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f10').val(json.opcion2);
                        }else{$('#nut2_f10').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f10').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f10').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f10').css("background-color","green");}else{$('#nut2_f10').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f10').val(json.opcion3);
                        }else{$('#nut3_f10').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f10').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f10').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f10').css("background-color","green");}else{$('#nut3_f10').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f10').val(json.opcion4);
                        }else{$('#nut4_f10').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f10').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f10').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f10').css("background-color","green");}else{$('#nut4_f10').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f10').val(json.opcion5);
                        }else{$('#nut5_f10').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f10').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f10').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f10').css("background-color","green");}else{$('#nut5_f10').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f10').val(json.opcion6);
                        }else{$('#nut6_f10').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f10').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f10').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f10').css("background-color","green");}else{$('#nut6_f10').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc10(){
            var porc = $('#porcion10').val(), alim1 = $('#tag10').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad10').val(" " + cant + json.unidad), $('#grupo10').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f10').val(json.opcion1);
                        }else{$('#nut1_f10').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f10').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f10').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f10').css("background-color","green");}else{$('#nut1_f10').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f10').val(json.opcion2);
                        }else{$('#nut2_f10').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f10').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f10').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f10').css("background-color","green");}else{$('#nut2_f10').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f10').val(json.opcion3);
                        }else{$('#nut3_f10').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f10').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f10').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f10').css("background-color","green");}else{$('#nut3_f10').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f10').val(json.opcion4);
                        }else{$('#nut4_f10').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f10').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f10').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f10').css("background-color","green");}else{$('#nut4_f10').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f10').val(json.opcion5);
                        }else{$('#nut5_f10').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f10').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f10').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f10').css("background-color","green");}else{$('#nut5_f10').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f10').val(json.opcion6);
                        }else{$('#nut6_f10').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f10').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f10').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f10').css("background-color","green");}else{$('#nut6_f10').css("background-color","transparent");}
                    }
                });
        }

        function calcular11(){
            var porc = $('#porcion11').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag11').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad11').val(" " + cant + json.unidad), $('#grupo11').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f11').val(json.opcion1);
                        }else{$('#nut1_f11').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f11').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f11').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f11').css("background-color","green");}else{$('#nut1_f11').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f11').val(json.opcion2);
                        }else{$('#nut2_f11').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f11').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f11').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f11').css("background-color","green");}else{$('#nut2_f11').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f11').val(json.opcion3);
                        }else{$('#nut3_f11').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f11').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f11').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f11').css("background-color","green");}else{$('#nut3_f11').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f11').val(json.opcion4);
                        }else{$('#nut4_f11').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f11').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f11').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f11').css("background-color","green");}else{$('#nut4_f11').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f11').val(json.opcion5);
                        }else{$('#nut5_f11').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f11').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f11').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f11').css("background-color","green");}else{$('#nut5_f11').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f11').val(json.opcion6);
                        }else{$('#nut6_f11').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f11').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f11').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f11').css("background-color","green");}else{$('#nut6_f11').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc11(){
            var porc = $('#porcion11').val(), alim1 = $('#tag11').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad11').val(" " + cant + json.unidad), $('#grupo11').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f11').val(json.opcion1);
                        }else{$('#nut1_f11').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f11').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f11').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f11').css("background-color","green");}else{$('#nut1_f11').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f11').val(json.opcion2);
                        }else{$('#nut2_f11').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f11').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f11').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f11').css("background-color","green");}else{$('#nut2_f11').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f11').val(json.opcion3);
                        }else{$('#nut3_f11').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f11').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f11').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f11').css("background-color","green");}else{$('#nut3_f11').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f11').val(json.opcion4);
                        }else{$('#nut4_f11').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f11').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f11').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f11').css("background-color","green");}else{$('#nut4_f11').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f11').val(json.opcion5);
                        }else{$('#nut5_f11').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f11').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f11').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f11').css("background-color","green");}else{$('#nut5_f11').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f11').val(json.opcion6);
                        }else{$('#nut6_f11').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f11').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f11').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f11').css("background-color","green");}else{$('#nut6_f11').css("background-color","transparent");}
                    }
                });
        }

        function calcular12(){
            var porc = $('#porcion12').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag12').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad12').val(" " + cant + json.unidad), $('#grupo12').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f12').val(json.opcion1);
                        }else{$('#nut1_f12').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f12').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f12').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f12').css("background-color","green");}else{$('#nut1_f12').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f12').val(json.opcion2);
                        }else{$('#nut2_f12').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f12').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f12').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f12').css("background-color","green");}else{$('#nut2_f12').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f12').val(json.opcion3);
                        }else{$('#nut3_f12').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f12').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f12').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f12').css("background-color","green");}else{$('#nut3_f12').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f12').val(json.opcion4);
                        }else{$('#nut4_f12').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f12').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f12').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f12').css("background-color","green");}else{$('#nut4_f12').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f12').val(json.opcion5);
                        }else{$('#nut5_f12').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f12').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f12').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f12').css("background-color","green");}else{$('#nut5_f12').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f12').val(json.opcion6);
                        }else{$('#nut6_f12').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f12').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f12').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f12').css("background-color","green");}else{$('#nut6_f12').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc12(){
            var porc = $('#porcion12').val(), alim1 = $('#tag12').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad12').val(" " + cant + json.unidad), $('#grupo12').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f12').val(json.opcion1);
                        }else{$('#nut1_f12').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f12').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f12').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f12').css("background-color","green");}else{$('#nut1_f12').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f12').val(json.opcion2);
                        }else{$('#nut2_f12').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f12').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f12').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f12').css("background-color","green");}else{$('#nut2_f12').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f12').val(json.opcion3);
                        }else{$('#nut3_f12').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f12').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f12').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f12').css("background-color","green");}else{$('#nut3_f12').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f12').val(json.opcion4);
                        }else{$('#nut4_f12').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f12').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f12').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f12').css("background-color","green");}else{$('#nut4_f12').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f12').val(json.opcion5);
                        }else{$('#nut5_f12').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f12').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f12').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f12').css("background-color","green");}else{$('#nut5_f12').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f12').val(json.opcion6);
                        }else{$('#nut6_f12').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f12').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f12').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f12').css("background-color","green");}else{$('#nut6_f12').css("background-color","transparent");}
                    }
                });
        }

        function calcular13(){
            var porc = $('#porcion13').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag13').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad13').val(" " + cant + json.unidad), $('#grupo13').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f13').val(json.opcion1);
                        }else{$('#nut1_f13').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f13').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f13').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f13').css("background-color","green");}else{$('#nut1_f13').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f13').val(json.opcion2);
                        }else{$('#nut2_f13').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f13').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f13').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f13').css("background-color","green");}else{$('#nut2_f13').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f13').val(json.opcion3);
                        }else{$('#nut3_f13').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f13').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f13').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f13').css("background-color","green");}else{$('#nut3_f13').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f13').val(json.opcion4);
                        }else{$('#nut4_f13').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f13').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f13').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f13').css("background-color","green");}else{$('#nut4_f13').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f13').val(json.opcion5);
                        }else{$('#nut5_f13').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f13').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f13').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f13').css("background-color","green");}else{$('#nut5_f13').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f13').val(json.opcion6);
                        }else{$('#nut6_f13').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f13').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f13').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f13').css("background-color","green");}else{$('#nut6_f13').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc13(){
            var porc = $('#porcion13').val(), alim1 = $('#tag13').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad13').val(" " + cant + json.unidad), $('#grupo13').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f13').val(json.opcion1);
                        }else{$('#nut1_f13').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f13').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f13').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f13').css("background-color","green");}else{$('#nut1_f13').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f13').val(json.opcion2);
                        }else{$('#nut2_f13').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f13').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f13').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f13').css("background-color","green");}else{$('#nut2_f13').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f13').val(json.opcion3);
                        }else{$('#nut3_f13').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f13').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f13').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f13').css("background-color","green");}else{$('#nut3_f13').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f13').val(json.opcion4);
                        }else{$('#nut4_f13').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f13').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f13').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f13').css("background-color","green");}else{$('#nut4_f13').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f13').val(json.opcion5);
                        }else{$('#nut5_f13').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f13').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f13').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f13').css("background-color","green");}else{$('#nut5_f13').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f13').val(json.opcion6);
                        }else{$('#nut6_f13').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f13').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f13').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f13').css("background-color","green");}else{$('#nut6_f13').css("background-color","transparent");}
                    }
                });
        }

        function calcular14(){
            var porc = $('#porcion14').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag14').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad14').val(" " + cant + json.unidad), $('#grupo14').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f14').val(json.opcion1);
                        }else{$('#nut1_f14').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f14').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f14').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f14').css("background-color","green");}else{$('#nut1_f14').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f14').val(json.opcion2);
                        }else{$('#nut2_f14').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f14').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f14').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f14').css("background-color","green");}else{$('#nut2_f14').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f14').val(json.opcion3);
                        }else{$('#nut3_f14').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f14').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f14').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f14').css("background-color","green");}else{$('#nut3_f14').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f14').val(json.opcion4);
                        }else{$('#nut4_f14').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f14').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f14').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f14').css("background-color","green");}else{$('#nut4_f14').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f14').val(json.opcion5);
                        }else{$('#nut5_f14').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f14').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f14').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f14').css("background-color","green");}else{$('#nut5_f14').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f14').val(json.opcion6);
                        }else{$('#nut6_f14').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f14').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f14').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f14').css("background-color","green");}else{$('#nut6_f14').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc14(){
            var porc = $('#porcion14').val(), alim1 = $('#tag14').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad14').val(" " + cant + json.unidad), $('#grupo14').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f14').val(json.opcion1);
                        }else{$('#nut1_f14').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f14').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f14').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f14').css("background-color","green");}else{$('#nut1_f14').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f14').val(json.opcion2);
                        }else{$('#nut2_f14').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f14').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f14').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f14').css("background-color","green");}else{$('#nut2_f14').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f14').val(json.opcion3);
                        }else{$('#nut3_f14').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f14').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f14').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f14').css("background-color","green");}else{$('#nut3_f14').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f14').val(json.opcion4);
                        }else{$('#nut4_f14').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f14').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f14').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f14').css("background-color","green");}else{$('#nut4_f14').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f14').val(json.opcion5);
                        }else{$('#nut5_f14').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f14').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f14').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f14').css("background-color","green");}else{$('#nut5_f14').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f14').val(json.opcion6);
                        }else{$('#nut6_f14').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f14').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f14').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f14').css("background-color","green");}else{$('#nut6_f14').css("background-color","transparent");}
                    }
                });
        }

        function calcular15(){
            var porc = $('#porcion15').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag15').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad15').val(" " + cant + json.unidad), $('#grupo15').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f15').val(json.opcion1);
                        }else{$('#nut1_f15').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f15').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f15').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f15').css("background-color","green");}else{$('#nut1_f15').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f15').val(json.opcion2);
                        }else{$('#nut2_f15').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f15').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f15').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f15').css("background-color","green");}else{$('#nut2_f15').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f15').val(json.opcion3);
                        }else{$('#nut3_f15').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f15').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f15').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f15').css("background-color","green");}else{$('#nut3_f15').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f15').val(json.opcion4);
                        }else{$('#nut4_f15').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f15').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f15').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f15').css("background-color","green");}else{$('#nut4_f15').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f15').val(json.opcion5);
                        }else{$('#nut5_f15').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f15').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f15').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f15').css("background-color","green");}else{$('#nut5_f15').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f15').val(json.opcion6);
                        }else{$('#nut6_f15').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f15').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f15').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f15').css("background-color","green");}else{$('#nut6_f15').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc15(){
            var porc = $('#porcion15').val(), alim1 = $('#tag15').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad15').val(" " + cant + json.unidad), $('#grupo15').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f15').val(json.opcion1);
                        }else{$('#nut1_f15').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f15').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f15').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f15').css("background-color","green");}else{$('#nut1_f15').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f15').val(json.opcion2);
                        }else{$('#nut2_f15').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f15').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f15').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f15').css("background-color","green");}else{$('#nut2_f15').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f15').val(json.opcion3);
                        }else{$('#nut3_f15').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f15').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f15').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f15').css("background-color","green");}else{$('#nut3_f15').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f15').val(json.opcion4);
                        }else{$('#nut4_f15').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f15').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f15').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f15').css("background-color","green");}else{$('#nut4_f15').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f15').val(json.opcion5);
                        }else{$('#nut5_f15').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f15').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f15').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f15').css("background-color","green");}else{$('#nut5_f15').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f15').val(json.opcion6);
                        }else{$('#nut6_f15').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f15').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f15').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f15').css("background-color","green");}else{$('#nut6_f15').css("background-color","transparent");}
                    }
                });
        }

        function calcular16(){
            var porc = $('#porcion16').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag16').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad16').val(" " + cant + json.unidad), $('#grupo16').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f16').val(json.opcion1);
                        }else{$('#nut1_f16').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f16').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f16').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f16').css("background-color","green");}else{$('#nut1_f16').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f16').val(json.opcion2);
                        }else{$('#nut2_f16').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f16').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f16').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f16').css("background-color","green");}else{$('#nut2_f16').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f16').val(json.opcion3);
                        }else{$('#nut3_f16').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f16').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f16').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f16').css("background-color","green");}else{$('#nut3_f16').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f16').val(json.opcion4);
                        }else{$('#nut4_f16').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f16').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f16').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f16').css("background-color","green");}else{$('#nut4_f16').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f16').val(json.opcion5);
                        }else{$('#nut5_f16').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f16').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f16').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f16').css("background-color","green");}else{$('#nut5_f16').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f16').val(json.opcion6);
                        }else{$('#nut6_f16').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f16').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f16').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f16').css("background-color","green");}else{$('#nut6_f16').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc16(){
            var porc = $('#porcion16').val(), alim1 = $('#tag16').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad16').val(" " + cant + json.unidad), $('#grupo16').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f16').val(json.opcion1);
                        }else{$('#nut1_f16').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f16').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f16').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f16').css("background-color","green");}else{$('#nut1_f16').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f16').val(json.opcion2);
                        }else{$('#nut2_f16').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f16').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f16').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f16').css("background-color","green");}else{$('#nut2_f16').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f16').val(json.opcion3);
                        }else{$('#nut3_f16').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f16').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f16').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f16').css("background-color","green");}else{$('#nut3_f16').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f16').val(json.opcion4);
                        }else{$('#nut4_f16').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f16').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f16').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f16').css("background-color","green");}else{$('#nut4_f16').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f16').val(json.opcion5);
                        }else{$('#nut5_f16').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f16').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f16').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f16').css("background-color","green");}else{$('#nut5_f16').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f16').val(json.opcion6);
                        }else{$('#nut6_f16').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f16').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f16').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f16').css("background-color","green");}else{$('#nut6_f16').css("background-color","transparent");}
                    }
                });
        }

        function calcular17(){
            var porc = $('#porcion17').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag17').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad17').val(" " + cant + json.unidad), $('#grupo17').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f17').val(json.opcion1);
                        }else{$('#nut1_f17').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f17').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f17').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f17').css("background-color","green");}else{$('#nut1_f17').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f17').val(json.opcion2);
                        }else{$('#nut2_f17').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f17').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f17').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f17').css("background-color","green");}else{$('#nut2_f17').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f17').val(json.opcion3);
                        }else{$('#nut3_f17').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f17').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f17').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f17').css("background-color","green");}else{$('#nut3_f17').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f17').val(json.opcion4);
                        }else{$('#nut4_f17').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f17').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f17').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f17').css("background-color","green");}else{$('#nut4_f17').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f17').val(json.opcion5);
                        }else{$('#nut5_f17').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f17').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f17').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f17').css("background-color","green");}else{$('#nut5_f17').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f17').val(json.opcion6);
                        }else{$('#nut6_f17').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f17').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f17').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f17').css("background-color","green");}else{$('#nut6_f17').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc17(){
            var porc = $('#porcion17').val(), alim1 = $('#tag17').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad17').val(" " + cant + json.unidad), $('#grupo17').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f17').val(json.opcion1);
                        }else{$('#nut1_f17').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f17').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f17').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f17').css("background-color","green");}else{$('#nut1_f17').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f17').val(json.opcion2);
                        }else{$('#nut2_f17').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f17').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f17').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f17').css("background-color","green");}else{$('#nut2_f17').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f17').val(json.opcion3);
                        }else{$('#nut3_f17').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f17').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f17').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f17').css("background-color","green");}else{$('#nut3_f17').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f17').val(json.opcion4);
                        }else{$('#nut4_f17').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f17').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f17').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f17').css("background-color","green");}else{$('#nut4_f17').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f17').val(json.opcion5);
                        }else{$('#nut5_f17').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f17').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f17').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f17').css("background-color","green");}else{$('#nut5_f17').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f17').val(json.opcion6);
                        }else{$('#nut6_f17').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f17').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f17').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f17').css("background-color","green");}else{$('#nut6_f17').css("background-color","transparent");}
                    }
                });
        }

        function calcular18(){
            var porc = $('#porcion18').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag18').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad18').val(" " + cant + json.unidad), $('#grupo18').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f18').val(json.opcion1);
                        }else{$('#nut1_f18').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f18').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f18').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f18').css("background-color","green");}else{$('#nut1_f18').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f18').val(json.opcion2);
                        }else{$('#nut2_f18').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f18').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f18').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f18').css("background-color","green");}else{$('#nut2_f18').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f18').val(json.opcion3);
                        }else{$('#nut3_f18').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f18').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f18').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f18').css("background-color","green");}else{$('#nut3_f18').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f18').val(json.opcion4);
                        }else{$('#nut4_f18').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f18').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f18').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f18').css("background-color","green");}else{$('#nut4_f18').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f18').val(json.opcion5);
                        }else{$('#nut5_f18').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f18').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f18').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f18').css("background-color","green");}else{$('#nut5_f18').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f18').val(json.opcion6);
                        }else{$('#nut6_f18').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f18').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f18').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f18').css("background-color","green");}else{$('#nut6_f18').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc18(){
            var porc = $('#porcion18').val(), alim1 = $('#tag18').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad18').val(" " + cant + json.unidad), $('#grupo18').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f18').val(json.opcion1);
                        }else{$('#nut1_f18').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f18').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f18').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f18').css("background-color","green");}else{$('#nut1_f18').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f18').val(json.opcion2);
                        }else{$('#nut2_f18').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f18').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f18').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f18').css("background-color","green");}else{$('#nut2_f18').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f18').val(json.opcion3);
                        }else{$('#nut3_f18').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f18').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f18').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f18').css("background-color","green");}else{$('#nut3_f18').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f18').val(json.opcion4);
                        }else{$('#nut4_f18').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f18').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f18').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f18').css("background-color","green");}else{$('#nut4_f18').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f18').val(json.opcion5);
                        }else{$('#nut5_f18').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f18').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f18').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f18').css("background-color","green");}else{$('#nut5_f18').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f18').val(json.opcion6);
                        }else{$('#nut6_f18').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f18').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f18').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f18').css("background-color","green");}else{$('#nut6_f18').css("background-color","transparent");}
                    }
                });
        }

        function calcular19(){
            var porc = $('#porcion19').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag19').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad19').val(" " + cant + json.unidad), $('#grupo19').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f19').val(json.opcion1);
                        }else{$('#nut1_f19').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f19').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f19').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f19').css("background-color","green");}else{$('#nut1_f19').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f19').val(json.opcion2);
                        }else{$('#nut2_f19').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f19').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f19').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f19').css("background-color","green");}else{$('#nut2_f19').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f19').val(json.opcion3);
                        }else{$('#nut3_f19').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f19').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f19').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f19').css("background-color","green");}else{$('#nut3_f19').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f19').val(json.opcion4);
                        }else{$('#nut4_f19').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f19').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f19').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f19').css("background-color","green");}else{$('#nut4_f19').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f19').val(json.opcion5);
                        }else{$('#nut5_f19').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f19').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f19').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f19').css("background-color","green");}else{$('#nut5_f19').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f19').val(json.opcion6);
                        }else{$('#nut6_f19').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f19').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f19').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f19').css("background-color","green");}else{$('#nut6_f19').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc19(){
            var porc = $('#porcion19').val(), alim1 = $('#tag19').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad19').val(" " + cant + json.unidad), $('#grupo19').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f19').val(json.opcion1);
                        }else{$('#nut1_f19').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f19').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f19').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f19').css("background-color","green");}else{$('#nut1_f19').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f19').val(json.opcion2);
                        }else{$('#nut2_f19').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f19').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f19').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f19').css("background-color","green");}else{$('#nut2_f19').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f19').val(json.opcion3);
                        }else{$('#nut3_f19').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f19').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f19').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f19').css("background-color","green");}else{$('#nut3_f19').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f19').val(json.opcion4);
                        }else{$('#nut4_f19').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f19').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f19').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f19').css("background-color","green");}else{$('#nut4_f19').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f19').val(json.opcion5);
                        }else{$('#nut5_f19').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f19').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f19').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f19').css("background-color","green");}else{$('#nut5_f19').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f19').val(json.opcion6);
                        }else{$('#nut6_f19').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f19').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f19').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f19').css("background-color","green");}else{$('#nut6_f19').css("background-color","transparent");}
                    }
                });
        }

        function calcular20(){
            var porc = $('#porcion20').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag20').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad20').val(" " + cant + json.unidad), $('#grupo20').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f20').val(json.opcion1);
                        }else{$('#nut1_f20').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f20').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f20').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f20').css("background-color","green");}else{$('#nut1_f20').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f20').val(json.opcion2);
                        }else{$('#nut2_f20').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f20').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f20').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f20').css("background-color","green");}else{$('#nut2_f20').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f20').val(json.opcion3);
                        }else{$('#nut3_f20').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f20').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f20').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f20').css("background-color","green");}else{$('#nut3_f20').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f20').val(json.opcion4);
                        }else{$('#nut4_f20').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f20').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f20').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f20').css("background-color","green");}else{$('#nut4_f20').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f20').val(json.opcion5);
                        }else{$('#nut5_f20').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f20').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f20').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f20').css("background-color","green");}else{$('#nut5_f20').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f20').val(json.opcion6);
                        }else{$('#nut6_f20').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f20').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f20').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f20').css("background-color","green");}else{$('#nut6_f20').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc20(){
            var porc = $('#porcion20').val(), alim1 = $('#tag20').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad20').val(" " + cant + json.unidad), $('#grupo20').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f20').val(json.opcion1);
                        }else{$('#nut1_f20').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f20').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f20').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f20').css("background-color","green");}else{$('#nut1_f20').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f20').val(json.opcion2);
                        }else{$('#nut2_f20').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f20').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f20').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f20').css("background-color","green");}else{$('#nut2_f20').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f20').val(json.opcion3);
                        }else{$('#nut3_f20').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f20').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f20').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f20').css("background-color","green");}else{$('#nut3_f20').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f20').val(json.opcion4);
                        }else{$('#nut4_f20').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f20').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f20').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f20').css("background-color","green");}else{$('#nut4_f20').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f20').val(json.opcion5);
                        }else{$('#nut5_f20').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f20').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f20').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f20').css("background-color","green");}else{$('#nut5_f20').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f20').val(json.opcion6);
                        }else{$('#nut6_f20').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f20').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f20').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f20').css("background-color","green");}else{$('#nut6_f20').css("background-color","transparent");}
                    }
                });
        }

        function calcular21(){
            var porc = $('#porcion21').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag21').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad21').val(" " + cant + json.unidad), $('#grupo21').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f21').val(json.opcion1);
                        }else{$('#nut1_f21').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f21').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f21').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f21').css("background-color","green");}else{$('#nut1_f21').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f21').val(json.opcion2);
                        }else{$('#nut2_f21').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f21').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f21').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f21').css("background-color","green");}else{$('#nut2_f21').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f21').val(json.opcion3);
                        }else{$('#nut3_f21').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f21').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f21').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f21').css("background-color","green");}else{$('#nut3_f21').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f21').val(json.opcion4);
                        }else{$('#nut4_f21').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f21').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f21').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f21').css("background-color","green");}else{$('#nut4_f21').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f21').val(json.opcion5);
                        }else{$('#nut5_f21').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f21').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f21').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f21').css("background-color","green");}else{$('#nut5_f21').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f21').val(json.opcion6);
                        }else{$('#nut6_f21').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f21').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f21').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f21').css("background-color","green");}else{$('#nut6_f21').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc21(){
            var porc = $('#porcion21').val(), alim1 = $('#tag21').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad21').val(" " + cant + json.unidad), $('#grupo21').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f21').val(json.opcion1);
                        }else{$('#nut1_f21').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f21').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f21').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f21').css("background-color","green");}else{$('#nut1_f21').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f21').val(json.opcion2);
                        }else{$('#nut2_f21').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f21').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f21').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f21').css("background-color","green");}else{$('#nut2_f21').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f21').val(json.opcion3);
                        }else{$('#nut3_f21').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f21').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f21').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f21').css("background-color","green");}else{$('#nut3_f21').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f21').val(json.opcion4);
                        }else{$('#nut4_f21').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f21').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f21').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f21').css("background-color","green");}else{$('#nut4_f21').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f21').val(json.opcion5);
                        }else{$('#nut5_f21').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f21').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f21').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f21').css("background-color","green");}else{$('#nut5_f21').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f21').val(json.opcion6);
                        }else{$('#nut6_f21').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f21').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f21').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f21').css("background-color","green");}else{$('#nut6_f21').css("background-color","transparent");}
                    }
                });
        }

        function calcular22(){
            var porc = $('#porcion22').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag22').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad22').val(" " + cant + json.unidad), $('#grupo22').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f22').val(json.opcion1);
                        }else{$('#nut1_f22').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f22').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f22').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f22').css("background-color","green");}else{$('#nut1_f22').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f22').val(json.opcion2);
                        }else{$('#nut2_f22').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f22').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f22').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f22').css("background-color","green");}else{$('#nut2_f22').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f22').val(json.opcion3);
                        }else{$('#nut3_f22').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f22').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f22').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f22').css("background-color","green");}else{$('#nut3_f22').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f22').val(json.opcion4);
                        }else{$('#nut4_f22').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f22').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f22').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f22').css("background-color","green");}else{$('#nut4_f22').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f22').val(json.opcion5);
                        }else{$('#nut5_f22').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f22').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f22').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f22').css("background-color","green");}else{$('#nut5_f22').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f22').val(json.opcion6);
                        }else{$('#nut6_f22').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f22').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f22').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f22').css("background-color","green");}else{$('#nut6_f22').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc22(){
            var porc = $('#porcion22').val(), alim1 = $('#tag22').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad22').val(" " + cant + json.unidad), $('#grupo22').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f22').val(json.opcion1);
                        }else{$('#nut1_f22').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f22').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f22').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f22').css("background-color","green");}else{$('#nut1_f22').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f22').val(json.opcion2);
                        }else{$('#nut2_f22').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f22').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f22').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f22').css("background-color","green");}else{$('#nut2_f22').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f22').val(json.opcion3);
                        }else{$('#nut3_f22').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f22').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f22').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f22').css("background-color","green");}else{$('#nut3_f22').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f22').val(json.opcion4);
                        }else{$('#nut4_f22').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f22').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f22').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f22').css("background-color","green");}else{$('#nut4_f22').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f22').val(json.opcion5);
                        }else{$('#nut5_f22').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f22').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f22').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f22').css("background-color","green");}else{$('#nut5_f22').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f22').val(json.opcion6);
                        }else{$('#nut6_f22').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f22').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f22').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f22').css("background-color","green");}else{$('#nut6_f22').css("background-color","transparent");}
                    }
                });
        }

        function calcular23(){
            var porc = $('#porcion23').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag23').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad23').val(" " + cant + json.unidad), $('#grupo23').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f23').val(json.opcion1);
                        }else{$('#nut1_f23').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f23').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f23').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f23').css("background-color","green");}else{$('#nut1_f23').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f23').val(json.opcion2);
                        }else{$('#nut2_f23').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f23').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f23').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f23').css("background-color","green");}else{$('#nut2_f23').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f23').val(json.opcion3);
                        }else{$('#nut3_f23').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f23').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f23').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f23').css("background-color","green");}else{$('#nut3_f23').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f23').val(json.opcion4);
                        }else{$('#nut4_f23').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f23').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f23').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f23').css("background-color","green");}else{$('#nut4_f23').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f23').val(json.opcion5);
                        }else{$('#nut5_f23').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f23').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f23').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f23').css("background-color","green");}else{$('#nut5_f23').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f23').val(json.opcion6);
                        }else{$('#nut6_f23').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f23').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f23').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f23').css("background-color","green");}else{$('#nut6_f23').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc23(){
            var porc = $('#porcion23').val(), alim1 = $('#tag23').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad23').val(" " + cant + json.unidad), $('#grupo23').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f23').val(json.opcion1);
                        }else{$('#nut1_f23').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f23').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f23').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f23').css("background-color","green");}else{$('#nut1_f23').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f23').val(json.opcion2);
                        }else{$('#nut2_f23').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f23').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f23').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f23').css("background-color","green");}else{$('#nut2_f23').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f23').val(json.opcion3);
                        }else{$('#nut3_f23').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f23').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f23').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f23').css("background-color","green");}else{$('#nut3_f23').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f23').val(json.opcion4);
                        }else{$('#nut4_f23').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f23').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f23').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f23').css("background-color","green");}else{$('#nut4_f23').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f23').val(json.opcion5);
                        }else{$('#nut5_f23').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f23').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f23').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f23').css("background-color","green");}else{$('#nut5_f23').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f23').val(json.opcion6);
                        }else{$('#nut6_f23').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f23').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f23').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f23').css("background-color","green");}else{$('#nut6_f23').css("background-color","transparent");}
                    }
                });
        }

        function calcular24(){
            var porc = $('#porcion24').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag24').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad24').val(" " + cant + json.unidad), $('#grupo24').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f24').val(json.opcion1);
                        }else{$('#nut1_f24').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f24').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f24').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f24').css("background-color","green");}else{$('#nut1_f24').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f24').val(json.opcion2);
                        }else{$('#nut2_f24').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f24').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f24').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f24').css("background-color","green");}else{$('#nut2_f24').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f24').val(json.opcion3);
                        }else{$('#nut3_f24').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f24').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f24').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f24').css("background-color","green");}else{$('#nut3_f24').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f24').val(json.opcion4);
                        }else{$('#nut4_f24').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f24').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f24').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f24').css("background-color","green");}else{$('#nut4_f24').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f24').val(json.opcion5);
                        }else{$('#nut5_f24').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f24').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f24').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f24').css("background-color","green");}else{$('#nut5_f24').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f24').val(json.opcion6);
                        }else{$('#nut6_f24').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f24').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f24').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f24').css("background-color","green");}else{$('#nut6_f24').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc24(){
            var porc = $('#porcion24').val(), alim1 = $('#tag24').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad24').val(" " + cant + json.unidad), $('#grupo24').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f24').val(json.opcion1);
                        }else{$('#nut1_f24').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f24').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f24').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f24').css("background-color","green");}else{$('#nut1_f24').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f24').val(json.opcion2);
                        }else{$('#nut2_f24').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f24').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f24').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f24').css("background-color","green");}else{$('#nut2_f24').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f24').val(json.opcion3);
                        }else{$('#nut3_f24').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f24').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f24').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f24').css("background-color","green");}else{$('#nut3_f24').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f24').val(json.opcion4);
                        }else{$('#nut4_f24').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f24').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f24').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f24').css("background-color","green");}else{$('#nut4_f24').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f24').val(json.opcion5);
                        }else{$('#nut5_f24').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f24').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f24').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f24').css("background-color","green");}else{$('#nut5_f24').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f24').val(json.opcion6);
                        }else{$('#nut6_f24').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f24').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f24').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f24').css("background-color","green");}else{$('#nut6_f24').css("background-color","transparent");}
                    }
                });
        }

        function calcular25(){
            var porc = $('#porcion25').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag25').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad25').val(" " + cant + json.unidad), $('#grupo25').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f25').val(json.opcion1);
                        }else{$('#nut1_f25').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f25').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f25').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f25').css("background-color","green");}else{$('#nut1_f25').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f25').val(json.opcion2);
                        }else{$('#nut2_f25').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f25').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f25').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f25').css("background-color","green");}else{$('#nut2_f25').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f25').val(json.opcion3);
                        }else{$('#nut3_f25').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f25').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f25').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f25').css("background-color","green");}else{$('#nut3_f25').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f25').val(json.opcion4);
                        }else{$('#nut4_f25').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f25').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f25').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f25').css("background-color","green");}else{$('#nut4_f25').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f25').val(json.opcion5);
                        }else{$('#nut5_f25').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f25').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f25').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f25').css("background-color","green");}else{$('#nut5_f25').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f25').val(json.opcion6);
                        }else{$('#nut6_f25').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f25').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f25').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f25').css("background-color","green");}else{$('#nut6_f25').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc25(){
            var porc = $('#porcion25').val(), alim1 = $('#tag25').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad25').val(" " + cant + json.unidad), $('#grupo25').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f25').val(json.opcion1);
                        }else{$('#nut1_f25').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f25').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f25').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f25').css("background-color","green");}else{$('#nut1_f25').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f25').val(json.opcion2);
                        }else{$('#nut2_f25').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f25').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f25').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f25').css("background-color","green");}else{$('#nut2_f25').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f25').val(json.opcion3);
                        }else{$('#nut3_f25').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f25').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f25').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f25').css("background-color","green");}else{$('#nut3_f25').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f25').val(json.opcion4);
                        }else{$('#nut4_f25').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f25').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f25').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f25').css("background-color","green");}else{$('#nut4_f25').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f25').val(json.opcion5);
                        }else{$('#nut5_f25').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f25').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f25').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f25').css("background-color","green");}else{$('#nut5_f25').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f25').val(json.opcion6);
                        }else{$('#nut6_f25').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f25').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f25').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f25').css("background-color","green");}else{$('#nut6_f25').css("background-color","transparent");}
                    }
                });
        }

        function calcular26(){
            var porc = $('#porcion26').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag26').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad26').val(" " + cant + json.unidad), $('#grupo26').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f26').val(json.opcion1);
                        }else{$('#nut1_f26').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f26').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f26').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f26').css("background-color","green");}else{$('#nut1_f26').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f26').val(json.opcion2);
                        }else{$('#nut2_f26').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f26').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f26').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f26').css("background-color","green");}else{$('#nut2_f26').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f26').val(json.opcion3);
                        }else{$('#nut3_f26').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f26').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f26').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f26').css("background-color","green");}else{$('#nut3_f26').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f26').val(json.opcion4);
                        }else{$('#nut4_f26').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f26').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f26').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f26').css("background-color","green");}else{$('#nut4_f26').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f26').val(json.opcion5);
                        }else{$('#nut5_f26').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f26').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f26').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f26').css("background-color","green");}else{$('#nut5_f26').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f26').val(json.opcion6);
                        }else{$('#nut6_f26').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f26').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f26').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f26').css("background-color","green");}else{$('#nut6_f26').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc26(){
            var porc = $('#porcion26').val(), alim1 = $('#tag26').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad26').val(" " + cant + json.unidad), $('#grupo26').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f26').val(json.opcion1);
                        }else{$('#nut1_f26').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f26').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f26').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f26').css("background-color","green");}else{$('#nut1_f26').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f26').val(json.opcion2);
                        }else{$('#nut2_f26').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f26').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f26').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f26').css("background-color","green");}else{$('#nut2_f26').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f26').val(json.opcion3);
                        }else{$('#nut3_f26').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f26').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f26').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f26').css("background-color","green");}else{$('#nut3_f26').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f26').val(json.opcion4);
                        }else{$('#nut4_f26').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f26').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f26').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f26').css("background-color","green");}else{$('#nut4_f26').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f26').val(json.opcion5);
                        }else{$('#nut5_f26').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f26').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f26').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f26').css("background-color","green");}else{$('#nut5_f26').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f26').val(json.opcion6);
                        }else{$('#nut6_f26').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f26').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f26').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f26').css("background-color","green");}else{$('#nut6_f26').css("background-color","transparent");}
                    }
                });
        }

        function calcular27(){
            var porc = $('#porcion27').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag27').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad27').val(" " + cant + json.unidad), $('#grupo27').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f27').val(json.opcion1);
                        }else{$('#nut1_f27').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f27').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f27').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f27').css("background-color","green");}else{$('#nut1_f27').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f27').val(json.opcion2);
                        }else{$('#nut2_f27').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f27').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f27').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f27').css("background-color","green");}else{$('#nut2_f27').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f27').val(json.opcion3);
                        }else{$('#nut3_f27').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f27').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f27').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f27').css("background-color","green");}else{$('#nut3_f27').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f27').val(json.opcion4);
                        }else{$('#nut4_f27').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f27').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f27').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f27').css("background-color","green");}else{$('#nut4_f27').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f27').val(json.opcion5);
                        }else{$('#nut5_f27').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f27').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f27').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f27').css("background-color","green");}else{$('#nut5_f27').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f27').val(json.opcion6);
                        }else{$('#nut6_f27').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f27').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f27').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f27').css("background-color","green");}else{$('#nut6_f27').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc27(){
            var porc = $('#porcion27').val(), alim1 = $('#tag27').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad27').val(" " + cant + json.unidad), $('#grupo27').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f27').val(json.opcion1);
                        }else{$('#nut1_f27').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f27').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f27').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f27').css("background-color","green");}else{$('#nut1_f27').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f27').val(json.opcion2);
                        }else{$('#nut2_f27').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f27').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f27').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f27').css("background-color","green");}else{$('#nut2_f27').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f27').val(json.opcion3);
                        }else{$('#nut3_f27').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f27').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f27').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f27').css("background-color","green");}else{$('#nut3_f27').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f27').val(json.opcion4);
                        }else{$('#nut4_f27').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f27').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f27').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f27').css("background-color","green");}else{$('#nut4_f27').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f27').val(json.opcion5);
                        }else{$('#nut5_f27').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f27').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f27').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f27').css("background-color","green");}else{$('#nut5_f27').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f27').val(json.opcion6);
                        }else{$('#nut6_f27').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f27').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f27').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f27').css("background-color","green");}else{$('#nut6_f27').css("background-color","transparent");}
                    }
                });
        }

        function calcular28(){
            var porc = $('#porcion28').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag28').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad28').val(" " + cant + json.unidad), $('#grupo28').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f28').val(json.opcion1);
                        }else{$('#nut1_f28').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f28').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f28').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f28').css("background-color","green");}else{$('#nut1_f28').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f28').val(json.opcion2);
                        }else{$('#nut2_f28').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f28').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f28').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f28').css("background-color","green");}else{$('#nut2_f28').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f28').val(json.opcion3);
                        }else{$('#nut3_f28').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f28').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f28').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f28').css("background-color","green");}else{$('#nut3_f28').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f28').val(json.opcion4);
                        }else{$('#nut4_f28').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f28').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f28').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f28').css("background-color","green");}else{$('#nut4_f28').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f28').val(json.opcion5);
                        }else{$('#nut5_f28').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f28').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f28').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f28').css("background-color","green");}else{$('#nut5_f28').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f28').val(json.opcion6);
                        }else{$('#nut6_f28').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f28').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f28').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f28').css("background-color","green");}else{$('#nut6_f28').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc28(){
            var porc = $('#porcion28').val(), alim1 = $('#tag28').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad28').val(" " + cant + json.unidad), $('#grupo28').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f28').val(json.opcion1);
                        }else{$('#nut1_f28').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f28').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f28').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f28').css("background-color","green");}else{$('#nut1_f28').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f28').val(json.opcion2);
                        }else{$('#nut2_f28').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f28').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f28').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f28').css("background-color","green");}else{$('#nut2_f28').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f28').val(json.opcion3);
                        }else{$('#nut3_f28').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f28').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f28').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f28').css("background-color","green");}else{$('#nut3_f28').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f28').val(json.opcion4);
                        }else{$('#nut4_f28').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f28').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f28').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f28').css("background-color","green");}else{$('#nut4_f28').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f28').val(json.opcion5);
                        }else{$('#nut5_f28').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f28').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f28').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f28').css("background-color","green");}else{$('#nut5_f28').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f28').val(json.opcion6);
                        }else{$('#nut6_f28').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f28').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f28').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f28').css("background-color","green");}else{$('#nut6_f28').css("background-color","transparent");}
                    }
                });
        }

        function calcular29(){
            var porc = $('#porcion29').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag29').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad29').val(" " + cant + json.unidad), $('#grupo29').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f29').val(json.opcion1);
                        }else{$('#nut1_f29').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f29').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f29').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f29').css("background-color","green");}else{$('#nut1_f29').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f29').val(json.opcion2);
                        }else{$('#nut2_f29').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f29').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f29').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f29').css("background-color","green");}else{$('#nut2_f29').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f29').val(json.opcion3);
                        }else{$('#nut3_f29').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f29').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f29').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f29').css("background-color","green");}else{$('#nut3_f29').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f29').val(json.opcion4);
                        }else{$('#nut4_f29').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f29').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f29').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f29').css("background-color","green");}else{$('#nut4_f29').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f29').val(json.opcion5);
                        }else{$('#nut5_f29').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f29').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f29').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f29').css("background-color","green");}else{$('#nut5_f29').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f29').val(json.opcion6);
                        }else{$('#nut6_f29').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f29').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f29').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f29').css("background-color","green");}else{$('#nut6_f29').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc29(){
            var porc = $('#porcion29').val(), alim1 = $('#tag29').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad29').val(" " + cant + json.unidad), $('#grupo29').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f29').val(json.opcion1);
                        }else{$('#nut1_f29').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f29').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f29').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f29').css("background-color","green");}else{$('#nut1_f29').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f29').val(json.opcion2);
                        }else{$('#nut2_f29').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f29').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f29').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f29').css("background-color","green");}else{$('#nut2_f29').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f29').val(json.opcion3);
                        }else{$('#nut3_f29').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f29').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f29').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f29').css("background-color","green");}else{$('#nut3_f29').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f29').val(json.opcion4);
                        }else{$('#nut4_f29').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f29').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f29').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f29').css("background-color","green");}else{$('#nut4_f29').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f29').val(json.opcion5);
                        }else{$('#nut5_f29').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f29').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f29').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f29').css("background-color","green");}else{$('#nut5_f29').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f29').val(json.opcion6);
                        }else{$('#nut6_f29').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f29').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f29').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f29').css("background-color","green");}else{$('#nut6_f29').css("background-color","transparent");}
                    }
                });
        }

        function calcular30(){
            var porc = $('#porcion30').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag30').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad30').val(" " + cant + json.unidad), $('#grupo30').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f30').val(json.opcion1);
                        }else{$('#nut1_f30').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f30').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f30').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f30').css("background-color","green");}else{$('#nut1_f30').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f30').val(json.opcion2);
                        }else{$('#nut2_f30').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f30').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f30').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f30').css("background-color","green");}else{$('#nut2_f30').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f30').val(json.opcion3);
                        }else{$('#nut3_f30').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f30').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f30').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f30').css("background-color","green");}else{$('#nut3_f30').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f30').val(json.opcion4);
                        }else{$('#nut4_f30').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f30').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f30').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f30').css("background-color","green");}else{$('#nut4_f30').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f30').val(json.opcion5);
                        }else{$('#nut5_f30').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f30').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f30').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f30').css("background-color","green");}else{$('#nut5_f30').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f30').val(json.opcion6);
                        }else{$('#nut6_f30').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f30').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f30').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f30').css("background-color","green");}else{$('#nut6_f30').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc30(){
            var porc = $('#porcion30').val(), alim1 = $('#tag30').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad30').val(" " + cant + json.unidad), $('#grupo30').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f30').val(json.opcion1);
                        }else{$('#nut1_f30').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f30').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f30').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f30').css("background-color","green");}else{$('#nut1_f30').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f30').val(json.opcion2);
                        }else{$('#nut2_f30').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f30').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f30').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f30').css("background-color","green");}else{$('#nut2_f30').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f30').val(json.opcion3);
                        }else{$('#nut3_f30').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f30').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f30').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f30').css("background-color","green");}else{$('#nut3_f30').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f30').val(json.opcion4);
                        }else{$('#nut4_f30').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f30').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f30').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f30').css("background-color","green");}else{$('#nut4_f30').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f30').val(json.opcion5);
                        }else{$('#nut5_f30').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f30').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f30').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f30').css("background-color","green");}else{$('#nut5_f30').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f30').val(json.opcion6);
                        }else{$('#nut6_f30').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f30').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f30').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f30').css("background-color","green");}else{$('#nut6_f30').css("background-color","transparent");}
                    }
                });
        }

        function calcular31(){
            var porc = $('#porcion31').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag31').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad31').val(" " + cant + json.unidad), $('#grupo31').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f31').val(json.opcion1);
                        }else{$('#nut1_f31').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f31').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f31').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f31').css("background-color","green");}else{$('#nut1_f31').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f31').val(json.opcion2);
                        }else{$('#nut2_f31').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f31').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f31').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f31').css("background-color","green");}else{$('#nut2_f31').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f31').val(json.opcion3);
                        }else{$('#nut3_f31').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f31').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f31').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f31').css("background-color","green");}else{$('#nut3_f31').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f31').val(json.opcion4);
                        }else{$('#nut4_f31').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f31').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f31').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f31').css("background-color","green");}else{$('#nut4_f31').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f31').val(json.opcion5);
                        }else{$('#nut5_f31').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f31').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f31').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f31').css("background-color","green");}else{$('#nut5_f31').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f31').val(json.opcion6);
                        }else{$('#nut6_f31').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f31').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f31').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f31').css("background-color","green");}else{$('#nut6_f31').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc31(){
            var porc = $('#porcion31').val(), alim1 = $('#tag31').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad31').val(" " + cant + json.unidad), $('#grupo31').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f31').val(json.opcion1);
                        }else{$('#nut1_f31').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f31').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f31').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f31').css("background-color","green");}else{$('#nut1_f31').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f31').val(json.opcion2);
                        }else{$('#nut2_f31').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f31').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f31').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f31').css("background-color","green");}else{$('#nut2_f31').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f31').val(json.opcion3);
                        }else{$('#nut3_f31').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f31').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f31').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f31').css("background-color","green");}else{$('#nut3_f31').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f31').val(json.opcion4);
                        }else{$('#nut4_f31').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f31').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f31').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f31').css("background-color","green");}else{$('#nut4_f31').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f31').val(json.opcion5);
                        }else{$('#nut5_f31').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f31').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f31').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f31').css("background-color","green");}else{$('#nut5_f31').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f31').val(json.opcion6);
                        }else{$('#nut6_f31').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f31').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f31').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f31').css("background-color","green");}else{$('#nut6_f31').css("background-color","transparent");}
                    }
                });
        }

        function calcular32(){
            var porc = $('#porcion32').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag32').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad32').val(" " + cant + json.unidad), $('#grupo32').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f32').val(json.opcion1);
                        }else{$('#nut1_f32').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f32').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f32').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f32').css("background-color","green");}else{$('#nut1_f32').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f32').val(json.opcion2);
                        }else{$('#nut2_f32').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f32').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f32').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f32').css("background-color","green");}else{$('#nut2_f32').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f32').val(json.opcion3);
                        }else{$('#nut3_f32').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f32').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f32').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f32').css("background-color","green");}else{$('#nut3_f32').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f32').val(json.opcion4);
                        }else{$('#nut4_f32').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f32').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f32').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f32').css("background-color","green");}else{$('#nut4_f32').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f32').val(json.opcion5);
                        }else{$('#nut5_f32').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f32').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f32').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f32').css("background-color","green");}else{$('#nut5_f32').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f32').val(json.opcion6);
                        }else{$('#nut6_f32').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f32').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f32').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f32').css("background-color","green");}else{$('#nut6_f32').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc32(){
            var porc = $('#porcion32').val(), alim1 = $('#tag32').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad32').val(" " + cant + json.unidad), $('#grupo32').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f32').val(json.opcion1);
                        }else{$('#nut1_f32').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f32').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f32').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f32').css("background-color","green");}else{$('#nut1_f32').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f32').val(json.opcion2);
                        }else{$('#nut2_f32').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f32').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f32').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f32').css("background-color","green");}else{$('#nut2_f32').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f32').val(json.opcion3);
                        }else{$('#nut3_f32').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f32').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f32').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f32').css("background-color","green");}else{$('#nut3_f32').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f32').val(json.opcion4);
                        }else{$('#nut4_f32').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f32').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f32').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f32').css("background-color","green");}else{$('#nut4_f32').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f32').val(json.opcion5);
                        }else{$('#nut5_f32').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f32').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f32').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f32').css("background-color","green");}else{$('#nut5_f32').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f32').val(json.opcion6);
                        }else{$('#nut6_f32').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f32').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f32').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f32').css("background-color","green");}else{$('#nut6_f32').css("background-color","transparent");}
                    }
                });
        }

        function calcular33(){
            var porc = $('#porcion33').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag33').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad33').val(" " + cant + json.unidad), $('#grupo33').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f33').val(json.opcion1);
                        }else{$('#nut1_f33').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f33').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f33').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f33').css("background-color","green");}else{$('#nut1_f33').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f33').val(json.opcion2);
                        }else{$('#nut2_f33').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f33').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f33').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f33').css("background-color","green");}else{$('#nut2_f33').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f33').val(json.opcion3);
                        }else{$('#nut3_f33').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f33').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f33').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f33').css("background-color","green");}else{$('#nut3_f33').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f33').val(json.opcion4);
                        }else{$('#nut4_f33').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f33').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f33').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f33').css("background-color","green");}else{$('#nut4_f33').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f33').val(json.opcion5);
                        }else{$('#nut5_f33').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f33').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f33').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f33').css("background-color","green");}else{$('#nut5_f33').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f33').val(json.opcion6);
                        }else{$('#nut6_f33').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f33').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f33').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f33').css("background-color","green");}else{$('#nut6_f33').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc33(){
            var porc = $('#porcion33').val(), alim1 = $('#tag33').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad33').val(" " + cant + json.unidad), $('#grupo33').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f33').val(json.opcion1);
                        }else{$('#nut1_f33').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f33').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f33').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f33').css("background-color","green");}else{$('#nut1_f33').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f33').val(json.opcion2);
                        }else{$('#nut2_f33').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f33').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f33').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f33').css("background-color","green");}else{$('#nut2_f33').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f33').val(json.opcion3);
                        }else{$('#nut3_f33').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f33').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f33').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f33').css("background-color","green");}else{$('#nut3_f33').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f33').val(json.opcion4);
                        }else{$('#nut4_f33').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f33').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f33').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f33').css("background-color","green");}else{$('#nut4_f33').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f33').val(json.opcion5);
                        }else{$('#nut5_f33').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f33').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f33').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f33').css("background-color","green");}else{$('#nut5_f33').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f33').val(json.opcion6);
                        }else{$('#nut6_f33').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f33').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f33').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f33').css("background-color","green");}else{$('#nut6_f33').css("background-color","transparent");}
                    }
                });
        }

        function calcular34(){
            var porc = $('#porcion34').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag34').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad34').val(" " + cant + json.unidad), $('#grupo34').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f34').val(json.opcion1);
                        }else{$('#nut1_f34').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f34').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f34').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f34').css("background-color","green");}else{$('#nut1_f34').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f34').val(json.opcion2);
                        }else{$('#nut2_f34').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f34').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f34').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f34').css("background-color","green");}else{$('#nut2_f34').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f34').val(json.opcion3);
                        }else{$('#nut3_f34').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f34').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f34').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f34').css("background-color","green");}else{$('#nut3_f34').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f34').val(json.opcion4);
                        }else{$('#nut4_f34').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f34').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f34').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f34').css("background-color","green");}else{$('#nut4_f34').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f34').val(json.opcion5);
                        }else{$('#nut5_f34').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f34').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f34').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f34').css("background-color","green");}else{$('#nut5_f34').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f34').val(json.opcion6);
                        }else{$('#nut6_f34').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f34').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f34').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f34').css("background-color","green");}else{$('#nut6_f34').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc34(){
            var porc = $('#porcion34').val(), alim1 = $('#tag34').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad34').val(" " + cant + json.unidad), $('#grupo34').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f34').val(json.opcion1);
                        }else{$('#nut1_f34').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f34').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f34').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f34').css("background-color","green");}else{$('#nut1_f34').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f34').val(json.opcion2);
                        }else{$('#nut2_f34').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f34').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f34').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f34').css("background-color","green");}else{$('#nut2_f34').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f34').val(json.opcion3);
                        }else{$('#nut3_f34').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f34').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f34').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f34').css("background-color","green");}else{$('#nut3_f34').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f34').val(json.opcion4);
                        }else{$('#nut4_f34').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f34').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f34').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f34').css("background-color","green");}else{$('#nut4_f34').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f34').val(json.opcion5);
                        }else{$('#nut5_f34').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f34').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f34').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f34').css("background-color","green");}else{$('#nut5_f34').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f34').val(json.opcion6);
                        }else{$('#nut6_f34').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f34').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f34').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f34').css("background-color","green");}else{$('#nut6_f34').css("background-color","transparent");}
                    }
                });
        }

        function calcular35(){
            var porc = $('#porcion35').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag35').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad35').val(" " + cant + json.unidad), $('#grupo35').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f35').val(json.opcion1);
                        }else{$('#nut1_f35').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f35').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f35').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f35').css("background-color","green");}else{$('#nut1_f35').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f35').val(json.opcion2);
                        }else{$('#nut2_f35').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f35').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f35').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f35').css("background-color","green");}else{$('#nut2_f35').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f35').val(json.opcion3);
                        }else{$('#nut3_f35').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f35').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f35').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f35').css("background-color","green");}else{$('#nut3_f35').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f35').val(json.opcion4);
                        }else{$('#nut4_f35').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f35').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f35').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f35').css("background-color","green");}else{$('#nut4_f35').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f35').val(json.opcion5);
                        }else{$('#nut5_f35').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f35').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f35').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f35').css("background-color","green");}else{$('#nut5_f35').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f35').val(json.opcion6);
                        }else{$('#nut6_f35').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f35').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f35').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f35').css("background-color","green");}else{$('#nut6_f35').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc35(){
            var porc = $('#porcion35').val(), alim1 = $('#tag35').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad35').val(" " + cant + json.unidad), $('#grupo35').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f35').val(json.opcion1);
                        }else{$('#nut1_f35').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f35').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f35').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f35').css("background-color","green");}else{$('#nut1_f35').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f35').val(json.opcion2);
                        }else{$('#nut2_f35').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f35').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f35').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f35').css("background-color","green");}else{$('#nut2_f35').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f35').val(json.opcion3);
                        }else{$('#nut3_f35').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f35').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f35').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f35').css("background-color","green");}else{$('#nut3_f35').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f35').val(json.opcion4);
                        }else{$('#nut4_f35').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f35').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f35').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f35').css("background-color","green");}else{$('#nut4_f35').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f35').val(json.opcion5);
                        }else{$('#nut5_f35').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f35').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f35').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f35').css("background-color","green");}else{$('#nut5_f35').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f35').val(json.opcion6);
                        }else{$('#nut6_f35').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f35').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f35').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f35').css("background-color","green");}else{$('#nut6_f35').css("background-color","transparent");}
                    }
                });
        }

        function calcular36(){
            var porc = $('#porcion36').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag36').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad36').val(" " + cant + json.unidad), $('#grupo36').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f36').val(json.opcion1);
                        }else{$('#nut1_f36').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f36').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f36').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f36').css("background-color","green");}else{$('#nut1_f36').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f36').val(json.opcion2);
                        }else{$('#nut2_f36').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f36').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f36').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f36').css("background-color","green");}else{$('#nut2_f36').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f36').val(json.opcion3);
                        }else{$('#nut3_f36').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f36').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f36').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f36').css("background-color","green");}else{$('#nut3_f36').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f36').val(json.opcion4);
                        }else{$('#nut4_f36').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f36').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f36').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f36').css("background-color","green");}else{$('#nut4_f36').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f36').val(json.opcion5);
                        }else{$('#nut5_f36').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f36').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f36').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f36').css("background-color","green");}else{$('#nut5_f36').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f36').val(json.opcion6);
                        }else{$('#nut6_f36').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f36').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f36').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f36').css("background-color","green");}else{$('#nut6_f36').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc36(){
            var porc = $('#porcion36').val(), alim1 = $('#tag36').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad36').val(" " + cant + json.unidad), $('#grupo36').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f36').val(json.opcion1);
                        }else{$('#nut1_f36').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f36').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f36').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f36').css("background-color","green");}else{$('#nut1_f36').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f36').val(json.opcion2);
                        }else{$('#nut2_f36').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f36').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f36').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f36').css("background-color","green");}else{$('#nut2_f36').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f36').val(json.opcion3);
                        }else{$('#nut3_f36').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f36').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f36').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f36').css("background-color","green");}else{$('#nut3_f36').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f36').val(json.opcion4);
                        }else{$('#nut4_f36').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f36').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f36').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f36').css("background-color","green");}else{$('#nut4_f36').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f36').val(json.opcion5);
                        }else{$('#nut5_f36').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f36').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f36').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f36').css("background-color","green");}else{$('#nut5_f36').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f36').val(json.opcion6);
                        }else{$('#nut6_f36').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f36').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f36').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f36').css("background-color","green");}else{$('#nut6_f36').css("background-color","transparent");}
                    }
                });
        }

        function calcular37(){
            var porc = $('#porcion37').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag37').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad37').val(" " + cant + json.unidad), $('#grupo37').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f37').val(json.opcion1);
                        }else{$('#nut1_f37').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f37').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f37').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f37').css("background-color","green");}else{$('#nut1_f37').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f37').val(json.opcion2);
                        }else{$('#nut2_f37').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f37').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f37').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f37').css("background-color","green");}else{$('#nut2_f37').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f37').val(json.opcion3);
                        }else{$('#nut3_f37').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f37').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f37').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f37').css("background-color","green");}else{$('#nut3_f37').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f37').val(json.opcion4);
                        }else{$('#nut4_f37').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f37').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f37').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f37').css("background-color","green");}else{$('#nut4_f37').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f37').val(json.opcion5);
                        }else{$('#nut5_f37').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f37').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f37').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f37').css("background-color","green");}else{$('#nut5_f37').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f37').val(json.opcion6);
                        }else{$('#nut6_f37').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f37').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f37').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f37').css("background-color","green");}else{$('#nut6_f37').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc37(){
            var porc = $('#porcion37').val(), alim1 = $('#tag37').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad37').val(" " + cant + json.unidad), $('#grupo37').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f37').val(json.opcion1);
                        }else{$('#nut1_f37').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f37').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f37').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f37').css("background-color","green");}else{$('#nut1_f37').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f37').val(json.opcion2);
                        }else{$('#nut2_f37').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f37').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f37').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f37').css("background-color","green");}else{$('#nut2_f37').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f37').val(json.opcion3);
                        }else{$('#nut3_f37').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f37').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f37').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f37').css("background-color","green");}else{$('#nut3_f37').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f37').val(json.opcion4);
                        }else{$('#nut4_f37').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f37').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f37').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f37').css("background-color","green");}else{$('#nut4_f37').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f37').val(json.opcion5);
                        }else{$('#nut5_f37').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f37').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f37').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f37').css("background-color","green");}else{$('#nut5_f37').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f37').val(json.opcion6);
                        }else{$('#nut6_f37').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f37').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f37').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f37').css("background-color","green");}else{$('#nut6_f37').css("background-color","transparent");}
                    }
                });
        }

        function calcular38(){
            var porc = $('#porcion38').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag38').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad38').val(" " + cant + json.unidad), $('#grupo38').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f38').val(json.opcion1);
                        }else{$('#nut1_f38').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f38').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f38').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f38').css("background-color","green");}else{$('#nut1_f38').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f38').val(json.opcion2);
                        }else{$('#nut2_f38').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f38').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f38').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f38').css("background-color","green");}else{$('#nut2_f38').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f38').val(json.opcion3);
                        }else{$('#nut3_f38').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f38').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f38').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f38').css("background-color","green");}else{$('#nut3_f38').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f38').val(json.opcion4);
                        }else{$('#nut4_f38').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f38').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f38').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f38').css("background-color","green");}else{$('#nut4_f38').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f38').val(json.opcion5);
                        }else{$('#nut5_f38').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f38').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f38').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f38').css("background-color","green");}else{$('#nut5_f38').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f38').val(json.opcion6);
                        }else{$('#nut6_f38').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f38').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f38').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f38').css("background-color","green");}else{$('#nut6_f38').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc38(){
            var porc = $('#porcion38').val(), alim1 = $('#tag38').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad38').val(" " + cant + json.unidad), $('#grupo38').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f38').val(json.opcion1);
                        }else{$('#nut1_f38').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f38').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f38').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f38').css("background-color","green");}else{$('#nut1_f38').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f38').val(json.opcion2);
                        }else{$('#nut2_f38').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f38').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f38').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f38').css("background-color","green");}else{$('#nut2_f38').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f38').val(json.opcion3);
                        }else{$('#nut3_f38').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f38').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f38').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f38').css("background-color","green");}else{$('#nut3_f38').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f38').val(json.opcion4);
                        }else{$('#nut4_f38').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f38').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f38').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f38').css("background-color","green");}else{$('#nut4_f38').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f38').val(json.opcion5);
                        }else{$('#nut5_f38').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f38').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f38').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f38').css("background-color","green");}else{$('#nut5_f38').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f38').val(json.opcion6);
                        }else{$('#nut6_f38').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f38').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f38').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f38').css("background-color","green");}else{$('#nut6_f38').css("background-color","transparent");}
                    }
                });
        }

        function calcular39(){
            var porc = $('#porcion39').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag39').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad39').val(" " + cant + json.unidad), $('#grupo39').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f39').val(json.opcion1);
                        }else{$('#nut1_f39').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f39').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f39').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f39').css("background-color","green");}else{$('#nut1_f39').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f39').val(json.opcion2);
                        }else{$('#nut2_f39').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f39').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f39').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f39').css("background-color","green");}else{$('#nut2_f39').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f39').val(json.opcion3);
                        }else{$('#nut3_f39').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f39').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f39').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f39').css("background-color","green");}else{$('#nut3_f39').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f39').val(json.opcion4);
                        }else{$('#nut4_f39').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f39').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f39').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f39').css("background-color","green");}else{$('#nut4_f39').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f39').val(json.opcion5);
                        }else{$('#nut5_f39').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f39').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f39').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f39').css("background-color","green");}else{$('#nut5_f39').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f39').val(json.opcion6);
                        }else{$('#nut6_f39').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f39').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f39').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f39').css("background-color","green");}else{$('#nut6_f39').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc39(){
            var porc = $('#porcion39').val(), alim1 = $('#tag39').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad39').val(" " + cant + json.unidad), $('#grupo39').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f39').val(json.opcion1);
                        }else{$('#nut1_f39').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f39').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f39').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f39').css("background-color","green");}else{$('#nut1_f39').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f39').val(json.opcion2);
                        }else{$('#nut2_f39').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f39').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f39').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f39').css("background-color","green");}else{$('#nut2_f39').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f39').val(json.opcion3);
                        }else{$('#nut3_f39').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f39').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f39').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f39').css("background-color","green");}else{$('#nut3_f39').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f39').val(json.opcion4);
                        }else{$('#nut4_f39').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f39').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f39').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f39').css("background-color","green");}else{$('#nut4_f39').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f39').val(json.opcion5);
                        }else{$('#nut5_f39').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f39').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f39').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f39').css("background-color","green");}else{$('#nut5_f39').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f39').val(json.opcion6);
                        }else{$('#nut6_f39').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f39').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f39').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f39').css("background-color","green");}else{$('#nut6_f39').css("background-color","transparent");}
                    }
                });
        }

        function calcular40(){
            var porc = $('#porcion40').val();
            $(document).ready(function () {
            var bdAlim = $('input[name=bdAlim]:checked').val();
                if(bdAlim === "smae4"){
                    var items1 = <?= json_encode($array1) ?>
                }else if(bdAlim === "smae5"){
                    var items1 = <?= json_encode($array2) ?>
                }

                $('#tag40').autocomplete({ source: items1,
                select: function (event, item){
                    let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
                    opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                    var params ={ alim1: item.item.value, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim };
                    $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad40').val(" " + cant + json.unidad), $('#grupo40').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f40').val(json.opcion1);
                        }else{$('#nut1_f40').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f40').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f40').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f40').css("background-color","green");}else{$('#nut1_f40').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f40').val(json.opcion2);
                        }else{$('#nut2_f40').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f40').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f40').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f40').css("background-color","green");}else{$('#nut2_f40').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f40').val(json.opcion3);
                        }else{$('#nut3_f40').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f40').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f40').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f40').css("background-color","green");}else{$('#nut3_f40').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f40').val(json.opcion4);
                        }else{$('#nut4_f40').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f40').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f40').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f40').css("background-color","green");}else{$('#nut4_f40').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f40').val(json.opcion5);
                        }else{$('#nut5_f40').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f40').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f40').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f40').css("background-color","green");}else{$('#nut5_f40').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f40').val(json.opcion6);
                        }else{$('#nut6_f40').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f40').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f40').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f40').css("background-color","green");}else{$('#nut6_f40').css("background-color","transparent");}
                    }
                });
            }
        });
        });
        }

        function calc40(){
            var porc = $('#porcion40').val(), alim1 = $('#tag40').val();
            let opc1 = $("#opcion1").val(), opc2 = $("#opcion2").val(), opc3 = $("#opcion3").val(), opc4 = $("#opcion4").val(),
            opc5 = $("#opcion5").val(), opc6 = $("#opcion6").val(), bdAlim = $('input[name=bdAlim]:checked').val();
                var params ={ alim1: alim1, op1 : opc1, op2 : opc2, op3 : opc3, op4 : opc4, op5 : opc5, op6 : opc6, bd_alim : bdAlim }
                $.get("../conex/micronut.php", params, function(respuesta1){
                    var json= JSON.parse(respuesta1);
                    if (json.status == 200){var cant = ((json.cantidad*porc).toFixed(2));
                        $('#cantidad40').val(" " + cant + json.unidad), $('#grupo40').val(json.grupo);
                        //NUTRIENTES
                        if(opc1 === "vacio"){}else if(opc1 === "ig" || opc1 === "cg"){$('#nut1_f40').val(json.opcion1);
                        }else{$('#nut1_f40').val((json.opcion1*porc).toFixed(1));}
                            if(json.col_1 == 3){$('#nut1_f40').css("background-color","red");}else if(json.col_1 == 2){$('#nut1_f40').css("background-color","yellow");
                            }else if(json.col_1 == 1){$('#nut1_f40').css("background-color","green");}else{$('#nut1_f40').css("background-color","transparent");}
                        if(opc2 === "vacio"){}else if(opc2 === "ig" || opc2 === "cg"){$('#nut2_f40').val(json.opcion2);
                        }else{$('#nut2_f40').val((json.opcion2*porc).toFixed(1));}
                            if(json.col_2 == 3){$('#nut2_f40').css("background-color","red");}else if(json.col_2 == 2){$('#nut2_f40').css("background-color","yellow");
                            }else if(json.col_2 == 1){$('#nut2_f40').css("background-color","green");}else{$('#nut2_f40').css("background-color","transparent");}
                        if(opc3 === "vacio"){}else if(opc3 === "ig" || opc3 === "cg"){$('#nut3_f40').val(json.opcion3);
                        }else{$('#nut3_f40').val((json.opcion3*porc).toFixed(1));}
                            if(json.col_3 == 3){$('#nut3_f40').css("background-color","red");}else if(json.col_3 == 2){$('#nut3_f40').css("background-color","yellow");
                            }else if(json.col_3 == 1){$('#nut3_f40').css("background-color","green");}else{$('#nut3_f40').css("background-color","transparent");}
                        if(opc4 === "vacio"){}else if(opc4 === "ig" || opc4 === "cg"){$('#nut4_f40').val(json.opcion4);
                        }else{$('#nut4_f40').val((json.opcion4*porc).toFixed(1));}
                            if(json.col_4 == 3){$('#nut4_f40').css("background-color","red");}else if(json.col_4 == 2){$('#nut4_f40').css("background-color","yellow");
                            }else if(json.col_4 == 1){$('#nut4_f40').css("background-color","green");}else{$('#nut4_f40').css("background-color","transparent");}
                        if(opc5 === "vacio"){}else if(opc5 === "ig" || opc5 === "cg"){$('#nut5_f40').val(json.opcion5);
                        }else{$('#nut5_f40').val((json.opcion5*porc).toFixed(1));}
                            if(json.col_5 == 3){$('#nut5_f40').css("background-color","red");}else if(json.col_5 == 2){$('#nut5_f40').css("background-color","yellow");
                            }else if(json.col_5 == 1){$('#nut5_f40').css("background-color","green");}else{$('#nut5_f40').css("background-color","transparent");}
                        if(opc6 === "vacio"){}else if(opc6 === "ig" || opc6 === "cg"){$('#nut6_f40').val(json.opcion6);
                        }else{$('#nut6_f40').val((json.opcion6*porc).toFixed(1));}
                            if(json.col_6 == 3){$('#nut6_f40').css("background-color","red");}else if(json.col_6 == 2){$('#nut6_f40').css("background-color","yellow");
                            }else if(json.col_6 == 1){$('#nut6_f40').css("background-color","green");}else{$('#nut6_f40').css("background-color","transparent");}
                    }
                });
        }
        
        </script>
        <script src="../assets/js/distrib.js"></script>
        <script src="../assets/js/microNut.js"></script>
        <script src="../assets/js/elim_comida.js"></script>

        <script src="../assets/js/ocultar_tablas.js"></script>
        <script src="../assets/js/enviar_menu.js"></script>
    </body>

</html>