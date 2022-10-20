<?php
session_start();

include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../jquery-ui.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>NUTRIPAES - Adulto Mayor (Fórmulas)</title>
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
            <div class="col-12"><h4 class="bg-light text-center rounded fw-bold">Formulas para adulto Mayor (Más de 60 años)</h4></div> 
            <div class="col-12"><h5 class="text-center alert-primary p-1 text-dark fw-bold rounded fst-italic">Las siguientes fórmulas son sólo para consulta y no serán almacenadas...</h5></div> 
        </div>   
                        <!-- PRIMERA PARTE -->
    
<article class="article m-auto">
    <div id="datos" class="table-responsive">
    <div>
        <div class="col-12 alert-primary mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Información del paciente</div>
    </div>
    <table class="table table-sm">
        <thead class="bg-primary bg-gradient text-center text-white-50 text-shadow">
            <tr class="p-0 m-0">
                <th colspan="3">Datos generales</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <tr>
            <td></td>
            <td>Sexo:
                <select id="sexo" name="sexo">
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                </select>
                Edad:
                <input style="width:100px" id="edad" name="edad" placeholder="Edad (años)" onkeyup="percentiles()">
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <table class="table table-sm">
        <thead class="bg-primary bg-gradient text-center text-white-50 text-shadow">
            <tr class="p-0 m-0">
                <th colspan="4">Indicadores antropométricos</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <tr>
            <td>Talla:
                <input class="w-50" id="talla" name="talla" placeholder="Estatura (m)">
            </td>
            <td>Peso:
                <input class="w-50" id="peso" name="peso" placeholder="Peso (Kg)">
            </td>
            <td>Altura de rodilla:
                <input class="w-50" id="altRodilla" name="altRodilla" placeholder="Medida (cm)">
            </td>
            <td>Ext. media brazada:
                <input class="w-50" id="mediaBrazada" name="mediaBrazada" placeholder="Medida (cm)">
            </td>
        </tr>
        </tbody>
    </table>
    </div>

<!-- CABECERA 2 -->
<div id="parte2" class="table-responsive">
    <div>
        <div class="col-12 alert-primary mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Resultados</div>
    </div>
<table class="table table-sm">
    <thead class="bg-primary bg-gradient text-center text-white-50 text-shadow">
        <tr class="p-0 m-0">
            <th>IMC</th>
            <th>Talla por altura de rodilla</th>
            <th>Talla por Ext. Media brazada</th>
            <th>
                <select id="select_geb" name="select_geb" onchange="calculo_formulas()">
                    <option value="oms">GEB OMS</option>
                </select>
            </th>
            <th>Act. Física
                <select id="af" name="af" onchange="calculo_formulas()">
                    <option value="1.2">Reposo</option>
                    <option value="1.3">Actividad ligera</option>
                    <option value="1.5">Actividad moderada</option>
                    <option value="1.8">Actividad intensa</option>
                </select>
            </th>
            <th class="bg-danger ">GET</th>
        </tr>
    </thead>
                                <!-- RESULTADOS DE CABECERA 2 -->
    <tbody class="text-center">
    <tr scope="row">
        <td><span class="fw-bold p-1" id="valor_imc"></span><br><span id="interpretacion_imc"></span></td>
        <td id="valor_altRodilla"></td>
        <td id="valor_mediaBrazada"></td>
        <td id="valor_geb"></td>
        <td id="valor_af"></td>
        <td id="valor_get" class="fs-5 alert-danger border-1 text-black"></td>
    </tr>
    </tbody>
</table>
</div>

