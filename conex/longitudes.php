<?php
//Conexion para la lista de longitudes para niños
//Utilizada en formulas.php
$conn = mysqli_connect("localhost", "root", "", "preescolar");
$resul1 = mysqli_query($conn, "SELECT * FROM pesolongitud_ninas");
$arr1 = array();

if($resul1){
    while ($row = mysqli_fetch_array($resul1)){
        $longitud = $row['longitud'];
        array_push($arr1, $longitud); //Longitud
    }
}
?>