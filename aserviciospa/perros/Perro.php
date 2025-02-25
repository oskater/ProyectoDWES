<?php
require_once('./../Basedatos.php');
//B11. Método que devuelva, dado un Cliente, los perros. Dado un DNI, el método devolverá un array con
//  toda la información de sus perros.

//C2. Insertar un perro. Se proporcionará un formulario con los datos necesarios para dar de alta un perro
//  (DNI_DUENIO, nombre, fecha_nto, raza, peso, altura, observaciones, n_chip, sexo).


//C7. Borrar perro. Se proporcionará un enlace, opción de menú o cualquier fórmula que permita
//  al usuario borrar un perro. El dato que debe facilitarse es el CHIP.


//C11. Listar un cliente con sus perros. Se proporcionará un enlace, opción de menú que muestre un listado con los perros de un cliente determinado.
//  Habrá que permitir al usuario introducir el DNI del cliente.


// Para mejorar la inserción y el borrado de perros,
//  se puede plantear en el listado de perros por CLIENTE, un botón de borrado por elemento. 
// E incluir el botón de insertar nuevo perro.
class Perro extends Basedatos
{

    private $table;
    private $conexion;

    public function __construct()
    {
        $this->table = "PERROS";
        $this->conexion = $this->getConexion();
    }

    // OBTENER TODOS LOS PERROS 
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM $this->table";
            $statement = $this->conexion->query($sql);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }



    // dado un Cliente, los perros
    public function getperrosCliente($dni)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE DNI_DUENIO = ?";
            $statement = $this->conexion->prepare($sql);
            $statement->execute([$dni]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }

    //(DNI_DUENIO, nombre, fecha_nto, raza, peso, altura, observaciones, n_chip, sexo)

    public function insertPERRO($info)
    {

        try {
            $sql = "INSERT INTO $this->table (DNI_DUENIO, nombre, fecha_nto, raza, peso, altura, observaciones, n_chip, sexo) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $statement = $this->conexion->prepare($sql);
            return $statement->execute(array_values($info));
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }

    //El dato que debe facilitarse es el CHIP borrar 

    public function deletePerro($CHIP)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE CHIP = ?";
            $statement = $this->conexion->prepare($sql);
            return $statement->execute([$CHIP]);
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }


    //GET POR CHIP 

    public function getPerroBYChip($CHIP)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE NUMERO_CHIP = ?";
            $statement = $this->conexion->prepare($sql);
            $statement->execute([$CHIP]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
}
