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
$datos = mysqli_fetch_array($result);
?>

<section class="py-5">
<div class="container">

<h2>Editar datos</h2>

<form id="frmEditarUsuario">

    <input type="hidden" name="idPersona" value="<?php echo $idPersona; ?>">

    <input type="text" name="nombre" class="form-control mb-2"
        value="<?php echo $datos['nombre']; ?>" placeholder="Nombre">

    <input type="text" name="paterno" class="form-control mb-2"
        value="<?php echo $datos['paterno']; ?>" placeholder="Paterno">

    <input type="text" name="materno" class="form-control mb-2"
        value="<?php echo $datos['materno']; ?>" placeholder="Materno">

    <input type="text" name="telefono" class="form-control mb-2"
        value="<?php echo $datos['telefono']; ?>" placeholder="Teléfono">

    <input type="email" name="correo" class="form-control mb-2"
        value="<?php echo $datos['correo']; ?>" placeholder="Correo">

    <button class="btn btn-primary" onclick="return actualizarUsuario()">
        Guardar cambios
    </button>

</form>

</div>
</section>

<script>
function actualizarUsuario(){

    let datos = $('#frmEditarUsuario').serialize();

    $.ajax({
        type:"POST",
        data:datos,
        url:"../procesos/usuarios/actualizarUsuario.php",
        success:function(r){
            if(r==1){
                alert("Actualizado correctamente");
                location.reload();
            }else{
                alert("Error");
            }
        }
    });

    return false;
}
</script>

<?php include "footer.php"; ?>