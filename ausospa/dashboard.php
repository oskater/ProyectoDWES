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
   
    <?php
    if(!isset($_GET['controller'])){
        ?>
        <div class="flex justify-center gap-4 h-[100vh] items-center absolute top-0 z-[-5]">

            <div class="flex flex-col justify-center gap-4 items-center w-max-[400px] p-[25px]">        
                <h1 class="text-[30px] text-blue-500">Bienvenido a SPA Ribera</h1>
                <img src="./resources/images/perro-pepino.png " alt="" class="w-[400px] rounded-md">
                <h2 class="text-[13px] text-blue-500 max-w-[400px] text-center">Sitio de gestion de SPA Ribera. Podras consultar clientes, servicios, y datos de nuestros empleados</h2>
            </div>
            
        </div>

        <?php
    }
    ?>

</main>

<?php
include_once(__DIR__ . '/views/Footer.php');
require_once(__DIR__.'/controllers/FrontController.php');
?>
