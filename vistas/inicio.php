<?php 
session_start();

if (!isset($_SESSION['usuario'])) {
    header("location:../index.html");
    exit();
}

include "header.php";
require_once "../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$idPersona = $_SESSION['usuario']['id_persona'];


$sql = "SELECT * FROM t_persona WHERE id_persona = '$idPersona'";
$result = mysqli_query($conexion, $sql);
$persona = mysqli_fetch_array($result);
?>

<section class="py-5">
<div class="container">

    <h1 class="fw-light">Inicio</h1>

    <div class="card p-4 shadow">

        <h4>Datos del usuario</h4>
        <hr>

        <p><strong>Nombre:</strong> 
            <?php echo $persona['paterno']." ".$persona['materno']." ".$persona['nombre']; ?>
        </p>

        <p><strong>Correo:</strong> <?php echo $persona['correo']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $persona['telefono']; ?></p>
        <p><strong>Sexo:</strong> <?php echo $persona['sexo']; ?></p>

    </div>

</div>
</section>

<?php include "footer.php"; ?>