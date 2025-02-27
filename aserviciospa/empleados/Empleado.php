<?php
require_once('./../Basedatos.php');

class Empleado extends Basedatos
{

    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "EMPLEADOS";
        $this->conexion = $this->getConexion();
    }

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

    public function getRol($email)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE Email = '$email'";
            $statement = $this->conexion->query($sql);
            $registros = $statement->fetch(PDO::FETCH_ASSOC);
            $statement = null;
            return $registros['Rol'] ?: [];
        } catch (PDOException $e) {
            return "ERROR AL CARGAR.<br>" . $e->getMessage();
        }
    }

    //B1. Método para insertar un nuevo CLIENTE
    public function insertEmpleado($data)
    {
        try {
            // Verificar si el DNI ya está registrado
            $sql_check = "SELECT COUNT(*) FROM $this->table WHERE Dni = ?";
            $stmt_check = $this->conexion->prepare($sql_check);
            $stmt_check->execute([$data['dni']]);
            if ($stmt_check->fetchColumn() > 0) {
                return ["error" => "El Empleado con DNI {$data['dni']} ya está dado de alta"];
            }

            // Insertar el nuevo CLIENTE
            $sql = "INSERT INTO $this->table (Dni, Nombre, Apellido1, Apellido2, Calle, Numero, CP, Poblacion, Provincia, Tlfno, Email, Password, Rol, Profesion)
                VALUES (:dni, :nombre, :apellido1, :apellido2, :calle, :numero, :cp, :poblacion, :provincia, :tlfno, :email, :password, :rol, :profesion)";
            $stmt = $this->conexion->prepare($sql);

            // Asignar valores a los parámetros
            $stmt->bindParam(":dni", $data["dni"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido1", $data["apellido1"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido2", $data["apellido2"], PDO::PARAM_STR);
            $stmt->bindParam(":calle", $data["calle"], PDO::PARAM_STR);
            $stmt->bindParam(":numero", $data["numero"], PDO::PARAM_STR);
            $stmt->bindParam(":cp", $data["cp"], PDO::PARAM_STR);
            $stmt->bindParam(":poblacion", $data["poblacion"], PDO::PARAM_STR);
            $stmt->bindParam(":provincia", $data["provincia"], PDO::PARAM_STR);
            $stmt->bindParam(":tlfno", $data["tlfno"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
            $stmt->bindParam(":rol", $data["rol"], PDO::PARAM_STR);
            $stmt->bindParam(":profesion", $data["profesion"], PDO::PARAM_STR);

            // Ejecutar consulta sin parámetros adicionales
            if ($stmt->execute()) {
                return ["success" => "Empleado DNI: {$data['dni']} insertado correctamente"];
            } else {
                return ["error" => "Error al insertar el empleado"];
            }
        } catch (PDOException $e) {
            return ["error" => "Error en la base de datos: " . $e->getMessage()];
        }
    }

    public function deleteEmpleado($dni)
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



    public function comprobarEmpleado($email, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE Email = '$email'";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            
            if ($password == $result['Password']) {
                return true; // La autenticación es correcta
            } else {
                return false; // La contraseña no coincide
            }
        } else {
            return false; // El email no existe
        }
    }
}
