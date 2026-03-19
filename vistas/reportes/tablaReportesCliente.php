<?php
require_once "../../clases/Conexion.php";
session_start();

$obj = new Conexion();
$conexion = $obj->conectar();

$idUsuario = $_SESSION['usuario']['id'];

$sql = "SELECT r.*, e.nombre as equipo
FROM t_reportes r
INNER JOIN t_cat_equipo e ON r.id_equipo = e.id_equipo
WHERE r.id_usuario = '$idUsuario'";

$result = mysqli_query($conexion,$sql);
?>

<table class="table table-bordered">
<tr>
<th>#</th>
<th>Fecha</th>
<th>Dispositivo</th>
<th>Estado</th>
<th>Solución</th>
<th>Editar</th>
<th>Eliminar</th>
</tr>

<?php while($ver = mysqli_fetch_array($result)): ?>
<tr>

<td><?php echo $ver['id_reporte']; ?></td>
<td><?php echo $ver['fecha']; ?></td>
<td><?php echo $ver['equipo']; ?></td>

<td>
<?php echo $ver['estatus']==0 ? "Abierto":"Cerrado"; ?>
</td>

<td><?php echo $ver['solucion_problema']; ?></td>

<td>
<?php if($ver['estatus']==0): ?>
<button class="btn btn-warning btn-sm"
onclick="editarReporte('<?php echo $ver['id_reporte']; ?>','<?php echo $ver['descripcion_problema']; ?>')">
Editar
</button>
<?php endif; ?>
</td>

<td>
<?php if($ver['estatus']==0): ?>
<button class="btn btn-danger btn-sm"
onclick="eliminarReporte(<?php echo $ver['id_reporte']; ?>)">
Eliminar
</button>
<?php endif; ?>
</td>

</tr>
<?php endwhile; ?>
</table>