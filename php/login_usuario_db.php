<?php
session_start();

//Validacion de usuarios
include 'conexion_db.php';
include 'encrypt.php';

$usuario = $_POST['usuario'];
$contrasena1 = $_POST['contrasena'];
$contrasena=SED::encryption($contrasena1);


//Verificando si el usuario esta activo
$validar_status = mysqli_query($conexion, "SELECT * FROM users WHERE usuario='$usuario' and 
estado_cuenta='Inactivo'");

if(mysqli_num_rows($validar_status) > 0){
     echo '
         <script>
              alert("Su tiempo de uso ha caducado. Por favor, realice su pago para seguir disfrutando del servicio.");
              window.location = "../iniciar_sesion.php";
         </script>
    ';
    exit;
}else{
     
}

//Realizando busqueda en la Base de Datos
$validar_login = mysqli_query($conexion, "SELECT * FROM users WHERE usuario='$usuario' 
and contrasena='$contrasena'");

//Obteniendo todos los datos del usuario
$obteniendo_datos = mysqli_fetch_array($validar_login);
$fecha_termino = $obteniendo_datos['fecha_termino'];
//Cambio de posición valores de fecha_termino
$newDate = date("d/m/Y", strtotime($fecha_termino));

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['nombre_usuario'] = $usuario;
    $_SESSION['fecha'] = $newDate;
    $_SESSION["timeout"] = time(); //Tomamos el tiempo desde el inicio de sesión
    header("location: ../r24.php");
    exit;
}else{
    echo '
         <script>
              alert("El usuario y/o la contraseña son incorrectos");
              window.location = "../iniciar_sesion.php";
         </script>
    ';
    exit;
}

/*
$separar_cadena = $fecha_termino;
$separador = "-";
$cadena_separada = explode($separador, $separar_cadena);
var_dump($cadena_separada);
*/
?>