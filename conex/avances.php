<?php 
    //Conexión a datos guardados de historia clinica
    class Conexion{
        public static function Conectar(){
            define('servidor', 'localhost');
            define('nombre_bd', 'datos');
            define('usuario', 'root');
            define('contrasena', '');
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            try{
                $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, contrasena, $opciones);
                return $conexion;
            }catch(Exception $e){
                die("El error de conexión es: ". $e ->getMessage());
            }
        }
    }
    
?>