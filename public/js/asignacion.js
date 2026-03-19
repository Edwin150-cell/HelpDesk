console.log("asignacion.js cargado");

function asignarEquipo(){
    let datos = $('#frmAsignaEquipo').serialize();

    $.ajax({
        type: "POST",
        data: datos,
        url: "../procesos/asignacion/agregarAsignacion.php",
        success:function(r){
            r = r.trim();

            if(r == 1){
                Swal.fire('Correcto', 'Asignado', 'success');
                $('#frmAsignaEquipo')[0].reset();
                $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");
                $('#modalAsignarEquipo').modal('hide');
            } else {
                Swal.fire('Error', 'No se pudo', 'error');
            }
        }
    });

    return false;
}

function eliminarAsignacion(idAsignacion){
    Swal.fire({
        title: '¿Eliminar?',
        text: "No podrás recuperar este registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: "POST",
                data: "idAsignacion=" + idAsignacion,
                url: "../procesos/asignacion/eliminarAsignacion.php",
                success:function(r){
                    if(r == 1){
                        Swal.fire('Eliminado!', '', 'success');
                        $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");
                    } else {
                        Swal.fire('Error al eliminar', '', 'error');
                    }
                }
            });

        }
    });
}

function editarAsignacion(idAsignacion){

    $.ajax({
        type: "POST",
        data: "idAsignacion=" + idAsignacion,
        url: "../procesos/asignacion/obtenerAsignacion.php",
        success:function(r){

            let datos = r.split("||");

            $('#idAsignacion').val(datos[0]);
            $('#idPersonaU').val(datos[1]);
            $('#idEquipoU').val(datos[2]);
            $('#marcaU').val(datos[3]);
            $('#modeloU').val(datos[4]);
            $('#colorU').val(datos[5]);
            $('#descripcionU').val(datos[6]);
            $('#memoriaU').val(datos[7]);
            $('#discoU').val(datos[8]);
            $('#procesadorU').val(datos[9]);

            $('#modalEditarAsignacion').modal('show');
        }
    });
}

function actualizarAsignacion(){

    let datos = $('#frmEditarAsignacion').serialize();

    $.ajax({
        type: "POST",
        data: datos,
        url: "../procesos/asignacion/actualizarAsignacion.php",
        success:function(r){

            if(r == 1){
                Swal.fire('Actualizado', '', 'success');

                $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");

                $('#modalEditarAsignacion').modal('hide');
            } else {
                Swal.fire('Error al actualizar', '', 'error');
            }

        }
    });

}