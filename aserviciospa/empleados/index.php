<?php
require_once('./../Basedatos.php');
require_once('./Empleado.php');

$empleado = new Empleado();

header("Access-Control-Allow-Origin: *");

// OBTENER EMPLEADOS (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $res = $empleado->getAll();
    echo json_encode($res);
    exit;
}

// INSERTAR EMPLEADO (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos desde el cuerpo de la solicitud
    // $data = json_decode(file_get_contents("php://input"), true);
    $data=[
        "dni"=>$_GET['dni'],
        "nombre"=>$_GET['nombre'],
        "apellido1"=>$_GET['apellido1'],
        "apellido2"=>$_GET['apellido2'],
        "calle"=>$_GET['calle'],
        "numero"=>$_GET['numero'],
        "cp"=>$_GET['cp'],
        "poblacion"=>$_GET['poblacion'],
        "provincia"=>$_GET['provincia'],
        "tlfno"=>$_GET['tlfno'],
        "email"=>$_GET['email'],
        "password"=>$_GET['password'],
        "rol"=>$_GET['rol'],
        "profesion"=>$_GET['profesion']
    ];

    // Verificar si los datos son válidos
    if (!$data || empty($data['dni']) || empty($data['nombre']) || empty($data['apellido1']) || empty($data['apellido2']) || empty($data['calle']) || empty($data['numero']) || empty($data['cp']) || empty($data['poblacion']) ||empty($data['provincia']) ||empty($data['tlfno']) || empty($data['email']) || empty($data['password']) || empty($data['rol']) || empty($data['profesion'])) {
        echo json_encode(["error" => "Datos incompletos"]);
        exit;
    }

    // Insertar el empleado
    $res = $empleado->insertEmpleado($data);
    echo json_encode($res);
    exit;
}

// ELIMINAR EMPLEADO (DELETE)
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $dni = $_GET['dni'];
    $res = $empleado->deleteEmpleado($dni);
    echo json_encode($res);
    exit();
}


// METODO NO PERMITIDO
// echo json_encode(["error" => "Método no permitido"]);
// exit();
