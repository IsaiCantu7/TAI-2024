<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Iniciar Sesión</h1>

        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <form action="index.php?controller=LoginController&action=login" method="POST">
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </form>
            </div>
        </div>

        <div class="mt-4">
            <p>¿No tienes una cuenta? <a href="index.php?controller=RegistroController&action=index">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>
