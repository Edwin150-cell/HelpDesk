<?php
include "Conexion.php";

class Usuarios extends Conexion {

    public function agregarNuevoUsuario($datos){

        $conexion = Conexion::conectar();

        $sqlPersona = "INSERT INTO t_persona
        (paterno, materno, nombre, fecha_nacimiento, sexo, telefono, correo)
        VALUES (?,?,?,?,?,?,?)";

        $query = $conexion->prepare($sqlPersona);

        $query->bind_param(
            "sssssss",
            $datos['paterno'],
            $datos['materno'],
            $datos['nombre'],
            $datos['fechaNacimiento'],
            $datos['sexo'],
            $datos['telefono'],
            $datos['correo']
        );

        $respuesta = $query->execute();

        $idPersona = mysqli_insert_id($conexion);

        if($idPersona > 0){

            $sqlUsuario = "INSERT INTO t_usuarios
            (id_rol,id_persona,usuario,password,ubicacion)
            VALUES (?,?,?,?,?)";

            $query = $conexion->prepare($sqlUsuario);

            $query->bind_param(
                "iisss",
                $datos['idRol'],
                $idPersona,
                $datos['usuario'],
                $datos['password'],
                $datos['ubicacion']
            );

            return $query->execute();

        }else{
            return 0;
        }

    }

    public function loginUsuario($usuario, $password){

        $conexion = Conexion::conectar();

        $sql = "SELECT 
                    id_usuario,
                    usuario,
                    id_rol
                FROM t_usuarios
                WHERE usuario = '$usuario'
                AND password = '$password'";

        $respuesta = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($respuesta) > 0){

            $datos = mysqli_fetch_assoc($respuesta);

            $_SESSION['usuario'] = array(
                "id" => $datos['id_usuario'],
                "usuario" => $datos['usuario'],
                "rol" => $datos['id_rol']
            );

            return 1;

        }else{
            return 0;
        }

    }

}
?>