<?php
// require_once 'Empleado.php';
// require_once 'empleadoView.php';

class EmpleadoController {
    // private $empleado;
    private $empleadoView;

    public function __construct(){
        // $this->empleado = new Empleado();
        $this->empleadoView = new EmpleadoView();
    }
    
    public function mostrarFormulario(){
        $this->empleadoView->insertarEmpleado();
    }
    
    public function insertarEmpleado(){
        $data = [
            'Dni' => $_POST['dni'],
            'Email' => $_POST['email'],
            'Password' => $_POST['password'],
            'Rol' => $_POST['rol'],
            'Nombre' => $_POST['nombre'],
            'Apellido1' => $_POST['apellido'],
            'Apellido2' => '',  // Si no tienes segundo apellido, usa un string vacío
            'Calle' => $_POST['direccion'],
            'Numero' => '',
            'Cp' => '',
            'Poblacion' => '',
            'Provincia' => '',
            'Tlfno' => $_POST['telefono'],
            'Profesion' => ''
        ];
        $resultado = $this->empleado->insertEmpleado($data);
        return $resultado;
    }

}
?>
