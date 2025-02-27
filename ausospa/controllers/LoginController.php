<?php
class LoginController {
    public function __construct() {
        
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $verificar = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/empleados/index.php?email=$email&password=$password"), true);
                
            if($verificar==true){
                $this->takeRol();
                header("Location: http://localhost/ProyectoDWES/ausospa/dashboard.php");
            } else {
                echo "<script>alert('Usuario o contraseña incorrectos')</script>";
            }
        }
    }

    public function takeRol(){
            $email = $_POST['email'];
            $rol = json_decode(file_get_contents("http://localhost/ProyectoDWES/aserviciospa/empleados/index.php?email=$email"), true);
            session_start();
            $_SESSION['rol'] = $rol;
    }
}