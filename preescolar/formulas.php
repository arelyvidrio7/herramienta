<?php
session_start();

include 'navbar.php';
include '../conex/longitudes.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../jquery-ui.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Nutripaes - Niño (Fórmulas)</title>
</head>
<body class="alert-secondary">
<style>
@media (max-width:380px){
    input{width: 175px}
}
@media(max-width:768px){
    .article{margin:0;padding:0}
}
</style>
    <br><br><br>
    <div class="container border bg-white rounded shadow m-0 p-0  m-auto">

        <div class="row m-0 p-0">
            <div class="col-12"><h4 class="bg-light text-center rounded fw-bold">Formulas para Niños (recién nacidos hasta los 10 años)</h4></div> 
            <div class="col-12"><h5 class="text-center alert-primary p-1 text-dark fw-bold rounded fst-italic">Las siguientes fórmulas son sólo para consulta y no serán almacenadas...</h5></div> 
        </div>   
                        <!-- PRIMERA PARTE -->
    
<article class="article m-auto">
    <div>
        <div class="col-12 alert-primary mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Información del paciente
    </div>
    <div id="datos" class="table-responsive">
    <table class="table table-sm">
        <thead class="bg-primary bg-gradient text-center text-white-50 text-shadow">
            <tr class="p-0 m-0">
                <th colspan="3">Datos generales</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <tr>
            <td>Sexo:
                <select id="sexo" name="sexo">
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                </select>
            </td>
            <td>Fecha de nacimiento:
                <input type="date" id="fechaNacimiento" name="fechaNacimiento">
            </td>
            <td>Edad (años,meses):
                <input id="edad" name="edad" placeholder="Edad" style="width:40px">
            </td>
        </tr>
        </tbody>
    </table>

    <table class="table table-sm">
        <thead class="bg-primary bg-gradient text-center text-white-50 text-shadow">
            <tr class="p-0 m-0">
                <th colspan="3">Indicadores antropométricos</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <tr>
            <td>Longitud:
                <input class="w-50" id="talla" name="talla" placeholder="Talla (cm)" onkeyup="calcularFormulas()">
            </td>
            <td>Peso:
                <input class="w-50" id="peso" name="peso" placeholder="Peso (kg)" onkeyup="calcularFormulas()">
            </td>
            <td>IMC:
                <input class="w-50" id="valor_imc" name="valor_imc" placeholder="IMC (kg/m²)">
            </td>
        </tr>
        </tbody>
    </table>
    </div>

    <div>
        <div class="col-12 alert-primary mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Resultados Percentiles OMS
    </div>

    <div class="container d-flex flex-column" style="text-align:center;">
        <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="11"><strong>Longitud - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="11">Percentiles (longitud en cm)</td>
        </tr>

        
        <tr>
        <td><strong>1</strong></td>
        <td><strong>3</strong></td>
        <td><strong>5</strong></td>
        <td><strong>15</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>85</strong></td>
        <td><strong>95</strong></td>
        <td><strong>97</strong></td>
        <td><strong>99</strong></td>
        </tr>

        <tr>
        <td id="p1_1" style="height:30px"></td>
        <td id="p1_3"></td>
        <td id="p1_5"></td>
        <td id="p1_15"></td>
        <td id="p1_25"></td>
        <td id="p1_50"></td>
        <td id="p1_75"></td>
        <td id="p1_85"></td>
        <td id="p1_95"></td>
        <td id="p1_97"></td>
        <td id="p1_99"></td>
        </tr>

        <tr>
        <td colspan="2" style="background:orange">Desnutrición</td>
        <td colspan="9" style="background:green">Normal</td>
        </tr>
        </tbody>
        </table>
        <br>

        <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="11"><strong>Peso - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="11">Percentiles (peso en kg)</td>
        </tr>

        <tr>
        <td><strong>1</strong></td>
        <td><strong>3</strong></td>
        <td><strong>5</strong></td>
        <td><strong>15</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>85</strong></td>
        <td><strong>95</strong></td>
        <td><strong>97</strong></td>
        <td><strong>99</strong></td>
        </tr>

        <tr>
        <td id="p2_1" style="height:30px"></td>
        <td id="p2_3"></td>
        <td id="p2_5"></td>
        <td id="p2_15"></td>
        <td id="p2_25"></td>
        <td id="p2_50"></td>
        <td id="p2_75"></td>
        <td id="p2_85"></td>
        <td id="p2_95"></td>
        <td id="p2_97"></td>
        <td id="p2_99"></td>
        </tr>

        <tr>
        <td colspan="2" style="background:orange">Desnutrición</td>
        <td colspan="7" style="background:green">Normal</td>
        <td colspan="2" style="background:red">Obesidad</td>
        </tr>
        </tbody>
        </table>
        <br>

        <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="11"><strong>IMC - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="11">Percentiles (IMC en kg-m²)</td>
        </tr>

        <tr>
        <td><strong>1</strong></td>
        <td><strong>3</strong></td>
        <td><strong>5</strong></td>
        <td><strong>15</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>85</strong></td>
        <td><strong>95</strong></td>
        <td><strong>97</strong></td>
        <td><strong>99</strong></td>
        </tr>

        <tr>
        <td id="p3_1" style="height:30px"></td>
        <td id="p3_3"></td>
        <td id="p3_5"></td>
        <td id="p3_15"></td>
        <td id="p3_25"></td>
        <td id="p3_50"></td>
        <td id="p3_75"></td>
        <td id="p3_85"></td>
        <td id="p3_95"></td>
        <td id="p3_97"></td>
        <td id="p3_99"></td>
        </tr>

        <tr>
        <td colspan="2" style="background:orange">Bajo Peso</td>
        <td colspan="5" style="background:green">Normal</td>
        <td colspan="2" style="background:yellow">Riesgo Obesidad</td>
        <td colspan="2" style="background:red">Obesidad</td>
        </tr>
        </tbody>
        </table>
        <br>

        <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="11"><strong>Circunferencia de brazo - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="11">Percentiles (circunferencia de brazo en cm)</td>
        </tr>

        <tr>
        <td><strong>1</strong></td>
        <td><strong>3</strong></td>
        <td><strong>5</strong></td>
        <td><strong>15</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>85</strong></td>
        <td><strong>95</strong></td>
        <td><strong>97</strong></td>
        <td><strong>99</strong></td>
        </tr>

        <tr>
        <td id="p4_1" style="height:30px"></td>
        <td id="p4_3"></td>
        <td id="p4_5"></td>
        <td id="p4_15"></td>
        <td id="p4_25"></td>
        <td id="p4_50"></td>
        <td id="p4_75"></td>
        <td id="p4_85"></td>
        <td id="p4_95"></td>
        <td id="p4_97"></td>
        <td id="p4_99"></td>
        </tr>

        <tr>
        <td colspan="2" style="background:orange">Riesgo de desnutrición</td>
        <td colspan="7" style="background:green">Normal</td>
        <td colspan="2" style="background:red">Obesidad o hipertrofia</td>
        </tr>
        </tbody>
        </table>
    <br>
    </div>

    <div>
        <div class="col-12 alert-primary mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Percentiles sólo para menores de 5 años
    </div>
    <div class="container d-flex flex-column" style="text-align:center;">
    <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="11"><strong>Circunferencia cefálica - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="11">Percentiles (circunferencia cefálica en cm)</td>
        </tr>

        <tr>
        <td><strong>1</strong></td>
        <td><strong>3</strong></td>
        <td><strong>5</strong></td>
        <td><strong>15</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>85</strong></td>
        <td><strong>95</strong></td>
        <td><strong>97</strong></td>
        <td><strong>99</strong></td>
        </tr>

        <tr>
        <td id="p5_1" style="height:30px"></td>
        <td id="p5_3"></td>
        <td id="p5_5"></td>
        <td id="p5_15"></td>
        <td id="p5_25"></td>
        <td id="p5_50"></td>
        <td id="p5_75"></td>
        <td id="p5_85"></td>
        <td id="p5_95"></td>
        <td id="p5_97"></td>
        <td id="p5_99"></td>
        </tr>

        <tr>
        <td colspan="2" style="background:orange">Riesgo de salud o desarrollo</td>
        <td colspan="7" style="background:green">Normal</td>
        <td colspan="2" style="background:red">Riesgo de salud o desarrollo</td>
        </tr>
        </tbody>
        </table>
        </div>
        <br>

        <table>
            <thead>
                <tr><th>Escribe y selecciona la longitud (cm):
                    <input id="longitud" name="longitud" placeholder="Hasta 120 cm" style="width:180px" onkeyup="peso_longitud()"></th>
                </tr>
            </thead>
        </table>
        <br>

        <div class="container d-flex flex-column" style="text-align:center;">
        <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="11"><strong>Peso - Longitud</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="11">Percentiles (Peso en kg)</td>
        </tr>

        <tr>
        <td><strong>1</strong></td>
        <td><strong>3</strong></td>
        <td><strong>5</strong></td>
        <td><strong>15</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>85</strong></td>
        <td><strong>95</strong></td>
        <td><strong>97</strong></td>
        <td><strong>99</strong></td>
        </tr>

        <tr>
        <td id="p_1" style="height:30px"></td>
        <td id="p_3"></td>
        <td id="p_5"></td>
        <td id="p_15"></td>
        <td id="p_25"></td>
        <td id="p_50"></td>
        <td id="p_75"></td>
        <td id="p_85"></td>
        <td id="p_95"></td>
        <td id="p_97"></td>
        <td id="p_99"></td>
        </tr>

        <tr>
        <td colspan="2" style="background:orange">Desnutrición</td>
        <td colspan="7" style="background:green">Normal</td>
        <td colspan="2" style="background:red">Obesidad</td>
        </tr>
        </tbody>
        </table>
        <br>
    </div>

    <div class="col-12 mb-3 text-center">
        <button id="obtener_d" name="obtener_d" class="obtener_datos p-2 rounded fw-bolder btn-primary bg-gradient" onclick="percentiles()">Calcular fórmulas</button>
    </div>
