<?php
session_start();

include 'navbar.php';

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="../assets/css_px/menus.css">
        <title>NutriPAES Niño (Menús)</title>
    </head>
    <body>
        <br>
        <br>
        <br>
       <section class="s_menus">
        <div class="tabla_menus">
        <button class="agregar">
        <a href="elab_menu.php" class="ag"><i class="fas fa-plus-circle"></i> Agregar Menú</a>
        </button>

        <input type="hidden" id="usuario" name="usuario" value="<?php if(isset($_SESSION['nombre_usuario'])){
                        echo $_SESSION['nombre_usuario'];
        }?>">
       <table id="menus" name="menus" class="menus" style="margin: 0 auto;">
       <thead>
           <tr>
               <!--<th style="width:100px">Id</th>-->
               <th style="width:200px">Nombre del menú</th>
               <th style="width:300px">Descripción</th>
               <th style="width:200px">Fecha</th>
               <th colspan="2" style="width:200px">Acción</th>
           </tr>
       </thead>
       <tbody>
           <?php 
           $con = mysqli_connect("localhost", "root", "", "registro");

           $usuario = $_SESSION['nombre_usuario'];
           $sentencia = "SELECT * FROM guardar_menus WHERE n_usuario='".$usuario."' ";
           $resultado = mysqli_query($con, $sentencia);
           while ($filas=mysqli_fetch_assoc($resultado)){
           echo "<tr>";
           //echo "<td>"; echo $filas['id']; echo "</td>";
           echo "<td>"; echo $filas['nombre_menu']; echo "</td>";
           echo "<td>"; echo $filas['descripcion']; echo "</td>";
           echo "<td>"; echo $filas['fecha']; echo "</td>";
           echo "<td><a href='convertirPDF.php?id=".$filas['id']."'><button type='button' class='btnPdf'>PDF</button></a> <a href='edit_menu.php?id=".$filas['id']."'><button type='button' class='btnEditar'>Editar</button></a> <a href='eliminar_menu.php?id=".$filas['id']."'.php'><button type='button' class='btnEliminar'>Eliminar</button></a></td>";
           echo "</tr>";

           } 
           ?>
       </tbody>
       </table> 
       </div>
       </section>
    </body>
</html>