<div class="container d-flex flex-column" style="text-align:center;">
    <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="7"><strong>Estatura - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="7">Percentiles (Estatura en cm)</td>
        </tr>
        
        <tr>
        <td><strong>5</strong></td>
        <td><strong>10</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>90</strong></td>
        <td><strong>95</strong></td>
        </tr>

        <tr>
        <td id="p1_5" style="height:30px"></td>
        <td id="p1_10"></td>
        <td id="p1_25"></td>
        <td id="p1_50"></td>
        <td id="p1_75"></td>
        <td id="p1_90"></td>
        <td id="p1_95"></td>
        </tr>

        <tr>
        <td colspan="7" style="background:gray"></td>
        </tr>
        </tbody>
        </table>
        <br>

        <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="7"><strong>Peso - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="7">Percentiles (peso en kg)</td>
        </tr>

        <tr>
        <td><strong>5</strong></td>
        <td><strong>10</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>90</strong></td>
        <td><strong>95</strong></td>
        </tr>

        <tr>
        <td id="p2_5" style="height:30px"></td>
        <td id="p2_10"></td>
        <td id="p2_25"></td>
        <td id="p2_50"></td>
        <td id="p2_75"></td>
        <td id="p2_90"></td>
        <td id="p2_95"></td>
        </tr>

        <tr>
        <td colspan="7" style="background:gray"></td>
        </tr>
        </tbody>
    </table>
    <br>

    <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="7"><strong>IMC - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="7">Percentiles (IMC en kg-m²)</td>
        </tr>

        <tr>
        <td><strong>5</strong></td>
        <td><strong>10</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>90</strong></td>
        <td><strong>95</strong></td>
        </tr>

        <tr>
        <td id="p3_5" style="height:30px"></td>
        <td id="p3_10"></td>
        <td id="p3_25"></td>
        <td id="p3_50"></td>
        <td id="p3_75"></td>
        <td id="p3_90"></td>
        <td id="p3_95"></td>
        </tr>

        <tr>
        <td colspan="7" style="background:gray"></td>
        </tr>
        </tbody>
        </table>
        <br>

    <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="7"><strong>Circunferencia de brazo - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="7">Percentiles (circunferencia de brazo en cm)</td>
        </tr>

        <tr>
        <td><strong>5</strong></td>
        <td><strong>10</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>90</strong></td>
        <td><strong>95</strong></td>
        </tr>

        <tr>
        <td id="p4_5" style="height:30px"></td>
        <td id="p4_10"></td>
        <td id="p4_25"></td>
        <td id="p4_50"></td>
        <td id="p4_75"></td>
        <td id="p4_90"></td>
        <td id="p4_95"></td>
        </tr>

        <tr>
        <td colspan="7" style="background:gray"></td>
        </tr>
        </tbody>
    </table>
    <br>

    <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="7"><strong>Área muscular del brazo (Cm²) - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="7">Percentiles (Área muscular del brazo (Cm²))</td>
        </tr>

        <tr>
        <td><strong>5</strong></td>
        <td><strong>10</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>90</strong></td>
        <td><strong>95</strong></td>
        </tr>

        <tr>
        <td id="p5_5" style="height:30px"></td>
        <td id="p5_10"></td>
        <td id="p5_25"></td>
        <td id="p5_50"></td>
        <td id="p5_75"></td>
        <td id="p5_90"></td>
        <td id="p5_95"></td>
        </tr>

        <tr>
        <td style="background:gray">Musculatura reducida</td>
        <td colspan="2" style="background:orange">Musculatura debajo del promedio</td>
        <td colspan="3" style="background:green">Musculatura promedio</td>
        <td colspan="2" style="background:red">Musculatura arriba del promedio</td>
        </tr>
        </tbody>
    </table>
    <br>

    <table class="resultados_f">
        <thead>
        <tr>
        <th colspan="7"><strong>Perímetro de cintura (Cm) - Edad</strong></th>
        </tr>
        </thead>

        <tbody>
        <tr>
        <td colspan="7">Percentiles (Perímetro de cintura (Cm))</td>
        </tr>

        <tr>
        <td><strong>5</strong></td>
        <td><strong>10</strong></td>
        <td><strong>25</strong></td>
        <td><strong>50</strong></td>
        <td><strong>75</strong></td>
        <td><strong>90</strong></td>
        <td><strong>95</strong></td>
        </tr>

        <tr>
        <td id="p6_5" style="height:30px"></td>
        <td id="p6_10"></td>
        <td id="p6_25"></td>
        <td id="p6_50"></td>
        <td id="p6_75"></td>
        <td id="p6_90"></td>
        <td id="p6_95"></td>
        </tr>

        <tr>
        <td colspan="7" style="background:gray"></td>
        </tr>
        </tbody>
    </table>
    <br>
