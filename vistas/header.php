<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <title>Help-Desk</title>
</head>
<body>
        <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="inicio.php">Help Desk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
                <a class="nav-link" href="inicio.php">Inicio</a>
            </li>
        <?php if($_SESSION['usuario']['rol'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link" href="misDispositivos.php">Mis Dispositivos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="misReportes.php">Reportes para Soporte</a>
            </li>
        <?php } else if($_SESSION['usuario']['rol'] == 2) { ?>
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="asignacion.php">Asignacion de Equipo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reportes.php">Reportes</a>
            </li>
        <?php } ?>
                <li class="nav-item dropdown">
                    <a style="color:green" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuario: <?php echo $_SESSION ['usuario']['nombre'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="editarUsuario.php">Editar datos</a>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../procesos/usuarios/login/salir.php">Salir</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <header>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/RCAhiGJsUUE/1920x1080')">
            <div class="carousel-caption">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1920x1080')">
            <div class="carousel-caption">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/lHGeqh3XhRY/1920x1080')">
            <div class="carousel-caption">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    </header>