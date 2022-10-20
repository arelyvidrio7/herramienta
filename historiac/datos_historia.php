<?php

if(isset($_POST['guardar_datos'])){
    $con = mysqli_connect("localhost", "root", "", "datos");

$user = $_POST['usuario_db'];
$expediente = $_POST['expediente'] ? $_POST['expediente'] : '';
$fecha = $_POST['fecha'];


/* DATOS PERSONALES */
$nombre = $_POST['nombre'];
$edad = $_POST['edad'] ? $_POST['edad'] : '';
$sexo = $_POST['sexo'] ? $_POST['sexo'] : '';
$fecha_nac = $_POST['fecha_nac'] ? $_POST['fecha_nac'] : '';
$estado_civil = $_POST['estado_civil'] ? $_POST['estado_civil'] : '';
$escolaridad = $_POST['escolaridad'] ? $_POST['escolaridad'] : '';
$direccion = $_POST['direccion'] ? $_POST['direccion'] : '';
$ocupacion = $_POST['ocupacion'] ? $_POST['ocupacion'] : '';
$telefono = $_POST['telefono'] ? $_POST['telefono'] : '';
$email = $_POST['email'] ? $_POST['email'] : '';


/* MOTIVO CONSULTA Y DIAGNÓSTICO */
$motivo_consulta = $_POST['motivo_consulta'] ? $_POST['motivo_consulta'] : '';
$diagnostico = $_POST['diagnostico'] ? $_POST['diagnostico'] : '';


/* PROBLEMAS ACTUALES */
$enf1 = $_POST['enf1'] ? $_POST['enf1']: "No";
$enf2 = $_POST['enf2'] ? $_POST['enf2']: "No";
$enf3 = $_POST['enf3'] ? $_POST['enf3']: "No";
$enf4 = $_POST['enf4'] ? $_POST['enf4']: "No";
$enf5 = $_POST['enf5'] ? $_POST['enf5']: "No";
$enf6 = $_POST['enf6'] ? $_POST['enf6']: "No";
$enf7 = $_POST['enf7'] ? $_POST['enf7']: "No";
$enf8 = $_POST['enf8'] ? $_POST['enf8']: "No";
$enf9 = $_POST['enf9'] ? $_POST['enf9']: "No";


$otro_problema = $_POST['otro_problema'] ? $_POST['otro_problema'] : '';
$padece_enf = $_POST['padece_enf'] ? $_POST['padece_enf'] : '';
$toma_med = $_POST['toma_med'] ? $_POST['toma_med'] : '';
$medicamento = $_POST['medicamento'] ? $_POST['medicamento'] : '';
$dosis_med = $_POST['dosis_med'] ? $_POST['dosis_med'] : '';
$desde_cuando = $_POST['desde_cuando'] ? $_POST['desde_cuando'] : '';


if(isset($_POST['toma1'])){
    $toma1 = $_POST['toma1'];
}else{
    $toma1 = "No";
}

if(isset($_POST['toma2'])){
    $toma2 = $_POST['toma2'];
}else{
    $toma2 = "No";
}

if(isset($_POST['toma3'])){
    $toma3 = $_POST['toma3'];
}else{
    $toma3 = "No";
}

if(isset($_POST['toma4'])){
    $toma4 = $_POST['toma4'];
}else{
    $toma4 = "No";
}

$cirugia = $_POST['cirugia'] ? $_POST['cirugia'] : '';

if(isset($_POST['ant1'])){
    $ant1 = $_POST['ant1'];
}else{
    $ant1 = "No";
}

if(isset($_POST['ant2'])){
    $ant2 = $_POST['ant2'];
}else{
    $ant2 = "No";
}

if(isset($_POST['ant3'])){
    $ant3 = $_POST['ant3'];
}else{
    $ant3 = "No";
}

if(isset($_POST['ant4'])){
    $ant4 = $_POST['ant4'];
}else{
    $ant4 = "No";
}

if(isset($_POST['ant5'])){
    $ant5 = $_POST['ant5'];
}else{
    $ant5 = "No";
}

if(isset($_POST['ant6'])){
    $ant6 = $_POST['ant6'];
}else{
    $ant6 = "No";
}


/* ESTILO DE VIDA */
$actividad = $_POST['actividad'] ? $_POST['actividad'] : '';
$tipo_ej = $_POST['tipo_ej'] ? $_POST['tipo_ej'] : '';
$frecuencia_ej = $_POST['frecuencia_ej'] ? $_POST['frecuencia_ej'] : '';
$duracion_ej = $_POST['duracion_ej'] ? $_POST['duracion_ej'] : '';
$cuando_inicio = $_POST['cuando_inicio'] ? $_POST['cuando_inicio'] : '';
$alcohol = $_POST['alcohol'] ? $_POST['alcohol'] : '';
$tabaco = $_POST['tabaco'] ? $_POST['tabaco'] : '';
$cafe = $_POST['cafe'] ? $_POST['cafe'] : '';


/* INDICADORES DIETÉTICOS */
$comidasxdia = $_POST['comidasxdia'] ? $_POST['comidasxdia'] : '';
$entre_comidas = $_POST['entre_comidas'] ? $_POST['entre_comidas'] : '';

$entresemana1 = $_POST['entresemana1'] ? $_POST['entresemana1'] : '';
$entresemana2 = $_POST['entresemana2'] ? $_POST['entresemana2'] : '';
$entresemana3 = $_POST['entresemana3'] ? $_POST['entresemana3'] : '';

$finsemana1 = $_POST['finsemana1'] ? $_POST['finsemana1'] : '';
$finsemana2 = $_POST['finsemana2'] ? $_POST['finsemana2'] : '';
$finsemana3 = $_POST['finsemana3'] ? $_POST['finsemana3'] : '';


$quien_prepara = $_POST['quien_prepara'] ? $_POST['quien_prepara'] : '';
$apetito = $_POST['apetito'] ? $_POST['apetito'] : '';
$mas_hambre = $_POST['mas_hambre'] ? $_POST['mas_hambre'] : '';
$al_preferidos = $_POST['al_preferidos'] ? $_POST['al_preferidos'] : '';
$al_nogustan = $_POST['al_nogustan'] ? $_POST['al_nogustan'] : '';
$al_malestar = $_POST['al_malestar'] ? $_POST['al_malestar'] : '';

if(isset($_POST['alergia'])){
    $alergia = $_POST['alergia'];
}else{
    $alergia = "";
}

$al_alergia = $_POST['al_alergia'] ? $_POST['al_alergia'] : '';

if(isset($_POST['sup_com'])){
    $sup_com = $_POST['sup_com'];
}else{
    $sup_com = "";
}

$suplemento = $_POST['suplemento'] ? $_POST['suplemento'] : '';
$dosis_sup = $_POST['dosis_sup'] ? $_POST['dosis_sup'] : '';
$porq_sup = $_POST['porq_sup'] ? $_POST['porq_sup'] : '';

if(isset($_POST['cambio_com'])){
    $cambio_com = $_POST['cambio_com'];
}else{
    $cambio_com = "";
}

$consumo_varia = $_POST['consumo_varia'] ? $_POST['consumo_varia'] : '';

if(isset($_POST['agrega'])){
    $agrega = $_POST['agrega'];
}else{
    $agrega = "";
}

if(isset($_POST['grasa1'])){
    $grasa1 = $_POST['grasa1'];
}else{
    $grasa1 = "No";
}

if(isset($_POST['grasa2'])){
    $grasa2 = $_POST['grasa2'];
}else{
    $grasa2 = "No";
}

if(isset($_POST['grasa3'])){
    $grasa3 = $_POST['grasa3'];
}else{
    $grasa3 = "No";
}

if(isset($_POST['grasa4'])){
    $grasa4 = $_POST['grasa4'];
}else{
    $grasa4 = "No";
}


$otra_grasa = $_POST['otra_grasa'] ? $_POST['otra_grasa'] : '';
$dieta_esp = $_POST['dieta_esp'] ? $_POST['dieta_esp'] : '';
$cuantas_dietas = $_POST['cuantas_dietas'] ? $_POST['cuantas_dietas'] : '';
$tipo_dieta = $_POST['tipo_dieta'] ? $_POST['tipo_dieta'] : '';
$hace_cuanto = $_POST['hace_cuanto'] ? $_POST['hace_cuanto'] : '';
$cuanto_tiempo = $_POST['cuanto_tiempo'] ? $_POST['cuanto_tiempo'] : '';
$razon = $_POST['razon'] ? $_POST['razon'] : '';
$apego = $_POST['apego'] ? $_POST['apego'] : '';
$obt_resultados = $_POST['obt_resultados'] ? $_POST['obt_resultados'] : '';

if(isset($_POST['med_bajar'])){
    $med_bajar = $_POST['med_bajar'];
}else{
    $med_bajar = "";
}

$medic_bajar = $_POST['medic_bajar'] ? $_POST['medic_bajar'] : '';


/* FRECUENCIA DE CONSUMO DE ALIMENTOS */
$alimento1 = $_POST['alimento1'] ? $_POST['alimento1'] : '';
$frecuencia1 = $_POST['frecuencia1'] ? $_POST['frecuencia1'] : '';
$alimento2 = $_POST['alimento2'] ? $_POST['alimento2'] : '';
$frecuencia2 = $_POST['frecuencia2'] ? $_POST['frecuencia2'] : '';
$alimento3 = $_POST['alimento3'] ? $_POST['alimento3'] : '';
$frecuencia3 = $_POST['frecuencia3'] ? $_POST['frecuencia3'] : '';
$alimento4 = $_POST['alimento4'] ? $_POST['alimento4'] : '';
$frecuencia4 = $_POST['frecuencia4'] ? $_POST['frecuencia4'] : '';
$alimento5 = $_POST['alimento5'] ? $_POST['alimento5'] : '';
$frecuencia5 = $_POST['frecuencia5'] ? $_POST['frecuencia5'] : '';
$alimento6 = $_POST['alimento6'] ? $_POST['alimento6'] : '';
$frecuencia6 = $_POST['frecuencia6'] ? $_POST['frecuencia6'] : '';
$alimento7 = $_POST['alimento7'] ? $_POST['alimento7'] : '';
$frecuencia7 = $_POST['frecuencia7'] ? $_POST['frecuencia7'] : '';
$alimento8 = $_POST['alimento8'] ? $_POST['alimento8'] : '';
$frecuencia8 = $_POST['frecuencia8'] ? $_POST['frecuencia8'] : '';
$alimento9 = $_POST['alimento9'] ? $_POST['alimento9'] : '';
$frecuencia9 = $_POST['frecuencia9'] ? $_POST['frecuencia9'] : '';

$vasos_agua = $_POST['vasos_agua'] ? $_POST['vasos_agua'] : '';

$vasos_bebidas = $_POST['vasos_bebidas'] ? $_POST['vasos_bebidas'] : '';


/* INDICADORES ANTROPOMÉTRICOS */
$dato1 = $_POST['dato1'] ? $_POST['dato1'] : '';
$dato2 = $_POST['dato2'] ? $_POST['dato2'] : '';
$dato3 = $_POST['dato3'] ? $_POST['dato3'] : '';
$dato4 = $_POST['dato4'] ? $_POST['dato4'] : '';
$dato5 = $_POST['dato5'] ? $_POST['dato5'] : '';
$dato6 = $_POST['dato6'] ? $_POST['dato6'] : '';
$dato7 = $_POST['dato7'] ? $_POST['dato7'] : '';
$dato8 = $_POST['dato8'] ? $_POST['dato8'] : '';
$dato9 = $_POST['dato9'] ? $_POST['dato9'] : '';
$dato10 = $_POST['dato10'] ? $_POST['dato10'] : '';
$dato11 = $_POST['dato11'] ? $_POST['dato11'] : '';
$dato12 = $_POST['dato12'] ? $_POST['dato12'] : '';
$dato13 = $_POST['dato13'] ? $_POST['dato13'] : '';
$dato14 = $_POST['dato14'] ? $_POST['dato14'] : '';
$dato15 = $_POST['dato15'] ? $_POST['dato15'] : '';
$dato16 = $_POST['dato16'] ? $_POST['dato16'] : '';
$dato17 = $_POST['dato17'] ? $_POST['dato17'] : '';
$dato18 = $_POST['dato18'] ? $_POST['dato18'] : '';
$dato19 = $_POST['dato19'] ? $_POST['dato19'] : '';
$dato20 = $_POST['dato20'] ? $_POST['dato20'] : '';
$dato21 = $_POST['dato21'] ? $_POST['dato21'] : '';
$dato22 = $_POST['dato22'] ? $_POST['dato22'] : '';
$dato23 = $_POST['dato23'] ? $_POST['dato23'] : '';
$dato24 = $_POST['dato24'] ? $_POST['dato24'] : '';
$dato25 = $_POST['dato25'] ? $_POST['dato25'] : '';
$dato26 = $_POST['dato26'] ? $_POST['dato26'] : '';
$dato27 = $_POST['dato27'] ? $_POST['dato27'] : '';
$dato28 = $_POST['dato28'] ? $_POST['dato28'] : '';

/* NECESIDADES ENERGÉTICAS Y NUTRIMENTALES */
$tmr = $_POST['tmr'] ? $_POST['tmr'] : '';
$eta = $_POST['eta'] ? $_POST['eta'] : '';
$af = $_POST['af'] ? $_POST['af'] : '';
$total = $_POST['total'] ? $_POST['total'] : '';


$hc1 = $_POST['hc1'] ? $_POST['hc1'] : '';
$hc2 = $_POST['hc2'] ? $_POST['hc2'] : '';
$hc3 = $_POST['hc3'] ? $_POST['hc3'] : '';

$prot1 = $_POST['prot1'] ? $_POST['prot1'] : '';
$prot2 = $_POST['prot2'] ? $_POST['prot2'] : '';
$prot3 = $_POST['prot3'] ? $_POST['prot3'] : '';

$lip1 = $_POST['lip1'] ? $_POST['lip1'] : '';
$lip2 = $_POST['lip2'] ? $_POST['lip2'] : '';
$lip3 = $_POST['lip3'] ? $_POST['lip3'] : '';


/* INDICADORES BIOQUÍMICOS */
$medicion1 = $_POST['medicion1'] ? $_POST['medicion1'] : '';
$fecha1 = $_POST['fecha1'] ? $_POST['fecha1'] : '';
$valor1 = $_POST['valor1'] ? $_POST['valor1'] : '';

$medicion2 = $_POST['medicion2'] ? $_POST['medicion2'] : '';
$fecha2 = $_POST['fecha2'] ? $_POST['fecha2'] : '';
$valor2 = $_POST['valor2'] ? $_POST['valor2'] : '';

$medicion3 = $_POST['medicion3'] ? $_POST['medicion3'] : '';
$fecha3 = $_POST['fecha3'] ? $_POST['fecha3'] : '';
$valor3 = $_POST['valor3'] ? $_POST['valor3'] : '';

$medicion4 = $_POST['medicion4'] ? $_POST['medicion4'] : '';
$fecha4 = $_POST['fecha4'] ? $_POST['fecha4'] : '';
$valor4 = $_POST['valor4'] ? $_POST['valor4'] : '';

$medicion5 = $_POST['medicion5'] ? $_POST['medicion5'] : '';
$fecha5 = $_POST['fecha5'] ? $_POST['fecha5'] : '';
$valor5 = $_POST['valor5'] ? $_POST['valor5'] : '';

$medicion6 = $_POST['medicion6'] ? $_POST['medicion6'] : '';
$fecha6 = $_POST['fecha6'] ? $_POST['fecha6'] : '';
$valor6 = $_POST['valor6'] ? $_POST['valor6'] : '';

$medicion7 = $_POST['medicion7'] ? $_POST['medicion7'] : '';
$fecha7 = $_POST['fecha7'] ? $_POST['fecha7'] : '';
$valor7 = $_POST['valor7'] ? $_POST['valor7'] : '';

$medicion8 = $_POST['medicion8'] ? $_POST['medicion8'] : '';
$fecha8 = $_POST['fecha8'] ? $_POST['fecha8'] : '';
$valor8 = $_POST['valor8'] ? $_POST['valor8'] : '';

$medicion9 = $_POST['medicion9'] ? $_POST['medicion9'] : '';
$fecha9 = $_POST['fecha9'] ? $_POST['fecha9'] : '';
$valor9 = $_POST['valor9'] ? $_POST['valor9'] : '';

$result = "INSERT INTO px_adulto(id,nombre_usuario,fecha,expediente,nombre,edad,sexo,fecha_nac,estado_civil,escolaridad,direccion,ocupacion,telefono,email,motivo_consulta,
diagnostico,enf1,enf2,enf3,enf4,enf5,enf6,enf7,enf8,enf9,otro_problema,padece_enf,toma_med,medicamento,dosis_med,desde_cuando,toma1,
toma2,toma3,toma4,cirugia,ant1,ant2,ant3,ant4,ant5,ant6,actividad,tipo_ej,frecuencia_ej,duracion_ej,cuando_inicio,alcohol,tabaco,cafe,
comidasxdia,entre_comidas,entresemana1,entresemana2,entresemana3,finsemana1,finsemana2,finsemana3,quien_prepara,apetito,mas_hambre,
al_preferidos,al_nogustan,al_malestar,alergia,al_alergia,sup_com,suplemento,dosis_sup,porq_sup,cambio_com,consumo_varia,agrega,grasa1,
grasa2,grasa3,grasa4,otra_grasa,dieta_esp,cuantas_dietas,tipo_dieta,hace_cuanto,cuanto_tiempo,razon,apego,obt_resultados,med_bajar,
medic_bajar,alimento1,frecuencia1,alimento2,frecuencia2,alimento3,frecuencia3,alimento4,frecuencia4,alimento5,frecuencia5,alimento6,
frecuencia6,alimento7,frecuencia7,alimento8,frecuencia8,alimento9,frecuencia9,vasos_agua,vasos_bebidas,dato1,dato2,dato3,dato4,dato5,
dato6,dato7,dato8,dato9,dato10,dato11,dato12,dato13,dato14,dato15,dato16,dato17,dato18,dato19,dato20,dato21,dato22,dato23,dato24,dato25,
dato26,dato27,dato28,tmr,eta,af,total,hc1,hc2,hc3,prot1,prot2,prot3,lip1,lip2,lip3,medicion1,fecha1,valor1,medicion2,fecha2,valor2,
medicion3,fecha3,valor3,medicion4,fecha4,valor4,medicion5,fecha5,valor5,medicion6,fecha6,valor6,medicion7,fecha7,valor7,medicion8,
fecha8,valor8,medicion9,fecha9,valor9)VALUES('','$user','$fecha','$expediente','$nombre','$edad','$sexo','$fecha_nac','$estado_civil',
'$escolaridad','$direccion','$ocupacion','$telefono','$email','$motivo_consulta','$diagnostico','$enf1','$enf2','$enf3','$enf4','$enf5',
'$enf6','$enf7','$enf8','$enf9','$otro_problema','$padece_enf','$toma_med','$medicamento','$dosis_med','$desde_cuando','$toma1','$toma2',
'$toma3','$toma4','$cirugia','$ant1','$ant2','$ant3','$ant4','$ant5','$ant6','$actividad','$tipo_ej','$frecuencia_ej','$duracion_ej',
'$cuando_inicio','$alcohol','$tabaco','$cafe','$comidasxdia','$entre_comidas','$entresemana1','$entresemana2','$entresemana3','$finsemana1',
'$finsemana2','$finsemana3','$quien_prepara','$apetito','$mas_hambre','$al_preferidos','$al_nogustan','$al_malestar','$alergia','$al_alergia',
'$sup_com','$suplemento','$dosis_sup','$porq_sup','$cambio_com','$consumo_varia','$agrega','$grasa1','$grasa2','$grasa3','$grasa4',
'$otra_grasa','$dieta_esp','$cuantas_dietas','$tipo_dieta','$hace_cuanto','$cuanto_tiempo','$razon','$apego','$obt_resultados','$med_bajar',
'$medic_bajar','$alimento1','$frecuencia1','$alimento2','$frecuencia2','$alimento3','$frecuencia3','$alimento4','$frecuencia4','$alimento5',
'$frecuencia5','$alimento6','$frecuencia6','$alimento7','$frecuencia7','$alimento8','$frecuencia8','$alimento9','$frecuencia9','$vasos_agua',
'$vasos_bebidas','$dato1','$dato2','$dato3','$dato4','$dato5','$dato6','$dato7','$dato8','$dato9','$dato10','$dato11','$dato12','$dato13',
'$dato14','$dato15','$dato16','$dato17','$dato18','$dato19','$dato20','$dato21','$dato22','$dato23','$dato24','$dato25','$dato26','$dato27',
'$dato28','$tmr','$eta','$af','$total','$hc1','$hc2','$hc3','$prot1','$prot2','$prot3','$lip1','$lip2','$lip3','$medicion1','$fecha1',
'$valor1','$medicion2','$fecha2','$valor2','$medicion3','$fecha3','$valor3','$medicion4','$fecha4','$valor4','$medicion5','$fecha5','$valor5',
'$medicion6','$fecha6','$valor6','$medicion7','$fecha7','$valor7','$medicion8','$fecha8','$valor8','$medicion9','$fecha9','$valor9')";

//Ejecutar la query
$ejecutar = mysqli_query($con, $result) or die(mysqli_error() . " ($result)");  
if($user=1){
    header("location: pacientes.php");
}


}







