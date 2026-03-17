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
     public function obtenerDatosUsuario($idUsuario){
        $conexion = Conexion::conectar();
        $sql = "SELECT 
                    usuarios.id_usuario AS idUsuario,
                    usuarios.usuario AS nombreUsuario,
                    usuarios.id_rol AS idRol,
                    usuarios.ubicacion AS ubicacion,
                    usuarios.activo AS estatus,
                    usuarios.id_persona AS idpersona,
                    persona.nombre AS nombrepersona,
                    persona.paterno AS paterno,
                    persona.materno AS materno,
                    persona.fecha_nacimiento AS fechaNacimiento,
                    persona.sexo AS sexo,
                    persona.correo AS correo,
                    persona.telefono AS telefono
                FROM t_usuarios AS usuarios
                INNER JOIN t_persona AS persona
                    ON usuarios.id_persona = persona.id_persona
                WHERE usuarios.id_usuario = '$idUsuario'";
        $respuesta = mysqli_query($conexion, $sql);
        $usuario = mysqli_fetch_array($respuesta);
        $datos = array(
            "idUsuario" => $usuario['idUsuario'],
            "nombreUsuario" => $usuario['nombreUsuario'],
            "idRol" => $usuario['idRol'],
            "ubicacion" => $usuario['ubicacion'],
            "estatus" => $usuario['estatus'],
            "idpersona" => $usuario['idpersona'],
            "nombrepersona" => $usuario['nombrepersona'],
            "paterno" => $usuario['paterno'],
            "materno" => $usuario['materno'],
            "fechaNacimiento" => $usuario['fechaNacimiento'],
            "sexo" => $usuario['sexo'],
            "correo" => $usuario['correo'],
            "telefono" => $usuario['telefono']
        );
            return $datos;
    }

    public function actualizarUsuario($datos){

        $conexion = Conexion::conectar();

        $sqlPersona = "UPDATE t_persona SET 
                        paterno = ?, 
                        materno = ?, 
                        nombre = ?, 
                        fecha_nacimiento = ?, 
                        sexo = ?, 
                        telefono = ?, 
                        correo = ?
                    WHERE id_persona = (
                        SELECT id_persona FROM t_usuarios WHERE id_usuario = ?
                    )";

        $query = $conexion->prepare($sqlPersona);

        $query->bind_param(
            "sssssssi",
            $datos['paterno'],
            $datos['materno'],
            $datos['nombre'],
            $datos['fechaNacimiento'],
            $datos['sexo'],
            $datos['telefono'],
            $datos['correo'],
            $datos['idUsuario']
        );

        $respuesta1 = $query->execute();

        $sqlUsuario = "UPDATE t_usuarios SET 
                            usuario = ?, 
                            id_rol = ?, 
                            ubicacion = ?
                        WHERE id_usuario = ?";

        $query = $conexion->prepare($sqlUsuario);

        $query->bind_param(
            "sisi",
            $datos['usuario'],
            $datos['idRol'],
            $datos['ubicacion'],
            $datos['idUsuario']
        );

        $respuesta2 = $query->execute();

        if($respuesta1 && $respuesta2){
            return 1;
        }else{
            return 0;
        }
    }

}
?>