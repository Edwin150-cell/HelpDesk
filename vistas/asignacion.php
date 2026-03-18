<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {

    include "header.php";
?>

<section class="py-5">
    <div class="container">

        <h1 class="fw-light">Asignación de Equipos</h1>

        <!-- BOTÓN -->
        <button class="btn btn-primary mb-3"
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
    // MODAL
    include "asignacion/modalAsignar.php";

    // FOOTER
    include "footer.php";
?>

<!-- SCRIPT (SIEMPRE DESPUÉS DEL FOOTER) -->
<script>
$(document).ready(function(){
    $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");
});
</script>

<?php
} else {
    header("location:../index.html");
    exit();
}
?>