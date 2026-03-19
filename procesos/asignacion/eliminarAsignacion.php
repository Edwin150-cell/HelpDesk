<?php
require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$idAsignacion = $_POST['idAsignacion'];

$sql = "DELETE FROM t_asignacion WHERE id_asignacion = '$idAsignacion'";

echo mysqli_query($conexion, $sql);
?>