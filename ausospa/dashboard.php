<?php
session_start();
if(empty($_SESSION['rol'])) 
{ 
    header('Location: ./index.php'); 
}

include_once(__DIR__ . '/views/Header.php');
// print_r($_SESSION['user']);
?>

<!-- Article Clientes -->
<main class="w-full p-4 max-w-[1200px] min-w-[600px] pb-10 flex gap-4 mx-auto justify-center align-center flex-wrap">
    <!-- <article class="flex flex-col justify-center align-center text-center gap-4 w-[100%] max-w-[400px] mt-4 bg-blue-100 rounded-lg p-4">

        <h1 class="text-center font-extrabold text-xl">Clientes</h1>

        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Cliente&action=listar">Listar Clientes</a></p>
        
        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Cliente&action=insertar">Añadir Cliente</a></p>

        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Cliente&action=eliminar">Eliminar Cliente</a></p>

    </article>

    <article class="flex flex-col justify-center align-center text-center gap-4 w-[100%] max-w-[400px] mt-4 bg-blue-100 rounded-lg p-4">
        
        <h1 class="text-center font-extrabold text-xl">Perros</h1>

        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Perro&action=listar">Listar Perros</a></p>
        
        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Perro&action=insertar">Añadir Perro</a></p>

        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Perro&action=eliminar">Eliminar Perro</a></p>

    </article>

    <article class="flex flex-col justify-center align-center text-center gap-4 w-[100%] max-w-[400px] mt-4 bg-blue-100 rounded-lg p-4">
        
        <h1 class="text-center font-extrabold text-xl">Servicios</h1>

        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Servicio&action=listar">Listar Servicios</a></p>
        
        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Servicio&action=insertar">Añadir Servicio</a></p>

        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Servicio&action=eliminar">Eliminar Servicio</a></p>

    </article>

    <article class="flex flex-col justify-center align-center text-center gap-4 w-[100%] max-w-[400px] mt-4 bg-blue-100 rounded-lg p-4">
        
        <h1 class="text-center font-extrabold text-xl">Servicios Realizados</h1>

        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=PerroRecibeSer&action=listar">Listar Servicios Realizados</a></p>
        
        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=PerroRecibeSer&action=insertar">Añadir Servicio Realizado</a></p>

        <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=PerroRecibeSer&action=eliminar">Eliminar Servicio Realizado</a></p>

    </article> -->

    <?php
    // if ROL==ADMIN (Sacar de sesion)
    // echo 
    // (
        //     <article class="flex flex-col justify-center align-center text-center gap-4 w-[100%] max-w-[400px] mt-4 bg-blue-100 rounded-lg p-4">
                
        //     <h1 class="text-center font-extrabold text-xl">Empleados</h1>
        
        //     <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Empleado&action=listar">Listar Empleados</a></p>
            
        //     <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Empleado&action=insertar">Añadir Empleado</a></p>
        
        //     <p class="w-[200px] mx-auto bg-blue-300 rounded-lg hover:bg-blue-500"><a href="./dashboard.php?controller=Empleado&action=eliminar">Eliminar Empleado</a></p>
        
        //      </article>
    // ) 
    ?>

</main>

<?php
include_once(__DIR__ . '/views/Footer.php');
require_once(__DIR__.'/controllers/FrontController.php');
?>