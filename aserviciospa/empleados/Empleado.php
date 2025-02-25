<?php
require_once ('./../Basedatos.php');

class Empleado extends Basedatos {

    private $table;
    private $conexion;

    public function __construct() {
        $this->table = "EMPLEADOS";
        $this->conexion = $this->getConexion();
    }

    // B4. Método para insertar un nuevo EMPLEADO
    public function insertEmpleado($data) {
        try {
            // Verificar si el DNI ya está registrado
            $sql_check = "SELECT COUNT(*) FROM $this->table WHERE Dni = ?";
            $stmt_check = $this->conexion->prepare($sql_check);
            $stmt_check->execute([$data['Dni']]);
            if ($stmt_check->fetchColumn() > 0) {
                return ["error" => "El Empleado ya está dado de alta"];
            }
            // Cifrar la contraseña
            $data['Password'] = password_hash($data['Password'], PASSWORD_BCRYPT);
            // Insertar el nuevo EMPLEADO
            $sql = "INSERT INTO $this->table (Dni, Email, Password, Rol, Nombre, Apellido1, Apellido2, Calle, Numero, Cp, Poblacion, Provincia, Tlfno, Profesion) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $statement = $this->conexion->prepare($sql);
            // Mensajes de éxito o error
            if ($statement->execute(array_values($data))) {
                return ["success" => "Empleado DNI: {$data['Dni']} insertado correctamente"];
            } else {
                return ["error" => "Error al insertar el empleado"];
            }
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
    
}

?>