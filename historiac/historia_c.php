<?php
session_start();
$_SESSION['nombre_usuario'];

include 'datos_historia.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="../assets/historiaC/clinic_h.css">
        <title>NutriPAES - Adulto (Historia Clínica)</title>
        
        <script src="https://kit.fontawesome.com/336ceace9e.js" crossorigin="anonymous"></script>
    </head>
    <body> 
        <h1 style="text-align:center">Historia Clínica</h1>
        <form action="datos_historia.php" method="POST">
        <!-- Input invisible -->
        <input type="hidden" id="usuario_db" name="usuario_db" value="<?php if(isset($_SESSION['nombre_usuario'])){
            echo $_SESSION['nombre_usuario'];}
        ?>">
        <div id="body1">
            <div id="datos_px">
                <input id="expediente" name="expediente" placeholder="Expediente" style="width:150px">
                <input type="date" id="fecha" name="fecha" required>
                <br>
                <br>
                <label class="titulo">Datos personales</label>
                <br>
                <input id="nombre" name="nombre" placeholder="Nombre del paciente" style="width:380px" required>
                <br>
                <input type="number" id="edad" name="edad" placeholder="Edad" style="width:100px">
                <select id="sexo" name="sexo">
                    <option value="ninguno">Sexo...</option>
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                </select>
                <input id="fecha_nac" name="fecha_nac" placeholder="Fecha nacimiento">
                <select id="estado_civil" name="estado_civil">
                    <option value="ninguno">Estado civil...</option>
                    <option value="casado">Casado/a</option>
                    <option value="comprometido">Comprometido/a</option>
                    <option value="divorciado">Divorciado/a</option>
                    <option value="soltero">Soltero/a</option>
                    <option value="union_libre">Unión libre</option>
                    <option value="viudo">Viudo/a</option>
                </select>
                <select id="escolaridad" name="escolaridad">
                    <option value="ninguna">Escolaridad...</option>
                    <option value="preescolar">Preescolar</option>
                    <option value="escolar">Escolar</option>
                    <option value="secundaria">Secundaria</option>
                    <option value="preparatoria">Preparatoria</option>
                    <option value="universidad">Universidad</option>
                    <option value="maestria">Maestría</option>
                    <option value="doctorado">Doctorado</option>
                </select>
                <br>
                <input id="direccion" name="direccion" placeholder="Dirección" style="width:380px">
                <input id="ocupacion" name="ocupacion" placeholder="Ocupación">
                <input id="telefono" name="telefono" placeholder="Teléfono">
                <input id="email" name="email" placeholder="Email" style="width:380px">

            </div>

            <div id="notas">
                <br><br><br><br>
                <label style="font-weight:bold; font-size:18px;">Motivo de la consulta:</label>
                <textarea id="motivo_consulta" name="motivo_consulta" placeholder="Coloca aquí el motivo de la consulta..." rows="2" cols="38"></textarea>
                <br><br>
                <label style="font-weight:bold; font-size:18px;">Diagnóstico y Observaciones:</label>
                <textarea id="diagnostico" name="diagnostico" placeholder="Coloca aquí tu diagnóstico y observaciones..." rows="4" cols="38"></textarea>
            </div>

            <div id="anteced">
                <label class="titulo" style="font-size:24px">Antecedentes salud / enfermedad</label>
                <br>
                <label style="font-weight:bold; font-size:18px;">Problemas actuales.-</label>

                <div id="enfermedades" class="divs">
                <label for="enf1"><input name="enf1" id="enf1" type="checkbox" value="Si"/>Colitis</label>

                <label for="enf2"><input name="enf2" id="enf2" type="checkbox" value="Si"/>Dentadura</label>

                <label for="enf3"><input name="enf3" id="enf3" type="checkbox" value="Si"/>Diarrea</label>

                <label for="enf4"><input name="enf4" id="enf4" type="checkbox" value="Si"/>Estreñimiento</label>

                <label for="enf5"><input name="enf5" id="enf5" type="checkbox" value="Si"/>Gastritis</label>

                <label for="enf6"><input name="enf6" id="enf6" type="checkbox" value="Si"/>Náuseas</label>

                <label for="enf7"><input name="enf7" id="enf7" type="checkbox" value="Si"/>Pirosis</label>

                <label for="enf8"><input name="enf8" id="enf8" type="checkbox" value="Si"/>Úlcera</label>

                <label for="enf9"><input name="enf9" id="enf9" type="checkbox" value="Si"/>Vómito</label>

                <label>Otro:<label>
                <input id="otro_problema" name="otro_problema" Placeholder="Otro problema" style="width:350px">
                </div>

                <label>Padece de alguna enfermedad diagnosticada: </label>
                <input id="padece_enf" name="padece_enf" placeholder="Padece alguna enfermedad" style="width:350px">
                <br>
                <label>Toma algún medicamento: </label>
                <input type="radio" name="toma_med" id="sitomo" value="Si">
                <label for="sitomo">Si</label>
                <input type="radio" name="toma_med" id="notomo" value="No">
                <label for="notomo">No</label>

                <label>Cuál:</label>
                <input id="medicamento" name="medicamento" placeholder="Nombre del medicamento">
                <input id="dosis_med" name="dosis_med" placeholder="Dosis del medicamento">
                <input id="desde_cuando" name="desde_cuando" placeholder="Desde cuando lo consume" style="width:300px">
                <div id="tomas" class="divs">
                <label>Toma:</label>
                <label for="toma1"><input name="toma1" id="toma1" type="checkbox" value="Si" />Laxantes</label>
                <label for="toma2"><input name="toma2" id="toma2" type="checkbox" value="Si" />Diuréticos</label>
                <label for="toma3"><input name="toma3" id="toma3" type="checkbox" value="Si" />Antiácidos</label>
                <label for="toma4"><input name="toma4" id="toma4" type="checkbox" value="Si" />Analgésicos</label>
                </div>
                <br>
                <label>Le han practicado alguna cirugía:</label>
                <input id="cirugia" name="cirugia" placeholder="Cirugía" style="width:350px">
                <br>
                <label style="font-weight:bold; font-size:18px;">Antecedentes familiares.-</label>
                <br>
                <div id="ant_familiar" class="divs">
                <label for="ant1"><input name="ant1" id="ant1" type="checkbox" value="Si" />Obesidad</label>
                <label for="ant2"><input name="ant2" id="ant2" type="checkbox" value="Si" />Diabetes</label>
                <label for="ant3"><input name="ant3" id="ant3" type="checkbox" value="Si" />HTA</label>
                <label for="ant4"><input name="ant4" id="ant4" type="checkbox" value="Si" />Cáncer</label>
                <label for="ant5"><input name="ant5" id="ant5" type="checkbox" value="Si" />Hipercolesterolemia</label>
                <label for="ant6"><input name="ant6" id="ant6" type="checkbox" value="Si" />Hipertrigliceridemia</label>
                </div>
                <br>
            </div> 

            <div id="estilo_vida">
                <label class="titulo" style="font-size:24px">Estilo de vida</label>
                <br>
                <label style="font-weight:bold; font-size:16px;">Actividad:</label>
                <select id="actividad" name="actividad">
                    <option value="Ninguna">Actividad...</option>
                    <option value="Muy ligera">Muy ligera</option>
                    <option value="Ligera">Ligera</option>
                    <option value="Moderada">Moderada</option>
                    <option value="Pesada">Pesada</option>
                    <option value="Excepcional">Excepcional</option>
                </select>
                <label>Tipo</label>
                <input id="tipo_ej" name="tipo_ej" placeholder="Tipo de ejercicio">
                <label>Frecuencia</label>
                <input id="frecuencia_ej" name="frecuencia_ej" placeholder="Frecuencia" style="width:300px">
                <label>Duración</label>
                <input id="duracion_ej" name="duracion_ej" placeholder="Duración">
                <label>¿Cuando inició?</label>
                <input id="cuando_inicio" name="cuando_inicio" placeholder="¿Cuando inició?">
                <br>
                <br>
                <label style="font-weight:bold; font-size:16px;">Consumo de (frecuencia y cantidad):</label>
                <br>
                <label>Alcohol</label>
                <input id="alcohol" name="alcohol" placeholder="Alcohol">
                <label>Tabaco</label>
                <input id="tabaco" name="tabaco" placeholder="Tabaco">
                <label>Café</label>
                <input id="cafe" name="cafe" placeholder="Café">
            </div>

            <div id="indicadores_d">
                <label class="titulo" style="font-size:24px">Indicadores dietéticos</label>
                <br>
                <label>Cuántas comidas hace al día:</label>
                <input id="comidasxdia" name="comidasxdia" placeholder="Comidas por día">
                <label>Come entre comidas:</label>
                <input id="entre_comidas" name="entre_comidas" placeholder="Come entre comidas">

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
                            <td><input type="text" id="entresemana1" name="entresemana1" placeholder="Cuántas" class="input_enc"></td>
                            <td><input type="text" id="entresemana2" name="entresemana2" placeholder="Cuántas" class="input_enc"></td>
                            <td><input type="text" id="entresemana3" name="entresemana3" placeholder="Horario" class="input_enc"></td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold; font-size:16px;">Fin de semana</td>
                            <td><input type="text" id="finsemana1" name="finsemana1" placeholder="Cuántas" class="input_enc"></td>
                            <td><input type="text" id="finsemana2" name="finsemana2" placeholder="Cuántas" class="input_enc"></td>
                            <td><input type="text" id="finsemana3" name="finsemana3" placeholder="Horario" class="input_enc"></td>
                        </tr>

                    </tbody>
                </table>

                <label>Quién prepara sus alimentos:</label>
                <input id="quien_prepara" name="quien_prepara" placeholder="Quien prepara sus comidas">
                <label>Apetito:</label>
                <select id="apetito" name="apetito">
                    <option value="ninguno">Apetito...</option>
                    <option value="bueno">Bueno</option>
                    <option value="malo">Malo</option>
                    <option value="regular">Regular</option>
                </select>
                <br>
                <label>A qué hora tiene más hambre:</label>
                <input id="mas_hambre" name="mas_hambre" placeholder="Hora" style="width:100px">
                <label>Alimentos preferidos:</label>
                <input id="al_preferidos" name="al_preferidos" placeholder="Alimentos preferidos" style="width:350px">
                <br>
                <label>Alimentos que no le agradan / no acostumbra:</label>
                <input id="al_nogustan" name="al_nogustan" placeholder="Alimentos que no le agradan" style="width:350px">
                <br>
                <label>Alimentos que le causan malestar (especificar):</label>
                <input id="al_malestar" name="al_malestar" placeholder="Alimentos que le causan malestar" style="width:350px">
                <br>
                <label>Es alérgico o intolerante a algún alimento (especificar):</label>
                <input type="radio" name="alergia" id="sialergia" value="Si">
                <label for="sialergia">Si</label>
                <input type="radio" name="alergia" id="noalergia" value="No">
                <label for="noalergia">No</label>
                <input id="al_alergia" name="al_alergia" placeholder="Alimento que le causa alergia o intolerancia" style="width:350px">
                <br>
                <label>Toma algún suplemento / complemento:</label>
                <input type="radio" name="sup_com" id="sisup_com" value="Si">
                <label for="sisup_com">Si</label>
                <input type="radio" name="sup_com" id="nosup_com" value="No">
                <label for="nosup_com">No</label>
                <input id="suplemento" name="suplemento" placeholder="Cuál" style="width:200px">
                <label>Dosis:</label>
                <input id="dosis_sup" name="dosis_sup" placeholder="Dosis">
                <label>¿Por qué?</label>
                <input id="porq_sup" name="porq_sup" placeholder="¿Por qué lo consume?" style="width:300px">
                <br>
                <label>Su consumo varía cuando está triste, nervioso o ansioso:</label>
                <input type="radio" name="cambio_com" id="sicambio_com" value="Si">
                <label for="sicambio_com">Si</label>
                <input type="radio" name="cambio_com" id="nocambio_com" value="No">
                <label for="nocambio_com">No</label>
                <input id="consumo_varia" name="consumo_varia" placeholder="De qué manera varía su consumo" style="width:300px">
                <br>
                <label>Agrega sal a la comida ya preparada:</label>
                <input type="radio" name="agrega" id="siagrega" value="Si">
                <label for="siagrega">Si</label>
                <input type="radio" name="agrega" id="noagrega" value="No">
                <label for="noagrega">No</label>
                <br>
                <br>
                <label>Qué grasa utilizan en casa para preparar su comida:</label>
                <div id="grasa" class="divs">
                <label for="grasa1"><input name="grasa1" id="grasa1" type="checkbox" value="Si" />Margarina</label>
                <label for="grasa2"><input name="grasa2" id="grasa2" type="checkbox" value="Si" />Aceite vegetal</label>
                <label for="grasa3"><input name="grasa3" id="grasa3" type="checkbox" value="Si" />Manteca</label>
                <label for="grasa4"><input name="grasa4" id="grasa4" type="checkbox" value="Si" />Mantequilla</label>
                <label>Otro:</label>
                <input id="otra_grasa" name="otra_grasa" placeholder="Otro tipo de grasa">
                </div>
                <label>Ha llevado alguna dieta especial:</label>
                <input id="dieta_esp" name="dieta_esp" placeholder="Ha llevado alguna dieta especial" style="width:300px">
                <label>Cuántas:</label>
                <input id="cuantas_dietas" name="cuantas_dietas" placeholder="Cuantas" style="width:250px">
                <label>Qué tipo de dieta:</label>
                <input id="tipo_dieta" name="tipo_dieta" placeholder="Qué tipo de dieta">
                <label>Hace cuánto:</label>
                <input id="hace_cuanto" name="hace_cuanto" placeholder="Hace cuánto">
                <label>Por cuánto tiempo:</label>
                <input id="cuanto_tiempo" name="cuanto_tiempo" placeholder="Por cuánto tiempo" style="width:170px">
                <label>Por qué razón:</label>
                <input id="razon" name="razon" placeholder="Por qué razón">
                <label>Qué tanto se apegó a ella:</label>
                <input id="apego" name="apego" placeholder="Qué tanto se apegó" style="width:170px">
                <br>
                <label>Obtuvo los resultados esperados:</label>
                <input id="obt_resultados" name="obt_resultados" placeholder="Obtuvo resultados">
                <br>
                <label>Ha utilizado medicamentos para bajar de peso:</label>
                <input type="radio" name="med_bajar" id="simed_bajar" value="Si">
                <label for="simed_bajar">Si</label>
                <input type="radio" name="med_bajar" id="nomed_bajar" value="No">
                <label for="nomed_bajar">No</label>
                <input id="medic_bajar" name="medic_bajar" placeholder="Cuáles"  style="width:300px">
            </div>

            <div id="frecconsumo_al">
                <label class="titulo" style="font-size:24px">Frecuencia de consumo de alimentos</label>
                <br>
                <label style="font-weight:bold; font-size:16px;">Lista rápida de alimentos y bebidas</label>
                <br>
                <table id="alimentos_frecuentes" class="tablas" border="1">
                    <tbody>
                        <tr>
                            <td><input type="text" id="alimento1" name="alimento1" placeholder="Escribe un alimento o bebida" class="alimento"></td>
                            <td><input type="text" id="frecuencia1" name="frecuencia1" placeholder="Frecuencia de consumo" class="frecuencia"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento2" name="alimento2" placeholder="Escribe un alimento o bebida" class="alimento"></td>
                            <td><input type="text" id="frecuencia2" name="frecuencia2" placeholder="Frecuencia de consumo" class="frecuencia"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento3" name="alimento3" placeholder="Escribe un alimento o bebida" class="alimento"></td>
                            <td><input type="text" id="frecuencia3" name="frecuencia3" placeholder="Frecuencia de consumo" class="frecuencia"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento4" name="alimento4" placeholder="Escribe un alimento o bebida" class="alimento"></td>
                            <td><input type="text" id="frecuencia4" name="frecuencia4" placeholder="Frecuencia de consumo" class="frecuencia"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento5" name="alimento5" placeholder="Escribe un alimento o bebida" class="alimento"></td>
                            <td><input type="text" id="frecuencia5" name="frecuencia5" placeholder="Frecuencia de consumo" class="frecuencia"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento6" name="alimento6" placeholder="Escribe un alimento o bebida" class="alimento"></td>
                            <td><input type="text" id="frecuencia6" name="frecuencia6" placeholder="Frecuencia de consumo" class="frecuencia"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento7" name="alimento7" placeholder="Escribe un alimento o bebida" class="alimento"></td>
                            <td><input type="text" id="frecuencia7" name="frecuencia7" placeholder="Frecuencia de consumo" class="frecuencia"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento8" name="alimento8" placeholder="Escribe un alimento o bebida" class="alimento"></td>
                            <td><input type="text" id="frecuencia8" name="frecuencia8" placeholder="Frecuencia de consumo" class="frecuencia"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="alimento9" name="alimento9" placeholder="Escribe un alimento o bebida" class="alimento"></td>
                            <td><input type="text" id="frecuencia9" name="frecuencia9" placeholder="Frecuencia de consumo" class="frecuencia"></td>
                        </tr>

                    </tbody>
                </table>
                <br>
                <label>Vasos de agua natural al día:</label>
                <input id="vasos_agua" name="vasos_agua" placeholder="Vasos de agua" style="width:150px">
                <label>Vasos de bebidas al día (leche, jugo, café):</label>
                <input id="vasos_bebidas" name="vasos_bebidas" placeholder="Vasos de bebidas" style="width:150px">
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
                            <td><input type="text" id="dato1" name="dato1" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Peso habitual (kg)</td>
                            <td><input type="text" id="dato2" name="dato2" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Estatura (m)</td>
                            <td><input type="text" id="dato3" name="dato3" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo tricipital (mm)</td>
                            <td><input type="text" id="dato4" name="dato4" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo bicipital (mm)</td>
                            <td><input type="text" id="dato5" name="dato5" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo subescapular (mm)</td>
                            <td><input type="text" id="dato6" name="dato6" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo suprailíaco (mm)</td>
                            <td><input type="text" id="dato7" name="dato7" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Circunferencia de brazo (cm)</td>
                            <td><input type="text" id="dato8" name="dato8" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Circunferencia de cintura (cm)</td>
                            <td><input type="text" id="dato9" name="dato9" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Circunferencia de cadera (cm)</td>
                            <td><input type="text" id="dato10" name="dato10" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Circunferencia abdominal (cm)</td>
                            <td><input type="text" id="dato11" name="dato11" placeholder="--" class="datos"></td>
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
                            <td><input type="text" id="dato12" name="dato12" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Peso teórico (kg)</td>
                            <td><input type="text" id="dato13" name="dato13" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>% Peso teórico</td>
                            <td><input type="text" id="dato14" name="dato14" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>% Peso habitual</td>
                            <td><input type="text" id="dato15" name="dato15" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Índice de masa corporal (kg/m²)</td>
                            <td><input type="text" id="dato16" name="dato16" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Peso mínimo y máximo recomendado por IMC (kg)</td>
                            <td><input type="text" id="dato17" name="dato17" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>% Grasa corporal</td>
                            <td><input type="text" id="dato18" name="dato18" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Grasa corporal total (kg)</td>
                            <td><input type="text" id="dato19" name="dato19" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Masa libre de grasa (kg)</td>
                            <td><input type="text" id="dato20" name="dato20" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>% Exceso o Deficiencia de grasa corporal</td>
                            <td><input type="text" id="dato21" name="dato21" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo tricipital + Pliegue cutáneo subescapular (percentil)</td>
                            <td><input type="text" id="dato22" name="dato22" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo tricipital (percentil)</td>
                            <td><input type="text" id="dato23" name="dato23" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Pliegue cutáneo subescapular (percentil)</td>
                            <td><input type="text" id="dato24" name="dato24" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Índice cintura-cadera (cm)</td>
                            <td><input type="text" id="dato25" name="dato25" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Área muscular de brazo (cm²)</td>
                            <td><input type="text" id="dato26" name="dato26" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Masa muscular total (kg)</td>
                            <td><input type="text" id="dato27" name="dato27" placeholder="--" class="datos"></td>
                        </tr>

                        <tr>
                            <td>Agua corporal total (lt)</td>
                            <td><input type="text" id="dato28" name="dato28" placeholder="--" class="datos"></td>
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
                <input id="tmr" name="tmr" placeholder="TMR" style="width:100px">
                <label>ETA</label>
                <input id="eta" name="eta" placeholder="ETA" style="width:100px">
                <label>AF</label>
                <input id="af" name="af" placeholder="AF" style="width:100px">
                <label>TOTAL</label>
                <input id="total" name="total" placeholder="TOTAL" style="width:100px">
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
                            <td><input type="text" id="hc1" name="hc1" placeholder="gramos" class="input_enc"></td>
                            <td><input type="text" id="hc2" name="hc2" placeholder="kcal" class="input_enc"></td>
                            <td><input type="text" id="hc3" name="hc3" placeholder="% GET" class="input_enc"></td>
                        </tr>

                        <tr>
                            <td>Proteínas</td>
                            <td><input type="text" id="prot1" name="prot1" placeholder="gramos" class="input_enc"></td>
                            <td><input type="text" id="prot2" name="prot2" placeholder="kcal" class="input_enc"></td>
                            <td><input type="text" id="prot3" name="prot3" placeholder="% GET" class="input_enc"></td>
                        </tr>

                        <tr>
                            <td>Lípidos</td>
                            <td><input type="text" id="lip1" name="lip1" placeholder="gramos" class="input_enc"></td>
                            <td><input type="text" id="lip2" name="lip2" placeholder="kcal" class="input_enc"></td>
                            <td><input type="text" id="lip3" name="lip3" placeholder="% GET" class="input_enc"></td>
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
                            <td><input type="text" id="medicion1" name="medicion1" placeholder="Medición" class="input_bioq"></td>
                            <td><input type="text" id="fecha1" name="fecha1" placeholder="Fecha" class="input_bioq"></td>
                            <td><input type="text" id="valor1" name="valor1" placeholder="Valor" class="input_bioq"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion2" name="medicion2" placeholder="Medición" class="input_bioq"></td>
                            <td><input type="text" id="fecha2" name="fecha2" placeholder="Fecha" class="input_bioq"></td>
                            <td><input type="text" id="valor2" name="valor2" placeholder="Valor" class="input_bioq"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion3" name="medicion3" placeholder="Medición" class="input_bioq"></td>
                            <td><input type="text" id="fecha3" name="fecha3" placeholder="Fecha" class="input_bioq"></td>
                            <td><input type="text" id="valor3" name="valor3" placeholder="Valor" class="input_bioq"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion4" name="medicion4" placeholder="Medición" class="input_bioq"></td>
                            <td><input type="text" id="fecha4" name="fecha4" placeholder="Fecha" class="input_bioq"></td>
                            <td><input type="text" id="valor4" name="valor4" placeholder="Valor" class="input_bioq"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion5" name="medicion5" placeholder="Medición" class="input_bioq"></td>
                            <td><input type="text" id="fecha5" name="fecha5" placeholder="Fecha" class="input_bioq"></td>
                            <td><input type="text" id="valor5" name="valor5" placeholder="Valor" class="input_bioq"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion6" name="medicion6" placeholder="Medición" class="input_bioq"></td>
                            <td><input type="text" id="fecha6" name="fecha6" placeholder="Fecha" class="input_bioq"></td>
                            <td><input type="text" id="valor6" name="valor6" placeholder="Valor" class="input_bioq"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion7" name="medicion7" placeholder="Medición" class="input_bioq"></td>
                            <td><input type="text" id="fecha7" name="fecha7" placeholder="Fecha" class="input_bioq"></td>
                            <td><input type="text" id="valor7" name="valor7" placeholder="Valor" class="input_bioq"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion8" name="medicion8" placeholder="Medición" class="input_bioq"></td>
                            <td><input type="text" id="fecha8" name="fecha8" placeholder="Fecha" class="input_bioq"></td>
                            <td><input type="text" id="valor8" name="valor8" placeholder="Valor" class="input_bioq"></td>
                        </tr>

                        <tr>
                            <td><input type="text" id="medicion9" name="medicion9" placeholder="Medición" class="input_bioq"></td>
                            <td><input type="text" id="fecha9" name="fecha9" placeholder="Fecha" class="input_bioq"></td>
                            <td><input type="text" id="valor9" name="valor9" placeholder="Valor" class="input_bioq"></td>
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
</html>