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
    <title>Editar Alumno</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Alumno</h1>

        <div class="row mt-4">
            <form action="index.php?controller=AlumnosController&action=editar" method="POST">
                <input type="hidden" name="id" value="<?php echo $alumno['id']; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $alumno['nombre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $alumno['apellido']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $alumno['correo']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $alumno['telefono']; ?>">
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $alumno['fecha_nacimiento']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="carrera_id">Carrera</label>
                    <select class="form-control" id="carrera_id" name="carrera_id" required>
                        <?php foreach ($carreras as $carrera): ?>
                            <option value="<?php echo $carrera['id']; ?>" <?php echo ($carrera['id'] == $alumno['carrera_id']) ? 'selected' : ''; ?>><?php echo $carrera['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php?controller=AlumnosController&action=index" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>
