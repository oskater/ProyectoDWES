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
                case 'insertar':
                    $this->insertar();
                    break;
                case 'eliminar':
                    $this->eliminar();
                    break;
                case 'modal_eliminar':
                    $this->modal_eliminar();
                    break;
                case 'listarPorEmpleado':
                    $this->listarPorEmpleado();
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
        $Dni = $_POST['Dni'];
        $todosLosEmpleados = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/empleados/index.php"), true);
        if($Dni != ""){
            $todosLosServiciosDeUnEmpleado = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/perro_recibe_ser/index.php?dni=" . $Dni), true);
            $this->serviciosRealizadosView->listarServiciosRealizadosPorEmpleado($todosLosServiciosDeUnEmpleado, $todosLosEmpleados, $Dni);
        }else {
            $todosLosServicios = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/perro_recibe_ser/index.php"), true);
            $this->serviciosRealizadosView->listarServiciosRealizados($todosLosServicios, $todosLosEmpleados);
        }
    }
    public function insertar()
    {
        $this->serviciosRealizadosView->formInsertarServicioRealizado();
    }
    public function eliminar()
    {
        // URL de la API
        $api_url = 'http://localhost/ProyectoDWES/aserviciospa/perro_recibe_ser/index.php?sr_cod=' . $_POST["sr_cod"];

        // Iniciar una sesión cURL
        $ch = curl_init();

        // Establecer la URL completa con el ID
        curl_setopt($ch, CURLOPT_URL, $api_url );

        // Especificar que la solicitud es de tipo DELETE
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

        // Opcional: para recibir la respuesta de la API
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Ejecutar la solicitud
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
    public function modal_eliminar()
    {
        $this->serviciosRealizadosView->modal_eliminar();
    }
}


// class PerroRecibeSerController
// {

//     private $model;
//     private $view;

//     public function __construct()
//     {
//         $this->model = new PerroRecibeSer();
//         $this->view = new PerroRecibeSerView();
//     }


//     //GET -> todos los registros
//     public function mostrarAll()
//     {
//         $allRegistros = json_decode(file_get_contents("http://localhost/SPA_PERROS_PHP/aserviciospa/perro_recibe_ser"), true);
//         $this->view->mostrarRegistros($allRegistros);
//     }



//     //GET -> todos los registros de un empleado concreto
//     public function mostrarRegistrosPorDniEmpleado($dni)
//     {
//         $allRegistros = json_decode(file_get_contents("http://localhost/SPA_PERROS_PHP/aserviciospa/perro_recibe_ser?dni=$dni"), true);
//         $this->view->mostrarRegistros($allRegistros);
//     }



//     //POST -> crear un registro
//     public function crearPerroRecibeSer($cod_servicio, $id_perro, $incidencias, $precio_final)
//     {

//         // Los datos que deseas enviar en el cuerpo de la solicitud (en formato JSON)
//         $data = array(
//             'cod_servicio' => $cod_servicio,
//             'id_perro' => $id_perro,
//             'incidencias' => $incidencias,
//             'precio_final' => $precio_final
//         );

//         // Inicializa cURL
//         $ch = curl_init('http://localhost/SPA_PERROS_PHP/aserviciospa/perro_recibe_ser');

//         // Configura las opciones de cURL
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna la respuesta como string
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Establece el tipo de contenido como JSON
//         curl_setopt($ch, CURLOPT_POST, true); // Especifica que se trata de una solicitud POST
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Convierte el array a JSON y lo envía en el cuerpo

//         // Ejecuta la petición y guarda la respuesta
//         $response = curl_exec($ch);

//         // Verifica si hubo algún error
//         if ($response === false) {
//             echo 'Error en la petición: ' . curl_error($ch);
//         } else {
//             // Si la respuesta es exitosa, muestra el contenido
//             echo 'Respuesta del servidor: ' . $response;
//         }

//         // Cierra la sesión de cURL
//         curl_close($ch);

//         $this->view->mostrarMensaje($response);
//     }




//     //DELETE -> eliminar un registro
//     public function eliminarPerroRecibeSer($sr_cod)
//     {
//         $ch = curl_init('http://localhost/SPA_PERROS_PHP/aserviciospa/perro_recibe_ser?sr_cod=' . $sr_cod);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
//         $response = curl_exec($ch);
//         curl_close($ch);

//         $this->view->mostrarMensaje($response);
//     }

// }
