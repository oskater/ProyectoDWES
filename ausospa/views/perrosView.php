<?php
class PerroView
{
    private $actionContent = '';

    public function default()
    {
?>
        <nav class="">
            <a class="relative -top-6  left-[45%] p-4 bg-blue-200 hover:bg-blue-400 rounded-lg" href="./dashboard.php?controller=Perro&action=insertar" class="hover:underline">Insertar Perro</a>
        </nav>

<?php
        $this->ShowAction();
    }

    public function ShowAction()
    {
        echo "<div class='action-content'>" . $this->actionContent . "</div>";
    }


    public function setActionContent($content)
    {
        $this->actionContent = $content;
    }


    public function EliminarPerro()
    {
        return '
        <h2 class="text-primary p-3 mt-5">Borrar Perro</h2>
<form action="dashboard.php?controller=Perro&action=eliminar" method="post">
            <div class="form-group">
                <label for="chip">Chip del Perro:</label>
                <input type="text" class="form-control text-center" name="CHIP" placeholder="Ingrese el Chip del Perro">
            </div>
            <button type="submit" class="btn btn-danger mt-3">Borrar</button>
        </form>
    ';
    }


    public function InsertarPerro($result, $clientes)
    {

        $forminsert =   '<div class="container mt-5">
  <form class="p-4 rounded-md border-2 border-blue-200 w-full flex flex-col gap-4 m-12" action="dashboard.php?controller=Perro&action=insertar" method="post">';

        $forminsert .=     $this->selectinsert($clientes);

        $forminsert .=    '
           
        <div class="w-full flex gap-4 border-2 border-blue-200 p-2 rounded-lg">
            <label for="nombre">Nombre:</label>
            <input class="w-full max-w-[60%] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg" type="text" class="form-control text-center" id="nombre" name="Nombre" placeholder="Ingrese el Nombre"required>
        </div>
        <div class="w-full flex gap-4 border-2 border-blue-200 p-2 rounded-lg">
            <label for="fecha_nto">Fecha de Nacimiento:</label>
            <input class="text-gray-400 w-full max-w-[60%] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg" type="date" name="Fecha_Nto" class="form-control text-center" id="fecha_nto"required>
        </div>
        <div class="w-full flex gap-4 border-2 border-blue-200 p-2 rounded-lg">
            <label for="raza">Raza:</label>
            <input class="w-full max-w-[60%] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg" type="text" class="form-control text-center" name="Raza" id="raza" placeholder="Ingrese la Raza"required>
        </div>
        <div class="w-full flex gap-4 border-2 border-blue-200 p-2 rounded-lg">
            <label for="peso">Peso:</label>
            <input class="w-full max-w-[60%] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg" type="number" step="0.01" class="form-control text-center" name="peso" placeholder="Ingrese el Peso"required>
        </div>
        <div class="w-full flex gap-4 border-2 border-blue-200 p-2 rounded-lg">
            <label for="altura">Altura:</label>
            <input class="w-ful max-w-[60%] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg" type="number" step="0.01" class="form-control text-center" name="Altura" id="altura" placeholder="Ingrese la Altura"required>
        </div>
        <div class="w-full flex gap-4 border-2 border-blue-200 p-2 rounded-lg">
            <label for="observaciones">Observaciones:</label>
            <textarea class="w-full max-w-[60%] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg" class="form-control text-center" id="observaciones" name="Observaciones" placeholder="Ingrese las Observaciones"required></textarea>
        </div>
        <div class="w-full flex gap-4 border-2 border-blue-200 p-2 rounded-lg">
            <label for="n_chip">Nº de Chip:</label>
            <input class="w-full max-w-[60%] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg" type="text" class="form-control text-center" name="Numero_Chip" id="n_chip" placeholder="Ingrese el Nº de Chip"required>
        </div>
        <div class="w-full flex gap-4 border-2 border-blue-200 p-2 rounded-lg">
            <label for="sexo">Sexo:</label>
            <select class="w-full max-w-[60%] text-gray-400 border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg" class="form-control text-center" name="Sexo" id="sexo"required>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
            </select>
        </div>
        <button class="text-white p-4 bg-blue-200 hover:bg-blue-400 rounded-lg" type="submit">Insertar</button>
    </form>
</div>
';

        return $forminsert;
    }

