<?php
print_r($_POST);
exit();
?>
<?php
require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$sql = "INSERT INTO t_asignacion 
(id_persona, id_equipo, marca, modelo, color, descripcion, memoria, disco, procesador)
VALUES (
'$_POST[idPersona]',
'$_POST[idEquipo]',
'$_POST[marca]',
'$_POST[modelo]',
'$_POST[color]',
'$_POST[descripcion]',
'$_POST[memoria]',
'$_POST[disco]',
'$_POST[procesador]'
)";

echo mysqli_query($conexion, $sql);
?>