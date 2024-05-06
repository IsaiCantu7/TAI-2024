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
    <title>Listado de Alumnos</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Listado de Alumnos</h1>

        <div class="row mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumnos as $alumno): ?>
                        <tr>
                            <td><?php echo $alumno['nombre']; ?></td>
                            <td><?php echo $alumno['apellido']; ?></td>
                            <td><?php echo $alumno['correo']; ?></td>
                            <td><?php echo $alumno['telefono']; ?></td>
                            <td><?php echo $alumno['fecha_nacimiento']; ?></td>
                            <td><?php echo $alumno['carrera_id']; ?></td>
                            <td>
                                <a href="index.php?controller=AlumnosController&action=editar&id=<?php echo $alumno['id']; ?>" class="btn btn-primary">Editar</a>
                                <a href="index.php?controller=AlumnosController&action=eliminar&id=<?php echo $alumno['id']; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="index.php?controller=AlumnosController&action=alta" class="btn btn-primary">Agregar Alumno</a>
        </div>
    </div>
</body>
</html>
