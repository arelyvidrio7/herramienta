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
        <title>NutriPAES - Adulto Mayor (Análisis Clínicos)</title>
    </head>
    <body>    
    <br><br><br>
    <section class="seccion_analisis">
        <div>
        <label>Sexo: </label>
        <input type="radio" name="sexo" id="hombre" value="hombre" checked onclick="valores_h()">
        <label for="hombre">Hombre</label>

        <input type="radio" name="sexo" id="mujer" value="mujer" onclick="valores_m()">
        <label for="mujer">Mujer</label>

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
            <th colspan="7" style="width:400px">Valores de referencia</th>
            </tr>

            <tr>
            <td>Eritrocitos:</td>
            <td><input id="eritrocitos" name="eritrocitos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>millones/µL</td>
            <td colspan="2" id="eri_min">4.5</td>
            <td>a</td>
            <td colspan="2" id="eri_max">6.2</td>
            <td colspan="2">millones/µL</td>
            </tr>

            <tr>
            <td>Hemoglobina:</td>
            <td><input id="hemoglobina" name="hemoglobina" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>g/dl</td>
            <td colspan="2" id="hemo_min">14</td>
            <td>a</td>
            <td colspan="2" id="hemo_max">17</td>
            <td colspan="2">g/dl</td>
            </tr>

            <tr>
            <td>Hematocrito:</td>
            <td><input id="hematocrito" name="hematocrito" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>%</td>
            <td colspan="2" id="hema_min">40</td>
            <td>a</td>
            <td colspan="2" id="hema_max">54</td>
            <td colspan="2">%</td>
            </tr>

            <tr>
            <td>H.C.M.:</td>
            <td><input id="hcm" name="hcm" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>pg</td>
            <td colspan="2" id="hcm_min">27</td>
            <td>a</td>
            <td colspan="2" id="hcm_max">32</td>
            <td colspan="2">pg</td>
            </tr>

            <tr>
            <td>V.C.M.:</td>
            <td><input id="vcm" name="vcm" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>µ3</td>
            <td colspan="2" id="vcm_min">84</td>
            <td>a</td>
            <td colspan="2" id="vcm_max">98</td>
            <td colspan="2">µ3</td>
            </tr>

            <tr>
            <td>C.H.C.M.:</td>
            <td><input id="chcm" name="chcm" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>g/dL</td>
            <td colspan="2" id="chcm_min">30</td>
            <td>a</td>
            <td colspan="2" id="chcm_max">36</td>
            <td colspan="2">g/dL</td>
            </tr>

            <tr>
            <th style="text-align:center" colspan="10"> SERIE BLANCA </th>
            </tr>

            <tr>
            <td>Leucocitos:</td>
            <td><input id="leucocitos" name="leucocitos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>/µL</td>
            <td colspan="2" id="leu_min">5000</td>
            <td>a</td>
            <td colspan="2" id="leu_max">10000</td>
            <td colspan="2">/µL</td>
            </tr>

            <tr>
            <th> Diferencial </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th colspan="7" style="width:400px">Valores de referencia</th>
            </tr>

            <tr>
            <th></th>
            <th>%</th>
            <th>/µL</th>
            <th colspan="3">- Fórmula relativa (%) -</th>
            <th style="width:10px"></th>
            <th colspan="3">- Fórmula absoluta (/µL) -</th>
            </tr>

            <tr>
            <td>Linfocitos:</td>
            <td><input id="linfocitos1" name="linfocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="linfocitos2" name="linfocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="lin1_min">24</td>
            <td>a</td>
            <td id="lin1_max">38</td>
            <td></td>
            <td id="lin2_min">1500</td>
            <td>a</td>
            <td id="lin2_max">2500</td>
            </tr>

            <tr>
            <td>Monocitos:</td>
            <td><input id="monocitos1" name="monocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="monocitos2" name="monocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="mono1_min">3</td>
            <td>a</td>
            <td id="mono1_max">6</td>
            <td></td>
            <td id="mono2_min">250</td>
            <td>a</td>
            <td id="mono2_max">500</td>
            </tr>

            <tr>
            <td>Eosinofilos:</td>
            <td><input id="eosinofilos1" name="eosinofilos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="eosinofilos2" name="eosinofilos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="eos1_min">1</td>
            <td>a</td>
            <td id="eos1_max">4</td>
            <td></td>
            <td id="eos2_min">150</td>
            <td>a</td>
            <td id="eos2_max">200</td>
            </tr>

            <tr>
            <td>Basofilos:</td>
            <td><input id="basofilos1" name="basofilos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="basofilos2" name="basofilos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="baso1_min">0</td>
            <td>a</td>
            <td id="baso1_max">1</td>
            <td></td>
            <td id="baso2_min">30</td>
            <td>a</td>
            <td id="baso2_max">60</td>
            </tr>

            <tr>
            <td>Neutrofilos:</td>
            <td><input id="neutrofilos1" name="neutrofilos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="neutrofilos2" name="neutrofilos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="neu1_min">55</td>
            <td>a</td>
            <td id="neu1_max">70</td>
            <td></td>
            <td id="neu2_min">3000</td>
            <td>a</td>
            <td id="neu2_max">4500</td>
            </tr>

            <tr>
            <td>  Segmentados:</td>
            <td><input id="segmentados1" name="segmentados1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="segmentados2" name="segmentados2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="seg1_min">45</td>
            <td>a</td>
            <td id="seg1_max">65</td>
            <td></td>
            <td id="seg2_min">2500</td>
            <td>a</td>
            <td id="seg2_max">4000</td>
            </tr>

            <tr>
            <td>  Bandas:</td>
            <td><input id="bandas1" name="bandas1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="bandas2" name="bandas2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="ban1_min">0</td>
            <td>a</td>
            <td id="ban1_max">3</td>
            <td></td>
            <td id="ban2_min">0</td>
            <td>a</td>
            <td id="ban2_max">180</td>
            </tr>

            <tr>
            <td>  Metamielocitos:</td>
            <td><input id="metamielocitos1" name="metamielocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="metamielocitos2" name="metamielocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="meta1_min">0</td>
            <td>a</td>
            <td id="meta1_max">0</td>
            <td></td>
            <td id="meta2_min">0</td>
            <td>a</td>
            <td id="meta2_max">0</td>
            </tr>

            <tr>
            <td>  Mielocitos:</td>
            <td><input id="mielocitos1" name="mielocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="mielocitos2" name="mielocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="mie1_min">0</td>
            <td>a</td>
            <td id="mie1_max">0</td>
            <td></td>
            <td id="mie2_min">0</td>
            <td>a</td>
            <td id="mie2_max">0</td>
            </tr>

            <tr>
            <td>  Promielocitos:</td>
            <td><input id="promielocitos1" name="promielocitos1" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td><input id="promielocitos2" name="promielocitos2" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td id="pro1_min">0</td>
            <td>a</td>
            <td id="pro1_max">0</td>
            <td></td>
            <td id="pro2_min">0</td>
            <td>a</td>
            <td id="pro2_max">0</td>
            </tr>

            <tr>
            <td>Plaquetas:</td>
            <td><input id="plaquetas" name="plaquetas" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>/µL</td>
            <td colspan="2" id="plaq_min">150000</td>
            <td>a</td>
            <td colspan="2" id="plaq_max">500000</td>
            <td colspan="2">/µL</td>
            </tr>

            <tr>
            <td>Reticulocitos:</td>
            <td><input id="reticulocitos" name="reticulocitos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>%</td>
            <td colspan="2" id="reti_min">1</td>
            <td>a</td>
            <td colspan="2" id="reti_max">2</td>
            <td colspan="2">%</td>
            </tr>

            <tr>
            <td>Eritroblastos:</td>
            <td><input id="eritroblastos" name="eritroblastos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>%</td>
            <td colspan="2" id="eri">0</td>
            <td>%</td>
            <td colspan="2"></td>
            <td colspan="2"></td>
            </tr>

            <thead>
            <tr>
            <th style="text-align:center" colspan="10">QUÍMICA SANGUÍNEA COMPLETA</th>
            </tr>
            </thead>

            <tr>
            <th> Parámetros </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th colspan="7" style="width:400px">Valores de referencia</th>
            </tr>

            <tr>
            <td>Glucosa:</td>
            <td><input id="glucosa" name="glucosa" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td colspan="2" id="gluc_min">70</td>
            <td>a</td>
            <td colspan="2" id="gluc_max">115</td>
            <td colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Urea:</td>
            <td><input id="urea" name="urea" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td colspan="2" id="urea_min">13</td>
            <td>a</td>
            <td colspan="2" id="urea_max">43</td>
            <td colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Creatinina:</td>
            <td><input id="creatinina" name="creatinina" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td colspan="2" id="crea_min">0.7</td>
            <td>a</td>
            <td colspan="2" id="crea_max">1.4</td>
            <td colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Acido Úrico:</td>
            <td><input id="acidoUrico" name="acidoUrico" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td colspan="2" id="acidoU_min">3.4</td>
            <td>a</td>
            <td colspan="2" id="acidoU_max">7.0</td>
            <td colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Colesterol:</td>
            <td><input id="colesterol" name="colesterol" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td colspan="2" id="col_min">101</td>
            <td>a</td>
            <td colspan="2" id="col_max">200</td>
            <td colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Triglicéridos:</td>
            <td><input id="trigliceridos" name="trigliceridos" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td colspan="2" id="trig_min">40</td>
            <td>a</td>
            <td colspan="2" id="trig_max">160</td>
            <td colspan="2">mg/dL</td>
            </tr>

            <thead>
            <tr>
            <th style="text-align:center" colspan="10">HEMOGLOBINA GLICOSILADA</th>
            </tr>
            </thead>

            <tr>
            <th> Parámetros </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th colspan="7" style="width:400px">Valores de referencia</th>
            </tr>

            <tr>
            <td rowspan="2">Hemoglobina Glicosilada:</td>
            <td><input id="hemoglobinaGlicosilada" name="hemoglobinaGlicosilada" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>%</td>
            <td colspan="2" id="hemoGli_min">4</td>
            <td>a</td>
            <td colspan="2" id="hemoGli_max">8</td>
            <td colspan="2">%</td>
            </tr>

            <tr>
            <td colspan="2">Estado del paciente:</td>
            <td colspan="7" id="r_hemoGli"></td>
            </tr>

            <thead>
            <tr>
            <th style="text-align:center" colspan="10">ELECTROLITOS SÉRICOS</th>
            </tr>
            </thead>

            <tr>
            <th> Parámetros </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th colspan="7" style="width:400px" id="valores_h">Valores de referencia</th>
            </tr>
            
            <tr>
            <td>Sodio (Na):</td>
            <td><input id="sodio" name="sodio" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>meq/L</td>
            <td colspan="2" id="na_min">135</td>
            <td>a</td>
            <td colspan="2" id="na_max">155</td>
            <td colspan="2">meq/L</td>
            </tr>

            <tr>
            <td>Potasio (K):</td>
            <td><input id="potasio" name="potasio" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>meq/L</td>
            <td colspan="2" id="k_min">3.6</td>
            <td>a</td>
            <td colspan="2" id="k_max">5.5</td>
            <td colspan="2">meq/L</td>
            </tr>

            <tr>
            <td>Cloruros (Cl):</td>
            <td><input id="cloruros" name="cloruros" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mmol/L</td>
            <td colspan="2" id="cl_min">94</td>
            <td>a</td>
            <td colspan="2" id="cl_max">111</td>
            <td colspan="2">mmol/L</td>
            </tr>

            <thead>
            <tr>
            <th style="text-align:center" colspan="10">BILIRRUBINAS Y TRANSAMINASAS</th>
            </tr>
            </thead>

            <tr>
            <th> Parámetros </th>
            <th style="text-align:center" colspan="2"> Resultados </th>
            <th colspan="7" style="width:400px">Valores de referencia</th>
            </tr>

            <tr>
            <td>Bilirrubina directa:</td>
            <td><input id="bilirrubinaD" name="bilirrubinaD" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td colspan="2" id="biliD_min">0</td>
            <td>a</td>
            <td colspan="2" id="biliD_max">0.25</td>
            <td colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Bilirrubina indirecta:</td>
            <td><input id="bilirrubinaI" name="bilirrubinaI" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td colspan="2" id="biliI_min">0</td>
            <td>a</td>
            <td colspan="2" id="biliI_max">0.75</td>
            <td colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Bilirrubina total:</td>
            <td><input id="bilirrubinaT" name="bilirrubinaT" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>mg/dL</td>
            <td colspan="2" id="biliT_min">0</td>
            <td>a</td>
            <td colspan="2" id="biliT_max">1.0</td>
            <td colspan="2">mg/dL</td>
            </tr>

            <tr>
            <td>Transaminasa piruvica:</td>
            <td><input id="transaminasaP" name="transaminasaP" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>U/L</td>
            <td colspan="2" id="transP_min">0</td>
            <td>a</td>
            <td colspan="2" id="transP_max">36</td>
            <td colspan="2">U/L</td>
            </tr>

            <tr>
            <td>Transaminasa oxalacética:</td>
            <td><input id="transaminasaO" name="transaminasaO" style="width:70px" placeholder="Valor" onkeyup="analisis()"></td>
            <td>U/L</td>
            <td colspan="2" id="transO_min">0</td>
            <td>a</td>
            <td colspan="2" id="transO_max">34</td>
            <td colspan="2">U/L</td>
            </tr>
        </tbody>
        </table>
        </div>
    </section>

        <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="../assets/js/analisisC.js"></script>
    </body>
</html>