</article>

                            <!-- COLUMNA 3 -->
<div class="col-12 alert-primary bg-gradient mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Calorias</div>
                            <!-- SECCION 1  -->
<article class="m-auto">
<div id="parte3" onkeyup="macros()">
                            <!-- TABLA NUMERO 1 -->
<table>
    <thead>
        <tr><th>Total Kcal : </th><th><input id="valor_kcal" style="width:180px" placeholder="Kcal asignadas"></th></tr>
    </thead>
</table>
                            <!-- TABLA NUMERO 2 -->
<table class="table table-hover" id="macros" name="macros" class="macros">
    <thead class="bg-primary bg-gradient  text-center text-white-50 shadow">
        <tr>
            <th></th>
            <th scope="col">%</th>
            <th scope="col">Kcal</th>
            <th scope="col">Gr</th>
        
        </tr>
    </thead>
    <tbody class="text-center">
        <tr>
            <th>Carbohidratos</th>
            <td><input class="w-25" id="porc_carb" placeholder="%"></td>
            <td id="kcal_carb"></td>
            <td id="gr_carb" class="border"></td>
        </tr>
        <tr>
            <th>Lípidos</th>
            <td><input class="w-25" id="porc_lip" placeholder="%"></td>
            <td id="kcal_lip"></td>
            <td id="gr_lip" class="border"></td>
        </tr>
        <tr>
            <th>Proteínas</th>
            <td><input class="w-25" id="porc_prot"placeholder="%"></td>
            <td id="kcal_prot"></td>
            <td id="gr_prot" class="border"></td>
        </tr>
    </tbody>
