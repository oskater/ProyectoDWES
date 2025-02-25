<?php

class PerroRecibeSerController
{

    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new PerroRecibeSer();
        $this->view = new PerroRecibeSerView();
    }


    //GET -> todos los registros
    public function mostrarAll()
    {
        $allRegistros = json_decode(file_get_contents("http://localhost/SPA_PERROS_PHP/aserviciospa/perro_recibe_ser"), true);
        $this->view->mostrarRegistros($allRegistros);
    }



    //GET -> todos los registros de un empleado concreto
    public function mostrarRegistrosPorDniEmpleado($dni)
    {
        $allRegistros = json_decode(file_get_contents("http://localhost/SPA_PERROS_PHP/aserviciospa/perro_recibe_ser?dni=$dni"), true);
        $this->view->mostrarRegistros($allRegistros);
    }



    //POST -> crear un registro
    public function crearPerroRecibeSer($cod_servicio, $id_perro, $incidencias, $precio_final)
    {

        // Los datos que deseas enviar en el cuerpo de la solicitud (en formato JSON)
        $data = array(
            'cod_servicio' => $cod_servicio,
            'id_perro' => $id_perro,
            'incidencias' => $incidencias,
            'precio_final' => $precio_final
        );

        // Inicializa cURL
        $ch = curl_init('http://localhost/SPA_PERROS_PHP/aserviciospa/perro_recibe_ser');

        // Configura las opciones de cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna la respuesta como string
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Establece el tipo de contenido como JSON
        curl_setopt($ch, CURLOPT_POST, true); // Especifica que se trata de una solicitud POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Convierte el array a JSON y lo envía en el cuerpo

        // Ejecuta la petición y guarda la respuesta
        $response = curl_exec($ch);

        // Verifica si hubo algún error
        if ($response === false) {
            echo 'Error en la petición: ' . curl_error($ch);
        } else {
            // Si la respuesta es exitosa, muestra el contenido
            echo 'Respuesta del servidor: ' . $response;
        }

        // Cierra la sesión de cURL
        curl_close($ch);

        $this->view->mostrarMensaje($response);
    }




    //DELETE -> eliminar un registro
    public function eliminarPerroRecibeSer($sr_cod)
    {
        $ch = curl_init('http://localhost/SPA_PERROS_PHP/aserviciospa/perro_recibe_ser?sr_cod=' . $sr_cod);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $response = curl_exec($ch);
        curl_close($ch);

        $this->view->mostrarMensaje($response);
    }
    
}
