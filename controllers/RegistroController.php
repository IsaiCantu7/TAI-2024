<?php

// Se importa la clase de modelo de Usuarios
require_once './models/Usuarios.php';

// Definición de la clase RegistroController
class RegistroController {
    private $usuariosModel;

    // Constructor de la clase, inicializa el modelo de usuarios
    public function __construct() {
        $this->usuariosModel = new Usuarios();
    }

    // Método para mostrar el formulario de registro
    public function index() {
        // Incluir la vista del formulario de registro
        include './views/autenticacion/registro.php';
    }

    // Método para manejar la solicitud de registro de un nuevo usuario
    public function register() {
        // Verificar si la solicitud es de tipo POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Insertar el nuevo usuario utilizando el modelo
            $resultado = $this->usuariosModel->registrarUsuario($nombre, $email, $password);
            if ($resultado) {
                // Si el registro es exitoso, redirigir al usuario a la página de inicio de sesión
                header("Location: index.php?controller=LoginController&action=index");
            } else {
                // Si hay un error en el registro, mostrar un mensaje de error
                echo "Error al registrar el usuario.";
            }
        }
    }
}

?>
