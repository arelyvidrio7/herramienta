<?php
//Eliminando los datos según el id del paciente
EliminarPaciente($_GET['id']);

function EliminarPaciente($id){
    $con = mysqli_connect("localhost", "root", "", "datos");

    $senten = "DELETE FROM px_adulto WHERE id='".$id."' ";

    //Ejecutar la query
    $ej = mysqli_query($con, $senten) or die(mysqli_error() . " ($senten)");

    echo header("location: pacientes.php");
}