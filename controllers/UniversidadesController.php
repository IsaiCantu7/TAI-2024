<?php

require_once './models/Universidades.php';

class UniversidadesController {
    // Variable para almacenar el modelo de universidades
    private $universidadesModel;

    public function __construct() {
        // Se inicializa el modelo de universidades
        $this->universidadesModel = new Universidades();
    }

    public function index() {
        // Se obtienen todas las universidades
        $universidades = $this->universidadesModel->obtenerUniversidades();
        include './views/universidades/index.php';
    }

    public function alta() {
        // Verificar si la solicitud es de tipo POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            // Obtener las carreras seleccionadas
            $carreras = isset($_POST['carreras']) ? $_POST['carreras'] : [];
            $this->universidadesModel->agregarUniversidad($nombre, $pais, $ciudad, $carreras);
            header("Location: index.php?controller=UniversidadesController&action=index");
        } else {
            // Obtener todas las carreras para mostrarlas en el formulario
            $carreras = $this->universidadesModel->obtenerCarreras();
            include './views/universidades/alta.php';
        }
    }

    // Método para eliminar una universidad
    public function eliminar() {
        // Verificar si se ha proporcionado un ID de universidad
        if (isset($_GET['id'])) {
            // Obtener el ID de la universidad desde la URL
            $id = $_GET['id'];
            // Eliminar la universidad utilizando el modelo
            $this->universidadesModel->eliminarUniversidad($id);
            // Redirigir al listado de universidades después de la eliminación
            header("Location: index.php?controller=UniversidadesController&action=index");
        }
    }

    // Método para editar una universidad
    public function editar() {
        // Verificar si se ha proporcionado un ID de universidad
        if (isset($_GET['id'])) {
            // Obtener el ID de la universidad desde la URL
            $id = $_GET['id'];
            // Obtener los datos de la universidad por su ID
            $universidad = $this->universidadesModel->obtenerUniversidadPorId($id);
            // Incluir la vista para editar la universidad
            include './views/universidades/editar.php';
        }
    }

    // Método para actualizar una universidad
    public function actualizar() {
        // Verificar si la solicitud es de tipo POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            // Obtener las carreras seleccionadas
            $carreras = isset($_POST['carreras']) ? $_POST['carreras'] : [];
            $this->universidadesModel->actualizarUniversidad($id, $nombre, $pais, $ciudad, $carreras);
            header("Location: index.php?controller=UniversidadesController&action=index");
        }
    }
}

?>
