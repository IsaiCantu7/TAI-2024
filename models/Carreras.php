<?php

// Se importa la clase de conexión
require_once './models/Conexion.php';

class Carreras {
    // Se declara la propiedad para la conexión
    private $conexion;

    // Constructor que inicializa la conexión
    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Método para obtener todas las carreras
    public function obtenerCarreras() {
        // Consulta SQL para obtener todas las carreras
        $query = "SELECT * FROM carreras";
        // Se ejecuta la consulta y se obtiene el resultado
        $resultado = $this->conexion->conectar()->query($query);

        // Se retorna el resultado como un arreglo asociativo
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Método para insertar una nueva carrera
    public function insertarCarrera($nombre, $descripcion) {
        // Consulta SQL para insertar una nueva carrera en la base de datos
        $query = "INSERT INTO carreras (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
        // Se ejecuta la consulta y se retorna el resultado
        return $this->conexion->conectar()->query($query);
    }

    // Método para obtener una carrera por su ID
    public function obtenerCarreraPorId($id) {
        // Consulta SQL para obtener una carrera por su ID
        $query = "SELECT * FROM carreras WHERE id = $id";
        // Se ejecuta la consulta y se obtiene el resultado
        $resultado = $this->conexion->conectar()->query($query);

        // Se retorna el resultado como un arreglo asociativo
        return $resultado->fetch_assoc();
    }

    // Método para actualizar los datos de una carrera
    public function actualizarCarrera($id, $nombre, $descripcion) {
        // Consulta SQL para actualizar los datos de una carrera en la base de datos
        $query = "UPDATE carreras SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id";
        // Se ejecuta la consulta y se retorna el resultado
        return $this->conexion->conectar()->query($query);
    }

    // Método para eliminar una carrera por su ID
    public function eliminarCarrera($id) {
        // Consulta SQL para eliminar una carrera por su ID
        $query = "DELETE FROM carreras WHERE id = $id";
        // Se ejecuta la consulta y se retorna el resultado
        return $this->conexion->conectar()->query($query);
    }
}

?>
