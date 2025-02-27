<?php
require_once(__DIR__ . '/../views/perrosView.php');

class PerroController
{
    private $perroView;

    public function __construct()
    {
        $this->perroView = new PerroView();
    }

    public function comprobarAction()
    {
        $actionContent = ''; // Almacena el resultado de la acción

        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'listar':
                    $actionContent .=   $this->getAlldni();
                    $actionContent .=    $this->listar();
                    break;
                case 'insertar':
                    $actionContent = $this->insertar();
                    break;
                case 'eliminar':
                    $actionContent = $this->eliminar();
                    break;
                case 'modal_eliminar':
                    $actionContent = $this->modal_eliminar();
                    break;

                default:
                    $this->default();
                    return;
            }
        }

        $this->perroView->setActionContent($actionContent);
        $this->perroView->default();
    }



    public function listar()
    {
        $this->getAlldni();
        $dni =  null;
        $url = 'http://localhost/ProyectoDWES/aserviciospa/perros/';
        $options = array(
            'http' => array(

                'header'  => "Content-type: application/json\r\n",
                'method'  => 'GET',

            ),
        );

        $context  = stream_context_create($options);
        // $result = json_decode(file_get_contents($url, false, $context));
        $result = json_decode(file_get_contents($url, false, $context), true);

        //http://localhost/ProyectoDWES/aserviciospa/perros/?dnis=true
        // print_r($result);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['Dni']) && $_POST['Dni']) {
                $dni =  $_POST['Dni'];
            }
        }

        return $this->perroView->ListarPerroporDni($result, $dni);
    }

    public function insertar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['Dni_duenio']  &&  $_POST['Nombre'] && $_POST['Fecha_Nto'] && $_POST['Raza'] && $_POST['peso'] && $_POST['Altura'] && $_POST['Observaciones'] && $_POST['Numero_Chip'] && $_POST['Sexo']) {
                $Dni_duenio = $_POST['Dni_duenio'];

                $Nombre = $_POST['Nombre'];
                $Fecha_Nto = $_POST['Fecha_Nto'];
                $Raza = $_POST['Raza'];
                $peso = $_POST['peso'];
                $Observaciones = $_POST['Observaciones'];
                $Altura = $_POST['Altura'];
                $Numero_Chip = $_POST['Numero_Chip'];
                $Sexo = $_POST['Sexo'];


                $data = json_encode(array(


                    "Dni_duenio" => $Dni_duenio,
                    "Nombre" => $Nombre,
                    "Fecha_Nto" => $Fecha_Nto,
                    "Raza" => $Raza,
                    "Peso" => $peso,
                    "Altura" => $Altura,
                    "Observaciones" => $Observaciones,
                    "Numero_Chip" => $Numero_Chip,
                    "Sexo" => $Sexo

                ));

                $url = 'http://localhost/ProyectoDwes/aserviciospa/perros/';
                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/json\r\n",
                        'method'  => 'POST',
                        'content' => $data,
                    ),
                );

                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                print $result;
            }
        }
        $resul =  $this->getdnis();
        $clintes =  $this->getdnisclienets();

        return $this->perroView->InsertarPerro($resul, $clintes);
    }

    public function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['CHIP'])) {


                $chip = $_POST['CHIP'];
                $data = json_encode(array("Numero_Chip" => $chip));

                $url = 'http://localhost/ProyectoDWES/aserviciospa/perros/';
                $options = array(
                    'http' => array(
                        'header'  => "Content-type: application/json\r\n",
                        'method'  => 'DELETE',
                        'content' => $data,
                    ),
                );

                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);


                //echo $result;
            }
        }

        return     $this->listar();
    }


    public function modal_eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['CHIP'])) {
                $CHIP = $_POST['CHIP'];
                $this->perroView->modal_eliminar($CHIP);
            }
        }
    }



    public function getAlldni()
    {

        $resul =  $this->getdnisclienets();

        return $this->perroView->selectdnis($resul);
    }




    public function getdnis()
    {

        $url = 'http://localhost/ProyectoDWES/aserviciospa/perros/?dnis=true';
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'GET',

            ),
        );

        $context  = stream_context_create($options);
        // $result = json_decode(file_get_contents($url, false, $context));
        $result = json_decode(file_get_contents($url, false, $context), true);


        return $result;
    }


    public function  getdnisclienets()
    {

        $url = 'http://localhost/ProyectoDWES/aserviciospa/clientes/';
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'GET',

            ),
        );

        $context  = stream_context_create($options);
        // $result = json_decode(file_get_contents($url, false, $context));
        $result = json_decode(file_get_contents($url, false, $context), true);


        return $result;
    }

    public function default()
    {
        $this->perroView->default();
    }
}