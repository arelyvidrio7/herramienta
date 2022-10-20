<?php
include 'conexion_db.php';
include 'encrypt.php';

//Almacenamiento de Datos
$clave = $_POST['clave'];
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena1 = $_POST['contrasena'];
//Contraseña encriptada
$contrasena=SED::encryption($contrasena1);

$estado_cuenta = "Activo";

//Almacenar los datos en la TABLA
if($clave == "nutripaes123"){
    $query = "INSERT INTO users(id, nombre_completo, correo, usuario, contrasena, fecha_pago, fecha_termino, estado_cuenta)
          VALUES('', '$nombre_completo', '$correo', '$usuario', '$contrasena', '', '', '$estado_cuenta')";
}

//Verificar que el correo no se repita en la Base de Datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM users WHERE correo='$correo' ");

if(mysqli_num_rows($verificar_correo) > 0){
    echo '
        <script>
             alert("Este correo ya esta registrado: Intenta iniciar Sesión.");
             window.location = "../registro.php";
        </script>
    ';
    exit();
}

//Verificar que el usuario no se repita en la Base de Datos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM users WHERE usuario='$usuario' ");

if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
        <script>
             alert("Este usuario ya esta registrado, intenta con otro diferente.");
             window.location = "../registro.php";
        </script>
    ';
    exit();
}

//Ejecutar la query
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo'
    <script>
         alert("¡Usuario almacenado exitosamente! Ya puedes Iniciar Sesión");
         window.location = "../iniciar_sesion.php";
    </script>
    ';
}else{
    echo'
    <script>
         alert("Intentalo de nuevo, usuario no almacenado");
         window.location = "../registro.php";
    </script>
    ';
}

mysqli_close($conexion);

?>