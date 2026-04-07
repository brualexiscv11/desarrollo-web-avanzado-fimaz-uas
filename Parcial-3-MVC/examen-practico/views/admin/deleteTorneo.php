<?php
/**
 * 
 *  Bruno Alexis Cedano Vidal
 * 
 */

    require_once("../../controllers/torneosController.php");
    $objTorneosController = new torneosController();
    $objTorneosController->delete($_GET['id']);

?>