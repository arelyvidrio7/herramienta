<?php
//Obtenemos los percentiles de peso longitud para niños
$longitud = $_GET['longitud'];
$conn = mysqli_connect("localhost", "root", "", "preescolar");
$resul1 = mysqli_query($conn, "SELECT percentil_1, percentil_3, percentil_5, percentil_15, percentil_25, percentil_50, 
percentil_75, percentil_85, percentil_95, percentil_97, percentil_99 FROM pesolongitud_ninos WHERE longitud = '$longitud' LIMIT 1");

if (mysqli_num_rows($resul1) > 0){ 
    $longitud = mysqli_fetch_object($resul1);
    $longitud->status = 200;
    echo json_encode($longitud);
}else{
    $error = array('status' => 400, );
    echo json_encode((object)$error);
}
?>