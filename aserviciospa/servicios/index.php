<?php
require_once('./../Basedatos.php');
require_once('./Servicio.php');
$servicio = new Servicio();

@header("Content-type: application/json");


// Consultar GET
// devuelve 1 o todos en funcion de si recibe o no parametro
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $res = $servicio->getUnServicioById($_GET['id']);
        echo json_encode($res);
        exit();
    } else if (isset($_GET['dni'])){
        $res = $servicio->getUnServicioByDni($_GET['dni']);
        echo json_encode($res);
        exit();
    }else{
        $res = $servicio->getAll();
        echo json_encode($res);
        exit();
    }
}

// Crear un nuevo reg POST
// Los campos del array que venga se deberán llamar como los campos de la tabl $servicioartamentos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // se cargan toda la entrada que venga en php://input
    $post = json_decode(file_get_contents('php://input'), true);

    // Extraemos los valores específicos del body del request
    $codigo = isset($post['codigo']) ? $post['codigo'] : null;
    $nombre = isset($post['nombre']) ? $post['nombre'] : null;
    $descripcion = isset($post['descripcion']) ? $post['descripcion'] : null;
    $precio = isset($post['precio']) ? $post['precio'] : null;

    // Llamamos al método createServicio con los parámetros extraídos
    $res = $servicio->createServicio($codigo, $nombre, $descripcion, $precio);
    $resul['resultado'] = $res;
    echo json_encode($resul);
    exit();
}

// Actualizar PUT, se reciben los datoc como en el put
// Los campos del array que venga se deberán llamar como los campos de la tabl $servicioartamentos
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    // se cargan toda la entrada que venga en php://input
    $post = json_decode(file_get_contents('php://input'), true);

    // Extraemos los valores específicos del body del request
    $codigo = isset($post['codigo']) ? $post['codigo'] : null;
    $nombre = isset($post['nombre']) ? $post['nombre'] : null;
    $descripcion = isset($post['descripcion']) ? $post['descripcion'] : null;
    $precio = isset($post['precio']) ? $post['precio'] : null;

    // Llamamos al método createServicio con los parámetros extraídos
    $res = $servicio->updateServicio($codigo, $nombre, $descripcion, $precio);
    $resul['mensaje'] = $res;
    echo json_encode($resul);
    exit();
}

// Borrar DELETE
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $codigo = $_GET['codigo'];
    $res = $servicio->deleteServicio($codigo);
    $resul['resultado'] = $res;
    echo json_encode($resul);
    exit();
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
