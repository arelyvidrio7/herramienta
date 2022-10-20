<?php
session_start();
$_SESSION['nombre_usuario'];

include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="../assets/historiaC/pacientes.css">
        <title>NUTRIPAES - Adulto (Pacientes)</title>

        <script src="https://kit.fontawesome.com/336ceace9e.js" crossorigin="anonymous"></script>
        <style type="text/css">
        button[type=button] {
                font-family: FontAwesome, 'Open Sans', sans-serif;
        }
        </style>
    </head>
    <body>
       <br><br><br>
       <section class="s_menus">
        <div class="tabla_menus">
        <button class="agregar">
        <a href="historia_c.php" class="ag"><i class="fas fa-plus-circle"></i> Agregar paciente</a>
        </button>
        
        <input type="hidden" id="usuario" name="usuario" value="<?php if(isset($_SESSION['nombre_usuario'])){
                        echo $_SESSION['nombre_usuario'];
        }?>">
       <table id="menus" name="menus" class="menus" style="margin: 0 auto;">
       <thead>
           <tr>
               <th style="width:150px">Expediente</th>
               <th style="width:300px">Nombre del paciente</th>
               <th style="width:200px">Fecha</th>
               <th colspan="2" style="width:200px">Acción</th>
           </tr>
       </thead>
       <tbody>
           <?php 
           $con = mysqli_connect("localhost", "root", "", "datos");

           $usuario = $_SESSION['nombre_usuario'];
           $sentencia = "SELECT * FROM px_adulto WHERE nombre_usuario='".$usuario."' ";
           $resultado = mysqli_query($con, $sentencia);
           while ($filas=mysqli_fetch_assoc($resultado)){
           echo "<tr>";
           echo "<td>"; echo $filas['expediente']; echo "</td>";
           echo "<td>"; echo $filas['nombre']; echo "</td>";
           echo "<td>"; echo $filas['fecha']; echo "</td>";
           echo "<td>
           <a href='pdf_hc.php?id=".$filas['id']."'><button type='button' class='btnPdf'><i class='fa-solid fa-file-pdf'></i></button></a> 
           <a href='modificar_historia.php?id=".$filas['id']."'><button type='button' class='btnEditar'><i class='fa-solid fa-highlighter'></i></button></a> 
           <a href='eliminar_paciente.php?id=".$filas['id']."'.php'><button type='button' class='btnEliminar'>&#xf2ed;</button></a>
           <a href='avances.php?nombre=".$filas['nombre']."'.php'><button type='button' class='btnPdf'><i class='fas fa-chart-bar'></i></button></a>
           </td>";
           echo "</tr>";
           } 
           ?>
       </tbody>
       </table> 
       </div>
       </section>
    </body>
</html>
