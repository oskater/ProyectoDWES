<?php
require_once __DIR__ . '/../views/empleadosView.php';

class EmpleadoController{
    private $empleadoView;    

    public function __construct() {
        $this->empleadoView = new EmpleadoView();
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
        $this->empleadoView->listarEmpleados();
    }
    public function insertar(){
        $this->empleadoView->formInsertarEmpleado();
    }
    public function eliminar(){
        $this->empleadoView->formEliminarEmpleado();
    }
}
?>