<?php
require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$id = $_POST['id'];

$sql = "DELETE FROM t_reportes WHERE id_reporte='$id'";
echo mysqli_query($conexion,$sql);