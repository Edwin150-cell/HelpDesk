<?php

require_once "../../../clases/Conexion.php";

$con = new Conexion();
$conexion = $con->conectar();


$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$nombre = $_POST['nombre'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$sexo = $_POST['sexo'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$idRol = $_POST['idRol'];
$ubicacion = $_POST['ubicacion'];


$sqlPersona = "INSERT INTO t_persona
                (paterno, materno, nombre, fecha_nacimiento, sexo, telefono, correo)
                VALUES
                ('$paterno','$materno','$nombre','$fechaNacimiento','$sexo','$telefono','$correo')";

$resultPersona = mysqli_query($conexion, $sqlPersona);

if(!$resultPersona){
    echo mysqli_error($conexion);
    exit();
}

$idPersona = mysqli_insert_id($conexion);



$sqlUsuario = "INSERT INTO t_usuarios
                (id_rol,id_persona,usuario,password,ubicacion,fecha_insert,activo)
                VALUES
                ('$idRol','$idPersona','$usuario','$password','$ubicacion',NOW(),1)";

$resultUsuario = mysqli_query($conexion, $sqlUsuario);

if($resultUsuario){
    echo 1;
}else{
    echo mysqli_error($conexion);
}

?>