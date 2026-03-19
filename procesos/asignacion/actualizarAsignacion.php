<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

// Validar datos
$idAsignacion = $_POST['idAsignacion'] ?? '';
$idPersona = $_POST['idPersona'] ?? '';
$idEquipo = $_POST['idEquipo'] ?? '';
$marca = $_POST['marca'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$color = $_POST['color'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$memoria = $_POST['memoria'] ?? '';
$disco = $_POST['disco'] ?? '';
$procesador = $_POST['procesador'] ?? '';

// Query
$sql = "UPDATE t_asignacion SET 
id_persona='$idPersona',
id_equipo='$idEquipo',
marca='$marca',
modelo='$modelo',
color='$color',
descripcion='$descripcion',
memoria='$memoria',
disco='$disco',
procesador='$procesador'
WHERE id_asignacion='$idAsignacion'";

// Ejecutar
$result = mysqli_query($conexion, $sql);

if($result){
    echo 1;
} else {
    echo mysqli_error($conexion);
}
?>