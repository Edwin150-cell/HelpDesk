<?php
require_once "../../clases/Conexion.php";
session_start();

$obj = new Conexion();
$conexion = $obj->conectar();

$idUsuario = $_SESSION['usuario']['id'];
$idEquipo = $_POST['idEquipo'];
$descripcion = $_POST['descripcion'];

$sql = "INSERT INTO t_reportes (id_usuario, id_equipo, descripcion_problema)
VALUES ('$idUsuario','$idEquipo','$descripcion')";

echo mysqli_query($conexion,$sql);