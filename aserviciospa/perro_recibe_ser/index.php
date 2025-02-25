<?php
require_once('./../Basedatos.php');
require_once('./Perro_recibe_ser.php');
$perroRecibeSer = new PerroRecibeSer();

$request = $_SERVER['REQUEST_URI'];  // Obtener la URL de la solicitud
$request = trim($request, '/');

@header("Content-type: application/json");


// Consultar GET
// devuelve 1 o todos en funcion de si recibe o no parametro
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['dni'])) {
        $res = $perroRecibeSer->getRegistrosByEmpleado($_GET['dni']);
        echo json_encode($res);
        exit();
    } elseif (isset($_GET['sr_cod'])) {
        $res = $perroRecibeSer->getUnRegistro($_GET['sr_cod']);
        echo json_encode($res);
        exit();
    } else {
        $res = $perroRecibeSer->getAll();
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
    $cod_servicio = isset($post['cod_servicio']) ? $post['cod_servicio'] : null;
    $id_perro = isset($post['id_perro']) ? $post['id_perro'] : null;
    $incidencias = isset($post['incidencias']) ? $post['incidencias'] : null;
    $precio_final = isset($post['precio_final']) ? $post['precio_final'] : null;

    if ($_SESSION['rol'] == "ADMIN") {
        $dni = isset($post['dni']) ? $post['dni'] : null;
    } else if ($_SESSION['rol'] == "EMPLEADO") {
        $dni = $_SESSION['dni'];
    }

    // Llamamos al método createServicio con los parámetros extraídos
    $res = $perroRecibeSer->createRegistro($cod_servicio, $id_perro, $incidencias, $precio_final, $dni);
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
    $cod_servicio = isset($post['cod_servicio']) ? $post['cod_servicio'] : null;
    $id_perro = isset($post['id_perro']) ? $post['id_perro'] : null;
    $incidencias = isset($post['incidencias']) ? $post['incidencias'] : null;
    $precio_final = isset($post['precio_final']) ? $post['precio_final'] : null;
    $dni = isset($post['dni']) ? $post['dni'] : null;

    // Llamamos al método createServicio con los parámetros extraídos
    $res = $perroRecibeSer->updateRegistro($codigo, $nombre, $descripcion, $precio, $f, $f, $f);
    $resul['mensaje'] = $res;
    echo json_encode($resul);
    exit();
}

// Borrar DELETE
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $codigo = $_GET['sr_cod'];
    $res = $perroRecibeSer->deleteRegistro($sr_cod);
    echo json_encode($res);
    exit();
}

// En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
