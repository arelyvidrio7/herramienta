<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="assets/general/login.css">
        <title>NutriPAES - Iniciar Sesión</title>
        
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
                <form action="php/login_usuario_db.php" method="POST">
                    <h2>Inicia Sesion</h2>
                    <input type="text" placeholder="&#xf508; Usuario" name="usuario" required/>
                    <input type="password" placeholder="&#xf084; Contraseña" id="contrasena" name="contrasena" class="passw" required/>
                    <img src="assets/imagenes/eye-solid.svg" alt="" class="icon-eye" id="eye">
                    <div style="text-align:center">
                    <a href="php/recordarContra.php">Olvidé mi contraseña</a>
                    </div>
                    <p>¿Aún no tienes una cuenta? </p>
                    <div style="text-align:center">
                    <a href="registro.php">¡Haz clic para Registrarte!</a>
                    </div>
                    <button>Entrar</button>
                </form>
            </div>
        </section>
        
        <script src="assets/js/password.js"></script>
    </body>
</html>