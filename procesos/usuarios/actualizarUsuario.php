<?php
require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$idPersona = $_POST['idPersona'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$sql = "UPDATE t_persona SET 
nombre='$nombre',
paterno='$paterno',
materno='$materno',
telefono='$telefono',
correo='$correo'
WHERE id_persona = '$idPersona'";

echo mysqli_query($conexion,$sql);