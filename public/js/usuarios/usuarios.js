$(document).ready(function(){

    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");

});


$('#btnAgregarUsuario').click(function(){

    let datos = $('#frmAgregarUsuario').serialize();

    $.ajax({
        type: "POST",
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        data: datos,

        success: function(respuesta){

            if(respuesta == 1){

                Swal.fire({
                    icon: 'success',
                    title: 'Usuario agregado correctamente'
                });

                $('#frmAgregarUsuario')[0].reset();

                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");

            }else{

                Swal.fire({
                    icon: 'error',
                    title: 'No se pudo agregar el usuario'
                });

            }

        }

    });

});

function editarUsuario(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta) {
            respuesta = JSON.parse(respuesta);
            console.log(respuesta);

            $('#idUsuariou').val(respuesta.idUsuario);
            $('#paternou').val(respuesta.paterno);
            $('#maternou').val(respuesta.materno);
            $('#nombreu').val(respuesta.nombrepersona);
            $('#fechaNacimientou').val(respuesta.fechaNacimiento);
            $('#sexou').val(respuesta.sexo);
            $('#telefonou').val(respuesta.telefono);
            $('#correou').val(respuesta.correo);
            $('#usuariou').val(respuesta.nombreUsuario);
            $('#idRolu').val(respuesta.idRol);
            $('#ubicacionu').val(respuesta.ubicacion);

            $('#modalActualizarUsuarios').modal('show');
        }
    });
}