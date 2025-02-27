<?php
class EmpleadoView
{
    public function listarEmpleados($empleados)
    {
        echo "
        <p class='cabecera'> Empleados </p>
        <table class='my-16'>
        <tr>
            <th>DNI</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Primer Ape</th>
            <th>Segundo Ape</th>
            <th>Telefono</th>
            <th>Rol</th>
            <th>
                <form action='./dashboard.php?controller=Empleado&action=modal_insertar' method='POST'>
                    <button class='border-2 border-green-500 hover:bg-green-500 p-2 rounded-lg'>Insertar</button>
                </form>
            </th>
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
            echo '<td>
                <form action="./dashboard.php?controller=Empleado&action=modal_eliminar" method="POST">
                <button class="border-2 border-red-500 hover:bg-red-500 p-2 rounded-lg" name="Dni" value=' . $empleado['Dni'] . '>Eliminar</button>
                </form>
                </td>';
            echo "</tr>";
        }
        echo "</table>";
    }
    
    public function modal_insertar()
    {
        echo '<main class="p-4 flex justify-center align-center gap-4">
            <form action="./dashboard.php?controller=Empleado&action=insertar" method="POST" class="flex flex-col gap-4 w-full max-w-md mx-auto p-4 bg-white shadow-lg rounded-lg">
                <h2 class="font-bold text-xl text-center text-blue-800">Añadir nuevo Empleado</h2>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DNI" type="text" name="dni" id="dni" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="EMAIL" type="text" name="email" id="email" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="CONTRASEÑA" type="password" name="password" id="password" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="NOMBRE" type="text" name="nombre" id="nombre" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="PRIMER APELLIDO" type="text" name="apellido1" id="apellido1" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="SEGUNDO APELLIDO" type="text" name="apellido2" id="apellido2" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="CALLE" type="text" name="calle" id="calle" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="NUMERO" type="number" name="numero" id="numero" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="CP" type="number" name="cp" id="cp" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="POBLACION" type="text" name="poblacion" id="poblacion" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="PROVINCIA" type="text" name="provincia" id="provincia" required>
                <input class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="TELEFONO" type="text" name="tlfno" id="tlfno" required>
                <select class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" name="rol" id="rol" required>
                    <option value="" disabled selected>ROL</option>
                    <option value="ADMIN">ADMIN</option>
                    <option value="EMPLEADO">EMPLEADO</option>
                </select>
                <select class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" name="profesion" id="profesion" required>
                    <option value="" disabled selected>PROFESION</option>
                    <option value="NUTRICIONISTA">NUTRICIONISTA</option>
                    <option value="ESTILISTA">ESTILISTA</option>
                    <option value="AUXILIAR">AUXILIAR</option>
                    <option value="ATT.CLIENTE">ATT.CLIENTE</option>
                    <option value="ADMIN">ADMIN</option>
                </select>
                <div class="flex justify-center items-center gap-4">
                    <button class="w-[150px] h-[50px] mx-auto shadow-lg rounded-lg hover:bg-gray-100"><a href="./dashboard.php?controller=Empleado&action=listar">Cancelar</a></button>
                    <button class="w-[150px] h-[50px] mx-auto shadow-lg rounded-lg hover:bg-gray-100" type="submit">Añadir</button>
                </div>
            </form>
        </main>';
    }
    
    public function modal_eliminar()
    {
        echo '<div class="modal">
                <div class="modal__container">

                    <h2>¿Seguro que deseas eliminar?</h2>
                    <h3>Esta accion es irreversible</h3>
                    <div class="buttons">
                        <a href="./dashboard.php?controller=Empleado&action=listar"><button> Cancelar </button></a>
                        
                        <form action="./dashboard.php?controller=Empleado&action=eliminar" method="POST">
                        <button name="dni" value=' . $_POST['Dni'] . ' class="aceptar">Eliminar</button>
                        </form>
                    </div>

                </div>
            </div>';
    }
}
