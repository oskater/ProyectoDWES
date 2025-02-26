<?php
class ServiciosView
{
    public function listarServicios($todosLosServicios)
    {
        // print_r($todosLosServicios);
        echo "<p class='cabecera'> Todos los servicios existentes </p>
        <table class='my-16'>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th><a class='border-2 border-green-500 hover:bg-green-500 p-2 rounded-sm' href='./dashboard.php?controller=Servicio&action=modal_eliminar'>Insertar</a></th>
                </tr>";

        foreach ($todosLosServicios as $servicio) {
            echo "<tr>";
            echo "<td>" . $servicio['Codigo'] . "</td>";
            echo "<td>" . $servicio['Nombre'] . "</td>";
            echo "<td>" . $servicio['Precio'] . " €</td>";
            echo "<td>" . $servicio['Descripcion'] . "</td>";
            echo "<td>
            <a class='border-2 border-red-500 hover:bg-red-500 p-2 rounded-sm' href='./dashboard.php?controller=Servicio&action=modal_eliminar'>Eliminar</a>
            </td>";
            echo "</tr>";

        }

        echo "</table>";

    }

    public function formInsertarServicio()
    {
        echo "insertaar servicio php";
        //     <form action="#" method="POST" class="flex flex-col gap-4 w-full max-w-md mx-auto p-4 bg-white shadow-lg rounded-lg">
        //         <h2 class="font-bold text-xl text-center text-blue-800">Añadir nuevo cliente</h2>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DNI" type="text" name="dni" id="dni" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="NOMBRE" type="text" name="nombre" id="nombre" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="PRIMER APELLIDO" type="text" name="apellido1" id="apellido1" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="SEGUNDO APELLIDO" type="text" name="apellido2" id="apellido2" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DIRECCIÓN" type="text" name="direccion" id="direccion" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="TELÉFONO" type="text" name="telefono" id="telefono" required>
        //         <button class="w-[150px] h-[50px] mx-auto shadow-lg rounded-lg hover:bg-gray-100" type="submit">Añadir</button>
        //     </form>
    }

    public function formEliminarServicio()
    {
        echo "eliminar servicio php";
        // <main class="p-4 flex justify-center align-center gap-4">
        //     <form action="#" method="POST" class="flex flex-col gap-4 w-full max-w-md mx-auto p-4 bg-white shadow-lg rounded-lg">
        //         <h2 class="font-bold text-xl text-center text-blue-800">Añadir nuevo cliente</h2>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DNI" type="text" name="dni" id="dni" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="NOMBRE" type="text" name="nombre" id="nombre" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="PRIMER APELLIDO" type="text" name="apellido1" id="apellido1" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="SEGUNDO APELLIDO" type="text" name="apellido2" id="apellido2" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DIRECCIÓN" type="text" name="direccion" id="direccion" required>
        //         <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="TELÉFONO" type="text" name="telefono" id="telefono" required>
        //         <button class="w-[150px] h-[50px] mx-auto shadow-lg rounded-lg hover:bg-gray-100" type="submit">Añadir</button>
        //     </form>
        // </main>
    }

    public function modalEliminar()
    {
        echo '<div class="modal">
                <div class="modal__container">
                    <p>Eliminar modal</p>
                </div>
            </div>';

    }
}

?>