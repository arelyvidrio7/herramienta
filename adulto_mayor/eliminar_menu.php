<?php
//Eliminando los datos según el id del Menú
EliminarMenu($_GET['id']);

function EliminarMenu($id){
    $con = mysqli_connect("localhost", "root", "", "registro");

    $senten = "DELETE FROM guardar_menus WHERE id='".$id."' ";

    //Ejecutar la query
    $ej = mysqli_query($con, $senten) or die(mysqli_error() . " ($senten)");

    echo header("location: menus.php");
}