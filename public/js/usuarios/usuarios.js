$(document).ready(function() {
    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php", function() {
        $('#tablaUsuariosDataTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
});


function agregarNuevoUsuario(){
    alert("Está funcionando");
    return false;
}