<?php
require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$idAsignacion = $_POST['idAsignacion'];

$sql = "SELECT * FROM t_asignacion WHERE id_asignacion = '$idAsignacion'";
$result = mysqli_query($conexion, $sql);

$ver = mysqli_fetch_row($result);

$datos = $ver[0]."||".
         $ver[1]."||".
         $ver[2]."||".
         $ver[3]."||".
         $ver[4]."||".
         $ver[5]."||".
         $ver[6]."||".
         $ver[7]."||".
         $ver[8]."||".
         $ver[9];

echo $datos;
?>