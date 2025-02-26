

<?php
class ServiciosRealizadosView
{
    public function listarServiciosRealizados($todosLosServicios, $empleados)
    {

        echo "<p class='cabecera'> Todos los servicios realizados </p>";
        echo "<div class='filters'>";
        echo "<form method='POST' action='./dashboard.php?controller=PerroRecibeSer&action=listarPorEmpleado'>";
        echo "<select name='Dni' >";
        echo "<option selected>Selecciona un empleado</option>";
        foreach ($empleados as $empleado) {
            echo " <option value='" . $empleado["Dni"] . "'>";
            echo $empleado["Nombre"] . " " . $empleado["Apellido1"] . " - " . $empleado['Dni'];
            echo " </option>";
        }
        echo "</select>";
        echo "<button type='submit'>Enviar</button>";
        echo "</form>";
        echo "</div>";
        if($todosLosServicios != []){
        echo "<table class='my-16'>";
        echo "
        <table class='my-16'>
        <tr>
            <th>sr_cod</th>
            <th>cod_servicio</th>
            <th>ID_Perro</th>
            <th>Fecha</th>
            <th>Incidencias</th>
            <th>Precio_final</th>
            <th>Dni</th>
            <th><button class='border-2 border-green-500 hover:bg-green-500 p-2 rounded-sm' name='sr_cod'>Insertar</button></th>
        </tr>";

        foreach ($todosLosServicios as $servicio) {
            echo "<tr>";
            echo "<td>" . $servicio['Sr_Cod'] . "</td>";
            echo "<td>" . $servicio['Cod_Servicio'] . "</td>";
            echo "<td>" . $servicio['ID_Perro'] . "</td>";
            echo "<td>" . $servicio['Fecha'] . "</td>";
            echo "<td>" . $servicio['Incidencias'] . "</td>";
            echo "<td>" . $servicio['Precio_Final'] . " €</td>";
            echo "<td>" . $servicio['Dni'] . "</td>";
            echo '<td><form action="./dashboard.php?controller=PerroRecibeSer&action=modal_eliminar" method="POST">
                    <button class="border-2 border-red-500 hover:bg-red-500 p-2 rounded-sm" name="sr_cod" value='. $servicio['Sr_Cod'] . '>Eliminar</button>
                </form></td>';
            echo "</tr>";

        }

        echo "</table>";
    }else {
        echo "<p class='mensaje_error'>No hay registros</p>";
    }
    }
    public function listarServiciosRealizadosPorEmpleado($todosLosServiciosDeUnEmpleado, $empleados, $Dni)
    {
        echo "<p class='cabecera'> Servicios realizados por empleado </p>";
        echo "<div class='filters'>";
        echo "<form method='POST' action='./dashboard.php?controller=PerroRecibeSer&action=listarPorEmpleado'>";
        echo "<select name='Dni' >";
        echo "<option value=''>Selecciona un empleado</option>";
        foreach ($empleados as $empleado) {
            echo " <option value='" . $empleado["Dni"] . "'";
            if($empleado['Dni'] == $Dni){echo "selected";}
            echo ">";
            echo $empleado["Nombre"] . " " . $empleado["Apellido1"] . " - " . $empleado['Dni'];
            echo " </option>";
        }
        echo "</select>";
        echo "<button type='submit'>Consultar</button>";
        echo "</form>";
        echo "</div>";
        if($todosLosServiciosDeUnEmpleado != []){

            echo "<table class='my-16'>
            <tr>
            <th>sr_cod</th>
            <th>cod_servicio</th>
            <th>ID_Perro</th>
            <th>Fecha</th>
            <th>Incidencias</th>
            <th>Precio_final</th>
            <th>Dni</th>
            <th><button class='border-2 border-green-500 hover:bg-green-500 p-2 rounded-sm' name='sr_cod'>Insertar</button></th>
        </tr>";
        

            foreach ($todosLosServiciosDeUnEmpleado as $servicio) {
                echo "<tr>";
            echo "<td>" . $servicio['Sr_Cod'] . "</td>";
            echo "<td>" . $servicio['Cod_Servicio'] . "</td>";
            echo "<td>" . $servicio['ID_Perro'] . "</td>";
            echo "<td>" . $servicio['Fecha'] . "</td>";
            echo "<td>" . $servicio['Incidencias'] . "</td>";
            echo "<td>" . $servicio['Precio_Final'] . " €</td>";
            echo "<td>" . $servicio['Dni'] . "</td>";
            echo '<td><form action="./dashboard.php?controller=PerroRecibeSer&action=modal_eliminar" method="POST">
                    <button class="border-2 border-red-500 hover:bg-red-500 p-2 rounded-sm" name="sr_cod" value='. $servicio['Sr_Cod'] . '>Eliminar</button>
                </form></td>';
            echo "</tr>";

        }

        echo "</table>";
        }else {
            echo "<p class='mensaje_error'>No hay registros</p>";
        }
    }

    public function formInsertarServicioRealizado()
    {
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

    public function formEliminarServicioRealizado()
    {
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
    
    public function modal_eliminar()
    {
        echo '<div class="modal">
                <div class="modal__container">

                    <h2>¿Seguro que deseas eliminar?</h2>
                    <h3>Esta accion es irreversible</h3>
                    <div class="buttons">
                        <a href="./dashboard.php?controller=PerroRecibeSer&action=listar"><button> Cancelar </button></a>
                        
                        <form action="./dashboard.php?controller=PerroRecibeSer&action=eliminar" method="POST">
                        <button name="sr_cod" value='. $_POST['sr_cod'] . ' class="aceptar">Eliminar</button>
                        </form>
                    </div>

                </div>
            </div>';

    }
}
