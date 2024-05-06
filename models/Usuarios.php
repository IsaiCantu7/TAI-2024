<?php

// Se importa la clase de conexión
require_once './models/Conexion.php';

class Usuarios {
    // Se declara la propiedad para la conexión
    private $conexion;

    // Constructor que inicializa la conexión
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Método para registrar un nuevo usuario
    public function registrarUsuario($nombre, $email, $password) {
        // Encriptar la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Consulta SQL para insertar un nuevo usuario en la base de datos
        $query = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$hashed_password')";
        // Se ejecuta la consulta y se retorna el resultado
        return $this->conexion->conectar()->query($query);
    }

    // Método para verificar las credenciales del usuario al iniciar sesión
    public function login($email, $password) {
        // Consulta SQL para obtener el usuario por su correo electrónico
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        // Se ejecuta la consulta y se obtiene el resultado
        $resultado = $this->conexion->conectar()->query($query);
        
        // Verificar si se encontró un usuario con el correo electrónico dado
        if ($resultado->num_rows > 0) {
            // Obtener la fila del resultado como un arreglo asociativo
            $usuario = $resultado->fetch_assoc();
            // Verificar si la contraseña proporcionada coincide con la contraseña almacenada (se compara la contraseña proporcionada con la contraseña hasheada almacenada en la base de datos)
            if (password_verify($password, $usuario['password'])) {
                // Si las contraseñas coinciden, se devuelve el usuario
                return $usuario;
            }
        }
        // Si no se encuentra un usuario con el correo electrónico dado o si la contraseña no coincide, se devuelve false
        return false;
    }
}
?>
