<?php
    //Conexion para la lista de alimentos del smae 5ta Edición
    //Utilizada en elaborar_menu.php y editar_menu.php
    $connection = mysqli_connect("localhost", "root", "", "smae");
    $result1 = mysqli_query($connection, "SELECT * FROM alimentos WHERE referencia = 'smae5'");
    $array2 = array();

    if($result1){
        while ($row = mysqli_fetch_array($result1)){
            $alim1 = $row['alimento'];
            array_push($array2, $alim1); //alimentos
        }
    }
?>