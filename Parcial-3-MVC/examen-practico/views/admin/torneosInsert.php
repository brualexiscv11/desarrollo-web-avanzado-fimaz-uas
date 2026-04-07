<?php
/**
 * 
 *  Bruno Alexis Cedano Vidal
 * 
 */

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: frmTorneos.php");
        exit;
    }
    
    $controllerPath = dirname(dirname(__DIR__)) . "/controllers/torneosController.php";
    
    if (!file_exists($controllerPath)) {
        die("Error: No se encuentra el archivo controlador en: " . $controllerPath);
    }
    
    require_once($controllerPath);
    
    $nombreTorneo = isset($_POST['txtNombreTorneo']) ? trim($_POST['txtNombreTorneo']) : '';
    $organizador = isset($_POST['txtOrganizador']) ? trim($_POST['txtOrganizador']) : '';
    $patrocinadores = isset($_POST['txtPatrocinador']) ? trim($_POST['txtPatrocinador']) : '';
    $sede = isset($_POST['txtSede']) ? trim($_POST['txtSede']) : '';
    $categoria = isset($_POST['txtCategoria']) ? trim($_POST['txtCategoria']) : '';
    $premio1 = isset($_POST['txtPremio1']) ? trim($_POST['txtPremio1']) : '';
    $premio2 = isset($_POST['txtPremio2']) ? trim($_POST['txtPremio2']) : '';
    $premio3 = isset($_POST['txtPremio3']) ? trim($_POST['txtPremio3']) : '';
    $otroPremio = isset($_POST['txtOtroPremio']) ? trim($_POST['txtOtroPremio']) : '';
    $usuario = isset($_POST['txtUsuario']) ? trim($_POST['txtUsuario']) : '';
    $contraseña = isset($_POST['txtContraseña']) ? $_POST['txtContraseña'] : '';

    $errores = array();
    if(empty($nombreTorneo)) $errores[] = "Nombre del torneo es requerido";
    if(empty($organizador)) $errores[] = "Organizador es requerido";
    if(empty($usuario)) $errores[] = "Usuario es requerido";
    if(empty($contraseña)) $errores[] = "Contraseña es requerida";
    
    if(!empty($errores)) {
        echo "<h3>Errores al guardar:</h3>";
        echo "<ul>";
        foreach($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo '<a href="frmTorneos.php">Volver al formulario</a>';
        exit;
    }

    $objController = new torneosController();
    $objController->saveTorneo($nombreTorneo, $organizador, $patrocinadores, $sede, $categoria,
    $premio1, $premio2, $premio3, $otroPremio, $usuario, $contraseña);
    
?>