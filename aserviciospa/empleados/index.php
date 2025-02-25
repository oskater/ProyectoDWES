<?php
require_once('./../Basedatos.php');
require_once('./Empleado.php');

$empleado = new Empleado();

@header("Content-type: application/json");


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

// METODO NO PERMITIDO
echo json_encode(["error" => "Método no permitido"]);
exit();
