<?php
require_once "./../Basedatos.php";
require_once "./Perro.php";


$perro = new Perro();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//get by id cliente dni_cliente


require_once('./Perro.php');

$perro = new Perro();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['dnis'])) {
        // Llama a la función getDniofPerros si el parámetro 'dnis' está presente
        $res = $perro->getDniofPerros();
        echo json_encode($res);
        exit();
    } else {
        // Llama a la función getAll si el parámetro 'dnis' no está presente
        $res = $perro->getAll();
        echo json_encode($res);
        exit();
    }
}


//insert all data of perro . 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data) {

        $DNI_DUENIO = isset($data['Dni_duenio']) ? $data['Dni_duenio'] : null;
        $nombre = isset($data['Nombre']) ? $data['Nombre'] : null;
        $fecha_nto = isset($data['Fecha_Nto']) ? $data['Fecha_Nto'] : null;
        $raza = isset($data['Raza']) ? $data['Raza'] : null;
        $peso = isset($data['Peso']) ? $data['Peso'] : null;
        $altura = isset($data['Altura']) ? $data['Altura'] : null;
        $observaciones = isset($data['Observaciones']) ? $data['Observaciones'] : null;
        $Numero_Chip = isset($data['Numero_Chip']) ? $data['Numero_Chip'] : null;
        $sexo = isset($data['Sexo']) ? $data['Sexo'] : null;
        $info = [$DNI_DUENIO, $nombre, $fecha_nto, $raza, $peso, $altura, $observaciones, $Numero_Chip, $sexo];
        $res = $perro->insertPERRO($info);
        echo json_encode(["success" => $res]);
    } else {
        echo json_encode(["error" => "Faltan datos"]);
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Decodificar JSON desde php://input
    $data = json_decode(file_get_contents('php://input'), true);

    // Verificar si 'Numero_Chip' está presente
    if (isset($data['Numero_Chip'])) {
        $res = $perro->deletePerro($data['Numero_Chip']);
        echo json_encode(["success" => $res]);
    } else {
        echo json_encode(["error" => "CHIP no proporcionado"]);
    }
}
