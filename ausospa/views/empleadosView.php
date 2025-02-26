<?php
class EmpleadoView
{
    public function listarEmpleados($empleados)
    {
        echo "
        <p class='cabecera'> Todos los Empleados </p>
        <table class='my-16'>
        <tr>
            <th>DNI</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Telefono</th>
            <th>Rol</th>
        </tr>";

        foreach ($empleados as $empleado) {
            echo "<tr>";
            echo "<td>" . $empleado['Dni'] . "</td>";
            echo "<td>" . $empleado['Email'] . "</td>";
            echo "<td>" . $empleado['Nombre'] . "</td>";
            echo "<td>" . $empleado['Apellido1'] . "</td>";
            echo "<td>" . $empleado['Apellido2'] . "</td>";
            echo "<td>" . $empleado['Tlfno'] . " </td>";
            echo "<td>" . $empleado['Rol'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
    public function formInsertarEmpleado()
    {
        echo "insertar empleados";
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
    
    public function formEliminarEmpleado()
    {
        echo "eliminar empleados";
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
}
