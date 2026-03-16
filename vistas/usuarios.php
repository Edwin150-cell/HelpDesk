<?php
session_start();

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {

    include "header.php";
?>

<section class="py-5">
    <div class="container">

        <h1 class="fw-light">Administrar Usuarios</h1>

        <button class="btn btn-primary mb-3"
                data-bs-toggle="modal"
                data-bs-target="#modalAgregarUsuarios">
            Agregar Usuario
        </button>

        <hr>

        <div id="tablaUsuariosLoad"></div>

    </div>
</section>

<?php
    include "usuarios/modalAgregar.php";
    include "usuarios/modalActualizar.php";
    include "footer.php";
?>

<script src="../public/js/usuarios/usuarios.js"></script>

<script>
$(document).ready(function(){
    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
});
</script>

<?php
} else {
    header("location:../index.html");
    exit();
}
?>