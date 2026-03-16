<?php
    require_once "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $idUsuario = $_POST['idUsuario'];
    echo json_encode($Usuarios->obtenerDatosUsuario($idUsuario));