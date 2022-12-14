<?php
session_start();

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

//AddPage(orientacion[PORTRAIT, LANDSCAPE], tama??o[A3, A4, A5, LETTER, LEGAL], rotacion),
//SetFont(tipo[COURIER, HELVETICA, ARIAL, TIMES, ZYMBOL, ZAPDINGBATS], estilo[normal, B, I, U], tama??o),
//Cell(ancho, alto, texto, bordes, salto de l??nea (0 o 1), alineacion, rellenar, link),
//OutPut(destino[I, D, F, S], nombre_archivo, utf8)
require('../fpdf/fpdf.php');

$fpdf = new FPDF();
//Establecemos los m??rgenes izquierda, arriba y derecha:
$fpdf->SetMargins(30, 25, 30);
//Establecemos el margen inferior:
$fpdf->SetAutoPageBreak(true,25);

//P??GINA 1
$fpdf->AddPage();
$fpdf->SetFont('Helvetica', 'B', 20);
$fpdf->Cell(150, 9, utf8_decode('HISTORIA CL??NICA'), 0, 1, 'C');

$fpdf->SetFont('Arial', '', 12);
//Fecha de elaboracion
$fpdf->Cell(85, 7, utf8_decode('Fecha de elaboraci??n: ' . $consulta[2]), 0, 0, '');
//Expediente
$fpdf->Cell(65, 7, 'Expediente: ' . $consulta[3], 0, 1, 'C');

//DATOS PERSONALES
$fpdf->SetFont('Helvetica', '', 14);
$fpdf->SetLineWidth(1);
//Color de L??nea
$fpdf->SetDrawColor(177, 34, 78);
//Color de texto
$fpdf->SetTextColor(94, 33, 41); 
$fpdf->Cell(150, 9, 'DATOS PERSONALES', 'T', 1, 'C');

$fpdf->SetFont('Arial', '', 12);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->SetFillColor(230, 230, 230);
//Nombre del paciente
$fpdf->Cell(90, 6, utf8_decode('Nombre: ' . $consulta[4]), 'T', 0, '', true);
//Sexo
$fpdf->Cell(60, 6, 'Sexo: ' . $consulta[6], 'T', 1, '', true);

//Fecha de nacimiento
$fpdf->Cell(100, 6, utf8_decode('Fecha de nacimiento: ' . $consulta[7]), 0, 0, '', true);
//Edad
$fpdf->Cell(50, 6, utf8_decode('Edad: ' . $consulta[5] . ' a??os'), 0, 1, '', true);

//Estado civil
$fpdf->Cell(75, 6, utf8_decode('Estado civil: ' . $consulta[8]), 0, 0, '', true);
//Escolaridad
$fpdf->Cell(75, 6, utf8_decode('Escolaridad: ' . $consulta[9]), 0, 1, '', true);

//Direcci??n
$fpdf->Cell(150, 6, utf8_decode('Direcci??n: ' . $consulta[10]), 0, 1, '', true);

//Ocupaci??n
$fpdf->Cell(100, 6, utf8_decode('Ocupaci??n: ' . $consulta[11]), 0, 0, '', true);
//Tel??fono
$fpdf->Cell(50, 6, utf8_decode('Tel??fono: ' . $consulta[12]), 0, 1, '', true);

//Email
$fpdf->Cell(150, 6, utf8_decode('Email: ' . $consulta[13]), 0, 1, '', true);

//MOTIVO DE LA CONSULTA
$fpdf->SetFont('Helvetica', '', 14);
//Color de texto
$fpdf->SetTextColor(94, 33, 41); 
$fpdf->Cell(150, 9, 'Motivo de la consulta', 0, 1, 'C');

$fpdf->SetFont('Arial', '', 12);
$fpdf->SetTextColor(0, 0, 0);
$fpdf->MultiCell(150, 6, utf8_decode($consulta[14]), 0, 'J', true);


//DIAGNOSTICO Y OBSERVACIONES
$fpdf->SetFont('Helvetica', '', 14);
//Color de texto
$fpdf->SetTextColor(94, 33, 41);
$fpdf->cell(150, 9, 'Diagnostico y observaciones', 0, 1, 'C');

$fpdf->SetFont('Arial', '', 12);
//Color de texto
$fpdf->SetTextColor(0, 0, 0);
$fpdf->MultiCell(150, 6, utf8_decode($consulta[15]), 0, 'J', true);

$fpdf->Ln(6);
//ANTECEDENTES SALUD/ENFERMEDAD
$fpdf->SetFont('Helvetica', '', 14);
//Color de texto
$fpdf->SetTextColor(94, 33, 41);
$fpdf->Cell(150, 9, 'ANTECEDENTES SALUD / ENFERMEDAD', 'T', 1, 'C');

