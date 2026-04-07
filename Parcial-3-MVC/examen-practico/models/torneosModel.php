<?php
/**
 * 
 *  Bruno Alexis Cedano Vidal
 * 
 */

    require_once("../../config/DataBase.php");

    class torneosModel {
        public $PDO;

        public function __construct()
        {
            $connection = new DataBase();
            $this->PDO = $connection->connect();
            
            if (!($this->PDO instanceof PDO)) {
                die("Error: No se pudo establecer la conexion con la base de datos.");
            }
        }

        public function insert($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria,
        $premio1, $premio2, $premio3, $otroPremio, $usuario, $contraseña){
            
            $contraseña = $this->passwordEncrypt($contraseña);
            
            $nombreTorneo = addslashes($nombreTorneo);
            $organizador = addslashes($organizador);
            $patrocinadores = addslashes($patrocinadores);
            $sede = addslashes($sede);
            $categoria = addslashes($categoria);
            $premio1 = addslashes($premio1);
            $premio2 = addslashes($premio2);
            $premio3 = addslashes($premio3);
            $otroPremio = addslashes($otroPremio);
            $usuario = addslashes($usuario);
            
            $sql = "INSERT INTO torneos (nombreTorneo, organizador, patrocinadores, sede, categoria, premio1, premio2, premio3, otroPremio, usuario, contraseña) 
                    VALUES ('$nombreTorneo', '$organizador', '$patrocinadores', '$sede', '$categoria', '$premio1', '$premio2', '$premio3', '$otroPremio', '$usuario', '$contraseña')";
            
            $statement = $this->PDO->prepare($sql);
            
            if($statement->execute()) {
                return $this->PDO->lastInsertId();
            } else {
                $error = $statement->errorInfo();
                die("Error en la consulta: " . $error[2]);
            }
        }
        
        public function passwordEncrypt($password){
            $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
            return $passwordEncrypted;
        }
        
        public function passwordDencrypted($passwordEncrypted, $passwordCandidate){
            return (password_verify($passwordCandidate, $passwordEncrypted)) ? true : false;
        }

        //Crearemos el metodo para listar todos los torneos.
        public function read(){
            $statement = $this->PDO->prepare("SELECT * FROM torneos");
            if($statement->execute()) {
                $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } else {
                return false;
            }
        }

        public function readOne($id){
            $statement = $this->PDO->prepare("SELECT * FROM torneos WHERE id = :id LIMIT 1");
            $statement->bindParam(":id", $id);
            return ($statement->execute()) ? $statement->fetch(PDO::FETCH_ASSOC) : false;
        }

        public function update($id, $nombreTorneo, $organizador, $patrocinadores, $sede, $categoria,
        $premio1, $premio2, $premio3, $otroPremio){
            $statement = $this->PDO->prepare("UPDATE torneos SET nombreTorneo = :nombreTorneo,
            organizador = :organizador, patrocinadores = :patrocinadores, sede = :sede, 
            categoria = :categoria, premio1 = :premio1, premio2 = :premio2, premio3 = :premio3,
            otroPremio = :otroPremio WHERE id = :id");
            
            $statement->bindParam(":id", $id);
            $statement->bindParam(":nombreTorneo", $nombreTorneo);
            $statement->bindParam(":organizador", $organizador);
            $statement->bindParam(":patrocinadores", $patrocinadores);
            $statement->bindParam(":sede", $sede);
            $statement->bindParam(":categoria", $categoria);
            $statement->bindParam(":premio1", $premio1);
            $statement->bindParam(":premio2", $premio2);
            $statement->bindParam(":premio3", $premio3);
            $statement->bindParam(":otroPremio", $otroPremio);

            return ($statement->execute()) ? $id : false;
        }

        public function delete($id){
            $statement = $this->PDO->prepare("DELETE FROM torneos WHERE id = :id");
            $statement->bindParam(":id", $id);
            return ($statement->execute()) ? true : false;
        }
    }

?>