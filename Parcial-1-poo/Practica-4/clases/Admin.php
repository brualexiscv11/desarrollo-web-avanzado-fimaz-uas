<?php
/**
 *
 *  Practica 4: Integracion POO + Herencia + Validaciones + Excepciones
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    require_once 'Usuario.php';

    

    //Clase admin que hereda usuario
    class Admin extends Usuario {
        public function getRol() {
            return "Administrador";
        }

    }

?>