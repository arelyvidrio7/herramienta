<?php
//Obtenemos los valores correspondientes de los percentiles (Niños)
$anos_meses = $_GET['edad1'];
$conex = mysqli_connect("localhost", "root", "", "preescolar");
$resultado1 = mysqli_query($conex, "SELECT p1_1, p1_3, p1_5, p1_15, p1_25, p1_50, p1_75, p1_85, p1_95, p1_97, p1_99, p2_1, p2_3, p2_5, 
p2_15, p2_25, p2_50, p2_75, p2_85, p2_95, p2_97, p2_99, p3_1, p3_3, p3_5, p3_15, p3_25, p3_50, p3_75, p3_85, p3_95, p3_97, p3_99,
p4_1, p4_3, p4_5, p4_15, p4_25, p4_50, p4_75, p4_85, p4_95, p4_97, p4_99, p5_1, p5_3, p5_5, p5_15, p5_25, p5_50, p5_75, p5_85, p5_95,
p5_97, p5_99 FROM percentiles_ninos WHERE anos_meses = '$anos_meses' LIMIT 1");

if (mysqli_num_rows($resultado1) > 0){ 
    $edad1 = mysqli_fetch_object($resultado1);
    $edad1->status = 200;
    echo json_encode($edad1);
}else{
    $error = array('status' => 400, );
    echo json_encode((object)$error);
}
?>