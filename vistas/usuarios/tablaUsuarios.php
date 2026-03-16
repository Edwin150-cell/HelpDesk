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

    if(!$respuesta){
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
        <th>Telefono</th>
        <th>Correo</th>
        <th>Usuario</th>
        <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    <?php while($mostrar = mysqli_fetch_array($respuesta)){ ?>
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

    <div class="dropdown">

    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" 
        data-bs-toggle="dropdown">
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