<?php
session_start();
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {

include "header.php";
require_once "../clases/Conexion.php";

$obj = new Conexion();
$conexion = $obj->conectar();

$sqlEquipos = "SELECT a.id_equipo, e.nombre
FROM t_asignacion a
INNER JOIN t_cat_equipo e ON a.id_equipo = e.id_equipo
WHERE a.id_persona = '".$_SESSION['usuario']['id_persona']."'";

$equipos = mysqli_query($conexion, $sqlEquipos);
?>

<section class="py-5">
<div class="container">

<h2>Levantar reporte</h2>

<form id="frmReporte">

    <label>Equipo</label>
    <select name="idEquipo" class="form-control mb-3">
        <?php while($e = mysqli_fetch_array($equipos)): ?>
            <option value="<?php echo $e['id_equipo']; ?>">
                <?php echo $e['nombre']; ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label>Descripción del problema</label>
    <textarea name="descripcion" class="form-control mb-3"></textarea>

    <button class="btn btn-primary" onclick="return agregarReporte()">Agregar</button>

</form>

<hr>

<h3>Mis reportes</h3>

<a href="../procesos/reportes/exportarExcel.php" class="btn btn-success mb-2">
Exportar Excel
</a>
<a href="../procesos/reportes/exportarPDF.php" class="btn btn-danger mb-2">
Exportar PDF
</a>

<div id="tablaReportes"></div>

</div>
</section>

<div class="modal fade" id="modalEditarReporte">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5>Editar Reporte</h5>
      </div>

      <div class="modal-body">
        <input type="hidden" id="idReporteU">
        <textarea id="descripcionU" class="form-control"></textarea>
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary" onclick="actualizarReporte()">Guardar</button>
      </div>

    </div>
  </div>
</div>

<?php include "footer.php"; ?>

<script>
$(document).ready(function(){
    $('#tablaReportes').load("reportes/tablaReportesCliente.php");
});

function agregarReporte(){
    let datos = $('#frmReporte').serialize();

    $.ajax({
        type:"POST",
        data:datos,
        url:"../procesos/reportes/agregarReporte.php",
        success:function(r){
            if(r==1){
                alert("Reporte agregado");
                $('#frmReporte')[0].reset();
                $('#tablaReportes').load("reportes/tablaReportesCliente.php");
            }else{
                alert("Error");
            }
        }
    });
    return false;
}

function eliminarReporte(id){
    Swal.fire({
        title: '¿Eliminar reporte?',
        icon: 'warning',
        showCancelButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../procesos/reportes/eliminarReporte.php",{id:id},function(r){
                if(r==1){
                    $('#tablaReportes').load("reportes/tablaReportesCliente.php");
                }
            });
        }
    });
}

function editarReporte(id, desc){
    $('#idReporteU').val(id);
    $('#descripcionU').val(desc);
    $('#modalEditarReporte').modal('show');
}

function actualizarReporte(){
    let id = $('#idReporteU').val();
    let desc = $('#descripcionU').val();

    $.post("../procesos/reportes/actualizarReporte.php",
    {id:id, descripcion:desc},
    function(r){
        if(r==1){
            $('#modalEditarReporte').modal('hide');
            $('#tablaReportes').load("reportes/tablaReportesCliente.php");
        }
    });
}
</script>

<?php } else { header("location:../index.html"); } ?>