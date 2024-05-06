<?php
error_reporting(0);

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Si no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("location: index.php?controller=LoginController&action=index");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Universidades</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Alta de Universidad</h1>

        <div class="row mt-4">
            <form method="post" action="index.php?controller=UniversidadesController&action=alta">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="pais">País:</label>
                    <input type="text" class="form-control" id="pais" name="pais" required>
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Universidad</button>
            </form>
        </div>
    </div>
</body>
</html>
