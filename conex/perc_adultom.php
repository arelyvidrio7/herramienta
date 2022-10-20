<?php
//Obtenemos los valores correspondientes de los percentiles Adulto Mayor (Mujeres)
$grupo = $_GET['grupo1'];
$conex = mysqli_connect("localhost", "root", "", "percentiles");
$resultado1 = mysqli_query($conex, "SELECT p1_5, p1_10, p1_25, p1_50, p1_75, p1_90, p1_95, p2_5, p2_10, p2_25, p2_50, p2_75, p2_90, p2_95,
p3_5, p3_10, p3_25, p3_50, p3_75, p3_90, p3_95, p4_5, p4_10, p4_25, p4_50, p4_75, p4_90, p4_95, p5_5, p5_10, p5_25, p5_50, p5_75, p5_90, p5_95,
p6_5, p6_10, p6_25, p6_50, p6_75, p6_90, p6_95 FROM adultom_mujer WHERE grupo = '$grupo' LIMIT 1");

if (mysqli_num_rows($resultado1) > 0){ 
    $grupo1 = mysqli_fetch_object($resultado1);
    $grupo1->status = 200;
    echo json_encode($grupo1);
}else{
    $error = array('status' => 400, );
    echo json_encode((object)$error);
}
?>