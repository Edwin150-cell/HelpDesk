<?php
require_once "../../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$sql = "SELECT r.*, u.usuario, e.nombre as equipo
FROM t_reportes r
INNER JOIN t_usuarios u ON r.id_usuario = u.id_usuario
INNER JOIN t_cat_equipo e ON r.id_equipo = e.id_equipo";

$result = mysqli_query($conexion,$sql);
?>

<table class="table">
<tr>
<th>#</th>
<th>Fecha</th>
<th>Usuario</th>
<th>Equipo</th>
<th>Problema</th>
<th>Estado</th>
<th>Solución</th>
</tr>

<?php while($ver = mysqli_fetch_array($result)): ?>
<tr>
<td><?php echo $ver['id_reporte']; ?></td>
<td><?php echo $ver['fecha']; ?></td>
<td><?php echo $ver['usuario']; ?></td>
<td><?php echo $ver['equipo']; ?></td>
<td><?php echo $ver['descripcion_problema']; ?></td>
<td><?php echo $ver['estatus']==0?"Abierto":"Cerrado"; ?></td>
<td><?php echo $ver['solucion_problema']; ?></td>

<td>
<input type="text" id="sol<?php echo $ver['id_reporte']; ?>">
<button onclick="resolver(<?php echo $ver['id_reporte']; ?>)">Guardar</button>
</td>

</tr>
<?php endwhile; ?>
</table>

<script>
function resolver(id){
    let solucion = $('#sol'+id).val();

    $.post("../procesos/reportes/resolverReporte.php",
    {id:id, solucion:solucion},
    function(r){
        if(r==1){
            alert("Solucion guardada");
            location.reload();
        }
    });
}
</script>