<?php
session_start();

include 'navbar.php'; 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="../assets/css_px/analisis_clin.css">
        <title>NutriPAES - Embarazo (Análisis Clínicos)</title>
    </head>
    <body> 

    <br>
    <br>
    <br>
    <section class="seccion_analisis">
        <table id="tab_analisis" name="tab_analisis" class="tabla_analisis" style="margin: 0 auto;">
            <thead>
            <tr>
            <th colspan="10">BIOMETRIA HEMÁTICA</th>
            </tr>
            </thead>

            <tbody>
            <tr>
            <th style="text-align:center" colspan="10"> SERIE ROJA </th>
            </tr>

            <tr>
            <th> Parámetros </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th class="colum_m" colspan="7" style="width:400px" id="valores_h">Valores de referencia</th>
            </tr>

            <tr>
            <td>Eritrocitos:</td>
            <td><input id="eritrocitos" name="eritrocitos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>millones/µL</td>
            <td class="colum_m" colspan="2">4.2</td>
            <td class="colum_m" >a</td>
            <td class="colum_m" colspan="2">5.4</td>
            <td class="colum_m" colspan="2">millones/µL</td>
            </tr>

            <tr>
            <td>Hemoglobina:</td>
            <td><input id="hemoglobina" name="hemoglobina" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>g/dl</td>
            <td class="colum_m" colspan="2">12</td>
            <td class="colum_m" >a</td>
            <td class="colum_m" colspan="2">16</td>
            <td class="colum_m" colspan="2">g/dl</td>
            </tr>

            <tr>
            <td>Hematocrito:</td>
            <td><input id="hematocrito" name="hematocrito" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>%</td>
            <td class="colum_m" colspan="2">38</td>
            <td class="colum_m" >a</td>
            <td class="colum_m" colspan="2">47</td>
            <td class="colum_m" colspan="2">%</td>
            </tr>

            <tr>
            <td>H.C.M.:</td>
            <td><input id="h_c_m" name="h_c_m" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>pg</td>
            <td class="colum_m" colspan="2">27</td>
            <td class="colum_m" >a</td>
            <td class="colum_m" colspan="2">32</td>
            <td class="colum_m" colspan="2">pg</td>
            </tr>

            <tr>
            <td>V.C.M.:</td>
            <td><input id="v_c_m" name="v_c_m" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>µ3</td>
            <td class="colum_m" colspan="2">84</td>
            <td class="colum_m" >a</td>
            <td class="colum_m" colspan="2">98</td>
            <td class="colum_m" colspan="2">µ3</td>
            </tr>

            <tr>
            <td>C.H.C.M.:</td>
            <td><input id="c_h_c_m" name="c_h_c_m" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>g/dL</td>
            <td class="colum_m" colspan="2">30</td>
            <td class="colum_m" >a</td>
            <td class="colum_m" colspan="2">36</td>
            <td class="colum_m" colspan="2">g/dL</td>
            </tr>

            <tr>
            <th style="text-align:center" colspan="10"> SERIE BLANCA </th>
            </tr>

            <tr>
            <td>Leucocitos:</td>
            <td><input id="leucocitos" name="leucocitos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>/µL</td>
            <td class="colum_m" colspan="2">5000</td>
            <td class="colum_m" >a</td>
            <td class="colum_m" colspan="2">10000</td>
            <td class="colum_m" colspan="2">/µL</td>
            </tr>

            <tr>
            <th> Diferencial </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th class="colum_m" colspan="7" style="width:400px" id="valores_h">Valores de referencia</th>
            </tr>

            <tr>
            <th></th>
            <th>%</th>
            <th>/µL</th>
            <th class="colum_m" colspan="3">- Fórmula relativa (%) -</th>
            <th class="colum_m" style="width:10px"></th>
            <th class="colum_m" colspan="3">- Fórmula absoluta (/µL) -</th>
            </tr>

            <tr>
            <td>Linfocitos:</td>
            <td><input id="linfocitos1" name="linfocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="linfocitos2" name="linfocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">24</td>
            <td class="colum_m">a</td>
            <td class="colum_m">38</td>
            <td class="colum_m"></td>
            <td class="colum_m">1500</td>
            <td class="colum_m">a</td>
            <td class="colum_m">2500</td>
            </tr>

            <tr>
            <td>Monocitos:</td>
            <td><input id="monocitos1" name="monocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="monocitos2" name="monocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">3</td>
            <td class="colum_m">a</td>
            <td class="colum_m">6</td>
            <td class="colum_m"></td>
            <td class="colum_m">250</td>
            <td class="colum_m">a</td>
            <td class="colum_m">500</td>
            </tr>

            <tr>
            <td>Eosinofilos:</td>
            <td><input id="eosinofilos1" name="eosinofilos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="eosinofilos2" name="eosinofilos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">1</td>
            <td class="colum_m">a</td>
            <td class="colum_m">4</td>
            <td class="colum_m"></td>
            <td class="colum_m">150</td>
            <td class="colum_m">a</td>
            <td class="colum_m">200</td>
            </tr>

            <tr>
            <td>Basofilos:</td>
            <td><input id="basofilos1" name="basofilos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="basofilos2" name="basofilos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m">1</td>
            <td class="colum_m"></td>
            <td class="colum_m">30</td>
            <td class="colum_m">a</td>
            <td class="colum_m">60</td>
            </tr>

            <tr>
            <td>Neutrofilos:</td>
            <td><input id="neutrofilos1" name="neutrofilos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="neutrofilos2" name="neutrofilos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">55</td>
            <td class="colum_m">a</td>
            <td class="colum_m">70</td>
            <td class="colum_m"></td>
            <td class="colum_m">3000</td>
            <td class="colum_m">a</td>
            <td class="colum_m">4500</td>
            </tr>

            <tr>
            <td>  Segmentados:</td>
            <td><input id="segmentados1" name="segmentados1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="segmentados2" name="segmentados2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">45</td>
            <td class="colum_m">a</td>
            <td class="colum_m">65</td>
            <td class="colum_m"></td>
            <td class="colum_m">2500</td>
            <td class="colum_m">a</td>
            <td class="colum_m">4000</td>
            </tr>

            <tr>
            <td>  Bandas:</td>
            <td><input id="bandas1" name="bandas1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="bandas2" name="bandas2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m">3</td>
            <td class="colum_m"></td>
            <td class="colum_m">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m">180</td>
            </tr>

            <tr>
            <td>  Metamielocitos:</td>
            <td><input id="metamielocitos1" name="metamielocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="metamielocitos2" name="metamielocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m">0</td>
            <td class="colum_m"></td>
            <td class="colum_m">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m">0</td>
            </tr>

            <tr>
            <td>  Mielocitos:</td>
            <td><input id="mielocitos1" name="mielocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="mielocitos2" name="mielocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m">0</td>
            <td class="colum_m"></td>
            <td class="colum_m">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m">0</td>
            </tr>

            <tr>
            <td>  Promielocitos:</td>
            <td><input id="promielocitos1" name="promielocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="promielocitos2" name="promielocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td class="colum_m">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m">0</td>
            <td class="colum_m"></td>
            <td class="colum_m">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m">0</td>
            </tr>

            <tr>
            <td>Plaquetas:</td>
            <td><input id="plaquetas" name="plaquetas" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>/µL</td>
            <td class="colum_m" colspan="2">150000</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">450000</td>
            <td class="colum_m" colspan="2">/µL</td>
            </tr>

            <tr>
            <td>Reticulocitos:</td>
            <td><input id="reticulocitos" name="reticulocitos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>%</td>
            <td class="colum_m" colspan="2">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">1</td>
            <td class="colum_m" colspan="2">%</td>
            </tr>

            <tr>
            <td>Eritroblastos:</td>
            <td><input id="eritroblastos" name="eritroblastos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>%</td>
            <td class="colum_m" colspan="2">0</td>
            <td class="colum_m">%</td>
            <td class="colum_m" colspan="2"></td>
            <td class="colum_m" colspan="2"></td>
            </tr>

            <thead>
            <tr>
            <th style="text-align:center" colspan="10">QUÍMICA SANGUÍNEA COMPLETA</th>
            </tr>
            </thead>

            <tr>
            <th> Parámetros </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th class="colum_m" colspan="7" style="width:400px" id="valores_h">Valores de referencia</th>
            </tr>

            <tr>
            <td>Glucosa:</td>
            <td><input id="glucosa" name="glucosa" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td class="colum_m" colspan="2">70</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">115</td>
            <td class="colum_m" colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Urea:</td>
            <td><input id="urea" name="urea" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td class="colum_m" colspan="2">13</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">43</td>
            <td class="colum_m" colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Creatinina:</td>
            <td><input id="creatinina" name="creatinina" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td class="colum_m" colspan="2">0.6</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">1.1</td>
            <td class="colum_m" colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Acido Úrico:</td>
            <td><input id="acido_urico" name="acido_urico" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td class="colum_m" colspan="2">2.4</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">5.7</td>
            <td class="colum_m" colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Colesterol:</td>
            <td><input id="colesterol" name="colesterol" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td class="colum_m" colspan="2">101</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">200</td>
            <td class="colum_m" colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Triglicéridos:</td>
            <td><input id="trigliceridos" name="trigliceridos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td class="colum_m" colspan="2">35</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">135</td>
            <td class="colum_m" colspan="2">mg/dL</td>
            </tr>

            <thead>
            <tr>
            <th style="text-align:center" colspan="10">HEMOGLOBINA GLICOSILADA</th>
            </tr>
            </thead>

            <tr>
            <th> Parámetros </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th class="colum_m" colspan="7" style="width:400px" id="valores_h">Valores de referencia</th>
            </tr>

            <tr>
            <td rowspan="2">Hemoglobina Glicosilada:</td>
            <td><input id="hemoglobina_glicosilada" name="hemoglobina_glicosilada" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>%</td>
            <td class="colum_m" colspan="2">4</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">8</td>
            <td class="colum_m" colspan="2">%</td>
            </tr>

            <tr>
            <td colspan="2">Estado del paciente:</td>
            <td class="colum_m" colspan="7" id="r_hemgli_mujer"></td>
            </tr>

            <thead>
            <tr>
            <th style="text-align:center" colspan="10">ELECTROLITOS SÉRICOS</th>
            </tr>
            </thead>

            <tr>
            <th> Parámetros </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th class="colum_m" colspan="7" style="width:400px" id="valores_h">Valores de referencia</th>
            </tr>
            
            <tr>
            <td>Sodio (Na):</td>
            <td><input id="sodio" name="sodio" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>meq/L</td>
            <td class="colum_m" colspan="2">135</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">155</td>
            <td class="colum_m" colspan="2">meq/L</td>
            </tr>

            <tr>
            <td>Potasio (K):</td>
            <td><input id="potasio" name="potasio" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>meq/L</td>
            <td class="colum_m" colspan="2">3.6</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">5.5</td>
            <td class="colum_m" colspan="2">meq/L</td>
            </tr>

            <tr>
            <td>Cloruros (Cl):</td>
            <td><input id="cloruros" name="cloruros" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mmol/L</td>
            <td class="colum_m" colspan="2">94</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">111</td>
            <td class="colum_m" colspan="2">mmol/L</td>
            </tr>

            <thead>
            <tr>
            <th style="text-align:center" colspan="10">BILIRRUBINAS Y TRANSAMINASAS</th>
            </tr>
            </thead>

            <tr>
            <th> Parámetros </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th class="colum_m" colspan="7" style="width:400px" id="valores_h">Valores de referencia</th>
            </tr>

            <tr>
            <td>Bilirrubina directa:</td>
            <td><input id="bilirrubina_d" name="bilirrubina_d" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td class="colum_m" colspan="3">HASTA</td>
            <td class="colum_m" colspan="2">0.25</td>
            <td class="colum_m" colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Bilirrubina indirecta:</td>
            <td><input id="bilirrubina_i" name="bilirrubina_i" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td class="colum_m" colspan="3">HASTA</td>
            <td class="colum_m" colspan="2">0.75</td>
            <td class="colum_m" colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Bilirrubina total:</td>
            <td><input id="bilirrubina_t" name="bilirrubina_t" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td class="colum_m" colspan="3">HASTA</td>
            <td class="colum_m" colspan="2">1.0</td>
            <td class="colum_m" colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Transaminasa piruvica:</td>
            <td><input id="transaminasa_p" name="transaminasa_p" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>U/L</td>
            <td class="colum_m" colspan="2">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">36</td>
            <td class="colum_m" colspan="2">U/L</td>
            </tr>

            <tr>
            <td>Transaminasa oxalacética:</td>
            <td><input id="transaminasa_o" name="transaminasa_o" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>U/L</td>
            <td class="colum_m" colspan="2">0</td>
            <td class="colum_m">a</td>
            <td class="colum_m" colspan="2">34</td>
            <td class="colum_m" colspan="2">U/L</td>
            </tr>
        </tbody>
        </table>
    </section>

            <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>

            <script type="text/javascript">

            //Resultados según Análisis clínicos
            function analisis(){
                var eritrocitos = parseFloat(document.getElementById("eritrocitos").value) || 0,
                hemoglobina = parseFloat(document.getElementById("hemoglobina").value) || 0,
                hematocrito = parseFloat(document.getElementById("hematocrito").value) || 0,
                h_c_m = parseFloat(document.getElementById("h_c_m").value) || 0,
                v_c_m = parseFloat(document.getElementById("v_c_m").value) || 0,
                c_h_c_m = parseFloat(document.getElementById("c_h_c_m").value) || 0,
                leucocitos = parseFloat(document.getElementById("leucocitos").value) || 0,
                linfocitos1 = parseFloat(document.getElementById("linfocitos1").value) || 0,
                linfocitos2 = parseFloat(document.getElementById("linfocitos2").value) || 0,
                monocitos1 = parseFloat(document.getElementById("monocitos1").value) || 0,
                monocitos2 = parseFloat(document.getElementById("monocitos2").value) || 0,
                eosinofilos1 = parseFloat(document.getElementById("eosinofilos1").value) || 0,
                eosinofilos2 = parseFloat(document.getElementById("eosinofilos2").value) || 0,
                basofilos1 = parseFloat(document.getElementById("basofilos1").value) || 0,
                basofilos2 = parseFloat(document.getElementById("basofilos2").value) || 0,
                neutrofilos1 = parseFloat(document.getElementById("neutrofilos1").value) || 0,
                neutrofilos2 = parseFloat(document.getElementById("neutrofilos2").value) || 0,
                segmentados1 = parseFloat(document.getElementById("segmentados1").value) || 0,
                segmentados2 = parseFloat(document.getElementById("segmentados2").value) || 0,
                bandas1 = parseFloat(document.getElementById("bandas1").value) || 0,
                bandas2 = parseFloat(document.getElementById("bandas2").value) || 0,
                metamielocitos1 = parseFloat(document.getElementById("metamielocitos1").value),
                metamielocitos2 = parseFloat(document.getElementById("metamielocitos2").value),
                mielocitos1 = parseFloat(document.getElementById("mielocitos1").value),
                mielocitos2 = parseFloat(document.getElementById("mielocitos2").value),
                promielocitos1 = parseFloat(document.getElementById("promielocitos1").value),
                promielocitos2 = parseFloat(document.getElementById("promielocitos2").value),
                plaquetas = parseFloat(document.getElementById("plaquetas").value) || 0,
                reticulocitos = parseFloat(document.getElementById("reticulocitos").value),
                eritroblastos = parseFloat(document.getElementById("eritroblastos").value),
                glucosa = parseFloat(document.getElementById("glucosa").value) || 0,
                urea = parseFloat(document.getElementById("urea").value) || 0,
                creatinina = parseFloat(document.getElementById("creatinina").value) || 0,
                acido_urico = parseFloat(document.getElementById("acido_urico").value) || 0,
                colesterol = parseFloat(document.getElementById("colesterol").value) || 0,
                trigliceridos = parseFloat(document.getElementById("trigliceridos").value) || 0,
                hemoglobina_glicosilada = parseFloat(document.getElementById("hemoglobina_glicosilada").value) || 0,
                sodio = parseFloat(document.getElementById("sodio").value) || 0,
                potasio = parseFloat(document.getElementById("potasio").value) || 0,
                cloruros = parseFloat(document.getElementById("cloruros").value) || 0,
                bilirrubina_d = parseFloat(document.getElementById("bilirrubina_d").value) || 0,
                bilirrubina_i = parseFloat(document.getElementById("bilirrubina_i").value) || 0,
                bilirrubina_t = parseFloat(document.getElementById("bilirrubina_t").value) || 0,
                transaminasa_p = parseFloat(document.getElementById("transaminasa_p").value) || 0,
                transaminasa_o = parseFloat(document.getElementById("transaminasa_o").value) || 0;

                    //eritrocitos
                    if(eritrocitos == 0){
                        document.getElementById("eritrocitos").style.backgroundColor = "white";
                    }else if(eritrocitos > 5.4){
                        document.getElementById("eritrocitos").style.backgroundColor = "#FF0000";
                    }else if(eritrocitos >= 4.2 && eritrocitos <= 5.4){
                        document.getElementById("eritrocitos").style.backgroundColor = "green";
                    }else if(eritrocitos < 4.2){
                        document.getElementById("eritrocitos").style.backgroundColor = "orange";
                    }

                    //hemoglobina
                    if(hemoglobina == 0){
                        document.getElementById("hemoglobina").style.backgroundColor = "#f3f3f3";
                    }else if(hemoglobina > 16){
                        document.getElementById("hemoglobina").style.backgroundColor = "#FF0000";
                    }else if(hemoglobina >= 12 && hemoglobina <= 16){
                        document.getElementById("hemoglobina").style.backgroundColor = "green";
                    }else if(hemoglobina < 12){
                        document.getElementById("hemoglobina").style.backgroundColor = "orange";
                    }

                    //hematocrito
                    if(hematocrito == 0){
                        document.getElementById("hematocrito").style.backgroundColor = "white";
                    }else if(hematocrito > 47){
                        document.getElementById("hematocrito").style.backgroundColor = "#FF0000";
                    }else if(hematocrito >= 38 && hematocrito <= 47){
                        document.getElementById("hematocrito").style.backgroundColor = "green";
                    }else if(hematocrito < 38){
                        document.getElementById("hematocrito").style.backgroundColor = "orange";
                    }

                    //h_c_m
                    if(h_c_m == 0){
                        document.getElementById("h_c_m").style.backgroundColor = "#f3f3f3";
                    }else if(h_c_m > 32){
                        document.getElementById("h_c_m").style.backgroundColor = "#FF0000";
                    }else if(h_c_m >= 27 && h_c_m <= 32){
                        document.getElementById("h_c_m").style.backgroundColor = "green";
                    }else if(h_c_m < 27){
                        document.getElementById("h_c_m").style.backgroundColor = "orange";
                    }

                    //v_c_m
                    if(v_c_m == 0){
                        document.getElementById("v_c_m").style.backgroundColor = "white";
                    }else if(v_c_m > 98){
                        document.getElementById("v_c_m").style.backgroundColor = "#FF0000";
                    }else if(v_c_m >= 84 && v_c_m <= 98){
                        document.getElementById("v_c_m").style.backgroundColor = "green";
                    }else if(v_c_m < 84){
                        document.getElementById("v_c_m").style.backgroundColor = "orange";
                    }

                    //c_h_c_m
                    if(c_h_c_m == 0){
                        document.getElementById("c_h_c_m").style.backgroundColor = "#f3f3f3";
                    }else if(c_h_c_m > 36){
                        document.getElementById("c_h_c_m").style.backgroundColor = "#FF0000";
                    }else if(c_h_c_m >= 30 && c_h_c_m <= 36){
                        document.getElementById("c_h_c_m").style.backgroundColor = "green";
                    }else if(c_h_c_m < 30){
                        document.getElementById("c_h_c_m").style.backgroundColor = "orange";
                    }

                    //leucocitos
                    if(leucocitos == 0){
                        document.getElementById("leucocitos").style.backgroundColor = "#f3f3f3";
                    }else if(leucocitos > 10000){
                        document.getElementById("leucocitos").style.backgroundColor = "#FF0000";
                    }else if(leucocitos >= 5000 && leucocitos <= 10000){
                        document.getElementById("leucocitos").style.backgroundColor = "green";
                    }else if(leucocitos < 5000){
                        document.getElementById("leucocitos").style.backgroundColor = "orange";
                    }

                    //linfocitos1
                    if(linfocitos1 == 0){
                        document.getElementById("linfocitos1").style.backgroundColor = "white";
                    }else if(linfocitos1 > 38){
                        document.getElementById("linfocitos1").style.backgroundColor = "#FF0000";
                    }else if(linfocitos1 >= 24 && linfocitos1 <= 38){
                        document.getElementById("linfocitos1").style.backgroundColor = "green";
                    }else if(linfocitos1 < 24){
                        document.getElementById("linfocitos1").style.backgroundColor = "orange";
                    }

                    //linfocitos2
                    if(linfocitos2 == 0){
                        document.getElementById("linfocitos2").style.backgroundColor = "white";
                    }else if(linfocitos2 > 2500){
                        document.getElementById("linfocitos2").style.backgroundColor = "#FF0000";
                    }else if(linfocitos2 >= 1500 && linfocitos2 <= 2500){
                        document.getElementById("linfocitos2").style.backgroundColor = "green";
                    }else if(linfocitos2 < 1500){
                        document.getElementById("linfocitos2").style.backgroundColor = "orange";
                    }

                    //monocitos1
                    if(monocitos1 == 0){
                        document.getElementById("monocitos1").style.backgroundColor = "#f3f3f3";
                    }else if(monocitos1 > 6){
                        document.getElementById("monocitos1").style.backgroundColor = "#FF0000";
                    }else if(monocitos1 >= 3 && monocitos1 <= 6){
                        document.getElementById("monocitos1").style.backgroundColor = "green";
                    }else if(monocitos1 < 3){
                        document.getElementById("monocitos1").style.backgroundColor = "orange";
                    }

                    //monocitos2
                    if(monocitos2 == 0){
                        document.getElementById("monocitos2").style.backgroundColor = "#f3f3f3";
                    }else if(monocitos2 > 500){
                        document.getElementById("monocitos2").style.backgroundColor = "#FF0000";
                    }else if(monocitos2 >= 250 && monocitos2 <= 500){
                        document.getElementById("monocitos2").style.backgroundColor = "green";
                    }else if(monocitos2 < 250){
                        document.getElementById("monocitos2").style.backgroundColor = "orange";
                    }

                    //eosinofilos1
                    if(eosinofilos1 == 0){
                        document.getElementById("eosinofilos1").style.backgroundColor = "white";
                    }else if(eosinofilos1 > 4){
                        document.getElementById("eosinofilos1").style.backgroundColor = "#FF0000";
                    }else if(eosinofilos1 >= 1 && eosinofilos1 <= 4){
                        document.getElementById("eosinofilos1").style.backgroundColor = "green";
                    }else if(eosinofilos1 < 1){
                        document.getElementById("eosinofilos1").style.backgroundColor = "orange";
                    }

                    //eosinofilos2
                    if(eosinofilos2 == 0){
                        document.getElementById("eosinofilos2").style.backgroundColor = "white";
                    }else if(eosinofilos2 > 200){
                        document.getElementById("eosinofilos2").style.backgroundColor = "#FF0000";
                    }else if(eosinofilos2 >= 150 && eosinofilos2 <= 200){
                        document.getElementById("eosinofilos2").style.backgroundColor = "green";
                    }else if(eosinofilos2 < 150){
                        document.getElementById("eosinofilos2").style.backgroundColor = "orange";
                    }

                    //basofilos1
                    if(basofilos1 == 0){
                        document.getElementById("basofilos1").style.backgroundColor = "#f3f3f3";
                    }else if(basofilos1 > 1){
                        document.getElementById("basofilos1").style.backgroundColor = "#FF0000";
                    }else if(basofilos1 >= 0 && basofilos1 <= 1){
                        document.getElementById("basofilos1").style.backgroundColor = "green";
                    }else if(basofilos1 < 0){
                        document.getElementById("basofilos1").style.backgroundColor = "orange";
                    }

                    //basofilos2
                    if(basofilos2 == 0){
                        document.getElementById("basofilos2").style.backgroundColor = "#f3f3f3";
                    }else if(basofilos2 > 60){
                        document.getElementById("basofilos2").style.backgroundColor = "#FF0000";
                    }else if(basofilos2 >= 30 && basofilos2 <= 60){
                        document.getElementById("basofilos2").style.backgroundColor = "green";
                    }else if(basofilos2 < 30){
                        document.getElementById("basofilos2").style.backgroundColor = "orange";
                    }

                    //neutrofilos1
                    if(neutrofilos1 == 0){
                        document.getElementById("neutrofilos1").style.backgroundColor = "white";
                    }else if(neutrofilos1 > 70){
                        document.getElementById("neutrofilos1").style.backgroundColor = "#FF0000";
                    }else if(neutrofilos1 >= 55 && neutrofilos1 <= 70){
                        document.getElementById("neutrofilos1").style.backgroundColor = "green";
                    }else if(neutrofilos1 < 55){
                        document.getElementById("neutrofilos1").style.backgroundColor = "orange";
                    }

                    //neutrofilos2
                    if(neutrofilos2 == 0){
                        document.getElementById("neutrofilos2").style.backgroundColor = "white";
                    }else if(neutrofilos2 > 4500){
                        document.getElementById("neutrofilos2").style.backgroundColor = "#FF0000";
                    }else if(neutrofilos2 >= 3000 && neutrofilos2 <= 4500){
                        document.getElementById("neutrofilos2").style.backgroundColor = "green";
                    }else if(neutrofilos2 < 3000){
                        document.getElementById("neutrofilos2").style.backgroundColor = "orange";
                    }

                    //segmentados1
                    if(segmentados1 == 0){
                        document.getElementById("segmentados1").style.backgroundColor = "#f3f3f3";
                    }else if(segmentados1 > 65){
                        document.getElementById("segmentados1").style.backgroundColor = "#FF0000";
                    }else if(segmentados1 >= 45 && segmentados1 <= 65){
                        document.getElementById("segmentados1").style.backgroundColor = "green";
                    }else if(segmentados1 < 45){
                        document.getElementById("segmentados1").style.backgroundColor = "orange";
                    }

                    //segmentados2
                    if(segmentados2 == 0){
                        document.getElementById("segmentados2").style.backgroundColor = "#f3f3f3";
                    }else if(segmentados2 > 4000){
                        document.getElementById("segmentados2").style.backgroundColor = "#FF0000";
                    }else if(segmentados2 >= 2500 && segmentados2 <= 4000){
                        document.getElementById("segmentados2").style.backgroundColor = "green";
                    }else if(segmentados2 < 2500){
                        document.getElementById("segmentados2").style.backgroundColor = "orange";
                    }

                    //bandas1
                    if(bandas1 == 0){
                        document.getElementById("bandas1").style.backgroundColor = "white";
                    }else if(bandas1 > 3){
                        document.getElementById("bandas1").style.backgroundColor = "#FF0000";
                    }else if(bandas1 >= 0 && bandas1 <= 3){
                        document.getElementById("bandas1").style.backgroundColor = "green";
                    }else if(bandas1 < 0){
                        document.getElementById("bandas1").style.backgroundColor = "orange";
                    }

                    //bandas2
                    if(bandas2 == 0){
                        document.getElementById("bandas2").style.backgroundColor = "white";
                    }else if(bandas2 > 180){
                        document.getElementById("bandas2").style.backgroundColor = "#FF0000";
                    }else if(bandas2 >= 0 && bandas2 <= 180){
                        document.getElementById("bandas2").style.backgroundColor = "green";
                    }else if(bandas2 < 0){
                        document.getElementById("bandas2").style.backgroundColor = "orange";
                    }

                    //metamielocitos1
                    if(metamielocitos1 > 0){
                        document.getElementById("metamielocitos1").style.backgroundColor = "#FF0000";
                    }else if(metamielocitos1 == 0){
                        document.getElementById("metamielocitos1").style.backgroundColor = "green";
                    }else if(metamielocitos1 < 0){
                        document.getElementById("metamielocitos1").style.backgroundColor = "orange";
                    }

                    //metamielocitos2
                    if(metamielocitos2 > 0){
                        document.getElementById("metamielocitos2").style.backgroundColor = "#FF0000";
                    }else if(metamielocitos2 == 0){
                        document.getElementById("metamielocitos2").style.backgroundColor = "green";
                    }else if(metamielocitos2 < 0){
                        document.getElementById("metamielocitos2").style.backgroundColor = "orange";
                    }

                    //mielocitos1
                    if(mielocitos1 > 0){
                        document.getElementById("mielocitos1").style.backgroundColor = "#FF0000";
                    }else if(mielocitos1 == 0){
                        document.getElementById("mielocitos1").style.backgroundColor = "green";
                    }else if(mielocitos1 < 0){
                        document.getElementById("mielocitos1").style.backgroundColor = "orange";
                    }

                    //mielocitos2
                    if(mielocitos2 > 0){
                        document.getElementById("mielocitos2").style.backgroundColor = "#FF0000";
                    }else if(mielocitos2 == 0){
                        document.getElementById("mielocitos2").style.backgroundColor = "green";
                    }else if(mielocitos2 < 0){
                        document.getElementById("mielocitos2").style.backgroundColor = "orange";
                    }

                    //promielocitos1
                    if(promielocitos1 > 0){
                        document.getElementById("promielocitos1").style.backgroundColor = "#FF0000";
                    }else if(promielocitos1 == 0){
                        document.getElementById("promielocitos1").style.backgroundColor = "green";
                    }else if(promielocitos1 < 0){
                        document.getElementById("promielocitos1").style.backgroundColor = "orange";
                    }

                    //promielocitos2
                    if(promielocitos2 > 0){
                        document.getElementById("promielocitos2").style.backgroundColor = "#FF0000";
                    }else if(promielocitos2 == 0){
                        document.getElementById("promielocitos2").style.backgroundColor = "green";
                    }else if(promielocitos2 < 0){
                        document.getElementById("promielocitos2").style.backgroundColor = "orange";
                    }

                    //plaquetas
                    if(plaquetas == 0){
                        document.getElementById("plaquetas").style.backgroundColor = "white";
                    }else if(plaquetas > 450000){
                        document.getElementById("plaquetas").style.backgroundColor = "#FF0000";
                    }else if(plaquetas >= 150000 && plaquetas <= 450000){
                        document.getElementById("plaquetas").style.backgroundColor = "green";
                    }else if(plaquetas < 150000){
                        document.getElementById("plaquetas").style.backgroundColor = "orange";
                    }

                    //reticulocitos
                    if(reticulocitos > 1){
                        document.getElementById("reticulocitos").style.backgroundColor = "#FF0000";
                    }else if(reticulocitos >= 0 && reticulocitos <= 1){
                        document.getElementById("reticulocitos").style.backgroundColor = "green";
                    }else if(reticulocitos < 0){
                        document.getElementById("reticulocitos").style.backgroundColor = "orange";
                    }

                    //eritroblastos
                    if(eritroblastos > 0){
                        document.getElementById("eritroblastos").style.backgroundColor = "#FF0000";
                    }else if(eritroblastos == 0){
                        document.getElementById("eritroblastos").style.backgroundColor = "green";
                    }else if(eritroblastos < 0){
                        document.getElementById("eritroblastos").style.backgroundColor = "orange";
                    }

                    //glucosa
                    if(glucosa == 0){
                        document.getElementById("glucosa").style.backgroundColor = "#f3f3f3";
                    }else if(glucosa > 115){
                        document.getElementById("glucosa").style.backgroundColor = "#FF0000";
                    }else if(glucosa >= 70 && glucosa <= 115){
                        document.getElementById("glucosa").style.backgroundColor = "green";
                    }else if(glucosa < 70){
                        document.getElementById("glucosa").style.backgroundColor = "orange";
                    }

                    //urea
                    if(urea == 0){
                        document.getElementById("urea").style.backgroundColor = "white";
                    }else if(urea > 43){
                        document.getElementById("urea").style.backgroundColor = "#FF0000";
                    }else if(urea >= 13 && urea <= 43){
                        document.getElementById("urea").style.backgroundColor = "green";
                    }else if(urea < 13){
                        document.getElementById("urea").style.backgroundColor = "orange";
                    }

                    //creatinina
                    if(creatinina == 0){
                        document.getElementById("creatinina").style.backgroundColor = "#f3f3f3";
                    }else if(creatinina > 1.1){
                        document.getElementById("creatinina").style.backgroundColor = "#FF0000";
                    }else if(creatinina >= 0.6 && creatinina <= 1.1){
                        document.getElementById("creatinina").style.backgroundColor = "green";
                    }else if(creatinina < 0.6){
                        document.getElementById("creatinina").style.backgroundColor = "orange";
                    }

                    //acido_urico
                    if(acido_urico == 0){
                        document.getElementById("acido_urico").style.backgroundColor = "white";
                    }else if(acido_urico > 5.7){
                        document.getElementById("acido_urico").style.backgroundColor = "#FF0000";
                    }else if(acido_urico >= 2.4 && acido_urico <= 5.7){
                        document.getElementById("acido_urico").style.backgroundColor = "green";
                    }else if(acido_urico < 2.4){
                        document.getElementById("acido_urico").style.backgroundColor = "orange";
                    }

                    //colesterol
                    if(colesterol == 0){
                        document.getElementById("colesterol").style.backgroundColor = "#f3f3f3";
                    }else if(colesterol > 200){
                        document.getElementById("colesterol").style.backgroundColor = "#FF0000";
                    }else if(colesterol >= 101 && colesterol <= 200){
                        document.getElementById("colesterol").style.backgroundColor = "green";
                    }else if(colesterol < 101){
                        document.getElementById("colesterol").style.backgroundColor = "orange";
                    }

                    //trigliceridos
                    if(trigliceridos == 0){
                        document.getElementById("trigliceridos").style.backgroundColor = "white";
                    }else if(trigliceridos > 135){
                        document.getElementById("trigliceridos").style.backgroundColor = "#FF0000";
                    }else if(trigliceridos >= 35 && trigliceridos <= 135){
                        document.getElementById("trigliceridos").style.backgroundColor = "green";
                    }else if(trigliceridos < 35){
                        document.getElementById("trigliceridos").style.backgroundColor = "orange";
                    }

                    //hemoglobina_glicosilada
                    if(hemoglobina_glicosilada == 0){
                        document.getElementById("hemoglobina_glicosilada").style.backgroundColor = "#f3f3f3";
                    }else if(hemoglobina_glicosilada > 8){
                        document.getElementById("hemoglobina_glicosilada").style.backgroundColor = "#FF0000";
                        document.getElementById("r_hemgli_mujer").innerHTML = "Falla en el Control";
                    }else if(hemoglobina_glicosilada >= 6){
                        document.getElementById("hemoglobina_glicosilada").style.backgroundColor = "green";
                        document.getElementById("r_hemgli_mujer").innerHTML = "Buen Control";
                    }else if(hemoglobina_glicosilada >= 4){
                        document.getElementById("hemoglobina_glicosilada").style.backgroundColor = "green";
                        document.getElementById("r_hemgli_mujer").innerHTML = "Excelente Control";
                    }else if(hemoglobina_glicosilada < 4){
                        document.getElementById("hemoglobina_glicosilada").style.backgroundColor = "orange";
                    }

                    //sodio
                    if(sodio == 0){
                        document.getElementById("sodio").style.backgroundColor = "#f3f3f3";
                    }else if(sodio > 155){
                        document.getElementById("sodio").style.backgroundColor = "#FF0000";
                    }else if(sodio >= 135 && sodio <= 155){
                        document.getElementById("sodio").style.backgroundColor = "green";
                    }else if(sodio < 135){
                        document.getElementById("sodio").style.backgroundColor = "orange";
                    }

                    //potasio
                    if(potasio == 0){
                        document.getElementById("potasio").style.backgroundColor = "white";
                    }else if(potasio > 5.5){
                        document.getElementById("potasio").style.backgroundColor = "#FF0000";
                    }else if(potasio >= 3.6 && potasio <= 5.5){
                        document.getElementById("potasio").style.backgroundColor = "green";
                    }else if(potasio < 3.6){
                        document.getElementById("potasio").style.backgroundColor = "orange";
                    }

                    //cloruros
                    if(cloruros == 0){
                        document.getElementById("cloruros").style.backgroundColor = "#f3f3f3";
                    }else if(cloruros > 111){
                        document.getElementById("cloruros").style.backgroundColor = "#FF0000";
                    }else if(cloruros >= 94 && cloruros <= 111){
                        document.getElementById("cloruros").style.backgroundColor = "green";
                    }else if(cloruros < 94){
                        document.getElementById("cloruros").style.backgroundColor = "orange";
                    }

                    //bilirrubina_d
                    if(bilirrubina_d == 0){
                        document.getElementById("bilirrubina_d").style.backgroundColor = "#f3f3f3";
                    }else if(bilirrubina_d > 0.25){
                        document.getElementById("bilirrubina_d").style.backgroundColor = "#FF0000";
                    }else if(bilirrubina_d > 0 && bilirrubina_d <= 0.25){
                        document.getElementById("bilirrubina_d").style.backgroundColor = "green";
                    }

                    //bilirrubina_i
                    if(bilirrubina_i == 0){
                        document.getElementById("bilirrubina_i").style.backgroundColor = "white";
                    }else if(bilirrubina_i > 0.75){
                        document.getElementById("bilirrubina_i").style.backgroundColor = "#FF0000";
                    }else if(bilirrubina_i > 0 && bilirrubina_i <= 0.75){
                        document.getElementById("bilirrubina_i").style.backgroundColor = "green";
                    }

                    //bilirrubina_t
                    if(bilirrubina_t == 0){
                        document.getElementById("bilirrubina_t").style.backgroundColor = "#f3f3f3";
                    }else if(bilirrubina_t > 1){
                        document.getElementById("bilirrubina_t").style.backgroundColor = "#FF0000";
                    }else if(bilirrubina_t > 0 && bilirrubina_t <= 1){
                        document.getElementById("bilirrubina_t").style.backgroundColor = "green";
                    }

                    //transaminasa_p
                    if(transaminasa_p == 0){
                        document.getElementById("transaminasa_p").style.backgroundColor = "white";
                    }else if(transaminasa_p > 36){
                        document.getElementById("transaminasa_p").style.backgroundColor = "#FF0000";
                    }else if(transaminasa_p > 0 && transaminasa_p <= 36){
                        document.getElementById("transaminasa_p").style.backgroundColor = "green";
                    }

                    //transaminasa_o
                    if(transaminasa_o == 0){
                        document.getElementById("transaminasa_o").style.backgroundColor = "#f3f3f3";
                    }else if(transaminasa_o > 34){
                        document.getElementById("transaminasa_o").style.backgroundColor = "#FF0000";
                    }else if(transaminasa_o > 0 && transaminasa_o <= 34){
                        document.getElementById("transaminasa_o").style.backgroundColor = "green";
                    }


            }
            </script>

    </body>
</html>