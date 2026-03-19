<?php
require_once "Conexion.php";

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
                    id_rol,
                    id_persona
                FROM t_usuarios
                WHERE usuario = ?
                AND password = ?";

        $query = $conexion->prepare($sql);
        $query->bind_param("ss", $usuario, $password);
        $query->execute();

        $resultado = $query->get_result();

        if($resultado->num_rows > 0){

            $datos = $resultado->fetch_assoc();

            $_SESSION['usuario'] = array(
                "id" => $datos['id_usuario'],
                "usuario" => $datos['usuario'],
                "rol" => $datos['id_rol'],
                "id_persona" => $datos['id_persona']
            );

            return 1;

        }else{
            return 0;
        }
    }

    public function obtenerDatosUsuario($idUsuario){

        $conexion = Conexion::conectar();

        $sql = "SELECT 
                    u.id_usuario AS idUsuario,
                    u.usuario AS nombreUsuario,
                    u.id_rol AS idRol,
                    u.ubicacion AS ubicacion,
                    u.activo AS estatus,
                    u.id_persona AS idpersona,
                    p.nombre AS nombrepersona,
                    p.paterno AS paterno,
                    p.materno AS materno,
                    p.fecha_nacimiento AS fechaNacimiento,
                    p.sexo AS sexo,
                    p.correo AS correo,
                    p.telefono AS telefono
                FROM t_usuarios u
                INNER JOIN t_persona p 
                    ON u.id_persona = p.id_persona
                WHERE u.id_usuario = ?";

        $query = $conexion->prepare($sql);
        $query->bind_param("i", $idUsuario);
        $query->execute();

        $resultado = $query->get_result();
        $usuario = $resultado->fetch_assoc();

        return $usuario;
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