<?php

require_once './models/Conexion.php';

class Relacion {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function relacionarCarreras($universidad_id, $carreras) {
        $query = "DELETE FROM universidades_carreras WHERE universidad_id=$universidad_id";
        $this->conexion->conectar()->query($query);

        foreach ($carreras as $carrera_id) {
            $query = "INSERT INTO universidades_carreras (universidad_id, carrera_id) VALUES ($universidad_id, $carrera_id)";
            $this->conexion->conectar()->query($query);
        }
    }

    public function obtenerRelaciones() {
        $query = "SELECT uc.universidad_id, u.nombre AS nombre_universidad, GROUP_CONCAT(c.nombre SEPARATOR ', ') AS nombre_carreras
                  FROM universidades_carreras uc
                  INNER JOIN universidades u ON uc.universidad_id = u.id
                  INNER JOIN carreras c ON uc.carrera_id = c.id
                  GROUP BY uc.universidad_id";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}

?>
