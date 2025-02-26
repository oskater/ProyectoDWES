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

// if(isset($_GET['action'])){
//     $action = $_GET['action'];

//     switch($action){
//         case 'listar':
//             $clienteController = new ClienteController();
//             $clienteController->listar();
//         break;
//     }

// }
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// if(isset($_GET['controller'])){
//     $controller=$_GET['controller'];
// }
// if(isset($_GET['action'])){
//     $action=$_GET['action'];
// }

// $controllerElegido = __DIR__ . '/../controllers/' . $controller . 'Controller.php';


// if (file_exists($controllerElegido)) {
//     require_once $controllerElegido;

//     $controllerObj = new $controller();

//     if (method_exists($controllerObj, $action)) {
//         $controllerObj->$action();
//     } else {
//         echo "Esta función no existe en este controlador.";
//     }
// } else {
//     echo "Este controlador no existe.";
// }

?>