<?php
require_once "../../../clases/Usuarios.php";

$Usuarios = new Usuarios();

$datos = array(
    "idUsuario" => $_POST['idUsuariou'],
    "paterno" => $_POST['paterno'],
    "materno" => $_POST['materno'],
    "nombre" => $_POST['nombre'],
    "fechaNacimiento" => $_POST['fechaNacimiento'],
    "sexo" => $_POST['sexo'],
    "telefono" => $_POST['telefono'],
    "correo" => $_POST['correo'],
    "idRol" => $_POST['idRol'],
    "usuario" => $_POST['usuario'],
    "ubicacion" => $_POST['ubicacion']
);

echo $Usuarios->actualizarUsuario($datos);