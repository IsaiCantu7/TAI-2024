<?php

require_once './models/Universidades.php';
require_once './models/Relacion.php';

class RelacionController {
    private $universidadesModel;
    private $relacionModel;

    public function __construct() {
        $this->universidadesModel = new Universidades();
        $this->relacionModel = new Relacion();
    }

    public function index() {
        $universidades = $this->universidadesModel->obtenerUniversidades();
        $carreras = $this->universidadesModel->obtenerCarreras();
        $relaciones = $this->relacionModel->obtenerRelaciones();
        include './views/relacion/index.php';
    }

    public function relacionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $universidad_id = $_POST['universidad'];
            $carreras = isset($_POST['carreras']) ? $_POST['carreras'] : [];
            $this->relacionModel->relacionarCarreras($universidad_id, $carreras);
            header("Location: index.php?controller=RelacionController&action=index");
        }
    }

}

?>
