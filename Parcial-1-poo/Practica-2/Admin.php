<?php
/**
 *
 *  Practica 2: Herencia y reutilizacion de codigo en PHP
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/



    //Incluir la clase base usuario
    require_once 'Usuario.php';

    //Clase admin que herda de Usuario
    class Admin extends Usuario {
        
        //Constructor de la clase admin
        public function __construct($nombre, $correo) {
            parent:: __construct($nombre, $correo);
        }

        //Metodo especifico de Admin para obtener el rol
        public function getRol() {
            return "Administrador";
        }

        //Sobrescritura del metodo mostrarInformacion
        public function mostrarInformacion() {
            //Reutilizar el metodo de la clase padre y añadir el rol
            return parent::mostrarInformacion() . " - Rol: " . $this->getRol();
        }

        //Metodo adicional especifico de Admin
        public function gestionarUsuarios() {
            return "El administrador {$this->getNombre()} puede gestionar usuarios del sistema.";
        }

    }

?>