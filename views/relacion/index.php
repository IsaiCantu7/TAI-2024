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
    <title>Relacionar Carreras y Universidades</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Relacionar Carreras y Universidades</h1>
        <form action="index.php?controller=RelacionController&action=relacionar" method="POST">
            <div class="form-group">
                <label for="universidad">Universidad:</label>
                <select class="form-control" id="universidad" name="universidad">
                    <?php foreach ($universidades as $universidad): ?>
                        <option value="<?php echo $universidad['id']; ?>"><?php echo $universidad['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="carreras">Carreras:</label><br>
                <?php foreach ($carreras as $carrera): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo $carrera['id']; ?>" id="carrera_<?php echo $carrera['id']; ?>" name="carreras[]">
                        <label class="form-check-label" for="carrera_<?php echo $carrera['id']; ?>"><?php echo $carrera['nombre']; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary">Relacionar</button>
        </form>
    </div>

    <div class="container mt-4">
        <h1>Relaciones de Universidades y Carreras</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Universidad</th>
                    <th>Carrera</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($relaciones as $relacion): ?>
                    <tr>
                        <td><?php echo $relacion['nombre_universidad']; ?></td>
                        <td><?php echo $relacion['nombre_carreras']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
