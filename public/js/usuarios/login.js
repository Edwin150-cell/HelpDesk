function loginUsuario(){
    $.ajax({
        type:"POST",
        data: $('#frmLogin').serialize(),
        url:"procesos/usuarios/login/loginUsuario.php",
        success:function(respuesta){

            respuesta = respuesta.trim();

            if(respuesta == 1){
                window.location.href = "vistas/inicio.php";
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Error al entrar! " + respuesta
                });
            }

        }
    });

    return false;
}