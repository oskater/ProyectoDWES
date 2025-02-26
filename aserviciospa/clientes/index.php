<?php
require_once ('./../Basedatos.php');
require_once ('./Cliente.php');

$cliente = new Cliente();

// Configurar la respuesta como JSON
header("Content-type: application/json");

// OBTENER CLIENTES (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $res = $cliente->getAll();
    echo json_encode($res);
    exit;
}

// INSERTAR CLIENTE (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos desde el cuerpo de la solicitud
    // $data = json_decode(file_get_contents("php://input"), true);
    $data=[
        "dni"=>$_GET['dni'],
        "nombre"=>$_GET['nombre'],
        "apellido1"=>$_GET['apellido1'],
        "apellido2"=>$_GET['apellido2'],
        "direccion"=>$_GET['direccion'],
        "tlfno"=>$_GET['telefono']
    ];

    // Verificar si los datos son válidos
    if (!$data || empty($data['dni']) || empty($data['nombre']) || empty($data['apellido1']) || empty($data['apellido2']) || empty($data['direccion']) || empty($data['tlfno'])) {
        echo json_encode(["error" => "Datos incompletos"]);
        exit;
    }

    // Insertar el cliente
    $res = $cliente->insertCliente($data);
    echo json_encode($res);
    exit;
}

// ELIMINAR CLIENTE (DELETE)
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $dni = $_GET['dni'];
    $res = $cliente->deleteCliente($dni);
    echo json_encode($res);
    exit();
}

// // MÉTODO NO PERMITIDO
// echo json_encode(["error" => "Método no permitido"]);
// exit;