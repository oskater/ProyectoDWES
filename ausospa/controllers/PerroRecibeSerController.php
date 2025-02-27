<?php
require_once __DIR__ . '/../views/serviciosRealizadosView.php';


class ServiciosRealizadosController
{
    private $serviciosRealizadosView;


    public function __construct()
    {
        $this->serviciosRealizadosView = new ServiciosRealizadosView();
    }


    public function comprobarAction()
    {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];


            switch ($action) {
                case 'listar':
                    $this->listar();
                    break;
                case 'listarPorEmpleado':
                    $this->listarPorEmpleado();
                    break;
                case 'insertar':
                    $this->insertar();
                    break;
                case 'modal_insertar':
                    $this->modal_insertar();
                    break;
                case 'eliminar':
                    $this->eliminar();
                    break;
                case 'modal_eliminar':
                    $this->modal_eliminar();
                    break;
            }
        }
    }


    public function listar()
    {
        $todosLosEmpleados = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/empleados/index.php"), true);
        $todosLosServicios = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/perro_recibe_ser/index.php"), true);
        $this->serviciosRealizadosView->listarServiciosRealizados($todosLosServicios, $todosLosEmpleados);
    }
    public function listarPorEmpleado()
    {
        $Dni = "";

        if($_SESSION['user']['Rol'] == 'ADMIN'){
            $Dni = $_POST['Dni'];
        }else {
            $Dni = $_SESSION['user']['Dni'];
        }

        $todosLosEmpleados = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/empleados/index.php"), true);
        
        if ($Dni != "") {
            $todosLosServiciosDeUnEmpleado = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/perro_recibe_ser/index.php?dni=" . $Dni), true);
            $this->serviciosRealizadosView->listarServiciosRealizadosPorEmpleado($todosLosServiciosDeUnEmpleado, $todosLosEmpleados, $Dni);
        } else {
            $todosLosServicios = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/perro_recibe_ser/index.php"), true);
            $this->serviciosRealizadosView->listarServiciosRealizados($todosLosServicios, $todosLosEmpleados);
        }
    }
    public function eliminar()
    {
        // URL de la API
        $api_url = 'http://localhost/ProyectoDWES/aserviciospa/perro_recibe_ser/index.php?sr_cod=' . $_POST["sr_cod"];


        // Iniciar una sesión cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
       
        // Comprobar si hubo un error en la ejecución
        if ($response === false) {
            echo "Error en la solicitud cURL: " . curl_error($ch);
        } else {
            // Puedes manejar la respuesta de la API, por ejemplo, si la eliminación fue exitosa
            echo "<h2 class='mensaje_exito'>" . $response . "</h2>";
        }


        // Cerrar la sesión cURL
        curl_close($ch);
    }
    public function insertar()
    {
       
    // URL de la API con parámetros correctamente codificados
    $api_url = 'http://localhost/ProyectoDWES/aserviciospa/perro_recibe_ser/index.php';


    // Convertir el array a formato JSON
    $json_data = json_encode($_POST);


    // Iniciar una sesión cURL
    $ch = curl_init();


    // Establecer la URL completa
    curl_setopt($ch, CURLOPT_URL, $api_url);


    // Especificar que la solicitud es de tipo POST
    curl_setopt($ch, CURLOPT_POST, true);


    // Enviar los datos de la solicitud POST (como JSON)
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);


    // Establecer las cabeceras necesarias para indicar que se está enviando JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',  // Indica que los datos son JSON
        'Content-Length: ' . strlen($json_data)
    ));


    // Opcional: para recibir la respuesta de la API
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    // Ejecutar la solicitud
    $response = curl_exec($ch);


    // Comprobar si hubo un error en la ejecución
    if ($response === false) {
        echo "Error en la solicitud cURL: " . curl_error($ch);
    } else {
        // Puedes manejar la respuesta de la API
        echo "<h2 class='mensaje_exito'>" . explode('"',$response)[3] . "</h2>";
    }


    // Cerrar la sesión cURL
    curl_close($ch);
    }
    public function modal_insertar()
    {
        $todosLosEmpleados = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/empleados/index.php"), true);
        $todosLosPerros = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/perros/index.php"), true);
        $todosLosServicios = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/servicios/index.php"), true);
       
        // print_r($todosLosServicios);
        $this->serviciosRealizadosView->modal_insertar($todosLosServicios, $todosLosPerros, $todosLosEmpleados);
    }
    public function modal_eliminar()
    {
        $this->serviciosRealizadosView->modal_eliminar();
    }
}
