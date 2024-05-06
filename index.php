<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Universidad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php

session_start();

?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6f42c1;">
    <a class="navbar-brand" href="#">Control universidad</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?controller=CarrerasController&action=index" style="color: black;">Carreras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?controller=UniversidadesController&action=index" style="color: black;">Universidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?controller=AlumnosController&action=index" style="color: black;">Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?controller=RelacionController&action=index" style="color: black;">Relacionar Carreras y Universidades</a>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?controller=LoginController&action=logout" style="color: black;">Cerrar Sesión</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?controller=LoginController&action=index" style="color: black;">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?controller=RegistroController&action=index" style="color: black;">Registrarse</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div>
    <?php
    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];

        require_once "controllers/$controller.php";

        $controller = new $controller();

        $controller->$action();
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