</table>
<div>
    <div class="col-12 alert-primary bg-gradient mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Convertir (gr) -> (%)
</div>
                                <!-- TABLA NUMERO 3 -->
    <table class="table table-hover" id="carbohidratos" name="carbohidratos" class="convertir_porciento" onkeyup="porciento_macros()">
        <thead class="bg-primary bg-gradient text-center text-white-50 shadow">
            <tr>
                <th></th>
                <th scope="col">Gr</th>
                <th scope="col">Gr/Kg</th>
                <th scope="col">Kcal</th>
                <th scope="col">%</th>
            
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Carbohidratos</th>
                <td><input class="w-50" id="gr_carb2" placeholder="gr"></td>
                <td id="grxpeso1"></td>
                <td id="total_kc" class="border"></td>
                <td id="total_%c"></td>
            </tr>
            <tr>
                <th>Lípidos</th>
                <td><input class="w-50" id="gr_lip2" placeholder="gr"></td>
                <td id="grxpeso2"></td>
                <td id="total_kl" class="border"></td>
                <td id="total_%l"></td>
            </tr>
            <tr>
                <th>Proteína</th>
                <td><input class="w-50" id="gr_prot2" placeholder="gr"></td>
                <td id="grxpeso3"></td>
                <td id="total_kp" class="border"></td>
                <td id="total_%p"></td>
            </tr>
        </tbody>
    </table>
