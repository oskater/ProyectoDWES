<?php
require_once __DIR__ . '/../controllers/ClienteController.php';
require_once __DIR__ . '/../controllers/PerroController.php';
require_once __DIR__ . '/../controllers/ServicioController.php';
require_once __DIR__ . '/../controllers/PerroRecibeSerController.php';
require_once __DIR__ . '/../controllers/EmpleadoController.php';

if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
    switch($controller){
        case 'Cliente':
            $clienteController = new ClienteController();
            $clienteController->comprobarAction();
        break;
        case 'Perro':
            $perroController = new PerroController();
            $perroController->comprobarAction();
        break;
        case 'Servicio':
            $servicioController = new ServicioController();
            $servicioController->comprobarAction();
        break;
        case 'PerroRecibeSer':
            $perroRecibeSerController = new ServiciosRealizadosController();
            $perroRecibeSerController->comprobarAction();
        break;
        case 'Empleado':
            $empleadoController = new EmpleadoController();
            $empleadoController->comprobarAction();
        break;
    }
}

?>