//PROBLEMAS ACTUALES
$fpdf->SetFont('Arial', 'B', 12);
//Color de texto
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(150, 6, 'Problemas actuales.-', 'T', 1, '', true);

//Asignar palomita a la consulta de enf1 muestra un "Si"
if($consulta[16] == "Si"){
    $check1 = "3"; 
}else {
    $check1 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check1, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(32, 6, "Colitis", 0, 0, '', true);

//Asignar palomita a la consulta de enf2 muestra un "Si"
if($consulta[17] == "Si"){
    $check2 = "3"; 
}else {
    $check2 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check2, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(33, 6, "Dentadura", 0, 0, '', true);

//Asignar palomita a la consulta de enf3 muestra un "Si"
if($consulta[18] == "Si"){
    $check3 = "3"; 
}else {
    $check3 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check3, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(32, 6, "Diarrea", 0, 0, '', true);

//Asignar palomita a la consulta de enf4 muestra un "Si"
if($consulta[19] == "Si"){
    $check4 = "3"; 
}else {
    $check4 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check4, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(33, 6, utf8_decode("Estre??imiento"), 0, 1, '', true);

//2da parte de problemas actuales
$fpdf->Cell(8, 6, "", 0, 0, '', true);
//Asignar palomita a la consulta de enf5 muestra un "Si"
if($consulta[20] == "Si"){
    $check5 = "3"; 
}else {
    $check5 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check5, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(23, 6, "Gastritis", 0, 0, '', true);

//Asignar palomita a la consulta de enf6 muestra un "Si"
if($consulta[21] == "Si"){
    $check6 = "3"; 
}else {
    $check6 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check6, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(23, 6, utf8_decode("N??useas"), 0, 0, '', true);

//Asignar palomita a la consulta de enf7 muestra un "Si"
if($consulta[22] == "Si"){
    $check7 = "3"; 
}else {
    $check7 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check7, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(23, 6, "Pirosis", 0, 0, '', true);

//Asignar palomita a la consulta de enf8 muestra un "Si"
if($consulta[23] == "Si"){
    $check8 = "3"; 
}else {
    $check8 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check8, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(23, 6, utf8_decode("??lcera"), 0, 0, '', true);

//Asignar palomita a la consulta de enf9 muestra un "Si"
if($consulta[24] == "Si"){
    $check9 = "3"; 
}else {
    $check9 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check9, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(25, 6, utf8_decode("V??mito"), 0, 1, '', true);

//Otro problema
$fpdf->Cell(150, 6, "Otro: " . utf8_decode($consulta[25]), 0, 1, '', true);

//Padece alguna enfermedad 
$fpdf->Cell(150, 6, "Padece alguna enfermedad diagnosticada: " . utf8_decode($consulta[26]), 0, 1, '', true);

$fpdf->Cell(52, 6, utf8_decode("Toma alg??n medicamento:"), 0, 0, '', true);

//Asignar espacio con su respectiva respuesta
if($consulta[27] == "Si"){
    $fpdf->Cell(10, 6, "Si", 0, 0, '', true);

}else if($consulta[27] == "No"){
    
    $fpdf->Cell(10, 6, "No", 0, 0, '', true);
}else{

    $fpdf->Cell(10, 6, "", 0, 0, '', true);
}

//Cual medicamento consume
$fpdf->Cell(88, 6, utf8_decode("Cu??l: " . "$consulta[28]"), 0, 1, '', true);

$fpdf->Cell(60, 6, utf8_decode("Dosis: " . "$consulta[29]"), 0, 0, '', true);

$fpdf->Cell(90, 6, utf8_decode("Desde cuando lo consume: " . "$consulta[30]"), 0, 1, '', true);

$fpdf->Cell(18, 6, "Toma: ", 0, 0, '', true);

//Asignar palomita o tachita a la consulta de toma1
if($consulta[31] == "Si"){
    $check11 = "3"; 
}else {
    $check11 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check11, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(28, 6, utf8_decode("Laxantes"), 0, 0, '', true);

//Asignar palomita o tachita a la consulta de toma2
if($consulta[32] == "Si"){
    $check12 = "3"; 
}else {
    $check12 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check12, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(28, 6, utf8_decode("Diur??ticos"), 0, 0, '', true);

//Asignar palomita o tachita a la consulta de toma3
if($consulta[33] == "Si"){
    $check13 = "3"; 
}else {
    $check13 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check13, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(28, 6, utf8_decode("Anti??cidos"), 0, 0, '', true);

//Asignar palomita o tachita a la consulta de toma4
if($consulta[34] == "Si"){
    $check14 = "3"; 
}else {
    $check14 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check14, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(28, 6, utf8_decode("Analg??sicos"), 0, 1, '', true);

//Cirugia
$fpdf->Cell(150, 6, utf8_decode("Le han practicado alguna cirug??a: " . $consulta[35]), 0, 1, '', true);

$fpdf->SetFont('Arial', 'B', 12);
$fpdf->Cell(150, 6, 'Antecedentes familiares.-', 0, 1, '', true);

//Asignar palomita o tachita al ant1
if($consulta[36] == "Si"){
    $check15 = "3"; 
}else {
    $check15 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check15, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(33, 6, "Obesidad", 0, 0, '', true);

//Asignar palomita o tachita al ant2
if($consulta[37] == "Si"){
    $check16 = "3"; 
}else {
    $check16 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check16, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(33, 6, "Diabetes", 0, 0, '', true);

//Asignar palomita o tachita al ant3
if($consulta[38] == "Si"){
    $check17 = "3"; 
}else {
    $check17 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check17, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(32, 6, "HTA", 0, 0, '', true);

//Asignar palomita o tachita al ant4
if($consulta[39] == "Si"){
    $check18 = "3"; 
}else {
    $check18 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check18, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(32, 6, utf8_decode("C??ncer"), 0, 1, '', true);

$fpdf->Cell(20, 6, "", 0, 0, '', true);
//Asignar palomita o tachita al ant5
if($consulta[40] == "Si"){
    $check19 = "3"; 
}else {
    $check19 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check19, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(55, 6, "Hipercolesterolemia", 0, 0, '', true);

//Asignar palomita o tachita al ant6
if($consulta[41] == "Si"){
    $check20 = "3"; 
}else {
    $check20 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check20, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(65, 6, "Hipertrigliceridemia", 0, 1, '', true);

//P??GINA 2
$fpdf->Ln(6);
$fpdf->SetFont('Helvetica', '', 14);
//Color de texto
$fpdf->SetTextColor(94, 33, 41);
$fpdf->Cell(150, 9, 'ESTILO DE VIDA', 'T', 1, 'C');

$fpdf->SetFont('Arial', '', 12);
//Color de texto
$fpdf->SetTextColor(0, 0, 0);
//Actividad
$fpdf->Cell(150, 6, 'Actividad.- ' . $consulta[42], 'T', 1, '', true);

//Tipo de actividad
$fpdf->Cell(70, 6, utf8_decode('Tipo: ' . $consulta[43]), 0, 0, '', true);

//Frecuencia
$fpdf->Cell(80, 6, utf8_decode('Frecuencia: ' . $consulta[44]), 0, 1, '', true);

//Duraci??n
$fpdf->Cell(60, 6, utf8_decode('Duraci??n: ' . $consulta[45]), 0, 0, '', true);

//??Cuando inici???
$fpdf->Cell(90, 6, utf8_decode('??Cuando inici???: ' . $consulta[46]), 0, 1, '', true);

$fpdf->SetFont('Arial', 'B', 12);
$fpdf->Cell(150, 6, 'Consumo de (frecuencia y cantidad).- ', 0, 1, '', true);

$fpdf->SetFont('Arial', '', 12);
//Frecuencia y cantidad
$fpdf->Cell(50, 6, utf8_decode('Alcohol: ' . $consulta[47]), 0, 0, '', true);

$fpdf->Cell(50, 6, utf8_decode('Tabaco: ' . $consulta[48]), 0, 0, '', true);

$fpdf->Cell(50, 6, utf8_decode('Caf??: ' . $consulta[49]), 0, 1, '', true);

$fpdf->Ln(6);
$fpdf->SetFont('Helvetica', '', 14);
//Color de texto
$fpdf->SetTextColor(94, 33, 41);
$fpdf->Cell(150, 9, utf8_decode('INDICADORES DIET??TICOS'), 'T', 1, 'C');

$fpdf->SetFont('Arial', '', 12);
//Color de texto
$fpdf->SetTextColor(0, 0, 0);
$fpdf->Cell(70, 6, utf8_decode('Cu??ntas comidas hace al d??a: ' . $consulta[50]), 'T', 0, '', true);
$fpdf->Cell(80, 6, utf8_decode('Come entre comidas: ' . $consulta[51]), 'T', 1, '', true);

$fpdf->Cell(150, 3, '', '', 1, '', true);

$fpdf->SetFont('Arial', 'B', 12);
$fpdf->SetLineWidth(0.5);
$fpdf->Cell(30, 6, '', 1, 0, '', true);
$fpdf->Cell(40, 6, 'Comidas en casa', 1, 0, 'C', true);
$fpdf->Cell(40, 6, 'Comidas fuera', 1, 0, 'C', true);
$fpdf->Cell(40, 6, 'Horario de comidas', 1, 1, 'C', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(30, 6, 'Entre semana', 1, 0, '', true);
$fpdf->Cell(40, 6, utf8_decode($consulta[52]), 1, 0, 'C', true);
$fpdf->Cell(40, 6, utf8_decode($consulta[53]), 1, 0, 'C', true);
$fpdf->Cell(40, 6, utf8_decode($consulta[54]), 1, 1, 'C', true);

$fpdf->Cell(30, 6, 'Fin de semana', 1, 0, '', true);
$fpdf->Cell(40, 6, utf8_decode($consulta[55]), 1, 0, 'C', true);
$fpdf->Cell(40, 6, utf8_decode($consulta[56]), 1, 0, 'C', true);
$fpdf->Cell(40, 6, utf8_decode($consulta[57]), 1, 1, 'C', true);

$fpdf->Cell(150, 3, '', 'T', 1, '', true);

$fpdf->Cell(105, 6, utf8_decode('Qui??n prepara sus alimentos: ' . $consulta[58]), 0, 0, '', true);
$fpdf->Cell(45, 6, 'Apetito: ' . $consulta[59], 0, 1, '', true);

$fpdf->Cell(150, 6, utf8_decode('A qu?? hora tiene m??s hambre: ' . $consulta[60]), 0, 1, '', true);

//Alimentos preferidos
$fpdf->Cell(150, 6, utf8_decode('Alimentos preferidos: ' . $consulta[61]), 0, 1, '', true);

//Alimentos que no le agradan / no acostumbra:
$fpdf->cell(150, 6, 'Alimentos que no le agradan / no acostumbra: ', 0, 1, '', true);
if($consulta[62] !== ""){
    $fpdf->Cell(150, 6, utf8_decode($consulta[62]), 0, 1, '', true);

}else{

}

//Alimentos que le causan malestar (especificar):
$fpdf->Cell(150, 6, 'Alimentos que le causan malestar (especificar): ', 0, 1, '', true);
if($consulta[63] !== ""){
    $fpdf->Cell(150, 6, utf8_decode($consulta[63]), 0, 1, '', true);

}else{

}

//Es al??rgico o intolerante a alg??n alimento (especificar):
$fpdf->Cell(105, 6, utf8_decode('Es al??rgico o intolerante a alg??n alimento (especificar): '), 0, 0, '', true);
//Asignar espacio con su respectiva respuesta
if($consulta[64] == "Si"){
    $fpdf->Cell(10, 6, "Si", 0, 0, '', true);

}else if($consulta[64] == "No"){
    
    $fpdf->Cell(10, 6, "No", 0, 0, '', true);
}else{

    $fpdf->Cell(10, 6, "", 0, 0, '', true);
}

$fpdf->Cell(35, 6, '', 0, 1, '', true);

if($consulta[65] !== ""){
    $fpdf->Cell(150, 6, utf8_decode($consulta[65]), 0, 1, '', true);

}else{

}

//Toma alg??n suplemento / complemento:
$fpdf->Cell(80, 6, utf8_decode('Toma alg??n suplemento / complemento: '), 0, 0, '', true);
if($consulta[66] == "Si"){
    $fpdf->Cell(10, 6, "Si", 0, 0, '', true);

}else if($consulta[66] == "No"){
    
    $fpdf->Cell(10, 6, "No", 0, 0, '', true);
}else{

    $fpdf->Cell(10, 6, "", 0, 0, '', true);
}

$fpdf->Cell(60, 6, utf8_decode($consulta[67]), 0, 1, '', true);

//Dosis
$fpdf->Cell(60, 6, utf8_decode('Dosis: ' . $consulta[68]), 0, 0, '', true);

//??Por qu???
$fpdf->Cell(90, 6, utf8_decode('??Por qu???: ' . $consulta[69]), 0, 1, '', true);

//Su consumo var??a cuando est?? triste, nervioso o ansioso:
$fpdf->Cell(110, 6, utf8_decode('Su consumo var??a cuando est?? triste, nervioso o ansioso: '), 0, 0, '', true);
if($consulta[70] == "Si"){
    $fpdf->Cell(40, 6, "Si", 0, 1, '', true);

}else if($consulta[70] == "No"){
    
    $fpdf->Cell(40, 6, "No", 0, 1, '', true);
}else{

    $fpdf->Cell(40, 6, "", 0, 1, '', true);
}

//De qu?? manera var??a su consumo
$fpdf->Cell(65, 6, utf8_decode($consulta[71]), 0, 0, '', true);

//Agrega sal a la comida ya preparada:
$fpdf->Cell(72, 6, 'Agrega sal a la comida ya preparada: ', 0, 0, '', true);
if($consulta[72] == "Si"){
    $fpdf->Cell(13, 6, "Si", 0, 1, '', true);

}else if($consulta[72] == "No"){
    
    $fpdf->Cell(13, 6, "No", 0, 1, '', true);
}else{

    $fpdf->Cell(13, 6, "", 0, 1, '', true);
}

//Qu?? grasa utilizan en casa para preparar su comida:
$fpdf->Cell(150, 6, utf8_decode('Qu?? grasa utilizan en casa para preparar su comida: '), 0, 1, '', true);

//Asignar palomita o tachita (GRASAS)
if($consulta[73] == "Si"){
    $check21 = "3"; 
}else {
    $check21 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check21, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(30, 6, 'Margarina', 0, 0, '', true);

//Asignar palomita o tachita (GRASAS)
if($consulta[74] == "Si"){
    $check22 = "3"; 
}else {
    $check22 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check22, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(35, 6, 'Aceite vegetal', 0, 0, '', true);


//Asignar palomita o tachita (GRASAS)
if($consulta[75] == "Si"){
    $check23 = "3"; 
}else {
    $check23 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check23, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(30, 6, 'Manteca', 0, 0, '', true);

//Asignar palomita o tachita (GRASAS)
if($consulta[76] == "Si"){
    $check24 = "3"; 
}else {
    $check24 = "5";
}
$fpdf->SetFont('ZapfDingbats','', 12);
$fpdf->Cell(5, 6, $check24, 0, 0, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(35, 6, 'Mantequilla', 0, 1, '', true);

//Otra grasa
if($consulta[77] !== ""){
    $fpdf->Cell(150, 6, utf8_decode('Otro: ' . $consulta[77]), 0, 1, '', true);

}else{

}

//Ha llevado alguna dieta especial:
$fpdf->Cell(100, 6, utf8_decode('Ha llevado alguna dieta especial: ' . $consulta[78]), 0, 0, '', true);

//Cu??ntas
$fpdf->Cell(50, 6, utf8_decode('Cu??ntas: ' . $consulta[79]), 0, 1, '', true);

//Qu?? tipo de dieta:
$fpdf->Cell(80, 6, utf8_decode('Qu?? tipo de dieta: ' . $consulta[80]), 0, 0, '', true);

//Hace cu??nto:
$fpdf->Cell(70, 6, utf8_decode('Hace cu??nto: ' . $consulta[81]), 0, 1, '', true);

//Por cu??nto tiempo:
$fpdf->Cell(70, 6, utf8_decode('Por cu??nto tiempo: ' . $consulta[82]), 0, 0, '', true);

//Por qu?? raz??n:
$fpdf->Cell(80, 6, utf8_decode('Por qu?? raz??n: ' . $consulta[83]), 0, 1, '', true);

//Qu?? tanto se apeg?? a ella:
$fpdf->Cell(150, 6, utf8_decode('Qu?? tanto se apeg?? a ella: ' . $consulta[84]), 0, 1, '', true);

//Obtuvo los resultados esperados:
$fpdf->Cell(150, 6, utf8_decode('Obtuvo los resultados esperados: ' . $consulta[85]), 0, 1, '', true);

//Ha utilizado medicamentos para bajar de peso:
$fpdf->Cell(90, 6, 'Ha utilizado medicamentos para bajar de peso: ', 0, 0, '', true);
if($consulta[86] == "Si"){
    $fpdf->Cell(10, 6, "Si", 0, 0, '', true);

}else if($consulta[86] == "No"){
    
    $fpdf->Cell(10, 6, "No", 0, 0, '', true);
}else{

    $fpdf->Cell(10, 6, "", 0, 0, '', true);
}

//Cu??les
$fpdf->Cell(50, 6, utf8_decode($consulta[87]), 0, 1, '', true);

$fpdf->Ln(6);
//FRECUENCIA DE CONSUMO DE ALIMENTOS
$fpdf->SetFont('Helvetica', '', 14);
$fpdf->SetLineWidth(1);
//Color de texto
$fpdf->SetTextColor(94, 33, 41); 
$fpdf->Cell(150, 9, 'FRECUENCIA DE CONSUMO DE ALIMENTOS', 'T', 1, 'C');

$fpdf->SetFont('Arial', 'B', 12);
//Color de texto
$fpdf->SetTextColor(0, 0, 0); 
$fpdf->Cell(150, 6, utf8_decode('Lista r??pida de alimentos y bebidas.-'), 'T', 1, '', true);

$fpdf->SetLineWidth(0.5);
$fpdf->Cell(150, 3, '', '', 1, '', true);

$fpdf->Cell(90, 6, 'Alimento o bebida', 1, 0, 'C', true);
$fpdf->Cell(60, 6, 'Frecuencia de consumo', 1, 1, 'C', true);

$fpdf->SetFont('Arial', '', 12);
//Al1
$fpdf->Cell(90, 6, utf8_decode($consulta[88]), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[89]), 1, 1, 'C', true);

//Al2
$fpdf->Cell(90, 6, utf8_decode($consulta[90]), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[91]), 1, 1, 'C', true);

//Al3
$fpdf->Cell(90, 6, utf8_decode($consulta[92]), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[93]), 1, 1, 'C', true);

//Al4
$fpdf->Cell(90, 6, utf8_decode($consulta[94]), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[95]), 1, 1, 'C', true);

//Al5
$fpdf->Cell(90, 6, utf8_decode($consulta[96]), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[97]), 1, 1, 'C', true);

//Al6
$fpdf->Cell(90, 6, utf8_decode($consulta[98]), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[99]), 1, 1, 'C', true);

//Al7
$fpdf->Cell(90, 6, utf8_decode($consulta[100]), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[101]), 1, 1, 'C', true);

//Al8
$fpdf->Cell(90, 6, utf8_decode($consulta[102]), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[103]), 1, 1, 'C', true);

//Al9
$fpdf->Cell(90, 6, utf8_decode($consulta[104]), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[105]), 1, 1, 'C', true);

$fpdf->Cell(150, 3, '', 'T', 1, '', true);

//Vasos de agua natural al d??a:
$fpdf->Cell(150, 6, utf8_decode('Vasos de agua natural al d??a: ' . $consulta[106]), 0, 1, '', true);

//Vasos de bebidas al d??a (leche, jugo, caf??):
$fpdf->Cell(150, 6, utf8_decode('Vasos de bebidas al d??a (leche, jugo, caf??): ' . $consulta[107]), 0, 1, '', true);

$fpdf->Ln(6);

//INDICADORES ANTROPOM??TRICOS
$fpdf->SetFont('Helvetica', '', 14);
$fpdf->SetLineWidth(1);
//Color de texto
$fpdf->SetTextColor(94, 33, 41); 
$fpdf->Cell(150, 9, utf8_decode('INDICADORES ANTROPOM??TRICOS'), 'T', 1, 'C');

$fpdf->Cell(150, 3, '', 'T', 1, '', true);

$fpdf->SetFont('Arial', 'B', 12);
$fpdf->SetLineWidth(0.5);
//Color de texto
$fpdf->SetTextColor(0, 0, 0); 

$fpdf->Cell(90, 6, utf8_decode('MEDICI??N (Unidad)'), 1, 0, 'C', true);
$fpdf->Cell(60, 6, 'DATO', 1, 1, 'C', true);

$fpdf->SetFont('Arial', '', 12);

//MEDICI??N 1
$fpdf->Cell(90, 6, utf8_decode('Peso actual (kg)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[108]), 1, 1, 'C', true);

//MEDICI??N 2
$fpdf->Cell(90, 6, utf8_decode('Peso habitual (kg)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[109]), 1, 1, 'C', true);

//MEDICI??N 3
$fpdf->Cell(90, 6, utf8_decode('Estatura (m)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[110]), 1, 1, 'C', true);

//MEDICI??N 4
$fpdf->Cell(90, 6, utf8_decode('Pliegue cut??neo tricipital (mm)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[111]), 1, 1, 'C', true);

//MEDICI??N 5
$fpdf->Cell(90, 6, utf8_decode('Pliegue cut??neo bicipital (mm)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[112]), 1, 1, 'C', true);

//MEDICI??N 6
$fpdf->Cell(90, 6, utf8_decode('Pliegue cut??neo subescapular (mm)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[113]), 1, 1, 'C', true);

//MEDICI??N 7
$fpdf->Cell(90, 6, utf8_decode('Pliegue cut??neo suprail??aco (mm)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[114]), 1, 1, 'C', true);

//MEDICI??N 8
$fpdf->Cell(90, 6, utf8_decode('Circunferencia de brazo (cm)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[115]), 1, 1, 'C', true);

//MEDICI??N 9
$fpdf->Cell(90, 6, utf8_decode('Circunferencia de cintura (cm)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[116]), 1, 1, 'C', true);

//MEDICI??N 10
$fpdf->Cell(90, 6, utf8_decode('Circunferencia de cadera (cm)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[117]), 1, 1, 'C', true);

//MEDICI??N 11
$fpdf->Cell(90, 6, utf8_decode('Circunferencia abdominal (cm)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[118]), 1, 1, 'C', true);

$fpdf->SetFont('Arial', 'B', 12);

$fpdf->Cell(90, 6, utf8_decode('EVALUACI??N (Unidad)'), 1, 0, 'C', true);
$fpdf->Cell(60, 6, utf8_decode('DATO E INTERPRETACI??N'), 1, 1, 'C', true);

$fpdf->SetFont('Arial', '', 12);

//MEDICI??N 12
$fpdf->Cell(90, 6, utf8_decode('Complexi??n'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[119]), 1, 1, 'C', true);

//MEDICI??N 13
$fpdf->Cell(90, 6, utf8_decode('Peso te??rico (kg)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[120]), 1, 1, 'C', true);

//MEDICI??N 14
$fpdf->Cell(90, 6, utf8_decode('% Peso te??rico'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[121]), 1, 1, 'C', true);

//MEDICI??N 15
$fpdf->Cell(90, 6, utf8_decode('% Peso habitual'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[122]), 1, 1, 'C', true);

//MEDICI??N 16
$fpdf->Cell(90, 6, utf8_decode('??ndice de masa corporal (kg/m??)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[123]), 1, 1, 'C', true);

//MEDICI??N 17
$fpdf->Cell(90, 6, utf8_decode('Peso m??nimo y m??ximo recomendado por IMC (kg)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[124]), 1, 1, 'C', true);

//MEDICI??N 18
$fpdf->Cell(90, 6, utf8_decode('% Grasa corporal'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[125]), 1, 1, 'C', true);

//MEDICI??N 19
$fpdf->Cell(90, 6, utf8_decode('Grasa corporal total (kg)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[126]), 1, 1, 'C', true);

//MEDICI??N 20
$fpdf->Cell(90, 6, utf8_decode('Masa libre de grasa (kg)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[127]), 1, 1, 'C', true);

//MEDICI??N 21
$fpdf->Cell(90, 6, utf8_decode('% Exceso o Deficiencia de grasa corporal'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[128]), 1, 1, 'C', true);

//MEDICI??N 22
$fpdf->Cell(90, 6, utf8_decode('Pliegue cut??neo tricipital + Pliegue cut??neo'), 'TLR', 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[129]), 'TLR', 1, 'C', true);

//MEDICI??N 22 (2da parte)
$fpdf->Cell(90, 6, utf8_decode('subescapular (percentil)'), 'BLR', 0, '', true);
$fpdf->Cell(60, 6, '', 'BLR', 1, 'C', true);

//MEDICI??N 23
$fpdf->Cell(90, 6, utf8_decode('Pliegue cut??neo tricipital (percentil)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[130]), 1, 1, 'C', true);

//MEDICI??N 24
$fpdf->Cell(90, 6, utf8_decode('Pliegue cut??neo subescapular (percentil)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[131]), 1, 1, 'C', true);

//MEDICI??N 25
$fpdf->Cell(90, 6, utf8_decode('??ndice cintura-cadera (cm)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[132]), 1, 1, 'C', true);

//MEDICI??N 26
$fpdf->Cell(90, 6, utf8_decode('??rea muscular de brazo (cm??)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[133]), 1, 1, 'C', true);

//MEDICI??N 27
$fpdf->Cell(90, 6, utf8_decode('Masa muscular total (kg)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[134]), 1, 1, 'C', true);

//MEDICI??N 28
$fpdf->Cell(90, 6, utf8_decode('Agua corporal total (lt)'), 1, 0, '', true);
$fpdf->Cell(60, 6, utf8_decode($consulta[135]), 1, 1, 'C', true);

$fpdf->Cell(150, 3, '', 'T', 1, '', true);

$fpdf->Ln(6);
//INTERPRETACI??N DE DATOS
$fpdf->SetFont('Helvetica', '', 14);
$fpdf->SetLineWidth(1);
//Color de texto
$fpdf->SetTextColor(94, 33, 41); 
$fpdf->Cell(150, 9, utf8_decode('INTERPRETACI??N DE DATOS'), 'T', 1, 'C');

$fpdf->SetFont('Arial', 'B', 12);
//Color de texto
$fpdf->SetTextColor(0, 0, 0); 
$fpdf->Cell(150, 6, utf8_decode('Necesidades energ??ticas y nutrimentales.-'), 'T', 1, '', true);

$fpdf->SetFont('Arial', '', 12);
$fpdf->Cell(150, 6, 'a) Para el peso actual.', 0, 1, '', true);

//GET
$fpdf->Cell(20, 6, 'GET =', 0, 0, '', true);

$fpdf->Cell(35, 6, 'TMR (' . $consulta[136] . ')', 0, 0, '', true);
$fpdf->Cell(30, 6, 'ETA (' . $consulta[137] . ')', 0, 0, '', true);
$fpdf->Cell(30, 6, 'AF (' . $consulta[138] . ')', 0, 0, '', true);
$fpdf->Cell(35, 6, 'TOTAL (' . $consulta[139] . ')', 0, 1, '', true);

$fpdf->Cell(150, 3, '', '', 1, '', true);

$fpdf->SetFont('Arial', 'B', 12);
$fpdf->SetLineWidth(0.5);

$fpdf->Cell(40, 6, 'Nutrimento', 1, 0, 'C', true);
$fpdf->Cell(35, 6, 'Gramos', 1, 0, 'C', true);
$fpdf->Cell(40, 6, 'Kilocalorias', 1, 0, 'C', true);
$fpdf->Cell(35, 6, '% del GET', 1, 1, 'C', true);

$fpdf->SetFont('Arial', '', 12);

$fpdf->Cell(40, 6, 'Hidratos de carbono', 1, 0, '', true);
$fpdf->Cell(35, 6, $consulta[140], 1, 0, 'C', true);
$fpdf->Cell(40, 6, $consulta[141], 1, 0, 'C', true);
$fpdf->Cell(35, 6, $consulta[142], 1, 1, 'C', true);

$fpdf->Cell(40, 6, utf8_decode('Prote??nas'), 1, 0, '', true);
$fpdf->Cell(35, 6, $consulta[143], 1, 0, 'C', true);
$fpdf->Cell(40, 6, $consulta[144], 1, 0, 'C', true);
$fpdf->Cell(35, 6, $consulta[145], 1, 1, 'C', true);

$fpdf->Cell(40, 6, utf8_decode('L??pidos'), 1, 0, '', true);
$fpdf->Cell(35, 6, $consulta[146], 1, 0, 'C', true);
$fpdf->Cell(40, 6, $consulta[147], 1, 0, 'C', true);
$fpdf->Cell(35, 6, $consulta[148], 1, 1, 'C', true);

$fpdf->Cell(150, 3, '', 'T', 1, '', true);

$fpdf->Ln(6);
//INDICADORES BIOQU??MICOS
$fpdf->SetFont('Helvetica', '', 14);
$fpdf->SetLineWidth(1);
//Color de texto
$fpdf->SetTextColor(94, 33, 41); 
$fpdf->Cell(150, 9, utf8_decode('INDICADORES BIOQU??MICOS'), 'T', 1, 'C');

$fpdf->SetFont('Arial', 'B', 12);
//Color de texto
$fpdf->SetTextColor(0, 0, 0); 

$fpdf->Cell(150, 3, '', 'T', 1, '', true);

$fpdf->SetLineWidth(0.5);
$fpdf->Cell(50, 6, utf8_decode("Medici??n de"), 1, 0, 'C', true);
$fpdf->Cell(50, 6, 'Fecha', 1, 0, 'C', true);
$fpdf->Cell(50, 6, 'Valor', 1, 1, 'C', true);

$fpdf->SetFont('Arial', '', 12);

//ANALISIS 1
$fpdf->Cell(50, 6, utf8_decode($consulta[149]), 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[150], 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[151], 1, 1, 'C', true);

//ANALISIS 2
$fpdf->Cell(50, 6, utf8_decode($consulta[152]), 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[153], 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[154], 1, 1, 'C', true);

//ANALISIS 3
$fpdf->Cell(50, 6, utf8_decode($consulta[155]), 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[156], 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[157], 1, 1, 'C', true);

//ANALISIS 4
$fpdf->Cell(50, 6, utf8_decode($consulta[158]), 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[159], 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[160], 1, 1, 'C', true);

//ANALISIS 5
$fpdf->Cell(50, 6, utf8_decode($consulta[161]), 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[162], 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[163], 1, 1, 'C', true);

//ANALISIS 6
$fpdf->Cell(50, 6, utf8_decode($consulta[164]), 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[165], 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[166], 1, 1, 'C', true);

//ANALISIS 7
$fpdf->Cell(50, 6, utf8_decode($consulta[167]), 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[168], 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[169], 1, 1, 'C', true);

//ANALISIS 8
$fpdf->Cell(50, 6, utf8_decode($consulta[170]), 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[171], 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[172], 1, 1, 'C', true);

//ANALISIS 9
$fpdf->Cell(50, 6, utf8_decode($consulta[173]), 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[174], 1, 0, 'C', true);
$fpdf->Cell(50, 6, $consulta[175], 1, 1, 'C', true);

$fpdf->OutPut('I', 'Historia Cl??nica.pdf', true);
?>