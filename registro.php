<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="assets/general/registro.css">
        <title>NutriPAES - Registro</title>
        
        <script src="https://kit.fontawesome.com/336ceace9e.js" crossorigin="anonymous"></script>
        <style>
            .login_registro input{
                font-family: FontAwesome, 'Open Sans', sans-serif;
            }
        </style>
    </head>
    <body> 
        <header>
            <div class="contenedor">
                <h1><i class="fas fa-heartbeat"></i> Nutri-PAES</h1>
                <a href="#"><i class="fas fa-user-friends"> Iniciar Sesión</i></a>
            </div>
        </header>

        <section id="login_registro">
            <div class="login_registro">
                <form action="php/registro_usuario_db.php" method="POST">
                    <h2>Registrate</h2>

                    <input type="text" placeholder="&#xf13e; Clave" name="clave" required/>
                    <input type="text" placeholder="&#xf47f; Nombre Completo" name="nombre_completo" required/>
                    <input type="text" placeholder="&#xf0e0; Correo Electronico" name="correo" required/>
                    <input type="text" placeholder="&#xf508; Usuario" name="usuario" required/>
                    <input type="password" placeholder="&#xf084; Contraseña" id="contrasena" name="contrasena" required/>
                    <img src="assets/imagenes/eye-solid.svg" alt="" class="icon-eye" id="eye">
                    <p>¿Ya tienes una cuenta? </p>
                    <div style="text-align:center">
                    <a href="iniciar_sesion.php">¡Haz clic para Iniciar Sesión!</a>
                    </div>
                    <button>Registrarse</button>

                </form>
            </div>
        </section>
        
        <script src="assets/js/password.js"></script>
    </body>
</html>