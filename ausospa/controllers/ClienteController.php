<?php

class ClienteController{

    public function __construct() {
        
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
        echo "Listar";
    }
    public function insertar(){
        echo "insertar";
    }
    public function eliminar(){
        echo "eliminar";
    }
}
?>