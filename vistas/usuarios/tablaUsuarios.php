<?php
include "../../clases/Conexion.php";

$con = new Conexion();
$conexion = $con->conectar();

$sql = "SELECT 
            usuarios.id_usuario AS idUsuario,
            usuarios.usuario AS nombreUsuario,
            roles.nombre AS rol,
            usuarios.id_rol AS idRol,
            usuarios.ubicacion AS ubicacion,
            usuarios.activo AS estatus,
            usuarios.id_persona AS idpersona,
            persona.nombre AS nombrepersona,
            persona.paterno AS paterno,
            persona.materno AS materno,
            persona.fecha_nacimiento AS fechaNacimiento,
            persona.sexo AS sexo,
            persona.correo AS correo,
            persona.telefono AS telefono
        FROM t_usuarios AS usuarios
        INNER JOIN t_cat_roles AS roles 
            ON usuarios.id_rol = roles.id_rol
        INNER JOIN t_persona AS persona 
            ON usuarios.id_persona = persona.id_persona";

$respuesta = mysqli_query($conexion, $sql);

if (!$respuesta) {
    echo "Error en la consulta: " . mysqli_error($conexion);
}
?>

<table id="tablaUsuariosDataTable" class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Nombre</th>
            <th>Fecha Nacimiento</th>
            <th>Sexo</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>

        <tr>

            <td><?php echo $mostrar['paterno']; ?></td>
            <td><?php echo $mostrar['materno']; ?></td>
            <td><?php echo $mostrar['nombrepersona']; ?></td>
            <td><?php echo $mostrar['fechaNacimiento']; ?></td>
            <td><?php echo $mostrar['sexo']; ?></td>
            <td><?php echo $mostrar['telefono']; ?></td>
            <td><?php echo $mostrar['correo']; ?></td>
            <td><?php echo $mostrar['nombreUsuario']; ?></td>

            <td>
                <?php
                if ($mostrar['estatus'] == 1) {
                    echo '<span class="badge bg-success">Activo</span>';
                } else {
                    echo '<span class="badge bg-danger">Desactivado</span>';
                }
                ?>
            </td>

            <td>

                <div class="dropdown">

                    <button 
                        class="btn btn-outline-secondary btn-sm dropdown-toggle"
                        type="button"
                        data-bs-toggle="dropdown"
                    >
                        Opciones
                    </button>

                    <ul class="dropdown-menu">

                        <li>
                            <button class="dropdown-item text-success">
                                Cambiar Password
                            </button>
                        </li>

                        <li>
                            <button class="dropdown-item text-primary">
                                Cambiar Rol
                            </button>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li class="dropdown-header">
                            Estado del Usuario
                        </li>

                        <?php if ($mostrar['estatus'] == 1) { ?>

                        <li>
                            <button class="dropdown-item text-danger">
                                Desactivar Usuario
                            </button>
                        </li>

                        <?php } else { ?>

                        <li>
                            <button class="dropdown-item text-success">
                                Activar Usuario
                            </button>
                        </li>

                        <?php } ?>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <span class="dropdown-item-text">
                                Ubicación: <?php echo $mostrar['ubicacion']; ?>
                            </span>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <button class="dropdown-item text-warning">
                                Editar
                            </button>
                        </li>

                        <li>
                            <button class="dropdown-item text-danger">
                                Eliminar
                            </button>
                        </li>

                    </ul>

                </div>

            </td>

        </tr>

        <?php } ?>

    </tbody>

</table>


<script>

$(document).ready(function () {

    $('#tablaUsuariosDataTable').DataTable({

        destroy: true,
    });

});

</script>