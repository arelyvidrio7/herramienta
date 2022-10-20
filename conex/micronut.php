<?php
//Obtenemos los valores correspondientes de los alimentos (Nutrientes)
//Utilizada en elaborar_menu.php y editar_menu.php
$bd_alim = $_GET['bd_alim'];

$alimento1 = $_GET['alim1'];

$opcion1 = $_GET['op1'];
$opcion2 = $_GET['op2'];
$opcion3 = $_GET['op3'];
$opcion4 = $_GET['op4'];
$opcion5 = $_GET['op5'];
$opcion6 = $_GET['op6'];
$color1 = "col_" . $_GET['op1'];
$color2 = "col_" . $_GET['op2'];
$color3 = "col_" . $_GET['op3'];
$color4 = "col_" . $_GET['op4'];
$color5 = "col_" . $_GET['op5'];
$color6 = "col_" . $_GET['op6'];

if($bd_alim == "smae4"){
    $connection = mysqli_connect("localhost", "root", "", "smae");
    $result1 = mysqli_query($connection, "SELECT cantidad, unidad, grupo, $opcion1 opcion1, $opcion2 opcion2, $opcion3 opcion3,
    $opcion4 opcion4, $opcion5 opcion5, $opcion6 opcion6, $color1 col_1, $color2 col_2, $color3 col_3, $color4 col_4, $color5 col_5,
    $color6 col_6 FROM alimentos WHERE alimento = '$alimento1' && referencia = 'smae4' LIMIT 1");
    
    if (mysqli_num_rows($result1) > 0){ 
        $alim1 = mysqli_fetch_object($result1);
        $alim1->status = 200;
        echo json_encode($alim1);
    }else{
        $error = array('status' => 400, );
        echo json_encode((object)$error);
    }
}else if($bd_alim == "smae5"){
    $connection = mysqli_connect("localhost", "root", "", "smae");
    $result1 = mysqli_query($connection, "SELECT cantidad, unidad, grupo, $opcion1 opcion1, $opcion2 opcion2, $opcion3 opcion3,
    $opcion4 opcion4, $opcion5 opcion5, $opcion6 opcion6, $color1 col_1, $color2 col_2, $color3 col_3, $color4 col_4, $color5 col_5,
    $color6 col_6 FROM alimentos WHERE alimento = '$alimento1' && referencia = 'smae5' LIMIT 1");
    
    if (mysqli_num_rows($result1) > 0){ 
        $alim1 = mysqli_fetch_object($result1);
        $alim1->status = 200;
        echo json_encode($alim1);
    }else{
        $error = array('status' => 400, );
        echo json_encode((object)$error);
    }
}

?>