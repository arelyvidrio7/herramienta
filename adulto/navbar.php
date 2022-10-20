<?php 
$_SESSION['nombre_usuario'];
$usuario = $_SESSION['nombre_usuario'] || '';

if($usuario == null || $usuario = ''){
    session_destroy();
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/336ceace9e.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Nutri-PAES</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg> <?php if(isset($_SESSION['nombre_usuario'])){
                    echo $_SESSION['nombre_usuario'];
                }?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Fecha de renovación: 
                  <br>
                  <?php echo $_SESSION['fecha'];?></a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="../php/cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Extras
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="../historiac/pacientes.php">Registro de pacientes</a></li>
                  <li><a class="dropdown-item" href="../calendario/">Agenda de citas</a></li>
                  <li><a class="dropdown-item" href="../r24.php">Recordatorio 24 hrs</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Niño
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="../preescolar/analisis_clinicos.php">Análisis clínicos</a></li>
                  <li><a class="dropdown-item" href="../preescolar/formulas.php">Fórmulas</a></li>
                  <li><a class="dropdown-item" href="../preescolar/menus.php">Menús</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Adulto
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="analisis_clinicos.php">Análisis clínicos</a></li>
                  <li><a class="dropdown-item" href="formulas.php">Fórmulas</a></li>
                  <li><a class="dropdown-item" href="menus.php">Menús</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Adulto Mayor
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="../adulto_mayor/analisis_clinicos.php">Análisis clínicos</a></li>
                  <li><a class="dropdown-item" href="../adulto_mayor/formulas.php">Fórmulas</a></li>
                  <li><a class="dropdown-item" href="../adulto_mayor/menus.php">Menús</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Embarazo
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="../embarazada/analisis_clinicos.php">Análisis clínicos</a></li>
                  <li><a class="dropdown-item" href="../embarazada/formulas.php">Fórmulas</a></li>
                  <li><a class="dropdown-item" href="../embarazada/menus.php">Menús</a></li>
                </ul>
              </li>
            </ul>

          </div>
        </div>
      </nav>
    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>