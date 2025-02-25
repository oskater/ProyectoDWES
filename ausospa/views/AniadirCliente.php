<?php
// include_once(__DIR__ . '/Header.php');
?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once(__DIR__.'/../controllers/ClienteController.php');
    $controller=new ClienteController();
    //Recogemos variables necesarias para cada funcion
    $cliente = [
        "dni" => $_POST['dni'],
        "nombre" => $_POST['nombre'],
        "apellido1" => $_POST['apellido1'],
        "apellido2" => $_POST['apellido2'],
        "direccion" => $_POST['direccion'],
        "telefono" => $_POST['telefono']
    ];
    //Con los parametros recogidos llamamos a la funcion son los parametros necesarios
    $controller->insertarCliente($cliente);
}
?>

<main class="p-4 flex justify-center align-center gap-4">
<!-- Formulario Añadir Cliente -->
    <form action="#" method="POST" class="flex flex-col gap-4 w-full max-w-md mx-auto p-4 bg-white shadow-lg rounded-lg">
        <h2 class="font-bold text-xl text-center text-blue-800">Añadir nuevo cliente</h2>
        <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DNI" type="text" name="dni" id="dni" required>
        <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="NOMBRE" type="text" name="nombre" id="nombre" required>
        <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="PRIMER APELLIDO" type="text" name="apellido1" id="apellido1" required>
        <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="SEGUNDO APELLIDO" type="text" name="apellido2" id="apellido2" required>
        <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DIRECCIÓN" type="text" name="direccion" id="direccion" required>
        <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="TELÉFONO" type="text" name="telefono" id="telefono" required>
        <button class="w-[150px] h-[50px] mx-auto shadow-lg rounded-lg hover:bg-gray-100" type="submit">Añadir</button>
    </form>
</main>

<?php
// include_once(__DIR__ . '/Footer.php');
?>