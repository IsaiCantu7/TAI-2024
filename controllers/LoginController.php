<?php

// Se requiere el archivo que contiene la clase Usuarios
require_once './models/Usuarios.php';

// Definición de la clase LoginController
class LoginController {
    private $usuariosModel;

    // Constructor de la clase, inicializa el modelo de usuarios
    public function __construct() {
        $this->usuariosModel = new Usuarios();
    }

    // Método para mostrar el formulario de inicio de sesión
    public function index() {
        // Incluir la vista del formulario de inicio de sesión
        include './views/autenticacion/login.php';
    }

    // Método para manejar la solicitud de inicio de sesión
    public function login() {
        // Verificar si la solicitud es de tipo POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Verificar las credenciales del usuario utilizando el modelo
            $usuario = $this->usuariosModel->login($email, $password);
            if ($usuario) {
                // Iniciar sesión
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $usuario['email'];
                // Redirigir al usuario a la página de inicio después de iniciar sesión
                header("Location: index.php?controller=CarrerasController&action=index");
            } else {
                // Si las credenciales son incorrectas, mostrar un mensaje de error y volver al formulario de inicio de sesión
                echo "Correo electrónico o contraseña incorrectos.";
                include './views/autenticacion/login.php';
            }
        }
    }

    public function logout() {
        session_start();
        // Destruir todas las variables de sesión
        $_SESSION = array();
        // Destruir la sesión
        session_destroy();
        // Redirigir a la página de inicio de sesión
        header("Location: ./index.php?controller=LoginController&action=index");
    }
}

?>
