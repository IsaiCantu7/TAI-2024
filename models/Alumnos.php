<?php

// Se importa la clase de conexión
require_once './models/Conexion.php';

class Alumnos {
    // Se declara la propiedad para la conexión
    private $conexion;

    // Constructor que inicializa la conexión
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Método para obtener todos los alumnos
    public function obtenerAlumnos() {
        // Consulta SQL para obtener todos los alumnos
        $query = "SELECT * FROM alumnos";
        // Se ejecuta la consulta y se obtiene el resultado
        $resultado = $this->conexion->conectar()->query($query);

        // Se retorna el resultado 
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Método para insertar un nuevo alumno
    public function insertarAlumno($nombre, $apellido, $correo, $telefono, $fechaNacimiento, $carrera_id) {
        // Consulta SQL para insertar un nuevo alumno en la base de datos
        $query = "INSERT INTO alumnos (nombre, apellido, correo, telefono, fecha_nacimiento, carrera_id) VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$fechaNacimiento', '$carrera_id')";
        // Se ejecuta la consulta y se retorna el resultado
        return $this->conexion->conectar()->query($query);
    }

    // Método para obtener un alumno por su ID
    public function obtenerAlumnoPorId($id) {
        // Consulta SQL para obtener un alumno por su ID
        $query = "SELECT * FROM alumnos WHERE id = $id";
        // Se ejecuta la consulta y se obtiene el resultado
        $resultado = $this->conexion->conectar()->query($query);

        // Se retorna el resultado como un arreglo asociativo
        return $resultado->fetch_assoc();
    }

    // Método para actualizar los datos de un alumno
    public function actualizarAlumno($id, $nombre, $apellido, $correo, $telefono, $fechaNacimiento, $carrera_id) {
        // Consulta SQL para actualizar los datos de un alumno en la base de datos
        $query = "UPDATE alumnos SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', telefono = '$telefono', fecha_nacimiento = '$fechaNacimiento', carrera_id = '$carrera_id' WHERE id = $id";
        // Se ejecuta la consulta y se retorna el resultado
        return $this->conexion->conectar()->query($query);
    }

    // Método para eliminar un alumno por su ID
    public function eliminarAlumno($id) {
        // Consulta SQL para eliminar un alumno por su ID
        $query = "DELETE FROM alumnos WHERE id = $id";
        // Se ejecuta la consulta y se retorna el resultado
        return $this->conexion->conectar()->query($query);
    }
}

?>
