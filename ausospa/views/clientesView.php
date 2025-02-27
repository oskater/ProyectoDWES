<?php
class ClienteView
{
    public function listarClientes($clientes)
    {
        // print_r($clientes);
        echo "
        <p class='cabecera'> Todos los clientes </p>
        <table class='my-16'>
        <tr>
            <th>Dni</th>
            <th>Nombre</th>
            <th>Apellido1</th>
            <th>Apellido2</th>
            <th>Direccion</th>
            <th>Tlfno</th>
            <th>
                <form action='./dashboard.php?controller=Cliente&action=modal_insertar' method='POST'>
                    <button class='border-2 border-green-500 hover:bg-green-500 p-2 rounded-lg'>Insertar</button>
                </form>
            </th>
        </tr>";

        foreach ($clientes as $cliente) {
            echo "<tr>";
            echo "<td>" . $cliente['Dni'] . "</td>";
            echo "<td>" . $cliente['Nombre'] . "</td>";
            echo "<td>" . $cliente['Apellido1'] . "</td>";
            echo "<td>" . $cliente['Apellido2'] . "</td>";
            echo "<td>" . $cliente['Direccion'] . "</td>";
            echo "<td>" . $cliente['Tlfno'] . "</td>";
            echo '<td>
                    <form action="./dashboard.php?controller=Cliente&action=modal_eliminar" method="POST">
                    <button class="border-2 border-red-500 hover:bg-red-500 p-2 rounded-lg" name="Dni" value=' . $cliente['Dni'] . '>Eliminar</button>
                    </form>
                </td>';
            echo "</tr>";
        }

        echo "</table>";
    }

    public function modal_insertar()
    {
        echo '<main class="p-4 flex justify-center align-center gap-4">
            <form action="./dashboard.php?controller=Cliente&action=insertar" method="POST" class="flex flex-col gap-4 w-full max-w-md mx-auto p-4 bg-white shadow-lg rounded-lg">
                <h2 class="font-bold text-xl text-center text-blue-800">Añadir nuevo cliente</h2>
                <input maxLength=9 pattern="\d{8}-?[A-Z]" class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DNI" type="text" name="dni" id="dni" required>
                <input maxLength=20 class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="NOMBRE" type="text" name="nombre" id="nombre" required>
                <input maxLength=20 class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="PRIMER APELLIDO" type="text" name="apellido1" id="apellido1" required>
                <input maxLength=20 class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="SEGUNDO APELLIDO" type="text" name="apellido2" id="apellido2" required>
                <input maxLength=50 class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="DIRECCIÓN" type="text" name="direccion" id="direccion" required>
                <input maxLength=9 class="px-2 rounded-md border-2 border-blue-500 focus:outline-0 focus:border-blue-800 focus:bg-gray-100" placeholder="TELÉFONO" type="text" name="telefono" id="telefono" required>
                <div class="flex justify-center items-center gap-4">
                    <button class="w-[150px] h-[50px] mx-auto shadow-lg rounded-lg hover:bg-gray-100" type="submit"><a href="./dashboard.php?controller=Cliente&action=listar">Cancelar</a></button>
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
                        <a href="./dashboard.php?controller=Cliente&action=listar"><button> Cancelar </button></a>
                        
                        <form action="./dashboard.php?controller=Cliente&action=eliminar" method="POST">
                        <button name="dni" value=' . $_POST['Dni'] . ' class="aceptar">Eliminar</button>
                        </form>
                    </div>

                </div>
            </div>';
    }
}
