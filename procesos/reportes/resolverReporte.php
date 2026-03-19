<?php
require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$id = $_POST['id'];
$solucion = $_POST['solucion'];

$sql = "UPDATE t_reportes 
SET solucion_problema='$solucion', estatus=1
WHERE id_reporte='$id'";

echo mysqli_query($conexion,$sql);