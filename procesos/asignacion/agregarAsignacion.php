<?php
require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();


$idPersona = $_POST['idPersona'] ?? '';
$idEquipo = $_POST['idEquipo'] ?? '';
$marca = $_POST['marca'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$color = $_POST['color'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$memoria = $_POST['memoria'] ?? '';
$disco = $_POST['disco'] ?? '';
$procesador = $_POST['procesador'] ?? '';

$idPersona = $conexion->real_escape_string($idPersona);
$idEquipo = $conexion->real_escape_string($idEquipo);
$marca = $conexion->real_escape_string($marca);
$modelo = $conexion->real_escape_string($modelo);
$color = $conexion->real_escape_string($color);
$descripcion = $conexion->real_escape_string($descripcion);
$memoria = $conexion->real_escape_string($memoria);
$disco = $conexion->real_escape_string($disco);
$procesador = $conexion->real_escape_string($procesador);

$sql = "INSERT INTO t_asignacion 
(id_persona, id_equipo, marca, modelo, color, descripcion, memoria, disco, procesador)
VALUES 
('$idPersona','$idEquipo','$marca','$modelo','$color','$descripcion','$memoria','$disco','$procesador')";

echo mysqli_query($conexion, $sql);
?>