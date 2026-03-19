<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

<title>HelpDesk</title>

<style>
body{
    font-family: 'Poppins', sans-serif;
    background: #0f172a;
    color: white;
}

.navbar{
    background: linear-gradient(90deg, #0d6efd, #1e3a8a);
}

.navbar a{
    color: white !important;
}

.card{
    background: #1e293b;
    color: white;
    border-radius: 15px;
    border: none;
}

.table{
    color: white;
}

.table thead{
    background: #1e3a8a;
}

/* 🔥 DROPDOWN BONITO */
.dropdown-menu{
    border-radius: 10px;
    overflow: hidden;
    border: none;
}

/* EDITAR (AMARILLO) */
.dropdown-menu .dropdown-item:first-child{
    background-color: #f7f6f6;
    color: yellow !important;
    font-weight: bold;
}

/* SALIR (ROJO) */
.dropdown-menu .dropdown-item:last-child{
    background-color: #faf8f8;
    color: red !important;
    font-weight: bold;
}

/* HOVER */
.dropdown-menu .dropdown-item:hover{
    opacity: 0.85;
}
</style>

</head>

<body>

<nav class="navbar navbar-expand-lg">
<div class="container">

<a class="navbar-brand" href="inicio.php">💻 HelpDesk</a>

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="inicio.php">Inicio</a>
</li>

<?php if($_SESSION['usuario']['rol'] == 1) { ?>

<li class="nav-item">
<a class="nav-link" href="misDispositivos.php">Dispositivos</a>
</li>

<li class="nav-item">
<a class="nav-link" href="misReportes.php">Reportes</a>
</li>

<?php } else { ?>

<li class="nav-item">
<a class="nav-link" href="usuarios.php">Usuarios</a>
</li>

<li class="nav-item">
<a class="nav-link" href="asignacion.php">Asignaciones</a>
</li>

<li class="nav-item">
<a class="nav-link" href="reportes.php">Reportes</a>
</li>

<?php } ?>

<li class="nav-item dropdown">

<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
👤 <?php echo $_SESSION['usuario']['usuario']; ?>
</a>

<ul class="dropdown-menu">

<li><a class="dropdown-item" href="editarUsuario.php">Editar datos</a></li>
<li><a class="dropdown-item" href="../procesos/usuarios/login/salir.php">Cerrar Secion</a></li>

</ul>

</li>

</ul>

</div>
</nav>