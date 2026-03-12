<?php
    class Conexion {
        public function conectar(){
            $servidor = "localhost";
            $usuario = "edwin";
            $password = "edwin151205";
            $db = "helpdesk";
            $conexion = mysqli_connect($servidor, $usuario, $password, $db);
            return $conexion;
        }
    }
?>