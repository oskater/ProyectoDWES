<?php
require_once __DIR__ . '/../views/serviciosView.php';

class ServicioController
{
    private $servicioView;


    public function __construct()
    {
        $this->servicioView = new ServiciosView();
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
            }
        }
    }

    public function listar()
    {
        $todosLosServicios = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/servicios/index.php"), true);
        $this->servicioView->listarServicios($todosLosServicios);
    }
    public function insertar()
    {
        $this->servicioView->formInsertarServicio();
    }
    public function eliminar()
    {
         // URL de la API
         $api_url = 'http://localhost/ProyectoDWES/aserviciospa/Servicios/index.php?codigo=' . $_POST["Codigo"];

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
             echo "<h2 class='mensaje_exito'>" . explode('"', $response)[3] . "</h2>";
         }
 
         // Cerrar la sesión cURL
         curl_close($ch);
    }
    
    public function modal_eliminar()
    {
        $this->servicioView->modal_eliminar();
    }
}