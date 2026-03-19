<?php
require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$id = $_POST['id'];
$desc = $_POST['descripcion'];

$sql = "UPDATE t_reportes 
SET descripcion_problema='$desc'
WHERE id_reporte='$id'";

echo mysqli_query($conexion,$sql);