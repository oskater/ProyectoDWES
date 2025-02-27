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
                case 'modal_insertar':
                        $this->modal_insertar();
                        break;
                case 'editar':
                        $this->editar();
                        break;
                case 'modal_editar':
                        $this->modal_editar();
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
    public function insertar()
{
    // URL de la API con parámetros correctamente codificados
    $api_url = 'http://localhost/ProyectoDWES/aserviciospa/servicios/index.php';

    // Los datos que deseas enviar en la solicitud POST (esto es solo un ejemplo)
    $data = array(
        'tipoServicio' => $_POST['tipoServicio'],  // Puedes cambiar estos valores según lo que necesitas
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio']
    );

    // Convertir el array a formato JSON
    $json_data = json_encode($data);

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
        echo "<h2 class='mensaje_exito'>" . $response . "</h2>";
    }

    // Cerrar la sesión cURL
    curl_close($ch);
}

public function editar(): void
{
    // URL de la API con parámetros correctamente codificados
    $api_url = 'http://localhost/ProyectoDWES/aserviciospa/servicios/index.php';

    // Los datos que deseas enviar en la solicitud PUT
    $data = array(
        'codigo' => $_POST['codigo'],  // Puedes cambiar estos valores según lo que necesitas
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio']
    );

    // Convertir el array a formato JSON
    $json_data = json_encode($data);

    // Iniciar una sesión cURL
    $ch = curl_init();

    // Establecer la URL completa
    curl_setopt($ch, CURLOPT_URL, $api_url);

    // Especificar que la solicitud es de tipo PUT
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');  // Aquí es donde se cambia a PUT

    // Enviar los datos de la solicitud PUT (como JSON)
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
        echo "<h2 class='mensaje_exito'>" . $response . "</h2>";
    }

    // Cerrar la sesión cURL
    curl_close($ch);
}

    
    public function modal_insertar()
    {
        $this->servicioView->modal_insertar();
    }
    public function modal_eliminar()
    {
        $this->servicioView->modal_eliminar();
    }
    public function modal_editar()
    {
        $this->servicioView->modal_editar();
    }
}
?>