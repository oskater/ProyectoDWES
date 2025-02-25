<?php
require_once __DIR__ . '/../views/clientesView.php';

class ClienteController{
    private $clienteView;    

    public function __construct() {
        $this->clienteView = new ClienteView();
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
        $this->clienteView->listarClientes();
    }
    public function insertar(){
        $this->clienteView->formInsertarCliente();
    }
    public function eliminar(){
        $this->clienteView->formEliminarCliente();
    }
}
?>