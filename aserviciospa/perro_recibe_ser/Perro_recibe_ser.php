<!-- Arreglar -->

<?php
class PerroRecibeSer extends Basedatos
{

    private $table;
    private $conexion;

    public function __construct()
    {

        $this->table = "perro_recibe_servicio";
        $this->conexion = $this->getConexion();
    }

    // Obtener todos los registros
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement = null;
            return $registros ?: []; 
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    // Obtener un registro específico por sr_cod
    public function getUnRegistro($sr_cod)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE sr_cod=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $sr_cod);
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

    // Obtener un registro específico por sr_cod
    public function getRegistrosByEmpleado($dni)
    {
        try {
            $sql = "SELECT * FROM perro_recibe_ser WHERE Dni = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(1, $dni, PDO::PARAM_STR);
            $stmt->execute();
            $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $registros ?: []; 
        } catch (PDOException $e) {
            return ["ERROR" => "No se pudo cargar los registros.", "Mensaje" => $e->getMessage()];
        }
    }

    // Crear un nuevo registro
    public function createRegistro($cod_servicio, $ID_Perro, $incidencias, $precio_final, $dni)
    {
        try {
            $sql = "INSERT INTO $this->table (cod_servicio, ID_Perro, Fecha, Incidencias, Precio_final, Dni) 
                VALUES (?, ?, SYSDATE, ?, ?, ?)";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $cod_servicio);
            $sentencia->bindParam(2, $ID_Perro);
            $sentencia->bindParam(4, $incidencias);
            $sentencia->bindParam(5, $precio_final);
            $sentencia->bindParam(6, $dni);
            $sentencia->execute();
            return "Servicio SR_COD insertado correctamente";
        } catch (PDOException $e) {
            return "La inserccion no se pudo realizar.<br>" . $e->getMessage();
        }
    }

    // Actualizar un registro existente
    public function updateRegistro($sr_cod, $cod_servicio, $ID_Perro, $fecha, $incidencias, $precio_final, $dni)
    {
        try {
            $sql = "UPDATE $this->table SET 
                cod_servicio=?, ID_Perro=?, Fecha=?, Incidencias=?, Precio_final=?, Dni=? 
                WHERE sr_cod=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $cod_servicio);
            $sentencia->bindParam(2, $ID_Perro);
            $sentencia->bindParam(3, $fecha);
            $sentencia->bindParam(4, $incidencias);
            $sentencia->bindParam(5, $precio_final);
            $sentencia->bindParam(6, $dni);
            $sentencia->bindParam(7, $sr_cod);
            $sentencia->execute();
            return "Registro actualizado exitosamente";
        } catch (PDOException $e) {
            return "ERROR AL ACTUALIZAR EL REGISTRO.<br>" . $e->getMessage();
        }
    }

    // Eliminar un registro
    public function deleteRegistro($sr_cod)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE sr_cod=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $sr_cod);
            $sentencia->execute();
            return "Registro eliminado exitosamente";
        } catch (PDOException $e) {
            return "ERROR AL ELIMINAR EL REGISTRO.<br>" . $e->getMessage();
        }
    }
}
?>