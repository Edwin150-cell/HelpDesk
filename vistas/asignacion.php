<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {

    include "header.php";
?>

<section class="py-5">
    <div class="container">

        <h1 class="fw-light">Asignación de Equipos</h1>

        <button class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalAsignarEquipo">
            Asignar Equipo
        </button>

        <hr>

        <div id="tablaAsignacionLoad"></div>

    </div>
</section>

<?php
    include "asignacion/modalAsignar.php";
    include "asignacion/modalEditar.php"; // 👈 IMPORTANTE
?>

<?php include "footer.php"; ?>

<script src="../public/js/asignacion.js"></script>

<script>
$(document).ready(function(){
    $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");
});
</script>

<script>
console.log("Bootstrap:", typeof bootstrap);
</script>

<?php
} else {
    header("location:../index.html");
    exit();
}
?>