<?php

// Se importa la clase de modelo de Carreras
require_once './models/Carreras.php';

// Definición de la clase CarrerasController
class CarrerasController {
    private $carrerasModel;

    // Constructor de la clase, inicializa el modelo de carreras
    public function __construct() {
        $this->carrerasModel = new Carreras();
    }

    // Método para mostrar el listado de carreras
    public function index() {
        // Obtener la lista de carreras desde el modelo
        $carreras = $this->carrerasModel->obtenerCarreras();
        // Incluir la vista de listado de carreras
        include './views/carreras/index.php';
    }

    // Método para mostrar el formulario de alta de carrera
    public function alta() {
        // Incluir la vista del formulario de alta de carrera
        include './views/carreras/alta.php';
    }

    // Método para guardar una nueva carrera
    public function guardar() {
        // Verificar si la solicitud es de tipo POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            // Insertar la nueva carrera utilizando el modelo
            $this->carrerasModel->insertarCarrera($nombre, $descripcion);
            // Redirigir al listado de carreras después de la inserción
            header("Location: index.php?controller=CarrerasController&action=index");
        }
    }

    // Método para mostrar el formulario de edición de carrera
    public function editar() {
        // Verificar si se ha proporcionado un ID de carrera
        if (isset($_GET['id'])) {
            // Obtener el ID de la carrera desde la URL
            $id = $_GET['id'];
            // Obtener los datos de la carrera utilizando el modelo
            $carrera = $this->carrerasModel->obtenerCarreraPorId($id);
            // Incluir la vista del formulario de edición de carrera
            include './views/carreras/editar.php';
        }
    }

    // Método para actualizar una carrera
    public function actualizar() {
        // Verificar si la solicitud es de tipo POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            // Actualizar la carrera utilizando el modelo
            $this->carrerasModel->actualizarCarrera($id, $nombre, $descripcion);
            // Redirigir al listado de carreras después de la actualización
            header("Location: index.php?controller=CarrerasController&action=index");
        }
    }

    // Método para eliminar una carrera
    public function eliminar() {
        // Verificar si se ha proporcionado un ID de carrera
        if (isset($_GET['id'])) {
            // Obtener el ID de la carrera desde la URL
            $id = $_GET['id'];
            // Eliminar la carrera utilizando el modelo
            $this->carrerasModel->eliminarCarrera($id);
            // Redirigir al listado de carreras después de la eliminación
            header("Location: index.php?controller=CarrerasController&action=index");
        }
    }
}

?>
