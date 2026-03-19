<?php
session_start();
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {

include "header.php";
?>

<section class="py-5">
<div class="container">

<h2>Reportes de usuarios</h2>

<div id="tablaReportesAdmin"></div>

</div>
</section>

<?php include "footer.php"; ?>

<script>
$(document).ready(function(){
    $('#tablaReportesAdmin').load("reportes/tablaReportesAdmin.php");
});
</script>

<?php } else { header("location:../index.html"); } ?>