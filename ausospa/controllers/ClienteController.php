<?php
require_once __DIR__ . '/../views/clientesView.php';

class ClienteController
{
    private $clienteView;

    public function __construct()
    {
        $this->clienteView = new ClienteView();
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
                case 'modal_insertar':
                    $this->modal_insertar();
                    break;
                case 'modal_eliminar':
                    $this->modal_eliminar();
                    break;
            }
        }
    }

    public function listar()
    {
        $clientes = json_decode(file_get_contents("http://localhost:8081/ProyectoDWES/aserviciospa/clientes/index.php"), true);
        $this->clienteView->listarClientes($clientes);
    }
    public function insertar()
    {
        // URL de la API con parámetros correctamente codificados
        $api_url = 'http://localhost/ProyectoDWES/aserviciospa/clientes/index.php?dni=' . urlencode($_POST["dni"]) . 
                   '&nombre=' . urlencode($_POST["nombre"]) . 
                   '&apellido1=' . urlencode($_POST["apellido1"]) . 
                   '&apellido2=' . urlencode($_POST["apellido2"]) . 
                   '&direccion=' . urlencode($_POST["direccion"]) . 
                   '&telefono=' . urlencode($_POST["telefono"]);
    
        // Iniciar una sesión cURL
        $ch = curl_init();
    
        // Establecer la URL completa
        curl_setopt($ch, CURLOPT_URL, $api_url);
    
        // Especificar que la solicitud es de tipo POST
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    
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
    public function eliminar()
    {
        // URL de la API
        $api_url = 'http://localhost/ProyectoDWES/aserviciospa/clientes/index.php?dni=' . $_POST["dni"];

        // Iniciar una sesión cURL
        $ch = curl_init();

        // Establecer la URL completa con el ID
        curl_setopt($ch, CURLOPT_URL, $api_url);

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

    public function modal_insertar()
    {
        $this->clienteView->modal_insertar();
    }

    public function modal_eliminar()
    {
        $this->clienteView->modal_eliminar();
    }
}
