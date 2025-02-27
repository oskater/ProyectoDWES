<?php
class ServiciosRealizadosView
{
    public function listarServiciosRealizados($todosLosServicios, $empleados)
    {


        echo "<p class='cabecera'> Todos los servicios realizados </p>";
        echo "<div class='mx-auto'>";
            echo "<form class='flex gap-4' method='POST' action='./dashboard.php?controller=PerroRecibeSer&action=listarPorEmpleado'>";
                echo "<select class='w-[300px] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg' name='Dni' >";
                    echo "<option selected>Selecciona un empleado</option>";
                    foreach ($empleados as $empleado) {
                        echo " <option value='" . $empleado["Dni"] . "'>";
                        echo $empleado["Nombre"] . " " . $empleado["Apellido1"] . " - " . $empleado['Dni'];
                        echo " </option>";
                    }
                echo "</select>";
                echo "<button class='text-white px-4 py-2 bg-blue-200 hover:bg-blue-400 rounded-lg' type='submit'>Enviar</button>";
            echo "</form>";
        echo "</div>";
        if ($todosLosServicios != []) {
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
            <th><a class='border-2 border-green-500 hover:bg-green-500 p-2 rounded-lg' href='./dashboard.php?controller=PerroRecibeSer&action=modal_insertar'>Insertar</a></th>
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
                    <button class="border-2 border-red-500 hover:bg-red-500 p-2 rounded-lg" name="sr_cod" value=' . $servicio['Sr_Cod'] . '>Eliminar</button>
                </form></td>';
                echo "</tr>";


            }


            echo "</table>";
        } else {
            echo "<p class='mensaje_error'>No hay registros</p>";
        }
    }
    public function listarServiciosRealizadosPorEmpleado($todosLosServiciosDeUnEmpleado, $empleados, $Dni)
    {
        echo "<p class='cabecera'> Servicios realizados por empleado </p>";
        echo "<div class='mx-auto'>";
        echo "<form class='flex gap-4' method='POST' action='./dashboard.php?controller=PerroRecibeSer&action=listarPorEmpleado'>";
            echo "<select class='w-[300px] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg' name='Dni' >";
                echo "<option value=''>Selecciona un empleado</option>";
                foreach ($empleados as $empleado) {
                    echo " <option value='" . $empleado["Dni"] . "'";
                    if ($empleado['Dni'] == $Dni) {
                        echo "selected";
                    }
                    echo ">";
                    echo $empleado["Nombre"] . " " . $empleado["Apellido1"] . " - " . $empleado['Dni'];
                    echo " </option>";
                }
            echo "</select>";
            echo "<button class='text-white px-4 py-2 bg-blue-200 hover:bg-blue-400 rounded-lg' type='submit'>Consultar</button>";
        echo "</form>";
        echo "</div>";
        if ($todosLosServiciosDeUnEmpleado != []) {


            echo "<table class='my-16'>
            <tr>
            <th>sr_cod</th>
            <th>cod_servicio</th>
            <th>ID_Perro</th>
            <th>Fecha</th>
            <th>Incidencias</th>
            <th>Precio_final</th>
            <th>Dni</th>
            <th><button class='border-2 border-green-500 hover:bg-green-500 p-2 rounded-lg' name='sr_cod'>Insertar</button></th>
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
                    <button class="border-2 border-red-500 hover:bg-red-500 p-2 rounded-lg" name="sr_cod" value=' . $servicio['Sr_Cod'] . '>Eliminar</button>
                </form></td>';
                echo "</tr>";


            }


            echo "</table>";
        } else {
            echo "<p class='mensaje_error'>No hay registros</p>";
        }
    }


    public function modal_insertar($todosLosServicios, $todosLosPerros, $todosLosEmpleados)
    {


        $hoy = date('Y-m-d');


        echo '<div class="modal">';
        echo ' <form action="./dashboard.php?controller=PerroRecibeSer&action=insertar" method="POST">
        <div class="modal__container">';


        echo '<label for="fecha">Selecciona un empleado:</label>';
        echo "<select name='Dni' >";
        echo "<option selected>Selecciona un empleado</option>";
        foreach ($todosLosEmpleados as $empleado) {
            echo " <option value='" . $empleado["Dni"] . "'>";
            echo $empleado["Nombre"] . " " . $empleado["Apellido1"] . " - " . $empleado['Dni'];
            echo " </option>";
        }
        echo "</select>";




        echo '<label for="fecha">Selecciona un perro:</label>';
        echo "<select name='ID_Perro' >";
        echo "<option selected>Selecciona un perro</option>";
        foreach ($todosLosPerros as $perro) {
            echo " <option value='" . $perro["ID_Perro"] . "'>";
            echo $perro["Nombre"] . " - " . $perro['ID_Perro'];
            echo " </option>";
        }
        echo "</select>";




        echo '<label for="fecha">Selecciona un servicio:</label>';
        echo "<select name='Cod_Servicio' >";
        echo "<option selected>Selecciona un servicio</option>";
        foreach ($todosLosServicios as $servicio) {
            echo " <option value='" . $servicio["Codigo"] . "'>";
            echo $servicio["Codigo"] . " - " . $servicio['Nombre'];
            echo " </option>";
        }
        echo "</select>";


        echo '<label for="Incidencias">Incidencias</label>
        <input type="text" id="Incidencias" name="Incidencias">';


        echo '<label for="fecha">Selecciona una fecha:</label>
        <input type="date" id="fecha" name="Fecha" max="' . $hoy . '">';


        echo '<label for="precio">Selecciona un precio:</label>
        <input type="number" step=0.01 min=0 name="Precio_final">';


        echo '<div class="buttons">';
        echo "<a href='./dashboard.php?controller=PerroRecibeSer&action=listar'>Cancelar</a>";
        echo "<button type='submit'>Insertar</button>";
        echo '</div>';
        echo '</div>';
        echo "</form>";
        echo '</div">';


    }


    public function insertar()
    {


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
                        <button name="sr_cod" value=' . $_POST['sr_cod'] . ' class="aceptar">Eliminar</button>
                        </form>
                    </div>


                </div>
            </div>';


    }
}


?>
