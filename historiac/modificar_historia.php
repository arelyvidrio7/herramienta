<?php
session_start();

include 'datos_historia2.php';
$consulta = ConsultarNombre($_GET['id']);

function ConsultarNombre($id_user){
    $con = mysqli_connect("localhost", "root", "", "datos");

    $sent = "SELECT * FROM px_adulto WHERE id='".$id_user."' ";
    $resultado = mysqli_query($con, $sent) or die (mysqli_error());
    $filas=mysqli_fetch_assoc($resultado);
    return[
        $filas['id'],$filas['nombre_usuario'],$filas['fecha'],$filas['expediente'],$filas['nombre'],$filas['edad'],$filas['sexo'],
        $filas['fecha_nac'],$filas['estado_civil'],$filas['escolaridad'],$filas['direccion'],$filas['ocupacion'],$filas['telefono'],
        $filas['email'],$filas['motivo_consulta'],$filas['diagnostico'],$filas['enf1'], $filas['enf2'],$filas['enf3'],$filas['enf4'],
        $filas['enf5'],$filas['enf6'],$filas['enf7'],$filas['enf8'],$filas['enf9'],$filas['otro_problema'],$filas['padece_enf'],
        $filas['toma_med'],$filas['medicamento'],$filas['dosis_med'],$filas['desde_cuando'],$filas['toma1'],$filas['toma2'],
        $filas['toma3'],$filas['toma4'],$filas['cirugia'],$filas['ant1'],$filas['ant2'],$filas['ant3'],$filas['ant4'],$filas['ant5'],
        $filas['ant6'],$filas['actividad'],$filas['tipo_ej'],$filas['frecuencia_ej'],$filas['duracion_ej'],$filas['cuando_inicio'],
        $filas['alcohol'],$filas['tabaco'],$filas['cafe'],$filas['comidasxdia'],$filas['entre_comidas'],$filas['entresemana1'],
        $filas['entresemana2'],$filas['entresemana3'],$filas['finsemana1'],$filas['finsemana2'],$filas['finsemana3'],$filas['quien_prepara'],
        $filas['apetito'],$filas['mas_hambre'],$filas['al_preferidos'],$filas['al_nogustan'],$filas['al_malestar'],$filas['alergia'],
        $filas['al_alergia'],$filas['sup_com'],$filas['suplemento'],$filas['dosis_sup'],$filas['porq_sup'],$filas['cambio_com'],
        $filas['consumo_varia'],$filas['agrega'],$filas['grasa1'],$filas['grasa2'],$filas['grasa3'],$filas['grasa4'],$filas['otra_grasa'],
        $filas['dieta_esp'],$filas['cuantas_dietas'],$filas['tipo_dieta'],$filas['hace_cuanto'],$filas['cuanto_tiempo'],$filas['razon'],
        $filas['apego'],$filas['obt_resultados'],$filas['med_bajar'],$filas['medic_bajar'],$filas['alimento1'],$filas['frecuencia1'],
        $filas['alimento2'],$filas['frecuencia2'],$filas['alimento3'],$filas['frecuencia3'],$filas['alimento4'],$filas['frecuencia4'],
        $filas['alimento5'],$filas['frecuencia5'],$filas['alimento6'],$filas['frecuencia6'],$filas['alimento7'],$filas['frecuencia7'],
        $filas['alimento8'],$filas['frecuencia8'],$filas['alimento9'],$filas['frecuencia9'],$filas['vasos_agua'],$filas['vasos_bebidas'],
        $filas['dato1'],$filas['dato2'],$filas['dato3'],$filas['dato4'],$filas['dato5'],$filas['dato6'],$filas['dato7'],$filas['dato8'],
        $filas['dato9'],$filas['dato10'],$filas['dato11'],$filas['dato12'],$filas['dato13'],$filas['dato14'],$filas['dato15'],$filas['dato16'],
        $filas['dato17'],$filas['dato18'],$filas['dato19'],$filas['dato20'],$filas['dato21'],$filas['dato22'],$filas['dato23'],
        $filas['dato24'],$filas['dato25'],$filas['dato26'],$filas['dato27'],$filas['dato28'],$filas['tmr'],$filas['eta'],$filas['af'],
        $filas['total'],$filas['hc1'],$filas['hc2'],$filas['hc3'],$filas['prot1'],$filas['prot2'],$filas['prot3'],$filas['lip1'],$filas['lip2'],
        $filas['lip3'],$filas['medicion1'],$filas['fecha1'],$filas['valor1'],$filas['medicion2'],$filas['fecha2'],$filas['valor2'],
        $filas['medicion3'],$filas['fecha3'],$filas['valor3'],$filas['medicion4'],$filas['fecha4'],$filas['valor4'],$filas['medicion5'],
        $filas['fecha5'],$filas['valor5'],$filas['medicion6'],$filas['fecha6'],$filas['valor6'],$filas['medicion7'],$filas['fecha7'],
        $filas['valor7'],$filas['medicion8'],$filas['fecha8'],$filas['valor8'],$filas['medicion9'],$filas['fecha9'],$filas['valor9']
    ];
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="../assets/historiaC/clinic_h.css">
        <title>NutriPAES - Adulto (Editar Historia Clínica)</title>
        
        <script src="https://kit.fontawesome.com/336ceace9e.js" crossorigin="anonymous"></script>
    </head>
    <body> 
        <h1 style="text-align:center">Historia Clínica</h1>
        <form action="modificar_historia2.php" method="POST">
        <!-- Input invisible -->
        <input type="hidden" id="id" name="id" value="<?php echo $consulta[0]?>">
        <!-- Input invisible -->
        <input type="hidden" id="user" name="user" value="<?php echo $consulta[1]?>">
        <div id="body1">
            <div id="datos_px">
                <input id="expediente" name="expediente" placeholder="Expediente" style="width:150px" value="<?php echo $consulta[3]?>">
                <input type="date" id="fecha" name="fecha" required value="<?php echo $consulta[2]?>">
                <br>
                <br>
                <label class="titulo">Datos personales</label>
                <br>
                <input id="nombre" name="nombre" placeholder="Nombre del paciente" style="width:380px" required value="<?php echo $consulta[4]?>">
                <br>
                <input type="number" id="edad" name="edad" placeholder="Edad" style="width:100px" value="<?php echo $consulta[5]?>">
                <input type="hidden" id="resultado_sexo" name="resultado_sexo" value="<?php echo $consulta[6]?>">
                <?php 
                if(isset($consulta[6])){
                    $consulta6 = $consulta[6];
                }
                ?>
                <select id="sexo" name="sexo" onchange="colocar_valor()">
                    <option value="ninguno" <?php if ($consulta6 === "ninguno"){echo 'selected';}; ?>>Sexo...</option>
                    <option value="hombre" <?php if ($consulta6 === "hombre"){echo 'selected';}; ?>>Hombre</option>
                    <option value="mujer" <?php if ($consulta6 === "mujer"){echo 'selected';}; ?>>Mujer</option>
                </select>
                <input id="fecha_nac" name="fecha_nac" placeholder="Fecha nacimiento" value="<?php echo $consulta[7]?>">
                <input type="hidden" id="resultado_civil" name="resultado_civil" value="<?php echo $consulta[8]?>">
                <?php 
                if(isset($consulta[8])){
                    $consulta8 = $consulta[8];
                }
                ?>
                <select id="estado_civil" name="estado_civil" onchange="colocar_valor2()">
                    <option value="ninguno" <?php if ($consulta8 === "ninguno"){echo 'selected';}; ?>>Estado civil...</option>
                    <option value="casado" <?php if ($consulta8 === "casado"){echo 'selected';}; ?>>Casado/a</option>
                    <option value="comprometido" <?php if ($consulta8 === "comprometido"){echo 'selected';}; ?>>Comprometido/a</option>
                    <option value="divorciado" <?php if ($consulta8 === "divorciado"){echo 'selected';}; ?>>Divorciado/a</option>
                    <option value="soltero" <?php if ($consulta8 === "soltero"){echo 'selected';}; ?>>Soltero/a</option>
                    <option value="union libre" <?php if ($consulta8 === "union libre"){echo 'selected';}; ?>>Unión libre</option>
                    <option value="viudo" <?php if ($consulta8 === "viudo"){echo 'selected';}; ?>>Viudo/a</option>
                </select>

                <input type="hidden" id="resultado_escolaridad" name="resultado_escolaridad" value="<?php echo $consulta[9]?>">
                <?php 
                if(isset($consulta[9])){
                    $consulta9 = $consulta[9];
                }
                ?>
                <select id="escolaridad" name="escolaridad" onchange="colocar_valor3()">
                    <option value="ninguna" <?php if ($consulta9 === "ninguna"){echo 'selected';}; ?>>Escolaridad...</option>
                    <option value="preescolar" <?php if ($consulta9 === "preescolar"){echo 'selected';}; ?>>Preescolar</option>
                    <option value="escolar" <?php if ($consulta9 === "escolar"){echo 'selected';}; ?>>Escolar</option>
                    <option value="secundaria" <?php if ($consulta9 === "secundaria"){echo 'selected';}; ?>>Secundaria</option>
                    <option value="preparatoria" <?php if ($consulta9 === "preparatoria"){echo 'selected';}; ?>>Preparatoria</option>
                    <option value="universidad" <?php if ($consulta9 === "universidad"){echo 'selected';}; ?>>Universidad</option>
                    <option value="maestria" <?php if ($consulta9 === "maestria"){echo 'selected';}; ?>>Maestría</option>
                    <option value="doctorado" <?php if ($consulta9 === "doctorado"){echo 'selected';}; ?>>Doctorado</option>
                </select>
                <br>
                <input id="direccion" name="direccion" placeholder="Dirección" style="width:380px" value="<?php echo $consulta[10]?>">
                <input id="ocupacion" name="ocupacion" placeholder="Ocupación" value="<?php echo $consulta[11]?>">
                <input id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo $consulta[12]?>">
                <input id="email" name="email" placeholder="Email" style="width:380px" value="<?php echo $consulta[13]?>">

            </div>

            <div id="notas">
                <br><br><br><br>
                <label style="font-weight:bold; font-size:18px;">Motivo de la consulta:</label>
                <textarea id="motivo_consulta" name="motivo_consulta" placeholder="Coloca aquí el motivo de la consulta..." rows="2" cols="38"><?php echo $consulta[14]?></textarea>
                <br><br>
                <label style="font-weight:bold; font-size:18px;">Diagnóstico y Observaciones:</label>
                <textarea id="diagnostico" name="diagnostico" placeholder="Coloca aquí tu diagnóstico y observaciones..." rows="4" cols="38"><?php echo $consulta[15]?></textarea>
            </div>

            <div id="anteced">
                <label class="titulo" style="font-size:24px">Antecedentes salud / enfermedad</label>
                <br>
                <label style="font-weight:bold; font-size:18px;">Problemas actuales.-</label>

                <div id="enfermedades" class="divs">
                <?php 
                if(isset($consulta[16])){
                    $consulta16 = $consulta[16];
                }
                if(isset($consulta[17])){
                    $consulta17 = $consulta[17];
                }
                if(isset($consulta[18])){
                    $consulta18 = $consulta[18];
                }
                if(isset($consulta[19])){
                    $consulta19 = $consulta[19];
                }
                if(isset($consulta[20])){
                    $consulta20 = $consulta[20];
                }
                if(isset($consulta[21])){
                    $consulta21 = $consulta[21];
                }
                if(isset($consulta[22])){
                    $consulta22 = $consulta[22];
                }
                if(isset($consulta[23])){
                    $consulta23 = $consulta[23];
                }
                if(isset($consulta[24])){
                    $consulta24 = $consulta[24];
                }
                ?>
                <label for="enf1"><input name="enf1" id="enf1" type="checkbox" value="Si" <?php if ($consulta16 === "Si"){echo 'checked';}; ?>/>Colitis</label>

                <label for="enf2"><input name="enf2" id="enf2" type="checkbox" value="Si" <?php if ($consulta17 === "Si"){echo 'checked';}; ?>/>Dentadura</label>

                <label for="enf3"><input name="enf3" id="enf3" type="checkbox" value="Si" <?php if ($consulta18 === "Si"){echo 'checked';}; ?>/>Diarrea</label>

                <label for="enf4"><input name="enf4" id="enf4" type="checkbox" value="Si" <?php if ($consulta19 === "Si"){echo 'checked';}; ?>/>Estreñimiento</label>

                <label for="enf5"><input name="enf5" id="enf5" type="checkbox" value="Si" <?php if ($consulta20 === "Si"){echo 'checked';}; ?>/>Gastritis</label>

                <label for="enf6"><input name="enf6" id="enf6" type="checkbox" value="Si" <?php if ($consulta21 === "Si"){echo 'checked';}; ?>/>Náuseas</label>

                <label for="enf7"><input name="enf7" id="enf7" type="checkbox" value="Si" <?php if ($consulta22 === "Si"){echo 'checked';}; ?>/>Pirosis</label>

                <label for="enf8"><input name="enf8" id="enf8" type="checkbox" value="Si" <?php if ($consulta23 === "Si"){echo 'checked';}; ?>/>Úlcera</label>

                <label for="enf9"><input name="enf9" id="enf9" type="checkbox" value="Si" <?php if ($consulta24 === "Si"){echo 'checked';}; ?>/>Vómito</label>

                <label>Otro:<label>
                <input id="otro_problema" name="otro_problema" Placeholder="Otro problema" style="width:350px" value="<?php echo $consulta[25]?>">
                </div>

                <label>Padece de alguna enfermedad diagnosticada: </label>
                <input id="padece_enf" name="padece_enf" placeholder="Padece alguna enfermedad" style="width:350px" value="<?php echo $consulta[26]?>">
                <br>
                <?php 
                if(isset($consulta[27])){
                    $consulta27 = $consulta[27];
                }
                ?>
                <label>Toma algún medicamento: </label>
                <input type="radio" name="toma_med" id="sitomo" value="Si" <?php if ($consulta27 === "Si"){echo 'checked';}; ?>>
                <label for="sitomo">Si</label>
                <input type="radio" name="toma_med" id="notomo" value="No" <?php if ($consulta27 === "No"){echo 'checked';}; ?>>
                <label for="notomo">No</label>

                <label>Cuál:</label>
                <input id="medicamento" name="medicamento" placeholder="Nombre del medicamento" value="<?php echo $consulta[28]?>">
                <input id="dosis_med" name="dosis_med" placeholder="Dosis del medicamento" value="<?php echo $consulta[29]?>">
                <input id="desde_cuando" name="desde_cuando" placeholder="Desde cuando lo consume" style="width:300px" value="<?php echo $consulta[30]?>">
                <div id="tomas" class="divs">
                <label>Toma:</label>
                <?php 
                if(isset($consulta[31])){
                    $consulta31 = $consulta[31];
                }
                if(isset($consulta[32])){
                    $consulta32 = $consulta[32];
                }
                if(isset($consulta[33])){
                    $consulta33 = $consulta[33];
                }
                if(isset($consulta[34])){
                    $consulta34 = $consulta[34];
                }
                ?>
                <label for="toma1"><input name="toma1" id="toma1" type="checkbox" value="Si" <?php if ($consulta31 === "Si"){echo 'checked';}; ?>/>Laxantes</label>
                <label for="toma2"><input name="toma2" id="toma2" type="checkbox" value="Si" <?php if ($consulta32 === "Si"){echo 'checked';}; ?>/>Diuréticos</label>
                <label for="toma3"><input name="toma3" id="toma3" type="checkbox" value="Si" <?php if ($consulta33 === "Si"){echo 'checked';}; ?>/>Antiácidos</label>
                <label for="toma4"><input name="toma4" id="toma4" type="checkbox" value="Si" <?php if ($consulta34 === "Si"){echo 'checked';}; ?>/>Analgésicos</label>
                </div>
                <br>
                <label>Le han practidado alguna cirugía:</label>
                <input id="cirugia" name="cirugia" placeholder="Cirugía" style="width:350px" value="<?php echo $consulta[35]?>">
                <br>
                <label style="font-weight:bold; font-size:18px;">Antecedentes familiares.-</label>
                <br>
                <div id="ant_familiar" class="divs">
                <?php 
                if(isset($consulta[36])){
                    $consulta36 = $consulta[36];
                }
                if(isset($consulta[37])){
                    $consulta37 = $consulta[37];
                }
                if(isset($consulta[38])){
                    $consulta38 = $consulta[38];
                }
                if(isset($consulta[39])){
                    $consulta39 = $consulta[39];
                }
                if(isset($consulta[40])){
                    $consulta40 = $consulta[40];
                }
                if(isset($consulta[41])){
                    $consulta41 = $consulta[41];
                }

                ?>
                <label for="ant1"><input name="ant1" id="ant1" type="checkbox" value="Si" <?php if ($consulta36 === "Si"){echo 'checked';}; ?>/>Obesidad</label>
                <label for="ant2"><input name="ant2" id="ant2" type="checkbox" value="Si" <?php if ($consulta37 === "Si"){echo 'checked';}; ?>/>Diabetes</label>
                <label for="ant3"><input name="ant3" id="ant3" type="checkbox" value="Si" <?php if ($consulta38 === "Si"){echo 'checked';}; ?>/>HTA</label>
                <label for="ant4"><input name="ant4" id="ant4" type="checkbox" value="Si" <?php if ($consulta39 === "Si"){echo 'checked';}; ?>/>Cáncer</label>
                <label for="ant5"><input name="ant5" id="ant5" type="checkbox" value="Si" <?php if ($consulta40 === "Si"){echo 'checked';}; ?>/>Hipercolesterolemia</label>
                <label for="ant6"><input name="ant6" id="ant6" type="checkbox" value="Si" <?php if ($consulta41 === "Si"){echo 'checked';}; ?>/>Hipertrigliceridemia</label>
                </div>
                <br>
            </div> 

            <div id="estilo_vida">
                <label class="titulo" style="font-size:24px">Estilo de vida</label>
                <br>
                <label style="font-weight:bold; font-size:16px;">Actividad:</label>
                <input type="hidden" id="resultado_actividad" name="resultado_actividad" value="<?php echo $consulta[42]?>">
                <?php 
                if(isset($consulta[42])){
                    $consulta42 = $consulta[42];
                }
                ?>
                <select id="actividad" name="actividad" onchange="colocar_valor4()">
                    <option value="ninguna" <?php if ($consulta42 === "ninguna"){echo 'selected';}; ?>>Actividad...</option>
                    <option value="muy ligera" <?php if ($consulta42 === "muy ligera"){echo 'selected';}; ?>>Muy ligera</option>
                    <option value="ligera" <?php if ($consulta42 === "ligera"){echo 'selected';}; ?>>Ligera</option>
                    <option value="moderada" <?php if ($consulta42 === "moderada"){echo 'selected';}; ?>>Moderada</option>
                    <option value="pesada" <?php if ($consulta42 === "pesada"){echo 'selected';}; ?>>Pesada</option>
                    <option value="excepcional" <?php if ($consulta42 === "excepcional"){echo 'selected';}; ?>>Excepcional</option>
                </select>
                <label>Tipo</label>
                <input id="tipo_ej" name="tipo_ej" placeholder="Tipo de ejercicio" value="<?php echo $consulta[43]?>">
                <label>Frecuencia</label>
                <input id="frecuencia_ej" name="frecuencia_ej" placeholder="Frecuencia" style="width:300px" value="<?php echo $consulta[44]?>">
                <label>Duración</label>
                <input id="duracion_ej" name="duracion_ej" placeholder="Duración" value="<?php echo $consulta[45]?>">
                <label>¿Cuando inició?</label>
                <input id="cuando_inicio" name="cuando_inicio" placeholder="¿Cuando inició?" value="<?php echo $consulta[46]?>">
                <br>
                <br>
                <label style="font-weight:bold; font-size:16px;">Consumo de (frecuencia y cantidad):</label>
                <br>
                <label>Alcohol</label>
                <input id="alcohol" name="alcohol" placeholder="Alcohol" value="<?php echo $consulta[47]?>">
                <label>Tabaco</label>
                <input id="tabaco" name="tabaco" placeholder="Tabaco" value="<?php echo $consulta[48]?>">
                <label>Café</label>
                <input id="cafe" name="cafe" placeholder="Café" value="<?php echo $consulta[49]?>">
            </div>

            <div id="indicadores_d">
                <label class="titulo" style="font-size:24px">Indicadores dietéticos</label>
                <br>
                <label>Cuántas comidas hace al día:</label>
                <input id="comidasxdia" name="comidasxdia" placeholder="Comidas por día" value="<?php echo $consulta[50]?>">
                <label>Come entre comidas:</label>
                <input id="entre_comidas" name="entre_comidas" placeholder="Come entre comidas" value="<?php echo $consulta[51]?>">

                <table id="comidas" class="tablas" border="1">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Comidas en casa</th>
                            <th>Comidas fuera</th>
                            <th>Horario de comidas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-weight:bold; font-size:16px;">Entre semana</td>
                            <td><input type="text" id="entresemana1" name="entresemana1" placeholder="Cuántas" class="input_enc" value="<?php echo $consulta[52]?>"></td>
                            <td><input type="text" id="entresemana2" name="entresemana2" placeholder="Cuántas" class="input_enc" value="<?php echo $consulta[53]?>"></td>
                            <td><input type="text" id="entresemana3" name="entresemana3" placeholder="Horario" class="input_enc" value="<?php echo $consulta[54]?>"></td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold; font-size:16px;">Fin de semana</td>
                            <td><input type="text" id="finsemana1" name="finsemana1" placeholder="Cuántas" class="input_enc" value="<?php echo $consulta[55]?>"></td>
                            <td><input type="text" id="finsemana2" name="finsemana2" placeholder="Cuántas" class="input_enc" value="<?php echo $consulta[56]?>"></td>
                            <td><input type="text" id="finsemana3" name="finsemana3" placeholder="Horario" class="input_enc" value="<?php echo $consulta[57]?>"></td>
                        </tr>

                    </tbody>
                </table>

                <label>Quién prepara sus alimentos:</label>
                <input id="quien_prepara" name="quien_prepara" placeholder="Quien prepara sus comidas" value="<?php echo $consulta[58]?>">
                <label>Apetito:</label>
                <input type="hidden" id="resultado_apetito" name="resultado_apetito" value="<?php echo $consulta[59]?>">
                <?php 
                if(isset($consulta[59])){
                    $consulta59 = $consulta[59];
                }
                ?>
                <select id="apetito" name="apetito" onchange="colocar_valor5()">
                    <option value="ninguno" <?php if ($consulta59 === "ninguno"){echo 'selected';}; ?>>Apetito...</option>
                    <option value="bueno" <?php if ($consulta59 === "bueno"){echo 'selected';}; ?>>Bueno</option>
                    <option value="malo" <?php if ($consulta59 === "malo"){echo 'selected';}; ?>>Malo</option>
                    <option value="regular" <?php if ($consulta59 === "regular"){echo 'selected';}; ?>>Regular</option>
                </select>
                <br>
                <label>A qué hora tiene más hambre:</label>
                <input id="mas_hambre" name="mas_hambre" placeholder="Hora" style="width:100px" value="<?php echo $consulta[60]?>">
                <label>Alimentos preferidos:</label>
                <input id="al_preferidos" name="al_preferidos" placeholder="Alimentos preferidos" style="width:350px" value="<?php echo $consulta[61]?>">
                <br>
                <label>Alimentos que no le agradan / no acostumbra:</label>
                <input id="al_nogustan" name="al_nogustan" placeholder="Alimentos que no le agradan" style="width:350px" value="<?php echo $consulta[62]?>">
                <br>
                <label>Alimentos que le causan malestar (especificar):</label>
                <input id="al_malestar" name="al_malestar" placeholder="Alimentos que le causan malestar" style="width:350px" value="<?php echo $consulta[63]?>">
                <br>
                <?php 
                if(isset($consulta[64])){
                    $consulta64 = $consulta[64];
                }
                ?>
                <label>Es alérgico o intolerante a algún alimento (especificar):</label>
                <input type="radio" name="alergia" id="sialergia" value="Si" <?php if ($consulta64 === "Si"){echo 'checked';}; ?>>
                <label for="sialergia">Si</label>
                <input type="radio" name="alergia" id="noalergia" value="No" <?php if ($consulta64 === "No"){echo 'checked';}; ?>>
                <label for="noalergia">No</label>
                <input id="al_alergia" name="al_alergia" placeholder="Alimento que le causa alergia o intolerancia" style="width:350px" value="<?php echo $consulta[65]?>">
                <br>
                <?php 
                if(isset($consulta[66])){
                    $consulta66 = $consulta[66];
                }
                ?>
                <label>Toma algún suplemento / complemento:</label>
                <input type="radio" name="sup_com" id="sisup_com" value="Si" <?php if ($consulta66 === "Si"){echo 'checked';}; ?>>
                <label for="sisup_com">Si</label>
                <input type="radio" name="sup_com" id="nosup_com" value="No" <?php if ($consulta66 === "No"){echo 'checked';}; ?>>
                <label for="nosup_com">No</label>
                <input id="suplemento" name="suplemento" placeholder="Cuál" style="width:200px" value="<?php echo $consulta[67]?>">
                <label>Dosis:</label>
                <input id="dosis_sup" name="dosis_sup" placeholder="Dosis" value="<?php echo $consulta[68]?>">
                <label>¿Por qué?</label>
                <input id="porq_sup" name="porq_sup" placeholder="¿Por qué lo consume?" style="width:300px" value="<?php echo $consulta[69]?>">
                <br>
                <?php 
                if(isset($consulta[70])){
                    $consulta70 = $consulta[70];
                }
                ?>
                <label>Su consumo varía cuando está triste, nervioso o ansioso:</label>
                <input type="radio" name="cambio_com" id="sicambio_com" value="Si" <?php if ($consulta70 === "Si"){echo 'checked';}; ?>>
                <label for="sicambio_com">Si</label>
                <input type="radio" name="cambio_com" id="nocambio_com" value="No" <?php if ($consulta70 === "No"){echo 'checked';}; ?>>
                <label for="nocambio_com">No</label>
                <input id="consumo_varia" name="consumo_varia" placeholder="De qué manera varía su consumo" style="width:300px" value="<?php echo $consulta[71]?>">
                <br>
                <?php 
                if(isset($consulta[72])){
                    $consulta72 = $consulta[72];
                }
                ?>
                <label>Agrega sal a la comida ya preparada:</label>
                <input type="radio" name="agrega" id="siagrega" value="Si" <?php if ($consulta72 === "Si"){echo 'checked';}; ?>>
                <label for="siagrega">Si</label>
                <input type="radio" name="agrega" id="noagrega" value="No" <?php if ($consulta72 === "No"){echo 'checked';}; ?>>
                <label for="noagrega">No</label>
                <br>
                <br>
                <label>Qué grasa utilizan en casa para preparar su comida:</label>
                <div id="grasa" class="divs">
                <?php 
                if(isset($consulta[73])){
                    $consulta73 = $consulta[73];
                }
                if(isset($consulta[74])){
                    $consulta74 = $consulta[74];
                }
                if(isset($consulta[75])){
                    $consulta75 = $consulta[75];
                }
                if(isset($consulta[76])){
                    $consulta76 = $consulta[76];
                }
                ?>
                <label for="grasa1"><input name="grasa1" id="grasa1" type="checkbox" value="Si" <?php if ($consulta73 === "Si"){echo 'checked';}; ?>/>Margarina</label>
                <label for="grasa2"><input name="grasa2" id="grasa2" type="checkbox" value="Si" <?php if ($consulta74 === "Si"){echo 'checked';}; ?>/>Aceite vegetal</label>
                <label for="grasa3"><input name="grasa3" id="grasa3" type="checkbox" value="Si" <?php if ($consulta75 === "Si"){echo 'checked';}; ?>/>Manteca</label>
                <label for="grasa4"><input name="grasa4" id="grasa4" type="checkbox" value="Si" <?php if ($consulta76 === "Si"){echo 'checked';}; ?>/>Mantequilla</label>
                <label>Otro:</label>
                <input id="otra_grasa" name="otra_grasa" placeholder="Otro tipo de grasa" value="<?php echo $consulta[77]?>">
                </div>
                <label>Ha llevado alguna dieta especial:</label>
                <input id="dieta_esp" name="dieta_esp" placeholder="Ha llevado alguna dieta especial" style="width:300px" value="<?php echo $consulta[78]?>">
                <label>Cuántas:</label>
                <input id="cuantas_dietas" name="cuantas_dietas" placeholder="Cuantas" style="width:250px" value="<?php echo $consulta[79]?>">
                <label>Qué tipo de dieta:</label>
                <input id="tipo_dieta" name="tipo_dieta" placeholder="Qué tipo de dieta" value="<?php echo $consulta[80]?>">
                <label>Hace cuánto:</label>
                <input id="hace_cuanto" name="hace_cuanto" placeholder="Hace cuánto" value="<?php echo $consulta[81]?>">
                <label>Por cuánto tiempo:</label>
                <input id="cuanto_tiempo" name="cuanto_tiempo" placeholder="Por cuánto tiempo" style="width:170px" value="<?php echo $consulta[82]?>">
                <label>Por qué razón:</label>
                <input id="razon" name="razon" placeholder="Por qué razón" value="<?php echo $consulta[83]?>">
                <label>Qué tanto se apegó a ella:</label>
                <input id="apego" name="apego" placeholder="Qué tanto se apegó" style="width:170px" value="<?php echo $consulta[84]?>">
                <br>
                <label>Obtuvo los resultados esperados:</label>
                <input id="obt_resultados" name="obt_resultados" placeholder="Obtuvo resultados" value="<?php echo $consulta[85]?>">
                <br>
                <?php
                if(isset($consulta[86])){
                    $consulta86 = $consulta[86];
                }
                ?>
                <label>Ha utilizado medicamentos para bajar de peso:</label>
                <input type="radio" name="med_bajar" id="simed_bajar" value="Si" <?php if ($consulta86 === "Si"){echo 'checked';}; ?>>
                <label for="simed_bajar">Si</label>
                <input type="radio" name="med_bajar" id="nomed_bajar" value="No" <?php if ($consulta86 === "No"){echo 'checked';}; ?>>
                <label for="nomed_bajar">No</label>
                <input id="medic_bajar" name="medic_bajar" placeholder="Cuáles"  style="width:300px" value="<?php echo $consulta[87]?>">
            </div>

            <div id="frecconsumo_al">
                <label class="titulo" style="font-size:24px">Frecuencia de consumo de alimentos</label>
                <br>
                <label style="font-weight:bold; font-size:16px;">Lista rápida de alimentos y bebidas</label>
                <br>
                <table id="alimentos_frecuentes" class="tablas" border="1">
                    <tbody>
                        <tr>
                            <td><input type="text" id="alimento1" name="alimento1" placeholder="Escribe un alimento o bebida" class="alimento" value="<?php echo $consulta[88]?>"></td>
                            <td><input type="text" id="frecuencia1" name="frecuencia1" placeholder="Frecuencia de consumo" class="frecuencia" value="<?php echo $consulta[89]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento2" name="alimento2" placeholder="Escribe un alimento o bebida" class="alimento" value="<?php echo $consulta[90]?>"></td>
                            <td><input type="text" id="frecuencia2" name="frecuencia2" placeholder="Frecuencia de consumo" class="frecuencia" value="<?php echo $consulta[91]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento3" name="alimento3" placeholder="Escribe un alimento o bebida" class="alimento" value="<?php echo $consulta[92]?>"></td>
                            <td><input type="text" id="frecuencia3" name="frecuencia3" placeholder="Frecuencia de consumo" class="frecuencia" value="<?php echo $consulta[93]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento4" name="alimento4" placeholder="Escribe un alimento o bebida" class="alimento" value="<?php echo $consulta[94]?>"></td>
                            <td><input type="text" id="frecuencia4" name="frecuencia4" placeholder="Frecuencia de consumo" class="frecuencia" value="<?php echo $consulta[95]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento5" name="alimento5" placeholder="Escribe un alimento o bebida" class="alimento" value="<?php echo $consulta[96]?>"></td>
                            <td><input type="text" id="frecuencia5" name="frecuencia5" placeholder="Frecuencia de consumo" class="frecuencia" value="<?php echo $consulta[97]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento6" name="alimento6" placeholder="Escribe un alimento o bebida" class="alimento" value="<?php echo $consulta[98]?>"></td>
                            <td><input type="text" id="frecuencia6" name="frecuencia6" placeholder="Frecuencia de consumo" class="frecuencia" value="<?php echo $consulta[99]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento7" name="alimento7" placeholder="Escribe un alimento o bebida" class="alimento" value="<?php echo $consulta[100]?>"></td>
                            <td><input type="text" id="frecuencia7" name="frecuencia7" placeholder="Frecuencia de consumo" class="frecuencia" value="<?php echo $consulta[101]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento8" name="alimento8" placeholder="Escribe un alimento o bebida" class="alimento" value="<?php echo $consulta[102]?>"></td>
                            <td><input type="text" id="frecuencia8" name="frecuencia8" placeholder="Frecuencia de consumo" class="frecuencia" value="<?php echo $consulta[103]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento9" name="alimento9" placeholder="Escribe un alimento o bebida" class="alimento" value="<?php echo $consulta[104]?>"></td>
                            <td><input type="text" id="frecuencia9" name="frecuencia9" placeholder="Frecuencia de consumo" class="frecuencia" value="<?php echo $consulta[105]?>"></td>
                        </tr>

                    </tbody>
                </table>
                <br>
                <label>Vasos de agua natural al día:</label>
                <input id="vasos_agua" name="vasos_agua" placeholder="Vasos de agua" style="width:150px" value="<?php echo $consulta[106]?>">
                <label>Vasos de bebidas al día (leche, jugo, café):</label>
                <input id="vasos_bebidas" name="vasos_bebidas" placeholder="Vasos de bebidas" style="width:150px" value="<?php echo $consulta[107]?>">
            </div>

            <div id="indicadores">
                <label class="titulo" style="font-size:24px">Indicadores antropométricos</label>
                <br>
                <table id="antropometria" class="tablas" border="1">
                    <thead>
                        <tr>
                            <th>MEDICIÓN (Unidad)</th>
                            <th>DATO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Peso actual (kg)</td>
                            <td><input type="text" id="dato1" name="dato1" placeholder="--" class="datos" value="<?php echo $consulta[108]?>"></td>
                        </tr>

                        <tr>
                            <td>Peso habitual (kg)</td>
                            <td><input type="text" id="dato2" name="dato2" placeholder="--" class="datos" value="<?php echo $consulta[109]?>"></td>
                        </tr>

                        <tr>
                            <td>Estatura (m)</td>
                            <td><input type="text" id="dato3" name="dato3" placeholder="--" class="datos" value="<?php echo $consulta[110]?>"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo tricipital (mm)</td>
                            <td><input type="text" id="dato4" name="dato4" placeholder="--" class="datos" value="<?php echo $consulta[111]?>"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo bicipital (mm)</td>
                            <td><input type="text" id="dato5" name="dato5" placeholder="--" class="datos" value="<?php echo $consulta[112]?>"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo subescapular (mm)</td>
                            <td><input type="text" id="dato6" name="dato6" placeholder="--" class="datos" value="<?php echo $consulta[113]?>"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo suprailíaco (mm)</td>
                            <td><input type="text" id="dato7" name="dato7" placeholder="--" class="datos" value="<?php echo $consulta[114]?>"></td>
                        </tr>

                        <tr>
                            <td>Circunferencia de brazo (cm)</td>
                            <td><input type="text" id="dato8" name="dato8" placeholder="--" class="datos" value="<?php echo $consulta[115]?>"></td>
                        </tr>

                        <tr>
                            <td>Circunferencia de cintura (cm)</td>
                            <td><input type="text" id="dato9" name="dato9" placeholder="--" class="datos" value="<?php echo $consulta[116]?>"></td>
                        </tr>

                        <tr>
                            <td>Circunferencia de cadera (cm)</td>
                            <td><input type="text" id="dato10" name="dato10" placeholder="--" class="datos" value="<?php echo $consulta[117]?>"></td>
                        </tr>

                        <tr>
                            <td>Circunferencia abdominal (cm)</td>
                            <td><input type="text" id="dato11" name="dato11" placeholder="--" class="datos" value="<?php echo $consulta[118]?>"></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>EVALUACIÓN (Unidad)</th>
                            <th>DATO E INTERPRETACIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Complexión</td>
                            <td><input type="text" id="dato12" name="dato12" placeholder="--" class="datos" value="<?php echo $consulta[119]?>"></td>
                        </tr>

                        <tr>
                            <td>Peso teórico (kg)</td>
                            <td><input type="text" id="dato13" name="dato13" placeholder="--" class="datos" value="<?php echo $consulta[120]?>"></td>
                        </tr>

                        <tr>
                            <td>% Peso teórico</td>
                            <td><input type="text" id="dato14" name="dato14" placeholder="--" class="datos" value="<?php echo $consulta[121]?>"></td>
                        </tr>

                        <tr>
                            <td>% Peso habitual</td>
                            <td><input type="text" id="dato15" name="dato15" placeholder="--" class="datos" value="<?php echo $consulta[122]?>"></td>
                        </tr>

                        <tr>
                            <td>Índice de masa corporal (kg/m²)</td>
                            <td><input type="text" id="dato16" name="dato16" placeholder="--" class="datos" value="<?php echo $consulta[123]?>"></td>
                        </tr>

                        <tr>
                            <td>Peso mínimo y máximo recomendado por IMC (kg)</td>
                            <td><input type="text" id="dato17" name="dato17" placeholder="--" class="datos" value="<?php echo $consulta[124]?>"></td>
                        </tr>

                        <tr>
                            <td>% Grasa corporal</td>
                            <td><input type="text" id="dato18" name="dato18" placeholder="--" class="datos" value="<?php echo $consulta[125]?>"></td>
                        </tr>

                        <tr>
                            <td>Grasa corporal total (kg)</td>
                            <td><input type="text" id="dato19" name="dato19" placeholder="--" class="datos" value="<?php echo $consulta[126]?>"></td>
                        </tr>

                        <tr>
                            <td>Masa libre de grasa (kg)</td>
                            <td><input type="text" id="dato20" name="dato20" placeholder="--" class="datos" value="<?php echo $consulta[127]?>"></td>
                        </tr>

                        <tr>
                            <td>% Exceso o Deficiencia de grasa corporal</td>
                            <td><input type="text" id="dato21" name="dato21" placeholder="--" class="datos" value="<?php echo $consulta[128]?>"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo tricipital + Pliegue cutáneo subescapular (percentil)</td>
                            <td><input type="text" id="dato22" name="dato22" placeholder="--" class="datos" value="<?php echo $consulta[129]?>"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo tricipital (percentil)</td>
                            <td><input type="text" id="dato23" name="dato23" placeholder="--" class="datos" value="<?php echo $consulta[130]?>"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo subescapular (percentil)</td>
                            <td><input type="text" id="dato24" name="dato24" placeholder="--" class="datos" value="<?php echo $consulta[131]?>"></td>
                        </tr>

                        <tr>
                            <td>Índice cintura-cadera (cm)</td>
                            <td><input type="text" id="dato25" name="dato25" placeholder="--" class="datos" value="<?php echo $consulta[132]?>"></td>
                        </tr>

                        <tr>
                            <td>Área muscular de brazo (cm²)</td>
                            <td><input type="text" id="dato26" name="dato26" placeholder="--" class="datos" value="<?php echo $consulta[133]?>"></td>
                        </tr>

                        <tr>
                            <td>Masa muscular total (kg)</td>
                            <td><input type="text" id="dato27" name="dato27" placeholder="--" class="datos" value="<?php echo $consulta[134]?>"></td>
                        </tr>

                        <tr>
                            <td>Agua corporal total (lt)</td>
                            <td><input type="text" id="dato28" name="dato28" placeholder="--" class="datos" value="<?php echo $consulta[135]?>"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="interp_datos">
                <label class="titulo" style="font-size:24px">Interpretación de datos</label>
                <br>
                <label style="font-weight:bold; font-size:16px;">Necesidades energéticas y nutrimentales</label>
                <br>
                <br>
                <label>a) Para el peso actual.</label>
                <br>
                <label>GET =</label>
                <label>TMR</label>
                <input id="tmr" name="tmr" placeholder="TMR" style="width:100px" value="<?php echo $consulta[136]?>">
                <label>ETA</label>
                <input id="eta" name="eta" placeholder="ETA" style="width:100px" value="<?php echo $consulta[137]?>">
                <label>AF</label>
                <input id="af" name="af" placeholder="AF" style="width:100px" value="<?php echo $consulta[138]?>">
                <label>TOTAL</label>
                <input id="total" name="total" placeholder="TOTAL" style="width:100px" value="<?php echo $consulta[139]?>">
                <br>
                <table id="" class="tablas" border="1">
                    <thead>
                        <tr>
                            <th>Nutrimento</th>
                            <th>Gramos</th>
                            <th>Kilocalorias</th>
                            <th>% del GET</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Hidratos de carbono</td>
                            <td><input type="text" id="hc1" name="hc1" placeholder="gramos" class="input_enc" value="<?php echo $consulta[140]?>"></td>
                            <td><input type="text" id="hc2" name="hc2" placeholder="kcal" class="input_enc" value="<?php echo $consulta[141]?>"></td>
                            <td><input type="text" id="hc3" name="hc3" placeholder="% GET" class="input_enc" value="<?php echo $consulta[142]?>"></td>
                        </tr>

                        <tr>
                            <td>Proteínas</td>
                            <td><input type="text" id="prot1" name="prot1" placeholder="gramos" class="input_enc" value="<?php echo $consulta[143]?>"></td>
                            <td><input type="text" id="prot2" name="prot2" placeholder="kcal" class="input_enc" value="<?php echo $consulta[144]?>"></td>
                            <td><input type="text" id="prot3" name="prot3" placeholder="% GET" class="input_enc" value="<?php echo $consulta[145]?>"></td>
                        </tr>

                        <tr>
                            <td>Lípidos</td>
                            <td><input type="text" id="lip1" name="lip1" placeholder="gramos" class="input_enc" value="<?php echo $consulta[146]?>"></td>
                            <td><input type="text" id="lip2" name="lip2" placeholder="kcal" class="input_enc" value="<?php echo $consulta[147]?>"></td>
                            <td><input type="text" id="lip3" name="lip3" placeholder="% GET" class="input_enc" value="<?php echo $consulta[148]?>"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="indicadores_bioquimicos">
                <label class="titulo">Indicadores bioquímicos</label>
                <table id="" class="tablas" border="1">
                    <thead>
                        <tr>
                            <th>Medición de</th>
                            <th>Fecha</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" id="medicion1" name="medicion1" placeholder="Medición" class="input_bioq" value="<?php echo $consulta[149]?>"></td>
                            <td><input type="text" id="fecha1" name="fecha1" placeholder="Fecha" class="input_bioq" value="<?php echo $consulta[150]?>"></td>
                            <td><input type="text" id="valor1" name="valor1" placeholder="Valor" class="input_bioq" value="<?php echo $consulta[151]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion2" name="medicion2" placeholder="Medición" class="input_bioq" value="<?php echo $consulta[152]?>"></td>
                            <td><input type="text" id="fecha2" name="fecha2" placeholder="Fecha" class="input_bioq" value="<?php echo $consulta[153]?>"></td>
                            <td><input type="text" id="valor2" name="valor2" placeholder="Valor" class="input_bioq" value="<?php echo $consulta[154]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion3" name="medicion3" placeholder="Medición" class="input_bioq" value="<?php echo $consulta[155]?>"></td>
                            <td><input type="text" id="fecha3" name="fecha3" placeholder="Fecha" class="input_bioq" value="<?php echo $consulta[156]?>"></td>
                            <td><input type="text" id="valor3" name="valor3" placeholder="Valor" class="input_bioq" value="<?php echo $consulta[157]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion4" name="medicion4" placeholder="Medición" class="input_bioq" value="<?php echo $consulta[158]?>"></td>
                            <td><input type="text" id="fecha4" name="fecha4" placeholder="Fecha" class="input_bioq" value="<?php echo $consulta[159]?>"></td>
                            <td><input type="text" id="valor4" name="valor4" placeholder="Valor" class="input_bioq" value="<?php echo $consulta[160]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion5" name="medicion5" placeholder="Medición" class="input_bioq" value="<?php echo $consulta[161]?>"></td>
                            <td><input type="text" id="fecha5" name="fecha5" placeholder="Fecha" class="input_bioq" value="<?php echo $consulta[162]?>"></td>
                            <td><input type="text" id="valor5" name="valor5" placeholder="Valor" class="input_bioq" value="<?php echo $consulta[163]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion6" name="medicion6" placeholder="Medición" class="input_bioq" value="<?php echo $consulta[164]?>"></td>
                            <td><input type="text" id="fecha6" name="fecha6" placeholder="Fecha" class="input_bioq" value="<?php echo $consulta[165]?>"></td>
                            <td><input type="text" id="valor6" name="valor6" placeholder="Valor" class="input_bioq" value="<?php echo $consulta[166]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion7" name="medicion7" placeholder="Medición" class="input_bioq" value="<?php echo $consulta[167]?>"></td>
                            <td><input type="text" id="fecha7" name="fecha7" placeholder="Fecha" class="input_bioq" value="<?php echo $consulta[168]?>"></td>
                            <td><input type="text" id="valor7" name="valor7" placeholder="Valor" class="input_bioq" value="<?php echo $consulta[169]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion8" name="medicion8" placeholder="Medición" class="input_bioq" value="<?php echo $consulta[170]?>"></td>
                            <td><input type="text" id="fecha8" name="fecha8" placeholder="Fecha" class="input_bioq" value="<?php echo $consulta[171]?>"></td>
                            <td><input type="text" id="valor8" name="valor8" placeholder="Valor" class="input_bioq" value="<?php echo $consulta[172]?>"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion9" name="medicion9" placeholder="Medición" class="input_bioq" value="<?php echo $consulta[173]?>"></td>
                            <td><input type="text" id="fecha9" name="fecha9" placeholder="Fecha" class="input_bioq" value="<?php echo $consulta[174]?>"></td>
                            <td><input type="text" id="valor9" name="valor9" placeholder="Valor" class="input_bioq" value="<?php echo $consulta[175]?>"></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div id="boton">
            <input type="submit" id="guardar_datos" name="guardar_datos" class="guardar_datos" value="Guardar datos">
            <br>
            <br>
            </div>

            <div>
                <br>
                <label></label>
                <br>
            </div>

        </div>  
        </form> 
    </body>

    <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>
    <script src="../assets/js/hc.js"></script>
</html>