<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {

    include "header.php";
?>

<section class="py-5">
    <div class="container">

        <h1 class="fw-light">Asignación de Equipos</h1>

        <!-- BOTÓN -->
        <button class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalAsignarEquipo">
            Asignar Equipo
        </button>

        <hr>

        <!-- TABLA -->
        <div id="tablaAsignacionLoad"></div>

    </div>
</section>

<?php
    include "asignacion/modalAsignar.php";
?>

<!-- SCRIPT TABLA -->
<script>
$(document).ready(function(){
    $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");
});
</script>

<?php include "footer.php"; ?>

<!-- DEBUG -->
<script>
console.log("Bootstrap:", typeof bootstrap);
</script>

<?php
} else {
    header("location:../index.html");
    exit();
}
?>