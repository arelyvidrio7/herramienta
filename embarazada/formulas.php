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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>NutriPAES - Embarazo (Fórmulas)</title>
</head>
<body>
<style>
@media (max-width:380px){
    input{width: 175px}
}
</style>
    <br><br><br>
    <div class="container border bg-white rounded shadow m-0 p-0  m-auto">

        <div class="row m-0 p-0">
            <div class="col-12"><h4 class="bg-light text-center rounded fw-bold">Fórmulas para mujeres en etapa de Embarazo</h4></div> 
            <div class="col-12"><h5 class="text-center alert-primary p-1 text-dark fw-bold rounded fst-italic">Las siguientes fórmulas son sólo para consulta y no serán almacenadas...</h5></div> 
        </div>   
                        <!-- PRIMERA PARTE -->
<article class="article m-auto">
    <div id="parte2" class="table-responsive">
    <div>
        <div class="col-12 alert-primary mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Información del paciente
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
                    <option value="mujer">Mujer</option>
                </select>
                Edad:
                <input style="width:100px" id="edad" name="edad" placeholder="Edad (años)">
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <table class="table table-sm">
        <thead class="bg-primary bg-gradient text-center text-white-50 text-shadow">
            <tr class="p-0 m-0">
                <th colspan="5">Indicadores actuales</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <tr>
            <td>Talla o estatura:
                <input class="w-50" id="talla" name="talla" placeholder="Estatura (m)">
            </td>
            <td>Tipo de embarazo:
                <select id="tipo_emb" name="tipo_emb">
                    <option value="unico">Embarazo único</option>
                    <option value="gemelar">Embarazo gemelar</option>
                </select>
            </td>
            <td>Peso pre-gestacional:
                <input class="w-50" id="peso" name="peso" placeholder="Peso (kg)">
            </td>
            <td>Peso actualmente:
                <input class="w-50" id="peso_actual" name="peso_actual" placeholder="Peso actual (kg)">
            </td>
            <td>Semanas de gestación:
                <input class="w-50" id="semanas" name="semanas" placeholder="Semanas">
            </td>
        </tr>
        </tbody>
    </table>

    <div>
        <div class="col-12 alert-primary mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Resultados
    </div>
<table class="table m-0 p-0" id="resultados_f" onclick="calculo_formulas()">
                        <!-- CABECERA -->
    <thead class="bg-primary bg-gradient text-center text-white-50 shadow">
        <tr>
            <th scope="col">IMC pre-gestacinal</th>
            <th scope="col">Peso esperado (semanas)</th>
            <th scope="col">Ganancia de peso total</th>
        </tr>
    </thead>
                            <!-- RESULTADOS DE CABECERA -->
    <tbody class="text-center">
        <tr scope="row">
            <td><span class="fw-bold p-1" id="valor_imc"></span><br><span id="interpretacion_imc"></span></td>
            <td id="peso_esperado"></td>
            <td id="peso_total"></td>
            
        </tr>
    </tbody>
</table>
</div>
<!-- CABECERA 2 -->
<div id="parte2" class="table-responsive">
<table class="table table-sm">
    <thead class="bg-primary bg-gradient text-center text-white-50 text-shadow">
        <tr class="p-0 m-0">
            <th>
                <select id="select_geb" name="select_geb">
                    <option value="mifflin">GEB Mifflin</option>
                </select>
            </th>
            <th>ETA
                <input id="eta" name="eta" style="width:35px" placeholder="ETA" value="10">
            </th>
            <th>Act Física
                <select id="af" name="af" onchange="calculo_formulas()">
                    <option value="10">Sedentario</option>
                    <option value="20">Moderado</option>
                    <option value="30">Activo</option>
                </select>
            </th>
            <th class="bg-danger ">GET</th>
        </tr>
    </thead>
                                <!-- RESULTADOS DE CABECERA 2 -->
    <tbody class="text-center">
    <tr>
        <td id="valor_geb"></td>
        <td id="valor_eta"></d=></td>
        <td id="valor_af"></td>
        <td id="valor_get" class="fs-5 alert-danger border-1 text-black"></td>
    </tr>
    </tbody>
</table>
</div>
    <div class="col-12 mb-3 text-center">
        <button id="obtener_datos" name="obtener_datos" class="obtener_datos p-2 rounded fw-bolder btn-primary bg-gradient" onclick="calculo_formulas()">Calcular fórmulas</button>
    </div>
</article>
                            <!-- COLUMNA 3 -->
<div class="col-12 alert-primary bg-gradient mt-5 mb-5 text-center text-black fw-bolder h4 fst-italic">Calorias</div>
                            <!-- SECCION 1  -->
<article class="m-auto">
<div id="table-responsive parte3" onkeyup="macros()">
<table>
    <thead>
        <tr class="alert-success border-2"><th class="text-black h5 fw-bold p-2">Total Kcal : </th><th><input id="valor_kcal" style="width:180px" placeholder="Kcal asignadas"></th></tr>
    </thead>
</table>
    
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
<script src="../assets/js/embarazada.js"></script>
</body>
</html>

</body>
</html>