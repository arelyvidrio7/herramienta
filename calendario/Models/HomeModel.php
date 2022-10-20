<?php
class HomeModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($usuario, $title, $color, $start_datetime, $end_datetime){
        $sql = "INSERT INTO citas (usuario, title, color, start_datetime, end_datetime) VALUES (?,?,?,?,?)";
        $array = array($usuario, $title, $color, $start_datetime, $end_datetime);
        $data = $this->save($sql, $array);

        if($data == 1){
            $msg = 1;
        }else{
            $msg = 0;
        }
        return $msg;
    }

    public function modificar($id, $title, $color, $start_datetime, $end_datetime){
        $sql = "UPDATE citas SET title = ?, color = ?, start_datetime = ?, end_datetime = ? WHERE id = ?";
        $array = array($title, $color, $start_datetime, $end_datetime, $id);
        $data = $this->save($sql, $array);

        if($data == 1){
            $msg = 1;
        }else{
            $msg = 0;
        }
        return $msg;
    }

    public function eliminar($id){
        $sql = "DELETE FROM citas WHERE id = ?";
        $array = array($id);
        $data = $this->save($sql, $array);

        if($data == 1){
            $msg = 1;
        }else{
            $msg = 0;
        }
        return $msg;
    }

    public function drop($start_datetime, $end_datetime, $id){
        $sql = "UPDATE citas SET start_datetime = ?, end_datetime = ? WHERE id = ?";
        $array = array($start_datetime, $end_datetime, $id);
        $data = $this->save($sql, $array);

        if($data == 1){
            $msg = 1;
        }else{
            $msg = 0;
        }
        return $msg;
    }

    /*
    public function listarCitas($usuario){
        $sql = "SELECT id, title, color, start_datetime, end_datetime FROM citas WHERE usuario = '$usuario'";
        return $this->selectAll($sql);
    }
    */
    

}

?>