<?php
session_start();
$_SESSION['nombre_usuario'];
$usuario = $_SESSION['nombre_usuario'];

$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'agenda';

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fullcalendar/main.min.css">
    <link rel="stylesheet" type="text/css" href="../jquery-ui.css">
    <link rel="stylesheet" href="../assets/general/nav.css">

    <title>NutriPAES - Agenda de citas</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="javascript: history.go(-1)">Volver</a></li>
        </ul>
    </nav>
    <div class="container">
        <div id='calendar'></div>
    </div>
    
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <form id="formulario" action="">
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <input type="hidden" id="usuario" name="usuario" value="<?php if(isset($_SESSION['nombre_usuario'])){
                    echo $_SESSION['nombre_usuario'];
                }?>">
                <div class="form-floating mb-3">
                    <input type="text" id="title" name="title" class="form-control">
                    <label for="title" class="form-label">Cita</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime">
                    <label for="start_datetime" class="control-label">Inicio</label>
                </div>

                <div class="form-floating mb-3">
                     <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime">
                     <label for="end_datetime" class="control-label">Fin</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="color" id="color" name="color" class="form-control">
                    <label for="color" class="form-label">Color</label>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
              <button type="submit" id="btnRegistrar" class="btn btn-success">Registrar</button>
            </div>

          </form>
           
        </div>
      </div>
    </div>

    <script type="text/javascript">
      const base_url = '<?php echo base_url;?>';
    </script>
    <?php 
    $schedules = $conn->query("SELECT * FROM citas WHERE usuario = '$usuario'");
    $sched_res = [];
      foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
          $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
          $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
          $sched_res[$row['id']] = $row;
      }
    ?>

    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../fullcalendar/main.min.js"></script>
    <script type="text/javascript" src="../jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../moment.js"></script>
    <script type="text/javascript" src="../sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="../fullcalendar/es.js"></script>
    <script type="text/javascript">
      var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
    <script type="text/javascript" src="../assets/js/evento.js"></script>
</body>
</html>