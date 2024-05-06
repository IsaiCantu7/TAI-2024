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
    <title>Listado de Carreras</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Listado de Carreras</h1>

        <div class="row mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carreras as $carrera): ?>
                        <tr>
                            <td><?php echo $carrera['nombre']; ?></td>
                            <td><?php echo $carrera['descripcion']; ?></td>
                            <td>
                                <a href="index.php?controller=CarrerasController&action=editar&id=<?php echo $carrera['id']; ?>" class="btn btn-primary">Editar</a>
                                <a href="index.php?controller=CarrerasController&action=eliminar&id=<?php echo $carrera['id']; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="index.php?controller=CarrerasController&action=alta" class="btn btn-primary">Agregar Carrera</a>
        </div>
    </div>
</body>
</html>
