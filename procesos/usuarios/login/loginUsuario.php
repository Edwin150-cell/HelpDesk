<?php
    session_start();
    $usuario = $_POST['login'];
    $password = sha1($_POST['password']);
    require_once "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->loginUsuario($usuario, $password);
?>