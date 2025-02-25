
<?php
require_once __DIR__ . '/../views/serviciosView.php';

class ServicioController{
    private $servicioView;    


    public function __construct() {
        $this->servicioView = new ServiciosView();
    }

    public function comprobarAction(){
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        
            switch($action){
                case 'listar':
                    $this->listar();
                break;
                case 'insertar':
                    $this->insertar();
                break;
                case 'eliminar':
                    $this->eliminar();
                break;
            }
        }
    }

    public function listar(){
        
        $this->servicioView->listarServicios();
    }
    public function insertar(){
        $this->servicioView->formInsertarServicio();
    }
    public function eliminar(){
        $this->servicioView->formEliminarServicio();
    }
}