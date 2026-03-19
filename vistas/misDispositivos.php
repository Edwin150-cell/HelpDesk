<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {

    include "header.php";
    require_once "../clases/Conexion.php";

    $obj = new Conexion();
    $conexion = $obj->conectar();

    $idPersona = $_SESSION['usuario']['id_persona'];

    $sql = "SELECT 
                p.nombre,
                p.paterno,
                p.materno,
                e.nombre as equipo,
                a.*
            FROM t_asignacion a
            INNER JOIN t_persona p ON a.id_persona = p.id_persona
            INNER JOIN t_cat_equipo e ON a.id_equipo = e.id_equipo
            WHERE a.id_persona = '$idPersona'";

    $result = mysqli_query($conexion, $sql);
?>

<section class="py-5">
<div class="container">

    <h1 class="fw-light">Mis dispositivos</h1>
    <hr>

    <div class="row">

    <?php if(mysqli_num_rows($result) > 0): ?>

        <?php while($ver = mysqli_fetch_array($result)): ?>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">

                    <div class="card-body">

                        <h5 class="card-title"><?php echo $ver['equipo']; ?></h5>

                        <p>
                            <strong>Persona:</strong><br>
                            <?php echo $ver['paterno']." ".$ver['materno']." ".$ver['nombre']; ?>
                        </p>

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <strong>Marca:</strong> <?php echo $ver['marca']; ?>
                            </li>

                            <li class="list-group-item">
                                <strong>Modelo:</strong> <?php echo $ver['modelo']; ?>
                            </li>

                            <li class="list-group-item">
                                <strong>Color:</strong> <?php echo $ver['color']; ?>
                            </li>

                            <li class="list-group-item">
                                <strong>Descripción:</strong> <?php echo $ver['descripcion']; ?>
                            </li>

                            <li class="list-group-item">
                                <strong>Memoria:</strong> <?php echo $ver['memoria']; ?>
                            </li>

                            <li class="list-group-item">
                                <strong>Disco duro:</strong> <?php echo $ver['disco']; ?>
                            </li>

                            <li class="list-group-item">
                                <strong>Procesador:</strong> <?php echo $ver['procesador']; ?>
                            </li>

                        </ul>

                    </div>

                </div>
            </div>

        <?php endwhile; ?>

    <?php else: ?>

        <div class="col-12">
            <div class="alert alert-warning">
                No tienes dispositivos asignados.
            </div>
        </div>

    <?php endif; ?>

    </div>

</div>
</section>

<?php
    include "footer.php";

} else {
    header("location:../index.html");
    exit();
}
?>