</div>
</article>
</div>
</div>
<br>
    <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../jquery-ui.js"></script>
    <script src="../assets/js/for_preescolar.js"></script>

    <script type="text/javascript">
        function percentiles(){
            var sexo = $("#sexo").val();
            if(sexo === "mujer"){
                var edad1 = $("#edad").val();
                var parametros ={
                    edad1: edad1
                }
                $.get("../conex/percentiles.php", parametros, function(resp){
                    var json= JSON.parse(resp);
                    if (json.status == 200)
                        $("#p1_1").html(json.p1_1);
                        $("#p1_3").html(json.p1_3);
                        $("#p1_5").html(json.p1_5);
                        $("#p1_15").html(json.p1_15);
                        $("#p1_25").html(json.p1_25);
                        $("#p1_50").html(json.p1_50);
                        $("#p1_75").html(json.p1_75);
                        $("#p1_85").html(json.p1_85);
                        $("#p1_95").html(json.p1_95);
                        $("#p1_97").html(json.p1_97);
                        $("#p1_99").html(json.p1_99);
                        $("#p2_1").html(json.p2_1);
                        $("#p2_3").html(json.p2_3);
                        $("#p2_5").html(json.p2_5);
                        $("#p2_15").html(json.p2_15);
                        $("#p2_25").html(json.p2_25);
                        $("#p2_50").html(json.p2_50);
                        $("#p2_75").html(json.p2_75);
                        $("#p2_85").html(json.p2_85);
                        $("#p2_95").html(json.p2_95);
                        $("#p2_97").html(json.p2_97);
                        $("#p2_99").html(json.p2_99);
                        $("#p3_1").html(json.p3_1);
                        $("#p3_3").html(json.p3_3);
                        $("#p3_5").html(json.p3_5);
                        $("#p3_15").html(json.p3_15);
                        $("#p3_25").html(json.p3_25);
                        $("#p3_50").html(json.p3_50);
                        $("#p3_75").html(json.p3_75);
                        $("#p3_85").html(json.p3_85);
                        $("#p3_95").html(json.p3_95);
                        $("#p3_97").html(json.p3_97);
                        $("#p3_99").html(json.p3_99);
                        $("#p4_1").html(json.p4_1);
                        $("#p4_3").html(json.p4_3);
                        $("#p4_5").html(json.p4_5);
                        $("#p4_15").html(json.p4_15);
                        $("#p4_25").html(json.p4_25);
                        $("#p4_50").html(json.p4_50);
                        $("#p4_75").html(json.p4_75);
                        $("#p4_85").html(json.p4_85);
                        $("#p4_95").html(json.p4_95);
                        $("#p4_97").html(json.p4_97);
                        $("#p4_99").html(json.p4_99);
                        $("#p5_1").html(json.p5_1);
                        $("#p5_3").html(json.p5_3);
                        $("#p5_5").html(json.p5_5);
                        $("#p5_15").html(json.p5_15);
                        $("#p5_25").html(json.p5_25);
                        $("#p5_50").html(json.p5_50);
                        $("#p5_75").html(json.p5_75);
                        $("#p5_85").html(json.p5_85);
                        $("#p5_95").html(json.p5_95);
                        $("#p5_97").html(json.p5_97);
                        $("#p5_99").html(json.p5_99);         
                });
            }else if(sexo === "hombre"){
                var edad1 = $("#edad").val();
                var parametros ={
                    edad1: edad1
                }
                $.get("../conex/percentiles2.php", parametros, function(resp){
                    var json= JSON.parse(resp);
                    if (json.status == 200)
                        $("#p1_1").html(json.p1_1);
                        $("#p1_3").html(json.p1_3);
                        $("#p1_5").html(json.p1_5);
                        $("#p1_15").html(json.p1_15);
                        $("#p1_25").html(json.p1_25);
                        $("#p1_50").html(json.p1_50);
                        $("#p1_75").html(json.p1_75);
                        $("#p1_85").html(json.p1_85);
                        $("#p1_95").html(json.p1_95);
                        $("#p1_97").html(json.p1_97);
                        $("#p1_99").html(json.p1_99);
                        $("#p2_1").html(json.p2_1);
                        $("#p2_3").html(json.p2_3);
                        $("#p2_5").html(json.p2_5);
                        $("#p2_15").html(json.p2_15);
                        $("#p2_25").html(json.p2_25);
                        $("#p2_50").html(json.p2_50);
                        $("#p2_75").html(json.p2_75);
                        $("#p2_85").html(json.p2_85);
                        $("#p2_95").html(json.p2_95);
                        $("#p2_97").html(json.p2_97);
                        $("#p2_99").html(json.p2_99);
                        $("#p3_1").html(json.p3_1);
                        $("#p3_3").html(json.p3_3);
                        $("#p3_5").html(json.p3_5);
                        $("#p3_15").html(json.p3_15);
                        $("#p3_25").html(json.p3_25);
                        $("#p3_50").html(json.p3_50);
                        $("#p3_75").html(json.p3_75);
                        $("#p3_85").html(json.p3_85);
                        $("#p3_95").html(json.p3_95);
                        $("#p3_97").html(json.p3_97);
                        $("#p3_99").html(json.p3_99);
                        $("#p4_1").html(json.p4_1);
                        $("#p4_3").html(json.p4_3);
                        $("#p4_5").html(json.p4_5);
                        $("#p4_15").html(json.p4_15);
                        $("#p4_25").html(json.p4_25);
                        $("#p4_50").html(json.p4_50);
                        $("#p4_75").html(json.p4_75);
                        $("#p4_85").html(json.p4_85);
                        $("#p4_95").html(json.p4_95);
                        $("#p4_97").html(json.p4_97);
                        $("#p4_99").html(json.p4_99);
                        $("#p5_1").html(json.p5_1);
                        $("#p5_3").html(json.p5_3);
                        $("#p5_5").html(json.p5_5);
                        $("#p5_15").html(json.p5_15);
                        $("#p5_25").html(json.p5_25);
                        $("#p5_50").html(json.p5_50);
                        $("#p5_75").html(json.p5_75);
                        $("#p5_85").html(json.p5_85);
                        $("#p5_95").html(json.p5_95);
                        $("#p5_97").html(json.p5_97);
                        $("#p5_99").html(json.p5_99);        
                });
            }
             
        }

        function peso_longitud(){
            var sexo = $("#sexo").val();
            if(sexo === "mujer"){
                $(document).ready(function () {
            var items2 = <?= json_encode($arr1) ?>

            $("#longitud").autocomplete({
            source: items2,
            select: function (event, item){
                var params ={
                    longitud: item.item.value
                };
                $.get("../conex/pesoLongitud.php", params, function(res){
                    var json= JSON.parse(res);
                    if (json.status == 200)
                        $("#p_1").html(json.percentil_1);
                        $("#p_3").html(json.percentil_3);
                        $("#p_5").html(json.percentil_5);
                        $("#p_15").html(json.percentil_15);
                        $("#p_25").html(json.percentil_25);
                        $("#p_50").html(json.percentil_50);
                        $("#p_75").html(json.percentil_75);
                        $("#p_85").html(json.percentil_85);
                        $("#p_95").html(json.percentil_95);
                        $("#p_97").html(json.percentil_97);
                        $("#p_99").html(json.percentil_99);       
                    });
            }
            });
            });

            }else if(sexo === "hombre"){
                $(document).ready(function () {
            var items2 = <?= json_encode($arr1) ?>

            $("#longitud").autocomplete({
            source: items2,
            select: function (event, item){
                var params ={
                    longitud: item.item.value
                };
                $.get("../conex/pesoLongitud2.php", params, function(res){
                    var json= JSON.parse(res);
                    if (json.status == 200)
                        $("#p_1").html(json.percentil_1);
                        $("#p_3").html(json.percentil_3);
                        $("#p_5").html(json.percentil_5);
                        $("#p_15").html(json.percentil_15);
                        $("#p_25").html(json.percentil_25);
                        $("#p_50").html(json.percentil_50);
                        $("#p_75").html(json.percentil_75);
                        $("#p_85").html(json.percentil_85);
                        $("#p_95").html(json.percentil_95);
                        $("#p_97").html(json.percentil_97);
                        $("#p_99").html(json.percentil_99);       
                    });
            }
            });
            });

            }
            
        }
</script> 
</body>
</html>