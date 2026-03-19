<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reportes.xls");

require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$sql = "SELECT * FROM t_reportes";
$result = mysqli_query($conexion,$sql);

echo "ID\tFecha\tDescripcion\n";

while($ver = mysqli_fetch_array($result)){
    echo $ver['id_reporte']."\t".$ver['fecha']."\t".$ver['descripcion_problema']."\n";
}