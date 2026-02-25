<?php
/**
 *
 *  Practica 3: Sistema de usuarios con validaciones y excepciones en PHP
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    require_once 'Usuario.php';

    //Clase admin que hereda de usuario
    class Admin extends Usuario {

        //Constructor admin
        public function __construct($nombre, $correo) {
            parent::__construct($nombre, $correo);
        }

        //Sobrescribir el metodo getRol
        public function getRol() {
            return "Administrador";
        }

        //Metodo especifico de Admin
        public function gestionarSistema() {
            return "El administrador {$this->getNombre()} puede gestionar todo el sistema.";
        }
    
    }

?>