<?php

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $email = $_POST['email'] ?? '';
//     $password = $_POST['password'] ?? '';

//     // $empleadoController=new EmpleadoController();

//     // If login() => Header("Location: ./dashboard.php")
    
//     // PRUEBA DE CREDENCIALES
//     if ($email === "admin@example.com" && $password === "1234") {
//         echo "<script>alert('Inicio de sesión exitoso');</script>";
//         header("Location: ./ausospa/dashboard.php");
//     } else {
//         echo "<script>alert('Credenciales incorrectas');</script>";
//     }
// }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SpaRibera</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../resources/css/style.css">
</head>
<?php
include_once(__DIR__.'/views/loginView.php');
?>
</html>