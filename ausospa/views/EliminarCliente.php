<?php
include_once(__DIR__ . '/Header.php');
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    //Recogemos variables necesarias para cada funcion

    //Con los parametros recogidos llamamos a la funcion son los parametros necesarios
}
?>

<main class="p-4 flex justify-center align-center gap-4">

    <!-- Formulario Eliminar Cliente -->
    <form method="DELETE" class="flex flex-col gap-4 w-full max-w-md mx-auto p-4 bg-white shadow-lg rounded-lg">
        <h2 class="font-bold text-xl text-center text-blue-800">Eliminar cliente</h2>
        <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DNI" type="text" name="delete_dni" id="dni" required>
        <button class="w-[150px] h-[50px] mx-auto shadow-lg rounded-lg hover:bg-gray-100" type="submit">Eliminar</button>
    </form>
</main>

<?php
include_once(__DIR__ . '/Footer.php');
?>