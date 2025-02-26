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
                    <th><a class='border-2 border-green-500 hover:bg-green-500 p-2 rounded-sm' href='./dashboard.php?controller=Servicio&action=modal_insertar'>Insertar</a></th>
                </tr>";

        foreach ($todosLosServicios as $servicio) {
            echo "<tr>";
            echo "<td>" . $servicio['Codigo'] . "</td>";
            echo "<td>" . $servicio['Nombre'] . "</td>";
            echo "<td>" . $servicio['Precio'] . " €</td>";
            echo "<td>" . $servicio['Descripcion'] . "</td>";
            echo '<td><form action="./dashboard.php?controller=Servicio&action=modal_eliminar" method="POST">
                    <button class="border-2 border-red-500 hover:bg-red-500 p-2 rounded-sm" name="Codigo" value=' . $servicio['Codigo'] . '>Eliminar</button>
                </form></td>';
            echo "</tr>";

        }

        echo "</table>";

    }

    public function modal_insertar()
    {
        echo '<div class=modal>
        <div class=modal__container>
        <h2 class="font-bold text-xl text-center text-blue-800">Añadir nuevo servicio</h2>
            <form action="./dashboard.php?controller=Servicio&action=insertar" method="POST">
               <label for="tipoServicio">Tipo de servicio:</label>
                    <select name="tipoServicio" id="tipoServicio" required>
                        <option value="BELLEZA">BELLEZA</option>
                        <option value="NUTRICION">NUTRICION</option>
                    </select>
                    <br><br>

                    <!-- Input para nombre del servicio -->
                    <label for="nombre">Nombre del servicio:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <br><br>

                    <!-- Input para descripción del servicio -->
                    <label for="descripcion">Descripción del servicio:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                    <br><br>

                    <!-- Input para precio del servicio -->
                    <label for="precio">Precio del servicio (€):</label>
                    <input type="number" id="precio" name="precio" min="0.01" step="0.01" required>
                    <br><br>
                    
                    <div class="buttons">
                        <a href="./dashboard.php?controller=Servicio&action=listar"> Cancelar </a>
                        
                        <button type="submit" class="aceptar">Insertar</button>
                    </div>
            </form>
        </div>
    </div>';
    }



    public function modal_eliminar()
    {
        echo '<div class="modal">
                <div class="modal__container">

                    <h2>¿Seguro que deseas eliminar?</h2>
                    <h3>Esta accion es irreversible</h3>
                    <div class="buttons">
                        <a href="./dashboard.php?controller=Servicio&action=listar"><button> Cancelar </button></a>
                        
                        <form action="./dashboard.php?controller=Servicio&action=eliminar" method="POST">
                        <button name="Codigo" value=' . $_POST['Codigo'] . ' class="aceptar">Eliminar</button>
                        </form>
                    </div>

                </div>
            </div>';

    }
}

?>