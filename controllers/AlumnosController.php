<?php

// Modelos requeridos para el controlador
require_once './models/Alumnos.php';
require_once './models/Carreras.php';

// Definición de la clase AlumnosController
class AlumnosController {
    private $alumnosModel;
    private $carrerasModel;

    // Constructor de la clase, inicializa los modelos de alumnos y carreras
    public function __construct() {
        $this->alumnosModel = new Alumnos();
        $this->carrerasModel = new Carreras();
    }

    // Método para mostrar el listado de alumnos
    public function index() {
        // Obtener la lista de alumnos desde el modelo
        $alumnos = $this->alumnosModel->obtenerAlumnos();
        // Incluir la vista de listado de alumnos
        include './views/alumnos/index.php';
    }

    // Método para mostrar el formulario de alta de un nuevo alumno
    public function alta() {
        // Obtener la lista de carreras desde el modelo
        $carreras = $this->carrerasModel->obtenerCarreras();
        // Incluir la vista del formulario de alta de alumno
        include './views/alumnos/alta.php';
    }

    // Método para guardar un nuevo alumno
    public function guardar() {
        // Verificar si la solicitud es de tipo POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
            $fechaNacimiento = $_POST['fecha_nacimiento'];
            $carrera_id = $_POST['carrera_id'];
            // Insertar el nuevo alumno utilizando el modelo
            $resultado = $this->alumnosModel->insertarAlumno($nombre, $apellido, $correo, $telefono, $fechaNacimiento, $carrera_id);
            if ($resultado) {
                // Si el registro es exitoso, redirigir al usuario al listado de alumnos
                header("Location: index.php?controller=AlumnosController&action=index");
            } else {
                // Si hay un error en el registro, mostrar un mensaje de error
                echo "Error al guardar el alumno.";
            }
        }
    }

    // Método para mostrar el formulario de edición de un alumno
    public function editar() {
        // Verificar si la solicitud es de tipo POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario de edición
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
            $fechaNacimiento = $_POST['fecha_nacimiento'];
            $carrera_id = $_POST['carrera_id'];
            // Actualizar el alumno utilizando el modelo
            $resultado = $this->alumnosModel->actualizarAlumno($id, $nombre, $apellido, $correo, $telefono, $fechaNacimiento, $carrera_id);
            if ($resultado) {
                // Si la actualización es exitosa, redirigir al usuario al listado de alumnos
                header("Location: index.php?controller=AlumnosController&action=index");
            } else {
                // Si hay un error en la actualización, mostrar un mensaje de error
                echo "Error al actualizar el alumno.";
            }
        } else {
            // Obtener el ID del alumno a editar desde los parámetros de la URL
            $id = $_GET['id'];
            // Obtener la información del alumno desde el modelo
            $alumno = $this->alumnosModel->obtenerAlumnoPorId($id);
            // Obtener la lista de carreras desde el modelo
            $carreras = $this->carrerasModel->obtenerCarreras();
            // Incluir la vista del formulario de edición de alumno
            include './views/alumnos/editar.php';
        }
    }

    // Método para eliminar un alumno
    public function eliminar() {
        // Obtener el ID del alumno a eliminar desde los parámetros de la URL
        $id = $_GET['id'];
        // Eliminar el alumno utilizando el modelo
        $resultado = $this->alumnosModel->eliminarAlumno($id);
        if ($resultado) {
            // Si la eliminación es exitosa, redirigir al usuario al listado de alumnos
            header("Location: index.php?controller=AlumnosController&action=index");
        } else {
            // Si hay un error en la eliminación, mostrar un mensaje de error
            echo "Error al eliminar el alumno.";
        }
    }
}

?>
