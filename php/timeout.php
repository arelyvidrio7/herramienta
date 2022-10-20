<?php
// Establecer tiempo de vida de la sesión en segundos
$inactividad = 7200; //7200 = 120 * 60
// Comprobar si $_SESSION["timeout"] está establecida
if(isset($_SESSION["timeout"])){
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if($sessionTTL > $inactividad){
        session_destroy();
        header("Location: ../iniciar_sesion.php");
    }
}
?>