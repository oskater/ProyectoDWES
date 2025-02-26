<?php
require_once('./../Basedatos.php');
require_once('./Empleado.php');

$empleado = new Empleado();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// INSERTAR EMPLEADO (POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    // Llamar al método de inserción sin validar datos 
    // (Validación en el Front)
    $res = $empleado->insertEmpleado($data);
    // Devolver respuesta en JSON
    echo json_encode($res);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['Email']) && isset($_GET['Password'])) {
        $res = $empleado->comprobarEmpleado($_GET['Email'], $_GET['Password']); // Orden corregido
        echo json_encode(["success" => $res]);
        exit();
    } else {
        echo json_encode(["error" => "Faltan datos"]);
        exit();
    }
}


// METODO NO PERMITIDO
echo json_encode(["error" => "Método no permitido"]);
exit();
