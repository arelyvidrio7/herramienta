<?php
class Home extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->views->getView($this, 'index');
    }

    public function registrar(){
        //print_r($_POST);
        if(empty($_POST['usuario']) || empty($_POST['title']) || empty($_POST['color']) || empty($_POST['start_datetime']) || empty($_POST['end_datetime'])){
            $mensaje = array('msg' => 'Todos los datos son requeridos', 'estado' => false, 'tipo' => 'warning');
        }else{
            $id = $_POST['id'];
            $usuario = $_POST['usuario'];
            $title = $_POST['title'];
            $color = $_POST['color'];
            $start_datetime = $_POST['start_datetime'];
            $end_datetime = $_POST['end_datetime'];

            if($id == ''){
                $respuesta = $this->model->registrar($usuario, $title, $color, $start_datetime, $end_datetime);
                if($respuesta == 1){
                    $mensaje = array('msg' => 'Cita registrada con éxito', 'estado' => true, 'tipo' => 'success'); 
                }else{
                    $mensaje = array('msg' => 'La cita no ha sido registrada', 'estado' => false, 'tipo' => 'error'); 
                }
            }else{
                $respuesta = $this->model->modificar($id, $title, $color, $start_datetime, $end_datetime);
                if($respuesta == 1){
                    $mensaje = array('msg' => 'Cita modificada con éxito', 'estado' => true, 'tipo' => 'success'); 
                }else{
                    $mensaje = array('msg' => 'La cita no pudo ser modificada', 'estado' => false, 'tipo' => 'error'); 
                }
            }

            echo json_encode($mensaje);
            die();
        }
    }

    public function eliminar($id){
        $data = $this->model->eliminar($id);
            if($data == 1){
                $mensaje = array('msg' => 'Tu cita ha sido eliminada', 'estado' => true, 'tipo' => 'success'); 
            }else{
                $mensaje = array('msg' => 'La cita no pudo ser eliminada', 'estado' => false, 'tipo' => 'error'); 
            }

        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function drop(){
        $start_datetime = $_POST['start_datetime'];
        $end_datetime = $_POST['end_datetime'];
        $id = $_POST['id'];

        $data = $this->model->drop($start_datetime, $end_datetime, $id);
            if($data == 1){
                $mensaje = array('msg' => 'Cita modificada con éxito', 'estado' => true, 'tipo' => 'success'); 
            }else{
                $mensaje = array('msg' => 'La cita no pudo ser modificada', 'estado' => false, 'tipo' => 'error'); 
            }

        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    /*
    public function listar($usuario){
        $data = $this->model->listarCitas($usuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    */
    
}

