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
    <title>Listado de Universidades</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Listado de Universidades</h1>

        <div class="row mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>País</th>
                        <th>Ciudad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($universidades as $universidad): ?>
                        <tr>
                            <td><?php echo $universidad['nombre']; ?></td>
                            <td><?php echo $universidad['pais']; ?></td>
                            <td><?php echo $universidad['ciudad']; ?></td>
                            <td>
                                <a href="index.php?controller=UniversidadesController&action=editar&id=<?php echo $universidad['id']; ?>" class="btn btn-primary">Editar</a>
                                <a href="index.php?controller=UniversidadesController&action=eliminar&id=<?php echo $universidad['id']; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="index.php?controller=UniversidadesController&action=alta" class="btn btn-primary">Agregar Universidad</a>
        </div>
    </div>
</body>
</html>
