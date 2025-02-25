<?php

class ServicioController
{

    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new Servicio();
        $this->view = new ServicioView();
    }

    // public function listarNav()
    // {
    //     $allVuelos = json_decode($this->model->getAllVuelos());
    //     $this->view->mostrarNav($allVuelos);
    // }

    // public function listarAllVuelos()
    // {
    //     $this->view->mostrarVuelos(json_decode($this->service->getAllVuelos()));
    // }

    // public function listarVuelo()
    // {
    //     $this->view->mostrarVuelos(json_decode($this->service->getVuelo($_GET['identificador'])));
    // }

    // public function getVuelos()
    // {
    //     return json_decode($this->service->getAllVuelos());
    // }
}