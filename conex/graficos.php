<?php
    //Recolectamos datos para gráficos de historiac/avances.php
    session_start();
    
    header('Content-type: application/json');
    include_once 'avances.php';

    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $nombre_usuario = $_SESSION['nombre_usuario'];
    $nombre_px = $_SESSION['nombre_px'];

    $valor = $_GET['valor'];

    $result = array();

    $consulta = "SELECT fecha, dato1, dato3, dato9, dato10, dato16, dato18, dato25 FROM px_adulto WHERE nombre_usuario = '$nombre_usuario' && nombre = '$nombre_px' 
    ORDER BY fecha";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();

    if($valor == "peso"){
        while($seccion1 = $resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($result, array($seccion1["fecha"], $seccion1["dato1"]));
        }
    }else if($valor == "estatura"){
        while($seccion1 = $resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($result, array($seccion1["fecha"], $seccion1["dato3"]));
        }
    }else if($valor == "imc"){
        while($seccion1 = $resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($result, array($seccion1["fecha"], $seccion1["dato16"]));
        }
    }else if($valor == "grasa"){
        while($seccion1 = $resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($result, array($seccion1["fecha"], $seccion1["dato18"]));
        }
    }else if($valor == "icc"){
        while($seccion1 = $resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($result, array($seccion1["fecha"], $seccion1["dato25"]));
        }
    }else if($valor == "cintura"){
        while($seccion1 = $resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($result, array($seccion1["fecha"], $seccion1["dato9"]));
        }
    }else if($valor == "cadera"){
        while($seccion1 = $resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($result, array($seccion1["fecha"], $seccion1["dato10"]));
        }
    }

    print json_encode($result, JSON_NUMERIC_CHECK);
?>