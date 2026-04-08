<?php
/**
* 
*   Bruno Alexis Cedano Vidal
*
*/

    class FutbolistaModel {
        private $conn;
        private $table_name = "futbolistas";

        public $id;
        public $nombre;
        public $posicion;
        public $numero;
        public $edad;
        public $equipo;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function obtenerTodos() {
            $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function obtenerPorId() {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($row) {
                $this->nombre = $row['nombre'];
                $this->posicion = $row['posicion'];
                $this->numero = $row['numero'];
                $this->edad = $row['edad'];
                $this->equipo = $row['equipo'];
                return true;
            }
            return false;
        }

        public function crear() {
            $query = "INSERT INTO " . $this->table_name . "
                    SET nombre=:nombre, posicion=:posicion, numero=:numero, 
                        edad=:edad, equipo=:equipo";
            
            $stmt = $this->conn->prepare($query);
            
            $this->nombre = htmlspecialchars(strip_tags($this->nombre));
            $this->posicion = htmlspecialchars(strip_tags($this->posicion));
            $this->numero = htmlspecialchars(strip_tags($this->numero));
            $this->edad = htmlspecialchars(strip_tags($this->edad));
            $this->equipo = htmlspecialchars(strip_tags($this->equipo));
            
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":posicion", $this->posicion);
            $stmt->bindParam(":numero", $this->numero);
            $stmt->bindParam(":edad", $this->edad);
            $stmt->bindParam(":equipo", $this->equipo);
            
            if($stmt->execute()) {
                $this->id = $this->conn->lastInsertId();
                return true;
            }
            return false;
        }

        public function actualizar() {
            $query = "UPDATE " . $this->table_name . "
                    SET nombre = :nombre, posicion = :posicion, numero = :numero, 
                        edad = :edad, equipo = :equipo
                    WHERE id = :id";
            
            $stmt = $this->conn->prepare($query);
            
            $this->nombre = htmlspecialchars(strip_tags($this->nombre));
            $this->posicion = htmlspecialchars(strip_tags($this->posicion));
            $this->numero = htmlspecialchars(strip_tags($this->numero));
            $this->edad = htmlspecialchars(strip_tags($this->edad));
            $this->equipo = htmlspecialchars(strip_tags($this->equipo));
            $this->id = htmlspecialchars(strip_tags($this->id));
            
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":posicion", $this->posicion);
            $stmt->bindParam(":numero", $this->numero);
            $stmt->bindParam(":edad", $this->edad);
            $stmt->bindParam(":equipo", $this->equipo);
            $stmt->bindParam(":id", $this->id);
            
            if($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function eliminar() {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(1, $this->id);
            
            if($stmt->execute()) {
                return true;
            }
            return false;
        }
    }
?>