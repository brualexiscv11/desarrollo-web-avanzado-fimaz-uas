<?php
/**
* 
*   Bruno Alexis Cedano Vidal
*
*/

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once 'config/database.php';
    require_once 'models/FutbolistaModel.php';
    require_once 'controllers/FutbolistaController.php';

    $database = new Database();
    $db = $database->getConnection();
    $controller = new FutbolistaController($db);

    $request_method = $_SERVER["REQUEST_METHOD"];
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri);

    //Buscar el ID en la URI
    $id = null;
    //Buscar el indice donde esta el id despues de futbolistas
    for($i = 0; $i < count($uri); $i++) {
        if($uri[$i] == 'futbolistas' && isset($uri[$i+1]) && is_numeric($uri[$i+1])) {
            $id = $uri[$i+1];
            break;
        }
    }

    try {
        switch($request_method) {
            case 'GET':
                if($id != null) {
                    $controller->obtenerPorId($id);
                } else {
                    $controller->obtenerTodos();
                }
                break;
                
            case 'POST':
                $controller->crear();
                break;
                
            case 'PUT':
                if($id != null) {
                    $controller->actualizar($id);
                } else {
                    $controller->enviarRespuesta(400, array("mensaje" => "ID no proporcionado"));
                }
                break;
                
            case 'DELETE':
                if($id != null) {
                    $controller->eliminar($id);
                } else {
                    $controller->enviarRespuesta(400, array("mensaje" => "ID no proporcionado"));
                }
                break;
                
            default:
                $controller->enviarRespuesta(405, array("mensaje" => "Metodo no permitido"));
                break;
        }
    } catch(Exception $e) {
        $controller->enviarRespuesta(500, array("mensaje" => "Error interno del servidor", "error" => $e->getMessage()));
    }
?>