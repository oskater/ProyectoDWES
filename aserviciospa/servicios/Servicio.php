
<?php
class Servicio extends Basedatos
{

    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "SERVICIOS";
        $this->conexion = $this->getConexion();
    }

    // Obtener todos los servicios
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    // Obtener un servicio por su ID
    public function getUnServicioById($id)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE CODIGO=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $id);
            $sentencia->execute();
            $row = $sentencia->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return $row;
            }
            return "SIN DATOS";
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    // Obtener todos los servicios
    public function getUnServicioByDni($dni)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE DNI=?";
            $statement = $this->conexion->prepare($sql);
            $statement->bindParam(1, $dni);
            $statement->execute();
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            return $registros;
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    // Crear un nuevo servicio
    public function createServicio($tipoServicio, $nombre, $descripcion, $precio)
    {
        try {
            if ($tipoServicio == "BELLEZA") {
                $sql = "SELECT MAX(SUBSTR(Codigo, 5)) + 1 AS SIGUIENTE FROM SERVICIOS WHERE SUBSTR(Codigo, 1, 4) = 'SVBE'";
            } else if ($tipoServicio == "NUTRICION") {
                $sql = "SELECT MAX(SUBSTR(Codigo, 6)) + 1 AS SIGUIENTE FROM SERVICIOS WHERE SUBSTR(Codigo, 1, 5) = 'SVNUT'";
            } else {
                return $_POST ;
            }

            // Preparar y ejecutar la consulta para obtener el siguiente número del código
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

            // Si no hay códigos existentes, el siguiente será 1
            $siguienteCodigo = $resultado['SIGUIENTE'];

            // Construir el nuevo código
            if ($tipoServicio == "BELLEZA") {
                $codigo = "SVBE" . $siguienteCodigo; // Asegurarse que el código tenga 4 dígitos
            } elseif ($tipoServicio == "NUTRICION") {
                $codigo = "SVNUT" . $siguienteCodigo; // Asegurarse que el código tenga 4 dígitos
            }
            
            $sql = "INSERT INTO $this->table (Codigo, Nombre, Descripcion, Precio) VALUES (?, ?, ?, ?)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $codigo);
            $sentencia->bindParam(2, $nombre);
            $sentencia->bindParam(3, $descripcion);
            $sentencia->bindParam(4, $precio);
            $sentencia->execute();
            return "Servicio codigo " . $codigo .  " creado exitosamente";
        } catch (PDOException $e) {
            return $e;
        }
    }

    // Actualizar un servicio existente
    public function updateServicio($codigo, $nombre, $descripcion, $precio)
    {
        try {
            $sql = "UPDATE $this->table SET NOMBRE=?, DESCRIPCION=?, PRECIO=? WHERE CODIGO=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $nombre);
            $sentencia->bindParam(2, $descripcion);
            $sentencia->bindParam(3, $precio);
            $sentencia->bindParam(4, $codigo);
            $sentencia->execute();
            return "Servicio actualizado exitosamente";
        } catch (PDOException $e) {
            return "ERROR AL ACTUALIZAR EL SERVICIO.<br>" . $e->getMessage();
        }
    }

    // Eliminar un servicio
    public function deleteServicio($codigo)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE CODIGO=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $codigo);
            $sentencia->execute();
            return "Servicio eliminado exitosamente";
        } catch (PDOException $e) {
            return "ERROR AL ELIMINAR EL SERVICIO.<br>" . $e->getMessage();
        }
    }
}


?>