</div>
    <div class="col-12 mb-3 text-center">
        <button id="obtener_datos" name="obtener_datos" class="obtener_datos p-2 rounded fw-bolder btn-primary bg-gradient" onclick="calculo_formulas()">Calcular fórmulas</button>
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
    <script src="../assets/js/adulto_m.js"></script>

    <script type="text/javascript">
        function percentiles(){
            var sexo = $("#sexo").val();
            var edad = parseFloat(document.getElementById("edad").value);

                if(edad < 60){var grupo1 = "num0";
                }else if(edad < 65){var grupo1  = "num1";
                }else if(edad < 70){var grupo1  = "num2";
                }else if(edad < 75){var grupo1  = "num3";
                }else if(edad < 80){var grupo1  = "num4";
                }else if(edad >= 80){var grupo1  = "num5";
                }else{var grupo1 = "num0";}

                if(sexo === "hombre"){ 
                var parametros ={
                    grupo1: grupo1
                }
                $.get("../conex/perc_adultom2.php", parametros, function(resp){
                    var json= JSON.parse(resp);
                    if (json.status == 200)
                        $("#p1_5").html(json.p1_5);
                        $("#p1_10").html(json.p1_10);
                        $("#p1_25").html(json.p1_25);
                        $("#p1_50").html(json.p1_50);
                        $("#p1_75").html(json.p1_75);
                        $("#p1_90").html(json.p1_90);
                        $("#p1_95").html(json.p1_95);
                        
                        $("#p2_5").html(json.p2_5);
                        $("#p2_10").html(json.p2_10);
                        $("#p2_25").html(json.p2_25);
                        $("#p2_50").html(json.p2_50);
                        $("#p2_75").html(json.p2_75);
                        $("#p2_90").html(json.p2_90);
                        $("#p2_95").html(json.p2_95);

                        $("#p3_5").html(json.p3_5);
                        $("#p3_10").html(json.p3_10);
                        $("#p3_25").html(json.p3_25);
                        $("#p3_50").html(json.p3_50);
                        $("#p3_75").html(json.p3_75);
                        $("#p3_90").html(json.p3_90);
                        $("#p3_95").html(json.p3_95);

                        $("#p4_5").html(json.p4_5);
                        $("#p4_10").html(json.p4_10);
                        $("#p4_25").html(json.p4_25);
                        $("#p4_50").html(json.p4_50);
                        $("#p4_75").html(json.p4_75);
                        $("#p4_90").html(json.p4_90);
                        $("#p4_95").html(json.p4_95);

                        $("#p5_5").html(json.p5_5);
                        $("#p5_10").html(json.p5_10);
                        $("#p5_25").html(json.p5_25);
                        $("#p5_50").html(json.p5_50);
                        $("#p5_75").html(json.p5_75);
                        $("#p5_90").html(json.p5_90);
                        $("#p5_95").html(json.p5_95);

                        $("#p6_5").html(json.p6_5);
                        $("#p6_10").html(json.p6_10);
                        $("#p6_25").html(json.p6_25);
                        $("#p6_50").html(json.p6_50);
                        $("#p6_75").html(json.p6_75);
                        $("#p6_90").html(json.p6_90);
                        $("#p6_95").html(json.p6_95);
                });
            }else if(sexo === "mujer"){
                var parametros ={
                    grupo1: grupo1
                }
                $.get("../conex/perc_adultom.php", parametros, function(resp){
                    var json= JSON.parse(resp);
                    if (json.status == 200)
                        $("#p1_5").html(json.p1_5);
                        $("#p1_10").html(json.p1_10);
                        $("#p1_25").html(json.p1_25);
                        $("#p1_50").html(json.p1_50);
                        $("#p1_75").html(json.p1_75);
                        $("#p1_90").html(json.p1_90);
                        $("#p1_95").html(json.p1_95);
                        
                        $("#p2_5").html(json.p2_5);
                        $("#p2_10").html(json.p2_10);
                        $("#p2_25").html(json.p2_25);
                        $("#p2_50").html(json.p2_50);
                        $("#p2_75").html(json.p2_75);
                        $("#p2_90").html(json.p2_90);
                        $("#p2_95").html(json.p2_95);

                        $("#p3_5").html(json.p3_5);
                        $("#p3_10").html(json.p3_10);
                        $("#p3_25").html(json.p3_25);
                        $("#p3_50").html(json.p3_50);
                        $("#p3_75").html(json.p3_75);
                        $("#p3_90").html(json.p3_90);
                        $("#p3_95").html(json.p3_95);

                        $("#p4_5").html(json.p4_5);
                        $("#p4_10").html(json.p4_10);
                        $("#p4_25").html(json.p4_25);
                        $("#p4_50").html(json.p4_50);
                        $("#p4_75").html(json.p4_75);
                        $("#p4_90").html(json.p4_90);
                        $("#p4_95").html(json.p4_95);

                        $("#p5_5").html(json.p5_5);
                        $("#p5_10").html(json.p5_10);
                        $("#p5_25").html(json.p5_25);
                        $("#p5_50").html(json.p5_50);
                        $("#p5_75").html(json.p5_75);
                        $("#p5_90").html(json.p5_90);
                        $("#p5_95").html(json.p5_95);

                        $("#p6_5").html(json.p6_5);
                        $("#p6_10").html(json.p6_10);
                        $("#p6_25").html(json.p6_25);
                        $("#p6_50").html(json.p6_50);
                        $("#p6_75").html(json.p6_75);
                        $("#p6_90").html(json.p6_90);
                        $("#p6_95").html(json.p6_95);
                });
            }
        }
    </script>
    
</body>
</html>