<?php
class PerroController
{



    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new Perro();
        $this->view = new PerroView();
    }


    //GET Un perro para Por cleinte 
    public function getAllPerro($dni_cliente)
    {
        $PerroSelecionado = json_decode(file_get_contents("http://localhost/USB/SPA_PERROS_PHP/aserviciospa/perros/?dni_cliente=" . $dni_cliente), true);
        $this->view->mostrarPerros($PerroSelecionado);
    }


    //DELETE PERRO 


    public function DeleteOnePerro($CHIP)
    {

        $PerroSelecionado = curl_init("http://localhost/USB/SPA_PERROS_PHP/aserviciospa/perros/?dni_cliente=" . $CHIP);
        curl_setopt($PerroSelecionado, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($PerroSelecionado, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $response = curl_exec($PerroSelecionado);
        curl_close($PerroSelecionado);
        $this->view->mostrarmensaje($response);
    }





    //POST Perro 
    public function InsertOnePerro($Data)
    {

        $PerroSelecionado = curl_init('http://localhost/USB/SPA_PERROS_PHP/aserviciospa/perros/');


        // Configura las opciones de cURL
        curl_setopt($PerroSelecionado, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($PerroSelecionado, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($PerroSelecionado, CURLOPT_POST, true);
        curl_setopt($PerroSelecionado, CURLOPT_POSTFIELDS, json_encode($Data));
        $response = curl_exec($PerroSelecionado);

        curl_close($PerroSelecionado);

        $this->view->mostrarMensaje($response);
    }
}
