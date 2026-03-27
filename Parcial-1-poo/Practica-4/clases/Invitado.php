<?php
/**
 *
 *  Practica 4: Integracion POO + Herencia + Validaciones + Excepciones
 *  Practica de POO en PHP
 *  Bruno Alexis Cedano Vidal
 *
*/

    require_once 'Usuario.php';



    //Clase invitado que hereda de usuario
    class Invitado extends Usuario {
        private $empresa;
        


        //Constructor empresa
        public function __construct($nombre, $correo, $empresa) {
            parent::__construct($nombre, $correo);
            $this->empresa = $empresa;
        }
        
        //get empresa
        public function getEmpresa() {
            return $this->empresa;
        }
        
        //set rol
        public function getRol() {
            return "Invitado";
        }

    }

?>