    public function ListarPerroporDni($result, $dnis = null)
    {
        // $this->selectdnis($dnis);

        $list = '
    <table class="my-16">
    <tr>
        <th>Dni Dueño</th>
        <th>Nombre</th>
        <th>Fecha de Nacimiento</th>
        <th>Raza</th>
        <th>Peso</th>
        <th>Altura</th>
        <th>Observaciones</th>
        <th>Nº de Chip</th>
        <th>Sexo</th>
        <th>Eliminar Perro</th>
    </tr>';

        foreach ($result as $Perro) {
            if (!$dnis || $dnis == $Perro['Dni_duenio']) {
                $list .= '<tr>';
                $list .= '<td>' . $Perro['Dni_duenio'] . '</td>';
                $list .= '<td>' . $Perro['Nombre'] . '</td>';
                $list .= '<td>' . $Perro['Fecha_Nto'] . '</td>';
                $list .= '<td>' . $Perro['Raza'] . '</td>';
                $list .= '<td>' . $Perro['Peso'] . '</td>';
                $list .= '<td>' . $Perro['Altura'] . '</td>';
                $list .= '<td>' . $Perro['Observaciones'] . '</td>';
                $list .= '<td>' . $Perro['Numero_Chip'] . '</td>';
                $list .= '<td>' . $Perro['Sexo'] . '</td>';
                $list .= '<td>
                <form action="./dashboard.php?controller=Perro&action=modal_eliminar" method="POST">
                   <input type="hidden" name="CHIP" value="' . $Perro['Numero_Chip'] . '" class="aceptar">
                   <button class="border-2 border-red-500 hover:bg-red-500 p-2 rounded-sm" name="Dni" value="uteutyr">Eliminar</button>
                </form>
            </td>';
                $list .= '</tr>';
            }
        }

        $list .= '</table>';

        return $list;
    }


    public function modal_eliminar($CHIP)
    {


        print ' <p class="cabecera"> Todos los Perros </p> <div class="modal">
                <div class="modal__container">

                    <h2>¿Seguro que deseas eliminar el Perro ?</h2>
                    <h3>Esta accion es irreversible</h3>
                    <div class="buttons">
                        <a href="./dashboard.php?controller=Perro&action=listar"><button> Cancelar </button></a>
                        
                        <form action="./dashboard.php?controller=Perro&action=eliminar" method="POST">
                         <input type="hidden" name="CHIP" value=' . $CHIP . ' class="aceptar">
                        <button name="submit" type="submit"  class="aceptar">Eliminar</button>
                        </form>
                    </div>

                </div>
            </div>';
    }


    public function selectdnis($result)
    {
        // Para verificar el contenido de $result
        // print_r($result);  // Esta línea es solo para depuración

        // Iniciar el formulario
        $select = '
        <form class="max-w-[600px] flex justify-center gap-4 p-4 border-2 border-blue-200 rounded-lg mx-auto" action="./dashboard.php?controller=Perro&action=listar" method="POST">
            <div>
            <label class="bg-blue-200 p-2 rounded-md" for="Select">Filtra mediante el DNI del cliente:</label>
            <select class="bg-blue-200 p-2 rounded-md" class="form-control" id="Select" name="Dni">
                <option value="">Selecciona una opción</option>';
        // Agregar las opciones del array $result
        foreach ($result as $key => $value) {
            $select .= '<option value="' . htmlspecialchars($value['Dni']) . '">' . htmlspecialchars($value['Dni']) . '</option>';
        }
        // Finalizar el formulario
        $select .= '
                </select>
                </div>
            <button class="bg-blue-200 hover:bg-blue-400 p-2 rounded-md" type="submit" class="btn btn-primary col-12">Filtrar</button>
        </form>';

        return $select;
    }

    public function selectinsert($result)
    {
        $select =
            '<label class="bg-blue-200 p-2 rounded-md" for="Select" for="Select">Selecciona un DNI de clientes</label>
                <select class="w-ful max-w-[60%] border-2 border-blue-200 focus:outline-blue-500 focus:border-0 px-2 rounded-lg" id="Select" name="Dni_duenio">
        
                <option value="">DNI</option>';

        // Agregar las opciones del array $result
        foreach ($result as $key => $value) {
            $select .= '<option value="' . htmlspecialchars($value['Dni']) . '">' . htmlspecialchars($value['Dni']) . '</option>';
        }

        // Finalizar el formulario
        $select .= '
            </select>';

        return $select;
    }
}