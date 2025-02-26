<?php
require_once('./../Basedatos.php');

class Cliente extends Basedatos
{

    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "CLIENTES";
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

    //B1. Método para insertar un nuevo CLIENTE
    public function insertCliente($data)
    {
        try {
            // Verificar si el DNI ya está registrado
            $sql_check = "SELECT COUNT(*) FROM $this->table WHERE Dni = ?";
            $stmt_check = $this->conexion->prepare($sql_check);
            $stmt_check->execute([$data['dni']]);
            if ($stmt_check->fetchColumn() > 0) {
                return ["error" => "El Cliente con DNI {$data['dni']} ya está dado de alta"];
            }

            // Insertar el nuevo CLIENTE
            $sql = "INSERT INTO $this->table (Dni, Nombre, Apellido1, Apellido2, Direccion, Tlfno)
                VALUES (:dni, :nombre, :apellido1, :apellido2, :direccion, :tlfno)";
            $stmt = $this->conexion->prepare($sql);

            // Asignar valores a los parámetros
            $stmt->bindParam(":dni", $data["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido1", $data["apellido1"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido2", $data["apellido2"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $data["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":tlfno", $data["tlfno"], PDO::PARAM_STR);

            // Ejecutar consulta sin parámetros adicionales
            if ($stmt->execute()) {
                return ["success" => "Cliente DNI: {$data['dni']} insertado correctamente"];
            } else {
                return ["error" => "Error al insertar el cliente"];
            }
        } catch (PDOException $e) {
            return ["error" => "Error en la base de datos: " . $e->getMessage()];
        }
    }

    public function deleteCliente($dni)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE dni=?";
            $sentencia = $this->conexion->prepare($sql);
            $sentencia->bindParam(1, $dni);
            $sentencia->execute();
            return "Registro eliminado exitosamente";
        } catch (PDOException $e) {
            return "ERROR AL ELIMINAR EL REGISTRO.<br>" . $e->getMessage();
        }
    }
    //B6. Método para borrar un Cliente
    // public function deleteCliente($dni)
    // {
    //     try {
    //         $sql = "DELETE FROM $this->table WHERE Dni = ?";
    //         $stmt = $this->conexion->prepare($sql);

    //         // Mensajes de éxito o error
    //         if ($stmt->execute([$dni])) {
    //             return ["success" => "Cliente DNI: $dni eliminado correctamente"];
    //         } else {
    //             return ["error" => "Error al eliminar el cliente"];
    //         }
    //     } catch (PDOException $e) {
    //         return ["error" => $e->getMessage()];
    //     }
    // }
}
