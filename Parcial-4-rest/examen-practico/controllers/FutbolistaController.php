<?php
/**
* 
*   Bruno Alexis Cedano Vidal
*
*/

    class FutbolistaController {
        private $futbolistaModel;
        
        public function __construct($db) {
            $this->futbolistaModel = new FutbolistaModel($db);
        }
        
        public function obtenerTodos() {
            $stmt = $this->futbolistaModel->obtenerTodos();
            $num = $stmt->rowCount();
            
            if($num > 0) {
                $futbolistas_arr = array();
                $futbolistas_arr["records"] = array();
                
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $futbolista_item = array(
                        "id" => $id,
                        "nombre" => $nombre,
                        "posicion" => $posicion,
                        "numero" => $numero,
                        "edad" => $edad,
                        "equipo" => $equipo
                    );
                    array_push($futbolistas_arr["records"], $futbolista_item);
                }
                
                $this->enviarRespuesta(200, $futbolistas_arr);
            } else {
                $this->enviarRespuesta(404, array("mensaje" => "No se encontraron futbolistas"));
            }
        }
        
        public function obtenerPorId($id) {
            $this->futbolistaModel->id = $id;
            
            if($this->futbolistaModel->obtenerPorId()) {
                $futbolista_arr = array(
                    "id" => $id,
                    "nombre" => $this->futbolistaModel->nombre,
                    "posicion" => $this->futbolistaModel->posicion,
                    "numero" => $this->futbolistaModel->numero,
                    "edad" => $this->futbolistaModel->edad,
                    "equipo" => $this->futbolistaModel->equipo
                );
                $this->enviarRespuesta(200, $futbolista_arr);
            } else {
                $this->enviarRespuesta(404, array("mensaje" => "Futbolista no encontrado"));
            }
        }
        
        public function crear() {
            $data = json_decode(file_get_contents("php://input"));
            
            if(!empty($data->nombre) && !empty($data->posicion) && 
            !empty($data->numero) && !empty($data->edad) && !empty($data->equipo)) {
                
                //Validaciones
                if($data->edad < 0) {
                    $this->enviarRespuesta(400, array("mensaje" => "La edad no puede ser negativa"));
                    return;
                }
                
                if($data->numero <= 0) {
                    $this->enviarRespuesta(400, array("mensaje" => "El numero de camiseta debe ser positivo"));
                    return;
                }
                
                $this->futbolistaModel->nombre = $data->nombre;
                $this->futbolistaModel->posicion = $data->posicion;
                $this->futbolistaModel->numero = $data->numero;
                $this->futbolistaModel->edad = $data->edad;
                $this->futbolistaModel->equipo = $data->equipo;
                
                if($this->futbolistaModel->crear()) {
                    $this->enviarRespuesta(201, array(
                        "mensaje" => "Futbolista creado exitosamente",
                        "id" => $this->futbolistaModel->id
                    ));
                } else {
                    $this->enviarRespuesta(503, array("mensaje" => "Error al crear el futbolista"));
                }
            } else {
                $this->enviarRespuesta(400, array("mensaje" => "Datos incompletos"));
            }
        }
        
        public function actualizar($id) {
            $data = json_decode(file_get_contents("php://input"));
            
            $this->futbolistaModel->id = $id;
            
            if($this->futbolistaModel->obtenerPorId()) {
                if(!empty($data->nombre)) $this->futbolistaModel->nombre = $data->nombre;
                if(!empty($data->posicion)) $this->futbolistaModel->posicion = $data->posicion;
                if(!empty($data->numero)) {
                    if($data->numero <= 0) {
                        $this->enviarRespuesta(400, array("mensaje" => "El numero de camiseta debe ser positivo"));
                        return;
                    }
                    $this->futbolistaModel->numero = $data->numero;
                }
                if(!empty($data->edad)) {
                    if($data->edad < 0) {
                        $this->enviarRespuesta(400, array("mensaje" => "La edad no puede ser negativa"));
                        return;
                    }
                    $this->futbolistaModel->edad = $data->edad;
                }
                if(!empty($data->equipo)) $this->futbolistaModel->equipo = $data->equipo;
                
                if($this->futbolistaModel->actualizar()) {
                    $this->enviarRespuesta(200, array("mensaje" => "Futbolista actualizado exitosamente"));
                } else {
                    $this->enviarRespuesta(503, array("mensaje" => "Error al actualizar el futbolista"));
                }
            } else {
                $this->enviarRespuesta(404, array("mensaje" => "Futbolista no encontrado"));
            }
        }
        
        public function eliminar($id) {
            $this->futbolistaModel->id = $id;
            
            if($this->futbolistaModel->eliminar()) {
                $this->enviarRespuesta(200, array("mensaje" => "Futbolista eliminado exitosamente"));
            } else {
                $this->enviarRespuesta(404, array("mensaje" => "Futbolista no encontrado"));
            }
        }
        
        //Cambiado de private a public para que sea accesible desde index
        public function enviarRespuesta($codigo, $data) {
            http_response_code($codigo);
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
    }
?>