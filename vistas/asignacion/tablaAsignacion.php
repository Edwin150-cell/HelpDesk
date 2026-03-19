<?php
require_once "../../clases/Conexion.php";
$obj = new Conexion();
$conexion = $obj->conectar();

$sql = "SELECT a.*, 
        CONCAT(p.paterno,' ',p.materno,' ',p.nombre) as persona,
        e.nombre as equipo
        FROM t_asignacion a
        INNER JOIN t_persona p ON a.id_persona = p.id_persona
        INNER JOIN t_cat_equipo e ON a.id_equipo = e.id_equipo";

$result = mysqli_query($conexion, $sql);
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Persona</th>
            <th>Equipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Descripción</th>
            <th>Memoria</th>
            <th>Disco</th>
            <th>Procesador</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php while($ver = mysqli_fetch_array($result)): ?>
        <tr>
            <td><?php echo $ver['persona']; ?></td>
            <td><?php echo $ver['equipo']; ?></td>
            <td><?php echo $ver['marca']; ?></td>
            <td><?php echo $ver['modelo']; ?></td>
            <td><?php echo $ver['color']; ?></td>
            <td><?php echo $ver['descripcion']; ?></td>
            <td><?php echo $ver['memoria']; ?></td>
            <td><?php echo $ver['disco']; ?></td>
            <td><?php echo $ver['procesador']; ?></td>

            <td>
                <button class="btn btn-warning btn-sm"
                onclick="editarAsignacion('<?php echo $ver['id_asignacion']; ?>')">
                Editar
            </button>

                <button class="btn btn-danger btn-sm"
                    onclick="eliminarAsignacion('<?php echo $ver['id_asignacion']; ?>')">
                    Eliminar
                </button>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>