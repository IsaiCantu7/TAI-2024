<?php

require_once './models/Conexion.php';

class Universidades {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerUniversidades() {
        $query = "SELECT * FROM universidades";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerUniversidadPorId($id) {
        $query = "SELECT * FROM universidades WHERE id = $id";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_assoc();
    }

    public function agregarUniversidad($nombre, $pais, $ciudad, $carreras) {
        $query = "INSERT INTO universidades (nombre, pais, ciudad) VALUES ('$nombre', '$pais', '$ciudad')";
        $this->conexion->conectar()->query($query);
        $idUniversidad = $this->conexion->conectar()->insert_id;

        foreach ($carreras as $carrera_id) {
            $query = "INSERT INTO universidades_carreras (universidad_id, carrera_id) VALUES ($idUniversidad, $carrera_id)";
            $this->conexion->conectar()->query($query);
        }
    }

    // Método para actualizar una universidad
    public function actualizarUniversidad($id, $nombre, $pais, $ciudad, $carreras) {
        $query = "UPDATE universidades SET nombre='$nombre', pais='$pais', ciudad='$ciudad' WHERE id=$id";
        $this->conexion->conectar()->query($query);

        // Eliminar todas las carreras asociadas a esta universidad
        $query = "DELETE FROM universidades_carreras WHERE universidad_id=$id";
        $this->conexion->conectar()->query($query);

        // Insertar las nuevas carreras seleccionadas
        foreach ($carreras as $carrera_id) {
            $query = "INSERT INTO universidades_carreras (universidad_id, carrera_id) VALUES ($id, $carrera_id)";
            $this->conexion->conectar()->query($query);
        }
    }

    // Método para eliminar una universidad por su ID
    public function eliminarUniversidad($id) {
        // Consulta SQL para eliminar una universidad por su ID
        $query = "DELETE FROM universidades WHERE id = $id";
        // Se ejecuta la consulta y se retorna el resultado
        return $this->conexion->conectar()->query($query);
    }

    public function obtenerCarrerasPorUniversidad($idUniversidad) {
        $query = "SELECT c.*, 
                         IF(uc.universidad_id IS NOT NULL, 1, 0) as seleccionada
                  FROM carreras c
                  LEFT JOIN universidades_carreras uc 
                  ON c.id = uc.carrera_id AND uc.universidad_id = $idUniversidad";
        $resultado = $this->conexion->conectar()->query($query);
    
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    public function obtenerCarreras() {
        $query = "SELECT * FROM carreras";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}

?>
